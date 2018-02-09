<?php







class PHPExcel_Calculation_FormulaToken {
	
	const TOKEN_TYPE_NOOP					= 'Noop';
	const TOKEN_TYPE_OPERAND				= 'Operand';
	const TOKEN_TYPE_FUNCTION				= 'Function';
	const TOKEN_TYPE_SUBEXPRESSION			= 'Subexpression';
	const TOKEN_TYPE_ARGUMENT				= 'Argument';
	const TOKEN_TYPE_OPERATORPREFIX			= 'OperatorPrefix';
	const TOKEN_TYPE_OPERATORINFIX			= 'OperatorInfix';
	const TOKEN_TYPE_OPERATORPOSTFIX		= 'OperatorPostfix';
	const TOKEN_TYPE_WHITESPACE				= 'Whitespace';
	const TOKEN_TYPE_UNKNOWN				= 'Unknown';

	
	const TOKEN_SUBTYPE_NOTHING				= 'Nothing';
	const TOKEN_SUBTYPE_START				= 'Start';
	const TOKEN_SUBTYPE_STOP				= 'Stop';
	const TOKEN_SUBTYPE_TEXT				= 'Text';
	const TOKEN_SUBTYPE_NUMBER				= 'Number';
	const TOKEN_SUBTYPE_LOGICAL				= 'Logical';
	const TOKEN_SUBTYPE_ERROR				= 'Error';
	const TOKEN_SUBTYPE_RANGE				= 'Range';
	const TOKEN_SUBTYPE_MATH				= 'Math';
	const TOKEN_SUBTYPE_CONCATENATION		= 'Concatenation';
	const TOKEN_SUBTYPE_INTERSECTION		= 'Intersection';
	const TOKEN_SUBTYPE_UNION				= 'Union';

	
	private $Vcaslgtcnulz;

	
	private $Vf1s0m2fl0h0;

	
	private $Vlcuhmqseldb;

    
    public function __construct($Vqujkwol1zut, $Vdex41yzg3n3 = PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN, $Vut3bobn4eds = PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_NOTHING)
    {
    	
    	$this->_value				= $Vqujkwol1zut;
    	$this->_tokenType			= $Vdex41yzg3n3;
    	$this->_tokenSubType 		= $Vut3bobn4eds;
    }

    
    public function getValue() {
    	return $this->_value;
    }

    
    public function setValue($Vp4xjtpabm0l) {
    	$this->_value = $Vp4xjtpabm0l;
    }

    
    public function getTokenType() {
    	return $this->_tokenType;
    }

    
    public function setTokenType($Vp4xjtpabm0l = PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN) {
    	$this->_tokenType = $Vp4xjtpabm0l;
    }

    
    public function getTokenSubType() {
    	return $this->_tokenSubType;
    }

    
    public function setTokenSubType($Vp4xjtpabm0l = PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_NOTHING) {
    	$this->_tokenSubType = $Vp4xjtpabm0l;
    }
}
