
// Programa especializado em CRAR a tabela geralprodutos
def temp-table ttentrada no-undo serialize-name "geralprodutos"   /* JSON ENTRADA */
    LIKE geralprodutos.

  
def input param vAcao as char.
DEF INPUT PARAM TABLE FOR ttentrada.
def output param vmensagem as char.

def var var_datetime as datetime no-undo.
def var var_date as char no-undo.
def var var_time as char no-undo.
def var var_year as int no-undo.
def var var_month as int no-undo.
def var var_day as int no-undo.
def var var_hour as int no-undo.
def var var_minute as int no-undo.

vmensagem = ?.

find first ttentrada no-error.
if not avail ttentrada then do:
    vmensagem = "Dados de Entrada nao encontrados".
    return.    
end.



if vAcao = "PUT"
THEN DO:

    if ttentrada.nomeProduto = ? or ttentrada.nomeProduto = ""
    then do:
        vmensagem = "Dados de Entrada Invalidos".
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

    if ttentrada.dataAtualizacaoTributaria = "" 
    then do:
        var_datetime = ?.  
    END.
    else do:
        var_date = ENTRY(1, ttentrada.dataAtualizacaoTributaria, "T").
        var_time = ENTRY(2, ttentrada.dataAtualizacaoTributaria, "T").

        var_year = INTEGER(ENTRY(1, var_date, "-")).
        var_month = INTEGER(ENTRY(2, var_date, "-")).
        var_day = INTEGER(ENTRY(3, var_date, "-")).

        var_hour = INTEGER(ENTRY(1, var_time, ":")).
        var_minute = INTEGER(ENTRY(2, var_time, ":")).

        var_datetime = DATETIME(var_month, var_day, var_year, var_hour, var_minute, 0).
    end.

    if ttentrada.codImendes = ""
    then do:
        ttentrada.codImendes = ?.
    end.
    if ttentrada.idGrupo = 0
    then do:
        ttentrada.idGrupo = ?.
    end.
    if ttentrada.prodZFM = ""
    then do:
        ttentrada.prodZFM = "N".
    end.

    find geralprodutos where geralprodutos.eanProduto = ttentrada.eanProduto no-lock no-error.
    if avail geralprodutos
    then do:
        vmensagem = "Produto ja cadastrado".
        return.
    end.


    do on error undo:
        create geralprodutos.
        geralprodutos.eanProduto   = ttentrada.eanProduto.
        geralprodutos.nomeProduto   = ttentrada.nomeProduto.
        geralprodutos.idMarca   = ttentrada.idMarca.
        geralprodutos.dataAtualizacaoTributaria   = var_datetime.
        geralprodutos.codImendes   = ttentrada.codImendes.
        geralprodutos.idGrupo   = ttentrada.idGrupo.
        geralprodutos.prodZFM   = ttentrada.prodZFM.
    end.
END.
IF vAcao = "POST" 
THEN DO:

    if ttentrada.idGeralProduto = ? or ttentrada.idGeralProduto = 0
    then do:
        vmensagem = "Dados de Entrada Invalidos".
        return.
    end.

    if ttentrada.idMarca = 0
    then do:
        ttentrada.idMarca = ?.
    end.
    if ttentrada.idGrupo = 0
    then do:
        ttentrada.idGrupo = ?.
    end.
    if ttentrada.prodZFM = ""
    then do:
        ttentrada.prodZFM = ?.
    end.
    if ttentrada.dataAtualizacaoTributaria = "" 
    then do:
        var_datetime = ?.  
    END.
    else do:
        var_date = ENTRY(1, ttentrada.dataAtualizacaoTributaria, "T").
        var_time = ENTRY(2, ttentrada.dataAtualizacaoTributaria, "T").

        var_year = INTEGER(ENTRY(1, var_date, "-")).
        var_month = INTEGER(ENTRY(2, var_date, "-")).
        var_day = INTEGER(ENTRY(3, var_date, "-")).

        var_hour = INTEGER(ENTRY(1, var_time, ":")).
        var_minute = INTEGER(ENTRY(2, var_time, ":")).

        var_datetime = DATETIME(var_month, var_day, var_year, var_hour, var_minute, 0).
    end.


    find geralprodutos where geralprodutos.idGeralProduto = ttentrada.idGeralProduto no-lock no-error.
    if not avail geralprodutos
    then do:
        vmensagem = "Produto nao cadastrado".
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
            geralprodutos.dataAtualizacaoTributaria = var_datetime.
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
        
END.
   
