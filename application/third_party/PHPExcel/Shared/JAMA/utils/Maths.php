<?php

function hypo($Vi3y3l1uvwp3, $V4t3fwdd3eev) {
	if (abs($Vi3y3l1uvwp3) > abs($V4t3fwdd3eev)) {
		$Vws44nszhvgo = $V4t3fwdd3eev / $Vi3y3l1uvwp3;
		$Vws44nszhvgo = abs($Vi3y3l1uvwp3) * sqrt(1 + $Vws44nszhvgo * $Vws44nszhvgo);
	} elseif ($V4t3fwdd3eev != 0) {
		$Vws44nszhvgo = $Vi3y3l1uvwp3 / $V4t3fwdd3eev;
		$Vws44nszhvgo = abs($V4t3fwdd3eev) * sqrt(1 + $Vws44nszhvgo * $Vws44nszhvgo);
	} else {
		$Vws44nszhvgo = 0.0;
	}
	return $Vws44nszhvgo;
}	



