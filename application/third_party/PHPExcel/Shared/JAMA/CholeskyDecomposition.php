<?php

class CholeskyDecomposition {

	
	private $Vycem1mprouj = array();

	
	private $Vt54vmttyjzc;

	
	private $Vvhcaqvbcbvl = true;


	
	public function __construct($Vk0c33a31nhe = null) {
		if ($Vk0c33a31nhe instanceof Matrix) {
			$this->L = $Vk0c33a31nhe->getArray();
			$this->m = $Vk0c33a31nhe->getRowDimension();

			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				for($Vzmnqyqjjodw = $Vfhiq1lhsoja; $Vzmnqyqjjodw < $this->m; ++$Vzmnqyqjjodw) {
					for($Vvbwz1pamc2b = $this->L[$Vfhiq1lhsoja][$Vzmnqyqjjodw], $V51lf1kcbto4 = $Vfhiq1lhsoja - 1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
						$Vvbwz1pamc2b -= $this->L[$Vfhiq1lhsoja][$V51lf1kcbto4] * $this->L[$Vzmnqyqjjodw][$V51lf1kcbto4];
					}
					if ($Vfhiq1lhsoja == $Vzmnqyqjjodw) {
						if ($Vvbwz1pamc2b >= 0) {
							$this->L[$Vfhiq1lhsoja][$Vfhiq1lhsoja] = sqrt($Vvbwz1pamc2b);
						} else {
							$this->isspd = false;
						}
					} else {
						if ($this->L[$Vfhiq1lhsoja][$Vfhiq1lhsoja] != 0) {
							$this->L[$Vzmnqyqjjodw][$Vfhiq1lhsoja] = $Vvbwz1pamc2b / $this->L[$Vfhiq1lhsoja][$Vfhiq1lhsoja];
						}
					}
				}

				for ($V51lf1kcbto4 = $Vfhiq1lhsoja+1; $V51lf1kcbto4 < $this->m; ++$V51lf1kcbto4) {
					$this->L[$Vfhiq1lhsoja][$V51lf1kcbto4] = 0.0;
				}
			}
		} else {
			throw new PHPExcel_Calculation_Exception(JAMAError(ArgumentTypeException));
		}
	}	


	
	public function isSPD() {
		return $this->isspd;
	}	


	
	public function getL() {
		return new Matrix($this->L);
	}	


	
	public function solve($Vjd52v1uhh5z = null) {
		if ($Vjd52v1uhh5z instanceof Matrix) {
			if ($Vjd52v1uhh5z->getRowDimension() == $this->m) {
				if ($this->isspd) {
					$Vwkudxicgm1v  = $Vjd52v1uhh5z->getArrayCopy();
					$Vbsfuxoni5eg = $Vjd52v1uhh5z->getColumnDimension();

					for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $this->m; ++$V51lf1kcbto4) {
						for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vbsfuxoni5eg; ++$Vzmnqyqjjodw) {
								$Vwkudxicgm1v[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw] * $this->L[$Vfhiq1lhsoja][$V51lf1kcbto4];
							}
						}
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vbsfuxoni5eg; ++$Vzmnqyqjjodw) {
							$Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw] /= $this->L[$V51lf1kcbto4][$V51lf1kcbto4];
						}
					}

					for ($V51lf1kcbto4 = $this->m - 1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vbsfuxoni5eg; ++$Vzmnqyqjjodw) {
							$Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw] /= $this->L[$V51lf1kcbto4][$V51lf1kcbto4];
						}
						for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V51lf1kcbto4; ++$Vfhiq1lhsoja) {
							for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vbsfuxoni5eg; ++$Vzmnqyqjjodw) {
								$Vwkudxicgm1v[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw] * $this->L[$V51lf1kcbto4][$Vfhiq1lhsoja];
							}
						}
					}

					return new Matrix($Vwkudxicgm1v, $this->m, $Vbsfuxoni5eg);
				} else {
					throw new PHPExcel_Calculation_Exception(JAMAError(MatrixSPDException));
				}
			} else {
				throw new PHPExcel_Calculation_Exception(JAMAError(MatrixDimensionException));
			}
		} else {
			throw new PHPExcel_Calculation_Exception(JAMAError(ArgumentTypeException));
		}
	}	

}	
