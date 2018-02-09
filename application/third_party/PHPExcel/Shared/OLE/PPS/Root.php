<?php






















class PHPExcel_Shared_OLE_PPS_Root extends PHPExcel_Shared_OLE_PPS
	{

	
	protected $V41nrxsusk1u		= NULL;

	
	public function __construct($Vkuf34sqcj3s, $Vb20fwhdco1u, $Vrrfbezrm0wi)
	{
		$this->_tempDir = PHPExcel_Shared_File::sys_get_temp_dir();

		parent::__construct(
		   null,
		   PHPExcel_Shared_OLE::Asc2Ucs('Root Entry'),
		   PHPExcel_Shared_OLE::OLE_PPS_TYPE_ROOT,
		   null,
		   null,
		   null,
		   $Vkuf34sqcj3s,
		   $Vb20fwhdco1u,
		   null,
		   $Vrrfbezrm0wi);
	}

	
	public function save($Vv0mtkrhebac)
	{
		
		$this->_BIG_BLOCK_SIZE  = pow(2,
					  ((isset($this->_BIG_BLOCK_SIZE))? self::_adjust2($this->_BIG_BLOCK_SIZE)  : 9));
		$this->_SMALL_BLOCK_SIZE= pow(2,
					  ((isset($this->_SMALL_BLOCK_SIZE))?  self::_adjust2($this->_SMALL_BLOCK_SIZE): 6));

		if (is_resource($Vv0mtkrhebac)) {
		    $this->_FILEH_ = $Vv0mtkrhebac;
		} else if ($Vv0mtkrhebac == '-' || $Vv0mtkrhebac == '') {
			if ($this->_tmp_dir === NULL)
				$this->_tmp_dir = PHPExcel_Shared_File::sys_get_temp_dir();
			$this->_tmp_filename = tempnam($this->_tmp_dir, "OLE_PPS_Root");
			$this->_FILEH_ = fopen($this->_tmp_filename,"w+b");
			if ($this->_FILEH_ == false) {
				throw new PHPExcel_Writer_Exception("Can't create temporary file.");
			}
		} else {
			$this->_FILEH_ = fopen($Vv0mtkrhebac, "wb");
		}
		if ($this->_FILEH_ == false) {
			throw new PHPExcel_Writer_Exception("Can't open $Vv0mtkrhebac. It may be in use or protected.");
		}
		
		$Vtoyzm2jtxjh = array();
		PHPExcel_Shared_OLE_PPS::_savePpsSetPnt($Vtoyzm2jtxjh, array($this));
		
		list($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli) = $this->_calcSize($Vtoyzm2jtxjh); 
		
		$this->_saveHeader($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli);

		
		$this->_data = $this->_makeSmallData($Vtoyzm2jtxjh);

		
		$this->_saveBigData($Vf0ka0urod2k, $Vtoyzm2jtxjh);
		
		$this->_savePps($Vtoyzm2jtxjh);
		
		$this->_saveBbd($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli);

		if (!is_resource($Vv0mtkrhebac)) {
 			fclose($this->_FILEH_);
 		}

		return true;
	}

	
	public function _calcSize(&$Vsj4hejsoyli)
	{
		
		list($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli) = array(0,0,0);
		$Vmgj1n1cs500 = 0;
		$V41fgujmdc3l = 0;
		$V5oixjvo3szu = count($Vsj4hejsoyli);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V5oixjvo3szu; ++$Vfhiq1lhsoja) {
			if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Type == PHPExcel_Shared_OLE::OLE_PPS_TYPE_FILE) {
				$Vsj4hejsoyli[$Vfhiq1lhsoja]->Size = $Vsj4hejsoyli[$Vfhiq1lhsoja]->_DataLen();
				if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size < PHPExcel_Shared_OLE::OLE_DATA_SIZE_SMALL) {
					$V41fgujmdc3l += floor($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size / $this->_SMALL_BLOCK_SIZE)
								  + (($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_SMALL_BLOCK_SIZE)? 1: 0);
				} else {
					$V5h23wjxigob += (floor($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size / $this->_BIG_BLOCK_SIZE) +
						(($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_BIG_BLOCK_SIZE)? 1: 0));
				}
			}
		}
		$Vmgj1n1cs500 = $V41fgujmdc3l * $this->_SMALL_BLOCK_SIZE;
		$Vfhiq1lhsojaSlCnt = floor($this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE);
		$Vf0ka0urod2k = floor($V41fgujmdc3l / $Vfhiq1lhsojaSlCnt) + (($V41fgujmdc3l % $Vfhiq1lhsojaSlCnt)? 1:0);
		$V5h23wjxigob +=  (floor($Vmgj1n1cs500 / $this->_BIG_BLOCK_SIZE) +
					  (( $Vmgj1n1cs500 % $this->_BIG_BLOCK_SIZE)? 1: 0));
		$Vfhiq1lhsojaCnt = count($Vsj4hejsoyli);
		$Vfhiq1lhsojaBdCnt = $this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_PPS_SIZE;
		$Vny301zwflli = (floor($Vfhiq1lhsojaCnt/$Vfhiq1lhsojaBdCnt) + (($Vfhiq1lhsojaCnt % $Vfhiq1lhsojaBdCnt)? 1: 0));

		return array($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli);
	}

	
	private static function _adjust2($Vfhiq1lhsoja2)
	{
		$Vfhiq1lhsojaWk = log($Vfhiq1lhsoja2)/log(2);
		return ($Vfhiq1lhsojaWk > floor($Vfhiq1lhsojaWk))? floor($Vfhiq1lhsojaWk)+1:$Vfhiq1lhsojaWk;
	}

	
	public function _saveHeader($Vf0ka0urod2k, $V5h23wjxigob, $Vny301zwflli)
	{
		$Vc1rz0enppqk = $this->_FILEH_;

		
		$Vfhiq1lhsojaBlCnt = $this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE;
		$Vfhiq1lhsoja1stBdL = ($this->_BIG_BLOCK_SIZE - 0x4C) / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE;

		$Vfhiq1lhsojaBdExL = 0;
		$Vfhiq1lhsojaAll = $V5h23wjxigob + $Vny301zwflli + $Vf0ka0urod2k;
		$Vfhiq1lhsojaAllW = $Vfhiq1lhsojaAll;
		$Vfhiq1lhsojaBdCntW = floor($Vfhiq1lhsojaAllW / $Vfhiq1lhsojaBlCnt) + (($Vfhiq1lhsojaAllW % $Vfhiq1lhsojaBlCnt)? 1: 0);
		$Vfhiq1lhsojaBdCnt = floor(($Vfhiq1lhsojaAll + $Vfhiq1lhsojaBdCntW) / $Vfhiq1lhsojaBlCnt) + ((($Vfhiq1lhsojaAllW+$Vfhiq1lhsojaBdCntW) % $Vfhiq1lhsojaBlCnt)? 1: 0);

		
		if ($Vfhiq1lhsojaBdCnt > $Vfhiq1lhsoja1stBdL) {
			while (1) {
				++$Vfhiq1lhsojaBdExL;
				++$Vfhiq1lhsojaAllW;
				$Vfhiq1lhsojaBdCntW = floor($Vfhiq1lhsojaAllW / $Vfhiq1lhsojaBlCnt) + (($Vfhiq1lhsojaAllW % $Vfhiq1lhsojaBlCnt)? 1: 0);
				$Vfhiq1lhsojaBdCnt = floor(($Vfhiq1lhsojaAllW + $Vfhiq1lhsojaBdCntW) / $Vfhiq1lhsojaBlCnt) + ((($Vfhiq1lhsojaAllW+$Vfhiq1lhsojaBdCntW) % $Vfhiq1lhsojaBlCnt)? 1: 0);
				if ($Vfhiq1lhsojaBdCnt <= ($Vfhiq1lhsojaBdExL*$Vfhiq1lhsojaBlCnt+ $Vfhiq1lhsoja1stBdL)) {
					break;
				}
			}
		}

		
		fwrite($Vc1rz0enppqk,
				"\xD0\xCF\x11\xE0\xA1\xB1\x1A\xE1"
				. "\x00\x00\x00\x00"
				. "\x00\x00\x00\x00"
				. "\x00\x00\x00\x00"
				. "\x00\x00\x00\x00"
				. pack("v", 0x3b)
				. pack("v", 0x03)
				. pack("v", -2)
				. pack("v", 9)
				. pack("v", 6)
				. pack("v", 0)
				. "\x00\x00\x00\x00"
				. "\x00\x00\x00\x00"
				. pack("V", $Vfhiq1lhsojaBdCnt)
				. pack("V", $V5h23wjxigob+$Vf0ka0urod2k) 
				. pack("V", 0)
				. pack("V", 0x1000)
				. pack("V", $Vf0ka0urod2k ? 0 : -2)                  
				. pack("V", $Vf0ka0urod2k)
		  );
		
		if ($Vfhiq1lhsojaBdCnt < $Vfhiq1lhsoja1stBdL) {
			fwrite($Vc1rz0enppqk,
					pack("V", -2)      
					. pack("V", 0)        
				  );
		} else {
			fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsojaAll+$Vfhiq1lhsojaBdCnt) . pack("V", $Vfhiq1lhsojaBdExL));
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsoja1stBdL && $Vfhiq1lhsoja < $Vfhiq1lhsojaBdCnt; ++$Vfhiq1lhsoja) {
			fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsojaAll+$Vfhiq1lhsoja));
		}
		if ($Vfhiq1lhsoja < $Vfhiq1lhsoja1stBdL) {
			$V00u5qfzr2or = $Vfhiq1lhsoja1stBdL - $Vfhiq1lhsoja;
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $V00u5qfzr2or; ++$Vzmnqyqjjodw) {
				fwrite($Vc1rz0enppqk, (pack("V", -1)));
			}
		}
	}

	
	public function _saveBigData($Vfhiq1lhsojaStBlk, &$Vsj4hejsoyli)
	{
		$Vc1rz0enppqk = $this->_FILEH_;

		
		$V5oixjvo3szu = count($Vsj4hejsoyli);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V5oixjvo3szu; ++$Vfhiq1lhsoja) {
			if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Type != PHPExcel_Shared_OLE::OLE_PPS_TYPE_DIR) {
				$Vsj4hejsoyli[$Vfhiq1lhsoja]->Size = $Vsj4hejsoyli[$Vfhiq1lhsoja]->_DataLen();
				if (($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size >= PHPExcel_Shared_OLE::OLE_DATA_SIZE_SMALL) ||
					(($Vsj4hejsoyli[$Vfhiq1lhsoja]->Type == PHPExcel_Shared_OLE::OLE_PPS_TYPE_ROOT) && isset($Vsj4hejsoyli[$Vfhiq1lhsoja]->_data)))
				{
					
					
					
					
					
					
					
					
					
						fwrite($Vc1rz0enppqk, $Vsj4hejsoyli[$Vfhiq1lhsoja]->_data);
					

					if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_BIG_BLOCK_SIZE) {
						fwrite($Vc1rz0enppqk, str_repeat("\x00", $this->_BIG_BLOCK_SIZE - ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_BIG_BLOCK_SIZE)));
					}
					
					$Vsj4hejsoyli[$Vfhiq1lhsoja]->_StartBlock = $Vfhiq1lhsojaStBlk;
					$Vfhiq1lhsojaStBlk +=
							(floor($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size / $this->_BIG_BLOCK_SIZE) +
								(($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_BIG_BLOCK_SIZE)? 1: 0));
				}
				
				
				
				
				
				
			}
		}
	}

	
	public function _makeSmallData(&$Vsj4hejsoyli)
	{
		$Vjcyatuajnl3 = '';
		$Vc1rz0enppqk = $this->_FILEH_;
		$Vfhiq1lhsojaSmBlk = 0;

		$V5oixjvo3szu = count($Vsj4hejsoyli);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V5oixjvo3szu; ++$Vfhiq1lhsoja) {
			
			if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Type == PHPExcel_Shared_OLE::OLE_PPS_TYPE_FILE) {
				if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size <= 0) {
					continue;
				}
				if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size < PHPExcel_Shared_OLE::OLE_DATA_SIZE_SMALL) {
					$Vfhiq1lhsojaSmbCnt = floor($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size / $this->_SMALL_BLOCK_SIZE)
								  + (($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_SMALL_BLOCK_SIZE)? 1: 0);
					
					$V00u5qfzr2or = $Vfhiq1lhsojaSmbCnt - 1;
					for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $V00u5qfzr2or; ++$Vzmnqyqjjodw) {
						fwrite($Vc1rz0enppqk, pack("V", $Vzmnqyqjjodw+$Vfhiq1lhsojaSmBlk+1));
					}
					fwrite($Vc1rz0enppqk, pack("V", -2));

					
					
					
					
					
					
					
						$Vjcyatuajnl3 .= $Vsj4hejsoyli[$Vfhiq1lhsoja]->_data;
					
					if ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_SMALL_BLOCK_SIZE) {
						$Vjcyatuajnl3 .= str_repeat("\x00",$this->_SMALL_BLOCK_SIZE - ($Vsj4hejsoyli[$Vfhiq1lhsoja]->Size % $this->_SMALL_BLOCK_SIZE));
					}
					
					$Vsj4hejsoyli[$Vfhiq1lhsoja]->_StartBlock = $Vfhiq1lhsojaSmBlk;
					$Vfhiq1lhsojaSmBlk += $Vfhiq1lhsojaSmbCnt;
				}
			}
		}
		$Vfhiq1lhsojaSbCnt = floor($this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE);
		if ($Vfhiq1lhsojaSmBlk % $Vfhiq1lhsojaSbCnt) {
			$Vfhiq1lhsojaB = $Vfhiq1lhsojaSbCnt - ($Vfhiq1lhsojaSmBlk % $Vfhiq1lhsojaSbCnt);
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaB; ++$Vfhiq1lhsoja) {
				fwrite($Vc1rz0enppqk, pack("V", -1));
			}
		}
		return $Vjcyatuajnl3;
	}

	
	public function _savePps(&$Vsj4hejsoyli)
	{
		
		$Vfhiq1lhsojaC = count($Vsj4hejsoyli);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaC; ++$Vfhiq1lhsoja) {
			fwrite($this->_FILEH_, $Vsj4hejsoyli[$Vfhiq1lhsoja]->_getPpsWk());
		}
		
		$Vfhiq1lhsojaCnt = count($Vsj4hejsoyli);
		$Vfhiq1lhsojaBCnt = $this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_PPS_SIZE;
		if ($Vfhiq1lhsojaCnt % $Vfhiq1lhsojaBCnt) {
			fwrite($this->_FILEH_, str_repeat("\x00",($Vfhiq1lhsojaBCnt - ($Vfhiq1lhsojaCnt % $Vfhiq1lhsojaBCnt)) * PHPExcel_Shared_OLE::OLE_PPS_SIZE));
		}
	}

	
	public function _saveBbd($Vfhiq1lhsojaSbdSize, $Vfhiq1lhsojaBsize, $Vfhiq1lhsojaPpsCnt)
	{
		$Vc1rz0enppqk = $this->_FILEH_;
		
		$Vfhiq1lhsojaBbCnt = $this->_BIG_BLOCK_SIZE / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE;
		$Vfhiq1lhsoja1stBdL = ($this->_BIG_BLOCK_SIZE - 0x4C) / PHPExcel_Shared_OLE::OLE_LONG_INT_SIZE;

		$Vfhiq1lhsojaBdExL = 0;
		$Vfhiq1lhsojaAll = $Vfhiq1lhsojaBsize + $Vfhiq1lhsojaPpsCnt + $Vfhiq1lhsojaSbdSize;
		$Vfhiq1lhsojaAllW = $Vfhiq1lhsojaAll;
		$Vfhiq1lhsojaBdCntW = floor($Vfhiq1lhsojaAllW / $Vfhiq1lhsojaBbCnt) + (($Vfhiq1lhsojaAllW % $Vfhiq1lhsojaBbCnt)? 1: 0);
		$Vfhiq1lhsojaBdCnt = floor(($Vfhiq1lhsojaAll + $Vfhiq1lhsojaBdCntW) / $Vfhiq1lhsojaBbCnt) + ((($Vfhiq1lhsojaAllW+$Vfhiq1lhsojaBdCntW) % $Vfhiq1lhsojaBbCnt)? 1: 0);
		
		if ($Vfhiq1lhsojaBdCnt >$Vfhiq1lhsoja1stBdL) {
			while (1) {
				++$Vfhiq1lhsojaBdExL;
				++$Vfhiq1lhsojaAllW;
				$Vfhiq1lhsojaBdCntW = floor($Vfhiq1lhsojaAllW / $Vfhiq1lhsojaBbCnt) + (($Vfhiq1lhsojaAllW % $Vfhiq1lhsojaBbCnt)? 1: 0);
				$Vfhiq1lhsojaBdCnt = floor(($Vfhiq1lhsojaAllW + $Vfhiq1lhsojaBdCntW) / $Vfhiq1lhsojaBbCnt) + ((($Vfhiq1lhsojaAllW+$Vfhiq1lhsojaBdCntW) % $Vfhiq1lhsojaBbCnt)? 1: 0);
				if ($Vfhiq1lhsojaBdCnt <= ($Vfhiq1lhsojaBdExL*$Vfhiq1lhsojaBbCnt+ $Vfhiq1lhsoja1stBdL)) {
					break;
				}
			}
		}

		
		
		if ($Vfhiq1lhsojaSbdSize > 0) {
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < ($Vfhiq1lhsojaSbdSize - 1); ++$Vfhiq1lhsoja) {
				fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsoja+1));
			}
			fwrite($Vc1rz0enppqk, pack("V", -2));
		}
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < ($Vfhiq1lhsojaBsize - 1); ++$Vfhiq1lhsoja) {
			fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsoja+$Vfhiq1lhsojaSbdSize+1));
		}
		fwrite($Vc1rz0enppqk, pack("V", -2));

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < ($Vfhiq1lhsojaPpsCnt - 1); ++$Vfhiq1lhsoja) {
			fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsoja+$Vfhiq1lhsojaSbdSize+$Vfhiq1lhsojaBsize+1));
		}
		fwrite($Vc1rz0enppqk, pack("V", -2));
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaBdCnt; ++$Vfhiq1lhsoja) {
			fwrite($Vc1rz0enppqk, pack("V", 0xFFFFFFFD));
		}
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaBdExL; ++$Vfhiq1lhsoja) {
			fwrite($Vc1rz0enppqk, pack("V", 0xFFFFFFFC));
		}
		
		if (($Vfhiq1lhsojaAllW + $Vfhiq1lhsojaBdCnt) % $Vfhiq1lhsojaBbCnt) {
			$Vfhiq1lhsojaBlock = ($Vfhiq1lhsojaBbCnt - (($Vfhiq1lhsojaAllW + $Vfhiq1lhsojaBdCnt) % $Vfhiq1lhsojaBbCnt));
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaBlock; ++$Vfhiq1lhsoja) {
				fwrite($Vc1rz0enppqk, pack("V", -1));
			}
		}
		
		if ($Vfhiq1lhsojaBdCnt > $Vfhiq1lhsoja1stBdL) {
			$Vfhiq1lhsojaN=0;
			$Vfhiq1lhsojaNb=0;
			for ($Vfhiq1lhsoja = $Vfhiq1lhsoja1stBdL;$Vfhiq1lhsoja < $Vfhiq1lhsojaBdCnt; $Vfhiq1lhsoja++, ++$Vfhiq1lhsojaN) {
				if ($Vfhiq1lhsojaN >= ($Vfhiq1lhsojaBbCnt - 1)) {
					$Vfhiq1lhsojaN = 0;
					++$Vfhiq1lhsojaNb;
					fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsojaAll+$Vfhiq1lhsojaBdCnt+$Vfhiq1lhsojaNb));
				}
				fwrite($Vc1rz0enppqk, pack("V", $Vfhiq1lhsojaBsize+$Vfhiq1lhsojaSbdSize+$Vfhiq1lhsojaPpsCnt+$Vfhiq1lhsoja));
			}
			if (($Vfhiq1lhsojaBdCnt-$Vfhiq1lhsoja1stBdL) % ($Vfhiq1lhsojaBbCnt-1)) {
				$Vfhiq1lhsojaB = ($Vfhiq1lhsojaBbCnt - 1) - (($Vfhiq1lhsojaBdCnt - $Vfhiq1lhsoja1stBdL) % ($Vfhiq1lhsojaBbCnt - 1));
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojaB; ++$Vfhiq1lhsoja) {
					fwrite($Vc1rz0enppqk, pack("V", -1));
				}
			}
			fwrite($Vc1rz0enppqk, pack("V", -2));
		}
	}
}
