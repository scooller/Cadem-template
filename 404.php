<?php get_header(); ?>
<section class="page404">
	<div class="container"><div class="v-align">
		<h1 class="title">404</h1>
		<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="form-inline">
			<div class="input-group">
			  <input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr_x( 'Buscar…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>">
			  <span class="input-group-btn">
				  <button class="btn btn-default" type="button"><i class="icon-search"></i></button>
			  </span>
			</div>
		</form>
	</div></div>
</section>
<?php get_footer(); ?> 