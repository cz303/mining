<?php




class PHPExcel_Writer_Excel5_Escher
{
	
	private $V4ffwuamphzq;

	
	private $Vqrocrebbbaa;

	
	private $Vnni00tq2quo;

	
	private $Vb0gygvkgky4;
	
	
	public function __construct($Vhsad0if43ua)
	{
		$this->_object = $Vhsad0if43ua;
	}

	
	public function close()
	{
		
		$this->_data = '';

		switch (get_class($this->_object)) {

		case 'PHPExcel_Shared_Escher':
			if ($V0dyiia4e5jf = $this->_object->getDggContainer()) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($V0dyiia4e5jf);
				$this->_data = $V3pinfvte0v0->close();
			} else if ($Vkppgpmyie0n = $this->_object->getDgContainer()) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Vkppgpmyie0n);
				$this->_data = $V3pinfvte0v0->close();
				$this->_spOffsets = $V3pinfvte0v0->getSpOffsets();
				$this->_spTypes = $V3pinfvte0v0->getSpTypes();
			}
			break;

		case 'PHPExcel_Shared_Escher_DggContainer':
			

			
			$V4n0mdivxbwo = '';

			
			$Vt00cvrkrgph			= 0x0;
			$Vbwg43r2y02j	= 0x0000;
			$Varmbpmkehma		= 0xF006;

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			
			$Vnx3gpmc2u30 =
				pack('VVVV'
					, $this->_object->getSpIdMax() 
					, $this->_object->getCDgSaved() + 1 
					, $this->_object->getCSpSaved()
					, $this->_object->getCDgSaved() 
				);

			
			$Vihptajnnfem = $this->_object->getIDCLs();

			foreach ($Vihptajnnfem as $Vtk1j2gal4cu => $Vtealgsoptui) {
				$Vnx3gpmc2u30 .= pack('VV', $Vtk1j2gal4cu, $Vtealgsoptui + 1);
			}

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, strlen($Vnx3gpmc2u30));
			$V4n0mdivxbwo .= $Vl5rjgb1nsf3 . $Vnx3gpmc2u30;

			
			if ($Vmurr3sbprfd = $this->_object->getBstoreContainer()) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Vmurr3sbprfd);
				$V4n0mdivxbwo .= $V3pinfvte0v0->close();
			}

			
			$Vt00cvrkrgph			= 0xF;
			$Vbwg43r2y02j	= 0x0000;
			$Varmbpmkehma		= 0xF000;
			$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3 . $V4n0mdivxbwo;
			break;

		case 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer':
			

			
			$V4n0mdivxbwo = '';

			
			if ($V2bj4bv0dh1q = $this->_object->getBSECollection()) {
				foreach ($V2bj4bv0dh1q as $Vop4lfjv2fwh) {
					$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Vop4lfjv2fwh);
					$V4n0mdivxbwo .= $V3pinfvte0v0->close();
				}
			}

			
			$Vt00cvrkrgph			= 0xF;
			$Vbwg43r2y02j	= count($this->_object->getBSECollection());
			$Varmbpmkehma		= 0xF001;
			$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3 . $V4n0mdivxbwo;
			break;

		case 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE':
			

			
			$V4n0mdivxbwo = '';

			
			if ($Va0n5zfcewok = $this->_object->getBlip()) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Va0n5zfcewok);
				$V4n0mdivxbwo .= $V3pinfvte0v0->close();
			}

			
			$Vou4vxorrdoe = '';

			$Vzthhgfu4z53 = $this->_object->getBlipType();
			$Vwfjvepypa2o = $this->_object->getBlipType();
			$Vou4vxorrdoe .= pack('CC', $Vzthhgfu4z53, $Vwfjvepypa2o);

			$Vfrgfiahe3qd = pack('VVVV', 0,0,0,0); 
			$Vou4vxorrdoe .= $Vfrgfiahe3qd;

			$Vhiuc0dwei5b = 0;
			$V4jbadwq4bzj = strlen($V4n0mdivxbwo);
			$V0y0q1e11o3t = 1;
			$Vjsz4gkbna0d = 0; 
			$Viol2hiskq1q = 0x0;
			$Vycpaxpxxsth = 0x0;
			$Vinzzfgeqfxa = 0x0;
			$Vle3isl1ztkj = 0x0;
			$Vou4vxorrdoe .= pack('vVVVCCCC', $Vhiuc0dwei5b, $V4jbadwq4bzj, $V0y0q1e11o3t, $Vjsz4gkbna0d, $Viol2hiskq1q, $Vycpaxpxxsth, $Vinzzfgeqfxa, $Vle3isl1ztkj);

			$Vou4vxorrdoe .= $V4n0mdivxbwo;

			
			$Vt00cvrkrgph			= 0x2;
			$Vbwg43r2y02j	= $this->_object->getBlipType();
			$Varmbpmkehma		= 0xF007;
			$Volq3gdvkuqp			= strlen($Vou4vxorrdoe);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |=	$Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3;

			$this->_data .= $Vou4vxorrdoe;
			break;

		case 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip':
			

			
			switch ($this->_object->getParent()->getBlipType()) {

			case PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_JPEG:
				
				$V4n0mdivxbwo = '';

				$Vfrgfiahe3qd1 = pack('VVVV', 0,0,0,0); 
				$V4n0mdivxbwo .= $Vfrgfiahe3qd1;

				$Vhiuc0dwei5b = 0xFF; 
				$V4n0mdivxbwo .= pack('C', $Vhiuc0dwei5b);

				$V4n0mdivxbwo .= $this->_object->getData();

				$Vt00cvrkrgph			= 0x0;
				$Vbwg43r2y02j	= 0x46A;
				$Varmbpmkehma		= 0xF01D;
				$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |=	$Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

				$this->_data = $Vl5rjgb1nsf3;

				$this->_data .= $V4n0mdivxbwo;
				break;

			case PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG:
				
				$V4n0mdivxbwo = '';

				$Vfrgfiahe3qd1 = pack('VVVV', 0,0,0,0); 
				$V4n0mdivxbwo .= $Vfrgfiahe3qd1;

				$Vhiuc0dwei5b = 0xFF; 
				$V4n0mdivxbwo .= pack('C', $Vhiuc0dwei5b);

				$V4n0mdivxbwo .= $this->_object->getData();

				$Vt00cvrkrgph			= 0x0;
				$Vbwg43r2y02j	= 0x6E0;
				$Varmbpmkehma		= 0xF01E;
				$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |=	$Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

				$this->_data = $Vl5rjgb1nsf3;

				$this->_data .= $V4n0mdivxbwo;
				break;

			}
			break;

		case 'PHPExcel_Shared_Escher_DgContainer':
			

			
			$V4n0mdivxbwo = '';

			
			$Vt00cvrkrgph			= 0x0;
			$Vbwg43r2y02j	= $this->_object->getDgId();
			$Varmbpmkehma		= 0xF008;
			$Volq3gdvkuqp			= 8;

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			
			$Vkvlkgggdygk = count($this->_object->getSpgrContainer()->getChildren());
			$V4n0mdivxbwo .= $Vl5rjgb1nsf3 . pack('VV', $Vkvlkgggdygk, $this->_object->getLastSpId());
			

			
			if ($Vs2he0uzmdmq = $this->_object->getSpgrContainer()) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Vs2he0uzmdmq);
				$V4n0mdivxbwo .= $V3pinfvte0v0->close();

				
				$Vlnza0jufeky = $V3pinfvte0v0->getSpOffsets();
				$Vic1dj2j3fg1   = $V3pinfvte0v0->getSpTypes();
				
				
				foreach ($Vlnza0jufeky as & $Vb122dn1owi1) {
					$Vb122dn1owi1 += 24; 
				}

				$this->_spOffsets = $Vlnza0jufeky;
				$this->_spTypes = $Vic1dj2j3fg1;
			}

			
			$Vt00cvrkrgph			= 0xF;
			$Vbwg43r2y02j	= 0x0000;
			$Varmbpmkehma		= 0xF002;
			$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3 . $V4n0mdivxbwo;
			break;

		case 'PHPExcel_Shared_Escher_DgContainer_SpgrContainer':
			

			
			$V4n0mdivxbwo = '';

			
			$V5zxqb13be4l = 8;
			$Vlnza0jufeky = array();
			$Vic1dj2j3fg1   = array();

			
			foreach ($this->_object->getChildren() as $Vgizrbhnmsuq) {
				$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($Vgizrbhnmsuq);
				$V0vylkoxz0uu = $V3pinfvte0v0->close();
				$V4n0mdivxbwo .= $V0vylkoxz0uu;

				
				$V5zxqb13be4l += strlen($V0vylkoxz0uu);
				$Vlnza0jufeky[] = $V5zxqb13be4l;
				
				$Vic1dj2j3fg1 = array_merge($Vic1dj2j3fg1, $V3pinfvte0v0->getSpTypes());
			}

			
			$Vt00cvrkrgph			= 0xF;
			$Vbwg43r2y02j	= 0x0000;
			$Varmbpmkehma		= 0xF003;
			$Volq3gdvkuqp			= strlen($V4n0mdivxbwo);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3 . $V4n0mdivxbwo;
			$this->_spOffsets = $Vlnza0jufeky;
			$this->_spTypes = $Vic1dj2j3fg1;
			break;

		case 'PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer':
			
			$Vou4vxorrdoe = '';

			

			
			if ($this->_object->getSpgr()) {
				$Vt00cvrkrgph			= 0x1;
				$Vbwg43r2y02j	= 0x0000;
				$Varmbpmkehma		= 0xF009;
				$Volq3gdvkuqp			= 0x00000010;

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

				$Vou4vxorrdoe .= $Vl5rjgb1nsf3 . pack('VVVV', 0,0,0,0);
			}
			$this->_spTypes[] = ($this->_object->getSpType());

			
			$Vt00cvrkrgph			= 0x2;
			$Vbwg43r2y02j	= $this->_object->getSpType(); 
			$Varmbpmkehma		= 0xF00A;
			$Volq3gdvkuqp			= 0x00000008;

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$Vou4vxorrdoe .= $Vl5rjgb1nsf3 . pack('VV', $this->_object->getSpId(), $this->_object->getSpgr() ? 0x0005 : 0x0A00);


			
			if ($this->_object->getOPTCollection()) {
				$Vli5dtmno2ou = '';

				$Vt00cvrkrgph			= 0x3;
				$Vbwg43r2y02j	= count($this->_object->getOPTCollection());
				$Varmbpmkehma		= 0xF00B;
				foreach ($this->_object->getOPTCollection() as $Vp05lpnwyave => $Vp4xjtpabm0l) {
					$Vli5dtmno2ou .= pack('vV', $Vp05lpnwyave, $Vp4xjtpabm0l);
				}
				$Volq3gdvkuqp			= strlen($Vli5dtmno2ou);

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);
				$Vou4vxorrdoe .= $Vl5rjgb1nsf3 . $Vli5dtmno2ou;
			}

			
			if ($this->_object->getStartCoordinates()) {
				$Vamk3ilrt3wn = '';

				$Vt00cvrkrgph			= 0x0;
				$Vbwg43r2y02j	= 0x0;
				$Varmbpmkehma		= 0xF010;

				
				list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($this->_object->getStartCoordinates());
				$Vxc4jqbmntad = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0) - 1;
				$Veiy0hvfmcw1 = $Vexbtekafkvl - 1;

				
				$V3mz1f4hpcjp = $this->_object->getStartOffsetX();

				
				$Vzlq0iwdgyx5 = $this->_object->getStartOffsetY();

				
				list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($this->_object->getEndCoordinates());
				$V1qv1g2vnwq5 = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0) - 1;
				$V0cdy0pwto2f = $Vexbtekafkvl - 1;

				
				$Vtwxzxnreiyz = $this->_object->getEndOffsetX();

				
				$Vbodx1gz2f51 = $this->_object->getEndOffsetY();

				$Vamk3ilrt3wn = pack('vvvvvvvvv', $this->_object->getSpFlag(),
					$Vxc4jqbmntad, $V3mz1f4hpcjp, $Veiy0hvfmcw1, $Vzlq0iwdgyx5,
					$V1qv1g2vnwq5, $Vtwxzxnreiyz, $V0cdy0pwto2f, $Vbodx1gz2f51);
				
				$Volq3gdvkuqp			= strlen($Vamk3ilrt3wn);

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);
				$Vou4vxorrdoe .= $Vl5rjgb1nsf3 . $Vamk3ilrt3wn;
			}

			
			if (!$this->_object->getSpgr()) {
				$V5sgjek1btzf = '';

				$Vt00cvrkrgph			= 0x0;
				$Vbwg43r2y02j	= 0x0;
				$Varmbpmkehma		= 0xF011;

				$Volq3gdvkuqp = strlen($V5sgjek1btzf);

				$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
				$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

				$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);
				$Vou4vxorrdoe .= $Vl5rjgb1nsf3 . $V5sgjek1btzf;
			}

			
			$Vt00cvrkrgph			= 0xF;
			$Vbwg43r2y02j	= 0x0000;
			$Varmbpmkehma		= 0xF004;
			$Volq3gdvkuqp			= strlen($Vou4vxorrdoe);

			$Vt00cvrkrgphInstance  = $Vt00cvrkrgph;
			$Vt00cvrkrgphInstance |= $Vbwg43r2y02j << 4;

			$Vl5rjgb1nsf3 = pack('vvV', $Vt00cvrkrgphInstance, $Varmbpmkehma, $Volq3gdvkuqp);

			$this->_data = $Vl5rjgb1nsf3 . $Vou4vxorrdoe;
			break;

		}

		return $this->_data;
	}

	
	public function getSpOffsets()
	{
		return $this->_spOffsets;
	}

	
	public function getSpTypes()
	{
		return $this->_spTypes;
	}
	
	
}
