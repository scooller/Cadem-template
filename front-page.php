<?php get_header(); ?>
<?php get_template_part( 'slider' ); ?>
<?php
$detect = new Mobile_Detect;
/*
  __  __      _            _       _             _       
 |  \/  |    | |          | |     | |           (_)      
 | \  / | ___| |_ ___   __| | ___ | | ___   __ _ _  __ _ 
 | |\/| |/ _ \ __/ _ \ / _` |/ _ \| |/ _ \ / _` | |/ _` |
 | |  | |  __/ || (_) | (_| | (_) | | (_) | (_| | | (_| |
 |_|  |_|\___|\__\___/ \__,_|\___/|_|\___/ \__, |_|\__,_|
                                            __/ |        
                                           |___/         
*/
$productoID = 97;
//--
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => $productoID ));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
/*
Arreglo
*/
$mini=array();
$otro=array();
if( have_rows('contenido') ): while ( have_rows('contenido') ) : the_row();
	array_push($mini,array(
		'titulo'		=> get_sub_field('titulo'),
		'descripcion'	=> get_sub_field('descripcion')
	));
endwhile; endif;
//--
$pages_child = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'post_parent' => $productoID, 'order' => 'ASC', 'orderby' => 'menu_order' ));
if ( $pages_child->have_posts() ): while ( $pages_child->have_posts() ): $pages_child->the_post(); $ChID=$post->ID;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($ChID), 'full' );
	array_push($otro,array(
		'titulo'		=> get_the_title($ChID),
		'descripcion'	=> get_post_field('post_content', $ChID),
		'img'			=> $img[0]
	));
endwhile; endif;
?>
<section class="row mini" id="metodo">
	<div class="col-md-3 col-sm-12 azul">
		<h2 class="v-align title bold"><?php echo get_the_title($ID); ?> <i class="icon-angle-right"></i>
			<ul class="lista">
			<?php 
			$nn=0;
			foreach($mini as $metodo): $nn++;
				echo '<li><a href="#metodo'.$nn.'">'.$metodo['titulo'].'</a></li>';
			endforeach; ?>
			<?php
			if ( $detect->isMobile() ):
			foreach($otro as $metodo): $nn++;
				echo '<li><a href="#metodo'.$nn.'">'.$metodo['titulo'].'</a></li>';
			endforeach; endif; ?>
			</ul>
		</h2>
		<?php 
			$nn=0;
			foreach($mini as $metodo): $nn++;
		?>
		<div class="mini-menu anim azul" id="metodo<?php echo $nn; ?>">
			<i class="icon-angle-left cerrar"></i>
			<?php 
			echo '<h3 class="title">'.$metodo['titulo'].'</h3>';
			echo $metodo['descripcion']; ?>
		</div>
		<?php endforeach; ?>
		<?php
			if ( $detect->isMobile() ):
			foreach($otro as $metodo): $nn++; ?>
		<div class="mini-menu anim azul" id="metodo<?php echo $nn; ?>">
			<i class="icon-angle-left cerrar"></i>
			<?php 
			echo '<h3 class="title">'.$metodo['titulo'].'</h3>';
			echo $metodo['descripcion']; ?>
		</div>	
		<?php endforeach; endif; ?>
	</div>
	<?php 
	if ( !$detect->isMobile() ):
	foreach($otro as $metodo):
	?>
	<div class="col-md-3 col-sm-4 over bg anim azul" style="background-image: url(<?php echo $metodo['img']; ?>)">
		<h2 class="v-align title light"><?php echo $metodo['titulo']; ?></h2>
		<?php echo $metodo['descripcion']; ?>
		<div class="bg-color azul"></div>
	</div>
	<?php endforeach; endif; ?>
</section>
<?php endwhile; endif;
wp_reset_postdata();
?>
<!-- // pages-->
<?php
/*
  ___ _                __                  _           
 | _ \ |__ _ _____ _  / _|___   __ __ _ __| |___ _ __  
 |  _/ / _` |_ / _` | > _|_ _| / _/ _` / _` / -_) '  \ 
 |_| |_\__,_/__\__,_| \_____|  \__\__,_\__,_\___|_|_|_|
                                                       
*/
//$npages=get_field('pages_home','option');
if( have_rows('pages_home', 'option') ): while( have_rows('pages_home', 'option') ): the_row();
//--
$pID = get_sub_field('page_id');
$img = wp_get_attachment_image_src( get_post_thumbnail_id($pID), 'full' );
$url = get_field('url', $pID );
?>
<!-- // section -->
<section class="row verde big" style="background-image: url(<?php echo $img[0]; ?>)"><div class="container">
<div class="row">
	<div class="col-md-6">
		<h1 class="title txtlft v-align"><?php echo get_the_title($pID) ?></h1>
	</div>
	<div class="col-md-6">
		<div class="v-align txt"><?php echo get_post_field('post_content', $pID); ?></div>
	</div>
	<a href="<?php echo $url; ?>" target="_blank" class="btn ir">Ir</a>
</div>	
</div></section>
<?php
	endwhile;endif;
?>
<!-- // section -->
<?php get_footer(); ?> 