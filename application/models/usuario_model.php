<?php
/**
 * Clase DAO(Data Access Object ) de usuario
 *
 * Manejo del acceso a la base de datos para la tabla usuario
 *
 * @author Jorge Rubio rubioruizjorge@gmail.com
 * @copyright  2011 Sinergy
 * @license    PHP License 3.0
 * @version    Release: 1.0
 * @since      1.0
 */

class Usuario_model extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	/**
	 * @desc trae el listado de usuario desde la base de datos
	 */
	function getListaUsuarios() {
		return $this -> db -> get('usuario');
	}

	/**
	 * @desc trae un usuario a partir del id
	 * @param $idUsuario id del usuario a buscar
	 */
	function getUsuario($idUsuario) {
		$this -> db -> where('idusuario', $idUsuario);
		return $this -> db -> get('usuario');
	}

	function inserta_usuario($datos = array()) {
		$this -> db -> insert('usuario', $datos);
		return $this -> db -> insert_id();
	}

	function actualiza_usuario($datos = array(),$idusuario) {
		$this -> db -> where('idusuario', $idusuario);
		$this -> db -> update('usuario', $datos);
	}
	
	function borrar_usuario($idusuario){
		$this -> db -> where('idusuario', $idusuario);
		$this -> db -> delete('usuario');
	}

}
?>