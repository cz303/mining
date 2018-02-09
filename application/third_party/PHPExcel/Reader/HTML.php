<?php



if (!defined('PHPEXCEL_ROOT')) {
    
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_HTML extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{

    
    protected $Vyu5plml4sd2 = 'ANSI';

    
    protected $Vcpdbbaxw2wf = 0;

    
    protected $V5l1y51lqrhn = array(
        'h1' => array('font' => array('bold' => true,
                'size' => 24,
            ),
        ), 
        'h2' => array('font' => array('bold' => true,
                'size' => 18,
            ),
        ), 
        'h3' => array('font' => array('bold' => true,
                'size' => 13.5,
            ),
        ), 
        'h4' => array('font' => array('bold' => true,
                'size' => 12,
            ),
        ), 
        'h5' => array('font' => array('bold' => true,
                'size' => 10,
            ),
        ), 
        'h6' => array('font' => array('bold' => true,
                'size' => 7.5,
            ),
        ), 
        'a' => array('font' => array('underline' => true,
                'color' => array('argb' => PHPExcel_Style_Color::COLOR_BLUE,
                ),
            ),
        ), 
        'hr' => array('borders' => array('bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(\PHPExcel_Style_Color::COLOR_BLACK,
                    ),
                ),
            ),
        ), 
    );

    protected $Vzws1vqplcny = array();

    
    public function __construct()
    {
        $this->_readFilter = new PHPExcel_Reader_DefaultReadFilter();
    }

    
    protected function _isValidFormat()
    {
        
        $Vou4vxorrdoe = fread($this->_fileHandle, 2048);
        if ((strpos($Vou4vxorrdoe, '<') !== FALSE) &&
                (strlen($Vou4vxorrdoe) !== strlen(strip_tags($Vou4vxorrdoe)))) {
            return TRUE;
        }

        return FALSE;
    }

    
    public function load($V1tltbb5c5oc)
    {
        
        $Vkggi1o2uo0k = new PHPExcel();

        
        return $this->loadIntoExisting($V1tltbb5c5oc, $Vkggi1o2uo0k);
    }

    
    public function setInputEncoding($Vqujkwol1zut = 'ANSI')
    {
        $this->_inputEncoding = $Vqujkwol1zut;

        return $this;
    }

    
    public function getInputEncoding()
    {
        return $this->_inputEncoding;
    }

    
    protected $Vnyqlv0wib5i = array();
    protected $Vtjhfmci3j2b = 0;
    protected $Vajibtpj31qt = array('A');

    protected function _setTableStartColumn($Vn4q2p4mkwa0)
    {
        if ($this->_tableLevel == 0)
            $Vn4q2p4mkwa0 = 'A';
        ++$this->_tableLevel;
        $this->_nestedColumn[$this->_tableLevel] = $Vn4q2p4mkwa0;

        return $this->_nestedColumn[$this->_tableLevel];
    }

    protected function _getTableStartColumn()
    {
        return $this->_nestedColumn[$this->_tableLevel];
    }

    protected function _releaseTableStartColumn()
    {
        --$this->_tableLevel;

        return array_pop($this->_nestedColumn);
    }

    protected function _flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, &$Va1c1kilvskj)
    {
        if (is_string($Va1c1kilvskj)) {
            
            if (trim($Va1c1kilvskj) > '') {
                

                
                
                $Vzg4jtrmmzdy->setCellValue($Vn4q2p4mkwa0 . $Vexbtekafkvl, $Va1c1kilvskj, true);
                $this->_dataArray[$Vexbtekafkvl][$Vn4q2p4mkwa0] = $Va1c1kilvskj;
            }
        } else {
            
            
            $this->_dataArray[$Vexbtekafkvl][$Vn4q2p4mkwa0] = 'RICH TEXT: ' . $Va1c1kilvskj;
        }
        $Va1c1kilvskj = (string) '';
    }

    protected function _processDomElement(DOMNode $Vltoddaysjlm, $Vzg4jtrmmzdy, &$Vexbtekafkvl, &$Vn4q2p4mkwa0, &$Va1c1kilvskj, $Vrcanlvxmlmp = null)
    {
        foreach ($Vltoddaysjlm->childNodes as $Vcnoizcxjx0n) {
            if ($Vcnoizcxjx0n instanceof DOMText) {
                $Vhrwkl5i1vp3 = preg_replace('/\s+/', ' ', trim($Vcnoizcxjx0n->nodeValue));
                if (is_string($Va1c1kilvskj)) {
                    
                    $Va1c1kilvskj .= $Vhrwkl5i1vp3;
                } else {
                    
                    
                }
            } elseif ($Vcnoizcxjx0n instanceof DOMElement) {


                $Vvwtctcfojc1 = array();
                foreach ($Vcnoizcxjx0n->attributes as $V5vj2oq0dri2) {

                    $Vvwtctcfojc1[$V5vj2oq0dri2->name] = $V5vj2oq0dri2->value;
                }

                switch ($Vcnoizcxjx0n->nodeName) {
                    case 'meta' :
                        foreach ($Vvwtctcfojc1 as $V5vj2oq0dri2Name => $V5vj2oq0dri2Value) {
                            switch ($V5vj2oq0dri2Name) {
                                case 'content':
                                    
                                    
                                    break;
                            }
                        }
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        break;
                    case 'title' :
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        $Vzg4jtrmmzdy->setTitle($Va1c1kilvskj);
                        $Va1c1kilvskj = '';
                        break;
                    case 'span' :
                    case 'div' :
                    case 'font' :
                    case 'i' :
                    case 'em' :
                    case 'strong':
                    case 'b' :

                        if ($Va1c1kilvskj > '')
                            $Va1c1kilvskj .= ' ';
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        if ($Va1c1kilvskj > '')
                            $Va1c1kilvskj .= ' ';

                        break;
                    case 'hr' :
                        $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                        ++$Vexbtekafkvl;
                        if (isset($this->_formats[$Vcnoizcxjx0n->nodeName])) {
                            $Vzg4jtrmmzdy->getStyle($Vn4q2p4mkwa0 . $Vexbtekafkvl)->applyFromArray($this->_formats[$Vcnoizcxjx0n->nodeName]);
                        } else {
                            $Va1c1kilvskj = '----------';
                            $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                        }
                        ++$Vexbtekafkvl;
                    case 'br' :
                        if ($this->_tableLevel > 0) {
                            
                            $Va1c1kilvskj .= "\n";
                        } else {
                            
                            $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                            ++$Vexbtekafkvl;
                        }

                        break;
                    case 'a' :

                        foreach ($Vvwtctcfojc1 as $V5vj2oq0dri2Name => $V5vj2oq0dri2Value) {
                            switch ($V5vj2oq0dri2Name) {
                                case 'href':

                                    $Vzg4jtrmmzdy->getCell($Vn4q2p4mkwa0 . $Vexbtekafkvl)->getHyperlink()->setUrl($V5vj2oq0dri2Value);
                                    if (isset($this->_formats[$Vcnoizcxjx0n->nodeName])) {
                                        $Vzg4jtrmmzdy->getStyle($Vn4q2p4mkwa0 . $Vexbtekafkvl)->applyFromArray($this->_formats[$Vcnoizcxjx0n->nodeName]);
                                    }
                                    break;
                            }
                        }
                        $Va1c1kilvskj .= ' ';
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                        break;
                    case 'h1' :
                    case 'h2' :
                    case 'h3' :
                    case 'h4' :
                    case 'h5' :
                    case 'h6' :
                    case 'ol' :
                    case 'ul' :
                    case 'p' :
                        if ($this->_tableLevel > 0) {
                            
                            $Va1c1kilvskj .= "\n";

                            $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                        } else {
                            if ($Va1c1kilvskj > '') {
                                $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                                $Vexbtekafkvl++;
                            }

                            $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                            $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);

                            if (isset($this->_formats[$Vcnoizcxjx0n->nodeName])) {
                                $Vzg4jtrmmzdy->getStyle($Vn4q2p4mkwa0 . $Vexbtekafkvl)->applyFromArray($this->_formats[$Vcnoizcxjx0n->nodeName]);
                            }

                            $Vexbtekafkvl++;
                            $Vn4q2p4mkwa0 = 'A';
                        }
                        break;
                    case 'li' :
                        if ($this->_tableLevel > 0) {
                            
                            $Va1c1kilvskj .= "\n";

                            $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                        } else {
                            if ($Va1c1kilvskj > '') {
                                $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                            }
                            ++$Vexbtekafkvl;

                            $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                            $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                            $Vn4q2p4mkwa0 = 'A';
                        }
                        break;
                    case 'table' :
                        $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);
                        $Vn4q2p4mkwa0 = $this->_setTableStartColumn($Vn4q2p4mkwa0);

                        if ($this->_tableLevel > 1)
                            --$Vexbtekafkvl;
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);

                        $Vn4q2p4mkwa0 = $this->_releaseTableStartColumn();
                        if ($this->_tableLevel > 1) {
                            ++$Vn4q2p4mkwa0;
                        } else {
                            ++$Vexbtekafkvl;
                        }
                        break;
                    case 'thead' :
                    case 'tbody' :
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        break;
                    case 'tr' :
                        $Vn4q2p4mkwa0 = $this->_getTableStartColumn();
                        $Va1c1kilvskj = '';

                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        ++$Vexbtekafkvl;

                        break;
                    case 'th' :
                    case 'td' :

                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);


                        while (isset($this->rowspan[$Vn4q2p4mkwa0 . $Vexbtekafkvl])) {
                            ++$Vn4q2p4mkwa0;
                        }

                        $this->_flushCell($Vzg4jtrmmzdy, $Vn4q2p4mkwa0, $Vexbtekafkvl, $Va1c1kilvskj);

                        if (isset($Vvwtctcfojc1['style']) && !empty($Vvwtctcfojc1['style'])) {
                            $Vujdfnsu5jed = $this->getPhpExcelStyleArray($Vvwtctcfojc1['style']);

                            if (!empty($Vujdfnsu5jed)) {
                                $Vzg4jtrmmzdy->getStyle($Vn4q2p4mkwa0 . $Vexbtekafkvl)->applyFromArray($Vujdfnsu5jed);
                            }
                        }

                        if (isset($Vvwtctcfojc1['rowspan']) && isset($Vvwtctcfojc1['colspan'])) {
                            
                            $Vn4q2p4mkwa0To = $Vn4q2p4mkwa0;
                            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vvwtctcfojc1['colspan'] - 1; $Vfhiq1lhsoja++) {
                                ++$Vn4q2p4mkwa0To;
                            }
                            $Votjg2jvcmjx = $Vn4q2p4mkwa0 . $Vexbtekafkvl . ':' . $Vn4q2p4mkwa0To . ($Vexbtekafkvl + $Vvwtctcfojc1['rowspan'] - 1);
                            foreach (\PHPExcel_Cell::extractAllCellReferencesInRange($Votjg2jvcmjx) as $Vp4xjtpabm0l) {
                                $this->rowspan[$Vp4xjtpabm0l] = true;
                            }
                            $Vzg4jtrmmzdy->mergeCells($Votjg2jvcmjx);
                            $Vn4q2p4mkwa0 = $Vn4q2p4mkwa0To;
                        } elseif (isset($Vvwtctcfojc1['rowspan'])) {
                            
                            $Votjg2jvcmjx = $Vn4q2p4mkwa0 . $Vexbtekafkvl . ':' . $Vn4q2p4mkwa0 . ($Vexbtekafkvl + $Vvwtctcfojc1['rowspan'] - 1);
                            foreach (\PHPExcel_Cell::extractAllCellReferencesInRange($Votjg2jvcmjx) as $Vp4xjtpabm0l) {
                                $this->rowspan[$Vp4xjtpabm0l] = true;
                            }
                            $Vzg4jtrmmzdy->mergeCells($Votjg2jvcmjx);
                        } elseif (isset($Vvwtctcfojc1['colspan'])) {
                            
                            $Vn4q2p4mkwa0To = $Vn4q2p4mkwa0;
                            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vvwtctcfojc1['colspan'] - 1; $Vfhiq1lhsoja++) {
                                ++$Vn4q2p4mkwa0To;
                            }
                            $Vzg4jtrmmzdy->mergeCells($Vn4q2p4mkwa0 . $Vexbtekafkvl . ':' . $Vn4q2p4mkwa0To . $Vexbtekafkvl);
                            $Vn4q2p4mkwa0 = $Vn4q2p4mkwa0To;
                        }
                        ++$Vn4q2p4mkwa0;
                        break;
                    case 'body' :
                        $Vexbtekafkvl = 1;
                        $Vn4q2p4mkwa0 = 'A';
                        $Vuodfnw5ilgc = '';
                        $this->_tableLevel = 0;
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                        break;
                    default:
                        $this->_processDomElement($Vcnoizcxjx0n, $Vzg4jtrmmzdy, $Vexbtekafkvl, $Vn4q2p4mkwa0, $Va1c1kilvskj);
                }
            }
        }
    }

    
    public function loadIntoExisting($V1tltbb5c5oc, PHPExcel $Vkggi1o2uo0k)
    {
        
        $this->_openFile($V1tltbb5c5oc);
        if (!$this->_isValidFormat()) {
            fclose($this->_fileHandle);
            throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid HTML file.");
        }
        
        fclose($this->_fileHandle);

        
        while ($Vkggi1o2uo0k->getSheetCount() <= $this->_sheetIndex) {
            $Vkggi1o2uo0k->createSheet();
        }
        $Vkggi1o2uo0k->setActiveSheetIndex($this->_sheetIndex);

        
        $Voaqq1lpxh5u = new domDocument;
        
        $Vc4swogfkulk = $Voaqq1lpxh5u->loadHTMLFile($V1tltbb5c5oc);
        if ($Vc4swogfkulk === FALSE) {
            throw new PHPExcel_Reader_Exception('Failed to load ', $V1tltbb5c5oc, ' as a DOM Document');
        }

        
        $Voaqq1lpxh5u->preserveWhiteSpace = false;

        $Vexbtekafkvl = 0;
        $Vn4q2p4mkwa0 = 'A';
        $Vuodfnw5ilgc = '';
        $this->_processDomElement($Voaqq1lpxh5u, $Vkggi1o2uo0k->getActiveSheet(), $Vexbtekafkvl, $Vn4q2p4mkwa0, $Vuodfnw5ilgc);

		
        return $Vkggi1o2uo0k;
    }

    
    public function getSheetIndex()
    {
        return $this->_sheetIndex;
    }

    
    public function setSheetIndex($Vqujkwol1zut = 0)
    {
        $this->_sheetIndex = $Vqujkwol1zut;

        return $this;
    }

}

