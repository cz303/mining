<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_IOFactory
{
	
	private static $V5cmx5qggzwc = array(
		array( 'type' => 'IWriter', 'path' => 'PHPExcel/Writer/{0}.php', 'class' => 'PHPExcel_Writer_{0}' ),
		array( 'type' => 'IReader', 'path' => 'PHPExcel/Reader/{0}.php', 'class' => 'PHPExcel_Reader_{0}' )
	);

	
	private static $Vtr5s3abuvss = array(
		'Excel2007',
		'Excel5',
		'Excel2003XML',
		'OOCalc',
		'SYLK',
		'Gnumeric',
		'HTML',
		'CSV',
	);

    
    private function __construct() { }

    
	public static function getSearchLocations() {
		return self::$V5cmx5qggzwc;
	}	

	
	public static function setSearchLocations($Vp4xjtpabm0l) {
		if (is_array($Vp4xjtpabm0l)) {
			self::$V5cmx5qggzwc = $Vp4xjtpabm0l;
		} else {
			throw new PHPExcel_Reader_Exception('Invalid parameter passed.');
		}
	}	

	
	public static function addSearchLocation($V4pigtpor0ln = '', $Vw220v45occ4 = '', $Vospeadwifot = '') {
		self::$V5cmx5qggzwc[] = array( 'type' => $V4pigtpor0ln, 'path' => $Vw220v45occ4, 'class' => $Vospeadwifot );
	}	

	
	public static function createWriter(PHPExcel $Vlspthbp3hwz, $Vbc2bgdied15 = '') {
		
		$Vli505tcicbe = 'IWriter';

		
		foreach (self::$V5cmx5qggzwc as $Vmrs2as0kvht) {
			if ($Vmrs2as0kvht['type'] == $Vli505tcicbe) {
				$Vlnozcmllc4v = str_replace('{0}', $Vbc2bgdied15, $Vmrs2as0kvht['class']);

				$Vz1qvyizgpuq = new $Vlnozcmllc4v($Vlspthbp3hwz);
				if ($Vz1qvyizgpuq !== NULL) {
					return $Vz1qvyizgpuq;
				}
			}
		}

		
		throw new PHPExcel_Reader_Exception("No $Vli505tcicbe found for type $Vbc2bgdied15");
	}	

	
	public static function createReader($Vwipnxsh404k = '') {
		
		$Vli505tcicbe = 'IReader';

		
		foreach (self::$V5cmx5qggzwc as $Vmrs2as0kvht) {
			if ($Vmrs2as0kvht['type'] == $Vli505tcicbe) {
				$Vlnozcmllc4v = str_replace('{0}', $Vwipnxsh404k, $Vmrs2as0kvht['class']);

				$Vz1qvyizgpuq = new $Vlnozcmllc4v();
				if ($Vz1qvyizgpuq !== NULL) {
					return $Vz1qvyizgpuq;
				}
			}
		}

		
		throw new PHPExcel_Reader_Exception("No $Vli505tcicbe found for type $Vwipnxsh404k");
	}	

	
	public static function load($V1tltbb5c5oc) {
		$Vlig2h1nz33u = self::createReaderForFile($V1tltbb5c5oc);
		return $Vlig2h1nz33u->load($V1tltbb5c5oc);
	}	

	
	public static function identify($V1tltbb5c5oc) {
		$Vlig2h1nz33u = self::createReaderForFile($V1tltbb5c5oc);
		$Vlnozcmllc4v = get_class($Vlig2h1nz33u);
		$Vesyuglnqnuy = explode('_',$Vlnozcmllc4v);
		unset($Vlig2h1nz33u);
		return array_pop($Vesyuglnqnuy);
	}	

	
	public static function createReaderForFile($V1tltbb5c5oc) {

		
		$Vri3txdgh3ml = pathinfo($V1tltbb5c5oc);

		$Vvgslbfv4puk = NULL;
		if (isset($Vri3txdgh3ml['extension'])) {
			switch (strtolower($Vri3txdgh3ml['extension'])) {
				case 'xlsx':			
				case 'xlsm':			
				case 'xltx':			
				case 'xltm':			
					$Vvgslbfv4puk = 'Excel2007';
					break;
				case 'xls':				
				case 'xlt':				
					$Vvgslbfv4puk = 'Excel5';
					break;
				case 'ods':				
				case 'ots':				
					$Vvgslbfv4puk = 'OOCalc';
					break;
				case 'slk':
					$Vvgslbfv4puk = 'SYLK';
					break;
				case 'xml':				
					$Vvgslbfv4puk = 'Excel2003XML';
					break;
				case 'gnumeric':
					$Vvgslbfv4puk = 'Gnumeric';
					break;
				case 'htm':
				case 'html':
					$Vvgslbfv4puk = 'HTML';
					break;
				case 'csv':
					
					
					
					break;
				default:
					break;
			}

			if ($Vvgslbfv4puk !== NULL) {
				$Vlig2h1nz33u = self::createReader($Vvgslbfv4puk);
				
				if (isset($Vlig2h1nz33u) && $Vlig2h1nz33u->canRead($V1tltbb5c5oc)) {
					return $Vlig2h1nz33u;
				}
			}
		}

		
		
		foreach (self::$Vtr5s3abuvss as $V45w11t5zl12) {
			
			if ($V45w11t5zl12 !== $Vvgslbfv4puk) {
				$Vlig2h1nz33u = self::createReader($V45w11t5zl12);
				if ($Vlig2h1nz33u->canRead($V1tltbb5c5oc)) {
					return $Vlig2h1nz33u;
				}
			}
		}

		throw new PHPExcel_Reader_Exception('Unable to identify a reader for this file');
	}	
}
