def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "geralpessoas"   /* JSON ENTRADA */
    field cpfCnpj           like geralpessoas.cpfCnpj
    field tipoPessoa        like geralpessoas.tipoPessoa
    field nomePessoa        like geralpessoas.nomePessoa
    field nomeFantasia      like geralpessoas.nomeFantasia
    field IE                like geralpessoas.IE
    field codigoCidade      like geralpessoas.codigoCidade 
    field codigoEstado      like geralpessoas.codigoEstado
    field pais              like geralpessoas.pais
    field bairro            like geralpessoas.bairro
    field endereco          like geralpessoas.endereco
    field endNumero         like geralpessoas.endNumero 
    field cep               like geralpessoas.cep
    field municipio         like geralpessoas.municipio
    field email             like geralpessoas.email
    field telefone          like geralpessoas.telefone
    field crt               like geralpessoas.crt 
    field regimeTrib        like geralpessoas.regimeTrib
    field cnae              like geralpessoas.cnae
    field regimeEspecial    like geralpessoas.regimeEspecial
    field caracTrib         like geralpessoas.caracTrib 
    field origem            like geralpessoas.origem.

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

if ttentrada.cpfCnpj = ?
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada Invalidos".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

find geralpessoas where geralpessoas.cpfCnpj = ttentrada.cpfCnpj no-lock no-error.
if avail geralpessoas
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Pessoa ja cadastrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.


do on error undo:
    create geralpessoas.
    geralpessoas.cpfCnpj = ttentrada.cpfCnpj.
    geralpessoas.tipoPessoa   = ttentrada.tipoPessoa.
    geralpessoas.nomePessoa   = ttentrada.nomePessoa.
    geralpessoas.nomeFantasia   = ttentrada.nomeFantasia.
    geralpessoas.IE   = ttentrada.IE.
    geralpessoas.codigoCidade   = ttentrada.codigoCidade.
    geralpessoas.codigoEstado   = ttentrada.codigoEstado.
    geralpessoas.pais   = ttentrada.pais.
    geralpessoas.bairro   = ttentrada.bairro.
    geralpessoas.endereco   = ttentrada.endereco.
    geralpessoas.endNumero   = ttentrada.endNumero.
    geralpessoas.cep   = ttentrada.cep.
    geralpessoas.municipio   = ttentrada.municipio.
    geralpessoas.email   = ttentrada.email.
    geralpessoas.telefone   = ttentrada.telefone.
    geralpessoas.crt   = ttentrada.crt.
    geralpessoas.regimeTrib   = ttentrada.regimeTrib.
    geralpessoas.cnae   = ttentrada.cnae.
    geralpessoas.regimeEspecial   = ttentrada.regimeEspecial.
    geralpessoas.caracTrib   = ttentrada.caracTrib.
    geralpessoas.origem   = ttentrada.origem.
end.

create ttsaida.
ttsaida.tstatus = 200.
ttsaida.descricaoStatus = "Pessoa cadastrada com sucesso".

hsaida  = temp-table ttsaida:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
