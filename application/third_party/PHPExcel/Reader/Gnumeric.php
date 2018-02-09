<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_Gnumeric extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vvwpgv3qy1lw = array();

	
	private $Vbf0ic0dgw1f = array();

	private $Vrgbigpyawwq = null;


	
	public function __construct() {
		$this->_readFilter 	= new PHPExcel_Reader_DefaultReadFilter();
		$this->_referenceHelper = PHPExcel_ReferenceHelper::getInstance();
	}


	
	public function canRead($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		
		if (!function_exists('gzread')) {
			throw new PHPExcel_Reader_Exception("gzlib library is not enabled");
		}

		
		$Vpo2b1kin4yt = fopen($V1tltbb5c5oc, 'r');
		$Vou4vxorrdoe = fread($Vpo2b1kin4yt, 2);
		fclose($Vpo2b1kin4yt);

		if ($Vou4vxorrdoe != chr(0x1F).chr(0x8B)) {
			return false;
		}

		return true;
	}


	
	public function listWorksheetNames($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vkrzhpletdu1 = new XMLReader();
		$Vkrzhpletdu1->open(
			'compress.zlib://'.realpath($V1tltbb5c5oc), null, PHPExcel_Settings::getLibXmlLoaderOptions()
		);
		$Vkrzhpletdu1->setParserProperty(2,true);

		$Vgeqndxyegdu = array();
		while ($Vkrzhpletdu1->read()) {
			if ($Vkrzhpletdu1->name == 'gnm:SheetName' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
			    $Vkrzhpletdu1->read();	
				$Vgeqndxyegdu[] = (string) $Vkrzhpletdu1->value;
			} elseif ($Vkrzhpletdu1->name == 'gnm:Sheets') {
				
				break;
			}
		}

		return $Vgeqndxyegdu;
	}


	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vkrzhpletdu1 = new XMLReader();
		$Vkrzhpletdu1->open(
			'compress.zlib://'.realpath($V1tltbb5c5oc), null, PHPExcel_Settings::getLibXmlLoaderOptions()
		);
		$Vkrzhpletdu1->setParserProperty(2,true);

		$V2rvssyhthui = array();
		while ($Vkrzhpletdu1->read()) {
			if ($Vkrzhpletdu1->name == 'gnm:Sheet' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
				$V1jil0euskeo = array(
					'worksheetName' => '',
					'lastColumnLetter' => 'A',
					'lastColumnIndex' => 0,
					'totalRows' => 0,
					'totalColumns' => 0,
				);

				while ($Vkrzhpletdu1->read()) {
					if ($Vkrzhpletdu1->name == 'gnm:Name' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
					    $Vkrzhpletdu1->read();	
						$V1jil0euskeo['worksheetName'] = (string) $Vkrzhpletdu1->value;
					} elseif ($Vkrzhpletdu1->name == 'gnm:MaxCol' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
					    $Vkrzhpletdu1->read();	
						$V1jil0euskeo['lastColumnIndex'] = (int) $Vkrzhpletdu1->value;
						$V1jil0euskeo['totalColumns'] = (int) $Vkrzhpletdu1->value + 1;
					} elseif ($Vkrzhpletdu1->name == 'gnm:MaxRow' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
					    $Vkrzhpletdu1->read();	
						$V1jil0euskeo['totalRows'] = (int) $Vkrzhpletdu1->value + 1;
						break;
					}
				}
				$V1jil0euskeo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V1jil0euskeo['lastColumnIndex']);
				$V2rvssyhthui[] = $V1jil0euskeo;
			}
		}

		return $V2rvssyhthui;
	}


	private function _gzfileGetContents($Vv0mtkrhebac) {
		$Vg5mhfl1beoi = @gzopen($Vv0mtkrhebac, 'rb');
		if ($Vg5mhfl1beoi !== false) {
			$Vou4vxorrdoe = '';
			while (!gzeof($Vg5mhfl1beoi)) {
				$Vou4vxorrdoe .= gzread($Vg5mhfl1beoi, 1024);
			}
			gzclose($Vg5mhfl1beoi);
		}
		return $Vou4vxorrdoe;
	}


	
	public function load($V1tltbb5c5oc)
	{
		
		$Vkggi1o2uo0k = new PHPExcel();

		
		return $this->loadIntoExisting($V1tltbb5c5oc, $Vkggi1o2uo0k);
	}


	
	public function loadIntoExisting($V1tltbb5c5oc, PHPExcel $Vkggi1o2uo0k)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vumezogt24ba = new DateTimeZone('Europe/London');
		$Vc4ppryfwlvh = new DateTimeZone('UTC');

		$Vfw3cvwvxxou = $this->_gzfileGetContents($V1tltbb5c5oc);





		$Vkrzhpletdu1 = simplexml_load_string($Vfw3cvwvxxou, 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vtivklydjvym = $Vkrzhpletdu1->getNamespaces(true);



		$Vkatdinscjsn = $Vkrzhpletdu1->children($Vtivklydjvym['gnm']);

		$Vawihaxurfzl = $Vkggi1o2uo0k->getProperties();
		
		if (isset($Vtivklydjvym['office'])) {
			$Vurnyiwzop1z = $Vkrzhpletdu1->children($Vtivklydjvym['office']);
		    $Vmgqtjc2u4hq = $Vurnyiwzop1z->{'document-meta'};
			$V0nhwaxktxvh = $Vmgqtjc2u4hq->meta;

			foreach($V0nhwaxktxvh as $Vlxnro5ctcs1) {

				$Vcsvljwgwv2d = array();
				if (isset($Vtivklydjvym['dc'])) {
					$Vcsvljwgwv2d = $Vlxnro5ctcs1->children($Vtivklydjvym['dc']);
				}
				foreach($Vcsvljwgwv2d as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
					$Vybj4yv3ywl1 = (string) $Vybj4yv3ywl1;
					switch ($Vrdimrb3fnt2) {
						case 'title' :
								$Vawihaxurfzl->setTitle(trim($Vybj4yv3ywl1));
								break;
						case 'subject' :
								$Vawihaxurfzl->setSubject(trim($Vybj4yv3ywl1));
								break;
						case 'creator' :
								$Vawihaxurfzl->setCreator(trim($Vybj4yv3ywl1));
								$Vawihaxurfzl->setLastModifiedBy(trim($Vybj4yv3ywl1));
								break;
						case 'date' :
								$Vhpl04bm1xnl = strtotime(trim($Vybj4yv3ywl1));
								$Vawihaxurfzl->setCreated($Vhpl04bm1xnl);
								$Vawihaxurfzl->setModified($Vhpl04bm1xnl);
								break;
						case 'description' :
								$Vawihaxurfzl->setDescription(trim($Vybj4yv3ywl1));
								break;
					}
				}
				$Vcymoapznj0l = array();
				if (isset($Vtivklydjvym['meta'])) {
					$Vcymoapznj0l = $Vlxnro5ctcs1->children($Vtivklydjvym['meta']);
				}
				foreach($Vcymoapznj0l as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
					$Vmpqeek4lrvw = $Vybj4yv3ywl1->attributes($Vtivklydjvym['meta']);
					$Vybj4yv3ywl1 = (string) $Vybj4yv3ywl1;
					switch ($Vrdimrb3fnt2) {
						case 'keyword' :
								$Vawihaxurfzl->setKeywords(trim($Vybj4yv3ywl1));
								break;
						case 'initial-creator' :
								$Vawihaxurfzl->setCreator(trim($Vybj4yv3ywl1));
								$Vawihaxurfzl->setLastModifiedBy(trim($Vybj4yv3ywl1));
								break;
						case 'creation-date' :
								$Vhpl04bm1xnl = strtotime(trim($Vybj4yv3ywl1));
								$Vawihaxurfzl->setCreated($Vhpl04bm1xnl);
								$Vawihaxurfzl->setModified($Vhpl04bm1xnl);
								break;
						case 'user-defined' :
								list(,$Vs5rjajpbxw3) = explode(':',$Vmpqeek4lrvw['name']);
								switch ($Vs5rjajpbxw3) {
									case 'publisher' :
											$Vawihaxurfzl->setCompany(trim($Vybj4yv3ywl1));
											break;
									case 'category' :
											$Vawihaxurfzl->setCategory(trim($Vybj4yv3ywl1));
											break;
									case 'manager' :
											$Vawihaxurfzl->setManager(trim($Vybj4yv3ywl1));
											break;
								}
								break;
					}
				}
			}
		} elseif (isset($Vkatdinscjsn->Summary)) {
			foreach($Vkatdinscjsn->Summary->Item as $Viiqmj3np1gn) {
				$Vrdimrb3fnt2 = $Viiqmj3np1gn->name;
				$Vybj4yv3ywl1 = $Viiqmj3np1gn->{'val-string'};
				switch ($Vrdimrb3fnt2) {
					case 'title' :
						$Vawihaxurfzl->setTitle(trim($Vybj4yv3ywl1));
						break;
					case 'comments' :
						$Vawihaxurfzl->setDescription(trim($Vybj4yv3ywl1));
						break;
					case 'keywords' :
						$Vawihaxurfzl->setKeywords(trim($Vybj4yv3ywl1));
						break;
					case 'category' :
						$Vawihaxurfzl->setCategory(trim($Vybj4yv3ywl1));
						break;
					case 'manager' :
						$Vawihaxurfzl->setManager(trim($Vybj4yv3ywl1));
						break;
					case 'author' :
						$Vawihaxurfzl->setCreator(trim($Vybj4yv3ywl1));
						$Vawihaxurfzl->setLastModifiedBy(trim($Vybj4yv3ywl1));
						break;
					case 'company' :
						$Vawihaxurfzl->setCompany(trim($Vybj4yv3ywl1));
						break;
				}
			}
		}

		$Vdtbkwjivkjf = 0;
		foreach($Vkatdinscjsn->Sheets->Sheet as $Vzg4jtrmmzdy) {
			$Vuyz1szrcs1l = (string) $Vzg4jtrmmzdy->Name;

			if ((isset($this->_loadSheetsOnly)) && (!in_array($Vuyz1szrcs1l, $this->_loadSheetsOnly))) {
				continue;
			}

			$V3ywprpz53l2 = $Vg0k4u2of5zi = 0;

			
			$Vkggi1o2uo0k->createSheet();
			$Vkggi1o2uo0k->setActiveSheetIndex($Vdtbkwjivkjf);
			
			
			
			$Vkggi1o2uo0k->getActiveSheet()->setTitle($Vuyz1szrcs1l,false);

			if ((!$this->_readDataOnly) && (isset($Vzg4jtrmmzdy->PrintInformation))) {
				if (isset($Vzg4jtrmmzdy->PrintInformation->Margins)) {
					foreach($Vzg4jtrmmzdy->PrintInformation->Margins->children('gnm',TRUE) as $Vseq1edikdvg => $Vwnpual20vlo) {
						$Vwnpual20vloAttributes = $Vwnpual20vlo->attributes();
						$Vwnpual20vloSize = 72 / 100;	
						switch($Vwnpual20vloAttributes['PrefUnit']) {
							case 'mm' :
								$Vwnpual20vloSize = intval($Vwnpual20vloAttributes['Points']) / 100;
								break;
						}
						switch($Vseq1edikdvg) {
							case 'top' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setTop($Vwnpual20vloSize);
								break;
							case 'bottom' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setBottom($Vwnpual20vloSize);
								break;
							case 'left' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setLeft($Vwnpual20vloSize);
								break;
							case 'right' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setRight($Vwnpual20vloSize);
								break;
							case 'header' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setHeader($Vwnpual20vloSize);
								break;
							case 'footer' :
								$Vkggi1o2uo0k->getActiveSheet()->getPageMargins()->setFooter($Vwnpual20vloSize);
								break;
						}
					}
				}
			}

			foreach($Vzg4jtrmmzdy->Cells->Cell as $Vblc1ueqvbti) {
				$Vblc1ueqvbtiAttributes = $Vblc1ueqvbti->attributes();
				$Vexbtekafkvl = (int) $Vblc1ueqvbtiAttributes->Row + 1;
				$Vn4q2p4mkwa0 = (int) $Vblc1ueqvbtiAttributes->Col;

				if ($Vexbtekafkvl > $V3ywprpz53l2) $V3ywprpz53l2 = $Vexbtekafkvl;
				if ($Vn4q2p4mkwa0 > $Vg0k4u2of5zi) $Vg0k4u2of5zi = $Vn4q2p4mkwa0;

				$Vn4q2p4mkwa0 = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

				
				if ($this->getReadFilter() !== NULL) {
					if (!$this->getReadFilter()->readCell($Vn4q2p4mkwa0, $Vexbtekafkvl, $Vuyz1szrcs1l)) {
						continue;
					}
				}

				$Vanf0vrxfft2 = $Vblc1ueqvbtiAttributes->ValueType;
				$V2jbf33abwnl = (string) $Vblc1ueqvbtiAttributes->ExprID;



				$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_FORMULA;
				if ($V2jbf33abwnl > '') {
					if (((string) $Vblc1ueqvbti) > '') {

						$this->_expressions[$V2jbf33abwnl] = array( 'column'	=> $Vblc1ueqvbtiAttributes->Col,
															  'row'		=> $Vblc1ueqvbtiAttributes->Row,
															  'formula'	=> (string) $Vblc1ueqvbti
															);

					} else {
						$Vc5hd0lwrhoc = $this->_expressions[$V2jbf33abwnl];

						$Vblc1ueqvbti = $this->_referenceHelper->updateFormulaReferences( $Vc5hd0lwrhoc['formula'],
																				  'A1',
																				  $Vblc1ueqvbtiAttributes->Col - $Vc5hd0lwrhoc['column'],
																				  $Vblc1ueqvbtiAttributes->Row - $Vc5hd0lwrhoc['row'],
																				  $Vuyz1szrcs1l
																				);


					}
					$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_FORMULA;
				} else {
					switch($Vanf0vrxfft2) {
						case '10' :		
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NULL;
							break;
						case '20' :		
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_BOOL;
							$Vblc1ueqvbti = ($Vblc1ueqvbti == 'TRUE') ? True : False;
							break;
						case '30' :		
							$Vblc1ueqvbti = intval($Vblc1ueqvbti);
						case '40' :		
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
							break;
						case '50' :		
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_ERROR;
							break;
						case '60' :		
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_STRING;
							break;
						case '70' :		
						case '80' :		
					}
				}
				$Vkggi1o2uo0k->getActiveSheet()->getCell($Vn4q2p4mkwa0.$Vexbtekafkvl)->setValueExplicit($Vblc1ueqvbti,$V4pigtpor0ln);
			}

			if ((!$this->_readDataOnly) && (isset($Vzg4jtrmmzdy->Objects))) {
				foreach($Vzg4jtrmmzdy->Objects->children('gnm',TRUE) as $Vseq1edikdvg => $Vd25ttkxmgaf) {
					$Vd25ttkxmgafAttributes = $Vd25ttkxmgaf->attributes();
					
					if ($Vd25ttkxmgafAttributes->Text) {
						$Vkggi1o2uo0k->getActiveSheet()->getComment( (string)$Vd25ttkxmgafAttributes->ObjectBound )
															->setAuthor( (string)$Vd25ttkxmgafAttributes->Author )
															->setText($this->_parseRichText((string)$Vd25ttkxmgafAttributes->Text) );
					}
				}
			}


			foreach($Vzg4jtrmmzdy->Styles->StyleRegion as $Vvzqolp32byq) {
				$Vjj114sneklk = $Vvzqolp32byq->attributes();
				if (($Vjj114sneklk['startRow'] <= $V3ywprpz53l2) &&
					($Vjj114sneklk['startCol'] <= $Vg0k4u2of5zi)) {

					$V4srf4uueq2t = PHPExcel_Cell::stringFromColumnIndex((int) $Vjj114sneklk['startCol']);
					$V5jh0lozltx0 = $Vjj114sneklk['startRow'] + 1;

					$Vuzstcwt0kob = ($Vjj114sneklk['endCol'] > $Vg0k4u2of5zi) ? $Vg0k4u2of5zi : (int) $Vjj114sneklk['endCol'];
					$Vuzstcwt0kob = PHPExcel_Cell::stringFromColumnIndex($Vuzstcwt0kob);
					$Vx4v30gyjp2b = ($Vjj114sneklk['endRow'] > $V3ywprpz53l2) ? $V3ywprpz53l2 : $Vjj114sneklk['endRow'];
					$Vx4v30gyjp2b += 1;
					$Vblc1ueqvbtiRange = $V4srf4uueq2t.$V5jh0lozltx0.':'.$Vuzstcwt0kob.$Vx4v30gyjp2b;


					$Vjj114sneklk = $Vvzqolp32byq->Style->attributes();



					
					if ((!$this->_readDataOnly) ||
						(PHPExcel_Shared_Date::isDateTimeFormatCode((string) $Vjj114sneklk['Format']))) {
						$Vldnaod3wmnp = array();
						$Vldnaod3wmnp['numberformat']['code'] = (string) $Vjj114sneklk['Format'];
						
						if (!$this->_readDataOnly) {
							switch($Vjj114sneklk['HAlign']) {
								case '1' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_GENERAL;
									break;
								case '2' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
									break;
								case '4' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
									break;
								case '8' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
									break;
								case '16' :
								case '64' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS;
									break;
								case '32' :
									$Vldnaod3wmnp['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY;
									break;
							}

							switch($Vjj114sneklk['VAlign']) {
								case '1' :
									$Vldnaod3wmnp['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_TOP;
									break;
								case '2' :
									$Vldnaod3wmnp['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
									break;
								case '4' :
									$Vldnaod3wmnp['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_CENTER;
									break;
								case '8' :
									$Vldnaod3wmnp['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_JUSTIFY;
									break;
							}

							$Vldnaod3wmnp['alignment']['wrap'] = ($Vjj114sneklk['WrapText'] == '1') ? True : False;
							$Vldnaod3wmnp['alignment']['shrinkToFit'] = ($Vjj114sneklk['ShrinkToFit'] == '1') ? True : False;
							$Vldnaod3wmnp['alignment']['indent'] = (intval($Vjj114sneklk["Indent"]) > 0) ? $Vjj114sneklk["indent"] : 0;

							$Vqqfb3nx2wif = self::_parseGnumericColour($Vjj114sneklk["Fore"]);
							$Vldnaod3wmnp['font']['color']['rgb'] = $Vqqfb3nx2wif;
							$Vqqfb3nx2wif = self::_parseGnumericColour($Vjj114sneklk["Back"]);
							$Vvz5r0g3bnyz = $Vjj114sneklk["Shade"];
							if (($Vqqfb3nx2wif != '000000') || ($Vvz5r0g3bnyz != '0')) {
								$Vldnaod3wmnp['fill']['color']['rgb'] = $Vldnaod3wmnp['fill']['startcolor']['rgb'] = $Vqqfb3nx2wif;
								$Vqqfb3nx2wif2 = self::_parseGnumericColour($Vjj114sneklk["PatternColor"]);
								$Vldnaod3wmnp['fill']['endcolor']['rgb'] = $Vqqfb3nx2wif2;
								switch($Vvz5r0g3bnyz) {
									case '1' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_SOLID;
										break;
									case '2' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR;
										break;
									case '3' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_GRADIENT_PATH;
										break;
									case '4' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN;
										break;
									case '5' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY;
										break;
									case '6' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID;
										break;
									case '7' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL;
										break;
									case '8' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS;
										break;
									case '9' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKUP;
										break;
									case '10' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL;
										break;
									case '11' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625;
										break;
									case '12' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_GRAY125;
										break;
									case '13' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN;
										break;
									case '14' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY;
										break;
									case '15' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID;
										break;
									case '16' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL;
										break;
									case '17' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS;
										break;
									case '18' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP;
										break;
									case '19' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL;
										break;
									case '20' :
										$Vldnaod3wmnp['fill']['type'] = PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY;
										break;
								}
							}

							$Vwdwxxb54nek = $Vvzqolp32byq->Style->Font->attributes();


							$Vldnaod3wmnp['font']['name'] = (string) $Vvzqolp32byq->Style->Font;
							$Vldnaod3wmnp['font']['size'] = intval($Vwdwxxb54nek['Unit']);
							$Vldnaod3wmnp['font']['bold'] = ($Vwdwxxb54nek['Bold'] == '1') ? True : False;
							$Vldnaod3wmnp['font']['italic'] = ($Vwdwxxb54nek['Italic'] == '1') ? True : False;
							$Vldnaod3wmnp['font']['strike'] = ($Vwdwxxb54nek['StrikeThrough'] == '1') ? True : False;
							switch($Vwdwxxb54nek['Underline']) {
								case '1' :
									$Vldnaod3wmnp['font']['underline'] = PHPExcel_Style_Font::UNDERLINE_SINGLE;
									break;
								case '2' :
									$Vldnaod3wmnp['font']['underline'] = PHPExcel_Style_Font::UNDERLINE_DOUBLE;
									break;
								case '3' :
									$Vldnaod3wmnp['font']['underline'] = PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING;
									break;
								case '4' :
									$Vldnaod3wmnp['font']['underline'] = PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING;
									break;
								default :
									$Vldnaod3wmnp['font']['underline'] = PHPExcel_Style_Font::UNDERLINE_NONE;
									break;
							}
							switch($Vwdwxxb54nek['Script']) {
								case '1' :
									$Vldnaod3wmnp['font']['superScript'] = True;
									break;
								case '-1' :
									$Vldnaod3wmnp['font']['subScript'] = True;
									break;
							}

							if (isset($Vvzqolp32byq->Style->StyleBorder)) {
								if (isset($Vvzqolp32byq->Style->StyleBorder->Top)) {
									$Vldnaod3wmnp['borders']['top'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Top->attributes());
								}
								if (isset($Vvzqolp32byq->Style->StyleBorder->Bottom)) {
									$Vldnaod3wmnp['borders']['bottom'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Bottom->attributes());
								}
								if (isset($Vvzqolp32byq->Style->StyleBorder->Left)) {
									$Vldnaod3wmnp['borders']['left'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Left->attributes());
								}
								if (isset($Vvzqolp32byq->Style->StyleBorder->Right)) {
									$Vldnaod3wmnp['borders']['right'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Right->attributes());
								}
								if ((isset($Vvzqolp32byq->Style->StyleBorder->Diagonal)) && (isset($Vvzqolp32byq->Style->StyleBorder->{'Rev-Diagonal'}))) {
									$Vldnaod3wmnp['borders']['diagonal'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Diagonal->attributes());
									$Vldnaod3wmnp['borders']['diagonaldirection'] = PHPExcel_Style_Borders::DIAGONAL_BOTH;
								} elseif (isset($Vvzqolp32byq->Style->StyleBorder->Diagonal)) {
									$Vldnaod3wmnp['borders']['diagonal'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->Diagonal->attributes());
									$Vldnaod3wmnp['borders']['diagonaldirection'] = PHPExcel_Style_Borders::DIAGONAL_UP;
								} elseif (isset($Vvzqolp32byq->Style->StyleBorder->{'Rev-Diagonal'})) {
									$Vldnaod3wmnp['borders']['diagonal'] = self::_parseBorderAttributes($Vvzqolp32byq->Style->StyleBorder->{'Rev-Diagonal'}->attributes());
									$Vldnaod3wmnp['borders']['diagonaldirection'] = PHPExcel_Style_Borders::DIAGONAL_DOWN;
								}
							}
							if (isset($Vvzqolp32byq->Style->HyperLink)) {
								
								$Vi45zv3gvg3s = $Vvzqolp32byq->Style->HyperLink->attributes();
							}
						}


						$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vblc1ueqvbtiRange)->applyFromArray($Vldnaod3wmnp);
					}
				}
			}

			if ((!$this->_readDataOnly) && (isset($Vzg4jtrmmzdy->Cols))) {
				
				$Vn4q2p4mkwa0Attributes = $Vzg4jtrmmzdy->Cols->attributes();
				$V2alccdqgbye = $Vn4q2p4mkwa0Attributes['DefaultSizePts']  / 5.4;
				$V4y0urwpnd3j = 0;
				foreach($Vzg4jtrmmzdy->Cols->ColInfo as $Vn4q2p4mkwa0Override) {
					$Vn4q2p4mkwa0Attributes = $Vn4q2p4mkwa0Override->attributes();
					$Vn4q2p4mkwa0 = $Vn4q2p4mkwa0Attributes['No'];
					$Vn4q2p4mkwa0Width = $Vn4q2p4mkwa0Attributes['Unit']  / 5.4;
					$Vlksmoyzk4it = ((isset($Vn4q2p4mkwa0Attributes['Hidden'])) && ($Vn4q2p4mkwa0Attributes['Hidden'] == '1')) ? true : false;
					$Vn4q2p4mkwa0Count = (isset($Vn4q2p4mkwa0Attributes['Count'])) ? $Vn4q2p4mkwa0Attributes['Count'] : 1;
					while ($V4y0urwpnd3j < $Vn4q2p4mkwa0) {
						$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3j))->setWidth($V2alccdqgbye);
						++$V4y0urwpnd3j;
					}
					while (($V4y0urwpnd3j < ($Vn4q2p4mkwa0+$Vn4q2p4mkwa0Count)) && ($V4y0urwpnd3j <= $Vg0k4u2of5zi)) {
						$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3j))->setWidth($Vn4q2p4mkwa0Width);
						if ($Vlksmoyzk4it) {
							$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3j))->setVisible(false);
						}
						++$V4y0urwpnd3j;
					}
				}
				while ($V4y0urwpnd3j <= $Vg0k4u2of5zi) {
					$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3j))->setWidth($V2alccdqgbye);
					++$V4y0urwpnd3j;
				}
			}

			if ((!$this->_readDataOnly) && (isset($Vzg4jtrmmzdy->Rows))) {
				
				$VexbtekafkvlAttributes = $Vzg4jtrmmzdy->Rows->attributes();
				$Vdpr3skkuank = $VexbtekafkvlAttributes['DefaultSizePts'];
				$Vws44nszhvgo = 0;

				foreach($Vzg4jtrmmzdy->Rows->RowInfo as $VexbtekafkvlOverride) {
					$VexbtekafkvlAttributes = $VexbtekafkvlOverride->attributes();
					$Vexbtekafkvl = $VexbtekafkvlAttributes['No'];
					$VexbtekafkvlHeight = $VexbtekafkvlAttributes['Unit'];
					$Vlksmoyzk4it = ((isset($VexbtekafkvlAttributes['Hidden'])) && ($VexbtekafkvlAttributes['Hidden'] == '1')) ? true : false;
					$VexbtekafkvlCount = (isset($VexbtekafkvlAttributes['Count'])) ? $VexbtekafkvlAttributes['Count'] : 1;
					while ($Vws44nszhvgo < $Vexbtekafkvl) {
						++$Vws44nszhvgo;
						$Vkggi1o2uo0k->getActiveSheet()->getRowDimension($Vws44nszhvgo)->setRowHeight($Vdpr3skkuank);
					}
					while (($Vws44nszhvgo < ($Vexbtekafkvl+$VexbtekafkvlCount)) && ($Vws44nszhvgo < $V3ywprpz53l2)) {
						++$Vws44nszhvgo;
						$Vkggi1o2uo0k->getActiveSheet()->getRowDimension($Vws44nszhvgo)->setRowHeight($VexbtekafkvlHeight);
						if ($Vlksmoyzk4it) {
							$Vkggi1o2uo0k->getActiveSheet()->getRowDimension($Vws44nszhvgo)->setVisible(false);
						}
					}
				}
				while ($Vws44nszhvgo < $V3ywprpz53l2) {
					++$Vws44nszhvgo;
					$Vkggi1o2uo0k->getActiveSheet()->getRowDimension($Vws44nszhvgo)->setRowHeight($Vdpr3skkuank);
				}
			}

			
			if (isset($Vzg4jtrmmzdy->MergedRegions)) {
				foreach($Vzg4jtrmmzdy->MergedRegions->Merge as $V0ure40hni4c) {
					if (strpos($V0ure40hni4c,':') !== FALSE) {
						$Vkggi1o2uo0k->getActiveSheet()->mergeCells($V0ure40hni4c);
					}
				}
			}

			$Vdtbkwjivkjf++;
		}

		
		if (isset($Vkatdinscjsn->Names)) {
			foreach($Vkatdinscjsn->Names->Name as $Vdqyivdsly3d) {
				$Vcvluzjs3wzb = (string) $Vdqyivdsly3d->name;
				$Vws44nszhvgoange = (string) $Vdqyivdsly3d->value;
				if (stripos($Vws44nszhvgoange, '#REF!') !== false) {
					continue;
				}

				$Vws44nszhvgoange = explode('!',$Vws44nszhvgoange);
				$Vws44nszhvgoange[0] = trim($Vws44nszhvgoange[0],"'");;
				if ($V4jvbeui0jzb = $Vkggi1o2uo0k->getSheetByName($Vws44nszhvgoange[0])) {
					$Voqbysp2eewd = str_replace('$', '', $Vws44nszhvgoange[1]);
					$Vkggi1o2uo0k->addNamedRange( new PHPExcel_NamedRange($Vcvluzjs3wzb, $V4jvbeui0jzb, $Voqbysp2eewd) );
				}
			}
		}


		
		return $Vkggi1o2uo0k;
	}


	private static function _parseBorderAttributes($Vi3cmxvxu5ot)
	{
		$Vldnaod3wmnp = array();

		if (isset($Vi3cmxvxu5ot["Color"])) {
			$Vqqfb3nx2wif = self::_parseGnumericColour($Vi3cmxvxu5ot["Color"]);
			$Vldnaod3wmnp['color']['rgb'] = $Vqqfb3nx2wif;
		}

		switch ($Vi3cmxvxu5ot["Style"]) {
			case '0' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_NONE;
				break;
			case '1' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_THIN;
				break;
			case '2' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;
				break;
			case '4' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_DASHED;
				break;
			case '5' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_THICK;
				break;
			case '6' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_DOUBLE;
				break;
			case '7' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_DOTTED;
				break;
			case '9' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_DASHDOT;
				break;
			case '10' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT;
				break;
			case '11' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_DASHDOTDOT;
				break;
			case '12' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT;
				break;
			case '13' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT;
				break;
			case '3' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_SLANTDASHDOT;
				break;
			case '8' :
				$Vldnaod3wmnp['style'] = PHPExcel_Style_Border::BORDER_MEDIUMDASHED;
				break;
		}
		return $Vldnaod3wmnp;
	}


	private function _parseRichText($Vzuidldrbmgo = '') {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		$Vp4xjtpabm0l->createText($Vzuidldrbmgo);

		return $Vp4xjtpabm0l;
	}


	private static function _parseGnumericColour($Vnzbyvb2mlty) {
		list($Vc2qqzpelssg,$V0pte4fnybis,$Vk0sczp1frjg) = explode(':',$Vnzbyvb2mlty);
		$Vc2qqzpelssg = substr(str_pad($Vc2qqzpelssg,4,'0',STR_PAD_RIGHT),0,2);
		$V0pte4fnybis = substr(str_pad($V0pte4fnybis,4,'0',STR_PAD_RIGHT),0,2);
		$Vk0sczp1frjg = substr(str_pad($Vk0sczp1frjg,4,'0',STR_PAD_RIGHT),0,2);
		$Vqqfb3nx2wif = $Vc2qqzpelssg.$V0pte4fnybis.$Vk0sczp1frjg;

		return $Vqqfb3nx2wif;
	}

}
