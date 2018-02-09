<?php




class PHPExcel_Writer_Excel2007_RelsVBA extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeVBARelationships(PHPExcel $V2ch40cq1nbr = null){
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');
		$Vze2ah1ycp2c->startElement('Relationship');
		$Vze2ah1ycp2c->writeAttribute('Id', 'rId1');
		$Vze2ah1ycp2c->writeAttribute('Type', 'http://schemas.microsoft.com/office/2006/relationships/vbaProjectSignature');
		$Vze2ah1ycp2c->writeAttribute('Target', 'vbaProjectSignature.bin');
		$Vze2ah1ycp2c->endElement();
		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();

	}

}
