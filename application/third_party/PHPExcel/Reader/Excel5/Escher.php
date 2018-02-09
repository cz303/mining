<?php



class PHPExcel_Reader_Excel5_Escher
{
	const DGGCONTAINER		= 0xF000;
	const BSTORECONTAINER	= 0xF001;
	const DGCONTAINER		= 0xF002;
	const SPGRCONTAINER		= 0xF003;
	const SPCONTAINER		= 0xF004;
	const DGG				= 0xF006;
	const BSE				= 0xF007;
	const DG				= 0xF008;
	const SPGR				= 0xF009;
	const SP				= 0xF00A;
	const OPT				= 0xF00B;
	const CLIENTTEXTBOX		= 0xF00D;
	const CLIENTANCHOR		= 0xF010;
	const CLIENTDATA		= 0xF011;
	const BLIPJPEG			= 0xF01D;
	const BLIPPNG			= 0xF01E;
	const SPLITMENUCOLORS	= 0xF11E;
	const TERTIARYOPT		= 0xF122;

	
	private $Vqrocrebbbaa;

	
	private $VqrocrebbbaaSize;

	
	private $Vr45lzy1kupy;

	
	private $V4ffwuamphzq;

	
	public function __construct($Vhsad0if43ua)
	{
		$this->_object = $Vhsad0if43ua;
	}

	
	public function load($Vou4vxorrdoe)
	{
		$this->_data = $Vou4vxorrdoe;

		
		$this->_dataSize = strlen($this->_data);

		$this->_pos = 0;

		
		while ($this->_pos < $this->_dataSize) {

			
			$Vpowlmkt4wsb = PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos + 2);

			switch ($Vpowlmkt4wsb) {
				case self::DGGCONTAINER:	$this->_readDggContainer();		break;
				case self::DGG:				$this->_readDgg();				break;
				case self::BSTORECONTAINER:	$this->_readBstoreContainer();	break;
				case self::BSE:				$this->_readBSE();				break;
				case self::BLIPJPEG:		$this->_readBlipJPEG();			break;
				case self::BLIPPNG:			$this->_readBlipPNG();			break;
				case self::OPT:				$this->_readOPT();				break;
				case self::TERTIARYOPT:		$this->_readTertiaryOPT();		break;
				case self::SPLITMENUCOLORS:	$this->_readSplitMenuColors();	break;
				case self::DGCONTAINER:		$this->_readDgContainer();		break;
				case self::DG:				$this->_readDg();				break;
				case self::SPGRCONTAINER:	$this->_readSpgrContainer();	break;
				case self::SPCONTAINER:		$this->_readSpContainer();		break;
				case self::SPGR:			$this->_readSpgr();				break;
				case self::SP:				$this->_readSp();				break;
				case self::CLIENTTEXTBOX:	$this->_readClientTextbox();	break;
				case self::CLIENTANCHOR:	$this->_readClientAnchor();		break;
				case self::CLIENTDATA:		$this->_readClientData();		break;
				default:					$this->_readDefault();			break;
			}
		}

		return $this->_object;
	}

	
	private function _readDefault()
	{
		
		$Vlwvsczliho0 = PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos);

		
		$Vpowlmkt4wsb = PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos + 2);

		
		$Vt00cvrkrgph = (0x000F & $Vlwvsczliho0) >> 0;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readDggContainer()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$V0dyiia4e5jf = new PHPExcel_Shared_Escher_DggContainer();
		$this->_object->setDggContainer($V0dyiia4e5jf);
		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($V0dyiia4e5jf);
		$Vlig2h1nz33u->load($Vqcst2xnrxwx);
	}

	
	private function _readDgg()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readBstoreContainer()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vmurr3sbprfd = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer();
		$this->_object->setBstoreContainer($Vmurr3sbprfd);
		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vmurr3sbprfd);
		$Vlig2h1nz33u->load($Vqcst2xnrxwx);
	}

	
	private function _readBSE()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vop4lfjv2fwh = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE();
		$this->_object->addBSE($Vop4lfjv2fwh);

		$Vop4lfjv2fwh->setBLIPType($Vbwg43r2y02j);

		
		$Vzthhgfu4z53 = ord($Vqcst2xnrxwx[0]);

		
		$Vwfjvepypa2o = ord($Vqcst2xnrxwx[1]);

		
		$Vfrgfiahe3qd = substr($Vqcst2xnrxwx, 2, 16);

		
		$Vhiuc0dwei5b = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 18);

		
		$V4jbadwq4bzj = PHPExcel_Reader_Excel5::_GetInt4d($Vqcst2xnrxwx, 20);

		
		$V0y0q1e11o3t = PHPExcel_Reader_Excel5::_GetInt4d($Vqcst2xnrxwx, 24);

		
		$Vjsz4gkbna0d = PHPExcel_Reader_Excel5::_GetInt4d($Vqcst2xnrxwx, 28);

		
		$Viol2hiskq1q = ord($Vqcst2xnrxwx{32});

		
		$Vycpaxpxxsth = ord($Vqcst2xnrxwx{33});

		
		$Vinzzfgeqfxa = ord($Vqcst2xnrxwx{34});

		
		$Vle3isl1ztkj = ord($Vqcst2xnrxwx{35});

		
		$Vblb4oadt0qz = substr($Vqcst2xnrxwx, 36, $Vycpaxpxxsth);

		
		$Vea1aqx0e2wy = substr($Vqcst2xnrxwx, 36 + $Vycpaxpxxsth);

		
		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vop4lfjv2fwh);
		$Vlig2h1nz33u->load($Vea1aqx0e2wy);
	}

	
	private function _readBlipJPEG()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		$Vv3hdohvn1hh = 0;

		
		$Vfrgfiahe3qd1 = substr($Vqcst2xnrxwx, 0, 16);
		$Vv3hdohvn1hh += 16;

		
		if (in_array($Vbwg43r2y02j, array(0x046B, 0x06E3))) {
			$Vfrgfiahe3qd2 = substr($Vqcst2xnrxwx, 16, 16);
			$Vv3hdohvn1hh += 16;
		}

		
		$Vhiuc0dwei5b = ord($Vqcst2xnrxwx{$Vv3hdohvn1hh});
		$Vv3hdohvn1hh += 1;

		
		$Vou4vxorrdoe = substr($Vqcst2xnrxwx, $Vv3hdohvn1hh);

		$Va0n5zfcewok = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip();
		$Va0n5zfcewok->setData($Vou4vxorrdoe);

		$this->_object->setBlip($Va0n5zfcewok);
	}

	
	private function _readBlipPNG()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		$Vv3hdohvn1hh = 0;

		
		$Vfrgfiahe3qd1 = substr($Vqcst2xnrxwx, 0, 16);
		$Vv3hdohvn1hh += 16;

		
		if ($Vbwg43r2y02j == 0x06E1) {
			$Vfrgfiahe3qd2 = substr($Vqcst2xnrxwx, 16, 16);
			$Vv3hdohvn1hh += 16;
		}

		
		$Vhiuc0dwei5b = ord($Vqcst2xnrxwx{$Vv3hdohvn1hh});
		$Vv3hdohvn1hh += 1;

		
		$Vou4vxorrdoe = substr($Vqcst2xnrxwx, $Vv3hdohvn1hh);

		$Va0n5zfcewok = new PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip();
		$Va0n5zfcewok->setData($Vou4vxorrdoe);

		$this->_object->setBlip($Va0n5zfcewok);
	}

	
	private function _readOPT()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		$this->_readOfficeArtRGFOPTE($Vqcst2xnrxwx, $Vbwg43r2y02j);
	}

	
	private function _readTertiaryOPT()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readSplitMenuColors()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readDgContainer()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vkppgpmyie0n = new PHPExcel_Shared_Escher_DgContainer();
		$this->_object->setDgContainer($Vkppgpmyie0n);
		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vkppgpmyie0n);
		$Vr5pmk3j4rhk = $Vlig2h1nz33u->load($Vqcst2xnrxwx);
	}

	
	private function _readDg()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readSpgrContainer()
	{
		

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vs2he0uzmdmq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer();

		if ($this->_object instanceof PHPExcel_Shared_Escher_DgContainer) {
			
			$this->_object->setSpgrContainer($Vs2he0uzmdmq);
		} else {
			
			$this->_object->addChild($Vs2he0uzmdmq);
		}

		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vs2he0uzmdmq);
		$Vr5pmk3j4rhk = $Vlig2h1nz33u->load($Vqcst2xnrxwx);
	}

	
	private function _readSpContainer()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$Vgizrbhnmsuq = new PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer();
		$this->_object->addChild($Vgizrbhnmsuq);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vgizrbhnmsuq);
		$Vr5pmk3j4rhk = $Vlig2h1nz33u->load($Vqcst2xnrxwx);
	}

	
	private function _readSpgr()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readSp()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readClientTextbox()
	{
		

		
		$Vbwg43r2y02j = (0xFFF0 & PHPExcel_Reader_Excel5::_GetInt2d($this->_data, $this->_pos)) >> 4;

		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readClientAnchor()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;

		
		$Vxc4jqbmntad = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 2);

		
		$V3mz1f4hpcjp = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 4);

		
		$Veiy0hvfmcw1 = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 6);

		
		$Vzlq0iwdgyx5 = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 8);

		
		$V1qv1g2vnwq5 = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 10);

		
		$Vtwxzxnreiyz = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 12);

		
		$V0cdy0pwto2f = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 14);

		
		$Vbodx1gz2f51 = PHPExcel_Reader_Excel5::_GetInt2d($Vqcst2xnrxwx, 16);

		
		$this->_object->setStartCoordinates(PHPExcel_Cell::stringFromColumnIndex($Vxc4jqbmntad) . ($Veiy0hvfmcw1 + 1));

		
		$this->_object->setStartOffsetX($V3mz1f4hpcjp);

		
		$this->_object->setStartOffsetY($Vzlq0iwdgyx5);

		
		$this->_object->setEndCoordinates(PHPExcel_Cell::stringFromColumnIndex($V1qv1g2vnwq5) . ($V0cdy0pwto2f + 1));

		
		$this->_object->setEndOffsetX($Vtwxzxnreiyz);

		
		$this->_object->setEndOffsetY($Vbodx1gz2f51);
	}

	
	private function _readClientData()
	{
		$Volq3gdvkuqp = PHPExcel_Reader_Excel5::_GetInt4d($this->_data, $this->_pos + 4);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 8, $Volq3gdvkuqp);

		
		$this->_pos += 8 + $Volq3gdvkuqp;
	}

	
	private function _readOfficeArtRGFOPTE($Vou4vxorrdoe, $Vmwwo1qnmepz) {

		$Vsyer1npijcu = substr($Vou4vxorrdoe, 6 * $Vmwwo1qnmepz);

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepz; ++$Vfhiq1lhsoja) {
			
			$Vwacw0quscnk = substr($Vou4vxorrdoe, 6 * $Vfhiq1lhsoja, 6);

			
			$Vxmtm22b1npd = PHPExcel_Reader_Excel5::_GetInt2d($Vwacw0quscnk, 0);

			
			$Vxmtm22b1npdOpid = (0x3FFF & $Vxmtm22b1npd) >> 0;

			
			$Vxmtm22b1npdFBid = (0x4000 & $Vxmtm22b1npd) >> 14;

			
			$Vxmtm22b1npdFComplex = (0x8000 & $Vxmtm22b1npd) >> 15;

			
			$Vjuftxi2lyub = PHPExcel_Reader_Excel5::_GetInt4d($Vwacw0quscnk, 2);

			if ($Vxmtm22b1npdFComplex) {
				$Vi0wdjtrvqzu = substr($Vsyer1npijcu, 0, $Vjuftxi2lyub);
				$Vsyer1npijcu = substr($Vsyer1npijcu, $Vjuftxi2lyub);

				
				$Vp4xjtpabm0l = $Vi0wdjtrvqzu;
			} else {
				
				$Vp4xjtpabm0l = $Vjuftxi2lyub;
			}

			$this->_object->setOPT($Vxmtm22b1npdOpid, $Vp4xjtpabm0l);
		}
	}

}
