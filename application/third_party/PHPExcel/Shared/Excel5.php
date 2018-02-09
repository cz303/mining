<?php



class PHPExcel_Shared_Excel5
{
	
	public static function sizeCol($Vzg4jtrmmzdy, $Vswazvoa3xts = 'A')
	{
		
		$Vj0kojsfk0h3 = $Vzg4jtrmmzdy->getParent()->getDefaultStyle()->getFont();

		$Vswazvoa3xtsumnDimensions = $Vzg4jtrmmzdy->getColumnDimensions();

		
		if ( isset($Vswazvoa3xtsumnDimensions[$Vswazvoa3xts]) and $Vswazvoa3xtsumnDimensions[$Vswazvoa3xts]->getWidth() != -1 ) {

			
			$Vswazvoa3xtsumnDimension = $Vswazvoa3xtsumnDimensions[$Vswazvoa3xts];
			$Vojs2qdgagwv = $Vswazvoa3xtsumnDimension->getWidth();
			$V3avv2wzb2u4 = PHPExcel_Shared_Drawing::cellDimensionToPixels($Vojs2qdgagwv, $Vj0kojsfk0h3);

		} else if ($Vzg4jtrmmzdy->getDefaultColumnDimension()->getWidth() != -1) {

			
			$Vk5tph3k1p5j = $Vzg4jtrmmzdy->getDefaultColumnDimension();
			$Vojs2qdgagwv = $Vk5tph3k1p5j->getWidth();
			$V3avv2wzb2u4 = PHPExcel_Shared_Drawing::cellDimensionToPixels($Vojs2qdgagwv, $Vj0kojsfk0h3);

		} else {

			
			$V3avv2wzb2u4 = PHPExcel_Shared_Font::getDefaultColumnWidthByFont($Vj0kojsfk0h3, true);
		}

		
		if (isset($Vswazvoa3xtsumnDimensions[$Vswazvoa3xts]) and !$Vswazvoa3xtsumnDimensions[$Vswazvoa3xts]->getVisible()) {
			$Vatyyjeenurx = 0;
		} else {
			$Vatyyjeenurx = $V3avv2wzb2u4;
		}

		return $Vatyyjeenurx;
	}

	
	public static function sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl = 1)
	{
		
		$Vj0kojsfk0h3 = $Vzg4jtrmmzdy->getParent()->getDefaultStyle()->getFont();

		$VexbtekafkvlDimensions = $Vzg4jtrmmzdy->getRowDimensions();

		
		if ( isset($VexbtekafkvlDimensions[$Vexbtekafkvl]) and $VexbtekafkvlDimensions[$Vexbtekafkvl]->getRowHeight() != -1) {

			
			$VexbtekafkvlDimension = $VexbtekafkvlDimensions[$Vexbtekafkvl];
			$VexbtekafkvlHeight = $VexbtekafkvlDimension->getRowHeight();
			$Vtuubiolu25r = (int) ceil(4 * $VexbtekafkvlHeight / 3); 

		} else if ($Vzg4jtrmmzdy->getDefaultRowDimension()->getRowHeight() != -1) {

			
			$Vinhixo2a2n2 = $Vzg4jtrmmzdy->getDefaultRowDimension();
			$VexbtekafkvlHeight = $Vinhixo2a2n2->getRowHeight();
			$Vtuubiolu25r = PHPExcel_Shared_Drawing::pointsToPixels($VexbtekafkvlHeight);

		} else {

			
			$Virxukwlv5th = PHPExcel_Shared_Font::getDefaultRowHeightByFont($Vj0kojsfk0h3);
			$Vtuubiolu25r = PHPExcel_Shared_Font::fontSizeToPixels($Virxukwlv5th);

		}

		
		if ( isset($VexbtekafkvlDimensions[$Vexbtekafkvl]) and !$VexbtekafkvlDimensions[$Vexbtekafkvl]->getVisible() ) {
			$V1thtbsvaysm = 0;
		} else {
			$V1thtbsvaysm = $Vtuubiolu25r;
		}

		return $V1thtbsvaysm;
	}

	
	public static function getDistanceX(PHPExcel_Worksheet $Vzg4jtrmmzdy, $V4srf4uueq2t = 'A', $V3mz1f4hpcjp = 0, $Vuzstcwt0kob = 'A', $Vtwxzxnreiyz = 0)
	{
		$V0jljr3e0seo = 0;

		
		$V4srf4uueq2tIndex = PHPExcel_Cell::columnIndexFromString($V4srf4uueq2t) - 1; 
		$Vuzstcwt0kobIndex = PHPExcel_Cell::columnIndexFromString($Vuzstcwt0kob) - 1; 
		for ($Vfhiq1lhsoja = $V4srf4uueq2tIndex; $Vfhiq1lhsoja <= $Vuzstcwt0kobIndex; ++$Vfhiq1lhsoja) {
			$V0jljr3e0seo += self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja));
		}

		
		$V0jljr3e0seo -= (int) floor(self::sizeCol($Vzg4jtrmmzdy, $V4srf4uueq2t) * $V3mz1f4hpcjp / 1024);

		
		$V0jljr3e0seo -= (int) floor(self::sizeCol($Vzg4jtrmmzdy, $Vuzstcwt0kob) * (1 - $Vtwxzxnreiyz / 1024));

		return $V0jljr3e0seo;
	}

	
	public static function getDistanceY(PHPExcel_Worksheet $Vzg4jtrmmzdy, $V5jh0lozltx0 = 1, $Vzlq0iwdgyx5 = 0, $Vx4v30gyjp2b = 1, $Vbodx1gz2f51 = 0)
	{
		$Vexk3jpt4gqu = 0;

		
		for ($Vexbtekafkvl = $V5jh0lozltx0; $Vexbtekafkvl <= $Vx4v30gyjp2b; ++$Vexbtekafkvl) {
			$Vexk3jpt4gqu += self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl);
		}

		
		$Vexk3jpt4gqu -= (int) floor(self::sizeRow($Vzg4jtrmmzdy, $V5jh0lozltx0) * $Vzlq0iwdgyx5 / 256);

		
		$Vexk3jpt4gqu -= (int) floor(self::sizeRow($Vzg4jtrmmzdy, $Vx4v30gyjp2b) * (1 - $Vbodx1gz2f51 / 256));

		return $Vexk3jpt4gqu;
	}

	
	public static function oneAnchor2twoAnchor($Vzg4jtrmmzdy, $V0p14cw241gq, $Vsjv51hindtf, $Vpalzrg3mgla, $Vojs2qdgagwv, $Vzo4g5xb4yip)
	{
		list($Vswazvoa3xtsumn, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($V0p14cw241gq);
		$Vswazvoa3xts_start = PHPExcel_Cell::columnIndexFromString($Vswazvoa3xtsumn) - 1;
		$Vexbtekafkvl_start = $Vexbtekafkvl - 1;

		$Vkiv1idvekdh = $Vsjv51hindtf;
		$Vj45ukmrparq = $Vpalzrg3mgla;

		
		$Vswazvoa3xts_end	= $Vswazvoa3xts_start;  
		$Vexbtekafkvl_end	= $Vexbtekafkvl_start;  

		
		if ($Vkiv1idvekdh >= self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start))) {
			$Vkiv1idvekdh = 0;
		}
		if ($Vj45ukmrparq >= self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_start + 1)) {
			$Vj45ukmrparq = 0;
		}

		$Vojs2qdgagwv	  = $Vojs2qdgagwv  + $Vkiv1idvekdh -1;
		$Vzo4g5xb4yip	 = $Vzo4g5xb4yip + $Vj45ukmrparq -1;

		
		while ($Vojs2qdgagwv >= self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))) {
			$Vojs2qdgagwv -= self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end));
			++$Vswazvoa3xts_end;
		}

		
		while ($Vzo4g5xb4yip >= self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_end + 1)) {
			$Vzo4g5xb4yip -= self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_end + 1);
			++$Vexbtekafkvl_end;
		}

		
		
		if (self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start)) == 0) {
			return;
		}
		if (self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))   == 0) {
			return;
		}
		if (self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_start + 1) == 0) {
			return;
		}
		if (self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_end + 1)   == 0) {
			return;
		}

		
		$Vkiv1idvekdh = $Vkiv1idvekdh	 / self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start))   * 1024;
		$Vj45ukmrparq = $Vj45ukmrparq	 / self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_start + 1)   *  256;
		$Vbbuqfp0xqjj = ($Vojs2qdgagwv + 1)  / self::sizeCol($Vzg4jtrmmzdy, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))	 * 1024; 
		$V4ed4tb3yv2t = ($Vzo4g5xb4yip + 1) / self::sizeRow($Vzg4jtrmmzdy, $Vexbtekafkvl_end + 1)	 *  256; 

		$Vuadijsrb0jp = PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start) . ($Vexbtekafkvl_start + 1);
		$Volnd0vd4r14 = PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end) . ($Vexbtekafkvl_end + 1);

		$Vp5yjclfj04r = array(
			'startCoordinates' => $Vuadijsrb0jp,
			'startOffsetX' => $Vkiv1idvekdh,
			'startOffsetY' => $Vj45ukmrparq,
			'endCoordinates' => $Volnd0vd4r14,
			'endOffsetX' => $Vbbuqfp0xqjj,
			'endOffsetY' => $V4ed4tb3yv2t,
		);

		return  $Vp5yjclfj04r;
	}

}
