<?php




class PHPExcel_Writer_OpenDocument_Styles extends PHPExcel_Writer_OpenDocument_WriterPart
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

        
        $Vze2ah1ycp2c->startElement('office:document-styles');
            $Vze2ah1ycp2c->writeAttribute('xmlns:office', 'urn:oasis:names:tc:opendocument:xmlns:office:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:style', 'urn:oasis:names:tc:opendocument:xmlns:style:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:text', 'urn:oasis:names:tc:opendocument:xmlns:text:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:table', 'urn:oasis:names:tc:opendocument:xmlns:table:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:draw', 'urn:oasis:names:tc:opendocument:xmlns:drawing:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:fo', 'urn:oasis:names:tc:opendocument:xmlns:xsl-fo-compatible:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
            $Vze2ah1ycp2c->writeAttribute('xmlns:meta', 'urn:oasis:names:tc:opendocument:xmlns:meta:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:number', 'urn:oasis:names:tc:opendocument:xmlns:datastyle:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:presentation', 'urn:oasis:names:tc:opendocument:xmlns:presentation:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:svg', 'urn:oasis:names:tc:opendocument:xmlns:svg-compatible:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:chart', 'urn:oasis:names:tc:opendocument:xmlns:chart:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dr3d', 'urn:oasis:names:tc:opendocument:xmlns:dr3d:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:math', 'http://www.w3.org/1998/Math/MathML');
            $Vze2ah1ycp2c->writeAttribute('xmlns:form', 'urn:oasis:names:tc:opendocument:xmlns:form:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:script', 'urn:oasis:names:tc:opendocument:xmlns:script:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooo', 'http://openoffice.org/2004/office');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooow', 'http://openoffice.org/2004/writer');
            $Vze2ah1ycp2c->writeAttribute('xmlns:oooc', 'http://openoffice.org/2004/calc');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dom', 'http://www.w3.org/2001/xml-events');
            $Vze2ah1ycp2c->writeAttribute('xmlns:rpt', 'http://openoffice.org/2005/report');
            $Vze2ah1ycp2c->writeAttribute('xmlns:of', 'urn:oasis:names:tc:opendocument:xmlns:of:1.2');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xhtml', 'http://www.w3.org/1999/xhtml');
            $Vze2ah1ycp2c->writeAttribute('xmlns:grddl', 'http://www.w3.org/2003/g/data-view#');
            $Vze2ah1ycp2c->writeAttribute('xmlns:tableooo', 'http://openoffice.org/2009/table');
            $Vze2ah1ycp2c->writeAttribute('xmlns:css3t', 'http://www.w3.org/TR/css3-text/');
            $Vze2ah1ycp2c->writeAttribute('office:version', '1.2');

            $Vze2ah1ycp2c->writeElement('office:font-face-decls');
            $Vze2ah1ycp2c->writeElement('office:styles');
            $Vze2ah1ycp2c->writeElement('office:automatic-styles');
            $Vze2ah1ycp2c->writeElement('office:master-styles');
        $Vze2ah1ycp2c->endElement();

        return $Vze2ah1ycp2c->getData();
    }
}
