<footer class="row">
	<div class="col-md-12 blanco">
		<div class="col-sm-6">
			<table>
				<tr>
					<td><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem-plaza-publica.png" class="logo"></td>
					<td><p>Ingresa tu correo electrónico para recibir información, datos y análisis que ofrece Plaza Pública Cadem.</p></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6">
			<table>
				<tr>
					<td><?php 
			if (function_exists('ninja_forms_display_form')):
				ninja_forms_display_form(1);
			endif;
			?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-12 gris-oscuro suscribir">
		<div class="col-sm-6">
			<table>
				<tr>
					<td colspan="4"><h3 class="title light">Hola, necesitas hablar con nosotros?</h3></td>
				</tr>
				<tr>
					<td><a href="mailto:cadem@cadem.cl"><strong>Email</strong>cadem@cadem.cl</a></td>
					<td><a href="tel:+56224386500"><strong>Teléfono</strong>+56 2 24386500</a></td>
					<td><a href="#"><strong>Dirección</strong>
						Nueva de Lyon 145<br>
						Piso 2, Providencia<br>
						Santiago, Chile.
					</a></td>
					<td><strong>Redes Sociales</strong>
					<a href="#" target="_blank"><i class="icon-facebook-1"></i> Twitter</a><br>
					<a href="#" target="_blank"><i class="icon-twitter"></i> Facebook</a></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6">
			<table>
				<tr>
					<td><a href="#" class="btn">VER MAPA</a></td>
					<td><a href="#" class="btn">TRABAJA CON NOSOTROS</a></td>
					<td><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class="logo svg"></td>
				</tr>
			</table>
		</div>	
	</div>
</footer>
<?php wp_footer(); ?>  
</body>
</html>