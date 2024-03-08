def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "dadosEntrada"   /* JSON ENTRADA */
    field idFornecimento  like geralfornecimento.idFornecimento
    field eanProduto  like geralprodutos.eanProduto
    field Cnpj  like geralfornecimento.Cnpj.

def temp-table ttgeralfornecimento  no-undo serialize-name "geralfornecimento"  /* JSON SAIDA */
    field idFornecimento        like geralfornecimento.idFornecimento
    field Cnpj                  like geralfornecimento.Cnpj
    field refProduto            like geralfornecimento.refProduto
    field idGeralProduto        like geralfornecimento.idGeralProduto
    field valorCompra           like geralfornecimento.valorCompra.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vidFornecimento like ttentrada.idFornecimento.


hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vidFornecimento = 0.
if avail ttentrada
then do:
    vidFornecimento = ttentrada.idFornecimento.
    if vidFornecimento = ? then vidFornecimento = 0.
end.

IF ttentrada.idFornecimento <> ? OR (ttentrada.idFornecimento = ? AND ttentrada.eanProduto = ? AND ttentrada.Cnpj = ?)
THEN DO:
    for each geralfornecimento where
        (if vidFornecimento = 0
         then true /* TODOS */
         else geralfornecimento.idFornecimento = vidFornecimento)
         no-lock.

        RUN criaFornecimento.

    end.
END.

IF ttentrada.Cnpj <> ?
THEN DO:
      for each geralfornecimento WHERE 
        geralfornecimento.Cnpj = ttentrada.Cnpj
        no-lock.
        
        RUN criaFornecimento.

    end. 
END.

IF ttentrada.eanProduto <> ?
THEN DO:
        for each geralfornecimento, each geralprodutos
        WHERE geralprodutos.idGeralProduto = geralfornecimento.idGeralProduto and
        geralprodutos.eanProduto = ttentrada.eanProduto
        no-lock.
        
        RUN criaFornecimento.

    end.
END.

  

find first ttgeralfornecimento no-error.

if not avail ttgeralfornecimento
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto nao encontrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttgeralfornecimento:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).


PROCEDURE criaFornecimento.

    create ttgeralfornecimento.
    ttgeralfornecimento.idFornecimento = geralfornecimento.idFornecimento.
    ttgeralfornecimento.Cnpj   = geralfornecimento.Cnpj.
    ttgeralfornecimento.refProduto   = geralfornecimento.refProduto.
    ttgeralfornecimento.idGeralProduto   = geralfornecimento.idGeralProduto.
    ttgeralfornecimento.valorCompra   = geralfornecimento.valorCompra.

END.
