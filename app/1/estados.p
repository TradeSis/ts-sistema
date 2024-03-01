
def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "estados"   /* JSON ENTRADA */
    field codigoEstado  like estados.codigoEstado.

def temp-table ttestados  no-undo serialize-name "estados"  /* JSON SAIDA */
    field codigoEstado   like estados.codigoEstado
    field nomeEstado     like estados.nomeEstado.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vcodigoEstado like ttentrada.codigoEstado.

hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY").
find first ttentrada no-error.

vcodigoEstado = ?.
if avail ttentrada
then do:
    vcodigoEstado = ttentrada.codigoEstado.
end.

for each estados where
    (if vcodigoEstado = ?
     then true /* TODOS */
     else estados.codigoEstado = vcodigoEstado)
     no-lock.

    create ttestados.
    ttestados.codigoEstado = estados.codigoEstado.
    ttestados.nomeEstado   = estados.nomeEstado.

end.    

find first ttestados no-error.

if not avail ttestados
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Estado nao encontrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttestados:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
