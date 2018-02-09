<?php




class PHPExcel_Shared_ZipStreamWrapper {
	
    private $Vqtfu2unin52;

    
    private $Vfniuoxeuffj = '';

    
    private $Vqvgj4sslcm2 = 0;

    
    private $Vqrocrebbbaa = '';

    
    public static function register() {
		@stream_wrapper_unregister("zip");
		@stream_wrapper_register("zip", __CLASS__);
    }

    
    public function stream_open($V3wwyy5a12nc, $Vbdcqcmfhadr, $Vobxlvad3352, &$Vol5nc2eoeda) {
        
        if ($Vbdcqcmfhadr{0} != 'r') {
            throw new PHPExcel_Reader_Exception('Mode ' . $Vbdcqcmfhadr . ' is not supported. Only read mode is supported.');
        }

		$Vv3hdohvn1hh = strrpos($V3wwyy5a12nc, '#');
		$Vbfatyoohaps['host'] = substr($V3wwyy5a12nc, 6, $Vv3hdohvn1hh - 6); 
		$Vbfatyoohaps['fragment'] = substr($V3wwyy5a12nc, $Vv3hdohvn1hh + 1);

        
        $this->_archive = new ZipArchive();
        $this->_archive->open($Vbfatyoohaps['host']);

        $this->_fileNameInArchive = $Vbfatyoohaps['fragment'];
        $this->_position = 0;
        $this->_data = $this->_archive->getFromName( $this->_fileNameInArchive );

        return true;
    }

    
    public function statName() {
        return $this->_fileNameInArchive;
    }

    
    public function url_stat() {
        return $this->statName( $this->_fileNameInArchive );
    }

    
    public function stream_stat() {
        return $this->_archive->statName( $this->_fileNameInArchive );
    }

    
    function stream_read($Vytbsuz3c5qz) {
        $Vc0brddnw0vm = substr($this->_data, $this->_position, $Vytbsuz3c5qz);
        $this->_position += strlen($Vc0brddnw0vm);
        return $Vc0brddnw0vm;
    }

    
    public function stream_tell() {
        return $this->_position;
    }

    
    public function stream_eof() {
        return $this->_position >= strlen($this->_data);
    }

    
    public function stream_seek($Vortqlloirgz, $Vtm2hyarvl3a) {
        switch ($Vtm2hyarvl3a) {
            case SEEK_SET:
                if ($Vortqlloirgz < strlen($this->_data) && $Vortqlloirgz >= 0) {
                     $this->_position = $Vortqlloirgz;
                     return true;
                } else {
                     return false;
                }
                break;

            case SEEK_CUR:
                if ($Vortqlloirgz >= 0) {
                     $this->_position += $Vortqlloirgz;
                     return true;
                } else {
                     return false;
                }
                break;

            case SEEK_END:
                if (strlen($this->_data) + $Vortqlloirgz >= 0) {
                     $this->_position = strlen($this->_data) + $Vortqlloirgz;
                     return true;
                } else {
                     return false;
                }
                break;

            default:
                return false;
        }
    }
}
