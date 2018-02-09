<?php


if ( !defined('PHP_VERSION_ID') ) {
  $Vh51i5i4ai0v = explode('.', PHP_VERSION);
  define('PHP_VERSION_ID', ($Vh51i5i4ai0v[0] * 10000 + $Vh51i5i4ai0v[1] * 100 + $Vh51i5i4ai0v[2]));
}

function def($Vcvluzjs3wzb, $Vp4xjtpabm0l = true) {
  if (!defined($Vcvluzjs3wzb)) {
    define($Vcvluzjs3wzb, $Vp4xjtpabm0l);
  }
}

if ( !function_exists("pre_r") ) {

function pre_r($Vqzaxc50a1xx, $Vzkx1jexxiod = false) {
  if ($Vzkx1jexxiod)
    return "<pre>" . print_r($Vqzaxc50a1xx, true) . "</pre>";

  if ( php_sapi_name() !== "cli")
    echo ("<pre>");
  print_r($Vqzaxc50a1xx);

  if ( php_sapi_name() !== "cli")
    echo("</pre>");
  else
    echo ("\n");
  flush();

}
}

if ( !function_exists("pre_var_dump") ) {

function pre_var_dump($Vqzaxc50a1xx) {
  if ( php_sapi_name() !== "cli")
    echo("<pre>");
    
  var_dump($Vqzaxc50a1xx);
  
  if ( php_sapi_name() !== "cli")
    echo("</pre>");
}
}

if ( !function_exists("d") ) {

function d($Vqzaxc50a1xx) {
  if ( php_sapi_name() !== "cli")
    echo("<pre>");
    
  
  if ($Vqzaxc50a1xx instanceof Line_Box) {
    echo $Vqzaxc50a1xx;
  }
  
  
  else {
    var_export($Vqzaxc50a1xx);
  }
  
  if ( php_sapi_name() !== "cli")
    echo("</pre>");
}
}


function build_url($Vcrro0d0ikna, $Vy4zba2jo55u, $Viwuq3qqv5zq, $Vbfatyoohaps) {
  if ( strlen($Vbfatyoohaps) == 0 ) {
    
    return $Vcrro0d0ikna . $Vy4zba2jo55u . $Viwuq3qqv5zq;
  }

  
  if ( mb_strpos($Vbfatyoohaps, "://") !== false || mb_strpos($Vbfatyoohaps, "data:") === 0 )
    return $Vbfatyoohaps;

  $Vc0brddnw0vm = $Vcrro0d0ikna;

  if (!in_array(mb_strtolower($Vcrro0d0ikna), array("http://", "https://", "ftp://", "ftps://"))) {
    
    
    
    
    if ($Vbfatyoohaps[0] !== '/' && (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' || ($Vbfatyoohaps[0] !== '\\' && $Vbfatyoohaps[1] !== ':'))) {
      
      $Vc0brddnw0vm .= realpath($Viwuq3qqv5zq).'/';
    }
    $Vc0brddnw0vm .= $Vbfatyoohaps;
    $Vc0brddnw0vm = preg_replace("/\?(.*)$/", "", $Vc0brddnw0vm);
    return $Vc0brddnw0vm;
  }

  
  if ( $Vbfatyoohaps[0] === '/' || $Vbfatyoohaps[0] === '\\' ) {
    
    $Vc0brddnw0vm .= $Vy4zba2jo55u . $Vbfatyoohaps;
  } else {
    
    
    $Vc0brddnw0vm .= $Vy4zba2jo55u . $Viwuq3qqv5zq . $Vbfatyoohaps;
  }

  return $Vc0brddnw0vm;

}


function explode_url($Vbfatyoohaps) {
  $Vcrro0d0ikna = "";
  $Vy4zba2jo55u = "";
  $V3wwyy5a12nc = "";
  $Vg5mhfl1beoi = "";

  $Vd5mgesqkq2x = parse_url($Vbfatyoohaps);

  if ( isset($Vd5mgesqkq2x["scheme"]) &&
       $Vd5mgesqkq2x["scheme"] !== "file" &&
       strlen($Vd5mgesqkq2x["scheme"]) > 1 ) 
    {
    $Vcrro0d0ikna = $Vd5mgesqkq2x["scheme"] . "://";

    if ( isset($Vd5mgesqkq2x["user"]) ) {
      $Vy4zba2jo55u .= $Vd5mgesqkq2x["user"];

      if ( isset($Vd5mgesqkq2x["pass"]) )
        $Vy4zba2jo55u .= "@" . $Vd5mgesqkq2x["pass"];

      $Vy4zba2jo55u .= ":";
    }

    if ( isset($Vd5mgesqkq2x["host"]) )
      $Vy4zba2jo55u .= $Vd5mgesqkq2x["host"];

    if ( isset($Vd5mgesqkq2x["port"]) )
      $Vy4zba2jo55u .= ":" . $Vd5mgesqkq2x["port"];

    if ( isset($Vd5mgesqkq2x["path"]) && $Vd5mgesqkq2x["path"] !== "" ) {
      
      if ( $Vd5mgesqkq2x["path"][ mb_strlen($Vd5mgesqkq2x["path"]) - 1 ] === "/" ) {
        $V3wwyy5a12nc = $Vd5mgesqkq2x["path"];
        $Vg5mhfl1beoi = "";
      } else {
        $V3wwyy5a12nc = rtrim(dirname($Vd5mgesqkq2x["path"]), '/\\') . "/";
        $Vg5mhfl1beoi = basename($Vd5mgesqkq2x["path"]);
      }
    }

    if ( isset($Vd5mgesqkq2x["query"]) )
      $Vg5mhfl1beoi .= "?" . $Vd5mgesqkq2x["query"];

    if ( isset($Vd5mgesqkq2x["fragment"]) )
      $Vg5mhfl1beoi .= "#" . $Vd5mgesqkq2x["fragment"];

  } else {

    $Vfhiq1lhsoja = mb_strpos($Vbfatyoohaps, "file://");
    if ( $Vfhiq1lhsoja !== false)
      $Vbfatyoohaps = mb_substr($Vbfatyoohaps, $Vfhiq1lhsoja + 7);

    $Vcrro0d0ikna = ""; 
                    

    $Vy4zba2jo55u = ""; 
    $Vg5mhfl1beoi = basename($Vbfatyoohaps);

    $V3wwyy5a12nc = dirname($Vbfatyoohaps);

    
    if ( $V3wwyy5a12nc !== false ) {
      $V3wwyy5a12nc .= '/';

    } else {
      
      $Vcrro0d0ikna = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

      $Vy4zba2jo55u = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : php_uname("n");

      if ( substr($Vd5mgesqkq2x["path"], 0, 1) === '/' ) {
        $V3wwyy5a12nc = dirname($Vd5mgesqkq2x["path"]);
      } else {
        $V3wwyy5a12nc = '/' . rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/') . '/' . $Vd5mgesqkq2x["path"];
      }
    }
  }

  $Vc0brddnw0vm = array($Vcrro0d0ikna, $Vy4zba2jo55u, $V3wwyy5a12nc, $Vg5mhfl1beoi,
               "protocol" => $Vcrro0d0ikna,
               "host" => $Vy4zba2jo55u,
               "path" => $V3wwyy5a12nc,
               "file" => $Vg5mhfl1beoi);
  return $Vc0brddnw0vm;
}


function dec2roman($Vcgbfu1dtv3l) {

  static $Vupfmth4rjnx = array("", "i", "ii", "iii", "iv", "v",
                       "vi", "vii", "viii", "ix");
  static $Vai2yu3mzwql = array("", "x", "xx", "xxx", "xl", "l",
                       "lx", "lxx", "lxxx", "xc");
  static $V4r1nqvncqdp = array("", "c", "cc", "ccc", "cd", "d",
                       "dc", "dcc", "dccc", "cm");
  static $Vxdtnn4y4ega = array("", "m", "mm", "mmm");

  if ( !is_numeric($Vcgbfu1dtv3l) )
    throw new DOMPDF_Exception("dec2roman() requires a numeric argument.");

  if ( $Vcgbfu1dtv3l > 4000 || $Vcgbfu1dtv3l < 0 )
    return "(out of range)";

  $Vcgbfu1dtv3l = strrev((string)$Vcgbfu1dtv3l);

  $Vc0brddnw0vm = "";
  switch (mb_strlen($Vcgbfu1dtv3l)) {
    case 4: $Vc0brddnw0vm .= $Vxdtnn4y4ega[$Vcgbfu1dtv3l[3]];
    case 3: $Vc0brddnw0vm .= $V4r1nqvncqdp[$Vcgbfu1dtv3l[2]];
    case 2: $Vc0brddnw0vm .= $Vai2yu3mzwql[$Vcgbfu1dtv3l[1]];
    case 1: $Vc0brddnw0vm .= $Vupfmth4rjnx[$Vcgbfu1dtv3l[0]];
    default: break;
  }
  return $Vc0brddnw0vm;

}


function is_percent($Vp4xjtpabm0l) { return false !== mb_strpos($Vp4xjtpabm0l, "%"); }


function parse_data_uri($V21v5odo3bqr) {
  if (!preg_match('/^data:(?P<mime>[a-z0-9\/+-.]+)(;charset=(?P<charset>[a-z0-9-])+)?(?P<base64>;base64)?\,(?P<data>.*)?/i', $V21v5odo3bqr, $Vkvvdnwtmjnq)) {
    return false;
  }
  
  $Vkvvdnwtmjnq['data'] = rawurldecode($Vkvvdnwtmjnq['data']);
  $Vwbpa3giaw5f = array(
    'charset' => $Vkvvdnwtmjnq['charset'] ? $Vkvvdnwtmjnq['charset'] : 'US-ASCII',
    'mime'    => $Vkvvdnwtmjnq['mime'] ? $Vkvvdnwtmjnq['mime'] : 'text/plain',
    'data'    => $Vkvvdnwtmjnq['base64'] ? base64_decode($Vkvvdnwtmjnq['data']) : $Vkvvdnwtmjnq['data'],
  );
  
  return $Vwbpa3giaw5f;
}


if ( !function_exists("mb_strlen") ) {
  
  define('MB_OVERLOAD_MAIL', 1);
  define('MB_OVERLOAD_STRING', 2);
  define('MB_OVERLOAD_REGEX', 4);
  define('MB_CASE_UPPER', 0);
  define('MB_CASE_LOWER', 1);
  define('MB_CASE_TITLE', 2);

  function mb_convert_encoding($Vou4vxorrdoe, $Vq5zytxh2z3i, $Vf2pv54wixk2 = 'UTF-8') {
    if (str_replace('-', '', strtolower($Vq5zytxh2z3i)) === 'utf8') {
      return utf8_encode($Vou4vxorrdoe);
    } else {
      return utf8_decode($Vou4vxorrdoe);
    }
  }
  
  function mb_detect_encoding($Vou4vxorrdoe, $Vhcvll3uegyc = array('iso-8859-1'), $Vw0bicomqnwk = false) {
    return 'iso-8859-1';
  }
  
  function mb_detect_order($Vhcvll3uegyc = array('iso-8859-1')) {
    return 'iso-8859-1';
  }
  
  function mb_internal_encoding($V5mmmrje2ymm = null) {
    if (isset($V5mmmrje2ymm)) {
      return true;
    } else {
      return 'iso-8859-1';
    }
  }

  function mb_strlen($Vyqctydehp2e, $V5mmmrje2ymm = 'iso-8859-1') {
    switch (str_replace('-', '', strtolower($V5mmmrje2ymm))) {
      case "utf8": return strlen(utf8_encode($Vyqctydehp2e));
      case "8bit": return strlen($Vyqctydehp2e);
      default:     return strlen(utf8_decode($Vyqctydehp2e));
    }
  }
  
  function mb_strpos($V0mmc53yh4jc, $Vfui3jz0cdhv, $Vortqlloirgz = 0) {
    return strpos($V0mmc53yh4jc, $Vfui3jz0cdhv, $Vortqlloirgz);
  }
  
  function mb_strrpos($V0mmc53yh4jc, $Vfui3jz0cdhv, $Vortqlloirgz = 0) {
    return strrpos($V0mmc53yh4jc, $Vfui3jz0cdhv, $Vortqlloirgz);
  }
  
  function mb_strtolower( $Vyqctydehp2e ) {
    return strtolower($Vyqctydehp2e);
  }
  
  function mb_strtoupper( $Vyqctydehp2e ) {
    return strtoupper($Vyqctydehp2e);
  }
  
  function mb_substr($Vyqctydehp2eing, $Vvzcx2qx0r4o, $Volq3gdvkuqp = null, $V5mmmrje2ymm = 'iso-8859-1') {
    if ( is_null($Volq3gdvkuqp) )
      return substr($Vyqctydehp2eing, $Vvzcx2qx0r4o);
    else
      return substr($Vyqctydehp2eing, $Vvzcx2qx0r4o, $Volq3gdvkuqp);
  }
  
  function mb_substr_count($V0mmc53yh4jc, $Vfui3jz0cdhv, $V5mmmrje2ymm = 'iso-8859-1') {
    return substr_count($V0mmc53yh4jc, $Vfui3jz0cdhv);
  }
  
  function mb_encode_numericentity($Vyqctydehp2e, $Vjqmmov3fnjd, $V5mmmrje2ymm) {
    return htmlspecialchars($Vyqctydehp2e);
  }
  
  function mb_convert_case($Vyqctydehp2e, $Vbdcqcmfhadr = MB_CASE_UPPER, $V5mmmrje2ymm = array()) {
    switch($Vbdcqcmfhadr) {
      case MB_CASE_UPPER: return mb_strtoupper($Vyqctydehp2e);
      case MB_CASE_LOWER: return mb_strtolower($Vyqctydehp2e);
      case MB_CASE_TITLE: return ucwords(mb_strtolower($Vyqctydehp2e));
      default: return $Vyqctydehp2e;
    }
  }
  
  function mb_list_encodings() {
    return array(
      "ISO-8859-1",
      "UTF-8",
      "8bit",
    );
  }
}


function rle8_decode ($Vyqctydehp2e, $Vojs2qdgagwv){
  $Vc0nl2mvtiho = $Vojs2qdgagwv + (3 - ($Vojs2qdgagwv-1) % 4);
  $Vvbltn01tphw = '';
  $Vhbebnaefdgw = strlen($Vyqctydehp2e);
  
  for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <$Vhbebnaefdgw; $Vfhiq1lhsoja++) {
    $Vrs2mt5pfpsv = ord($Vyqctydehp2e[$Vfhiq1lhsoja]);
    switch ($Vrs2mt5pfpsv){
      case 0: # ESCAPE
        $Vfhiq1lhsoja++;
        switch (ord($Vyqctydehp2e[$Vfhiq1lhsoja])){
          case 0: # NEW LINE
            $Vnyvmelrff0a = $Vc0nl2mvtiho - strlen($Vvbltn01tphw)%$Vc0nl2mvtiho;
            if ($Vnyvmelrff0a<$Vc0nl2mvtiho) $Vvbltn01tphw .= str_repeat(chr(0), $Vnyvmelrff0a); # pad line
            break;
          case 1: # END OF FILE
            $Vnyvmelrff0a = $Vc0nl2mvtiho - strlen($Vvbltn01tphw)%$Vc0nl2mvtiho;
            if ($Vnyvmelrff0a<$Vc0nl2mvtiho) $Vvbltn01tphw .= str_repeat(chr(0), $Vnyvmelrff0a); # pad line
            break 3;
          case 2: # DELTA
            $Vfhiq1lhsoja += 2;
            break;
          default: # ABSOLUTE MODE
            $Vcgbfu1dtv3l = ord($Vyqctydehp2e[$Vfhiq1lhsoja]);
            for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vcgbfu1dtv3l; $Vzmnqyqjjodw++)
              $Vvbltn01tphw .= $Vyqctydehp2e[++$Vfhiq1lhsoja];
            if ($Vcgbfu1dtv3l % 2) $Vfhiq1lhsoja++;
        }
      break;
      default:
      $Vvbltn01tphw .= str_repeat($Vyqctydehp2e[++$Vfhiq1lhsoja], $Vrs2mt5pfpsv);
    }
  }
  return $Vvbltn01tphw;
}


function rle4_decode ($Vyqctydehp2e, $Vojs2qdgagwv) {
  $Vwsgifrh5ics = floor($Vojs2qdgagwv/2) + ($Vojs2qdgagwv % 2);
  $Vc0nl2mvtiho = $Vwsgifrh5ics + (3 - ( ($Vojs2qdgagwv-1) / 2) % 4);    
  $Vsgynrq4y5ql = array();
  $Vhbebnaefdgw = strlen($Vyqctydehp2e);
  
  for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhbebnaefdgw; $Vfhiq1lhsoja++) {
    $Vrs2mt5pfpsv = ord($Vyqctydehp2e[$Vfhiq1lhsoja]);
    switch ($Vrs2mt5pfpsv) {
      case 0: # ESCAPE
        $Vfhiq1lhsoja++;
        switch (ord($Vyqctydehp2e[$Vfhiq1lhsoja])){
          case 0: # NEW LINE
            while (count($Vsgynrq4y5ql)%$Vc0nl2mvtiho!=0)
              $Vsgynrq4y5ql[]=0;
            break;
          case 1: # END OF FILE
            while (count($Vsgynrq4y5ql)%$Vc0nl2mvtiho!=0)
              $Vsgynrq4y5ql[]=0;
            break 3;
          case 2: # DELTA
            $Vfhiq1lhsoja += 2;
            break;
          default: # ABSOLUTE MODE
            $Vcgbfu1dtv3l = ord($Vyqctydehp2e[$Vfhiq1lhsoja]);
            for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vcgbfu1dtv3l; $Vzmnqyqjjodw++){
              if ($Vzmnqyqjjodw%2 == 0){
                $V4y0urwpnd3j = ord($Vyqctydehp2e[++$Vfhiq1lhsoja]);
                $Vsgynrq4y5ql[] = ($V4y0urwpnd3j & 240)>>4;
              } else
                $Vsgynrq4y5ql[] = $V4y0urwpnd3j & 15;
            }
            if ($Vcgbfu1dtv3l % 2 == 0) $Vfhiq1lhsoja++;
       }
       break;
      default:
        $V4y0urwpnd3j = ord($Vyqctydehp2e[++$Vfhiq1lhsoja]);
        for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vrs2mt5pfpsv; $Vzmnqyqjjodw++)
          $Vsgynrq4y5ql[] = ($Vzmnqyqjjodw%2==0 ? ($V4y0urwpnd3j & 240)>>4 : $V4y0urwpnd3j & 15);
    }
  }
  
  $Vvbltn01tphw = '';
  if (count($Vsgynrq4y5ql)%2) $Vsgynrq4y5ql[]=0;
  $Vhbebnaefdgw = count($Vsgynrq4y5ql)/2;
  
  for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhbebnaefdgw; $Vfhiq1lhsoja++)
    $Vvbltn01tphw .= chr(16*$Vsgynrq4y5ql[2*$Vfhiq1lhsoja] + $Vsgynrq4y5ql[2*$Vfhiq1lhsoja+1]);
    
  return $Vvbltn01tphw;
} 

if ( !function_exists("imagecreatefrombmp") ) {


function imagecreatefrombmp($Vg5mhfl1beoiname) {
  try {
  
  if (!($Vpo2b1kin4yt = fopen($Vg5mhfl1beoiname, 'rb'))) {
    trigger_error('imagecreatefrombmp: Can not open ' . $Vg5mhfl1beoiname, E_USER_WARNING);
    return false;
  }
  
  $Voefincyk5lw = 0;
  
  
  $V243j3rdeixy = unpack('vtype/Vfilesize/Vreserved/Voffset', fread($Vpo2b1kin4yt, 14));
  
  
  if ($V243j3rdeixy['type'] != 19778) {
    trigger_error('imagecreatefrombmp: ' . $Vg5mhfl1beoiname . ' is not a bitmap!', E_USER_WARNING);
    return false;
  }
  
  
  $V243j3rdeixy += unpack('Vheadersize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vcolors/Vimportant', fread($Vpo2b1kin4yt, 40));
  $Voefincyk5lw += 40;
  
  
  if ($V243j3rdeixy['compression'] == 3) {
    $V243j3rdeixy += unpack('VrMask/VgMask/VbMask', fread($Vpo2b1kin4yt, 12));
    $Voefincyk5lw += 12;
  }
  
  
  $V243j3rdeixy['bytes'] = $V243j3rdeixy['bits'] / 8;
  $V243j3rdeixy['decal'] = 4 - (4 * (($V243j3rdeixy['width'] * $V243j3rdeixy['bytes'] / 4)- floor($V243j3rdeixy['width'] * $V243j3rdeixy['bytes'] / 4)));
  if ($V243j3rdeixy['decal'] == 4) {
    $V243j3rdeixy['decal'] = 0;
  }
  
  
  if ($V243j3rdeixy['imagesize'] < 1) {
    $V243j3rdeixy['imagesize'] = $V243j3rdeixy['filesize'] - $V243j3rdeixy['offset'];
    
    if ($V243j3rdeixy['imagesize'] < 1) {
      $V243j3rdeixy['imagesize'] = @filesize($Vg5mhfl1beoiname) - $V243j3rdeixy['offset'];
      if ($V243j3rdeixy['imagesize'] < 1) {
        trigger_error('imagecreatefrombmp: Can not obtain filesize of ' . $Vg5mhfl1beoiname . '!', E_USER_WARNING);
        return false;
      }
    }
  }
  
  
  $V243j3rdeixy['colors'] = !$V243j3rdeixy['colors'] ? pow(2, $V243j3rdeixy['bits']) : $V243j3rdeixy['colors'];
  
  
  $Vgd2qlcwaetq = array();
  if ($V243j3rdeixy['bits'] < 16) {
    $Vgd2qlcwaetq = unpack('l' . $V243j3rdeixy['colors'], fread($Vpo2b1kin4yt, $V243j3rdeixy['colors'] * 4));
    
    if ($Vgd2qlcwaetq[1] < 0) {
      foreach ($Vgd2qlcwaetq as $Vfhiq1lhsoja => $V4y0urwpnd3jolor) {
        $Vgd2qlcwaetq[$Vfhiq1lhsoja] = $V4y0urwpnd3jolor + 16777216;
      }
    }
  }
  
  
  if ($V243j3rdeixy['headersize'] > $Voefincyk5lw) {
    fread($Vpo2b1kin4yt, $V243j3rdeixy['headersize'] - $Voefincyk5lw);
  }
  
  
  $Vfhiq1lhsojam = imagecreatetruecolor($V243j3rdeixy['width'], $V243j3rdeixy['height']);
  $Vou4vxorrdoe = fread($Vpo2b1kin4yt, $V243j3rdeixy['imagesize']);
  
  
  switch ($V243j3rdeixy['compression']) {
    case 1: $Vou4vxorrdoe = rle8_decode($Vou4vxorrdoe, $V243j3rdeixy['width']); break;
    case 2: $Vou4vxorrdoe = rle4_decode($Vou4vxorrdoe, $V243j3rdeixy['width']); break;
  }

  $Vzqw0ieauwu4 = 0;
  $Vv1d5mbvzelv = chr(0);
  $Vqwmp2bx0ii2 = $V243j3rdeixy['height'] - 1;
  $Vyrkodvljby0 = 'imagecreatefrombmp: ' . $Vg5mhfl1beoiname . ' has not enough data!';

  
  while ($Vqwmp2bx0ii2 >= 0) {
    $V1e1eaicqarh = 0;
    while ($V1e1eaicqarh < $V243j3rdeixy['width']) {
      switch ($V243j3rdeixy['bits']) {
        case 32:
        case 24:
          if (!($Vzqw0ieauwu4art = substr($Vou4vxorrdoe, $Vzqw0ieauwu4, 3 ))) {
            trigger_error($Vyrkodvljby0, E_USER_WARNING);
            return $Vfhiq1lhsojam;
          }
          $V4y0urwpnd3jolor = unpack('V', $Vzqw0ieauwu4art . $Vv1d5mbvzelv);
          break;
        case 16:
          if (!($Vzqw0ieauwu4art = substr($Vou4vxorrdoe, $Vzqw0ieauwu4, 2 ))) {
            trigger_error($Vyrkodvljby0, E_USER_WARNING);
            return $Vfhiq1lhsojam;
          }
          $V4y0urwpnd3jolor = unpack('v', $Vzqw0ieauwu4art);

          if (empty($V243j3rdeixy['rMask']) || $V243j3rdeixy['rMask'] != 0xf800)
            $V4y0urwpnd3jolor[1] = (($V4y0urwpnd3jolor[1] & 0x7c00) >> 7) * 65536 + (($V4y0urwpnd3jolor[1] & 0x03e0) >> 2) * 256 + (($V4y0urwpnd3jolor[1] & 0x001f) << 3); 
          else 
            $V4y0urwpnd3jolor[1] = (($V4y0urwpnd3jolor[1] & 0xf800) >> 8) * 65536 + (($V4y0urwpnd3jolor[1] & 0x07e0) >> 3) * 256 + (($V4y0urwpnd3jolor[1] & 0x001f) << 3); 
          break;
        case 8:
          $V4y0urwpnd3jolor = unpack('n', $Vv1d5mbvzelv . substr($Vou4vxorrdoe, $Vzqw0ieauwu4, 1));
          $V4y0urwpnd3jolor[1] = $Vgd2qlcwaetq[ $V4y0urwpnd3jolor[1] + 1 ];
          break;
        case 4:
          $V4y0urwpnd3jolor = unpack('n', $Vv1d5mbvzelv . substr($Vou4vxorrdoe, floor($Vzqw0ieauwu4), 1));
          $V4y0urwpnd3jolor[1] = ($Vzqw0ieauwu4 * 2) % 2 == 0 ? $V4y0urwpnd3jolor[1] >> 4 : $V4y0urwpnd3jolor[1] & 0x0F;
          $V4y0urwpnd3jolor[1] = $Vgd2qlcwaetq[ $V4y0urwpnd3jolor[1] + 1 ];
          break;
        case 1:
          $V4y0urwpnd3jolor = unpack('n', $Vv1d5mbvzelv . substr($Vou4vxorrdoe, floor($Vzqw0ieauwu4), 1));
          switch (($Vzqw0ieauwu4 * 8) % 8) {
            case 0: $V4y0urwpnd3jolor[1] =  $V4y0urwpnd3jolor[1] >> 7; break;
            case 1: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x40) >> 6; break;
            case 2: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x20) >> 5; break;
            case 3: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x10) >> 4; break;
            case 4: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x8 ) >> 3; break;
            case 5: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x4 ) >> 2; break;
            case 6: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x2 ) >> 1; break;
            case 7: $V4y0urwpnd3jolor[1] = ($V4y0urwpnd3jolor[1] & 0x1 );      break;
          }
          $V4y0urwpnd3jolor[1] = $Vgd2qlcwaetq[ $V4y0urwpnd3jolor[1] + 1 ];
          break;
        default:
          trigger_error('imagecreatefrombmp: ' . $Vg5mhfl1beoiname . ' has ' . $V243j3rdeixy['bits'] . ' bits and this is not supported!', E_USER_WARNING);
          return false;
      }
      imagesetpixel($Vfhiq1lhsojam, $V1e1eaicqarh, $Vqwmp2bx0ii2, $V4y0urwpnd3jolor[1]);
      $V1e1eaicqarh++;
      $Vzqw0ieauwu4 += $V243j3rdeixy['bytes'];
    }
    $Vqwmp2bx0ii2--;
    $Vzqw0ieauwu4 += $V243j3rdeixy['decal'];
  }
  fclose($Vpo2b1kin4yt);
  return $Vfhiq1lhsojam;
  } catch (Exception $Vnhm0uuykimv) {var_dump($Vnhm0uuykimv);}
}
}


function dompdf_getimagesize($Vg5mhfl1beoiname) {
  static $V4y0urwpnd3jache = array();
  
  if ( isset($V4y0urwpnd3jache[$Vg5mhfl1beoiname]) ) {
    return $V4y0urwpnd3jache[$Vg5mhfl1beoiname];
  }
  
  list($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4pigtpor0ln) = getimagesize($Vg5mhfl1beoiname);
  
  if ( $Vojs2qdgagwv == null || $Vzo4g5xb4yip == null ) {
    $Vou4vxorrdoe = file_get_contents($Vg5mhfl1beoiname, null, null, 0, 26);
    
    if ( substr($Vou4vxorrdoe, 0, 2) === "BM" ) {
      $V243j3rdeixy = unpack('vtype/Vfilesize/Vreserved/Voffset/Vheadersize/Vwidth/Vheight', $Vou4vxorrdoe);
      $Vojs2qdgagwv  = (int)$V243j3rdeixy['width'];
      $Vzo4g5xb4yip = (int)$V243j3rdeixy['height'];
      $V4pigtpor0ln   = IMAGETYPE_BMP;
    }
  }
  
  return $V4y0urwpnd3jache[$Vg5mhfl1beoiname] = array($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4pigtpor0ln);
}


function cmyk_to_rgb($V4y0urwpnd3j, $Vt54vmttyjzc = null, $Vqwmp2bx0ii2 = null, $V51lf1kcbto4 = null) {
  if (is_array($V4y0urwpnd3j)) {
    list($V4y0urwpnd3j, $Vt54vmttyjzc, $Vqwmp2bx0ii2, $V51lf1kcbto4) = $V4y0urwpnd3j;
  }
  
  $V4y0urwpnd3j *= 255;
  $Vt54vmttyjzc *= 255;
  $Vqwmp2bx0ii2 *= 255;
  $V51lf1kcbto4 *= 255;
  
  $Vws44nszhvgo = (1 - round(2.55 * ($V4y0urwpnd3j+$V51lf1kcbto4))) ;
  $Vpatv3dcvvhr = (1 - round(2.55 * ($Vt54vmttyjzc+$V51lf1kcbto4))) ;
  $V4t3fwdd3eev = (1 - round(2.55 * ($Vqwmp2bx0ii2+$V51lf1kcbto4))) ;
    
  if($Vws44nszhvgo<0) $Vws44nszhvgo = 0;
  if($Vpatv3dcvvhr<0) $Vpatv3dcvvhr = 0;
  if($V4t3fwdd3eev<0) $V4t3fwdd3eev = 0;
    
  return array(
    $Vws44nszhvgo, $Vpatv3dcvvhr, $V4t3fwdd3eev,
    "r" => $Vws44nszhvgo, "g" => $Vpatv3dcvvhr, "b" => $V4t3fwdd3eev
  );
}

function unichr($V4y0urwpnd3j) {
  if ($V4y0urwpnd3j <= 0x7F) {
    return chr($V4y0urwpnd3j);
  } else if ($V4y0urwpnd3j <= 0x7FF) {
    return chr(0xC0 | $V4y0urwpnd3j >>  6) . chr(0x80 | $V4y0urwpnd3j & 0x3F);
  } else if ($V4y0urwpnd3j <= 0xFFFF) {
    return chr(0xE0 | $V4y0urwpnd3j >> 12) . chr(0x80 | $V4y0urwpnd3j >> 6 & 0x3F)
                                . chr(0x80 | $V4y0urwpnd3j & 0x3F);
  } else if ($V4y0urwpnd3j <= 0x10FFFF) {
    return chr(0xF0 | $V4y0urwpnd3j >> 18) . chr(0x80 | $V4y0urwpnd3j >> 12 & 0x3F)
                                . chr(0x80 | $V4y0urwpnd3j >> 6 & 0x3F)
                                . chr(0x80 | $V4y0urwpnd3j & 0x3F);
  }
  return false;
}

if ( !function_exists("date_default_timezone_get") ) {
  function date_default_timezone_get() {
    return "";
  }
  
  function date_default_timezone_set($Vjgvp3e43umr) {
    return true;
  }
}


function record_warnings($Vnhm0uuykimvrrno, $Vnhm0uuykimvrrstr, $Vnhm0uuykimvrrfile, $Vnhm0uuykimvrrline) {

  if ( !($Vnhm0uuykimvrrno & (E_WARNING | E_NOTICE | E_USER_NOTICE | E_USER_WARNING )) ) 
    throw new DOMPDF_Exception($Vnhm0uuykimvrrstr . " $Vnhm0uuykimvrrno");

  global $Vlb1pyhumpag;
  global $Vxh3hfxmt4gu;

  if ( $Vxh3hfxmt4gu )
    echo $Vnhm0uuykimvrrstr . "\n";

  $Vlb1pyhumpag[] = $Vnhm0uuykimvrrstr;
}


function bt() {
  if ( php_sapi_name() !== "cli")
    echo("<pre>");
    
  $V4t3fwdd3eevt = debug_backtrace();

  array_shift($V4t3fwdd3eevt); 
  echo "\n";

  $Vfhiq1lhsoja = 0;
  foreach ($V4t3fwdd3eevt as $V4y0urwpnd3jall) {
    $Vg5mhfl1beoi = basename($V4y0urwpnd3jall["file"]) . " (" . $V4y0urwpnd3jall["line"] . ")";
    if ( isset($V4y0urwpnd3jall["class"]) ) {
      $Vcxt1ln5llz3 = $V4y0urwpnd3jall["class"] . "->" . $V4y0urwpnd3jall["function"] . "()";
    } else {
      $Vcxt1ln5llz3 = $V4y0urwpnd3jall["function"] . "()";
    }

    echo "#" . str_pad($Vfhiq1lhsoja, 2, " ", STR_PAD_RIGHT) . ": " . str_pad($Vg5mhfl1beoi.":", 42) . " $Vcxt1ln5llz3\n";
    $Vfhiq1lhsoja++;
  }
  echo "\n";
  
  if ( php_sapi_name() !== "cli")
    echo("</pre>");
}


function dompdf_debug($V4pigtpor0ln, $Vt54vmttyjzcsg) {
  global $Vwvvrkk5e0vh, $Vxh3hfxmt4gu, $Vatvjzg4ejqt;
  if ( isset($Vwvvrkk5e0vh[$V4pigtpor0ln]) && ($Vxh3hfxmt4gu || $Vatvjzg4ejqt) ) {
    $Vd5mgesqkq2x = debug_backtrace();

    echo basename($Vd5mgesqkq2x[0]["file"]) . " (" . $Vd5mgesqkq2x[0]["line"] ."): " . $Vd5mgesqkq2x[1]["function"] . ": ";
    pre_r($Vt54vmttyjzcsg);
  }
}

if ( !function_exists("print_memusage") ) {

function print_memusage() {
  global $Vt54vmttyjzcemusage;
  echo ("Memory Usage\n");
  $Vzqw0ieauwu4rev = 0;
  $Vfhiq1lhsojanitial = reset($Vt54vmttyjzcemusage);
  echo (str_pad("Initial:", 40) . $Vfhiq1lhsojanitial . "\n\n");

  foreach ($Vt54vmttyjzcemusage as $V51lf1kcbto4ey=>$Vt54vmttyjzcem) {
    $Vt54vmttyjzcem -= $Vfhiq1lhsojanitial;
    echo (str_pad("$V51lf1kcbto4ey:" , 40));
    echo (str_pad("$Vt54vmttyjzcem", 12) . "(diff: " . ($Vt54vmttyjzcem - $Vzqw0ieauwu4rev) . ")\n");
    $Vzqw0ieauwu4rev = $Vt54vmttyjzcem;
  }

  echo ("\n" . str_pad("Total:", 40) . memory_get_usage()) . "\n";
}
}

if ( !function_exists("enable_mem_profile") ) {

function enable_mem_profile() {
    global $Vt54vmttyjzcemusage;
    $Vt54vmttyjzcemusage = array("Startup" => memory_get_usage());
    register_shutdown_function("print_memusage");
}
}

if ( !function_exists("mark_memusage") ) {

function mark_memusage($Vw220v45occ4) {
  global $Vt54vmttyjzcemusage;
  if ( isset($Vt54vmttyjzcemusage) )
    $Vt54vmttyjzcemusage[$Vw220v45occ4] = memory_get_usage();
}
}

if ( !function_exists('sys_get_temp_dir')) {

function sys_get_temp_dir() {
  if (!empty($_ENV['TMP'])) { return realpath($_ENV['TMP']); }
  if (!empty($_ENV['TMPDIR'])) { return realpath( $_ENV['TMPDIR']); }
  if (!empty($_ENV['TEMP'])) { return realpath( $_ENV['TEMP']); }
  $V0b3exfx3ee0=tempnam(uniqid(rand(),TRUE),'');
  if (file_exists($V0b3exfx3ee0)) {
  unlink($V0b3exfx3ee0);
  return realpath(dirname($V0b3exfx3ee0));
  }
}
}

if ( function_exists("memory_get_peak_usage") ) {
  function DOMPDF_memory_usage(){
    return memory_get_peak_usage(true);
  }
}
else if ( function_exists("memory_get_usage") ) {
  function DOMPDF_memory_usage(){
    return memory_get_usage(true);
  }
}
else {
  function DOMPDF_memory_usage(){
    return "N/A";
  }
}

if ( function_exists("curl_init") ) {
  function DOMPDF_fetch_url($Vbfatyoohaps, &$Vyhzu2zcmowo = null) {
    $V4y0urwpnd3jh = curl_init($Vbfatyoohaps);
    curl_setopt($V4y0urwpnd3jh, CURLOPT_TIMEOUT, 10);
    curl_setopt($V4y0urwpnd3jh, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($V4y0urwpnd3jh, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($V4y0urwpnd3jh, CURLOPT_HEADER, TRUE);
    
    $Vou4vxorrdoe = curl_exec($V4y0urwpnd3jh);
    $Vws44nszhvgoaw_headers = substr($Vou4vxorrdoe, 0, curl_getinfo($V4y0urwpnd3jh, CURLINFO_HEADER_SIZE));
    $Vyhzu2zcmowo = preg_split("/[\n\r]+/", trim($Vws44nszhvgoaw_headers));
    $Vou4vxorrdoe = substr($Vou4vxorrdoe, curl_getinfo($V4y0urwpnd3jh, CURLINFO_HEADER_SIZE));
    curl_close($V4y0urwpnd3jh);
    
    return $Vou4vxorrdoe;
  }
}
else {
  function DOMPDF_fetch_url($Vbfatyoohaps, &$Vyhzu2zcmowo = null) {
    $Vou4vxorrdoe = file_get_contents($Vbfatyoohaps);
    $Vyhzu2zcmowo = $http_response_header;
    
    return $Vou4vxorrdoe;
  }
}


if ( PHP_VERSION_ID < 50300 ) {
  function clear_object(&$Vrs2mt5pfpsvbject) {
    if ( is_object($Vrs2mt5pfpsvbject) ) {
      foreach ($Vrs2mt5pfpsvbject as &$Vp4xjtpabm0l) {
        clear_object($Vp4xjtpabm0l);
      }
    }
    
    $Vrs2mt5pfpsvbject = null;
    unset($Vrs2mt5pfpsvbject);
  }
}
else {
  function clear_object(&$Vrs2mt5pfpsvbject) {
    
  } 
}
