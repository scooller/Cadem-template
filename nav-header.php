<nav class="navbar">
	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php bloginfo('url'); ?>" target="_top" class="brand-logo navbar-brand" ><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class="img"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav" id="gral-menu">
			<?php wp_nav_menu( array('theme_location' => 'general', 'container' => '', 'menu_class' => '', 'items_wrap' => '%3$s' )); ?>
		</ul>
	</div>
</nav>
<!-- // -->
<div style="display: none;" id="trabaja-form">
<img src="<?php bloginfo('template_url'); ?>/img/lightbox-trabaja.jpg" class="img-responsive">
<?php Ninja_Forms()->display( 2 );	?>
</div>