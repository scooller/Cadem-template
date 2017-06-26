<?php get_header(); ?>
<!--
	ENCUESTAS 
-->
<section id="encuestas"><div class="container"><div class="row grid">
	<div class="col-sm-12 buscador"><div class="container">
		<form method="get" action="<?php echo site_url('/'); ?>" class="form-inline">
			<div class="input-group">
		  	  <input type="hidden" name="post_type" value="encuestas" />
			  <input type="text" name="s" class="form-control" placeholder="Buscar...">
			  <span class="input-group-btn">
				  <button class="btn btn-default verde" type="button"><i class="icon-search"></i></button>
			  </span>
			</div><!-- /input-group -->			
		</form>
	</div></div>
<?php 
	// The Query
	query_posts( array(
		'post_type' => 'encuestas',
		'orderby' => 'date', 
		'order'   => 'DESC',
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
	));
	$imgs=array();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$excerpt = get_the_excerpt( $ID );
	$file = get_field('pdf', $ID );
	$urlFile = wp_get_attachment_url( $file );
	//--
	array_push($imgs,array('id'=>$ID,'url'=>$img[0]));
?>
	<div class="col-sm-6 normal" id="encuesta-<?php echo $ID; ?>">
		<a class="col-sm-4 bg" style="display: block" href="<?php the_permalink(); ?>" target="_self"></a>
		<div class="col-sm-8 desc"><a href="<?php the_permalink(); ?>" target="_self">
			<h4 class="titulo"><?php the_title( ) ?></h4>
			<div class="txt"><?php _e($excerpt); ?></div>
			</a>
			<a href="<?php echo $urlFile; ?>" target="_blank" class="btn verde">Descargar <i class="icon-file-pdf"></i></a>
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