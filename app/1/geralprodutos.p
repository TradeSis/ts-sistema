def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "dadosEntrada"   /* JSON ENTRADA */
    field idGeralProduto  like geralprodutos.idGeralProduto
    field buscaProduto  AS CHAR.

def temp-table ttgeralprodutos  no-undo serialize-name "geralprodutos"  /* JSON SAIDA */
    like geralprodutos.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vidGeralProduto like ttentrada.idGeralProduto.


hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vidGeralProduto = 0.
if avail ttentrada
then do:
    vidGeralProduto = ttentrada.idGeralProduto.
    if vidGeralProduto = ? then vidGeralProduto = 0.
end.

IF ttentrada.idGeralProduto <> ? OR (ttentrada.idGeralProduto = ? AND ttentrada.buscaProduto = ?)
THEN DO:
    for each geralprodutos where
    (if vidGeralProduto = 0
    then true /* TODOS */
    else geralprodutos.idGeralProduto = vidGeralProduto)
    no-lock.
    
    RUN criaProdutos.
    
    end.
END.

IF ttentrada.buscaProduto <> ?
THEN DO:
     for each geralprodutos where
        geralprodutos.eanProduto = ttentrada.buscaProduto OR
        geralprodutos.nomeProduto MATCHES "*" + ttentrada.buscaProduto + "*"
        no-lock.
       
       RUN criaProdutos.
    
    end.
END.

  

find first ttgeralprodutos no-error.

if not avail ttgeralprodutos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto nao encontrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttgeralprodutos:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).


PROCEDURE criaProdutos.

    create ttgeralprodutos.
    BUFFER-COPY geralprodutos TO ttgeralprodutos.

END.