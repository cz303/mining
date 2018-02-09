<?php



class Text_Frame_Decorator extends Frame_Decorator {
  
  
  protected $Vaqvuzvxgnpc;
  
  
  public static $Vtsjz2ewloag;
  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    if ( !$Vrlbsjbjglkb->is_text_node() )
      throw new DOMPDF_Exception("Text_Decorator can only be applied to #text nodes.");
    
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $this->_text_spacing = null;
  }

  

  function reset() {
    parent::reset();
    $this->_text_spacing = null;
  }
  
  

  
  function get_text_spacing() { return $this->_text_spacing; }
      
  function get_text() {
    













    return $this->_frame->get_node()->data;
  }

  

  

  
  
  
  
  
  
  function get_margin_height() {
    
    
    
    $Vdtcpflt5bhp = $this->get_style();
    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;
    $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;

    

    return ($Vdtcpflt5bhp->line_height / $V4jbadwq4bzj) * Font_Metrics::get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj);
    
  }

  function get_padding_box() {
    $Vxw3eikvhq3k = $this->_frame->get_padding_box();
    $Vxw3eikvhq3k[3] = $Vxw3eikvhq3k["h"] = $this->_frame->get_style()->height;
    return $Vxw3eikvhq3k;
  }
  

  
  function set_text_spacing($V4blp1adqmut) {
    $Vdtcpflt5bhp = $this->_frame->get_style();
    
    $this->_text_spacing = $V4blp1adqmut;
    $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);
    
    
    $Vdtcpflt5bhp->width = Font_Metrics::get_text_width($this->get_text(), $Vdtcpflt5bhp->font_family, $Vdtcpflt5bhp->font_size, $V4blp1adqmut, $Vshdzmkj2dla);
  }

  

  
  function recalculate_width() {
    $Vdtcpflt5bhp = $this->get_style();
    $Vkjdq1foihhi = $this->get_text();
    $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;
    $V3ioe2zhnovg = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->word_spacing);
    $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);

    return $Vdtcpflt5bhp->width = Font_Metrics::get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
  }
  
  

  
  
  
  
  function split_text($Vortqlloirgz) {
    if ( $Vortqlloirgz == 0 )
      return;

    if ( self::$Vtsjz2ewloag ) {
      
      $V1en3qe0uyt3 = $this->_frame->get_node();
      $Vgxi5rhd1jp1 = $V1en3qe0uyt3->substringData(0, $Vortqlloirgz);
      $Vuk3coi3pr4g = $V1en3qe0uyt3->substringData($Vortqlloirgz, mb_strlen($V1en3qe0uyt3->textContent)-1);

      $V1en3qe0uyt3->replaceData(0, mb_strlen($V1en3qe0uyt3->textContent), $Vgxi5rhd1jp1);
      $Vabnunvypdme = $V1en3qe0uyt3->parentNode->appendChild(new DOMText($Vuk3coi3pr4g));
    }
    else {
      $Vabnunvypdme = $this->_frame->get_node()->splitText($Vortqlloirgz);
    }
    
    $Vn0mq53c5jwe = $this->copy($Vabnunvypdme);

    $Vzqw0ieauwu4 = $this->get_parent();
    $Vzqw0ieauwu4->insert_child_after($Vn0mq53c5jwe, $this, false);

    if ( $Vzqw0ieauwu4 instanceof Inline_Frame_Decorator )
      $Vzqw0ieauwu4->split($Vn0mq53c5jwe);

    return $Vn0mq53c5jwe;
  }

  

  function delete_text($Vortqlloirgz, $Vytbsuz3c5qz) {
    $this->_frame->get_node()->deleteData($Vortqlloirgz, $Vytbsuz3c5qz);
  }

  

  function set_text($Vkjdq1foihhi) {
    $this->_frame->get_node()->data = $Vkjdq1foihhi;
  }

}

Text_Frame_Decorator::$Vtsjz2ewloag = PHP_VERSION_ID < 50207;
