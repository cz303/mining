<?php




$Vlvbyymgu3b4 = PHPExcel_Settings::getPdfRendererPath() . '/dompdf_config.inc.php';
if (file_exists($Vlvbyymgu3b4)) {
    require_once $Vlvbyymgu3b4;
} else {
    throw new PHPExcel_Writer_Exception('Unable to load PDF Rendering library');
}


class PHPExcel_Writer_PDF_DomPDF extends PHPExcel_Writer_PDF_Core implements PHPExcel_Writer_IWriter
{
    
    public function __construct(PHPExcel $Vlspthbp3hwz)
    {
        parent::__construct($Vlspthbp3hwz);
    }

    
    public function save($V1tltbb5c5oc = NULL)
    {
        $Vsg4lebcui4l = parent::prepareForSave($V1tltbb5c5oc);

        
        $Vbs1o2ly1hh3 = 'LETTER';    

        
        if (is_null($this->getSheetIndex())) {
            $Viltsyxewtah = ($this->_phpExcel->getSheet(0)->getPageSetup()->getOrientation()
                == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                    ? 'L'
                    : 'P';
            $Vkocu2p32uyh = $this->_phpExcel->getSheet(0)->getPageSetup()->getPaperSize();
            $Vfdygaakbpgm = $this->_phpExcel->getSheet(0)->getPageMargins();
        } else {
            $Viltsyxewtah = ($this->_phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()
                == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                    ? 'L'
                    : 'P';
            $Vkocu2p32uyh = $this->_phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();
            $Vfdygaakbpgm = $this->_phpExcel->getSheet($this->getSheetIndex())->getPageMargins();
        }

        
        $Viltsyxewtah = ($Viltsyxewtah == 'L') ? 'landscape' : 'portrait';

        
        if (!is_null($this->getOrientation())) {
            $Viltsyxewtah = ($this->getOrientation() == PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT)
                ? PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT
                : $this->getOrientation();
        }
        
        if (!is_null($this->getPaperSize())) {
            $Vkocu2p32uyh = $this->getPaperSize();
        }

        if (isset(self::$Vsr4fnqzou2m[$Vkocu2p32uyh])) {
            $Vbs1o2ly1hh3 = self::$Vsr4fnqzou2m[$Vkocu2p32uyh];
        }


        
        $Vxj5miiauhxo = new DOMPDF();
        $Vxj5miiauhxo->set_paper(strtolower($Vbs1o2ly1hh3), $Viltsyxewtah);

        $Vxj5miiauhxo->load_html(
            $this->generateHTMLHeader(FALSE) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );
        $Vxj5miiauhxo->render();

        
        fwrite($Vsg4lebcui4l, $Vxj5miiauhxo->output());

		parent::restoreStateAfterSave($Vsg4lebcui4l);
    }

}
