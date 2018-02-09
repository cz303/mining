<?php




class PHPExcel_Style_Conditional implements PHPExcel_IComparable
{
	
	const CONDITION_NONE					= 'none';
	const CONDITION_CELLIS					= 'cellIs';
	const CONDITION_CONTAINSTEXT			= 'containsText';
	const CONDITION_EXPRESSION 				= 'expression';

	
	const OPERATOR_NONE						= '';
	const OPERATOR_BEGINSWITH				= 'beginsWith';
	const OPERATOR_ENDSWITH					= 'endsWith';
	const OPERATOR_EQUAL					= 'equal';
	const OPERATOR_GREATERTHAN				= 'greaterThan';
	const OPERATOR_GREATERTHANOREQUAL		= 'greaterThanOrEqual';
	const OPERATOR_LESSTHAN					= 'lessThan';
	const OPERATOR_LESSTHANOREQUAL			= 'lessThanOrEqual';
	const OPERATOR_NOTEQUAL					= 'notEqual';
	const OPERATOR_CONTAINSTEXT				= 'containsText';
	const OPERATOR_NOTCONTAINS				= 'notContains';
	const OPERATOR_BETWEEN					= 'between';

	
	private $V2ljmkwg0v5y;

	
	private $Vimnq3mgeyav;

	
	private $Vkbhl4g2thyo;

	
	private $Vkanlobxvq4w = array();

	
	private $Vrwil4krgfxl;

    
    public function __construct()
    {
    	
    	$this->_conditionType		= PHPExcel_Style_Conditional::CONDITION_NONE;
    	$this->_operatorType		= PHPExcel_Style_Conditional::OPERATOR_NONE;
    	$this->_text    			= null;
    	$this->_condition			= array();
    	$this->_style				= new PHPExcel_Style(FALSE, TRUE);
    }

    
    public function getConditionType() {
    	return $this->_conditionType;
    }

    
    public function setConditionType($Vqujkwol1zut = PHPExcel_Style_Conditional::CONDITION_NONE) {
    	$this->_conditionType = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOperatorType() {
    	return $this->_operatorType;
    }

    
    public function setOperatorType($Vqujkwol1zut = PHPExcel_Style_Conditional::OPERATOR_NONE) {
    	$this->_operatorType = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getText() {
        return $this->_text;
    }

    
    public function setText($Vp4xjtpabm0l = null) {
           $this->_text = $Vp4xjtpabm0l;
           return $this;
    }

    
    public function getCondition() {
    	if (isset($this->_condition[0])) {
    		return $this->_condition[0];
    	}

    	return '';
    }

    
    public function setCondition($Vqujkwol1zut = '') {
    	if (!is_array($Vqujkwol1zut))
    		$Vqujkwol1zut = array($Vqujkwol1zut);

    	return $this->setConditions($Vqujkwol1zut);
    }

    
    public function getConditions() {
    	return $this->_condition;
    }

    
    public function setConditions($Vqujkwol1zut) {
    	if (!is_array($Vqujkwol1zut))
    		$Vqujkwol1zut = array($Vqujkwol1zut);

    	$this->_condition = $Vqujkwol1zut;
    	return $this;
    }

    
    public function addCondition($Vqujkwol1zut = '') {
    	$this->_condition[] = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getStyle() {
    	return $this->_style;
    }

    
    public function setStyle(PHPExcel_Style $Vqujkwol1zut = null) {
   		$this->_style = $Vqujkwol1zut;
   		return $this;
    }

	
	public function getHashCode() {
    	return md5(
    		  $this->_conditionType
    		. $this->_operatorType
    		. implode(';', $this->_condition)
    		. $this->_style->getHashCode()
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
