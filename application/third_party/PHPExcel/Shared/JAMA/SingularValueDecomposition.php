<?php

class SingularValueDecomposition  {

	
	private $Vu5e1w5ehr3dbaxn4wad5qb = array();

	
	private $Vu5e1w5ehr3d = array();

	
	private $V2n430jknk35 = array();

	
	private $Vt54vmttyjzc;

	
	private $Vmwwo1qnmepz;


	
	public function __construct($Vstaxdaonlbv) {

		
		$Vk0c33a31nhe = $Vstaxdaonlbv->getArrayCopy();
		$Veca2om3awughis->m = $Vstaxdaonlbv->getRowDimension();
		$Veca2om3awughis->n = $Vstaxdaonlbv->getColumnDimension();
		$Vmwwo1qnmepzu      = min($Veca2om3awughis->m, $Veca2om3awughis->n);
		$Vnhm0uuykimv       = array();
		$Vm2hw1okg2to    = array();
		$Vy3r5tla5k2g   = true;
		$Vmjw5ui33wbj   = true;
		$Vmwwo1qnmepzct = min($Veca2om3awughis->m - 1, $Veca2om3awughis->n);
		$Vmwwo1qnmepzrt = max(0, min($Veca2om3awughis->n - 2, $Veca2om3awughis->m));

		
		
		for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < max($Vmwwo1qnmepzct,$Vmwwo1qnmepzrt); ++$V51lf1kcbto4) {

			if ($V51lf1kcbto4 < $Vmwwo1qnmepzct) {
				
				
				
				$Veca2om3awughis->s[$V51lf1kcbto4] = 0;
				for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->s[$V51lf1kcbto4] = hypo($Veca2om3awughis->s[$V51lf1kcbto4], $Vk0c33a31nhe[$Vfhiq1lhsoja][$V51lf1kcbto4]);
				}
				if ($Veca2om3awughis->s[$V51lf1kcbto4] != 0.0) {
					if ($Vk0c33a31nhe[$V51lf1kcbto4][$V51lf1kcbto4] < 0.0) {
						$Veca2om3awughis->s[$V51lf1kcbto4] = -$Veca2om3awughis->s[$V51lf1kcbto4];
					}
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Vk0c33a31nhe[$Vfhiq1lhsoja][$V51lf1kcbto4] /= $Veca2om3awughis->s[$V51lf1kcbto4];
					}
					$Vk0c33a31nhe[$V51lf1kcbto4][$V51lf1kcbto4] += 1.0;
				}
				$Veca2om3awughis->s[$V51lf1kcbto4] = -$Veca2om3awughis->s[$V51lf1kcbto4];
			}

			for ($Vzmnqyqjjodw = $V51lf1kcbto4 + 1; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				if (($V51lf1kcbto4 < $Vmwwo1qnmepzct) & ($Veca2om3awughis->s[$V51lf1kcbto4] != 0.0)) {
					
					$Veca2om3awug = 0;
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Veca2om3awug += $Vk0c33a31nhe[$Vfhiq1lhsoja][$V51lf1kcbto4] * $Vk0c33a31nhe[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
					}
					$Veca2om3awug = -$Veca2om3awug / $Vk0c33a31nhe[$V51lf1kcbto4][$V51lf1kcbto4];
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Vk0c33a31nhe[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Veca2om3awug * $Vk0c33a31nhe[$Vfhiq1lhsoja][$V51lf1kcbto4];
					}
					
					
					$Vnhm0uuykimv[$Vzmnqyqjjodw] = $Vk0c33a31nhe[$V51lf1kcbto4][$Vzmnqyqjjodw];
				}
			}

			if ($Vy3r5tla5k2g AND ($V51lf1kcbto4 < $Vmwwo1qnmepzct)) {
				
				
				for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Vk0c33a31nhe[$Vfhiq1lhsoja][$V51lf1kcbto4];
				}
			}

			if ($V51lf1kcbto4 < $Vmwwo1qnmepzrt) {
				
				
				
				$Vnhm0uuykimv[$V51lf1kcbto4] = 0;
				for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
					$Vnhm0uuykimv[$V51lf1kcbto4] = hypo($Vnhm0uuykimv[$V51lf1kcbto4], $Vnhm0uuykimv[$Vfhiq1lhsoja]);
				}
				if ($Vnhm0uuykimv[$V51lf1kcbto4] != 0.0) {
					if ($Vnhm0uuykimv[$V51lf1kcbto4+1] < 0.0) {
						$Vnhm0uuykimv[$V51lf1kcbto4] = -$Vnhm0uuykimv[$V51lf1kcbto4];
					}
					for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
						$Vnhm0uuykimv[$Vfhiq1lhsoja] /= $Vnhm0uuykimv[$V51lf1kcbto4];
					}
					$Vnhm0uuykimv[$V51lf1kcbto4+1] += 1.0;
				}
				$Vnhm0uuykimv[$V51lf1kcbto4] = -$Vnhm0uuykimv[$V51lf1kcbto4];
				if (($V51lf1kcbto4+1 < $Veca2om3awughis->m) AND ($Vnhm0uuykimv[$V51lf1kcbto4] != 0.0)) {
					
					for ($Vfhiq1lhsoja = $V51lf1kcbto4+1; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Vm2hw1okg2to[$Vfhiq1lhsoja] = 0.0;
					}
					for ($Vzmnqyqjjodw = $V51lf1kcbto4+1; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
						for ($Vfhiq1lhsoja = $V51lf1kcbto4+1; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
							$Vm2hw1okg2to[$Vfhiq1lhsoja] += $Vnhm0uuykimv[$Vzmnqyqjjodw] * $Vk0c33a31nhe[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
						}
					}
					for ($Vzmnqyqjjodw = $V51lf1kcbto4 + 1; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
						$Veca2om3awug = -$Vnhm0uuykimv[$Vzmnqyqjjodw] / $Vnhm0uuykimv[$V51lf1kcbto4+1];
						for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
							$Vk0c33a31nhe[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Veca2om3awug * $Vm2hw1okg2to[$Vfhiq1lhsoja];
						}
					}
				}
				if ($Vmjw5ui33wbj) {
					
					
					for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Vnhm0uuykimv[$Vfhiq1lhsoja];
					}
				}
			}
		}

		
		$Vzqw0ieauwu4 = min($Veca2om3awughis->n, $Veca2om3awughis->m + 1);
		if ($Vmwwo1qnmepzct < $Veca2om3awughis->n) {
			$Veca2om3awughis->s[$Vmwwo1qnmepzct] = $Vk0c33a31nhe[$Vmwwo1qnmepzct][$Vmwwo1qnmepzct];
		}
		if ($Veca2om3awughis->m < $Vzqw0ieauwu4) {
			$Veca2om3awughis->s[$Vzqw0ieauwu4-1] = 0.0;
		}
		if ($Vmwwo1qnmepzrt + 1 < $Vzqw0ieauwu4) {
			$Vnhm0uuykimv[$Vmwwo1qnmepzrt] = $Vk0c33a31nhe[$Vmwwo1qnmepzrt][$Vzqw0ieauwu4-1];
		}
		$Vnhm0uuykimv[$Vzqw0ieauwu4-1] = 0.0;
		
		if ($Vy3r5tla5k2g) {
			for ($Vzmnqyqjjodw = $Vmwwo1qnmepzct; $Vzmnqyqjjodw < $Vmwwo1qnmepzu; ++$Vzmnqyqjjodw) {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
				$Veca2om3awughis->U[$Vzmnqyqjjodw][$Vzmnqyqjjodw] = 1.0;
			}
			for ($V51lf1kcbto4 = $Vmwwo1qnmepzct - 1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
				if ($Veca2om3awughis->s[$V51lf1kcbto4] != 0.0) {
					for ($Vzmnqyqjjodw = $V51lf1kcbto4 + 1; $Vzmnqyqjjodw < $Vmwwo1qnmepzu; ++$Vzmnqyqjjodw) {
						$Veca2om3awug = 0;
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
							$Veca2om3awug += $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
						}
						$Veca2om3awug = -$Veca2om3awug / $Veca2om3awughis->U[$V51lf1kcbto4][$V51lf1kcbto4];
						for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
							$Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Veca2om3awug * $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
					for ($Vfhiq1lhsoja = $V51lf1kcbto4; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja ) {
						$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] = -$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4];
					}
					$Veca2om3awughis->U[$V51lf1kcbto4][$V51lf1kcbto4] = 1.0 + $Veca2om3awughis->U[$V51lf1kcbto4][$V51lf1kcbto4];
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V51lf1kcbto4 - 1; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] = 0.0;
					}
				} else {
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] = 0.0;
					}
					$Veca2om3awughis->U[$V51lf1kcbto4][$V51lf1kcbto4] = 1.0;
				}
			}
		}

		
		if ($Vmjw5ui33wbj) {
			for ($V51lf1kcbto4 = $Veca2om3awughis->n - 1; $V51lf1kcbto4 >= 0; --$V51lf1kcbto4) {
				if (($V51lf1kcbto4 < $Vmwwo1qnmepzrt) AND ($Vnhm0uuykimv[$V51lf1kcbto4] != 0.0)) {
					for ($Vzmnqyqjjodw = $V51lf1kcbto4 + 1; $Vzmnqyqjjodw < $Vmwwo1qnmepzu; ++$Vzmnqyqjjodw) {
						$Veca2om3awug = 0;
						for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
							$Veca2om3awug += $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4]* $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
						}
						$Veca2om3awug = -$Veca2om3awug / $Veca2om3awughis->V[$V51lf1kcbto4+1][$V51lf1kcbto4];
						for ($Vfhiq1lhsoja = $V51lf1kcbto4 + 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
							$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Veca2om3awug * $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4];
						}
					}
				}
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] = 0.0;
				}
				$Veca2om3awughis->V[$V51lf1kcbto4][$V51lf1kcbto4] = 1.0;
			}
		}

		
		$Vzqw0ieauwu4p   = $Vzqw0ieauwu4 - 1;
		$Vfhiq1lhsojater = 0;
		$Vnhm0uuykimvps  = pow(2.0, -52.0);

		while ($Vzqw0ieauwu4 > 0) {
			
			
			
			
			
			
			
			
			
			for ($V51lf1kcbto4 = $Vzqw0ieauwu4 - 2; $V51lf1kcbto4 >= -1; --$V51lf1kcbto4) {
				if ($V51lf1kcbto4 == -1) {
					break;
				}
				if (abs($Vnhm0uuykimv[$V51lf1kcbto4]) <= $Vnhm0uuykimvps * (abs($Veca2om3awughis->s[$V51lf1kcbto4]) + abs($Veca2om3awughis->s[$V51lf1kcbto4+1]))) {
					$Vnhm0uuykimv[$V51lf1kcbto4] = 0.0;
					break;
				}
			}
			if ($V51lf1kcbto4 == $Vzqw0ieauwu4 - 2) {
				$V51lf1kcbto4ase = 4;
			} else {
				for ($V51lf1kcbto4s = $Vzqw0ieauwu4 - 1; $V51lf1kcbto4s >= $V51lf1kcbto4; --$V51lf1kcbto4s) {
					if ($V51lf1kcbto4s == $V51lf1kcbto4) {
						break;
					}
					$Veca2om3awug = ($V51lf1kcbto4s != $Vzqw0ieauwu4 ? abs($Vnhm0uuykimv[$V51lf1kcbto4s]) : 0.) + ($V51lf1kcbto4s != $V51lf1kcbto4 + 1 ? abs($Vnhm0uuykimv[$V51lf1kcbto4s-1]) : 0.);
					if (abs($Veca2om3awughis->s[$V51lf1kcbto4s]) <= $Vnhm0uuykimvps * $Veca2om3awug)  {
						$Veca2om3awughis->s[$V51lf1kcbto4s] = 0.0;
						break;
					}
				}
				if ($V51lf1kcbto4s == $V51lf1kcbto4) {
					$V51lf1kcbto4ase = 3;
				} else if ($V51lf1kcbto4s == $Vzqw0ieauwu4-1) {
					$V51lf1kcbto4ase = 1;
				} else {
					$V51lf1kcbto4ase = 2;
					$V51lf1kcbto4 = $V51lf1kcbto4s;
				}
			}
			++$V51lf1kcbto4;

			
			switch ($V51lf1kcbto4ase) {
				
				case 1:
						$Vtbbah5lqvpo = $Vnhm0uuykimv[$Vzqw0ieauwu4-2];
						$Vnhm0uuykimv[$Vzqw0ieauwu4-2] = 0.0;
						for ($Vzmnqyqjjodw = $Vzqw0ieauwu4 - 2; $Vzmnqyqjjodw >= $V51lf1kcbto4; --$Vzmnqyqjjodw) {
							$Veca2om3awug  = hypo($Veca2om3awughis->s[$Vzmnqyqjjodw],$Vtbbah5lqvpo);
							$V2wcuewfbgca = $Veca2om3awughis->s[$Vzmnqyqjjodw] / $Veca2om3awug;
							$V2n430jknk35n = $Vtbbah5lqvpo / $Veca2om3awug;
							$Veca2om3awughis->s[$Vzmnqyqjjodw] = $Veca2om3awug;
							if ($Vzmnqyqjjodw != $V51lf1kcbto4) {
								$Vtbbah5lqvpo = -$V2n430jknk35n * $Vnhm0uuykimv[$Vzmnqyqjjodw-1];
								$Vnhm0uuykimv[$Vzmnqyqjjodw-1] = $V2wcuewfbgca * $Vnhm0uuykimv[$Vzmnqyqjjodw-1];
							}
							if ($Vmjw5ui33wbj) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $V2wcuewfbgca * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2n430jknk35n * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzqw0ieauwu4-1];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzqw0ieauwu4-1] = -$V2n430jknk35n * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2wcuewfbgca * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzqw0ieauwu4-1];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awug;
								}
							}
						}
						break;
				
				case 2:
						$Vtbbah5lqvpo = $Vnhm0uuykimv[$V51lf1kcbto4-1];
						$Vnhm0uuykimv[$V51lf1kcbto4-1] = 0.0;
						for ($Vzmnqyqjjodw = $V51lf1kcbto4; $Vzmnqyqjjodw < $Vzqw0ieauwu4; ++$Vzmnqyqjjodw) {
							$Veca2om3awug = hypo($Veca2om3awughis->s[$Vzmnqyqjjodw], $Vtbbah5lqvpo);
							$V2wcuewfbgca = $Veca2om3awughis->s[$Vzmnqyqjjodw] / $Veca2om3awug;
							$V2n430jknk35n = $Vtbbah5lqvpo / $Veca2om3awug;
							$Veca2om3awughis->s[$Vzmnqyqjjodw] = $Veca2om3awug;
							$Vtbbah5lqvpo = -$V2n430jknk35n * $Vnhm0uuykimv[$Vzmnqyqjjodw];
							$Vnhm0uuykimv[$Vzmnqyqjjodw] = $V2wcuewfbgca * $Vnhm0uuykimv[$Vzmnqyqjjodw];
							if ($Vy3r5tla5k2g) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $V2wcuewfbgca * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2n430jknk35n * $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4-1];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4-1] = -$V2n430jknk35n * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2wcuewfbgca * $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4-1];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awug;
								}
							}
						}
						break;
				
				case 3:
						
						$V2n430jknk35cale = max(max(max(max(
									abs($Veca2om3awughis->s[$Vzqw0ieauwu4-1]),abs($Veca2om3awughis->s[$Vzqw0ieauwu4-2])),abs($Vnhm0uuykimv[$Vzqw0ieauwu4-2])),
									abs($Veca2om3awughis->s[$V51lf1kcbto4])), abs($Vnhm0uuykimv[$V51lf1kcbto4]));
						$V2n430jknk35p   = $Veca2om3awughis->s[$Vzqw0ieauwu4-1] / $V2n430jknk35cale;
						$V2n430jknk35pm1 = $Veca2om3awughis->s[$Vzqw0ieauwu4-2] / $V2n430jknk35cale;
						$Vnhm0uuykimvpm1 = $Vnhm0uuykimv[$Vzqw0ieauwu4-2] / $V2n430jknk35cale;
						$V2n430jknk35k   = $Veca2om3awughis->s[$V51lf1kcbto4] / $V2n430jknk35cale;
						$Vnhm0uuykimvk   = $Vnhm0uuykimv[$V51lf1kcbto4] / $V2n430jknk35cale;
						$V4t3fwdd3eev    = (($V2n430jknk35pm1 + $V2n430jknk35p) * ($V2n430jknk35pm1 - $V2n430jknk35p) + $Vnhm0uuykimvpm1 * $Vnhm0uuykimvpm1) / 2.0;
						$V4y0urwpnd3j    = ($V2n430jknk35p * $Vnhm0uuykimvpm1) * ($V2n430jknk35p * $Vnhm0uuykimvpm1);
						$V2n430jknk35hift = 0.0;
						if (($V4t3fwdd3eev != 0.0) || ($V4y0urwpnd3j != 0.0)) {
							$V2n430jknk35hift = sqrt($V4t3fwdd3eev * $V4t3fwdd3eev + $V4y0urwpnd3j);
							if ($V4t3fwdd3eev < 0.0) {
								$V2n430jknk35hift = -$V2n430jknk35hift;
							}
							$V2n430jknk35hift = $V4y0urwpnd3j / ($V4t3fwdd3eev + $V2n430jknk35hift);
						}
						$Vtbbah5lqvpo = ($V2n430jknk35k + $V2n430jknk35p) * ($V2n430jknk35k - $V2n430jknk35p) + $V2n430jknk35hift;
						$Vpatv3dcvvhr = $V2n430jknk35k * $Vnhm0uuykimvk;
						
						for ($Vzmnqyqjjodw = $V51lf1kcbto4; $Vzmnqyqjjodw < $Vzqw0ieauwu4-1; ++$Vzmnqyqjjodw) {
							$Veca2om3awug  = hypo($Vtbbah5lqvpo,$Vpatv3dcvvhr);
							$V2wcuewfbgca = $Vtbbah5lqvpo/$Veca2om3awug;
							$V2n430jknk35n = $Vpatv3dcvvhr/$Veca2om3awug;
							if ($Vzmnqyqjjodw != $V51lf1kcbto4) {
								$Vnhm0uuykimv[$Vzmnqyqjjodw-1] = $Veca2om3awug;
							}
							$Vtbbah5lqvpo = $V2wcuewfbgca * $Veca2om3awughis->s[$Vzmnqyqjjodw] + $V2n430jknk35n * $Vnhm0uuykimv[$Vzmnqyqjjodw];
							$Vnhm0uuykimv[$Vzmnqyqjjodw] = $V2wcuewfbgca * $Vnhm0uuykimv[$Vzmnqyqjjodw] - $V2n430jknk35n * $Veca2om3awughis->s[$Vzmnqyqjjodw];
							$Vpatv3dcvvhr = $V2n430jknk35n * $Veca2om3awughis->s[$Vzmnqyqjjodw+1];
							$Veca2om3awughis->s[$Vzmnqyqjjodw+1] = $V2wcuewfbgca * $Veca2om3awughis->s[$Vzmnqyqjjodw+1];
							if ($Vmjw5ui33wbj) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $V2wcuewfbgca * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2n430jknk35n * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1] = -$V2n430jknk35n * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2wcuewfbgca * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awug;
								}
							}
							$Veca2om3awug = hypo($Vtbbah5lqvpo,$Vpatv3dcvvhr);
							$V2wcuewfbgca = $Vtbbah5lqvpo/$Veca2om3awug;
							$V2n430jknk35n = $Vpatv3dcvvhr/$Veca2om3awug;
							$Veca2om3awughis->s[$Vzmnqyqjjodw] = $Veca2om3awug;
							$Vtbbah5lqvpo = $V2wcuewfbgca * $Vnhm0uuykimv[$Vzmnqyqjjodw] + $V2n430jknk35n * $Veca2om3awughis->s[$Vzmnqyqjjodw+1];
							$Veca2om3awughis->s[$Vzmnqyqjjodw+1] = -$V2n430jknk35n * $Vnhm0uuykimv[$Vzmnqyqjjodw] + $V2wcuewfbgca * $Veca2om3awughis->s[$Vzmnqyqjjodw+1];
							$Vpatv3dcvvhr = $V2n430jknk35n * $Vnhm0uuykimv[$Vzmnqyqjjodw+1];
							$Vnhm0uuykimv[$Vzmnqyqjjodw+1] = $V2wcuewfbgca * $Vnhm0uuykimv[$Vzmnqyqjjodw+1];
							if ($Vy3r5tla5k2g && ($Vzmnqyqjjodw < $Veca2om3awughis->m - 1)) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $V2wcuewfbgca * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2n430jknk35n * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1] = -$V2n430jknk35n * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] + $V2wcuewfbgca * $Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw+1];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awug;
								}
							}
						}
						$Vnhm0uuykimv[$Vzqw0ieauwu4-2] = $Vtbbah5lqvpo;
						$Vfhiq1lhsojater = $Vfhiq1lhsojater + 1;
						break;
				
				case 4:
						
						if ($Veca2om3awughis->s[$V51lf1kcbto4] <= 0.0) {
							$Veca2om3awughis->s[$V51lf1kcbto4] = ($Veca2om3awughis->s[$V51lf1kcbto4] < 0.0 ? -$Veca2om3awughis->s[$V51lf1kcbto4] : 0.0);
							if ($Vmjw5ui33wbj) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $Vzqw0ieauwu4p; ++$Vfhiq1lhsoja) {
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] = -$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4];
								}
							}
						}
						
						while ($V51lf1kcbto4 < $Vzqw0ieauwu4p) {
							if ($Veca2om3awughis->s[$V51lf1kcbto4] >= $Veca2om3awughis->s[$V51lf1kcbto4+1]) {
								break;
							}
							$Veca2om3awug = $Veca2om3awughis->s[$V51lf1kcbto4];
							$Veca2om3awughis->s[$V51lf1kcbto4] = $Veca2om3awughis->s[$V51lf1kcbto4+1];
							$Veca2om3awughis->s[$V51lf1kcbto4+1] = $Veca2om3awug;
							if ($Vmjw5ui33wbj AND ($V51lf1kcbto4 < $Veca2om3awughis->n - 1)) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+1];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+1] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4];
									$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Veca2om3awug;
								}
							}
							if ($Vy3r5tla5k2g AND ($V51lf1kcbto4 < $Veca2om3awughis->m-1)) {
								for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->m; ++$Vfhiq1lhsoja) {
									$Veca2om3awug = $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4+1];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4+1] = $Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4];
									$Veca2om3awughis->U[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Veca2om3awug;
								}
							}
							++$V51lf1kcbto4;
						}
						$Vfhiq1lhsojater = 0;
						--$Vzqw0ieauwu4;
						break;
			} 
		} 

	} 


	
	public function getU() {
		return new Matrix($Veca2om3awughis->U, $Veca2om3awughis->m, min($Veca2om3awughis->m + 1, $Veca2om3awughis->n));
	}


	
	public function getV() {
		return new Matrix($Veca2om3awughis->V);
	}


	
	public function getSingularValues() {
		return $Veca2om3awughis->s;
	}


	
	public function getS() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				$Vsjimlpexdr5[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
			}
			$Vsjimlpexdr5[$Vfhiq1lhsoja][$Vfhiq1lhsoja] = $Veca2om3awughis->s[$Vfhiq1lhsoja];
		}
		return new Matrix($Vsjimlpexdr5);
	}


	
	public function norm2() {
		return $Veca2om3awughis->s[0];
	}


	
	public function cond() {
		return $Veca2om3awughis->s[0] / $Veca2om3awughis->s[min($Veca2om3awughis->m, $Veca2om3awughis->n) - 1];
	}


	
	public function rank() {
		$Vnhm0uuykimvps = pow(2.0, -52.0);
		$Veca2om3awugol = max($Veca2om3awughis->m, $Veca2om3awughis->n) * $Veca2om3awughis->s[0] * $Vnhm0uuykimvps;
		$Vws44nszhvgo = 0;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < count($Veca2om3awughis->s); ++$Vfhiq1lhsoja) {
			if ($Veca2om3awughis->s[$Vfhiq1lhsoja] > $Veca2om3awugol) {
				++$Vws44nszhvgo;
			}
		}
		return $Vws44nszhvgo;
	}

}	
