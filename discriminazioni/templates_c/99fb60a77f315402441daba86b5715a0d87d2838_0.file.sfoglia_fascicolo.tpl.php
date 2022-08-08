<?php
/* Smarty version 3.1.46, created on 2022-08-08 18:34:31
  from '/var/www/html/discriminazioni/templates/sfoglia_fascicolo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_62f13b17de1d70_90422054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99fb60a77f315402441daba86b5715a0d87d2838' => 
    array (
      0 => '/var/www/html/discriminazioni/templates/sfoglia_fascicolo.tpl',
      1 => 1659976379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62f13b17de1d70_90422054 (Smarty_Internal_Template $_smarty_tpl) {
?> <html>
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

  <?php echo '<script'; ?>
 src="iipmooviewer/js/mootools-core-1.6.0-compressed.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="iipmooviewer/js/iipmooviewer-2.0-min.js"><?php echo '</script'; ?>
>

<!--[if lt IE 7]>
  <?php echo '<script'; ?>
 src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js">IE7_PNG_SUFFIX = ".png";<?php echo '</script'; ?>
>
<![endif]-->

  <?php echo '<script'; ?>
>

    // IIPMooViewer options: See documentation at http://iipimage.sourceforge.net for more details
    // Server path: set if not using default path
    var server = 'http://<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
/iipsrv/iipsrv.fcgi/';

    // The *full* image path on the server. This path does *not* need to be in the web
    // server root directory. On Windows, use Unix style forward slash paths without
    // the "c:" prefix
    var image = '<?php echo $_smarty_tpl->tpl_vars['iip_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
';
				

    // Copyright or information message
  //  var credit = '&copy; copyright or information message';

    // Create our iipmooviewer object
    new IIPMooViewer( "viewer", {
	server: server,
	image: image,
	viewport : { resolution:2, x:0.9, y:0.9, rotation:0 }
//	credit: credit
    });

  <?php echo '</script'; ?>
>

 </head>
<link href="css/style_icrcpal2.css" rel="stylesheet" type="text/css" />
 <link href="css/fascicolo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	
 <div id="wrapper">
  <div id="leftcolumn">
  <strong>Bobina_Scatto</strong> 
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pergamene_rs']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<a href="http://<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
/discriminazioni/sfoglia_fascicolo.php?basedir=<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
&busta=<?php echo $_smarty_tpl->tpl_vars['busta']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">
 <?php if (($_smarty_tpl->tpl_vars['p']->value != $_smarty_tpl->tpl_vars['file']->value)) {?>
<span class="intestazione"><?php echo substr($_smarty_tpl->tpl_vars['p']->value,0,7);?>
</span>

<?php } else { ?>

<span class="intestazione_red"><?php echo substr($_smarty_tpl->tpl_vars['p']->value,0,7);?>
</span>
<?php }?>
 <br>
<!-- <IMG BORDER="0" SRC="http://<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
/iiifserver/?FIF=<?php echo $_smarty_tpl->tpl_vars['iip_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
&&SDS=0,90&CNT=1.0&WID=128&QLT=100&CVT=jpeg">
--></a>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
  <div id="rightcolumn">
    <div class="intestazione">
			<?php if (!empty($_smarty_tpl->tpl_vars['prec']->value)) {?>
			<a href="http://<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
/discriminazioni/sfoglia_fascicolo.php?basedir=<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
&busta=<?php echo $_smarty_tpl->tpl_vars['busta']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['prec']->value;?>
">
				<img src="images/navigate_left.gif">
			</a>
			<?php }?>
		<strong>	<?php echo substr($_smarty_tpl->tpl_vars['file']->value,0,7);?>
</strong>
				<?php if (!empty($_smarty_tpl->tpl_vars['succ']->value)) {?>
						<a href="http://<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
/discriminazioni/sfoglia_fascicolo.php?basedir=<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
&busta=<?php echo $_smarty_tpl->tpl_vars['busta']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['succ']->value;?>
">
								<img src="images/navigate_right.gif">
						</a>
		<?php }?>
		</div>
    <div id="viewer"></div>
  </div>
</div>
 

 
 
</body>
</html><?php }
}
