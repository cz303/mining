<?php




class PHPExcel_Shared_Drawing
{
	
	public static function pixelsToEMU($Vqujkwol1zut = 0) {
		return round($Vqujkwol1zut * 9525);
	}

	
	public static function EMUToPixels($Vqujkwol1zut = 0) {
		if ($Vqujkwol1zut != 0) {
			return round($Vqujkwol1zut / 9525);
		} else {
			return 0;
		}
	}

	
	public static function pixelsToCellDimension($Vqujkwol1zut = 0, PHPExcel_Style_Font $Vyr2zvgmseqo) {
		
		$Vcvluzjs3wzb = $Vyr2zvgmseqo->getName();
		$V4jbadwq4bzj = $Vyr2zvgmseqo->getSize();

		if (isset(PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj])) {
			
			$Vpvup211qafg = $Vqujkwol1zut
				* PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj]['width']
				/ PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj]['px'];
		} else {
			
			
			$Vpvup211qafg = $Vqujkwol1zut * 11
				* PHPExcel_Shared_Font::$Vr2nh5x40fe1['Calibri'][11]['width']
				/ PHPExcel_Shared_Font::$Vr2nh5x40fe1['Calibri'][11]['px'] / $V4jbadwq4bzj;
		}

		return $Vpvup211qafg;
	}

	
	public static function cellDimensionToPixels($Vqujkwol1zut = 0, PHPExcel_Style_Font $Vyr2zvgmseqo) {
		
		$Vcvluzjs3wzb = $Vyr2zvgmseqo->getName();
		$V4jbadwq4bzj = $Vyr2zvgmseqo->getSize();

		if (isset(PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj])) {
			
			$Vpvup211qafg = $Vqujkwol1zut
				* PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj]['px']
				/ PHPExcel_Shared_Font::$Vr2nh5x40fe1[$Vcvluzjs3wzb][$V4jbadwq4bzj]['width'];

		} else {
			
			
			$Vpvup211qafg = $Vqujkwol1zut * $V4jbadwq4bzj
				* PHPExcel_Shared_Font::$Vr2nh5x40fe1['Calibri'][11]['px']
				/ PHPExcel_Shared_Font::$Vr2nh5x40fe1['Calibri'][11]['width'] / 11;
		}

		
		$Vpvup211qafg = (int) round($Vpvup211qafg);

		return $Vpvup211qafg;
	}

	
	public static function pixelsToPoints($Vqujkwol1zut = 0) {
		return $Vqujkwol1zut * 0.67777777;
	}

	
	public static function pointsToPixels($Vqujkwol1zut = 0) {
		if ($Vqujkwol1zut != 0) {
			return (int) ceil($Vqujkwol1zut * 1.333333333);
		} else {
			return 0;
		}
	}

	
	public static function degreesToAngle($Vqujkwol1zut = 0) {
		return (int)round($Vqujkwol1zut * 60000);
	}

	
	public static function angleToDegrees($Vqujkwol1zut = 0) {
		if ($Vqujkwol1zut != 0) {
			return round($Vqujkwol1zut / 60000);
		} else {
			return 0;
		}
	}

	
	public static function imagecreatefrombmp($Ve5flafltbco)
	{
        
        $Vg5mhfl1beoi    =    fopen($Ve5flafltbco,"rb");
        $Vjxfewwyhwtv    =    fread($Vg5mhfl1beoi,10);
        while(!feof($Vg5mhfl1beoi)&&($Vjxfewwyhwtv<>""))
            $Vjxfewwyhwtv    .=    fread($Vg5mhfl1beoi,1024);

        $Vcartbxounrh    =    unpack("H*",$Vjxfewwyhwtv);
        $V0o3f1vps5ku    =    $Vcartbxounrh[1];
        $Vl5rjgb1nsf3    =    substr($V0o3f1vps5ku,0,108);

        
        
        if (substr($Vl5rjgb1nsf3,0,4)=="424d")
        {
            
            $Vl5rjgb1nsf3_parts    =    str_split($Vl5rjgb1nsf3,2);

            
            $Vojs2qdgagwv            =    hexdec($Vl5rjgb1nsf3_parts[19].$Vl5rjgb1nsf3_parts[18]);

            
            $Vzo4g5xb4yip            =    hexdec($Vl5rjgb1nsf3_parts[23].$Vl5rjgb1nsf3_parts[22]);

            
            unset($Vl5rjgb1nsf3_parts);
        }

        
        $V1e1eaicqarh                =    0;
        $Vqwmp2bx0ii2                =    1;

        
        $Vo4t2ytzfwtl            =    imagecreatetruecolor($Vojs2qdgagwv,$Vzo4g5xb4yip);

        
        $V52ujzwbr0ov            =    substr($V0o3f1vps5ku,108);

        
        
        
        $V52ujzwbr0ov_size        =    (strlen($V52ujzwbr0ov)/2);
        $Vl5rjgb1nsf3_size    =    ($Vojs2qdgagwv*$Vzo4g5xb4yip);

        
        $Vokphtqklm2t        =    ($V52ujzwbr0ov_size>($Vl5rjgb1nsf3_size*3)+4);

        
        
        for ($Vfhiq1lhsoja=0;$Vfhiq1lhsoja<$V52ujzwbr0ov_size;$Vfhiq1lhsoja+=3)
        {
            
            if ($V1e1eaicqarh>=$Vojs2qdgagwv)
            {
                
                
                if ($Vokphtqklm2t)
                    $Vfhiq1lhsoja    +=    $Vojs2qdgagwv%4;

                
                $V1e1eaicqarh    =    0;

                
                $Vqwmp2bx0ii2++;

                
                if ($Vqwmp2bx0ii2>$Vzo4g5xb4yip)
                    break;
            }

            
            
            $Vfhiq1lhsoja_pos    =    $Vfhiq1lhsoja*2;
            $Vws44nszhvgo        =    hexdec($V52ujzwbr0ov[$Vfhiq1lhsoja_pos+4].$V52ujzwbr0ov[$Vfhiq1lhsoja_pos+5]);
            $Vpatv3dcvvhr        =    hexdec($V52ujzwbr0ov[$Vfhiq1lhsoja_pos+2].$V52ujzwbr0ov[$Vfhiq1lhsoja_pos+3]);
            $V4t3fwdd3eev        =    hexdec($V52ujzwbr0ov[$Vfhiq1lhsoja_pos].$V52ujzwbr0ov[$Vfhiq1lhsoja_pos+1]);

            
            $Vl5jzlxo3j3n    =    imagecolorallocate($Vo4t2ytzfwtl,$Vws44nszhvgo,$Vpatv3dcvvhr,$V4t3fwdd3eev);
            imagesetpixel($Vo4t2ytzfwtl,$V1e1eaicqarh,$Vzo4g5xb4yip-$Vqwmp2bx0ii2,$Vl5jzlxo3j3n);

            
            $V1e1eaicqarh++;
        }

        
        unset($V52ujzwbr0ov);

        
        return $Vo4t2ytzfwtl;
	}

}
