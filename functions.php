<?php
//header('Access-Control-Allow-Origin: *'); 
load_theme_textdomain( 'cadem', get_template_directory().'/languages' );
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {  
	register_nav_menu( 'social', __( 'Social Menu', 'cadem' ) );
	register_nav_menu( 'general', __( 'Menu Principal', 'cadem' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
	add_theme_support( 'custom-logo' );
}

//--
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> __( 'Configuración del Sitio', 'cadem' ),
		'menu_title'	=> __( 'Configuración del Sitio', 'cadem' ),
		'menu_slug' 	=> 'theme-general-settings',
		'icon_url'		=> 'dashicons-hammer'
	));
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'equipo',
		array(
			'labels' => array(
				'name' => __( 'Equipo', 'cadem' ),
				'singular_name' => __( 'Equipo', 'cadem' )
			),
			'menu_icon' => "",
			'menu_position' => 5,
			'public' => true,
			'has_archive' => true,
			'supports' => array (
				'title',
				'author',
				'editor',
				'page-attributes',
				'thumbnail',
				'custom-fields'
			)
		)
	);
	//--
	register_post_type( 'encuestas',
		array(
			'labels' => array(
				'name' => __( 'Encuestas', 'cadem' ),
				'singular_name' => __( 'Encuesta', 'cadem' )
			),
			'menu_icon' => "",
			'menu_position' => 5,
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category'),
			'supports' => array (
				'title',
				'author',
				'editor',
				'page-attributes',
				'thumbnail',
				'custom-fields'
			)
		)
	);
	//--
	register_post_type( 'datos-sociales',
		array(
			'labels' => array(
				'name' => __( 'Datos Sociales', 'cadem' ),
				'singular_name' => __( 'Datos Sociales', 'cadem' )
			),
			'menu_icon' => "",
			'menu_position' => 5,
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category'),
			'supports' => array (
				'title',
				'author',
				'editor',
				'page-attributes',
				'thumbnail',
				'custom-fields'
			)
		)
	);
	//--
	register_post_type( 'videos',
		array(
			'labels' => array(
				'name' => __( 'Videos', 'cadem' ),
				'singular_name' => __( 'Video', 'cadem' )
			),
			'menu_icon' => "",
			'menu_position' => 5,
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category'),
			'supports' => array (
				'title',
				'author',
				'editor',
				'page-attributes',
				'thumbnail',
				'custom-fields'
			)
		)
	);
	//--
}
function custom_post_css() {
	wp_enqueue_style( 'fontello', get_template_directory_uri() .'/fontello/css/fontello.css', array( ) );
	echo "<style type='text/css' media='screen'>
        #adminmenu li#menu-posts-equipo div.wp-menu-image:before {
            font-family:  fontello !important;
            content: '\\e803';
		}
		#adminmenu li#menu-posts-encuestas div.wp-menu-image:before {
            font-family:  fontello !important;
            content: '\\e80a';
		}
		#adminmenu li#menu-posts-datos-sociales div.wp-menu-image:before {
            font-family:  fontello !important;
            content: '\\e804';
		}
		#adminmenu li#menu-posts-videos div.wp-menu-image:before {
            font-family:  fontello !important;
            content: '\\e800';
		}
    </style>";
}
add_action('admin_head', 'custom_post_css');

function theme_enqueue() {	
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js", false, '2.2.4');
	wp_enqueue_script('jquery');    
	
	wp_enqueue_style( 'general-style', get_template_directory_uri() .'/style.css', array( ) );
	wp_enqueue_style( 'fontello-style', get_template_directory_uri() .'/fontello/css/fontello.css', array( ) );
	wp_enqueue_style( 'sass-style', get_template_directory_uri() .'/css/general.css', array( ) );
}
function enqueue_my_styles(){	
	wp_enqueue_style( 'bootstrap-style', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css', array( ), '3.3.7' );
	wp_enqueue_style( 'fontawesome-style', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array( ), '4.7.0' );
	wp_enqueue_style( 'fancybox-style', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css', array( ), '2.1.5' );
	wp_enqueue_style( 'fancybox-style-helper-button', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css', array( ), '1.0.5' );
	
	wp_enqueue_script( 'bootstrap-js', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script( 'imagesloaded-js', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1', true );	
	wp_enqueue_script( 'fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js', array( 'jquery' ), '2.1.5', true );
	wp_enqueue_script( 'fancybox-helper-button', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js', array( 'jquery' ), '1.0.5', true );
	wp_enqueue_script( 'fancybox-helper-media', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js', array( 'jquery' ), '1.0.5', true );
	wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js', array( 'jquery' ), '4.2.0', true );
	wp_enqueue_script( 'svg-inline', get_template_directory_uri() .'/js/jquery.inlinesvg.min.js', array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() .'/js/actions.min.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue' );
add_action( 'wp_footer','enqueue_my_styles', 10);

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

function noImage($cont){	
	return preg_replace('/<img[^>]+>/i', '', $cont);
}

/*this function allows users to use the first image in their post as their thumbnail*/
function first_image($content = "") {
	global $post, $posts;
	$img = '';
	ob_start();
	ob_end_clean();
	if(empty($content)){
		$content=$post->post_content;
	}
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$img = $matches [1] [0];

	return trim($img);
} 
/* this function gets thumbnail from Post Thumbnail or Custom field or First post image */
function get_thumbnail($width=100, $height=100, $fullpath=false, $post_id=false, $class='', $alttext='', $titletext='', $custom_field=''){
	global $post, $shortname, $posts;
	
	if(!$post_id){
		$post_id = $post->ID;
	}
	$thumb_array['thumb'] = '';
	$thumb_array['use_timthumb'] = true;
	if ($fullpath) $thumb_array['fullpath'] = ''; //full image url for lightbox
	
	if ( function_exists('has_post_thumbnail') ) {
		if ( has_post_thumbnail($post_id) ) {
			$thumb_array['use_timthumb'] = false;
			
			$args='';
			if ($class <> '') $args['class'] = $class;
			if ($alttext <> '') $args['alt'] = $alttext;
			if ($titletext <> '') $args['title'] = $titletext;
			
			$thumb_array['thumb'] = get_the_post_thumbnail( $post_id, array($width,$height), $args );
			
			if ($fullpath) {
				$thumb_array['fullpath'] = get_the_post_thumbnail( $post_id );
				if ($thumb_array['fullpath'] <> '') { 
					$thumb_array['fullpath'] = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $thumb_array['fullpath'], $matches);
					$thumb_array['fullpath'] = trim($matches[1][0]);
				};
			};
		}
	};
	
	if ($thumb_array['thumb'] == '') {
		if ($custom_field == '') $thumb_array['thumb'] = get_post_meta($post_id, 'Thumbnail', $single = true);
		else { 
			$thumb_array['thumb'] = get_post_meta($post_id, $custom_field, $single = true);
			if ($thumb_array['thumb'] == '') $thumb_array['thumb'] = get_post_meta($post_id, 'Thumbnail', $single = true);
		}
		
		if (($thumb_array['thumb'] == '') && ((get_option($shortname.'_grab_image')) == 'on')) $thumb_array['thumb'] = first_image();
		
		if ($fullpath) $thumb_array['fullpath'] = apply_filters('et_fullpath', $thumb_array['thumb']);
	}
			
	return $thumb_array;
}

function fix_svg_thumb_display() {
  echo '<style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
      width: 100% !important; 
      height: auto !important; 
    }
  </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['mp4'] = 'video/mp4';
  $mimes['m4v'] = 'video/mp4';
  $mimes['webm'] = 'video/webm';
  $mimes['ogv'] = 'video/ogg';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

show_admin_bar( false );