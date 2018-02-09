<?php




class PHPExcel_Style extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
    
    protected $Vjilv0hwv0xf;

    
    protected $Vvhgmb31sf00;

    
    protected $Vbub0evozvwk;

    
    protected $Vvqnyg21iqb4;

    
    protected $V5mkxhe3srmv;

    
    protected $Vmq5psvd0rux;

    
    protected $V3usdakut3zb;

    
    protected $Vdksvjhpmdyv;

    
    protected $Vccyusfg114s = false;

    
    public function __construct($Vk1afaiczap4 = false, $Vm5dy1e2hvny = false)
    {
        
        $this->_isSupervisor = $Vk1afaiczap4;

        
        $this->_conditionalStyles	= array();
        $this->_font              = new PHPExcel_Style_Font($Vk1afaiczap4, $Vm5dy1e2hvny);
        $this->_fill              = new PHPExcel_Style_Fill($Vk1afaiczap4, $Vm5dy1e2hvny);
        $this->_borders           = new PHPExcel_Style_Borders($Vk1afaiczap4, $Vm5dy1e2hvny);
        $this->_alignment         = new PHPExcel_Style_Alignment($Vk1afaiczap4, $Vm5dy1e2hvny);
        $this->_numberFormat      = new PHPExcel_Style_NumberFormat($Vk1afaiczap4, $Vm5dy1e2hvny);
        $this->_protection        = new PHPExcel_Style_Protection($Vk1afaiczap4, $Vm5dy1e2hvny);

        
        if ($Vk1afaiczap4) {
            $this->_font->bindParent($this);
            $this->_fill->bindParent($this);
            $this->_borders->bindParent($this);
            $this->_alignment->bindParent($this);
            $this->_numberFormat->bindParent($this);
            $this->_protection->bindParent($this);
        }
    }

    
    public function getSharedComponent()
    {
        $Vn12on5o0egv = $this->getActiveSheet();
        $Vj5ukc1zpyz2 = $this->getActiveCell(); 

        if ($Vn12on5o0egv->cellExists($Vj5ukc1zpyz2)) {
            $V4de3455flza = $Vn12on5o0egv->getCell($Vj5ukc1zpyz2)->getXfIndex();
        } else {
            $V4de3455flza = 0;
        }

        return $this->_parent->getCellXfByIndex($V4de3455flza);
    }

    
    public function getParent()
    {
        return $this->_parent;
    }

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('quotePrefix' => $Vi2ourgzeiw5);
	}

    
    public function applyFromArray($Vkaawzjkapbw = null, $Vrjsmucskala = true)
    {
        if (is_array($Vkaawzjkapbw)) {
            if ($this->_isSupervisor) {

                $Vem4atrpzxcs = $this->getSelectedCells();

                
                $Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

                
                if (strpos($Vem4atrpzxcs, ':') === false) {
                    $Vnon33r3dxm5 = $Vem4atrpzxcs;
                    $Vsenowpbncam = $Vem4atrpzxcs;
                } else {
                    list($Vnon33r3dxm5, $Vsenowpbncam) = explode(':', $Vem4atrpzxcs);
                }

                
                $Vfo4g014tbnf = PHPExcel_Cell::coordinateFromString($Vnon33r3dxm5);
                $Vaoibuxbewds     = PHPExcel_Cell::coordinateFromString($Vsenowpbncam);

                
                $Vfo4g014tbnf[0]    = PHPExcel_Cell::columnIndexFromString($Vfo4g014tbnf[0]) - 1;
                $Vaoibuxbewds[0]    = PHPExcel_Cell::columnIndexFromString($Vaoibuxbewds[0]) - 1;

                
                if ($Vfo4g014tbnf[0] > $Vaoibuxbewds[0] && $Vfo4g014tbnf[1] > $Vaoibuxbewds[1]) {
                    $Vdln1z2oxpjs = $Vfo4g014tbnf;
                    $Vfo4g014tbnf = $Vaoibuxbewds;
                    $Vaoibuxbewds = $Vdln1z2oxpjs;
                }

                

                if ($Vrjsmucskala && isset($Vkaawzjkapbw['borders'])) {

                    
                    
                    if (isset($Vkaawzjkapbw['borders']['allborders'])) {
                        foreach (array('outline', 'inside') as $Vg1plrqlctjq) {
                            if (!isset($Vkaawzjkapbw['borders'][$Vg1plrqlctjq])) {
                                $Vkaawzjkapbw['borders'][$Vg1plrqlctjq] = $Vkaawzjkapbw['borders']['allborders'];
                            }
                        }
                        unset($Vkaawzjkapbw['borders']['allborders']); 
                    }

                    
                    
                    if (isset($Vkaawzjkapbw['borders']['outline'])) {
                        foreach (array('top', 'right', 'bottom', 'left') as $Vg1plrqlctjq) {
                            if (!isset($Vkaawzjkapbw['borders'][$Vg1plrqlctjq])) {
                                $Vkaawzjkapbw['borders'][$Vg1plrqlctjq] = $Vkaawzjkapbw['borders']['outline'];
                            }
                        }
                        unset($Vkaawzjkapbw['borders']['outline']); 
                    }

                    
                    
                    if (isset($Vkaawzjkapbw['borders']['inside'])) {
                        foreach (array('vertical', 'horizontal') as $Vg1plrqlctjq) {
                            if (!isset($Vkaawzjkapbw['borders'][$Vg1plrqlctjq])) {
                                $Vkaawzjkapbw['borders'][$Vg1plrqlctjq] = $Vkaawzjkapbw['borders']['inside'];
                            }
                        }
                        unset($Vkaawzjkapbw['borders']['inside']); 
                    }

                    
                    $Vcxdw5yamupz = min($Vaoibuxbewds[0] - $Vfo4g014tbnf[0] + 1, 3);
                    $Vdm1fkndbf4n = min($Vaoibuxbewds[1] - $Vfo4g014tbnf[1] + 1, 3);

                    
                    for ($V1e1eaicqarh = 1; $V1e1eaicqarh <= $Vcxdw5yamupz; ++$V1e1eaicqarh) {
                        
                        $V3ugnuaqbih3 = ($V1e1eaicqarh == 3) ?
                            PHPExcel_Cell::stringFromColumnIndex($Vaoibuxbewds[0])
                                : PHPExcel_Cell::stringFromColumnIndex($Vfo4g014tbnf[0] + $V1e1eaicqarh - 1);

                        
                        $Vjo24cc04hyb = ($V1e1eaicqarh == 1) ?
                            PHPExcel_Cell::stringFromColumnIndex($Vfo4g014tbnf[0])
                                : PHPExcel_Cell::stringFromColumnIndex($Vaoibuxbewds[0] - $Vcxdw5yamupz + $V1e1eaicqarh);

                        for ($Vqwmp2bx0ii2 = 1; $Vqwmp2bx0ii2 <= $Vdm1fkndbf4n; ++$Vqwmp2bx0ii2) {

                            
                            $Vf5wpx33isvo = array();

                            
                            if ($V1e1eaicqarh == 1) {
                                $Vf5wpx33isvo[] = 'left';
                            }

                            
                            if ($V1e1eaicqarh == $Vcxdw5yamupz) {
                                $Vf5wpx33isvo[] = 'right';
                            }

                            
                            if ($Vqwmp2bx0ii2 == 1) {
                                $Vf5wpx33isvo[] = 'top';
                            }

                            
                            if ($Vqwmp2bx0ii2 == $Vdm1fkndbf4n) {
                                $Vf5wpx33isvo[] = 'bottom';
                            }

                            
                            $Vhbipnccfhzh = ($Vqwmp2bx0ii2 == 3) ?
                                $Vaoibuxbewds[1] : $Vfo4g014tbnf[1] + $Vqwmp2bx0ii2 - 1;

                            
                            $Ve2pr5owpudo = ($Vqwmp2bx0ii2 == 1) ?
                                $Vfo4g014tbnf[1] : $Vaoibuxbewds[1] - $Vdm1fkndbf4n + $Vqwmp2bx0ii2;

                            
                            $Votjg2jvcmjx = $V3ugnuaqbih3 . $Vhbipnccfhzh . ':' . $Vjo24cc04hyb . $Ve2pr5owpudo;

                            
                            $Vtp4eeogxqtg = $Vkaawzjkapbw;
                            unset($Vtp4eeogxqtg['borders']['inside']);

                            
                            $V4f31vhqxomi = array_diff( array('top', 'right', 'bottom', 'left'), $Vf5wpx33isvo );

                            
                            foreach ($V4f31vhqxomi as $Vsc1aer1rd20) {
                                switch ($Vsc1aer1rd20) {
                                    case 'top':
                                    case 'bottom':
                                        
                                        if (isset($Vkaawzjkapbw['borders']['horizontal'])) {
                                            $Vtp4eeogxqtg['borders'][$Vsc1aer1rd20] = $Vkaawzjkapbw['borders']['horizontal'];
                                        } else {
                                            unset($Vtp4eeogxqtg['borders'][$Vsc1aer1rd20]);
                                        }
                                        break;
                                    case 'left':
                                    case 'right':
                                        
                                        if (isset($Vkaawzjkapbw['borders']['vertical'])) {
                                            $Vtp4eeogxqtg['borders'][$Vsc1aer1rd20] = $Vkaawzjkapbw['borders']['vertical'];
                                        } else {
                                            unset($Vtp4eeogxqtg['borders'][$Vsc1aer1rd20]);
                                        }
                                        break;
                                }
                            }

                            
                            $this->getActiveSheet()->getStyle($Votjg2jvcmjx)->applyFromArray($Vtp4eeogxqtg, false);
                        }
                    }
                    return $this;
                }

                

                
                if (preg_match('/^[A-Z]+1:[A-Z]+1048576$/', $Vem4atrpzxcs)) {
                    $Vg232xf2hvpe = 'COLUMN';
                } else if (preg_match('/^A[0-9]+:XFD[0-9]+$/', $Vem4atrpzxcs)) {
                    $Vg232xf2hvpe = 'ROW';
                } else {
                    $Vg232xf2hvpe = 'CELL';
                }

                
                switch ($Vg232xf2hvpe) {
                    case 'COLUMN':
                        $Ve5juddaymu1 = array();
                        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
                            $Ve5juddaymu1[$this->getActiveSheet()->getColumnDimensionByColumn($Vswazvoa3xts)->getXfIndex()] = true;
                        }
                        break;

                    case 'ROW':
                        $Ve5juddaymu1 = array();
                        for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                            if ($this->getActiveSheet()->getRowDimension($Vexbtekafkvl)->getXfIndex() == null) {
                                $Ve5juddaymu1[0] = true; 
                            } else {
                                $Ve5juddaymu1[$this->getActiveSheet()->getRowDimension($Vexbtekafkvl)->getXfIndex()] = true;
                            }
                        }
                        break;

                    case 'CELL':
                        $Ve5juddaymu1 = array();
                        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
                            for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                                $Ve5juddaymu1[$this->getActiveSheet()->getCellByColumnAndRow($Vswazvoa3xts, $Vexbtekafkvl)->getXfIndex()] = true;
                            }
                        }
                        break;
                }

                
                $Vnqhol1l3dnz = $this->getActiveSheet()->getParent();
                foreach ($Ve5juddaymu1 as $V4cklkfbfzyf => $Vmjk1tfkeav2) {
                    $Vdtcpflt5bhp = $Vnqhol1l3dnz->getCellXfByIndex($V4cklkfbfzyf);
                    $V4rw3mdvh3sq = clone $Vdtcpflt5bhp;
                    $V4rw3mdvh3sq->applyFromArray($Vkaawzjkapbw);

                    if ($V4re5bk2yecc = $Vnqhol1l3dnz->getCellXfByHashCode($V4rw3mdvh3sq->getHashCode())) {
                        
                        $Vv5izs1fxcsk[$V4cklkfbfzyf] = $V4re5bk2yecc->getIndex();
                    } else {
                        
                        $Vnqhol1l3dnz->addCellXf($V4rw3mdvh3sq);
                        $Vv5izs1fxcsk[$V4cklkfbfzyf] = $V4rw3mdvh3sq->getIndex();
                    }
                }

                
                switch ($Vg232xf2hvpe) {
                    case 'COLUMN':
                        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
                            $Vswazvoa3xtsumnDimension = $this->getActiveSheet()->getColumnDimensionByColumn($Vswazvoa3xts);
                            $V4cklkfbfzyf = $Vswazvoa3xtsumnDimension->getXfIndex();
                            $Vswazvoa3xtsumnDimension->setXfIndex($Vv5izs1fxcsk[$V4cklkfbfzyf]);
                        }
                        break;

                    case 'ROW':
                        for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                            $VexbtekafkvlDimension = $this->getActiveSheet()->getRowDimension($Vexbtekafkvl);
                            $V4cklkfbfzyf = $VexbtekafkvlDimension->getXfIndex() === null ?
                                0 : $VexbtekafkvlDimension->getXfIndex(); 
                            $VexbtekafkvlDimension->setXfIndex($Vv5izs1fxcsk[$V4cklkfbfzyf]);
                        }
                        break;

                    case 'CELL':
                        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
                            for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                                $Vblc1ueqvbti = $this->getActiveSheet()->getCellByColumnAndRow($Vswazvoa3xts, $Vexbtekafkvl);
                                $V4cklkfbfzyf = $Vblc1ueqvbti->getXfIndex();
                                $Vblc1ueqvbti->setXfIndex($Vv5izs1fxcsk[$V4cklkfbfzyf]);
                            }
                        }
                        break;
                }

            } else {
                
                if (array_key_exists('fill', $Vkaawzjkapbw)) {
                    $this->getFill()->applyFromArray($Vkaawzjkapbw['fill']);
                }
                if (array_key_exists('font', $Vkaawzjkapbw)) {
                    $this->getFont()->applyFromArray($Vkaawzjkapbw['font']);
                }
                if (array_key_exists('borders', $Vkaawzjkapbw)) {
                    $this->getBorders()->applyFromArray($Vkaawzjkapbw['borders']);
                }
                if (array_key_exists('alignment', $Vkaawzjkapbw)) {
                    $this->getAlignment()->applyFromArray($Vkaawzjkapbw['alignment']);
                }
                if (array_key_exists('numberformat', $Vkaawzjkapbw)) {
                    $this->getNumberFormat()->applyFromArray($Vkaawzjkapbw['numberformat']);
                }
                if (array_key_exists('protection', $Vkaawzjkapbw)) {
                    $this->getProtection()->applyFromArray($Vkaawzjkapbw['protection']);
                }
                if (array_key_exists('quotePrefix', $Vkaawzjkapbw)) {
                    $this->_quotePrefix = $Vkaawzjkapbw['quotePrefix'];
                }
            }
        } else {
            throw new PHPExcel_Exception("Invalid style array passed.");
        }
        return $this;
    }

    
    public function getFill()
    {
        return $this->_fill;
    }

    
    public function getFont()
    {
        return $this->_font;
    }

    
    public function setFont(PHPExcel_Style_Font $Vj0kojsfk0h3)
    {
        $this->_font = $Vj0kojsfk0h3;
        return $this;
    }

    
    public function getBorders()
    {
        return $this->_borders;
    }

    
    public function getAlignment()
    {
        return $this->_alignment;
    }

    
    public function getNumberFormat()
    {
        return $this->_numberFormat;
    }

    
    public function getConditionalStyles()
    {
        return $this->getActiveSheet()->getConditionalStyles($this->getActiveCell());
    }

    
    public function setConditionalStyles($Vqujkwol1zut = null)
    {
        if (is_array($Vqujkwol1zut)) {
            $this->getActiveSheet()->setConditionalStyles($this->getSelectedCells(), $Vqujkwol1zut);
        }
        return $this;
    }

    
    public function getProtection()
    {
        return $this->_protection;
    }

    
    public function getQuotePrefix()
    {
        if ($this->_isSupervisor) {
            return $this->getSharedComponent()->getQuotePrefix();
        }
        return $this->_quotePrefix;
    }

    
    public function setQuotePrefix($Vqujkwol1zut)
    {
        if ($Vqujkwol1zut == '') {
            $Vqujkwol1zut = false;
        }
        if ($this->_isSupervisor) {
            $Vdtcpflt5bhpArray = array('quotePrefix' => $Vqujkwol1zut);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vdtcpflt5bhpArray);
        } else {
            $this->_quotePrefix = (boolean) $Vqujkwol1zut;
        }
        return $this;
    }

    
    public function getHashCode()
    {
        $Von0ztfetaid = '';
        foreach ($this->_conditionalStyles as $Vtvntwrrzi5t) {
            $Von0ztfetaid .= $Vtvntwrrzi5t->getHashCode();
        }

        return md5(
              $this->_fill->getHashCode()
            . $this->_font->getHashCode()
            . $this->_borders->getHashCode()
            . $this->_alignment->getHashCode()
            . $this->_numberFormat->getHashCode()
            . $Von0ztfetaid
            . $this->_protection->getHashCode()
            . ($this->_quotePrefix  ? 't' : 'f')
            . __CLASS__
        );
    }

    
    public function getIndex()
    {
        return $this->_index;
    }

    
    public function setIndex($Vqujkwol1zut)
    {
        $this->_index = $Vqujkwol1zut;
    }

}
