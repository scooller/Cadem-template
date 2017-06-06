<?php get_header(); ?>
<!--
	ENCUESTAS 
-->
<section id="encuestas"><div class="container"><div class="row grid">
	<div class="col-sm-12 buscador"><div class="container">
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
	$imgs=array();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$excerpt = get_the_excerpt( $ID );
	//--
	array_push($imgs,array('id'=>$ID,'url'=>$img[0]));
?>
	<div class="col-sm-6 normal" id="encuesta-<?php echo $ID; ?>">
		<div class="col-sm-4 bg"></div>
		<div class="col-sm-8 desc">
			<h4 class="titulo"><?php the_title( ) ?></h4>
			<div class="txt"><?php _e($excerpt); ?></div>
			<a href="<?php the_permalink() ?>" class="btn verde">Descargar <i class="icon-file-pdf"></i></a>
		</div>
	</div>
<?php endwhile; ?>
<style>
<?php foreach($imgs as $img): ?>
	#encuesta-<?php echo $img['id'] ?> .bg:before{
		background-image: url('<?php echo $img['url'] ?>');
	}
<?php endforeach; ?>
</style>
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