<div id="carousel-home" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
   <!-- Item -->
    <div class="item active">      
		<div class="row">
		<div class="col-sm-4">
			<div class="box azul bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_03.png)">
				<h1 class="big sub-title v-align"><strong>42 años</strong> en el mercado<br>
				120 profesionales<br>
				Panel de <strong>4000</strong> participantes</h1>
			</div>
		</div>
		<div class="col-sm-4">
			<a href="#" class="box-mini azul bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_04.png);">
				<h4 class="v-align title">NUEVA ENCUESTA PLAZA PÚBLICA</h4>
				<div class="txt v-align">
					<h4>Nueva encuesta plaza publica.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</a>
			<a href="#" class="box-mini fucsia bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_13.png);     background-position: center top;">
				<h4 class="v-align title">MUJERES EN LAS EMPRESAS</h4>
				<div class="txt v-align">
					<h4>Mujeres en las empresas.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
		<?php
$query = new WP_Query(array('cat' => 'noticia', 'post_status' => 'publish', 'posts_per_page' => 1));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$subtitle = get_field('subtitulo',$ID);
	$excerpt = get_the_excerpt( $ID );
?>
			<a href="<?php the_permalink( ); ?>" class="box-mini fucsia bg" style="background-image: url(<?php echo $img[0]; ?>)">
				<h4 class="v-align title"><?php echo $subtitle; ?></h4>
				<div class="txt v-align">
					<h4><?php the_title( ) ?></h4>
					<p><?php echo $excerpt ?></p>
				</div>
			</a>
<?php 
	endwhile; endif;
	wp_reset_postdata();
?>
			<a href="#" class="box-mini fucsia bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_07.png);">
				<h4 class="v-align title">MARCAS CIUDADANAS</h4>
				<div class="txt v-align">
					<h4>Marcas Ciudadanas.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</a>
		</div>
		</div>
    </div>
    <!-- /Item -->

	  <!-- Controls -->
	  <!--<a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>-->
	</div>
</div>