<footer id="footer"><div class="row">
	<div class="col-md-12 blanco"><div class="container">
		<div class="col-sm-7">
			<table>
				<tr>
					<td><img src="<?php bloginfo('template_url'); ?>/img/logo-plaza.svg" class="publica"></td>
					<td width="65%" align="right"><p>Ingresa tu correo electrónico para recibir información, datos y análisis que ofrece Plaza Pública Cadem.</p></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-5">
			<table>
				<tr>
					<td><?php 
			/*if (function_exists('ninja_forms_display_form')):
				ninja_forms_display_form(1);				
			*/
			Ninja_Forms()->display( 1 );
			?></td>
				</tr>
			</table>
		</div>
	</div></div>
	<div class="col-md-12 gris-oscuro suscribir"><div class="container">
		<div class="col-sm-8">
		
			<div class="col-xs-12">
				<h3 class="title light">Hola, necesitas hablar con nosotros?</h3>
			</div>
			<div class="col-xs-6 col-sm-3">
				<a href="mailto:<?php the_field('email','option') ?>"><strong>Email</strong><?php the_field('email','option') ?></a>
			</div>
			<div class="col-xs-6 col-sm-3">
			<a href="tel:+56<?php the_field('telefono','option') ?>"><strong>Teléfono</strong>+56 <?php $fono=get_field('telefono','option');
					$fono=strrev($fono);
					$fono=rev_str_split($fono,4);
					$fono=implode(' ',$fono);
					$fono=strrev($fono);
						   echo $fono;
						?></a>
			</div>
			<div class="col-xs-6 col-sm-3">
			<address><strong>Dirección</strong>
						<a href="#"><?php the_field('direccion','option') ?></a>
						<a href="#" data-toggle="modal" data-target="#map-modal" class="btn">VER MAPA</a>
					</address>
			</div>
			<div class="col-xs-6 col-sm-3">
			<strong>Redes Sociales</strong>
					<ul class="social">
					<?php $menusocial=get_field('social_menu','option'); ?>
					<?php wp_nav_menu( array('menu' => $menusocial, 'container' => '', 'menu_class' => '', 'items_wrap' => '%3$s' )); ?>
					</ul>
			</div>
		</div>
		<div class="col-sm-4">
			<table>
				<tr>
					<td>&nbsp;</td>
					<td align="right" width="50%"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class="logo svg"></td>
				</tr>				
			</table>
		</div>	
	</div></div>
</footer></div>
<!-- Map -->
<div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal">
<div class="modal-dialog">
    <div class="modal-content">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div style="overflow:hidden;height:500px;width:100%;">
        <div id="gmap_canvas" style="height:500px;width:100%;"></div>
        <style>#gmap_canvas img{max-width:none!important;background:none!important;}</style>
    </div>
	</div>
</div>
</div>
<?php $location = get_field('mapa','option'); ?>
<script type="text/javascript"> 
var map;
var centerMap;
function initMap(){
	centerMap = new google.maps.LatLng(<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>);
	var myOptions = {
		zoom:17,
		center: centerMap,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
	marker = new google.maps.Marker({
		map: map,
		position: centerMap
	});
	infowindow = new google.maps.InfoWindow({
		content:"<?php echo $location['address']; ?>"
	});
	google.maps.event.addListener(marker, "click", function(){
		infowindow.open(map,marker);
	});
	$('#map-modal').on('shown.bs.modal', function () {
		google.maps.event.trigger(map, 'resize');
		map.setCenter(centerMap);
	});
}
//--
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTCeaR3cRNl1c4-YbDODXTqGwol-0lxH8&callback=initMap" async defer></script>
<?php wp_footer(); ?>  
</body>
</html>