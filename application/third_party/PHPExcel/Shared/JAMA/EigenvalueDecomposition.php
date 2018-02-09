<?php

class EigenvalueDecomposition {

	
	private $Vu5e1w5ehr3dmwwo1qnmepz;

	
	private $Vu5e1w5ehr3d3yvsulagrra;

	
	private $Vu5e1w5ehr3drec2f1japon = array();
	private $Vu5e1w5ehr3dnhm0uuykimv = array();

	
	private $Vu5e1w5ehr3d = array();

	
	private $Vty52qlbtnbx = array();

	
	private $V5zmjfl5qsoi;

	
	private $V2dsanfa5eho;
	private $Vdnpdtooopct;


	
	private function tred2 () {
		
		
		
		
		$Veca2om3awughis->d = $Veca2om3awughis->V[$Veca2om3awughis->n-1];
		
		for ($Vfhiq1lhsoja = $Veca2om3awughis->n-1; $Vfhiq1lhsoja > 0; --$Vfhiq1lhsoja) {
			$Vfhiq1lhsoja_ = $Vfhiq1lhsoja -1;
			
			$Vvlxmepre4ko = $Vbqvy3ysyor0 = 0.0;
			$Vbqvy3ysyor0 += array_sum(array_map(abs, $Veca2om3awughis->d));
			if ($Vbqvy3ysyor0 == 0.0) {
				$Veca2om3awughis->e[$Vfhiq1lhsoja] = $Veca2om3awughis->d[$Vfhiq1lhsoja_];
				$Veca2om3awughis->d = array_slice($Veca2om3awughis->V[$Vfhiq1lhsoja_], 0, $Vfhiq1lhsoja_);
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Veca2om3awughis->V[$Vzmnqyqjjodw][$Vfhiq1lhsoja] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			} else {
				
				for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Vfhiq1lhsoja; ++$V51lf1kcbto4) {
					$Veca2om3awughis->d[$V51lf1kcbto4] /= $Vbqvy3ysyor0;
					$Vvlxmepre4ko += pow($Veca2om3awughis->d[$V51lf1kcbto4], 2);
				}
				$Vtbbah5lqvpo = $Veca2om3awughis->d[$Vfhiq1lhsoja_];
				$Vpatv3dcvvhr = sqrt($Vvlxmepre4ko);
				if ($Vtbbah5lqvpo > 0) {
					$Vpatv3dcvvhr = -$Vpatv3dcvvhr;
				}
				$Veca2om3awughis->e[$Vfhiq1lhsoja] = $Vbqvy3ysyor0 * $Vpatv3dcvvhr;
				$Vvlxmepre4ko = $Vvlxmepre4ko - $Vtbbah5lqvpo * $Vpatv3dcvvhr;
				$Veca2om3awughis->d[$Vfhiq1lhsoja_] = $Vtbbah5lqvpo - $Vpatv3dcvvhr;
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Veca2om3awughis->e[$Vzmnqyqjjodw] = 0.0;
				}
				
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Vtbbah5lqvpo = $Veca2om3awughis->d[$Vzmnqyqjjodw];
					$Veca2om3awughis->V[$Vzmnqyqjjodw][$Vfhiq1lhsoja] = $Vtbbah5lqvpo;
					$Vpatv3dcvvhr = $Veca2om3awughis->e[$Vzmnqyqjjodw] + $Veca2om3awughis->V[$Vzmnqyqjjodw][$Vzmnqyqjjodw] * $Vtbbah5lqvpo;
					for ($V51lf1kcbto4 = $Vzmnqyqjjodw+1; $V51lf1kcbto4 <= $Vfhiq1lhsoja_; ++$V51lf1kcbto4) {
						$Vpatv3dcvvhr += $Veca2om3awughis->V[$V51lf1kcbto4][$Vzmnqyqjjodw] * $Veca2om3awughis->d[$V51lf1kcbto4];
						$Veca2om3awughis->e[$V51lf1kcbto4] += $Veca2om3awughis->V[$V51lf1kcbto4][$Vzmnqyqjjodw] * $Vtbbah5lqvpo;
					}
					$Veca2om3awughis->e[$Vzmnqyqjjodw] = $Vpatv3dcvvhr;
				}
				$Vtbbah5lqvpo = 0.0;
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Veca2om3awughis->e[$Vzmnqyqjjodw] /= $Vvlxmepre4ko;
					$Vtbbah5lqvpo += $Veca2om3awughis->e[$Vzmnqyqjjodw] * $Veca2om3awughis->d[$Vzmnqyqjjodw];
				}
				$Vvlxmepre4koh = $Vtbbah5lqvpo / (2 * $Vvlxmepre4ko);
				for ($Vzmnqyqjjodw=0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Veca2om3awughis->e[$Vzmnqyqjjodw] -= $Vvlxmepre4koh * $Veca2om3awughis->d[$Vzmnqyqjjodw];
				}
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Vtbbah5lqvpo = $Veca2om3awughis->d[$Vzmnqyqjjodw];
					$Vpatv3dcvvhr = $Veca2om3awughis->e[$Vzmnqyqjjodw];
					for ($V51lf1kcbto4 = $Vzmnqyqjjodw; $V51lf1kcbto4 <= $Vfhiq1lhsoja_; ++$V51lf1kcbto4) {
						$Veca2om3awughis->V[$V51lf1kcbto4][$Vzmnqyqjjodw] -= ($Vtbbah5lqvpo * $Veca2om3awughis->e[$V51lf1kcbto4] + $Vpatv3dcvvhr * $Veca2om3awughis->d[$V51lf1kcbto4]);
					}
					$Veca2om3awughis->d[$Vzmnqyqjjodw] = $Veca2om3awughis->V[$Vfhiq1lhsoja-1][$Vzmnqyqjjodw];
					$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = 0.0;
				}
			}
			$Veca2om3awughis->d[$Vfhiq1lhsoja] = $Vvlxmepre4ko;
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n-1; ++$Vfhiq1lhsoja) {
			$Veca2om3awughis->V[$Veca2om3awughis->n-1][$Vfhiq1lhsoja] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vfhiq1lhsoja];
			$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vfhiq1lhsoja] = 1.0;
			$Vvlxmepre4ko = $Veca2om3awughis->d[$Vfhiq1lhsoja+1];
			if ($Vvlxmepre4ko != 0.0) {
				for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 <= $Vfhiq1lhsoja; ++$V51lf1kcbto4) {
					$Veca2om3awughis->d[$V51lf1kcbto4] = $Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja+1] / $Vvlxmepre4ko;
				}
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw <= $Vfhiq1lhsoja; ++$Vzmnqyqjjodw) {
					$Vpatv3dcvvhr = 0.0;
					for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 <= $Vfhiq1lhsoja; ++$V51lf1kcbto4) {
						$Vpatv3dcvvhr += $Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja+1] * $Veca2om3awughis->V[$V51lf1kcbto4][$Vzmnqyqjjodw];
					}
					for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 <= $Vfhiq1lhsoja; ++$V51lf1kcbto4) {
						$Veca2om3awughis->V[$V51lf1kcbto4][$Vzmnqyqjjodw] -= $Vpatv3dcvvhr * $Veca2om3awughis->d[$V51lf1kcbto4];
					}
				}
			}
			for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 <= $Vfhiq1lhsoja; ++$V51lf1kcbto4) {
				$Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja+1] = 0.0;
			}
		}

		$Veca2om3awughis->d = $Veca2om3awughis->V[$Veca2om3awughis->n-1];
		$Veca2om3awughis->V[$Veca2om3awughis->n-1] = array_fill(0, $Vzmnqyqjjodw, 0.0);
		$Veca2om3awughis->V[$Veca2om3awughis->n-1][$Veca2om3awughis->n-1] = 1.0;
		$Veca2om3awughis->e[0] = 0.0;
	}


	
	private function tql2() {
		for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
			$Veca2om3awughis->e[$Vfhiq1lhsoja-1] = $Veca2om3awughis->e[$Vfhiq1lhsoja];
		}
		$Veca2om3awughis->e[$Veca2om3awughis->n-1] = 0.0;
		$Vtbbah5lqvpo = 0.0;
		$Vmna5gvfloar = 0.0;
		$Vu5e1w5ehr3dnhm0uuykimvps  = pow(2.0,-52.0);

		for ($Vxlmgxcqqg2w = 0; $Vxlmgxcqqg2w < $Veca2om3awughis->n; ++$Vxlmgxcqqg2w) {
			
			$Vmna5gvfloar = max($Vmna5gvfloar, abs($Veca2om3awughis->d[$Vxlmgxcqqg2w]) + abs($Veca2om3awughis->e[$Vxlmgxcqqg2w]));
			$Vt54vmttyjzc = $Vxlmgxcqqg2w;
			while ($Vt54vmttyjzc < $Veca2om3awughis->n) {
				if (abs($Veca2om3awughis->e[$Vt54vmttyjzc]) <= $Vu5e1w5ehr3dnhm0uuykimvps * $Vmna5gvfloar)
					break;
				++$Vt54vmttyjzc;
			}
			
			
			if ($Vt54vmttyjzc > $Vxlmgxcqqg2w) {
				$Vfhiq1lhsojater = 0;
				do {
					
					$Vfhiq1lhsojater += 1;
					
					$Vpatv3dcvvhr = $Veca2om3awughis->d[$Vxlmgxcqqg2w];
					$Vzqw0ieauwu4 = ($Veca2om3awughis->d[$Vxlmgxcqqg2w+1] - $Vpatv3dcvvhr) / (2.0 * $Veca2om3awughis->e[$Vxlmgxcqqg2w]);
					$Vws44nszhvgo = hypo($Vzqw0ieauwu4, 1.0);
					if ($Vzqw0ieauwu4 < 0)
						$Vws44nszhvgo *= -1;
					$Veca2om3awughis->d[$Vxlmgxcqqg2w] = $Veca2om3awughis->e[$Vxlmgxcqqg2w] / ($Vzqw0ieauwu4 + $Vws44nszhvgo);
					$Veca2om3awughis->d[$Vxlmgxcqqg2w+1] = $Veca2om3awughis->e[$Vxlmgxcqqg2w] * ($Vzqw0ieauwu4 + $Vws44nszhvgo);
					$Vu5e1w5ehr3drec2f1japonl1 = $Veca2om3awughis->d[$Vxlmgxcqqg2w+1];
					$Vvlxmepre4ko = $Vpatv3dcvvhr - $Veca2om3awughis->d[$Vxlmgxcqqg2w];
					for ($Vfhiq1lhsoja = $Vxlmgxcqqg2w + 2; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja)
						$Veca2om3awughis->d[$Vfhiq1lhsoja] -= $Vvlxmepre4ko;
					$Vtbbah5lqvpo += $Vvlxmepre4ko;
					
					$Vzqw0ieauwu4 = $Veca2om3awughis->d[$Vt54vmttyjzc];
					$V4y0urwpnd3j = 1.0;
					$V4y0urwpnd3j2 = $V4y0urwpnd3j3 = $V4y0urwpnd3j;
					$Vu5e1w5ehr3dnhm0uuykimvl1 = $Veca2om3awughis->e[$Vxlmgxcqqg2w + 1];
					$V2n430jknk35 = $V2n430jknk352 = 0.0;
					for ($Vfhiq1lhsoja = $Vt54vmttyjzc-1; $Vfhiq1lhsoja >= $Vxlmgxcqqg2w; --$Vfhiq1lhsoja) {
						$V4y0urwpnd3j3 = $V4y0urwpnd3j2;
						$V4y0urwpnd3j2 = $V4y0urwpnd3j;
						$V2n430jknk352 = $V2n430jknk35;
						$Vpatv3dcvvhr  = $V4y0urwpnd3j * $Veca2om3awughis->e[$Vfhiq1lhsoja];
						$Vvlxmepre4ko  = $V4y0urwpnd3j * $Vzqw0ieauwu4;
						$Vws44nszhvgo  = hypo($Vzqw0ieauwu4, $Veca2om3awughis->e[$Vfhiq1lhsoja]);
						$Veca2om3awughis->e[$Vfhiq1lhsoja+1] = $V2n430jknk35 * $Vws44nszhvgo;
						$V2n430jknk35 = $Veca2om3awughis->e[$Vfhiq1lhsoja] / $Vws44nszhvgo;
						$V4y0urwpnd3j = $Vzqw0ieauwu4 / $Vws44nszhvgo;
						$Vzqw0ieauwu4 = $V4y0urwpnd3j * $Veca2om3awughis->d[$Vfhiq1lhsoja] - $V2n430jknk35 * $Vpatv3dcvvhr;
						$Veca2om3awughis->d[$Vfhiq1lhsoja+1] = $Vvlxmepre4ko + $V2n430jknk35 * ($V4y0urwpnd3j * $Vpatv3dcvvhr + $V2n430jknk35 * $Veca2om3awughis->d[$Vfhiq1lhsoja]);
						
						for ($V51lf1kcbto4 = 0; $V51lf1kcbto4 < $Veca2om3awughis->n; ++$V51lf1kcbto4) {
							$Vvlxmepre4ko = $Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja+1];
							$Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja+1] = $V2n430jknk35 * $Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja] + $V4y0urwpnd3j * $Vvlxmepre4ko;
							$Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja] = $V4y0urwpnd3j * $Veca2om3awughis->V[$V51lf1kcbto4][$Vfhiq1lhsoja] - $V2n430jknk35 * $Vvlxmepre4ko;
						}
					}
					$Vzqw0ieauwu4 = -$V2n430jknk35 * $V2n430jknk352 * $V4y0urwpnd3j3 * $Vu5e1w5ehr3dnhm0uuykimvl1 * $Veca2om3awughis->e[$Vxlmgxcqqg2w] / $Vu5e1w5ehr3drec2f1japonl1;
					$Veca2om3awughis->e[$Vxlmgxcqqg2w] = $V2n430jknk35 * $Vzqw0ieauwu4;
					$Veca2om3awughis->d[$Vxlmgxcqqg2w] = $V4y0urwpnd3j * $Vzqw0ieauwu4;
				
				} while (abs($Veca2om3awughis->e[$Vxlmgxcqqg2w]) > $Vu5e1w5ehr3dnhm0uuykimvps * $Vmna5gvfloar);
			}
			$Veca2om3awughis->d[$Vxlmgxcqqg2w] = $Veca2om3awughis->d[$Vxlmgxcqqg2w] + $Vtbbah5lqvpo;
			$Veca2om3awughis->e[$Vxlmgxcqqg2w] = 0.0;
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n - 1; ++$Vfhiq1lhsoja) {
			$V51lf1kcbto4 = $Vfhiq1lhsoja;
			$Vzqw0ieauwu4 = $Veca2om3awughis->d[$Vfhiq1lhsoja];
			for ($Vzmnqyqjjodw = $Vfhiq1lhsoja+1; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				if ($Veca2om3awughis->d[$Vzmnqyqjjodw] < $Vzqw0ieauwu4) {
					$V51lf1kcbto4 = $Vzmnqyqjjodw;
					$Vzqw0ieauwu4 = $Veca2om3awughis->d[$Vzmnqyqjjodw];
				}
			}
			if ($V51lf1kcbto4 != $Vfhiq1lhsoja) {
				$Veca2om3awughis->d[$V51lf1kcbto4] = $Veca2om3awughis->d[$Vfhiq1lhsoja];
				$Veca2om3awughis->d[$Vfhiq1lhsoja] = $Vzqw0ieauwu4;
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
					$Vzqw0ieauwu4 = $Veca2om3awughis->V[$Vzmnqyqjjodw][$Vfhiq1lhsoja];
					$Veca2om3awughis->V[$Vzmnqyqjjodw][$Vfhiq1lhsoja] = $Veca2om3awughis->V[$Vzmnqyqjjodw][$V51lf1kcbto4];
					$Veca2om3awughis->V[$Vzmnqyqjjodw][$V51lf1kcbto4] = $Vzqw0ieauwu4;
				}
			}
		}
	}


	
	private function orthes () {
		$Vxlmgxcqqg2wow  = 0;
		$Vvlxmepre4koigh = $Veca2om3awughis->n-1;

		for ($Vt54vmttyjzc = $Vxlmgxcqqg2wow+1; $Vt54vmttyjzc <= $Vvlxmepre4koigh-1; ++$Vt54vmttyjzc) {
			
			$Vbqvy3ysyor0 = 0.0;
			for ($Vfhiq1lhsoja = $Vt54vmttyjzc; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
				$Vbqvy3ysyor0 = $Vbqvy3ysyor0 + abs($Veca2om3awughis->H[$Vfhiq1lhsoja][$Vt54vmttyjzc-1]);
			}
			if ($Vbqvy3ysyor0 != 0.0) {
				
				$Vvlxmepre4ko = 0.0;
				for ($Vfhiq1lhsoja = $Vvlxmepre4koigh; $Vfhiq1lhsoja >= $Vt54vmttyjzc; --$Vfhiq1lhsoja) {
					$Veca2om3awughis->ort[$Vfhiq1lhsoja] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vt54vmttyjzc-1] / $Vbqvy3ysyor0;
					$Vvlxmepre4ko += $Veca2om3awughis->ort[$Vfhiq1lhsoja] * $Veca2om3awughis->ort[$Vfhiq1lhsoja];
				}
				$Vpatv3dcvvhr = sqrt($Vvlxmepre4ko);
				if ($Veca2om3awughis->ort[$Vt54vmttyjzc] > 0) {
					$Vpatv3dcvvhr *= -1;
				}
				$Vvlxmepre4ko -= $Veca2om3awughis->ort[$Vt54vmttyjzc] * $Vpatv3dcvvhr;
				$Veca2om3awughis->ort[$Vt54vmttyjzc] -= $Vpatv3dcvvhr;
				
				
				for ($Vzmnqyqjjodw = $Vt54vmttyjzc; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
					$Vtbbah5lqvpo = 0.0;
					for ($Vfhiq1lhsoja = $Vvlxmepre4koigh; $Vfhiq1lhsoja >= $Vt54vmttyjzc; --$Vfhiq1lhsoja) {
						$Vtbbah5lqvpo += $Veca2om3awughis->ort[$Vfhiq1lhsoja] * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
					}
					$Vtbbah5lqvpo /= $Vvlxmepre4ko;
					for ($Vfhiq1lhsoja = $Vt54vmttyjzc; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vtbbah5lqvpo * $Veca2om3awughis->ort[$Vfhiq1lhsoja];
					}
				}
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
					$Vtbbah5lqvpo = 0.0;
					for ($Vzmnqyqjjodw = $Vvlxmepre4koigh; $Vzmnqyqjjodw >= $Vt54vmttyjzc; --$Vzmnqyqjjodw) {
						$Vtbbah5lqvpo += $Veca2om3awughis->ort[$Vzmnqyqjjodw] * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
					}
					$Vtbbah5lqvpo = $Vtbbah5lqvpo / $Vvlxmepre4ko;
					for ($Vzmnqyqjjodw = $Vt54vmttyjzc; $Vzmnqyqjjodw <= $Vvlxmepre4koigh; ++$Vzmnqyqjjodw) {
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw] -= $Vtbbah5lqvpo * $Veca2om3awughis->ort[$Vzmnqyqjjodw];
					}
				}
				$Veca2om3awughis->ort[$Vt54vmttyjzc] = $Vbqvy3ysyor0 * $Veca2om3awughis->ort[$Vt54vmttyjzc];
				$Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc-1] = $Vbqvy3ysyor0 * $Vpatv3dcvvhr;
			}
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Veca2om3awughis->n; ++$Vzmnqyqjjodw) {
				$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = ($Vfhiq1lhsoja == $Vzmnqyqjjodw ? 1.0 : 0.0);
			}
		}
		for ($Vt54vmttyjzc = $Vvlxmepre4koigh-1; $Vt54vmttyjzc >= $Vxlmgxcqqg2wow+1; --$Vt54vmttyjzc) {
			if ($Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc-1] != 0.0) {
				for ($Vfhiq1lhsoja = $Vt54vmttyjzc+1; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->ort[$Vfhiq1lhsoja] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vt54vmttyjzc-1];
				}
				for ($Vzmnqyqjjodw = $Vt54vmttyjzc; $Vzmnqyqjjodw <= $Vvlxmepre4koigh; ++$Vzmnqyqjjodw) {
					$Vpatv3dcvvhr = 0.0;
					for ($Vfhiq1lhsoja = $Vt54vmttyjzc; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
						$Vpatv3dcvvhr += $Veca2om3awughis->ort[$Vfhiq1lhsoja] * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
					}
					
					$Vpatv3dcvvhr = ($Vpatv3dcvvhr / $Veca2om3awughis->ort[$Vt54vmttyjzc]) / $Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc-1];
					for ($Vfhiq1lhsoja = $Vt54vmttyjzc; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] += $Vpatv3dcvvhr * $Veca2om3awughis->ort[$Vfhiq1lhsoja];
					}
				}
			}
		}
	}


	
	private function cdiv($Vjaepi5sjho5, $Vgzvguikheqd, $Vf5aesi2vwsi, $Vrqlrvpaugbc) {
		if (abs($Vf5aesi2vwsi) > abs($Vrqlrvpaugbc)) {
			$Vws44nszhvgo = $Vrqlrvpaugbc / $Vf5aesi2vwsi;
			$Vu5e1w5ehr3drec2f1japon = $Vf5aesi2vwsi + $Vws44nszhvgo * $Vrqlrvpaugbc;
			$Veca2om3awughis->cdivr = ($Vjaepi5sjho5 + $Vws44nszhvgo * $Vgzvguikheqd) / $Vu5e1w5ehr3drec2f1japon;
			$Veca2om3awughis->cdivi = ($Vgzvguikheqd - $Vws44nszhvgo * $Vjaepi5sjho5) / $Vu5e1w5ehr3drec2f1japon;
		} else {
			$Vws44nszhvgo = $Vf5aesi2vwsi / $Vrqlrvpaugbc;
			$Vu5e1w5ehr3drec2f1japon = $Vrqlrvpaugbc + $Vws44nszhvgo * $Vf5aesi2vwsi;
			$Veca2om3awughis->cdivr = ($Vws44nszhvgo * $Vjaepi5sjho5 + $Vgzvguikheqd) / $Vu5e1w5ehr3drec2f1japon;
			$Veca2om3awughis->cdivi = ($Vws44nszhvgo * $Vgzvguikheqd - $Vjaepi5sjho5) / $Vu5e1w5ehr3drec2f1japon;
		}
	}


	
	private function hqr2 () {
		
		$Vu5e1w5ehr3dmwwo1qnmepzn = $Veca2om3awughis->n;
		$Vu5e1w5ehr3dmwwo1qnmepz  = $Vu5e1w5ehr3dmwwo1qnmepzn - 1;
		$Vxlmgxcqqg2wow = 0;
		$Vvlxmepre4koigh = $Vu5e1w5ehr3dmwwo1qnmepzn - 1;
		$Vu5e1w5ehr3dnhm0uuykimvps = pow(2.0, -52.0);
		$Vu5e1w5ehr3dnhm0uuykimvxshift = 0.0;
		$Vzqw0ieauwu4 = $Vl2c3boclu2o = $Vws44nszhvgo = $V2n430jknk35 = $V3pn4yoebl40 = 0;
		
		$Vu5e1w5ehr3dmwwo1qnmepzorm = 0.0;

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vfhiq1lhsoja) {
			if (($Vfhiq1lhsoja < $Vxlmgxcqqg2wow) OR ($Vfhiq1lhsoja > $Vvlxmepre4koigh)) {
				$Veca2om3awughis->d[$Vfhiq1lhsoja] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja];
				$Veca2om3awughis->e[$Vfhiq1lhsoja] = 0.0;
			}
			for ($Vzmnqyqjjodw = max($Vfhiq1lhsoja-1, 0); $Vzmnqyqjjodw < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vzmnqyqjjodw) {
				$Vu5e1w5ehr3dmwwo1qnmepzorm = $Vu5e1w5ehr3dmwwo1qnmepzorm + abs($Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
			}
		}

		
		$Vfhiq1lhsojater = 0;
		while ($Vu5e1w5ehr3dmwwo1qnmepz >= $Vxlmgxcqqg2wow) {
			
			$Vxlmgxcqqg2w = $Vu5e1w5ehr3dmwwo1qnmepz;
			while ($Vxlmgxcqqg2w > $Vxlmgxcqqg2wow) {
				$V2n430jknk35 = abs($Veca2om3awughis->H[$Vxlmgxcqqg2w-1][$Vxlmgxcqqg2w-1]) + abs($Veca2om3awughis->H[$Vxlmgxcqqg2w][$Vxlmgxcqqg2w]);
				if ($V2n430jknk35 == 0.0) {
					$V2n430jknk35 = $Vu5e1w5ehr3dmwwo1qnmepzorm;
				}
				if (abs($Veca2om3awughis->H[$Vxlmgxcqqg2w][$Vxlmgxcqqg2w-1]) < $Vu5e1w5ehr3dnhm0uuykimvps * $V2n430jknk35) {
					break;
				}
				--$Vxlmgxcqqg2w;
			}
			
			
			if ($Vxlmgxcqqg2w == $Vu5e1w5ehr3dmwwo1qnmepz) {
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] + $Vu5e1w5ehr3dnhm0uuykimvxshift;
				$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz];
				$Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz] = 0.0;
				--$Vu5e1w5ehr3dmwwo1qnmepz;
				$Vfhiq1lhsojater = 0;
			
			} else if ($Vxlmgxcqqg2w == $Vu5e1w5ehr3dmwwo1qnmepz-1) {
				$Vwsgifrh5ics = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1] * $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz];
				$Vzqw0ieauwu4 = ($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] - $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz]) / 2.0;
				$Vl2c3boclu2o = $Vzqw0ieauwu4 * $Vzqw0ieauwu4 + $Vwsgifrh5ics;
				$V3pn4yoebl40 = sqrt(abs($Vl2c3boclu2o));
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] + $Vu5e1w5ehr3dnhm0uuykimvxshift;
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] + $Vu5e1w5ehr3dnhm0uuykimvxshift;
				$V1e1eaicqarh = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz];
				
				if ($Vl2c3boclu2o >= 0) {
					if ($Vzqw0ieauwu4 >= 0) {
						$V3pn4yoebl40 = $Vzqw0ieauwu4 + $V3pn4yoebl40;
					} else {
						$V3pn4yoebl40 = $Vzqw0ieauwu4 - $V3pn4yoebl40;
					}
					$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz-1] = $V1e1eaicqarh + $V3pn4yoebl40;
					$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz-1];
					if ($V3pn4yoebl40 != 0.0) {
						$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz] = $V1e1eaicqarh - $Vwsgifrh5ics / $V3pn4yoebl40;
					}
					$Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz-1] = 0.0;
					$Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz] = 0.0;
					$V1e1eaicqarh = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1];
					$V2n430jknk35 = abs($V1e1eaicqarh) + abs($V3pn4yoebl40);
					$Vzqw0ieauwu4 = $V1e1eaicqarh / $V2n430jknk35;
					$Vl2c3boclu2o = $V3pn4yoebl40 / $V2n430jknk35;
					$Vws44nszhvgo = sqrt($Vzqw0ieauwu4 * $Vzqw0ieauwu4 + $Vl2c3boclu2o * $Vl2c3boclu2o);
					$Vzqw0ieauwu4 = $Vzqw0ieauwu4 / $Vws44nszhvgo;
					$Vl2c3boclu2o = $Vl2c3boclu2o / $Vws44nszhvgo;
					
					for ($Vzmnqyqjjodw = $Vu5e1w5ehr3dmwwo1qnmepz-1; $Vzmnqyqjjodw < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vzmnqyqjjodw) {
						$V3pn4yoebl40 = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vzmnqyqjjodw];
						$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vzmnqyqjjodw] = $Vl2c3boclu2o * $V3pn4yoebl40 + $Vzqw0ieauwu4 * $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vzmnqyqjjodw];
						$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vzmnqyqjjodw] = $Vl2c3boclu2o * $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vzmnqyqjjodw] - $Vzqw0ieauwu4 * $V3pn4yoebl40;
					}
					
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= n; ++$Vfhiq1lhsoja) {
						$V3pn4yoebl40 = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1];
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Vl2c3boclu2o * $V3pn4yoebl40 + $Vzqw0ieauwu4 * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz];
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] = $Vl2c3boclu2o * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] - $Vzqw0ieauwu4 * $V3pn4yoebl40;
					}
					
					for ($Vfhiq1lhsoja = $Vxlmgxcqqg2wow; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
						$V3pn4yoebl40 = $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1];
						$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Vl2c3boclu2o * $V3pn4yoebl40 + $Vzqw0ieauwu4 * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz];
						$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] = $Vl2c3boclu2o * $Veca2om3awughis->V[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] - $Vzqw0ieauwu4 * $V3pn4yoebl40;
					}
				
				} else {
					$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz-1] = $V1e1eaicqarh + $Vzqw0ieauwu4;
					$Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz] = $V1e1eaicqarh + $Vzqw0ieauwu4;
					$Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz-1] = $V3pn4yoebl40;
					$Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz] = -$V3pn4yoebl40;
				}
				$Vu5e1w5ehr3dmwwo1qnmepz = $Vu5e1w5ehr3dmwwo1qnmepz - 2;
				$Vfhiq1lhsojater = 0;
			
			} else {
				
				$V1e1eaicqarh = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz];
				$Vqwmp2bx0ii2 = 0.0;
				$Vwsgifrh5ics = 0.0;
				if ($Vxlmgxcqqg2w < $Vu5e1w5ehr3dmwwo1qnmepz) {
					$Vqwmp2bx0ii2 = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1];
					$Vwsgifrh5ics = $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1] * $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz];
				}
				
				if ($Vfhiq1lhsojater == 10) {
					$Vu5e1w5ehr3dnhm0uuykimvxshift += $V1e1eaicqarh;
					for ($Vfhiq1lhsoja = $Vxlmgxcqqg2wow; $Vfhiq1lhsoja <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vfhiq1lhsoja) {
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja] -= $V1e1eaicqarh;
					}
					$V2n430jknk35 = abs($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1]) + abs($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-2]);
					$V1e1eaicqarh = $Vqwmp2bx0ii2 = 0.75 * $V2n430jknk35;
					$Vwsgifrh5ics = -0.4375 * $V2n430jknk35 * $V2n430jknk35;
				}
				
				if ($Vfhiq1lhsojater == 30) {
					$V2n430jknk35 = ($Vqwmp2bx0ii2 - $V1e1eaicqarh) / 2.0;
					$V2n430jknk35 = $V2n430jknk35 * $V2n430jknk35 + $Vwsgifrh5ics;
					if ($V2n430jknk35 > 0) {
						$V2n430jknk35 = sqrt($V2n430jknk35);
						if ($Vqwmp2bx0ii2 < $V1e1eaicqarh) {
							$V2n430jknk35 = -$V2n430jknk35;
						}
						$V2n430jknk35 = $V1e1eaicqarh - $Vwsgifrh5ics / (($Vqwmp2bx0ii2 - $V1e1eaicqarh) / 2.0 + $V2n430jknk35);
						for ($Vfhiq1lhsoja = $Vxlmgxcqqg2wow; $Vfhiq1lhsoja <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vfhiq1lhsoja) {
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja] -= $V2n430jknk35;
						}
						$Vu5e1w5ehr3dnhm0uuykimvxshift += $V2n430jknk35;
						$V1e1eaicqarh = $Vqwmp2bx0ii2 = $Vwsgifrh5ics = 0.964;
					}
				}
				
				$Vfhiq1lhsojater = $Vfhiq1lhsojater + 1;
				
				$Vt54vmttyjzc = $Vu5e1w5ehr3dmwwo1qnmepz - 2;
				while ($Vt54vmttyjzc >= $Vxlmgxcqqg2w) {
					$V3pn4yoebl40 = $Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc];
					$Vws44nszhvgo = $V1e1eaicqarh - $V3pn4yoebl40;
					$V2n430jknk35 = $Vqwmp2bx0ii2 - $V3pn4yoebl40;
					$Vzqw0ieauwu4 = ($Vws44nszhvgo * $V2n430jknk35 - $Vwsgifrh5ics) / $Veca2om3awughis->H[$Vt54vmttyjzc+1][$Vt54vmttyjzc] + $Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc+1];
					$Vl2c3boclu2o = $Veca2om3awughis->H[$Vt54vmttyjzc+1][$Vt54vmttyjzc+1] - $V3pn4yoebl40 - $Vws44nszhvgo - $V2n430jknk35;
					$Vws44nszhvgo = $Veca2om3awughis->H[$Vt54vmttyjzc+2][$Vt54vmttyjzc+1];
					$V2n430jknk35 = abs($Vzqw0ieauwu4) + abs($Vl2c3boclu2o) + abs($Vws44nszhvgo);
					$Vzqw0ieauwu4 = $Vzqw0ieauwu4 / $V2n430jknk35;
					$Vl2c3boclu2o = $Vl2c3boclu2o / $V2n430jknk35;
					$Vws44nszhvgo = $Vws44nszhvgo / $V2n430jknk35;
					if ($Vt54vmttyjzc == $Vxlmgxcqqg2w) {
						break;
					}
					if (abs($Veca2om3awughis->H[$Vt54vmttyjzc][$Vt54vmttyjzc-1]) * (abs($Vl2c3boclu2o) + abs($Vws44nszhvgo)) <
						$Vu5e1w5ehr3dnhm0uuykimvps * (abs($Vzqw0ieauwu4) * (abs($Veca2om3awughis->H[$Vt54vmttyjzc-1][$Vt54vmttyjzc-1]) + abs($V3pn4yoebl40) + abs($Veca2om3awughis->H[$Vt54vmttyjzc+1][$Vt54vmttyjzc+1])))) {
						break;
					}
					--$Vt54vmttyjzc;
				}
				for ($Vfhiq1lhsoja = $Vt54vmttyjzc + 2; $Vfhiq1lhsoja <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vfhiq1lhsoja) {
					$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja-2] = 0.0;
					if ($Vfhiq1lhsoja > $Vt54vmttyjzc+2) {
						$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja-3] = 0.0;
					}
				}
				
				for ($V51lf1kcbto4 = $Vt54vmttyjzc; $V51lf1kcbto4 <= $Vu5e1w5ehr3dmwwo1qnmepz-1; ++$V51lf1kcbto4) {
					$Vu5e1w5ehr3dmwwo1qnmepzotlast = ($V51lf1kcbto4 != $Vu5e1w5ehr3dmwwo1qnmepz-1);
					if ($V51lf1kcbto4 != $Vt54vmttyjzc) {
						$Vzqw0ieauwu4 = $Veca2om3awughis->H[$V51lf1kcbto4][$V51lf1kcbto4-1];
						$Vl2c3boclu2o = $Veca2om3awughis->H[$V51lf1kcbto4+1][$V51lf1kcbto4-1];
						$Vws44nszhvgo = ($Vu5e1w5ehr3dmwwo1qnmepzotlast ? $Veca2om3awughis->H[$V51lf1kcbto4+2][$V51lf1kcbto4-1] : 0.0);
						$V1e1eaicqarh = abs($Vzqw0ieauwu4) + abs($Vl2c3boclu2o) + abs($Vws44nszhvgo);
						if ($V1e1eaicqarh != 0.0) {
							$Vzqw0ieauwu4 = $Vzqw0ieauwu4 / $V1e1eaicqarh;
							$Vl2c3boclu2o = $Vl2c3boclu2o / $V1e1eaicqarh;
							$Vws44nszhvgo = $Vws44nszhvgo / $V1e1eaicqarh;
						}
					}
					if ($V1e1eaicqarh == 0.0) {
						break;
					}
					$V2n430jknk35 = sqrt($Vzqw0ieauwu4 * $Vzqw0ieauwu4 + $Vl2c3boclu2o * $Vl2c3boclu2o + $Vws44nszhvgo * $Vws44nszhvgo);
					if ($Vzqw0ieauwu4 < 0) {
						$V2n430jknk35 = -$V2n430jknk35;
					}
					if ($V2n430jknk35 != 0) {
						if ($V51lf1kcbto4 != $Vt54vmttyjzc) {
							$Veca2om3awughis->H[$V51lf1kcbto4][$V51lf1kcbto4-1] = -$V2n430jknk35 * $V1e1eaicqarh;
						} elseif ($Vxlmgxcqqg2w != $Vt54vmttyjzc) {
							$Veca2om3awughis->H[$V51lf1kcbto4][$V51lf1kcbto4-1] = -$Veca2om3awughis->H[$V51lf1kcbto4][$V51lf1kcbto4-1];
						}
						$Vzqw0ieauwu4 = $Vzqw0ieauwu4 + $V2n430jknk35;
						$V1e1eaicqarh = $Vzqw0ieauwu4 / $V2n430jknk35;
						$Vqwmp2bx0ii2 = $Vl2c3boclu2o / $V2n430jknk35;
						$V3pn4yoebl40 = $Vws44nszhvgo / $V2n430jknk35;
						$Vl2c3boclu2o = $Vl2c3boclu2o / $Vzqw0ieauwu4;
						$Vws44nszhvgo = $Vws44nszhvgo / $Vzqw0ieauwu4;
						
						for ($Vzmnqyqjjodw = $V51lf1kcbto4; $Vzmnqyqjjodw < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vzmnqyqjjodw) {
							$Vzqw0ieauwu4 = $Veca2om3awughis->H[$V51lf1kcbto4][$Vzmnqyqjjodw] + $Vl2c3boclu2o * $Veca2om3awughis->H[$V51lf1kcbto4+1][$Vzmnqyqjjodw];
							if ($Vu5e1w5ehr3dmwwo1qnmepzotlast) {
								$Vzqw0ieauwu4 = $Vzqw0ieauwu4 + $Vws44nszhvgo * $Veca2om3awughis->H[$V51lf1kcbto4+2][$Vzmnqyqjjodw];
								$Veca2om3awughis->H[$V51lf1kcbto4+2][$Vzmnqyqjjodw] = $Veca2om3awughis->H[$V51lf1kcbto4+2][$Vzmnqyqjjodw] - $Vzqw0ieauwu4 * $V3pn4yoebl40;
							}
							$Veca2om3awughis->H[$V51lf1kcbto4][$Vzmnqyqjjodw] = $Veca2om3awughis->H[$V51lf1kcbto4][$Vzmnqyqjjodw] - $Vzqw0ieauwu4 * $V1e1eaicqarh;
							$Veca2om3awughis->H[$V51lf1kcbto4+1][$Vzmnqyqjjodw] = $Veca2om3awughis->H[$V51lf1kcbto4+1][$Vzmnqyqjjodw] - $Vzqw0ieauwu4 * $Vqwmp2bx0ii2;
						}
						
						for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= min($Vu5e1w5ehr3dmwwo1qnmepz, $V51lf1kcbto4+3); ++$Vfhiq1lhsoja) {
							$Vzqw0ieauwu4 = $V1e1eaicqarh * $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4] + $Vqwmp2bx0ii2 * $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+1];
							if ($Vu5e1w5ehr3dmwwo1qnmepzotlast) {
								$Vzqw0ieauwu4 = $Vzqw0ieauwu4 + $V3pn4yoebl40 * $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+2];
								$Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+2] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+2] - $Vzqw0ieauwu4 * $Vws44nszhvgo;
							}
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4] - $Vzqw0ieauwu4;
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+1] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$V51lf1kcbto4+1] - $Vzqw0ieauwu4 * $Vl2c3boclu2o;
						}
						
						for ($Vfhiq1lhsoja = $Vxlmgxcqqg2wow; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
							$Vzqw0ieauwu4 = $V1e1eaicqarh * $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] + $Vqwmp2bx0ii2 * $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+1];
							if ($Vu5e1w5ehr3dmwwo1qnmepzotlast) {
								$Vzqw0ieauwu4 = $Vzqw0ieauwu4 + $V3pn4yoebl40 * $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+2];
								$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+2] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+2] - $Vzqw0ieauwu4 * $Vws44nszhvgo;
							}
							$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] - $Vzqw0ieauwu4;
							$Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+1] = $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4+1] - $Vzqw0ieauwu4 * $Vl2c3boclu2o;
						}
					}  
				}  
			}  
		}  

		
		if ($Vu5e1w5ehr3dmwwo1qnmepzorm == 0.0) {
			return;
		}

		for ($Vu5e1w5ehr3dmwwo1qnmepz = $Vu5e1w5ehr3dmwwo1qnmepzn-1; $Vu5e1w5ehr3dmwwo1qnmepz >= 0; --$Vu5e1w5ehr3dmwwo1qnmepz) {
			$Vzqw0ieauwu4 = $Veca2om3awughis->d[$Vu5e1w5ehr3dmwwo1qnmepz];
			$Vl2c3boclu2o = $Veca2om3awughis->e[$Vu5e1w5ehr3dmwwo1qnmepz];
			
			if ($Vl2c3boclu2o == 0) {
				$Vxlmgxcqqg2w = $Vu5e1w5ehr3dmwwo1qnmepz;
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] = 1.0;
				for ($Vfhiq1lhsoja = $Vu5e1w5ehr3dmwwo1qnmepz-1; $Vfhiq1lhsoja >= 0; --$Vfhiq1lhsoja) {
					$Vwsgifrh5ics = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja] - $Vzqw0ieauwu4;
					$Vws44nszhvgo = 0.0;
					for ($Vzmnqyqjjodw = $Vxlmgxcqqg2w; $Vzmnqyqjjodw <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vzmnqyqjjodw) {
						$Vws44nszhvgo = $Vws44nszhvgo + $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw] * $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz];
					}
					if ($Veca2om3awughis->e[$Vfhiq1lhsoja] < 0.0) {
						$V3pn4yoebl40 = $Vwsgifrh5ics;
						$V2n430jknk35 = $Vws44nszhvgo;
					} else {
						$Vxlmgxcqqg2w = $Vfhiq1lhsoja;
						if ($Veca2om3awughis->e[$Vfhiq1lhsoja] == 0.0) {
							if ($Vwsgifrh5ics != 0.0) {
								$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] = -$Vws44nszhvgo / $Vwsgifrh5ics;
							} else {
								$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] = -$Vws44nszhvgo / ($Vu5e1w5ehr3dnhm0uuykimvps * $Vu5e1w5ehr3dmwwo1qnmepzorm);
							}
						
						} else {
							$V1e1eaicqarh = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja+1];
							$Vqwmp2bx0ii2 = $Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vfhiq1lhsoja];
							$Vl2c3boclu2o = ($Veca2om3awughis->d[$Vfhiq1lhsoja] - $Vzqw0ieauwu4) * ($Veca2om3awughis->d[$Vfhiq1lhsoja] - $Vzqw0ieauwu4) + $Veca2om3awughis->e[$Vfhiq1lhsoja] * $Veca2om3awughis->e[$Vfhiq1lhsoja];
							$Veca2om3awug = ($V1e1eaicqarh * $V2n430jknk35 - $V3pn4yoebl40 * $Vws44nszhvgo) / $Vl2c3boclu2o;
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awug;
							if (abs($V1e1eaicqarh) > abs($V3pn4yoebl40)) {
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz] = (-$Vws44nszhvgo - $Vwsgifrh5ics * $Veca2om3awug) / $V1e1eaicqarh;
							} else {
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz] = (-$V2n430jknk35 - $Vqwmp2bx0ii2 * $Veca2om3awug) / $V3pn4yoebl40;
							}
						}
						
						$Veca2om3awug = abs($Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz]);
						if (($Vu5e1w5ehr3dnhm0uuykimvps * $Veca2om3awug) * $Veca2om3awug > 1) {
							for ($Vzmnqyqjjodw = $Vfhiq1lhsoja; $Vzmnqyqjjodw <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vzmnqyqjjodw) {
								$Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz] = $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz] / $Veca2om3awug;
							}
						}
					}
				}
			
			} else if ($Vl2c3boclu2o < 0) {
				$Vxlmgxcqqg2w = $Vu5e1w5ehr3dmwwo1qnmepz-1;
				
				if (abs($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1]) > abs($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz])) {
					$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Vl2c3boclu2o / $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1];
					$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz] = -($Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] - $Vzqw0ieauwu4) / $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1];
				} else {
					$Veca2om3awughis->cdiv(0.0, -$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz], $Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] - $Vzqw0ieauwu4, $Vl2c3boclu2o);
					$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->cdivr;
					$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz-1][$Vu5e1w5ehr3dmwwo1qnmepz]   = $Veca2om3awughis->cdivi;
				}
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz-1] = 0.0;
				$Veca2om3awughis->H[$Vu5e1w5ehr3dmwwo1qnmepz][$Vu5e1w5ehr3dmwwo1qnmepz] = 1.0;
				for ($Vfhiq1lhsoja = $Vu5e1w5ehr3dmwwo1qnmepz-2; $Vfhiq1lhsoja >= 0; --$Vfhiq1lhsoja) {
					
					$Vws44nszhvgoa = 0.0;
					$V2n430jknk35a = 0.0;
					for ($Vzmnqyqjjodw = $Vxlmgxcqqg2w; $Vzmnqyqjjodw <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vzmnqyqjjodw) {
						$Vws44nszhvgoa = $Vws44nszhvgoa + $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw] * $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz-1];
						$V2n430jknk35a = $V2n430jknk35a + $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw] * $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz];
					}
					$Vwsgifrh5ics = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja] - $Vzqw0ieauwu4;
					if ($Veca2om3awughis->e[$Vfhiq1lhsoja] < 0.0) {
						$V3pn4yoebl40 = $Vwsgifrh5ics;
						$Vws44nszhvgo = $Vws44nszhvgoa;
						$V2n430jknk35 = $V2n430jknk35a;
					} else {
						$Vxlmgxcqqg2w = $Vfhiq1lhsoja;
						if ($Veca2om3awughis->e[$Vfhiq1lhsoja] == 0) {
							$Veca2om3awughis->cdiv(-$Vws44nszhvgoa, -$V2n430jknk35a, $Vwsgifrh5ics, $Vl2c3boclu2o);
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->cdivr;
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz]   = $Veca2om3awughis->cdivi;
						} else {
							
							$V1e1eaicqarh = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vfhiq1lhsoja+1];
							$Vqwmp2bx0ii2 = $Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vfhiq1lhsoja];
							$Vfp4to5lfhjo = ($Veca2om3awughis->d[$Vfhiq1lhsoja] - $Vzqw0ieauwu4) * ($Veca2om3awughis->d[$Vfhiq1lhsoja] - $Vzqw0ieauwu4) + $Veca2om3awughis->e[$Vfhiq1lhsoja] * $Veca2om3awughis->e[$Vfhiq1lhsoja] - $Vl2c3boclu2o * $Vl2c3boclu2o;
							$V0vx3wien3fp = ($Veca2om3awughis->d[$Vfhiq1lhsoja] - $Vzqw0ieauwu4) * 2.0 * $Vl2c3boclu2o;
							if ($Vfp4to5lfhjo == 0.0 & $V0vx3wien3fp == 0.0) {
								$Vfp4to5lfhjo = $Vu5e1w5ehr3dnhm0uuykimvps * $Vu5e1w5ehr3dmwwo1qnmepzorm * (abs($Vwsgifrh5ics) + abs($Vl2c3boclu2o) + abs($V1e1eaicqarh) + abs($Vqwmp2bx0ii2) + abs($V3pn4yoebl40));
							}
							$Veca2om3awughis->cdiv($V1e1eaicqarh * $Vws44nszhvgo - $V3pn4yoebl40 * $Vws44nszhvgoa + $Vl2c3boclu2o * $V2n430jknk35a, $V1e1eaicqarh * $V2n430jknk35 - $V3pn4yoebl40 * $V2n430jknk35a - $Vl2c3boclu2o * $Vws44nszhvgoa, $Vfp4to5lfhjo, $V0vx3wien3fp);
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->cdivr;
							$Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz]   = $Veca2om3awughis->cdivi;
							if (abs($V1e1eaicqarh) > (abs($V3pn4yoebl40) + abs($Vl2c3boclu2o))) {
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz-1] = (-$Vws44nszhvgoa - $Vwsgifrh5ics * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1] + $Vl2c3boclu2o * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz]) / $V1e1eaicqarh;
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz] = (-$V2n430jknk35a - $Vwsgifrh5ics * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz] - $Vl2c3boclu2o * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1]) / $V1e1eaicqarh;
							} else {
								$Veca2om3awughis->cdiv(-$Vws44nszhvgo - $Vqwmp2bx0ii2 * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1], -$V2n430jknk35 - $Vqwmp2bx0ii2 * $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz], $V3pn4yoebl40, $Vl2c3boclu2o);
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->cdivr;
								$Veca2om3awughis->H[$Vfhiq1lhsoja+1][$Vu5e1w5ehr3dmwwo1qnmepz]   = $Veca2om3awughis->cdivi;
							}
						}
						
						$Veca2om3awug = max(abs($Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz-1]),abs($Veca2om3awughis->H[$Vfhiq1lhsoja][$Vu5e1w5ehr3dmwwo1qnmepz]));
						if (($Vu5e1w5ehr3dnhm0uuykimvps * $Veca2om3awug) * $Veca2om3awug > 1) {
							for ($Vzmnqyqjjodw = $Vfhiq1lhsoja; $Vzmnqyqjjodw <= $Vu5e1w5ehr3dmwwo1qnmepz; ++$Vzmnqyqjjodw) {
								$Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz-1] = $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz-1] / $Veca2om3awug;
								$Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz]   = $Veca2om3awughis->H[$Vzmnqyqjjodw][$Vu5e1w5ehr3dmwwo1qnmepz] / $Veca2om3awug;
							}
						}
					} 
				} 
			} 
		} 

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vfhiq1lhsoja) {
			if ($Vfhiq1lhsoja < $Vxlmgxcqqg2wow | $Vfhiq1lhsoja > $Vvlxmepre4koigh) {
				for ($Vzmnqyqjjodw = $Vfhiq1lhsoja; $Vzmnqyqjjodw < $Vu5e1w5ehr3dmwwo1qnmepzn; ++$Vzmnqyqjjodw) {
					$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Veca2om3awughis->H[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
				}
			}
		}

		
		for ($Vzmnqyqjjodw = $Vu5e1w5ehr3dmwwo1qnmepzn-1; $Vzmnqyqjjodw >= $Vxlmgxcqqg2wow; --$Vzmnqyqjjodw) {
			for ($Vfhiq1lhsoja = $Vxlmgxcqqg2wow; $Vfhiq1lhsoja <= $Vvlxmepre4koigh; ++$Vfhiq1lhsoja) {
				$V3pn4yoebl40 = 0.0;
				for ($V51lf1kcbto4 = $Vxlmgxcqqg2wow; $V51lf1kcbto4 <= min($Vzmnqyqjjodw,$Vvlxmepre4koigh); ++$V51lf1kcbto4) {
					$V3pn4yoebl40 = $V3pn4yoebl40 + $Veca2om3awughis->V[$Vfhiq1lhsoja][$V51lf1kcbto4] * $Veca2om3awughis->H[$V51lf1kcbto4][$Vzmnqyqjjodw];
				}
				$Veca2om3awughis->V[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V3pn4yoebl40;
			}
		}
	} 


	
	public function __construct($Vstaxdaonlbv) {
		$Veca2om3awughis->A = $Vstaxdaonlbv->getArray();
		$Veca2om3awughis->n = $Vstaxdaonlbv->getColumnDimension();

		$Vu5e1w5ehr3d3yvsulagrra = true;
		for ($Vzmnqyqjjodw = 0; ($Vzmnqyqjjodw < $Veca2om3awughis->n) & $Vu5e1w5ehr3d3yvsulagrra; ++$Vzmnqyqjjodw) {
			for ($Vfhiq1lhsoja = 0; ($Vfhiq1lhsoja < $Veca2om3awughis->n) & $Vu5e1w5ehr3d3yvsulagrra; ++$Vfhiq1lhsoja) {
				$Vu5e1w5ehr3d3yvsulagrra = ($Veca2om3awughis->A[$Vfhiq1lhsoja][$Vzmnqyqjjodw] == $Veca2om3awughis->A[$Vzmnqyqjjodw][$Vfhiq1lhsoja]);
			}
		}

		if ($Vu5e1w5ehr3d3yvsulagrra) {
			$Veca2om3awughis->V = $Veca2om3awughis->A;
			
			$Veca2om3awughis->tred2();
			
			$Veca2om3awughis->tql2();
		} else {
			$Veca2om3awughis->H = $Veca2om3awughis->A;
			$Veca2om3awughis->ort = array();
			
			$Veca2om3awughis->orthes();
			
			$Veca2om3awughis->hqr2();
		}
	}


	
	public function getV() {
		return new Matrix($Veca2om3awughis->V, $Veca2om3awughis->n, $Veca2om3awughis->n);
	}


	
	public function getRealEigenvalues() {
		return $Veca2om3awughis->d;
	}


	
	public function getImagEigenvalues() {
		return $Veca2om3awughis->e;
	}


	
	public function getD() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Veca2om3awughis->n; ++$Vfhiq1lhsoja) {
			$Vdcqwqaps4qc[$Vfhiq1lhsoja] = array_fill(0, $Veca2om3awughis->n, 0.0);
			$Vdcqwqaps4qc[$Vfhiq1lhsoja][$Vfhiq1lhsoja] = $Veca2om3awughis->d[$Vfhiq1lhsoja];
			if ($Veca2om3awughis->e[$Vfhiq1lhsoja] == 0) {
				continue;
			}
			$Vrs2mt5pfpsv = ($Veca2om3awughis->e[$Vfhiq1lhsoja] > 0) ? $Vfhiq1lhsoja + 1 : $Vfhiq1lhsoja - 1;
			$Vdcqwqaps4qc[$Vfhiq1lhsoja][$Vrs2mt5pfpsv] = $Veca2om3awughis->e[$Vfhiq1lhsoja];
		}
		return new Matrix($Vdcqwqaps4qc);
	}

}	
