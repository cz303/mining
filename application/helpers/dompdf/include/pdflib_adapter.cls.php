<?php



class PDFLib_Adapter implements Canvas {

  
  static public $Vcn1kpkzkzeg = array(); 
                                        

  
  static $Vsf5w5qun0rc = true;

  
  private $Vqyyzc2szlte;

  
  private $Vvsihglkzhhu;

  
  private $V1hgtvz3lirj;

  
  private $Vcbzw3tnapla;

  
  private $V04bdmg3gftf;

  
  private $Vfykvabmxrke;

  
  private $V3witdzbjlya;

  
  private $Vmmzwv2d5dp1;

  
  private $V2zfetro3jiy;

  
  private $V20axuh23kms;

  
  private $Vf4sfkpv1oei;

  
  private $Vjvhvq5h5k4u;

  
  private $Vda1r0kfpr2r;

  
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
    
    $this->_width = $V4jbadwq4bzj[2] - $V4jbadwq4bzj[0];
    $this->_height= $V4jbadwq4bzj[3] - $V4jbadwq4bzj[1];

    $this->_pdf = new PDFLib();

    if ( defined("DOMPDF_PDFLIB_LICENSE") )
      $this->_pdf->set_parameter( "license", DOMPDF_PDFLIB_LICENSE);

    $this->_pdf->set_parameter("textformat", "utf8");
    $this->_pdf->set_parameter("fontwarning", "false");

    $this->_pdf->set_info("Creator", "DOMPDF");

    
    $Vqz5niw1nmpo = @date_default_timezone_get();
    date_default_timezone_set("UTC");
    $this->_pdf->set_info("Date", date("Y-m-d"));
    date_default_timezone_set($Vqz5niw1nmpo);

    if ( self::$Vsf5w5qun0rc )
      $this->_pdf->begin_document("","");
    else {
      $V14bngamnuxv = tempnam(DOMPDF_TEMP_DIR, "libdompdf_pdf_");
      @unlink($V14bngamnuxv);
      $this->_file = "$V14bngamnuxv.pdf";
      $this->_pdf->begin_document($this->_file,"");
    }

    $this->_pdf->begin_page_ext($this->_width, $this->_height, "");

    $this->_page_number = $this->_page_count = 1;
    $this->_page_text = array();

    $this->_imgs = array();
    $this->_fonts = array();
    $this->_objs = array();

    
    $Vh5ypxk5jjwi = Font_Metrics::get_font_families();
    foreach ($Vh5ypxk5jjwi as $Vt5aj1423wg2 => $V0u2szlcgtg2) {
      foreach ($V0u2szlcgtg2 as $Vdtcpflt5bhp => $Vg5mhfl1beoi) {
        $Vma31a13k3ji = basename($Vg5mhfl1beoi);

        
        if ( file_exists("$Vg5mhfl1beoi.ttf") ) {
          $Vcfom0htfami = "$Vg5mhfl1beoi.ttf";
          $Vithgy1qpssf = null;

        } else if ( file_exists("$Vg5mhfl1beoi.TTF") ) {
          $Vcfom0htfami = "$Vg5mhfl1beoi.TTF";
          $Vithgy1qpssf = null;

        } else if ( file_exists("$Vg5mhfl1beoi.pfb") ) {
          $Vcfom0htfami = "$Vg5mhfl1beoi.pfb";

          if ( file_exists("$Vg5mhfl1beoi.afm") )
            $Vithgy1qpssf = "$Vg5mhfl1beoi.afm";

        } else if ( file_exists("$Vg5mhfl1beoi.PFB") ) {
          $Vcfom0htfami = "$Vg5mhfl1beoi.PFB";
          if ( file_exists("$Vg5mhfl1beoi.AFM") )
            $Vithgy1qpssf = "$Vg5mhfl1beoi.AFM";
        } else
          continue;

        $this->_pdf->set_parameter("FontOutline", "\{$Vma31a13k3ji\}=\{$Vcfom0htfami\}");
        if ( !is_null($Vithgy1qpssf) )
          $this->_pdf->set_parameter("FontAFM", "\{$Vma31a13k3ji\}=\{$Vithgy1qpssf\}");
      }
    }
  }

  
  protected function _close() {
    $this->_place_objects();

    
    $this->_pdf->suspend_page("");
    for ($Vzqw0ieauwu4 = 1; $Vzqw0ieauwu4 <= $this->_page_count; $Vzqw0ieauwu4++) {
      $this->_pdf->resume_page("pagenumber=$Vzqw0ieauwu4");
      $this->_pdf->end_page_ext("");
    }

    $this->_pdf->end_document("");
  }


  
  function get_pdflib() { return $this->_pdf; }

  
  function add_info($Vq04bwg4ulks, $Vp4xjtpabm0l) {
    $this->_pdf->set_info($Vq04bwg4ulks, $Vp4xjtpabm0l);
  }
  
  
  function open_object() {
    $this->_pdf->suspend_page("");
    $Vc0brddnw0vm = $this->_pdf->begin_template($this->_width, $this->_height);
    $this->_pdf->save();
    $this->_objs[$Vc0brddnw0vm] = array("start_page" => $this->_page_number);
    return $Vc0brddnw0vm;
  }

  
  function reopen_object($Vhsad0if43ua) {
    throw new DOMPDF_Exception("PDFLib does not support reopening objects.");
  }

  
  function close_object() {
    $this->_pdf->restore();
    $this->_pdf->end_template();
    $this->_pdf->resume_page("pagenumber=".$this->_page_number);
  }

  
  function add_object($Vhsad0if43ua, $Vdf3a5upds0t = 'all') {

    if ( mb_strpos($Vdf3a5upds0t, "next") !== false ) {
      $this->_objs[$Vhsad0if43ua]["start_page"]++;
      $Vdf3a5upds0t = str_replace("next", "", $Vdf3a5upds0t);
      if ( $Vdf3a5upds0t == "" )
        $Vdf3a5upds0t = "add";
    }

    $this->_objs[$Vhsad0if43ua]["where"] = $Vdf3a5upds0t;
  }

  
  function stop_object($Vhsad0if43ua) {

    if ( !isset($this->_objs[$Vhsad0if43ua]) )
      return;

    $Vvzcx2qx0r4o = $this->_objs[$Vhsad0if43ua]["start_page"];
    $Vdf3a5upds0t = $this->_objs[$Vhsad0if43ua]["where"];

    
    if ( $this->_page_number >= $Vvzcx2qx0r4o &&
         (($this->_page_number % 2 == 0 && $Vdf3a5upds0t === "even") ||
          ($this->_page_number % 2 == 1 && $Vdf3a5upds0t === "odd") ||
          ($Vdf3a5upds0t === "all")) )
      $this->_pdf->fit_image($Vhsad0if43ua,0,0,"");

    $this->_objs[$Vhsad0if43ua] = null;
    unset($this->_objs[$Vhsad0if43ua]);
  }

  
  protected function _place_objects() {

    foreach ( $this->_objs as $Vxvi2fem1djf => $Vzqw0ieauwu4rops ) {
      $Vvzcx2qx0r4o = $Vzqw0ieauwu4rops["start_page"];
      $Vdf3a5upds0t = $Vzqw0ieauwu4rops["where"];

      
      if ( $this->_page_number >= $Vvzcx2qx0r4o &&
           (($this->_page_number % 2 == 0 && $Vdf3a5upds0t === "even") ||
            ($this->_page_number % 2 == 1 && $Vdf3a5upds0t === "odd") ||
            ($Vdf3a5upds0t === "all")) ) {
        $this->_pdf->fit_image($Vxvi2fem1djf,0,0,"");
      }
    }

  }

  function get_width() { return $this->_width; }

  function get_height() { return $this->_height; }

  function get_page_number() { return $this->_page_number; }

  function get_page_count() { return $this->_page_count; }

  function set_page_number($Vcgbfu1dtv3l) { $this->_page_number = (int)$Vcgbfu1dtv3l; }

  function set_page_count($Vytbsuz3c5qz) { $this->_page_count = (int)$Vytbsuz3c5qz; }


  
  protected function _set_line_style($Vojs2qdgagwv, $Vd4ye0uklqtg, $Vs4mjkcbsell, $V4sfezdtv0w1) {

    if ( count($V4sfezdtv0w1) == 1 )
      $V4sfezdtv0w1[] = $V4sfezdtv0w1[0];

    if ( count($V4sfezdtv0w1) > 1 )
      $this->_pdf->setdashpattern("dasharray={" . implode(" ", $V4sfezdtv0w1) . "}");
    else
      $this->_pdf->setdash(0,0);

    switch ( $Vs4mjkcbsell ) {
    case "miter":
      $this->_pdf->setlinejoin(0);
      break;

    case "round":
      $this->_pdf->setlinejoin(1);
      break;

    case "bevel":
      $this->_pdf->setlinejoin(2);
      break;

    default:
      break;
    }

    switch ( $Vd4ye0uklqtg ) {
    case "butt":
      $this->_pdf->setlinecap(0);
      break;

    case "round":
      $this->_pdf->setlinecap(1);
      break;

    case "square":
      $this->_pdf->setlinecap(2);
      break;

    default:
      break;
    }

    $this->_pdf->setlinewidth($Vojs2qdgagwv);

  }

  
  protected function _set_stroke_color($Vl5jzlxo3j3n) {
    if($this->_last_stroke_color == $Vl5jzlxo3j3n)
      return;

    $this->_last_stroke_color = $Vl5jzlxo3j3n;

    if (isset($Vl5jzlxo3j3n[3])) {
      $V4pigtpor0ln = "cmyk";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], $Vl5jzlxo3j3n[2], $Vl5jzlxo3j3n[3]);
    }
    elseif (isset($Vl5jzlxo3j3n[2])) {
      $V4pigtpor0ln = "rgb";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], $Vl5jzlxo3j3n[2], null);
    }
    else {
      $V4pigtpor0ln = "gray";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], null, null);
    }
    
    $this->_pdf->setcolor("stroke", $V4pigtpor0ln, $Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35);
  }

  
  protected function _set_fill_color($Vl5jzlxo3j3n) {
    if($this->_last_fill_color == $Vl5jzlxo3j3n)
      return;

    $this->_last_fill_color = $Vl5jzlxo3j3n;

      if (isset($Vl5jzlxo3j3n[3])) {
      $V4pigtpor0ln = "cmyk";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], $Vl5jzlxo3j3n[2], $Vl5jzlxo3j3n[3]);
    }
    elseif (isset($Vl5jzlxo3j3n[2])) {
      $V4pigtpor0ln = "rgb";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], $Vl5jzlxo3j3n[2], null);
    }
    else {
      $V4pigtpor0ln = "gray";
      list($Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35) = array($Vl5jzlxo3j3n[0], $Vl5jzlxo3j3n[1], null, null);
    }
    
    $this->_pdf->setcolor("fill", $V4pigtpor0ln, $Vxc4jqbmntad, $V1qv1g2vnwq5, $Vqqteop2ynml, $Vq2x3u30wk35);
  }
  
  
  function set_opacity($Vjqeycctd35y, $Vbdcqcmfhadr = "Normal") {
    if ( $Vbdcqcmfhadr === "Normal" ) {
      $Vpljpnw35plt = $this->_pdf->create_gstate("opacityfill=$Vjqeycctd35y opacitystroke=$Vjqeycctd35y");
      $this->_pdf->set_gstate($Vpljpnw35plt);
    }
  }
  
  function set_default_view($Vr2ci5ntypot, $Vobxlvad3352 = array()) {
    
    
    
    
  }

  
  protected function _load_font($Vj0kojsfk0h3, $V5mmmrje2ymm = null, $Vobxlvad3352 = "") {

    
    
    $Vsoorx5hptht = strtolower(basename($Vj0kojsfk0h3));
    if ( in_array($Vsoorx5hptht, DOMPDF::$Vwnw250y2anx) ) {
      $Vj0kojsfk0h3 = basename($Vj0kojsfk0h3);

    } else {
      
      $Vobxlvad3352 .= " embedding=true";
    }

    if ( is_null($V5mmmrje2ymm) ) {

      
      
      if ( defined("DOMPDF_PDFLIB_LICENSE") )
        $V5mmmrje2ymm = "unicode";
      else
        $V5mmmrje2ymm = "auto";

    }

    $Vseq1edikdvg = "$Vj0kojsfk0h3:$V5mmmrje2ymm:$Vobxlvad3352";

    if ( isset($this->_fonts[$Vseq1edikdvg]) )
      return $this->_fonts[$Vseq1edikdvg];

    else {

      $this->_fonts[$Vseq1edikdvg] = $this->_pdf->load_font($Vj0kojsfk0h3, $V5mmmrje2ymm, $Vobxlvad3352);
      return $this->_fonts[$Vseq1edikdvg];

    }

  }

  
  protected function y($Vqwmp2bx0ii2) { return $this->_height - $Vqwmp2bx0ii2; }

  

  function line($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vbbuqfp0xqjj, $Vqwmp2bx0ii22, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {
    $this->_set_line_style($Vojs2qdgagwv, "butt", "", $Vdtcpflt5bhp);
    $this->_set_stroke_color($Vl5jzlxo3j3n);

    $Vqwmp2bx0ii21 = $this->y($Vqwmp2bx0ii21);
    $Vqwmp2bx0ii22 = $this->y($Vqwmp2bx0ii22);

    $this->_pdf->moveto($Vkiv1idvekdh,$Vqwmp2bx0ii21);
    $this->_pdf->lineto($Vbbuqfp0xqjj, $Vqwmp2bx0ii22);
    $this->_pdf->stroke();
  }

  

  function rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {
    $this->_set_stroke_color($Vl5jzlxo3j3n);
    $this->_set_line_style($Vojs2qdgagwv, "butt", "", $Vdtcpflt5bhp);

    $Vqwmp2bx0ii21 = $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko;

    $this->_pdf->rect($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko);
    $this->_pdf->stroke();
  }

  

  function filled_rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n) {
    $this->_set_fill_color($Vl5jzlxo3j3n);

    $Vqwmp2bx0ii21 = $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko;

    $this->_pdf->rect(floatval($Vkiv1idvekdh), floatval($Vqwmp2bx0ii21), floatval($Vwsgifrh5ics), floatval($Vvlxmepre4ko));
    $this->_pdf->fill();
  }
  
  function clipping_rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko) {
    $this->_pdf->save();
    
    $Vqwmp2bx0ii21 = $this->y($Vqwmp2bx0ii21) - $Vvlxmepre4ko;
    
    $this->_pdf->rect(floatval($Vkiv1idvekdh), floatval($Vqwmp2bx0ii21), floatval($Vwsgifrh5ics), floatval($Vvlxmepre4ko));
    $this->_pdf->clip();
  }
  
  function clipping_end() {
    $this->_pdf->restore();
  }
  
  function save() {
    $this->_pdf->save();
  }
  
  function restore() {
    $this->_pdf->restore();
  }
  
  function rotate($Vdbkfmikyl2i, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vzqw0ieauwu4df = $this->_pdf;
    $Vzqw0ieauwu4df->translate($V1e1eaicqarh, $this->_height-$Vqwmp2bx0ii2);
    $Vzqw0ieauwu4df->rotate(-$Vdbkfmikyl2i);
    $Vzqw0ieauwu4df->translate(-$V1e1eaicqarh, -$this->_height+$Vqwmp2bx0ii2);
  }
  
  function skew($Vdbkfmikyl2i_x, $Vdbkfmikyl2i_y, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vzqw0ieauwu4df = $this->_pdf;
    $Vzqw0ieauwu4df->translate($V1e1eaicqarh, $this->_height-$Vqwmp2bx0ii2);
    $Vzqw0ieauwu4df->skew($Vdbkfmikyl2i_y, $Vdbkfmikyl2i_x); 
    $Vzqw0ieauwu4df->translate(-$V1e1eaicqarh, -$this->_height+$Vqwmp2bx0ii2);
  }
  
  function scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vzqw0ieauwu4df = $this->_pdf;
    $Vzqw0ieauwu4df->translate($V1e1eaicqarh, $this->_height-$Vqwmp2bx0ii2);
    $Vzqw0ieauwu4df->scale($Vym2kir0ppig, $V10bbkmr2ebo);
    $Vzqw0ieauwu4df->translate(-$V1e1eaicqarh, -$this->_height+$Vqwmp2bx0ii2);
  }
  
  function translate($Vbzoega0pdxj, $Vxmzwkm4htrf) {
    $this->_pdf->translate($Vbzoega0pdxj, -$Vxmzwkm4htrf);
  }
  
  function transform($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo) {
    $this->_pdf->concat($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo);
  }

  

  function polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false) {

    $this->_set_fill_color($Vl5jzlxo3j3n);
    $this->_set_stroke_color($Vl5jzlxo3j3n);

    if ( !$Vtbbah5lqvpoill && isset($Vojs2qdgagwv) )
      $this->_set_line_style($Vojs2qdgagwv, "square", "miter", $Vdtcpflt5bhp);

    $Vqwmp2bx0ii2 = $this->y(array_pop($Vzqw0ieauwu4oints));
    $V1e1eaicqarh = array_pop($Vzqw0ieauwu4oints);
    $this->_pdf->moveto($V1e1eaicqarh,$Vqwmp2bx0ii2);

    while (count($Vzqw0ieauwu4oints) > 1) {
      $Vqwmp2bx0ii2 = $this->y(array_pop($Vzqw0ieauwu4oints));
      $V1e1eaicqarh = array_pop($Vzqw0ieauwu4oints);
      $this->_pdf->lineto($V1e1eaicqarh,$Vqwmp2bx0ii2);
    }

    if ( $Vtbbah5lqvpoill )
      $this->_pdf->fill();
    else
      $this->_pdf->closepath_stroke();
  }

  

  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false) {

    $this->_set_fill_color($Vl5jzlxo3j3n);
    $this->_set_stroke_color($Vl5jzlxo3j3n);

    if ( !$Vtbbah5lqvpoill && isset($Vojs2qdgagwv) )
      $this->_set_line_style($Vojs2qdgagwv, "round", "round", $Vdtcpflt5bhp);

    $Vqwmp2bx0ii2 = $this->y($Vqwmp2bx0ii2);

    $this->_pdf->circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo);

    if ( $Vtbbah5lqvpoill )
      $this->_pdf->fill();
    else
      $this->_pdf->stroke();

  }

  

  function image($V0oq1igdwxo4, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vws44nszhvgoesolution = "normal") {
    $Vwsgifrh5ics = (int)$Vwsgifrh5ics;
    $Vvlxmepre4ko = (int)$Vvlxmepre4ko;

    $Vl4t24at0wmv = Image_Cache::detect_type($V0oq1igdwxo4);
    $Vkoder01kgzr  = Image_Cache::type_to_ext($Vl4t24at0wmv);

    if ( isset($this->_imgs[$V0oq1igdwxo4]) ) {
      $Vkcptinxn5rf = $this->_imgs[$V0oq1igdwxo4];
    }
    else {
      $Vkcptinxn5rf = $this->_imgs[$V0oq1igdwxo4] = $this->_pdf->load_image($Vl4t24at0wmv, $V0oq1igdwxo4, "");
    }

    $Vqwmp2bx0ii2 = $this->y($Vqwmp2bx0ii2) - $Vvlxmepre4ko;
    $this->_pdf->fit_image($Vkcptinxn5rf, $V1e1eaicqarh, $Vqwmp2bx0ii2, "boxsize=\{$Vwsgifrh5ics $Vvlxmepre4ko\} fitmethod=entire");
  }

  

  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $Vwsgifrh5icsord_spacing = 0, $V4y0urwpnd3jhar_spacing = 0, $Vdbkfmikyl2i = 0) {
    $Vtbbah5lqvpoh = $this->_load_font($Vj0kojsfk0h3);

    $this->_pdf->setfont($Vtbbah5lqvpoh, $V4jbadwq4bzj);
    $this->_set_fill_color($Vl5jzlxo3j3n);

    $Vqwmp2bx0ii2 = $this->y($Vqwmp2bx0ii2) - Font_Metrics::get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj);

    $Vwsgifrh5icsord_spacing = (float)$Vwsgifrh5icsord_spacing;
    $V4y0urwpnd3jhar_spacing = (float)$V4y0urwpnd3jhar_spacing;
    $Vdbkfmikyl2i        = -(float)$Vdbkfmikyl2i;

    $this->_pdf->fit_textline($Vkjdq1foihhi, $V1e1eaicqarh, $Vqwmp2bx0ii2, "rotate=$Vdbkfmikyl2i wordspacing=$Vwsgifrh5icsord_spacing charspacing=$V4y0urwpnd3jhar_spacing ");

  }

  
  
  function javascript($V4y0urwpnd3jode) {
    if ( defined("DOMPDF_PDFLIB_LICENSE") ) {
      $this->_pdf->create_action("JavaScript", $V4y0urwpnd3jode);
    }
  }

  

  
  function add_named_dest($Vi3y3l1uvwp3nchorname) {
    $this->_pdf->add_nameddest($Vi3y3l1uvwp3nchorname,"");
  }

  

  
  function add_link($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vvlxmepre4koeight) {

    $Vqwmp2bx0ii2 = $this->y($Vqwmp2bx0ii2) - $Vvlxmepre4koeight;
    if ( strpos($Vbfatyoohaps, '#') === 0 ) {
      
      $Vcvluzjs3wzb = substr($Vbfatyoohaps,1);
      if ( $Vcvluzjs3wzb )
        $this->_pdf->create_annotation($V1e1eaicqarh, $Vqwmp2bx0ii2, $V1e1eaicqarh + $Vojs2qdgagwv, $Vqwmp2bx0ii2 + $Vvlxmepre4koeight, 'Link', "contents={$Vbfatyoohaps} destname=". substr($Vbfatyoohaps,1) . " linewidth=0");
    } else {

      list($Vzqw0ieauwu4roto, $Vvlxmepre4koost, $Vzqw0ieauwu4ath, $Vg5mhfl1beoi) = explode_url($Vbfatyoohaps);

      if ( $Vzqw0ieauwu4roto == "" || $Vzqw0ieauwu4roto === "file://" )
        return; 
      $Vbfatyoohaps = build_url($Vzqw0ieauwu4roto, $Vvlxmepre4koost, $Vzqw0ieauwu4ath, $Vg5mhfl1beoi);
      $Vbfatyoohaps = '{' . rawurldecode($Vbfatyoohaps) . '}';
      
      $Vi3y3l1uvwp3ction = $this->_pdf->create_action("URI", "url=" . $Vbfatyoohaps);
      $this->_pdf->create_annotation($V1e1eaicqarh, $Vqwmp2bx0ii2, $V1e1eaicqarh + $Vojs2qdgagwv, $Vqwmp2bx0ii2 + $Vvlxmepre4koeight, 'Link', "contents={$Vbfatyoohaps} action={activate=$Vi3y3l1uvwp3ction} linewidth=0");
    }
  }

  

  function get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vwsgifrh5icsord_spacing = 0, $Vt3ysjc45zcq = 0) {
    $Vtbbah5lqvpoh = $this->_load_font($Vj0kojsfk0h3);

    
    $Vcgbfu1dtv3l_spaces = mb_substr_count($Vkjdq1foihhi," ");
    $Vrec2f1japonelta = $Vwsgifrh5icsord_spacing * $Vcgbfu1dtv3l_spaces;
    
    if ( $Vt3ysjc45zcq ) {
      $Vcgbfu1dtv3l_chars = mb_strlen($Vkjdq1foihhi);
      $Vrec2f1japonelta += ($Vcgbfu1dtv3l_chars - $Vcgbfu1dtv3l_spaces) * $Vt3ysjc45zcq;
    }
    
    return $this->_pdf->stringwidth($Vkjdq1foihhi, $Vtbbah5lqvpoh, $V4jbadwq4bzj) + $Vrec2f1japonelta;
  }

  

  function get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj) {

    $Vtbbah5lqvpoh = $this->_load_font($Vj0kojsfk0h3);

    $this->_pdf->setfont($Vtbbah5lqvpoh, $V4jbadwq4bzj);

    $Vi3y3l1uvwp3sc = $this->_pdf->get_value("ascender", $Vtbbah5lqvpoh);
    $Vrec2f1japonesc = $this->_pdf->get_value("descender", $Vtbbah5lqvpoh);

    
    return $V4jbadwq4bzj * ($Vi3y3l1uvwp3sc - $Vrec2f1japonesc) * DOMPDF_FONT_HEIGHT_RATIO;
  }
  
  function get_font_baseline($Vj0kojsfk0h3, $V4jbadwq4bzj) {
    return $this->get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj) / DOMPDF_FONT_HEIGHT_RATIO * 1.1;
  }

  

  
  function page_text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0),
                     $Vi3y3l1uvwp3djust = 0, $Vdbkfmikyl2i = 0) {
    $Vvfx4pbja4pd = "text";
    $this->_page_text[] = compact("_t", "x", "y", "text", "font", "size", "color", "adjust", "angle");
  }

  

  
  function page_script($V4y0urwpnd3jode, $V4pigtpor0ln = "text/php") {
    $Vvfx4pbja4pd = "script";
    $this->_page_text[] = compact("_t", "code", "type");
  }

  

  function new_page() {

    
    $this->_place_objects();

    $this->_pdf->suspend_page("");
    $this->_pdf->begin_page_ext($this->_width, $this->_height, "");
    $this->_page_number = ++$this->_page_count;

  }

  

  
  protected function _add_page_text() {

    if ( !count($this->_page_text) )
      return;

    $this->_pdf->suspend_page("");

    for ($Vzqw0ieauwu4 = 1; $Vzqw0ieauwu4 <= $this->_page_count; $Vzqw0ieauwu4++) {
      $this->_pdf->resume_page("pagenumber=$Vzqw0ieauwu4");

      foreach ($this->_page_text as $Vzqw0ieauwu4t) {
        extract($Vzqw0ieauwu4t);

        switch ($Vvfx4pbja4pd) {

        case "text":
          $Vkjdq1foihhi = str_replace(array("{PAGE_NUM}","{PAGE_COUNT}"),
                              array($Vzqw0ieauwu4, $this->_page_count), $Vkjdq1foihhi);
          $this->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n, $Vi3y3l1uvwp3djust, $Vdbkfmikyl2i);
          break;

        case "script":
          if (!$Vnhm0uuykimvval) {
            $Vnhm0uuykimvval = new PHP_Evaluator($this);
          }
          $Vnhm0uuykimvval->evaluate($V4y0urwpnd3jode, array('PAGE_NUM' => $Vzqw0ieauwu4, 'PAGE_COUNT' => $this->_page_count));
          break;
        }
      }

      $this->_pdf->suspend_page("");
    }

    $this->_pdf->resume_page("pagenumber=".$this->_page_number);
  }

  

  function stream($Vg5mhfl1beoiname, $Vobxlvad3352 = null) {

    
    $this->_add_page_text();

    if ( isset($Vobxlvad3352["compress"]) && $Vobxlvad3352["compress"] != 1 )
      $this->_pdf->set_value("compress", 0);
    else
      $this->_pdf->set_value("compress", 6);

    $this->_close();

    if ( self::$Vsf5w5qun0rc ) {
      $Vrec2f1japonata = $this->_pdf->get_buffer();
      $V4jbadwq4bzj = strlen($Vrec2f1japonata);

    } else
      $V4jbadwq4bzj = filesize($this->_file);


    $Vg5mhfl1beoiname = str_replace(array("\n","'"),"", $Vg5mhfl1beoiname);
    $Vi3y3l1uvwp3ttach = (isset($Vobxlvad3352["Attachment"]) && $Vobxlvad3352["Attachment"]) ? "attachment" : "inline";

    header("Cache-Control: private");
    header("Content-type: application/pdf");
    header("Content-Disposition: $Vi3y3l1uvwp3ttach; filename=\"$Vg5mhfl1beoiname\"");

    

    if ( self::$Vsf5w5qun0rc )
      echo $Vrec2f1japonata;

    else {

      
      $V4y0urwpnd3jhunk = (1 << 21); 
      $Vtbbah5lqvpoh = fopen($this->_file, "rb");
      if ( !$Vtbbah5lqvpoh )
        throw new DOMPDF_Exception("Unable to load temporary PDF file: " . $this->_file);

      while ( !feof($Vtbbah5lqvpoh) )
        echo fread($Vtbbah5lqvpoh,$V4y0urwpnd3jhunk);
      fclose($Vtbbah5lqvpoh);

      
      if (DEBUGPNG) print '[pdflib stream unlink '.$this->_file.']';
      if (!DEBUGKEEPTEMP)

      unlink($this->_file);
      $this->_file = null;
      unset($this->_file);
    }

    flush();
  }

  

  function output($Vobxlvad3352 = null) {

    
    $this->_add_page_text();

    if ( isset($Vobxlvad3352["compress"]) && $Vobxlvad3352["compress"] != 1 )
      $this->_pdf->set_value("compress", 0);
    else
      $this->_pdf->set_value("compress", 6);

    $this->_close();

    if ( self::$Vsf5w5qun0rc )
      $Vrec2f1japonata = $this->_pdf->get_buffer();

    else {
      $Vrec2f1japonata = file_get_contents($this->_file);

      
      if (DEBUGPNG) print '[pdflib output unlink '.$this->_file.']';
      if (!DEBUGKEEPTEMP)

      unlink($this->_file);
      $this->_file = null;
      unset($this->_file);
    }

    return $Vrec2f1japonata;
  }
}


PDFLib_Adapter::$Vcn1kpkzkzeg = CPDF_Adapter::$Vcn1kpkzkzeg;
