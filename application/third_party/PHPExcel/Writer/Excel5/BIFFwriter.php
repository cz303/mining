<?php






































class PHPExcel_Writer_Excel5_BIFFwriter
{
	
	private static $Vgu0bhpx4zps;

	
	public $Vqrocrebbbaa;

	
	public $Vqrocrebbbaasize;

	
	public $Vsynmtiix41j	= 8224;

	
	public function __construct()
	{
		$this->_data       = '';
		$this->_datasize   = 0;

	}

	
	public static function getByteOrder()
	{
		if (!isset(self::$Vgu0bhpx4zps)) {
			
			$V0abcfgcqgi1 = pack("d", 1.2345);
			$V2xlryyxxahg  = pack("C8", 0x8D, 0x97, 0x6E, 0x12, 0x83, 0xC0, 0xF3, 0x3F);
			if ($V2xlryyxxahg == $V0abcfgcqgi1) {
				$Vds21ownxeys = 0;    
			} elseif ($V2xlryyxxahg == strrev($V0abcfgcqgi1)){
				$Vds21ownxeys = 1;    
			} else {
				
				throw new PHPExcel_Writer_Exception("Required floating point format not supported on this platform.");
			}
			self::$Vgu0bhpx4zps = $Vds21ownxeys;
		}

		return self::$Vgu0bhpx4zps;
	}

	
	function _append($Vou4vxorrdoe)
	{
		if (strlen($Vou4vxorrdoe) - 4 > $this->_limit) {
			$Vou4vxorrdoe = $this->_addContinue($Vou4vxorrdoe);
		}
		$this->_data		.= $Vou4vxorrdoe;
		$this->_datasize	+= strlen($Vou4vxorrdoe);
	}

	
	public function writeData($Vou4vxorrdoe)
	{
		if (strlen($Vou4vxorrdoe) - 4 > $this->_limit) {
			$Vou4vxorrdoe = $this->_addContinue($Vou4vxorrdoe);
		}
		$this->_datasize += strlen($Vou4vxorrdoe);

		return $Vou4vxorrdoe;
	}

	
	function _storeBof($V4pigtpor0ln)
	{
		$Vkry1ureuzsj  = 0x0809;			
		$Volq3gdvkuqp  = 0x0010;

		
		$Vxe3leehigt3 = pack("VV", 0x000100D1, 0x00000406);

		$Vefs1pjft1sq   = 0x0DBB;			
		$Vz2lhrjd1jk2    = 0x07CC;			

		$Vh51i5i4ai0v = 0x0600;			

		$Vl5rjgb1nsf3  = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe    = pack("vvvv", $Vh51i5i4ai0v, $V4pigtpor0ln, $Vefs1pjft1sq, $Vz2lhrjd1jk2);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . $Vxe3leehigt3);
	}

	
	function _storeEof()
	{
		$Vkry1ureuzsj    = 0x000A;   
		$Volq3gdvkuqp    = 0x0000;   

		$Vl5rjgb1nsf3    = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$this->_append($Vl5rjgb1nsf3);
	}

	
	public function writeEof()
	{
		$Vkry1ureuzsj    = 0x000A;   
		$Volq3gdvkuqp    = 0x0000;   
		$Vl5rjgb1nsf3    = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		return $this->writeData($Vl5rjgb1nsf3);
	}

	
	function _addContinue($Vou4vxorrdoe)
	{
		$Vndfngjmirag  = $this->_limit;
		$Vkry1ureuzsj = 0x003C;         

		
		
		$Vdln1z2oxpjs = substr($Vou4vxorrdoe, 0, 2) . pack("v", $Vndfngjmirag) . substr($Vou4vxorrdoe, 4, $Vndfngjmirag);

		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Vndfngjmirag);  

		
		$Vou4vxorrdoe_length = strlen($Vou4vxorrdoe);
		for ($Vfhiq1lhsoja = $Vndfngjmirag + 4; $Vfhiq1lhsoja < ($Vou4vxorrdoe_length - $Vndfngjmirag); $Vfhiq1lhsoja += $Vndfngjmirag) {
			$Vdln1z2oxpjs .= $Vl5rjgb1nsf3;
			$Vdln1z2oxpjs .= substr($Vou4vxorrdoe, $Vfhiq1lhsoja, $Vndfngjmirag);
		}

		
		$Vl5rjgb1nsf3  = pack("vv", $Vkry1ureuzsj, strlen($Vou4vxorrdoe) - $Vfhiq1lhsoja);
		$Vdln1z2oxpjs    .= $Vl5rjgb1nsf3;
		$Vdln1z2oxpjs    .= substr($Vou4vxorrdoe, $Vfhiq1lhsoja, strlen($Vou4vxorrdoe) - $Vfhiq1lhsoja);

		return $Vdln1z2oxpjs;
	}

}
