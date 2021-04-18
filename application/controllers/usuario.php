<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Clase usuario
 *
 * Manejo de la tabla usuario crud
 *
 * @author Jorge Rubio rubioruizjorge@gmail.com
 * @copyright  2012
 * @license    PHP License 3.0
 * @version    Release: 1.0
 * @since      1.0
 */

class Usuario extends CI_Controller {

	/**
	 * @desc index pinta el listado de usuario en la base de datos
	 */
	function index($msg="") {
		//header html	
		$datos = array('titulo' => 'Crud usuarios', 'descripcion' => 'Esta es la descripcion de esta pagina.');
		$this -> load -> view('cabecera', $datos);
		
		//modelo
		$this->load->model('Usuario_model'); 
		$usuarios['users_query_get'] = $this->Usuario_model->getListaUsuarios();
		$usuarios['msg']=$msg;
        
      	//vista
		$this -> load -> view('usuario/usuario_listado',$usuarios);
		
		//footer html
		$this -> load -> view('pie');
	}
	
	/**
	 * @desc muestra el formulario para agregar o edita usuarios
	 * @param $accion decide el tipo de formulario
	 * @param $id id del usuario si es para actualizar 
	 */	
	function formulario($accion="",$id=""){
		//header html	
		$datos = array('titulo' => 'Crud usuarios '. $accion, 'descripcion' => 'Esta es la descripcion de esta pagina.');
		$this -> load -> view('cabecera', $datos);
		
		switch($accion){
			
			case 'edit';
				//modelo
				$this->load->model('Usuario_model'); 
				$usuarios['users_query_get'] = $this->Usuario_model->getUsuario($id);
				$usuarios['users_edit'] = true;
			break;
			
			case 'add':
					$usuarios['users_query_get'] ="";
					$usuarios['users_edit'] = false;
				break;
		}
		
		//vista
		$this -> load -> view('usuario/usuario_formulario',$usuarios);
		
		//footer html
		$this -> load -> view('pie');
	}
	
	/**
	 * @desc procesa el formulario update-insert segun corresponda
	 * invoca el metodo index para posicionar el usuario nuevamente en la vista inicial 
	 */
	function save(){
		$this->load->model('Usuario_model'); 
		$datos = array('nombre' => $_POST['nombre'], 'email' => $_POST['email'], 'fechanacimiento' => $_POST['fechanacimiento']);
		
		if($_POST['id']!=""){//update			
			$this->Usuario_model->actualiza_usuario($datos,$_POST['id']);
			$msg=" Actualizaci&oacute;n exitosa.";
		}
		else{//insert
			$datos ["fecharegistro"] = date('Y-m-d H:i:s');
			$usuarioInsertado=$this->Usuario_model->inserta_usuario($datos);
			$msg=" Usuario ingresado " . $usuarioInsertado . ".";
		}
		
		$this->index($msg);
	}
	
	/**
	 * @desc borra un usuario segun el id
	 */
	function borrar($id=""){
		$this->load->model('Usuario_model');
		$this->Usuario_model->borrar_usuario($id);
		$msg="Usuario eliminado";
		$this->index($msg);
	}

}
?> 