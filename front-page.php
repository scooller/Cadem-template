<?php get_header(); ?>
<div id="carousel-home" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">      
      
		<div class="row">
		<div class="col-sm-4">
			<div class="box verde bg fix" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home-fotos_03.png)">
				<h1 class="big sub-title v-align"><strong>42 años</strong> en el mercado<br>
				120 profesionales<br>
				Panel de <strong>4000</strong> participantes</h1>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="box-mini azul bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_04.png);"><h4 class="v-align title">NUEVA ENCUESTA PLAZA PÚBLICA</h4></div>
			<div class="box-mini fucia">
				<h4>Las preferencias laborales de los millennials.</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="box-mini verde bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_05.png)"><h4 class="v-align title">MUJERES EN LAS EMPRESAS</h4></div>
			<div class="box-mini azul bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_07.png);"><h4 class="v-align title">MARCAS CIUDADANAS</h4></div>
		</div>
		</div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section class="row mini">
	<div class="col-md-3 azul">
		<h2 class="v-align title light">Nuestros Productos</h2>
	</div>
	<div class="col-md-3 gris">
		<h2 class="v-align title">Lorem ipsum</h2>
	</div>
	<div class="col-md-3 azul">
		<h4 class="v-align title">
			CONSUMIDORES Y SEGMENTACIÓN<br>
			SHOPPER<br>
			CALIDAD DE SERVICIO
		</h4>
	</div>
	<div class="col-md-3 gris">
		<h2 class="v-align title">Lorem ipsum</h2>
	</div>
</section>
<!-- // section -->
<section class="row verde big" id="plaza"><div class="container">
<div class="row">
	<div class="col-md-6">
		<h1 class="title txtlft v-align"><b>Plaza Pública</b><small>El radar político de Chile</small></h1>
	</div>
	<div class="col-md-6">
		<div class="v-align txt">Lorem ipsum dolor sit ipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen</div>
	</div>
	<a href="#" class="btn ir">Ir</a>
</div>	
</div></section>
<!-- // section -->
<section class="row azul big" id="cademonline"><div class="container">
<div class="row">
	<div class="col-md-6">
		<h1 class="title txtlft v-align"><b>Cademonline</b><small>El radar político de Chile</small></h1>
	</div>
	<div class="col-md-6">
		<div class="v-align txt">Lorem ipsum dolor sit ipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen</div>
	</div>
	<a href="#" class="btn ir">Ir</a>
</div>
</div></section>
<!-- // section -->
<section class="mapa row">
	<div class="col-md-12 blanco">
		<div class="container">
			<div class="col-sm-6">
				<div class="col-flex"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem-plaza-publica.png" class="logo"></div>
				<div class="col-flex">
					<p>Ingresa tu correo electrónico para recibir información, datos y análisis que ofrece Plaza Pública Cadem.</p>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-flex">
				<?php 
				if (function_exists('ninja_forms_display_form')):
					ninja_forms_display_form(1);
				endif;
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 gris-oscuro suscribir">
		<div class="container">
			<div class="col-sm-6">
				<h3 class="title light">Hola, necesitas hablar con nosotros?</h3>
			
				<div class="col-flex"><a href="mailto:cadem@cadem.cl"><strong>Email</strong>cadem@cadem.cl</a></div>
				<div class="col-flex"><a href="tel:+56224386500"><strong>Teléfono</strong>+56 2 24386500</a></div>
				<div class="col-flex"><a href="#"><strong>Dirección</strong>
					Nueva de Lyon 145<br>
					Piso 2, Providencia<br>
					Santiago, Chile.
				</a></div>
				<div class="col-flex">
					<strong>Redes Sociales</strong>
					<a href="#" target="_blank"><i class="icon-facebook"></i>Twitter</a>
					<a href="#" target="_blank"><i class="icon-twitter-bird"></i>Facebook</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-flex"><a href="#" class="btn">VER MAPA</a></div>
				<div class="col-flex"><a href="#" class="btn">TRABAJA CON NOSOTROS</a></div>
				<div class="col-flex"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class="logo svg"></div>
			</div>
		</div>		
	</div>
</section>
<?php get_footer(); ?> 