<?php /* Template Name: Row */ ?>
<?php get_header(); ?>
<!--
	EQUIPO 
-->
<section class="row no-glutter" id="row">
<?php
	$npages=count(get_field('columna'));
	$ndiv=round(12/$npages);
	if( have_rows('columna') ): while ( have_rows('columna') ) : the_row();
		$updn=get_sub_field('arriba_abajo');
		$img=get_sub_field('imagen');
		$class=get_sub_field('clases');
?>
		<div class="col-sm-<?php echo $ndiv; ?>">
			<?php echo $updn=='Abajo'?'<div class="rw img bg" style="background-image: url('.$img.')"></div>':''; ?>
			<div class="rw <?php echo $class; ?>"><div class="txt v-align"><?php the_sub_field('contenido'); ?></div></div>
			<?php echo $updn=='Arriba'?'<div class="rw img bg" style="background-image: url('.$img.')"></div>':''; ?>
		</div>
<?php
	endwhile; endif;
?>
</section>
<?php get_footer(); ?> 