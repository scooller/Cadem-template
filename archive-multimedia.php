<?php get_header(); ?>
<!--
	ENCUESTAS 
-->
<section id="multimedia"><div class="container">
<?php 
	// The Query
	$query = new WP_Query( array( 'post_type' => 'multimedia', 'posts_per_page' => 1, 'post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1) );
	if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'large' );
	$excerpt = get_the_excerpt( $ID );
	$videoID = get_field('video_id',$ID);
?>
<div class="media stick" id="media-<?php echo $ID; ?>">
  <div class="media-left">
    <a href="http://www.youtube.com/embed/<?php echo $videoID ?>?autoplay=1" data-fancybox>
		<i class="icon-play v-align anim"></i>
     	<img class="media-object anim" src="<?php echo $img[0] ?>" alt="">
    </a>
  </div>
  <div class="media-body"><div class="v-align">
  	<h2 class="media-heading"><?php the_title( ) ?></h2>
  </div></div>
</div>
<?php endwhile; endif; ?>
<!-- todos -->
	<div class="row">
	<?php 
		// The Query
		$query = new WP_Query( array( 'post_type' => 'multimedia', 'post__not_in' => get_option( 'sticky_posts' ) ) );
		if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
		$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'medium' );
		$excerpt = get_the_excerpt( $ID );
		$videoID = get_field('video_id',$ID);
	?>
	<div class="col-md-6">
	<div class="media" id="media-<?php echo $ID; ?>">
	  <div class="media-left">
		<a href="http://www.youtube.com/embed/<?php echo $videoID ?>?autoplay=1" data-fancybox>
	  		<i class="icon-play v-align anim"></i>
	  		<img class="media-object anim" src="<?php echo $img[0] ?>" alt="">
		</a>
	  </div>
	  <div class="media-body"><div class="v-align">
		<h4 class="media-heading"><?php the_title( ) ?></h4>
	  </div></div>
	</div>
	</div>
	<?php endwhile; endif; ?>
	</div>
</div></section>
<?php get_footer(); ?> 