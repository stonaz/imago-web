var imageProperties = []
var urlStart="http://www.imago.archiviodistatoroma.beniculturali.it/iip_viewer/iiifserver.php?dir=/AS_Roma/Imago/&file=/Ruggeri/";
var file="001.jp2";
//var urlEnd="&style=default/view.xsl&wid=600&hei=400&browser=win_ie&plugin=false";
var url= urlStart+file;
var thumbStart="http://www.imago.archiviodistatoroma.beniculturali.it/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/Ruggeri/";
var thumbEnd="&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg";
var thumb= thumbStart+file+thumbEnd;
console.log(thumb);
var title
var descr
var host="http://www.imago.archiviodistatoroma.beniculturali.it"

function createList(listaImmagini){
	var target = $("#lista");
	
	for(var i=0;i<listaImmagini.length;i++){
		
		var obj = listaImmagini[i];
		for(var categoria in obj){
			var divHtml=''
			var newdiv = document.createElement( "div" );
			newdiv.id=categoria;
			$(newdiv).html(categoria);

			//$(newdiv).html(categoria+'&nbsp;<b class="caret" ></b>');
			
			$(newdiv).addClass("categoria")
			$(target).append(newdiv);
			var specdiv = document.createElement( "div" );
			specdiv.id=categoria+'Spec';
			$(specdiv).addClass("lista")
			$(newdiv).append(specdiv);
			
			var immagini = obj[categoria];

			for(var x=0;x<immagini.length;x++){
				var id=immagini[x].Filename;
			//alert (immagini[x].Titolo);
				html=('<li id="'+id+'"  >');
				html+=(immagini[x].numAtlante);
				html+=' - '+(immagini[x].titoloAtlante);
				html+=('</li>');
				imageProperties[id]={};
				imageProperties[id]=immagini[x];
				$(specdiv).append(html);
				$('#'+id).click(function(event){
			event.stopPropagation();
			id=this.id
			showImage(id)
			}); 
				}
	/*		$(newdiv).on("click", function(){

 $(this).children().toggle() ;

});*/
$(".caret").css("margin-top", "6px")
			}                           
		
        }

}

function showImage(id){
filename=imageProperties[id].Filename;
filename+='.jp2';
$("#titolo").html(imageProperties[id].titoloAtlante);
descrHtml='<strong>Dimensioni: </strong>'+imageProperties[id].dim+'&nbsp;';
descrHtml+='<strong>Numerazione manoscritto: </strong>'+imageProperties[id].numManoscritto+'&nbsp;';

if ( imageProperties[id].trascrizione === null)
{
	descrHtml+='<strong>Trascrizione: </strong> non disponibile';
}
else
{
	var pdf= imageProperties[id].trascrizione+ '.pdf';
	var djvu= imageProperties[id].trascrizione+ '.djvu';
	var pdfLink=host + '/ruggieri/trascrizioni/PDF/' + pdf;
	//var pdfAnchor='<a href="' + pdfLink + '" target="new">PDF</a>';
	var pdfAnchor='<a href=javascript:trascrizione("' + pdfLink + '")>PDF</a>';
	var djvuLink=host + '/ruggieri/trascrizioni/DJVU/' + djvu ;
	var djvuAnchor='<a href=javascript:trascrizione("' + djvuLink + '")>DJVU</a>';
	var plugins='<a href="http://get.adobe.com/it/reader/"  target="new"> \
			    <img class="plugin" src="get_adobe_reader.png" width="90" height="24"></a>&nbsp;\
			  <a href="http://www.caminova.net/en/downloads/download.aspx?id=1" target="new">\
			    <img class="plugin" src="get_djvu_plugin.png" width="90" height="24"></a>'
	descrHtml+='<strong>Trascrizione: </strong>'+pdfAnchor+ '&nbsp;' + djvuAnchor +plugins;

}
$("#descrizione").html(descrHtml);
changeUrl(filename)
}

function changeUrl(Filename){
url= urlStart+filename;
thumb= thumbStart+filename+thumbEnd;
console.log(thumb);
$("#thumb").attr("src",'');
$('#loading').show();
$("#thumb").attr("src",thumb);
}

function newwindow2() 
            { 

     window.open('http://www.imago.archiviodistatoroma.beniculturali.it:9001/StyleServer/calcrgn?cat=Imago&img=kodak/Alessandrino.jp2&style=default/view.xsl&wid=600&hei=400&browser=win_ie&plugin=false','band','width=640,height=500,resizable=yes'); 
     } 

function newwindow(url) 
     { 
     window.open(url,'ruggieri','width=640,height=500,resizable=yes'); 
     } 
	 
function trascrizione(trascr) 
     { 
     window.open(trascr,'trascrizione','width=800,height=600,resizable=yes'); 
     } 
//Ajax check
    
  $(function() {
    $.ajaxSetup({
        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
    });
});
  
 //Get Data
function getData(url) {
var data;
    $.ajax({
        async: false, //thats the trick
        url: url,
        dataType: 'json',
        success: function(response){
        data = response;
        }
        
    });
   // alert(data);
    return data;
}

$('#thumb').load(function() {
$('#loading').hide();
});

function hideCarte() {
$('#Carte').hide();
$('#Presentazione').show();
$('#Presentazione').load('ruggieri.html');
};

function showCarte() {
$('#Presentazione').hide();
$('#Carte').show();
};


// Load #loading layers
// Assuming that the div or any other HTML element has the ID = loading and it contains the necessary loading image.

$('#menu-loading').hide(); //initially hide the loading icon
 
        $('#menu-loading').ajaxStart(function(){
            $(this).show();
            //consolenu-loadinge.log('shown');
        });
        $("#menu-loading").ajaxStop(function(){
            $(this).hide();
            //  console.log('hidden');
        }); 
