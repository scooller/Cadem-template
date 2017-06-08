<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../../../wp-load.php');
require_once( ABSPATH . 'wp-admin/includes/image.php' );
//
$json = file_get_contents('http://www.cadem.cl/wp-content/themes/cadem/json.php');
$obj = json_decode($json);

//echo '<pre>'.print_r($obj,true).'</pre>';

set_time_limit(0);

//Funciones
function subirFile($file){
	$filename=explode('/',$file);
	$filename=$filename[count($filename)-1];

	$uploaddir = wp_upload_dir();
	$uploadfile = $uploaddir['path'] . '/' . $filename;

	if($contents = @file_get_contents($file)):
		usleep(4000);
		$savefile = fopen($uploadfile, 'w');
		fwrite($savefile, $contents);
		fclose($savefile);
		//after that, we can insert the image into the media library:

		$wp_filetype = wp_check_filetype(basename($filename), null );

		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit'
		);

		$attach_id = wp_insert_attachment( $attachment, $uploadfile );

		$imagenew = get_post( $attach_id );
		$fullsizepath = get_attached_file( $imagenew->ID );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		//
		return $attach_id;
	else:
		return false;
	endif;
}
function addEncuesta($posteo){
	global $wpdb;
	$postid = $wpdb->get_var( "SELECT ID FROM {$wpdb->posts} WHERE post_title = '{$posteo->titulo}'" );
	if(!$postid){
		$my_post = array(
			'post_title' => $posteo->titulo,
			//'post_date' => $posteo->fecha,
			'post_content' => $posteo->contenido,
			'post_status' => 'publish',
			'post_type' => 'encuestas',
		);
		$the_post_id = wp_insert_post( $my_post, true );
		if( !is_wp_error( $the_post_id ) ) {
			//Imagen
			$imageID=subirFile($posteo->imagen);
			if($imageID){
				set_post_thumbnail( $the_post_id, $imageID );
			}
			//Imagen
			$fileID=subirFile($posteo->pdf);
			if($fileID){
				update_field('pdf', $fileID, $the_post_id);
			}
			return $the_post_id;
		}else{
			return $result->get_error_message();
		}
	}else{	
		return 'Duplicado';
	}
}
//recorrer json
$cont=0;
foreach($obj as $posteo):
	$cont++;
	//sleep(3);
	$r=addEncuesta($posteo);
	if($r){
		echo $cont.':'.$posteo->titulo.' 👍 ('.print_r($r,true).')<br>';
	}else if($r === 'Duplicado'){
		echo $cont.':'.$posteo->titulo.' 👌<br>';
	}else{
		echo $cont.':'.$posteo->titulo.' 👎 ('.print_r($r,true).')<br>';
	}	
endforeach;
?>