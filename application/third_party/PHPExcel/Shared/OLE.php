<?php






















$GLOBALS['_OLE_INSTANCES'] = array();


class PHPExcel_Shared_OLE
{
	const OLE_PPS_TYPE_ROOT   =      5;
	const OLE_PPS_TYPE_DIR    =      1;
	const OLE_PPS_TYPE_FILE   =      2;
	const OLE_DATA_SIZE_SMALL = 0x1000;
	const OLE_LONG_INT_SIZE   =      4;
	const OLE_PPS_SIZE        =   0x80;

	
	public $Vf25lw2rzfkn;

	
	public $Vrovzut00p2t = array();

	
	public $V4jn4msro4hf;

	
	public $Vnlfzrkp3reo;

	
	public $V5c403aehe0m;

	
	public $Vdmfsy4dixfy;

	
	public $Vw0morl4rosc;

	
	public function read($Vg5mhfl1beoi)
	{
		$Vpo2b1kin4yt = fopen($Vg5mhfl1beoi, "r");
		if (!$Vpo2b1kin4yt) {
			throw new PHPExcel_Reader_Exception("Can't open file $Vg5mhfl1beoi");
		}
		$this->_file_handle = $Vpo2b1kin4yt;

		$V130eo4r3xul = fread($Vpo2b1kin4yt, 8);
		if ("\xD0\xCF\x11\xE0\xA1\xB1\x1A\xE1" != $V130eo4r3xul) {
			throw new PHPExcel_Reader_Exception("File doesn't seem to be an OLE container.");
		}
		fseek($Vpo2b1kin4yt, 28);
		if (fread($Vpo2b1kin4yt, 2) != "\xFE\xFF") {
			
			throw new PHPExcel_Reader_Exception("Only Little-Endian encoding is supported.");
		}
		
		$this->bigBlockSize = pow(2, self::_readInt2($Vpo2b1kin4yt));
		$this->smallBlockSize  = pow(2, self::_readInt2($Vpo2b1kin4yt));

		
		fseek($Vpo2b1kin4yt, 44);
		
		$Vnlfzrkp3reoBlockCount = self::_readInt4($Vpo2b1kin4yt);

		
		$V4vthfie23kc = self::_readInt4($Vpo2b1kin4yt);

		
		fseek($Vpo2b1kin4yt, 56);
		
		$this->bigBlockThreshold = self::_readInt4($Vpo2b1kin4yt);
		
		$V5c403aehe0mFirstBlockId = self::_readInt4($Vpo2b1kin4yt);
		
		$Vv1ksteatsot = self::_readInt4($Vpo2b1kin4yt);
		
		$Vxxdrxhcnjnh = self::_readInt4($Vpo2b1kin4yt);
		
		$Var3ksu4qbqs = self::_readInt4($Vpo2b1kin4yt);
		$this->bbat = array();

		
		
		$V0eilyjjdkg4 = array();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 109; ++$Vfhiq1lhsoja) {
			$V0eilyjjdkg4[] = self::_readInt4($Vpo2b1kin4yt);
		}

		
		$Vv3hdohvn1hh = $this->_getBlockOffset($Vxxdrxhcnjnh);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Var3ksu4qbqs; ++$Vfhiq1lhsoja) {
			fseek($Vpo2b1kin4yt, $Vv3hdohvn1hh);
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->bigBlockSize / 4 - 1; ++$Vzmnqyqjjodw) {
				$V0eilyjjdkg4[] = self::_readInt4($Vpo2b1kin4yt);
			}
			
			$Vv3hdohvn1hh = $this->_getBlockOffset(self::_readInt4($Vpo2b1kin4yt));
		}

		
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vnlfzrkp3reoBlockCount; ++$Vfhiq1lhsoja) {
			$Vv3hdohvn1hh = $this->_getBlockOffset($V0eilyjjdkg4[$Vfhiq1lhsoja]);
			fseek($Vpo2b1kin4yt, $Vv3hdohvn1hh);
			for ($Vzmnqyqjjodw = 0 ; $Vzmnqyqjjodw < $this->bigBlockSize / 4; ++$Vzmnqyqjjodw) {
				$this->bbat[] = self::_readInt4($Vpo2b1kin4yt);
			}
		}

		
		$this->sbat = array();
		$Vpwh1rxdu0ah = $Vv1ksteatsot * $this->bigBlockSize / 4;
		$V5c403aehe0mFh = $this->getStream($V5c403aehe0mFirstBlockId);
		for ($Ve1afy0ayw20 = 0; $Ve1afy0ayw20 < $Vpwh1rxdu0ah; ++$Ve1afy0ayw20) {
			$this->sbat[$Ve1afy0ayw20] = self::_readInt4($V5c403aehe0mFh);
		}
		fclose($V5c403aehe0mFh);

		$this->_readPpsWks($V4vthfie23kc);

		return true;
	}

	
	public function _getBlockOffset($Ve1afy0ayw20)
	{
		return 512 + $Ve1afy0ayw20 * $this->bigBlockSize;
	}

	
	public function getStream($Ve1afy0ayw20OrPps)
	{
		static $Vfhiq1lhsojasRegistered = false;
		if (!$Vfhiq1lhsojasRegistered) {
			stream_wrapper_register('ole-chainedblockstream',
				'PHPExcel_Shared_OLE_ChainedBlockStream');
			$Vfhiq1lhsojasRegistered = true;
		}

		
		
		
		$GLOBALS['_OLE_INSTANCES'][] = $this;
		$Vfhiq1lhsojanstanceId = end(array_keys($GLOBALS['_OLE_INSTANCES']));

		$V3wwyy5a12nc = 'ole-chainedblockstream://oleInstanceId=' . $Vfhiq1lhsojanstanceId;
		if ($Ve1afy0ayw20OrPps instanceof PHPExcel_Shared_OLE_PPS) {
			$V3wwyy5a12nc .= '&blockId=' . $Ve1afy0ayw20OrPps->_StartBlock;
			$V3wwyy5a12nc .= '&size=' . $Ve1afy0ayw20OrPps->Size;
		} else {
			$V3wwyy5a12nc .= '&blockId=' . $Ve1afy0ayw20OrPps;
		}
		return fopen($V3wwyy5a12nc, 'r');
	}

	
	private static function _readInt1($Vpo2b1kin4yt)
	{
		list(, $Vdln1z2oxpjs) = unpack("c", fread($Vpo2b1kin4yt, 1));
		return $Vdln1z2oxpjs;
	}

	
	private static function _readInt2($Vpo2b1kin4yt)
	{
		list(, $Vdln1z2oxpjs) = unpack("v", fread($Vpo2b1kin4yt, 2));
		return $Vdln1z2oxpjs;
	}

	
	private static function _readInt4($Vpo2b1kin4yt)
	{
		list(, $Vdln1z2oxpjs) = unpack("V", fread($Vpo2b1kin4yt, 4));
		return $Vdln1z2oxpjs;
	}

	
	public function _readPpsWks($Ve1afy0ayw20)
	{
		$Vpo2b1kin4yt = $this->getStream($Ve1afy0ayw20);
		for ($Vv3hdohvn1hh = 0; ; $Vv3hdohvn1hh += 128) {
			fseek($Vpo2b1kin4yt, $Vv3hdohvn1hh, SEEK_SET);
			$Vxyaw1wx3fgp = fread($Vpo2b1kin4yt, 64);
			$Va3u3gineybl = self::_readInt2($Vpo2b1kin4yt);
			$Vxyaw1wx3fgp = substr($Vxyaw1wx3fgp, 0, $Va3u3gineybl - 2);
			
			$Vcvluzjs3wzb = str_replace("\x00", "", $Vxyaw1wx3fgp);
			$V4pigtpor0ln = self::_readInt1($Vpo2b1kin4yt);
			switch ($V4pigtpor0ln) {
			case self::OLE_PPS_TYPE_ROOT:
				$V2m2k1j0uvnj = new PHPExcel_Shared_OLE_PPS_Root(null, null, array());
				$this->root = $V2m2k1j0uvnj;
				break;
			case self::OLE_PPS_TYPE_DIR:
				$V2m2k1j0uvnj = new PHPExcel_Shared_OLE_PPS(null, null, null, null, null,
								   null, null, null, null, array());
				break;
			case self::OLE_PPS_TYPE_FILE:
				$V2m2k1j0uvnj = new PHPExcel_Shared_OLE_PPS_File($Vcvluzjs3wzb);
				break;
			default:
				continue;
			}
			fseek($Vpo2b1kin4yt, 1, SEEK_CUR);
			$V2m2k1j0uvnj->Type    = $V4pigtpor0ln;
			$V2m2k1j0uvnj->Name    = $Vcvluzjs3wzb;
			$V2m2k1j0uvnj->PrevPps = self::_readInt4($Vpo2b1kin4yt);
			$V2m2k1j0uvnj->NextPps = self::_readInt4($Vpo2b1kin4yt);
			$V2m2k1j0uvnj->DirPps  = self::_readInt4($Vpo2b1kin4yt);
			fseek($Vpo2b1kin4yt, 20, SEEK_CUR);
			$V2m2k1j0uvnj->Time1st = self::OLE2LocalDate(fread($Vpo2b1kin4yt, 8));
			$V2m2k1j0uvnj->Time2nd = self::OLE2LocalDate(fread($Vpo2b1kin4yt, 8));
			$V2m2k1j0uvnj->_StartBlock = self::_readInt4($Vpo2b1kin4yt);
			$V2m2k1j0uvnj->Size = self::_readInt4($Vpo2b1kin4yt);
			$V2m2k1j0uvnj->No = count($this->_list);
			$this->_list[] = $V2m2k1j0uvnj;

			
			if (isset($this->root) &&
				$this->_ppsTreeComplete($this->root->No)) {

				break;
			}
		}
		fclose($Vpo2b1kin4yt);

		
		foreach ($this->_list as $V2m2k1j0uvnj) {
			if ($V2m2k1j0uvnj->Type == self::OLE_PPS_TYPE_DIR || $V2m2k1j0uvnj->Type == self::OLE_PPS_TYPE_ROOT) {
				$Vtb0wrm1gpxd = array($V2m2k1j0uvnj->DirPps);
				$V2m2k1j0uvnj->children = array();
				while ($Vtb0wrm1gpxd) {
					$Vh53hgs42xbw = array_pop($Vtb0wrm1gpxd);
					if ($Vh53hgs42xbw != -1) {
						$V3wu4gfpnjvp = $this->_list[$Vh53hgs42xbw];
						$Vtb0wrm1gpxd[] = $V3wu4gfpnjvp->PrevPps;
						$Vtb0wrm1gpxd[] = $V3wu4gfpnjvp->NextPps;
						$V2m2k1j0uvnj->children[] = $V3wu4gfpnjvp;
					}
				}
			}
		}

		return true;
	}

	
	public function _ppsTreeComplete($Vfhiq1lhsojandex)
	{
		return isset($this->_list[$Vfhiq1lhsojandex]) &&
			   ($V2m2k1j0uvnj = $this->_list[$Vfhiq1lhsojandex]) &&
			   ($V2m2k1j0uvnj->PrevPps == -1 ||
				$this->_ppsTreeComplete($V2m2k1j0uvnj->PrevPps)) &&
			   ($V2m2k1j0uvnj->NextPps == -1 ||
				$this->_ppsTreeComplete($V2m2k1j0uvnj->NextPps)) &&
			   ($V2m2k1j0uvnj->DirPps == -1 ||
				$this->_ppsTreeComplete($V2m2k1j0uvnj->DirPps));
	}

	
	public function isFile($Vfhiq1lhsojandex)
	{
		if (isset($this->_list[$Vfhiq1lhsojandex])) {
			return ($this->_list[$Vfhiq1lhsojandex]->Type == self::OLE_PPS_TYPE_FILE);
		}
		return false;
	}

	
	public function isRoot($Vfhiq1lhsojandex)
	{
		if (isset($this->_list[$Vfhiq1lhsojandex])) {
			return ($this->_list[$Vfhiq1lhsojandex]->Type == self::OLE_PPS_TYPE_ROOT);
		}
		return false;
	}

	
	public function ppsTotal()
	{
		return count($this->_list);
	}

	
	public function getData($Vfhiq1lhsojandex, $Vv3hdohvn1hhition, $Volq3gdvkuqp)
	{
		
		if (!isset($this->_list[$Vfhiq1lhsojandex]) || ($Vv3hdohvn1hhition >= $this->_list[$Vfhiq1lhsojandex]->Size) || ($Vv3hdohvn1hhition < 0)) {
			return '';
		}
		$Vpo2b1kin4yt = $this->getStream($this->_list[$Vfhiq1lhsojandex]);
		$Vou4vxorrdoe = stream_get_contents($Vpo2b1kin4yt, $Volq3gdvkuqp, $Vv3hdohvn1hhition);
		fclose($Vpo2b1kin4yt);
		return $Vou4vxorrdoe;
	}

	
	public function getDataLength($Vfhiq1lhsojandex)
	{
		if (isset($this->_list[$Vfhiq1lhsojandex])) {
			return $this->_list[$Vfhiq1lhsojandex]->Size;
		}
		return 0;
	}

	
	public static function Asc2Ucs($Vpmcsfe24zs3)
	{
		$V3lyopwy3zg2 = '';
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < strlen($Vpmcsfe24zs3); ++$Vfhiq1lhsoja) {
			$V3lyopwy3zg2 .= $Vpmcsfe24zs3{$Vfhiq1lhsoja} . "\x00";
		}
		return $V3lyopwy3zg2;
	}

	
	public static function LocalDate2OLE($Vaxg5pf4dhts = null)
	{
		if (!isset($Vaxg5pf4dhts)) {
			return "\x00\x00\x00\x00\x00\x00\x00\x00";
		}

		
		$Vikhldhkl2jt = pow(2, 32);

		
		$Vloow0ofeahg = 134774;
		
		$Vl2cr2duvsaz = $Vloow0ofeahg*24*3600 + gmmktime(date("H",$Vaxg5pf4dhts),date("i",$Vaxg5pf4dhts),date("s",$Vaxg5pf4dhts),
											 date("m",$Vaxg5pf4dhts),date("d",$Vaxg5pf4dhts),date("Y",$Vaxg5pf4dhts));
		
		$Vl2cr2duvsaz *= 10000000;

		$V1py4ojaglgc = floor($Vl2cr2duvsaz / $Vikhldhkl2jt);
		
		$Vep0spx0txzk = floor((($Vl2cr2duvsaz / $Vikhldhkl2jt) - $V1py4ojaglgc) * $Vikhldhkl2jt);

		
		$Ve3oeikqcm5n = '';

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 4; ++$Vfhiq1lhsoja) {
			$V0o3f1vps5ku = $Vep0spx0txzk % 0x100;
			$Ve3oeikqcm5n .= pack('c', $V0o3f1vps5ku);
			$Vep0spx0txzk /= 0x100;
		}
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 4; ++$Vfhiq1lhsoja) {
			$V0o3f1vps5ku = $V1py4ojaglgc % 0x100;
			$Ve3oeikqcm5n .= pack('c', $V0o3f1vps5ku);
			$V1py4ojaglgc /= 0x100;
		}
		return $Ve3oeikqcm5n;
	}

	
	public static function OLE2LocalDate($Vlkger5ehs4w)
	{
		if (strlen($Vlkger5ehs4w) != 8) {
			return new PEAR_Error("Expecting 8 byte string");
		}

		
		$Vikhldhkl2jt = pow(2,32);
		list(, $V1py4ojaglgc) = unpack('V', substr($Vlkger5ehs4w, 4, 4));
		list(, $Vep0spx0txzk) = unpack('V', substr($Vlkger5ehs4w, 0, 4));

		$Vl2cr2duvsaz = ($V1py4ojaglgc * $Vikhldhkl2jt) + $Vep0spx0txzk;
		
		$Vl2cr2duvsaz /= 10000000;

		
		$Vloow0ofeahg = 134774;

		
		$Vl2cr2duvsaz -= $Vloow0ofeahg * 24 * 3600;
		return floor($Vl2cr2duvsaz);
	}
}
