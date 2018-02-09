<?php




if (!defined('PHPEXCEL_ROOT')) {
    
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Cell_AdvancedValueBinder extends PHPExcel_Cell_DefaultValueBinder implements PHPExcel_Cell_IValueBinder
{
    
    public function bindValue(PHPExcel_Cell $Vblc1ueqvbti, $Vp4xjtpabm0l = null)
    {
        
        if (is_string($Vp4xjtpabm0l)) {
            $Vp4xjtpabm0l = PHPExcel_Shared_String::SanitizeUTF8($Vp4xjtpabm0l);
        }

        
        $Vjrftzif43kq = parent::dataTypeForValue($Vp4xjtpabm0l);

        
        if ($Vjrftzif43kq === PHPExcel_Cell_DataType::TYPE_STRING && !$Vp4xjtpabm0l instanceof PHPExcel_RichText) {
            
            if ($Vp4xjtpabm0l == PHPExcel_Calculation::getTRUE()) {
                $Vblc1ueqvbti->setValueExplicit( TRUE, PHPExcel_Cell_DataType::TYPE_BOOL);
                return true;
            } elseif($Vp4xjtpabm0l == PHPExcel_Calculation::getFALSE()) {
                $Vblc1ueqvbti->setValueExplicit( FALSE, PHPExcel_Cell_DataType::TYPE_BOOL);
                return true;
            }

            
            if (preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_NUMBER.'$/', $Vp4xjtpabm0l)) {
                $Vblc1ueqvbti->setValueExplicit( (float) $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                return true;
            }

            
            if (preg_match('/^([+-]?)\s*([0-9]+)\s?\/\s*([0-9]+)$/', $Vp4xjtpabm0l, $Vt3xexsia3ta)) {
                
                $Vp4xjtpabm0l = $Vt3xexsia3ta[2] / $Vt3xexsia3ta[3];
                if ($Vt3xexsia3ta[1] == '-') $Vp4xjtpabm0l = 0 - $Vp4xjtpabm0l;
                $Vblc1ueqvbti->setValueExplicit( (float) $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( '??/??' );
                return true;
            } elseif (preg_match('/^([+-]?)([0-9]*) +([0-9]*)\s?\/\s*([0-9]*)$/', $Vp4xjtpabm0l, $Vt3xexsia3ta)) {
                
                $Vp4xjtpabm0l = $Vt3xexsia3ta[2] + ($Vt3xexsia3ta[3] / $Vt3xexsia3ta[4]);
                if ($Vt3xexsia3ta[1] == '-') $Vp4xjtpabm0l = 0 - $Vp4xjtpabm0l;
                $Vblc1ueqvbti->setValueExplicit( (float) $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( '# ??/??' );
                return true;
            }

            
            if (preg_match('/^\-?[0-9]*\.?[0-9]*\s?\%$/', $Vp4xjtpabm0l)) {
                
                $Vp4xjtpabm0l = (float) str_replace('%', '', $Vp4xjtpabm0l) / 100;
                $Vblc1ueqvbti->setValueExplicit( $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00 );
                return true;
            }

            
            $Vcdjk44hyvr2 = PHPExcel_Shared_String::getCurrencyCode();
            $Vv02y22jsbh1 = PHPExcel_Shared_String::getDecimalSeparator();
            $Vm2t4v4re4ir = PHPExcel_Shared_String::getThousandsSeparator();
            if (preg_match('/^'.preg_quote($Vcdjk44hyvr2).' *(\d{1,3}('.preg_quote($Vm2t4v4re4ir).'\d{3})*|(\d+))('.preg_quote($Vv02y22jsbh1).'\d{2})?$/', $Vp4xjtpabm0l)) {
                
                $Vp4xjtpabm0l = (float) trim(str_replace(array($Vcdjk44hyvr2, $Vm2t4v4re4ir, $Vv02y22jsbh1), array('', '', '.'), $Vp4xjtpabm0l));
                $Vblc1ueqvbti->setValueExplicit( $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode(
                        str_replace('$', $Vcdjk44hyvr2, PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE )
                    );
                return true;
            } elseif (preg_match('/^\$ *(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/', $Vp4xjtpabm0l)) {
                
                $Vp4xjtpabm0l = (float) trim(str_replace(array('$',','), '', $Vp4xjtpabm0l));
                $Vblc1ueqvbti->setValueExplicit( $Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE );
                return true;
            }

            
            if (preg_match('/^(\d|[0-1]\d|2[0-3]):[0-5]\d$/', $Vp4xjtpabm0l)) {
                
                list($Vvlxmepre4ko, $Vt54vmttyjzc) = explode(':', $Vp4xjtpabm0l);
                $Vloow0ofeahg = $Vvlxmepre4ko / 24 + $Vt54vmttyjzc / 1440;
                $Vblc1ueqvbti->setValueExplicit($Vloow0ofeahg, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME3 );
                return true;
            }

            
            if (preg_match('/^(\d|[0-1]\d|2[0-3]):[0-5]\d:[0-5]\d$/', $Vp4xjtpabm0l)) {
                
                list($Vvlxmepre4ko, $Vt54vmttyjzc, $V2n430jknk35) = explode(':', $Vp4xjtpabm0l);
                $Vloow0ofeahg = $Vvlxmepre4ko / 24 + $Vt54vmttyjzc / 1440 + $V2n430jknk35 / 86400;
                
                $Vblc1ueqvbti->setValueExplicit($Vloow0ofeahg, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4 );
                return true;
            }

            
            if (($Vrec2f1japon = PHPExcel_Shared_Date::stringToExcel($Vp4xjtpabm0l)) !== false) {
                
                $Vblc1ueqvbti->setValueExplicit($Vrec2f1japon, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                
                if (strpos($Vp4xjtpabm0l, ':') !== false) {
                    $Ve5ckeo1jgxp = 'yyyy-mm-dd h:mm';
                } else {
                    $Ve5ckeo1jgxp = 'yyyy-mm-dd';
                }
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getNumberFormat()->setFormatCode($Ve5ckeo1jgxp);
                return true;
            }

            
            if (strpos($Vp4xjtpabm0l, "\n") !== FALSE) {
                $Vp4xjtpabm0l = PHPExcel_Shared_String::SanitizeUTF8($Vp4xjtpabm0l);
                $Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_STRING);
                
                $Vblc1ueqvbti->getWorksheet()->getStyle( $Vblc1ueqvbti->getCoordinate() )
                    ->getAlignment()->setWrapText(TRUE);
                return true;
            }
        }

        
        return parent::bindValue($Vblc1ueqvbti, $Vp4xjtpabm0l);
    }
}
