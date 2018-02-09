<?php




class PHPExcel_Writer_OpenDocument_Meta extends PHPExcel_Writer_OpenDocument_WriterPart
{
    
    public function write(PHPExcel $V2ch40cq1nbr = null)
    {
        if (!$V2ch40cq1nbr) {
            $V2ch40cq1nbr = $this->getParentWriter()->getPHPExcel();
        }

        $Vze2ah1ycp2c = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        
        $Vze2ah1ycp2c->startDocument('1.0', 'UTF-8');

        
        $Vze2ah1ycp2c->startElement('office:document-meta');
            $Vze2ah1ycp2c->writeAttribute('xmlns:office', 'urn:oasis:names:tc:opendocument:xmlns:office:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
            $Vze2ah1ycp2c->writeAttribute('xmlns:meta', 'urn:oasis:names:tc:opendocument:xmlns:meta:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooo', 'http://openoffice.org/2004/office');
            $Vze2ah1ycp2c->writeAttribute('xmlns:grddl', 'http://www.w3.org/2003/g/data-view#');
            $Vze2ah1ycp2c->writeAttribute('office:version', '1.2');

            $Vze2ah1ycp2c->startElement('office:meta');
                $Vze2ah1ycp2c->writeElement('meta:initial-creator', $V2ch40cq1nbr->getProperties()->getCreator());
                $Vze2ah1ycp2c->writeElement('dc:creator', $V2ch40cq1nbr->getProperties()->getCreator());
                $Vze2ah1ycp2c->writeElement('meta:creation-date', date(DATE_W3C, $V2ch40cq1nbr->getProperties()->getCreated()));
                $Vze2ah1ycp2c->writeElement('dc:date', date(DATE_W3C, $V2ch40cq1nbr->getProperties()->getCreated()));
                $Vze2ah1ycp2c->writeElement('dc:title', $V2ch40cq1nbr->getProperties()->getTitle());
                $Vze2ah1ycp2c->writeElement('dc:description', $V2ch40cq1nbr->getProperties()->getDescription());
                $Vze2ah1ycp2c->writeElement('dc:subject', $V2ch40cq1nbr->getProperties()->getSubject());
                $Vtyhjw5kqdqy = explode(' ', $V2ch40cq1nbr->getProperties()->getKeywords());
                foreach ($Vtyhjw5kqdqy as $V1clez4ig445) {
                    $Vze2ah1ycp2c->writeElement('meta:keyword', $V1clez4ig445);
                }
                
                $Vze2ah1ycp2c->startElement('meta:user-defined');
                    $Vze2ah1ycp2c->writeAttribute('meta:name', 'Company');
                    $Vze2ah1ycp2c->writeRaw($V2ch40cq1nbr->getProperties()->getCompany());
                $Vze2ah1ycp2c->endElement();
                $Vze2ah1ycp2c->startElement('meta:user-defined');
                    $Vze2ah1ycp2c->writeAttribute('meta:name', 'category');
                    $Vze2ah1ycp2c->writeRaw($V2ch40cq1nbr->getProperties()->getCategory());
                $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();

        return $Vze2ah1ycp2c->getData();
    }
}
