<?php




class PHPExcel_Writer_Excel2007_StringTable extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function createStringTable($Vci1dgyyzjho = null, $Vqbmt0xddrxq = null)
	{
		if ($Vci1dgyyzjho !== NULL) {
			
			$Vvdcc21he3kk = array();
			$Vbfdfpbwkntc = null;
			$Vsvwrbt4veov = null;	

			
			if (($Vqbmt0xddrxq !== NULL) && is_array($Vqbmt0xddrxq)) {
				$Vvdcc21he3kk = $Vqbmt0xddrxq;
			}

			
			$Vsvwrbt4veov = $this->flipStringTable($Vvdcc21he3kk);

			
			foreach ($Vci1dgyyzjho->getCellCollection() as $Vhibevwz1gkx) {
				$Vblc1ueqvbti = $Vci1dgyyzjho->getCell($Vhibevwz1gkx);
				$Vblc1ueqvbtiValue = $Vblc1ueqvbti->getValue();
				if (!is_object($Vblc1ueqvbtiValue) &&
					($Vblc1ueqvbtiValue !== NULL) &&
					$Vblc1ueqvbtiValue !== '' &&
					!isset($Vsvwrbt4veov[$Vblc1ueqvbtiValue]) &&
					($Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_STRING || $Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_STRING2 || $Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_NULL)) {
						$Vvdcc21he3kk[] = $Vblc1ueqvbtiValue;
						$Vsvwrbt4veov[$Vblc1ueqvbtiValue] = true;
				} elseif ($Vblc1ueqvbtiValue instanceof PHPExcel_RichText &&
						  ($Vblc1ueqvbtiValue !== NULL) &&
						  !isset($Vsvwrbt4veov[$Vblc1ueqvbtiValue->getHashCode()])) {
								$Vvdcc21he3kk[] = $Vblc1ueqvbtiValue;
								$Vsvwrbt4veov[$Vblc1ueqvbtiValue->getHashCode()] = true;
	        	}
	        }

	        
	        return $Vvdcc21he3kk;
		} else {
			throw new PHPExcel_Writer_Exception("Invalid PHPExcel_Worksheet object passed.");
		}
	}

	
	public function writeStringTable($Vm2yvgr4j2qs = null)
	{
		if ($Vm2yvgr4j2qs !== NULL) {
			
			$Vze2ah1ycp2c = null;
			if ($this->getParentWriter()->getUseDiskCaching()) {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
			} else {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
			}

			
			$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

			
			$Vze2ah1ycp2c->startElement('sst');
			$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
			$Vze2ah1ycp2c->writeAttribute('uniqueCount', count($Vm2yvgr4j2qs));

				
				foreach ($Vm2yvgr4j2qs as $V3zyw2dof1zi) {
					$Vze2ah1ycp2c->startElement('si');

						if (! $V3zyw2dof1zi instanceof PHPExcel_RichText) {
							$Vciqwvodhepd = PHPExcel_Shared_String::ControlCharacterPHP2OOXML( $V3zyw2dof1zi );
							$Vze2ah1ycp2c->startElement('t');
							if ($Vciqwvodhepd !== trim($Vciqwvodhepd)) {
								$Vze2ah1ycp2c->writeAttribute('xml:space', 'preserve');
							}
							$Vze2ah1ycp2c->writeRawData($Vciqwvodhepd);
							$Vze2ah1ycp2c->endElement();
						} else if ($V3zyw2dof1zi instanceof PHPExcel_RichText) {
							$this->writeRichText($Vze2ah1ycp2c, $V3zyw2dof1zi);
						}

                    $Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();

			
			return $Vze2ah1ycp2c->getData();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid string table array passed.");
		}
	}

	
	public function writeRichText(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_RichText $Vnupdnei3nmf = null, $Vbhrh2dz21ln=NULL)
	{
		if ($Vbhrh2dz21ln !== NULL)
			$Vbhrh2dz21ln .= ':';
		
		$Vqy5grnvvrgx = $Vnupdnei3nmf->getRichTextElements();
		foreach ($Vqy5grnvvrgx as $Vltoddaysjlm) {
			
			$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'r');

				
				if ($Vltoddaysjlm instanceof PHPExcel_RichText_Run) {
					
					$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'rPr');

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'rFont');
						$Vze2ah1ycp2c->writeAttribute('val', $Vltoddaysjlm->getFont()->getName());
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'b');
						$Vze2ah1ycp2c->writeAttribute('val', ($Vltoddaysjlm->getFont()->getBold() ? 'true' : 'false'));
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'i');
						$Vze2ah1ycp2c->writeAttribute('val', ($Vltoddaysjlm->getFont()->getItalic() ? 'true' : 'false'));
						$Vze2ah1ycp2c->endElement();

						
						if ($Vltoddaysjlm->getFont()->getSuperScript() || $Vltoddaysjlm->getFont()->getSubScript()) {
							$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'vertAlign');
							if ($Vltoddaysjlm->getFont()->getSuperScript()) {
								$Vze2ah1ycp2c->writeAttribute('val', 'superscript');
							} else if ($Vltoddaysjlm->getFont()->getSubScript()) {
								$Vze2ah1ycp2c->writeAttribute('val', 'subscript');
							}
							$Vze2ah1ycp2c->endElement();
						}

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'strike');
						$Vze2ah1ycp2c->writeAttribute('val', ($Vltoddaysjlm->getFont()->getStrikethrough() ? 'true' : 'false'));
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'color');
						$Vze2ah1ycp2c->writeAttribute('rgb', $Vltoddaysjlm->getFont()->getColor()->getARGB());
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'sz');
						$Vze2ah1ycp2c->writeAttribute('val', $Vltoddaysjlm->getFont()->getSize());
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'u');
						$Vze2ah1ycp2c->writeAttribute('val', $Vltoddaysjlm->getFont()->getUnderline());
						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();
				}

				
				$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'t');
				$Vze2ah1ycp2c->writeAttribute('xml:space', 'preserve');
				$Vze2ah1ycp2c->writeRawData(PHPExcel_Shared_String::ControlCharacterPHP2OOXML( $Vltoddaysjlm->getText() ));
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	public function writeRichTextForCharts(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vnupdnei3nmf = null, $Vbhrh2dz21ln=NULL)
	{
		if (!$Vnupdnei3nmf instanceof PHPExcel_RichText) {
			$Vs0vwq0utia3 = $Vnupdnei3nmf;
			$Vnupdnei3nmf = new PHPExcel_RichText();
			$Vnupdnei3nmf->createTextRun($Vs0vwq0utia3);
		}

		if ($Vbhrh2dz21ln !== NULL)
			$Vbhrh2dz21ln .= ':';
		
		$Vqy5grnvvrgx = $Vnupdnei3nmf->getRichTextElements();
		foreach ($Vqy5grnvvrgx as $Vltoddaysjlm) {
			
			$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'r');

				
				$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'rPr');

					
					$Vze2ah1ycp2c->writeAttribute('b', ($Vltoddaysjlm->getFont()->getBold() ? 1 : 0));
					
					$Vze2ah1ycp2c->writeAttribute('i', ($Vltoddaysjlm->getFont()->getItalic() ? 1 : 0));
					
					$Vgdqzksjmb1c = $Vltoddaysjlm->getFont()->getUnderline();
					switch($Vgdqzksjmb1c) {
						case 'single' :
							$Vgdqzksjmb1c = 'sng';
							break;
						case 'double' :
							$Vgdqzksjmb1c = 'dbl';
							break;
					}
					$Vze2ah1ycp2c->writeAttribute('u', $Vgdqzksjmb1c);
					
					$Vze2ah1ycp2c->writeAttribute('strike', ($Vltoddaysjlm->getFont()->getStrikethrough() ? 'sngStrike' : 'noStrike'));

					
					$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'latin');
						$Vze2ah1ycp2c->writeAttribute('typeface', $Vltoddaysjlm->getFont()->getName());
					$Vze2ah1ycp2c->endElement();

					










				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement($Vbhrh2dz21ln.'t');

					$Vze2ah1ycp2c->writeRawData(PHPExcel_Shared_String::ControlCharacterPHP2OOXML( $Vltoddaysjlm->getText() ));
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	public function flipStringTable($Vthroa5jpyuv = array()) {
		
		$Vbco3t3kne3m = array();

		
		foreach ($Vthroa5jpyuv as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (! $Vp4xjtpabm0l instanceof PHPExcel_RichText) {
				$Vbco3t3kne3m[$Vp4xjtpabm0l] = $Vseq1edikdvg;
			} else if ($Vp4xjtpabm0l instanceof PHPExcel_RichText) {
				$Vbco3t3kne3m[$Vp4xjtpabm0l->getHashCode()] = $Vseq1edikdvg;
			}
		}

		
		return $Vbco3t3kne3m;
	}
}
