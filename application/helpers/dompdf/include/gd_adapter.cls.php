<?php



class GD_Adapter implements Canvas {

  
  private $Vyf2n4z31iy0;

  
  private $V1hgtvz3lirj;

  
  private $Vcbzw3tnapla;

  
  private $V20axuh23kms;

  
  private $Vf4sfkpv1oei;

  
  private $V5nrv0hftw0i;

  
  private $V455onjk52rq;

  
  private $Vue1vqqkijzo;
  
  
  function __construct($V4jbadwq4bzj, $Viltsyxewtah = "portrait", $Vny05tnbf2mb = 1, $Vh4bkthyxaf3 = array(1,1,1,0) ) {

    if ( !is_array($V4jbadwq4bzj) ) {
      $V4jbadwq4bzj = strtolower($V4jbadwq4bzj);
      
      if ( isset(CPDF_Adapter::$Vcn1kpkzkzeg[$V4jbadwq4bzj]) ) 
        $V4jbadwq4bzj = CPDF_Adapter::$Vcn1kpkzkzeg[$V4jbadwq4bzj];
      else
        $V4jbadwq4bzj = CPDF_Adapter::$Vcn1kpkzkzeg["letter"];
    }

    if ( strtolower($Viltsyxewtah) === "landscape" ) {
      list($V4jbadwq4bzj[2],$V4jbadwq4bzj[3]) = array($V4jbadwq4bzj[3],$V4jbadwq4bzj[2]);
    }

    if ( $Vny05tnbf2mb < 1 )
      $Vny05tnbf2mb = 1;

    $this->_aa_factor = $Vny05tnbf2mb;
    
    $V4jbadwq4bzj[2] *= $Vny05tnbf2mb;
    $V4jbadwq4bzj[3] *= $Vny05tnbf2mb;
    
    $this->_width = $V4jbadwq4bzj[2] - $V4jbadwq4bzj[0];
    $this->_height = $V4jbadwq4bzj[3] - $V4jbadwq4bzj[1];

    $this->_img = imagecreatetruecolor($this->_width, $this->_height);

    if ( is_null($Vh4bkthyxaf3) || !is_array($Vh4bkthyxaf3) ) {
      
      $Vh4bkthyxaf3 = array(1,1,1,0);
    }

    $this->_bg_color = $this->_allocate_color($Vh4bkthyxaf3);
    imagealphablending($this->_img, true);
    imagesavealpha($this->_img, true);
    imagefill($this->_img, 0, 0, $this->_bg_color);
    
  }

  
  function get_image() { return $this->_img; }

  
  function get_width() { return $this->_width / $this->_aa_factor; }

  
  function get_height() { return $this->_height / $this->_aa_factor; }

  
  function get_page_number() { return $this->_page_number; }

  
  function get_page_count() { return $this->_page_count; }

  
  function set_page_number($Vcgbfu1dtv3l) { $this->_page_number = $Vcgbfu1dtv3l; }

  
  function set_page_count($Vytbsuz3c5qz) {  $this->_page_count = $Vytbsuz3c5qz; }
  
  
  function set_opacity($Vjqeycctd35y, $Vbdcqcmfhadr = "Normal") {
    
  }

  
  private function _allocate_color($Vl5jzlxo3j3n) {
    
    if ( isset($Vl5jzlxo3j3n["c"]) ) {
      $Vl5jzlxo3j3n = cmyk_to_rgb($Vl5jzlxo3j3n);
    }
    
    
    if ( !isset($Vl5jzlxo3j3n[3]) ) 
      $Vl5jzlxo3j3n[3] = 0;
    
    list($Vws44nszhvgo,$Vpatv3dcvvhr,$V4t3fwdd3eev,$Vi3y3l1uvwp3) = $Vl5jzlxo3j3n;
    
    $Vws44nszhvgo *= 255;
    $Vpatv3dcvvhr *= 255;
    $V4t3fwdd3eev *= 255;
    $Vi3y3l1uvwp3 *= 127;
    
    
    $Vws44nszhvgo = $Vws44nszhvgo > 255 ? 255 : $Vws44nszhvgo;
    $Vpatv3dcvvhr = $Vpatv3dcvvhr > 255 ? 255 : $Vpatv3dcvvhr;
    $V4t3fwdd3eev = $V4t3fwdd3eev > 255 ? 255 : $V4t3fwdd3eev;
    $Vi3y3l1uvwp3 = $Vi3y3l1uvwp3 > 127 ? 127 : $Vi3y3l1uvwp3;
      
    $Vws44nszhvgo = $Vws44nszhvgo < 0 ? 0 : $Vws44nszhvgo;
    $Vpatv3dcvvhr = $Vpatv3dcvvhr < 0 ? 0 : $Vpatv3dcvvhr;
    $V4t3fwdd3eev = $V4t3fwdd3eev < 0 ? 0 : $V4t3fwdd3eev;
    $Vi3y3l1uvwp3 = $Vi3y3l1uvwp3 < 0 ? 0 : $Vi3y3l1uvwp3;
      
    $Vseq1edikdvg = sprintf("#%02X%02X%02X%02X", $Vws44nszhvgo, $Vpatv3dcvvhr, $V4t3fwdd3eev, $Vi3y3l1uvwp3);
      
    if ( isset($this->_colors[$Vseq1edikdvg]) )
      return $this->_colors[$Vseq1edikdvg];

    if ( $Vi3y3l1uvwp3 != 0 ) 
      $this->_colors[$Vseq1edikdvg] = imagecolorallocatealpha($this->_img, $Vws44nszhvgo, $Vpatv3dcvvhr, $V4t3fwdd3eev, $Vi3y3l1uvwp3);
    else
      $this->_colors[$Vseq1edikdvg] = imagecolorallocate($this->_img, $Vws44nszhvgo, $Vpatv3dcvvhr, $V4t3fwdd3eev);
      
    return $this->_colors[$Vseq1edikdvg];
    
  }
  
  
  function line($Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {

    
    $Vkiv1idvekdh *= $this->_aa_factor;
    $Vj45ukmrparq *= $this->_aa_factor;
    $Vbbuqfp0xqjj *= $this->_aa_factor;
    $V4ed4tb3yv2t *= $this->_aa_factor;
    $Vojs2qdgagwv *= $this->_aa_factor;

    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);

    
    if ( !is_null($Vdtcpflt5bhp) ) {
      $Vpatv3dcvvhrd_style = array();

      if ( count($Vdtcpflt5bhp) == 1 ) {
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vdtcpflt5bhp[0] * $this->_aa_factor; $Vfhiq1lhsoja++) {
          $Vpatv3dcvvhrd_style[] = $V4y0urwpnd3j;
        }

        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vdtcpflt5bhp[0] * $this->_aa_factor; $Vfhiq1lhsoja++) {
          $Vpatv3dcvvhrd_style[] = $this->_bg_color;
        }

      } else {

        $Vfhiq1lhsoja = 0;
        foreach ($Vdtcpflt5bhp as $Volq3gdvkuqp) {

          if ( $Vfhiq1lhsoja % 2 == 0 ) {
            
            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vdtcpflt5bhp[0] * $this->_aa_factor; $Vfhiq1lhsoja++) 
              $Vpatv3dcvvhrd_style[] = $V4y0urwpnd3j;
            
          } else {
            
            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vdtcpflt5bhp[0] * $this->_aa_factor; $Vfhiq1lhsoja++) 
              $Vpatv3dcvvhrd_style[] = $this->_bg_color;
            
          }
          $Vfhiq1lhsoja++;
        }
      }
      
      imagesetstyle($this->_img, $Vpatv3dcvvhrd_style);
      $V4y0urwpnd3j = IMG_COLOR_STYLED;
    }
    
    imagesetthickness($this->_img, $Vojs2qdgagwv);

    imageline($this->_img, $Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $V4y0urwpnd3j);
    
  }

     
  function rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {

    
    $Vkiv1idvekdh *= $this->_aa_factor;
    $Vj45ukmrparq *= $this->_aa_factor;
    $Vwsgifrh5ics *= $this->_aa_factor;
    $Vvlxmepre4ko *= $this->_aa_factor;

    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);

    
    if ( !is_null($Vdtcpflt5bhp) ) {
      $Vpatv3dcvvhrd_style = array();

      foreach ($Vdtcpflt5bhp as $Volq3gdvkuqp) {
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Volq3gdvkuqp; $Vfhiq1lhsoja++) {
          $Vpatv3dcvvhrd_style[] = $V4y0urwpnd3j;
        }
      }

      imagesetstyle($this->_img, $Vpatv3dcvvhrd_style);
      $V4y0urwpnd3j = IMG_COLOR_STYLED;
    }

    imagesetthickness($this->_img, $Vojs2qdgagwv);

    imagerectangle($this->_img, $Vkiv1idvekdh, $Vj45ukmrparq, $Vkiv1idvekdh + $Vwsgifrh5ics, $Vj45ukmrparq + $Vvlxmepre4ko, $V4y0urwpnd3j);
    
  }

     
  function filled_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n) {

    
    $Vkiv1idvekdh *= $this->_aa_factor;
    $Vj45ukmrparq *= $this->_aa_factor;
    $Vwsgifrh5ics *= $this->_aa_factor;
    $Vvlxmepre4ko *= $this->_aa_factor;

    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);

    imagefilledrectangle($this->_img, $Vkiv1idvekdh, $Vj45ukmrparq, $Vkiv1idvekdh + $Vwsgifrh5ics, $Vj45ukmrparq + $Vvlxmepre4ko, $V4y0urwpnd3j);

  }
  
     
  function clipping_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko) {
    
  }
  
    
  function clipping_end() {
    
  }
  
  function save() {
    
  }
  
  function restore() {
    
  }
  
  function rotate($Vi3y3l1uvwp3ngle, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    
  }
  
  function skew($Vi3y3l1uvwp3ngle_x, $Vi3y3l1uvwp3ngle_y, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    
  }
  
  function scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    
  }
  
  function translate($Vbzoega0pdxj, $Vxmzwkm4htrf) {
    
  }
  
  function transform($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo) {
    
  }

  
  function polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false) {

    
    foreach (array_keys($Vix4igm1vywd) as $Vfhiq1lhsoja)
      $Vix4igm1vywd[$Vfhiq1lhsoja] *= $this->_aa_factor;

    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);

    
    if ( !is_null($Vdtcpflt5bhp) && !$Vtbbah5lqvpoill ) {
      $Vpatv3dcvvhrd_style = array();

      foreach ($Vdtcpflt5bhp as $Volq3gdvkuqp) {
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Volq3gdvkuqp; $Vfhiq1lhsoja++) {
          $Vpatv3dcvvhrd_style[] = $V4y0urwpnd3j;
        }
      }

      imagesetstyle($this->_img, $Vpatv3dcvvhrd_style);
      $V4y0urwpnd3j = IMG_COLOR_STYLED;
    }

    imagesetthickness($this->_img, $Vojs2qdgagwv);

    if ( $Vtbbah5lqvpoill ) 
      imagefilledpolygon($this->_img, $Vix4igm1vywd, count($Vix4igm1vywd) / 2, $V4y0urwpnd3j);
    else
      imagepolygon($this->_img, $Vix4igm1vywd, count($Vix4igm1vywd) / 2, $V4y0urwpnd3j);
        
  }

     
  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false) {

    
    $V1e1eaicqarh *= $this->_aa_factor;
    $Vqwmp2bx0ii2 *= $this->_aa_factor;
    $Vws44nszhvgo *= $this->_aa_factor;

    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);

    
    if ( !is_null($Vdtcpflt5bhp) && !$Vtbbah5lqvpoill ) {
      $Vpatv3dcvvhrd_style = array();

      foreach ($Vdtcpflt5bhp as $Volq3gdvkuqp) {
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Volq3gdvkuqp; $Vfhiq1lhsoja++) {
          $Vpatv3dcvvhrd_style[] = $V4y0urwpnd3j;
        }
      }

      imagesetstyle($this->_img, $Vpatv3dcvvhrd_style);
      $V4y0urwpnd3j = IMG_COLOR_STYLED;
    }

    imagesetthickness($this->_img, $Vojs2qdgagwv);

    if ( $Vtbbah5lqvpoill )
      imagefilledellipse($this->_img, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vws44nszhvgo, $V4y0urwpnd3j);
    else
      imageellipse($this->_img, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vws44nszhvgo, $V4y0urwpnd3j);
        
  }

  
  function image($Vfhiq1lhsojamg_url, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vws44nszhvgoesolution = "normal") {
    $Vfhiq1lhsojamg_type = Image_Cache::detect_type($Vfhiq1lhsojamg_url);
    $Vfhiq1lhsojamg_ext  = Image_Cache::type_to_ext($Vfhiq1lhsojamg_type);

    if ( !$Vfhiq1lhsojamg_ext ) {
      return;
    }
    
    $Vtbbah5lqvpounc = "imagecreatefrom$Vfhiq1lhsojamg_ext";
    $V0cmmze43kb4 = @$Vtbbah5lqvpounc($Vfhiq1lhsojamg_url);

    if ( !$V0cmmze43kb4 ) {
      return; 
    }
    
    
    $V1e1eaicqarh *= $this->_aa_factor;
    $Vqwmp2bx0ii2 *= $this->_aa_factor;

    $Vwsgifrh5ics *= $this->_aa_factor;
    $Vvlxmepre4ko *= $this->_aa_factor;
    
    $Vfhiq1lhsojamg_w = imagesx($V0cmmze43kb4);
    $Vfhiq1lhsojamg_h = imagesy($V0cmmze43kb4);
    
    imagecopyresampled($this->_img, $V0cmmze43kb4, $V1e1eaicqarh, $Vqwmp2bx0ii2, 0, 0, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vfhiq1lhsojamg_w, $Vfhiq1lhsojamg_h);
    
  }

  
  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $Vwsgifrh5icsord_spacing = 0, $V4y0urwpnd3jhar_spacing = 0, $Vi3y3l1uvwp3ngle = 0) {

    
    $V1e1eaicqarh *= $this->_aa_factor;
    $Vqwmp2bx0ii2 *= $this->_aa_factor;
    $V4jbadwq4bzj *= $this->_aa_factor;
    
    $Vvlxmepre4ko = $this->get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj);
    $V4y0urwpnd3j = $this->_allocate_color($Vl5jzlxo3j3n);
    
    $Vkjdq1foihhi = mb_encode_numericentity($Vkjdq1foihhi, array(0x0080, 0xff, 0, 0xff), 'UTF-8');

    $Vtbbah5lqvpoont = $this->get_ttf_file($Vtbbah5lqvpoont);

    
    @imagettftext($this->_img, $V4jbadwq4bzj, $Vi3y3l1uvwp3ngle, $V1e1eaicqarh, $Vqwmp2bx0ii2 + $Vvlxmepre4ko, $V4y0urwpnd3j, $Vtbbah5lqvpoont, $Vkjdq1foihhi);
    
  }
  
  function javascript($V4y0urwpnd3jode) {
    
  }

  
  function add_named_dest($Vi3y3l1uvwp3nchorname) {
    
  }

  
  function add_link($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vvlxmepre4koeight) {
    
  }

  
  function add_info($Vq04bwg4ulks, $Vp4xjtpabm0l) {
    
  }
  
  function set_default_view($Vr2ci5ntypot, $Vobxlvad3352 = array()) {
    
  }
  
  
  function get_text_width($Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vwsgifrh5icsord_spacing = 0, $V4y0urwpnd3jhar_spacing = 0) {
    $Vtbbah5lqvpoont = $this->get_ttf_file($Vtbbah5lqvpoont);
      
    $Vkjdq1foihhi = mb_encode_numericentity($Vkjdq1foihhi, array(0x0080, 0xffff, 0, 0xffff), 'UTF-8');

    
    list($Vkiv1idvekdh,,$Vbbuqfp0xqjj) = @imagettfbbox($V4jbadwq4bzj, 0, $Vtbbah5lqvpoont, $Vkjdq1foihhi);
    return $Vbbuqfp0xqjj - $Vkiv1idvekdh;
  }
  
  function get_ttf_file($Vtbbah5lqvpoont) {
    if ( strpos($Vtbbah5lqvpoont, '.ttf') === false )
      $Vtbbah5lqvpoont .= ".ttf";
    
    
    
    return $Vtbbah5lqvpoont;
  }

  
  function get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj) {
    $Vtbbah5lqvpoont = $this->get_ttf_file($Vtbbah5lqvpoont);
      
    
    list(,$V4ed4tb3yv2t,,,,$Vj45ukmrparq) = imagettfbbox($V4jbadwq4bzj, 0, $Vtbbah5lqvpoont, "MXjpqytfhl");  
    return ($V4ed4tb3yv2t - $Vj45ukmrparq) * DOMPDF_FONT_HEIGHT_RATIO;
  }
  
  function get_font_baseline($Vtbbah5lqvpoont, $V4jbadwq4bzj) {
    return $this->get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj) / DOMPDF_FONT_HEIGHT_RATIO;
  }
  
  
  function new_page() {
    $this->_page_number++;
    $this->_page_count++;
  }    

  function open_object(){
    
  }

  function close_object(){
    
  }

  function add_object(){
    
  }

  function page_text(){
    
  }
  
  
  function stream($Vtbbah5lqvpoilename, $Vobxlvad3352 = null) {

    
    if ( $this->_aa_factor != 1 ) {
      $Vrec2f1japonst_w = $this->_width / $this->_aa_factor;
      $Vrec2f1japonst_h = $this->_height / $this->_aa_factor;
      $Vrec2f1japonst = imagecreatetruecolor($Vrec2f1japonst_w, $Vrec2f1japonst_h);
      imagecopyresampled($Vrec2f1japonst, $this->_img, 0, 0, 0, 0,
                         $Vrec2f1japonst_w, $Vrec2f1japonst_h,
                         $this->_width, $this->_height);
    } else {
      $Vrec2f1japonst = $this->_img;
    }

    if ( !isset($Vobxlvad3352["type"]) )
      $Vobxlvad3352["type"] = "png";

    $V4pigtpor0ln = strtolower($Vobxlvad3352["type"]);
    
    header("Cache-Control: private");
    
    switch ($V4pigtpor0ln) {

    case "jpg":
    case "jpeg":
      if ( !isset($Vobxlvad3352["quality"]) )
        $Vobxlvad3352["quality"] = 75;
      
      header("Content-type: image/jpeg");
      imagejpeg($Vrec2f1japonst, '', $Vobxlvad3352["quality"]);
      break;

    case "png":
    default:
      header("Content-type: image/png");
      imagepng($Vrec2f1japonst);
      break;
    }

    if ( $this->_aa_factor != 1 ) 
      imagedestroy($Vrec2f1japonst);
  }

  
  function output($Vobxlvad3352 = null) {

    if ( $this->_aa_factor != 1 ) {
      $Vrec2f1japonst_w = $this->_width / $this->_aa_factor;
      $Vrec2f1japonst_h = $this->_height / $this->_aa_factor;
      $Vrec2f1japonst = imagecreatetruecolor($Vrec2f1japonst_w, $Vrec2f1japonst_h);
      imagecopyresampled($Vrec2f1japonst, $this->_img, 0, 0, 0, 0,
                         $Vrec2f1japonst_w, $Vrec2f1japonst_h,
                         $this->_width, $this->_height);
    } else {
      $Vrec2f1japonst = $this->_img;
    }
    
    if ( !isset($Vobxlvad3352["type"]) )
      $Vobxlvad3352["type"] = "png";

    $V4pigtpor0ln = $Vobxlvad3352["type"];
    
    ob_start();

    switch ($V4pigtpor0ln) {

    case "jpg":
    case "jpeg":
      if ( !isset($Vobxlvad3352["quality"]) )
        $Vobxlvad3352["quality"] = 75;
      
      imagejpeg($Vrec2f1japonst, '', $Vobxlvad3352["quality"]);
      break;

    case "png":
    default:
      imagepng($Vrec2f1japonst);
      break;
    }

    $Vfhiq1lhsojamage = ob_get_clean();

    if ( $this->_aa_factor != 1 )
      imagedestroy($Vrec2f1japonst);
    
    return $Vfhiq1lhsojamage;
  }
  
  
}
