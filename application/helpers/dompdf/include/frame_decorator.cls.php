<?php



abstract class Frame_Decorator extends Frame {
  const DEFAULT_COUNTER = "-dompdf-default-counter";
  
  public $Vmcsajddydod = array(); 
  
  
  protected $Vrsdjaclx0zt;

  
  protected $Vvvuswijwhvo;

  
  protected $Vigezhqo1nja;

  
  protected $Vslcdtmukjca;
  
  
  protected $Vci1vex3llkx;
  
  
  private $Ve3dfu4bnuu4;
  
  
  private $Vziy42504rym;

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    $this->_frame = $Vrlbsjbjglkb;
    $this->_root = null;
    $this->_dompdf = $Vhygqjznl3ul;
    $Vrlbsjbjglkb->set_decorator($this);
  }

  
  function dispose($Vfxakf3im4sg = false) {
    
    if ( $Vfxakf3im4sg ) {
      while ( $Vcnoizcxjx0n = $this->get_first_child() )
        $Vcnoizcxjx0n->dispose(true);
    }
    
    $this->_root = null;
    unset($this->_root);
    
    $this->_frame->dispose(true);
    $this->_frame = null;
    unset($this->_frame);
    
    $this->_positioner = null;
    unset($this->_positioner);
    
    $this->_reflower = null;
    unset($this->_reflower);
  }

   
  function copy(DomNode $V1en3qe0uyt3) {
    $Vrlbsjbjglkb = new Frame($V1en3qe0uyt3);
    $Vrlbsjbjglkb->set_style(clone $this->_frame->get_original_style());
    $Vn0mq53c5jwe = Frame_Factory::decorate_frame($Vrlbsjbjglkb, $this->_dompdf);
    $Vn0mq53c5jwe->set_root($this->_root);
    return $Vn0mq53c5jwe;
  }

  
  function deep_copy() {
    $Vrlbsjbjglkb = new Frame($this->get_node()->cloneNode());
    $Vrlbsjbjglkb->set_style(clone $this->_frame->get_original_style());
    $Vn0mq53c5jwe = Frame_Factory::decorate_frame($Vrlbsjbjglkb, $this->_dompdf);
    $Vn0mq53c5jwe->set_root($this->_root);

    foreach ($this->get_children() as $Vcnoizcxjx0n)
      $Vn0mq53c5jwe->append_child($Vcnoizcxjx0n->deep_copy());

    return $Vn0mq53c5jwe;
  }
  
  
  
  function reset() {
    $this->_frame->reset();
    
    $this->_counters = array();

    
    foreach ($this->get_children() as $Vcnoizcxjx0n)
      $Vcnoizcxjx0n->reset();
  }
  
  
  function get_id() { return $this->_frame->get_id(); }
  
  
  function get_frame() { return $this->_frame; }
  
  
  function get_node() { return $this->_frame->get_node(); }
  
  
  function get_style() { return $this->_frame->get_style(); }
  
  
  function get_original_style() { return $this->_frame->get_original_style(); }
  function get_containing_block($Vfhiq1lhsoja = null) { return $this->_frame->get_containing_block($Vfhiq1lhsoja); }
  function get_position($Vfhiq1lhsoja = null) { return $this->_frame->get_position($Vfhiq1lhsoja); }
  
  
  function get_dompdf() { return $this->_dompdf; }
  
  function get_margin_height() { return $this->_frame->get_margin_height(); }
  function get_margin_width() { return $this->_frame->get_margin_width(); }
  function get_padding_box() { return $this->_frame->get_padding_box(); }
  function get_border_box() { return $this->_frame->get_border_box(); }

  
  function set_id($Vfhiq1lhsojad) { $this->_frame->set_id($Vfhiq1lhsojad); }
  function set_style(Style $Vdtcpflt5bhp) { $this->_frame->set_style($Vdtcpflt5bhp); }

  function set_containing_block($V1e1eaicqarh = null, $Vqwmp2bx0ii2 = null, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null) {
    $this->_frame->set_containing_block($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);
  }

  function set_position($V1e1eaicqarh = null, $Vqwmp2bx0ii2 = null) {
    $this->_frame->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);
  }
  function __toString() { return $this->_frame->__toString(); }
  
  function prepend_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    while ( $Vcnoizcxjx0n instanceof Frame_Decorator )
      $Vcnoizcxjx0n = $Vcnoizcxjx0n->_frame;
    
    $this->_frame->prepend_child($Vcnoizcxjx0n, $Vbi2n0p4h11b);
  }

  function append_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    while ( $Vcnoizcxjx0n instanceof Frame_Decorator )
      $Vcnoizcxjx0n = $Vcnoizcxjx0n->_frame;

    $this->_frame->append_child($Vcnoizcxjx0n, $Vbi2n0p4h11b);
  }

  function insert_child_before(Frame $Vxd054a4orfn, Frame $Vl1gwg0s04p2, $Vbi2n0p4h11b = true) {
    while ( $Vxd054a4orfn instanceof Frame_Decorator )
      $Vxd054a4orfn = $Vxd054a4orfn->_frame;

    if ( $Vl1gwg0s04p2 instanceof Frame_Decorator )
      $Vl1gwg0s04p2 = $Vl1gwg0s04p2->_frame;

    $this->_frame->insert_child_before($Vxd054a4orfn, $Vl1gwg0s04p2, $Vbi2n0p4h11b);
  }

  function insert_child_after(Frame $Vxd054a4orfn, Frame $Vl1gwg0s04p2, $Vbi2n0p4h11b = true) {
    while ( $Vxd054a4orfn instanceof Frame_Decorator )
      $Vxd054a4orfn = $Vxd054a4orfn->_frame;

    while ( $Vl1gwg0s04p2 instanceof Frame_Decorator )
      $Vl1gwg0s04p2 = $Vl1gwg0s04p2->_frame;
    
    $this->_frame->insert_child_after($Vxd054a4orfn, $Vl1gwg0s04p2, $Vbi2n0p4h11b);
  }

  function remove_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    while  ( $Vcnoizcxjx0n instanceof Frame_Decorator )
      $Vcnoizcxjx0n = $Vxd054a4orfn->_frame;

    $this->_frame->remove_child($Vcnoizcxjx0n, $Vbi2n0p4h11b);
  }
  
  

  
  function get_parent() {
    $Vzqw0ieauwu4 = $this->_frame->get_parent();
    if ( $Vzqw0ieauwu4 && $Vn0mq53c5jwe = $Vzqw0ieauwu4->get_decorator() ) {
      while ( $Vdln1z2oxpjs = $Vn0mq53c5jwe->get_decorator() )
        $Vn0mq53c5jwe = $Vdln1z2oxpjs;      
      return $Vn0mq53c5jwe;
    } else if ( $Vzqw0ieauwu4 )
      return $Vzqw0ieauwu4;
    else
      return null;
  }

  
  function get_first_child() {
    $V4y0urwpnd3j = $this->_frame->get_first_child();
    if ( $V4y0urwpnd3j && $Vn0mq53c5jwe = $V4y0urwpnd3j->get_decorator() ) {
      while ( $Vdln1z2oxpjs = $Vn0mq53c5jwe->get_decorator() )
        $Vn0mq53c5jwe = $Vdln1z2oxpjs;      
      return $Vn0mq53c5jwe;
    } else if ( $V4y0urwpnd3j )
      return $V4y0urwpnd3j;
    else
      return null;
  }

  
  function get_last_child() {
    $V4y0urwpnd3j = $this->_frame->get_last_child();
    if ( $V4y0urwpnd3j && $Vn0mq53c5jwe = $V4y0urwpnd3j->get_decorator() ) {
      while ( $Vdln1z2oxpjs = $Vn0mq53c5jwe->get_decorator() )
        $Vn0mq53c5jwe = $Vdln1z2oxpjs;      
      return $Vn0mq53c5jwe;
    } else if ( $V4y0urwpnd3j )
      return $V4y0urwpnd3j;
    else
      return null;
  }

  
  function get_prev_sibling() {
    $V2n430jknk35 = $this->_frame->get_prev_sibling();
    if ( $V2n430jknk35 && $Vn0mq53c5jwe = $V2n430jknk35->get_decorator() ) {
      while ( $Vdln1z2oxpjs = $Vn0mq53c5jwe->get_decorator() )
        $Vn0mq53c5jwe = $Vdln1z2oxpjs;      
      return $Vn0mq53c5jwe;
    } else if ( $V2n430jknk35 )
      return $V2n430jknk35;
    else
      return null;
  }
  
  
  function get_next_sibling() {
    $V2n430jknk35 = $this->_frame->get_next_sibling();
    if ( $V2n430jknk35 && $Vn0mq53c5jwe = $V2n430jknk35->get_decorator() ) {
      while ( $Vdln1z2oxpjs = $Vn0mq53c5jwe->get_decorator() )
        $Vn0mq53c5jwe = $Vdln1z2oxpjs;      
      return $Vn0mq53c5jwe;
    } else if ( $V2n430jknk35 )
      return $V2n430jknk35;
    else
      return null;
  }

  
  function get_subtree() {
    return new FrameTreeList($this);
  }
  
  

  function set_positioner(Positioner $Vzqw0ieauwu4osn) {
    $this->_positioner = $Vzqw0ieauwu4osn;
    if ( $this->_frame instanceof Frame_Decorator )
      $this->_frame->set_positioner($Vzqw0ieauwu4osn);
  }
  
  

  function set_reflower(Frame_Reflower $Vl1gwg0s04p2lower) {
    $this->_reflower = $Vl1gwg0s04p2lower;
    if ( $this->_frame instanceof Frame_Decorator )
      $this->_frame->set_reflower( $Vl1gwg0s04p2lower );
  }
  
  
  function get_reflower() { return $this->_reflower; }
  
  
  
  function set_root(Frame $V4jn4msro4hf) {
    $this->_root = $V4jn4msro4hf;
      if ( $this->_frame instanceof Frame_Decorator )
        $this->_frame->set_root($V4jn4msro4hf);
  }
  
  
  function get_root() { return $this->_root; }
  
  

  
  function find_block_parent() {
    
    
    
    $Vzqw0ieauwu4 = $this->get_parent();
    
    while ( $Vzqw0ieauwu4 ) {
      if ( $Vzqw0ieauwu4->is_block() ) break;
      $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent();
    }

    return $this->_block_parent = $Vzqw0ieauwu4;
  }
  
  
  function find_positionned_parent() {
    

    
    $Vzqw0ieauwu4 = $this->get_parent();
    while ( $Vzqw0ieauwu4 ) {
      if ( $Vzqw0ieauwu4->is_positionned() ) break;
      $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent();
    }
    
    if ( !$Vzqw0ieauwu4 ) {
      $Vzqw0ieauwu4 = $this->_root->get_first_child(); 
    }

    return $this->_positionned_parent = $Vzqw0ieauwu4;
  }

  

  
  function split($Vcnoizcxjx0n = null, $V0nltne4gj0x = false) {
    if ( is_null( $Vcnoizcxjx0n ) ) {
      $this->get_parent()->split($this, $V0nltne4gj0x);
      return;
    }

    if ( $Vcnoizcxjx0n->get_parent() !== $this )
      throw new DOMPDF_Exception("Unable to split: frame is not a child of this one.");

    $V1en3qe0uyt3 = $this->_frame->get_node();
    
    
    
    
    $V2n430jknk35plit = $this->copy( $V1en3qe0uyt3->cloneNode() );
    $V2n430jknk35plit->reset();
    $V2n430jknk35plit->get_original_style()->text_indent = 0;
    
    
    if ( $V1en3qe0uyt3->nodeName !== "body" ) {
      
      $Vdtcpflt5bhp = $this->_frame->get_style();
      $Vdtcpflt5bhp->margin_bottom = 0;
      $Vdtcpflt5bhp->padding_bottom = 0;
      $Vdtcpflt5bhp->border_bottom = 0;
      
      
      $V2hehlfpg2wy = $V2n430jknk35plit->get_original_style();
      $V2hehlfpg2wy->text_indent = 0;
      $V2hehlfpg2wy->margin_top = 0;
      $V2hehlfpg2wy->padding_top = 0;
      $V2hehlfpg2wy->border_top = 0;
    }
    
    $this->get_parent()->insert_child_after($V2n430jknk35plit, $this);

    
    $Vfhiq1lhsojater = $Vcnoizcxjx0n;
    while ($Vfhiq1lhsojater) {
      $Vrlbsjbjglkb = $Vfhiq1lhsojater;      
      $Vfhiq1lhsojater = $Vfhiq1lhsojater->get_next_sibling();
      $Vrlbsjbjglkb->reset();
      $V2n430jknk35plit->append_child($Vrlbsjbjglkb);
    }

    $this->get_parent()->split($V2n430jknk35plit, $V0nltne4gj0x);
  }

  function reset_counter($Vfhiq1lhsojad = self::DEFAULT_COUNTER, $Vp4xjtpabm0l = 0) {
    $this->get_parent()->_counters[$Vfhiq1lhsojad] = $Vp4xjtpabm0l;
  }
  
  function increment_counters($V4y0urwpnd3jounters) {
    foreach($V4y0urwpnd3jounters as $Vfhiq1lhsojad => $Vfhiq1lhsojancrement) {
      $this->increment_counter($Vfhiq1lhsojad, $Vfhiq1lhsojancrement);
    }
  }

  function increment_counter($Vfhiq1lhsojad = self::DEFAULT_COUNTER, $Vfhiq1lhsojancrement = 1) {
    $V4y0urwpnd3jounter_frame = $this->lookup_counter_frame($Vfhiq1lhsojad);

    if ( $V4y0urwpnd3jounter_frame ) {
      if ( !isset($V4y0urwpnd3jounter_frame->_counters[$Vfhiq1lhsojad]) ) {
        $V4y0urwpnd3jounter_frame->_counters[$Vfhiq1lhsojad] = 0;
      }
      
      $V4y0urwpnd3jounter_frame->_counters[$Vfhiq1lhsojad] += $Vfhiq1lhsojancrement;
    }
  }
  
  function lookup_counter_frame($Vfhiq1lhsojad = self::DEFAULT_COUNTER) {
    $Vtbbah5lqvpo = $this->get_parent();
    
    while( $Vtbbah5lqvpo ) {
      if( isset($Vtbbah5lqvpo->_counters[$Vfhiq1lhsojad]) ) {
        return $Vtbbah5lqvpo;
      }
      $Vtbbah5lqvpop = $Vtbbah5lqvpo->get_parent();
      
      if ( !$Vtbbah5lqvpop ) {
        return $Vtbbah5lqvpo;
      }
      
      $Vtbbah5lqvpo = $Vtbbah5lqvpop;
    }
  }

  
  function counter_value($Vfhiq1lhsojad = self::DEFAULT_COUNTER, $V4pigtpor0ln = "decimal") {
    $V4pigtpor0ln = mb_strtolower($V4pigtpor0ln);
    
    if ( !isset($this->_counters[$Vfhiq1lhsojad]) ) {
      $Vp4xjtpabm0l = $this->_counters[$Vfhiq1lhsojad] = 0;
    }
    else {
      $Vp4xjtpabm0l = $this->_counters[$Vfhiq1lhsojad];
    }
    
    switch ($V4pigtpor0ln) {

    default:
    case "decimal":
      return $Vp4xjtpabm0l;

    case "decimal-leading-zero":
      return str_pad($Vp4xjtpabm0l, 2, "0");

    case "lower-roman":
      return dec2roman($Vp4xjtpabm0l);

    case "upper-roman":
      return mb_strtoupper(dec2roman($Vp4xjtpabm0l));

    case "lower-latin":
    case "lower-alpha":
      return chr( ($Vp4xjtpabm0l % 26) + ord('a') - 1);

    case "upper-latin":
    case "upper-alpha":
      return chr( ($Vp4xjtpabm0l % 26) + ord('A') - 1);

    case "lower-greek":
      return unichr($Vp4xjtpabm0l + 944);

    case "upper-greek":
      return unichr($Vp4xjtpabm0l + 912);
    }
  }

  

  final function position() { $this->_positioner->position();  }
  
  final function move($V4w5ekxv5ji5, $Vm1noqcw5sjz, $Vfhiq1lhsojagnore_self = false) { 
    $this->_positioner->move($V4w5ekxv5ji5, $Vm1noqcw5sjz, $Vfhiq1lhsojagnore_self); 
  }
  
  final function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    
    
    
    $this->_reflower->reflow($V4uturqtpcq5);
  }

  final function get_min_max_width() { return $this->_reflower->get_min_max_width(); }
  
  
}
