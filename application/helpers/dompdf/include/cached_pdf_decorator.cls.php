<?php



class Cached_PDF_Decorator extends CPDF_Adapter implements Canvas {
  protected $Vqyyzc2szlte;
  protected $Vyy4fexnhsj0;
  protected $Vl2d5acngv50;
  protected $Vmmzwv2d5dp1;  
  
  function __construct($Vt12rspqulrh, CPDF_Adapter $Vxj5miiauhxo) {
    $this->_pdf = $Vxj5miiauhxo;
    $this->_cache_id = $Vt12rspqulrh;
    $this->_fonts = array();
    
    $this->_current_page_id = $this->_pdf->open_object();
  }

  

  function get_cpdf() { return $this->_pdf->get_cpdf(); }

  function open_object() { $this->_pdf->open_object(); }
  function reopen_object() { return $this->_pdf->reopen_object(); }
  
  function close_object() { $this->_pdf->close_object(); }

  function add_object($Vhsad0if43ua, $Vdf3a5upds0t = 'all') { $this->_pdf->add_object($Vhsad0if43ua, $Vdf3a5upds0t); }

  function serialize_object($Vwfsll4zanwn) { $this->_pdf->serialize_object($Vwfsll4zanwn); }

  function reopen_serialized_object($Vxvi2fem1djf) { $this->_pdf->reopen_serialized_object($Vxvi2fem1djf); }
    
  

  function get_width() { return $this->_pdf->get_width(); }
  function get_height() {  return $this->_pdf->get_height(); }
  function get_page_number() { return $this->_pdf->get_page_number(); }
  function get_page_count() { return $this->_pdf->get_page_count(); }

  function set_page_number($Vcgbfu1dtv3l) { $this->_pdf->set_page_number($Vcgbfu1dtv3l); }
  function set_page_count($Vytbsuz3c5qz) { $this->_pdf->set_page_count($Vytbsuz3c5qz); }

  function line($Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = array()) {
    $this->_pdf->line($Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp);
  }
                              
  function rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = array()) {
    $this->_pdf->rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp);
  }
 
  function filled_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n) {
    $this->_pdf->filled_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n);
  }
    
  function polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = array(), $Vlljqdlim1ql = false) {
    $this->_pdf->polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp, $Vlljqdlim1ql);
  }

  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Veiy0hvfmcw1, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vlljqdlim1ql = false) {
    $this->_pdf->circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Veiy0hvfmcw1, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp, $Vlljqdlim1ql);
  }

  function image($V0oq1igdwxo4, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null) {
    $this->_pdf->image($V0oq1igdwxo4, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);
  }
  
  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $V2hrzc3jxzua = 0, $Vdbkfmikyl2i = 0) {
    $this->_fonts[$Vj0kojsfk0h3] = true;
    $this->_pdf->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n, $V2hrzc3jxzua, $Vdbkfmikyl2i);
  }

  function page_text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $V2hrzc3jxzua = 0, $Vdbkfmikyl2i = 0) {
    
    
    $this->_pdf->close_object();
    $this->_pdf->page_text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $Vl5jzlxo3j3n, $V2hrzc3jxzua, $Vdbkfmikyl2i);
    $this->_pdf->reopen_object($this->_current_page_id);
  }
  
  function page_script($Vcspqqxxfvpf, $V4pigtpor0ln = 'text/php') {
    
    
    $this->_pdf->close_object();
    $this->_pdf->page_script($Vcspqqxxfvpf, $V4pigtpor0ln);
    $this->_pdf->reopen_object($this->_current_page_id);
  }
  
  function new_page() {
    $this->_pdf->close_object();

    
    $this->_pdf->add_object($this->_current_page_id, "add");
    $this->_pdf->new_page();    

    Page_Cache::store_page($this->_cache_id,
                           $this->_pdf->get_page_number() - 1,
                           $this->_pdf->serialize_object($this->_current_page_id));

    $this->_current_page_id = $this->_pdf->open_object();
    return $this->_current_page_id;
  }
  
  function stream($Vv0mtkrhebac) {
    
    if ( !is_null($this->_current_page_id) ) {
      $this->_pdf->close_object();
      $this->_pdf->add_object($this->_current_page_id, "add");
      Page_Cache::store_page($this->_cache_id,
                             $this->_pdf->get_page_number(),
                             $this->_pdf->serialize_object($this->_current_page_id));
      Page_Cache::store_fonts($this->_cache_id, $this->_fonts);
      $this->_current_page_id = null;
    }
    
    $this->_pdf->stream($Vv0mtkrhebac);
    
  }
  
  function &output() {
    
    if ( !is_null($this->_current_page_id) ) {
      $this->_pdf->close_object();
      $this->_pdf->add_object($this->_current_page_id, "add");
      Page_Cache::store_page($this->_cache_id,
                             $this->_pdf->get_page_number(),
                             $this->_pdf->serialize_object($this->_current_page_id));
      $this->_current_page_id = null;
    }
    
    return $this->_pdf->output();
  }
  
  function get_messages() { return $this->_pdf->get_messages(); }
  
}
