<?php get_header(); ?>
<!--
	EQUIPO 
-->
<section class="row grid" id="equipo">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$cargo=get_field('cargo', $ID );
?>
	<div class="col-sm-3 persona" id="equipo-<?php echo $ID; ?>" style="background-image: url(<?php echo $img[0] ?>)">
		<?php the_title(); ?>
	</div>
<?php endwhile; else: ?>
	<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>
<script type="text/javascript">
$(function() {
	var $grid = $('.grid').masonry({
	  itemSelector: '.persona',
	  percentPosition: true
	});
});
</script>
</section>
<?php get_footer(); ?> 