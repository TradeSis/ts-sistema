def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "cidades"   /* JSON ENTRADA */
    field codigoCidade  like cidades.codigoCidade.

def temp-table ttcidades  no-undo serialize-name "cidades"  /* JSON SAIDA */
    field codigoCidade   like cidades.codigoCidade
    field codigoEstado   like cidades.codigoEstado
    field nomeCidade     like cidades.nomeCidade.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vcodigoCidade like ttentrada.codigoCidade.

hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vcodigoCidade = ?.
if avail ttentrada
then do:
    vcodigoCidade = ttentrada.codigoCidade.
    if vcodigoCidade = 0 then vcodigoCidade = ?.
end.

for each cidades where
    (if vcodigoCidade = ?
     then true /* TODOS */
     else cidades.codigoCidade = vcodigoCidade)
     no-lock.

    create ttcidades.
    ttcidades.codigoCidade = cidades.codigoCidade.
    ttcidades.codigoEstado   = cidades.codigoEstado.
    ttcidades.nomeCidade   = cidades.nomeCidade.

end.

find first ttcidades no-error.

if not avail ttcidades
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Cidade nao encontrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttcidades:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
