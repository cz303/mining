<?php




if (!defined('PHPEXCEL_ROOT')) {
    
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Cell_DefaultValueBinder implements PHPExcel_Cell_IValueBinder
{
    
    public function bindValue(PHPExcel_Cell $Vblc1ueqvbti, $Vp4xjtpabm0l = null)
    {
        
        if (is_string($Vp4xjtpabm0l)) {
            $Vp4xjtpabm0l = PHPExcel_Shared_String::SanitizeUTF8($Vp4xjtpabm0l);
        }

        
        $Vblc1ueqvbti->setValueExplicit( $Vp4xjtpabm0l, self::dataTypeForValue($Vp4xjtpabm0l) );

        
        return TRUE;
    }

    
    public static function dataTypeForValue($Vqujkwol1zut = null) {
        
        if (is_null($Vqujkwol1zut)) {
            return PHPExcel_Cell_DataType::TYPE_NULL;
        } elseif ($Vqujkwol1zut === '') {
            return PHPExcel_Cell_DataType::TYPE_STRING;
        } elseif ($Vqujkwol1zut instanceof PHPExcel_RichText) {
            return PHPExcel_Cell_DataType::TYPE_INLINE;
        } elseif ($Vqujkwol1zut{0} === '=' && strlen($Vqujkwol1zut) > 1) {
            return PHPExcel_Cell_DataType::TYPE_FORMULA;
        } elseif (is_bool($Vqujkwol1zut)) {
            return PHPExcel_Cell_DataType::TYPE_BOOL;
        } elseif (is_float($Vqujkwol1zut) || is_int($Vqujkwol1zut)) {
            return PHPExcel_Cell_DataType::TYPE_NUMERIC;
        } elseif (preg_match('/^\-?([0-9]+\\.?[0-9]*|[0-9]*\\.?[0-9]+)$/', $Vqujkwol1zut)) {
            if (is_string($Vqujkwol1zut) && $Vqujkwol1zut{0} === '0' && strlen($Vqujkwol1zut) > 1 && $Vqujkwol1zut{1} !== '.' ) {
                return PHPExcel_Cell_DataType::TYPE_STRING;
            }
            return PHPExcel_Cell_DataType::TYPE_NUMERIC;
        } elseif (is_string($Vqujkwol1zut) && array_key_exists($Vqujkwol1zut, PHPExcel_Cell_DataType::getErrorCodes())) {
            return PHPExcel_Cell_DataType::TYPE_ERROR;
        }

        return PHPExcel_Cell_DataType::TYPE_STRING;
    }
}
