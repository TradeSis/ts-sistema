def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "dadosEntrada"   /* JSON ENTRADA */
    field cpfCnpj  like geralpessoas.cpfCnpj.

def temp-table ttgeralpessoas  no-undo serialize-name "geralpessoas"  /* JSON SAIDA */
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

def VAR vcpfCnpj like ttentrada.cpfCnpj.


hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vcpfCnpj = ?.
if avail ttentrada
then do:
    vcpfCnpj = ttentrada.cpfCnpj.
    if vcpfCnpj = "" then vcpfCnpj = ?.
end.

for each geralpessoas where
    (if vcpfCnpj = ?
    then true /* TODOS */
    ELSE geralpessoas.cpfCnpj = vcpfCnpj)
    no-lock.

    create ttgeralpessoas.
    ttgeralpessoas.cpfCnpj = geralpessoas.cpfCnpj.
    ttgeralpessoas.tipoPessoa   = geralpessoas.tipoPessoa.
    ttgeralpessoas.nomePessoa   = geralpessoas.nomePessoa.
    ttgeralpessoas.nomeFantasia   = geralpessoas.nomeFantasia.
    ttgeralpessoas.IE   = geralpessoas.IE.
    ttgeralpessoas.codigoCidade   = geralpessoas.codigoCidade.
    ttgeralpessoas.codigoEstado   = geralpessoas.codigoEstado.
    ttgeralpessoas.pais   = geralpessoas.pais.
    ttgeralpessoas.bairro   = geralpessoas.bairro.
    ttgeralpessoas.endereco   = geralpessoas.endereco.
    ttgeralpessoas.endNumero   = geralpessoas.endNumero.
    ttgeralpessoas.cep   = geralpessoas.cep.
    ttgeralpessoas.municipio   = geralpessoas.municipio.
    ttgeralpessoas.email   = geralpessoas.email.
    ttgeralpessoas.telefone   = geralpessoas.telefone.
    ttgeralpessoas.crt   = geralpessoas.crt.
    ttgeralpessoas.regimeTrib   = geralpessoas.regimeTrib.
    ttgeralpessoas.cnae   = geralpessoas.cnae.
    ttgeralpessoas.regimeEspecial   = geralpessoas.regimeEspecial.
    ttgeralpessoas.caracTrib   = geralpessoas.caracTrib.
    ttgeralpessoas.origem   = geralpessoas.origem.

end.
    

  

find first ttgeralpessoas no-error.

if not avail ttgeralpessoas
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Pessoa nao encontrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttgeralpessoas:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).
