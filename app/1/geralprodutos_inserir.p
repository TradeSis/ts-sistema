def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "geralprodutos"   /* JSON ENTRADA */
    field nomeProduto                   like geralprodutos.nomeProduto
    field eanProduto                    like geralprodutos.eanProduto
    field idMarca                       like geralprodutos.idMarca
    field prodZFM                       like geralprodutos.prodZFM.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.



hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.


if not avail ttentrada
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada nao encontrados".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

if ttentrada.nomeProduto = ?
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada Invalidos".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

if ttentrada.eanProduto = ""
then do:
    ttentrada.eanProduto = ?.
end.
if ttentrada.idMarca = 0
then do:
    ttentrada.idMarca = ?.
end.
if ttentrada.prodZFM = ""
then do:
    ttentrada.prodZFM = "N".
end.


find geralprodutos where geralprodutos.eanProduto = ttentrada.eanProduto no-lock no-error.
if avail geralprodutos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto ja cadastrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.


do on error undo:
    create geralprodutos.
    geralprodutos.eanProduto   = ttentrada.eanProduto.
    geralprodutos.nomeProduto   = ttentrada.nomeProduto.
    geralprodutos.idMarca   = ttentrada.idMarca.
    geralprodutos.prodZFM   = ttentrada.prodZFM.
end.

create ttsaida.
ttsaida.tstatus = 200.
ttsaida.descricaoStatus = "Produto cadastrado com sucesso".

hsaida  = temp-table ttsaida:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
