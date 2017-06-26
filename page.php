<?php get_header(); ?>
<!--
	SINGLE
-->
<section class="" id="single">
	<div class="container"><div class="row interior">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
		$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
		$imgM=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'medium' );
		$file = get_field('pdf', $ID );
		$urlFile = wp_get_attachment_url( $file );
		$btn='';
		if($file){
			$btn='<a href="'.$urlFile.'" target="_blank" class="btn verde">Descargar <i class="icon-file-pdf"></i></a>';
		}
?>
		<div class="col-md-12">
			<?php if($img[0]): ?><a href="<?php echo $img[0] ?>" data-fancybox="single" class="bg" style="background-image: url(<?php echo $img[0] ?>)"></a><?php endif; ?>
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="newspaper"><?php the_content(); ?><?php echo $btn; ?></div>
			<div class="share btn-group">
				<button type="button" class="btn" disabled>Compartir</button>
				<a class="btn" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon-facebook-1"></i></a>
				<a class="btn" href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><i class="icon-twitter-bird"></i></a>
			</div>
		</div>
<?php
	endwhile; endif;
		/*echo '<pre>'.print_r($prev_post,true).'</pre>';
		echo '<pre>'.print_r($next_post,true).'</pre>';*/
		$offset='';
?>
	</div>
	</div>
</section>
<?php get_footer(); ?> 