<?php get_header(); ?>
<!--
	ENCUESTAS 
-->
<section class="row grid" id="encuestas">
	<div class="col-sm-12 buscador fucsia"><div class="container">
		<form class="form-inline">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Buscar...">
			  <span class="input-group-btn">
				  <button class="btn btn-default verde" type="button"><i class="icon-search"></i></button>
			  </span>
			</div><!-- /input-group -->			
		</form>
	</div></div>
<?php 
	// The Query
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$excerpt = get_the_excerpt( $ID );
?>
	<div class="col-sm-6 normal" id="encuesta-<?php echo $ID; ?>">
		<div class="col-sm-4 bg" style="background-image: url(<?php echo $img[0] ?>)"></div>
		<div class="col-sm-8 desc">
			<h4><?php the_title( ) ?></h4>
			<div class="txt"><?php _e($excerpt); ?></div>
			<a href="<?php the_permalink() ?>" class="btn verde">Descargar <i class="icon-file-pdf"></i></a>
		</div>
	</div>
<?php endwhile; else: ?>
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
</section>
<?php get_footer(); ?> 