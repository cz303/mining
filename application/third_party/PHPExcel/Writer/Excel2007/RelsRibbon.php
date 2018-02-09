<?php




class PHPExcel_Writer_Excel2007_RelsRibbon extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeRibbonRelationships(PHPExcel $V2ch40cq1nbr = null){
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');
		$Vw3jixcqzq12=$V2ch40cq1nbr->getRibbonBinObjects('names');
		if(is_array($Vw3jixcqzq12)){
			foreach($Vw3jixcqzq12 as $Vihkv1htij0h=>$Vyqtrdshnrzi){
				$Vze2ah1ycp2c->startElement('Relationship');
				$Vze2ah1ycp2c->writeAttribute('Id', $Vihkv1htij0h);
				$Vze2ah1ycp2c->writeAttribute('Type', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image');
				$Vze2ah1ycp2c->writeAttribute('Target', $Vyqtrdshnrzi);
				$Vze2ah1ycp2c->endElement();
			}
		}
		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();

	}

}
