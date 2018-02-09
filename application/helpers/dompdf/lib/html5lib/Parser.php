<?php

require_once dirname(__FILE__) . '/Data.php';
require_once dirname(__FILE__) . '/InputStream.php';
require_once dirname(__FILE__) . '/TreeBuilder.php';
require_once dirname(__FILE__) . '/Tokenizer.php';


class HTML5_Parser
{
    
    static public function parse($Vkjdq1foihhi, $Vych0uhmr4hx = null) {
        $Vaijgup5e1v0 = new HTML5_Tokenizer($Vkjdq1foihhi, $Vych0uhmr4hx);
        $Vaijgup5e1v0->parse();
        return $Vaijgup5e1v0->save();
    }
    
    static public function parseFragment($Vkjdq1foihhi, $Vhtknqrle5z0 = null, $Vych0uhmr4hx = null) {
        $Vaijgup5e1v0 = new HTML5_Tokenizer($Vkjdq1foihhi, $Vych0uhmr4hx);
        $Vaijgup5e1v0->parseFragment($Vhtknqrle5z0);
        return $Vaijgup5e1v0->save();
    }
}
