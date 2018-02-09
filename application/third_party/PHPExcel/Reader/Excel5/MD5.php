<?php




class PHPExcel_Reader_Excel5_MD5
{
    
    private $Vi3y3l1uvwp3;
    private $V4t3fwdd3eev;
    private $V4y0urwpnd3j;
    private $Vrec2f1japon;


    
    public function __construct()
    {
        $Veca2om3awughis->reset();
    }


    
    public function reset()
    {
        $Veca2om3awughis->a = 0x67452301;
        $Veca2om3awughis->b = 0xEFCDAB89;
        $Veca2om3awughis->c = 0x98BADCFE;
        $Veca2om3awughis->d = 0x10325476;
    }


    
    public function getContext()
    {
        $V2n430jknk35 = '';
        foreach (array('a', 'b', 'c', 'd') as $Vfhiq1lhsoja) {
            $Vf1kwqxxhqpz = $Veca2om3awughis->{$Vfhiq1lhsoja};
            $V2n430jknk35 .= chr($Vf1kwqxxhqpz & 0xff);
            $V2n430jknk35 .= chr(($Vf1kwqxxhqpz >> 8) & 0xff);
            $V2n430jknk35 .= chr(($Vf1kwqxxhqpz >> 16) & 0xff);
            $V2n430jknk35 .= chr(($Vf1kwqxxhqpz >> 24) & 0xff);
        }

        return $V2n430jknk35;
    }


    
    public function add($Vrec2f1japonata)
    {
        $Vy2izp1ogoso = array_values(unpack('V16', $Vrec2f1japonata));

        $Vk0c33a31nhe = $Veca2om3awughis->a;
        $Vjd52v1uhh5z = $Veca2om3awughis->b;
        $Vhsnkwwx3zv4 = $Veca2om3awughis->c;
        $Vdcqwqaps4qc = $Veca2om3awughis->d;

        $Veahedrfcogv = array('PHPExcel_Reader_Excel5_MD5','F');
        $Vxpj20msousj = array('PHPExcel_Reader_Excel5_MD5','G');
        $Vty52qlbtnbx = array('PHPExcel_Reader_Excel5_MD5','H');
        $Vqe0tr4mexwu = array('PHPExcel_Reader_Excel5_MD5','I');

        
        self::step($Veahedrfcogv, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[0], 7, 0xd76aa478);
        self::step($Veahedrfcogv, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[1], 12, 0xe8c7b756);
        self::step($Veahedrfcogv, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[2], 17, 0x242070db);
        self::step($Veahedrfcogv, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[3], 22, 0xc1bdceee);
        self::step($Veahedrfcogv, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[4], 7, 0xf57c0faf);
        self::step($Veahedrfcogv, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[5], 12, 0x4787c62a);
        self::step($Veahedrfcogv, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[6], 17, 0xa8304613);
        self::step($Veahedrfcogv, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[7], 22, 0xfd469501);
        self::step($Veahedrfcogv, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[8], 7, 0x698098d8);
        self::step($Veahedrfcogv, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[9], 12, 0x8b44f7af);
        self::step($Veahedrfcogv, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[10], 17, 0xffff5bb1);
        self::step($Veahedrfcogv, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[11], 22, 0x895cd7be);
        self::step($Veahedrfcogv, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[12], 7, 0x6b901122);
        self::step($Veahedrfcogv, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[13], 12, 0xfd987193);
        self::step($Veahedrfcogv, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[14], 17, 0xa679438e);
        self::step($Veahedrfcogv, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[15], 22, 0x49b40821);

        
        self::step($Vxpj20msousj, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[1], 5, 0xf61e2562);
        self::step($Vxpj20msousj, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[6], 9, 0xc040b340);
        self::step($Vxpj20msousj, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[11], 14, 0x265e5a51);
        self::step($Vxpj20msousj, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[0], 20, 0xe9b6c7aa);
        self::step($Vxpj20msousj, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[5], 5, 0xd62f105d);
        self::step($Vxpj20msousj, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[10], 9, 0x02441453);
        self::step($Vxpj20msousj, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[15], 14, 0xd8a1e681);
        self::step($Vxpj20msousj, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[4], 20, 0xe7d3fbc8);
        self::step($Vxpj20msousj, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[9], 5, 0x21e1cde6);
        self::step($Vxpj20msousj, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[14], 9, 0xc33707d6);
        self::step($Vxpj20msousj, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[3], 14, 0xf4d50d87);
        self::step($Vxpj20msousj, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[8], 20, 0x455a14ed);
        self::step($Vxpj20msousj, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[13], 5, 0xa9e3e905);
        self::step($Vxpj20msousj, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[2], 9, 0xfcefa3f8);
        self::step($Vxpj20msousj, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[7], 14, 0x676f02d9);
        self::step($Vxpj20msousj, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[12], 20, 0x8d2a4c8a);

        
        self::step($Vty52qlbtnbx, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[5], 4, 0xfffa3942);
        self::step($Vty52qlbtnbx, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[8], 11, 0x8771f681);
        self::step($Vty52qlbtnbx, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[11], 16, 0x6d9d6122);
        self::step($Vty52qlbtnbx, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[14], 23, 0xfde5380c);
        self::step($Vty52qlbtnbx, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[1], 4, 0xa4beea44);
        self::step($Vty52qlbtnbx, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[4], 11, 0x4bdecfa9);
        self::step($Vty52qlbtnbx, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[7], 16, 0xf6bb4b60);
        self::step($Vty52qlbtnbx, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[10], 23, 0xbebfbc70);
        self::step($Vty52qlbtnbx, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[13], 4, 0x289b7ec6);
        self::step($Vty52qlbtnbx, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[0], 11, 0xeaa127fa);
        self::step($Vty52qlbtnbx, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[3], 16, 0xd4ef3085);
        self::step($Vty52qlbtnbx, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[6], 23, 0x04881d05);
        self::step($Vty52qlbtnbx, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[9], 4, 0xd9d4d039);
        self::step($Vty52qlbtnbx, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[12], 11, 0xe6db99e5);
        self::step($Vty52qlbtnbx, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[15], 16, 0x1fa27cf8);
        self::step($Vty52qlbtnbx, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[2], 23, 0xc4ac5665);

        
        self::step($Vqe0tr4mexwu, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[0], 6, 0xf4292244);
        self::step($Vqe0tr4mexwu, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[7], 10, 0x432aff97);
        self::step($Vqe0tr4mexwu, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[14], 15, 0xab9423a7);
        self::step($Vqe0tr4mexwu, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[5], 21, 0xfc93a039);
        self::step($Vqe0tr4mexwu, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[12], 6, 0x655b59c3);
        self::step($Vqe0tr4mexwu, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[3], 10, 0x8f0ccc92);
        self::step($Vqe0tr4mexwu, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[10], 15, 0xffeff47d);
        self::step($Vqe0tr4mexwu, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[1], 21, 0x85845dd1);
        self::step($Vqe0tr4mexwu, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[8], 6, 0x6fa87e4f);
        self::step($Vqe0tr4mexwu, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[15], 10, 0xfe2ce6e0);
        self::step($Vqe0tr4mexwu, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[6], 15, 0xa3014314);
        self::step($Vqe0tr4mexwu, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[13], 21, 0x4e0811a1);
        self::step($Vqe0tr4mexwu, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy2izp1ogoso[4], 6, 0xf7537e82);
        self::step($Vqe0tr4mexwu, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vy2izp1ogoso[11], 10, 0xbd3af235);
        self::step($Vqe0tr4mexwu, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vjd52v1uhh5z, $Vy2izp1ogoso[2], 15, 0x2ad7d2bb);
        self::step($Vqe0tr4mexwu, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vk0c33a31nhe, $Vy2izp1ogoso[9], 21, 0xeb86d391);

        $Veca2om3awughis->a = ($Veca2om3awughis->a + $Vk0c33a31nhe) & 0xffffffff;
        $Veca2om3awughis->b = ($Veca2om3awughis->b + $Vjd52v1uhh5z) & 0xffffffff;
        $Veca2om3awughis->c = ($Veca2om3awughis->c + $Vhsnkwwx3zv4) & 0xffffffff;
        $Veca2om3awughis->d = ($Veca2om3awughis->d + $Vdcqwqaps4qc) & 0xffffffff;
    }


    private static function F($Vwkudxicgm1v, $Veuzzismtjgv, $Vdmjdv1hn1zt)
    {
        return (($Vwkudxicgm1v & $Veuzzismtjgv) | ((~ $Vwkudxicgm1v) & $Vdmjdv1hn1zt)); 
    }


    private static function G($Vwkudxicgm1v, $Veuzzismtjgv, $Vdmjdv1hn1zt)
    {
        return (($Vwkudxicgm1v & $Vdmjdv1hn1zt) | ($Veuzzismtjgv & (~ $Vdmjdv1hn1zt))); 
    }


    private static function H($Vwkudxicgm1v, $Veuzzismtjgv, $Vdmjdv1hn1zt)
    {
        return ($Vwkudxicgm1v ^ $Veuzzismtjgv ^ $Vdmjdv1hn1zt); 
    }


    private static function I($Vwkudxicgm1v, $Veuzzismtjgv, $Vdmjdv1hn1zt)
    {
        return ($Veuzzismtjgv ^ ($Vwkudxicgm1v | (~ $Vdmjdv1hn1zt))) ; 
    }


    private static function step($Vcxt1ln5llz3, &$Vk0c33a31nhe, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc, $Vy5lgrs0ubk0, $V2n430jknk35, $Veca2om3awug)
    {
        $Vk0c33a31nhe = ($Vk0c33a31nhe + call_user_func($Vcxt1ln5llz3, $Vjd52v1uhh5z, $Vhsnkwwx3zv4, $Vdcqwqaps4qc) + $Vy5lgrs0ubk0 + $Veca2om3awug) & 0xffffffff;
        $Vk0c33a31nhe = self::rotate($Vk0c33a31nhe, $V2n430jknk35);
        $Vk0c33a31nhe = ($Vjd52v1uhh5z + $Vk0c33a31nhe) & 0xffffffff;
    }


    private static function rotate($Vrec2f1japonecimal, $V4t3fwdd3eevits)
    {
        $V4t3fwdd3eevinary = str_pad(decbin($Vrec2f1japonecimal), 32, "0", STR_PAD_LEFT);
        return bindec(substr($V4t3fwdd3eevinary, $V4t3fwdd3eevits).substr($V4t3fwdd3eevinary, 0, $V4t3fwdd3eevits));
    }
}