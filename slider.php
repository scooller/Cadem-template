<div id="carousel-home" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
   <!-- Item -->
    <div class="item active">      
		<div class="row">
		<div class="col-sm-4">
			<div class="box azul bg full anim" style="background-image: url(<?php the_field('foto_descripcion','option') ?>)">
				<h1 class="big sub-title v-align"><?php the_field('descripcion_home','option') ?></h1>
			</div>
		</div>
		<div class="col-sm-4">
			<a href="#" class="box-mini azul bg anim col-sm-12 col-xs-6" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_04.png);">
				<small>Plaza Pública Cadem</small>
				<h4 class="v-align title">Encuesta N° 176 - 29 de mayo de 2017</h4>
				<div class="txt v-align">
					<p>Un 80% está de acuerdo con la elección directa de los Intendentes pero sólo un 50% cree que el proyecto deba ser aprobado durante este año.</p>
				</div>
			</a>
			<a href="#" class="box-mini fucsia bg anim col-sm-12 col-xs-6" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_13.png);     background-position: center top;">
				<small>encuestas</small>
				<h4 class="v-align title">MUJERES EN LAS EMPRESAS</h4>
				<div class="txt v-align">
					<p>Estudio de Cadem evidencia percepción de desigualdad laboral y una preferencia por las jefaturas masculinas.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
		<?php
			/*
			PRENSA:::
			*/
$query = new WP_Query(array('cat' => 8, 'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'ASC'));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$subtitle = get_field('subtitulo',$ID);
	$excerpt = get_the_excerpt( $ID );
?>
			<a href="<?php the_permalink(); ?>" class="box-mini fucsia bg anim col-sm-12 col-xs-6" style="background-image: url(<?php echo $img[0]; ?>)">
				<small>prensa</small>
				<h4 class="v-align title"><?php the_title() ?></h4>
				<div class="txt v-align">
					<p><?php echo $excerpt ?></p>
				</div>
			</a>
<?php 
	endwhile; endif;
	wp_reset_postdata();
?>
<?php
			/*
			Encuestas:::
			*/
$query = new WP_Query(array('post_type' => 'encuestas', 'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'ASC'));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	//$subtitle = get_field('subtitulo',$ID);
	$excerpt = get_the_excerpt( $ID );
?>
			<a href="<?php the_permalink(); ?>" class="box-mini fucsia bg anim col-sm-12 col-xs-6" style="background-image: url(<?php echo $img[0]; ?>)">
				<small>encuestas</small>
				<h4 class="v-align title"><?php the_title() ?></h4>
				<div class="txt v-align">
					<p><?php echo $excerpt ?></p>
				</div>
			</a>
<?php 
	endwhile; endif;
	wp_reset_postdata();
?>
			
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