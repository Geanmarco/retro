<?php


	require_once "app/models/vmodel.php";
	require_once "app/models/Cliente.php";
	require_once "app/models/Orden_trabajo.php";
	require_once "app/models/Orden_trabajo_tipo.php";
	require "vendor/autoload.php";

	use Dompdf\Dompdf;

	#class Orden_trabajo extends vmodel
	class OrdenTrabajoController extends Controller
	{
		public function __construct() {
			parent::__construct();
		}

		public function orden_trabajo() {
			$this->orden_trabajo = new Orden_trabajo();
			$ordenes = $this->orden_trabajo->getAll();

			$this->orden_trabajo_tipo = new Orden_trabajo_tipo();
			$ordenes_tipo = $this->orden_trabajo_tipo->getAll();
			return $this->view("fragment-views/cliente/orden-trabajo", ["ordenes" => $ordenes, "ordenes_tipo" => $ordenes_tipo]);
		}

		public function lista() {
			$this->orden_trabajo = new Orden_trabajo();
			$ordenes = $this->orden_trabajo->getAll();

			return $this->view("fragment-views/cliente/orden-trabajo-lista", ["ordenes" => $ordenes]);
		}

		public function exportar($id) {
			$dompdf = new Dompdf();
			$url = DOMINIO . "/orden-trabajo/documento/$id/1"; // Reemplaza esta URL con la que desees

			$options = [
				"ssl" => [
					"verify_peer" => false,
					"verify_peer_name" => false,
				],
			];

			$html = file_get_contents($url, false, stream_context_create($options));
			#$html = file_get_contents($url);
			/*var_dump($html);
			die();*/
			$options = $dompdf->getOptions();
			$options->set(array('isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true));
			$dompdf->setOptions($options);

			$dompdf->loadHtml("$html");
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			$dompdf->stream("GEAN.pdf", array("Attachment" => false));
			die();
		}

		public function documento($id, $generar = 0) {
			$this->orden_trabajo = new Orden_trabajo();
			$orden = $this->orden_trabajo->get($id);
			return $this->view("fragment-views/cliente/orden-trabajo-pdf", ["orden" => $orden, "generar" => $generar == 1 ? true : false]);
		}

		/*public function visulizar($id) {
			$this->cliente = new Cliente();
			$datos = $this->cliente->getAllData();
			return $this->view("fragment-views/cliente/orden-trabajo-pdf", ["id" => $id, "datos" => $datos]);
		}*/

		public function get($id) {
			$this->orden_trabajo = new Orden_trabajo();
			$datos = $this->orden_trabajo->get($id);
			echo json_encode(['res' => $datos]);
		}

		public function save() {
			$this->cliente = new Cliente();
			$this->orden_trabajo = new Orden_trabajo();
			$this->orden_trabajo_tipo = new Orden_trabajo_tipo();
			$orden = $_POST['orden'];
			$orden['idcliente'] = $orden['idcliente'] ?? '';


			if (!is_numeric($orden['idcliente']) or $orden['idcliente'] == '0'):
				$cliente = $this->cliente->get($orden['num_doc']);
				$orden['idcliente'] = $cliente->id_cliente;
			endif;

			#$orden['lugar'] = $orden['departamento'] . ' - ' . $orden['provincia'] . ' - ' . $orden['distrito'];

			$tipo = $this->orden_trabajo_tipo->get($orden['idorden']);
			$orden['num_orden'] = $tipo->siguiente_serie;
			$result = $this->orden_trabajo->set($orden);

			echo json_encode(['res' => $result]);
		}

		public function update() {
			$this->orden_trabajo = new Orden_trabajo();

			$orden = $_POST['orden'];

			#$orden['lugar'] = $orden['departamento'] . ' - ' . $orden['provincia'] . ' - ' . $orden['distrito'];
			$result = $this->orden_trabajo->update($orden, $orden['id']);
			echo json_encode(['res' => $result]);
		}

		public function delete($id) {
			$this->orden_trabajo = new Orden_trabajo();
			$result = $this->orden_trabajo->delete($id);
			echo json_encode(['res' => $result]);
		}
	}
