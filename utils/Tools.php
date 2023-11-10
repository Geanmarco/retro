<?php


	class Tools
	{

		public static function encryptText($text) {
			$ciphering = "AES-128-CTR";
			$options = 0;
			$encryption_iv = '1234567891011121';
			return openssl_encrypt($text, $ciphering,
				KEY_ENCRYPT, $options, $encryption_iv);
		}

		public static function decryptText($text) {
			$decryption_iv = '1234567891011121';
			$ciphering = "AES-128-CTR";
			$options = 0;
			return openssl_decrypt($text, $ciphering,
				KEY_ENCRYPT, $options, $decryption_iv);
		}

		public static function onlyNumber($txt) {
			$txt = str_replace('-', '', $txt);
			return preg_replace('([^0-9])', '', $txt);
		}

		public static function onlyMoney($txt, $mayuscula = null) {
			return preg_replace('([^0-9.])', '', $txt);
		}

		public static function onlyTrim($txt) {
			$txt = str_replace(' ', '', $txt);
			$txt = ltrim(rtrim($txt));
			return $txt;
		}

		public static function numeroParaDocumento($numero, $cnt0) {
			$num = "" . $numero;
			if (strlen($num)<$cnt0) {
				for ($i = strlen($numero); $i<=$cnt0; $i++) {
					$num = "0" . $num;
				}
			}

			return $num;
		}

		public static function getIPAddressClient() {
			//whether ip is from the share internet
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = "IP CLIENT SHARE INTERNET-:" . $_SERVER['HTTP_CLIENT_IP'];
			} //whether ip is from the proxy
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = "IP CLIENT PROXY-:" . $_SERVER['HTTP_X_FORWARDED_FOR'];
			} //whether ip is from the remote address
			else {
				$ip = "IP CLIENT-:" . $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

		public static function getInfoDeviceConect() {
			$body_class = 'desktop';
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
				$body_class = "tablet";
			}
			if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
				$body_class = "mobile";
			}
			if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
				$body_class = "mobile";
			}
			return $body_class;
		}

		public static function formatNumbrePorcentual($numero, $total) {
			return number_format(($numero * 100) / $total, 2, '.', ',') . '%';
		}

		public static function formatNumbre($numero, $decimal = true) {
			if ($decimal) {
				return number_format($numero, 2, '.', ',');
			} else {
				return number_format($numero, 0, '', ',');
			}

		}

		public static function obtenerIdioma() {
			$idioma = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
			return $idioma;
		}

		public static function getToken($length) {
			$token = "";
			$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
			$codeAlphabet .= "0123456789";
			$max = strlen($codeAlphabet);

			for ($i = 0; $i<$length; $i++) {
				$token .= $codeAlphabet[random_int(0, $max - 1)];
			}

			return $token;
		}

		public static function abreviaturaMes($mes) {
			$meses = array("EN", "FEBR", "MZO", "ABR", "MY", "JUN", "JUL", "AGTO", "SPT", "OCT", "NOV", "DIC");

			return $meses[$mes];

		}

		public static function abreviaturaMesIngles($mes) {
			$meses = array("JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY", "AUG", "SEPT", "OCT", "NOV", "DEC");

			return $meses[$mes];

		}

		public static function nombreMes($mes) {
			$meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');

			return $meses[$mes];

		}

		public static function money($n) {
			$m = number_format($n, 2, '.', ',');
			return $m;
		}

		public static function encrypt($string) {
			return base64_encode(base64_encode($string));
		}

		public static function prettyPrint($array) {
			echo '<pre>';
			var_dump($array);
			echo '</pre>';
		}

		public static function onlyTextNoHtml($text) {
			return trim(strip_tags($text));
		}

		public static function formatoFechaVisualAbr($fecha) {
			$fecha = new DateTime($fecha);
			return $fecha->format('d') . " " . self::abreviaturaMes(intval($fecha->format('m')) - 1) . ", " . $fecha->format('Y');
		}

		public static function formatoFechaVisual($fecha) {
			$fecha = new DateTime($fecha);
			return self::nombreMes(intval($fecha->format('m')) - 1) . " " . $fecha->format('d') . " del, " . $fecha->format('Y');
		}

		public static function formatoHora($fecha) {
			$fecha = new DateTime("$fecha");
			return $fecha->format('h:i a');
		}

		public static function formatoFechaNumero($fecha) {
			$fecha = new DateTime("$fecha");
			return $fecha->format('d/m/Y');
		}

		public static function formatoFecha($fecha) {
			$fecha = new DateTime("$fecha");
			return $fecha->format('Y-m-d');
		}

		public static function decrypt($string) {
			return base64_decode(base64_decode($string));
		}

		public static function getBaseEspaniol() {
			return json_decode(file_get_contents("utils/idiomas/espaniol.json"), true);
		}

		public static function getBaseIngles() {
			return json_decode(file_get_contents("utils/idiomas/espaniol.json"), true);
		}

		public static function tipohistoalClass($tip) {
			switch ($tip) {
				case 'is':
					return 'feed-item-secondary';
				default:
					return "";
			}
		}

		public static function textHistoalMsg($tip) {
			switch ($tip) {
				case 'is':
					return 'Inicio Sesion de Usuario';
				default:
					return "";
			}
		}

		public static function array_find_obj($array, $colum, $value, $hass = false, $tiene = true) {
			$index = isset($array['index']) ? true : false;
			$array = $array['index'] ?? $array;

			$values = new stdClass();
			$values->colum = $colum;
			$values->value = $value;
			$values->tiene = $tiene;
			$values->hass = $hass;

			$result = array_filter($array, function ($item) use ($values) {
				$item = (array)$item;

				if (Tools::onlyTrim($values->colum) == '')
					return false;

				if (!isset($item[$values->colum]))
					return false;

				if ($values->hass):
					if (Tools::hasText($item[$values->colum], $values->value) == $values->tiene):
						return true;
					else:
						return false;
					endif;
				endif;

				if (rtrim(ltrim(Tools::onlyReduceToOneSpace($item[$values->colum]))) == rtrim(ltrim(Tools::onlyReduceToOneSpace($values->value)))):
					return true;
				else:
					return false;
				endif;
			});
			$result = is_null($result) ? [] : $result;
			if ($index)
				return $result;
			else
				return array_values($result);
		}


		function hasText($text, $tiene, $minuscula = true) {
			if ($minuscula):
				$text = strtolower($text);
				$tiene = strtolower($tiene);
			endif;
			return is_numeric(strpos($text, "$tiene")) ? true : false;
		}

		function onlyReduceToOneSpace($txt) {
			return preg_replace("/\s+/", " ", trim($txt));
		}

		function arrayToString($txt, $delimit) {
			#if (count($txt) == 0)
			return implode($delimit, $txt);
			#else
			#	return '';
		}

	}