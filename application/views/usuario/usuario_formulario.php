<?
$idusuario = "";
$nombre = "";
$email = "";
$fechanacimiento = "";
if ($users_edit === true) {
	if ($users_query_get -> num_rows() > 0) {
		$row = $users_query_get -> row();
		$idusuario = $row -> idusuario;
		$nombre = $row -> nombre;
		$email = $row -> email;
		$fechanacimiento = $row -> fechanacimiento;
	}
}
?>
<h1>Formulario de Usuario</h1>
<form method="post" action="<?echo base_url("usuario/save/")?>" id="perfilform">
	<input type="hidden" name="id" value="<?=$idusuario?>" />
	<table id="tablainfo" cellpadding="0" cellspacing="0" width="32%" align=center>
		<tr class="one">
			<td>Nombre</td>
			<td>
			<input type="text" name="nombre" id="nombre" value="<?=$nombre?>" class="validate[required]" autofocus="true" />
			</td>
		</tr>
		<tr class="two">
			<td>Email</td>
			<td>
			<input type="text" name="email" id="email" value="<?=$email?>" class="validate[required,custom[email]]" />
			</td>
		</tr>
		<tr class="one">
			<td>Fecha nacimiento</td>
			<td>
			<input type="text" name="fechanacimiento" id="fechanacimiento" value="<?=$fechanacimiento?>" readonly="true" class="validate[required]" />
			</td>
		</tr>
	</table>
	<div style="width: 60px;margin: 0 auto">
		<input type="submit" value="Enviar" />
	</div>
	<div style="width: 60px;margin: 0 auto">
		<a href="<?echo base_url()?>">Volver</a>
	</div>
</form>
<script type="text/javascript">
	jQuery(function($) {
		$.datepicker.regional['es'] = {
			closeText : 'Cerrar',
			prevText : '&#x3c;Ant',
			nextText : 'Sig&#x3e;',
			currentText : 'Hoy',
			monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames : ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
			dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie', 'S&aacute;b'],
			dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;'],
			weekHeader : 'Sm',
			dateFormat : 'yy-mm-dd',
			firstDay : 1,
			isRTL : false,
			showMonthAfterYear : false,
			yearSuffix : '',
			changeMonth : true,
			changeYear : true
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
	});

	jQuery(document).ready(function() {
		jQuery("#perfilform").validationEngine();
		jQuery("#fechanacimiento").datepicker();
	});
</script>