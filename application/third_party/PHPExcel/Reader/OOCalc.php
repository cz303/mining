<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_OOCalc extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vvwpgv3qy1lw = array();


	
	public function __construct() {
		$Veca2om3awughis->_readFilter 	= new PHPExcel_Reader_DefaultReadFilter();
	}


	
	public function canRead($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		




        $Vcebce0oosnt = 'UNKNOWN';
		
		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		if ($Vlyvyvxhzbgl->open($V1tltbb5c5oc) === true) {
			
			$Viobdbmmso2h = $Vlyvyvxhzbgl->statName('mimetype');
			if ($Viobdbmmso2h && ($Viobdbmmso2h['size'] <= 255)) {
				$Vcebce0oosnt = $Vlyvyvxhzbgl->getFromName($Viobdbmmso2h['name']);
			} elseif($Viobdbmmso2h = $Vlyvyvxhzbgl->statName('META-INF/manifest.xml')) {
		        $Vkrzhpletdu1 = simplexml_load_string($Vlyvyvxhzbgl->getFromName('META-INF/manifest.xml'), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		        $Vp1rjnrok3tr = $Vkrzhpletdu1->getNamespaces(true);
				if (isset($Vp1rjnrok3tr['manifest'])) {
			        $Vbk4gqdjbbzu = $Vkrzhpletdu1->children($Vp1rjnrok3tr['manifest']);
				    foreach($Vbk4gqdjbbzu as $Vbk4gqdjbbzuDataSet) {
					    $Vbk4gqdjbbzuAttributes = $Vbk4gqdjbbzuDataSet->attributes($Vp1rjnrok3tr['manifest']);
				        if ($Vbk4gqdjbbzuAttributes->{'full-path'} == '/') {
				            $Vcebce0oosnt = (string) $Vbk4gqdjbbzuAttributes->{'media-type'};
				            break;
				    	}
				    }
				}
			}

			$Vlyvyvxhzbgl->close();

			return ($Vcebce0oosnt === 'application/vnd.oasis.opendocument.spreadsheet');
		}

		return FALSE;
	}


	
	public function listWorksheetNames($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		if (!$Vlyvyvxhzbgl->open($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! Error opening file.");
		}

		$Vgeqndxyegdu = array();

		$Vkrzhpletdu1 = new XMLReader();
		$Ve3oeikqcm5n = $Vkrzhpletdu1->open('zip://'.realpath($V1tltbb5c5oc).'#content.xml', null, PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vkrzhpletdu1->setParserProperty(2,true);

		
		$Vkrzhpletdu1->read();
		while ($Vkrzhpletdu1->read()) {
			
			while ($Vkrzhpletdu1->name !== 'office:body') {
				if ($Vkrzhpletdu1->isEmptyElement)
					$Vkrzhpletdu1->read();
				else
					$Vkrzhpletdu1->next();
			}
			
			while ($Vkrzhpletdu1->read()) {
				if ($Vkrzhpletdu1->name == 'table:table' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
					
					do {
						$Vgeqndxyegdu[] = $Vkrzhpletdu1->getAttribute('table:name');
						$Vkrzhpletdu1->next();
					} while ($Vkrzhpletdu1->name == 'table:table' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT);
				}
			}
		}

		return $Vgeqndxyegdu;
	}


	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$V2rvssyhthui = array();

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		if (!$Vlyvyvxhzbgl->open($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! Error opening file.");
		}

		$Vkrzhpletdu1 = new XMLReader();
		$Ve3oeikqcm5n = $Vkrzhpletdu1->open('zip://'.realpath($V1tltbb5c5oc).'#content.xml', null, PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vkrzhpletdu1->setParserProperty(2,true);

		
		$Vkrzhpletdu1->read();
		while ($Vkrzhpletdu1->read()) {
			
			while ($Vkrzhpletdu1->name !== 'office:body') {
				if ($Vkrzhpletdu1->isEmptyElement)
					$Vkrzhpletdu1->read();
				else
					$Vkrzhpletdu1->next();
			}
				
			while ($Vkrzhpletdu1->read()) {
				if ($Vkrzhpletdu1->name == 'table:table' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
					$Vgeqndxyegdu[] = $Vkrzhpletdu1->getAttribute('table:name');

					$V1jil0euskeo = array(
						'worksheetName' => $Vkrzhpletdu1->getAttribute('table:name'),
						'lastColumnLetter' => 'A',
						'lastColumnIndex' => 0,
						'totalRows' => 0,
						'totalColumns' => 0,
					);

					
					$V3ix2lhbhsmt = 0;
					do {
						$Vkrzhpletdu1->read();
						if ($Vkrzhpletdu1->name == 'table:table-row' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
							$Vzws1vqplcny = $Vkrzhpletdu1->getAttribute('table:number-rows-repeated');
							$Vzws1vqplcny = empty($Vzws1vqplcny) ? 1 : $Vzws1vqplcny;
							$V1jil0euskeo['totalRows'] += $Vzws1vqplcny;
							$V1jil0euskeo['totalColumns'] = max($V1jil0euskeo['totalColumns'],$V3ix2lhbhsmt);
							$V3ix2lhbhsmt = 0;
							
							$Vkrzhpletdu1->read();
							do {
								if ($Vkrzhpletdu1->name == 'table:table-cell' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
									if (!$Vkrzhpletdu1->isEmptyElement) {
										$V3ix2lhbhsmt++;
										$Vkrzhpletdu1->next();
									} else {
										$Vkrzhpletdu1->read();
									}
								} elseif ($Vkrzhpletdu1->name == 'table:covered-table-cell' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
									$Vl4cmwz1hdey = $Vkrzhpletdu1->getAttribute('table:number-columns-repeated');
									$V3ix2lhbhsmt += $Vl4cmwz1hdey;
									$Vkrzhpletdu1->read();
								}
							} while ($Vkrzhpletdu1->name != 'table:table-row');
						}
					} while ($Vkrzhpletdu1->name != 'table:table');

					$V1jil0euskeo['totalColumns'] = max($V1jil0euskeo['totalColumns'],$V3ix2lhbhsmt);
					$V1jil0euskeo['lastColumnIndex'] = $V1jil0euskeo['totalColumns'] - 1;
					$V1jil0euskeo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V1jil0euskeo['lastColumnIndex']);
					$V2rvssyhthui[] = $V1jil0euskeo;
				}
			}



































		}

		return $V2rvssyhthui;
	}


	
	public function load($V1tltbb5c5oc)
	{
		
		$Vkggi1o2uo0k = new PHPExcel();

		
		return $Veca2om3awughis->loadIntoExisting($V1tltbb5c5oc, $Vkggi1o2uo0k);
	}


	private static function identifyFixedStyleValue($Vkonpindqxp2,&$V0cfxtw1u0j2) {
		$V0cfxtw1u0j2 = strtolower($V0cfxtw1u0j2);
		foreach($Vkonpindqxp2 as $Vdtcpflt5bhp) {
			if ($V0cfxtw1u0j2 == strtolower($Vdtcpflt5bhp)) {
				$V0cfxtw1u0j2 = $Vdtcpflt5bhp;
				return true;
			}
		}
		return false;
	}


	
	public function loadIntoExisting($V1tltbb5c5oc, PHPExcel $Vkggi1o2uo0k)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vumezogt24ba = new DateTimeZone('Europe/London');
		$Vc4ppryfwlvh = new DateTimeZone('UTC');

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		if (!$Vlyvyvxhzbgl->open($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! Error opening file.");
		}


		$Vkrzhpletdu1 = simplexml_load_string($Vlyvyvxhzbgl->getFromName("meta.xml"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vtivklydjvym = $Vkrzhpletdu1->getNamespaces(true);




		$Vawihaxurfzl = $Vkggi1o2uo0k->getProperties();
		$V1yd4rwsyjtm = $Vkrzhpletdu1->children($Vtivklydjvym['office']);
		foreach($V1yd4rwsyjtm as $V1yd4rwsyjtmData) {
			$V1yd4rwsyjtmDC = array();
			if (isset($Vtivklydjvym['dc'])) {
				$V1yd4rwsyjtmDC = $V1yd4rwsyjtmData->children($Vtivklydjvym['dc']);
			}
			foreach($V1yd4rwsyjtmDC as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
				$Vybj4yv3ywl1 = (string) $Vybj4yv3ywl1;
				switch ($Vrdimrb3fnt2) {
					case 'title' :
							$Vawihaxurfzl->setTitle($Vybj4yv3ywl1);
							break;
					case 'subject' :
							$Vawihaxurfzl->setSubject($Vybj4yv3ywl1);
							break;
					case 'creator' :
							$Vawihaxurfzl->setCreator($Vybj4yv3ywl1);
							$Vawihaxurfzl->setLastModifiedBy($Vybj4yv3ywl1);
							break;
					case 'date' :
							$Vhpl04bm1xnl = strtotime($Vybj4yv3ywl1);
							$Vawihaxurfzl->setCreated($Vhpl04bm1xnl);
							$Vawihaxurfzl->setModified($Vhpl04bm1xnl);
							break;
					case 'description' :
							$Vawihaxurfzl->setDescription($Vybj4yv3ywl1);
							break;
				}
			}
			$V1yd4rwsyjtmMeta = array();
			if (isset($Vtivklydjvym['dc'])) {
				$V1yd4rwsyjtmMeta = $V1yd4rwsyjtmData->children($Vtivklydjvym['meta']);
			}
			foreach($V1yd4rwsyjtmMeta as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
				$Vybj4yv3ywl1Attributes = $Vybj4yv3ywl1->attributes($Vtivklydjvym['meta']);
				$Vybj4yv3ywl1 = (string) $Vybj4yv3ywl1;
				switch ($Vrdimrb3fnt2) {
					case 'initial-creator' :
							$Vawihaxurfzl->setCreator($Vybj4yv3ywl1);
							break;
					case 'keyword' :
							$Vawihaxurfzl->setKeywords($Vybj4yv3ywl1);
							break;
					case 'creation-date' :
							$Vhpl04bm1xnl = strtotime($Vybj4yv3ywl1);
							$Vawihaxurfzl->setCreated($Vhpl04bm1xnl);
							break;
					case 'user-defined' :
							$Vybj4yv3ywl1Type = PHPExcel_DocumentProperties::PROPERTY_TYPE_STRING;
							foreach ($Vybj4yv3ywl1Attributes as $Vseq1edikdvg => $Vp4xjtpabm0l) {
								if ($Vseq1edikdvg == 'name') {
									$Vybj4yv3ywl1Name = (string) $Vp4xjtpabm0l;
								} elseif($Vseq1edikdvg == 'value-type') {
									switch ($Vp4xjtpabm0l) {
										case 'date'	:
											$Vybj4yv3ywl1 = PHPExcel_DocumentProperties::convertProperty($Vybj4yv3ywl1,'date');
											$Vybj4yv3ywl1Type = PHPExcel_DocumentProperties::PROPERTY_TYPE_DATE;
											break;
										case 'boolean'	:
											$Vybj4yv3ywl1 = PHPExcel_DocumentProperties::convertProperty($Vybj4yv3ywl1,'bool');
											$Vybj4yv3ywl1Type = PHPExcel_DocumentProperties::PROPERTY_TYPE_BOOLEAN;
											break;
										case 'float'	:
											$Vybj4yv3ywl1 = PHPExcel_DocumentProperties::convertProperty($Vybj4yv3ywl1,'r4');
											$Vybj4yv3ywl1Type = PHPExcel_DocumentProperties::PROPERTY_TYPE_FLOAT;
											break;
										default :
											$Vybj4yv3ywl1Type = PHPExcel_DocumentProperties::PROPERTY_TYPE_STRING;
									}
								}
							}
							$Vawihaxurfzl->setCustomProperty($Vybj4yv3ywl1Name,$Vybj4yv3ywl1,$Vybj4yv3ywl1Type);
							break;
				}
			}
		}



		$Vkrzhpletdu1 = simplexml_load_string($Vlyvyvxhzbgl->getFromName("content.xml"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vp1rjnrok3tr = $Vkrzhpletdu1->getNamespaces(true);




		$Vnqhol1l3dnz = $Vkrzhpletdu1->children($Vp1rjnrok3tr['office']);
		foreach($Vnqhol1l3dnz->body->spreadsheet as $Vnqhol1l3dnzData) {
			$Vnqhol1l3dnzData = $Vnqhol1l3dnzData->children($Vp1rjnrok3tr['table']);
			$Vdtbkwjivkjf = 0;
			foreach($Vnqhol1l3dnzData->table as $Vteeg0rpn4nu) {
				$Vlotsrwwpvsk = $Vteeg0rpn4nu->children($Vp1rjnrok3tr['table']);


				$VlotsrwwpvskAttributes = $Vteeg0rpn4nu->attributes($Vp1rjnrok3tr['table']);


				if ((isset($Veca2om3awughis->_loadSheetsOnly)) && (isset($VlotsrwwpvskAttributes['name'])) &&
					(!in_array($VlotsrwwpvskAttributes['name'], $Veca2om3awughis->_loadSheetsOnly))) {
					continue;
				}


				
				$Vkggi1o2uo0k->createSheet();
				$Vkggi1o2uo0k->setActiveSheetIndex($Vdtbkwjivkjf);
				if (isset($VlotsrwwpvskAttributes['name'])) {
					$Vuyz1szrcs1l = (string) $VlotsrwwpvskAttributes['name'];
					
					
					
					$Vkggi1o2uo0k->getActiveSheet()->setTitle($Vuyz1szrcs1l,false);
				}

				$Vcuohh51o5hd = 1;
				foreach($Vlotsrwwpvsk as $Vseq1edikdvg => $Vr3fstbr4qyt) {

					switch ($Vseq1edikdvg) {
						case 'table-header-rows':
							foreach ($Vr3fstbr4qyt as $Vseq1edikdvg=>$V0oebgn03krr) {
								$Vr3fstbr4qyt = $V0oebgn03krr;
								break;
							}
						case 'table-row' :
							$Vr3fstbr4qytTableAttributes = $Vr3fstbr4qyt->attributes($Vp1rjnrok3tr['table']);
							$Vokthwgjc53p = (isset($Vr3fstbr4qytTableAttributes['number-rows-repeated'])) ?
									$Vr3fstbr4qytTableAttributes['number-rows-repeated'] : 1;
							$Vzsa3jprdsqa = 'A';
							foreach($Vr3fstbr4qyt as $Vseq1edikdvg => $V0oebgn03krr) {
								if ($Veca2om3awughis->getReadFilter() !== NULL) {
									if (!$Veca2om3awughis->getReadFilter()->readCell($Vzsa3jprdsqa, $Vcuohh51o5hd, $Vuyz1szrcs1l)) {
										continue;
									}
								}


								$V0oebgn03krrText = (isset($Vp1rjnrok3tr['text'])) ?
									$V0oebgn03krr->children($Vp1rjnrok3tr['text']) :
									'';
								$V0oebgn03krrOffice = $V0oebgn03krr->children($Vp1rjnrok3tr['office']);
								$V0oebgn03krrOfficeAttributes = $V0oebgn03krr->attributes($Vp1rjnrok3tr['office']);
								$V0oebgn03krrTableAttributes = $V0oebgn03krr->attributes($Vp1rjnrok3tr['table']);









								$V4pigtpor0ln = $Vxz4ev0fpgml = $Vi45zv3gvg3s = null;
								$Vd5d14hxytg1 = false;
								$V0oebgn03krrFormula = '';
								if (isset($V0oebgn03krrTableAttributes['formula'])) {
									$V0oebgn03krrFormula = $V0oebgn03krrTableAttributes['formula'];
									$Vd5d14hxytg1 = true;
								}

								if (isset($V0oebgn03krrOffice->annotation)) {

									$V5nzsrs10l4q = $V0oebgn03krrOffice->annotation->children($Vp1rjnrok3tr['text']);
									$Vwnnutrg5yea = array();
									foreach($V5nzsrs10l4q as $Veca2om3awug) {
									    if (isset($Veca2om3awug->span)) {
    										foreach($Veca2om3awug->span as $Veca2om3awugext) {
    											$Vwnnutrg5yea[] = (string)$Veca2om3awugext;
    										}
									    } else {
									        $Vwnnutrg5yea[] = (string) $Veca2om3awug;
									    }
									}
									$Veca2om3awugext = implode("\n",$Vwnnutrg5yea);

									$Vkggi1o2uo0k->getActiveSheet()->getComment( $Vzsa3jprdsqa.$Vcuohh51o5hd )

																	->setText($Veca2om3awughis->_parseRichText($Veca2om3awugext) );
								}

									if (isset($V0oebgn03krrText->p)) {
									
									$Vlgwugfpiris = array();
									
									
									
									
									foreach ($V0oebgn03krrText->p as $Vzuwnczjcnak) {
										if (isset($Vzuwnczjcnak->span)) {
											
											$Vjzybba3tpv3 = "";
											foreach ($Vzuwnczjcnak->span as $V0ll3xymzs4x) {
												$Vjzybba3tpv3 .= $V0ll3xymzs4x;
											}
											array_push($Vlgwugfpiris, $Vjzybba3tpv3);
										} else {
											array_push($Vlgwugfpiris, $Vzuwnczjcnak);
										}
									}
									$Viyzlsxlsx51 = implode($Vlgwugfpiris, "\n");


									switch ($V0oebgn03krrOfficeAttributes['value-type']) {
 										case 'string' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_STRING;
												$Vxgkre3bdsqf = $Viyzlsxlsx51;
												if (isset($Vxgkre3bdsqf->a)) {
													$Vxgkre3bdsqf = $Vxgkre3bdsqf->a;
													$Vk01k0p3vih5 = $Vxgkre3bdsqf->attributes($Vp1rjnrok3tr['xlink']);
													$Vi45zv3gvg3s = $Vk01k0p3vih5['href'];
												}
												break;
										case 'boolean' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_BOOL;
												$Vxgkre3bdsqf = ($Viyzlsxlsx51 == 'TRUE') ? True : False;
												break;
										case 'percentage' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
												$Vxgkre3bdsqf = (float) $V0oebgn03krrOfficeAttributes['value'];
												if (floor($Vxgkre3bdsqf) == $Vxgkre3bdsqf) {
													$Vxgkre3bdsqf = (integer) $Vxgkre3bdsqf;
												}
												$Vxz4ev0fpgml = PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00;
												break;
										case 'currency' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
												$Vxgkre3bdsqf = (float) $V0oebgn03krrOfficeAttributes['value'];
												if (floor($Vxgkre3bdsqf) == $Vxgkre3bdsqf) {
													$Vxgkre3bdsqf = (integer) $Vxgkre3bdsqf;
												}
												$Vxz4ev0fpgml = PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE;
												break;
										case 'float' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
												$Vxgkre3bdsqf = (float) $V0oebgn03krrOfficeAttributes['value'];
												if (floor($Vxgkre3bdsqf) == $Vxgkre3bdsqf) {
													if ($Vxgkre3bdsqf == (integer) $Vxgkre3bdsqf)
														$Vxgkre3bdsqf = (integer) $Vxgkre3bdsqf;
													else
														$Vxgkre3bdsqf = (float) $Vxgkre3bdsqf;
												}
												break;
										case 'date' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
											    $V1flaqcxqdm1 = new DateTime($V0oebgn03krrOfficeAttributes['date-value'], $Vc4ppryfwlvh);
												$V1flaqcxqdm1->setTimeZone($Vumezogt24ba);
												list($Vz2lhrjd1jk2,$Vbylkx0shw01,$Vdinjot5db2l,$V1uwpilwqlrf,$Vldquerppd43,$Vupadstox0qa) = explode(' ',$V1flaqcxqdm1->format('Y m d H i s'));
												$Vxgkre3bdsqf = PHPExcel_Shared_Date::FormattedPHPToExcel($Vz2lhrjd1jk2,$Vbylkx0shw01,$Vdinjot5db2l,$V1uwpilwqlrf,$Vldquerppd43,$Vupadstox0qa);
												if ($Vxgkre3bdsqf != floor($Vxgkre3bdsqf)) {
													$Vxz4ev0fpgml = PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15.' '.PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4;
												} else {
													$Vxz4ev0fpgml = PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15;
												}
												break;
										case 'time' :
												$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
												$Vxgkre3bdsqf = PHPExcel_Shared_Date::PHPToExcel(strtotime('01-01-1970 '.implode(':',sscanf($V0oebgn03krrOfficeAttributes['time-value'],'PT%dH%dM%dS'))));
												$Vxz4ev0fpgml = PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4;
												break;
									}




								} else {
									$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NULL;
									$Vxgkre3bdsqf = NULL;
								}

								if ($Vd5d14hxytg1) {
									$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_FORMULA;

									$V0oebgn03krrFormula = substr($V0oebgn03krrFormula,strpos($V0oebgn03krrFormula,':=')+1);
									$Veca2om3awugemp = explode('"',$V0oebgn03krrFormula);
									$Veca2om3awugKey = false;
									foreach($Veca2om3awugemp as &$Vp4xjtpabm0l) {
										
										if ($Veca2om3awugKey = !$Veca2om3awugKey) {
											$Vp4xjtpabm0l = preg_replace('/\[([^\.]+)\.([^\.]+):\.([^\.]+)\]/Ui','$1!$2:$3',$Vp4xjtpabm0l);    
											$Vp4xjtpabm0l = preg_replace('/\[([^\.]+)\.([^\.]+)\]/Ui','$1!$2',$Vp4xjtpabm0l);       
											$Vp4xjtpabm0l = preg_replace('/\[\.([^\.]+):\.([^\.]+)\]/Ui','$1:$2',$Vp4xjtpabm0l);    
											$Vp4xjtpabm0l = preg_replace('/\[\.([^\.]+)\]/Ui','$1',$Vp4xjtpabm0l);                  
											$Vp4xjtpabm0l = PHPExcel_Calculation::_translateSeparator(';',',',$Vp4xjtpabm0l,$Vve3axtkgq2n);
										}
									}
									unset($Vp4xjtpabm0l);
									
									$V0oebgn03krrFormula = implode('"',$Veca2om3awugemp);

								}

								$Vjyvokf4lx41 = (isset($V0oebgn03krrTableAttributes['number-columns-repeated'])) ?
									$V0oebgn03krrTableAttributes['number-columns-repeated'] : 1;
								if ($V4pigtpor0ln !== NULL) {
									for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vjyvokf4lx41; ++$Vfhiq1lhsoja) {
										if ($Vfhiq1lhsoja > 0) {
											++$Vzsa3jprdsqa;
										}
										if ($V4pigtpor0ln !== PHPExcel_Cell_DataType::TYPE_NULL) {
											for ($Vkszuivhat4j = 0; $Vkszuivhat4j < $Vokthwgjc53p; ++$Vkszuivhat4j) {
												$Vsk2txfrgxvx = $Vcuohh51o5hd + $Vkszuivhat4j;
												$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vsk2txfrgxvx)->setValueExplicit((($Vd5d14hxytg1) ? $V0oebgn03krrFormula : $Vxgkre3bdsqf),$V4pigtpor0ln);
												if ($Vd5d14hxytg1) {

													$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vsk2txfrgxvx)->setCalculatedValue($Vxgkre3bdsqf);
												}
												if ($Vxz4ev0fpgml !== NULL) {
													$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vzsa3jprdsqa.$Vsk2txfrgxvx)->getNumberFormat()->setFormatCode($Vxz4ev0fpgml);
												} else {
													$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vzsa3jprdsqa.$Vsk2txfrgxvx)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
												}
												if ($Vi45zv3gvg3s !== NULL) {
													$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vsk2txfrgxvx)->getHyperlink()->setUrl($Vi45zv3gvg3s);
												}
											}
										}
									}
								}

								
								if ((isset($V0oebgn03krrTableAttributes['number-columns-spanned'])) || (isset($V0oebgn03krrTableAttributes['number-rows-spanned']))) {
									if (($V4pigtpor0ln !== PHPExcel_Cell_DataType::TYPE_NULL) || (!$Veca2om3awughis->_readDataOnly)) {
										$Vrozszqti3ct = $Vzsa3jprdsqa;
										if (isset($V0oebgn03krrTableAttributes['number-columns-spanned'])) {
											$Vrozszqti3ct = PHPExcel_Cell::stringFromColumnIndex(PHPExcel_Cell::columnIndexFromString($Vzsa3jprdsqa) + $V0oebgn03krrTableAttributes['number-columns-spanned'] -2);
										}
										$V1hnxr2zmzsp = $Vcuohh51o5hd;
										if (isset($V0oebgn03krrTableAttributes['number-rows-spanned'])) {
											$V1hnxr2zmzsp = $V1hnxr2zmzsp + $V0oebgn03krrTableAttributes['number-rows-spanned'] - 1;
										}
										$V2zgziid2nbz = $Vzsa3jprdsqa.$Vcuohh51o5hd.':'.$Vrozszqti3ct.$V1hnxr2zmzsp;
										$Vkggi1o2uo0k->getActiveSheet()->mergeCells($V2zgziid2nbz);
									}
								}

								++$Vzsa3jprdsqa;
							}
							$Vcuohh51o5hd += $Vokthwgjc53p;
							break;
					}
				}
				++$Vdtbkwjivkjf;
			}
		}

		
		return $Vkggi1o2uo0k;
	}


	private function _parseRichText($Vfhiq1lhsojas = '') {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		$Vp4xjtpabm0l->createText($Vfhiq1lhsojas);

		return $Vp4xjtpabm0l;
	}

}
