var disegniPiante = {};
var JSON;
var SERVER_URL="http://www.cflr.beniculturali.it/";

 //$.getJSON('js/lista_segnature.json', function(response){
 //  console.log(response)
 //      JSON = response;
 //      alert(JSON.property);
 //})
 ////feel free to use chained handlers, or even make custom events out of them!
 //.success(function() { alert("second success"); })
 //.error(function(error) { console.log(error); })
 //.complete(function() { alert("complete"); });

var templateHelpers = {
    returnBool: function(val) {
        if (val == 0) {
            return "no"
        } else {
            return "si"
        }

    }
}

function initialize() {
console.log('start')
    //cleanScreen();
   $("#LoadingLista").show();
   $("#LoadingRicerche").show();
 //  createListaMain(lista_segnature,0)
    getListaSegnature();    
    $("#ButtonRicercaTesto").on("click", function() {
                
      var testo = $('#RicercaTesto').val();
      var testo2 = $('#RicercaTesto2').val();
      if (testo == '') {
         alert ( 'inserire il primo termine per la ricerca');
      }
      
      else
      {
         ricercaTesto(testo,testo2);
      }
      
    });
    $("#azzeraRicerche").on("click", function() {
                              console.log('azzera');
                              $("#listaPrincipale").html('');
                
                $('#RicercaTesto').val('');
                $('#RicercaTesto2').val('');
                $("#LoadingLista").show();
               getListaSegnature();
               parent.document.getElementById('s').src = "scheda.php";
    });



}


function createListaMain(lista_segnature,openlista) {
   console.log('main');
   var tmplMarkup = $('#templateSegnatura').html();
    //cleanScreen();
    //  $("#Loading").show();
    //  console.log(luoghi)
    var arrayLength = lista_segnature.length;
      console.log(lista_segnature);
    for (var i = 0; i < arrayLength; i++) {
        var numero = (lista_segnature[i].numero);
        var denominazione = (lista_segnature[i].denominazione);
        var bis = (lista_segnature[i].bis);
        var compiledTmpl = _.template(tmplMarkup, {
            numero: numero,
            denominazione: denominazione,
            bis: bis
        });
        $("#listaPrincipale").append(compiledTmpl);
     //   var compiledTmpl2 = _.template(tmplMarkup2);
    //    $("#scheda").html(compiledTmpl2);
        

    }
    $("#accordion .expanded").hide();
    $("a.opening").click(function() {
        $(this).next().slideToggle('fast', function() {
            $(this).prev("a.opening").toggleClass("active");
        });
        return false;
    });
    $("#LoadingLista").hide();
   
    $("#Nascondi").on("click", function() {
        $("#accordion .expanded").hide();
        var sections = $('#accordion').find("a");
         sections.each(function(index, section){
    if ($(section).hasClass('active') ) {
      console.log('active');
      $(section).toggleClass("active");
    }
  });
        $("#accordion a.opening").toggleClass("active");
    });
    $("#Mostra").on("click", function() {
        $("#accordion .expanded").show();
        var sections = $('#accordion').find("a");
         sections.each(function(index, section){
    if (!$(section).hasClass('active') ) {
      console.log('active');
      $(section).toggleClass("active");
    }
  });

        
    });
    if (openlista===1) {
      $("#Mostra").click();
    }
    
}



function getListaSegnature(){
 //  var segnatura = [80, 239, 1];
    var url = "lista_menu.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
            createListaMain(response,0) ;
            console.log(response);

        }
    });
  //  getScheda(segnatura);
}



function hideLoadingRicerche()
{
   console.log('Chiudi')
   $("#LoadingRicerche").hide();
}

function ricercaTesto(testo,testo2) {

    //cleanScreen();
  $("#LoadingLista").show();

    var url = "ricerca_testo.php"
    $.ajax({
        async: true,
        url: url,
        data: {
            testo: testo,
            testo2: testo2
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response)
        }
    });
}
function getSegnatureDaRicerca(segnature) {
   console.log(segnature)
   if (segnature.length == 0) {
    $("#listaPrincipale").html('Nessun risultato trovato');
    $("#scheda").html('');
   $("#LoadingLista").hide();
   }
   else
   {
    $("#listaPrincipale").html('');
    CreateListaSegnature(segnature, 1);
   
   }
}

function CreateListaSegnature(segnature, openlista) {
    var tmplMarkup = $('#templateSegnatureTrovate').html();
        var compiledTmpl = _.template(tmplMarkup, {
            segnature: segnature,
            count: segnature.length
        });
        $("#listaPrincipale").append(compiledTmpl);
    $("#LoadingLista").hide();
    console.log('primo record');
    console.log(segnature[0].numero);
    console.log(segnature[0].bis);
    var scheda = segnature[0].numero + " " + segnature[0].bis;
   // var bis = segnature[0].bis;
   parent.document.getElementById('s').src = "scheda.php?r=" + scheda;
}



 

$(function() {

    $.ajaxSetup({

        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
               console.log(jqXHR);
                console.log('Not connect.\n Verify Network.' + jqXHR);
            } else if (jqXHR.status == 404) {
                console.log('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                console.log('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                console.log('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                console.log('Time out error.');
            } else if (exception === 'abort') {
                console.log('Ajax request aborted.');
            } else {
                console.log('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
    });
});



