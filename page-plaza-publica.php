<?php get_header(); ?>
<?php
$detect = new Mobile_Detect;
?>
<section id="plaza-home">
<?php
	$pageID = get_field('slider_pp','option');
	$sliders = array();
	$pages_child = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'post_parent' => $pageID, 'order' => 'ASC', 'orderby' => 'menu_order' ));
	if ( $pages_child->have_posts() ): while ( $pages_child->have_posts() ): $pages_child->the_post(); $SID=$post->ID;
		$img=wp_get_attachment_image_src( get_post_thumbnail_id($SID), 'full' );
		array_push($sliders,array(
			'link'			=> get_permalink($SID),
			'titulo'		=> get_the_title($SID),
			'descripcion'	=> get_post_field('post_content', $SID),
			'img'			=> $img[0]
		));
	endwhile; endif;
	$nsliders=count($sliders);
	$nslide=round(12/$nsliders);
?>
<article id="plaza-slider" class="carousel slide" data-ride="carousel" data-interval="10000" data-pause="null">
	<div class="container fix">
		<img src="<?php bloginfo('template_url'); ?>/img/logo-plaza.svg" class="logo">
	</div>
  <!-- Indicators -->
  <ol class="carousel-indicators row">
   <?php $n=0;foreach($sliders as $slider): ?>
    <li data-target="#plaza-slider" data-slide-to="<?php echo $n ?>" class="col-xs-<?php echo $nslide ?> <?php echo $n==0?' active':''; ?>"><?php echo $slider['titulo']; ?></li>
   <?php $n++; endforeach; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
   <?php $n=0;foreach($sliders as $slider): ?>
    <div class="item bg<?php echo $n==0?' active':''; ?>" style="background-image: url(<?php echo $slider['img']; ?>)">		
      <div class="carousel-caption"><div class="container">
		  <div class="txt">
		  	<a href="<?php echo $slider['link']; ?>" target="_self">
		  		<h2 class="titulo"><?php echo $slider['titulo']; ?></h2><?php echo $slider['descripcion']; ?>
		  	</a>
		  </div>
	  </div></div>
    </div>
   <?php $n++; endforeach; ?>
  </div>

  <!-- Controls 
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
</article>
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
endwhile; endif;
?>
<?php
$pages_child = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'post_parent' => $ID, 'order' => 'ASC', 'orderby' => 'menu_order' ));
if ( $pages_child->have_posts() ): while ( $pages_child->have_posts() ): $pages_child->the_post(); $ChID=$post->ID;
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ChID), 'full' );
?>
<article class="row bg" id="plaza-<?php echo $ChID ?>" style="background-image: url(<?php echo $img[0]; ?>)">
<?php
	$archivo=get_field('archivo');
	$nencuesta=count(get_field('encuesta'));
	if($archivo):
?>
<!-- Resources -->
<script src="//www.amcharts.com/lib/3/amcharts.js"></script>
<script src="//www.amcharts.com/lib/3/serial.js"></script>
<script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="//www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
<script src="//www.amcharts.com/lib/3/lang/es.js"></script>
	<!-- Chart code -->
<script>
var chartData = generateChartData();
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
	"language": "es",
    "marginRight": 80,
    "autoMarginOffset": 20,
    "marginTop": 7,
    "dataProvider": chartData,
    "valueAxes": [{
        "axisAlpha": 0.2,
        "dashLength": 1,
        "position": "left"
    }],
	"legend": {
    	"useGraphSettings": true
  	},
    "mouseWheelZoomEnabled": true,
    "graphs": [
	<?php $nn=0; $sublabels = array(); if( have_rows('dchart', $ChID) ): while ( have_rows('dchart', $ChID) ) : the_row(); $nn++;
			$color 		= get_sub_field('color');
			$label 		= get_sub_field('label');
			$sublabel 	= sanitize_title(get_sub_field('sublabel'));
			array_push($sublabels,$sublabel);
	?>		
	{
        "id": "g<?php echo $nn; ?>",
		"lineColor": "<?php echo $color; ?>",
        "balloonText": "[[value]]",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "<?php echo $color; ?>",
        "hideBulletsCount": 50,
        "title": "<?php echo $label; ?>",
        "valueField": "<?php echo $sublabel ?>",
        "useLineColorForBulletBorder": true,
        "balloon":{
            "drop":true
        }
    },
	<?php endwhile; endif; ?>
	],
    "chartScrollbar": {
        "autoGridCount": true,
        "graph": "g1",
        "scrollbarHeight": 40,
		"backgroundColor": "#000",
		"selectedGraphFillColor":"#aecc49",
		"graphFillColor": "#3156a0"
    },
    "chartCursor": {
       "limitToGraph":"g<?php echo $nn; ?>"
    },
	"dataDateFormat": "DD-MM-YYYY",
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
		"dateFormats":[{
			period: 'fff',
			format: 'JJ:NN:SS'
		}, {
			period: 'ss',
			format: 'JJ:NN:SS'
		}, {
			period: 'mm',
			format: 'JJ:NN'
		}, {
			period: 'hh',
			format: 'JJ:NN'
		}, {
			period: 'DD',
			format: 'MMM DD'
		}, {
			period: 'WW',
			format: 'MMM DD'
		}, {
			period: 'MM',
			format: 'MMM YYYY'
		}, {
			period: 'YYYY',
			format: 'MMM YYYY'
		}],
        "axisColor": "#DADADA",
        "dashLength": 1,
        "minorGridEnabled": true,
		"guides":[
		<?php if( have_rows('guias', $ChID) ): while ( have_rows('guias', $ChID) ) : the_row();
			$color = get_sub_field('color');
			$label = get_sub_field('label');
			$fechaI = get_sub_field('fecha_inicio');
			$fechaO = get_sub_field('fecha_fin');
			?>			
			{
				"date": new Date(<?php echo $fechaI; ?>),
				"toDate": new Date(<?php echo $fechaO; ?>),
				"lineColor": "<?php echo $color ?>",
				"lineAlpha": 1,
				"dashLength": 2,
				"tickLength": 30,
				"position": "top",
				"inside": true,
				"label": "<?php echo $label; ?>",
				"boldLabel": true
			},
		<?php endwhile; endif; ?>
			]
    },
    "export": {
        "enabled": true
    }
});

// generate some random data, quite different range
function generateChartData() {
    var chartData = [];	
<?php
	$fila = 1;
	if (($gestor = fopen($archivo, "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
			if($fila>1){
				$data=$datos[0];
				$data=explode(';',$data);
				$fecha=date('Y-m-d',strtotime($data[0]));
				$data['date']=explode('-',$fecha);
				//print_r($data);
?>
	chartData.push({
		"date"			: new Date(<?php echo $data['date'][0] ?>,<?php echo $data['date'][1] ?>,<?php echo $data['date'][2] ?>),
		<?php $n=0;foreach($sublabels as $sublabel):$n++; ?>
			"<?php echo $sublabel; ?>" : <?php echo $data[$n] ?>,
		<?php endforeach; ?>
	});	
<?php
			}
			$fila++;
		}
		fclose($gestor);
	}
?>	
    return chartData;
}
function chartOk(){
	console.log('chartOk');
	$.each($('.amcharts-category-axis text.amcharts-guide'),function(){
		transform = $(this).attr('transform');
		console.log(transform);
		transform = transform.split(',');
		transform[1] = transform[1].replace(")", "")
		ntransform = transform[0]+','+(parseInt(transform[1])+30)+')';
		//console.log(ntransform);
		$(this).attr('transform',ntransform);
		//console.log('------------------');
	});
}
</script>
	<div class="container chart">
		<h2 class="title"><?php echo get_the_title($ChID) ?></h2>
		<div class="txt"><?php echo get_post_field('post_content', $ChID); ?></div>
		<div id="chartdiv"></div>
	</div>
<script type="text/javascript">
	AmCharts.ready(function() {
		chartOk();
		chart.addListener('zoomed',chartOk);
	});
</script>
<?php
	elseif($nencuesta):
		$ndiv=round(12/$nencuesta);
?>
<div class="container ng v-align">
	<div class="col-xs-12">
		<h2 class="encuesta-title"><?php echo get_the_title($ChID) ?></h2>
		<div class="row porcentajes">
		<?php if( have_rows('encuesta') ): while ( have_rows('encuesta') ) : the_row(); ?>
			<div class="porc col-xs-<?php echo $ndiv ?>">
				<h3 class="sub-title"><?php the_sub_field('porcentaje'); ?>&#37;<hr>
				<span class="label"><?php the_sub_field('etiqueta'); ?></span></h3>
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php else: ?>
<div class="container ng v-align">
	<div class="col-md-4">
		<h2 class="title"><?php echo get_the_title($ChID) ?></h2>
	</div>
	<div class="col-md-8 txt newspaper">
		<?php echo get_the_content('', true) ?>
		<p><a href="<?php echo get_permalink($ChID) ?>" class="btn verde">Ver Más</a></p>
	</div>
</div>
<?php endif; ?>
</article>
<?php 
endwhile; endif;
?>
</section>
<!-- // section -->
<?php get_footer(); ?> 