<?php




class PHPExcel_Writer_OpenDocument_MetaInf extends PHPExcel_Writer_OpenDocument_WriterPart
{
    
    public function writeManifest(PHPExcel $V2ch40cq1nbr = null)
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

        
        $Vze2ah1ycp2c->startElement('manifest:manifest');
            $Vze2ah1ycp2c->writeAttribute('xmlns:manifest', 'urn:oasis:names:tc:opendocument:xmlns:manifest:1.0');
            $Vze2ah1ycp2c->writeAttribute('manifest:version', '1.2');

            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', '/');
                $Vze2ah1ycp2c->writeAttribute('manifest:version', '1.2');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'application/vnd.oasis.opendocument.spreadsheet');
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', 'meta.xml');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'text/xml');
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', 'settings.xml');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'text/xml');
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', 'content.xml');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'text/xml');
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', 'Thumbnails/thumbnail.png');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'image/png');
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->startElement('manifest:file-entry');
                $Vze2ah1ycp2c->writeAttribute('manifest:full-path', 'styles.xml');
                $Vze2ah1ycp2c->writeAttribute('manifest:media-type', 'text/xml');
            $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();

        return $Vze2ah1ycp2c->getData();
    }
}
