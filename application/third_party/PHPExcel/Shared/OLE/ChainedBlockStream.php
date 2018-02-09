<?php



class PHPExcel_Shared_OLE_ChainedBlockStream
{
	
	public $Ve25fnp1s5uc;

	
	public $Verlwfuqi3pq;

	
	public $Vou4vxorrdoe;

	
	public $Vv3hdohvn1hh;

	
	public function stream_open($V3wwyy5a12nc, $Vbdcqcmfhadr, $Vobxlvad3352, &$Vwcx3j0cvfs4)
	{
		if ($Vbdcqcmfhadr != 'r') {
			if ($Vobxlvad3352 & STREAM_REPORT_ERRORS) {
				trigger_error('Only reading is supported', E_USER_WARNING);
			}
			return false;
		}

		
		parse_str(substr($V3wwyy5a12nc, 25), $this->params);
		if (!isset($this->params['oleInstanceId'],
				   $this->params['blockId'],
				   $GLOBALS['_OLE_INSTANCES'][$this->params['oleInstanceId']])) {

			if ($Vobxlvad3352 & STREAM_REPORT_ERRORS) {
				trigger_error('OLE stream not found', E_USER_WARNING);
			}
			return false;
		}
		$this->ole = $GLOBALS['_OLE_INSTANCES'][$this->params['oleInstanceId']];

		$Ve1afy0ayw20 = $this->params['blockId'];
		$this->data = '';
		if (isset($this->params['size']) &&
			$this->params['size'] < $this->ole->bigBlockThreshold &&
			$Ve1afy0ayw20 != $this->ole->root->_StartBlock) {

			
			$Vnzmimj0oh2q = $this->ole->_getBlockOffset($this->ole->root->_StartBlock);
			while ($Ve1afy0ayw20 != -2) {
				$Vv3hdohvn1hh = $Vnzmimj0oh2q + $Ve1afy0ayw20 * $this->ole->bigBlockSize;
				$Ve1afy0ayw20 = $this->ole->sbat[$Ve1afy0ayw20];
				fseek($this->ole->_file_handle, $Vv3hdohvn1hh);
				$this->data .= fread($this->ole->_file_handle, $this->ole->bigBlockSize);
			}
		} else {
			
			while ($Ve1afy0ayw20 != -2) {
				$Vv3hdohvn1hh = $this->ole->_getBlockOffset($Ve1afy0ayw20);
				fseek($this->ole->_file_handle, $Vv3hdohvn1hh);
				$this->data .= fread($this->ole->_file_handle, $this->ole->bigBlockSize);
				$Ve1afy0ayw20 = $this->ole->bbat[$Ve1afy0ayw20];
			}
		}
		if (isset($this->params['size'])) {
			$this->data = substr($this->data, 0, $this->params['size']);
		}

		if ($Vobxlvad3352 & STREAM_USE_PATH) {
			$Vwcx3j0cvfs4 = $V3wwyy5a12nc;
		}

		return true;
	}

	
	public function stream_close()
	{
		$this->ole = null;
		unset($GLOBALS['_OLE_INSTANCES']);
	}

	
	public function stream_read($Vytbsuz3c5qz)
	{
		if ($this->stream_eof()) {
			return false;
		}
		$V2n430jknk35 = substr($this->data, $this->pos, $Vytbsuz3c5qz);
		$this->pos += $Vytbsuz3c5qz;
		return $V2n430jknk35;
	}

	
	public function stream_eof()
	{
		return $this->pos >= strlen($this->data);
	}

	
	public function stream_tell()
	{
		return $this->pos;
	}

	
	public function stream_seek($Vortqlloirgz, $Vtm2hyarvl3a)
	{
		if ($Vtm2hyarvl3a == SEEK_SET && $Vortqlloirgz >= 0) {
			$this->pos = $Vortqlloirgz;
		} elseif ($Vtm2hyarvl3a == SEEK_CUR && -$Vortqlloirgz <= $this->pos) {
			$this->pos += $Vortqlloirgz;
		} elseif ($Vtm2hyarvl3a == SEEK_END && -$Vortqlloirgz <= sizeof($this->data)) {
			$this->pos = strlen($this->data) + $Vortqlloirgz;
		} else {
			return false;
		}
		return true;
	}

	
	public function stream_stat()
	{
		return array(
			'size' => strlen($this->data),
			);
	}

	
	
	
	
	
	
	
	
	
	
	
}
