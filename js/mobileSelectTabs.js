//SISTEMA
//Pega o valor do select e passa para url(jquery)
$(document).ready(function () {

    $('#subtabSistema').on('change', function () {
        var url = $(this).val();
        if (url) {
            window.open(url, '_self');
        }
        return false;
    });
});

//SERVICES
//Pega o valor do select e passa para url(jquery)
$(document).ready(function () {
    $('#subtabServices').on('change', function () {
        var url = $(this).val();
        if (url) {
            window.open(url, '_self');
        }
        return false;
    });
});