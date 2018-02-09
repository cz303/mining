<?php




class PHPExcel_DocumentProperties
{
    
    const PROPERTY_TYPE_BOOLEAN	= 'b';
    const PROPERTY_TYPE_INTEGER = 'i';
    const PROPERTY_TYPE_FLOAT   = 'f';
    const PROPERTY_TYPE_DATE    = 'd';
    const PROPERTY_TYPE_STRING  = 's';
    const PROPERTY_TYPE_UNKNOWN = 'u';

    
    private $Viztrrmgt2sr    = 'Unknown Creator';

    
    private $Vk4ov2jeyyck;

    
    private $Vgmmubnx51yf;

    
    private $Vsjod32k1kbm;

    
    private $Vtnqistlfgjq            = 'Untitled Spreadsheet';

    
    private $Vzghx0kmfoxz    = '';

    
    private $Vpdxazfpfi4p        = '';

    
    private $Vnfnbwsxhree        = '';

    
    private $Vnmfqlp5oqe3        = '';

    
    private $Vtjqfxr5kuko        = '';

    
    private $V0p25224xdg0        = 'Microsoft Corporation';

    
    private $Vwo20lh1gy2q    = array();


    
    public function __construct()
    {
        
        $this->_lastModifiedBy    = $this->_creator;
        $this->_created        = time();
        $this->_modified    = time();
    }

    
    public function getCreator() {
        return $this->_creator;
    }

    
    public function setCreator($Vqujkwol1zut = '') {
        $this->_creator = $Vqujkwol1zut;
        return $this;
    }

    
    public function getLastModifiedBy() {
        return $this->_lastModifiedBy;
    }

    
    public function setLastModifiedBy($Vqujkwol1zut = '') {
        $this->_lastModifiedBy = $Vqujkwol1zut;
        return $this;
    }

    
    public function getCreated() {
        return $this->_created;
    }

    
    public function setCreated($Vqujkwol1zut = null) {
        if ($Vqujkwol1zut === NULL) {
            $Vqujkwol1zut = time();
        } elseif (is_string($Vqujkwol1zut)) {
            if (is_numeric($Vqujkwol1zut)) {
                $Vqujkwol1zut = intval($Vqujkwol1zut);
            } else {
                $Vqujkwol1zut = strtotime($Vqujkwol1zut);
            }
        }

        $this->_created = $Vqujkwol1zut;
        return $this;
    }

    
    public function getModified() {
        return $this->_modified;
    }

    
    public function setModified($Vqujkwol1zut = null) {
        if ($Vqujkwol1zut === NULL) {
            $Vqujkwol1zut = time();
        } elseif (is_string($Vqujkwol1zut)) {
            if (is_numeric($Vqujkwol1zut)) {
                $Vqujkwol1zut = intval($Vqujkwol1zut);
            } else {
                $Vqujkwol1zut = strtotime($Vqujkwol1zut);
            }
        }

        $this->_modified = $Vqujkwol1zut;
        return $this;
    }

    
    public function getTitle() {
        return $this->_title;
    }

    
    public function setTitle($Vqujkwol1zut = '') {
        $this->_title = $Vqujkwol1zut;
        return $this;
    }

    
    public function getDescription() {
        return $this->_description;
    }

    
    public function setDescription($Vqujkwol1zut = '') {
        $this->_description = $Vqujkwol1zut;
        return $this;
    }

    
    public function getSubject() {
        return $this->_subject;
    }

    
    public function setSubject($Vqujkwol1zut = '') {
        $this->_subject = $Vqujkwol1zut;
        return $this;
    }

    
    public function getKeywords() {
        return $this->_keywords;
    }

    
    public function setKeywords($Vqujkwol1zut = '') {
        $this->_keywords = $Vqujkwol1zut;
        return $this;
    }

    
    public function getCategory() {
        return $this->_category;
    }

    
    public function setCategory($Vqujkwol1zut = '') {
        $this->_category = $Vqujkwol1zut;
        return $this;
    }

    
    public function getCompany() {
        return $this->_company;
    }

    
    public function setCompany($Vqujkwol1zut = '') {
        $this->_company = $Vqujkwol1zut;
        return $this;
    }

    
    public function getManager() {
        return $this->_manager;
    }

    
    public function setManager($Vqujkwol1zut = '') {
        $this->_manager = $Vqujkwol1zut;
        return $this;
    }

    
    public function getCustomProperties() {
        return array_keys($this->_customProperties);
    }

    
    public function isCustomPropertySet($Vrdimrb3fnt2) {
        return isset($this->_customProperties[$Vrdimrb3fnt2]);
    }

    
    public function getCustomPropertyValue($Vrdimrb3fnt2) {
        if (isset($this->_customProperties[$Vrdimrb3fnt2])) {
            return $this->_customProperties[$Vrdimrb3fnt2]['value'];
        }

    }

    
    public function getCustomPropertyType($Vrdimrb3fnt2) {
        if (isset($this->_customProperties[$Vrdimrb3fnt2])) {
            return $this->_customProperties[$Vrdimrb3fnt2]['type'];
        }

    }

    
    public function setCustomProperty($Vrdimrb3fnt2,$Vybj4yv3ywl1='',$Vbcvvc32gxb3=NULL) {
        if (($Vbcvvc32gxb3 === NULL) || (!in_array($Vbcvvc32gxb3,array(self::PROPERTY_TYPE_INTEGER,
                                                                       self::PROPERTY_TYPE_FLOAT,
                                                                       self::PROPERTY_TYPE_STRING,
                                                                       self::PROPERTY_TYPE_DATE,
                                                                       self::PROPERTY_TYPE_BOOLEAN)))) {
            if ($Vybj4yv3ywl1 === NULL) {
                $Vbcvvc32gxb3 = self::PROPERTY_TYPE_STRING;
            } elseif (is_float($Vybj4yv3ywl1)) {
                $Vbcvvc32gxb3 = self::PROPERTY_TYPE_FLOAT;
            } elseif(is_int($Vybj4yv3ywl1)) {
                $Vbcvvc32gxb3 = self::PROPERTY_TYPE_INTEGER;
            } elseif (is_bool($Vybj4yv3ywl1)) {
                $Vbcvvc32gxb3 = self::PROPERTY_TYPE_BOOLEAN;
            } else {
                $Vbcvvc32gxb3 = self::PROPERTY_TYPE_STRING;
            }
        }

        $this->_customProperties[$Vrdimrb3fnt2] = array('value' => $Vybj4yv3ywl1, 'type' => $Vbcvvc32gxb3);
        return $this;
    }

    
    public function __clone() {
        $Vtf0r1rll31w = get_object_vars($this);
        foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            if (is_object($Vp4xjtpabm0l)) {
                $this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
            } else {
                $this->$Vseq1edikdvg = $Vp4xjtpabm0l;
            }
        }
    }

    public static function convertProperty($Vybj4yv3ywl1,$Vbcvvc32gxb3) {
        switch ($Vbcvvc32gxb3) {
            case 'empty'    :    
                return '';
                break;
            case 'null'        :    
                return NULL;
                break;
            case 'i1'        :    
            case 'i2'        :    
            case 'i4'        :    
            case 'i8'        :    
            case 'int'        :    
                return (int) $Vybj4yv3ywl1;
                break;
            case 'ui1'        :    
            case 'ui2'        :    
            case 'ui4'        :    
            case 'ui8'        :    
            case 'uint'        :    
                return abs((int) $Vybj4yv3ywl1);
                break;
            case 'r4'        :    
            case 'r8'        :    
            case 'decimal'    :    
                return (float) $Vybj4yv3ywl1;
                break;
            case 'lpstr'    :    
            case 'lpwstr'    :    
            case 'bstr'        :    
                return $Vybj4yv3ywl1;
                break;
            case 'date'        :    
            case 'filetime'    :    
                return strtotime($Vybj4yv3ywl1);
                break;
            case 'bool'        :    
                return ($Vybj4yv3ywl1 == 'true') ? True : False;
                break;
            case 'cy'        :    
            case 'error'    :    
            case 'vector'    :    
            case 'array'    :    
            case 'blob'        :    
            case 'oblob'    :    
            case 'stream'    :    
            case 'ostream'    :    
            case 'storage'    :    
            case 'ostorage'    :    
            case 'vstream'    :    
            case 'clsid'    :    
            case 'cf'        :    
                return $Vybj4yv3ywl1;
                break;
        }
        return $Vybj4yv3ywl1;
    }

    public static function convertPropertyType($Vbcvvc32gxb3) {
        switch ($Vbcvvc32gxb3) {
            case 'i1'        :    
            case 'i2'        :    
            case 'i4'        :    
            case 'i8'        :    
            case 'int'        :    
            case 'ui1'        :    
            case 'ui2'        :    
            case 'ui4'        :    
            case 'ui8'        :    
            case 'uint'        :    
                return self::PROPERTY_TYPE_INTEGER;
                break;
            case 'r4'        :    
            case 'r8'        :    
            case 'decimal'    :    
                return self::PROPERTY_TYPE_FLOAT;
                break;
            case 'empty'    :    
            case 'null'        :    
            case 'lpstr'    :    
            case 'lpwstr'    :    
            case 'bstr'        :    
                return self::PROPERTY_TYPE_STRING;
                break;
            case 'date'        :    
            case 'filetime'    :    
                return self::PROPERTY_TYPE_DATE;
                break;
            case 'bool'        :    
                return self::PROPERTY_TYPE_BOOLEAN;
                break;
            case 'cy'        :    
            case 'error'    :    
            case 'vector'    :    
            case 'array'    :    
            case 'blob'        :    
            case 'oblob'    :    
            case 'stream'    :    
            case 'ostream'    :    
            case 'storage'    :    
            case 'ostorage'    :    
            case 'vstream'    :    
            case 'clsid'    :    
            case 'cf'        :    
                return self::PROPERTY_TYPE_UNKNOWN;
                break;
        }
        return self::PROPERTY_TYPE_UNKNOWN;
    }

}
