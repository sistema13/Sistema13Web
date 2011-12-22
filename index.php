<!DOCTYPE html>
<?php
// @TODO: completar los demas trabajos
// @TODO: cargar logotipo de sistemas
// @TODO: mayor seguridad en archivo de configuracion de base de datos
define("ANIO", date("Y"));

?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Alejandro Diep M - sistema13@sitema13.com" />
        <meta name="copyright" content="Licensed under CC." />
        <meta name="description" content="sistema13.com Web Development Company." />
        <meta name="keywords" content="jquery,user interface,ui,widgets,interaction,javascript" />
        
        <title>P&aacute;gina web de Sistema13.com</title>
        
        <link rel="stylesheet" href="css/redmond/jquery-ui-1.8.16.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/960.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/basic.css" type="text/css" />
        <link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
        <!-- We only want the thunbnails to display when javascript is disabled -->
        <script type="text/javascript">
            document.write('<style>.noscript { display: none; }</style>');
        </script>
                        
        <style>
	.ui-progressbar-value { background-image: url(css/redmond/images/pbar-ani.gif); }
	</style>
        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
        <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
                $( "#progressbar" ).progressbar({
                    value: 10
                });
            });
            function doContact() {
                $('#contacto').slideUp("fast");
                $("#result").slideUp("fast");
                $('#loading-bar').slideDown("fast");
                
                $( "#progressbar" ).progressbar({
                    value: 40
                });

                query = "nombre="+$("#contacto_nombre").val()+"&email="+$("#contacto_email").val()+"&mensaje="+$("#contacto_mensaje").val();

                $( "#progressbar" ).progressbar({
                    value: 80
                });
                
                $.post("contacto.php", query, function(data){
                    $("#contacto_nombre").val("");
                    $("#contacto_email").val("");
                    $("#contacto_mensaje").val("");
                    $("#result").html("<p>"+data+"</p><p>&nbsp;</p>");
                    $('#loading-bar').slideUp("fast");
                    $("#result").slideDown("fast");
                    $("#contacto").slideDown("fast");
                });
            }
            
            jQuery(document).ready(function($) {
                // We only want these styles applied when javascript is enabled
                $('div.navigation').css({'width' : '100px', 'float' : 'left'});
                $('div.content').css('display', 'block');

                // Initially set opacity on thumbs and add
                // additional styling for hover effect on thumbs
                var onMouseOutOpacity = 0.67;
                $('#thumbs ul.thumbs li').opacityrollover({
                    mouseOutOpacity:   onMouseOutOpacity,
                    mouseOverOpacity:  1.0,
                    fadeSpeed:         'fast',
                    exemptionSelector: '.selected'
                });

                // Initialize Advanced Galleriffic Gallery
                var gallery = $('#thumbs').galleriffic({
                    delay:                     2500,
                    numThumbs:                 3,
                    preloadAhead:              10,
                    enableTopPager:            false,
                    enableBottomPager:         false,
                    enableKeyboardNavigation:  false,
                    maxPagesToShow:            7,
                    imageContainerSel:         '#slideshow',
                    controlsContainerSel:      '#controls',
                    captionContainerSel:       '#caption',
                    loadingContainerSel:       '#loading',
                    renderSSControls:          false,
                    renderNavControls:         false,
                    playLinkText:              'Play Slideshow',
                    pauseLinkText:             'Pause Slideshow',
                    prevLinkText:              '&lsaquo; Previous Photo',
                    nextLinkText:              'Next Photo &rsaquo;',
                    nextPageLinkText:          'Next &rsaquo;',
                    prevPageLinkText:          '&lsaquo; Prev',
                    enableHistory:             false,
                    autoStart:                 false,
                    syncTransitions:           true,
                    defaultTransitionDuration: 900,
                    onSlideChange:             function(prevIndex, nextIndex) {
                        // 'this' refers to the gallery, which is an extension of $('#thumbs')
                        this.find('ul.thumbs').children()
                        .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                        .eq(nextIndex).fadeTo('fast', 1.0);
                    },
                    onPageTransitionOut:       function(callback) {
                        this.fadeTo('fast', 0.0, callback);
                    },
                    onPageTransitionIn:        function() {
                        this.fadeTo('fast', 1.0);
                    }
                });
                
                var gallery = $('#thumbs_cis').galleriffic({
                    delay:                     2500,
                    numThumbs:                 3,
                    preloadAhead:              10,
                    enableTopPager:            false,
                    enableBottomPager:         false,
                    enableKeyboardNavigation:  false,
                    maxPagesToShow:            7,
                    imageContainerSel:         '#slideshow_cis',
                    controlsContainerSel:      '#controls_cis',
                    captionContainerSel:       '#caption_cis',
                    loadingContainerSel:       '#loading_cis',
                    renderSSControls:          false,
                    renderNavControls:         false,
                    playLinkText:              'Play Slideshow',
                    pauseLinkText:             'Pause Slideshow',
                    prevLinkText:              '&lsaquo; Previous Photo',
                    nextLinkText:              'Next Photo &rsaquo;',
                    nextPageLinkText:          'Next &rsaquo;',
                    prevPageLinkText:          '&lsaquo; Prev',
                    enableHistory:             false,
                    autoStart:                 false,
                    syncTransitions:           true,
                    defaultTransitionDuration: 900,
                    onSlideChange:             function(prevIndex, nextIndex) {
                        // 'this' refers to the gallery, which is an extension of $('#thumbs')
                        this.find('ul.thumbs').children()
                        .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                        .eq(nextIndex).fadeTo('fast', 1.0);
                    },
                    onPageTransitionOut:       function(callback) {
                        this.fadeTo('fast', 0.0, callback);
                    },
                    onPageTransitionIn:        function() {
                        this.fadeTo('fast', 1.0);
                    }
                });
                
            });
	</script>
    </head>
    <body>
        <div class="container container_6">
            <div class='grid_2'>
            <p>LOGOTIPO</p>
            </div><div class='grid_4'><p class="frase"><?php 
    include_once("configuracion.php");
    $link = mysql_connect($srvr,$usr,$pass) OR die("No se pudo realizar la conexion");
    mysql_select_db($dbase, $link);
    
    $sql = "SELECT COUNT(*) AS cuenta FROM frases";
    $result = mysql_query($sql);
    $cuenta = mysql_fetch_assoc($result);
    $total = $cuenta['cuenta'];
    
    $idfrase = rand(1,$total);
    
    $sql = "SELECT frase FROM frases WHERE idfrases=" . $idfrase;
    $result = mysql_query($sql);
    $fila = mysql_fetch_assoc($result);
    echo $fila['frase'];
    mysql_close($link);
    ?></p>
            </div><div class='clear'>&nbsp;</div>
            <div class="grid_6">
                <div id="accordion">
                    <h3><a href="#">Home</a></h3>
                    <div>
                        <p>Somos un s&oacute;lido equipo de especialistas en plataforma Web y artes gr&aacute;ficas, 
                           lo que nos permite ofrecerle una gran variedad de servicios profesionales.</p>
                        <p>Nuestra idea es integrar las artes gr&aacute;ficas con el desarrollo profesional 
                           para crear soluciones confiables y atractivas para el usuario.</p>
                        <p>Tenemos en mente otorgar una respuesta a las empresas que buscan no solo quien 
                           les desarrolle un sistema, si no quien entienda las necesidades y proponga 
                           soluciones confiables y duraderas, ya que la mayor&iacute;a de las empresas del mismo 
                           sector ofrecen servicios caros y deficientes; nuestra propuesta, por el contrario, 
                           se basa en ofrecer soluciones innovadoras y de alta calidad a precios sumamente competitivos.</p>
                        <p>Contamos con m&aacute;s de <?php echo (ANIO - 2001); ?> a&ntilde;os de experiencia en el mercado inform&aacute;tico ampliando nuestros conocimientos a la par de las nuevas tecnolog&iacute;as.</p>
                        <p>Nos hemos comprometido con la innovaci&oacute;n cont&iacute;nua en nuestros productos y en 
                            mantener una relaci&oacute;n directa con los clientes, para as&iacute; conformarnos como l&iacute;deres 
                            del desarrollo Web y las artes gr&aacute;ficas.</p>
                    </div>
                    <h3><a href="#">Hospital Infantil de M&eacute;xico Federico G&oacute;mez</a></h3>
                    <div>
                        <p>
                            Sistema de Administraci&oacute;n de Protocolos de Investigaci&oacute;n
                        </p>
                    </div>
                    <h3><a href="#">Hospital Infantil de M&eacute;xico Federico G&oacute;mez</a></h3>
                    <div>
                        <p>
                            Base de datos de Cuestionarios
                        </p>
                    </div>
                    <h3><a href="#">19th WONCA World Conference of Family Doctors</a></h3>
                    <div>
                        <div id="description" class="description">
                            Dise&ntilde;o y administraci&oacute;n de la p&aacute;gina web. Desarrollo de sistema de env&iacute;o de res&uacute;menes a presentar durante el evento, con un proceso de evaluaci&oacute;n. Desarrollo del sistema de reservaciones de hospedaje. Todo el sistema y la p&aacute;gina web en idiomas ingl&eacute;s y espa&ntilde;ol.
                        </div>
                                <div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript">
						<li>
							<a class="thumb" name="webpage_es" href="images/wonca1.jpg" title="Spanish Web Page">
								<img src="images/wonca1t.jpg" alt="Spanish Web Page" />
							</a>
							<div class="caption">
                                                            Dise&ntilde;o de la p&aacute;gina web en idioma Espa&ntilde;ol.
							</div>
						</li>

						<li>
							<a class="thumb" name="webpage_en" href="images/wonca2.jpg" title="English Web Page">
								<img src="images/wonca2t.jpg" alt="English Web Page" />
							</a>
							<div class="caption">
								Dise&ntilde;o de la p&aacute;gina web en idioma Ingl&eacute;s.
							</div>
						</li>

						<li>
							<a class="thumb" name="admin" href="images/wonca3.jpg" title="User Administrator">
								<img src="images/wonca3t.jpg" alt="User Administrator" />
							</a>
							<div class="caption">
								Administrador de usuarios registrados y de trabajos enviados a evaluaci&oacute;n.
							</div>
						</li>

					</ul>
				</div>
				<div style="clear: both;"></div>
                        
                    </div>
                    
                    <h3><a href="#">Coordinaci&oacute;n de Investigaci&oacute;n en Salud</a></h3>
                    <div>
                        <div id="description_cis" class="description">
                            Dise&ntilde;o y administraci&oacute;n de la p&aacute;gina web de la Coordinaci&oacute;n de Investigaci&oacute;n en Salud del Instituto Mexicano del Seguro Social con plantillas adaptadas para Joomla de las oficiales del Sistema Internet de Presidencia. Desarrollo de sistema de Procesos Digitalizados de la propia Coordinaci&oacute;n. Administraci&oacute; y mantenimiento de servidores en linux.
                        </div>
                                <div id="gallery_cis" class="content">
					<div id="controls_cis" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading_cis" class="loader"></div>
						<div id="slideshow_cis" class="slideshow"></div>
					</div>
					<div id="caption_cis" class="caption-container"></div>
				</div>
				<div id="thumbs_cis" class="navigation">
					<ul class="thumbs noscript">
						<li>
                                                    <a class="thumb" name="leaf" href="images/cis1.jpg" title="P&aacute;gina Principal">
                                                        <img src="images/cis1t.jpg" alt="P&aacute;gina Principal" />
							</a>
							<div class="caption">
                                                            Dise&ntilde;o de la p&aacute;gina web adaptando plantillas de Joomla CMS.
							</div>
						</li>

						<li>
							<a class="thumb" name="drop" href="images/cis2.jpg" title="Sistema de Procesos Digitalizados">
								<img src="images/cis2t.jpg" alt="Sistema de Procesos Digitalizados" />
							</a>
							<div class="caption">
								Coordinaci&oacute;n del desarrollo del sistema de procesos digitalizados.
							</div>
						</li>

						<li>
							<a class="thumb" name="bigleaf" href="images/cis3.jpg" title="Descargas de Formatos">
								<img src="images/cis3t.jpg" alt="Descargas de Formatos" />
							</a>
							<div class="caption">
								Administrador de descargas de diversos documentos.
							</div>
						</li>

					</ul>
				</div>
				<div style="clear: both;"></div>
                        
                    </div>
                    <h3><a href="#">BeingGirl</a></h3>
                    <div>
                        <p>
HIMFG (Cuestionario)
wonca
CIS
Naturella (BUS)
IBS
ITJ
                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                        </p>
                    </div>
                    <h3><a href="#">International Business Solutions</a></h3>
                    <div>
                        <p>
http://www.ibsmexico.com.mx/

                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                        </p>
                    </div>
                    <h3><a href="#">Instituto Thomas Jefferson</a></h3>
                    <div>
                        <p>
HIMFG (Cuestionario)
wonca
CIS
Naturella (BUS)
IBS
ITJ
                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                        </p>
                    </div>
                    <h3><a href="#">Contacto</a></h3>
                    <div>
                        <p>Formulario de contacto:<br /></p>
                        <form>
                            <div id="result" style="display:none;"></div>
                            <div id="contacto">
                                <p>Nombre:<br />
                                    <input type="text" name="contacto_nombre" id="contacto_nombre" style="width:100%;" /></p>
                                <p>E-mail:<br />
                                    <input type="text" name="contacto_email" id="contacto_email" style="width:100%;" /></p>
                                <p>Mensaje:<br />
                                    <textarea name="contacto_mensaje" id="contacto_mensaje" rows="5" style="width:100%;"></textarea></p>
                                <p><input type="button" name="button" id="button" value="Enviar mensaje" onclick="doContact();" /></p>
                            </div>
                            <div id="loading-bar" style="display:none;">
                                <p>Por favor espere</p>
                                <div id="progressbar"></div>
                                <p>&nbsp;</p>
                            </div>
                        </form>
                    </div>
                </div>
                <p>&copy; M&eacute;xico, D.F., <?php echo ANIO; ?></p>
            </div>
            <div class='clear'>&nbsp;</div>
    </body>
</html>