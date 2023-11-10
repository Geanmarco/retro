<?php


	class vmodel
	{
		private $table = '';
		private $datos_tabla = [];
		private $colums = [];
		private $typescolum = [];

		public function __construct($table = '') {
			$this->table = $table;
			$this->conectar = (new Conexion())->getConexion();
		}

		public function selectAll($sql) {
			$fila = mysqli_query($this->conectar, $sql);
			$filasAsociativas = mysqli_fetch_all($fila, MYSQLI_ASSOC);
			$resultados = array_map(function ($fila) {
				return (object)$fila;
			}, $filasAsociativas);
			return $resultados;
		}

		public function select($sql) {
			$fila = mysqli_query($this->conectar, $sql);
			$filaAsociativa = mysqli_fetch_assoc($fila);
			$resultado = (object)$filaAsociativa;
			return $resultado;
		}

		public function ejecutar($sql) {
			$resultado = mysqli_query($this->conectar, $sql);
			if ($resultado) {
				return true; // La inserción fue exitosa
			} else {
				return false; // Hubo un error durante la inserción
			}
		}

		function getInputs($isPOST = true) {

			$colums = $this->columns();
			/*console($colums);*/
			if (is_object($isPOST))
				$vars = (array)$isPOST;
			elseif (is_array($isPOST))
				$vars = $isPOST;
			else
				$vars = $isPOST ? $_POST : $_GET;

			$this->primaryKey = Tools::array_find_obj($this->datos_tabla, 'Key', 'PRI');
			$this->primaryKey = $this->primaryKey[0]->Field ?? '';

			$inputs = [];

			foreach ($vars as $key => $m):


				if (is_array($m))
					continue;

				if (!array_search($key, $colums)):
					unset($vars[$key]);
					continue;
				endif;
				$inputs[] = "$key='$m'";
			endforeach;

			$this->inputs = Tools::arrayToString($inputs, ',');
			return $this->inputs;
		}

		function columns() {
			$sql = "SHOW COLUMNS FROM $this->table;";

			$colum = $this->selectAll($sql);
			$this->datos_tabla = $colum;
			$this->colums = array_column($colum, 'Field');
			$this->typescolum = array_column($colum, 'Type');
			return $this->colums;
		}


	}
