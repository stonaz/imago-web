

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

   //var SERVER_URL="http://10.211.55.14/";
   var url = "menu.php" ;
    var lista_fondi = $.ajax({
        async: false,
        url: url,
        dataType: 'json',
        success: function(response) {
            //console.log('response' + response[0].collezione);
            return response ;

        }
    }).responseJSON;

function initialize() {

    //cleanScreen();
    
   $("#LoadingLista").show();
   $("#LoadingRicerche").show();
   createListaMain(lista_fondi,0) ;
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
               createListaMain(lista_fondi,0);
    });
    getScheda('COAQ4-X.9-2-1');
    
}



function createListaMain(lista_fondi,openlista) {
   console.log('start main');
   //console.log('SERVER_URL: ' + SERVER_URL);
    var tmplMarkup = $('#templateSegnatura').html();
    var tmplMarkup2 = $('#templateHome').html();
    //cleanScreen();
    //  $("#Loading").show();
    console.log(lista_fondi);
    var arrayLength = lista_fondi.length;
  //  console.log(arrayLength);
    for (var i = 0; i < arrayLength; i++) {
        var message = "";
        var fondo = (lista_fondi[i].nome_fondo);
     //   var id_fondo = (lista_fondi[i].id_fondo);
     //   console.log('Fondi');
    //    console.log('Classe Lenght: ' + fondo.length);
    //    console.log(fondo);
        
        var serie = (lista_fondi[i].Serie);
      //  console.log('Serie');
        console.log('Serie Lenght: ' + serie.length);
  //      console.log(serie);
     //   console.log(fondi[0].nome_fondo);
        
        if (serie.length < 1)  {
            message="Serie ancora non inserite";
        //var cartelle = (fondi[i].cartelle);
        //
        //console.log('Cartelle');
        //console.log('Cartelle Lenght: ' + cartelle.length);
        //console.log(cartelle);
        //console.log(cartelle[i].schede);
        
     //   var schede = (lista_fondi[i].schede);
     
      }
       var compiledTmpl = _.template(tmplMarkup, {
         //   id_fondo: id_fondo,
            fondo: fondo,
            serie: serie,
            message: message
        
        });
      $("#listaPrincipale").append(compiledTmpl);
      var compiledTmpl2 = _.template(tmplMarkup2);
        $("#scheda").html(compiledTmpl2);
        
    }
   // $("#LoadingLista").hide();
    //    console.log('hidden loading gif');
     //   createAllSelects();
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
    $("a.opening-sub expanded").click(function() {
        //$(this).next().slideToggle('fast', function() {
        //    $(this).prev("a.opening-sub").toggleClass("active-sub");
        //    
        //});
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

    createSelectClassificazioni();
    createSelectNominativi();
    createSelectToponimi();
    
}



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







function getSegnatureDaRicerca(segnature) {
   if (segnature.length === 0) {
    $("#listaPrincipale").html('Nessun risultato trovato');
    $("#scheda").html('');
    hideLoadingRicerche()
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
   var fondo = segnatura[0];
   var serie = segnatura[1];
   var busta = segnatura[2];
   var bis = segnatura[3];
   var UA = segnatura[4];
   var sub = segnatura[5];
  // var sub = segnatura[5];

   
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
            serie:serie,
            fondo:fondo,
            busta: busta,
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
  //  data = scheda.data[0] ;
  //  console.log(scheda)
    _.extend(scheda.data, templateHelpers);
    
//    _.each(scheda.fogli, function(foglio){
//        foglio.cartella = addZeros(foglio.cartella);
//        foglio.foglio = addZeros(foglio.foglio);
//    
//});
 //   console.log(scheda.fogli);
    var compiledTmpl = _.template(tmplMarkup, {
        data: scheda.data,
        progetti: scheda.progetti,
        pratiche: scheda.pratiche
    });
    
    $("#scheda").html(compiledTmpl);
    $(".view_progetti").on("click", function() {
        
        var segnatura = $(this).attr('id');
        console.log(segnatura);
        viewProgetti(segnatura);
    });
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
	url= IIP_URL + "/iip_viewer/iipimage-new.php?dir=/AS_Roma/Imago/&file="+dir + '/' +file ;
	window.open(url,'disegniepiante', "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}

function viewProgetti(segnatura)
{
	console.log(segnatura);
    url= "php/view_progetti.php?segnatura="+segnatura ;
	window.open(url,'disegniepiante', "height=600,width=900,status=yes,toolbar=no,menubar=no,location=no");
	
}

