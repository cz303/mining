<?php




class PHPExcel_Shared_PasswordHasher
{
	
	public static function hashPassword($Vis1rgbmupxf = '') {
        $Vsnnardgofbr	= 0x0000;
        $V5tk0vbynhsd	= 1;       

        
        $Vkeq2p2m0vf4 = preg_split('//', $Vis1rgbmupxf, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($Vkeq2p2m0vf4 as $V1ciechb1uvs) {
            $Vp4xjtpabm0l			= ord($V1ciechb1uvs) << $V5tk0vbynhsd++;	
            $Veakestkraeo	= $Vp4xjtpabm0l >> 15;				
            $Vp4xjtpabm0l			&= 0x7fff;					
            $Vsnnardgofbr		^= ($Vp4xjtpabm0l | $Veakestkraeo);
        }

        $Vsnnardgofbr ^= strlen($Vis1rgbmupxf);
        $Vsnnardgofbr ^= 0xCE4B;

        return(strtoupper(dechex($Vsnnardgofbr)));
	}
}
