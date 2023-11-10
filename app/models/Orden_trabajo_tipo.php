<?php
	require_once "app/models/vmodel.php";

	class Orden_trabajo_tipo extends vmodel
	{
		private $table = 'orden_trabajo_tipo';
		private $id;
		private $nombre;
		private $serie;
		private $numOrden;
		private $fecha;
		private $estado;

		public function __construct() {
			parent::__construct();
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setSerie($serie) {
			$this->serie = $serie;
		}

		public function setNumOrden($numOrden) {
			$this->numOrden = $numOrden;
		}

		public function setFecha($fecha) {
			$this->fecha = $fecha;
		}

		public function setEstado($estado) {
			$this->estado = $estado;
		}

// Métodos Get
		public function getId() {
			return $this->id;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getSerie() {
			return $this->serie;
		}

		public function getNumOrden() {
			return $this->numOrden;
		}

		public function getFecha() {
			return $this->fecha;
		}

		public function getEstado() {
			return $this->estado;
		}

		public function getAll() {
			$sql = "SELECT * FROM orden_trabajo_tipo";
			return $this->selectAll($sql);
		}

		public function get($id) {
			$sql = "SELECT * FROM orden_trabajo_tipo WHERE id=$id";
			return $this->select($sql);
		}
	}

