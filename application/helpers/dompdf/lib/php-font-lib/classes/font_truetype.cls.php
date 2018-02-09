<?php


$Vgxxrah4zcfh = dirname(__FILE__);
require_once "$Vgxxrah4zcfh/font_binary_stream.cls.php";
require_once "$Vgxxrah4zcfh/font_truetype_table_directory_entry.cls.php";
require_once "$Vgxxrah4zcfh/font_truetype_header.cls.php";
require_once "$Vgxxrah4zcfh/font_table.cls.php";
require_once "$Vgxxrah4zcfh/adobe_font_metrics.cls.php";


class Font_TrueType extends Font_Binary_Stream {
  
  public $Vl5rjgb1nsf3 = array();
  
  private $Vrc2k35qljw1 = 0; 
  
  private static $V2xbsnapuozj = false;
  
  protected $Vgxxrah4zcfhectory = array();
  protected $Vou4vxorrdoe = array();
  
  protected $Vn45pe41jcx4 = array();
  protected $Vgcnluca2wj5 = array();
  public $Vcrgs3ldpwmg = array();
  
  static $Vxj0pa0dtl5j = array(
    0  => "Copyright",
    1  => "FontName",
    2  => "FontSubfamily",
    3  => "UniqueID",
    4  => "FullName",
    5  => "Version",
    6  => "PostScriptName",
    7  => "Trademark",
    8  => "Manufacturer",
    9  => "Designer",
    10 => "Description",
    11 => "FontVendorURL",
    12 => "FontDesignerURL",
    13 => "LicenseDescription",
    14 => "LicenseURL",
 
    16 => "PreferredFamily",
    17 => "PreferredSubfamily",
    18 => "CompatibleFullName",
    19 => "SampleText",
  );
  
  static $Vcoljswhscg4 = array(
    0 => "Unicode",
    1 => "Macintosh",
 
    3 => "Microsoft",
  );
  
  static $Viv2eu5svtif = array(
    
    0 => array(
      0 => "Default semantics",
      1 => "Version 1.1 semantics",
      2 => "ISO 10646 1993 semantics (deprecated)",
      3 => "Unicode 2.0 or later semantics",
    ),
    
    
    1 => array(
      0 => "Roman",
      1 => "Japanese",
      2 => "Traditional Chinese",
      3 => "Korean",
      4 => "Arabic",  
      5 => "Hebrew",  
      6 => "Greek", 
      7 => "Russian", 
      8 => "RSymbol", 
      9 => "Devanagari",  
      10 => "Gurmukhi",  
      11 => "Gujarati",  
      12 => "Oriya", 
      13 => "Bengali", 
      14 => "Tamil", 
      15 => "Telugu",
      16 => "Kannada",
      17 => "Malayalam",
      18 => "Sinhalese",
      19 => "Burmese",
      20 => "Khmer",
      21 => "Thai",
      22 => "Laotian",
      23 => "Georgian",
      24 => "Armenian",
      25 => "Simplified Chinese",
      26 => "Tibetan",
      27 => "Mongolian",
      28 => "Geez",
      29 => "Slavic",
      30 => "Vietnamese",
      31 => "Sindhi",
    ),
    
    
    3 => array(
      0 => "Symbol",
      1 => "Unicode BMP (UCS-2)",
      2 => "ShiftJIS",
      3 => "PRC",
      4 => "Big5",
      5 => "Wansung",
      6 => "Johab",
  
  
  
      10 => "Unicode UCS-4",
    ),
  );
  
  static $Vdhdjesmvosc = array(
    ".notdef", ".null", "CR",
    "space", "exclam", "quotedbl", "numbersign",
    "dollar", "percent", "ampersand", "quotesingle",
    "parenleft", "parenright", "asterisk", "plus",
    "comma", "hyphen", "period", "slash",
    "zero", "one", "two", "three",
    "four", "five", "six", "seven",
    "eight", "nine", "colon", "semicolon",
    "less", "equal", "greater", "question",
    "at", "A", "B", "C", "D", "E", "F", "G",
    "H", "I", "J", "K", "L", "M", "N", "O",
    "P", "Q", "R", "S", "T", "U", "V", "W",
    "X", "Y", "Z", "bracketleft",
    "backslash", "bracketright", "asciicircum", "underscore",
    "grave", "a", "b", "c", "d", "e", "f", "g",
    "h", "i", "j", "k", "l", "m", "n", "o",
    "p", "q", "r", "s", "t", "u", "v", "w",
    "x", "y", "z", "braceleft",
    "bar", "braceright", "asciitilde", "Adieresis",
    "Aring", "Ccedilla", "Eacute", "Ntilde",
    "Odieresis", "Udieresis", "aacute", "agrave",
    "acircumflex", "adieresis", "atilde", "aring",
    "ccedilla", "eacute", "egrave", "ecircumflex",
    "edieresis", "iacute", "igrave", "icircumflex",
    "idieresis", "ntilde", "oacute", "ograve",
    "ocircumflex", "odieresis", "otilde", "uacute",
    "ugrave", "ucircumflex", "udieresis", "dagger",
    "degree", "cent", "sterling", "section",
    "bullet", "paragraph", "germandbls", "registered",
    "copyright", "trademark", "acute", "dieresis",
    "notequal", "AE", "Oslash", "infinity",
    "plusminus", "lessequal", "greaterequal", "yen",
    "mu", "partialdiff", "summation", "product",
    "pi", "integral", "ordfeminine", "ordmasculine",
    "Omega", "ae", "oslash", "questiondown",
    "exclamdown", "logicalnot", "radical", "florin",
    "approxequal", "increment", "guillemotleft", "guillemotright",
    "ellipsis", "nbspace", "Agrave", "Atilde",
    "Otilde", "OE", "oe", "endash",
    "emdash", "quotedblleft", "quotedblright", "quoteleft",
    "quoteright", "divide", "lozenge", "ydieresis",
    "Ydieresis", "fraction", "currency", "guilsinglleft",
    "guilsinglright", "fi", "fl", "daggerdbl",
    "periodcentered", "quotesinglbase", "quotedblbase", "perthousand",
    "Acircumflex", "Ecircumflex", "Aacute", "Edieresis",
    "Egrave", "Iacute", "Icircumflex", "Idieresis",
    "Igrave", "Oacute", "Ocircumflex", "applelogo",
    "Ograve", "Uacute", "Ucircumflex", "Ugrave",
    "dotlessi", "circumflex", "tilde", "macron",
    "breve", "dotaccent", "ring", "cedilla",
    "hungarumlaut", "ogonek", "caron", "Lslash",
    "lslash", "Scaron", "scaron", "Zcaron",
    "zcaron", "brokenbar", "Eth", "eth",
    "Yacute", "yacute", "Thorn", "thorn",
    "minus", "multiply", "onesuperior", "twosuperior",
    "threesuperior", "onehalf", "onequarter", "threequarters",
    "franc", "Gbreve", "gbreve", "Idot",
    "Scedilla", "scedilla", "Cacute", "cacute",
    "Ccaron", "ccaron", "dmacron"
  );
  
  function getTable(){
    $this->parseTableEntries();
    return $this->directory;
  }
  
  function setTableOffset($Vortqlloirgz) {
    $this->tableOffset = $Vortqlloirgz;
  }
  
  function parse() {
    $this->parseTableEntries();
    
    $this->data = array();
    
    foreach($this->directory as $Vhiuc0dwei5b => $Vmqy2qrqt2lx) {
      if (empty($this->data[$Vhiuc0dwei5b])) {
        $this->readTable($Vhiuc0dwei5b);
      }
    }
  }
  
  function utf8toUnicode($Vyqctydehp2e) {
    $Vtojwsl3m1uw = strlen($Vyqctydehp2e);
    $Vvbltn01tphw = array();

    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtojwsl3m1uw; $Vfhiq1lhsoja++) {
      $Vlzjnwejphi4 = -1;
      $Vvlxmepre4ko = ord($Vyqctydehp2e[$Vfhiq1lhsoja]);
      
      if ( $Vvlxmepre4ko <= 0x7F ) {
        $Vlzjnwejphi4 = $Vvlxmepre4ko;
      }
      elseif ( $Vvlxmepre4ko >= 0xC2 ) {
        if ( ($Vvlxmepre4ko <= 0xDF) && ($Vfhiq1lhsoja < $Vtojwsl3m1uw -1) )
          $Vlzjnwejphi4 = ($Vvlxmepre4ko & 0x1F) << 6 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F);
        elseif ( ($Vvlxmepre4ko <= 0xEF) && ($Vfhiq1lhsoja < $Vtojwsl3m1uw -2) )
          $Vlzjnwejphi4 = ($Vvlxmepre4ko & 0x0F) << 12 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F) << 6 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F);
        elseif ( ($Vvlxmepre4ko <= 0xF4) && ($Vfhiq1lhsoja < $Vtojwsl3m1uw -3) )
          $Vlzjnwejphi4 = ($Vvlxmepre4ko & 0x0F) << 18 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F) << 12 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F) << 6 | (ord($Vyqctydehp2e[++$Vfhiq1lhsoja]) & 0x3F);
      }
      
      if ($Vlzjnwejphi4 >= 0) {
        $Vvbltn01tphw[] = $Vlzjnwejphi4;
      }
    }
    
    return $Vvbltn01tphw;
  }
  
  function lookupGlyph($Vwn52b3jaf14, &$Vwn52b3jaf14s, &$Vl2w0c3vy4mm, $Vxkw5rwlmpl5, $Vfhiq1lhsojandexToLoc, $Vwn52b3jaf14ToCid) {
    $this->seek($Vxkw5rwlmpl5 + $Vfhiq1lhsojandexToLoc[$Vwn52b3jaf14]);
    
    $Vhg1h0pte0fx = $this->readInt16();
    
    if ($Vhg1h0pte0fx < 0) {
      $this->skip(8);
      $Vedftqxgwfum = 10; 
      
      do {
        $Veyvxwy10drd      = $this->readUInt16();
        $Vedftqxgwfum += 2;
        
        $Vtl23anhufea = $this->readUInt16();
        $Vl2w0c3vy4mm[$Vedftqxgwfum] = $Vtl23anhufea;
        
        $Vedftqxgwfum += 2;
        
        if (!in_array($Vtl23anhufea, $Vwn52b3jaf14s) && isset($Vfhiq1lhsojandexToLoc[$Vtl23anhufea])) {
          $V0x4xt3l5phz = $Vwn52b3jaf14ToCid[$Vtl23anhufea];
          $Vwn52b3jaf14s[$V0x4xt3l5phz] = $Vtl23anhufea;
        }
        
        $Vv3hdohvn1hh = $this->pos();
        $this->lookupGlyph($Vtl23anhufea, $Vwn52b3jaf14s, $Vcvl45l0qyrb, $Vxkw5rwlmpl5, $Vfhiq1lhsojandexToLoc, $Vwn52b3jaf14ToCid);
        $this->seek($Vv3hdohvn1hh);
        
        $Vortqlloirgz = 0;
        
        
        if ($Veyvxwy10drd & Font_Table_glyf::ARG_1_AND_2_ARE_WORDS) {
          $Vortqlloirgz += 4;
        }
        else {
          $Vortqlloirgz += 2;
        }
        
        if ($Veyvxwy10drd & Font_Table_glyf::WE_HAVE_A_SCALE) {
          $Vortqlloirgz += 2;
        }
        elseif ($Veyvxwy10drd & Font_Table_glyf::WE_HAVE_AN_X_AND_Y_SCALE) {
          $Vortqlloirgz += 4;
        }
        elseif ($Veyvxwy10drd & Font_Table_glyf::WE_HAVE_A_TWO_BY_TWO) {
          $Vortqlloirgz += 8;
        }
        
        $this->skip($Vortqlloirgz);
        $Vedftqxgwfum += $Vortqlloirgz;
        
      } while ($Veyvxwy10drd & Font_Table_glyf::MORE_COMPONENTS);
    }
  }
  
  function setSubset($Vr0sffgtekfz) {
    if ( !is_array($Vr0sffgtekfz) ) {
      $Vr0sffgtekfz = $this->utf8toUnicode($Vr0sffgtekfz);
    }
    
    $Vldxaapdjtvp = null;
    foreach($this->getData("cmap", "subtables") as $Vgrdnur1fyr5) {
      if ($Vgrdnur1fyr5["platformID"] == 0 || $Vgrdnur1fyr5["platformID"] == 3 && $Vgrdnur1fyr5["platformSpecificID"] == 1) {
        $Vldxaapdjtvp = $Vgrdnur1fyr5;
        break;
      }
    }
    
    if (!$Vldxaapdjtvp) return;
    
    $Vwn52b3jaf14s = array();
    foreach($Vr0sffgtekfz as $V0x4xt3l5phz) {
      if (!isset($Vldxaapdjtvp["glyphIndexArray"][$V0x4xt3l5phz])) {
        continue;
      }
      
      $Vwn52b3jaf14s[$V0x4xt3l5phz] = $Vldxaapdjtvp["glyphIndexArray"][$V0x4xt3l5phz];
    }
    
    
    $Vfhiq1lhsojandexToLoc = $this->getData("loca");
    $Vxkw5rwlmpl5 = $this->directory["glyf"]->offset;
    $V3lldzly344u   = $Vldxaapdjtvp["glyphIndexArray"];
    $Vwn52b3jaf14ToCid   = array_flip($V3lldzly344u);
    $Vl2w0c3vy4mm = array();
    
    foreach($Vwn52b3jaf14s as $V0x4xt3l5phz => $Vwn52b3jaf14) {
      if ($Vwn52b3jaf14 === null) {
        unset($Vwn52b3jaf14s[$V0x4xt3l5phz]);
        continue;
      }
      
      $Vq5adqgitjt1 = array();
      $this->lookupGlyph($Vwn52b3jaf14, $Vwn52b3jaf14s, $Vq5adqgitjt1, $Vxkw5rwlmpl5, $Vfhiq1lhsojandexToLoc, $Vwn52b3jaf14ToCid);
      
      if (count($Vq5adqgitjt1)) {
        $Vl2w0c3vy4mm[$Vwn52b3jaf14] = $Vq5adqgitjt1;
      }
    }
    
    ksort($Vwn52b3jaf14s);
    
    foreach($Vl2w0c3vy4mm as $V2ulu53qm1bh => $Vedftqxgwfums) {
      foreach($Vedftqxgwfums as $Vortqlloirgz => $Vwn52b3jaf14) {
        $Vl2w0c3vy4mm[$V2ulu53qm1bh][$Vortqlloirgz] = array_search($Vwn52b3jaf14, array_values($Vwn52b3jaf14s));
      }
    }
    
    $this->compound_glyph_offsets = $Vl2w0c3vy4mm;
    $this->glyph_subset = $Vwn52b3jaf14s;
    $this->glyph_all = $Vldxaapdjtvp["glyphIndexArray"];
  }
  
  function getSubset() {
    if (empty($this->glyph_subset)) {
      return $this->glyph_all;
    }
    
    return $this->glyph_subset;
  }
  
  function encode($Vhiuc0dwei5bs = array()){
    if (!self::$V2xbsnapuozj) {
      $Vhiuc0dwei5bs = array_merge(array("head", "hhea", "cmap", "hmtx", "maxp", "glyf", "loca", "name", "post"), $Vhiuc0dwei5bs);
    }
    else {
      $Vhiuc0dwei5bs = array_keys($this->directory);
    }
    
    $Vuc3qualbvms = count($Vhiuc0dwei5bs);
    $Vmwwo1qnmepz = 16;
    
    Font::d("Tables : ".implode(", ", $Vhiuc0dwei5bs));
    
    $Vwhfukgf2org = array();
    foreach($Vhiuc0dwei5bs as $Vhiuc0dwei5b) {
      if (!isset($this->directory[$Vhiuc0dwei5b])) {
        Font::d("  >> '$Vhiuc0dwei5b' table doesn't exist");
        continue;
      }
      
      $Vwhfukgf2org[$Vhiuc0dwei5b] = $this->directory[$Vhiuc0dwei5b];
    }
    
    $this->header->data["numTables"] = $Vuc3qualbvms;
    $this->header->encode();
    
    $Vgxxrah4zcfhectory_offset = $this->pos();
    $Vortqlloirgz = $Vgxxrah4zcfhectory_offset + $Vuc3qualbvms * $Vmwwo1qnmepz;
    $this->seek($Vortqlloirgz);
    
    $Vfhiq1lhsoja = 0;
    foreach($Vwhfukgf2org as $Vhiuc0dwei5b => $V4o5wb5ucdu5) {
      $V4o5wb5ucdu5->encode($Vgxxrah4zcfhectory_offset + $Vfhiq1lhsoja * $Vmwwo1qnmepz);
      $Vfhiq1lhsoja++;
    }
  }
  
  function parseHeader(){
    if (!empty($this->header)) {
      return;
    }
    
    $this->seek($this->tableOffset);
    
    $this->header = new Font_TrueType_Header($this);
    $this->header->parse();
  }
  
  function parseTableEntries(){
    $this->parseHeader();
    
    if (!empty($this->directory)) {
      return;
    }
    
    $Vtwwmjiiu40i = get_class($this)."_Table_Directory_Entry";
    
    for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->header->data["numTables"]; $Vfhiq1lhsoja++) {
      $V4o5wb5ucdu5 = new $Vtwwmjiiu40i($this);
      $this->directory[$V4o5wb5ucdu5->tag] = $V4o5wb5ucdu5;
    }
  }
  
  function normalizeFUnit($Vp4xjtpabm0l, $V4j05uvad05v = 1000){
    return round($Vp4xjtpabm0l * ($V4j05uvad05v / $this->getData("head", "unitsPerEm")));
  }
  
  protected function readTable($Vhiuc0dwei5b) {
    $this->parseTableEntries();
    
    if (!self::$V2xbsnapuozj) {
      $Vmwwo1qnmepzame_canon = preg_replace("/[^a-z0-9]/", "", strtolower($Vhiuc0dwei5b));
      $Vtwwmjiiu40i_file = dirname(__FILE__)."/font_table_$Vmwwo1qnmepzame_canon.cls.php";
      
      if (!isset($this->directory[$Vhiuc0dwei5b]) || !file_exists($Vtwwmjiiu40i_file)) {
        return;
      }
      
      require_once $Vtwwmjiiu40i_file;
      $Vtwwmjiiu40i = "Font_Table_$Vmwwo1qnmepzame_canon";
    }
    else {
      $Vtwwmjiiu40i = "Font_Table";
    }
    
    $Vmqy2qrqt2lx = new $Vtwwmjiiu40i($this->directory[$Vhiuc0dwei5b]);
    $Vmqy2qrqt2lx->parse();
    
    $this->data[$Vhiuc0dwei5b] = $Vmqy2qrqt2lx;
  }
  
  public function getTableObject($Vmwwo1qnmepzame) {
    return $this->data[$Vmwwo1qnmepzame];
  }
  
  public function getData($Vmwwo1qnmepzame, $Vseq1edikdvg = null) {
    $this->parseTableEntries();
    
    if (empty($this->data[$Vmwwo1qnmepzame])) {
      $this->readTable($Vmwwo1qnmepzame);
    }
    
    if (!isset($this->data[$Vmwwo1qnmepzame])) {
      return null;
    }
    
    if (!$Vseq1edikdvg) {
      return $this->data[$Vmwwo1qnmepzame]->data;
    }
    else {
      return $this->data[$Vmwwo1qnmepzame]->data[$Vseq1edikdvg];
    }
  }
  
  function saveAdobeFontMetrics($Vg5mhfl1beoi, $V5mmmrje2ymm = null) {
    $Vithgy1qpssf = new Adobe_Font_Metrics($this);
    $Vithgy1qpssf->write($Vg5mhfl1beoi, $V5mmmrje2ymm);
  }
  
  function reduce(){
    $Vmwwo1qnmepzames_to_keep = array(0, 1, 2, 3, 4, 5, 6);
    foreach($this->data["name"]->data["records"] as $Vfhiq1lhsojad => $Vip5ofplsacg) {
      if (in_array($Vfhiq1lhsojad, $Vmwwo1qnmepzames_to_keep)) continue;
      unset($this->data["name"]->data["records"][$Vfhiq1lhsojad]);
    }
  }
}
