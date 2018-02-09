<?php




class PHPExcel_Cell_Hyperlink
{
    
    private $Vbf1dyt31nha;

    
    private $Vv5shhsyfmyj;

    
    public function __construct($Vzfmojpkujpd = '', $Vvj32lvbaiwm = '')
    {
        
        $this->_url         = $Vzfmojpkujpd;
        $this->_tooltip     = $Vvj32lvbaiwm;
    }

    
    public function getUrl() {
        return $this->_url;
    }

    
    public function setUrl($Vp4xjtpabm0l = '') {
        $this->_url = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getTooltip() {
        return $this->_tooltip;
    }

    
    public function setTooltip($Vp4xjtpabm0l = '') {
        $this->_tooltip = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function isInternal() {
        return strpos($this->_url, 'sheet://') !== false;
    }

    
    public function getHashCode() {
        return md5(
              $this->_url
            . $this->_tooltip
            . __CLASS__
        );
    }
}
