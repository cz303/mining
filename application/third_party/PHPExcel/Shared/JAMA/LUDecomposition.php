<?php

class PHPExcel_Shared_JAMA_LUDecomposition {

	const MatrixSingularException	= "Can only perform operation on singular matrix.";
	const MatrixSquareException		= "Mismatched Row dimension";

	
	private $Vu3jf2p4l5qp = array();

	
	private $Vt54vmttyjzc;

	
	private $Vmwwo1qnmepz;

	
	private $V0fonq15j1lg;

	
	private $Vl2xhxxgxyto = array();


	
	public function __construct($Vk0c33a31nhe) {
		if ($Vk0c33a31nhe instanceof PHPExcel_Shared_JAMA_Matrix) {
			
			$Veca2om3awughis->LU = $Vk0c33a31nhe->getArray();
			$Veca2om3awughis->m  = $Vk0c33a31nhe->getRowDimension();
			$Veca2om3awughis->n  = $Vk0c33a31nhe->getColumnDimension();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
				$Veca2om3awughis->piv[$Vfhiq1lhsoja] = $Vfhiq1lhsoja;
			}
			$Veca2om3awughis->pivsign = 1;
			$Vu3jf2p4l5qprowi = $Vu3jf2p4l5qpcolj = array();

			
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					$Vu3jf2p4l5qpcolj[$Vfhiq1lhsoja] = &$Veca2om3awughis->LU[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				}
				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					$Vu3jf2p4l5qprowi = $Veca2om3awughis->LU[$Vfhiq1lhsoja];
					
					$Vumkknfdmbth = min($Vfhiq1lhsoja,$Vzmnqyqjjodw);
					$V2n430jknk35 = 0.0;
					for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Vumkknfdmbth; ++$V51lf1kcbto4) {
						$V2n430jknk35 += $Vu3jf2p4l5qprowi[$V51lf1kcbto4] * $Vu3jf2p4l5qpcolj[$V51lf1kcbto4];
					}
					$Vu3jf2p4l5qprowi[$Vzmnqyqjjodw] = $Vu3jf2p4l5qpcolj[$Vfhiq1lhsoja] -= $V2n430jknk35;
				}
				
				$Vzqw0ieauwu4 = $Vzmnqyqjjodw;
				for ($Vfhiq1lhsoja = $Vzmnqyqjjodw+1; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					if (abs($Vu3jf2p4l5qpcolj[$Vfhiq1lhsoja]) > abs($Vu3jf2p4l5qpcolj[$Vzqw0ieauwu4])) {
						$Vzqw0ieauwu4 = $Vfhiq1lhsoja;
					}
				}
				if ($Vzqw0ieauwu4 != $Vzmnqyqjjodw) {
					for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Veca2om3awughis->n; ++$V51lf1kcbto4) {
						$Veca2om3awug = $Veca2om3awughis->LU[$Vzqw0ieauwu4][$V51lf1kcbto4];
						$Veca2om3awughis->LU[$Vzqw0ieauwu4][$V51lf1kcbto4] = $Veca2om3awughis->LU[$Vzmnqyqjjodw][$V51lf1kcbto4];
						$Veca2om3awughis->LU[$Vzmnqyqjjodw][$V51lf1kcbto4] = $Veca2om3awug;
					}
					$V51lf1kcbto4 = $Veca2om3awughis->piv[$Vzqw0ieauwu4];
					$Veca2om3awughis->piv[$Vzqw0ieauwu4] = $Veca2om3awughis->piv[$Vzmnqyqjjodw];
					$Veca2om3awughis->piv[$Vzmnqyqjjodw] = $V51lf1kcbto4;
					$Veca2om3awughis->pivsign = $Veca2om3awughis->pivsign * -1;
				}
				
				if (($Vzmnqyqjjodw < $Veca2om3awughis->m) && ($Veca2om3awughis->LU[$Vzmnqyqjjodw][$Vzmnqyqjjodw] != 0.0)) {
					for ($Vfhiq1lhsoja = $Vzmnqyqjjodw+1; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->LU[$Vfhiq1lhsoja][$Vzmnqyqjjodw] /= $Veca2om3awughis->LU[$Vzmnqyqjjodw][$Vzmnqyqjjodw];
					}
				}
			}
		} else {
			throw new PHPExcel_Calculation_Exception(PHPExcel_Shared_JAMA_Matrix::ArgumentTypeException);
		}
	}	


	
	public function getL() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				if ($Vfhiq1lhsoja > $Vzmnqyqjjodw) {
					$Vycem1mprouj[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awughis->LU[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				} elseif ($Vfhiq1lhsoja == $Vzmnqyqjjodw) {
					$Vycem1mprouj[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 1.0;
				} else {
					$Vycem1mprouj[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			}
		}
		return new PHPExcel_Shared_JAMA_Matrix($Vycem1mprouj);
	}	


	
	public function getU() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				if ($Vfhiq1lhsoja <= $Vzmnqyqjjodw) {
					$Vbaxn4wad5qb[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awughis->LU[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				} else {
					$Vbaxn4wad5qb[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			}
		}
		return new PHPExcel_Shared_JAMA_Matrix($Vbaxn4wad5qb);
	}	


	
	public function getPivot() {
		return $Veca2om3awughis->piv;
	}	


	
	public function getDoublePivot() {
		return $Veca2om3awughis->getPivot();
	}	


	
	public function isNonsingular() {
		for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
			if ($Veca2om3awughis->LU[$Vzmnqyqjjodw][$Vzmnqyqjjodw] == 0) {
				return false;
			}
		}
		return true;
	}	


	
	public function det() {
		if ($Veca2om3awughis->m == $Veca2om3awughis->n) {
			$Vrec2f1japon = $Veca2om3awughis->pivsign;
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				$Vrec2f1japon *= $Veca2om3awughis->LU[$Vzmnqyqjjodw][$Vzmnqyqjjodw];
			}
			return $Vrec2f1japon;
		} else {
			throw new PHPExcel_Calculation_Exception(PHPExcel_Shared_JAMA_Matrix::MatrixDimensionException);
		}
	}	


	
	public function solve($Vjd52v1uhh5z) {
		if ($Vjd52v1uhh5z->getRowDimension() == $Veca2om3awughis->m) {
			if ($Veca2om3awughis->isNonsingular()) {
				
				$Vmwwo1qnmepzx = $Vjd52v1uhh5z->getColumnDimension();
				$Vwkudxicgm1v  = $Vjd52v1uhh5z->getMatrix($Veca2om3awughis->piv, 0, $Vmwwo1qnmepzx-1);
				
				for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Veca2om3awughis->n; ++$V51lf1kcbto4) {
					for ($Vfhiq1lhsoja = $V51lf1kcbto4+1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
							$Vwkudxicgm1v->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vwkudxicgm1v->A[$V51lf1kcbto4][$Vzmnqyqjjodw] * $Veca2om3awughis->LU[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				
				for ($V51lf1kcbto4 = $Veca2om3awughis->n-1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
					for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
						$Vwkudxicgm1v->A[$V51lf1kcbto4][$Vzmnqyqjjodw] /= $Veca2om3awughis->LU[$V51lf1kcbto4][$V51lf1kcbto4];
					}
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V51lf1kcbto4; ++$Vfhiq1lhsoja) {
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
							$Vwkudxicgm1v->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vwkudxicgm1v->A[$V51lf1kcbto4][$Vzmnqyqjjodw] * $Veca2om3awughis->LU[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				return $Vwkudxicgm1v;
			} else {
				throw new PHPExcel_Calculation_Exception(self::MatrixSingularException);
			}
		} else {
			throw new PHPExcel_Calculation_Exception(self::MatrixSquareException);
		}
	}	

}	
