<?php



class Image_Frame_Decorator extends Frame_Decorator {

  
  protected $Vkuycmdufyvp;
  
  
  protected $V4aebemjzjyl;

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    global $Vlb1pyhumpag;
    
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $Vbfatyoohaps = $Vrlbsjbjglkb->get_node()->getAttribute("src");
      
    
    if (DEBUGPNG) print '[__construct '.$Vbfatyoohaps.']';

    list($this->_image_url, $V4pigtpor0ln, $this->_image_msg) = Image_Cache::resolve_url($Vbfatyoohaps,
                                                                          $Vhygqjznl3ul->get_protocol(),
                                                                          $Vhygqjznl3ul->get_host(),
                                                                          $Vhygqjznl3ul->get_base_path());

    if ( Image_Cache::is_broken($this->_image_url) &&
         $V514nfx22xwv = $Vrlbsjbjglkb->get_node()->getAttribute("alt") ) {
      $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
      $Vdtcpflt5bhp->width  = (4/3)*Font_Metrics::get_text_width($V514nfx22xwv, $Vdtcpflt5bhp->font_family, $Vdtcpflt5bhp->font_size, $Vdtcpflt5bhp->word_spacing);
      $Vdtcpflt5bhp->height = Font_Metrics::get_font_height($Vdtcpflt5bhp->font_family, $Vdtcpflt5bhp->font_size);
    }
  }

  
  function get_image_url() {
    return $this->_image_url;
  }

  
  function get_image_msg() {
    return $this->_image_msg;
  }
  
}
