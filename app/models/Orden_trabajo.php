<?php

	require_once "app/models/vmodel.php";

	class Orden_trabajo extends vmodel
	{
		private $table = 'orden_trabajo';
		private $id;
		private $idCliente;
		private $idOrden;
		private $numOrden;
		private $lugar;
		private $fecha;
		private $fechaUpdate;
		private $estado;

		public function __construct() {
			parent::__construct($this->table);
		}

// Métodos Set
		public function setId($id) {
			$this->id = $id;
		}

		public function setIdCliente($idCliente) {
			$this->idCliente = $idCliente;
		}

		public function setIdOrden($idOrden) {
			$this->idOrden = $idOrden;
		}

		public function setNumOrden($numOrden) {
			$this->numOrden = $numOrden;
		}

		public function setLugar($lugar) {
			$this->lugar = $lugar;
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

		public function getIdCliente() {
			return $this->idCliente;
		}

		public function getIdOrden() {
			return $this->idOrden;
		}

		public function getNumOrden() {
			return $this->numOrden;
		}

		public function getLugar() {
			return $this->lugar;
		}

		public function getFecha() {
			return $this->fecha;
		}

		public function getFechaUpdate() {
			return $this->fechaUpdate;
		}

		public function getEstado() {
			return $this->estado;
		}

		public function getAll() {
			$sql = "SELECT * FROM vw_ot  ORDER BY fecha DESC";
			return $this->selectAll($sql);
		}

		public function get($id) {
			$sql = "SELECT * FROM vw_ot WHERE id=$id";
			return $this->select($sql);
		}

		public function set($vars) {
			$datos = $this->getInputs($vars);
			$sql = "INSERT INTO $this->table SET $datos ";
			return $this->ejecutar($sql);
		}

		public function update($vars, $id) {
			$datos = $this->getInputs($vars);
			$sql = "UPDATE $this->table SET $datos  WHERE id=$id";
			return $this->ejecutar($sql);
		}

		public function delete($id) {
			$sql = "DELETE FROM $this->table WHERE id=$id";
			return $this->ejecutar($sql);
		}
	}
