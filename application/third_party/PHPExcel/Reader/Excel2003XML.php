<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_Excel2003XML extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vvwpgv3qy1lw = array();

	
	private $Vkqbuk05lhoj = 'UTF-8';


	
	public function __construct() {
		$this->_readFilter 	= new PHPExcel_Reader_DefaultReadFilter();
	}


	
	public function canRead($V1tltbb5c5oc)
	{

		
		
		
		
		
		
		
		
		

		$V130eo4r3xul = array(
				'<?xml version="1.0"',
				'<?mso-application progid="Excel.Sheet"?>'
			);

		
		$this->_openFile($V1tltbb5c5oc);
		$Vsg4lebcui4l = $this->_fileHandle;
		
		
		$Vou4vxorrdoe = fread($Vsg4lebcui4l, 2048);
		fclose($Vsg4lebcui4l);

		$Vp0umi5mdv20 = true;
		foreach($V130eo4r3xul as $Vkvvdnwtmjnq) {
			
			if (strpos($Vou4vxorrdoe, $Vkvvdnwtmjnq) === false) {
				$Vp0umi5mdv20 = false;
				break;
			}
		}

		
		if(preg_match('/<?xml.*encoding=[\'"](.*?)[\'"].*?>/um',$Vou4vxorrdoe,$Vkvvdnwtmjnqes)) {
			$this->_charSet = strtoupper($Vkvvdnwtmjnqes[1]);
		}


		return $Vp0umi5mdv20;
	}


	
	public function listWorksheetNames($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}
		if (!$this->canRead($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}

		$Vgeqndxyegdu = array();

		$Vkrzhpletdu1 = simplexml_load_string(file_get_contents($V1tltbb5c5oc), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vigvplhuubqd = $Vkrzhpletdu1->getNamespaces(true);

		$Vkrzhpletdu1_ss = $Vkrzhpletdu1->children($Vigvplhuubqd['ss']);
		foreach($Vkrzhpletdu1_ss->Worksheet as $V4jvbeui0jzb) {
			$V4jvbeui0jzb_ss = $V4jvbeui0jzb->attributes($Vigvplhuubqd['ss']);
			$Vgeqndxyegdu[] = self::_convertStringEncoding((string) $V4jvbeui0jzb_ss['Name'],$this->_charSet);
		}

		return $Vgeqndxyegdu;
	}


	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$V4jvbeui0jzbInfo = array();

		$Vkrzhpletdu1 = simplexml_load_string(file_get_contents($V1tltbb5c5oc), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vigvplhuubqd = $Vkrzhpletdu1->getNamespaces(true);

		$V4jvbeui0jzbID = 1;
		$Vkrzhpletdu1_ss = $Vkrzhpletdu1->children($Vigvplhuubqd['ss']);
		foreach($Vkrzhpletdu1_ss->Worksheet as $V4jvbeui0jzb) {
			$V4jvbeui0jzb_ss = $V4jvbeui0jzb->attributes($Vigvplhuubqd['ss']);

			$V1jil0euskeo = array();
			$V1jil0euskeo['worksheetName'] = '';
			$V1jil0euskeo['lastColumnLetter'] = 'A';
			$V1jil0euskeo['lastColumnIndex'] = 0;
			$V1jil0euskeo['totalRows'] = 0;
			$V1jil0euskeo['totalColumns'] = 0;

			if (isset($V4jvbeui0jzb_ss['Name'])) {
				$V1jil0euskeo['worksheetName'] = (string) $V4jvbeui0jzb_ss['Name'];
			} else {
				$V1jil0euskeo['worksheetName'] = "Worksheet_{$V4jvbeui0jzbID}";
			}

			if (isset($V4jvbeui0jzb->Table->Row)) {
				$Vcj3rtes4zrz = 0;

				foreach($V4jvbeui0jzb->Table->Row as $Vr3fstbr4qyt) {
					$Vdpliwd4tl4l = 0;
					$Vgpvonnx5ng4 = false;

					foreach($Vr3fstbr4qyt->Cell as $Vblc1ueqvbti) {
						if (isset($Vblc1ueqvbti->Data)) {
							$V1jil0euskeo['lastColumnIndex'] = max($V1jil0euskeo['lastColumnIndex'], $Vdpliwd4tl4l);
							$Vgpvonnx5ng4 = true;
						}

						++$Vdpliwd4tl4l;
					}

					++$Vcj3rtes4zrz;

					if ($Vgpvonnx5ng4) {
						$V1jil0euskeo['totalRows'] = max($V1jil0euskeo['totalRows'], $Vcj3rtes4zrz);
					}
				}
			}

			$V1jil0euskeo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V1jil0euskeo['lastColumnIndex']);
			$V1jil0euskeo['totalColumns'] = $V1jil0euskeo['lastColumnIndex'] + 1;

			$V4jvbeui0jzbInfo[] = $V1jil0euskeo;
			++$V4jvbeui0jzbID;
		}

		return $V4jvbeui0jzbInfo;
	}


    
	public function load($V1tltbb5c5oc)
	{
		
		$Vkggi1o2uo0k = new PHPExcel();
        $Vkggi1o2uo0k->removeSheetByIndex(0);

		
		return $this->loadIntoExisting($V1tltbb5c5oc, $Vkggi1o2uo0k);
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


 	
 	private static function _pixel2WidthUnits($V0wjm0zubqn0) {
		$Vvbpmqtrzrp0 = array(0, 36, 73, 109, 146, 182, 219);

		$Vqjwglsjh2ky = 256 * ($V0wjm0zubqn0 / 7);
		$Vqjwglsjh2ky += $Vvbpmqtrzrp0[($V0wjm0zubqn0 % 7)];
		return $Vqjwglsjh2ky;
	}


	
	private static function _widthUnits2Pixel($Vqjwglsjh2ky) {
		$Vsgynrq4y5ql = ($Vqjwglsjh2ky / 256) * 7;
		$Vezipxq5hhgt = $Vqjwglsjh2ky % 256;
		$Vsgynrq4y5ql += round($Vezipxq5hhgt / (256 / 7));
		return $Vsgynrq4y5ql;
	}


	private static function _hex2str($V0o3f1vps5ku) {
		return chr(hexdec($V0o3f1vps5ku[1]));
	}


	
	public function loadIntoExisting($V1tltbb5c5oc, PHPExcel $Vkggi1o2uo0k)
	{
		$Vxs3fk0vtqts	= array('\-',	'\ ');
		$Vwb2mmlxgmu5		= array('-',	' ');

		$Ve54o5o4bmff = array (
				PHPExcel_Style_Font::UNDERLINE_NONE,
				PHPExcel_Style_Font::UNDERLINE_DOUBLE,
				PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING,
				PHPExcel_Style_Font::UNDERLINE_SINGLE,
				PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING
			);
		$Vofhftwwwa5n = array (
				PHPExcel_Style_Alignment::VERTICAL_BOTTOM,
				PHPExcel_Style_Alignment::VERTICAL_TOP,
				PHPExcel_Style_Alignment::VERTICAL_CENTER,
				PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
			);
		$Vu4koxhvwotb = array (
				PHPExcel_Style_Alignment::HORIZONTAL_GENERAL,
				PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
				PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS,
				PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY
			);

		$Vumezogt24ba = new DateTimeZone('Europe/London');
		$Vc4ppryfwlvh = new DateTimeZone('UTC');


		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		if (!$this->canRead($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}

		$Vkrzhpletdu1 = simplexml_load_string(file_get_contents($V1tltbb5c5oc), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
		$Vigvplhuubqd = $Vkrzhpletdu1->getNamespaces(true);

		$Vawihaxurfzl = $Vkggi1o2uo0k->getProperties();
		if (isset($Vkrzhpletdu1->DocumentProperties[0])) {
			foreach($Vkrzhpletdu1->DocumentProperties[0] as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
				switch ($Vrdimrb3fnt2) {
					case 'Title' :
							$Vawihaxurfzl->setTitle(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Subject' :
							$Vawihaxurfzl->setSubject(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Author' :
							$Vawihaxurfzl->setCreator(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Created' :
							$Vhpl04bm1xnl = strtotime($Vybj4yv3ywl1);
							$Vawihaxurfzl->setCreated($Vhpl04bm1xnl);
							break;
					case 'LastAuthor' :
							$Vawihaxurfzl->setLastModifiedBy(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'LastSaved' :
							$Vinlnh3ywnen = strtotime($Vybj4yv3ywl1);
							$Vawihaxurfzl->setModified($Vinlnh3ywnen);
							break;
					case 'Company' :
							$Vawihaxurfzl->setCompany(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Category' :
							$Vawihaxurfzl->setCategory(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Manager' :
							$Vawihaxurfzl->setManager(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Keywords' :
							$Vawihaxurfzl->setKeywords(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
					case 'Description' :
							$Vawihaxurfzl->setDescription(self::_convertStringEncoding($Vybj4yv3ywl1,$this->_charSet));
							break;
				}
			}
		}
		if (isset($Vkrzhpletdu1->CustomDocumentProperties)) {
			foreach($Vkrzhpletdu1->CustomDocumentProperties[0] as $Vrdimrb3fnt2 => $Vybj4yv3ywl1) {
				$Vt1skea4wfr5 = $Vybj4yv3ywl1->attributes($Vigvplhuubqd['dt']);
				$Vrdimrb3fnt2 = preg_replace_callback('/_x([0-9a-z]{4})_/','PHPExcel_Reader_Excel2003XML::_hex2str',$Vrdimrb3fnt2);
				$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_UNKNOWN;
				switch((string) $Vt1skea4wfr5) {
					case 'string' :
						$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_STRING;
						$Vybj4yv3ywl1 = trim($Vybj4yv3ywl1);
						break;
					case 'boolean' :
						$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_BOOLEAN;
						$Vybj4yv3ywl1 = (bool) $Vybj4yv3ywl1;
						break;
					case 'integer' :
						$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_INTEGER;
						$Vybj4yv3ywl1 = intval($Vybj4yv3ywl1);
						break;
					case 'float' :
						$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_FLOAT;
						$Vybj4yv3ywl1 = floatval($Vybj4yv3ywl1);
						break;
					case 'dateTime.tz' :
						$Vbcvvc32gxb3 = PHPExcel_DocumentProperties::PROPERTY_TYPE_DATE;
						$Vybj4yv3ywl1 = strtotime(trim($Vybj4yv3ywl1));
						break;
				}
				$Vawihaxurfzl->setCustomProperty($Vrdimrb3fnt2,$Vybj4yv3ywl1,$Vbcvvc32gxb3);
			}
		}

		foreach($Vkrzhpletdu1->Styles[0] as $Vdtcpflt5bhp) {
			$Vdtcpflt5bhp_ss = $Vdtcpflt5bhp->attributes($Vigvplhuubqd['ss']);
			$Vdtcpflt5bhpID = (string) $Vdtcpflt5bhp_ss['ID'];

			if ($Vdtcpflt5bhpID == 'Default') {
				$this->_styles['Default'] = array();
			} else {
				$this->_styles[$Vdtcpflt5bhpID] = $this->_styles['Default'];
			}
			foreach ($Vdtcpflt5bhp as $Vdtcpflt5bhpType => $Vdtcpflt5bhpData) {
				$Vdtcpflt5bhpAttributes = $Vdtcpflt5bhpData->attributes($Vigvplhuubqd['ss']);

				switch ($Vdtcpflt5bhpType) {
					case 'Alignment' :
							foreach($Vdtcpflt5bhpAttributes as $Vdtcpflt5bhpAttributeKey => $V0cfxtw1u0j2) {

								$V0cfxtw1u0j2 = (string) $V0cfxtw1u0j2;
								switch ($Vdtcpflt5bhpAttributeKey) {
									case 'Vertical' :
											if (self::identifyFixedStyleValue($Vofhftwwwa5n,$V0cfxtw1u0j2)) {
												$this->_styles[$Vdtcpflt5bhpID]['alignment']['vertical'] = $V0cfxtw1u0j2;
											}
											break;
									case 'Horizontal' :
											if (self::identifyFixedStyleValue($Vu4koxhvwotb,$V0cfxtw1u0j2)) {
												$this->_styles[$Vdtcpflt5bhpID]['alignment']['horizontal'] = $V0cfxtw1u0j2;
											}
											break;
									case 'WrapText' :
											$this->_styles[$Vdtcpflt5bhpID]['alignment']['wrap'] = true;
											break;
								}
							}
							break;
					case 'Borders' :
							foreach($Vdtcpflt5bhpData->Border as $V3w3s2v4rm1p) {
								$Vi3cmxvxu5ot = $V3w3s2v4rm1p->attributes($Vigvplhuubqd['ss']);
								$V1v2lib4kv5k = array();
								foreach($Vi3cmxvxu5ot as $V3w3s2v4rm1pKey => $V3w3s2v4rm1pValue) {

									switch ($V3w3s2v4rm1pKey) {
										case 'LineStyle' :
												$V1v2lib4kv5k['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;

												break;
										case 'Weight' :

												break;
										case 'Position' :
												$Vdc2llsg332d = strtolower($V3w3s2v4rm1pValue);
												break;
										case 'Color' :
												$Vbcn3vsf4msb = substr($V3w3s2v4rm1pValue,1);
												$V1v2lib4kv5k['color']['rgb'] = $Vbcn3vsf4msb;
												break;
									}
								}
								if (!empty($V1v2lib4kv5k)) {
									if (($Vdc2llsg332d == 'left') || ($Vdc2llsg332d == 'right') || ($Vdc2llsg332d == 'top') || ($Vdc2llsg332d == 'bottom')) {
										$this->_styles[$Vdtcpflt5bhpID]['borders'][$Vdc2llsg332d] = $V1v2lib4kv5k;
									}
								}
							}
							break;
					case 'Font' :
							foreach($Vdtcpflt5bhpAttributes as $Vdtcpflt5bhpAttributeKey => $V0cfxtw1u0j2) {

								$V0cfxtw1u0j2 = (string) $V0cfxtw1u0j2;
								switch ($Vdtcpflt5bhpAttributeKey) {
									case 'FontName' :
											$this->_styles[$Vdtcpflt5bhpID]['font']['name'] = $V0cfxtw1u0j2;
											break;
									case 'Size' :
											$this->_styles[$Vdtcpflt5bhpID]['font']['size'] = $V0cfxtw1u0j2;
											break;
									case 'Color' :
											$this->_styles[$Vdtcpflt5bhpID]['font']['color']['rgb'] = substr($V0cfxtw1u0j2,1);
											break;
									case 'Bold' :
											$this->_styles[$Vdtcpflt5bhpID]['font']['bold'] = true;
											break;
									case 'Italic' :
											$this->_styles[$Vdtcpflt5bhpID]['font']['italic'] = true;
											break;
									case 'Underline' :
											if (self::identifyFixedStyleValue($Ve54o5o4bmff,$V0cfxtw1u0j2)) {
												$this->_styles[$Vdtcpflt5bhpID]['font']['underline'] = $V0cfxtw1u0j2;
											}
											break;
								}
							}
							break;
					case 'Interior' :
							foreach($Vdtcpflt5bhpAttributes as $Vdtcpflt5bhpAttributeKey => $V0cfxtw1u0j2) {

								switch ($Vdtcpflt5bhpAttributeKey) {
									case 'Color' :
											$this->_styles[$Vdtcpflt5bhpID]['fill']['color']['rgb'] = substr($V0cfxtw1u0j2,1);
											break;
								}
							}
							break;
					case 'NumberFormat' :
							foreach($Vdtcpflt5bhpAttributes as $Vdtcpflt5bhpAttributeKey => $V0cfxtw1u0j2) {

								$V0cfxtw1u0j2 = str_replace($Vxs3fk0vtqts,$Vwb2mmlxgmu5,$V0cfxtw1u0j2);
								switch ($V0cfxtw1u0j2) {
									case 'Short Date' :
											$V0cfxtw1u0j2 = 'dd/mm/yyyy';
											break;
								}
								if ($V0cfxtw1u0j2 > '') {
									$this->_styles[$Vdtcpflt5bhpID]['numberformat']['code'] = $V0cfxtw1u0j2;
								}
							}
							break;
					case 'Protection' :
							foreach($Vdtcpflt5bhpAttributes as $Vdtcpflt5bhpAttributeKey => $V0cfxtw1u0j2) {

							}
							break;
				}
			}


		}


		$V4jvbeui0jzbID = 0;
		$Vkrzhpletdu1_ss = $Vkrzhpletdu1->children($Vigvplhuubqd['ss']);

		foreach($Vkrzhpletdu1_ss->Worksheet as $V4jvbeui0jzb) {
			$V4jvbeui0jzb_ss = $V4jvbeui0jzb->attributes($Vigvplhuubqd['ss']);

			if ((isset($this->_loadSheetsOnly)) && (isset($V4jvbeui0jzb_ss['Name'])) &&
				(!in_array($V4jvbeui0jzb_ss['Name'], $this->_loadSheetsOnly))) {
				continue;
			}



			
			$Vkggi1o2uo0k->createSheet();
			$Vkggi1o2uo0k->setActiveSheetIndex($V4jvbeui0jzbID);
			if (isset($V4jvbeui0jzb_ss['Name'])) {
				$V4jvbeui0jzbName = self::_convertStringEncoding((string) $V4jvbeui0jzb_ss['Name'],$this->_charSet);
				
				
				
				$Vkggi1o2uo0k->getActiveSheet()->setTitle($V4jvbeui0jzbName,false);
			}

			$Vzsa3jprdsqa = 'A';
			if (isset($V4jvbeui0jzb->Table->Column)) {
				foreach($V4jvbeui0jzb->Table->Column as $Vzr42suj1p35) {
					$Vzr42suj1p35_ss = $Vzr42suj1p35->attributes($Vigvplhuubqd['ss']);
					if (isset($Vzr42suj1p35_ss['Index'])) {
						$Vzsa3jprdsqa = PHPExcel_Cell::stringFromColumnIndex($Vzr42suj1p35_ss['Index']-1);
					}
					if (isset($Vzr42suj1p35_ss['Width'])) {
						$Vmfjoznitjbq = $Vzr42suj1p35_ss['Width'];

						$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension($Vzsa3jprdsqa)->setWidth($Vmfjoznitjbq / 5.4);
					}
					++$Vzsa3jprdsqa;
				}
			}

			$Vcuohh51o5hd = 1;
			if (isset($V4jvbeui0jzb->Table->Row)) {
                $Vwoszxjjp4zx = 0;
				foreach($V4jvbeui0jzb->Table->Row as $Vr3fstbr4qyt) {
					$Vgpvonnx5ng4 = false;
					$Vivzib50bhkn = $Vr3fstbr4qyt->attributes($Vigvplhuubqd['ss']);
					if (isset($Vivzib50bhkn['Index'])) {
						$Vcuohh51o5hd = (integer) $Vivzib50bhkn['Index'];
					}


					$Vzsa3jprdsqa = 'A';
					foreach($Vr3fstbr4qyt->Cell as $Vblc1ueqvbti) {

						$Vblc1ueqvbti_ss = $Vblc1ueqvbti->attributes($Vigvplhuubqd['ss']);
						if (isset($Vblc1ueqvbti_ss['Index'])) {
							$Vzsa3jprdsqa = PHPExcel_Cell::stringFromColumnIndex($Vblc1ueqvbti_ss['Index']-1);
						}
						$Vblc1ueqvbtiRange = $Vzsa3jprdsqa.$Vcuohh51o5hd;

						if ($this->getReadFilter() !== NULL) {
							if (!$this->getReadFilter()->readCell($Vzsa3jprdsqa, $Vcuohh51o5hd, $V4jvbeui0jzbName)) {
								continue;
							}
						}

						if ((isset($Vblc1ueqvbti_ss['MergeAcross'])) || (isset($Vblc1ueqvbti_ss['MergeDown']))) {
							$Vrozszqti3ct = $Vzsa3jprdsqa;
							if (isset($Vblc1ueqvbti_ss['MergeAcross'])) {
                                $Vwoszxjjp4zx += (int)$Vblc1ueqvbti_ss['MergeAcross'];
								$Vrozszqti3ct = PHPExcel_Cell::stringFromColumnIndex(PHPExcel_Cell::columnIndexFromString($Vzsa3jprdsqa) + $Vblc1ueqvbti_ss['MergeAcross'] -1);
							}
							$V1hnxr2zmzsp = $Vcuohh51o5hd;
							if (isset($Vblc1ueqvbti_ss['MergeDown'])) {
								$V1hnxr2zmzsp = $V1hnxr2zmzsp + $Vblc1ueqvbti_ss['MergeDown'];
							}
							$Vblc1ueqvbtiRange .= ':'.$Vrozszqti3ct.$V1hnxr2zmzsp;
							$Vkggi1o2uo0k->getActiveSheet()->mergeCells($Vblc1ueqvbtiRange);
						}

						$Vblc1ueqvbtiIsSet = $Vd5d14hxytg1 = false;
						$Vblc1ueqvbtiDataFormula = '';
						if (isset($Vblc1ueqvbti_ss['Formula'])) {
							$Vblc1ueqvbtiDataFormula = $Vblc1ueqvbti_ss['Formula'];
							
							if (isset($Vblc1ueqvbti_ss['ArrayRange'])) {
								$Vblc1ueqvbtiDataCSEFormula = $Vblc1ueqvbti_ss['ArrayRange'];

							}
							$Vd5d14hxytg1 = true;
						}
						if (isset($Vblc1ueqvbti->Data)) {
							$Vblc1ueqvbtiValue = $Vblc1ueqvbtiData = $Vblc1ueqvbti->Data;
							$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NULL;
							$Vblc1ueqvbtiData_ss = $Vblc1ueqvbtiData->attributes($Vigvplhuubqd['ss']);
							if (isset($Vblc1ueqvbtiData_ss['Type'])) {
								$Vblc1ueqvbtiDataType = $Vblc1ueqvbtiData_ss['Type'];
								switch ($Vblc1ueqvbtiDataType) {
									
									case 'String' :
											$Vblc1ueqvbtiValue = self::_convertStringEncoding($Vblc1ueqvbtiValue,$this->_charSet);
											$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_STRING;
											break;
									case 'Number' :
											$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
											$Vblc1ueqvbtiValue = (float) $Vblc1ueqvbtiValue;
											if (floor($Vblc1ueqvbtiValue) == $Vblc1ueqvbtiValue) {
												$Vblc1ueqvbtiValue = (integer) $Vblc1ueqvbtiValue;
											}
											break;
									case 'Boolean' :
											$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_BOOL;
											$Vblc1ueqvbtiValue = ($Vblc1ueqvbtiValue != 0);
											break;
									case 'DateTime' :
											$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_NUMERIC;
											$Vblc1ueqvbtiValue = PHPExcel_Shared_Date::PHPToExcel(strtotime($Vblc1ueqvbtiValue));
											break;
									case 'Error' :
											$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_ERROR;
											break;
								}
							}

							if ($Vd5d14hxytg1) {

								$V4pigtpor0ln = PHPExcel_Cell_DataType::TYPE_FORMULA;
								$Vexes5i144wf = PHPExcel_Cell::columnIndexFromString($Vzsa3jprdsqa);
								if (substr($Vblc1ueqvbtiDataFormula,0,3) == 'of:') {
									$Vblc1ueqvbtiDataFormula = substr($Vblc1ueqvbtiDataFormula,3);

									$Vcartbxounrh = explode('"',$Vblc1ueqvbtiDataFormula);
									$Vseq1edikdvg = false;
									foreach($Vcartbxounrh as &$Vp4xjtpabm0l) {
										
										if ($Vseq1edikdvg = !$Vseq1edikdvg) {
											$Vp4xjtpabm0l = str_replace(array('[.','.',']'),'',$Vp4xjtpabm0l);
										}
									}
								} else {
									

									$Vcartbxounrh = explode('"',$Vblc1ueqvbtiDataFormula);
									$Vseq1edikdvg = false;
									foreach($Vcartbxounrh as &$Vp4xjtpabm0l) {
										
										if ($Vseq1edikdvg = !$Vseq1edikdvg) {
											preg_match_all('/(R(\[?-?\d*\]?))(C(\[?-?\d*\]?))/',$Vp4xjtpabm0l, $Vblc1ueqvbtiReferences,PREG_SET_ORDER+PREG_OFFSET_CAPTURE);
											
											
											
											$Vblc1ueqvbtiReferences = array_reverse($Vblc1ueqvbtiReferences);
											
											
											foreach($Vblc1ueqvbtiReferences as $Vblc1ueqvbtiReference) {
												$V0ycy3mnvux3 = $Vblc1ueqvbtiReference[2][0];
												
												if ($V0ycy3mnvux3 == '') $V0ycy3mnvux3 = $Vcuohh51o5hd;
												
												if ($V0ycy3mnvux3{0} == '[') $V0ycy3mnvux3 = $Vcuohh51o5hd + trim($V0ycy3mnvux3,'[]');
												$Vom5vvkdhmzs = $Vblc1ueqvbtiReference[4][0];
												
												if ($Vom5vvkdhmzs == '') $Vom5vvkdhmzs = $Vexes5i144wf;
												
												if ($Vom5vvkdhmzs{0} == '[') $Vom5vvkdhmzs = $Vexes5i144wf + trim($Vom5vvkdhmzs,'[]');
												$Vho1x1ocaami = PHPExcel_Cell::stringFromColumnIndex($Vom5vvkdhmzs-1).$V0ycy3mnvux3;
													$Vp4xjtpabm0l = substr_replace($Vp4xjtpabm0l,$Vho1x1ocaami,$Vblc1ueqvbtiReference[0][1],strlen($Vblc1ueqvbtiReference[0][0]));
											}
										}
									}
								}
								unset($Vp4xjtpabm0l);
								
								$Vblc1ueqvbtiDataFormula = implode('"',$Vcartbxounrh);

							}



							$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vcuohh51o5hd)->setValueExplicit((($Vd5d14hxytg1) ? $Vblc1ueqvbtiDataFormula : $Vblc1ueqvbtiValue),$V4pigtpor0ln);
							if ($Vd5d14hxytg1) {

								$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vcuohh51o5hd)->setCalculatedValue($Vblc1ueqvbtiValue);
							}
							$Vblc1ueqvbtiIsSet = $Vgpvonnx5ng4 = true;
						}

						if (isset($Vblc1ueqvbti->Comment)) {

							$Vrk5j0lj34uj = $Vblc1ueqvbti->Comment->attributes($Vigvplhuubqd['ss']);
							$Vbc1vclmfegu = 'unknown';
							if (isset($Vrk5j0lj34uj->Author)) {
								$Vbc1vclmfegu = (string)$Vrk5j0lj34uj->Author;

							}
							$V1en3qe0uyt3 = $Vblc1ueqvbti->Comment->Data->asXML();


							$Vldk4nwcuka1 = strip_tags($V1en3qe0uyt3);

							$Vkggi1o2uo0k->getActiveSheet()->getComment( $Vzsa3jprdsqa.$Vcuohh51o5hd )
															->setAuthor(self::_convertStringEncoding($Vbc1vclmfegu ,$this->_charSet))
															->setText($this->_parseRichText($Vldk4nwcuka1) );
						}

						if (($Vblc1ueqvbtiIsSet) && (isset($Vblc1ueqvbti_ss['StyleID']))) {
							$Vdtcpflt5bhp = (string) $Vblc1ueqvbti_ss['StyleID'];

							if ((isset($this->_styles[$Vdtcpflt5bhp])) && (!empty($this->_styles[$Vdtcpflt5bhp]))) {



								if (!$Vkggi1o2uo0k->getActiveSheet()->cellExists($Vzsa3jprdsqa.$Vcuohh51o5hd)) {
									$Vkggi1o2uo0k->getActiveSheet()->getCell($Vzsa3jprdsqa.$Vcuohh51o5hd)->setValue(NULL);
								}
								$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vblc1ueqvbtiRange)->applyFromArray($this->_styles[$Vdtcpflt5bhp]);
							}
						}
						++$Vzsa3jprdsqa;
                        while ($Vwoszxjjp4zx > 0) {
                            ++$Vzsa3jprdsqa;
                            $Vwoszxjjp4zx--;
                        }
					}

					if ($Vgpvonnx5ng4) {
						if (isset($Vivzib50bhkn['StyleID'])) {
							$Volxoktoyt02 = $Vivzib50bhkn['StyleID'];
						}
						if (isset($Vivzib50bhkn['Height'])) {
							$Vapfi3rexoqm = $Vivzib50bhkn['Height'];

							$Vkggi1o2uo0k->getActiveSheet()->getRowDimension($Vcuohh51o5hd)->setRowHeight($Vapfi3rexoqm);
						}
					}

					++$Vcuohh51o5hd;
				}
			}
			++$V4jvbeui0jzbID;
		}

		
		return $Vkggi1o2uo0k;
	}


	private static function _convertStringEncoding($Vlkger5ehs4w,$Vjq1poabwn4j) {
		if ($Vjq1poabwn4j != 'UTF-8') {
			return PHPExcel_Shared_String::ConvertEncoding($Vlkger5ehs4w,'UTF-8',$Vjq1poabwn4j);
		}
		return $Vlkger5ehs4w;
	}


	private function _parseRichText($Vzuidldrbmgo = '') {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		$Vp4xjtpabm0l->createText(self::_convertStringEncoding($Vzuidldrbmgo,$this->_charSet));

		return $Vp4xjtpabm0l;
	}

}
