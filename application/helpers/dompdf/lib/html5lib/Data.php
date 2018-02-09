<?php



class HTML5_Data
{

    
    
    
    
    
    protected static $Vqhfffxx1urf = array(
        0x00 => 0xFFFD, 
        0x0D => 0x000A, 
        0x80 => 0x20AC, 
        0x81 => 0x0081, 
        0x82 => 0x201A, 
        0x83 => 0x0192, 
        0x84 => 0x201E, 
        0x85 => 0x2026, 
        0x86 => 0x2020, 
        0x87 => 0x2021, 
        0x88 => 0x02C6, 
        0x89 => 0x2030, 
        0x8A => 0x0160, 
        0x8B => 0x2039, 
        0x8C => 0x0152, 
        0x8D => 0x008D, 
        0x8E => 0x017D, 
        0x8F => 0x008F, 
        0x90 => 0x0090, 
        0x91 => 0x2018, 
        0x92 => 0x2019, 
        0x93 => 0x201C, 
        0x94 => 0x201D, 
        0x95 => 0x2022, 
        0x96 => 0x2013, 
        0x97 => 0x2014, 
        0x98 => 0x02DC, 
        0x99 => 0x2122, 
        0x9A => 0x0161, 
        0x9B => 0x203A, 
        0x9C => 0x0153, 
        0x9D => 0x009D, 
        0x9E => 0x017E, 
        0x9F => 0x0178, 
    );

    protected static $Vibbelt14pnm;

    protected static $Voscix4yvyqo;

    
    public static function getRealCodepoint($Vl1gwg0s04p2) {
        if (!isset(self::$Vqhfffxx1urf[$Vl1gwg0s04p2])) return false;
        else return self::$Vqhfffxx1urf[$Vl1gwg0s04p2];
    }

    public static function getNamedCharacterReferences() {
        if (!self::$Vibbelt14pnm) {
            self::$Vibbelt14pnm = unserialize(
                file_get_contents(dirname(__FILE__) . '/named-character-references.ser'));
        }
        return self::$Vibbelt14pnm;
    }

    
    public static function utf8chr($V0x4xt3l5phz) {
        

        $V1e1eaicqarh = $Vqwmp2bx0ii2 = $V3pn4yoebl40 = $Vwsgifrh5ics = 0;
        if ($V0x4xt3l5phz < 0x80) {
            
            $V1e1eaicqarh = $V0x4xt3l5phz;
        } else {
            
            $V1e1eaicqarh = ($V0x4xt3l5phz & 0x3F) | 0x80;
            if ($V0x4xt3l5phz < 0x800) {
               $Vqwmp2bx0ii2 = (($V0x4xt3l5phz & 0x7FF) >> 6) | 0xC0;
            } else {
                $Vqwmp2bx0ii2 = (($V0x4xt3l5phz & 0xFC0) >> 6) | 0x80;
                if($V0x4xt3l5phz < 0x10000) {
                    $V3pn4yoebl40 = (($V0x4xt3l5phz >> 12) & 0x0F) | 0xE0;
                } else {
                    $V3pn4yoebl40 = (($V0x4xt3l5phz >> 12) & 0x3F) | 0x80;
                    $Vwsgifrh5ics = (($V0x4xt3l5phz >> 18) & 0x07) | 0xF0;
                }
            }
        }
        
        $Vc0brddnw0vm = '';
        if($Vwsgifrh5ics) $Vc0brddnw0vm .= chr($Vwsgifrh5ics);
        if($V3pn4yoebl40) $Vc0brddnw0vm .= chr($V3pn4yoebl40);
        if($Vqwmp2bx0ii2) $Vc0brddnw0vm .= chr($Vqwmp2bx0ii2);
        $Vc0brddnw0vm .= chr($V1e1eaicqarh);

        return $Vc0brddnw0vm;
    }

}
