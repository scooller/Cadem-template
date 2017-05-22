<?php get_header(); ?>
<!--
	ENCUESTAS 
-->
<section class="row grid" id="encuestas">
	<div class="col-sm-12 buscador fucsia"><div class="container">
		<form class="form-inline">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Search for...">
			  <span class="input-group-btn">
				  <button class="btn btn-default" type="button"><i class="icon-search"></i></button>
			  </span>
			</div><!-- /input-group -->
			<div class="checkbox">
				<input id="chkall" type="checkbox" class="filled-in" checked value="all">
				<label for="chkall">cualquiera</label>
			</div>
			<div class="checkbox">
				<input id="chkavisos" type="checkbox" class="filled-in" value="avisos">
				<label for="chkavisos">avisos</label>
			</div>
			<div class="checkbox">
				<input id="chkcolumna" type="checkbox" class="filled-in" value="columna">
				<label for="chkcolumna">columna</label>
			</div>
			<div class="checkbox">
				<input id="chkestudios" type="checkbox" class="filled-in" value="estudios">
				<label for="chkestudios">estudios</label>
			</div>
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
			<a href="<?php the_permalink() ?>" class="btn verde">VER MÁS <i class="icon-angle-right"></i></a>
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