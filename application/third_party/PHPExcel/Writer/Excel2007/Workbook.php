<?php




class PHPExcel_Writer_Excel2007_Workbook extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeWorkbook(PHPExcel $V2ch40cq1nbr = null, $V122ulnk04wo = FALSE)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('workbook');
		$Vze2ah1ycp2c->writeAttribute('xml:space', 'preserve');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
		$Vze2ah1ycp2c->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

			
			$this->_writeFileVersion($Vze2ah1ycp2c);

			
			$this->_writeWorkbookPr($Vze2ah1ycp2c);

			
			$this->_writeWorkbookProtection($Vze2ah1ycp2c, $V2ch40cq1nbr);

			
			if ($this->getParentWriter()->getOffice2003Compatibility() === false) {
				$this->_writeBookViews($Vze2ah1ycp2c, $V2ch40cq1nbr);
			}

			
			$this->_writeSheets($Vze2ah1ycp2c, $V2ch40cq1nbr);

			
			$this->_writeDefinedNames($Vze2ah1ycp2c, $V2ch40cq1nbr);

			
			$this->_writeCalcPr($Vze2ah1ycp2c,$V122ulnk04wo);

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	private function _writeFileVersion(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null)
	{
		$Vze2ah1ycp2c->startElement('fileVersion');
		$Vze2ah1ycp2c->writeAttribute('appName', 'xl');
		$Vze2ah1ycp2c->writeAttribute('lastEdited', '4');
		$Vze2ah1ycp2c->writeAttribute('lowestEdited', '4');
		$Vze2ah1ycp2c->writeAttribute('rupBuild', '4505');
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeWorkbookPr(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null)
	{
		$Vze2ah1ycp2c->startElement('workbookPr');

		if (PHPExcel_Shared_Date::getExcelCalendar() == PHPExcel_Shared_Date::CALENDAR_MAC_1904) {
			$Vze2ah1ycp2c->writeAttribute('date1904', '1');
		}

		$Vze2ah1ycp2c->writeAttribute('codeName', 'ThisWorkbook');

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeBookViews(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c->startElement('bookViews');

			
			$Vze2ah1ycp2c->startElement('workbookView');

			$Vze2ah1ycp2c->writeAttribute('activeTab', $V2ch40cq1nbr->getActiveSheetIndex());
			$Vze2ah1ycp2c->writeAttribute('autoFilterDateGrouping', '1');
			$Vze2ah1ycp2c->writeAttribute('firstSheet', '0');
			$Vze2ah1ycp2c->writeAttribute('minimized', '0');
			$Vze2ah1ycp2c->writeAttribute('showHorizontalScroll', '1');
			$Vze2ah1ycp2c->writeAttribute('showSheetTabs', '1');
			$Vze2ah1ycp2c->writeAttribute('showVerticalScroll', '1');
			$Vze2ah1ycp2c->writeAttribute('tabRatio', '600');
			$Vze2ah1ycp2c->writeAttribute('visibility', 'visible');

			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeWorkbookProtection(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel $V2ch40cq1nbr = null)
	{
		if ($V2ch40cq1nbr->getSecurity()->isSecurityEnabled()) {
			$Vze2ah1ycp2c->startElement('workbookProtection');
			$Vze2ah1ycp2c->writeAttribute('lockRevision',		($V2ch40cq1nbr->getSecurity()->getLockRevision() ? 'true' : 'false'));
			$Vze2ah1ycp2c->writeAttribute('lockStructure', 	($V2ch40cq1nbr->getSecurity()->getLockStructure() ? 'true' : 'false'));
			$Vze2ah1ycp2c->writeAttribute('lockWindows', 		($V2ch40cq1nbr->getSecurity()->getLockWindows() ? 'true' : 'false'));

			if ($V2ch40cq1nbr->getSecurity()->getRevisionsPassword() != '') {
				$Vze2ah1ycp2c->writeAttribute('revisionsPassword',	$V2ch40cq1nbr->getSecurity()->getRevisionsPassword());
			}

			if ($V2ch40cq1nbr->getSecurity()->getWorkbookPassword() != '') {
				$Vze2ah1ycp2c->writeAttribute('workbookPassword',	$V2ch40cq1nbr->getSecurity()->getWorkbookPassword());
			}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeCalcPr(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $V122ulnk04wo = TRUE)
	{
		$Vze2ah1ycp2c->startElement('calcPr');

		
        
        
		$Vze2ah1ycp2c->writeAttribute('calcId', 			'999999');
		$Vze2ah1ycp2c->writeAttribute('calcMode', 			'auto');
		
		$Vze2ah1ycp2c->writeAttribute('calcCompleted', 	($V122ulnk04wo) ? 1 : 0);
		$Vze2ah1ycp2c->writeAttribute('fullCalcOnLoad', 	($V122ulnk04wo) ? 0 : 1);

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeSheets(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c->startElement('sheets');
		$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
			
			$this->_writeSheet(
				$Vze2ah1ycp2c,
				$V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getTitle(),
				($Vfhiq1lhsoja + 1),
				($Vfhiq1lhsoja + 1 + 3),
				$V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getSheetState()
			);
		}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeSheet(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vxvaanwbqqdw = '', $V2x5nd3usxve = 1, $V2jzqhucxhax = 1, $V0wsalkdxmse = 'visible')
	{
		if ($Vxvaanwbqqdw != '') {
			
			$Vze2ah1ycp2c->startElement('sheet');
			$Vze2ah1ycp2c->writeAttribute('name', 		$Vxvaanwbqqdw);
			$Vze2ah1ycp2c->writeAttribute('sheetId', 	$V2x5nd3usxve);
			if ($V0wsalkdxmse != 'visible' && $V0wsalkdxmse != '') {
				$Vze2ah1ycp2c->writeAttribute('state', $V0wsalkdxmse);
			}
			$Vze2ah1ycp2c->writeAttribute('r:id', 		'rId' . $V2jzqhucxhax);
			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	
	private function _writeDefinedNames(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c->startElement('definedNames');

		
		if (count($V2ch40cq1nbr->getNamedRanges()) > 0) {
			
			$this->_writeNamedRanges($Vze2ah1ycp2c, $V2ch40cq1nbr);
		}

		
		$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
			
			$this->_writeDefinedNameForAutofilter($Vze2ah1ycp2c, $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja), $Vfhiq1lhsoja);

			
			$this->_writeDefinedNameForPrintTitles($Vze2ah1ycp2c, $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja), $Vfhiq1lhsoja);

			
			$this->_writeDefinedNameForPrintArea($Vze2ah1ycp2c, $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja), $Vfhiq1lhsoja);
		}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeNamedRanges(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel $V2ch40cq1nbr)
	{
		
		$Voybjd4b0rcn = $V2ch40cq1nbr->getNamedRanges();
		foreach ($Voybjd4b0rcn as $Vdqyivdsly3d) {
			$this->_writeDefinedNameForNamedRange($Vze2ah1ycp2c, $Vdqyivdsly3d);
		}
	}

	
	private function _writeDefinedNameForNamedRange(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_NamedRange $Vhts20fapkva)
	{
		
		$Vze2ah1ycp2c->startElement('definedName');
		$Vze2ah1ycp2c->writeAttribute('name',			$Vhts20fapkva->getName());
		if ($Vhts20fapkva->getLocalOnly()) {
			$Vze2ah1ycp2c->writeAttribute('localSheetId',	$Vhts20fapkva->getScope()->getParent()->getIndex($Vhts20fapkva->getScope()));
		}

		
		$Votjg2jvcmjx = PHPExcel_Cell::splitRange($Vhts20fapkva->getRange());
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < count($Votjg2jvcmjx); $Vfhiq1lhsoja++) {
			$Votjg2jvcmjx[$Vfhiq1lhsoja][0] = '\'' . str_replace("'", "''", $Vhts20fapkva->getWorksheet()->getTitle()) . '\'!' . PHPExcel_Cell::absoluteReference($Votjg2jvcmjx[$Vfhiq1lhsoja][0]);
			if (isset($Votjg2jvcmjx[$Vfhiq1lhsoja][1])) {
				$Votjg2jvcmjx[$Vfhiq1lhsoja][1] = PHPExcel_Cell::absoluteReference($Votjg2jvcmjx[$Vfhiq1lhsoja][1]);
			}
		}
		$Votjg2jvcmjx = PHPExcel_Cell::buildRange($Votjg2jvcmjx);

		$Vze2ah1ycp2c->writeRawData($Votjg2jvcmjx);

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeDefinedNameForAutofilter(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $V2x5nd3usxve = 0)
	{
		
		$Vf22y2ugjneq = $Vci1dgyyzjho->getAutoFilter()->getRange();
		if (!empty($Vf22y2ugjneq)) {
			$Vze2ah1ycp2c->startElement('definedName');
			$Vze2ah1ycp2c->writeAttribute('name',			'_xlnm._FilterDatabase');
			$Vze2ah1ycp2c->writeAttribute('localSheetId',	$V2x5nd3usxve);
			$Vze2ah1ycp2c->writeAttribute('hidden',		'1');

			
			$Votjg2jvcmjx = PHPExcel_Cell::splitRange($Vf22y2ugjneq);
			$Votjg2jvcmjx = $Votjg2jvcmjx[0];
			
			if (strpos($Votjg2jvcmjx[0],'!') !== false) {
				list($Vct2g5kyvvvd,$Votjg2jvcmjx[0]) = explode('!',$Votjg2jvcmjx[0]);
			}

			$Votjg2jvcmjx[0] = PHPExcel_Cell::absoluteCoordinate($Votjg2jvcmjx[0]);
			$Votjg2jvcmjx[1] = PHPExcel_Cell::absoluteCoordinate($Votjg2jvcmjx[1]);
			$Votjg2jvcmjx = implode(':', $Votjg2jvcmjx);

			$Vze2ah1ycp2c->writeRawData('\'' . str_replace("'", "''", $Vci1dgyyzjho->getTitle()) . '\'!' . $Votjg2jvcmjx);

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeDefinedNameForPrintTitles(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $V2x5nd3usxve = 0)
	{
		
		if ($Vci1dgyyzjho->getPageSetup()->isColumnsToRepeatAtLeftSet() || $Vci1dgyyzjho->getPageSetup()->isRowsToRepeatAtTopSet()) {
			$Vze2ah1ycp2c->startElement('definedName');
			$Vze2ah1ycp2c->writeAttribute('name',			'_xlnm.Print_Titles');
			$Vze2ah1ycp2c->writeAttribute('localSheetId',	$V2x5nd3usxve);

			
			$Vqihcvddygw0 = '';

			
			if ($Vci1dgyyzjho->getPageSetup()->isColumnsToRepeatAtLeftSet()) {
				$Ventvdulusdf = $Vci1dgyyzjho->getPageSetup()->getColumnsToRepeatAtLeft();

				$Vqihcvddygw0 .= '\'' . str_replace("'", "''", $Vci1dgyyzjho->getTitle()) . '\'!$' . $Ventvdulusdf[0] . ':$' . $Ventvdulusdf[1];
			}

			
			if ($Vci1dgyyzjho->getPageSetup()->isRowsToRepeatAtTopSet()) {
				if ($Vci1dgyyzjho->getPageSetup()->isColumnsToRepeatAtLeftSet()) {
					$Vqihcvddygw0 .= ',';
				}

				$Ventvdulusdf = $Vci1dgyyzjho->getPageSetup()->getRowsToRepeatAtTop();

				$Vqihcvddygw0 .= '\'' . str_replace("'", "''", $Vci1dgyyzjho->getTitle()) . '\'!$' . $Ventvdulusdf[0] . ':$' . $Ventvdulusdf[1];
			}

			$Vze2ah1ycp2c->writeRawData($Vqihcvddygw0);

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeDefinedNameForPrintArea(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $V2x5nd3usxve = 0)
	{
		
		if ($Vci1dgyyzjho->getPageSetup()->isPrintAreaSet()) {
			$Vze2ah1ycp2c->startElement('definedName');
			$Vze2ah1ycp2c->writeAttribute('name',			'_xlnm.Print_Area');
			$Vze2ah1ycp2c->writeAttribute('localSheetId',	$V2x5nd3usxve);

			
			$Vqihcvddygw0 = '';

			
			$V4t1rtl3zyjt = PHPExcel_Cell::splitRange($Vci1dgyyzjho->getPageSetup()->getPrintArea());

			$V4mx2ieeg04o = array();
			foreach ($V4t1rtl3zyjt as $V4t1rtl3zyjtRect) {
				$V4t1rtl3zyjtRect[0] = PHPExcel_Cell::absoluteReference($V4t1rtl3zyjtRect[0]);
				$V4t1rtl3zyjtRect[1] = PHPExcel_Cell::absoluteReference($V4t1rtl3zyjtRect[1]);
				$V4mx2ieeg04o[] = '\'' . str_replace("'", "''", $Vci1dgyyzjho->getTitle()) . '\'!' . implode(':', $V4t1rtl3zyjtRect);
			}

			$Vze2ah1ycp2c->writeRawData(implode(',', $V4mx2ieeg04o));

			$Vze2ah1ycp2c->endElement();
		}
	}
}
