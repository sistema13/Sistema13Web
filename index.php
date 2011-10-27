<!DOCTYPE html>
<?php
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
                    enableTopPager:            true,
                    enableBottomPager:         true,
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
            });
	</script>
    </head>
    <body>
        <div class="container container_6">
            <div class='grid_2'>
            <p>LOGOTIPO</p>
            </div><div class='grid_4'>
            <p>Frase</p>
            </div><div class='clear'>&nbsp;</div>
            <div class="grid_6">
                <div id="accordion">
                    <h3><a href="#">Home</a></h3>
                    <div>
                        <p>Somos un sólido equipo de especialistas en plataforma Web y artes gráficas, 
                           lo que nos permite ofrecerle una gran variedad de servicios profesionales.</p>
                        <p>Nuestra idea es integrar las artes gráficas con el desarrollo profesional 
                           para crear soluciones confiables y atractivas para el usuario.</p>
                        <p>Tenemos en mente otorgar una respuesta a las empresas que buscan no solo quien 
                           les desarrolle un sistema, si no quien entienda las necesidades y proponga 
                           soluciones confiables y duraderas, ya que la mayoría de las empresas del mismo 
                           sector ofrecen servicios caros y deficientes; nuestra propuesta, por el contrario, 
                           se basa en ofrecer soluciones innovadoras y de alta calidad a precios sumamente competitivos.</p>
                        <p>Contamos con más de <?php echo (ANIO - 2001); ?> años de experiencia en el mercado informático ampliando nuestros conocimientos 
                            a la par de las nuevas tecnologías.</p>
                        <p>Nos hemos comprometido con la innovación contínua en nuestros productos y en 
                            mantener una relación directa con los clientes, para así conformarnos como líderes 
                            del desarrollo Web y las artes gráficas.</p>
                    </div>
                    <h3><a href="#">Hospital Infantil de México Federico Gómez</a></h3>
                    <div>
                        <p>
                            Sistema de Registro Electrónico de Protocolos de Investigación
                        </p>
                    </div>
                    <h3><a href="#">Hospital Infantil de México Federico Gómez</a></h3>
                    <div>
                        <p>
                            Base de datos de Cuestionarios
                        </p>
                    </div>
                    <h3><a href="#">19th WONCA World Conference of Family Doctors</a></h3>
                    <div>
                        <div id="description" class="description">
                        Somos un sólido equipo de especialistas en plataforma Web y artes gráficas, 
                           lo que nos permite ofrecerle una gran variedad de servicios profesionales.
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
							<a class="thumb" name="leaf" href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015.jpg" title="Title #0">
								<img src="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_s.jpg" alt="Title #0" />
							</a>
							<div class="caption">
								<div class="image-title">Title #0</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" name="drop" href="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9.jpg" title="Title #1">
								<img src="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9_s.jpg" alt="Title #1" />
							</a>
							<div class="caption">
								Any html can be placed here ...
							</div>
						</li>

						<li>
							<a class="thumb" name="bigleaf" href="http://farm3.static.flickr.com/2093/2538168854_f75e408156.jpg" title="Title #2">
								<img src="http://farm3.static.flickr.com/2093/2538168854_f75e408156_s.jpg" alt="Title #2" />
							</a>
							<div class="caption">
								<div class="image-title">Title #2</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

					</ul>
				</div>
				<div style="clear: both;"></div>
                        
                    </div>
                    
                    <h3><a href="#">Coordinación de Investigación en Salud</a></h3>
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
                <p>&copy; México, D.F., <?php echo ANIO; ?></p>
            </div>
            <div class='clear'>&nbsp;</div>
    </body>
</html>