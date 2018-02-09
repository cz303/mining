<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_Excel2007 extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vrgbigpyawwq = NULL;

	
	private static $Vudkzylen1kt = NULL;


	
	public function __construct() {
		$this->_readFilter = new PHPExcel_Reader_DefaultReadFilter();
		$this->_referenceHelper = PHPExcel_ReferenceHelper::getInstance();
	}


	
	public function canRead($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		




		$Vxvvctyvbcpv = false;
		
		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		if ($Vlyvyvxhzbgl->open($V1tltbb5c5oc) === true) {
			
			$Vwcoqugs3pe3 = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "_rels/.rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
			if ($Vwcoqugs3pe3 !== false) {
				foreach ($Vwcoqugs3pe3->Relationship as $Vqueays2mm0v) {
					switch ($Vqueays2mm0v["Type"]) {
						case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument":
							if (basename($Vqueays2mm0v["Target"]) == 'workbook.xml') {
								$Vxvvctyvbcpv = true;
							}
							break;

					}
				}
			}
			$Vlyvyvxhzbgl->close();
		}

		return $Vxvvctyvbcpv;
	}


	
	public function listWorksheetNames($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vgeqndxyegdu = array();

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		$Vlyvyvxhzbgl->open($V1tltbb5c5oc);

		
		$Vwcoqugs3pe3 = simplexml_load_string(
		    $this->_getFromZipArchive($Vlyvyvxhzbgl, "_rels/.rels", 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions())
		); 
		foreach ($Vwcoqugs3pe3->Relationship as $Vqueays2mm0v) {
			switch ($Vqueays2mm0v["Type"]) {
				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument":
					$Vfswzpz55ril = simplexml_load_string(
					    $this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}", 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions())
					);  

					if ($Vfswzpz55ril->sheets) {
						foreach ($Vfswzpz55ril->sheets->sheet as $Vmrl5oeffob3) {
							
							$Vgeqndxyegdu[] = (string) $Vmrl5oeffob3["name"];
						}
					}
			}
		}

		$Vlyvyvxhzbgl->close();

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
		$Vlyvyvxhzbgl->open($V1tltbb5c5oc);

		$Vwcoqugs3pe3 = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "_rels/.rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
		foreach ($Vwcoqugs3pe3->Relationship as $Vqueays2mm0v) {
			if ($Vqueays2mm0v["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument") {
				$Vgxxrah4zcfh = dirname($Vqueays2mm0v["Target"]);
				$Vwcoqugs3pe3Workbook = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "$Vgxxrah4zcfh/_rels/" . basename($Vqueays2mm0v["Target"]) . ".rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  
				$Vwcoqugs3pe3Workbook->registerXPathNamespace("rel", "http://schemas.openxmlformats.org/package/2006/relationships");

				$Vvut0iibp3eh = array();
				foreach ($Vwcoqugs3pe3Workbook->Relationship as $Vuyn1htb2ebd) {
					if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet") {
						$Vvut0iibp3eh[(string) $Vuyn1htb2ebd["Id"]] = $Vuyn1htb2ebd["Target"];
					}
				}

				$Vfswzpz55ril = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  
				if ($Vfswzpz55ril->sheets) {
					$Vgxxrah4zcfh = dirname($Vqueays2mm0v["Target"]);
					foreach ($Vfswzpz55ril->sheets->sheet as $Vmrl5oeffob3) {
						$V1jil0euskeo = array(
							'worksheetName' => (string) $Vmrl5oeffob3["name"],
							'lastColumnLetter' => 'A',
							'lastColumnIndex' => 0,
							'totalRows' => 0,
							'totalColumns' => 0,
						);

						$Vptyin0skruj = $Vvut0iibp3eh[(string) self::array_item($Vmrl5oeffob3->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "id")];

						$Vkrzhpletdu1 = new XMLReader();
						$Ve3oeikqcm5n = $Vkrzhpletdu1->open('zip://'.PHPExcel_Shared_File::realpath($V1tltbb5c5oc).'#'."$Vgxxrah4zcfh/$Vptyin0skruj", null, PHPExcel_Settings::getLibXmlLoaderOptions());
						$Vkrzhpletdu1->setParserProperty(2,true);

						$V3ix2lhbhsmt = 0;
						while ($Vkrzhpletdu1->read()) {
							if ($Vkrzhpletdu1->name == 'row' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
								$Vexbtekafkvl = $Vkrzhpletdu1->getAttribute('r');
								$V1jil0euskeo['totalRows'] = $Vexbtekafkvl;
								$V1jil0euskeo['totalColumns'] = max($V1jil0euskeo['totalColumns'],$V3ix2lhbhsmt);
								$V3ix2lhbhsmt = 0;
							} elseif ($Vkrzhpletdu1->name == 'c' && $Vkrzhpletdu1->nodeType == XMLReader::ELEMENT) {
								$V3ix2lhbhsmt++;
							}
						}
						$V1jil0euskeo['totalColumns'] = max($V1jil0euskeo['totalColumns'],$V3ix2lhbhsmt);
						$Vkrzhpletdu1->close();

						$V1jil0euskeo['lastColumnIndex'] = $V1jil0euskeo['totalColumns'] - 1;
						$V1jil0euskeo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V1jil0euskeo['lastColumnIndex']);

						$V2rvssyhthui[] = $V1jil0euskeo;
					}
				}
			}
		}

		$Vlyvyvxhzbgl->close();

		return $V2rvssyhthui;
	}


	private static function _castToBool($V4y0urwpnd3j) {

		$Vp4xjtpabm0l = isset($V4y0urwpnd3j->v) ? (string) $V4y0urwpnd3j->v : NULL;
		if ($Vp4xjtpabm0l == '0') {
			return FALSE;
		} elseif ($Vp4xjtpabm0l == '1') {
			return TRUE;
		} else {
			return (bool)$V4y0urwpnd3j->v;
		}
		return $Vp4xjtpabm0l;
	}	


	private static function _castToError($V4y0urwpnd3j) {

		return isset($V4y0urwpnd3j->v) ? (string) $V4y0urwpnd3j->v : NULL;
	}	


	private static function _castToString($V4y0urwpnd3j) {

		return isset($V4y0urwpnd3j->v) ? (string) $V4y0urwpnd3j->v : NULL;
	}	


	private function _castToFormula($V4y0urwpnd3j,$Vws44nszhvgo,&$V4y0urwpnd3jellDataType,&$Vp4xjtpabm0l,&$V4y0urwpnd3jalculatedValue,&$Vk1zpa1eth32,$V4y0urwpnd3jastBaseType) {


		$V4y0urwpnd3jellDataType 		= 'f';
		$Vp4xjtpabm0l 				= "={$V4y0urwpnd3j->f}";
		$V4y0urwpnd3jalculatedValue 	= self::$V4y0urwpnd3jastBaseType($V4y0urwpnd3j);

		
		if (isset($V4y0urwpnd3j->f['t']) && strtolower((string)$V4y0urwpnd3j->f['t']) == 'shared') {

			$Vz1qvyizgpuq = (string)$V4y0urwpnd3j->f['si'];





			if (!isset($Vk1zpa1eth32[(string)$V4y0urwpnd3j->f['si']])) {



				$Vk1zpa1eth32[$Vz1qvyizgpuq] = array(	'master' => $Vws44nszhvgo,
													'formula' => $Vp4xjtpabm0l
												  );


			} else {



				$Vub2ow2r2wyo = PHPExcel_Cell::coordinateFromString($Vk1zpa1eth32[$Vz1qvyizgpuq]['master']);
				$V4y0urwpnd3jurrent = PHPExcel_Cell::coordinateFromString($Vws44nszhvgo);

				$Vtwmma20ztmc = array(0, 0);
				$Vtwmma20ztmc[0] = PHPExcel_Cell::columnIndexFromString($V4y0urwpnd3jurrent[0]) - PHPExcel_Cell::columnIndexFromString($Vub2ow2r2wyo[0]);
				$Vtwmma20ztmc[1] = $V4y0urwpnd3jurrent[1] - $Vub2ow2r2wyo[1];

				$Vp4xjtpabm0l = $this->_referenceHelper->updateFormulaReferences(	$Vk1zpa1eth32[$Vz1qvyizgpuq]['formula'],
																			'A1',
																			$Vtwmma20ztmc[0],
																			$Vtwmma20ztmc[1]
																		 );

			}
		}
	}


	public function _getFromZipArchive($V3vdztcxovbi, $V40kppmutioo = '')
	{
		
		if (strpos($V40kppmutioo, '//') !== false)
		{
			$V40kppmutioo = substr($V40kppmutioo, strpos($V40kppmutioo, '//') + 1);
		}
		$V40kppmutioo = PHPExcel_Shared_File::realpath($V40kppmutioo);

		
		$V4y0urwpnd3jontents = $V3vdztcxovbi->getFromName($V40kppmutioo);
		if ($V4y0urwpnd3jontents === false)
		{
			$V4y0urwpnd3jontents = $V3vdztcxovbi->getFromName(substr($V40kppmutioo, 1));
		}

		return $V4y0urwpnd3jontents;
	}


	
	public function load($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		
		$Vmwcy2n03xm0 = new PHPExcel;
		$Vmwcy2n03xm0->removeSheetByIndex(0);
		if (!$this->_readDataOnly) {
			$Vmwcy2n03xm0->removeCellStyleXfByIndex(0); 
			$Vmwcy2n03xm0->removeCellXfByIndex(0); 
		}

        $Vvwuzecprr3z = PHPExcel_Settings::getZipClass();

		$Vlyvyvxhzbgl = new $Vvwuzecprr3z;
		$Vlyvyvxhzbgl->open($V1tltbb5c5oc);

		
		$Vcw53zcttmx2 = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "xl/_rels/workbook.xml.rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
		foreach ($Vcw53zcttmx2->Relationship as $Vqueays2mm0v) {
			switch ($Vqueays2mm0v["Type"]) {
				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/theme":
					$Vn1bwjfb1uem = array('lt1','dk1','lt2','dk2');
					$Vrt1vdjoduvc = count($Vn1bwjfb1uem);

					$Vkrzhpletdu1Theme = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "xl/{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
					if (is_object($Vkrzhpletdu1Theme)) {
						$Vkrzhpletdu1ThemeName = $Vkrzhpletdu1Theme->attributes();
						$Vkrzhpletdu1Theme = $Vkrzhpletdu1Theme->children("http://schemas.openxmlformats.org/drawingml/2006/main");
						$Vgb4nzzhtakg = (string)$Vkrzhpletdu1ThemeName['name'];

						$V4y0urwpnd3jolourScheme = $Vkrzhpletdu1Theme->themeElements->clrScheme->attributes();
						$V4y0urwpnd3jolourSchemeName = (string)$V4y0urwpnd3jolourScheme['name'];
						$V4y0urwpnd3jolourScheme = $Vkrzhpletdu1Theme->themeElements->clrScheme->children("http://schemas.openxmlformats.org/drawingml/2006/main");

						$Vbsrnslgy014 = array();
						foreach ($V4y0urwpnd3jolourScheme as $V51lf1kcbto4 => $Vkrzhpletdu1Colour) {
							$Vbyoa0gsi0ss = array_search($V51lf1kcbto4,$Vn1bwjfb1uem);
							if ($Vbyoa0gsi0ss === false) {
								$Vbyoa0gsi0ss = $Vrt1vdjoduvc++;
							}
							if (isset($Vkrzhpletdu1Colour->sysClr)) {
								$Vkrzhpletdu1ColourData = $Vkrzhpletdu1Colour->sysClr->attributes();
								$Vbsrnslgy014[$Vbyoa0gsi0ss] = $Vkrzhpletdu1ColourData['lastClr'];
							} elseif (isset($Vkrzhpletdu1Colour->srgbClr)) {
								$Vkrzhpletdu1ColourData = $Vkrzhpletdu1Colour->srgbClr->attributes();
								$Vbsrnslgy014[$Vbyoa0gsi0ss] = $Vkrzhpletdu1ColourData['val'];
							}
						}
						self::$Vudkzylen1kt = new PHPExcel_Reader_Excel2007_Theme($Vgb4nzzhtakg,$V4y0urwpnd3jolourSchemeName,$Vbsrnslgy014);
					}
					break;
			}
		}

		$Vwcoqugs3pe3 = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "_rels/.rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
		foreach ($Vwcoqugs3pe3->Relationship as $Vqueays2mm0v) {
			switch ($Vqueays2mm0v["Type"]) {
				case "http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties":
					$Vkrzhpletdu1Core = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
					if (is_object($Vkrzhpletdu1Core)) {
						$Vkrzhpletdu1Core->registerXPathNamespace("dc", "http://purl.org/dc/elements/1.1/");
						$Vkrzhpletdu1Core->registerXPathNamespace("dcterms", "http://purl.org/dc/terms/");
						$Vkrzhpletdu1Core->registerXPathNamespace("cp", "http://schemas.openxmlformats.org/package/2006/metadata/core-properties");
						$Vawihaxurfzl = $Vmwcy2n03xm0->getProperties();
						$Vawihaxurfzl->setCreator((string) self::array_item($Vkrzhpletdu1Core->xpath("dc:creator")));
						$Vawihaxurfzl->setLastModifiedBy((string) self::array_item($Vkrzhpletdu1Core->xpath("cp:lastModifiedBy")));
						$Vawihaxurfzl->setCreated(strtotime(self::array_item($Vkrzhpletdu1Core->xpath("dcterms:created")))); 
						$Vawihaxurfzl->setModified(strtotime(self::array_item($Vkrzhpletdu1Core->xpath("dcterms:modified")))); 
						$Vawihaxurfzl->setTitle((string) self::array_item($Vkrzhpletdu1Core->xpath("dc:title")));
						$Vawihaxurfzl->setDescription((string) self::array_item($Vkrzhpletdu1Core->xpath("dc:description")));
						$Vawihaxurfzl->setSubject((string) self::array_item($Vkrzhpletdu1Core->xpath("dc:subject")));
						$Vawihaxurfzl->setKeywords((string) self::array_item($Vkrzhpletdu1Core->xpath("cp:keywords")));
						$Vawihaxurfzl->setCategory((string) self::array_item($Vkrzhpletdu1Core->xpath("cp:category")));
					}
				break;

				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/extended-properties":
					$Vkrzhpletdu1Core = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
					if (is_object($Vkrzhpletdu1Core)) {
						$Vawihaxurfzl = $Vmwcy2n03xm0->getProperties();
						if (isset($Vkrzhpletdu1Core->Company))
							$Vawihaxurfzl->setCompany((string) $Vkrzhpletdu1Core->Company);
						if (isset($Vkrzhpletdu1Core->Manager))
							$Vawihaxurfzl->setManager((string) $Vkrzhpletdu1Core->Manager);
					}
				break;

				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/custom-properties":
					$Vkrzhpletdu1Core = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
					if (is_object($Vkrzhpletdu1Core)) {
						$Vawihaxurfzl = $Vmwcy2n03xm0->getProperties();
						foreach ($Vkrzhpletdu1Core as $Vkrzhpletdu1Property) {
							$V4y0urwpnd3jellDataOfficeAttributes = $Vkrzhpletdu1Property->attributes();
							if (isset($V4y0urwpnd3jellDataOfficeAttributes['name'])) {
								$Vrdimrb3fnt2 = (string) $V4y0urwpnd3jellDataOfficeAttributes['name'];
								$V4y0urwpnd3jellDataOfficeChildren = $Vkrzhpletdu1Property->children('http://schemas.openxmlformats.org/officeDocument/2006/docPropsVTypes');
								$Vas5rxlufcvg = $V4y0urwpnd3jellDataOfficeChildren->getName();
								$V5agpp2p55g4 = (string) $V4y0urwpnd3jellDataOfficeChildren->{$Vas5rxlufcvg};
								$V5agpp2p55g4 = PHPExcel_DocumentProperties::convertProperty($V5agpp2p55g4,$Vas5rxlufcvg);
								$Vas5rxlufcvg = PHPExcel_DocumentProperties::convertPropertyType($Vas5rxlufcvg);
								$Vawihaxurfzl->setCustomProperty($Vrdimrb3fnt2,$V5agpp2p55g4,$Vas5rxlufcvg);
							}
						}
					}
				break;
				
				case "http://schemas.microsoft.com/office/2006/relationships/ui/extensibility":
					$V4y0urwpnd3justomUI = $Vqueays2mm0v['Target'];
					if(!is_null($V4y0urwpnd3justomUI)){
						$this->_readRibbon($Vmwcy2n03xm0, $V4y0urwpnd3justomUI, $Vlyvyvxhzbgl);
					}
				break;
				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument":
					$Vgxxrah4zcfh = dirname($Vqueays2mm0v["Target"]);
					$Vwcoqugs3pe3Workbook = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "$Vgxxrah4zcfh/_rels/" . basename($Vqueays2mm0v["Target"]) . ".rels"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  
					$Vwcoqugs3pe3Workbook->registerXPathNamespace("rel", "http://schemas.openxmlformats.org/package/2006/relationships");

					$Vuscjdw2ruj5 = array();
					$V3peids5jcyq = self::array_item($Vwcoqugs3pe3Workbook->xpath("rel:Relationship[@Type='http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings']"));
					$Vkrzhpletdu1Strings = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "$Vgxxrah4zcfh/$V3peids5jcyq[Target]"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  
					if (isset($Vkrzhpletdu1Strings) && isset($Vkrzhpletdu1Strings->si)) {
						foreach ($Vkrzhpletdu1Strings->si as $Vwk2nao2d33x) {
							if (isset($Vwk2nao2d33x->t)) {
								$Vuscjdw2ruj5[] = PHPExcel_Shared_String::ControlCharacterOOXML2PHP( (string) $Vwk2nao2d33x->t );
							} elseif (isset($Vwk2nao2d33x->r)) {
								$Vuscjdw2ruj5[] = $this->_parseRichText($Vwk2nao2d33x);
							}
						}
					}

					$Vvut0iibp3eh = array();
                    $Vvvax22sycg2 = $V4y0urwpnd3justomUI = NULL;
					foreach ($Vwcoqugs3pe3Workbook->Relationship as $Vuyn1htb2ebd) {
						switch($Vuyn1htb2ebd['Type']){
						case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet":
							$Vvut0iibp3eh[(string) $Vuyn1htb2ebd["Id"]] = $Vuyn1htb2ebd["Target"];
							break;
						
						case "http://schemas.microsoft.com/office/2006/relationships/vbaProject":
							$Vvvax22sycg2 = $Vuyn1htb2ebd["Target"];
							break;
						}
					}

					if(!is_null($Vvvax22sycg2)){
						$Vvvax22sycg2Code = $this->_getFromZipArchive($Vlyvyvxhzbgl, 'xl/vbaProject.bin');
						if($Vvvax22sycg2Code !== false){
							$Vmwcy2n03xm0->setMacrosCode($Vvvax22sycg2Code);
							$Vmwcy2n03xm0->setHasMacros(true);
							
							$Vyx2hjhpzrvm = $this->_getFromZipArchive($Vlyvyvxhzbgl, 'xl/vbaProjectSignature.bin');
							if($Vyx2hjhpzrvm !== false)
								$Vmwcy2n03xm0->setMacrosCertificate($Vyx2hjhpzrvm);
						}
					}
					$Vapglixr3x42 	= array();
					$V4y0urwpnd3jellStyles = array();
					$V3peids5jcyq = self::array_item($Vwcoqugs3pe3Workbook->xpath("rel:Relationship[@Type='http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles']"));
					$Vkrzhpletdu1Styles = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "$Vgxxrah4zcfh/$V3peids5jcyq[Target]"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
					$Vxthkca1xhgx = null;
					if ($Vkrzhpletdu1Styles && $Vkrzhpletdu1Styles->numFmts[0]) {
						$Vxthkca1xhgx = $Vkrzhpletdu1Styles->numFmts[0];
					}
					if (isset($Vxthkca1xhgx) && ($Vxthkca1xhgx !== NULL)) {
						$Vxthkca1xhgx->registerXPathNamespace("sml", "http://schemas.openxmlformats.org/spreadsheetml/2006/main");
					}
					if (!$this->_readDataOnly && $Vkrzhpletdu1Styles) {
						foreach ($Vkrzhpletdu1Styles->cellXfs->xf as $Voxildtwlfjw) {
							$Vgkajjnahazh = PHPExcel_Style_NumberFormat::FORMAT_GENERAL;

							if ($Voxildtwlfjw["numFmtId"]) {
								if (isset($Vxthkca1xhgx)) {
									$Viy4xhnyelui = self::array_item($Vxthkca1xhgx->xpath("sml:numFmt[@numFmtId=$Voxildtwlfjw[numFmtId]]"));

									if (isset($Viy4xhnyelui["formatCode"])) {
										$Vgkajjnahazh = (string) $Viy4xhnyelui["formatCode"];
									}
								}

								if ((int)$Voxildtwlfjw["numFmtId"] < 164) {
									$Vgkajjnahazh = PHPExcel_Style_NumberFormat::builtInFormatCode((int)$Voxildtwlfjw["numFmtId"]);
								}
							}
                            $Veviyxiojrhi = false;
							if (isset($Voxildtwlfjw["quotePrefix"])) {
                                $Veviyxiojrhi = (boolean) $Voxildtwlfjw["quotePrefix"];
                            }
							
							

							$Vdtcpflt5bhp = (object) array(
								"numFmt" => $Vgkajjnahazh,
								"font" => $Vkrzhpletdu1Styles->fonts->font[intval($Voxildtwlfjw["fontId"])],
								"fill" => $Vkrzhpletdu1Styles->fills->fill[intval($Voxildtwlfjw["fillId"])],
								"border" => $Vkrzhpletdu1Styles->borders->border[intval($Voxildtwlfjw["borderId"])],
								"alignment" => $Voxildtwlfjw->alignment,
								"protection" => $Voxildtwlfjw->protection,
								"quotePrefix" => $Veviyxiojrhi,
							);
							$Vapglixr3x42[] = $Vdtcpflt5bhp;

							
							$Vcdr0zxxzggt = new PHPExcel_Style;
							self::_readStyle($Vcdr0zxxzggt, $Vdtcpflt5bhp);
							$Vmwcy2n03xm0->addCellXf($Vcdr0zxxzggt);
						}

						foreach ($Vkrzhpletdu1Styles->cellStyleXfs->xf as $Voxildtwlfjw) {
							$Vgkajjnahazh = PHPExcel_Style_NumberFormat::FORMAT_GENERAL;
							if ($Vxthkca1xhgx && $Voxildtwlfjw["numFmtId"]) {
								$Viy4xhnyelui = self::array_item($Vxthkca1xhgx->xpath("sml:numFmt[@numFmtId=$Voxildtwlfjw[numFmtId]]"));
								if (isset($Viy4xhnyelui["formatCode"])) {
									$Vgkajjnahazh = (string) $Viy4xhnyelui["formatCode"];
								} else if ((int)$Voxildtwlfjw["numFmtId"] < 165) {
									$Vgkajjnahazh = PHPExcel_Style_NumberFormat::builtInFormatCode((int)$Voxildtwlfjw["numFmtId"]);
								}
							}

							$V4y0urwpnd3jellStyle = (object) array(
								"numFmt" => $Vgkajjnahazh,
								"font" => $Vkrzhpletdu1Styles->fonts->font[intval($Voxildtwlfjw["fontId"])],
								"fill" => $Vkrzhpletdu1Styles->fills->fill[intval($Voxildtwlfjw["fillId"])],
								"border" => $Vkrzhpletdu1Styles->borders->border[intval($Voxildtwlfjw["borderId"])],
								"alignment" => $Voxildtwlfjw->alignment,
								"protection" => $Voxildtwlfjw->protection,
								"quotePrefix" => $Veviyxiojrhi,
							);
							$V4y0urwpnd3jellStyles[] = $V4y0urwpnd3jellStyle;

							
							$Vcdr0zxxzggt = new PHPExcel_Style;
							self::_readStyle($Vcdr0zxxzggt, $V4y0urwpnd3jellStyle);
							$Vmwcy2n03xm0->addCellStyleXf($Vcdr0zxxzggt);
						}
					}

					$Vddelxby3vyd = array();
					if (!$this->_readDataOnly && $Vkrzhpletdu1Styles) {
						
						if ($Vkrzhpletdu1Styles->dxfs) {
							foreach ($Vkrzhpletdu1Styles->dxfs->dxf as $Vlhrrwnvmgiv) {
								$Vdtcpflt5bhp = new PHPExcel_Style(FALSE, TRUE);
								self::_readStyle($Vdtcpflt5bhp, $Vlhrrwnvmgiv);
								$Vddelxby3vyd[] = $Vdtcpflt5bhp;
							}
						}
						
						if ($Vkrzhpletdu1Styles->cellStyles) {
							foreach ($Vkrzhpletdu1Styles->cellStyles->cellStyle as $V4y0urwpnd3jellStyle) {
								if (intval($V4y0urwpnd3jellStyle['builtinId']) == 0) {
									if (isset($V4y0urwpnd3jellStyles[intval($V4y0urwpnd3jellStyle['xfId'])])) {
										
										$Vdtcpflt5bhp = new PHPExcel_Style;
										self::_readStyle($Vdtcpflt5bhp, $V4y0urwpnd3jellStyles[intval($V4y0urwpnd3jellStyle['xfId'])]);

										
									}
								}
							}
						}
					}

					$Vfswzpz55ril = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "{$Vqueays2mm0v['Target']}"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  

					
					if ($Vfswzpz55ril->workbookPr) {
						PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900);
						if (isset($Vfswzpz55ril->workbookPr['date1904'])) {
							if (self::boolean((string) $Vfswzpz55ril->workbookPr['date1904'])) {
								PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_MAC_1904);
							}
						}
					}

					$Valxnycf2yig = 0; 
					$V3icj4rl2qvy = -1; 
					$V4y0urwpnd3jountSkippedSheets = 0; 
					$V34nxzho4p2z = array(); 


					$V4y0urwpnd3jharts = $V4y0urwpnd3jhartDetails = array();

					if ($Vfswzpz55ril->sheets) {
						foreach ($Vfswzpz55ril->sheets->sheet as $Vmrl5oeffob3) {
							++$V3icj4rl2qvy;

							
							if (isset($this->_loadSheetsOnly) && !in_array((string) $Vmrl5oeffob3["name"], $this->_loadSheetsOnly)) {
								++$V4y0urwpnd3jountSkippedSheets;
								$V34nxzho4p2z[$V3icj4rl2qvy] = null;
								continue;
							}

							
							
							$V34nxzho4p2z[$V3icj4rl2qvy] = $V3icj4rl2qvy - $V4y0urwpnd3jountSkippedSheets;

							
							$Vu4dx5bdz5ui = $Vmwcy2n03xm0->createSheet();
							
							
							
							
							$Vu4dx5bdz5ui->setTitle((string) $Vmrl5oeffob3["name"],false);
							$Vptyin0skruj = $Vvut0iibp3eh[(string) self::array_item($Vmrl5oeffob3->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "id")];
							$Vkrzhpletdu1Sheet = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "$Vgxxrah4zcfh/$Vptyin0skruj"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());  

							$Vk1zpa1eth32 = array();

							if (isset($Vmrl5oeffob3["state"]) && (string) $Vmrl5oeffob3["state"] != '') {
								$Vu4dx5bdz5ui->setSheetState( (string) $Vmrl5oeffob3["state"] );
							}

							if (isset($Vkrzhpletdu1Sheet->sheetViews) && isset($Vkrzhpletdu1Sheet->sheetViews->sheetView)) {
							    if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['zoomScale'])) {
								    $Vu4dx5bdz5ui->getSheetView()->setZoomScale( intval($Vkrzhpletdu1Sheet->sheetViews->sheetView['zoomScale']) );
								}

							    if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['zoomScaleNormal'])) {
								    $Vu4dx5bdz5ui->getSheetView()->setZoomScaleNormal( intval($Vkrzhpletdu1Sheet->sheetViews->sheetView['zoomScaleNormal']) );
								}

							    if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['view'])) {
								    $Vu4dx5bdz5ui->getSheetView()->setView((string) $Vkrzhpletdu1Sheet->sheetViews->sheetView['view']);
								}

								if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['showGridLines'])) {
									$Vu4dx5bdz5ui->setShowGridLines(self::boolean((string)$Vkrzhpletdu1Sheet->sheetViews->sheetView['showGridLines']));
								}

								if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['showRowColHeaders'])) {
									$Vu4dx5bdz5ui->setShowRowColHeaders(self::boolean((string)$Vkrzhpletdu1Sheet->sheetViews->sheetView['showRowColHeaders']));
								}

								if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView['rightToLeft'])) {
									$Vu4dx5bdz5ui->setRightToLeft(self::boolean((string)$Vkrzhpletdu1Sheet->sheetViews->sheetView['rightToLeft']));
								}

								if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane)) {
								    if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['topLeftCell'])) {
								        $Vu4dx5bdz5ui->freezePane( (string)$Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['topLeftCell'] );
								    } else {
								        $Vxwquu220li2 = 0;
								        $Vhkg0wqek2um = 0;

								        if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['xSplit'])) {
								            $Vxwquu220li2 = 1 + intval($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['xSplit']);
								        }

								    	if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['ySplit'])) {
								            $Vhkg0wqek2um = 1 + intval($Vkrzhpletdu1Sheet->sheetViews->sheetView->pane['ySplit']);
								        }

								        $Vu4dx5bdz5ui->freezePaneByColumnAndRow($Vxwquu220li2, $Vhkg0wqek2um);
								    }
								}

								if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->selection)) {
									if (isset($Vkrzhpletdu1Sheet->sheetViews->sheetView->selection['sqref'])) {
										$V4tzikv2yz0c = (string)$Vkrzhpletdu1Sheet->sheetViews->sheetView->selection['sqref'];
										$V4tzikv2yz0c = explode(' ', $V4tzikv2yz0c);
										$V4tzikv2yz0c = $V4tzikv2yz0c[0];
										$Vu4dx5bdz5ui->setSelectedCells($V4tzikv2yz0c);
									}
								}

							}

							if (isset($Vkrzhpletdu1Sheet->sheetPr) && isset($Vkrzhpletdu1Sheet->sheetPr->tabColor)) {
								if (isset($Vkrzhpletdu1Sheet->sheetPr->tabColor['rgb'])) {
									$Vu4dx5bdz5ui->getTabColor()->setARGB( (string)$Vkrzhpletdu1Sheet->sheetPr->tabColor['rgb'] );
								}
							}
							if (isset($Vkrzhpletdu1Sheet->sheetPr) && isset($Vkrzhpletdu1Sheet->sheetPr['codeName'])) {
								$Vu4dx5bdz5ui->setCodeName((string) $Vkrzhpletdu1Sheet->sheetPr['codeName']);
							}
							if (isset($Vkrzhpletdu1Sheet->sheetPr) && isset($Vkrzhpletdu1Sheet->sheetPr->outlinePr)) {
								if (isset($Vkrzhpletdu1Sheet->sheetPr->outlinePr['summaryRight']) &&
									!self::boolean((string) $Vkrzhpletdu1Sheet->sheetPr->outlinePr['summaryRight'])) {
									$Vu4dx5bdz5ui->setShowSummaryRight(FALSE);
								} else {
									$Vu4dx5bdz5ui->setShowSummaryRight(TRUE);
								}

								if (isset($Vkrzhpletdu1Sheet->sheetPr->outlinePr['summaryBelow']) &&
									!self::boolean((string) $Vkrzhpletdu1Sheet->sheetPr->outlinePr['summaryBelow'])) {
									$Vu4dx5bdz5ui->setShowSummaryBelow(FALSE);
								} else {
									$Vu4dx5bdz5ui->setShowSummaryBelow(TRUE);
								}
							}

							if (isset($Vkrzhpletdu1Sheet->sheetPr) && isset($Vkrzhpletdu1Sheet->sheetPr->pageSetUpPr)) {
								if (isset($Vkrzhpletdu1Sheet->sheetPr->pageSetUpPr['fitToPage']) &&
									!self::boolean((string) $Vkrzhpletdu1Sheet->sheetPr->pageSetUpPr['fitToPage'])) {
									$Vu4dx5bdz5ui->getPageSetup()->setFitToPage(FALSE);
								} else {
									$Vu4dx5bdz5ui->getPageSetup()->setFitToPage(TRUE);
								}
							}

							if (isset($Vkrzhpletdu1Sheet->sheetFormatPr)) {
								if (isset($Vkrzhpletdu1Sheet->sheetFormatPr['customHeight']) &&
									self::boolean((string) $Vkrzhpletdu1Sheet->sheetFormatPr['customHeight']) &&
									isset($Vkrzhpletdu1Sheet->sheetFormatPr['defaultRowHeight'])) {
									$Vu4dx5bdz5ui->getDefaultRowDimension()->setRowHeight( (float)$Vkrzhpletdu1Sheet->sheetFormatPr['defaultRowHeight'] );
								}
								if (isset($Vkrzhpletdu1Sheet->sheetFormatPr['defaultColWidth'])) {
									$Vu4dx5bdz5ui->getDefaultColumnDimension()->setWidth( (float)$Vkrzhpletdu1Sheet->sheetFormatPr['defaultColWidth'] );
								}
								if (isset($Vkrzhpletdu1Sheet->sheetFormatPr['zeroHeight']) &&
									((string)$Vkrzhpletdu1Sheet->sheetFormatPr['zeroHeight'] == '1')) {
									$Vu4dx5bdz5ui->getDefaultRowDimension()->setZeroHeight(true);
								}
							}

							if (isset($Vkrzhpletdu1Sheet->cols) && !$this->_readDataOnly) {
								foreach ($Vkrzhpletdu1Sheet->cols->col as $V4y0urwpnd3jol) {
                                    for ($Vfhiq1lhsoja = intval($V4y0urwpnd3jol["min"]) - 1; $Vfhiq1lhsoja < intval($V4y0urwpnd3jol["max"]); ++$Vfhiq1lhsoja) {
										if ($V4y0urwpnd3jol["style"] && !$this->_readDataOnly) {
											$Vu4dx5bdz5ui->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja))->setXfIndex(intval($V4y0urwpnd3jol["style"]));
										}
										if (self::boolean($V4y0urwpnd3jol["bestFit"])) {
											
										}
										if (self::boolean($V4y0urwpnd3jol["hidden"])) {
                                        
											$Vu4dx5bdz5ui->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja))->setVisible(FALSE);
										}
										if (self::boolean($V4y0urwpnd3jol["collapsed"])) {
											$Vu4dx5bdz5ui->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja))->setCollapsed(TRUE);
										}
										if ($V4y0urwpnd3jol["outlineLevel"] > 0) {
											$Vu4dx5bdz5ui->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja))->setOutlineLevel(intval($V4y0urwpnd3jol["outlineLevel"]));
										}
										$Vu4dx5bdz5ui->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja))->setWidth(floatval($V4y0urwpnd3jol["width"]));

										if (intval($V4y0urwpnd3jol["max"]) == 16384) {
											break;
										}
									}
								}
							}

							if (isset($Vkrzhpletdu1Sheet->printOptions) && !$this->_readDataOnly) {
								if (self::boolean((string) $Vkrzhpletdu1Sheet->printOptions['gridLinesSet'])) {
									$Vu4dx5bdz5ui->setShowGridlines(TRUE);
								}

								if (self::boolean((string) $Vkrzhpletdu1Sheet->printOptions['gridLines'])) {
									$Vu4dx5bdz5ui->setPrintGridlines(TRUE);
								}

								if (self::boolean((string) $Vkrzhpletdu1Sheet->printOptions['horizontalCentered'])) {
									$Vu4dx5bdz5ui->getPageSetup()->setHorizontalCentered(TRUE);
								}
								if (self::boolean((string) $Vkrzhpletdu1Sheet->printOptions['verticalCentered'])) {
									$Vu4dx5bdz5ui->getPageSetup()->setVerticalCentered(TRUE);
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->sheetData && $Vkrzhpletdu1Sheet->sheetData->row) {
								foreach ($Vkrzhpletdu1Sheet->sheetData->row as $Vexbtekafkvl) {
									if ($Vexbtekafkvl["ht"] && !$this->_readDataOnly) {
										$Vu4dx5bdz5ui->getRowDimension(intval($Vexbtekafkvl["r"]))->setRowHeight(floatval($Vexbtekafkvl["ht"]));
									}
									if (self::boolean($Vexbtekafkvl["hidden"]) && !$this->_readDataOnly) {
										$Vu4dx5bdz5ui->getRowDimension(intval($Vexbtekafkvl["r"]))->setVisible(FALSE);
									}
									if (self::boolean($Vexbtekafkvl["collapsed"])) {
										$Vu4dx5bdz5ui->getRowDimension(intval($Vexbtekafkvl["r"]))->setCollapsed(TRUE);
									}
									if ($Vexbtekafkvl["outlineLevel"] > 0) {
										$Vu4dx5bdz5ui->getRowDimension(intval($Vexbtekafkvl["r"]))->setOutlineLevel(intval($Vexbtekafkvl["outlineLevel"]));
									}
									if ($Vexbtekafkvl["s"] && !$this->_readDataOnly) {
										$Vu4dx5bdz5ui->getRowDimension(intval($Vexbtekafkvl["r"]))->setXfIndex(intval($Vexbtekafkvl["s"]));
									}

									foreach ($Vexbtekafkvl->c as $V4y0urwpnd3j) {
										$Vws44nszhvgo 					= (string) $V4y0urwpnd3j["r"];
										$V4y0urwpnd3jellDataType 		= (string) $V4y0urwpnd3j["t"];
										$Vp4xjtpabm0l				= null;
										$V4y0urwpnd3jalculatedValue 	= null;

										
										if ($this->getReadFilter() !== NULL) {
											$V4y0urwpnd3joordinates = PHPExcel_Cell::coordinateFromString($Vws44nszhvgo);

											if (!$this->getReadFilter()->readCell($V4y0urwpnd3joordinates[0], $V4y0urwpnd3joordinates[1], $Vu4dx5bdz5ui->getTitle())) {
												continue;
											}
										}

	
	
	
	
	
										
										switch ($V4y0urwpnd3jellDataType) {
											case "s":
	
												if ((string)$V4y0urwpnd3j->v != '') {
													$Vp4xjtpabm0l = $Vuscjdw2ruj5[intval($V4y0urwpnd3j->v)];

													if ($Vp4xjtpabm0l instanceof PHPExcel_RichText) {
														$Vp4xjtpabm0l = clone $Vp4xjtpabm0l;
													}
												} else {
													$Vp4xjtpabm0l = '';
												}

												break;
											case "b":
	
												if (!isset($V4y0urwpnd3j->f)) {
													$Vp4xjtpabm0l = self::_castToBool($V4y0urwpnd3j);
												} else {
													
													$this->_castToFormula($V4y0urwpnd3j,$Vws44nszhvgo,$V4y0urwpnd3jellDataType,$Vp4xjtpabm0l,$V4y0urwpnd3jalculatedValue,$Vk1zpa1eth32,'_castToBool');
													if (isset($V4y0urwpnd3j->f['t'])) {
														$Vzgawtpnwxz5 = array();
														$Vzgawtpnwxz5 = $V4y0urwpnd3j->f;
														$Vu4dx5bdz5ui->getCell($Vws44nszhvgo)->setFormulaAttributes($Vzgawtpnwxz5);
													}
	
												}
												break;
											case "inlineStr":
	
												$Vp4xjtpabm0l = $this->_parseRichText($V4y0urwpnd3j->is);

												break;
											case "e":
	
												if (!isset($V4y0urwpnd3j->f)) {
													$Vp4xjtpabm0l = self::_castToError($V4y0urwpnd3j);
												} else {
													
													$this->_castToFormula($V4y0urwpnd3j,$Vws44nszhvgo,$V4y0urwpnd3jellDataType,$Vp4xjtpabm0l,$V4y0urwpnd3jalculatedValue,$Vk1zpa1eth32,'_castToError');
	
												}

												break;

											default:
	
												if (!isset($V4y0urwpnd3j->f)) {
	
													$Vp4xjtpabm0l = self::_castToString($V4y0urwpnd3j);
												} else {
	
													
													$this->_castToFormula($V4y0urwpnd3j,$Vws44nszhvgo,$V4y0urwpnd3jellDataType,$Vp4xjtpabm0l,$V4y0urwpnd3jalculatedValue,$Vk1zpa1eth32,'_castToString');
	
												}

												break;
										}
	

										
										if (is_numeric($Vp4xjtpabm0l) && $V4y0urwpnd3jellDataType != 's') {
											if ($Vp4xjtpabm0l == (int)$Vp4xjtpabm0l) $Vp4xjtpabm0l = (int)$Vp4xjtpabm0l;
											elseif ($Vp4xjtpabm0l == (float)$Vp4xjtpabm0l) $Vp4xjtpabm0l = (float)$Vp4xjtpabm0l;
											elseif ($Vp4xjtpabm0l == (double)$Vp4xjtpabm0l) $Vp4xjtpabm0l = (double)$Vp4xjtpabm0l;
										}

										
										if ($Vp4xjtpabm0l instanceof PHPExcel_RichText && $this->_readDataOnly) {
											$Vp4xjtpabm0l = $Vp4xjtpabm0l->getPlainText();
										}

										$V4y0urwpnd3jell = $Vu4dx5bdz5ui->getCell($Vws44nszhvgo);
										
										if ($V4y0urwpnd3jellDataType != '') {
											$V4y0urwpnd3jell->setValueExplicit($Vp4xjtpabm0l, $V4y0urwpnd3jellDataType);
										} else {
											$V4y0urwpnd3jell->setValue($Vp4xjtpabm0l);
										}
										if ($V4y0urwpnd3jalculatedValue !== NULL) {
											$V4y0urwpnd3jell->setCalculatedValue($V4y0urwpnd3jalculatedValue);
										}

										
										if ($V4y0urwpnd3j["s"] && !$this->_readDataOnly) {
											
											$V4y0urwpnd3jell->setXfIndex(isset($Vapglixr3x42[intval($V4y0urwpnd3j["s"])]) ?
												intval($V4y0urwpnd3j["s"]) : 0);
										}
									}
								}
							}

							$V4y0urwpnd3jonditionals = array();
							if (!$this->_readDataOnly && $Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->conditionalFormatting) {
								foreach ($Vkrzhpletdu1Sheet->conditionalFormatting as $V4y0urwpnd3jonditional) {
									foreach ($V4y0urwpnd3jonditional->cfRule as $V4y0urwpnd3jfRule) {
										if (
											(
												(string)$V4y0urwpnd3jfRule["type"] == PHPExcel_Style_Conditional::CONDITION_NONE ||
												(string)$V4y0urwpnd3jfRule["type"] == PHPExcel_Style_Conditional::CONDITION_CELLIS ||
												(string)$V4y0urwpnd3jfRule["type"] == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT ||
												(string)$V4y0urwpnd3jfRule["type"] == PHPExcel_Style_Conditional::CONDITION_EXPRESSION
											) && isset($Vddelxby3vyd[intval($V4y0urwpnd3jfRule["dxfId"])])
										) {
											$V4y0urwpnd3jonditionals[(string) $V4y0urwpnd3jonditional["sqref"]][intval($V4y0urwpnd3jfRule["priority"])] = $V4y0urwpnd3jfRule;
										}
									}
								}

								foreach ($V4y0urwpnd3jonditionals as $Vws44nszhvgoef => $V4y0urwpnd3jfRules) {
									ksort($V4y0urwpnd3jfRules);
									$V4y0urwpnd3jonditionalStyles = array();
									foreach ($V4y0urwpnd3jfRules as $V4y0urwpnd3jfRule) {
										$Vx25qzx43zan = new PHPExcel_Style_Conditional();
										$Vx25qzx43zan->setConditionType((string)$V4y0urwpnd3jfRule["type"]);
										$Vx25qzx43zan->setOperatorType((string)$V4y0urwpnd3jfRule["operator"]);

										if ((string)$V4y0urwpnd3jfRule["text"] != '') {
											$Vx25qzx43zan->setText((string)$V4y0urwpnd3jfRule["text"]);
										}

										if (count($V4y0urwpnd3jfRule->formula) > 1) {
											foreach ($V4y0urwpnd3jfRule->formula as $V22ivdjjfdx2) {
												$Vx25qzx43zan->addCondition((string)$V22ivdjjfdx2);
											}
										} else {
											$Vx25qzx43zan->addCondition((string)$V4y0urwpnd3jfRule->formula);
										}
										$Vx25qzx43zan->setStyle(clone $Vddelxby3vyd[intval($V4y0urwpnd3jfRule["dxfId"])]);
										$V4y0urwpnd3jonditionalStyles[] = $Vx25qzx43zan;
									}

									
									$Vzb52qcgoo0r = PHPExcel_Cell::extractAllCellReferencesInRange($Vws44nszhvgoef);
									foreach ($Vzb52qcgoo0r as $Vws44nszhvgoeference) {
										$Vu4dx5bdz5ui->getStyle($Vws44nszhvgoeference)->setConditionalStyles($V4y0urwpnd3jonditionalStyles);
									}
								}
							}

							$Vix4qzapodlj = array("sheet", "objects", "scenarios", "formatCells", "formatColumns", "formatRows", "insertColumns", "insertRows", "insertHyperlinks", "deleteColumns", "deleteRows", "selectLockedCells", "sort", "autoFilter", "pivotTables", "selectUnlockedCells");
							if (!$this->_readDataOnly && $Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->sheetProtection) {
								foreach ($Vix4qzapodlj as $V51lf1kcbto4ey) {
									$Vihjcs2gfuz0 = "set" . ucfirst($V51lf1kcbto4ey);
									$Vu4dx5bdz5ui->getProtection()->$Vihjcs2gfuz0(self::boolean((string) $Vkrzhpletdu1Sheet->sheetProtection[$V51lf1kcbto4ey]));
								}
							}

							if (!$this->_readDataOnly && $Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->sheetProtection) {
								$Vu4dx5bdz5ui->getProtection()->setPassword((string) $Vkrzhpletdu1Sheet->sheetProtection["password"], TRUE);
								if ($Vkrzhpletdu1Sheet->protectedRanges->protectedRange) {
									foreach ($Vkrzhpletdu1Sheet->protectedRanges->protectedRange as $Vm1bunqg2d5j) {
										$Vu4dx5bdz5ui->protectCells((string) $Vm1bunqg2d5j["sqref"], (string) $Vm1bunqg2d5j["password"], true);
									}
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->autoFilter && !$this->_readDataOnly) {
                                $Vf22y2ugjneq = (string) $Vkrzhpletdu1Sheet->autoFilter["ref"];
                                if (strpos($Vf22y2ugjneq, ':') !== false) {
                                    $Vqcxb3dhmc0n = $Vu4dx5bdz5ui->getAutoFilter();
                                    $Vqcxb3dhmc0n->setRange($Vf22y2ugjneq);

                                    foreach ($Vkrzhpletdu1Sheet->autoFilter->filterColumn as $V1xcvo1aivrt) {
                                        $V4y0urwpnd3jolumn = $Vqcxb3dhmc0n->getColumnByOffset((integer) $V1xcvo1aivrt["colId"]);
                                        
                                        if ($V1xcvo1aivrt->filters) {
                                            $V4y0urwpnd3jolumn->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER);
                                            $V2ajyxmaezxm = $V1xcvo1aivrt->filters;
                                            if ((isset($V2ajyxmaezxm["blank"])) && ($V2ajyxmaezxm["blank"] == 1)) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    NULL,	
                                                    ''
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_FILTER);
                                            }
                                            
                                            
                                            foreach ($V2ajyxmaezxm->filter as $V5oomwejzogu) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    NULL,	
                                                    (string) $V5oomwejzogu["val"]
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_FILTER);
                                            }
                                            
                                            foreach ($V2ajyxmaezxm->dateGroupItem as $Vfcxnnhhkqfh) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    NULL,	
                                                    array(
                                                        'year' => (string) $Vfcxnnhhkqfh["year"],
                                                        'month' => (string) $Vfcxnnhhkqfh["month"],
                                                        'day' => (string) $Vfcxnnhhkqfh["day"],
                                                        'hour' => (string) $Vfcxnnhhkqfh["hour"],
                                                        'minute' => (string) $Vfcxnnhhkqfh["minute"],
                                                        'second' => (string) $Vfcxnnhhkqfh["second"],
                                                    ),
                                                    (string) $Vfcxnnhhkqfh["dateTimeGrouping"]
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP);
                                            }
                                        }
                                        
                                        if ($V1xcvo1aivrt->customFilters) {
                                            $V4y0urwpnd3jolumn->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_CUSTOMFILTER);
                                            $V4y0urwpnd3justomFilters = $V1xcvo1aivrt->customFilters;
                                            
                                            
                                            if ((isset($V4y0urwpnd3justomFilters["and"])) && ($V4y0urwpnd3justomFilters["and"] == 1)) {
                                                $V4y0urwpnd3jolumn->setJoin(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND);
                                            }
                                            foreach ($V4y0urwpnd3justomFilters->customFilter as $V5oomwejzogu) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    (string) $V5oomwejzogu["operator"],
                                                    (string) $V5oomwejzogu["val"]
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_CUSTOMFILTER);
                                            }
                                        }
                                        
                                        if ($V1xcvo1aivrt->dynamicFilter) {
                                            $V4y0urwpnd3jolumn->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER);
                                            
                                            foreach ($V1xcvo1aivrt->dynamicFilter as $V5oomwejzogu) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    NULL,	
                                                    (string) $V5oomwejzogu["val"],
                                                    (string) $V5oomwejzogu["type"]
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMICFILTER);
                                                if (isset($V5oomwejzogu["val"])) {
                                                    $V4y0urwpnd3jolumn->setAttribute('val',(string) $V5oomwejzogu["val"]);
                                                }
                                                if (isset($V5oomwejzogu["maxVal"])) {
                                                    $V4y0urwpnd3jolumn->setAttribute('maxVal',(string) $V5oomwejzogu["maxVal"]);
                                                }
                                            }
                                        }
                                        
                                        if ($V1xcvo1aivrt->top10) {
                                            $V4y0urwpnd3jolumn->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_TOPTENFILTER);
                                            
                                            foreach ($V1xcvo1aivrt->top10 as $V5oomwejzogu) {
                                                $V4y0urwpnd3jolumn->createRule()->setRule(
                                                    (((isset($V5oomwejzogu["percent"])) && ($V5oomwejzogu["percent"] == 1))
                                                        ? PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT
                                                        : PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_BY_VALUE
                                                    ),
                                                    (string) $V5oomwejzogu["val"],
                                                    (((isset($V5oomwejzogu["top"])) && ($V5oomwejzogu["top"] == 1))
                                                        ? PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP
                                                        : PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_BOTTOM
                                                    )
                                                )
                                                ->setRuleType(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_TOPTENFILTER);
                                            }
                                        }
                                    }
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->mergeCells && $Vkrzhpletdu1Sheet->mergeCells->mergeCell && !$this->_readDataOnly) {
								foreach ($Vkrzhpletdu1Sheet->mergeCells->mergeCell as $V1sqn423aeel) {
									$Vyzi0map1m5s = (string) $V1sqn423aeel["ref"];
									if (strpos($Vyzi0map1m5s,':') !== FALSE) {
										$Vu4dx5bdz5ui->mergeCells((string) $V1sqn423aeel["ref"]);
									}
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->pageMargins && !$this->_readDataOnly) {
								$Vcpmayrzq04k = $Vu4dx5bdz5ui->getPageMargins();
								$Vcpmayrzq04k->setLeft(floatval($Vkrzhpletdu1Sheet->pageMargins["left"]));
								$Vcpmayrzq04k->setRight(floatval($Vkrzhpletdu1Sheet->pageMargins["right"]));
								$Vcpmayrzq04k->setTop(floatval($Vkrzhpletdu1Sheet->pageMargins["top"]));
								$Vcpmayrzq04k->setBottom(floatval($Vkrzhpletdu1Sheet->pageMargins["bottom"]));
								$Vcpmayrzq04k->setHeader(floatval($Vkrzhpletdu1Sheet->pageMargins["header"]));
								$Vcpmayrzq04k->setFooter(floatval($Vkrzhpletdu1Sheet->pageMargins["footer"]));
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->pageSetup && !$this->_readDataOnly) {
								$Vdcxgaecbnli = $Vu4dx5bdz5ui->getPageSetup();

								if (isset($Vkrzhpletdu1Sheet->pageSetup["orientation"])) {
									$Vdcxgaecbnli->setOrientation((string) $Vkrzhpletdu1Sheet->pageSetup["orientation"]);
								}
								if (isset($Vkrzhpletdu1Sheet->pageSetup["paperSize"])) {
									$Vdcxgaecbnli->setPaperSize(intval($Vkrzhpletdu1Sheet->pageSetup["paperSize"]));
								}
								if (isset($Vkrzhpletdu1Sheet->pageSetup["scale"])) {
									$Vdcxgaecbnli->setScale(intval($Vkrzhpletdu1Sheet->pageSetup["scale"]), FALSE);
								}
								if (isset($Vkrzhpletdu1Sheet->pageSetup["fitToHeight"]) && intval($Vkrzhpletdu1Sheet->pageSetup["fitToHeight"]) >= 0) {
									$Vdcxgaecbnli->setFitToHeight(intval($Vkrzhpletdu1Sheet->pageSetup["fitToHeight"]), FALSE);
								}
								if (isset($Vkrzhpletdu1Sheet->pageSetup["fitToWidth"]) && intval($Vkrzhpletdu1Sheet->pageSetup["fitToWidth"]) >= 0) {
									$Vdcxgaecbnli->setFitToWidth(intval($Vkrzhpletdu1Sheet->pageSetup["fitToWidth"]), FALSE);
								}
								if (isset($Vkrzhpletdu1Sheet->pageSetup["firstPageNumber"]) && isset($Vkrzhpletdu1Sheet->pageSetup["useFirstPageNumber"]) &&
									self::boolean((string) $Vkrzhpletdu1Sheet->pageSetup["useFirstPageNumber"])) {
									$Vdcxgaecbnli->setFirstPageNumber(intval($Vkrzhpletdu1Sheet->pageSetup["firstPageNumber"]));
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->headerFooter && !$this->_readDataOnly) {
								$V0ik1a0v2zbi = $Vu4dx5bdz5ui->getHeaderFooter();

								if (isset($Vkrzhpletdu1Sheet->headerFooter["differentOddEven"]) &&
									self::boolean((string)$Vkrzhpletdu1Sheet->headerFooter["differentOddEven"])) {
									$V0ik1a0v2zbi->setDifferentOddEven(TRUE);
								} else {
									$V0ik1a0v2zbi->setDifferentOddEven(FALSE);
								}
								if (isset($Vkrzhpletdu1Sheet->headerFooter["differentFirst"]) &&
									self::boolean((string)$Vkrzhpletdu1Sheet->headerFooter["differentFirst"])) {
									$V0ik1a0v2zbi->setDifferentFirst(TRUE);
								} else {
									$V0ik1a0v2zbi->setDifferentFirst(FALSE);
								}
								if (isset($Vkrzhpletdu1Sheet->headerFooter["scaleWithDoc"]) &&
									!self::boolean((string)$Vkrzhpletdu1Sheet->headerFooter["scaleWithDoc"])) {
									$V0ik1a0v2zbi->setScaleWithDocument(FALSE);
								} else {
									$V0ik1a0v2zbi->setScaleWithDocument(TRUE);
								}
								if (isset($Vkrzhpletdu1Sheet->headerFooter["alignWithMargins"]) &&
									!self::boolean((string)$Vkrzhpletdu1Sheet->headerFooter["alignWithMargins"])) {
									$V0ik1a0v2zbi->setAlignWithMargins(FALSE);
								} else {
									$V0ik1a0v2zbi->setAlignWithMargins(TRUE);
								}

								$V0ik1a0v2zbi->setOddHeader((string) $Vkrzhpletdu1Sheet->headerFooter->oddHeader);
								$V0ik1a0v2zbi->setOddFooter((string) $Vkrzhpletdu1Sheet->headerFooter->oddFooter);
								$V0ik1a0v2zbi->setEvenHeader((string) $Vkrzhpletdu1Sheet->headerFooter->evenHeader);
								$V0ik1a0v2zbi->setEvenFooter((string) $Vkrzhpletdu1Sheet->headerFooter->evenFooter);
								$V0ik1a0v2zbi->setFirstHeader((string) $Vkrzhpletdu1Sheet->headerFooter->firstHeader);
								$V0ik1a0v2zbi->setFirstFooter((string) $Vkrzhpletdu1Sheet->headerFooter->firstFooter);
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->rowBreaks && $Vkrzhpletdu1Sheet->rowBreaks->brk && !$this->_readDataOnly) {
								foreach ($Vkrzhpletdu1Sheet->rowBreaks->brk as $Veoc43ircam5) {
									if ($Veoc43ircam5["man"]) {
										$Vu4dx5bdz5ui->setBreak("A$Veoc43ircam5[id]", PHPExcel_Worksheet::BREAK_ROW);
									}
								}
							}
							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->colBreaks && $Vkrzhpletdu1Sheet->colBreaks->brk && !$this->_readDataOnly) {
								foreach ($Vkrzhpletdu1Sheet->colBreaks->brk as $Veoc43ircam5) {
									if ($Veoc43ircam5["man"]) {
										$Vu4dx5bdz5ui->setBreak(PHPExcel_Cell::stringFromColumnIndex((string) $Veoc43ircam5["id"]) . "1", PHPExcel_Worksheet::BREAK_COLUMN);
									}
								}
							}

							if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->dataValidations && !$this->_readDataOnly) {
								foreach ($Vkrzhpletdu1Sheet->dataValidations->dataValidation as $V0zimrydksvz) {
								    
							    	$Vws44nszhvgoange = strtoupper($V0zimrydksvz["sqref"]);
									$Vws44nszhvgoangeSet = explode(' ',$Vws44nszhvgoange);
									foreach($Vws44nszhvgoangeSet as $Vws44nszhvgoange) {
										$Vo3xldhsd2us = $Vu4dx5bdz5ui->shrinkRangeToFit($Vws44nszhvgoange);

										
										$Vzb52qcgoo0r = PHPExcel_Cell::extractAllCellReferencesInRange($Vo3xldhsd2us);
										foreach ($Vzb52qcgoo0r as $Vws44nszhvgoeference) {
											
											$Vuqzxij5014q = $Vu4dx5bdz5ui->getCell($Vws44nszhvgoeference)->getDataValidation();
											$Vuqzxij5014q->setType((string) $V0zimrydksvz["type"]);
											$Vuqzxij5014q->setErrorStyle((string) $V0zimrydksvz["errorStyle"]);
											$Vuqzxij5014q->setOperator((string) $V0zimrydksvz["operator"]);
											$Vuqzxij5014q->setAllowBlank($V0zimrydksvz["allowBlank"] != 0);
											$Vuqzxij5014q->setShowDropDown($V0zimrydksvz["showDropDown"] == 0);
											$Vuqzxij5014q->setShowInputMessage($V0zimrydksvz["showInputMessage"] != 0);
											$Vuqzxij5014q->setShowErrorMessage($V0zimrydksvz["showErrorMessage"] != 0);
											$Vuqzxij5014q->setErrorTitle((string) $V0zimrydksvz["errorTitle"]);
											$Vuqzxij5014q->setError((string) $V0zimrydksvz["error"]);
											$Vuqzxij5014q->setPromptTitle((string) $V0zimrydksvz["promptTitle"]);
											$Vuqzxij5014q->setPrompt((string) $V0zimrydksvz["prompt"]);
											$Vuqzxij5014q->setFormula1((string) $V0zimrydksvz->formula1);
											$Vuqzxij5014q->setFormula2((string) $V0zimrydksvz->formula2);
										}
									}
								}
							}

							
							$V3x20bvxaczv = array();
							if (!$this->_readDataOnly) {
								
								if ($Vlyvyvxhzbgl->locateName(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels")) {
									$Vwcoqugs3pe3Worksheet = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels") , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
									foreach ($Vwcoqugs3pe3Worksheet->Relationship as $Vuyn1htb2ebd) {
										if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/hyperlink") {
											$V3x20bvxaczv[(string)$Vuyn1htb2ebd["Id"]] = (string)$Vuyn1htb2ebd["Target"];
										}
									}
								}

								
								if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->hyperlinks) {
									foreach ($Vkrzhpletdu1Sheet->hyperlinks->hyperlink as $Vi45zv3gvg3s) {
										
										$Vab1nj1jv33l = $Vi45zv3gvg3s->attributes('http://schemas.openxmlformats.org/officeDocument/2006/relationships');

										foreach (PHPExcel_Cell::extractAllCellReferencesInRange($Vi45zv3gvg3s['ref']) as $V4y0urwpnd3jellReference) {
											$V4y0urwpnd3jell = $Vu4dx5bdz5ui->getCell( $V4y0urwpnd3jellReference );
											if (isset($Vab1nj1jv33l['id'])) {
												$Vi45zv3gvg3sUrl = $V3x20bvxaczv[ (string)$Vab1nj1jv33l['id'] ];
												if (isset($Vi45zv3gvg3s['location'])) {
													$Vi45zv3gvg3sUrl .= '#' . (string) $Vi45zv3gvg3s['location'];
												}
												$V4y0urwpnd3jell->getHyperlink()->setUrl($Vi45zv3gvg3sUrl);
											} elseif (isset($Vi45zv3gvg3s['location'])) {
												$V4y0urwpnd3jell->getHyperlink()->setUrl( 'sheet://' . (string)$Vi45zv3gvg3s['location'] );
											}

											
											if (isset($Vi45zv3gvg3s['tooltip'])) {
												$V4y0urwpnd3jell->getHyperlink()->setTooltip( (string)$Vi45zv3gvg3s['tooltip'] );
											}
										}
									}
								}
							}

							
							$V4y0urwpnd3jomments = array();
							$Vij1hmv1qd3t = array();
							if (!$this->_readDataOnly) {
								
								if ($Vlyvyvxhzbgl->locateName(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels")) {
									$Vwcoqugs3pe3Worksheet = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels") , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
									foreach ($Vwcoqugs3pe3Worksheet->Relationship as $Vuyn1htb2ebd) {
									    if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/comments") {
											$V4y0urwpnd3jomments[(string)$Vuyn1htb2ebd["Id"]] = (string)$Vuyn1htb2ebd["Target"];
										}
									    if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/vmlDrawing") {
											$Vij1hmv1qd3t[(string)$Vuyn1htb2ebd["Id"]] = (string)$Vuyn1htb2ebd["Target"];
										}
									}
								}

								
								foreach ($V4y0urwpnd3jomments as $Vqueays2mm0vName => $Vqueays2mm0vPath) {
									
									$Vqueays2mm0vPath = PHPExcel_Shared_File::realpath(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/" . $Vqueays2mm0vPath);
									$V4y0urwpnd3jommentsFile = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, $Vqueays2mm0vPath) , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());

									
									$V41g1q1douub = array();

									
									foreach ($V4y0urwpnd3jommentsFile->authors->author as $Vbc1vclmfegu) {
										$V41g1q1douub[] = (string)$Vbc1vclmfegu;
									}

									
									foreach ($V4y0urwpnd3jommentsFile->commentList->comment as $V4y0urwpnd3jomment) {
										if(!empty($V4y0urwpnd3jomment['authorId']))
											$Vu4dx5bdz5ui->getComment( (string)$V4y0urwpnd3jomment['ref'] )->setAuthor( $V41g1q1douub[(string)$V4y0urwpnd3jomment['authorId']] );
										$Vu4dx5bdz5ui->getComment( (string)$V4y0urwpnd3jomment['ref'] )->setText( $this->_parseRichText($V4y0urwpnd3jomment->text) );
									}
								}

								
							    foreach ($Vij1hmv1qd3t as $Vqueays2mm0vName => $Vqueays2mm0vPath) {
									
									$Vqueays2mm0vPath = PHPExcel_Shared_File::realpath(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/" . $Vqueays2mm0vPath);
									$Vij1hmv1qd3tFile = simplexml_load_string( $this->_getFromZipArchive($Vlyvyvxhzbgl, $Vqueays2mm0vPath) , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
									$Vij1hmv1qd3tFile->registerXPathNamespace('v', 'urn:schemas-microsoft-com:vml');

									$Vhseqg5no3eb = $Vij1hmv1qd3tFile->xpath('//v:shape');
									foreach ($Vhseqg5no3eb as $Voosz4kwyghq) {
										$Voosz4kwyghq->registerXPathNamespace('v', 'urn:schemas-microsoft-com:vml');

										if (isset($Voosz4kwyghq['style'])) {
	    									$Vdtcpflt5bhp        = (string)$Voosz4kwyghq['style'];
	    									$Vn55j1zzmxcw    = strtoupper( substr( (string)$Voosz4kwyghq['fillcolor'], 1 ) );
	    									$V4y0urwpnd3jolumn       = null;
	    									$Vexbtekafkvl          = null;

	    									$V4y0urwpnd3jlientData   = $Voosz4kwyghq->xpath('.//x:ClientData');
	    									if (is_array($V4y0urwpnd3jlientData) && !empty($V4y0urwpnd3jlientData)) {
	        									$V4y0urwpnd3jlientData   = $V4y0urwpnd3jlientData[0];

	        									if ( isset($V4y0urwpnd3jlientData['ObjectType']) && (string)$V4y0urwpnd3jlientData['ObjectType'] == 'Note' ) {
	        									    $Vcartbxounrh = $V4y0urwpnd3jlientData->xpath('.//x:Row');
	        									    if (is_array($Vcartbxounrh)) $Vexbtekafkvl = $Vcartbxounrh[0];

	        									    $Vcartbxounrh = $V4y0urwpnd3jlientData->xpath('.//x:Column');
	        									    if (is_array($Vcartbxounrh)) $V4y0urwpnd3jolumn = $Vcartbxounrh[0];
	        									}
	    									}

	    									if (($V4y0urwpnd3jolumn !== NULL) && ($Vexbtekafkvl !== NULL)) {
	    									    
	    									    $V4y0urwpnd3jomment = $Vu4dx5bdz5ui->getCommentByColumnAndRow((string) $V4y0urwpnd3jolumn, $Vexbtekafkvl + 1);
	    									    $V4y0urwpnd3jomment->getFillColor()->setRGB( $Vn55j1zzmxcw );

	    									    
	    									    $Vdtcpflt5bhpArray = explode(';', str_replace(' ', '', $Vdtcpflt5bhp));
	    									    foreach ($Vdtcpflt5bhpArray as $Vdtcpflt5bhpPair) {
	    									        $Vdtcpflt5bhpPair = explode(':', $Vdtcpflt5bhpPair);

	    									        if ($Vdtcpflt5bhpPair[0] == 'margin-left')     $V4y0urwpnd3jomment->setMarginLeft($Vdtcpflt5bhpPair[1]);
	    									        if ($Vdtcpflt5bhpPair[0] == 'margin-top')      $V4y0urwpnd3jomment->setMarginTop($Vdtcpflt5bhpPair[1]);
	    									        if ($Vdtcpflt5bhpPair[0] == 'width')           $V4y0urwpnd3jomment->setWidth($Vdtcpflt5bhpPair[1]);
	    									        if ($Vdtcpflt5bhpPair[0] == 'height')          $V4y0urwpnd3jomment->setHeight($Vdtcpflt5bhpPair[1]);
	    									        if ($Vdtcpflt5bhpPair[0] == 'visibility')      $V4y0urwpnd3jomment->setVisible( $Vdtcpflt5bhpPair[1] == 'visible' );

	    									    }
	    									}
										}
									}
								}

								
								if ($Vkrzhpletdu1Sheet && $Vkrzhpletdu1Sheet->legacyDrawingHF && !$this->_readDataOnly) {
									if ($Vlyvyvxhzbgl->locateName(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels")) {
										$Vwcoqugs3pe3Worksheet = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels") , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
										$Vs33niicbukl = '';

										foreach ($Vwcoqugs3pe3Worksheet->Relationship as $Vuyn1htb2ebd) {
											if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/vmlDrawing") {
												$Vs33niicbukl = self::dir_add("$Vgxxrah4zcfh/$Vptyin0skruj", $Vuyn1htb2ebd["Target"]);
											}
										}

										if ($Vs33niicbukl != '') {
											
											$Vwcoqugs3pe3VML = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname($Vs33niicbukl) . '/_rels/' . basename($Vs33niicbukl) . '.rels' ), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
											$Vbeblpikromp = array();
											foreach ($Vwcoqugs3pe3VML->Relationship as $Vuyn1htb2ebd) {
												if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/image") {
													$Vbeblpikromp[(string) $Vuyn1htb2ebd["Id"]] = self::dir_add($Vs33niicbukl, $Vuyn1htb2ebd["Target"]);
												}
											}

											
											$Vednwqti0wu1 = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, $Vs33niicbukl), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
											$Vednwqti0wu1->registerXPathNamespace('v', 'urn:schemas-microsoft-com:vml');

											$V03mzbvvxp32 = array();

											$Vhseqg5no3eb = $Vednwqti0wu1->xpath('//v:shape');
											foreach ($Vhseqg5no3eb as $Vfhiq1lhsojadx => $Voosz4kwyghq) {
												$Voosz4kwyghq->registerXPathNamespace('v', 'urn:schemas-microsoft-com:vml');
												$Vfhiq1lhsojamageData = $Voosz4kwyghq->xpath('//v:imagedata');
												$Vfhiq1lhsojamageData = $Vfhiq1lhsojamageData[$Vfhiq1lhsojadx];

												$Vfhiq1lhsojamageData = $Vfhiq1lhsojamageData->attributes('urn:schemas-microsoft-com:office:office');
												$Vdtcpflt5bhp = self::toCSSArray( (string)$Voosz4kwyghq['style'] );

												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ] = new PHPExcel_Worksheet_HeaderFooterDrawing();
												if (isset($Vfhiq1lhsojamageData['title'])) {
													$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setName( (string)$Vfhiq1lhsojamageData['title'] );
												}

												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setPath("zip://".PHPExcel_Shared_File::realpath($V1tltbb5c5oc)."#" . $Vbeblpikromp[(string)$Vfhiq1lhsojamageData['relid']], false);
												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setResizeProportional(false);
												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setWidth($Vdtcpflt5bhp['width']);
												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setHeight($Vdtcpflt5bhp['height']);
												if (isset($Vdtcpflt5bhp['margin-left'])) {
													$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setOffsetX($Vdtcpflt5bhp['margin-left']);
												}
												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setOffsetY($Vdtcpflt5bhp['margin-top']);
												$V03mzbvvxp32[ (string)$Voosz4kwyghq['id'] ]->setResizeProportional(true);
											}

											$Vu4dx5bdz5ui->getHeaderFooter()->setImages($V03mzbvvxp32);
										}
									}
								}

							}

                            
							if ($Vlyvyvxhzbgl->locateName(dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels")) {
								$Vwcoqugs3pe3Worksheet = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname("$Vgxxrah4zcfh/$Vptyin0skruj") . "/_rels/" . basename($Vptyin0skruj) . ".rels") , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
								$Vbeblpikromp = array();
								foreach ($Vwcoqugs3pe3Worksheet->Relationship as $Vuyn1htb2ebd) {
									if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/drawing") {
										$Vbeblpikromp[(string) $Vuyn1htb2ebd["Id"]] = self::dir_add("$Vgxxrah4zcfh/$Vptyin0skruj", $Vuyn1htb2ebd["Target"]);
									}
								}
								if ($Vkrzhpletdu1Sheet->drawing && !$this->_readDataOnly) {
									foreach ($Vkrzhpletdu1Sheet->drawing as $V2jgycs0t2az) {
										$Vdhyhwrgph5j = $Vbeblpikromp[(string) self::array_item($V2jgycs0t2az->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "id")];
										$Vwcoqugs3pe3Drawing = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl,  dirname($Vdhyhwrgph5j) . "/_rels/" . basename($Vdhyhwrgph5j) . ".rels") , 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions()); 
										$Vfhiq1lhsojamages = array();

										if ($Vwcoqugs3pe3Drawing && $Vwcoqugs3pe3Drawing->Relationship) {
											foreach ($Vwcoqugs3pe3Drawing->Relationship as $Vuyn1htb2ebd) {
												if ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/image") {
													$Vfhiq1lhsojamages[(string) $Vuyn1htb2ebd["Id"]] = self::dir_add($Vdhyhwrgph5j, $Vuyn1htb2ebd["Target"]);
												} elseif ($Vuyn1htb2ebd["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/chart") {
													if ($this->_includeCharts) {
														$V4y0urwpnd3jharts[self::dir_add($Vdhyhwrgph5j, $Vuyn1htb2ebd["Target"])] = array('id'		=> (string) $Vuyn1htb2ebd["Id"],
																													 'sheet'	=> $Vu4dx5bdz5ui->getTitle()
																													);
													}
												}
											}
										}
										$Vkrzhpletdu1Drawing = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, $Vdhyhwrgph5j), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions())->children("http://schemas.openxmlformats.org/drawingml/2006/spreadsheetDrawing");

										if ($Vkrzhpletdu1Drawing->oneCellAnchor) {
											foreach ($Vkrzhpletdu1Drawing->oneCellAnchor as $Vov4swuvowvr) {
												if ($Vov4swuvowvr->pic->blipFill) {
													$Va0n5zfcewok = $Vov4swuvowvr->pic->blipFill->children("http://schemas.openxmlformats.org/drawingml/2006/main")->blip;
													$Voxildtwlfjwrm = $Vov4swuvowvr->pic->spPr->children("http://schemas.openxmlformats.org/drawingml/2006/main")->xfrm;
													$Vwymzzglfmu2 = $Vov4swuvowvr->pic->spPr->children("http://schemas.openxmlformats.org/drawingml/2006/main")->effectLst->outerShdw;
													$Vzzc34vynjv5 = new PHPExcel_Worksheet_Drawing;
													$Vzzc34vynjv5->setName((string) self::array_item($Vov4swuvowvr->pic->nvPicPr->cNvPr->attributes(), "name"));
													$Vzzc34vynjv5->setDescription((string) self::array_item($Vov4swuvowvr->pic->nvPicPr->cNvPr->attributes(), "descr"));
													$Vzzc34vynjv5->setPath("zip://".PHPExcel_Shared_File::realpath($V1tltbb5c5oc)."#" . $Vfhiq1lhsojamages[(string) self::array_item($Va0n5zfcewok->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "embed")], false);
													$Vzzc34vynjv5->setCoordinates(PHPExcel_Cell::stringFromColumnIndex((string) $Vov4swuvowvr->from->col) . ($Vov4swuvowvr->from->row + 1));
													$Vzzc34vynjv5->setOffsetX(PHPExcel_Shared_Drawing::EMUToPixels($Vov4swuvowvr->from->colOff));
													$Vzzc34vynjv5->setOffsetY(PHPExcel_Shared_Drawing::EMUToPixels($Vov4swuvowvr->from->rowOff));
													$Vzzc34vynjv5->setResizeProportional(false);
													$Vzzc34vynjv5->setWidth(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Vov4swuvowvr->ext->attributes(), "cx")));
													$Vzzc34vynjv5->setHeight(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Vov4swuvowvr->ext->attributes(), "cy")));
													if ($Voxildtwlfjwrm) {
														$Vzzc34vynjv5->setRotation(PHPExcel_Shared_Drawing::angleToDegrees(self::array_item($Voxildtwlfjwrm->attributes(), "rot")));
													}
													if ($Vwymzzglfmu2) {
														$Vqzblhfizbex = $Vzzc34vynjv5->getShadow();
														$Vqzblhfizbex->setVisible(true);
														$Vqzblhfizbex->setBlurRadius(PHPExcel_Shared_Drawing::EMUTopixels(self::array_item($Vwymzzglfmu2->attributes(), "blurRad")));
														$Vqzblhfizbex->setDistance(PHPExcel_Shared_Drawing::EMUTopixels(self::array_item($Vwymzzglfmu2->attributes(), "dist")));
														$Vqzblhfizbex->setDirection(PHPExcel_Shared_Drawing::angleToDegrees(self::array_item($Vwymzzglfmu2->attributes(), "dir")));
														$Vqzblhfizbex->setAlignment((string) self::array_item($Vwymzzglfmu2->attributes(), "algn"));
														$Vqzblhfizbex->getColor()->setRGB(self::array_item($Vwymzzglfmu2->srgbClr->attributes(), "val"));
														$Vqzblhfizbex->setAlpha(self::array_item($Vwymzzglfmu2->srgbClr->alpha->attributes(), "val") / 1000);
													}
													$Vzzc34vynjv5->setWorksheet($Vu4dx5bdz5ui);
												} else {
													
													$V4y0urwpnd3joordinates	= PHPExcel_Cell::stringFromColumnIndex((string) $Vov4swuvowvr->from->col) . ($Vov4swuvowvr->from->row + 1);
													$Vsjv51hindtf		= PHPExcel_Shared_Drawing::EMUToPixels($Vov4swuvowvr->from->colOff);
													$Vpalzrg3mgla		= PHPExcel_Shared_Drawing::EMUToPixels($Vov4swuvowvr->from->rowOff);
													$Vojs2qdgagwv			= PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Vov4swuvowvr->ext->attributes(), "cx"));
													$Vzo4g5xb4yip			= PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Vov4swuvowvr->ext->attributes(), "cy"));
												}
											}
										}
										if ($Vkrzhpletdu1Drawing->twoCellAnchor) {
											foreach ($Vkrzhpletdu1Drawing->twoCellAnchor as $V2x0gkckgayx) {
												if ($V2x0gkckgayx->pic->blipFill) {
													$Va0n5zfcewok = $V2x0gkckgayx->pic->blipFill->children("http://schemas.openxmlformats.org/drawingml/2006/main")->blip;
													$Voxildtwlfjwrm = $V2x0gkckgayx->pic->spPr->children("http://schemas.openxmlformats.org/drawingml/2006/main")->xfrm;
													$Vwymzzglfmu2 = $V2x0gkckgayx->pic->spPr->children("http://schemas.openxmlformats.org/drawingml/2006/main")->effectLst->outerShdw;
													$Vzzc34vynjv5 = new PHPExcel_Worksheet_Drawing;
													$Vzzc34vynjv5->setName((string) self::array_item($V2x0gkckgayx->pic->nvPicPr->cNvPr->attributes(), "name"));
													$Vzzc34vynjv5->setDescription((string) self::array_item($V2x0gkckgayx->pic->nvPicPr->cNvPr->attributes(), "descr"));
													$Vzzc34vynjv5->setPath("zip://".PHPExcel_Shared_File::realpath($V1tltbb5c5oc)."#" . $Vfhiq1lhsojamages[(string) self::array_item($Va0n5zfcewok->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "embed")], false);
													$Vzzc34vynjv5->setCoordinates(PHPExcel_Cell::stringFromColumnIndex((string) $V2x0gkckgayx->from->col) . ($V2x0gkckgayx->from->row + 1));
													$Vzzc34vynjv5->setOffsetX(PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->from->colOff));
													$Vzzc34vynjv5->setOffsetY(PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->from->rowOff));
													$Vzzc34vynjv5->setResizeProportional(false);

													$Vzzc34vynjv5->setWidth(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Voxildtwlfjwrm->ext->attributes(), "cx")));
													$Vzzc34vynjv5->setHeight(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($Voxildtwlfjwrm->ext->attributes(), "cy")));

													if ($Voxildtwlfjwrm) {
														$Vzzc34vynjv5->setRotation(PHPExcel_Shared_Drawing::angleToDegrees(self::array_item($Voxildtwlfjwrm->attributes(), "rot")));
													}
													if ($Vwymzzglfmu2) {
														$Vqzblhfizbex = $Vzzc34vynjv5->getShadow();
														$Vqzblhfizbex->setVisible(true);
														$Vqzblhfizbex->setBlurRadius(PHPExcel_Shared_Drawing::EMUTopixels(self::array_item($Vwymzzglfmu2->attributes(), "blurRad")));
														$Vqzblhfizbex->setDistance(PHPExcel_Shared_Drawing::EMUTopixels(self::array_item($Vwymzzglfmu2->attributes(), "dist")));
														$Vqzblhfizbex->setDirection(PHPExcel_Shared_Drawing::angleToDegrees(self::array_item($Vwymzzglfmu2->attributes(), "dir")));
														$Vqzblhfizbex->setAlignment((string) self::array_item($Vwymzzglfmu2->attributes(), "algn"));
														$Vqzblhfizbex->getColor()->setRGB(self::array_item($Vwymzzglfmu2->srgbClr->attributes(), "val"));
														$Vqzblhfizbex->setAlpha(self::array_item($Vwymzzglfmu2->srgbClr->alpha->attributes(), "val") / 1000);
													}
													$Vzzc34vynjv5->setWorksheet($Vu4dx5bdz5ui);
												} elseif(($this->_includeCharts) && ($V2x0gkckgayx->graphicFrame)) {
													$Vtwr13p4goxh	= PHPExcel_Cell::stringFromColumnIndex((string) $V2x0gkckgayx->from->col) . ($V2x0gkckgayx->from->row + 1);
													$Vayprvradnow	= PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->from->colOff);
													$Vxknvpco12q4	= PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->from->rowOff);
													$V14ylk15gdeu	= PHPExcel_Cell::stringFromColumnIndex((string) $V2x0gkckgayx->to->col) . ($V2x0gkckgayx->to->row + 1);
													$Vkyp5ajsnsem		= PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->to->colOff);
													$Vqtnngb0dm1k		= PHPExcel_Shared_Drawing::EMUToPixels($V2x0gkckgayx->to->rowOff);
													$Vbwxovjgxcoj		= $V2x0gkckgayx->graphicFrame->children("http://schemas.openxmlformats.org/drawingml/2006/main")->graphic;
													$V4y0urwpnd3jhartRef		= $Vbwxovjgxcoj->graphicData->children("http://schemas.openxmlformats.org/drawingml/2006/chart")->chart;
													$Vf5k31eyhon1		= (string) $V4y0urwpnd3jhartRef->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships");

													$V4y0urwpnd3jhartDetails[$Vu4dx5bdz5ui->getTitle().'!'.$Vf5k31eyhon1] =
															array(	'fromCoordinate'	=> $Vtwr13p4goxh,
																	'fromOffsetX'		=> $Vayprvradnow,
																	'fromOffsetY'		=> $Vxknvpco12q4,
																	'toCoordinate'		=> $V14ylk15gdeu,
																	'toOffsetX'			=> $Vkyp5ajsnsem,
																	'toOffsetY'			=> $Vqtnngb0dm1k,
																	'worksheetTitle'	=> $Vu4dx5bdz5ui->getTitle()
																 );
												}
											}
										}

									}
								}
							}

							
							if ($Vfswzpz55ril->definedNames) {
								foreach ($Vfswzpz55ril->definedNames->definedName as $Vidd2qyqjf54) {
									
									$Voqbysp2eewd = (string)$Vidd2qyqjf54;
									$Voqbysp2eewd = preg_replace('/\'(\w+)\'\!/', '', $Voqbysp2eewd);
									if (($Vjultkxgqf4t = strpos($Voqbysp2eewd,'!')) !== false) {
										$Voqbysp2eewd = substr($Voqbysp2eewd,0,$Vjultkxgqf4t).str_replace('$', '', substr($Voqbysp2eewd,$Vjultkxgqf4t));
									} else {
										$Voqbysp2eewd = str_replace('$', '', $Voqbysp2eewd);
									}

									
									if (stripos((string)$Vidd2qyqjf54, '#REF!') !== FALSE || $Voqbysp2eewd == '') {
										continue;
									}

									
									if ((string)$Vidd2qyqjf54['localSheetId'] != '' && (string)$Vidd2qyqjf54['localSheetId'] == $Valxnycf2yig) {
										
										switch ((string)$Vidd2qyqjf54['name']) {

											case '_xlnm._FilterDatabase':
												if ((string)$Vidd2qyqjf54['hidden'] !== '1') {
                                                    $Voqbysp2eewd = explode(',', $Voqbysp2eewd);
                                                    foreach ($Voqbysp2eewd as $Vws44nszhvgoange) {
                                                        $Vf22y2ugjneq = $Vws44nszhvgoange;
                                                        if (strpos($Vf22y2ugjneq, ':') !== false) {
                                                            $Vu4dx5bdz5ui->getAutoFilter()->setRange($Vf22y2ugjneq);
                                                        }
                                                    }
												}
												break;

											case '_xlnm.Print_Titles':
												
												$Voqbysp2eewd = explode(',', $Voqbysp2eewd);

												
												foreach ($Voqbysp2eewd as $Vws44nszhvgoange) {
													$Vt3xexsia3ta = array();
													$Vws44nszhvgoange = str_replace('$', '', $Vws44nszhvgoange);

													
													if (preg_match('/!?([A-Z]+)\:([A-Z]+)$/', $Vws44nszhvgoange, $Vt3xexsia3ta)) {
														$Vu4dx5bdz5ui->getPageSetup()->setColumnsToRepeatAtLeft(array($Vt3xexsia3ta[1], $Vt3xexsia3ta[2]));
													}
													
													elseif (preg_match('/!?(\d+)\:(\d+)$/', $Vws44nszhvgoange, $Vt3xexsia3ta)) {
														$Vu4dx5bdz5ui->getPageSetup()->setRowsToRepeatAtTop(array($Vt3xexsia3ta[1], $Vt3xexsia3ta[2]));
													}
												}
												break;

											case '_xlnm.Print_Area':
												$Vws44nszhvgoangeSets = explode(',', $Voqbysp2eewd);		
												$Vulwdjwyye3u = array();
												foreach($Vws44nszhvgoangeSets as $Vws44nszhvgoangeSet) {
													$Vws44nszhvgoange = explode('!', $Vws44nszhvgoangeSet);	
													$Vws44nszhvgoangeSet = isset($Vws44nszhvgoange[1]) ? $Vws44nszhvgoange[1] : $Vws44nszhvgoange[0];
													if (strpos($Vws44nszhvgoangeSet, ':') === FALSE) {
														$Vws44nszhvgoangeSet = $Vws44nszhvgoangeSet . ':' . $Vws44nszhvgoangeSet;
													}
													$Vulwdjwyye3u[] = str_replace('$', '', $Vws44nszhvgoangeSet);
												}
												$Vu4dx5bdz5ui->getPageSetup()->setPrintArea(implode(',',$Vulwdjwyye3u));
												break;

											default:
												break;
										}
									}
								}
							}

							
							++$Valxnycf2yig;
						}

						
						if ($Vfswzpz55ril->definedNames) {
							foreach ($Vfswzpz55ril->definedNames->definedName as $Vidd2qyqjf54) {
								
								$Voqbysp2eewd = (string)$Vidd2qyqjf54;
								$Voqbysp2eewd = preg_replace('/\'(\w+)\'\!/', '', $Voqbysp2eewd);
								if (($Vjultkxgqf4t = strpos($Voqbysp2eewd,'!')) !== false) {
									$Voqbysp2eewd = substr($Voqbysp2eewd,0,$Vjultkxgqf4t).str_replace('$', '', substr($Voqbysp2eewd,$Vjultkxgqf4t));
								} else {
									$Voqbysp2eewd = str_replace('$', '', $Voqbysp2eewd);
								}

								
								if (stripos((string)$Vidd2qyqjf54, '#REF!') !== false || $Voqbysp2eewd == '') {
									continue;
								}

								
								if ((string)$Vidd2qyqjf54['localSheetId'] != '') {
									
									
									switch ((string)$Vidd2qyqjf54['name']) {

										case '_xlnm._FilterDatabase':
										case '_xlnm.Print_Titles':
										case '_xlnm.Print_Area':
											break;

										default:
											if ($V34nxzho4p2z[(integer) $Vidd2qyqjf54['localSheetId']] !== null) {
												$Vws44nszhvgoange = explode('!', (string)$Vidd2qyqjf54);
												if (count($Vws44nszhvgoange) == 2) {
													$Vws44nszhvgoange[0] = str_replace("''", "'", $Vws44nszhvgoange[0]);
													$Vws44nszhvgoange[0] = str_replace("'", "", $Vws44nszhvgoange[0]);
													if ($V4jvbeui0jzb = $Vu4dx5bdz5ui->getParent()->getSheetByName($Vws44nszhvgoange[0])) {
														$Voqbysp2eewd = str_replace('$', '', $Vws44nszhvgoange[1]);
														$Vy3ih0q3qopd = $Vu4dx5bdz5ui->getParent()->getSheet($V34nxzho4p2z[(integer) $Vidd2qyqjf54['localSheetId']]);
														$Vmwcy2n03xm0->addNamedRange( new PHPExcel_NamedRange((string)$Vidd2qyqjf54['name'], $V4jvbeui0jzb, $Voqbysp2eewd, true, $Vy3ih0q3qopd) );
													}
												}
											}
											break;
									}
								} else if (!isset($Vidd2qyqjf54['localSheetId'])) {
									
									$Vmlk5zb3zcih = null;
									$Vy5qsbh2ilks = '';
									if (strpos( (string)$Vidd2qyqjf54, '!' ) !== false) {
										
										$Vy5qsbh2ilks = PHPExcel_Worksheet::extractSheetTitle( (string)$Vidd2qyqjf54, true );
										$Vy5qsbh2ilks = $Vy5qsbh2ilks[0];

										
										$Vmlk5zb3zcih = $Vmwcy2n03xm0->getSheetByName($Vy5qsbh2ilks);

										
										$Vws44nszhvgoange = explode('!', $Voqbysp2eewd);
										$Voqbysp2eewd = isset($Vws44nszhvgoange[1]) ? $Vws44nszhvgoange[1] : $Vws44nszhvgoange[0];
									}

									if ($Vmlk5zb3zcih !== NULL) {
										$Vmwcy2n03xm0->addNamedRange( new PHPExcel_NamedRange((string)$Vidd2qyqjf54['name'], $Vmlk5zb3zcih, $Voqbysp2eewd, false) );
									}
								}
							}
						}
					}

					if ((!$this->_readDataOnly) || (!empty($this->_loadSheetsOnly))) {
						
						$Vdzxgv0xai1n = intval($Vfswzpz55ril->bookViews->workbookView["activeTab"]); 

						
						if (isset($V34nxzho4p2z[$Vdzxgv0xai1n]) && $V34nxzho4p2z[$Vdzxgv0xai1n] !== null) {
							$Vmwcy2n03xm0->setActiveSheetIndex($V34nxzho4p2z[$Vdzxgv0xai1n]);
						} else {
							if ($Vmwcy2n03xm0->getSheetCount() == 0) {
								$Vmwcy2n03xm0->createSheet();
							}
							$Vmwcy2n03xm0->setActiveSheetIndex(0);
						}
					}
				break;
			}

		}


		if (!$this->_readDataOnly) {
			$V4y0urwpnd3jontentTypes = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, "[Content_Types].xml"), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
			foreach ($V4y0urwpnd3jontentTypes->Override as $V4y0urwpnd3jontentType) {
				switch ($V4y0urwpnd3jontentType["ContentType"]) {
					case "application/vnd.openxmlformats-officedocument.drawingml.chart+xml":
						if ($this->_includeCharts) {
							$V4y0urwpnd3jhartEntryRef = ltrim($V4y0urwpnd3jontentType['PartName'],'/');
							$V4y0urwpnd3jhartElements = simplexml_load_string($this->_getFromZipArchive($Vlyvyvxhzbgl, $V4y0urwpnd3jhartEntryRef), 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
							$Venbfifw5zyv = PHPExcel_Reader_Excel2007_Chart::readChart($V4y0urwpnd3jhartElements,basename($V4y0urwpnd3jhartEntryRef,'.xml'));




							if (isset($V4y0urwpnd3jharts[$V4y0urwpnd3jhartEntryRef])) {
								$V4y0urwpnd3jhartPositionRef = $V4y0urwpnd3jharts[$V4y0urwpnd3jhartEntryRef]['sheet'].'!'.$V4y0urwpnd3jharts[$V4y0urwpnd3jhartEntryRef]['id'];

								if (isset($V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef])) {


									$Vmwcy2n03xm0->getSheetByName($V4y0urwpnd3jharts[$V4y0urwpnd3jhartEntryRef]['sheet'])->addChart($Venbfifw5zyv);
									$Venbfifw5zyv->setWorksheet($Vmwcy2n03xm0->getSheetByName($V4y0urwpnd3jharts[$V4y0urwpnd3jhartEntryRef]['sheet']));
									$Venbfifw5zyv->setTopLeftPosition( $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['fromCoordinate'],
																   $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['fromOffsetX'],
																   $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['fromOffsetY']
																 );
									$Venbfifw5zyv->setBottomRightPosition( $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['toCoordinate'],
																	   $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['toOffsetX'],
																	   $V4y0urwpnd3jhartDetails[$V4y0urwpnd3jhartPositionRef]['toOffsetY']
																	 );
								}
							}
						}
				}
			}
		}

		$Vlyvyvxhzbgl->close();

		return $Vmwcy2n03xm0;
	}


	private static function _readColor($V4y0urwpnd3jolor, $Vwgo50mn55xx=FALSE) {
		if (isset($V4y0urwpnd3jolor["rgb"])) {
			return (string)$V4y0urwpnd3jolor["rgb"];
		} else if (isset($V4y0urwpnd3jolor["indexed"])) {
			return PHPExcel_Style_Color::indexedColor($V4y0urwpnd3jolor["indexed"]-7,$Vwgo50mn55xx)->getARGB();
		} else if (isset($V4y0urwpnd3jolor["theme"])) {
			if (self::$Vudkzylen1kt !== NULL) {
				$Vws44nszhvgoeturnColour = self::$Vudkzylen1kt->getColourByIndex((int)$V4y0urwpnd3jolor["theme"]);
				if (isset($V4y0urwpnd3jolor["tint"])) {
					$Vcrtibe0sel2 = (float) $V4y0urwpnd3jolor["tint"];
					$Vws44nszhvgoeturnColour = PHPExcel_Style_Color::changeBrightness($Vws44nszhvgoeturnColour, $Vcrtibe0sel2);
				}
				return 'FF'.$Vws44nszhvgoeturnColour;
			}
		}

		if ($Vwgo50mn55xx) {
			return 'FFFFFFFF';
		}
		return 'FF000000';
	}


	private static function _readStyle($Vpkpqid1vd0o, $Vdtcpflt5bhp) {
		




				$Vpkpqid1vd0o->getNumberFormat()->setFormatCode($Vdtcpflt5bhp->numFmt);



		
		if (isset($Vdtcpflt5bhp->font)) {
			$Vpkpqid1vd0o->getFont()->setName((string) $Vdtcpflt5bhp->font->name["val"]);
			$Vpkpqid1vd0o->getFont()->setSize((string) $Vdtcpflt5bhp->font->sz["val"]);
			if (isset($Vdtcpflt5bhp->font->b)) {
				$Vpkpqid1vd0o->getFont()->setBold(!isset($Vdtcpflt5bhp->font->b["val"]) || self::boolean((string) $Vdtcpflt5bhp->font->b["val"]));
			}
			if (isset($Vdtcpflt5bhp->font->i)) {
				$Vpkpqid1vd0o->getFont()->setItalic(!isset($Vdtcpflt5bhp->font->i["val"]) || self::boolean((string) $Vdtcpflt5bhp->font->i["val"]));
			}
			if (isset($Vdtcpflt5bhp->font->strike)) {
				$Vpkpqid1vd0o->getFont()->setStrikethrough(!isset($Vdtcpflt5bhp->font->strike["val"]) || self::boolean((string) $Vdtcpflt5bhp->font->strike["val"]));
			}
			$Vpkpqid1vd0o->getFont()->getColor()->setARGB(self::_readColor($Vdtcpflt5bhp->font->color));

			if (isset($Vdtcpflt5bhp->font->u) && !isset($Vdtcpflt5bhp->font->u["val"])) {
				$Vpkpqid1vd0o->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
			} else if (isset($Vdtcpflt5bhp->font->u) && isset($Vdtcpflt5bhp->font->u["val"])) {
				$Vpkpqid1vd0o->getFont()->setUnderline((string)$Vdtcpflt5bhp->font->u["val"]);
			}

			if (isset($Vdtcpflt5bhp->font->vertAlign) && isset($Vdtcpflt5bhp->font->vertAlign["val"])) {
				$Vkz0ybgtgb4u = strtolower((string)$Vdtcpflt5bhp->font->vertAlign["val"]);
				if ($Vkz0ybgtgb4u == 'superscript') {
					$Vpkpqid1vd0o->getFont()->setSuperScript(true);
				}
				if ($Vkz0ybgtgb4u == 'subscript') {
					$Vpkpqid1vd0o->getFont()->setSubScript(true);
				}
			}
		}

		
		if (isset($Vdtcpflt5bhp->fill)) {
			if ($Vdtcpflt5bhp->fill->gradientFill) {
				$V4mdl50t3og0 = $Vdtcpflt5bhp->fill->gradientFill[0];
				if(!empty($V4mdl50t3og0["type"])) {
					$Vpkpqid1vd0o->getFill()->setFillType((string) $V4mdl50t3og0["type"]);
				}
				$Vpkpqid1vd0o->getFill()->setRotation(floatval($V4mdl50t3og0["degree"]));
				$V4mdl50t3og0->registerXPathNamespace("sml", "http://schemas.openxmlformats.org/spreadsheetml/2006/main");
				$Vpkpqid1vd0o->getFill()->getStartColor()->setARGB(self::_readColor( self::array_item($V4mdl50t3og0->xpath("sml:stop[@position=0]"))->color) );
				$Vpkpqid1vd0o->getFill()->getEndColor()->setARGB(self::_readColor( self::array_item($V4mdl50t3og0->xpath("sml:stop[@position=1]"))->color) );
			} elseif ($Vdtcpflt5bhp->fill->patternFill) {
				$Vmehfroea1yd = (string)$Vdtcpflt5bhp->fill->patternFill["patternType"] != '' ? (string)$Vdtcpflt5bhp->fill->patternFill["patternType"] : 'solid';
				$Vpkpqid1vd0o->getFill()->setFillType($Vmehfroea1yd);
				if ($Vdtcpflt5bhp->fill->patternFill->fgColor) {
					$Vpkpqid1vd0o->getFill()->getStartColor()->setARGB(self::_readColor($Vdtcpflt5bhp->fill->patternFill->fgColor,true));
				} else {
					$Vpkpqid1vd0o->getFill()->getStartColor()->setARGB('FF000000');
				}
				if ($Vdtcpflt5bhp->fill->patternFill->bgColor) {
					$Vpkpqid1vd0o->getFill()->getEndColor()->setARGB(self::_readColor($Vdtcpflt5bhp->fill->patternFill->bgColor,true));
				}
			}
		}

		
		if (isset($Vdtcpflt5bhp->border)) {
			$Vh4dpkn30ldm = self::boolean((string) $Vdtcpflt5bhp->border["diagonalUp"]);
			$Vhrz22tipjjj = self::boolean((string) $Vdtcpflt5bhp->border["diagonalDown"]);
			if (!$Vh4dpkn30ldm && !$Vhrz22tipjjj) {
				$Vpkpqid1vd0o->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_NONE);
			} elseif ($Vh4dpkn30ldm && !$Vhrz22tipjjj) {
				$Vpkpqid1vd0o->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_UP);
			} elseif (!$Vh4dpkn30ldm && $Vhrz22tipjjj) {
				$Vpkpqid1vd0o->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_DOWN);
			} else {
				$Vpkpqid1vd0o->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_BOTH);
			}
			self::_readBorder($Vpkpqid1vd0o->getBorders()->getLeft(), $Vdtcpflt5bhp->border->left);
			self::_readBorder($Vpkpqid1vd0o->getBorders()->getRight(), $Vdtcpflt5bhp->border->right);
			self::_readBorder($Vpkpqid1vd0o->getBorders()->getTop(), $Vdtcpflt5bhp->border->top);
			self::_readBorder($Vpkpqid1vd0o->getBorders()->getBottom(), $Vdtcpflt5bhp->border->bottom);
			self::_readBorder($Vpkpqid1vd0o->getBorders()->getDiagonal(), $Vdtcpflt5bhp->border->diagonal);
		}

		
		if (isset($Vdtcpflt5bhp->alignment)) {
			$Vpkpqid1vd0o->getAlignment()->setHorizontal((string) $Vdtcpflt5bhp->alignment["horizontal"]);
			$Vpkpqid1vd0o->getAlignment()->setVertical((string) $Vdtcpflt5bhp->alignment["vertical"]);

			$Vkbd3edaufbx = 0;
			if ((int)$Vdtcpflt5bhp->alignment["textRotation"] <= 90) {
				$Vkbd3edaufbx = (int)$Vdtcpflt5bhp->alignment["textRotation"];
			} else if ((int)$Vdtcpflt5bhp->alignment["textRotation"] > 90) {
				$Vkbd3edaufbx = 90 - (int)$Vdtcpflt5bhp->alignment["textRotation"];
			}

			$Vpkpqid1vd0o->getAlignment()->setTextRotation(intval($Vkbd3edaufbx));
			$Vpkpqid1vd0o->getAlignment()->setWrapText(self::boolean((string) $Vdtcpflt5bhp->alignment["wrapText"]));
			$Vpkpqid1vd0o->getAlignment()->setShrinkToFit(self::boolean((string) $Vdtcpflt5bhp->alignment["shrinkToFit"]));
			$Vpkpqid1vd0o->getAlignment()->setIndent( intval((string)$Vdtcpflt5bhp->alignment["indent"]) > 0 ? intval((string)$Vdtcpflt5bhp->alignment["indent"]) : 0 );
			$Vpkpqid1vd0o->getAlignment()->setReadorder( intval((string)$Vdtcpflt5bhp->alignment["readingOrder"]) > 0 ? intval((string)$Vdtcpflt5bhp->alignment["readingOrder"]) : 0 );
		}

		
		if (isset($Vdtcpflt5bhp->protection)) {
			if (isset($Vdtcpflt5bhp->protection['locked'])) {
				if (self::boolean((string) $Vdtcpflt5bhp->protection['locked'])) {
					$Vpkpqid1vd0o->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
				} else {
					$Vpkpqid1vd0o->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
				}
			}

			if (isset($Vdtcpflt5bhp->protection['hidden'])) {
				if (self::boolean((string) $Vdtcpflt5bhp->protection['hidden'])) {
					$Vpkpqid1vd0o->getProtection()->setHidden(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
				} else {
					$Vpkpqid1vd0o->getProtection()->setHidden(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
				}
			}
		}

		
		if (isset($Vdtcpflt5bhp->quotePrefix)) {
			$Vpkpqid1vd0o->setQuotePrefix($Vdtcpflt5bhp->quotePrefix);
        }
	}


	private static function _readBorder($Vivebyftlqcj, $Vuyn1htb2ebdBorder) {
		if (isset($Vuyn1htb2ebdBorder["style"])) {
			$Vivebyftlqcj->setBorderStyle((string) $Vuyn1htb2ebdBorder["style"]);
		}
		if (isset($Vuyn1htb2ebdBorder->color)) {
			$Vivebyftlqcj->getColor()->setARGB(self::_readColor($Vuyn1htb2ebdBorder->color));
		}
	}


	private function _parseRichText($Vfhiq1lhsojas = null) {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		if (isset($Vfhiq1lhsojas->t)) {
			$Vp4xjtpabm0l->createText( PHPExcel_Shared_String::ControlCharacterOOXML2PHP( (string) $Vfhiq1lhsojas->t ) );
		} else {
			if(is_object($Vfhiq1lhsojas->r)) {
			foreach ($Vfhiq1lhsojas->r as $Vws44nszhvgoun) {
				if (!isset($Vws44nszhvgoun->rPr)) {
					$Vd42qkadafql = $Vp4xjtpabm0l->createText( PHPExcel_Shared_String::ControlCharacterOOXML2PHP( (string) $Vws44nszhvgoun->t ) );

				} else {
					$Vd42qkadafql = $Vp4xjtpabm0l->createTextRun( PHPExcel_Shared_String::ControlCharacterOOXML2PHP( (string) $Vws44nszhvgoun->t ) );

					if (isset($Vws44nszhvgoun->rPr->rFont["val"])) {
						$Vd42qkadafql->getFont()->setName((string) $Vws44nszhvgoun->rPr->rFont["val"]);
					}

					if (isset($Vws44nszhvgoun->rPr->sz["val"])) {
						$Vd42qkadafql->getFont()->setSize((string) $Vws44nszhvgoun->rPr->sz["val"]);
					}

					if (isset($Vws44nszhvgoun->rPr->color)) {
						$Vd42qkadafql->getFont()->setColor( new PHPExcel_Style_Color( self::_readColor($Vws44nszhvgoun->rPr->color) ) );
					}

					if ((isset($Vws44nszhvgoun->rPr->b["val"]) && self::boolean((string) $Vws44nszhvgoun->rPr->b["val"])) ||
						(isset($Vws44nszhvgoun->rPr->b) && !isset($Vws44nszhvgoun->rPr->b["val"]))) {
						$Vd42qkadafql->getFont()->setBold(TRUE);
					}

					if ((isset($Vws44nszhvgoun->rPr->i["val"]) && self::boolean((string) $Vws44nszhvgoun->rPr->i["val"])) ||
						(isset($Vws44nszhvgoun->rPr->i) && !isset($Vws44nszhvgoun->rPr->i["val"]))) {
						$Vd42qkadafql->getFont()->setItalic(TRUE);
					}

					if (isset($Vws44nszhvgoun->rPr->vertAlign) && isset($Vws44nszhvgoun->rPr->vertAlign["val"])) {
						$Vkz0ybgtgb4u = strtolower((string)$Vws44nszhvgoun->rPr->vertAlign["val"]);
						if ($Vkz0ybgtgb4u == 'superscript') {
							$Vd42qkadafql->getFont()->setSuperScript(TRUE);
						}
						if ($Vkz0ybgtgb4u == 'subscript') {
							$Vd42qkadafql->getFont()->setSubScript(TRUE);
						}
					}

					if (isset($Vws44nszhvgoun->rPr->u) && !isset($Vws44nszhvgoun->rPr->u["val"])) {
						$Vd42qkadafql->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
					} else if (isset($Vws44nszhvgoun->rPr->u) && isset($Vws44nszhvgoun->rPr->u["val"])) {
						$Vd42qkadafql->getFont()->setUnderline((string)$Vws44nszhvgoun->rPr->u["val"]);
					}

					if ((isset($Vws44nszhvgoun->rPr->strike["val"]) && self::boolean((string) $Vws44nszhvgoun->rPr->strike["val"])) ||
						(isset($Vws44nszhvgoun->rPr->strike) && !isset($Vws44nszhvgoun->rPr->strike["val"]))) {
						$Vd42qkadafql->getFont()->setStrikethrough(TRUE);
					}
				}
			}
			}
		}

		return $Vp4xjtpabm0l;
	}

	private function _readRibbon($Vmwcy2n03xm0, $V4y0urwpnd3justomUITarget, $Vlyvyvxhzbgl)
    {
		$Vkmjru3yyon3 = dirname($V4y0urwpnd3justomUITarget);
		$Vtp3yg24key2 = basename($V4y0urwpnd3justomUITarget);
        
		$Vgj1dmpxcpop = $this->_getFromZipArchive($Vlyvyvxhzbgl, $V4y0urwpnd3justomUITarget);
		$V4y0urwpnd3justomUIImagesNames = array();
        $V4y0urwpnd3justomUIImagesBinaries = array();
        
		$Vdv2s0q4fekw = $Vkmjru3yyon3 . '/_rels/' . $Vtp3yg24key2 . '.rels';
		$V4tpm1tqmokm = $this->_getFromZipArchive($Vlyvyvxhzbgl, $Vdv2s0q4fekw);
		if ($V4tpm1tqmokm) {
            
			$V4clnf3cp55g = simplexml_load_string($V4tpm1tqmokm, 'SimpleXMLElement', PHPExcel_Settings::getLibXmlLoaderOptions());
			if ($V4clnf3cp55g) {
				
				foreach ($V4clnf3cp55g->Relationship as $Vuyn1htb2ebd) {
					if ($Vuyn1htb2ebd["Type"] == 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image') {
                        
						$V4y0urwpnd3justomUIImagesNames[(string) $Vuyn1htb2ebd['Id']] = (string)$Vuyn1htb2ebd['Target'];
						$V4y0urwpnd3justomUIImagesBinaries[(string)$Vuyn1htb2ebd['Target']] = $this->_getFromZipArchive($Vlyvyvxhzbgl, $Vkmjru3yyon3 . '/' . (string) $Vuyn1htb2ebd['Target']);
					}
				}
			}
		}
		if ($Vgj1dmpxcpop) {
			$Vmwcy2n03xm0->setRibbonXMLData($V4y0urwpnd3justomUITarget, $Vgj1dmpxcpop);
			if (count($V4y0urwpnd3justomUIImagesNames) > 0 && count($V4y0urwpnd3justomUIImagesBinaries) > 0) {
				$Vmwcy2n03xm0->setRibbonBinObjects($V4y0urwpnd3justomUIImagesNames, $V4y0urwpnd3justomUIImagesBinaries);
			} else {
				$Vmwcy2n03xm0->setRibbonBinObjects(NULL);
			}
		} else {
			$Vmwcy2n03xm0->setRibbonXMLData(NULL);
			$Vmwcy2n03xm0->setRibbonBinObjects(NULL);
		}
	}

	private static function array_item($Vi2ourgzeiw5, $V51lf1kcbto4ey = 0) {
		return (isset($Vi2ourgzeiw5[$V51lf1kcbto4ey]) ? $Vi2ourgzeiw5[$V51lf1kcbto4ey] : null);
	}


	private static function dir_add($V4j05uvad05v, $Vdxgafuwyzuj) {
		return preg_replace('~[^/]+/\.\./~', '', dirname($V4j05uvad05v) . "/$Vdxgafuwyzuj");
	}


	private static function toCSSArray($Vdtcpflt5bhp) {
		$Vdtcpflt5bhp = str_replace(array("\r","\n"), "", $Vdtcpflt5bhp);

		$Vcartbxounrh = explode(';', $Vdtcpflt5bhp);
		$Vdtcpflt5bhp = array();
		foreach ($Vcartbxounrh as $Vfhiq1lhsojatem) {
			$Vfhiq1lhsojatem = explode(':', $Vfhiq1lhsojatem);

			if (strpos($Vfhiq1lhsojatem[1], 'px') !== false) {
				$Vfhiq1lhsojatem[1] = str_replace('px', '', $Vfhiq1lhsojatem[1]);
			}
			if (strpos($Vfhiq1lhsojatem[1], 'pt') !== false) {
				$Vfhiq1lhsojatem[1] = str_replace('pt', '', $Vfhiq1lhsojatem[1]);
				$Vfhiq1lhsojatem[1] = PHPExcel_Shared_Font::fontSizeToPixels($Vfhiq1lhsojatem[1]);
			}
			if (strpos($Vfhiq1lhsojatem[1], 'in') !== false) {
				$Vfhiq1lhsojatem[1] = str_replace('in', '', $Vfhiq1lhsojatem[1]);
				$Vfhiq1lhsojatem[1] = PHPExcel_Shared_Font::inchSizeToPixels($Vfhiq1lhsojatem[1]);
			}
			if (strpos($Vfhiq1lhsojatem[1], 'cm') !== false) {
				$Vfhiq1lhsojatem[1] = str_replace('cm', '', $Vfhiq1lhsojatem[1]);
				$Vfhiq1lhsojatem[1] = PHPExcel_Shared_Font::centimeterSizeToPixels($Vfhiq1lhsojatem[1]);
			}

			$Vdtcpflt5bhp[$Vfhiq1lhsojatem[0]] = $Vfhiq1lhsojatem[1];
		}

		return $Vdtcpflt5bhp;
	}

	private static function boolean($Vp4xjtpabm0l = NULL)
	{
        if (is_object($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = (string) $Vp4xjtpabm0l;
        }
		if (is_numeric($Vp4xjtpabm0l)) {
			return (bool) $Vp4xjtpabm0l;
        }
		return ($Vp4xjtpabm0l === 'true' || $Vp4xjtpabm0l === 'TRUE');
	}
}
