<?php



if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Shared_JAMA_Matrix {


	const PolymorphicArgumentException	= "Invalid argument pattern for polymorphic function.";
	const ArgumentTypeException			= "Invalid argument type.";
	const ArgumentBoundsException		= "Invalid argument range.";
	const MatrixDimensionException		= "Matrix dimensions are not equal.";
	const ArrayLengthException			= "Array length must be a multiple of m.";

	
	public $Vk0c33a31nhe = array();

	
	private $Vt54vmttyjzc;

	
	private $Vmwwo1qnmepz;


	
	public function __construct() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				
				case 'array':
						$this->m = count($Vrukcxz5icxf[0]);
						$this->n = count($Vrukcxz5icxf[0][0]);
						$this->A = $Vrukcxz5icxf[0];
						break;
				
				case 'integer':
						$this->m = $Vrukcxz5icxf[0];
						$this->n = $Vrukcxz5icxf[0];
						$this->A = array_fill(0, $this->m, array_fill(0, $this->n, 0));
						break;
				
				case 'integer,integer':
						$this->m = $Vrukcxz5icxf[0];
						$this->n = $Vrukcxz5icxf[1];
						$this->A = array_fill(0, $this->m, array_fill(0, $this->n, 0));
						break;
				
				case 'array,integer':
						$this->m = $Vrukcxz5icxf[1];
						if ($this->m != 0) {
							$this->n = count($Vrukcxz5icxf[0]) / $this->m;
						} else {
							$this->n = 0;
						}
						if (($this->m * $this->n) == count($Vrukcxz5icxf[0])) {
							for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
								for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
									$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Vrukcxz5icxf[0][$Vfhiq1lhsoja + $Vzmnqyqjjodw * $this->m];
								}
							}
						} else {
							throw new PHPExcel_Calculation_Exception(self::ArrayLengthException);
						}
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function getArray() {
		return $this->A;
	}	


	
	public function getRowDimension() {
		return $this->m;
	}	


	
	public function getColumnDimension() {
		return $this->n;
	}	


	
	public function get($Vfhiq1lhsoja = null, $Vzmnqyqjjodw = null) {
		return $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
	}	


	
	public function getMatrix() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				
				case 'integer,integer':
						list($Vfhiq1lhsoja0, $Vzmnqyqjjodw0) = $Vrukcxz5icxf;
						if ($Vfhiq1lhsoja0 >= 0) { $Vt54vmttyjzc = $this->m - $Vfhiq1lhsoja0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if ($Vzmnqyqjjodw0 >= 0) { $Vmwwo1qnmepz = $this->n - $Vzmnqyqjjodw0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz);
						for($Vfhiq1lhsoja = $Vfhiq1lhsoja0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = $Vzmnqyqjjodw0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				
				case 'integer,integer,integer,integer':
						list($Vfhiq1lhsoja0, $Vfhiq1lhsojaF, $Vzmnqyqjjodw0, $VzmnqyqjjodwF) = $Vrukcxz5icxf;
						if (($Vfhiq1lhsojaF > $Vfhiq1lhsoja0) && ($this->m >= $Vfhiq1lhsojaF) && ($Vfhiq1lhsoja0 >= 0)) { $Vt54vmttyjzc = $Vfhiq1lhsojaF - $Vfhiq1lhsoja0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if (($VzmnqyqjjodwF > $Vzmnqyqjjodw0) && ($this->n >= $VzmnqyqjjodwF) && ($Vzmnqyqjjodw0 >= 0)) { $Vmwwo1qnmepz = $VzmnqyqjjodwF - $Vzmnqyqjjodw0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc+1, $Vmwwo1qnmepz+1);
						for($Vfhiq1lhsoja = $Vfhiq1lhsoja0; $Vfhiq1lhsoja <= $Vfhiq1lhsojaF; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = $Vzmnqyqjjodw0; $Vzmnqyqjjodw <= $VzmnqyqjjodwF; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja - $Vfhiq1lhsoja0, $Vzmnqyqjjodw - $Vzmnqyqjjodw0, $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				
				case 'array,array':
						list($Vwulsk14oxlpL, $Vihsiaijumtu) = $Vrukcxz5icxf;
						if (count($Vwulsk14oxlpL) > 0) { $Vt54vmttyjzc = count($Vwulsk14oxlpL); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if (count($Vihsiaijumtu) > 0) { $Vmwwo1qnmepz = count($Vihsiaijumtu); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vt54vmttyjzc; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepz; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja - $Vfhiq1lhsoja0, $Vzmnqyqjjodw - $Vzmnqyqjjodw0, $this->A[$Vwulsk14oxlpL[$Vfhiq1lhsoja]][$Vihsiaijumtu[$Vzmnqyqjjodw]]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				
				case 'array,array':
						list($Vwulsk14oxlpL, $Vihsiaijumtu) = $Vrukcxz5icxf;
						if (count($Vwulsk14oxlpL) > 0) { $Vt54vmttyjzc = count($Vwulsk14oxlpL); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if (count($Vihsiaijumtu) > 0) { $Vmwwo1qnmepz = count($Vihsiaijumtu); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vt54vmttyjzc; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepz; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $this->A[$Vwulsk14oxlpL[$Vfhiq1lhsoja]][$Vihsiaijumtu[$Vzmnqyqjjodw]]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				
				case 'integer,integer,array':
						list($Vfhiq1lhsoja0, $Vfhiq1lhsojaF, $Vihsiaijumtu) = $Vrukcxz5icxf;
						if (($Vfhiq1lhsojaF > $Vfhiq1lhsoja0) && ($this->m >= $Vfhiq1lhsojaF) && ($Vfhiq1lhsoja0 >= 0)) { $Vt54vmttyjzc = $Vfhiq1lhsojaF - $Vfhiq1lhsoja0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if (count($Vihsiaijumtu) > 0) { $Vmwwo1qnmepz = count($Vihsiaijumtu); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz);
						for($Vfhiq1lhsoja = $Vfhiq1lhsoja0; $Vfhiq1lhsoja < $Vfhiq1lhsojaF; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepz; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja - $Vfhiq1lhsoja0, $Vzmnqyqjjodw, $this->A[$Vwulsk14oxlpL[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				
				case 'array,integer,integer':
						list($Vwulsk14oxlpL, $Vzmnqyqjjodw0, $VzmnqyqjjodwF) = $Vrukcxz5icxf;
						if (count($Vwulsk14oxlpL) > 0) { $Vt54vmttyjzc = count($Vwulsk14oxlpL); } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						if (($VzmnqyqjjodwF >= $Vzmnqyqjjodw0) && ($this->n >= $VzmnqyqjjodwF) && ($Vzmnqyqjjodw0 >= 0)) { $Vmwwo1qnmepz = $VzmnqyqjjodwF - $Vzmnqyqjjodw0; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentBoundsException); }
						$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz+1);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vt54vmttyjzc; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = $Vzmnqyqjjodw0; $Vzmnqyqjjodw <= $VzmnqyqjjodwF; ++$Vzmnqyqjjodw) {
								$Vwulsk14oxlp->set($Vfhiq1lhsoja, $Vzmnqyqjjodw - $Vzmnqyqjjodw0, $this->A[$Vwulsk14oxlpL[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]);
							}
						}
						return $Vwulsk14oxlp;
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function checkMatrixDimensions($Vjd52v1uhh5z = null) {
		if ($Vjd52v1uhh5z instanceof PHPExcel_Shared_JAMA_Matrix) {
			if (($this->m == $Vjd52v1uhh5z->getRowDimension()) && ($this->n == $Vjd52v1uhh5z->getColumnDimension())) {
				return true;
			} else {
				throw new PHPExcel_Calculation_Exception(self::MatrixDimensionException);
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException);
		}
	}	



	
	public function set($Vfhiq1lhsoja = null, $Vzmnqyqjjodw = null, $V4y0urwpnd3j = null) {
		
		$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V4y0urwpnd3j;
	}	


	
	public function identity($Vt54vmttyjzc = null, $Vmwwo1qnmepz = null) {
		return $this->diagonal($Vt54vmttyjzc, $Vmwwo1qnmepz, 1);
	}	


	
	public function diagonal($Vt54vmttyjzc = null, $Vmwwo1qnmepz = null, $V4y0urwpnd3j = 1) {
		$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($Vt54vmttyjzc, $Vmwwo1qnmepz);
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vt54vmttyjzc; ++$Vfhiq1lhsoja) {
			$Vwulsk14oxlp->set($Vfhiq1lhsoja, $Vfhiq1lhsoja, $V4y0urwpnd3j);
		}
		return $Vwulsk14oxlp;
	}	


	
	public function getMatrixByRow($Vfhiq1lhsoja0 = null, $Vfhiq1lhsojaF = null) {
		if (is_int($Vfhiq1lhsoja0)) {
			if (is_int($Vfhiq1lhsojaF)) {
				return $this->getMatrix($Vfhiq1lhsoja0, 0, $Vfhiq1lhsojaF + 1, $this->n);
			} else {
				return $this->getMatrix($Vfhiq1lhsoja0, 0, $Vfhiq1lhsoja0 + 1, $this->n);
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException);
		}
	}	


	
	public function getMatrixByCol($Vzmnqyqjjodw0 = null, $VzmnqyqjjodwF = null) {
		if (is_int($Vzmnqyqjjodw0)) {
			if (is_int($VzmnqyqjjodwF)) {
				return $this->getMatrix(0, $Vzmnqyqjjodw0, $this->m, $VzmnqyqjjodwF + 1);
			} else {
				return $this->getMatrix(0, $Vzmnqyqjjodw0, $this->m, $Vzmnqyqjjodw0 + 1);
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException);
		}
	}	


	
	public function transpose() {
		$Vwulsk14oxlp = new PHPExcel_Shared_JAMA_Matrix($this->n, $this->m);
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
			for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
				$Vwulsk14oxlp->set($Vzmnqyqjjodw, $Vfhiq1lhsoja, $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
			}
		}
		return $Vwulsk14oxlp;
	}	


	
	public function trace() {
		$V2n430jknk35 = 0;
		$Vmwwo1qnmepz = min($this->m, $this->n);
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepz; ++$Vfhiq1lhsoja) {
			$V2n430jknk35 += $this->A[$Vfhiq1lhsoja][$Vfhiq1lhsoja];
		}
		return $V2n430jknk35;
	}	


	
	public function uminus() {
	}	


	
	public function plus() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw) + $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function plusEquals() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$V2hwk0yykrmp = True;
					$Vp4xjtpabm0l = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
					if ((is_string($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) && (strlen($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]) > 0) && (!is_numeric($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]))) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
					if ((is_string($Vp4xjtpabm0l)) && (strlen($Vp4xjtpabm0l) > 0) && (!is_numeric($Vp4xjtpabm0l))) {
						$Vp4xjtpabm0l = trim($Vp4xjtpabm0l,'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($Vp4xjtpabm0l);
					}
					if ($V2hwk0yykrmp) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Vp4xjtpabm0l;
					} else {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = PHPExcel_Calculation_Functions::NaN();
					}
				}
			}
			return $this;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function minus() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw) - $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function minusEquals() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$V2hwk0yykrmp = True;
					$Vp4xjtpabm0l = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
					if ((is_string($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) && (strlen($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]) > 0) && (!is_numeric($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]))) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
					if ((is_string($Vp4xjtpabm0l)) && (strlen($Vp4xjtpabm0l) > 0) && (!is_numeric($Vp4xjtpabm0l))) {
						$Vp4xjtpabm0l = trim($Vp4xjtpabm0l,'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($Vp4xjtpabm0l);
					}
					if ($V2hwk0yykrmp) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vp4xjtpabm0l;
					} else {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = PHPExcel_Calculation_Functions::NaN();
					}
				}
			}
			return $this;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayTimes() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw) * $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayTimesEquals() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$V2hwk0yykrmp = True;
					$Vp4xjtpabm0l = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
					if ((is_string($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) && (strlen($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]) > 0) && (!is_numeric($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]))) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
					if ((is_string($Vp4xjtpabm0l)) && (strlen($Vp4xjtpabm0l) > 0) && (!is_numeric($Vp4xjtpabm0l))) {
						$Vp4xjtpabm0l = trim($Vp4xjtpabm0l,'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($Vp4xjtpabm0l);
					}
					if ($V2hwk0yykrmp) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] *= $Vp4xjtpabm0l;
					} else {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = PHPExcel_Calculation_Functions::NaN();
					}
				}
			}
			return $this;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayRightDivide() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$V2hwk0yykrmp = True;
					$Vp4xjtpabm0l = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
					if ((is_string($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) && (strlen($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]) > 0) && (!is_numeric($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]))) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
					if ((is_string($Vp4xjtpabm0l)) && (strlen($Vp4xjtpabm0l) > 0) && (!is_numeric($Vp4xjtpabm0l))) {
						$Vp4xjtpabm0l = trim($Vp4xjtpabm0l,'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($Vp4xjtpabm0l);
					}
					if ($V2hwk0yykrmp) {
						if ($Vp4xjtpabm0l == 0) {
							
							$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, '#DIV/0!');
						} else {
							$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] / $Vp4xjtpabm0l);
						}
					} else {
						$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, PHPExcel_Calculation_Functions::NaN());
					}
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayRightDivideEquals() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] / $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayLeftDivide() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$Vy5lgrs0ubk0->set($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw) / $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function arrayLeftDivideEquals() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw) / $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				}
			}
			return $Vy5lgrs0ubk0;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function times() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf  = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vjd52v1uhh5z = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						if ($this->n == $Vjd52v1uhh5z->m) {
							$Vhsnkwwx3zv4 = new PHPExcel_Shared_JAMA_Matrix($this->m, $Vjd52v1uhh5z->n);
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vjd52v1uhh5z->n; ++$Vzmnqyqjjodw) {
								for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $this->n; ++$V51lf1kcbto4) {
									$Vjd52v1uhh5zcolj[$V51lf1kcbto4] = $Vjd52v1uhh5z->A[$V51lf1kcbto4][$Vzmnqyqjjodw];
								}
								for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
									$Vk0c33a31nherowi = $this->A[$Vfhiq1lhsoja];
									$V2n430jknk35 = 0;
									for($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $this->n; ++$V51lf1kcbto4) {
										$V2n430jknk35 += $Vk0c33a31nherowi[$V51lf1kcbto4] * $Vjd52v1uhh5zcolj[$V51lf1kcbto4];
									}
									$Vhsnkwwx3zv4->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V2n430jknk35;
								}
							}
							return $Vhsnkwwx3zv4;
						} else {
							throw new PHPExcel_Calculation_Exception(JAMAError(MatrixDimensionMismatch));
						}
						break;
				case 'array':
						$Vjd52v1uhh5z = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						if ($this->n == $Vjd52v1uhh5z->m) {
							$Vhsnkwwx3zv4 = new PHPExcel_Shared_JAMA_Matrix($this->m, $Vjd52v1uhh5z->n);
							for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhsnkwwx3zv4->m; ++$Vfhiq1lhsoja) {
								for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vhsnkwwx3zv4->n; ++$Vzmnqyqjjodw) {
									$V2n430jknk35 = "0";
									for($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Vhsnkwwx3zv4->n; ++$V51lf1kcbto4) {
										$V2n430jknk35 += $this->A[$Vfhiq1lhsoja][$V51lf1kcbto4] * $Vjd52v1uhh5z->A[$V51lf1kcbto4][$Vzmnqyqjjodw];
									}
									$Vhsnkwwx3zv4->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V2n430jknk35;
								}
							}
							return $Vhsnkwwx3zv4;
						} else {
							throw new PHPExcel_Calculation_Exception(JAMAError(MatrixDimensionMismatch));
						}
						return $Vy5lgrs0ubk0;
						break;
				case 'integer':
						$Vhsnkwwx3zv4 = new PHPExcel_Shared_JAMA_Matrix($this->A);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhsnkwwx3zv4->m; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vhsnkwwx3zv4->n; ++$Vzmnqyqjjodw) {
								$Vhsnkwwx3zv4->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] *= $Vrukcxz5icxf[0];
							}
						}
						return $Vhsnkwwx3zv4;
						break;
				case 'double':
						$Vhsnkwwx3zv4 = new PHPExcel_Shared_JAMA_Matrix($this->m, $this->n);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhsnkwwx3zv4->m; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vhsnkwwx3zv4->n; ++$Vzmnqyqjjodw) {
								$Vhsnkwwx3zv4->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Vrukcxz5icxf[0] * $this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
							}
						}
						return $Vhsnkwwx3zv4;
						break;
				case 'float':
						$Vhsnkwwx3zv4 = new PHPExcel_Shared_JAMA_Matrix($this->A);
						for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhsnkwwx3zv4->m; ++$Vfhiq1lhsoja) {
							for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vhsnkwwx3zv4->n; ++$Vzmnqyqjjodw) {
								$Vhsnkwwx3zv4->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] *= $Vrukcxz5icxf[0];
							}
						}
						return $Vhsnkwwx3zv4;
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function power() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
						break;
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$V2hwk0yykrmp = True;
					$Vp4xjtpabm0l = $Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw);
					if ((is_string($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) && (strlen($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]) > 0) && (!is_numeric($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]))) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
					if ((is_string($Vp4xjtpabm0l)) && (strlen($Vp4xjtpabm0l) > 0) && (!is_numeric($Vp4xjtpabm0l))) {
						$Vp4xjtpabm0l = trim($Vp4xjtpabm0l,'"');
						$V2hwk0yykrmp &= PHPExcel_Shared_String::convertToNumberIfFraction($Vp4xjtpabm0l);
					}
					if ($V2hwk0yykrmp) {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = pow($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],$Vp4xjtpabm0l);
					} else {
						$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = PHPExcel_Calculation_Functions::NaN();
					}
				}
			}
			return $this;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function concat() {
		if (func_num_args() > 0) {
			$Vrukcxz5icxf = func_get_args();
			$Vt54vmttyjzcatch = implode(",", array_map('gettype', $Vrukcxz5icxf));

			switch($Vt54vmttyjzcatch) {
				case 'object':
						if ($Vrukcxz5icxf[0] instanceof PHPExcel_Shared_JAMA_Matrix) { $Vy5lgrs0ubk0 = $Vrukcxz5icxf[0]; } else { throw new PHPExcel_Calculation_Exception(self::ArgumentTypeException); }
				case 'array':
						$Vy5lgrs0ubk0 = new PHPExcel_Shared_JAMA_Matrix($Vrukcxz5icxf[0]);
						break;
				default:
						throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
						break;
			}
			$this->checkMatrixDimensions($Vy5lgrs0ubk0);
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
					$this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = trim($this->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw],'"').trim($Vy5lgrs0ubk0->get($Vfhiq1lhsoja, $Vzmnqyqjjodw),'"');
				}
			}
			return $this;
		} else {
			throw new PHPExcel_Calculation_Exception(self::PolymorphicArgumentException);
		}
	}	


	
	public function solve($Vjd52v1uhh5z) {
		if ($this->m == $this->n) {
			$Vu3jf2p4l5qp = new PHPExcel_Shared_JAMA_LUDecomposition($this);
			return $Vu3jf2p4l5qp->solve($Vjd52v1uhh5z);
		} else {
			$Veoe3hwmrata = new QRDecomposition($this);
			return $Veoe3hwmrata->solve($Vjd52v1uhh5z);
		}
	}	


	
	public function inverse() {
		return $this->solve($this->identity($this->m, $this->m));
	}	


	
	public function det() {
		$Vycem1mprouj = new PHPExcel_Shared_JAMA_LUDecomposition($this);
		return $Vycem1mprouj->det();
	}	


}	
