<?php




class PHPExcel_Cell_DataValidation
{
    
    const TYPE_NONE        = 'none';
    const TYPE_CUSTOM      = 'custom';
    const TYPE_DATE        = 'date';
    const TYPE_DECIMAL     = 'decimal';
    const TYPE_LIST        = 'list';
    const TYPE_TEXTLENGTH  = 'textLength';
    const TYPE_TIME        = 'time';
    const TYPE_WHOLE       = 'whole';

    
    const STYLE_STOP         = 'stop';
    const STYLE_WARNING      = 'warning';
    const STYLE_INFORMATION  = 'information';

    
    const OPERATOR_BETWEEN             = 'between';
    const OPERATOR_EQUAL               = 'equal';
    const OPERATOR_GREATERTHAN         = 'greaterThan';
    const OPERATOR_GREATERTHANOREQUAL  = 'greaterThanOrEqual';
    const OPERATOR_LESSTHAN            = 'lessThan';
    const OPERATOR_LESSTHANOREQUAL     = 'lessThanOrEqual';
    const OPERATOR_NOTBETWEEN          = 'notBetween';
    const OPERATOR_NOTEQUAL            = 'notEqual';

    
    private $Vfzbbsiftxwy;

    
    private $Vj1g1dwfp4cc;

    
    private $Vww1xbetouby = PHPExcel_Cell_DataValidation::TYPE_NONE;

    
    private $Vitttwf5vxac = PHPExcel_Cell_DataValidation::STYLE_STOP;

    
    private $V0v120vcwb1a;

    
    private $Vgzgn0yh3ag2;

    
    private $Veht4azq25aj;

    
    private $Vrkfnd3uwqqm;

    
    private $V2ejwy1eu23e;

    
    private $Vpkvj4ficaex;

    
    private $Vy0cngy32va2;

    
    private $Vwhadi0diazh;

    
    private $Vlnu2jikzih4;

    
    public function __construct()
    {
        
        $this->_formula1          = '';
        $this->_formula2          = '';
        $this->_type              = PHPExcel_Cell_DataValidation::TYPE_NONE;
        $this->_errorStyle        = PHPExcel_Cell_DataValidation::STYLE_STOP;
        $this->_operator          = '';
        $this->_allowBlank        = FALSE;
        $this->_showDropDown      = FALSE;
        $this->_showInputMessage  = FALSE;
        $this->_showErrorMessage  = FALSE;
        $this->_errorTitle        = '';
        $this->_error             = '';
        $this->_promptTitle       = '';
        $this->_prompt            = '';
    }

    
    public function getFormula1() {
        return $this->_formula1;
    }

    
    public function setFormula1($Vp4xjtpabm0l = '') {
        $this->_formula1 = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getFormula2() {
        return $this->_formula2;
    }

    
    public function setFormula2($Vp4xjtpabm0l = '') {
        $this->_formula2 = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getType() {
        return $this->_type;
    }

    
    public function setType($Vp4xjtpabm0l = PHPExcel_Cell_DataValidation::TYPE_NONE) {
        $this->_type = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getErrorStyle() {
        return $this->_errorStyle;
    }

    
    public function setErrorStyle($Vp4xjtpabm0l = PHPExcel_Cell_DataValidation::STYLE_STOP) {
        $this->_errorStyle = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getOperator() {
        return $this->_operator;
    }

    
    public function setOperator($Vp4xjtpabm0l = '') {
        $this->_operator = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getAllowBlank() {
        return $this->_allowBlank;
    }

    
    public function setAllowBlank($Vp4xjtpabm0l = false) {
        $this->_allowBlank = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getShowDropDown() {
        return $this->_showDropDown;
    }

    
    public function setShowDropDown($Vp4xjtpabm0l = false) {
        $this->_showDropDown = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getShowInputMessage() {
        return $this->_showInputMessage;
    }

    
    public function setShowInputMessage($Vp4xjtpabm0l = false) {
        $this->_showInputMessage = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getShowErrorMessage() {
        return $this->_showErrorMessage;
    }

    
    public function setShowErrorMessage($Vp4xjtpabm0l = false) {
        $this->_showErrorMessage = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getErrorTitle() {
        return $this->_errorTitle;
    }

    
    public function setErrorTitle($Vp4xjtpabm0l = '') {
        $this->_errorTitle = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getError() {
        return $this->_error;
    }

    
    public function setError($Vp4xjtpabm0l = '') {
        $this->_error = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getPromptTitle() {
        return $this->_promptTitle;
    }

    
    public function setPromptTitle($Vp4xjtpabm0l = '') {
        $this->_promptTitle = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getPrompt() {
        return $this->_prompt;
    }

    
    public function setPrompt($Vp4xjtpabm0l = '') {
        $this->_prompt = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getHashCode() {
        return md5(
              $this->_formula1
            . $this->_formula2
            . $this->_type = PHPExcel_Cell_DataValidation::TYPE_NONE
            . $this->_errorStyle = PHPExcel_Cell_DataValidation::STYLE_STOP
            . $this->_operator
            . ($this->_allowBlank ? 't' : 'f')
            . ($this->_showDropDown ? 't' : 'f')
            . ($this->_showInputMessage ? 't' : 'f')
            . ($this->_showErrorMessage ? 't' : 'f')
            . $this->_errorTitle
            . $this->_error
            . $this->_promptTitle
            . $this->_prompt
            . __CLASS__
        );
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
}
