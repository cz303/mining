<?php




class PHPExcel_Writer_Excel2007_Style extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeStyles(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('styleSheet');
		$Vze2ah1ycp2c->writeAttribute('xml:space', 'preserve');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

			
			$Vze2ah1ycp2c->startElement('numFmts');
			$Vze2ah1ycp2c->writeAttribute('count', $this->getParentWriter()->getNumFmtHashTable()->count());

				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getParentWriter()->getNumFmtHashTable()->count(); ++$Vfhiq1lhsoja) {
					$this->_writeNumFmt($Vze2ah1ycp2c, $this->getParentWriter()->getNumFmtHashTable()->getByIndex($Vfhiq1lhsoja), $Vfhiq1lhsoja);
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('fonts');
			$Vze2ah1ycp2c->writeAttribute('count', $this->getParentWriter()->getFontHashTable()->count());

				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getParentWriter()->getFontHashTable()->count(); ++$Vfhiq1lhsoja) {
					$this->_writeFont($Vze2ah1ycp2c, $this->getParentWriter()->getFontHashTable()->getByIndex($Vfhiq1lhsoja));
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('fills');
			$Vze2ah1ycp2c->writeAttribute('count', $this->getParentWriter()->getFillHashTable()->count());

				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getParentWriter()->getFillHashTable()->count(); ++$Vfhiq1lhsoja) {
					$this->_writeFill($Vze2ah1ycp2c, $this->getParentWriter()->getFillHashTable()->getByIndex($Vfhiq1lhsoja));
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('borders');
			$Vze2ah1ycp2c->writeAttribute('count', $this->getParentWriter()->getBordersHashTable()->count());

				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getParentWriter()->getBordersHashTable()->count(); ++$Vfhiq1lhsoja) {
					$this->_writeBorder($Vze2ah1ycp2c, $this->getParentWriter()->getBordersHashTable()->getByIndex($Vfhiq1lhsoja));
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('cellStyleXfs');
			$Vze2ah1ycp2c->writeAttribute('count', 1);

				
				$Vze2ah1ycp2c->startElement('xf');
					$Vze2ah1ycp2c->writeAttribute('numFmtId', 	0);
					$Vze2ah1ycp2c->writeAttribute('fontId', 	0);
					$Vze2ah1ycp2c->writeAttribute('fillId', 	0);
					$Vze2ah1ycp2c->writeAttribute('borderId',	0);
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('cellXfs');
			$Vze2ah1ycp2c->writeAttribute('count', count($V2ch40cq1nbr->getCellXfCollection()));

				
				foreach ($V2ch40cq1nbr->getCellXfCollection() as $Vh1srww3htfp) {
					$this->_writeCellStyleXf($Vze2ah1ycp2c, $Vh1srww3htfp, $V2ch40cq1nbr);
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('cellStyles');
			$Vze2ah1ycp2c->writeAttribute('count', 1);

				
				$Vze2ah1ycp2c->startElement('cellStyle');
					$Vze2ah1ycp2c->writeAttribute('name', 		'Normal');
					$Vze2ah1ycp2c->writeAttribute('xfId', 		0);
					$Vze2ah1ycp2c->writeAttribute('builtinId',	0);
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('dxfs');
			$Vze2ah1ycp2c->writeAttribute('count', $this->getParentWriter()->getStylesConditionalHashTable()->count());

				
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getParentWriter()->getStylesConditionalHashTable()->count(); ++$Vfhiq1lhsoja) {
					$this->_writeCellStyleDxf($Vze2ah1ycp2c, $this->getParentWriter()->getStylesConditionalHashTable()->getByIndex($Vfhiq1lhsoja)->getStyle());
				}

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('tableStyles');
			$Vze2ah1ycp2c->writeAttribute('defaultTableStyle', 'TableStyleMedium9');
			$Vze2ah1ycp2c->writeAttribute('defaultPivotStyle', 'PivotTableStyle1');
			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	private function _writeFill(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_Fill $Vmddk0o5az0m = null)
	{
		
		if ($Vmddk0o5az0m->getFillType() === PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR ||
			$Vmddk0o5az0m->getFillType() === PHPExcel_Style_Fill::FILL_GRADIENT_PATH) {
			
			$this->_writeGradientFill($Vze2ah1ycp2c, $Vmddk0o5az0m);
		} elseif($Vmddk0o5az0m->getFillType() !== NULL) {
			
			$this->_writePatternFill($Vze2ah1ycp2c, $Vmddk0o5az0m);
		}
	}

	
	private function _writeGradientFill(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_Fill $Vmddk0o5az0m = null)
	{
		
		$Vze2ah1ycp2c->startElement('fill');

			
			$Vze2ah1ycp2c->startElement('gradientFill');
				$Vze2ah1ycp2c->writeAttribute('type', 		$Vmddk0o5az0m->getFillType());
				$Vze2ah1ycp2c->writeAttribute('degree', 	$Vmddk0o5az0m->getRotation());

				
				$Vze2ah1ycp2c->startElement('stop');
				$Vze2ah1ycp2c->writeAttribute('position', '0');

					
					$Vze2ah1ycp2c->startElement('color');
					$Vze2ah1ycp2c->writeAttribute('rgb', $Vmddk0o5az0m->getStartColor()->getARGB());
					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('stop');
				$Vze2ah1ycp2c->writeAttribute('position', '1');

					
					$Vze2ah1ycp2c->startElement('color');
					$Vze2ah1ycp2c->writeAttribute('rgb', $Vmddk0o5az0m->getEndColor()->getARGB());
					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writePatternFill(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_Fill $Vmddk0o5az0m = null)
	{
		
		$Vze2ah1ycp2c->startElement('fill');

			
			$Vze2ah1ycp2c->startElement('patternFill');
				$Vze2ah1ycp2c->writeAttribute('patternType', $Vmddk0o5az0m->getFillType());

				if ($Vmddk0o5az0m->getFillType() !== PHPExcel_Style_Fill::FILL_NONE) {
					
					if ($Vmddk0o5az0m->getStartColor()->getARGB()) {
						$Vze2ah1ycp2c->startElement('fgColor');
						$Vze2ah1ycp2c->writeAttribute('rgb', $Vmddk0o5az0m->getStartColor()->getARGB());
						$Vze2ah1ycp2c->endElement();
					}
				}
				if ($Vmddk0o5az0m->getFillType() !== PHPExcel_Style_Fill::FILL_NONE) {
					
					if ($Vmddk0o5az0m->getEndColor()->getARGB()) {
						$Vze2ah1ycp2c->startElement('bgColor');
						$Vze2ah1ycp2c->writeAttribute('rgb', $Vmddk0o5az0m->getEndColor()->getARGB());
						$Vze2ah1ycp2c->endElement();
					}
				}

			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeFont(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_Font $Vrknu0wrcctk = null)
	{
		
		$Vze2ah1ycp2c->startElement('font');
			
			
			

			
			
			
			if ($Vrknu0wrcctk->getBold() !== NULL) {
				$Vze2ah1ycp2c->startElement('b');
					$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getBold() ? '1' : '0');
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getItalic() !== NULL) {
				$Vze2ah1ycp2c->startElement('i');
					$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getItalic() ? '1' : '0');
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getStrikethrough() !== NULL) {
				$Vze2ah1ycp2c->startElement('strike');
				$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getStrikethrough() ? '1' : '0');
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getUnderline() !== NULL) {
				$Vze2ah1ycp2c->startElement('u');
				$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getUnderline());
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getSuperScript() === TRUE || $Vrknu0wrcctk->getSubScript() === TRUE) {
				$Vze2ah1ycp2c->startElement('vertAlign');
				if ($Vrknu0wrcctk->getSuperScript() === TRUE) {
					$Vze2ah1ycp2c->writeAttribute('val', 'superscript');
				} else if ($Vrknu0wrcctk->getSubScript() === TRUE) {
					$Vze2ah1ycp2c->writeAttribute('val', 'subscript');
				}
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getSize() !== NULL) {
				$Vze2ah1ycp2c->startElement('sz');
					$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getSize());
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getColor()->getARGB() !== NULL) {
				$Vze2ah1ycp2c->startElement('color');
				$Vze2ah1ycp2c->writeAttribute('rgb', $Vrknu0wrcctk->getColor()->getARGB());
				$Vze2ah1ycp2c->endElement();
			}

			
			if ($Vrknu0wrcctk->getName() !== NULL) {
				$Vze2ah1ycp2c->startElement('name');
					$Vze2ah1ycp2c->writeAttribute('val', $Vrknu0wrcctk->getName());
				$Vze2ah1ycp2c->endElement();
			}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeBorder(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_Borders $Vrljv34gprc5 = null)
	{
		
		$Vze2ah1ycp2c->startElement('border');
			
			switch ($Vrljv34gprc5->getDiagonalDirection()) {
				case PHPExcel_Style_Borders::DIAGONAL_UP:
					$Vze2ah1ycp2c->writeAttribute('diagonalUp', 	'true');
					$Vze2ah1ycp2c->writeAttribute('diagonalDown', 	'false');
					break;
				case PHPExcel_Style_Borders::DIAGONAL_DOWN:
					$Vze2ah1ycp2c->writeAttribute('diagonalUp', 	'false');
					$Vze2ah1ycp2c->writeAttribute('diagonalDown', 	'true');
					break;
				case PHPExcel_Style_Borders::DIAGONAL_BOTH:
					$Vze2ah1ycp2c->writeAttribute('diagonalUp', 	'true');
					$Vze2ah1ycp2c->writeAttribute('diagonalDown', 	'true');
					break;
			}

			
			$this->_writeBorderPr($Vze2ah1ycp2c, 'left',		$Vrljv34gprc5->getLeft());
			$this->_writeBorderPr($Vze2ah1ycp2c, 'right',		$Vrljv34gprc5->getRight());
			$this->_writeBorderPr($Vze2ah1ycp2c, 'top',		$Vrljv34gprc5->getTop());
			$this->_writeBorderPr($Vze2ah1ycp2c, 'bottom',		$Vrljv34gprc5->getBottom());
			$this->_writeBorderPr($Vze2ah1ycp2c, 'diagonal',	$Vrljv34gprc5->getDiagonal());
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeCellStyleXf(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style $Varc42rjkigb = null, PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c->startElement('xf');
			$Vze2ah1ycp2c->writeAttribute('xfId', 0);
			$Vze2ah1ycp2c->writeAttribute('fontId', 			(int)$this->getParentWriter()->getFontHashTable()->getIndexForHashCode($Varc42rjkigb->getFont()->getHashCode()));
            if ($Varc42rjkigb->getQuotePrefix()) {
                $Vze2ah1ycp2c->writeAttribute('quotePrefix', 	    1);
            }

			if ($Varc42rjkigb->getNumberFormat()->getBuiltInFormatCode() === false) {
				$Vze2ah1ycp2c->writeAttribute('numFmtId', 			(int)($this->getParentWriter()->getNumFmtHashTable()->getIndexForHashCode($Varc42rjkigb->getNumberFormat()->getHashCode()) + 164)   );
			} else {
				$Vze2ah1ycp2c->writeAttribute('numFmtId', 			(int)$Varc42rjkigb->getNumberFormat()->getBuiltInFormatCode());
			}

			$Vze2ah1ycp2c->writeAttribute('fillId', 			(int)$this->getParentWriter()->getFillHashTable()->getIndexForHashCode($Varc42rjkigb->getFill()->getHashCode()));
			$Vze2ah1ycp2c->writeAttribute('borderId', 			(int)$this->getParentWriter()->getBordersHashTable()->getIndexForHashCode($Varc42rjkigb->getBorders()->getHashCode()));

			
			$Vze2ah1ycp2c->writeAttribute('applyFont', 		($V2ch40cq1nbr->getDefaultStyle()->getFont()->getHashCode() != $Varc42rjkigb->getFont()->getHashCode()) ? '1' : '0');
			$Vze2ah1ycp2c->writeAttribute('applyNumberFormat', ($V2ch40cq1nbr->getDefaultStyle()->getNumberFormat()->getHashCode() != $Varc42rjkigb->getNumberFormat()->getHashCode()) ? '1' : '0');
			$Vze2ah1ycp2c->writeAttribute('applyFill', 		($V2ch40cq1nbr->getDefaultStyle()->getFill()->getHashCode() != $Varc42rjkigb->getFill()->getHashCode()) ? '1' : '0');
			$Vze2ah1ycp2c->writeAttribute('applyBorder', 		($V2ch40cq1nbr->getDefaultStyle()->getBorders()->getHashCode() != $Varc42rjkigb->getBorders()->getHashCode()) ? '1' : '0');
			$Vze2ah1ycp2c->writeAttribute('applyAlignment',	($V2ch40cq1nbr->getDefaultStyle()->getAlignment()->getHashCode() != $Varc42rjkigb->getAlignment()->getHashCode()) ? '1' : '0');
			if ($Varc42rjkigb->getProtection()->getLocked() != PHPExcel_Style_Protection::PROTECTION_INHERIT || $Varc42rjkigb->getProtection()->getHidden() != PHPExcel_Style_Protection::PROTECTION_INHERIT) {
				$Vze2ah1ycp2c->writeAttribute('applyProtection', 'true');
			}

			
			$Vze2ah1ycp2c->startElement('alignment');
				$Vze2ah1ycp2c->writeAttribute('horizontal', 	$Varc42rjkigb->getAlignment()->getHorizontal());
				$Vze2ah1ycp2c->writeAttribute('vertical', 		$Varc42rjkigb->getAlignment()->getVertical());

				$Vkbd3edaufbx = 0;
				if ($Varc42rjkigb->getAlignment()->getTextRotation() >= 0) {
					$Vkbd3edaufbx = $Varc42rjkigb->getAlignment()->getTextRotation();
				} else if ($Varc42rjkigb->getAlignment()->getTextRotation() < 0) {
					$Vkbd3edaufbx = 90 - $Varc42rjkigb->getAlignment()->getTextRotation();
				}
				$Vze2ah1ycp2c->writeAttribute('textRotation', 	$Vkbd3edaufbx);

				$Vze2ah1ycp2c->writeAttribute('wrapText', 		($Varc42rjkigb->getAlignment()->getWrapText() ? 'true' : 'false'));
				$Vze2ah1ycp2c->writeAttribute('shrinkToFit', 	($Varc42rjkigb->getAlignment()->getShrinkToFit() ? 'true' : 'false'));

				if ($Varc42rjkigb->getAlignment()->getIndent() > 0) {
					$Vze2ah1ycp2c->writeAttribute('indent', 	$Varc42rjkigb->getAlignment()->getIndent());
				}
				if ($Varc42rjkigb->getAlignment()->getReadorder() > 0) {
					$Vze2ah1ycp2c->writeAttribute('readingOrder', 	$Varc42rjkigb->getAlignment()->getReadorder());
				}
			$Vze2ah1ycp2c->endElement();

			
			if ($Varc42rjkigb->getProtection()->getLocked() != PHPExcel_Style_Protection::PROTECTION_INHERIT || $Varc42rjkigb->getProtection()->getHidden() != PHPExcel_Style_Protection::PROTECTION_INHERIT) {
				$Vze2ah1ycp2c->startElement('protection');
					if ($Varc42rjkigb->getProtection()->getLocked() != PHPExcel_Style_Protection::PROTECTION_INHERIT) {
						$Vze2ah1ycp2c->writeAttribute('locked', 		($Varc42rjkigb->getProtection()->getLocked() == PHPExcel_Style_Protection::PROTECTION_PROTECTED ? 'true' : 'false'));
					}
					if ($Varc42rjkigb->getProtection()->getHidden() != PHPExcel_Style_Protection::PROTECTION_INHERIT) {
						$Vze2ah1ycp2c->writeAttribute('hidden', 		($Varc42rjkigb->getProtection()->getHidden() == PHPExcel_Style_Protection::PROTECTION_PROTECTED ? 'true' : 'false'));
					}
				$Vze2ah1ycp2c->endElement();
			}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeCellStyleDxf(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style $Varc42rjkigb = null)
	{
		
		$Vze2ah1ycp2c->startElement('dxf');

			
			$this->_writeFont($Vze2ah1ycp2c, $Varc42rjkigb->getFont());

			
			$this->_writeNumFmt($Vze2ah1ycp2c, $Varc42rjkigb->getNumberFormat());

			
			$this->_writeFill($Vze2ah1ycp2c, $Varc42rjkigb->getFill());

			
			$Vze2ah1ycp2c->startElement('alignment');
				if ($Varc42rjkigb->getAlignment()->getHorizontal() !== NULL) {
					$Vze2ah1ycp2c->writeAttribute('horizontal', $Varc42rjkigb->getAlignment()->getHorizontal());
				}
				if ($Varc42rjkigb->getAlignment()->getVertical() !== NULL) {
					$Vze2ah1ycp2c->writeAttribute('vertical', $Varc42rjkigb->getAlignment()->getVertical());
				}

				if ($Varc42rjkigb->getAlignment()->getTextRotation() !== NULL) {
					$Vkbd3edaufbx = 0;
					if ($Varc42rjkigb->getAlignment()->getTextRotation() >= 0) {
						$Vkbd3edaufbx = $Varc42rjkigb->getAlignment()->getTextRotation();
					} else if ($Varc42rjkigb->getAlignment()->getTextRotation() < 0) {
						$Vkbd3edaufbx = 90 - $Varc42rjkigb->getAlignment()->getTextRotation();
					}
					$Vze2ah1ycp2c->writeAttribute('textRotation', 	$Vkbd3edaufbx);
				}
			$Vze2ah1ycp2c->endElement();

			
			$this->_writeBorder($Vze2ah1ycp2c, $Varc42rjkigb->getBorders());

			
			if (($Varc42rjkigb->getProtection()->getLocked() !== NULL) ||
				($Varc42rjkigb->getProtection()->getHidden() !== NULL)) {
				if ($Varc42rjkigb->getProtection()->getLocked() !== PHPExcel_Style_Protection::PROTECTION_INHERIT ||
					$Varc42rjkigb->getProtection()->getHidden() !== PHPExcel_Style_Protection::PROTECTION_INHERIT) {
					$Vze2ah1ycp2c->startElement('protection');
						if (($Varc42rjkigb->getProtection()->getLocked() !== NULL) &&
							($Varc42rjkigb->getProtection()->getLocked() !== PHPExcel_Style_Protection::PROTECTION_INHERIT)) {
							$Vze2ah1ycp2c->writeAttribute('locked', ($Varc42rjkigb->getProtection()->getLocked() == PHPExcel_Style_Protection::PROTECTION_PROTECTED ? 'true' : 'false'));
						}
						if (($Varc42rjkigb->getProtection()->getHidden() !== NULL) &&
							($Varc42rjkigb->getProtection()->getHidden() !== PHPExcel_Style_Protection::PROTECTION_INHERIT)) {
							$Vze2ah1ycp2c->writeAttribute('hidden', ($Varc42rjkigb->getProtection()->getHidden() == PHPExcel_Style_Protection::PROTECTION_PROTECTED ? 'true' : 'false'));
						}
					$Vze2ah1ycp2c->endElement();
				}
			}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeBorderPr(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vsyidwvjoowz = 'left', PHPExcel_Style_Border $Vx3wsozmlwzm = null)
	{
		
		if ($Vx3wsozmlwzm->getBorderStyle() != PHPExcel_Style_Border::BORDER_NONE) {
			$Vze2ah1ycp2c->startElement($Vsyidwvjoowz);
			$Vze2ah1ycp2c->writeAttribute('style', 	$Vx3wsozmlwzm->getBorderStyle());

				
				$Vze2ah1ycp2c->startElement('color');
				$Vze2ah1ycp2c->writeAttribute('rgb', 	$Vx3wsozmlwzm->getColor()->getARGB());
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeNumFmt(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Style_NumberFormat $Vjaivy1yvlew = null, $Vswpqsh0dje0 = 0)
	{
		
		$Ve5ckeo1jgxp = $Vjaivy1yvlew->getFormatCode();

		
		if ($Ve5ckeo1jgxp !== NULL) {
			$Vze2ah1ycp2c->startElement('numFmt');
				$Vze2ah1ycp2c->writeAttribute('numFmtId', ($Vswpqsh0dje0 + 164));
				$Vze2ah1ycp2c->writeAttribute('formatCode', $Ve5ckeo1jgxp);
			$Vze2ah1ycp2c->endElement();
		}
	}

	
	public function allStyles(PHPExcel $V2ch40cq1nbr = null)
	{
		$Vvy0hlaze2tu = $V2ch40cq1nbr->getCellXfCollection();

		return $Vvy0hlaze2tu;
	}

	
	public function allConditionalStyles(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vvy0hlaze2tu		= array();

		$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
			foreach ($V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getConditionalStylesCollection() as $Vrlulqrqtem4) {
				foreach ($Vrlulqrqtem4 as $Vw2mjdsvh0wf) {
					$Vvy0hlaze2tu[] = $Vw2mjdsvh0wf;
				}
			}
		}

		return $Vvy0hlaze2tu;
	}

	
	public function allFills(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vjnv4zy2kuav 	= array();

		
		$Vjo3svxiyoke = new PHPExcel_Style_Fill();
		$Vjo3svxiyoke->setFillType(PHPExcel_Style_Fill::FILL_NONE);
		$Vjnv4zy2kuav[] = $Vjo3svxiyoke;

		$V4exv1mizy3e = new PHPExcel_Style_Fill();
		$V4exv1mizy3e->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_GRAY125);
		$Vjnv4zy2kuav[] = $V4exv1mizy3e;
		
		$Vvy0hlaze2tu 	= $this->allStyles($V2ch40cq1nbr);
		foreach ($Vvy0hlaze2tu as $Vdtcpflt5bhp) {
			if (!array_key_exists($Vdtcpflt5bhp->getFill()->getHashCode(), $Vjnv4zy2kuav)) {
				$Vjnv4zy2kuav[ $Vdtcpflt5bhp->getFill()->getHashCode() ] = $Vdtcpflt5bhp->getFill();
			}
		}

		return $Vjnv4zy2kuav;
	}

	
	public function allFonts(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vsdimzq4ht2n 	= array();
		$Vvy0hlaze2tu 	= $this->allStyles($V2ch40cq1nbr);

		foreach ($Vvy0hlaze2tu as $Vdtcpflt5bhp) {
			if (!array_key_exists($Vdtcpflt5bhp->getFont()->getHashCode(), $Vsdimzq4ht2n)) {
				$Vsdimzq4ht2n[ $Vdtcpflt5bhp->getFont()->getHashCode() ] = $Vdtcpflt5bhp->getFont();
			}
		}

		return $Vsdimzq4ht2n;
	}

	
	public function allBorders(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vr51mttsvpd1 	= array();
		$Vvy0hlaze2tu 	= $this->allStyles($V2ch40cq1nbr);

		foreach ($Vvy0hlaze2tu as $Vdtcpflt5bhp) {
			if (!array_key_exists($Vdtcpflt5bhp->getBorders()->getHashCode(), $Vr51mttsvpd1)) {
				$Vr51mttsvpd1[ $Vdtcpflt5bhp->getBorders()->getHashCode() ] = $Vdtcpflt5bhp->getBorders();
			}
		}

		return $Vr51mttsvpd1;
	}

	
	public function allNumberFormats(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$V3qfi2dz4dmf 	= array();
		$Vvy0hlaze2tu 	= $this->allStyles($V2ch40cq1nbr);

		foreach ($Vvy0hlaze2tu as $Vdtcpflt5bhp) {
			if ($Vdtcpflt5bhp->getNumberFormat()->getBuiltInFormatCode() === false && !array_key_exists($Vdtcpflt5bhp->getNumberFormat()->getHashCode(), $V3qfi2dz4dmf)) {
				$V3qfi2dz4dmf[ $Vdtcpflt5bhp->getNumberFormat()->getHashCode() ] = $Vdtcpflt5bhp->getNumberFormat();
			}
		}

		return $V3qfi2dz4dmf;
	}
}
