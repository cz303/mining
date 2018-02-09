<?php









class HTML5_Tokenizer {
    
    protected $V2ov2dxpmqj1;

    
    private $Vpnxy30x1asc;

    
    protected $Vzrrx0yf1ssm;

    
    protected $Vmrycxs3rwag;

    
    const PCDATA    = 0;
    const RCDATA    = 1;
    const CDATA     = 2;
    const PLAINTEXT = 3;

    
    
    
    const DOCTYPE        = 0;
    const STARTTAG       = 1;
    const ENDTAG         = 2;
    const COMMENT        = 3;
    const CHARACTER      = 4;
    const SPACECHARACTER = 5;
    const EOF            = 6;
    const PARSEERROR     = 7;

    
    const ALPHA       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    const UPPER_ALPHA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const LOWER_ALPHA = 'abcdefghijklmnopqrstuvwxyz';
    const DIGIT       = '0123456789';
    const HEX         = '0123456789ABCDEFabcdef';
    const WHITESPACE  = "\t\n\x0c ";

    
    public function __construct($Vou4vxorrdoe, $Vych0uhmr4hx = null) {
        $this->stream = new HTML5_InputStream($Vou4vxorrdoe);
        if (!$Vych0uhmr4hx) $this->tree = new HTML5_TreeBuilder;
        else $this->tree = $Vych0uhmr4hx;
        $this->content_model = self::PCDATA;
    }

    public function parseFragment($Vhtknqrle5z0 = null) {
        $this->tree->setupContext($Vhtknqrle5z0);
        if ($this->tree->content_model) {
            $this->content_model = $this->tree->content_model;
            $this->tree->content_model = null;
        }
        $this->parse();
    }

    
    
    
    public function parse() {
        
        $Veq4e0qpy03m = 'data';
        
        $Vttrtf1yo2e3 = '';
        
        $Vd20iirg0ph1 = false;
        
        while($Veq4e0qpy03m !== null) {
            
            
            
            switch($Veq4e0qpy03m) {
                case 'data':

                    
                    $V1ciechb1uvs = $this->stream->char();
                    $Vttrtf1yo2e3 .= $V1ciechb1uvs;
                    if (strlen($Vttrtf1yo2e3) > 4) $Vttrtf1yo2e3 = substr($Vttrtf1yo2e3, -4);

                    
                    $V5jh30uhhyqx = 
                        !$Vd20iirg0ph1 &&
                        (
                            $this->content_model === self::RCDATA ||
                            $this->content_model === self::CDATA
                        );
                    $Vmeqoptxwjje =
                        !$Vd20iirg0ph1 &&
                        (
                            $this->content_model === self::PCDATA ||
                            $this->content_model === self::RCDATA
                        );
                    $Vburmoedv0xx =
                        $this->content_model === self::PCDATA ||
                        (
                            (
                                $this->content_model === self::RCDATA ||
                                $this->content_model === self::CDATA
                             ) &&
                             !$Vd20iirg0ph1
                        );
                    $Vy1ctoeedewv = 
                        $Vd20iirg0ph1 &&
                        (
                            $this->content_model === self::RCDATA ||
                            $this->content_model === self::CDATA
                        );

                    if($V1ciechb1uvs === '&' && $Vmeqoptxwjje) {
                        
                        $Veq4e0qpy03m = 'character reference data';

                    } elseif(
                        $V1ciechb1uvs === '-' &&
                        $V5jh30uhhyqx &&
                        $Vttrtf1yo2e3 === '<!--'
                    ) {
                        
                        $Vd20iirg0ph1 = true;

                        
                        $this->emitToken(array(
                            'type' => self::CHARACTER,
                            'data' => '-'
                        ));
                        

                    
                    } elseif($V1ciechb1uvs === '<' && $Vburmoedv0xx) {
                        
                        $Veq4e0qpy03m = 'tag open';

                    
                    } elseif(
                        $V1ciechb1uvs === '>' &&
                        $Vy1ctoeedewv &&
                        substr($Vttrtf1yo2e3, 1) === '-->'
                    ) {
                        
                        $Vd20iirg0ph1 = false;

                        
                        $this->emitToken(array(
                            'type' => self::CHARACTER,
                            'data' => '>'
                        ));
                        

                    } elseif($V1ciechb1uvs === false) {
                        
                        $Veq4e0qpy03m = null;
                        $this->tree->emitToken(array(
                            'type' => self::EOF
                        ));
                    
                    } elseif($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        
                        
                        $V1ciechb1uvss = $this->stream->charsWhile(self::WHITESPACE);
                        $this->emitToken(array(
                            'type' => self::SPACECHARACTER,
                            'data' => $V1ciechb1uvs . $V1ciechb1uvss
                        ));
                        $Vttrtf1yo2e3 .= $V1ciechb1uvss;
                        if (strlen($Vttrtf1yo2e3) > 4) $Vttrtf1yo2e3 = substr($Vttrtf1yo2e3, -4);

                    } else {
                        
                        
                        $Vokcwpnwb5zx = '';
                        if ($V5jh30uhhyqx) $Vokcwpnwb5zx .= '-';
                        if ($Vmeqoptxwjje) $Vokcwpnwb5zx .= '&';
                        if ($Vburmoedv0xx)  $Vokcwpnwb5zx .= '<';
                        if ($Vy1ctoeedewv)  $Vokcwpnwb5zx .= '>';

                        if ($Vokcwpnwb5zx === '') {
                            $V1ciechb1uvss = $this->stream->remainingChars();
                        } else {
                            $V1ciechb1uvss = $this->stream->charsUntil($Vokcwpnwb5zx);
                        }

                        $this->emitToken(array(
                            'type' => self::CHARACTER,
                            'data' => $V1ciechb1uvs . $V1ciechb1uvss
                        ));

                        $Vttrtf1yo2e3 .= $V1ciechb1uvss;
                        if (strlen($Vttrtf1yo2e3) > 4) $Vttrtf1yo2e3 = substr($Vttrtf1yo2e3, -4);

                        $Veq4e0qpy03m = 'data';
                    }
                break;

                case 'character reference data':
                    

                    
                    $Vjd3otikht3z = $this->consumeCharacterReference();

                    
                    
                    $this->emitToken(array(
                        'type' => self::CHARACTER,
                        'data' => $Vjd3otikht3z
                    ));

                    
                    $Veq4e0qpy03m = 'data';
                break;

                case 'tag open':
                    $V1ciechb1uvs = $this->stream->char();

                    switch($this->content_model) {
                        case self::RCDATA:
                        case self::CDATA:
                            
                            

                            if($V1ciechb1uvs === '/') {
                                $Veq4e0qpy03m = 'close tag open';

                            } else {
                                $this->emitToken(array(
                                    'type' => self::CHARACTER,
                                    'data' => '<'
                                ));

                                $this->stream->unget();

                                $Veq4e0qpy03m = 'data';
                            }
                        break;

                        case self::PCDATA:
                            
                            

                            if($V1ciechb1uvs === '!') {
                                
                                $Veq4e0qpy03m = 'markup declaration open';

                            } elseif($V1ciechb1uvs === '/') {
                                
                                $Veq4e0qpy03m = 'close tag open';

                            } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                                
                                $this->token = array(
                                    'name'  => strtolower($V1ciechb1uvs),
                                    'type'  => self::STARTTAG,
                                    'attr'  => array()
                                );

                                $Veq4e0qpy03m = 'tag name';

                            } elseif('a' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'z') {
                                
                                $this->token = array(
                                    'name'  => $V1ciechb1uvs,
                                    'type'  => self::STARTTAG,
                                    'attr'  => array()
                                );

                                $Veq4e0qpy03m = 'tag name';

                            } elseif($V1ciechb1uvs === '>') {
                                
                                $this->emitToken(array(
                                    'type' => self::PARSEERROR,
                                    'data' => 'expected-tag-name-but-got-right-bracket'
                                ));
                                $this->emitToken(array(
                                    'type' => self::CHARACTER,
                                    'data' => '<>'
                                ));

                                $Veq4e0qpy03m = 'data';

                            } elseif($V1ciechb1uvs === '?') {
                                
                                $this->emitToken(array(
                                    'type' => self::PARSEERROR,
                                    'data' => 'expected-tag-name-but-got-question-mark'
                                ));
                                $this->token = array(
                                    'data' => '?',
                                    'type' => self::COMMENT
                                );
                                $Veq4e0qpy03m = 'bogus comment';

                            } else {
                                
                                $this->emitToken(array(
                                    'type' => self::PARSEERROR,
                                    'data' => 'expected-tag-name'
                                ));
                                $this->emitToken(array(
                                    'type' => self::CHARACTER,
                                    'data' => '<'
                                ));

                                $Veq4e0qpy03m = 'data';
                                $this->stream->unget();
                            }
                        break;
                    }
                break;

                case 'close tag open':
                    if (
                        $this->content_model === self::RCDATA ||
                        $this->content_model === self::CDATA
                    ) {
                        
                        $Vcvluzjs3wzb = strtolower($this->stream->charsWhile(self::ALPHA));
                        $Vb5b4opeoyrl = $this->stream->char();
                        $this->stream->unget();
                        if (
                            !$this->token ||
                            $this->token['name'] !== $Vcvluzjs3wzb ||
                            $this->token['name'] === $Vcvluzjs3wzb && !in_array($Vb5b4opeoyrl, array("\x09", "\x0A", "\x0C", "\x20", "\x3E", "\x2F", false))
                        ) {
                            
                            

                            
                            
                            $this->emitToken(array(
                                'type' => self::CHARACTER,
                                'data' => '</' . $Vcvluzjs3wzb
                            ));

                            $Veq4e0qpy03m = 'data';
                        } else {
                            
                            
                            

                            
                            $this->token = array(
                                'name'  => $Vcvluzjs3wzb,
                                'type'  => self::ENDTAG
                            );

                            
                            $Veq4e0qpy03m = 'tag name';
                        }
                    } elseif ($this->content_model === self::PCDATA) {
                        
                        $V1ciechb1uvs = $this->stream->char();

                        if ('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                            
                            $this->token = array(
                                'name'  => strtolower($V1ciechb1uvs),
                                'type'  => self::ENDTAG
                            );

                            $Veq4e0qpy03m = 'tag name';

                        } elseif ('a' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'z') {
                            
                            $this->token = array(
                                'name'  => $V1ciechb1uvs,
                                'type'  => self::ENDTAG
                            );

                            $Veq4e0qpy03m = 'tag name';

                        } elseif($V1ciechb1uvs === '>') {
                            
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'expected-closing-tag-but-got-right-bracket'
                            ));
                            $Veq4e0qpy03m = 'data';

                        } elseif($V1ciechb1uvs === false) {
                            
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'expected-closing-tag-but-got-eof'
                            ));
                            $this->emitToken(array(
                                'type' => self::CHARACTER,
                                'data' => '</'
                            ));

                            $this->stream->unget();
                            $Veq4e0qpy03m = 'data';

                        } else {
                            
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'expected-closing-tag-but-got-char'
                            ));
                            $this->token = array(
                                'data' => $V1ciechb1uvs,
                                'type' => self::COMMENT
                            );
                            $Veq4e0qpy03m = 'bogus comment';
                        }
                    }
                break;

                case 'tag name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before attribute name';

                    } elseif($V1ciechb1uvs === '/') {
                        
                        $Veq4e0qpy03m = 'self-closing start tag';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $V1ciechb1uvss = $this->stream->charsWhile(self::UPPER_ALPHA);

                        $this->token['name'] .= strtolower($V1ciechb1uvs . $V1ciechb1uvss);
                        $Veq4e0qpy03m = 'tag name';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-tag-name'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $V1ciechb1uvss = $this->stream->charsUntil("\t\n\x0C />" . self::UPPER_ALPHA);

                        $this->token['name'] .= $V1ciechb1uvs . $V1ciechb1uvss;
                        $Veq4e0qpy03m = 'tag name';
                    }
                break;

                case 'before attribute name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    
                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before attribute name';

                    } elseif($V1ciechb1uvs === '/') {
                        
                        $Veq4e0qpy03m = 'self-closing start tag';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $this->token['attr'][] = array(
                            'name'  => strtolower($V1ciechb1uvs),
                            'value' => ''
                        );

                        $Veq4e0qpy03m = 'attribute name';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-attribute-name-but-got-eof'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        if($V1ciechb1uvs === '"' || $V1ciechb1uvs === "'" || $V1ciechb1uvs === '<' || $V1ciechb1uvs === '=') {
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'invalid-character-in-attribute-name'
                            ));
                        }

                        
                        $this->token['attr'][] = array(
                            'name'  => $V1ciechb1uvs,
                            'value' => ''
                        );

                        $Veq4e0qpy03m = 'attribute name';
                    }
                break;

                case 'attribute name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    
                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'after attribute name';

                    } elseif($V1ciechb1uvs === '/') {
                        
                        $Veq4e0qpy03m = 'self-closing start tag';

                    } elseif($V1ciechb1uvs === '=') {
                        
                        $Veq4e0qpy03m = 'before attribute value';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $V1ciechb1uvss = $this->stream->charsWhile(self::UPPER_ALPHA);

                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['name'] .= strtolower($V1ciechb1uvs . $V1ciechb1uvss);

                        $Veq4e0qpy03m = 'attribute name';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-attribute-name'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        if($V1ciechb1uvs === '"' || $V1ciechb1uvs === "'" || $V1ciechb1uvs === '<') {
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'invalid-character-in-attribute-name'
                            ));
                        }

                        
                        $V1ciechb1uvss = $this->stream->charsUntil("\t\n\x0C /=>\"'" . self::UPPER_ALPHA);

                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['name'] .= $V1ciechb1uvs . $V1ciechb1uvss;

                        $Veq4e0qpy03m = 'attribute name';
                    }

                    
                    
                break;

                case 'after attribute name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    
                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'after attribute name';

                    } elseif($V1ciechb1uvs === '/') {
                        
                        $Veq4e0qpy03m = 'self-closing start tag';

                    } elseif($V1ciechb1uvs === '=') {
                        
                        $Veq4e0qpy03m = 'before attribute value';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $this->token['attr'][] = array(
                            'name'  => strtolower($V1ciechb1uvs),
                            'value' => ''
                        );

                        $Veq4e0qpy03m = 'attribute name';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-end-of-tag-but-got-eof'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        if($V1ciechb1uvs === '"' || $V1ciechb1uvs === "'" || $V1ciechb1uvs === "<") {
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'invalid-character-after-attribute-name'
                            ));
                        }

                        
                        $this->token['attr'][] = array(
                            'name'  => $V1ciechb1uvs,
                            'value' => ''
                        );

                        $Veq4e0qpy03m = 'attribute name';
                    }
                break;

                case 'before attribute value':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    
                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before attribute value';

                    } elseif($V1ciechb1uvs === '"') {
                        
                        $Veq4e0qpy03m = 'attribute value (double-quoted)';

                    } elseif($V1ciechb1uvs === '&') {
                        
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'attribute value (unquoted)';

                    } elseif($V1ciechb1uvs === '\'') {
                        
                        $Veq4e0qpy03m = 'attribute value (single-quoted)';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-attribute-value-but-got-right-bracket'
                        ));
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-attribute-value-but-got-eof'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        if($V1ciechb1uvs === '=' || $V1ciechb1uvs === '<') {
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'equals-in-unquoted-attribute-value'
                            ));
                        }

                        
                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['value'] .= $V1ciechb1uvs;

                        $Veq4e0qpy03m = 'attribute value (unquoted)';
                    }
                break;

                case 'attribute value (double-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === '"') {
                        
                        $Veq4e0qpy03m = 'after attribute value (quoted)';

                    } elseif($V1ciechb1uvs === '&') {
                        
                        $this->characterReferenceInAttributeValue('"');

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-attribute-value-double-quote'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $V1ciechb1uvss = $this->stream->charsUntil('"&');

                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['value'] .= $V1ciechb1uvs . $V1ciechb1uvss;

                        $Veq4e0qpy03m = 'attribute value (double-quoted)';
                    }
                break;

                case 'attribute value (single-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "'") {
                        
                        $Veq4e0qpy03m = 'after attribute value (quoted)';

                    } elseif($V1ciechb1uvs === '&') {
                        
                        $this->characterReferenceInAttributeValue("'");

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-attribute-value-single-quote'
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $V1ciechb1uvss = $this->stream->charsUntil("'&");

                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['value'] .= $V1ciechb1uvs . $V1ciechb1uvss;

                        $Veq4e0qpy03m = 'attribute value (single-quoted)';
                    }
                break;

                case 'attribute value (unquoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before attribute name';

                    } elseif($V1ciechb1uvs === '&') {
                        
                        $this->characterReferenceInAttributeValue('>');

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-attribute-value-no-quotes'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        if($V1ciechb1uvs === '"' || $V1ciechb1uvs === "'" || $V1ciechb1uvs === '=' || $V1ciechb1uvs == '<') {
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'unexpected-character-in-unquoted-attribute-value'
                            ));
                        }

                        
                        $V1ciechb1uvss = $this->stream->charsUntil("\t\n\x0c &>\"'=");

                        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
                        $this->token['attr'][$V3ze22vtj2t0]['value'] .= $V1ciechb1uvs . $V1ciechb1uvss;

                        $Veq4e0qpy03m = 'attribute value (unquoted)';
                    }
                break;

                case 'after attribute value (quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before attribute name';

                    } elseif ($V1ciechb1uvs === '/') {
                        
                        $Veq4e0qpy03m = 'self-closing start tag';

                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-EOF-after-attribute-value'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-character-after-attribute-value'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'before attribute name';
                    }
                break;

                case 'self-closing start tag':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === '>') {
                        
                        
                        $this->token['self-closing'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-eof-after-self-closing'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-character-after-self-closing'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'before attribute name';
                    }
                break;

                case 'bogus comment':
                    
                    
                    $this->token['data'] .= (string) $this->stream->charsUntil('>');
                    $this->stream->char();

                    $this->emitToken($this->token);

                    
                    $Veq4e0qpy03m = 'data';
                break;

                case 'markup declaration open':
                    
                    $V4333gr4e1oi = $this->stream->charsWhile('-', 2);
                    if ($V4333gr4e1oi === '-') {
                        $this->stream->unget();
                    }
                    if ($V4333gr4e1oi !== '--') {
                        $Vooexq0bqp2f = $this->stream->charsWhile(self::ALPHA, 7);
                    }

                    
                    if($V4333gr4e1oi === '--') {
                        $Veq4e0qpy03m = 'comment start';
                        $this->token = array(
                            'data' => '',
                            'type' => self::COMMENT
                        );

                    
                    } elseif(strtoupper($Vooexq0bqp2f) === 'DOCTYPE') {
                        $Veq4e0qpy03m = 'DOCTYPE';

                    
                    

                    
                    } else {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-dashes-or-doctype'
                        ));
                        $this->token = array(
                            'data' => (string) $Vooexq0bqp2f,
                            'type' => self::COMMENT
                        );
                        $Veq4e0qpy03m = 'bogus comment';
                    }
                break;

                case 'comment start':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === '-') {
                        
                        $Veq4e0qpy03m = 'comment start dash';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'incorrect-comment'
                        ));
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->token['data'] .= $V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'comment start dash':
                    
                    $V1ciechb1uvs = $this->stream->char();
                    if ($V1ciechb1uvs === '-') {
                        
                        $Veq4e0qpy03m = 'comment end';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'incorrect-comment'
                        ));
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        $this->token['data'] .= '-' . $V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'comment':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === '-') {
                        
                        $Veq4e0qpy03m = 'comment end dash';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $V1ciechb1uvss = $this->stream->charsUntil('-');

                        $this->token['data'] .= $V1ciechb1uvs . $V1ciechb1uvss;
                    }
                break;

                case 'comment end dash':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === '-') {
                        
                        $Veq4e0qpy03m = 'comment end';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment-end-dash'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->token['data'] .= '-'.$V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'comment end':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif($V1ciechb1uvs === '-') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-dash-after-double-dash-in-comment'
                        ));
                        $this->token['data'] .= '-';

                    } elseif($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0a" || $V1ciechb1uvs === ' ') {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-space-after-double-dash-in-comment'
                        ));
                        $this->token['data'] .= '--' . $V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment end space';

                    } elseif($V1ciechb1uvs === '!') {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-bang-after-double-dash-in-comment'
                        ));
                        $Veq4e0qpy03m = 'comment end bang';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment-double-dash'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-comment'
                        ));
                        $this->token['data'] .= '--'.$V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'comment end bang':
                    $V1ciechb1uvs = $this->stream->char();
                    if ($V1ciechb1uvs === '>') {
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === "-") {
                        $this->token['data'] .= '--!';
                        $Veq4e0qpy03m = 'comment end dash';
                    } elseif ($V1ciechb1uvs === false) {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-comment-end-bang'
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        $this->token['data'] .= '--!' . $V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'comment end space':
                    $V1ciechb1uvs = $this->stream->char();
                    if ($V1ciechb1uvs === '>') {
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === '-') {
                        $Veq4e0qpy03m = 'comment end dash';
                    } elseif ($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        $this->token['data'] .= $V1ciechb1uvs;
                    } elseif ($V1ciechb1uvs === false) {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-eof-in-comment-end-space',
                        ));
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        $this->token['data'] .= $V1ciechb1uvs;
                        $Veq4e0qpy03m = 'comment';
                    }
                break;

                case 'DOCTYPE':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'before DOCTYPE name';
                    
                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'need-space-after-doctype-but-got-eof'
                        ));
                        $this->emitToken(array(
                            'name' => '',
                            'type' => self::DOCTYPE,
                            'force-quirks' => true,
                            'error' => true
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'need-space-after-doctype'
                        ));
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'before DOCTYPE name';
                    }
                break;

                case 'before DOCTYPE name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-doctype-name-but-got-right-bracket'
                        ));
                        $this->emitToken(array(
                            'name' => '',
                            'type' => self::DOCTYPE,
                            'force-quirks' => true,
                            'error' => true
                        ));

                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $this->token = array(
                            'name' => strtolower($V1ciechb1uvs),
                            'type' => self::DOCTYPE,
                            'error' => true
                        );

                        $Veq4e0qpy03m = 'DOCTYPE name';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'expected-doctype-name-but-got-eof'
                        ));
                        $this->emitToken(array(
                            'name' => '',
                            'type' => self::DOCTYPE,
                            'force-quirks' => true,
                            'error' => true
                        ));

                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->token = array(
                            'name' => $V1ciechb1uvs,
                            'type' => self::DOCTYPE,
                            'error' => true
                        );

                        $Veq4e0qpy03m = 'DOCTYPE name';
                    }
                break;

                case 'DOCTYPE name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                        $Veq4e0qpy03m = 'after DOCTYPE name';

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif('A' <= $V1ciechb1uvs && $V1ciechb1uvs <= 'Z') {
                        
                        $this->token['name'] .= strtolower($V1ciechb1uvs);

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype-name'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                        $this->token['name'] .= $V1ciechb1uvs;
                    }

                    
                    
                    
                    $this->token['error'] = ($this->token['name'] === 'HTML')
                        ? false
                        : true;
                break;

                case 'after DOCTYPE name':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        

                    } elseif($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        

                        $Vlvgt0i3dpte = strtoupper($V1ciechb1uvs . $this->stream->charsWhile(self::ALPHA, 5));
                        if ($Vlvgt0i3dpte === 'PUBLIC') {
                            
                            $Veq4e0qpy03m = 'before DOCTYPE public identifier';

                        } elseif ($Vlvgt0i3dpte === 'SYSTEM') {
                            
                            $Veq4e0qpy03m = 'before DOCTYPE system identifier';

                        } else {
                            
                            $this->emitToken(array(
                                'type' => self::PARSEERROR,
                                'data' => 'expected-space-or-right-bracket-in-doctype'
                            ));
                            $this->token['force-quirks'] = true;
                            $this->token['error'] = true;
                            $Veq4e0qpy03m = 'bogus DOCTYPE';
                        }
                    }
                break;

                case 'before DOCTYPE public identifier':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                    } elseif ($V1ciechb1uvs === '"') {
                        
                        $this->token['public'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE public identifier (double-quoted)';
                    } elseif ($V1ciechb1uvs === "'") {
                        
                        $this->token['public'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE public identifier (single-quoted)';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-end-of-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $Veq4e0qpy03m = 'bogus DOCTYPE';
                    }
                break;

                case 'DOCTYPE public identifier (double-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === '"') {
                        
                        $Veq4e0qpy03m = 'after DOCTYPE public identifier';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-end-of-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->token['public'] .= $V1ciechb1uvs;
                    }
                break;

                case 'DOCTYPE public identifier (single-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === "'") {
                        
                        $Veq4e0qpy03m = 'after DOCTYPE public identifier';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-end-of-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->token['public'] .= $V1ciechb1uvs;
                    }
                break;

                case 'after DOCTYPE public identifier':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                    } elseif ($V1ciechb1uvs === '"') {
                        
                        $this->token['system'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE system identifier (double-quoted)';
                    } elseif ($V1ciechb1uvs === "'") {
                        
                        $this->token['system'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE system identifier (single-quoted)';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $Veq4e0qpy03m = 'bogus DOCTYPE';
                    }
                break;

                case 'before DOCTYPE system identifier':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                    } elseif ($V1ciechb1uvs === '"') {
                        
                        $this->token['system'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE system identifier (double-quoted)';
                    } elseif ($V1ciechb1uvs === "'") {
                        
                        $this->token['system'] = '';
                        $Veq4e0qpy03m = 'DOCTYPE system identifier (single-quoted)';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $Veq4e0qpy03m = 'bogus DOCTYPE';
                    }
                break;

                case 'DOCTYPE system identifier (double-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === '"') {
                        
                        $Veq4e0qpy03m = 'after DOCTYPE system identifier';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-end-of-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->token['system'] .= $V1ciechb1uvs;
                    }
                break;

                case 'DOCTYPE system identifier (single-quoted)':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === "'") {
                        
                        $Veq4e0qpy03m = 'after DOCTYPE system identifier';
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-end-of-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->token['system'] .= $V1ciechb1uvs;
                    }
                break;

                case 'after DOCTYPE system identifier':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if($V1ciechb1uvs === "\t" || $V1ciechb1uvs === "\n" || $V1ciechb1uvs === "\x0c" || $V1ciechb1uvs === ' ') {
                        
                    } elseif ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';
                    } elseif ($V1ciechb1uvs === false) {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'eof-in-doctype'
                        ));
                        $this->token['force-quirks'] = true;
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';
                    } else {
                        
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'unexpected-char-in-doctype'
                        ));
                        $Veq4e0qpy03m = 'bogus DOCTYPE';
                    }
                break;

                case 'bogus DOCTYPE':
                    
                    $V1ciechb1uvs = $this->stream->char();

                    if ($V1ciechb1uvs === '>') {
                        
                        $this->emitToken($this->token);
                        $Veq4e0qpy03m = 'data';

                    } elseif($V1ciechb1uvs === false) {
                        
                        $this->emitToken($this->token);
                        $this->stream->unget();
                        $Veq4e0qpy03m = 'data';

                    } else {
                        
                    }
                break;

                

            }
        }
    }

    
    public function save() {
        return $this->tree->save();
    }
		
		
		public function getTree() {
			return $this->tree;
		}

    
    public function stream() {
        return $this->stream;
    }

    private function consumeCharacterReference($Vcxacx03cffe = false, $Vx3qhwgjlyl2 = false) {
        
        
        

        
        $V1ciechb1uvss = $this->stream->char();

        

        if (
            $V1ciechb1uvss[0] === "\x09" ||
            $V1ciechb1uvss[0] === "\x0A" ||
            $V1ciechb1uvss[0] === "\x0C" ||
            $V1ciechb1uvss[0] === "\x20" ||
            $V1ciechb1uvss[0] === '<' ||
            $V1ciechb1uvss[0] === '&' ||
            $V1ciechb1uvss === false ||
            $V1ciechb1uvss[0] === $Vcxacx03cffe
        ) {
            
            
            $this->stream->unget();
            return '&';
        } elseif ($V1ciechb1uvss[0] === '#') {
            
            
            
            $V1ciechb1uvss .= $this->stream->char();
            if (isset($V1ciechb1uvss[1]) && ($V1ciechb1uvss[1] === 'x' || $V1ciechb1uvss[1] === 'X')) {
                
                
                
                
                $V1ciechb1uvs_class = self::HEX;
                
                $V0o3f1vps5ku = true;
            } else {
                
                
                $V1ciechb1uvss = $V1ciechb1uvss[0];
                $this->stream->unget();
                
                $V1ciechb1uvs_class = self::DIGIT;
                
                $V0o3f1vps5ku = false;
            }

            
            $Vievtmtgo0ue = $this->stream->charsWhile($V1ciechb1uvs_class);
            if ($Vievtmtgo0ue === '' || $Vievtmtgo0ue === false) {
                
                $this->emitToken(array(
                    'type' => self::PARSEERROR,
                    'data' => 'expected-numeric-entity'
                ));
                return '&' . $V1ciechb1uvss;
            } else {
                
                if ($this->stream->char() !== ';') {
                    $this->stream->unget();
                    $this->emitToken(array(
                        'type' => self::PARSEERROR,
                        'data' => 'numeric-entity-without-semicolon'
                    ));
                }

                
                $Voprdqhqpk54 = $V0o3f1vps5ku ? hexdec($Vievtmtgo0ue) : (int) $Vievtmtgo0ue;

                
                $Vyytpbh3cdch = HTML5_Data::getRealCodepoint($Voprdqhqpk54);
                if ($Vyytpbh3cdch) {
                    $this->emitToken(array(
                        'type' => self::PARSEERROR,
                        'data' => 'illegal-windows-1252-entity'
                    ));
                    return HTML5_Data::utf8chr($Vyytpbh3cdch);
                } else {
                    
                    if ($Voprdqhqpk54 > 0x10FFFF) {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'overlong-character-entity' 
                        ));
                        return "\xEF\xBF\xBD";
                    }
                    
                    
                    if (
                        $Voprdqhqpk54 >= 0x0000 && $Voprdqhqpk54 <= 0x0008 ||
                        $Voprdqhqpk54 === 0x000B ||
                        $Voprdqhqpk54 >= 0x000E && $Voprdqhqpk54 <= 0x001F ||
                        $Voprdqhqpk54 >= 0x007F && $Voprdqhqpk54 <= 0x009F ||
                        $Voprdqhqpk54 >= 0xD800 && $Voprdqhqpk54 <= 0xDFFF ||
                        $Voprdqhqpk54 >= 0xFDD0 && $Voprdqhqpk54 <= 0xFDEF ||
                        ($Voprdqhqpk54 & 0xFFFE) === 0xFFFE ||
                        $Voprdqhqpk54 == 0x10FFFF || $Voprdqhqpk54 == 0x10FFFE
                    ) {
                        $this->emitToken(array(
                            'type' => self::PARSEERROR,
                            'data' => 'illegal-codepoint-for-numeric-entity'
                        ));
                    }
                    return HTML5_Data::utf8chr($Voprdqhqpk54);
                }
            }

        } else {
            

            
            
            

            $Vszw2mryrrkx = HTML5_Data::getNamedCharacterReferences();
            
            
            
            
            $Voprdqhqpk54 = false;
            $V1ciechb1uvs = $V1ciechb1uvss;
            while ($V1ciechb1uvs !== false && isset($Vszw2mryrrkx[$V1ciechb1uvs])) {
                $Vszw2mryrrkx = $Vszw2mryrrkx[$V1ciechb1uvs];
                if (isset($Vszw2mryrrkx['codepoint'])) {
                    $Vwfsll4zanwn = $V1ciechb1uvss;
                    $Voprdqhqpk54 = $Vszw2mryrrkx['codepoint'];
                }
                $V1ciechb1uvss .= $V1ciechb1uvs = $this->stream->char();
            }
            
            
            
            
            
            $this->stream->unget();
            if ($V1ciechb1uvs !== false) {
                $V1ciechb1uvss = substr($V1ciechb1uvss, 0, -1);
            }

            
            if (!$Voprdqhqpk54) {
                $this->emitToken(array(
                    'type' => self::PARSEERROR,
                    'data' => 'expected-named-entity'
                ));
                return '&' . $V1ciechb1uvss;
            }

            
            $Vhfoqzvbnzho = true;
            if (substr($Vwfsll4zanwn, -1) !== ';') {
                $this->emitToken(array(
                    'type' => self::PARSEERROR,
                    'data' => 'named-entity-without-semicolon'
                ));
                $Vhfoqzvbnzho = false;
            }

            
            if ($Vx3qhwgjlyl2 && !$Vhfoqzvbnzho) {
                
                if (strlen($V1ciechb1uvss) > strlen($Vwfsll4zanwn)) {
                    $Vjg5z2pedl1b = substr($V1ciechb1uvss, strlen($Vwfsll4zanwn), 1);
                } else {
                    $Vjg5z2pedl1b = $this->stream->char();
                    $this->stream->unget();
                }
                if (
                    '0' <= $Vjg5z2pedl1b && $Vjg5z2pedl1b <= '9' ||
                    'A' <= $Vjg5z2pedl1b && $Vjg5z2pedl1b <= 'Z' ||
                    'a' <= $Vjg5z2pedl1b && $Vjg5z2pedl1b <= 'z'
                ) {
                    return '&' . $V1ciechb1uvss;
                }
            }

            
            return HTML5_Data::utf8chr($Voprdqhqpk54) . substr($V1ciechb1uvss, strlen($Vwfsll4zanwn));
        }
    }

    private function characterReferenceInAttributeValue($Vcxacx03cffe = false) {
        
        $Vjd3otikht3z = $this->consumeCharacterReference($Vcxacx03cffe, true);

        
        $V1ciechb1uvs = (!$Vjd3otikht3z)
            ? '&'
            : $Vjd3otikht3z;

        $V3ze22vtj2t0 = count($this->token['attr']) - 1;
        $this->token['attr'][$V3ze22vtj2t0]['value'] .= $V1ciechb1uvs;

        
    }

    
    protected function emitToken($Vmrycxs3rwag, $Vohavdyxooqf = true, $Vzp1zvkfeh1p = false) {
        if ($Vohavdyxooqf) {
            
            while ($this->stream->errors) {
                $this->emitToken(array_shift($this->stream->errors), false);
            }
        }
        if($Vmrycxs3rwag['type'] === self::ENDTAG && !empty($Vmrycxs3rwag['attr'])) {
            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < count($Vmrycxs3rwag['attr']); $Vfhiq1lhsoja++) {
                $this->emitToken(array(
                    'type' => self::PARSEERROR,
                    'data' => 'attributes-in-end-tag'
                ));
            }
        }
        if($Vmrycxs3rwag['type'] === self::ENDTAG && !empty($Vmrycxs3rwag['self-closing'])) {
            $this->emitToken(array(
                'type' => self::PARSEERROR,
                'data' => 'self-closing-flag-on-end-tag',
            ));
        }
        if($Vmrycxs3rwag['type'] === self::STARTTAG) {
            
            $Vpunajjs2mcs = array();
            foreach ($Vmrycxs3rwag['attr'] as $Vsieoicpivpa) {
                if (isset($Vpunajjs2mcs[$Vsieoicpivpa['name']])) {
                    $this->emitToken(array(
                        'type' => self::PARSEERROR,
                        'data' => 'duplicate-attribute',
                    ));
                } else {
                    $Vpunajjs2mcs[$Vsieoicpivpa['name']] = $Vsieoicpivpa['value'];
                }
            }
        }

        if(!$Vzp1zvkfeh1p) {
            
            $this->tree->emitToken($Vmrycxs3rwag);
        }

        if(!$Vzp1zvkfeh1p && is_int($this->tree->content_model)) {
            $this->content_model = $this->tree->content_model;
            $this->tree->content_model = null;

        } elseif($Vmrycxs3rwag['type'] === self::ENDTAG) {
            $this->content_model = self::PCDATA;
        }
    }
}

