<?php get_header(); ?>
<!--
	SINGLE
-->
<section class="" id="single">
	<div class="container"><div class="row">
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
		<div class="col-md-4 col-r"><img src="<?php echo $img[0]; ?>" class="img-responsive v-align" /></div>
		<div class="col-md-8 col-l">
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="txt"><?php the_content(); ?><?php echo $btn; ?></div>
		</div>
<?php
	endwhile; endif;
?>
	</div></div>
</section>
<?php get_footer(); ?> 