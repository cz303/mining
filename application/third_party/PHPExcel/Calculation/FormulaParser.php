<?php






class PHPExcel_Calculation_FormulaParser {
	
	const QUOTE_DOUBLE  = '"';
	const QUOTE_SINGLE  = '\'';
	const BRACKET_CLOSE = ']';
	const BRACKET_OPEN  = '[';
	const BRACE_OPEN    = '{';
	const BRACE_CLOSE   = '}';
	const PAREN_OPEN    = '(';
	const PAREN_CLOSE   = ')';
	const SEMICOLON     = ';';
	const WHITESPACE    = ' ';
	const COMMA         = ',';
	const ERROR_START   = '#';

	const OPERATORS_SN 			= "+-";
	const OPERATORS_INFIX 		= "+-*/^&=><";
	const OPERATORS_POSTFIX 	= "%";

	
	private $Vf0fjy5xstpj;

	
	private $Vaoilvjhr3i5 = array();

    
    public function __construct($Vlzu0tioadk4 = '')
    {
    	
    	if (is_null($Vlzu0tioadk4)) {
    		throw new PHPExcel_Calculation_Exception("Invalid parameter passed: formula");
    	}

    	
    	$this->_formula = trim($Vlzu0tioadk4);
    	
    	$this->_parseToTokens();
    }

    
    public function getFormula() {
    	return $this->_formula;
    }

    
    public function getToken($Vswpqsh0dje0 = 0) {
    	if (isset($this->_tokens[$Vswpqsh0dje0])) {
    		return $this->_tokens[$Vswpqsh0dje0];
    	} else {
    		throw new PHPExcel_Calculation_Exception("Token with id $Vswpqsh0dje0 does not exist.");
    	}
    }

    
    public function getTokenCount() {
    	return count($this->_tokens);
    }

    
    public function getTokens() {
    	return $this->_tokens;
    }

    
    private function _parseToTokens() {
		
		

		
		$Vhxknn55kltp = strlen($this->_formula);
		if ($Vhxknn55kltp < 2 || $this->_formula{0} != '=') return;

		
		$Vodkk2wd50j5	= $V4rpurwy52eo 	= $Vltejvmdssgs = array();
		$Vz1q3qv1q2sl	= $Vukbhavnlcec 	= $V54exufxaosf 	= $Vklvqxjvafuo = false;
		$Vmrycxs3rwag		= $Vscy1s2dpx2m	= $Vs4lyegprlly	= null;

		$Vx5qfylfb01c	= 1;
		$Vp4xjtpabm0l	= '';

		$Vdltzdytdef0 			= array("#NULL!", "#DIV/0!", "#VALUE!", "#REF!", "#NAME?", "#NUM!", "#N/A");
		$Vrd2on1hsmqc 	= array(">=", "<=", "<>");

		while ($Vx5qfylfb01c < $Vhxknn55kltp) {
			

			
			
			
			if ($Vz1q3qv1q2sl) {
				if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::QUOTE_DOUBLE) {
					if ((($Vx5qfylfb01c + 2) <= $Vhxknn55kltp) && ($this->_formula{$Vx5qfylfb01c + 1} == PHPExcel_Calculation_FormulaParser::QUOTE_DOUBLE)) {
						$Vp4xjtpabm0l .= PHPExcel_Calculation_FormulaParser::QUOTE_DOUBLE;
						++$Vx5qfylfb01c;
					} else {
						$Vz1q3qv1q2sl = false;
						$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_TEXT);
						$Vp4xjtpabm0l = "";
					}
				} else {
					$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
				}
				++$Vx5qfylfb01c;
				continue;
			}

			
			
			
			if ($Vukbhavnlcec) {
				if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::QUOTE_SINGLE) {
					if ((($Vx5qfylfb01c + 2) <= $Vhxknn55kltp) && ($this->_formula{$Vx5qfylfb01c + 1} == PHPExcel_Calculation_FormulaParser::QUOTE_SINGLE)) {
						$Vp4xjtpabm0l .= PHPExcel_Calculation_FormulaParser::QUOTE_SINGLE;
						++$Vx5qfylfb01c;
					} else {
						$Vukbhavnlcec = false;
					}
				} else {
					$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
				}
				++$Vx5qfylfb01c;
				continue;
			}

			
			
			
			if ($V54exufxaosf) {
				if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::BRACKET_CLOSE) {
					$V54exufxaosf = false;
				}
				$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
				++$Vx5qfylfb01c;
				continue;
			}

			
			
			if ($Vklvqxjvafuo) {
				$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
				++$Vx5qfylfb01c;
				if (in_array($Vp4xjtpabm0l, $Vdltzdytdef0)) {
					$Vklvqxjvafuo = false;
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_ERROR);
					$Vp4xjtpabm0l = "";
				}
				continue;
			}

			
			if (strpos(PHPExcel_Calculation_FormulaParser::OPERATORS_SN, $this->_formula{$Vx5qfylfb01c}) !== false) {
				if (strlen($Vp4xjtpabm0l) > 1) {
					if (preg_match("/^[1-9]{1}(\.[0-9]+)?E{1}$/", $this->_formula{$Vx5qfylfb01c}) != 0) {
						$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
						++$Vx5qfylfb01c;
						continue;
					}
				}
			}

			

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::QUOTE_DOUBLE) {
				if (strlen($Vp4xjtpabm0l > 0)) {  
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN);
					$Vp4xjtpabm0l = "";
				}
				$Vz1q3qv1q2sl = true;
				++$Vx5qfylfb01c;
				continue;
 			}

			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::QUOTE_SINGLE) {
				if (strlen($Vp4xjtpabm0l) > 0) { 
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN);
					$Vp4xjtpabm0l = "";
				}
				$Vukbhavnlcec = true;
				++$Vx5qfylfb01c;
				continue;
			}

			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::BRACKET_OPEN) {
				$V54exufxaosf = true;
				$Vp4xjtpabm0l .= PHPExcel_Calculation_FormulaParser::BRACKET_OPEN;
				++$Vx5qfylfb01c;
				continue;
			}

			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::ERROR_START) {
				if (strlen($Vp4xjtpabm0l) > 0) { 
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN);
					$Vp4xjtpabm0l = "";
				}
				$Vklvqxjvafuo = true;
				$Vp4xjtpabm0l .= PHPExcel_Calculation_FormulaParser::ERROR_START;
				++$Vx5qfylfb01c;
				continue;
			}

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::BRACE_OPEN) {
				if (strlen($Vp4xjtpabm0l) > 0) { 
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_UNKNOWN);
					$Vp4xjtpabm0l = "";
				}

				$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken("ARRAY", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;
				$Vltejvmdssgs[] = clone $Vdln1z2oxpjs;

				$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken("ARRAYROW", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;
				$Vltejvmdssgs[] = clone $Vdln1z2oxpjs;

				++$Vx5qfylfb01c;
				continue;
			}

			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::SEMICOLON) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}

				$Vdln1z2oxpjs = array_pop($Vltejvmdssgs);
				$Vdln1z2oxpjs->setValue("");
				$Vdln1z2oxpjs->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;

				$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken(",", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_ARGUMENT);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;

				$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken("ARRAYROW", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;
				$Vltejvmdssgs[] = clone $Vdln1z2oxpjs;

				++$Vx5qfylfb01c;
				continue;
			}

			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::BRACE_CLOSE) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}

				$Vdln1z2oxpjs = array_pop($Vltejvmdssgs);
				$Vdln1z2oxpjs->setValue("");
				$Vdln1z2oxpjs->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;

				$Vdln1z2oxpjs = array_pop($Vltejvmdssgs);
				$Vdln1z2oxpjs->setValue("");
				$Vdln1z2oxpjs->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;

				++$Vx5qfylfb01c;
				continue;
			}

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::WHITESPACE) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}
				$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken("", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_WHITESPACE);
				++$Vx5qfylfb01c;
				while (($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::WHITESPACE) && ($Vx5qfylfb01c < $Vhxknn55kltp)) {
					++$Vx5qfylfb01c;
				}
				continue;
			}

			
			if (($Vx5qfylfb01c + 2) <= $Vhxknn55kltp) {
				if (in_array(substr($this->_formula, $Vx5qfylfb01c, 2), $Vrd2on1hsmqc)) {
					if (strlen($Vp4xjtpabm0l) > 0) {
						$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
						$Vp4xjtpabm0l = "";
					}
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken(substr($this->_formula, $Vx5qfylfb01c, 2), PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_LOGICAL);
					$Vx5qfylfb01c += 2;
					continue;
				}
			}

			
			if (strpos(PHPExcel_Calculation_FormulaParser::OPERATORS_INFIX, $this->_formula{$Vx5qfylfb01c}) !== false) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] =new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}
				$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($this->_formula{$Vx5qfylfb01c}, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX);
				++$Vx5qfylfb01c;
				continue;
			}

			
			if (strpos(PHPExcel_Calculation_FormulaParser::OPERATORS_POSTFIX, $this->_formula{$Vx5qfylfb01c}) !== false) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}
				$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($this->_formula{$Vx5qfylfb01c}, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORPOSTFIX);
				++$Vx5qfylfb01c;
				continue;
			}

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::PAREN_OPEN) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START);
					$Vodkk2wd50j5[] = $Vdln1z2oxpjs;
					$Vltejvmdssgs[] = clone $Vdln1z2oxpjs;
					$Vp4xjtpabm0l = "";
				} else {
					$Vdln1z2oxpjs = new PHPExcel_Calculation_FormulaToken("", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_SUBEXPRESSION, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START);
					$Vodkk2wd50j5[] = $Vdln1z2oxpjs;
					$Vltejvmdssgs[] = clone $Vdln1z2oxpjs;
				}
				++$Vx5qfylfb01c;
				continue;
			}

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::COMMA) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}

				$Vdln1z2oxpjs = array_pop($Vltejvmdssgs);
				$Vdln1z2oxpjs->setValue("");
				$Vdln1z2oxpjs->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP);
				$Vltejvmdssgs[] = $Vdln1z2oxpjs;

				if ($Vdln1z2oxpjs->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken(",", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_UNION);
				} else {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken(",", PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_ARGUMENT);
				}
				++$Vx5qfylfb01c;
				continue;
			}

			
			if ($this->_formula{$Vx5qfylfb01c} == PHPExcel_Calculation_FormulaParser::PAREN_CLOSE) {
				if (strlen($Vp4xjtpabm0l) > 0) {
					$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
					$Vp4xjtpabm0l = "";
				}

				$Vdln1z2oxpjs = array_pop($Vltejvmdssgs);
				$Vdln1z2oxpjs->setValue("");
				$Vdln1z2oxpjs->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP);
				$Vodkk2wd50j5[] = $Vdln1z2oxpjs;

				++$Vx5qfylfb01c;
				continue;
			}

        	
			$Vp4xjtpabm0l .= $this->_formula{$Vx5qfylfb01c};
			++$Vx5qfylfb01c;
		}

		
		if (strlen($Vp4xjtpabm0l) > 0) {
			$Vodkk2wd50j5[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND);
		}

		
		$Vmrycxs3rwagCount = count($Vodkk2wd50j5);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmrycxs3rwagCount; ++$Vfhiq1lhsoja) {
			$Vmrycxs3rwag = $Vodkk2wd50j5[$Vfhiq1lhsoja];
			if (isset($Vodkk2wd50j5[$Vfhiq1lhsoja - 1])) {
				$Vscy1s2dpx2m = $Vodkk2wd50j5[$Vfhiq1lhsoja - 1];
			} else {
				$Vscy1s2dpx2m = null;
			}
			if (isset($Vodkk2wd50j5[$Vfhiq1lhsoja + 1])) {
				$Vs4lyegprlly = $Vodkk2wd50j5[$Vfhiq1lhsoja + 1];
			} else {
				$Vs4lyegprlly = null;
			}

			if (is_null($Vmrycxs3rwag)) {
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() != PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_WHITESPACE) {
				$V4rpurwy52eo[] = $Vmrycxs3rwag;
				continue;
			}

			if (is_null($Vscy1s2dpx2m)) {
				continue;
			}

			if (! (
					(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
					(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_SUBEXPRESSION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
					($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND)
				  ) ) {
				continue;
			}

			if (is_null($Vs4lyegprlly)) {
				continue;
			}

			if (! (
					(($Vs4lyegprlly->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) && ($Vs4lyegprlly->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START)) ||
					(($Vs4lyegprlly->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_SUBEXPRESSION) && ($Vs4lyegprlly->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_START)) ||
					($Vs4lyegprlly->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND)
				  ) ) {
				continue;
			}

			$V4rpurwy52eo[] = new PHPExcel_Calculation_FormulaToken($Vp4xjtpabm0l, PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX, PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_INTERSECTION);
		}

		
		
		$this->_tokens = array();

		$Vmrycxs3rwagCount = count($V4rpurwy52eo);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmrycxs3rwagCount; ++$Vfhiq1lhsoja) {
			$Vmrycxs3rwag = $V4rpurwy52eo[$Vfhiq1lhsoja];
			if (isset($V4rpurwy52eo[$Vfhiq1lhsoja - 1])) {
				$Vscy1s2dpx2m = $V4rpurwy52eo[$Vfhiq1lhsoja - 1];
			} else {
				$Vscy1s2dpx2m = null;
			}
			if (isset($V4rpurwy52eo[$Vfhiq1lhsoja + 1])) {
				$Vs4lyegprlly = $V4rpurwy52eo[$Vfhiq1lhsoja + 1];
			} else {
				$Vs4lyegprlly = null;
			}

			if (is_null($Vmrycxs3rwag)) {
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX && $Vmrycxs3rwag->getValue() == "-") {
				if ($Vfhiq1lhsoja == 0) {
					$Vmrycxs3rwag->setTokenType(PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORPREFIX);
				} else if (
							(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
							(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_SUBEXPRESSION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
							($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORPOSTFIX) ||
							($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND)
						) {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_MATH);
				} else {
					$Vmrycxs3rwag->setTokenType(PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORPREFIX);
				}

				$this->_tokens[] = $Vmrycxs3rwag;
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX && $Vmrycxs3rwag->getValue() == "+") {
				if ($Vfhiq1lhsoja == 0) {
					continue;
				} else if (
							(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
							(($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_SUBEXPRESSION) && ($Vscy1s2dpx2m->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_STOP)) ||
							($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORPOSTFIX) ||
							($Vscy1s2dpx2m->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND)
						) {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_MATH);
				} else {
					continue;
				}

				$this->_tokens[] = $Vmrycxs3rwag;
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERATORINFIX && $Vmrycxs3rwag->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_NOTHING) {
				if (strpos("<>=", substr($Vmrycxs3rwag->getValue(), 0, 1)) !== false) {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_LOGICAL);
				} else if ($Vmrycxs3rwag->getValue() == "&") {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_CONCATENATION);
				} else {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_MATH);
				}

				$this->_tokens[] = $Vmrycxs3rwag;
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_OPERAND && $Vmrycxs3rwag->getTokenSubType() == PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_NOTHING) {
				if (!is_numeric($Vmrycxs3rwag->getValue())) {
					if (strtoupper($Vmrycxs3rwag->getValue()) == "TRUE" || strtoupper($Vmrycxs3rwag->getValue() == "FALSE")) {
						$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_LOGICAL);
					} else {
						$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_RANGE);
					}
				} else {
					$Vmrycxs3rwag->setTokenSubType(PHPExcel_Calculation_FormulaToken::TOKEN_SUBTYPE_NUMBER);
				}

				$this->_tokens[] = $Vmrycxs3rwag;
				continue;
			}

			if ($Vmrycxs3rwag->getTokenType() == PHPExcel_Calculation_FormulaToken::TOKEN_TYPE_FUNCTION) {
				if (strlen($Vmrycxs3rwag->getValue() > 0)) {
					if (substr($Vmrycxs3rwag->getValue(), 0, 1) == "@") {
						$Vmrycxs3rwag->setValue(substr($Vmrycxs3rwag->getValue(), 1));
					}
				}
			}

        	$this->_tokens[] = $Vmrycxs3rwag;
		}
    }
}
