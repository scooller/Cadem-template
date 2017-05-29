<?php get_header(); ?>
<!--
	EQUIPO 
-->
<section class="row grid" id="equipo">
	<div class="col-sm-12 azul desc"><?php the_field('equipo','option') ?></div>
<?php 
	// The Query
	query_posts( array(
		'posts_per_page' => '-1',
        'post_type' => 'equipo',
		'orderby' => 'menu_order', 
		'order'   => 'ASC'
	));
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$cargo=get_field('cargo', $ID );
	
?>
	<div class="col-sm-3 normal persona" id="equipo-<?php echo $ID; ?>" style="background-image: url(<?php echo $img[0] ?>)">
		<div class="v-align">
			<h2 class="nombre"><?php the_title(); ?></h2>
			<h3 class="cargo"><?php echo $cargo; ?></h3>
		</div>
		<div class="bg-color"></div>
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