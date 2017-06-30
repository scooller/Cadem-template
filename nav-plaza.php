<?php
$pID = get_the_ID();
$style = '';
if($pID !== 3739): 
	$style=' style="margin-top: -80px;"';
?>
<div class="container fix" id="cont-plaza">
	<a href="<?php the_permalink(3739); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-plaza.svg" class="logo"></a>
</div>
<?php endif; ?>
<nav class="navbar" id="nav-plaza"<?php echo $style; ?>>
   <button type="button" class="navbar-toggle" aria-expanded="false">
        <span class="icon-bar anim"></span>
        <span class="icon-bar anim"></span>
        <span class="icon-bar anim"></span>
   </button>
   <ul class="nav anim">
   	<?php wp_nav_menu( array('theme_location' => 'plaza', 'container' => '', 'menu_class' => '', 'items_wrap' => '%3$s' )); ?>
   </ul>
</nav>