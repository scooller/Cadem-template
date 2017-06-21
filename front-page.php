<?php get_header(); ?>
<?php get_template_part( 'slider' ); ?>
<?php
$productoID = 97;
//--
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => $productoID ));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
?>
<section class="row mini" id="metodo">
	<div class="col-md-3 col-sm-12 azul">
		<h2 class="v-align title bold"><?php the_title(); ?> <i class="icon-angle-right"></i>
			<ul class="lista">
			<?php 
			$nn=0;
			if( have_rows('contenido') ): while ( have_rows('contenido') ) : the_row(); $nn++;
				echo '<li><a href="#metodo'.$nn.'">'.get_sub_field('titulo').'</a></li>';
			endwhile; endif; ?>
			</ul>
		</h2>
		<?php 
			$nn=0;
			if( have_rows('contenido') ): while ( have_rows('contenido') ) : the_row(); $nn++;		
		?>
		<div class="mini-menu anim azul" id="metodo<?php echo $nn; ?>">
			<i class="icon-angle-left cerrar"></i>
			<?php the_sub_field('descripcion'); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>
	<?php 
	$pages_child = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'post_parent' => $productoID,'order' => 'ASC','orderby' => 'menu_order' ));
	if ( $pages_child->have_posts() ): while ( $pages_child->have_posts() ): $pages_child->the_post(); $ChID=$post->ID;
		$img = wp_get_attachment_image_src( get_post_thumbnail_id($ChID), 'full' );
	?>
	<div class="col-md-3 col-sm-4 over bg anim azul" style="background-image: url(<?php echo $img[0]; ?>)">
		<h2 class="v-align title light"><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<div class="bg-color azul"></div>
	</div>
	<?php endwhile; endif; ?>
</section>
<?php endwhile; endif;
wp_reset_postdata();
?>
<!-- // pages id -->
<?php
//$npages=get_field('pages_home','option');
if( have_rows('pages_home', 'option') ): while( have_rows('pages_home', 'option') ): the_row();
//--
$pID = get_sub_field('page_id');
$img = wp_get_attachment_image_src( get_post_thumbnail_id($pID), 'full' );
$url = get_field('url', $pID );
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
	<a href="<?php echo $url; ?>" target="_blank" class="btn ir">Ir</a>
</div>	
</div></section>
<?php
	endwhile;endif;
?>
<!-- // section -->
<?php get_footer(); ?> 