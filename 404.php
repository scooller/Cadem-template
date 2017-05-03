<?php get_header(); ?>
<!--
	NOTICIAS
-->
<section class="categorias 404">
<?php $query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'page_id' => 797));
    if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
?>
	<div class="noticia container"><a href="<?php bloginfo('url'); ?>" title="Home...">
		<div class="img-bg" style="background-image: url(<?php echo $img[0] ?>)"></div>			
		<div class="content">
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="txt"><?php the_excerpt(); ?></div>
		</div>
	</a></div>
<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?> 