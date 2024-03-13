def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "geralfornecimento"   /* JSON ENTRADA */
    field Cnpj                  like geralfornecimento.Cnpj
    field refProduto            like geralfornecimento.refProduto
    field idGeralProduto        like geralfornecimento.idGeralProduto
    field valorCompra           like geralfornecimento.valorCompra.

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

if ttentrada.Cnpj = ?
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada Invalidos".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

find geralpessoas where geralpessoas.cpfCnpj = ttentrada.Cnpj no-lock no-error.
if not avail geralpessoas
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Pessoa não existente".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

find geralprodutos where geralprodutos.idGeralProduto = ttentrada.idGeralProduto no-lock no-error.
if not avail geralprodutos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto não existente".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

find geralfornecimento where geralfornecimento.Cnpj = ttentrada.Cnpj AND 
     geralfornecimento.refProduto = ttentrada.refProduto no-lock no-error.
if avail geralfornecimento
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Fornecimento ja cadastrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.


do on error undo:
    create geralfornecimento.
    geralfornecimento.Cnpj   = ttentrada.Cnpj.
    geralfornecimento.refProduto   = ttentrada.refProduto.
    geralfornecimento.idGeralProduto   = ttentrada.idGeralProduto.
    geralfornecimento.valorCompra   = ttentrada.valorCompra.
end.

create ttsaida.
ttsaida.tstatus = 200.
ttsaida.descricaoStatus = "Fornecimento cadastrado com sucesso".

hsaida  = temp-table ttsaida:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
