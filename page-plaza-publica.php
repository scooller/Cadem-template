<?php get_header(); ?>
<?php
$detect = new Mobile_Detect;
?>
<section id="plaza-home">
<article class="row no-glutter">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
?>
	<div class="col-xs-12 bg" style="background-image: url(<?php echo $img[0]; ?>)">
		<div class="container">
			<div class="col-md-4">
				<img src="<?php bloginfo('template_url'); ?>/img/logo-plaza.svg" class="logo">
				<div class="txt v-align"><?php the_content(); ?></div>
			</div>
		</div>
	</div>
<?php
	endwhile; endif;
?>
</article>
<?php
$pages_child = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'post_parent' => $ID, 'order' => 'ASC', 'orderby' => 'menu_order' ));
if ( $pages_child->have_posts() ): while ( $pages_child->have_posts() ): $pages_child->the_post(); $ChID=$post->ID;
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ChID), 'full' );
?>
<article class="row bg" id="plaza-<?php echo $ChID ?>" style="background-image: url(<?php echo $img[0]; ?>)">
<?php
	$nencuesta=count(get_field('encuesta'));
	if($nencuesta):
		$ndiv=round(12/$nencuesta);
?>
<div class="container ng v-align">
	<div class="col-xs-12">
		<h2 class="encuesta-title"><?php echo get_the_title($ChID) ?></h2>
		<div class="row porcentajes">
		<?php if( have_rows('encuesta') ): while ( have_rows('encuesta') ) : the_row(); ?>
			<div class="porc col-xs-<?php echo $ndiv ?>">
				<h3 class="sub-title"><?php the_sub_field('porcentaje'); ?>&#37;<hr>
				<span class="label"><?php the_sub_field('etiqueta'); ?></span></h3>
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php else: ?>
<div class="container ng v-align">
	<div class="col-md-4">
		<h2 class="title"><?php echo get_the_title($ChID) ?></h2>
	</div>
	<div class="col-md-8 txt newspaper">
		<?php echo get_the_content('', true) ?>
		<p><a href="<?php echo get_permalink($ChID) ?>" class="btn verde">Ver Más</a></p>
	</div>
</div>
<?php endif; ?>
</article>
<?php 
endwhile; endif;
?>
</section>
<!-- // section -->
<?php get_footer(); ?> 