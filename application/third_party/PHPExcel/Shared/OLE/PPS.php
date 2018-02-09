<?php






















class PHPExcel_Shared_OLE_PPS
{
	
	public $Vrcbxzsok3wn;

	
	public $Vbnw25t41340;

	
	public $V1gmywd12igy;

	
	public $Vwl2c0hhohau;

	
	public $Vmu0crbvvdhj;

	
	public $V45lzf0rwmzp;

	
	public $V50a3ilikjfo;

	
	public $Veeh2masqxew;

	
	public $Vsy2ypia5rpi;

	
	public $Vmv1kxboyy3x;

	
	public $Vqrocrebbbaa;

	
	public $Vhedylkejosg = array();

	
	public $Ve25fnp1s5uc;

	
	public function __construct($Vrcbxzsok3wn, $Vcvluzjs3wzb, $V4pigtpor0ln, $Vukiv2jodcur, $Vjg5z2pedl1b, $Vgxxrah4zcfh, $Vkuf34sqcj3s, $Vb20fwhdco1u, $Vou4vxorrdoe, $Vhedylkejosg)
	{
		$this->No      = $Vrcbxzsok3wn;
		$this->Name    = $Vcvluzjs3wzb;
		$this->Type    = $V4pigtpor0ln;
		$this->PrevPps = $Vukiv2jodcur;
		$this->NextPps = $Vjg5z2pedl1b;
		$this->DirPps  = $Vgxxrah4zcfh;
		$this->Time1st = $Vkuf34sqcj3s;
		$this->Time2nd = $Vb20fwhdco1u;
		$this->_data      = $Vou4vxorrdoe;
		$this->children   = $Vhedylkejosg;
		if ($Vou4vxorrdoe != '') {
			$this->Size = strlen($Vou4vxorrdoe);
		} else {
			$this->Size = 0;
		}
	}

	
	public function _DataLen()
	{
		if (!isset($this->_data)) {
			return 0;
		}
		
		
		
		
		
			return strlen($this->_data);
		
	}

	
	public function _getPpsWk()
	{
		$Vc0brddnw0vm = str_pad($this->Name,64,"\x00");

		$Vc0brddnw0vm .= pack("v", strlen($this->Name) + 2)  
			  . pack("c", $this->Type)              
			  . pack("c", 0x00) 
			  . pack("V", $this->PrevPps) 
			  . pack("V", $this->NextPps) 
			  . pack("V", $this->DirPps)  
			  . "\x00\x09\x02\x00"                  
			  . "\x00\x00\x00\x00"                  
			  . "\xc0\x00\x00\x00"                  
			  . "\x00\x00\x00\x46"                  
			  . "\x00\x00\x00\x00"                  
			  . PHPExcel_Shared_OLE::LocalDate2OLE($this->Time1st)       
			  . PHPExcel_Shared_OLE::LocalDate2OLE($this->Time2nd)       
			  . pack("V", isset($this->_StartBlock)?
						$this->_StartBlock:0)        
			  . pack("V", $this->Size)               
			  . pack("V", 0);                        
		return $Vc0brddnw0vm;
	}

	
	public static function _savePpsSetPnt(&$Vsj4hejsoyli, $Vkrvh1lmnndk, $Vuzc4h2gzvvg = 0)
	{
		if ( !is_array($Vkrvh1lmnndk) || (empty($Vkrvh1lmnndk)) ) {
			return 0xFFFFFFFF;
		} elseif( count($Vkrvh1lmnndk) == 1 ) {
			$Vhbebnaefdgw = count($Vsj4hejsoyli);
			
			$Vsj4hejsoyli[$Vhbebnaefdgw] = ( $Vuzc4h2gzvvg == 0 ) ? $Vkrvh1lmnndk[0] : clone $Vkrvh1lmnndk[0];
			$Vsj4hejsoyli[$Vhbebnaefdgw]->No = $Vhbebnaefdgw;
			$Vsj4hejsoyli[$Vhbebnaefdgw]->PrevPps = 0xFFFFFFFF;
			$Vsj4hejsoyli[$Vhbebnaefdgw]->NextPps = 0xFFFFFFFF;
			$Vsj4hejsoyli[$Vhbebnaefdgw]->DirPps  = self::_savePpsSetPnt($Vsj4hejsoyli, @$Vsj4hejsoyli[$Vhbebnaefdgw]->children, $Vuzc4h2gzvvg++);
		} else {
			$Vrnqqyn1u0f1  = floor(count($Vkrvh1lmnndk) / 2);
			$Vlje1goesmxz = array_slice($Vkrvh1lmnndk, 0, $Vrnqqyn1u0f1);
			$Vwbm0qv2iuf3 = array_slice($Vkrvh1lmnndk, $Vrnqqyn1u0f1 + 1);
			$Vhbebnaefdgw   = count($Vsj4hejsoyli);
			
			$Vsj4hejsoyli[$Vhbebnaefdgw] = ( $Vuzc4h2gzvvg == 0 ) ? $Vkrvh1lmnndk[$Vrnqqyn1u0f1] : clone $Vkrvh1lmnndk[$Vrnqqyn1u0f1];
			$Vsj4hejsoyli[$Vhbebnaefdgw]->No = $Vhbebnaefdgw;
			$Vsj4hejsoyli[$Vhbebnaefdgw]->PrevPps = self::_savePpsSetPnt($Vsj4hejsoyli, $Vlje1goesmxz, $Vuzc4h2gzvvg++);
			$Vsj4hejsoyli[$Vhbebnaefdgw]->NextPps = self::_savePpsSetPnt($Vsj4hejsoyli, $Vwbm0qv2iuf3, $Vuzc4h2gzvvg++);
			$Vsj4hejsoyli[$Vhbebnaefdgw]->DirPps  = self::_savePpsSetPnt($Vsj4hejsoyli, @$Vsj4hejsoyli[$Vhbebnaefdgw]->children, $Vuzc4h2gzvvg++);

		}
		return $Vhbebnaefdgw;
	}
}
