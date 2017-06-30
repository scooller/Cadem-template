<?php
get_header();
global $wp_query;
?>

<div class="container" id="search">
	<h1><?php echo $wp_query->found_posts; ?> Resultados entontrados para : "<?php the_search_query(); ?>"</h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'thumbnail' );
	?>
	<div class="media">
	  <div class="media-left">
		<a href="<?php the_permalink(); ?>">
		  <img class="media-object" src="<?php echo $img[0] ?>">
		</a>
	  </div>
	  <div class="media-body">
	  	<a href="<?php the_permalink(); ?>" class="v-align">
			<h4 class="media-heading"><?php the_title();  ?></h4>
			<?php echo substr(get_the_excerpt(), 0,200); ?>
		</a>
	  </div>
	</div>
	<?php endwhile;  endif; ?>
	<?php paginate_links(); ?>
</div>
<?php get_footer(); ?>