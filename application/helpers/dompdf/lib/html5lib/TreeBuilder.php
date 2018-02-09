<?php











class HTML5_TreeBuilder {
    public $Vltejvmdssgs = array();
    public $Vzrrx0yf1ssm;

    private $Vbdcqcmfhadr;
    private $Vva3p1yz100u;
    private $Vvxyxrmsgeua;
    private $Voaqq1lpxh5u;
    
    
    private $Vvoupztpahqk = false;
    private $Voogzg4s342f  = array();

    private $V3o4tdost4a0 = null;
    private $Vb231fpipdcz = null;

    private $Vabaynzzdzwo = true;
    private $Voin3szgmkci = false;
    private $Vbsxroqen2la = false;
    private $Vpjpejux5ans = null;
    
    
    
    
    private $Vu10btl45sdn = 0;
    private $Vk0fyv3hhk4t = false;
    private $V4jn4msro4hf;

    private $Vrtsszlebjxh = array('applet','button','caption','html','marquee','object','table','td','th', 'svg:foreignObject');
    private $Vxz4ev0fpgml = array('a','b','big','code','em','font','i','nobr','s','small','strike','strong','tt','u');
    
    private $Vi5ctto035tf = array('address','area','article','aside','base','basefont','bgsound',
    'blockquote','body','br','center','col','colgroup','command','dc','dd','details','dir','div','dl','ds',
    'dt','embed','fieldset','figure','footer','form','frame','frameset','h1','h2','h3','h4','h5',
    'h6','head','header','hgroup','hr','iframe','img','input','isindex','li','link',
    'listing','menu','meta','nav','noembed','noframes','noscript','ol',
    'p','param','plaintext','pre','script','select','spacer','style',
    'tbody','textarea','tfoot','thead','title','tr','ul','wbr');

    private $Vj40fncsv3gu;
    private $Vj40fncsv3guDirty;

    
    const INITIAL           = 0;
    const BEFORE_HTML       = 1;
    const BEFORE_HEAD       = 2;
    const IN_HEAD           = 3;
    const IN_HEAD_NOSCRIPT  = 4;
    const AFTER_HEAD        = 5;
    const IN_BODY           = 6;
    const IN_CDATA_RCDATA   = 7;
    const IN_TABLE          = 8;
    const IN_TABLE_TEXT     = 9;
    const IN_CAPTION        = 10;
    const IN_COLUMN_GROUP   = 11;
    const IN_TABLE_BODY     = 12;
    const IN_ROW            = 13;
    const IN_CELL           = 14;
    const IN_SELECT         = 15;
    const IN_SELECT_IN_TABLE= 16;
    const IN_FOREIGN_CONTENT= 17;
    const AFTER_BODY        = 18;
    const IN_FRAMESET       = 19;
    const AFTER_FRAMESET    = 20;
    const AFTER_AFTER_BODY  = 21;
    const AFTER_AFTER_FRAMESET = 22;

    
    private function strConst($V2xlryyxxahg) {
        static $Vbzow4j0kijy;
        if (!$Vbzow4j0kijy) {
            $Vbzow4j0kijy = array();
            $Vws44nszhvgo = new ReflectionClass('HTML5_TreeBuilder');
            $Vvxnmvr1f0h4 = $Vws44nszhvgo->getConstants();
            foreach ($Vvxnmvr1f0h4 as $Vegfwhesreey => $Vcgbfu1dtv3l) {
                if (!is_int($Vcgbfu1dtv3l)) continue;
                $Vbzow4j0kijy[$Vcgbfu1dtv3l] = $Vegfwhesreey;
            }
        }
        return $Vbzow4j0kijy[$V2xlryyxxahg];
    }

    
    const SPECIAL    = 100;
    const SCOPING    = 101;
    const FORMATTING = 102;
    const PHRASING   = 103;

    
    const NO_QUIRKS             = 200;
    const QUIRKS_MODE           = 201;
    const LIMITED_QUIRKS_MODE   = 202;

    
    const MARKER     = 300;

    
    const NS_HTML   = null; 
    const NS_MATHML = 'http://www.w3.org/1998/Math/MathML';
    const NS_SVG    = 'http://www.w3.org/2000/svg';
    const NS_XLINK  = 'http://www.w3.org/1999/xlink';
    const NS_XML    = 'http://www.w3.org/XML/1998/namespace';
    const NS_XMLNS  = 'http://www.w3.org/2000/xmlns/';

    
    const SCOPE = 0;
    const SCOPE_LISTITEM = 1;
    const SCOPE_TABLE = 2;

    public function __construct() {
        $this->mode = self::INITIAL;
        $this->dom = new DOMDocument;

        $this->dom->encoding = 'UTF-8';
        $this->dom->preserveWhiteSpace = true;
        $this->dom->substituteEntities = true;
        $this->dom->strictErrorChecking = false;
    }
		
		public function getQuirksMode(){
			return $this->quirks_mode;
		}

    
    public function emitToken($Vmrycxs3rwag, $Vbdcqcmfhadr = null) {
        
        if ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::PARSEERROR) return;
        if ($Vbdcqcmfhadr === null) $Vbdcqcmfhadr = $this->mode;

        

        if ($this->ignore_lf_token) $this->ignore_lf_token--;
        $this->ignored = false;
        
        switch ($Vbdcqcmfhadr) {

    case self::INITIAL:

        
        if ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->ignored = true;
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            if (
                $Vmrycxs3rwag['name'] !== 'html' || !empty($Vmrycxs3rwag['public']) ||
                !empty($Vmrycxs3rwag['system']) || $Vmrycxs3rwag !== 'about:legacy-compat'
            ) {
                
                
            }
            
            if (!isset($Vmrycxs3rwag['public'])) $Vmrycxs3rwag['public'] = null;
            if (!isset($Vmrycxs3rwag['system'])) $Vmrycxs3rwag['system'] = null;
            
            
            
            
            $V1x1vnxiulgd = new DOMImplementation();
            
            
            if ($Vmrycxs3rwag['name']) {
                $Vwacf1a2q2rl = $V1x1vnxiulgd->createDocumentType($Vmrycxs3rwag['name'], $Vmrycxs3rwag['public'], $Vmrycxs3rwag['system']);
                $this->dom->appendChild($Vwacf1a2q2rl);
            } else {
                
                
                $this->dom->emptyDoctype = true;
            }
            $Vfllernvgve4 = is_null($Vmrycxs3rwag['public']) ? false : strtolower($Vmrycxs3rwag['public']);
            $Vpieqg05zcp5 = is_null($Vmrycxs3rwag['system']) ? false : strtolower($Vmrycxs3rwag['system']);
            $Vfllernvgve4StartsWithForQuirks = array(
             "+//silmaril//dtd html pro v0r11 19970101//",
             "-//advasoft ltd//dtd html 3.0 aswedit + extensions//",
             "-//as//dtd html 3.0 aswedit + extensions//",
             "-//ietf//dtd html 2.0 level 1//",
             "-//ietf//dtd html 2.0 level 2//",
             "-//ietf//dtd html 2.0 strict level 1//",
             "-//ietf//dtd html 2.0 strict level 2//",
             "-//ietf//dtd html 2.0 strict//",
             "-//ietf//dtd html 2.0//",
             "-//ietf//dtd html 2.1e//",
             "-//ietf//dtd html 3.0//",
             "-//ietf//dtd html 3.2 final//",
             "-//ietf//dtd html 3.2//",
             "-//ietf//dtd html 3//",
             "-//ietf//dtd html level 0//",
             "-//ietf//dtd html level 1//",
             "-//ietf//dtd html level 2//",
             "-//ietf//dtd html level 3//",
             "-//ietf//dtd html strict level 0//",
             "-//ietf//dtd html strict level 1//",
             "-//ietf//dtd html strict level 2//",
             "-//ietf//dtd html strict level 3//",
             "-//ietf//dtd html strict//",
             "-//ietf//dtd html//",
             "-//metrius//dtd metrius presentational//",
             "-//microsoft//dtd internet explorer 2.0 html strict//",
             "-//microsoft//dtd internet explorer 2.0 html//",
             "-//microsoft//dtd internet explorer 2.0 tables//",
             "-//microsoft//dtd internet explorer 3.0 html strict//",
             "-//microsoft//dtd internet explorer 3.0 html//",
             "-//microsoft//dtd internet explorer 3.0 tables//",
             "-//netscape comm. corp.//dtd html//",
             "-//netscape comm. corp.//dtd strict html//",
             "-//o'reilly and associates//dtd html 2.0//",
             "-//o'reilly and associates//dtd html extended 1.0//",
             "-//o'reilly and associates//dtd html extended relaxed 1.0//",
             "-//spyglass//dtd html 2.0 extended//",
             "-//sq//dtd html 2.0 hotmetal + extensions//",
             "-//sun microsystems corp.//dtd hotjava html//",
             "-//sun microsystems corp.//dtd hotjava strict html//",
             "-//w3c//dtd html 3 1995-03-24//",
             "-//w3c//dtd html 3.2 draft//",
             "-//w3c//dtd html 3.2 final//",
             "-//w3c//dtd html 3.2//",
             "-//w3c//dtd html 3.2s draft//",
             "-//w3c//dtd html 4.0 frameset//",
             "-//w3c//dtd html 4.0 transitional//",
             "-//w3c//dtd html experimental 19960712//",
             "-//w3c//dtd html experimental 970421//",
             "-//w3c//dtd w3 html//",
             "-//w3o//dtd w3 html 3.0//",
             "-//webtechs//dtd mozilla html 2.0//",
             "-//webtechs//dtd mozilla html//",
            );
            $Vfllernvgve4SetToForQuirks = array(
             "-//w3o//dtd w3 html strict 3.0//",
             "-/w3c/dtd html 4.0 transitional/en",
             "html",
            );
            $Vfllernvgve4StartsWithAndSystemForQuirks = array(
             "-//w3c//dtd html 4.01 frameset//",
             "-//w3c//dtd html 4.01 transitional//",
            );
            $Vfllernvgve4StartsWithForLimitedQuirks = array(
             "-//w3c//dtd xhtml 1.0 frameset//",
             "-//w3c//dtd xhtml 1.0 transitional//",
            );
            $Vfllernvgve4StartsWithAndSystemForLimitedQuirks = array(
             "-//w3c//dtd html 4.01 frameset//",
             "-//w3c//dtd html 4.01 transitional//",
            );
            
            if (
                !empty($Vmrycxs3rwag['force-quirks']) ||
                strtolower($Vmrycxs3rwag['name']) !== 'html'
            ) {
                $this->quirks_mode = self::QUIRKS_MODE;
            } else {
                do {
                    if ($Vpieqg05zcp5) {
                        foreach ($Vfllernvgve4StartsWithAndSystemForQuirks as $V1e1eaicqarh) {
                            if (strncmp($Vfllernvgve4, $V1e1eaicqarh, strlen($V1e1eaicqarh)) === 0) {
                                $this->quirks_mode = self::QUIRKS_MODE;
                                break;
                            }
                        }
                        if (!is_null($this->quirks_mode)) break;
                        foreach ($Vfllernvgve4StartsWithAndSystemForLimitedQuirks as $V1e1eaicqarh) {
                            if (strncmp($Vfllernvgve4, $V1e1eaicqarh, strlen($V1e1eaicqarh)) === 0) {
                                $this->quirks_mode = self::LIMITED_QUIRKS_MODE;
                                break;
                            }
                        }
                        if (!is_null($this->quirks_mode)) break;
                    }
                    foreach ($Vfllernvgve4SetToForQuirks as $V1e1eaicqarh) {
                        if ($Vfllernvgve4 === $V1e1eaicqarh) {
                            $this->quirks_mode = self::QUIRKS_MODE;
                            break;
                        }
                    }
                    if (!is_null($this->quirks_mode)) break;
                    foreach ($Vfllernvgve4StartsWithForLimitedQuirks as $V1e1eaicqarh) {
                        if (strncmp($Vfllernvgve4, $V1e1eaicqarh, strlen($V1e1eaicqarh)) === 0) {
                            $this->quirks_mode = self::LIMITED_QUIRKS_MODE;
                        }
                    }
                    if (!is_null($this->quirks_mode)) break;
                    if ($Vpieqg05zcp5 === "http://www.ibm.com/data/dtd/v11/ibmxhtml1-transitional.dtd") {
                        $this->quirks_mode = self::QUIRKS_MODE;
                        break;
                    }
                    foreach ($Vfllernvgve4StartsWithForQuirks as $V1e1eaicqarh) {
                        if (strncmp($Vfllernvgve4, $V1e1eaicqarh, strlen($V1e1eaicqarh)) === 0) {
                            $this->quirks_mode = self::QUIRKS_MODE;
                            break;
                        }
                    }
                    if (is_null($this->quirks_mode)) {
                        $this->quirks_mode = self::NO_QUIRKS;
                    }
                } while (false);
            }
            $this->mode = self::BEFORE_HTML;
        } else {
            
            
            $this->mode = self::BEFORE_HTML;
            $this->quirks_mode = self::QUIRKS_MODE;
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::BEFORE_HTML:

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            
            $this->ignored = true;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            
            $Vd25ttkxmgaf = $this->dom->createComment($Vmrycxs3rwag['data']);
            $this->dom->appendChild($Vd25ttkxmgaf);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->ignored = true;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] == 'html') {
            
            
            $Vxcvxsbzpwbz = $this->insertElement($Vmrycxs3rwag, false);
            $this->dom->appendChild($Vxcvxsbzpwbz);
            $this->stack[] = $Vxcvxsbzpwbz;

            $this->mode = self::BEFORE_HEAD;

        } else {
            
            
            $Vxcvxsbzpwbz = $this->dom->createElementNS(self::NS_HTML, 'html');
            $this->dom->appendChild($Vxcvxsbzpwbz);
            $this->stack[] = $Vxcvxsbzpwbz;

            
            $this->mode = self::BEFORE_HEAD;
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::BEFORE_HEAD:

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->ignored = true;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            
            $this->ignored = true;
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'head') {
            
            $Vltoddaysjlm = $this->insertElement($Vmrycxs3rwag);

            
            $this->head_pointer = $Vltoddaysjlm;

            
            $this->mode = self::IN_HEAD;

        
        } elseif(
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && (
                $Vmrycxs3rwag['name'] === 'head' || $Vmrycxs3rwag['name'] === 'body' ||
                $Vmrycxs3rwag['name'] === 'html' || $Vmrycxs3rwag['name'] === 'br'
        )) {
            
            $this->emitToken(array(
                'name' => 'head',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));
            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG) {
            
            $this->ignored = true;

        } else {
            
            $this->emitToken(array(
                'name' => 'head',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::IN_HEAD:

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            
            $this->ignored = true;
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'base' || $Vmrycxs3rwag['name'] === 'command' ||
        $Vmrycxs3rwag['name'] === 'link')) {
            
            $this->insertElement($Vmrycxs3rwag);
            array_pop($this->stack);

            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'meta') {
            
            $this->insertElement($Vmrycxs3rwag);
            array_pop($this->stack);

            

            
            
            
            
            
            
            
            
            
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'title') {
            $this->insertRCDATAElement($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'noscript' || $Vmrycxs3rwag['name'] === 'noframes' || $Vmrycxs3rwag['name'] === 'style')) {
            
            $this->insertCDATAElement($Vmrycxs3rwag);

        

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'script') {
            
            $V1en3qe0uyt3 = $this->insertElement($Vmrycxs3rwag, false);

            
            

            
            

            
            end($this->stack)->appendChild($V1en3qe0uyt3);
            $this->stack[] = $V1en3qe0uyt3;
            

            
            $this->original_mode = $this->mode;
            
            $this->mode = self::IN_CDATA_RCDATA;
            
            $this->content_model = HTML5_Tokenizer::CDATA;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'head') {
            
            array_pop($this->stack);

            
            $this->mode = self::AFTER_HEAD;

        
        
        
        } elseif(($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'head') ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] !== 'html' &&
        $Vmrycxs3rwag['name'] !== 'body' && $Vmrycxs3rwag['name'] !== 'br')) {
            
            $this->ignored = true;

        
        } else {
            
            $this->emitToken(array(
                'name' => 'head',
                'type' => HTML5_Tokenizer::ENDTAG
            ));

            
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::IN_HEAD_NOSCRIPT:
        if ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'noscript') {
            
            array_pop($this->stack);
            $this->mode = self::IN_HEAD;
        } elseif (
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) ||
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) ||
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && (
                $Vmrycxs3rwag['name'] === 'link' || $Vmrycxs3rwag['name'] === 'meta' ||
                $Vmrycxs3rwag['name'] === 'noframes' || $Vmrycxs3rwag['name'] === 'style'))) {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);
        
        } elseif (
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && (
                $Vmrycxs3rwag['name'] === 'head' || $Vmrycxs3rwag['name'] === 'noscript')) ||
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
                $Vmrycxs3rwag['name'] !== 'br')) {
            
        } else {
            
            $this->emitToken(array(
                'type' => HTML5_Tokenizer::ENDTAG,
                'name' => 'noscript',
            ));
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::AFTER_HEAD:
        

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'body') {
            $this->insertElement($Vmrycxs3rwag);

            
            $this->flag_frameset_ok = false;

            
            $this->mode = self::IN_BODY;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'frameset') {
            
            $this->insertElement($Vmrycxs3rwag);

            
            $this->mode = self::IN_FRAMESET;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('base', 'link', 'meta', 'noframes', 'script', 'style', 'title'))) {
            
            
            $this->stack[] = $this->head_pointer;
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);
            array_splice($this->stack, array_search($this->head_pointer, $this->stack, true), 1);

        
        } elseif(
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'head') ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
            $Vmrycxs3rwag['name'] !== 'body' && $Vmrycxs3rwag['name'] !== 'html' &&
            $Vmrycxs3rwag['name'] !== 'br')) {
            

        
        } else {
            $this->emitToken(array(
                'name' => 'body',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));
            $this->flag_frameset_ok = true;
            $this->emitToken($Vmrycxs3rwag);
        }
        break;

    case self::IN_BODY:
        

        switch($Vmrycxs3rwag['type']) {
            
            case HTML5_Tokenizer::CHARACTER:
            case HTML5_Tokenizer::SPACECHARACTER:
                
                $this->reconstructActiveFormattingElements();

                
                $this->insertText($Vmrycxs3rwag['data']);

                
                
                if (strlen($Vmrycxs3rwag['data']) !== strspn($Vmrycxs3rwag['data'], HTML5_Tokenizer::WHITESPACE)) {
                    $this->flag_frameset_ok = false;
                }
            break;

            
            case HTML5_Tokenizer::COMMENT:
                
                $this->insertComment($Vmrycxs3rwag['data']);
            break;

            case HTML5_Tokenizer::DOCTYPE:
                
            break;

            case HTML5_Tokenizer::EOF:
                
            break;

            case HTML5_Tokenizer::STARTTAG:
            switch($Vmrycxs3rwag['name']) {
                case 'html':
                    
                    
                    foreach($Vmrycxs3rwag['attr'] as $V5v3aao2lape) {
                        if(!$this->stack[0]->hasAttribute($V5v3aao2lape['name'])) {
                            $this->stack[0]->setAttribute($V5v3aao2lape['name'], $V5v3aao2lape['value']);
                        }
                    }
                break;

                case 'base': case 'command': case 'link': case 'meta': case 'noframes':
                case 'script': case 'style': case 'title':
                    
                    $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);
                break;

                
                case 'body':
                    
                    if(count($this->stack) === 1 || $this->stack[1]->tagName !== 'body') {
                        $this->ignored = true;
                        

                    
                    } else {
                        foreach($Vmrycxs3rwag['attr'] as $V5v3aao2lape) {
                            if(!$this->stack[1]->hasAttribute($V5v3aao2lape['name'])) {
                                $this->stack[1]->setAttribute($V5v3aao2lape['name'], $V5v3aao2lape['value']);
                            }
                        }
                    }
                break;

                case 'frameset':
                    
                    
                    if(count($this->stack) === 1 || $this->stack[1]->tagName !== 'body') {
                        $this->ignored = true;
                        
                    } elseif (!$this->flag_frameset_ok) {
                        $this->ignored = true;
                        
                    } else {
                        
                        if($this->stack[1]->parentNode) {
                            $this->stack[1]->parentNode->removeChild($this->stack[1]);
                        }

                        
                        array_splice($this->stack, 1);

                        $this->insertElement($Vmrycxs3rwag);
                        $this->mode = self::IN_FRAMESET;
                    }
                break;

                

                case 'address': case 'article': case 'aside': case 'blockquote':
                case 'center': case 'datagrid': case 'details': case 'dir':
                case 'div': case 'dl': case 'fieldset': case 'figure': case 'footer':
                case 'header': case 'hgroup': case 'menu': case 'nav':
                case 'ol': case 'p': case 'section': case 'ul':
                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);
                break;

                
                case 'h1': case 'h2': case 'h3': case 'h4': case 'h5': case 'h6':
                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $Vu0cyatzvhwg = array_pop($this->stack);
                    if (in_array($Vu0cyatzvhwg->tagName, array("h1", "h2", "h3", "h4", "h5", "h6"))) {
                        
                    } else {
                        $this->stack[] = $Vu0cyatzvhwg;
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);
                break;

                case 'pre': case 'listing':
                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }
                    $this->insertElement($Vmrycxs3rwag);
                    
                    $this->ignore_lf_token = 2;
                    $this->flag_frameset_ok = false;
                break;

                
                case 'form':
                    
                    if($this->form_pointer !== null) {
                        $this->ignored = true;
                        

                    
                    } else {
                        
                        if($this->elementInScope('p')) {
                            $this->emitToken(array(
                                'name' => 'p',
                                'type' => HTML5_Tokenizer::ENDTAG
                            ));
                        }

                        
                        $Vltoddaysjlm = $this->insertElement($Vmrycxs3rwag);
                        $this->form_pointer = $Vltoddaysjlm;
                    }
                break;

                
                case 'li': case 'dc': case 'dd': case 'ds': case 'dt':
                    
                    $this->flag_frameset_ok = false;

                    $Vltejvmdssgs_length = count($this->stack) - 1;
                    for($Vmwwo1qnmepz = $Vltejvmdssgs_length; 0 <= $Vmwwo1qnmepz; $Vmwwo1qnmepz--) {
                        
                        $Vhu4qadx2rix = false;
                        $V1en3qe0uyt3 = $this->stack[$Vmwwo1qnmepz];
                        $Vfvfvseaihht  = $this->getElementCategory($V1en3qe0uyt3);

                        
                        
                        
                        
                        if(($Vmrycxs3rwag['name'] === 'li' && $V1en3qe0uyt3->tagName === 'li') ||
                        ($Vmrycxs3rwag['name'] !== 'li' && ($V1en3qe0uyt3->tagName == 'dc' || $V1en3qe0uyt3->tagName === 'dd' || $V1en3qe0uyt3->tagName == 'ds' || $V1en3qe0uyt3->tagName === 'dt'))) { 
                            $this->emitToken(array(
                                'type' => HTML5_Tokenizer::ENDTAG,
                                'name' => $V1en3qe0uyt3->tagName,
                            ));
                            break;
                        }

                        
                        if($Vfvfvseaihht !== self::FORMATTING && $Vfvfvseaihht !== self::PHRASING &&
                        $V1en3qe0uyt3->tagName !== 'address' && $V1en3qe0uyt3->tagName !== 'div' &&
                        $V1en3qe0uyt3->tagName !== 'p') {
                            break;
                        }

                        
                    }

                    

                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);
                break;

                
                case 'plaintext':
                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);

                    $this->content_model = HTML5_Tokenizer::PLAINTEXT;
                break;

                

                
                case 'a':
                    
                    $Vtrek0fm2ony = count($this->a_formatting);

                    for($Vmwwo1qnmepz = $Vtrek0fm2ony - 1; $Vmwwo1qnmepz >= 0; $Vmwwo1qnmepz--) {
                        if($this->a_formatting[$Vmwwo1qnmepz] === self::MARKER) {
                            break;

                        } elseif($this->a_formatting[$Vmwwo1qnmepz]->tagName === 'a') {
                            $Vi3y3l1uvwp3 = $this->a_formatting[$Vmwwo1qnmepz];
                            $this->emitToken(array(
                                'name' => 'a',
                                'type' => HTML5_Tokenizer::ENDTAG
                            ));
                            if (in_array($Vi3y3l1uvwp3, $this->a_formatting)) {
                                $Vi3y3l1uvwp3_i = array_search($Vi3y3l1uvwp3, $this->a_formatting, true);
                                if($Vi3y3l1uvwp3_i !== false) array_splice($this->a_formatting, $Vi3y3l1uvwp3_i, 1);
                            }
                            if (in_array($Vi3y3l1uvwp3, $this->stack)) {
                                $Vi3y3l1uvwp3_i = array_search($Vi3y3l1uvwp3, $this->stack, true);
                                if ($Vi3y3l1uvwp3_i !== false) array_splice($this->stack, $Vi3y3l1uvwp3_i, 1);
                            }
                            break;
                        }
                    }

                    
                    $this->reconstructActiveFormattingElements();

                    
                    $V5d0zf3gmtr0 = $this->insertElement($Vmrycxs3rwag);

                    
                    $this->a_formatting[] = $V5d0zf3gmtr0;
                break;

                case 'b': case 'big': case 'code': case 'em': case 'font': case 'i':
                case 's': case 'small': case 'strike':
                case 'strong': case 'tt': case 'u':
                    
                    $this->reconstructActiveFormattingElements();

                    
                    $V5d0zf3gmtr0 = $this->insertElement($Vmrycxs3rwag);

                    
                    $this->a_formatting[] = $V5d0zf3gmtr0;
                break;

                case 'nobr':
                    
                    $this->reconstructActiveFormattingElements();

                    
                    if ($this->elementInScope('nobr')) {
                        $this->emitToken(array(
                            'name' => 'nobr',
                            'type' => HTML5_Tokenizer::ENDTAG,
                        ));
                        $this->reconstructActiveFormattingElements();
                    }

                    
                    $V5d0zf3gmtr0 = $this->insertElement($Vmrycxs3rwag);

                    
                    $this->a_formatting[] = $V5d0zf3gmtr0;
                break;

                

                
                case 'button':
                    
                    if($this->elementInScope('button')) {
                        $this->emitToken(array(
                            'name' => 'button',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->reconstructActiveFormattingElements();

                    
                    $this->insertElement($Vmrycxs3rwag);

                    
                    $this->a_formatting[] = self::MARKER;

                    $this->flag_frameset_ok = false;
                break;

                case 'applet': case 'marquee': case 'object':
                    
                    $this->reconstructActiveFormattingElements();

                    
                    $this->insertElement($Vmrycxs3rwag);

                    
                    $this->a_formatting[] = self::MARKER;

                    $this->flag_frameset_ok = false;
                break;

                

                
                case 'table':
                    
                    if($this->quirks_mode !== self::QUIRKS_MODE &&
                    $this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);

                    $this->flag_frameset_ok = false;

                    
                    $this->mode = self::IN_TABLE;
                break;

                
                case 'area': case 'basefont': case 'bgsound': case 'br':
                case 'embed': case 'img': case 'input': case 'keygen': case 'spacer':
                case 'wbr':
                    
                    $this->reconstructActiveFormattingElements();

                    
                    $this->insertElement($Vmrycxs3rwag);

                    
                    array_pop($this->stack);

                    

                    $this->flag_frameset_ok = false;
                break;

                case 'param': case 'source':
                    
                    $this->insertElement($Vmrycxs3rwag);

                    
                    array_pop($this->stack);

                    
                break;

                
                case 'hr':
                    
                    if($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->insertElement($Vmrycxs3rwag);

                    
                    array_pop($this->stack);

                    

                    $this->flag_frameset_ok = false;
                break;

                
                case 'image':
                    
                    $Vmrycxs3rwag['name'] = 'img';
                    $this->emitToken($Vmrycxs3rwag);
                break;

                
                case 'isindex':
                    

                    
                    if($this->form_pointer === null) {
                        
                        
                        $V5v3aao2lape = array();
                        $Vi3y3l1uvwp3ction = $this->getAttr($Vmrycxs3rwag, 'action');
                        if ($Vi3y3l1uvwp3ction !== false) {
                            $V5v3aao2lape[] = array('name' => 'action', 'value' => $Vi3y3l1uvwp3ction);
                        }
                        $this->emitToken(array(
                            'name' => 'form',
                            'type' => HTML5_Tokenizer::STARTTAG,
                            'attr' => $V5v3aao2lape
                        ));

                        
                        $this->emitToken(array(
                            'name' => 'hr',
                            'type' => HTML5_Tokenizer::STARTTAG,
                            'attr' => array()
                        ));

                        
                        $this->emitToken(array(
                            'name' => 'label',
                            'type' => HTML5_Tokenizer::STARTTAG,
                            'attr' => array()
                        ));

                        
                        $Vrw1ksaz1srx = $this->getAttr($Vmrycxs3rwag, 'prompt');
                        if ($Vrw1ksaz1srx === false) {
                            $Vrw1ksaz1srx = 'This is a searchable index. '.
                            'Insert your search keywords here: ';
                        }
                        $this->emitToken(array(
                            'data' => $Vrw1ksaz1srx,
                            'type' => HTML5_Tokenizer::CHARACTER,
                        ));

                        
                        $V5v3aao2lape = array();
                        foreach ($Vmrycxs3rwag['attr'] as $Vsieoicpivpa) {
                            if ($Vsieoicpivpa['name'] === 'name' || $Vsieoicpivpa['name'] === 'action' ||
                                $Vsieoicpivpa['name'] === 'prompt') continue;
                            $V5v3aao2lape[] = $Vsieoicpivpa;
                        }
                        $V5v3aao2lape[] = array('name' => 'name', 'value' => 'isindex');

                        $this->emitToken(array(
                            'name' => 'input',
                            'type' => HTML5_Tokenizer::STARTTAG,
                            'attr' => $V5v3aao2lape
                        ));

                        
                        $this->emitToken(array(
                            'name' => 'label',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));

                        
                        $this->emitToken(array(
                            'name' => 'hr',
                            'type' => HTML5_Tokenizer::STARTTAG
                        ));

                        
                        $this->emitToken(array(
                            'name' => 'form',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    } else {
                        $this->ignored = true;
                    }
                break;

                
                case 'textarea':
                    $this->insertElement($Vmrycxs3rwag);

                    
                    $this->ignore_lf_token = 2;

                    $this->original_mode = $this->mode;
                    $this->flag_frameset_ok = false;
                    $this->mode = self::IN_CDATA_RCDATA;

                    
                    $this->content_model = HTML5_Tokenizer::RCDATA;
                break;

                
                case 'xmp':
                    
                    if ($this->elementInScope('p')) {
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::ENDTAG
                        ));
                    }

                    
                    $this->reconstructActiveFormattingElements();

                    $this->flag_frameset_ok = false;

                    $this->insertCDATAElement($Vmrycxs3rwag);
                break;

                case 'iframe':
                    $this->flag_frameset_ok = false;
                    $this->insertCDATAElement($Vmrycxs3rwag);
                break;

                case 'noembed': case 'noscript':
                    
                    $this->insertCDATAElement($Vmrycxs3rwag);
                break;

                
                case 'select':
                    
                    $this->reconstructActiveFormattingElements();

                    
                    $this->insertElement($Vmrycxs3rwag);

                    $this->flag_frameset_ok = false;

                    
                    if (
                        $this->mode === self::IN_TABLE || $this->mode === self::IN_CAPTION ||
                        $this->mode === self::IN_COLUMN_GROUP || $this->mode ==+self::IN_TABLE_BODY ||
                        $this->mode === self::IN_ROW || $this->mode === self::IN_CELL
                    ) {
                        $this->mode = self::IN_SELECT_IN_TABLE;
                    } else {
                        $this->mode = self::IN_SELECT;
                    }
                break;

                case 'option': case 'optgroup':
                    if ($this->elementInScope('option')) {
                        $this->emitToken(array(
                            'name' => 'option',
                            'type' => HTML5_Tokenizer::ENDTAG,
                        ));
                    }
                    $this->reconstructActiveFormattingElements();
                    $this->insertElement($Vmrycxs3rwag);
                break;

                case 'rp': case 'rt':
                    
                    if ($this->elementInScope('ruby')) {
                        $this->generateImpliedEndTags();
                    }
                    $Vu0cyatzvhwg = false;
                    do {
                        if ($Vu0cyatzvhwg) {
                            
                        }
                        $Vu0cyatzvhwg = array_pop($this->stack);
                    } while ($Vu0cyatzvhwg->tagName !== 'ruby');
                    $this->stack[] = $Vu0cyatzvhwg; 
                    $this->insertElement($Vmrycxs3rwag);
                break;

                

                case 'math':
                    $this->reconstructActiveFormattingElements();
                    $Vmrycxs3rwag = $this->adjustMathMLAttributes($Vmrycxs3rwag);
                    $Vmrycxs3rwag = $this->adjustForeignAttributes($Vmrycxs3rwag);
                    $this->insertForeignElement($Vmrycxs3rwag, self::NS_MATHML);
                    if (isset($Vmrycxs3rwag['self-closing'])) {
                        
                        array_pop($this->stack);
                    }
                    if ($this->mode !== self::IN_FOREIGN_CONTENT) {
                        $this->secondary_mode = $this->mode;
                        $this->mode = self::IN_FOREIGN_CONTENT;
                    }
                break;

                case 'svg':
                    $this->reconstructActiveFormattingElements();
                    $Vmrycxs3rwag = $this->adjustSVGAttributes($Vmrycxs3rwag);
                    $Vmrycxs3rwag = $this->adjustForeignAttributes($Vmrycxs3rwag);
                    $this->insertForeignElement($Vmrycxs3rwag, self::NS_SVG);
                    if (isset($Vmrycxs3rwag['self-closing'])) {
                        
                        array_pop($this->stack);
                    }
                    if ($this->mode !== self::IN_FOREIGN_CONTENT) {
                        $this->secondary_mode = $this->mode;
                        $this->mode = self::IN_FOREIGN_CONTENT;
                    }
                break;

                case 'caption': case 'col': case 'colgroup': case 'frame': case 'head':
                case 'tbody': case 'td': case 'tfoot': case 'th': case 'thead': case 'tr':
                    
                break;

                
                default:
                    
                    $this->reconstructActiveFormattingElements();

                    $this->insertElement($Vmrycxs3rwag);
                    
                break;
            }
            break;

            case HTML5_Tokenizer::ENDTAG:
            switch($Vmrycxs3rwag['name']) {
                
                case 'body':
                    
                    if(!$this->elementInScope('body')) {
                        $this->ignored = true;

                    
                    } else {
                        
                    }

                    
                    $this->mode = self::AFTER_BODY;
                break;

                
                case 'html':
                    
                    $this->emitToken(array(
                        'name' => 'body',
                        'type' => HTML5_Tokenizer::ENDTAG
                    ));

                    if (!$this->ignored) $this->emitToken($Vmrycxs3rwag);
                break;

                case 'address': case 'article': case 'aside': case 'blockquote':
                case 'center': case 'datagrid': case 'details': case 'dir':
                case 'div': case 'dl': case 'fieldset': case 'footer':
                case 'header': case 'hgroup': case 'listing': case 'menu':
                case 'nav': case 'ol': case 'pre': case 'section': case 'ul':
                    
                    if($this->elementInScope($Vmrycxs3rwag['name'])) {
                        $this->generateImpliedEndTags();

                        
                        

                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while ($V1en3qe0uyt3->tagName !== $Vmrycxs3rwag['name']);
                    } else {
                        
                    }
                break;

                
                case 'form':
                    
                    $V1en3qe0uyt3 = $this->form_pointer;
                    
                    $this->form_pointer = null;
                    
                    if ($V1en3qe0uyt3 === null || !in_array($V1en3qe0uyt3, $this->stack)) {
                        
                        $this->ignored = true;
                    } else {
                        
                        $this->generateImpliedEndTags();
                        
                        if (end($this->stack) !== $V1en3qe0uyt3) {
                            
                        }
                        
                        array_splice($this->stack, array_search($V1en3qe0uyt3, $this->stack, true), 1);
                    }

                break;

                
                case 'p':
                    
                    if($this->elementInScope('p')) {
                        
                        $this->generateImpliedEndTags(array('p'));

                        
                        

                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while ($V1en3qe0uyt3->tagName !== 'p');

                    } else {
                        
                        $this->emitToken(array(
                            'name' => 'p',
                            'type' => HTML5_Tokenizer::STARTTAG,
                        ));
                        $this->emitToken($Vmrycxs3rwag);
                    }
                break;

                
                case 'li':
                    
                    if ($this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_LISTITEM)) {
                        
                        $this->generateImpliedEndTags(array($Vmrycxs3rwag['name']));
                        
                        
                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while ($V1en3qe0uyt3->tagName !== $Vmrycxs3rwag['name']);
                    } else {
                        
                    }
                break;

                
                case 'dc': case 'dd': case 'ds': case 'dt':
                    if($this->elementInScope($Vmrycxs3rwag['name'])) {
                        $this->generateImpliedEndTags(array($Vmrycxs3rwag['name']));

                        
                        

                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while ($V1en3qe0uyt3->tagName !== $Vmrycxs3rwag['name']);

                    } else {
                        
                    }
                break;

                
                case 'h1': case 'h2': case 'h3': case 'h4': case 'h5': case 'h6':
                    $Vltoddaysjlms = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');

                    
                    if($this->elementInScope($Vltoddaysjlms)) {
                        $this->generateImpliedEndTags();

                        
                        

                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while (!in_array($V1en3qe0uyt3->tagName, $Vltoddaysjlms));
                    } else {
                        
                    }
                break;

                
                case 'a': case 'b': case 'big': case 'code': case 'em': case 'font':
                case 'i': case 'nobr': case 's': case 'small': case 'strike':
                case 'strong': case 'tt': case 'u':
                    
                    
                    while(true) {
                        for($Vi3y3l1uvwp3 = count($this->a_formatting) - 1; $Vi3y3l1uvwp3 >= 0; $Vi3y3l1uvwp3--) {
                            if($this->a_formatting[$Vi3y3l1uvwp3] === self::MARKER) {
                                break;

                            } elseif($this->a_formatting[$Vi3y3l1uvwp3]->tagName === $Vmrycxs3rwag['name']) {
                                $Vxz4ev0fpgml_element = $this->a_formatting[$Vi3y3l1uvwp3];
                                $Vxgdegpvfvyv = in_array($Vxz4ev0fpgml_element, $this->stack, true);
                                $Vpjha1zzza15 = $Vi3y3l1uvwp3;
                                break;
                            }
                        }

                        
                        if(!isset($Vxz4ev0fpgml_element) || ($Vxgdegpvfvyv &&
                        !$this->elementInScope($Vmrycxs3rwag['name']))) {
                            $this->ignored = true;
                            break;

                        
                        } elseif(isset($Vxz4ev0fpgml_element) && !$Vxgdegpvfvyv) {
                            unset($this->a_formatting[$Vpjha1zzza15]);
                            $this->a_formatting = array_merge($this->a_formatting);
                            break;
                        }

                        
                        

                        
                        $Vxa5pgcgerxm = array_search($Vxz4ev0fpgml_element, $this->stack, true);
                        $Vtrek0fm2onyth = count($this->stack);

                        for($V2n430jknk35 = $Vxa5pgcgerxm + 1; $V2n430jknk35 < $Vtrek0fm2onyth; $V2n430jknk35++) {
                            $Vfvfvseaihhtegory = $this->getElementCategory($this->stack[$V2n430jknk35]);

                            if($Vfvfvseaihhtegory !== self::PHRASING && $Vfvfvseaihhtegory !== self::FORMATTING) {
                                $Vfhi5yhmc0bn = $this->stack[$V2n430jknk35];
                                break;
                            }
                        }

                        
                        if(!isset($Vfhi5yhmc0bn)) {
                            for($Vmwwo1qnmepz = $Vtrek0fm2onyth - 1; $Vmwwo1qnmepz >= $Vxa5pgcgerxm; $Vmwwo1qnmepz--) {
                                array_pop($this->stack);
                            }

                            unset($this->a_formatting[$Vpjha1zzza15]);
                            $this->a_formatting = array_merge($this->a_formatting);
                            break;
                        }

                        
                        $V5fosfllim4s = $this->stack[$Vxa5pgcgerxm - 1];

                        
                        $Vymzx54p5nee = $Vpjha1zzza15;

                        
                        $V1en3qe0uyt3 = $Vfhi5yhmc0bn;
                        $Vkrkndlwct3g = $Vfhi5yhmc0bn;

                        while(true) {
                            for($Vmwwo1qnmepz = array_search($V1en3qe0uyt3, $this->stack, true) - 1; $Vmwwo1qnmepz >= 0; $Vmwwo1qnmepz--) {
                                
                                $V1en3qe0uyt3 = $this->stack[$Vmwwo1qnmepz];

                                
                                if(!in_array($V1en3qe0uyt3, $this->a_formatting, true)) {
                                    array_splice($this->stack, $Vmwwo1qnmepz, 1);

                                } else {
                                    break;
                                }
                            }

                            
                            if($V1en3qe0uyt3 === $Vxz4ev0fpgml_element) {
                                break;

                            
                            } elseif($Vkrkndlwct3g === $Vfhi5yhmc0bn) {
                                $Vymzx54p5nee = array_search($V1en3qe0uyt3, $this->a_formatting, true) + 1;
                            }

                            
                            
                            
                            $Vbfzdxwlirib = $V1en3qe0uyt3->cloneNode();
                            $Vi3y3l1uvwp3_pos = array_search($V1en3qe0uyt3, $this->a_formatting, true);
                            $V2n430jknk35_pos = array_search($V1en3qe0uyt3, $this->stack, true);
                            $this->a_formatting[$Vi3y3l1uvwp3_pos] = $Vbfzdxwlirib;
                            $this->stack[$V2n430jknk35_pos] = $Vbfzdxwlirib;
                            $V1en3qe0uyt3 = $Vbfzdxwlirib;

                            
                            
                            if($Vkrkndlwct3g->parentNode !== null) {
                                $Vkrkndlwct3g->parentNode->removeChild($Vkrkndlwct3g);
                            }

                            
                            $V1en3qe0uyt3->appendChild($Vkrkndlwct3g);

                            
                            $Vkrkndlwct3g = $V1en3qe0uyt3;

                            
                        }

                        
                        
                        if ($Vkrkndlwct3g->parentNode) { 
                            $Vkrkndlwct3g->parentNode->removeChild($Vkrkndlwct3g);
                        }
                        if (in_array($V5fosfllim4s->tagName, array('table', 'tbody', 'tfoot', 'thead', 'tr'))) {
                            $this->fosterParent($Vkrkndlwct3g);
                        
                        } else {
                            
                            $V5fosfllim4s->appendChild($Vkrkndlwct3g);
                        }

                        
                        
                        $Vbfzdxwlirib = $Vxz4ev0fpgml_element->cloneNode();

                        
                        
                        while($Vfhi5yhmc0bn->hasChildNodes()) {
                            $Vcnoizcxjx0n = $Vfhi5yhmc0bn->firstChild;
                            $Vfhi5yhmc0bn->removeChild($Vcnoizcxjx0n);
                            $Vbfzdxwlirib->appendChild($Vcnoizcxjx0n);
                        }

                        
                        
                        $Vfhi5yhmc0bn->appendChild($Vbfzdxwlirib);

                        
                        $Vpjha1zzza15 = array_search($Vxz4ev0fpgml_element, $this->a_formatting, true);
                        array_splice($this->a_formatting, $Vpjha1zzza15, 1);

                        $Vi3y3l1uvwp3f_part1 = array_slice($this->a_formatting, 0, $Vymzx54p5nee - 1);
                        $Vi3y3l1uvwp3f_part2 = array_slice($this->a_formatting, $Vymzx54p5nee);
                        $this->a_formatting = array_merge($Vi3y3l1uvwp3f_part1, array($Vbfzdxwlirib), $Vi3y3l1uvwp3f_part2);

                        
                        $Vxa5pgcgerxm = array_search($Vxz4ev0fpgml_element, $this->stack, true);
                        array_splice($this->stack, $Vxa5pgcgerxm, 1);

                        $Vgdhdwqvx2op = array_search($Vfhi5yhmc0bn, $this->stack, true);
                        $V2n430jknk35_part1 = array_slice($this->stack, 0, $Vgdhdwqvx2op + 1);
                        $V2n430jknk35_part2 = array_slice($this->stack, $Vgdhdwqvx2op + 1);
                        $this->stack = array_merge($V2n430jknk35_part1, array($Vbfzdxwlirib), $V2n430jknk35_part2);

                        
                        unset($Vxz4ev0fpgml_element, $Vpjha1zzza15, $Vxa5pgcgerxm, $Vfhi5yhmc0bn);
                    }
                break;

                case 'applet': case 'button': case 'marquee': case 'object':
                    
                    if($this->elementInScope($Vmrycxs3rwag['name'])) {
                        $this->generateImpliedEndTags();

                        
                        

                        
                        do {
                            $V1en3qe0uyt3 = array_pop($this->stack);
                        } while ($V1en3qe0uyt3->tagName !== $Vmrycxs3rwag['name']);

                        
                        $Vqvryofqinbe = array_keys($this->a_formatting, self::MARKER, true);
                        $Vkzp31bqbczg = end($Vqvryofqinbe);

                        for($Vmwwo1qnmepz = count($this->a_formatting) - 1; $Vmwwo1qnmepz > $Vkzp31bqbczg; $Vmwwo1qnmepz--) {
                            array_pop($this->a_formatting);
                        }
                    } else {
                        
                    }
                break;

                case 'br':
                    
                    $this->emitToken(array(
                        'name' => 'br',
                        'type' => HTML5_Tokenizer::STARTTAG,
                    ));
                break;

                
                default:
                    for($Vmwwo1qnmepz = count($this->stack) - 1; $Vmwwo1qnmepz >= 0; $Vmwwo1qnmepz--) {
                        
                        $V1en3qe0uyt3 = $this->stack[$Vmwwo1qnmepz];

                        
                        if($Vmrycxs3rwag['name'] === $V1en3qe0uyt3->tagName) {
                            
                            $this->generateImpliedEndTags();

                            
                            

                            
                            
                            do {
                                $Vsfrrev2vhwb = array_pop($this->stack);
                            } while ($Vsfrrev2vhwb !== $V1en3qe0uyt3);
                            break;

                        } else {
                            $Vfvfvseaihhtegory = $this->getElementCategory($V1en3qe0uyt3);

                            if($Vfvfvseaihhtegory !== self::FORMATTING && $Vfvfvseaihhtegory !== self::PHRASING) {
                                
                                $this->ignored = true;
                                break;
                                
                            }
                        }
                        
                    }
                break;
            }
            break;
        }
        break;

    case self::IN_CDATA_RCDATA:
        if (
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::CHARACTER ||
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER
        ) {
            $this->insertText($Vmrycxs3rwag['data']);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
            
            
            array_pop($this->stack);
            $this->mode = $this->original_mode;
            $this->emitToken($Vmrycxs3rwag);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'script') {
            array_pop($this->stack);
            $this->mode = $this->original_mode;
            
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG) {
            array_pop($this->stack);
            $this->mode = $this->original_mode;
        }
    break;

    case self::IN_TABLE:
        $Vm1a133hcqh2 = array('html', 'table');

        
        if ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::CHARACTER ||
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->pendingTableCharacters = "";
            $this->pendingTableCharactersDirty = false;
            
            $this->original_mode = $this->mode;
            
            $this->mode = self::IN_TABLE_TEXT;
            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'caption') {
            
            $this->clearStackToTableContext($Vm1a133hcqh2);

            
            $this->a_formatting[] = self::MARKER;

            
            $this->insertElement($Vmrycxs3rwag);
            $this->mode = self::IN_CAPTION;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'colgroup') {
            
            $this->clearStackToTableContext($Vm1a133hcqh2);

            
            $this->insertElement($Vmrycxs3rwag);
            $this->mode = self::IN_COLUMN_GROUP;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'col') {
            $this->emitToken(array(
                'name' => 'colgroup',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));

            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('tbody', 'tfoot', 'thead'))) {
            
            $this->clearStackToTableContext($Vm1a133hcqh2);

            
            $this->insertElement($Vmrycxs3rwag);
            $this->mode = self::IN_TABLE_BODY;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        in_array($Vmrycxs3rwag['name'], array('td', 'th', 'tr'))) {
            
            $this->emitToken(array(
                'name' => 'tbody',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));

            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'table') {
            
            $this->emitToken(array(
                'name' => 'table',
                'type' => HTML5_Tokenizer::ENDTAG
            ));

            if (!$this->ignored) $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'table') {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->ignored = true;

            
            } else {
                do {
                    $V1en3qe0uyt3 = array_pop($this->stack);
                } while ($V1en3qe0uyt3->tagName !== 'table');

                
                $this->resetInsertionMode();
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('body', 'caption', 'col', 'colgroup', 'html', 'tbody', 'td',
        'tfoot', 'th', 'thead', 'tr'))) {
            

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'style' || $Vmrycxs3rwag['name'] === 'script')) {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);

        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'input' &&
        
        
        ($V4pigtpor0ln = $this->getAttr($Vmrycxs3rwag, 'type')) && strtolower($V4pigtpor0ln) === 'hidden') {
            
            
            
            $this->insertElement($Vmrycxs3rwag);
            array_pop($this->stack);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
            if (end($this->stack)->tagName !== 'html') {
                
                
            }
            
        
        } else {
            

            $Vm03o5p0lpbo = $this->foster_parent;
            $this->foster_parent = true;
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);
            $this->foster_parent = $Vm03o5p0lpbo;
        }
    break;

    case self::IN_TABLE_TEXT:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::CHARACTER) {
            
            $this->pendingTableCharacters .= $Vmrycxs3rwag['data'];
            $this->pendingTableCharactersDirty = true;
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            $this->pendingTableCharacters .= $Vmrycxs3rwag['data'];
        
        } else {
            if ($this->pendingTableCharacters !== '' && is_string($this->pendingTableCharacters)) {
                
                if ($this->pendingTableCharactersDirty) {
                    
                    
                    $Vm03o5p0lpbo = $this->foster_parent;
                    $this->foster_parent = true;
                    $Vkznlbsjt3ol = array(
                        'type' => HTML5_Tokenizer::CHARACTER,
                        'data' => $this->pendingTableCharacters,
                    );
                    $this->processWithRulesFor($Vkznlbsjt3ol, self::IN_BODY);
                    $this->foster_parent = $Vm03o5p0lpbo;

                
                } else {
                    $this->insertText($this->pendingTableCharacters);
                }
                $this->pendingTableCharacters = null;
                $this->pendingTableCharactersNull = null;
            }

            
            $this->mode = $this->original_mode;
            $this->emitToken($Vmrycxs3rwag);
        }
    break;

    case self::IN_CAPTION:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'caption') {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->ignored = true;
                

            
            } else {
                
                $this->generateImpliedEndTags();

                
                

                
                do {
                    $V1en3qe0uyt3 = array_pop($this->stack);
                } while ($V1en3qe0uyt3->tagName !== 'caption');

                
                $this->clearTheActiveFormattingElementsUpToTheLastMarker();

                
                $this->mode = self::IN_TABLE;
            }

        
        } elseif(($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('caption', 'col', 'colgroup', 'tbody', 'td', 'tfoot', 'th',
        'thead', 'tr'))) || ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'table')) {
            
            $this->emitToken(array(
                'name' => 'caption',
                'type' => HTML5_Tokenizer::ENDTAG
            ));

            if (!$this->ignored) $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('body', 'col', 'colgroup', 'html', 'tbody', 'tfoot', 'th',
        'thead', 'tr'))) {
            
            $this->ignored = true;

        
        } else {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);
        }
    break;

    case self::IN_COLUMN_GROUP:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertToken($Vmrycxs3rwag['data']);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'col') {
            
            $this->insertElement($Vmrycxs3rwag);
            array_pop($this->stack);
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'colgroup') {
            
            if(end($this->stack)->tagName === 'html') {
                $this->ignored = true;

            
            } else {
                array_pop($this->stack);
                $this->mode = self::IN_TABLE;
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'col') {
            
            $this->ignored = true;

        
        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF && end($this->stack)->tagName === 'html') {
            

        
        } else {
            
            $this->emitToken(array(
                'name' => 'colgroup',
                'type' => HTML5_Tokenizer::ENDTAG
            ));

            if (!$this->ignored) $this->emitToken($Vmrycxs3rwag);
        }
    break;

    case self::IN_TABLE_BODY:
        $Vm1a133hcqh2 = array('tbody', 'tfoot', 'thead', 'html');

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'tr') {
            
            $this->clearStackToTableContext($Vm1a133hcqh2);

            
            $this->insertElement($Vmrycxs3rwag);
            $this->mode = self::IN_ROW;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'th' ||    $Vmrycxs3rwag['name'] === 'td')) {
            
            $this->emitToken(array(
                'name' => 'tr',
                'type' => HTML5_Tokenizer::STARTTAG,
                'attr' => array()
            ));

            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        in_array($Vmrycxs3rwag['name'], array('tbody', 'tfoot', 'thead'))) {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                
                $this->ignored = true;

            
            } else {
                
                $this->clearStackToTableContext($Vm1a133hcqh2);

                
                array_pop($this->stack);
                $this->mode = self::IN_TABLE;
            }

        
        } elseif(($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('caption', 'col', 'colgroup', 'tbody', 'tfoot', 'thead'))) ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'table')) {
            
            if(!$this->elementInScope(array('tbody', 'thead', 'tfoot'), self::SCOPE_TABLE)) {
                
                $this->ignored = true;

            
            } else {
                
                $this->clearStackToTableContext($Vm1a133hcqh2);

                
                $this->emitToken(array(
                    'name' => end($this->stack)->tagName,
                    'type' => HTML5_Tokenizer::ENDTAG
                ));

                $this->emitToken($Vmrycxs3rwag);
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('body', 'caption', 'col', 'colgroup', 'html', 'td', 'th', 'tr'))) {
            
            $this->ignored = true;

        
        } else {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_TABLE);
        }
    break;

    case self::IN_ROW:
        $Vm1a133hcqh2 = array('tr', 'html');

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'th' || $Vmrycxs3rwag['name'] === 'td')) {
            
            $this->clearStackToTableContext($Vm1a133hcqh2);

            
            $this->insertElement($Vmrycxs3rwag);
            $this->mode = self::IN_CELL;

            
            $this->a_formatting[] = self::MARKER;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'tr') {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                
                $this->ignored = true;

            
            } else {
                
                $this->clearStackToTableContext($Vm1a133hcqh2);

                
                array_pop($this->stack);
                $this->mode = self::IN_TABLE_BODY;
            }

        
        } elseif(($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('caption', 'col', 'colgroup', 'tbody', 'tfoot', 'thead', 'tr'))) ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'table')) {
            
            $this->emitToken(array(
                'name' => 'tr',
                'type' => HTML5_Tokenizer::ENDTAG
            ));
            if (!$this->ignored) $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        in_array($Vmrycxs3rwag['name'], array('tbody', 'tfoot', 'thead'))) {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->ignored = true;

            
            } else {
                
                $this->emitToken(array(
                    'name' => 'tr',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));

                $this->emitToken($Vmrycxs3rwag);
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('body', 'caption', 'col', 'colgroup', 'html', 'td', 'th'))) {
            
            $this->ignored = true;

        
        } else {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_TABLE);
        }
    break;

    case self::IN_CELL:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        ($Vmrycxs3rwag['name'] === 'td' || $Vmrycxs3rwag['name'] === 'th')) {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->ignored = true;

            
            } else {
                
                $this->generateImpliedEndTags(array($Vmrycxs3rwag['name']));

                
                

                
                do {
                    $V1en3qe0uyt3 = array_pop($this->stack);
                } while ($V1en3qe0uyt3->tagName !== $Vmrycxs3rwag['name']);

                
                $this->clearTheActiveFormattingElementsUpToTheLastMarker();

                
                $this->mode = self::IN_ROW;
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && in_array($Vmrycxs3rwag['name'],
        array('caption', 'col', 'colgroup', 'tbody', 'td', 'tfoot', 'th',
        'thead', 'tr'))) {
            
            if(!$this->elementInScope(array('td', 'th'), self::SCOPE_TABLE)) {
                
                $this->ignored = true;

            
            } else {
                $this->closeCell();
                $this->emitToken($Vmrycxs3rwag);
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('body', 'caption', 'col', 'colgroup', 'html'))) {
            
            $this->ignored = true;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && in_array($Vmrycxs3rwag['name'],
        array('table', 'tbody', 'tfoot', 'thead', 'tr'))) {
            
            if(!$this->elementInScope(array('td', 'th'), self::SCOPE_TABLE)) {
                
                $this->ignored = true;

            
            } else {
                $this->closeCell();
                $this->emitToken($Vmrycxs3rwag);
            }

        
        } else {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);
        }
    break;

    case self::IN_SELECT:
        

        
        if(
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::CHARACTER ||
            $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER
        ) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::INBODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'option') {
            
            if(end($this->stack)->tagName === 'option') {
                $this->emitToken(array(
                    'name' => 'option',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));
            }

            
            $this->insertElement($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'optgroup') {
            
            if(end($this->stack)->tagName === 'option') {
                $this->emitToken(array(
                    'name' => 'option',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));
            }

            
            if(end($this->stack)->tagName === 'optgroup') {
                $this->emitToken(array(
                    'name' => 'optgroup',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));
            }

            
            $this->insertElement($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'optgroup') {
            
            $Vltoddaysjlms_in_stack = count($this->stack);

            if($this->stack[$Vltoddaysjlms_in_stack - 1]->tagName === 'option' &&
            $this->stack[$Vltoddaysjlms_in_stack - 2]->tagName === 'optgroup') {
                $this->emitToken(array(
                    'name' => 'option',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));
            }

            
            if(end($this->stack)->tagName === 'optgroup') {
                array_pop($this->stack);
            } else {
                
                $this->ignored = true;
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'option') {
            
            if(end($this->stack)->tagName === 'option') {
                array_pop($this->stack);
            } else {
                
                $this->ignored = true;
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'select') {
            
            if(!$this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->ignored = true;
                

            
            } else {
                
                do {
                    $V1en3qe0uyt3 = array_pop($this->stack);
                } while ($V1en3qe0uyt3->tagName !== 'select');

                
                $this->resetInsertionMode();
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'select') {
            
            $this->emitToken(array(
                'name' => 'select',
                'type' => HTML5_Tokenizer::ENDTAG
            ));

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        ($Vmrycxs3rwag['name'] === 'input' || $Vmrycxs3rwag['name'] === 'keygen' ||  $Vmrycxs3rwag['name'] === 'textarea')) {
            
            $this->emitToken(array(
                'name' => 'select',
                'type' => HTML5_Tokenizer::ENDTAG
            ));
            $this->emitToken($Vmrycxs3rwag);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'script') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
            

        
        } else {
            
            $this->ignored = true;
        }
    break;

    case self::IN_SELECT_IN_TABLE:

        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        in_array($Vmrycxs3rwag['name'], array('caption', 'table', 'tbody',
        'tfoot', 'thead', 'tr', 'td', 'th'))) {
            
            $this->emitToken(array(
                'name' => 'select',
                'type' => HTML5_Tokenizer::ENDTAG,
            ));
            $this->emitToken($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        in_array($Vmrycxs3rwag['name'], array('caption', 'table', 'tbody', 'tfoot', 'thead', 'tr', 'td', 'th')))  {
            
            

            
            if($this->elementInScope($Vmrycxs3rwag['name'], self::SCOPE_TABLE)) {
                $this->emitToken(array(
                    'name' => 'select',
                    'type' => HTML5_Tokenizer::ENDTAG
                ));

                $this->emitToken($Vmrycxs3rwag);
            } else {
                $this->ignored = true;
            }
        } else {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_SELECT);
        }
    break;

    case self::IN_FOREIGN_CONTENT:
        if ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::CHARACTER ||
        $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            $this->insertText($Vmrycxs3rwag['data']);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            $this->insertComment($Vmrycxs3rwag['data']);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'script' && end($this->stack)->tagName === 'script' &&
        
        end($this->stack)->namespaceURI === self::NS_SVG) {
            array_pop($this->stack);
            
        } elseif (
            ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
                ((
                    $Vmrycxs3rwag['name'] !== 'mglyph' &&
                    $Vmrycxs3rwag['name'] !== 'malignmark' &&
                    
                    end($this->stack)->namespaceURI === self::NS_MATHML &&
                    in_array(end($this->stack)->tagName, array('mi', 'mo', 'mn', 'ms', 'mtext'))
                ) ||
                (
                    $Vmrycxs3rwag['name'] === 'svg' &&
                    
                    end($this->stack)->namespaceURI === self::NS_MATHML &&
                    end($this->stack)->tagName === 'annotation-xml'
                ) ||
                (
                    
                    end($this->stack)->namespaceURI === self::NS_SVG &&
                    in_array(end($this->stack)->tagName, array('foreignObject', 'desc', 'title'))
                ) ||
                (
                    
                    end($this->stack)->namespaceURI === self::NS_HTML
                ))
            ) || $Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG
        ) {
            $this->processWithRulesFor($Vmrycxs3rwag, $this->secondary_mode);
            
            if ($this->mode === self::IN_FOREIGN_CONTENT) {
                $Valwom5reivu = false;
                
                for ($Vfhiq1lhsoja = count($this->stack) - 1; $Vfhiq1lhsoja >= 0; $Vfhiq1lhsoja--) {
                    
                    $V1en3qe0uyt3 = $this->stack[$Vfhiq1lhsoja];
                    if ($V1en3qe0uyt3->namespaceURI !== self::NS_HTML) {
                        $Valwom5reivu = true;
                        break;
                    } elseif (in_array($V1en3qe0uyt3->tagName, array('table', 'html',
                    'applet', 'caption', 'td', 'th', 'button', 'marquee',
                    'object')) || ($V1en3qe0uyt3->tagName === 'foreignObject' &&
                    $V1en3qe0uyt3->namespaceURI === self::NS_SVG)) {
                        break;
                    }
                }
                if (!$Valwom5reivu) {
                    $this->mode = $this->secondary_mode;
                }
            }
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF || (
        $Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        (in_array($Vmrycxs3rwag['name'], array('b', "big", "blockquote", "body", "br", 
        "center", "code", "dc", "dd", "div", "dl", "ds", "dt", "em", "embed", "h1", "h2", 
        "h3", "h4", "h5", "h6", "head", "hr", "i", "img", "li", "listing", 
        "menu", "meta", "nobr", "ol", "p", "pre", "ruby", "s",  "small", 
        "span", "strong", "strike",  "sub", "sup", "table", "tt", "u", "ul", 
        "var")) || ($Vmrycxs3rwag['name'] === 'font' && ($this->getAttr($Vmrycxs3rwag, 'color') ||
        $this->getAttr($Vmrycxs3rwag, 'face') || $this->getAttr($Vmrycxs3rwag, 'size')))))) {
            
            do {
                $V1en3qe0uyt3 = array_pop($this->stack);
                
            } while ($V1en3qe0uyt3->namespaceURI !== self::NS_HTML);
            $this->stack[] = $V1en3qe0uyt3;
            $this->mode = $this->secondary_mode;
            $this->emitToken($Vmrycxs3rwag);
        } elseif ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG) {
            static $V2n430jknk35vg_lookup = array(
                'altglyph' => 'altGlyph',
                'altglyphdef' => 'altGlyphDef',
                'altglyphitem' => 'altGlyphItem',
                'animatecolor' => 'animateColor',
                'animatemotion' => 'animateMotion',
                'animatetransform' => 'animateTransform',
                'clippath' => 'clipPath',
                'feblend' => 'feBlend',
                'fecolormatrix' => 'feColorMatrix',
                'fecomponenttransfer' => 'feComponentTransfer',
                'fecomposite' => 'feComposite',
                'feconvolvematrix' => 'feConvolveMatrix',
                'fediffuselighting' => 'feDiffuseLighting',
                'fedisplacementmap' => 'feDisplacementMap',
                'fedistantlight' => 'feDistantLight',
                'feflood' => 'feFlood',
                'fefunca' => 'feFuncA',
                'fefuncb' => 'feFuncB',
                'fefuncg' => 'feFuncG',
                'fefuncr' => 'feFuncR',
                'fegaussianblur' => 'feGaussianBlur',
                'feimage' => 'feImage',
                'femerge' => 'feMerge',
                'femergenode' => 'feMergeNode',
                'femorphology' => 'feMorphology',
                'feoffset' => 'feOffset',
                'fepointlight' => 'fePointLight',
                'fespecularlighting' => 'feSpecularLighting',
                'fespotlight' => 'feSpotLight',
                'fetile' => 'feTile',
                'feturbulence' => 'feTurbulence',
                'foreignobject' => 'foreignObject',
                'glyphref' => 'glyphRef',
                'lineargradient' => 'linearGradient',
                'radialgradient' => 'radialGradient',
                'textpath' => 'textPath',
            );
            
            $Vqkss1gal2hp = end($this->stack);
            if ($Vqkss1gal2hp->namespaceURI === self::NS_MATHML) {
                $Vmrycxs3rwag = $this->adjustMathMLAttributes($Vmrycxs3rwag);
            }
            if ($Vqkss1gal2hp->namespaceURI === self::NS_SVG &&
            isset($V2n430jknk35vg_lookup[$Vmrycxs3rwag['name']])) {
                $Vmrycxs3rwag['name'] = $V2n430jknk35vg_lookup[$Vmrycxs3rwag['name']];
            }
            if ($Vqkss1gal2hp->namespaceURI === self::NS_SVG) {
                $Vmrycxs3rwag = $this->adjustSVGAttributes($Vmrycxs3rwag);
            }
            $Vmrycxs3rwag = $this->adjustForeignAttributes($Vmrycxs3rwag);
            $this->insertForeignElement($Vmrycxs3rwag, $Vqkss1gal2hp->namespaceURI);
            if (isset($Vmrycxs3rwag['self-closing'])) {
                array_pop($this->stack);
                
            }
        }
    break;

    case self::AFTER_BODY:
        

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            
            $Vd25ttkxmgaf = $this->dom->createComment($Vmrycxs3rwag['data']);
            $this->stack[0]->appendChild($Vd25ttkxmgaf);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG && $Vmrycxs3rwag['name'] === 'html') {
            
            $this->ignored = true;
            

            $this->mode = self::AFTER_AFTER_BODY;

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            

        
        } else {
            
            $this->mode = self::IN_BODY;
            $this->emitToken($Vmrycxs3rwag);
        }
    break;

    case self::IN_FRAMESET:
        

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'frameset') {
            $this->insertElement($Vmrycxs3rwag);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'frameset') {
            
            if(end($this->stack)->tagName === 'html') {
                $this->ignored = true;
                

            } else {
                
                array_pop($this->stack);

                
                $this->mode = self::AFTER_FRAMESET;
            }

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'frame') {
            
            $this->insertElement($Vmrycxs3rwag);

            
            array_pop($this->stack);

            

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'noframes') {
            
            $this->processwithRulesFor($Vmrycxs3rwag, self::IN_HEAD);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
            
        
        } else {
            
            $this->ignored = true;
        }
    break;

    case self::AFTER_FRAMESET:
        

        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER) {
            
            $this->insertText($Vmrycxs3rwag['data']);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            $this->insertComment($Vmrycxs3rwag['data']);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE) {
            

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::ENDTAG &&
        $Vmrycxs3rwag['name'] === 'html') {
            $this->mode = self::AFTER_AFTER_FRAMESET;

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG &&
        $Vmrycxs3rwag['name'] === 'noframes') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            

        
        } else {
            
            $this->ignored = true;
        }
    break;

    case self::AFTER_AFTER_BODY:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            
            $Vd25ttkxmgaf = $this->dom->createComment($Vmrycxs3rwag['data']);
            $this->dom->appendChild($Vd25ttkxmgaf);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE ||
        $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html')) {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
        } else {
            
            $this->mode = self::IN_BODY;
            $this->emitToken($Vmrycxs3rwag);
        }
    break;

    case self::AFTER_AFTER_FRAMESET:
        
        if($Vmrycxs3rwag['type'] === HTML5_Tokenizer::COMMENT) {
            
            
            $Vd25ttkxmgaf = $this->dom->createComment($Vmrycxs3rwag['data']);
            $this->dom->appendChild($Vd25ttkxmgaf);

        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::DOCTYPE ||
        $Vmrycxs3rwag['type'] === HTML5_Tokenizer::SPACECHARACTER ||
        ($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'html')) {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_BODY);

        
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::EOF) {
            
        } elseif($Vmrycxs3rwag['type'] === HTML5_Tokenizer::STARTTAG && $Vmrycxs3rwag['name'] === 'nofrmaes') {
            $this->processWithRulesFor($Vmrycxs3rwag, self::IN_HEAD);
        } else {
            
        }
    break;
    }
        
        }

    private function insertElement($Vmrycxs3rwag, $Vi3y3l1uvwp3ppend = true) {
        $V5d0zf3gmtr0 = $this->dom->createElementNS(self::NS_HTML, $Vmrycxs3rwag['name']);

        if (!empty($Vmrycxs3rwag['attr'])) {
            foreach($Vmrycxs3rwag['attr'] as $V5v3aao2lape) {
                if(!$V5d0zf3gmtr0->hasAttribute($V5v3aao2lape['name'])) {
                    $V5d0zf3gmtr0->setAttribute($V5v3aao2lape['name'], $V5v3aao2lape['value']);
                }
            }
        }
        if ($Vi3y3l1uvwp3ppend) {
            $this->appendToRealParent($V5d0zf3gmtr0);
            $this->stack[] = $V5d0zf3gmtr0;
        }

        return $V5d0zf3gmtr0;
    }

    private function insertText($Vou4vxorrdoe) {
        if ($Vou4vxorrdoe === '') return;
        if ($this->ignore_lf_token) {
            if ($Vou4vxorrdoe[0] === "\n") {
                $Vou4vxorrdoe = substr($Vou4vxorrdoe, 1);
                if ($Vou4vxorrdoe === false) return;
            }
        }
        $Vkjdq1foihhi = $this->dom->createTextNode($Vou4vxorrdoe);
        $this->appendToRealParent($Vkjdq1foihhi);
    }

    private function insertComment($Vou4vxorrdoe) {
        $Vd25ttkxmgaf = $this->dom->createComment($Vou4vxorrdoe);
        $this->appendToRealParent($Vd25ttkxmgaf);
    }

    private function appendToRealParent($V1en3qe0uyt3) {
        
        
        if(!$this->foster_parent || !in_array(end($this->stack)->tagName,
        array('table', 'tbody', 'tfoot', 'thead', 'tr'))) {
            end($this->stack)->appendChild($V1en3qe0uyt3);
        } else {
            $this->fosterParent($V1en3qe0uyt3);
        }
    }

    private function elementInScope($V5d0zf3gmtr0, $V2n430jknk35cope = self::SCOPE) {
        if(is_array($V5d0zf3gmtr0)) {
            foreach($V5d0zf3gmtr0 as $Vltoddaysjlm) {
                if($this->elementInScope($Vltoddaysjlm, $V2n430jknk35cope)) {
                    return true;
                }
            }

            return false;
        }

        $Vtrek0fm2ony = count($this->stack);

        for($Vmwwo1qnmepz = 0; $Vmwwo1qnmepz < $Vtrek0fm2ony; $Vmwwo1qnmepz++) {
            
            $V1en3qe0uyt3 = $this->stack[$Vtrek0fm2ony - 1 - $Vmwwo1qnmepz];

            if($V1en3qe0uyt3->tagName === $V5d0zf3gmtr0) {
                
                return true;

                
                
                

            
            } elseif($V1en3qe0uyt3->tagName === 'table' || $V1en3qe0uyt3->tagName === 'html') {
                return false;

            
            } elseif($V2n430jknk35cope !== self::SCOPE_TABLE &&
            (in_array($V1en3qe0uyt3->tagName, array('applet', 'caption', 'td',
                'th', 'button', 'marquee', 'object')) ||
                $V1en3qe0uyt3->tagName === 'foreignObject' && $V1en3qe0uyt3->namespaceURI === self::NS_SVG)) {
                return false;


            
            } elseif($V2n430jknk35cope === self::SCOPE_LISTITEM && in_array($V1en3qe0uyt3->tagName, array('ol', 'ul'))) {
                return false;
            }

            
        }
    }

    private function reconstructActiveFormattingElements() {
        
        $Vxz4ev0fpgml_elements = count($this->a_formatting);

        if($Vxz4ev0fpgml_elements === 0) {
            return false;
        }

        
        $V4o5wb5ucdu5 = end($this->a_formatting);

        
        if($V4o5wb5ucdu5 === self::MARKER || in_array($V4o5wb5ucdu5, $this->stack, true)) {
            return false;
        }

        for($Vi3y3l1uvwp3 = $Vxz4ev0fpgml_elements - 1; $Vi3y3l1uvwp3 >= 0; true) {
            
            if($Vi3y3l1uvwp3 === 0) {
                $V2n430jknk35tep_seven = false;
                break;
            }

            
            $Vi3y3l1uvwp3--;
            $V4o5wb5ucdu5 = $this->a_formatting[$Vi3y3l1uvwp3];

            
            if($V4o5wb5ucdu5 === self::MARKER || in_array($V4o5wb5ucdu5, $this->stack, true)) {
                break;
            }
        }

        while(true) {
            
            if(isset($V2n430jknk35tep_seven) && $V2n430jknk35tep_seven === true) {
                $Vi3y3l1uvwp3++;
                $V4o5wb5ucdu5 = $this->a_formatting[$Vi3y3l1uvwp3];
            }

            
            $Vbfzdxwlirib = $V4o5wb5ucdu5->cloneNode();

            
            $this->appendToRealParent($Vbfzdxwlirib);
            $this->stack[] = $Vbfzdxwlirib;

            
            $this->a_formatting[$Vi3y3l1uvwp3] = $Vbfzdxwlirib;

            
            if(end($this->a_formatting) !== $Vbfzdxwlirib) {
                $V2n430jknk35tep_seven = true;
            } else {
                break;
            }
        }
    }

    private function clearTheActiveFormattingElementsUpToTheLastMarker() {
        

        while(true) {
            
            $V4o5wb5ucdu5 = end($this->a_formatting);

            
            array_pop($this->a_formatting);

            
            if($V4o5wb5ucdu5 === self::MARKER) {
                break;
            }
        }
    }

    private function generateImpliedEndTags($V12noi43jcih = array()) {
        
        $V1en3qe0uyt3 = end($this->stack);
        $Vltoddaysjlms = array_diff(array('dc', 'dd', 'ds', 'dt', 'li', 'p', 'td', 'th', 'tr'), $V12noi43jcih);

        while(in_array(end($this->stack)->tagName, $Vltoddaysjlms)) {
            array_pop($this->stack);
        }
    }

    private function getElementCategory($V1en3qe0uyt3) {
        if (!is_object($V1en3qe0uyt3)) debug_print_backtrace();
        $Vmwwo1qnmepzame = $V1en3qe0uyt3->tagName;
        if(in_array($Vmwwo1qnmepzame, $this->special))
            return self::SPECIAL;

        elseif(in_array($Vmwwo1qnmepzame, $this->scoping))
            return self::SCOPING;

        elseif(in_array($Vmwwo1qnmepzame, $this->formatting))
            return self::FORMATTING;

        else
            return self::PHRASING;
    }

    private function clearStackToTableContext($Vltoddaysjlms) {
        
        while(true) {
            $Vmwwo1qnmepzame = end($this->stack)->tagName;

            if(in_array($Vmwwo1qnmepzame, $Vltoddaysjlms)) {
                break;
            } else {
                array_pop($this->stack);
            }
        }
    }

    private function resetInsertionMode($Vhtknqrle5z0 = null) {
        
        $V3ze22vtj2t0 = false;
        $Vtrek0fm2ony = count($this->stack);

        for($Vmwwo1qnmepz = $Vtrek0fm2ony - 1; $Vmwwo1qnmepz >= 0; $Vmwwo1qnmepz--) {
            
            $V1en3qe0uyt3 = $this->stack[$Vmwwo1qnmepz];

            
            if($this->stack[0]->isSameNode($V1en3qe0uyt3)) {
                $V3ze22vtj2t0 = true;
                $V1en3qe0uyt3 = $Vhtknqrle5z0;
            }

            
            if($V1en3qe0uyt3->tagName === 'select') {
                $this->mode = self::IN_SELECT;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'td' || $V1en3qe0uyt3->nodeName === 'th') {
                $this->mode = self::IN_CELL;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'tr') {
                $this->mode = self::IN_ROW;
                break;

            
            } elseif(in_array($V1en3qe0uyt3->tagName, array('tbody', 'thead', 'tfoot'))) {
                $this->mode = self::IN_TABLE_BODY;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'caption') {
                $this->mode = self::IN_CAPTION;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'colgroup') {
                $this->mode = self::IN_COLUMN_GROUP;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'table') {
                $this->mode = self::IN_TABLE;
                break;

            
            } elseif($V1en3qe0uyt3->namespaceURI === self::NS_SVG ||
            $V1en3qe0uyt3->namespaceURI === self::NS_MATHML) {
                $this->mode = self::IN_FOREIGN_CONTENT;
                $this->secondary_mode = self::IN_BODY;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'head') {
                $this->mode = self::IN_BODY;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'body') {
                $this->mode = self::IN_BODY;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'frameset') {
                $this->mode = self::IN_FRAMESET;
                break;

            
            } elseif($V1en3qe0uyt3->tagName === 'html') {
                $this->mode = ($this->head_pointer === null)
                    ? self::BEFORE_HEAD
                    : self::AFTER_HEAD;

                break;

            
            } elseif($V3ze22vtj2t0) {
                $this->mode = self::IN_BODY;
                break;
            }
        }
    }

    private function closeCell() {
        
        foreach(array('td', 'th') as $Vblc1ueqvbti) {
            if($this->elementInScope($Vblc1ueqvbti, self::SCOPE_TABLE)) {
                $this->emitToken(array(
                    'name' => $Vblc1ueqvbti,
                    'type' => HTML5_Tokenizer::ENDTAG
                ));

                break;
            }
        }
    }

    private function processWithRulesFor($Vmrycxs3rwag, $Vbdcqcmfhadr) {
        
        return $this->emitToken($Vmrycxs3rwag, $Vbdcqcmfhadr);
    }

    private function insertCDATAElement($Vmrycxs3rwag) {
        $this->insertElement($Vmrycxs3rwag);
        $this->original_mode = $this->mode;
        $this->mode = self::IN_CDATA_RCDATA;
        $this->content_model = HTML5_Tokenizer::CDATA;
    }

    private function insertRCDATAElement($Vmrycxs3rwag) {
        $this->insertElement($Vmrycxs3rwag);
        $this->original_mode = $this->mode;
        $this->mode = self::IN_CDATA_RCDATA;
        $this->content_model = HTML5_Tokenizer::RCDATA;
    }

    private function getAttr($Vmrycxs3rwag, $Vseq1edikdvg) {
        if (!isset($Vmrycxs3rwag['attr'])) return false;
        $Vws44nszhvgoet = false;
        foreach ($Vmrycxs3rwag['attr'] as $Vsieoicpivpa) {
            if ($Vsieoicpivpa['name'] === $Vseq1edikdvg) $Vws44nszhvgoet = $Vsieoicpivpa['value'];
        }
        return $Vws44nszhvgoet;
    }

    private function getCurrentTable() {
        
        for ($Vfhiq1lhsoja = count($this->stack) - 1; $Vfhiq1lhsoja >= 0; $Vfhiq1lhsoja--) {
            if ($this->stack[$Vfhiq1lhsoja]->tagName === 'table') {
                return $this->stack[$Vfhiq1lhsoja];
            }
        }
        return $this->stack[0];
    }

    private function getFosterParent() {
        
        for($Vmwwo1qnmepz = count($this->stack) - 1; $Vmwwo1qnmepz >= 0; $Vmwwo1qnmepz--) {
            if($this->stack[$Vmwwo1qnmepz]->tagName === 'table') {
                $Vmqy2qrqt2lx = $this->stack[$Vmwwo1qnmepz];
                break;
            }
        }

        if(isset($Vmqy2qrqt2lx) && $Vmqy2qrqt2lx->parentNode !== null) {
            return $Vmqy2qrqt2lx->parentNode;

        } elseif(!isset($Vmqy2qrqt2lx)) {
            return $this->stack[0];

        } elseif(isset($Vmqy2qrqt2lx) && ($Vmqy2qrqt2lx->parentNode === null ||
        $Vmqy2qrqt2lx->parentNode->nodeType !== XML_ELEMENT_NODE)) {
            return $this->stack[$Vmwwo1qnmepz - 1];
        }
    }

    public function fosterParent($V1en3qe0uyt3) {
        $Vvoupztpahqk = $this->getFosterParent();
        $Vmqy2qrqt2lx = $this->getCurrentTable(); 
        
        
        if ($Vmqy2qrqt2lx->tagName === 'table' && $Vmqy2qrqt2lx->parentNode->isSameNode($Vvoupztpahqk)) {
            $Vvoupztpahqk->insertBefore($V1en3qe0uyt3, $Vmqy2qrqt2lx);
        } else {
            $Vvoupztpahqk->appendChild($V1en3qe0uyt3);
        }
    }

    
    private function printStack() {
        $Vmwwo1qnmepzames = array();
        foreach ($this->stack as $Vfhiq1lhsoja => $Vltoddaysjlm) {
            $Vmwwo1qnmepzames[] = $Vltoddaysjlm->tagName;
        }
        echo "  -> stack [" . implode(', ', $Vmwwo1qnmepzames) . "]\n";
    }

    
    private function printActiveFormattingElements() {
        if (!$this->a_formatting) return;
        $Vmwwo1qnmepzames = array();
        foreach ($this->a_formatting as $V1en3qe0uyt3) {
            if ($V1en3qe0uyt3 === self::MARKER) $Vmwwo1qnmepzames[] = 'MARKER';
            else $Vmwwo1qnmepzames[] = $V1en3qe0uyt3->tagName;
        }
        echo "  -> active formatting [" . implode(', ', $Vmwwo1qnmepzames) . "]\n";
    }

    public function currentTableIsTainted() {
        return !empty($this->getCurrentTable()->tainted);
    }

    
    public function setupContext($Vhtknqrle5z0 = null) {
        $this->fragment = true;
        if ($Vhtknqrle5z0) {
            $Vhtknqrle5z0 = $this->dom->createElementNS(self::NS_HTML, $Vhtknqrle5z0);
            
            switch ($Vhtknqrle5z0->tagName) {
            case 'title': case 'textarea':
                $this->content_model = HTML5_Tokenizer::RCDATA;
                break;
            case 'style': case 'script': case 'xmp': case 'iframe':
            case 'noembed': case 'noframes':
                $this->content_model = HTML5_Tokenizer::CDATA;
                break;
            case 'noscript':
                
                $this->content_model = HTML5_Tokenizer::CDATA;
                break;
            case 'plaintext':
                $this->content_model = HTML5_Tokenizer::PLAINTEXT;
                break;
            }
            
            $V4jn4msro4hf = $this->dom->createElementNS(self::NS_HTML, 'html');
            $this->root = $V4jn4msro4hf;
            
            $this->dom->appendChild($V4jn4msro4hf);
            
            $this->stack = array($V4jn4msro4hf);
            
            $this->resetInsertionMode($Vhtknqrle5z0);
            
            $V1en3qe0uyt3 = $Vhtknqrle5z0;
            do {
                if ($V1en3qe0uyt3->tagName === 'form') {
                    $this->form_pointer = $V1en3qe0uyt3;
                    break;
                }
            } while ($V1en3qe0uyt3 = $V1en3qe0uyt3->parentNode);
        }
    }

    public function adjustMathMLAttributes($Vmrycxs3rwag) {
        foreach ($Vmrycxs3rwag['attr'] as &$Vvzeh1zaatrf) {
            if ($Vvzeh1zaatrf['name'] === 'definitionurl') {
                $Vvzeh1zaatrf['name'] = 'definitionURL';
            }
        }
        return $Vmrycxs3rwag;
    }

    public function adjustSVGAttributes($Vmrycxs3rwag) {
        static $Vbzow4j0kijy = array(
            'attributename' => 'attributeName',
            'attributetype' => 'attributeType',
            'basefrequency' => 'baseFrequency',
            'baseprofile' => 'baseProfile',
            'calcmode' => 'calcMode',
            'clippathunits' => 'clipPathUnits',
            'contentscripttype' => 'contentScriptType',
            'contentstyletype' => 'contentStyleType',
            'diffuseconstant' => 'diffuseConstant',
            'edgemode' => 'edgeMode',
            'externalresourcesrequired' => 'externalResourcesRequired',
            'filterres' => 'filterRes',
            'filterunits' => 'filterUnits',
            'glyphref' => 'glyphRef',
            'gradienttransform' => 'gradientTransform',
            'gradientunits' => 'gradientUnits',
            'kernelmatrix' => 'kernelMatrix',
            'kernelunitlength' => 'kernelUnitLength',
            'keypoints' => 'keyPoints',
            'keysplines' => 'keySplines',
            'keytimes' => 'keyTimes',
            'lengthadjust' => 'lengthAdjust',
            'limitingconeangle' => 'limitingConeAngle',
            'markerheight' => 'markerHeight',
            'markerunits' => 'markerUnits',
            'markerwidth' => 'markerWidth',
            'maskcontentunits' => 'maskContentUnits',
            'maskunits' => 'maskUnits',
            'numoctaves' => 'numOctaves',
            'pathlength' => 'pathLength',
            'patterncontentunits' => 'patternContentUnits',
            'patterntransform' => 'patternTransform',
            'patternunits' => 'patternUnits',
            'pointsatx' => 'pointsAtX',
            'pointsaty' => 'pointsAtY',
            'pointsatz' => 'pointsAtZ',
            'preservealpha' => 'preserveAlpha',
            'preserveaspectratio' => 'preserveAspectRatio',
            'primitiveunits' => 'primitiveUnits',
            'refx' => 'refX',
            'refy' => 'refY',
            'repeatcount' => 'repeatCount',
            'repeatdur' => 'repeatDur',
            'requiredextensions' => 'requiredExtensions',
            'requiredfeatures' => 'requiredFeatures',
            'specularconstant' => 'specularConstant',
            'specularexponent' => 'specularExponent',
            'spreadmethod' => 'spreadMethod',
            'startoffset' => 'startOffset',
            'stddeviation' => 'stdDeviation',
            'stitchtiles' => 'stitchTiles',
            'surfacescale' => 'surfaceScale',
            'systemlanguage' => 'systemLanguage',
            'tablevalues' => 'tableValues',
            'targetx' => 'targetX',
            'targety' => 'targetY',
            'textlength' => 'textLength',
            'viewbox' => 'viewBox',
            'viewtarget' => 'viewTarget',
            'xchannelselector' => 'xChannelSelector',
            'ychannelselector' => 'yChannelSelector',
            'zoomandpan' => 'zoomAndPan',
        );
        foreach ($Vmrycxs3rwag['attr'] as &$Vvzeh1zaatrf) {
            if (isset($Vbzow4j0kijy[$Vvzeh1zaatrf['name']])) {
                $Vvzeh1zaatrf['name'] = $Vbzow4j0kijy[$Vvzeh1zaatrf['name']];
            }
        }
        return $Vmrycxs3rwag;
    }

    public function adjustForeignAttributes($Vmrycxs3rwag) {
        static $Vbzow4j0kijy = array(
            'xlink:actuate' => array('xlink', 'actuate', self::NS_XLINK),
            'xlink:arcrole' => array('xlink', 'arcrole', self::NS_XLINK),
            'xlink:href' => array('xlink', 'href', self::NS_XLINK),
            'xlink:role' => array('xlink', 'role', self::NS_XLINK),
            'xlink:show' => array('xlink', 'show', self::NS_XLINK),
            'xlink:title' => array('xlink', 'title', self::NS_XLINK),
            'xlink:type' => array('xlink', 'type', self::NS_XLINK),
            'xml:base' => array('xml', 'base', self::NS_XML),
            'xml:lang' => array('xml', 'lang', self::NS_XML),
            'xml:space' => array('xml', 'space', self::NS_XML),
            'xmlns' => array(null, 'xmlns', self::NS_XMLNS),
            'xmlns:xlink' => array('xmlns', 'xlink', self::NS_XMLNS),
        );
        foreach ($Vmrycxs3rwag['attr'] as &$Vvzeh1zaatrf) {
            if (isset($Vbzow4j0kijy[$Vvzeh1zaatrf['name']])) {
                $Vvzeh1zaatrf['name'] = $Vbzow4j0kijy[$Vvzeh1zaatrf['name']];
            }
        }
        return $Vmrycxs3rwag;
    }

    public function insertForeignElement($Vmrycxs3rwag, $Vmwwo1qnmepzamespaceURI) {
        $V5d0zf3gmtr0 = $this->dom->createElementNS($Vmwwo1qnmepzamespaceURI, $Vmrycxs3rwag['name']);
        if (!empty($Vmrycxs3rwag['attr'])) {
            foreach ($Vmrycxs3rwag['attr'] as $Vvzeh1zaatrf) {
                $V5v3aao2lape = $Vvzeh1zaatrf['name'];
                if (is_array($V5v3aao2lape)) {
                    $Vmwwo1qnmepzs = $V5v3aao2lape[2];
                    $V5v3aao2lape = $V5v3aao2lape[1];
                } else {
                    $Vmwwo1qnmepzs = self::NS_HTML;
                }
                if (!$V5d0zf3gmtr0->hasAttributeNS($Vmwwo1qnmepzs, $V5v3aao2lape)) {
                    
                    if ($Vmwwo1qnmepzs === self::NS_XLINK) {
                        $V5d0zf3gmtr0->setAttribute('xlink:'.$V5v3aao2lape, $Vvzeh1zaatrf['value']);
                    } elseif ($Vmwwo1qnmepzs === self::NS_HTML) {
                        
                        $V5d0zf3gmtr0->setAttribute($V5v3aao2lape, $Vvzeh1zaatrf['value']);
                    } else {
                        $V5d0zf3gmtr0->setAttributeNS($Vmwwo1qnmepzs, $V5v3aao2lape, $Vvzeh1zaatrf['value']);
                    }
                }
            }
        }
        $this->appendToRealParent($V5d0zf3gmtr0);
        $this->stack[] = $V5d0zf3gmtr0;
        
        
    }

    public function save() {
        $this->dom->normalize();
        if (!$this->fragment) {
            return $this->dom;
        } else {
            if ($this->root) {
                return $this->root->childNodes;
            } else {
                return $this->dom->childNodes;
            }
        }
    }
}

