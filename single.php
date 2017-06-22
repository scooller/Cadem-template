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
			<div class="bg" style="background-image: url(<?php echo $img[0] ?>)"></div>
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="newspaper"><?php the_content(); ?><?php echo $btn; ?></div>
			<div class="share btn-group">
				<button type="button" class="btn" disabled>Compartir</button>
				<a class="btn" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon-facebook-1"></i></a>
				<a class="btn" href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><i class="icon-twitter-bird"></i></a>
			</div>
		</div>
<?php
	$prev_post = get_adjacent_post(false, '', false);
	$next_post = get_adjacent_post(false, '', true);	
	endwhile; endif;
		/*echo '<pre>'.print_r($prev_post,true).'</pre>';
		echo '<pre>'.print_r($next_post,true).'</pre>';*/
		$offset='';
?>
	</div>
	<div class="row otros">
	<?php if($prev_post): $img_prev=wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID), 'medium' ); ?>
	<div class="col-xs-6">
		<a class="bg hidden-xs" style="display: block; background-image: url(<?php echo $img_prev[0]; ?>);" href="<?php echo get_permalink($prev_post->ID); ?>" target="_self">
		</a>
		<div class="desc"><a href="<?php echo get_permalink($prev_post->ID); ?>" target="_self">
			<h4 class="titulo"><?php echo $prev_post->post_title ?></h4>
			<div class="txt hidden-xs"><?php echo get_the_excerpt($prev_post->ID); ?></div>
			</a>
			<a href="<?php echo get_permalink($prev_post->ID); ?>" target="_self" class="btn borde">Ver Más</a>
		</div>
	</div>
	<?php else:
		$offset=' col-sm-offset-6';
	?>
	<?php endif; ?>
	<?php if($next_post): $img_next=wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'medium' ); ?>
	<div class="col-xs-6<?php echo $offset; ?>">
		<a class="bg hidden-xs" style="display: block; background-image: url(<?php echo $img_next[0]; ?>)" href="<?php echo get_permalink($next_post->ID); ?>" target="_self">
		</a>
		<div class="desc"><a href="<?php echo get_permalink($next_post->ID); ?>" target="_self">
			<h4 class="titulo"><?php echo $next_post->post_title ?></h4>
			<div class="txt hidden-xs"><?php echo get_the_excerpt($next_post->ID); ?></div>
			</a>
			<a href="<?php echo get_permalink($next_post->ID); ?>" target="_self" class="btn borde">Ver Más</a>
		</div>
	</div>
	<?php endif; ?>
	</div></div>
</section>
<?php get_footer(); ?> 