<?php get_header(); ?>
<script type="text/javascript">
	window.location.href="<?php bloginfo('url'); ?>";
</script>
<section class="single">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
?>
	<div class="container"><a href="<?php echo get_permalink( $ID ); ?>" title="ir a">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="content">
		<?php the_excerpt(); ?>
		</div>
	</a></div>
<?php endwhile; else: ?>
	...
<?php endif; ?>
</section>
<?php get_footer(); ?> 