<!DOCTYPE html>
<?php
// @TODO: completar los demas trabajos
// @TODO: cargar logotipo de sistemas
// @TODO: mayor seguridad en archivo de configuracion de base de datos
// @TODO: agregar contenido por medio de la base de datos
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
        
        <link rel="stylesheet" href="css/basic.css" type="text/css" />
        <link rel="stylesheet" href="css/redmond/jquery-ui-1.8.16.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/960.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
        <!-- We only want the thumbnails to display when javascript is disabled -->
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
<?php
    $sufijos = array( 'wonca', 'cis', 'bgirl', 'itj');  // 'himfgsapi', 'himfgliso', --  'ibs',
    foreach($sufijos as $key=>$value){
?>
        
                // <?php echo $key . " " . $value; ?>
                
                var gallery = $('#thumbs_<?php echo $value; ?>').galleriffic({
                    delay:                     2500,
                    numThumbs:                 3,
                    preloadAhead:              10,
                    enableTopPager:            false,
                    enableBottomPager:         false,
                    enableKeyboardNavigation:  false,
                    maxPagesToShow:            7,
                    imageContainerSel:         '#slideshow_<?php echo $value; ?>',
                    controlsContainerSel:      '#controls_<?php echo $value; ?>',
                    captionContainerSel:       '#caption_<?php echo $value; ?>',
                    loadingContainerSel:       '#loading_<?php echo $value; ?>',
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
<?php
    }
?>
                
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
                        <p>Tenemos en mente otorgar una respuesta a las empresas que buscan no solo a alguien que 
                           les desarrolle un sistema, si no quien entienda las necesidades y proponga 
                           soluciones confiables y duraderas, ya que la mayor&iacute;a de las empresas del mismo 
                           sector ofrecen servicios caros y deficientes; nuestra propuesta, por el contrario, 
                           se basa en ofrecer soluciones innovadoras y de alta calidad a precios sumamente competitivos.</p>
                        <p>Contamos con m&aacute;s de <?php echo (ANIO - 2001); ?> a&ntilde;os de experiencia en el mercado inform&aacute;tico ampliando nuestros conocimientos a la par de las nuevas tecnolog&iacute;as.</p>
                        <p>Nos hemos comprometido con la innovaci&oacute;n cont&iacute;nua en nuestros productos y en 
                            mantener una relaci&oacute;n directa con los clientes, para as&iacute; conformarnos como l&iacute;deres 
                            del desarrollo Web y las artes gr&aacute;ficas.</p>
                        <p>Algunos de nuestros trabajos m&aacute;s destacados son los siguientes:</p>
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
                        <div id="description_wonca" class="description">
                            Dise&ntilde;o y administraci&oacute;n de la p&aacute;gina web. Desarrollo de sistema de env&iacute;o de res&uacute;menes a presentar durante el evento, con un proceso de evaluaci&oacute;n. Desarrollo del sistema de reservaciones de hospedaje. Todo el sistema y la p&aacute;gina web en idiomas ingl&eacute;s y espa&ntilde;ol.<br><br>
                            <a href="http://www.wonca2010cancun.com" target="_blank">www.Wonca2010Cancun.com</a>
                        </div>
                                <div id="gallery_wonca" class="content">
					<div id="controls_wonca" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading_wonca" class="loader"></div>
						<div id="slideshow_wonca" class="slideshow"></div>
					</div>
					<div id="caption_wonca" class="caption-container"></div>
				</div>
				<div id="thumbs_wonca" class="navigation">
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
                            Dise&ntilde;o y administraci&oacute;n de la p&aacute;gina web de la Coordinaci&oacute;n de Investigaci&oacute;n en Salud del Instituto Mexicano del Seguro Social con plantillas adaptadas para Joomla de las oficiales del Sistema Internet de Presidencia. Desarrollo de sistema de Procesos Digitalizados de la propia Coordinaci&oacute;n. Administraci&oacute; y mantenimiento de servidores en linux.<br><br>
                            <a href="http://www.cis.gob.mx" target="_blank">www.CIS.gob.mx</a>
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
                        <div id="description_bgirl" class="description">
                            Desarrollo de un sistema de administraci&oacute;n de contenido de la p&aacute;gina web. Todo el sistema y la p&aacute;gina web en idiomas portugu&eacute;s y espa&ntilde;ol.<br><br>
                            <a href="http://www.beinggirl.net" target="_blank">www.BeingGirl.net</a>
                        </div>
                                <div id="gallery_bgirl" class="content">
					<div id="controls_bgirl" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading_bgirl" class="loader"></div>
						<div id="slideshow_bgirl" class="slideshow"></div>
					</div>
					<div id="caption_bgirl" class="caption-container"></div>
				</div>
				<div id="thumbs_bgirl" class="navigation">
					<ul class="thumbs noscript">
						<li>
							<a class="thumb" name="webpage_es" href="images/bgirl1.jpg" title="Spanish Web Page">
								<img src="images/bgirl1t.jpg" alt="Spanish Web Page" />
							</a>
							<div class="caption">
                                                            Dise&ntilde;o de la p&aacute;gina web en idioma Espa&ntilde;ol.
							</div>
						</li>

						<li>
							<a class="thumb" name="webpage_en" href="images/bgirl2.jpg" title="English Web Page">
								<img src="images/bgirl2t.jpg" alt="English Web Page" />
							</a>
							<div class="caption">
                                                            Dise&ntilde;o de la p&aacute;gina web en idioma Ingl&eacute;s.
							</div>
						</li>

						<li>
							<a class="thumb" name="admin" href="images/bgirl3.jpg" title="User Administrator">
								<img src="images/bgirl3t.jpg" alt="User Administrator" />
							</a>
							<div class="caption">
								Administrador de usuarios registrados y de trabajos enviados a evaluaci&oacute;n.
							</div>
						</li>

					</ul>
				</div>
				<div style="clear: both;"></div>
                        
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
                        <div id="description_itj" class="description">
                            Dise&ntilde;o y administraci&oacute;n de la p&aacute;gina web. Desarrollo de un sistema de administraci&oacute;n de alumnos. Administraci&oacute;n del servidor de correo local. Toda la p&aacute;gina web en idiomas ingl&eacute;s y espa&ntilde;ol.<br><br>
                            <a href="http://www.itj.edu.mx" target="_blank">www.ITJ.edu.mx</a>
                        </div>
                                <div id="gallery_itj" class="content">
					<div id="controls_itj" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading_itj" class="loader"></div>
						<div id="slideshow_itj" class="slideshow"></div>
					</div>
					<div id="caption_itj" class="caption-container"></div>
				</div>
				<div id="thumbs_itj" class="navigation">
					<ul class="thumbs noscript">
						<li>
							<a class="thumb" name="webpage_es" href="images/itj1.jpg" title="Spanish Web Page">
								<img src="images/itj1t.jpg" alt="Spanish Web Page" />
							</a>
							<div class="caption">
                                                            Dise&ntilde;o de la p&aacute;gina web en idioma Espa&ntilde;ol.
							</div>
						</li>

						<li>
							<a class="thumb" name="webpage_en" href="images/itj2.jpg" title="English Web Page">
								<img src="images/itj2t.jpg" alt="English Web Page" />
							</a>
							<div class="caption">
								Dise&ntilde;o de la p&aacute;gina web en idioma Ingl&eacute;s.
							</div>
						</li>

						<li>
							<a class="thumb" name="admin" href="images/itj3.jpg" title="User Administrator">
								<img src="images/itj3t.jpg" alt="User Administrator" />
							</a>
							<div class="caption">
								Administrador de usuarios registrados y de trabajos enviados a evaluaci&oacute;n.
							</div>
						</li>

					</ul>
				</div>
				<div style="clear: both;"></div>
                        
                    </div>
                    <h3><a href="#">Contacto</a></h3>
                    <div>
                        <p>Ingrese sus datos y alg&uacute;n mensaje y nosotros nos pondremos en contacto a la brevedad posible.<br />Si lo prefiere env&iacute;enos un correo a: <a href="mailto:sistema13@sistema13.com">Sistema13@Sistema13.com</a>, para esto le pedimos descargue nuestra "Hoja de trabajo" (<a href="downloads/hoja_de_trabajo_del_cliente.odt" target="_blank">en formato word</a> o <a href="downloads/hoja_de_trabajo_del_cliente.pdf" target="_blank">en pdf</a>) que nos servir&aacute; como gu&iacute;a para identificar las necesidades espec&iacute;ficas de su proyecto (no es necesario que ingrese toda la informaci&oacute;n que viene en ella, pero le agradecer&iacute;amos que est&eacute; lo m&aacute;s completo posible).</p>
                        <form>
                            <div id="result" style="display:none;"></div>
                            <div id="contacto">
                                <p>Nombre: <br />
                                    <input type="text" name="contacto_nombre" id="contacto_nombre" style="width:100%;" /><br />
                                   E-mail: <br />
                                    <input type="text" name="contacto_email" id="contacto_email" style="width:100%;" /><br />
                                   Mensaje: <br />
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