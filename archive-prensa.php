<?php get_header(); 
$detect = new Mobile_Detect;
?>
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
	$cont=1;
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'medium' );
	$imgF=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$excerpt = get_the_excerpt( $ID );
	$url = get_field('url', $ID );
	$class='col-sm-6'; 
	if($cont==1 && !$detect->isMobile()):
?>
<div class="normal destacado" id="prensa-<?php echo $ID; ?>">
  <div class="media-left">
    <a href="<?php the_permalink(); ?>" target="_self">
     	<img class="media-object anim" src="<?php echo $cont==1?$imgF[0]:$img[0]; ?>" alt="">
    </a>
  </div>
  <div class="media-body">
  <div class="v-align">
  	<h2 class="media-heading"><?php the_title( ) ?></h2>
  	<div class="txt"><?php _e($excerpt); ?></div>
  	<a href="<?php the_permalink(); ?>" target="_self" class="btn borde">Ver Más</a>
  </div>
  </div>
</div>
<?php else: ?>
	<div class="col-sm-6 normal" id="encuesta-<?php echo $ID; ?>">
		<a class="col-sm-12 bg" style="display: block" href="<?php the_permalink(); ?>" target="_self">
			<img src="<?php echo $img[0]; ?>" class="img-responsive anim">
		</a>
		<div class="col-sm-12 desc"><a href="<?php the_permalink(); ?>" target="_blank">
			<h4 class="titulo"><?php the_title( ) ?></h4>
			<div class="txt"><?php _e($excerpt); ?></div>
			</a>
			<a href="<?php the_permalink(); ?>" target="_self" class="btn borde">Ver Más</a>
		</div>
	</div>
<?php endif;
	$cont++;endwhile; ?>
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