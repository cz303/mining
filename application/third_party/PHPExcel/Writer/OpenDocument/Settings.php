<?php




class PHPExcel_Writer_OpenDocument_Settings extends PHPExcel_Writer_OpenDocument_WriterPart
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

        
        $Vze2ah1ycp2c->startElement('office:document-settings');
            $Vze2ah1ycp2c->writeAttribute('xmlns:office', 'urn:oasis:names:tc:opendocument:xmlns:office:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
            $Vze2ah1ycp2c->writeAttribute('xmlns:config', 'urn:oasis:names:tc:opendocument:xmlns:config:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooo', 'http://openoffice.org/2004/office');
            $Vze2ah1ycp2c->writeAttribute('office:version', '1.2');

            $Vze2ah1ycp2c->startElement('office:settings');
                $Vze2ah1ycp2c->startElement('config:config-item-set');
                    $Vze2ah1ycp2c->writeAttribute('config:name', 'ooo:view-settings');
                    $Vze2ah1ycp2c->startElement('config:config-item-map-indexed');
                        $Vze2ah1ycp2c->writeAttribute('config:name', 'Views');
                    $Vze2ah1ycp2c->endElement();
                $Vze2ah1ycp2c->endElement();
                $Vze2ah1ycp2c->startElement('config:config-item-set');
                    $Vze2ah1ycp2c->writeAttribute('config:name', 'ooo:configuration-settings');
                $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();

        return $Vze2ah1ycp2c->getData();
    }
}
