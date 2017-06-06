<?php get_header(); ?>
<!--
	EQUIPO 
-->
<section id="herramientas"><div class="azul"><div class="row">
	<div class="col-xs-6"><h2 class="title">Calculadora online a tu disposición</h2></div>
	<div class="col-xs-6">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	the_content();
?>
	</div>
</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-5">
	<h4 class="mini-title">CÁLCULO TAMAÑO DE MUESTRA</h4>
	<form class="form-horizontal" id="CalcularTamano">
		<div class="form-group">
			<label class="col-sm-6 control-label">Tamaño del Universo</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" placeholder="Infinito" name="tamanouniverso">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">Error Máximo Aceptable</label>
			<div class="col-sm-6">
				<select name="erroraceptable" class="form-control">
                        <option value="0.01">1 %</option>
                        <option value="0.02">2 %</option>
                        <option value="0.03">3 %</option>
                        <option value="0.04">4 %</option>
                        <option value="0.05" selected>5 %</option>
                        <option value="0.06">6 %</option>
                        <option value="0.07">7 %</option>
                        <option value="0.08">8 %</option>
                        <option value="0.09">9 %</option>
                        <option value="0.1">10 %</option>
                        <option value="0.11">11 %</option>
                        <option value="0.12">12 %</option>
                        <option value="0.13">13 %</option>
                        <option value="0.14">14 %</option>
                        <option value="0.15">15 %</option>
                        <option value="0.16">16 %</option>
                        <option value="0.17">17 %</option>
                        <option value="0.18">18 %</option>
                        <option value="0.19">19 %</option>
                        <option value="0.2">20 %</option>
               </select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">% Supuesto Varianza</label>
			<div class="col-sm-6">
				<select name="varianza" class="form-control">
                       <option value="0.05">5% o 95%</option>
                       <option value="0.1">10% o 90%</option>
                       <option value="0.2">20% o 80%</option>
                       <option value="0.3">30% o 70%</option>
                       <option value="0.4">40% o 60%</option>
                       <option value="0.5" selected>50%</option>
                </select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">Nivel de confianza</label>
			<div class="col-sm-6">
				<select name="confianza" class="form-control">
                        <option value="1.28">80%</option>
                        <option value="1.31">81%</option>
                        <option value="1.34">82%</option>
                        <option value="1.37">83%</option>
                        <option value="1.41">84%</option>
                        <option value="1.44">85%</option>
                        <option value="1.48">86%</option>
                        <option value="1.51">87%</option>
                        <option value="1.55">88%</option>
                        <option value="1.6">89%</option>
                        <option value="1.64">90%</option>
                        <option value="1.7">91%</option>
                        <option value="1.75">92%</option>
                        <option value="1.81">93%</option>
                        <option value="1.88">94%</option>
                        <option value="1.96" selected>95%</option>
                        <option value="2.05">96%</option>
                        <option value="2.17">97%</option>
                        <option value="2.33">98%</option>
                        <option value="2.58">99%</option>
                </select>
			</div>
		</div>
		<hr>
		<div class="form-group result">
			<label class="col-sm-6 control-label">Tamaño de muestra Propuesta</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" name="resultado" disabled>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-6 col-sm-6">
			  <button type="submit" class="btn btn-azul">Calcular</button>
			  <button type="reset" class="btn btn-azul">Borrar</button>
			</div>
		</div>
	</form>
	</div>
	<div class="col-md-5 col-md-offset-1">
	<h4 class="mini-title">CÁLCULO DIFERENCIA DE DOS PROPORCIONES INDEPENDIENTES.</h4>
	<form class="form-horizontal" id="CalcularDiferencia">
		<div class="form-group">
			<label class="col-sm-6 control-label">¿Número de respuestas en el grupo uno?</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" value="0" name="txt_m1">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">¿Número de respuestas en el grupo dos?</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" value="0" name="txt_m2">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">% estimado en el grupo uno</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" value="0" name="txt_v1">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">% estimado en el grupo dos</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" value="0" name="txt_v2">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-6 control-label">Nivel de confianza</label>
			<div class="col-sm-6">
			  <select name="cmb_z" class="form-control">
						<option value="1.28">80%</option>
						<option value="1.31">81%</option>
						<option value="1.34">82%</option>
						<option value="1.37">83%</option>
						<option value="1.41">84%</option>
						<option value="1.44">85%</option>
						<option value="1.48">86%</option>
						<option value="1.51">87%</option>
						<option value="1.55">88%</option>
						<option value="1.6">89%</option>
						<option value="1.64">90%</option>
						<option value="1.7">91%</option>
						<option value="1.75">92%</option>
						<option value="1.81">93%</option>
						<option value="1.88">94%</option>
						<option value="1.96" selected>95%</option>
						<option value="2.05">96%</option>
						<option value="2.17">97%</option>
						<option value="2.33">98%</option>
						<option value="2.58">99%</option>
			   </select>
			</div>
		</div>
		<hr>
		<div class="form-group result">
			<label class="col-sm-6 control-label">Diferencia de dos proporciones independientes</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" name="resultado1Diferencia" disabled>
			</div>
		</div>
		<div class="form-group result">
			<label class="col-sm-6 control-label">Valor Z</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" name="resultado2Diferencia" disabled>
			</div>
		</div>
		<div class="form-group">
			<div class="alert alert-info comentarioDiferencia" role="alert"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-6 col-sm-6">
			  <button type="submit" class="btn btn-azul">Calcular</button>
			  <button type="reset" class="btn btn-azul">Borrar</button>
			</div>
		</div>
	</form>
	</div>
</div>
<?php endwhile; endif; ?>
</div></section>
<?php get_footer(); ?> 