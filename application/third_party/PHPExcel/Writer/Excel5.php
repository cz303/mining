<?php




class PHPExcel_Writer_Excel5 extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter
{
	
	private $Vviknio3gpsr;

	
	private $Vwwftqoydznv		= 0;

	
	private $V0jh252gprso	= 0;

	
	private $Vlode1twtari		= array();

	
	private $V455onjk52rq;

	
	private $Vioggxdsw2hg;

	
	private $Vi4bfk0rcbue;

	
	private $V1ibljq0tggf;

	
	private $Vof2geembhfe;

	
	public function __construct(PHPExcel $Vlspthbp3hwz) {
		$this->_phpExcel	= $Vlspthbp3hwz;

		$this->_parser		= new PHPExcel_Writer_Excel5_Parser();
	}

	
	public function save($V1tltbb5c5oc = null) {

		
		$this->_phpExcel->garbageCollect();

		$Vyg0k2nrdluk = PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->getWriteDebugLog();
		PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->setWriteDebugLog(FALSE);
		$Veitduviztjc = PHPExcel_Calculation_Functions::getReturnDateType();
		PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);

		
		$this->_colors          = array();

		
		$this->_writerWorkbook = new PHPExcel_Writer_Excel5_Workbook($this->_phpExcel,
																	 $this->_str_total, $this->_str_unique, $this->_str_table,
																	 $this->_colors, $this->_parser);

		
		$V4dlwvwtcvui = $this->_phpExcel->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			$this->_writerWorksheets[$Vfhiq1lhsoja] = new PHPExcel_Writer_Excel5_Worksheet($this->_str_total, $this->_str_unique,
																			   $this->_str_table, $this->_colors,
																			   $this->_parser,
																			   $this->_preCalculateFormulas,
																			   $this->_phpExcel->getSheet($Vfhiq1lhsoja));
		}

		
		$this->_buildWorksheetEschers();
		$this->_buildWorkbookEscher();

		
		
		$V0e0phqdaumu = $this->_phpExcel->getCellXfCollection();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 15; ++$Vfhiq1lhsoja) {
			$this->_writerWorkbook->addXfWriter($V0e0phqdaumu[0], true);
		}

		
		foreach ($this->_phpExcel->getCellXfCollection() as $Vdtcpflt5bhp) {
			$this->_writerWorkbook->addXfWriter($Vdtcpflt5bhp, false);
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			foreach ($this->_writerWorksheets[$Vfhiq1lhsoja]->_phpSheet->getCellCollection() as $Vhibevwz1gkx) {
				$Vblc1ueqvbti = $this->_writerWorksheets[$Vfhiq1lhsoja]->_phpSheet->getCell($Vhibevwz1gkx);
				$Vmdurqm3efdh = $Vblc1ueqvbti->getValue();
				if ($Vmdurqm3efdh instanceof PHPExcel_RichText) {
					$Vqy5grnvvrgx = $Vmdurqm3efdh->getRichTextElements();
					foreach ($Vqy5grnvvrgx as $Vltoddaysjlm) {
						if ($Vltoddaysjlm instanceof PHPExcel_RichText_Run) {
							$Vj0kojsfk0h3 = $Vltoddaysjlm->getFont();
							$this->_writerWorksheets[$Vfhiq1lhsoja]->_fntHashIndex[$Vj0kojsfk0h3->getHashCode()] = $this->_writerWorkbook->_addFont($Vj0kojsfk0h3);
						}
					}
				}
			}
		}

		
		$Vnbx1p1jjwna = 'Workbook';
		$Vmwaeeagrc0s = new PHPExcel_Shared_OLE_PPS_File(PHPExcel_Shared_OLE::Asc2Ucs($Vnbx1p1jjwna));

		
		
		$Vefmn22z1hqb = array();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			$this->_writerWorksheets[$Vfhiq1lhsoja]->close();
			$Vefmn22z1hqb[] = $this->_writerWorksheets[$Vfhiq1lhsoja]->_datasize;
		}

		
		$Vmwaeeagrc0s->append($this->_writerWorkbook->writeWorkbook($Vefmn22z1hqb));

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			$Vmwaeeagrc0s->append($this->_writerWorksheets[$Vfhiq1lhsoja]->getData());
		}

		$this->_documentSummaryInformation = $this->_writeDocumentSummaryInformation();
		
		if(isset($this->_documentSummaryInformation) && !empty($this->_documentSummaryInformation)){
			$Vmwaeeagrc0s_DocumentSummaryInformation = new PHPExcel_Shared_OLE_PPS_File(PHPExcel_Shared_OLE::Asc2Ucs(chr(5) . 'DocumentSummaryInformation'));
			$Vmwaeeagrc0s_DocumentSummaryInformation->append($this->_documentSummaryInformation);
		}

		$this->_summaryInformation = $this->_writeSummaryInformation();
		
		if(isset($this->_summaryInformation) && !empty($this->_summaryInformation)){
		  $Vmwaeeagrc0s_SummaryInformation = new PHPExcel_Shared_OLE_PPS_File(PHPExcel_Shared_OLE::Asc2Ucs(chr(5) . 'SummaryInformation'));
		  $Vmwaeeagrc0s_SummaryInformation->append($this->_summaryInformation);
		}

		
		$Va2s3o2aqycz = array($Vmwaeeagrc0s);
		
		if(isset($Vmwaeeagrc0s_SummaryInformation)){
			$Va2s3o2aqycz[] = $Vmwaeeagrc0s_SummaryInformation;
		}
		
		if(isset($Vmwaeeagrc0s_DocumentSummaryInformation)){
			$Va2s3o2aqycz[] = $Vmwaeeagrc0s_DocumentSummaryInformation;
		}

		$V4jn4msro4hf = new PHPExcel_Shared_OLE_PPS_Root(time(), time(), $Va2s3o2aqycz);
		
		$Ve3oeikqcm5n = $V4jn4msro4hf->save($V1tltbb5c5oc);

		PHPExcel_Calculation_Functions::setReturnDateType($Veitduviztjc);
		PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->setWriteDebugLog($Vyg0k2nrdluk);
	}

	
	public function setTempDir($Vqujkwol1zut = '') {
		return $this;
	}

	
	private function _buildWorksheetEschers()
	{
		
		$Vhiohdiinhz2 = 0;
		$Vct02rhw2oih = 0;
		$Vghr1kfy2mqd = 0;

		foreach ($this->_phpExcel->getAllsheets() as $Vzg4jtrmmzdy) {
			
			$Vzg4jtrmmzdyIndex = $Vzg4jtrmmzdy->getParent()->getIndex($Vzg4jtrmmzdy);

			$Vr5pmk3j4rhk = null;

			
			$Vpqnd0czzkn3 = $Vzg4jtrmmzdy->getAutoFilter()->getRange();
			if (count($Vzg4jtrmmzdy->getDrawingCollection()) == 0 && empty($Vpqnd0czzkn3)) {
				continue;
			}

			
			$Vr5pmk3j4rhk = new PHPExcel_Shared_Escher();

			
			$Vkppgpmyie0n = new PHPExcel_Shared_Escher_DgContainer();

			
			$Vtk1j2gal4cu = $Vzg4jtrmmzdy->getParent()->getIndex($Vzg4jtrmmzdy) + 1;
			$Vkppgpmyie0n->setDgId($Vtk1j2gal4cu);
			$Vr5pmk3j4rhk->setDgContainer($Vkppgpmyie0n);

			
			$Vs2he0uzmdmq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer();
			$Vkppgpmyie0n->setSpgrContainer($Vs2he0uzmdmq);

			
			$Vgizrbhnmsuq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer();
			$Vgizrbhnmsuq->setSpgr(true);
			$Vgizrbhnmsuq->setSpType(0);
			$Vgizrbhnmsuq->setSpId(($Vzg4jtrmmzdy->getParent()->getIndex($Vzg4jtrmmzdy) + 1) << 10);
			$Vs2he0uzmdmq->addChild($Vgizrbhnmsuq);

			

			$Vkvlkgggdygk[$Vzg4jtrmmzdyIndex] = 0; 

			foreach ($Vzg4jtrmmzdy->getDrawingCollection() as $V2jgycs0t2az) {
				++$Vhiohdiinhz2;

				++$Vkvlkgggdygk[$Vzg4jtrmmzdyIndex];

				
				$Vgizrbhnmsuq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer();

				
				$Vgizrbhnmsuq->setSpType(0x004B);
				
				$Vgizrbhnmsuq->setSpFlag(0x02);

				
				$V1t4n0c2frlp = $Vkvlkgggdygk[$Vzg4jtrmmzdyIndex];
				$Vn2ybtfrxknk = $V1t4n0c2frlp
					| ($Vzg4jtrmmzdy->getParent()->getIndex($Vzg4jtrmmzdy) + 1) << 10;
				$Vgizrbhnmsuq->setSpId($Vn2ybtfrxknk);

				
				$Vct02rhw2oih = $V1t4n0c2frlp;

				
				$Vghr1kfy2mqd = $Vn2ybtfrxknk;

				
				$Vgizrbhnmsuq->setOPT(0x4104, $Vhiohdiinhz2);

				
				$V0p14cw241gq = $V2jgycs0t2az->getCoordinates();
				$Vsjv51hindtf = $V2jgycs0t2az->getOffsetX();
				$Vpalzrg3mgla = $V2jgycs0t2az->getOffsetY();
				$Vojs2qdgagwv = $V2jgycs0t2az->getWidth();
				$Vzo4g5xb4yip = $V2jgycs0t2az->getHeight();

				$Vp5yjclfj04r = PHPExcel_Shared_Excel5::oneAnchor2twoAnchor($Vzg4jtrmmzdy, $V0p14cw241gq, $Vsjv51hindtf, $Vpalzrg3mgla, $Vojs2qdgagwv, $Vzo4g5xb4yip);

				$Vgizrbhnmsuq->setStartCoordinates($Vp5yjclfj04r['startCoordinates']);
				$Vgizrbhnmsuq->setStartOffsetX($Vp5yjclfj04r['startOffsetX']);
				$Vgizrbhnmsuq->setStartOffsetY($Vp5yjclfj04r['startOffsetY']);
				$Vgizrbhnmsuq->setEndCoordinates($Vp5yjclfj04r['endCoordinates']);
				$Vgizrbhnmsuq->setEndOffsetX($Vp5yjclfj04r['endOffsetX']);
				$Vgizrbhnmsuq->setEndOffsetY($Vp5yjclfj04r['endOffsetY']);

				$Vs2he0uzmdmq->addChild($Vgizrbhnmsuq);
			}

			
			if(!empty($Vpqnd0czzkn3)){
				$Vfbryuiuigg0 = PHPExcel_Cell::rangeBoundaries($Vpqnd0czzkn3);
				$Vfhiq1lhsojaNumColStart = $Vfbryuiuigg0[0][0];
				$Vfhiq1lhsojaNumColEnd = $Vfbryuiuigg0[1][0];

				$Vfhiq1lhsojaInc = $Vfhiq1lhsojaNumColStart;
				while($Vfhiq1lhsojaInc <= $Vfhiq1lhsojaNumColEnd){
					++$Vkvlkgggdygk[$Vzg4jtrmmzdyIndex];

					
					$Vz1jphaxh0rv  = new PHPExcel_Worksheet_BaseDrawing();
					
					$Vjps5truwrqo   = PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsojaInc - 1) . $Vfbryuiuigg0[0][1];
					$Vz1jphaxh0rv->setCoordinates($Vjps5truwrqo);
					$Vz1jphaxh0rv->setWorksheet($Vzg4jtrmmzdy);

					
					$Vgizrbhnmsuq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer();
					
					$Vgizrbhnmsuq->setSpType(0x00C9);
					
					$Vgizrbhnmsuq->setSpFlag(0x01);

					
					$V1t4n0c2frlp = $Vkvlkgggdygk[$Vzg4jtrmmzdyIndex];
					$Vn2ybtfrxknk = $V1t4n0c2frlp
						| ($Vzg4jtrmmzdy->getParent()->getIndex($Vzg4jtrmmzdy) + 1) << 10;
					$Vgizrbhnmsuq->setSpId($Vn2ybtfrxknk);

					
					$Vct02rhw2oih = $V1t4n0c2frlp;

					
					$Vghr1kfy2mqd = $Vn2ybtfrxknk;

					$Vgizrbhnmsuq->setOPT(0x007F, 0x01040104); 
					$Vgizrbhnmsuq->setOPT(0x00BF, 0x00080008); 
					$Vgizrbhnmsuq->setOPT(0x01BF, 0x00010000); 
					$Vgizrbhnmsuq->setOPT(0x01FF, 0x00080000); 
					$Vgizrbhnmsuq->setOPT(0x03BF, 0x000A0000); 

					
					$Volnd0vd4r14 = PHPExcel_Cell::stringFromColumnIndex(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsojaInc - 1));
					$Volnd0vd4r14 .= $Vfbryuiuigg0[0][1] + 1;

					$Vgizrbhnmsuq->setStartCoordinates($Vjps5truwrqo);
					$Vgizrbhnmsuq->setStartOffsetX(0);
					$Vgizrbhnmsuq->setStartOffsetY(0);
					$Vgizrbhnmsuq->setEndCoordinates($Volnd0vd4r14);
					$Vgizrbhnmsuq->setEndOffsetX(0);
					$Vgizrbhnmsuq->setEndOffsetY(0);

					$Vs2he0uzmdmq->addChild($Vgizrbhnmsuq);
					$Vfhiq1lhsojaInc++;
				}
			}

			
			$this->_IDCLs[$Vtk1j2gal4cu] = $Vct02rhw2oih;

			
			$Vkppgpmyie0n->setLastSpId($Vghr1kfy2mqd);

			
			$this->_writerWorksheets[$Vzg4jtrmmzdyIndex]->setEscher($Vr5pmk3j4rhk);
		}
	}

	
	private function _buildWorkbookEscher()
	{
		$Vr5pmk3j4rhk = null;

		
		$Valwom5reivu = false;
		foreach ($this->_phpExcel->getAllSheets() as $Vzg4jtrmmzdy) {
			if (count($Vzg4jtrmmzdy->getDrawingCollection()) > 0) {
				$Valwom5reivu = true;
				break;
			}
		}

		
		if (!$Valwom5reivu) {
			return;
		}

		
		$Vr5pmk3j4rhk = new PHPExcel_Shared_Escher();

		
		$V0dyiia4e5jf = new PHPExcel_Shared_Escher_DggContainer();
		$Vr5pmk3j4rhk->setDggContainer($V0dyiia4e5jf);

		
		$V0dyiia4e5jf->setIDCLs($this->_IDCLs);

		
		$Vn2ybtfrxknkMax = 0;
		$Vb4ki3mvkimd = 0;
		$Vv4lmm14m150 = 0;

		foreach ($this->_phpExcel->getAllsheets() as $Vzg4jtrmmzdy) {
			$Vzg4jtrmmzdyCountShapes = 0; 

			if (count($Vzg4jtrmmzdy->getDrawingCollection()) > 0) {
				++$Vv4lmm14m150;

				foreach ($Vzg4jtrmmzdy->getDrawingCollection() as $V2jgycs0t2az) {
					++$Vzg4jtrmmzdyCountShapes;
					++$Vb4ki3mvkimd;

					$Vn2ybtfrxknk = $Vzg4jtrmmzdyCountShapes
						| ($this->_phpExcel->getIndex($Vzg4jtrmmzdy) + 1) << 10;
					$Vn2ybtfrxknkMax = max($Vn2ybtfrxknk, $Vn2ybtfrxknkMax);
				}
			}
		}

		$V0dyiia4e5jf->setSpIdMax($Vn2ybtfrxknkMax + 1);
		$V0dyiia4e5jf->setCDgSaved($Vv4lmm14m150);
		$V0dyiia4e5jf->setCSpSaved($Vb4ki3mvkimd + $Vv4lmm14m150); 

		
		$Vmurr3sbprfd = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer();
		$V0dyiia4e5jf->setBstoreContainer($Vmurr3sbprfd);

		
		foreach ($this->_phpExcel->getAllsheets() as $Vzg4jtrmmzdy) {
			foreach ($Vzg4jtrmmzdy->getDrawingCollection() as $V2jgycs0t2az) {
				if ($V2jgycs0t2az instanceof PHPExcel_Worksheet_Drawing) {

					$Vv0mtkrhebac = $V2jgycs0t2az->getPath();

					list($Vfhiq1lhsojamagesx, $Vfhiq1lhsojamagesy, $Vfhiq1lhsojamageFormat) = getimagesize($Vv0mtkrhebac);

					switch ($Vfhiq1lhsojamageFormat) {

					case 1: 
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG;
						ob_start();
						imagepng(imagecreatefromgif($Vv0mtkrhebac));
						$Vea1aqx0e2wy = ob_get_contents();
						ob_end_clean();
						break;

					case 2: 
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_JPEG;
						$Vea1aqx0e2wy = file_get_contents($Vv0mtkrhebac);
						break;

					case 3: 
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG;
						$Vea1aqx0e2wy = file_get_contents($Vv0mtkrhebac);
						break;

					case 6: 
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG;
						ob_start();
						imagepng(PHPExcel_Shared_Drawing::imagecreatefrombmp($Vv0mtkrhebac));
						$Vea1aqx0e2wy = ob_get_contents();
						ob_end_clean();
						break;

					default: continue 2;

					}

					$Va0n5zfcewok = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip();
					$Va0n5zfcewok->setData($Vea1aqx0e2wy);

					$Vop4lfjv2fwh = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE();
					$Vop4lfjv2fwh->setBlipType($Vasfeb2o4zdr);
					$Vop4lfjv2fwh->setBlip($Va0n5zfcewok);

					$Vmurr3sbprfd->addBSE($Vop4lfjv2fwh);

				} else if ($V2jgycs0t2az instanceof PHPExcel_Worksheet_MemoryDrawing) {

					switch ($V2jgycs0t2az->getRenderingFunction()) {

					case PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG:
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_JPEG;
						$Vdyc3fwkiira = 'imagejpeg';
						break;

					case PHPExcel_Worksheet_MemoryDrawing::RENDERING_GIF:
					case PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG:
					case PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT:
						$Vasfeb2o4zdr = PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG;
						$Vdyc3fwkiira = 'imagepng';
						break;

					}

					ob_start();
					call_user_func($Vdyc3fwkiira, $V2jgycs0t2az->getImageResource());
					$Vea1aqx0e2wy = ob_get_contents();
					ob_end_clean();

					$Va0n5zfcewok = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip();
					$Va0n5zfcewok->setData($Vea1aqx0e2wy);

					$Vop4lfjv2fwh = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE();
					$Vop4lfjv2fwh->setBlipType($Vasfeb2o4zdr);
					$Vop4lfjv2fwh->setBlip($Va0n5zfcewok);

					$Vmurr3sbprfd->addBSE($Vop4lfjv2fwh);
				}
			}
		}

		
		$this->_writerWorkbook->setEscher($Vr5pmk3j4rhk);
	}

	
	private function _writeDocumentSummaryInformation(){

		
		$Vou4vxorrdoe = pack('v', 0xFFFE);
		
		$Vou4vxorrdoe .= pack('v', 0x0000);
		
		$Vou4vxorrdoe .= pack('v', 0x0106);
		
		$Vou4vxorrdoe .= pack('v', 0x0002);
		
		$Vou4vxorrdoe .= pack('VVVV', 0x00, 0x00, 0x00, 0x00);
		
		$Vou4vxorrdoe .= pack('V', 0x0001);

		
		$Vou4vxorrdoe .= pack('vvvvvvvv', 0xD502, 0xD5CD, 0x2E9C, 0x101B, 0x9793, 0x0008, 0x2C2B, 0xAEF9);
		
		$Vou4vxorrdoe .= pack('V', 0x30);

		
		$Vou4vxorrdoeSection = array();
		$Vou4vxorrdoeSection_NumProps = 0;
		$Vou4vxorrdoeSection_Summary = '';
		$Vou4vxorrdoeSection_Content = '';

		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x01),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x02), 
							   'data'	=> array('data' => 1252));
		$Vou4vxorrdoeSection_NumProps++;

		
		if($this->_phpExcel->getProperties()->getCategory()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getCategory();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x02),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E),
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x17),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x03),
							   'data'	=> array('pack' => 'V', 'data' => 0x000C0000));
		$Vou4vxorrdoeSection_NumProps++;
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x0B),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x0B),
							   'data'	=> array('data' => false));
		$Vou4vxorrdoeSection_NumProps++;
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x10),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x0B),
							   'data'	=> array('data' => false));
		$Vou4vxorrdoeSection_NumProps++;
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x13),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x0B),
							   'data'	=> array('data' => false));
		$Vou4vxorrdoeSection_NumProps++;
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x16),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x0B),
							   'data'	=> array('data' => false));
		$Vou4vxorrdoeSection_NumProps++;

		
		
		
		
		$Vou4vxorrdoeProp = pack('v', 0x0001);
		$Vou4vxorrdoeProp .= pack('v', 0x0000);
		
		  
		  $Vou4vxorrdoeProp .= pack('v', 0x000A);
		  $Vou4vxorrdoeProp .= pack('v', 0x0000);
		  
		  $Vou4vxorrdoeProp .= 'Worksheet'.chr(0);

		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x0D),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x101E),
							   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
		$Vou4vxorrdoeSection_NumProps++;

		
		
		  
		  $Vou4vxorrdoeProp = pack('v', 0x0002);
		  $Vou4vxorrdoeProp .= pack('v', 0x0000);
		  
		    
		      
		      $Vou4vxorrdoeProp .= pack('v', 0x001E);
		      
		      $Vou4vxorrdoeProp .= pack('v', 0x0000);
		      
		        
		        $Vou4vxorrdoeProp .= pack('v', 0x0013);
		        $Vou4vxorrdoeProp .= pack('v', 0x0000);
		        
		        $Vou4vxorrdoeProp .= 'Feuilles de calcul';
		    
		      
		      $Vou4vxorrdoeProp .= pack('v', 0x0300);
		      
		      $Vou4vxorrdoeProp .= pack('v', 0x0000);
		      
		      $Vou4vxorrdoeProp .= pack('v', 0x0100);
		      $Vou4vxorrdoeProp .= pack('v', 0x0000);
			  $Vou4vxorrdoeProp .= pack('v', 0x0000);
		      $Vou4vxorrdoeProp .= pack('v', 0x0000);

        $Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x0C),
        					   'offset' => array('pack' => 'V'),
        					   'type' 	=> array('pack' => 'V', 'data' => 0x100C),
        					   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
        $Vou4vxorrdoeSection_NumProps++;

		
		
		
		$Vou4vxorrdoeSection_Content_Offset = 8 + $Vou4vxorrdoeSection_NumProps * 8;
		foreach ($Vou4vxorrdoeSection as $Vou4vxorrdoeProp){
			
			$Vou4vxorrdoeSection_Summary .= pack($Vou4vxorrdoeProp['summary']['pack'], $Vou4vxorrdoeProp['summary']['data']);
			
			$Vou4vxorrdoeSection_Summary .= pack($Vou4vxorrdoeProp['offset']['pack'], $Vou4vxorrdoeSection_Content_Offset);
			
			$Vou4vxorrdoeSection_Content .= pack($Vou4vxorrdoeProp['type']['pack'], $Vou4vxorrdoeProp['type']['data']);
			
			if($Vou4vxorrdoeProp['type']['data'] == 0x02){ 
				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['data']);

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4;
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x03){ 
				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['data']);

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4;
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x0B){ 
				if($Vou4vxorrdoeProp['data']['data'] == false){
					$Vou4vxorrdoeSection_Content .= pack('V', 0x0000);
				} else {
					$Vou4vxorrdoeSection_Content .= pack('V', 0x0001);
				}
				$Vou4vxorrdoeSection_Content_Offset += 4 + 4;
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x1E){ 
				
				$Vou4vxorrdoeProp['data']['data'] .= chr(0);
				$Vou4vxorrdoeProp['data']['length'] += 1;
				
				$Vou4vxorrdoeProp['data']['length'] = $Vou4vxorrdoeProp['data']['length'] + ((4 - $Vou4vxorrdoeProp['data']['length'] % 4)==4 ? 0 : (4 - $Vou4vxorrdoeProp['data']['length'] % 4));
				$Vou4vxorrdoeProp['data']['data'] = str_pad($Vou4vxorrdoeProp['data']['data'], $Vou4vxorrdoeProp['data']['length'], chr(0), STR_PAD_RIGHT);

				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['length']);
				$Vou4vxorrdoeSection_Content .= $Vou4vxorrdoeProp['data']['data'];

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4 + strlen($Vou4vxorrdoeProp['data']['data']);
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x40){ 
				$Vou4vxorrdoeSection_Content .= $Vou4vxorrdoeProp['data']['data'];

				$Vou4vxorrdoeSection_Content_Offset += 4 + 8;
			}
			else {
				
				$Vou4vxorrdoeSection_Content .= $Vou4vxorrdoeProp['data']['data'];

				$Vou4vxorrdoeSection_Content_Offset += 4 + $Vou4vxorrdoeProp['data']['length'];
			}
		}
		

		
		
		
		$Vou4vxorrdoe .= pack('V', $Vou4vxorrdoeSection_Content_Offset);
		
		$Vou4vxorrdoe .= pack('V', $Vou4vxorrdoeSection_NumProps);
		
		$Vou4vxorrdoe .= $Vou4vxorrdoeSection_Summary;
		
		$Vou4vxorrdoe .= $Vou4vxorrdoeSection_Content;

		return $Vou4vxorrdoe;
	}

	
	private function _writeSummaryInformation(){
		
		$Vou4vxorrdoe = pack('v', 0xFFFE);
		
		$Vou4vxorrdoe .= pack('v', 0x0000);
		
		$Vou4vxorrdoe .= pack('v', 0x0106);
		
		$Vou4vxorrdoe .= pack('v', 0x0002);
		
		$Vou4vxorrdoe .= pack('VVVV', 0x00, 0x00, 0x00, 0x00);
		
		$Vou4vxorrdoe .= pack('V', 0x0001);

		
		$Vou4vxorrdoe .= pack('vvvvvvvv', 0x85E0, 0xF29F, 0x4FF9, 0x1068, 0x91AB, 0x0008, 0x272B, 0xD9B3);
		
		$Vou4vxorrdoe .= pack('V', 0x30);

		
		$Vou4vxorrdoeSection = array();
		$Vou4vxorrdoeSection_NumProps = 0;
		$Vou4vxorrdoeSection_Summary = '';
		$Vou4vxorrdoeSection_Content = '';

		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x01),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x02), 
							   'data'	=> array('data' => 1252));
		$Vou4vxorrdoeSection_NumProps++;

		
		if($this->_phpExcel->getProperties()->getTitle()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getTitle();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x02),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getSubject()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getSubject();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x03),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getCreator()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getCreator();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x04),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getKeywords()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getKeywords();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x05),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getDescription()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getDescription();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x06),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getLastModifiedBy()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getLastModifiedBy();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x08),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x1E), 
								   'data'	=> array('data' => $Vou4vxorrdoeProp, 'length' => strlen($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getCreated()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getCreated();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x0C),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x40), 
								   'data'	=> array('data' => PHPExcel_Shared_OLE::LocalDate2OLE($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		if($this->_phpExcel->getProperties()->getModified()){
			$Vou4vxorrdoeProp = $this->_phpExcel->getProperties()->getModified();
			$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x0D),
								   'offset' => array('pack' => 'V'),
								   'type' 	=> array('pack' => 'V', 'data' => 0x40), 
								   'data'	=> array('data' => PHPExcel_Shared_OLE::LocalDate2OLE($Vou4vxorrdoeProp)));
			$Vou4vxorrdoeSection_NumProps++;
		}
		
		$Vou4vxorrdoeSection[] = array('summary'=> array('pack' => 'V', 'data' => 0x13),
							   'offset' => array('pack' => 'V'),
							   'type' 	=> array('pack' => 'V', 'data' => 0x03), 
							   'data'	=> array('data' => 0x00));
		$Vou4vxorrdoeSection_NumProps++;


		
		
		
		$Vou4vxorrdoeSection_Content_Offset = 8 + $Vou4vxorrdoeSection_NumProps * 8;
		foreach ($Vou4vxorrdoeSection as $Vou4vxorrdoeProp){
			
			$Vou4vxorrdoeSection_Summary .= pack($Vou4vxorrdoeProp['summary']['pack'], $Vou4vxorrdoeProp['summary']['data']);
			
			$Vou4vxorrdoeSection_Summary .= pack($Vou4vxorrdoeProp['offset']['pack'], $Vou4vxorrdoeSection_Content_Offset);
			
			$Vou4vxorrdoeSection_Content .= pack($Vou4vxorrdoeProp['type']['pack'], $Vou4vxorrdoeProp['type']['data']);
			
			if($Vou4vxorrdoeProp['type']['data'] == 0x02){ 
				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['data']);

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4;
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x03){ 
				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['data']);

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4;
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x1E){ 
				
				$Vou4vxorrdoeProp['data']['data'] .= chr(0);
				$Vou4vxorrdoeProp['data']['length'] += 1;
				
				$Vou4vxorrdoeProp['data']['length'] = $Vou4vxorrdoeProp['data']['length'] + ((4 - $Vou4vxorrdoeProp['data']['length'] % 4)==4 ? 0 : (4 - $Vou4vxorrdoeProp['data']['length'] % 4));
				$Vou4vxorrdoeProp['data']['data'] = str_pad($Vou4vxorrdoeProp['data']['data'], $Vou4vxorrdoeProp['data']['length'], chr(0), STR_PAD_RIGHT);

				$Vou4vxorrdoeSection_Content .= pack('V', $Vou4vxorrdoeProp['data']['length']);
				$Vou4vxorrdoeSection_Content .= $Vou4vxorrdoeProp['data']['data'];

				$Vou4vxorrdoeSection_Content_Offset += 4 + 4 + strlen($Vou4vxorrdoeProp['data']['data']);
			}
			elseif($Vou4vxorrdoeProp['type']['data'] == 0x40){ 
				$Vou4vxorrdoeSection_Content .= $Vou4vxorrdoeProp['data']['data'];

				$Vou4vxorrdoeSection_Content_Offset += 4 + 8;
			}
			else {
				
			}
		}
		

		
		
		
		$Vou4vxorrdoe .= pack('V', $Vou4vxorrdoeSection_Content_Offset);
		
		$Vou4vxorrdoe .= pack('V', $Vou4vxorrdoeSection_NumProps);
		
		$Vou4vxorrdoe .= $Vou4vxorrdoeSection_Summary;
		
		$Vou4vxorrdoe .= $Vou4vxorrdoeSection_Content;

		return $Vou4vxorrdoe;
	}
}
