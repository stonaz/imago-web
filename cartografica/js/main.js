var disegniPiante = {};
var JSON;

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
        if (val === 0) {
            return "no" ;
        } else {
            return "si" ;
        }

    }
}

function initialize() {

    //cleanScreen();
    
   $("#LoadingLista").show();
   $("#LoadingRicerche").show();
   createListaMain(lista_segnature_collezioni,0) ;
 //  setTimeout(hideLoadingRicerche, 4000);
   setTimeout(hideLoadingRicerche, 1000);
 //   getListaSegnature();
    

    
    
    $("#ButtonRicercaTesto").on("click", function() {
                $('#selectRicercaToponimo').val('');
                $('#selectRicercaClassificazione').val('');
                $('#selectRicercaAutore').val('');
      var testo = $('#RicercaTesto').val();
      var testo2 = $('#RicercaTesto2').val();
      if (testo === '') {
         alert ( 'inserire il primo termine per la ricerca') ;
      }
      
      else
      {
         ricercaTesto(testo,testo2);
      }
      
    });
    
    
    $("#azzeraRicerche").on("click", function() {
                              console.log('azzera');
                              $("#listaPrincipale").html('');
                                              $('#selectRicercaToponimo').val('');
                $('#selectRicercaClassificazione').val('');
                $('#selectRicercaAutore').val('');
                $('#RicercaTesto').val('');
                $('#RicercaTesto2').val('');
               createListaMain(lista_segnature_collezioni,0);
    });

}



function createListaMain(lista_segnature_collezioni,openlista) {
   console.log('start main process');
   console.log('SERVER_URL: ' + SERVER_URL);
    var tmplMarkup = $('#templateSegnatura').html();
    var tmplMarkup2 = $('#templateHome').html();
    //cleanScreen();
    //  $("#Loading").show();
    console.log(lista_segnature_collezioni);
    var arrayLength = lista_segnature_collezioni.length;
    console.log(arrayLength);
    for (var i = 0; i < arrayLength; i++) {
        var classe = (lista_segnature_collezioni[i].nome_classe);
        var id_classe = (lista_segnature_collezioni[i].classe);
        console.log('Classi');
        console.log('Classe Lenght: ' + classe.length);
        console.log(classe);
        
        var fondi = (lista_segnature_collezioni[i].fondi);
        console.log('Fondi');
        console.log('Fondi Lenght: ' + fondi.length);
        console.log(fondi);
     //   console.log(fondi[0].nome_fondo);
        
        if (fondi.length < 1)  {
            var message="Fondi ancora non inseriti";
        //var cartelle = (fondi[i].cartelle);
        //
        //console.log('Cartelle');
        //console.log('Cartelle Lenght: ' + cartelle.length);
        //console.log(cartelle);
        //console.log(cartelle[i].schede);
        
     //   var schede = (lista_segnature_collezioni[i].schede);
     
      }
       var compiledTmpl = _.template(tmplMarkup, {
            id_classe: id_classe,
            classe: classe,
            fondi: fondi,
            message: message
        
        });
      $("#listaPrincipale").append(compiledTmpl);
      var compiledTmpl2 = _.template(tmplMarkup2);
        $("#scheda").html(compiledTmpl2);
        
    }
   // $("#LoadingLista").hide();
    //    console.log('hidden loading gif');
        createAllSelects();
    $(".accordion .expanded").hide();
    $(".nome_classe").click(function() {
        $(this).next("div").slideToggle('fast');
        return false;
    });
    $("a.opening").click(function() {
        $(this).siblings("a").slideToggle('fast', function() {
           $(this).prev("a.opening").toggleClass("active");
        });
        $(this).siblings("div:visible").slideToggle('fast', function() {});
        $(this).siblings("a.opening-sub.active-sub").toggleClass("active-sub");
        return false;
    });
    $("a.opening-sub").click(function() {
        $(this).next().slideToggle('fast', function() {
            $(this).prev("a.opening-sub").toggleClass("active-sub");
            
        });
        return false;
    });

    $("li").on("click", function() {
        
        var segnatura = $(this).attr('id');
        getScheda(segnatura);
    });
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

function createAllSelects(){

  //  createSelectClassificazioni();
   // createSelectNominativi();
  //  createSelectToponimi();
    createSelectLuoghi();
    createSelectSoggetti();
    
}

//function createAllSelects(){
//createSelectToponimi( function() {
//  createSelectNominativi(function() {
//    createSelectClassificazioni(function(){
//     // hideLoadingRicerche();
//      });
//  });
//});
//}

//function getListaSegnature(){
//   var segnatura = [80, 239, 1];
//    var url = "php/segnature.php" ;
//    $.ajax({
//        async: true,
//        url: url,
//        dataType: 'json',
//        success: function(response) {
//            CreateListaSegnature(response) ;
//
//        }
//    });
//    getScheda(segnatura);
//}

function CreateListaSegnature(segnature, openlista) {
    var tmplMarkup = $('#templateSegnatureTrovate').html();
        var compiledTmpl = _.template(tmplMarkup, {
            segnature: segnature,
            count: segnature.length
        });
        $("#listaPrincipale").append(compiledTmpl);
    $("#LoadingLista").hide();
    $("li").on("click", function() {
        var segnatura = $(this).attr('id');
        getScheda(segnatura);
    });
}

function hideLoadingRicerche()
{
   console.log('Chiudi');
   $("#LoadingRicerche").hide();
   $("#LoadingLista").hide();
}

function createSelectLuoghi() {
   console.log('Luoghi');
    var tmplMarkup = $('#templateLuoghi').html();
    var url = "php/luoghi.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
       //     console.log(response)
            var compiledTmpl = _.template(tmplMarkup, {
                luoghi: response
            });
            $('#RicercaLuogo').html(compiledTmpl);
            $("#ButtonRicercaLuogoSoggetto").on("click", function() {
        console.log('Ricerca LuogoSoggetto');
                $('#selectRicercaToponimo').val('');
                $('#selectRicercaClassificazione').val('');
                $('#selectRicercaAutore').val('');
                
      var testo = $('#selectRicercaLuogo').val();
      var testo2 = $('#selectRicercaLuogoSoggetto').val();
      if (testo === '') {
         alert ( 'Selezionare un luogo dal menu') ;
      }
      
      else
      {
         ricercaLuogoSoggetto(testo,testo2);
      }
      
    });
            $('#selectRicercaLuogo').on("change", function() {
                //console.log('ricerca toponimo');
                $('#RicercaTesto').val('');
                $('#selectRicercaAutore').val('');
                $('#selectRicercaClassificazione').val('');
                $('#selectRicercaSoggetto').val('');
                $('#selectRicercaSoggettoLuogo').val('');
                var luogo = $(this).val();
                console.log(luogo);
                createSubSelectLuoghi(luogo);
            });

        }

    });  
}

function createSubSelectLuoghi(luogo) {
   console.log('Sub Luoghi' + luogo);
    var url = "php/soggetti.php";
    $.ajax({
        async: true,
        url: url,
        data: {
            luogo: luogo
        },
        dataType: 'json',
        success: function(response) {
  
            console.log(response);
            var listItems = "";
            listItems+= "<option value=''>" + ' ' + "</option>";
            for (var i = 0; i < response.length; i++){
        listItems+= "<option value='" + response[i] + "'>" + response[i] + "</option>";
    }
            $('#selectRicercaLuogoSoggetto').html(listItems);
            $('#selectRicercaLuogoSoggetto').on("change", function() {
                $('#RicercaTesto').val('');
                $('#selectRicercaAutore').val('');
                $('#selectRicercaClassificazione').val('');
                var luogo = $(this).val();
                console.log(luogo);
            });

        }

    });  
}

function createSelectSoggetti() {
   console.log('Soggetti');
    var tmplMarkup = $('#templateSoggetti').html();
    var url = "php/soggetti.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
       //     console.log(response)
            var compiledTmpl = _.template(tmplMarkup, {
                soggetti: response
            });
            $('#RicercaSoggetto').html(compiledTmpl);
            $("#ButtonRicercaSoggetto").on("click", function() {
        console.log('Ricerca SoggettoLuogo');
                $('#selectRicercaToponimo').val('');
                $('#selectRicercaClassificazione').val('');
                $('#selectRicercaAutore').val('');
               
      var testo = $('#selectRicercaSoggetto').val();
      var testo2 = $('#selectRicercaSoggettoLuogo').val();
      if (testo === '') {
         alert ( 'Selezionare un soggetto dal menu') ;
      }
      
      else
      {
         ricercaSoggettoLuogo(testo,testo2);
      }
      
    });
            $('#selectRicercaSoggetto').on("change", function() {
                //console.log('ricerca toponimo');
                $('#RicercaTesto').val('');
                $('#selectRicercaAutore').val('');
                $('#selectRicercaClassificazione').val('');
                 $('#selectRicercaLuogo').val('');
                $('#selectRicercaLuogoSoggetto').val('');
                var soggetto = $(this).val();
                console.log(soggetto);
                createSubSelectSoggetti(soggetto);
            });

        }

    });  
}

function createSubSelectSoggetti(soggetto) {
   console.log('Sub Soggetti' + soggetto);
    var url = "php/luoghi.php";
    $.ajax({
        async: true,
        url: url,
        data: {
            soggetto: soggetto
        },
        dataType: 'json',
        success: function(response) {
  
            console.log(response);
            var listItems = "";
            listItems+= "<option value=''>" + ' ' + "</option>";
            for (var i = 0; i < response.length; i++){
        listItems+= "<option value='" + response[i] + "'>" + response[i] + "</option>";
    }
            $('#selectRicercaSoggettoLuogo').html(listItems);
            $('#selectRicercaSoggettoLuogo').on("change", function() {
                $('#RicercaTesto').val('');
                $('#selectRicercaAutore').val('');
                $('#selectRicercaClassificazione').val('');
                var soggetto = $(this).val();
                console.log(soggetto);
            });

        }

    });  
}

function createSelectToponimi() {
   console.log('Toponimi');
    var tmplMarkup = $('#templateToponimi').html();
    var url = "php/toponimi.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
       //     console.log(response)
            var compiledTmpl = _.template(tmplMarkup, {
                toponimi: response
            });
            $('#RicercaToponimo').html(compiledTmpl);
            $('#selectRicercaToponimo').on("change", function() {
                //console.log('ricerca toponimo');
                $('#RicercaTesto').val('');
                $('#selectRicercaAutore').val('');
                $('#selectRicercaClassificazione').val('');
                var toponimo = $(this).val();
                console.log(toponimo);
                ricercaToponimo(toponimo);
            });

        }

    });
   
}

function createSelectNominativi() {
   console.log('Nominativi');
    var tmplMarkup = $('#templateNominativi').html();
    var url = "php/nominativi.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
            //console.log(response)
            var compiledTmpl = _.template(tmplMarkup, {
                autore: response
            });
            $('#RicercaAutore').html(compiledTmpl);
       //     $("#LoadingRicerche").hide();
            
            $('#selectRicercaAutore').on("change", function() {
                $('#RicercaTesto').val('');
                $('#selectRicercaToponimo').val('');
                $('#selectRicercaClassificazione').val('');

                console.log('ricerca autore');
                var autore = $(this).val();
                console.log(autore);
                ricercaAutore(autore);
            });
        }
        

    });
    
}

function createSelectClassificazioni() {
   console.log('Classificazioni');
    var tmplMarkup = $('#templateClassificazioni').html();
    var url = "php/classificazioni.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        success: function(response) {
         //   console.log(response)
            var compiledTmpl = _.template(tmplMarkup, {
                luogo: response
            });
            $('#RicercaClassificazione').html(compiledTmpl);
            
            
          //  $("#LoadingRicerche").hide();
            $('#selectRicercaClassificazione').on("change", function() {
               $('#RicercaTesto').val('');
                $('#selectRicercaToponimo').val('');
                $('#selectRicercaAutore').val('');
                console.log('ricerca class');
                var luogo = $(this).val();
                console.log(luogo);
                ricercaClassificazione(luogo);
            });
        }
        

    });
//    $("#LoadingRicerche").hide();
    //hideLoadingRicerche();
   // callback();
}

function ricercaAutore(autore) {

    //cleanScreen();
    $("#LoadingLista").show();

    var url = "php/ricerca_nominativo.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            autore: autore
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}

function ricercaToponimo(toponimo) {

    //cleanScreen();
    $("#LoadingLista").show();

    var url = "php/ricerca_toponimo.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            toponimo: toponimo
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}

function ricercaClassificazione(luogo) {

    //cleanScreen();
    $("#LoadingLista").show();
console.log(luogo)
    var url = "php/ricerca_luogo.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            luogo: luogo
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}

function ricercaTesto(testo,testo2) {

    //cleanScreen();
  $("#LoadingLista").show();

    var url = "php/ricerca_testo.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            testo: testo,
            testo2: testo2
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}

function ricercaLuogoSoggetto(testo,testo2) {

    //cleanScreen();
  $("#LoadingLista").show();

    var url = "php/ricerca_luogo_soggetto.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            testo: testo,
            testo2: testo2
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}

function ricercaSoggettoLuogo(testo,testo2) {

    //cleanScreen();
  $("#LoadingLista").show();

    var url = "php/ricerca_soggetto_luogo.php" ;
    $.ajax({
        async: true,
        url: url,
        data: {
            testo: testo,
            testo2: testo2
        },
        dataType: 'json',
        success: function(response) {
            getSegnatureDaRicerca(response) ;
        }
    });
}


function getSegnatureDaRicerca(segnature) {
   if (segnature.length === 0) {
    $("#listaPrincipale").html('Nessun risultato trovato');
    $("#scheda").html('');
    hideLoadingRicerche();
 //  $("#LoadingLista").hide();
   }
   else
   {
    $("#listaPrincipale").html('');
    CreateListaSegnature(segnature, 1);
    getScheda(segnature[0].segnatura);
   }
}

function getScheda(segn) {
   
   // $("#LoadingScheda").show();
   
   console.log(typeof(segn));
   if (typeof(segn) === 'string') {
      var segnatura = segn.split("-");
   var classe = segnatura[0];
   var fondo = segnatura[1];
   var cartella = segnatura[2];
   var bis = segnatura[3];
   var UA = segnatura[4];
   var sub = segnatura[5];

   
   }
   else{
   console.log('segnatura '+segn);
   var cartella = (segn[0]);
    var foglio = (segn[1]);
    var sub = (segn[2]);
      
   }
   
    var url = "php/scheda.php";
    $.ajax({
        async: true,
        url: url,
        dataType: 'json',
        data: {
            //collezione: collezione,
            classe:classe,
            fondo:fondo,
            cartella: cartella,
            bis:bis,
            UA: UA,
            sub: sub
        },
        success: function(response) {
            printScheda(response);
        }
    });      
}

function printScheda(scheda) {

    //cleanScreen();
    var tmplMarkup = $('#templateScheda').html();
    data = scheda.data[0] ;
    _.extend(data, templateHelpers);
    
    _.each(scheda.fogli, function(foglio){
    //    console.log(foglio.cartella);
        foglio.cartella = addZeros(foglio.cartella);
        foglio.foglio = addZeros(foglio.foglio);
   //     console.log(foglio.cartella);
    
});
 //   console.log(scheda.fogli);
    var compiledTmpl = _.template(tmplMarkup, {
        data: data,
        fogli: scheda.fogli,
        images: scheda.fogli.images
    });
    
    $("#scheda").html(compiledTmpl);
}

function addZeros(str){
   if (str.length == 1) {
      str = '00' +str ;
   }
   if (str.length == 2) {
      str = '0' +str ;
   }
   return str;
   
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

function immv(file,dir)
{
	url= IIP_URL + "/iip_viewer/iiifimage.php?dir=/AS_Roma/Imago/&file="+dir + '/' +file ;
	window.open(url,'disegniepiante', "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}

