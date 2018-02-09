<?php



require_once(DOMPDF_LIB_DIR . "/class.pdf.php");


class CPDF_Adapter implements Canvas {

  
  static $Vcn1kpkzkzeg = array(
    "4a0" => array(0,0,4767.87,6740.79),
    "2a0" => array(0,0,3370.39,4767.87),
    "a0" => array(0,0,2383.94,3370.39),
    "a1" => array(0,0,1683.78,2383.94),
    "a2" => array(0,0,1190.55,1683.78),
    "a3" => array(0,0,841.89,1190.55),
    "a4" => array(0,0,595.28,841.89),
    "a5" => array(0,0,419.53,595.28),
    "a6" => array(0,0,297.64,419.53),
    "a7" => array(0,0,209.76,297.64),
    "a8" => array(0,0,147.40,209.76),
    "a9" => array(0,0,104.88,147.40),
    "a10" => array(0,0,73.70,104.88),
    "b0" => array(0,0,2834.65,4008.19),
    "b1" => array(0,0,2004.09,2834.65),
    "b2" => array(0,0,1417.32,2004.09),
    "b3" => array(0,0,1000.63,1417.32),
    "b4" => array(0,0,708.66,1000.63),
    "b5" => array(0,0,498.90,708.66),
    "b6" => array(0,0,354.33,498.90),
    "b7" => array(0,0,249.45,354.33),
    "b8" => array(0,0,175.75,249.45),
    "b9" => array(0,0,124.72,175.75),
    "b10" => array(0,0,87.87,124.72),
    "c0" => array(0,0,2599.37,3676.54),
    "c1" => array(0,0,1836.85,2599.37),
    "c2" => array(0,0,1298.27,1836.85),
    "c3" => array(0,0,918.43,1298.27),
    "c4" => array(0,0,649.13,918.43),
    "c5" => array(0,0,459.21,649.13),
    "c6" => array(0,0,323.15,459.21),
    "c7" => array(0,0,229.61,323.15),
    "c8" => array(0,0,161.57,229.61),
    "c9" => array(0,0,113.39,161.57),
    "c10" => array(0,0,79.37,113.39),
    "ra0" => array(0,0,2437.80,3458.27),
    "ra1" => array(0,0,1729.13,2437.80),
    "ra2" => array(0,0,1218.90,1729.13),
    "ra3" => array(0,0,864.57,1218.90),
    "ra4" => array(0,0,609.45,864.57),
    "sra0" => array(0,0,2551.18,3628.35),
    "sra1" => array(0,0,1814.17,2551.18),
    "sra2" => array(0,0,1275.59,1814.17),
    "sra3" => array(0,0,907.09,1275.59),
    "sra4" => array(0,0,637.80,907.09),
    "letter" => array(0,0,612.00,792.00),
    "legal" => array(0,0,612.00,1008.00),
    "ledger" => array(0,0,1224.00, 792.00),
    "tabloid" => array(0,0,792.00, 1224.00),
    "executive" => array(0,0,521.86,756.00),
    "folio" => array(0,0,612.00,936.00),
    "commercial #10 envelope" => array(0,0,684,297),
    "catalog #10 1/2 envelope" => array(0,0,648,864),
    "8.5x11" => array(0,0,612.00,792.00),
    "8.5x14" => array(0,0,612.00,1008.0),
    "11x17"  => array(0,0,792.00, 1224.00),
  );


  
  private $Vqyyzc2szlte;

  
  private $V1hgtvz3lirj;

  
  private $Vcbzw3tnapla;

  
  private $V20axuh23kms;

  
  private $Vf4sfkpv1oei;

  
  private $Vjvhvq5h5k4u;

  
  private $Vda1r0kfpr2r;

  
  private $Vu3q5hnp0bma;
  
  
  function __construct($Vrkqqtfn4q2f = "letter", $Viltsyxewtah = "portrait") {

    if ( is_array($Vrkqqtfn4q2f) )
      $V4jbadwq4bzj = $Vrkqqtfn4q2f;
    else if ( isset(self::$Vcn1kpkzkzeg[mb_strtolower($Vrkqqtfn4q2f)]) )
      $V4jbadwq4bzj = self::$Vcn1kpkzkzeg[mb_strtolower($Vrkqqtfn4q2f)];
    else
      $V4jbadwq4bzj = self::$Vcn1kpkzkzeg["letter"];

    if ( mb_strtolower($Viltsyxewtah) === "landscape" ) {
      list($V4jbadwq4bzj[2], $V4jbadwq4bzj[3]) = array($V4jbadwq4bzj[3], $V4jbadwq4bzj[2]);
    }
    
    $this->_pdf = new Cpdf($V4jbadwq4bzj, DOMPDF_UNICODE_ENABLED, DOMPDF_FONT_CACHE, DOMPDF_TEMP_DIR);
    $this->_pdf->addInfo("Creator", "DOMPDF");
    $Vmfehxqto3f3 = substr_replace(date('YmdHisO'), '\'', -2, 0).'\'';
    $this->_pdf->addInfo("CreationDate", "D:$Vmfehxqto3f3");
    $this->_pdf->addInfo("ModDate", "D:$Vmfehxqto3f3");

    $this->_width = $V4jbadwq4bzj[2] - $V4jbadwq4bzj[0];
    $this->_height= $V4jbadwq4bzj[3] - $V4jbadwq4bzj[1];
    
    $this->_page_number = $this->_page_count = 1;
    $this->_page_text = array();

    $this->_pages = array($this->_pdf->getFirstPageId());

    $this->_image_cache = array();
  }

  
  function __destruct() {
    foreach ($this->_image_cache as $Vkcptinxn5rf) {
      
      if (DEBUGPNG) print '[__destruct unlink '.$Vkcptinxn5rf.']';
      if (!DEBUGKEEPTEMP)
        unlink($Vkcptinxn5rf);
    }
  }
  
  
  function get_cpdf() { return $this->_pdf; }

  
  function add_info($Vq04bwg4ulks, $Vp4xjtpabm0l) {
    $this->_pdf->addInfo($Vq04bwg4ulks, $Vp4xjtpabm0l);
  }

  
  function open_object() {
    $Vc0brddnw0vm = $this->_pdf->openObject();
    $this->_pdf->saveState();
    return $Vc0brddnw0vm;
  }

  
  function reopen_object($Vhsad0if43ua) {
    $this->_pdf->reopenObject($Vhsad0if43ua);
    $this->_pdf->saveState();
  }

  
  function close_object() {
    $this->_pdf->restoreState();
    $this->_pdf->closeObject();
  }

  
  function add_object($Vhsad0if43ua, $Vdf3a5upds0t = 'all') {
    $this->_pdf->addObject($Vhsad0if43ua, $Vdf3a5upds0t);
  }

  
  function stop_object($Vhsad0if43ua) {
    $this->_pdf->stopObject($Vhsad0if43ua);
  }

  
  function serialize_object($Vwfsll4zanwn) {
    
    return $this->_pdf->serializeObject($Vwfsll4zanwn);
  }

  
  function reopen_serialized_object($Vxvi2fem1djf) {
    return $this->_pdf->restoreSerializedObject($Vxvi2fem1djf);
  }
    
  

  
  function get_width() { return $this->_width; }

  
  function get_height() { return $this->_height; }

  
  function get_page_number() { return $this->_page_number; }

  
  function get_page_count() { return $this->_page_count; }

  
  function set_page_number($Vcgbfu1dtv3l) { $this->_page_number = $Vcgbfu1dtv3l; }

  
  function set_page_count($Vytbsuz3c5qz) {  $this->_page_count = $Vytbsuz3c5qz; }
    
  
  protected function _set_stroke_color($Vl5jzlxo3j3n) {
    $this->_pdf->setStrokeColor($Vl5jzlxo3j3n);
  }
  
  
  protected function _set_fill_color($Vl5jzlxo3j3n) {
    $this->_pdf->setColor($Vl5jzlxo3j3n);
  }

  
  protected function _set_line_transparency($Vbdcqcmfhadr, $Vjqeycctd35y) {
    $this->_pdf->setLineTransparency($Vbdcqcmfhadr, $Vjqeycctd35y);
  }
  
  
  protected function _set_fill_transparency($Vbdcqcmfhadr, $Vjqeycctd35y) {
    $this->_pdf->setFillTransparency($Vbdcqcmfhadr, $Vjqeycctd35y);
  }

  
  protected function _set_line_style($Vojs2qdgagwv, $Vd4ye0uklqtg, $Vs4mjkcbsell, $V4sfezdtv0w1) {
    $this->_pdf->setLineStyle($Vojs2qdgagwv, $Vd4ye0uklqtg, $Vs4mjkcbsell, $V4sfezdtv0w1);
  }
  
  
  function set_opacity($Vjqeycctd35y, $Vbdcqcmfhadr = "Normal") {
    $this->_set_line_transparency($Vbdcqcmfhadr, $Vjqeycctd35y);
    $this->_set_fill_transparency($Vbdcqcmfhadr, $Vjqeycctd35y);
  }
  
  function set_default_view($Vr2ci5ntypot, $Vobxlvad3352 = array()) {
    array_unshift($Vobxlvad3352, $Vr2ci5ntypot);
    $Vbmkok2113rv = $this->_pdf->currentPage;
    call_user_func_array(array($this->_pdf, "openHere"), $Vobxlvad3352);
  }
  
  

  
  
  protected function y($Vqwmp2bx0ii2) { return $this->_height - $Vqwmp2bx0ii2; }

  

  function line($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vbbuqfp0xqjj, $Vqwmp2bx0ii22, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = array()) {
    

    $this->_set_stroke_color($Vl5jzlxo3j3n);
    $this->_set_line_style($Vojs2qdgagwv, "butt", "", $Vdtcpflt5bhp);
    $this->_pdf->line($Vkiv1idvekdh, $this->y($Vqwmp2bx0ii21),
                      $Vbbuqfp0xqjj, $this->y($Vqwmp2bx0ii22));
  }
                              
  

  
  protected function _convert_gif_bmp_to_png($Vekixvhvrsxu, $V4pigtpor0ln) {
    $Vqktfhyp41pk = Image_Cache::type_to_ext($V4pigtpor0ln);
    $Vyzq0w1i11iv = "imagecreatefrom$Vqktfhyp41pk";
    
    if ( !function_exists($Vyzq0w1i11iv) ) {
      throw new DOMPDF_Exception("Function $Vyzq0w1i11iv() not found.  Cannot convert $Vqktfhyp41pk image: $Vekixvhvrsxu.  Please install the image PHP extension.");
    }

    set_error_handler("record_warnings");
    $Vquww3kxwvky = $Vyzq0w1i11iv($Vekixvhvrsxu);

    if ( $Vquww3kxwvky ) {
      imageinterlace($Vquww3kxwvky, false);

      $V14bngamnuxv = tempnam(DOMPDF_TEMP_DIR, "{$Vqktfhyp41pk}dompdf_img_");
      @unlink($V14bngamnuxv);
      $Vv0mtkrhebac = "$V14bngamnuxv.png";
      $this->_image_cache[] = $Vv0mtkrhebac;

      imagepng($Vquww3kxwvky, $Vv0mtkrhebac);
      imagedestroy($Vquww3kxwvky);
    } 
    else {
      $Vv0mtkrhebac = Image_Cache::$Vz0ll0uhihfp;
    }

    restore_error_handler();
    
    return $Vv0mtkrhebac;
  }

  function rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = array()) {
    $this->_set_stroke_color($Vl5jzlxo3j3n);
    $this->_set_line_style($Vojs2qdgagwv, "butt", "", $Vdtcpflt5bhp);
    $this->_pdf->rectangle($Vkiv1idvekdh, $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko, $Vwsgifrh5ics, $Vvlxmepre4ko);
  }

  
  
  function filled_rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n) {
    $this->_set_fill_color($Vl5jzlxo3j3n);
    $this->_pdf->filledRectangle($Vkiv1idvekdh, $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko, $Vwsgifrh5ics, $Vvlxmepre4ko);
  }
  
  function clipping_rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko) {
    $this->_pdf->clippingRectangle($Vkiv1idvekdh, $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko, $Vwsgifrh5ics, $Vvlxmepre4ko);
  }
  
  function clipping_end() {
    $this->_pdf->clippingEnd();
  }
  
  function save() {
    $this->_pdf->saveState();
  }
  
  function restore() {
    $this->_pdf->restoreState();
  }
  
  function rotate($Vdbkfmikyl2i, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $this->_pdf->rotate($Vdbkfmikyl2i, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  }
  
  function skew($Vdbkfmikyl2i_x, $Vdbkfmikyl2i_y, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $this->_pdf->skew($Vdbkfmikyl2i_x, $Vdbkfmikyl2i_y, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  }
  
  function scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $this->_pdf->scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  }
  
  function translate($Vbzoega0pdxj, $Vxmzwkm4htrf) {
    $this->_pdf->translate($Vbzoega0pdxj, $Vxmzwkm4htrf);
  }
  
  function transform($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo) {
    $this->_pdf->transform(array($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo));
  }

  

  function polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = array(), $Vtbbah5lqvpoill = false) {
    $this->_set_fill_color($Vl5jzlxo3j3n);
    $this->_set_stroke_color($Vl5jzlxo3j3n);
    
    
    for ( $Vfhiq1lhsoja = 1; $Vfhiq1lhsoja < count($Vix4igm1vywd); $Vfhiq1lhsoja += 2)
      $Vix4igm1vywd[$Vfhiq1lhsoja] = $this->y($Vix4igm1vywd[$Vfhiq1lhsoja]);
    
    $this->_pdf->polygon($Vix4igm1vywd, count($Vix4igm1vywd) / 2, $Vtbbah5lqvpoill);
  }

  

  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Veiy0hvfmcw1, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false) {
    $this->_set_fill_color($Vl5jzlxo3j3n);
    $this->_set_stroke_color($Vl5jzlxo3j3n);

    if ( !$Vtbbah5lqvpoill && isset($Vojs2qdgagwv) )
      $this->_set_line_style($Vojs2qdgagwv, "round", "round", $Vdtcpflt5bhp);

    $this->_pdf->ellipse($V1e1eaicqarh, $this->y($Vqwmp2bx0ii2), $Veiy0hvfmcw1, 0, 0, 8, 0, 360, 1, $Vtbbah5lqvpoill);
  }
  
  

  function image($Vkcptinxn5rf, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vbqqcgdk1lyo = "normal") {
    list($Vojs2qdgagwv, $Vvlxmepre4koeight, $V4pigtpor0ln) = dompdf_getimagesize($Vkcptinxn5rf);
    
    
    if (DEBUGPNG) print "[image:$Vkcptinxn5rf|$Vojs2qdgagwv|$Vvlxmepre4koeight|$V4pigtpor0ln]";

    switch ($V4pigtpor0ln) {
    case IMAGETYPE_JPEG:
      if (DEBUGPNG)  print '!!!jpg!!!';
      $this->_pdf->addJpegFromFile($Vkcptinxn5rf, $V1e1eaicqarh, $this->y($Vqwmp2bx0ii2) - $Vvlxmepre4ko, $Vwsgifrh5ics, $Vvlxmepre4ko);
      break;
      
    case IMAGETYPE_GIF:
    case IMAGETYPE_BMP:
      if (DEBUGPNG)  print '!!!bmp or gif!!!';
      
      $Vkcptinxn5rf = $this->_convert_gif_bmp_to_png($Vkcptinxn5rf, $V4pigtpor0ln);

    case IMAGETYPE_PNG:
      if (DEBUGPNG)  print '!!!png!!!';

      $this->_pdf->addPngFromFile($Vkcptinxn5rf, $V1e1eaicqarh, $this->y($Vqwmp2bx0ii2) - $Vvlxmepre4ko, $Vwsgifrh5ics, $Vvlxmepre4ko);
      break;

    default:
      if (DEBUGPNG) print '!!!unknown!!!';
    }
  }

  

  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $Vwsgifrh5icsord_space = 0, $V4y0urwpnd3jhar_space = 0, $Vdbkfmikyl2i = 0) {
    $Vxj5miiauhxo = $this->_pdf;
    
    $Vxj5miiauhxo->setColor($Vl5jzlxo3j3n);
    
    $Vtbbah5lqvpoont .= ".afm";
    $Vxj5miiauhxo->selectFont($Vtbbah5lqvpoont);
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $Vxj5miiauhxo->addText($V1e1eaicqarh, $this->y($Vqwmp2bx0ii2) - $Vxj5miiauhxo->getFontHeight($V4jbadwq4bzj), $V4jbadwq4bzj, $Vkjdq1foihhi, $Vdbkfmikyl2i, $Vwsgifrh5icsord_space, $V4y0urwpnd3jhar_space);
  }

  

  function javascript($V4y0urwpnd3jode) {
    $this->_pdf->addJavascript($V4y0urwpnd3jode);
  }

  

  
  function add_named_dest($Vi3y3l1uvwp3nchorname) {
    $this->_pdf->addDestination($Vi3y3l1uvwp3nchorname, "Fit");
  }

  

  
  function add_link($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vvlxmepre4koeight) {

    $Vqwmp2bx0ii2 = $this->y($Vqwmp2bx0ii2) - $Vvlxmepre4koeight;

    if ( strpos($Vbfatyoohaps, '#') === 0 ) {
      
      $Vcvluzjs3wzb = substr($Vbfatyoohaps,1);
      if ( $Vcvluzjs3wzb )
        $this->_pdf->addInternalLink($Vcvluzjs3wzb, $V1e1eaicqarh, $Vqwmp2bx0ii2, $V1e1eaicqarh + $Vojs2qdgagwv, $Vqwmp2bx0ii2 + $Vvlxmepre4koeight);

    } else {
      $this->_pdf->addLink(rawurldecode($Vbfatyoohaps), $V1e1eaicqarh, $Vqwmp2bx0ii2, $V1e1eaicqarh + $Vojs2qdgagwv, $Vqwmp2bx0ii2 + $Vvlxmepre4koeight);
    }
  }

  

  function get_text_width($Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vwsgifrh5icsord_spacing = 0, $V4y0urwpnd3jhar_spacing = 0) {
    $this->_pdf->selectFont($Vtbbah5lqvpoont);
    if (!DOMPDF_UNICODE_ENABLED) {
      $Vkjdq1foihhi = mb_convert_encoding($Vkjdq1foihhi, 'Windows-1252', 'UTF-8');
    }
    return $this->_pdf->getTextWidth($V4jbadwq4bzj, $Vkjdq1foihhi, $Vwsgifrh5icsord_spacing, $V4y0urwpnd3jhar_spacing);
  }
  
  function register_string_subset($Vtbbah5lqvpoont, $Vlkger5ehs4w) {
    return $this->_pdf->registerText($Vtbbah5lqvpoont, $Vlkger5ehs4w);
  }

  

  function get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj) {
    $this->_pdf->selectFont($Vtbbah5lqvpoont);
    return $this->_pdf->getFontHeight($V4jbadwq4bzj) * DOMPDF_FONT_HEIGHT_RATIO;
  }
  
  
  
  function get_font_baseline($Vtbbah5lqvpoont, $V4jbadwq4bzj) {
    return $this->get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj) / DOMPDF_FONT_HEIGHT_RATIO;
  }

  
  
  
  function page_text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $Vi3y3l1uvwp3djust = 0, $Vdbkfmikyl2i = 0) {
    $Vvfx4pbja4pd = "text";
    $this->_page_text[] = compact("_t", "x", "y", "text", "font", "size", "color", "adjust", "angle");
  }

  
    
  
  function page_script($V4y0urwpnd3jode, $V4pigtpor0ln = "text/php") {
    $Vvfx4pbja4pd = "script";
    $this->_page_text[] = compact("_t", "code", "type");
  }
  
  

  function new_page() {
    $this->_page_number++;
    $this->_page_count++;

    $Vc0brddnw0vm = $this->_pdf->newPage();
    $this->_pages[] = $Vc0brddnw0vm;
    return $Vc0brddnw0vm;
  }
  
  

  
  protected function _add_page_text() {
    
    if ( !count($this->_page_text) )
      return;

    $Ve44xyr0fqi5 = 1;
    $Vnhm0uuykimvval = null;

    foreach ($this->_pages as $Vcme24tphjve) {
      $this->reopen_object($Vcme24tphjve);

      foreach ($this->_page_text as $Vxsn5ifb44at) {
        extract($Vxsn5ifb44at);

        switch ($Vvfx4pbja4pd) {
            
        case "text":
        $Vkjdq1foihhi = str_replace(array("{PAGE_NUM}","{PAGE_COUNT}"),
                            array($Ve44xyr0fqi5, $this->_page_count), $Vkjdq1foihhi);
        $this->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vl5jzlxo3j3n, $Vi3y3l1uvwp3djust, $Vdbkfmikyl2i);
          break;
          
        case "script":
          if (!$Vnhm0uuykimvval) {
            $Vnhm0uuykimvval = new PHP_Evaluator($this);
          }
          $Vnhm0uuykimvval->evaluate($V4y0urwpnd3jode, array('PAGE_NUM' => $Ve44xyr0fqi5, 'PAGE_COUNT' => $this->_page_count));
          break;
        }
      }

      $this->close_object();
      $Ve44xyr0fqi5++;
    }
  }
  
  
  function stream($Vv0mtkrhebac, $Vobxlvad3352 = null) {
    
    $this->_add_page_text();
    
    $Vobxlvad3352["Content-Disposition"] = $Vv0mtkrhebac;
    $this->_pdf->stream($Vobxlvad3352);
  }

  

  
  function output($Vobxlvad3352 = null) {
    
    $this->_add_page_text();

    $Vrec2f1japonebug = isset($Vobxlvad3352["compress"]) && $Vobxlvad3352["compress"] != 1;
    
    return $this->_pdf->output($Vrec2f1japonebug);
  }
  
  

  
  function get_messages() { return $this->_pdf->messages; }
  
}
