<h1>Listado de Usuarios</h1>
<div style="width: 60px; margin: 0 auto;"> 
<a href='<?=base_url("usuario/formulario/add/")?>'>Agregar</a>
</div>
<br />
<table id="tablainfo" cellpadding="0" cellspacing="0" width="80%" align=center>
	<tr>
		<th>Id</th><th>Nombre</th><th>Email</th><th>Fecha nacimiento</th><th>Editar</th><th>Borrar</th>
	</tr>
	<?
	$estilo = "one";
	foreach ($users_query_get->result() as $users_row) {
		if ($estilo == "one") {
			$estilo = "two";
		} else {
			$estilo = "one";
		}
		print "<tr class='" . $estilo . "'>
					<td>" . $users_row -> idusuario . "</td>
					<td>" . $users_row -> nombre . "</td>
					<td>" . $users_row -> email . "</td>
					<td>" . $users_row -> fechanacimiento . "</td>
					<td><a href='" . base_url("usuario/formulario/edit/".$users_row -> idusuario) . "'>Editar</a></td>
					<td><a href='" . base_url("usuario/borrar/".$users_row -> idusuario) . "'>Borrar</a></td>
				</tr>";
	}
?>
</table>
<div style="width: 110px; margin: 0 auto;">
<span style="color: red; font-size: 10px;font-weight: bold;"><?=$msg?></span>
</div>