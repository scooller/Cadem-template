<?php get_header(); ?>
<!--
	PRENSA 
-->
<section id="prensa"><div class="container"><div class="row grid">	
<?php 
	// The Query
	query_posts( array(
		'post_type' => 'prensa',
		'orderby' => 'date', 
		'order'   => 'DESC',
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
	));
	$imgs=array();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$excerpt = get_the_excerpt( $ID );
	$url = get_field('url', $ID );
?>
	<div class="col-sm-6 normal" id="encuesta-<?php echo $ID; ?>">
		<a class="col-sm-12 bg" style="display: block" href="<?php the_permalink(); ?>" target="_self">
			<img src="<?php echo $img[0]; ?>" class="img-responsive anim">
		</a>
		<div class="col-sm-12 desc"><a href="<?php echo $url; ?>" target="_blank">
			<h4 class="titulo"><?php the_title( ) ?></h4>
			<div class="txt"><?php _e($excerpt); ?></div>
			</a>
			<a href="<?php echo $url; ?>" target="_blank" class="btn borde">Ver Más</a>
		</div>
	</div>
<?php endwhile; ?>
<div class="col-sm-12">
	<nav aria-label="Paginador">
	<ul class="pager">
	<!-- Add the pagination functions here. -->		
		<li><?php previous_posts_link( '<i class="icon-left-open"></i> Nuevos' ); ?></li>
		<li><?php next_posts_link( 'Antiguos <i class="icon-right-open"></i>' ); ?></li>
	</ul>
	</nav>
</div>
<?php else: ?>
	<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>
<script type="text/javascript">
$(function() {
	/*var $grid = $('.grid').masonry({
	  	itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
  		columnWidth: '.grid-sizer',
	  	percentPosition: true
	});*/
});
</script>
</div></div></section>
<?php get_footer(); ?> 