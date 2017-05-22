<?php get_header(); ?>
<script type="text/javascript">
	//window.location.href="<?php bloginfo('url'); ?>";
</script>
<section class="single">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
?>
	<div class="container">
	<?php if(!empty($img)): ?>
		<div class="img bg" style="background-image: url(<?php echo $img[0] ?>)"></div>
	<?php endif; ?>
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="content">
			<?php the_excerpt(); ?>
		</div>
	</div>
<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?> 