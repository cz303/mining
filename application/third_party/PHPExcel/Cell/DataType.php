<?php




class PHPExcel_Cell_DataType
{
    
    const TYPE_STRING2  = 'str';
    const TYPE_STRING   = 's';
    const TYPE_FORMULA  = 'f';
    const TYPE_NUMERIC  = 'n';
    const TYPE_BOOL     = 'b';
    const TYPE_NULL     = 'null';
    const TYPE_INLINE   = 'inlineStr';
    const TYPE_ERROR    = 'e';

    
    private static $Vd34mmo023r0 = array(
        '#NULL!'  => 0,
        '#DIV/0!' => 1,
        '#VALUE!' => 2,
        '#REF!'   => 3,
        '#NAME?'  => 4,
        '#NUM!'   => 5,
        '#N/A'    => 6
    );

    
    public static function getErrorCodes() {
        return self::$Vd34mmo023r0;
    }

    
    public static function dataTypeForValue($Vqujkwol1zut = null) {
        return PHPExcel_Cell_DefaultValueBinder::dataTypeForValue($Vqujkwol1zut);
    }

    
    public static function checkString($Vqujkwol1zut = null)
    {
        if ($Vqujkwol1zut instanceof PHPExcel_RichText) {
            
            return $Vqujkwol1zut;
        }

        
        $Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut, 0, 32767);

        
        $Vqujkwol1zut = str_replace(array("\r\n", "\r"), "\n", $Vqujkwol1zut);

        return $Vqujkwol1zut;
    }

    
    public static function checkErrorCode($Vqujkwol1zut = null)
    {
        $Vqujkwol1zut = (string) $Vqujkwol1zut;

        if ( !array_key_exists($Vqujkwol1zut, self::$Vd34mmo023r0) ) {
            $Vqujkwol1zut = '#NULL!';
        }

        return $Vqujkwol1zut;
    }

}
