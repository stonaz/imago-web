 <html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma </title>
<meta name="keywords" content="Archivio di Stato de L'Aquila, Aquila, Catasti,Catasti antichi" />
<meta name="description" content="Archivio di Stato de L'Aquila, Aquila, Catasti,Catasti antichi" />
 <meta charset="utf-8" />
  <meta name="DC.creator" content="Ruven Pillay &lt;ruven@users.sourceforge.netm&gt;"/>
  <meta name="DC.title" content="IIPMooViewer 2.0: HTML5 High Resolution Image Viewer"/>
  <meta name="DC.subject" content="IIPMooViewer; IIPImage; Visualization; HTML5; Ajax; High Resolution; Internet Imaging Protocol; IIP"/>
  <meta name="DC.description" content="IIPMooViewer is an advanced javascript HTML5 image viewer for streaming high resolution scientific images"/>
  <meta name="DC.rights" content="Copyright &copy; 2003-2016 Ruven Pillay"/>
  <meta name="DC.source" content="http://iipimage.sourceforge.net"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" media="all" href="iipmooviewer/css/iip.min.css" />
<!--[if lt IE 10]>
  <meta http-equiv="X-UA-Compatible" content="IE=9" >
  <link rel="stylesheet" type="text/css" media="all" href="iipmooviewer/css/ie.min.css" />
<![endif]-->

  <!-- Basic example style for a 100% view -->
  <style>
    
    div#viewer{
      height: 100%;
      min-height: 100%;
      width: 100%;
      position: relative;
      top: 0;
      left: 0;
      margin: 0;
      padding: 0;
    }	
  </style>


  <link rel="shortcut icon" href="iipmooviewer/images/iip-favicon.png" />
  <link rel="apple-touch-icon" href="iipmooviewer/images/iip.png" />

  <title>IIPMooViewer 2.0 :: HTML5 High Resolution Image Viewer</title>

  <script src="iipmooviewer/js/mootools-core-1.6.0-compressed.js"></script>
  <script src="iipmooviewer/js/iipmooviewer-2.0-min.js"></script>

<!--[if lt IE 7]>
  <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js">IE7_PNG_SUFFIX = ".png";</script>
<![endif]-->

  <script>

    // IIPMooViewer options: See documentation at http://iipimage.sourceforge.net for more details
    // Server path: set if not using default path
    var server = 'http://{$server}/iipsrv/iipsrv.fcgi/';

    // The *full* image path on the server. This path does *not* need to be in the web
    // server root directory. On Windows, use Unix style forward slash paths without
    // the "c:" prefix
    var image = '{$iip_dir}/{$file}';
				

    // Copyright or information message
  //  var credit = '&copy; copyright or information message';

    // Create our iipmooviewer object
    new IIPMooViewer( "viewer", {
	server: server,
	image: image,
	viewport : { resolution:2, x:0.9, y:0.9, rotation:0 }
//	credit: credit
    });

  </script>

 </head>
<link href="css/style_icrcpal2.css" rel="stylesheet" type="text/css" />
 <link href="css/fascicolo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	
 <div id="wrapper">
  <div id="leftcolumn">
  <strong>Bobina_Scatto</strong> 
  {foreach $pergamene_rs as $p}
<a href="http://{$server}/discriminazioni/sfoglia_fascicolo.php?basedir={$basedir}&busta={$busta}&file={$p}">
 {if ($p != $file) }
<span class="intestazione">{$p|substr:0:7}</span>

{else}

<span class="intestazione_red">{$p|substr:0:7}</span>
{/if}
 <br>
<!-- <IMG BORDER="0" SRC="http://{$server}/iiifserver/?FIF={$iip_dir}/{$p}&&SDS=0,90&CNT=1.0&WID=128&QLT=100&CVT=jpeg">
--></a>
  {/foreach}
  </div>
  <div id="rightcolumn">
    <div class="intestazione">
			{if !empty($prec) }
			<a href="http://{$server}/discriminazioni/sfoglia_fascicolo.php?basedir={$basedir}&busta={$busta}&file={$prec}">
				<img src="images/navigate_left.gif">
			</a>
			{/if}
		<strong>	{$file|substr:0:7}</strong>
				{if !empty($succ) }
						<a href="http://{$server}/discriminazioni/sfoglia_fascicolo.php?basedir={$basedir}&busta={$busta}&file={$succ}">
								<img src="images/navigate_right.gif">
						</a>
		{/if}
		</div>
    <div id="viewer"></div>
  </div>
</div>
 

 
 
</body>
</html>