<?php get_header(); ?>
<?php get_template_part( 'slider' ); ?>
<section class="row mini">
	<div class="col-md-3 col-sm-12 azul">
		<h2 class="v-align title bold">NUESTROS PRODUCTOS <i class="icon-angle-right"></i></h2>
	</div>
	<div class="col-md-3 col-sm-4 over bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_09.png)">
		<h2 class="v-align title light">MARKETING</h2>
		<ul class="v-align list">
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
		</ul>
		<div class="bg-color azul"></div>
	</div>
	<div class="col-md-3 col-sm-4 over bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_10.png)">
		<h2 class="v-align title light">CUALITATIVO</h2>
		<ul class="v-align list">
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
		</ul>
		<div class="bg-color azul"></div>
	</div>
	<div class="col-md-3 col-sm-4 over bg" style="background-image: url(<?php bloginfo('template_url'); ?>/img/dummy/cademcl-home_11.png)">
		<h2 class="v-align title light">EXPERIENCIA DE USUARIO</h2>
		<ul class="v-align list">
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
			<li><a href="#">Loren Ipsum</a></li>
		</ul>
		<div class="bg-color azul"></div>
	</div>
</section>
<!-- // pages id -->
<?php
//$npages=get_field('pages_home','option');
if( have_rows('pages_home', 'option') ): while( have_rows('pages_home', 'option') ): the_row();
//--
$pID = get_sub_field('page_id');
$img = wp_get_attachment_image_src( get_post_thumbnail_id($pID), 'full' );
?>
<!-- // section -->
<section class="row verde big" style="background-image: url(<?php echo $img[0]; ?>)"><div class="container">
<div class="row">
	<div class="col-md-6">
		<h1 class="title txtlft v-align"><?php echo get_the_title($pID) ?></h1>
	</div>
	<div class="col-md-6">
		<div class="v-align txt"><?php echo get_post_field('post_content', $pID); ?></div>
	</div>
	<a href="<?php echo get_the_permalink($pID) ?>" class="btn ir">Ir</a>
</div>	
</div></section>
<?php
	endwhile;endif;
?>
<!-- // section -->
<?php get_footer(); ?> 