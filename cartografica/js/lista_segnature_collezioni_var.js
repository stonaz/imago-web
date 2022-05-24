
   //var segnatura = [80, 239, 1];
   
   var SERVER_URL="http://10.211.55.14/";
   var IIP_URL="http://10.211.55.14/";
   var url = SERVER_URL + "cartografica/php/segnature_main_collezioni.php" ;
    var lista_segnature_collezioni = $.ajax({
        async: false,
        url: url,
        dataType: 'json',
        success: function(response) {
            //console.log('response' + response[0].collezione);
            return response ;

        }
    }).responseJSON;
   // getScheda(segnatura);


//console.log( lista_segnature_collezioni);