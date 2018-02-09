<?php







class HTML5_InputStream {
    
    private $Vou4vxorrdoe;

    
    private $V1ciechb1uvs;

    
    private $Vibrezka50qr;

    
    public $Vjubg4lnj1nn = array();

    
    public function __construct($Vou4vxorrdoe) {

        

        
        
        
        
        
        
        if (extension_loaded('iconv')) {
            
            $Vou4vxorrdoe = @iconv('UTF-8', 'UTF-8//IGNORE', $Vou4vxorrdoe);
        } else {
            
            throw new Exception('Not implemented, please install mbstring or iconv');
        }

        
        if (substr($Vou4vxorrdoe, 0, 3) === "\xEF\xBB\xBF") {
            $Vou4vxorrdoe = substr($Vou4vxorrdoe, 3);
        }

        
        for ($Vfhiq1lhsoja = 0, $Vytbsuz3c5qz = substr_count($Vou4vxorrdoe, "\0"); $Vfhiq1lhsoja < $Vytbsuz3c5qz; $Vfhiq1lhsoja++) {
            $this->errors[] = array(
                'type' => HTML5_Tokenizer::PARSEERROR,
                'data' => 'null-character'
            );
        }
        
        $Vou4vxorrdoe = str_replace(
            array(
                "\0",
                "\r\n",
                "\r"
            ),
            array(
                "\xEF\xBF\xBD",
                "\n",
                "\n"
            ),
            $Vou4vxorrdoe
        );

        
        
        if (extension_loaded('pcre')) {
            $Vytbsuz3c5qz = preg_match_all(
                '/(?:
                    [\x01-\x08\x0B\x0E-\x1F\x7F] # U+0001 to U+0008, U+000B,  U+000E to U+001F and U+007F
                |
                    \xC2[\x80-\x9F] # U+0080 to U+009F
                |
                    \xED(?:\xA0[\x80-\xFF]|[\xA1-\xBE][\x00-\xFF]|\xBF[\x00-\xBF]) # U+D800 to U+DFFFF
                |
                    \xEF\xB7[\x90-\xAF] # U+FDD0 to U+FDEF
                |
                    \xEF\xBF[\xBE\xBF] # U+FFFE and U+FFFF
                |
                    [\xF0-\xF4][\x8F-\xBF]\xBF[\xBE\xBF] # U+nFFFE and U+nFFFF (1 <= n <= 10_{16})
                )/x',
                $Vou4vxorrdoe,
                $Vt3xexsia3ta
            );
            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vytbsuz3c5qz; $Vfhiq1lhsoja++) {
                $this->errors[] = array(
                    'type' => HTML5_Tokenizer::PARSEERROR,
                    'data' => 'invalid-codepoint'
                );
            }
        } else {
            
        }

        $this->data = $Vou4vxorrdoe;
        $this->char = 0;
        $this->EOF  = strlen($Vou4vxorrdoe);
    }

    
    public function getCurrentLine() {
        
        if($this->EOF) {
            
            
            return substr_count($this->data, "\n", 0, min($this->char, $this->EOF)) + 1;
        } else {
            
            return 1;
        }
    }

    
    public function getColumnOffset() {
        
        
        
        
        
        $Vxyhqmjgjj51 = strrpos($this->data, "\n", $this->char - 1 - strlen($this->data));

        
        
        if($Vxyhqmjgjj51 !== false) {
            $V1bfnmy4puoy = substr($this->data, $Vxyhqmjgjj51 + 1, $this->char - 1 - $Vxyhqmjgjj51);
        } else {
            $V1bfnmy4puoy = substr($this->data, 0, $this->char);
        }

        
        if(extension_loaded('iconv')) {
            return iconv_strlen($V1bfnmy4puoy, 'utf-8');
        } elseif(extension_loaded('mbstring')) {
            return mb_strlen($V1bfnmy4puoy, 'utf-8');
        } elseif(extension_loaded('xml')) {
            return strlen(utf8_decode($V1bfnmy4puoy));
        } else {
            $Vytbsuz3c5qz = count_chars($V1bfnmy4puoy);
            
            
            return array_sum(array_slice($Vytbsuz3c5qz, 0, 0x80)) +
                   array_sum(array_slice($Vytbsuz3c5qz, 0xC2, 0x33));
        }
    }

    
    public function char() {
        return ($this->char++ < $this->EOF)
            ? $this->data[$this->char - 1]
            : false;
    }

    
    public function remainingChars() {
        if($this->char < $this->EOF) {
            $Vou4vxorrdoe = substr($this->data, $this->char);
            $this->char = $this->EOF;
            return $Vou4vxorrdoe;
        } else {
            return false;
        }
    }

    
    public function charsUntil($Vg1e0ta0mrbf, $Vpu53dziligd = null) {
        if ($this->char < $this->EOF) {
            if ($Vpu53dziligd === 0 || $Vpu53dziligd) {
                $Vtojwsl3m1uw = strcspn($this->data, $Vg1e0ta0mrbf, $this->char, $Vpu53dziligd);
            } else {
                $Vtojwsl3m1uw = strcspn($this->data, $Vg1e0ta0mrbf, $this->char);
            }
            $Vlkger5ehs4w = (string) substr($this->data, $this->char, $Vtojwsl3m1uw);
            $this->char += $Vtojwsl3m1uw;
            return $Vlkger5ehs4w;
        } else {
            return false;
        }
    }

    
    public function charsWhile($Vg1e0ta0mrbf, $Vpu53dziligd = null) {
        if ($this->char < $this->EOF) {
            if ($Vpu53dziligd === 0 || $Vpu53dziligd) {
                $Vtojwsl3m1uw = strspn($this->data, $Vg1e0ta0mrbf, $this->char, $Vpu53dziligd);
            } else {
                $Vtojwsl3m1uw = strspn($this->data, $Vg1e0ta0mrbf, $this->char);
            }
            $Vlkger5ehs4w = (string) substr($this->data, $this->char, $Vtojwsl3m1uw);
            $this->char += $Vtojwsl3m1uw;
            return $Vlkger5ehs4w;
        } else {
            return false;
        }
    }

    
    public function unget() {
        if ($this->char <= $this->EOF) {
            $this->char--;
        }
    }
}
