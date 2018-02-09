<?php


require_once(DOMPDF_LIB_DIR . '/tcpdf/tcpdf.php');


class TCPDF_Adapter implements Canvas {

  
  static public $Vcn1kpkzkzeg = array(); 
                                        


  
  private $Vqyyzc2szlte;

  
  private $V1hgtvz3lirj;

  
  private $Vcbzw3tnapla;

  
  private $V04bdmg3gftf;

  
  private $Vfykvabmxrke;

  
  private $Vxrvjjpgvfrf;
  
  
  private $Vf4sfkpv1oei;

  
  private $Vjvhvq5h5k4u;

  
  private $Vda1r0kfpr2r;

  
  function __construct($Vrkqqtfn4q2f = "letter", $Viltsyxewtah = "portrait") {
   
    if ( is_array($Vrkqqtfn4q2f) )
      $V4jbadwq4bzj = $Vrkqqtfn4q2f;
    else if ( isset(self::$Vcn1kpkzkzeg[mb_strtolower($Vrkqqtfn4q2f)]) )
      $V4jbadwq4bzj = self::$Vd1e2zixnal1[$Vrkqqtfn4q2f];
    else
      $V4jbadwq4bzj = self::$Vd1e2zixnal1["letter"];

    if ( mb_strtolower($Viltsyxewtah) === "landscape" ) {
      list($V4jbadwq4bzj[2], $V4jbadwq4bzj[3]) = array($V4jbadwq4bzj[3], $V4jbadwq4bzj[2]);
    }

    $this->_width = $V4jbadwq4bzj[2] - $V4jbadwq4bzj[0];
    $this->_height = $V4jbadwq4bzj[3] - $V4jbadwq4bzj[1];

    $this->_pdf = new TCPDF("P", "pt", array($this->_width, $this->_height));
    $this->_pdf->Setcreator("DOMPDF Converter");

    $this->_pdf->AddPage();

    $this->_page_number = $this->_page_count = 1;
    $this->_page_text = array();

    $this->_last_fill_color     =
      $this->_last_stroke_color =
      $this->_last_line_width   = null;

  }  
  
  
  protected function y($Vqwmp2bx0ii2) { return $this->_height - $Vqwmp2bx0ii2; }

  
  protected function _set_stroke_colour($Vgorqf1lwixk) {
    $Vgorqf1lwixk[0] = round(255 * $Vgorqf1lwixk[0]);
    $Vgorqf1lwixk[1] = round(255 * $Vgorqf1lwixk[1]);
    $Vgorqf1lwixk[2] = round(255 * $Vgorqf1lwixk[2]);

    if ( is_null($this->_last_stroke_color) || $Vl5jzlxo3j3n != $this->_last_stroke_color ) {
      $this->_pdf->SetDrawColor($Vl5jzlxo3j3n[0],$Vl5jzlxo3j3n[1],$Vl5jzlxo3j3n[2]);
      $this->_last_stroke_color = $Vl5jzlxo3j3n;
    }

  }

  
  protected function _set_fill_colour($Vgorqf1lwixk) {
    $Vgorqf1lwixk[0] = round(255 * $Vgorqf1lwixk[0]);
    $Vgorqf1lwixk[1] = round(255 * $Vgorqf1lwixk[1]);
    $Vgorqf1lwixk[2] = round(255 * $Vgorqf1lwixk[2]);

    if ( is_null($this->_last_fill_color) || $Vl5jzlxo3j3n != $this->_last_fill_color ) {
      $this->_pdf->SetDrawColor($Vl5jzlxo3j3n[0],$Vl5jzlxo3j3n[1],$Vl5jzlxo3j3n[2]);
      $this->_last_fill_color = $Vl5jzlxo3j3n;
    }

  }

  
  function get_tcpdf() { return $this->_pdf; }
  
  
  function get_page_number() {
    return $this->_page_number;
  }

  
  function get_page_count() {
    return $this->_page_count;
  }

  
  function set_page_count($Vytbsuz3c5qz) {
    $this->_page_count = (int)$Vytbsuz3c5qz;
  }

  
  function line($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vbbuqfp0xqjj, $Vqwmp2bx0ii22, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {

    if ( is_null($this->_last_line_width) || $Vojs2qdgagwv != $this->_last_line_width ) {
      $this->_pdf->SetLineWidth($Vojs2qdgagwv);
      $this->_last_line_width = $Vojs2qdgagwv;
    }

    $this->_set_stroke_colour($Vl5jzlxo3j3n);

    
    $this->_pdf->line($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vbbuqfp0xqjj, $Vqwmp2bx0ii22);
  }

     
  function rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null) {

    if ( is_null($this->_last_line_width) || $Vojs2qdgagwv != $this->_last_line_width ) {
      $this->_pdf->SetLineWidth($Vojs2qdgagwv);
      $this->_last_line_width = $Vojs2qdgagwv;
    }

    $this->_set_stroke_colour($Vl5jzlxo3j3n);
    
    
    $this->_pdf->rect($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko);
    
  }

     
  function filled_rectangle($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n) {

    $this->_set_fill_colour($Vl5jzlxo3j3n);
    
    
    $this->_pdf->rect($Vkiv1idvekdh, $Vqwmp2bx0ii21, $Vwsgifrh5ics, $Vvlxmepre4ko, "F");
  }

  
  function polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vlljqdlim1ql = false) {
    
  }

     
  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vlljqdlim1ql = false) {
    
  }

  
  function image($V0oq1igdwxo4, $Vl4t24at0wmv, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) {
    
  }

  
  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $V2hrzc3jxzua = 0) {
    
  }

  function javascript($V0x4xt3l5phz) {
    
  }
  
  
  function add_named_dest($Vhdfzyomvr4u) {
    
  }

  
  function add_link($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vvlxmepre4koeight) {
    
  }
  
  
  function add_info($Vq04bwg4ulks, $Vp4xjtpabm0l) {
    $Vihjcs2gfuz0 = "Set$Vq04bwg4ulks";
    if ( in_array("Title", "Author", "Keywords", "Subject") && method_exists($this->_pdf, $Vihjcs2gfuz0) ) {
      $this->_pdf->$Vihjcs2gfuz0($Vp4xjtpabm0l);
    }
  }
  
  
  function get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V4blp1adqmut = 0) {
    
  }

  
  function get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj) {
    
  }

  
  
  function new_page() {
    
  }

  
  function stream($Vv0mtkrhebac, $Vobxlvad3352 = null) {
    
  }

  
  function output($Vobxlvad3352 = null) {
    
  }
  
}
    

PDFLib_Adapter::$Vcn1kpkzkzeg = CPDF_Adapter::$Vcn1kpkzkzeg;
