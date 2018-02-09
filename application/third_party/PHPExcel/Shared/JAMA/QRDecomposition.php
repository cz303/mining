<?php

class PHPExcel_Shared_JAMA_QRDecomposition {

	const MatrixRankException	= "Can only perform operation on full-rank matrix.";

	
	private $Veoe3hwmrata = array();

	
	private $Vt54vmttyjzc;

	
	private $Vmwwo1qnmepz;

	
	private $Vtvydbjqs2v4 = array();


	
	public function __construct($Vk0c33a31nhe) {
		if($Vk0c33a31nhe instanceof PHPExcel_Shared_JAMA_Matrix) {
			
			$this->QR = $Vk0c33a31nhe->getArrayCopy();
			$this->m  = $Vk0c33a31nhe->getRowDimension();
			$this->n  = $Vk0c33a31nhe->getColumnDimension();
			
			for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $this->n; ++$V51lf1kcbto4) {
				
				$Vmwwo1qnmepzrm = 0.0;
				for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
					$Vmwwo1qnmepzrm = hypo($Vmwwo1qnmepzrm, $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4]);
				}
				if ($Vmwwo1qnmepzrm != 0.0) {
					
					if ($this->QR[$V51lf1kcbto4][$V51lf1kcbto4] < 0) {
						$Vmwwo1qnmepzrm = -$Vmwwo1qnmepzrm;
					}
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
						$this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4] /= $Vmwwo1qnmepzrm;
					}
					$this->QR[$V51lf1kcbto4][$V51lf1kcbto4] += 1.0;
					
					for ($Vzmnqyqjjodw = $V51lf1kcbto4+1; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
						$V2n430jknk35 = 0.0;
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							$V2n430jknk35 += $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4] * $this->QR[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
						}
						$V2n430jknk35 = -$V2n430jknk35/$this->QR[$V51lf1kcbto4][$V51lf1kcbto4];
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							$this->QR[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $V2n430jknk35 * $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				$this->Rdiag[$V51lf1kcbto4] = -$Vmwwo1qnmepzrm;
			}
		} else {
			throw new PHPExcel_Calculation_Exception(PHPExcel_Shared_JAMA_Matrix::ArgumentTypeException);
		}
	}	


	
	public function isFullRank() {
		for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
			if ($this->Rdiag[$Vzmnqyqjjodw] == 0) {
				return false;
			}
		}
		return true;
	}	


	
	public function getH() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
				if ($Vfhiq1lhsoja >= $Vzmnqyqjjodw) {
					$Vty52qlbtnbx[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $this->QR[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				} else {
					$Vty52qlbtnbx[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			}
		}
		return new PHPExcel_Shared_JAMA_Matrix($Vty52qlbtnbx);
	}	


	
	public function getR() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->n; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
				if ($Vfhiq1lhsoja < $Vzmnqyqjjodw) {
					$Vwulsk14oxlp[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $this->QR[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				} elseif ($Vfhiq1lhsoja == $Vzmnqyqjjodw) {
					$Vwulsk14oxlp[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $this->Rdiag[$Vfhiq1lhsoja];
				} else {
					$Vwulsk14oxlp[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			}
		}
		return new PHPExcel_Shared_JAMA_Matrix($Vwulsk14oxlp);
	}	


	
	public function getQ() {
		for ($V51lf1kcbto4 = $this->n-1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
				$V3xjxoryegny[$Vfhiq1lhsoja][$V51lf1kcbto4] = 0.0;
			}
			$V3xjxoryegny[$V51lf1kcbto4][$V51lf1kcbto4] = 1.0;
			for ($Vzmnqyqjjodw = $V51lf1kcbto4; $Vzmnqyqjjodw < $this->n; ++$Vzmnqyqjjodw) {
				if ($this->QR[$V51lf1kcbto4][$V51lf1kcbto4] != 0) {
					$V2n430jknk35 = 0.0;
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
						$V2n430jknk35 += $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4] * $V3xjxoryegny[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
					}
					$V2n430jknk35 = -$V2n430jknk35/$this->QR[$V51lf1kcbto4][$V51lf1kcbto4];
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
						$V3xjxoryegny[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $V2n430jknk35 * $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4];
					}
				}
			}
		}
		
		return new PHPExcel_Shared_JAMA_Matrix($V3xjxoryegny);
	}	


	
	public function solve($Vjd52v1uhh5z) {
		if ($Vjd52v1uhh5z->getRowDimension() == $this->m) {
			if ($this->isFullRank()) {
				
				$Vmwwo1qnmepzx = $Vjd52v1uhh5z->getColumnDimension();
				$Vwkudxicgm1v  = $Vjd52v1uhh5z->getArrayCopy();
				
				for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $this->n; ++$V51lf1kcbto4) {
					for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
						$V2n430jknk35 = 0.0;
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							$V2n430jknk35 += $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4] * $Vwkudxicgm1v[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
						}
						$V2n430jknk35 = -$V2n430jknk35/$this->QR[$V51lf1kcbto4][$V51lf1kcbto4];
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $this->m; ++$Vfhiq1lhsoja) {
							$Vwkudxicgm1v[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $V2n430jknk35 * $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				
				for ($V51lf1kcbto4 = $this->n-1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
					for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
						$Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw] /= $this->Rdiag[$V51lf1kcbto4];
					}
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V51lf1kcbto4; ++$Vfhiq1lhsoja) {
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vmwwo1qnmepzx; ++$Vzmnqyqjjodw) {
							$Vwkudxicgm1v[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vwkudxicgm1v[$V51lf1kcbto4][$Vzmnqyqjjodw]* $this->QR[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				$Vwkudxicgm1v = new PHPExcel_Shared_JAMA_Matrix($Vwkudxicgm1v);
				return ($Vwkudxicgm1v->getMatrix(0, $this->n-1, 0, $Vmwwo1qnmepzx));
			} else {
				throw new PHPExcel_Calculation_Exception(self::MatrixRankException);
			}
		} else {
			throw new PHPExcel_Calculation_Exception(PHPExcel_Shared_JAMA_Matrix::MatrixDimensionException);
		}
	}	

}	
