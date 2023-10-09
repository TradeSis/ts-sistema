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

//SISTEMA painelmobile.php
  //Pega o valor do select e passa para url(js puro)
  var select = document.getElementById('tabaplicativosmobile')
  select.addEventListener('change', function(){
  //alert(select.value)
  var url = select.value
      if (url) {
          window.open(url, '_self');
          }
      return false;
  })
  
//SERVICES subtabSistema
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

//CADASTROS 
//Pega o valor do select e passa para url(jquery)
$(document).ready(function () {
    $('#subtabCadastros').on('change', function () {
        alert('oi')
        var url = $(this).val();
        if (url) {
            window.open(url, '_self');
        }
        return false;
    });
});