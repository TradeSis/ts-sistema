def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "geralprodutos"   /* JSON ENTRADA */
    field idGeralProduto                like geralprodutos.idGeralProduto
    field nomeProduto                   like geralprodutos.nomeProduto
    field idMarca                       like geralprodutos.idMarca
    field dataAtualizacaoTributaria     like geralprodutos.dataAtualizacaoTributaria
    field idGrupo                       like geralprodutos.idGrupo
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

if ttentrada.idGeralProduto = ?
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada Invalidos".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

if ttentrada.idMarca = 0
then do:
    ttentrada.idMarca = ?.
end.
if ttentrada.dataAtualizacaoTributaria = ""
then do:
    ttentrada.dataAtualizacaoTributaria = ?.
end.
if ttentrada.idGrupo = ""
then do:
    ttentrada.idGrupo = ?.
end.
if ttentrada.prodZFM = ""
then do:
    ttentrada.prodZFM = ?.
end.

find geralprodutos where geralprodutos.idGeralProduto = ttentrada.idGeralProduto no-lock no-error.
if not avail geralprodutos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto nao cadastrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

do on error undo:   
    find geralprodutos where geralprodutos.idGeralProduto = ttentrada.idGeralProduto exclusive no-error.
    geralprodutos.nomeProduto = ttentrada.nomeProduto.
    if ttentrada.idMarca <> ?
    then do:
        geralprodutos.idMarca = ttentrada.idMarca.
    end.
    if ttentrada.dataAtualizacaoTributaria <> ?
    then do:
        geralprodutos.dataAtualizacaoTributaria = ttentrada.dataAtualizacaoTributaria.
    end.
    if ttentrada.idGrupo <> ?
    then do:
        geralprodutos.idGrupo = ttentrada.idGrupo.
    end.
    if ttentrada.prodZFM <> ?
    then do:
        geralprodutos.prodZFM = ttentrada.prodZFM.
    end.
end.

create ttsaida.
ttsaida.tstatus = 200.
ttsaida.descricaoStatus = "Produto alterado com sucesso".

hsaida  = temp-table ttsaida:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
