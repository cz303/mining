<?php




class PHPExcel_Writer_Excel2007_ContentTypes extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeContentTypes(PHPExcel $V2ch40cq1nbr = null, $Vbokbqv2yccd = FALSE)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Types');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/content-types');

			
			$this->_writeOverrideContentType(
				$Vze2ah1ycp2c, '/xl/theme/theme1.xml', 'application/vnd.openxmlformats-officedocument.theme+xml'
			);

			
			$this->_writeOverrideContentType(
				$Vze2ah1ycp2c, '/xl/styles.xml', 'application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml'
			);

			
			$this->_writeDefaultContentType(
				$Vze2ah1ycp2c, 'rels', 'application/vnd.openxmlformats-package.relationships+xml'
			);

			
			$this->_writeDefaultContentType(
				$Vze2ah1ycp2c, 'xml', 'application/xml'
			);

			
			$this->_writeDefaultContentType(
				$Vze2ah1ycp2c, 'vml', 'application/vnd.openxmlformats-officedocument.vmlDrawing'
			);

			
			if($V2ch40cq1nbr->hasMacros()){ 
				
				$this->_writeOverrideContentType(
					$Vze2ah1ycp2c, '/xl/workbook.xml', 'application/vnd.ms-excel.sheet.macroEnabled.main+xml'
				);
				
				$this->_writeDefaultContentType(
							$Vze2ah1ycp2c, 'bin', 'application/vnd.ms-office.vbaProject'
						);
				if($V2ch40cq1nbr->hasMacrosCertificate()){
					
					$this->_writeOverrideContentType(
						$Vze2ah1ycp2c, '/xl/vbaProjectSignature.bin', 'application/vnd.ms-office.vbaProjectSignature'
				);
				}
			}else{
				$this->_writeOverrideContentType(
					$Vze2ah1ycp2c, '/xl/workbook.xml', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml'
				);
			}

			
			$this->_writeOverrideContentType(
				$Vze2ah1ycp2c, '/docProps/app.xml', 'application/vnd.openxmlformats-officedocument.extended-properties+xml'
			);

			$this->_writeOverrideContentType(
				$Vze2ah1ycp2c, '/docProps/core.xml', 'application/vnd.openxmlformats-package.core-properties+xml'
			);

			$Vzgubteqlii5 = $V2ch40cq1nbr->getProperties()->getCustomProperties();
			if (!empty($Vzgubteqlii5)) {
				$this->_writeOverrideContentType(
					$Vze2ah1ycp2c, '/docProps/custom.xml', 'application/vnd.openxmlformats-officedocument.custom-properties+xml'
				);
			}

			
			$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
				$this->_writeOverrideContentType(
					$Vze2ah1ycp2c, '/xl/worksheets/sheet' . ($Vfhiq1lhsoja + 1) . '.xml', 'application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml'
				);
			}

			
			$this->_writeOverrideContentType(
				$Vze2ah1ycp2c, '/xl/sharedStrings.xml', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sharedStrings+xml'
			);

			
			$Vcfg4pbgiwen = 1;
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
				$Vbeblpikromp = $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getDrawingCollection();
				$V2hluo1wyq0f = count($Vbeblpikromp);
				$Vcfg4pbgiwenCount = ($Vbokbqv2yccd) ? $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getChartCount() : 0;

				
				if (($V2hluo1wyq0f > 0) || ($Vcfg4pbgiwenCount > 0)) {
					$this->_writeOverrideContentType(
						$Vze2ah1ycp2c, '/xl/drawings/drawing' . ($Vfhiq1lhsoja + 1) . '.xml', 'application/vnd.openxmlformats-officedocument.drawing+xml'
					);
				}

				
				if ($Vcfg4pbgiwenCount > 0) {
					for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vcfg4pbgiwenCount; ++$V4y0urwpnd3j) {
						$this->_writeOverrideContentType(
							$Vze2ah1ycp2c, '/xl/charts/chart' . $Vcfg4pbgiwen++ . '.xml', 'application/vnd.openxmlformats-officedocument.drawingml.chart+xml'
						);
					}
				}
			}

			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
				if (count($V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getComments()) > 0) {
					$this->_writeOverrideContentType(
						$Vze2ah1ycp2c, '/xl/comments' . ($Vfhiq1lhsoja + 1) . '.xml', 'application/vnd.openxmlformats-officedocument.spreadsheetml.comments+xml'
					);
				}
			}

			
			$Vas5shmjr5az = array();
			$V5u4rhvyrqbb = $this->getParentWriter()->getDrawingHashTable()->count();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V5u4rhvyrqbb; ++$Vfhiq1lhsoja) {
				$Vj5bpwm1tfyp 	= '';
				$Vcebce0oosnt 	= '';

				if ($this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja) instanceof PHPExcel_Worksheet_Drawing) {
					$Vj5bpwm1tfyp 	= strtolower($this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getExtension());
					$Vcebce0oosnt 	= $this->_getImageMimeType( $this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getPath() );
				} else if ($this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja) instanceof PHPExcel_Worksheet_MemoryDrawing) {
					$Vj5bpwm1tfyp 	= strtolower($this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getMimeType());
					$Vj5bpwm1tfyp 	= explode('/', $Vj5bpwm1tfyp);
					$Vj5bpwm1tfyp 	= $Vj5bpwm1tfyp[1];

					$Vcebce0oosnt 	= $this->getParentWriter()->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getMimeType();
				}

				if (!isset( $Vas5shmjr5az[$Vj5bpwm1tfyp]) ) {
						$Vas5shmjr5az[$Vj5bpwm1tfyp] = $Vcebce0oosnt;

						$this->_writeDefaultContentType(
							$Vze2ah1ycp2c, $Vj5bpwm1tfyp, $Vcebce0oosnt
						);
				}
			}
			if($V2ch40cq1nbr->hasRibbonBinObjects()){
				
				$Vld12o0sv4jd=array_diff($V2ch40cq1nbr->getRibbonBinObjects('types'), array_keys($Vas5shmjr5az));
				foreach($Vld12o0sv4jd as $Vbi20qdrael4){
					$Vcebce0oosnt='image/.'.$Vbi20qdrael4;
					$this->_writeDefaultContentType(
						$Vze2ah1ycp2c, $Vbi20qdrael4, $Vcebce0oosnt
					);
				}	
			}
			$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
				if (count($V2ch40cq1nbr->getSheet()->getHeaderFooter()->getImages()) > 0) {
					foreach ($V2ch40cq1nbr->getSheet()->getHeaderFooter()->getImages() as $Vfhiq1lhsojamage) {
						if (!isset( $Vas5shmjr5az[strtolower($Vfhiq1lhsojamage->getExtension())]) ) {
							$Vas5shmjr5az[strtolower($Vfhiq1lhsojamage->getExtension())] = $this->_getImageMimeType( $Vfhiq1lhsojamage->getPath() );

							$this->_writeDefaultContentType(
								$Vze2ah1ycp2c, strtolower($Vfhiq1lhsojamage->getExtension()), $Vas5shmjr5az[strtolower($Vfhiq1lhsojamage->getExtension())]
							);
						}
					}
				}
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	private function _getImageMimeType($Vloeg4v0njcx = '')
	{
		if (PHPExcel_Shared_File::file_exists($Vloeg4v0njcx)) {
			$Vfhiq1lhsojamage = getimagesize($Vloeg4v0njcx);
			return image_type_to_mime_type($Vfhiq1lhsojamage[2]);
		} else {
			throw new PHPExcel_Writer_Exception("File $Vloeg4v0njcx does not exist");
		}
	}

	
	private function _writeDefaultContentType(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vbr2uqycqrew = '', $V1rds1gq14xw = '')
	{
		if ($Vbr2uqycqrew != '' && $V1rds1gq14xw != '') {
			
			$Vze2ah1ycp2c->startElement('Default');
			$Vze2ah1ycp2c->writeAttribute('Extension', 	$Vbr2uqycqrew);
			$Vze2ah1ycp2c->writeAttribute('ContentType', 	$V1rds1gq14xw);
			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	
	private function _writeOverrideContentType(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vbr2uqycqrew = '', $V1rds1gq14xw = '')
	{
		if ($Vbr2uqycqrew != '' && $V1rds1gq14xw != '') {
			
			$Vze2ah1ycp2c->startElement('Override');
			$Vze2ah1ycp2c->writeAttribute('PartName', 		$Vbr2uqycqrew);
			$Vze2ah1ycp2c->writeAttribute('ContentType', 	$V1rds1gq14xw);
			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}
}
