<?php get_header(); ?>
<section class="page404">
	<div class="container">
		<h1 class="title">404</h1>
		<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="form-inline">
			<div class="input-group">
			  <input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>">
			  <span class="input-group-btn">
				<button class="btn btn-default" type="button"><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
			  </span>
			</div>
		</form>
	</div>
</section>
<?php get_footer(); ?> 