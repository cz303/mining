<?php



class Frame {
  
  
  protected $Vrqxfsyognsw;

  
  protected $Va51gysr0jm0;

  
  static  $Vpj2vsrymjdn = 0;
  
  
  protected $Vrwil4krgfxl;

  
  protected $Vfqe1hk1fw32;
  
  
  protected $Vq20emrsdn3q;
  
  
  protected $Vdmbknbm41dv;

  
  protected $V4m5plsjqvez;

  
  protected $Vtc2lyatxu3c;

  
  protected $Vvhv3cbqq5x2;

  
  protected $Vimnxhauh5jf;
  
  
  protected $Vrrvr41chywf;

  
  protected $Vqvgj4sslcm2;
  
  
  protected $Vmfr1mu4xngo;

  
  protected $Vkj5ljkqxuiz;
  
  
  protected $Vdfnrsz4xs4f;
  
  protected $Vwnzxmenxdab = array();
  
  
  public $Vzgmbwf4r55q = false;
  
  public $Vl225jpeprra = false;
  
  static $Vtmg35tevpsn = self::WS_SPACE;
  
  const WS_TEXT = 1;
  const WS_SPACE = 2;
  
  
  function __destruct() {
    clear_object($this);
  }

  
  function __construct(DOMNode $V1en3qe0uyt3) {
    $this->_node = $V1en3qe0uyt3;
      
    $this->_parent = null;
    $this->_first_child = null;
    $this->_last_child = null;
    $this->_prev_sibling = $this->_next_sibling = null;
    
    $this->_style = null;
    $this->_original_style = null;
    
    $this->_containing_block = array(
      "x" => null,
      "y" => null,
      "w" => null,
      "h" => null,
    );
    
    $this->_containing_block[0] =& $this->_containing_block["x"];
    $this->_containing_block[1] =& $this->_containing_block["y"];
    $this->_containing_block[2] =& $this->_containing_block["w"];
    $this->_containing_block[3] =& $this->_containing_block["h"];
    
    $this->_position = array(
      "x" => null,
      "y" => null,
    );
    
    $this->_position[0] =& $this->_position["x"];
    $this->_position[1] =& $this->_position["y"];

    $this->_opacity = 1.0;
    $this->_decorator = null;

    $this->set_id( self::$Vpj2vsrymjdn++ );
  }
  
  
  protected function ws_trim(){
    if ( $this->ws_keep() ) return;
    
    switch(self::$Vtmg35tevpsn) {
      case self::WS_SPACE: 
        $V1en3qe0uyt3 = $this->_node;
        
        if ( $V1en3qe0uyt3->nodeName === "#text" ) {
          $V1en3qe0uyt3->data = preg_replace("/[ \t\r\n\f]+/u", " ", $Vkjdq1foihhi);
          
          
          if ( isset($V1en3qe0uyt3->data[0]) && $V1en3qe0uyt3->data[0] === " " ) {
            $V1en3qe0uyt3->data = ltrim($V1en3qe0uyt3->data);
          }
          
          
          if ( $V1en3qe0uyt3->data !== "" ) {
            
            self::$Vtmg35tevpsn = self::WS_TEXT;
          
            
            if ( preg_match("/[ \t\r\n\f]+$/u", $V1en3qe0uyt3->data) ) {
              $V1en3qe0uyt3->data = ltrim($V1en3qe0uyt3->data);
            }
          }
        }
      break;
      
      case self::WS_TEXT:
    }
  }
  
  protected function ws_keep(){
    $Vu2bzphhrbak = $this->get_style()->white_space;
    return in_array($Vu2bzphhrbak, array("pre", "pre-wrap", "pre-line"));
  }
  
  protected function ws_is_text(){
    $V1en3qe0uyt3 = $this->get_node();
    
    if ($V1en3qe0uyt3->nodeName === "img") {
      return true;
    }
    
    if ( !$this->is_in_flow() ) {
      return false;
    }
    
    if ($this->is_text_node()) {
      return trim($V1en3qe0uyt3->nodeValue) !== "";
    }
    
    return true;
  }

  
  function dispose($Vfxakf3im4sg = false) {

    if ( $Vfxakf3im4sg ) {
      while ( $Vcnoizcxjx0n = $this->_first_child )
        $Vcnoizcxjx0n->dispose(true);
    }

    
    if ( $this->_prev_sibling ) {
      $this->_prev_sibling->_next_sibling = $this->_next_sibling;      
    }

    if ( $this->_next_sibling ) {
      $this->_next_sibling->_prev_sibling = $this->_prev_sibling;
    }

    if ( $this->_parent && $this->_parent->_first_child === $this ) {
      $this->_parent->_first_child = $this->_next_sibling;
    }

    if ( $this->_parent && $this->_parent->_last_child === $this ) {
      $this->_parent->_last_child = $this->_prev_sibling;
    }

    if ( $this->_parent ) {
      $this->_parent->get_node()->removeChild($this->_node);
    }

    $this->_style->dispose();
    $this->_style = null;
    unset($this->_style);
    
    $this->_original_style->dispose();
    $this->_original_style = null;
    unset($this->_original_style);
    
  }

  
  function reset() {
    $this->_position["x"] = null;
    $this->_position["y"] = null;
    
    $this->_containing_block["x"] = null;
    $this->_containing_block["y"] = null;
    $this->_containing_block["w"] = null;
    $this->_containing_block["h"] = null;

    $this->_style = null;
    unset($this->_style);
    $this->_style = clone $this->_original_style;
  }
  
  

  
  
  function get_node() { return $this->_node; }
  
  
  function get_id() { return $this->_id; }
  
  
  function get_style() { return $this->_style; }
  
  
  function get_original_style() { return $this->_original_style; }
  
  
  function get_parent() { return $this->_parent; }
  
  
  function get_decorator() { return $this->_decorator; }
  
  
  function get_first_child() { return $this->_first_child; }
  
  
  function get_last_child() { return $this->_last_child; }
  
  
  function get_prev_sibling() { return $this->_prev_sibling; }
  
  
  function get_next_sibling() { return $this->_next_sibling; }
  
  
  function get_children() { 
    if ( isset($this->_frame_list) ) {
      return $this->_frame_list;
    }
    
    $this->_frame_list = new FrameList($this);
    return $this->_frame_list; 
  }
  
  
  
  
  function get_containing_block($Vfhiq1lhsoja = null) {
    if ( isset($Vfhiq1lhsoja) ) {
      return $this->_containing_block[$Vfhiq1lhsoja];  
    }  
    return $this->_containing_block;
  }
  
  
  function get_position($Vfhiq1lhsoja = null) {
    if ( isset($Vfhiq1lhsoja) ) {
      return $this->_position[$Vfhiq1lhsoja];
    }
    return $this->_position;
  }
    
  

  
  function get_margin_height() {
    $Vdtcpflt5bhp = $this->_style;
    
    return $Vdtcpflt5bhp->length_in_pt(array(
      $Vdtcpflt5bhp->height,
      $Vdtcpflt5bhp->margin_top,
      $Vdtcpflt5bhp->margin_bottom,
      $Vdtcpflt5bhp->border_top_width,
      $Vdtcpflt5bhp->border_bottom_width,
      $Vdtcpflt5bhp->padding_top,
      $Vdtcpflt5bhp->padding_bottom
    ), $this->_containing_block["h"]);
  }

   
  function get_margin_width() {
    $Vdtcpflt5bhp = $this->_style;
    
    return $Vdtcpflt5bhp->length_in_pt(array(
      $Vdtcpflt5bhp->width,
      $Vdtcpflt5bhp->margin_left,
      $Vdtcpflt5bhp->margin_right,
      $Vdtcpflt5bhp->border_left_width,
      $Vdtcpflt5bhp->border_right_width,
      $Vdtcpflt5bhp->padding_left,
      $Vdtcpflt5bhp->padding_right
    ), $this->_containing_block["w"]);
  }
  
  function get_break_margins(){
    $Vdtcpflt5bhp = $this->_style;
    
    return $Vdtcpflt5bhp->length_in_pt(array(
      
      $Vdtcpflt5bhp->margin_top,
      $Vdtcpflt5bhp->margin_bottom,
      $Vdtcpflt5bhp->border_top_width,
      $Vdtcpflt5bhp->border_bottom_width,
      $Vdtcpflt5bhp->padding_top,
      $Vdtcpflt5bhp->padding_bottom
    ), $this->_containing_block["h"]);
  }

  
  function get_padding_box() {
    $Vdtcpflt5bhp = $this->_style;
    $Vstfrw5akne1 = $this->_containing_block;
    
    $V1e1eaicqarh = $this->_position["x"] +
      $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_left,
                                 $Vdtcpflt5bhp->border_left_width),
                           $Vstfrw5akne1["w"]);
                           
    $Vqwmp2bx0ii2 = $this->_position["y"] +
      $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_top,
                                 $Vdtcpflt5bhp->border_top_width),
                           $Vstfrw5akne1["h"]);
    
    $Vwsgifrh5ics = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->padding_left,
                                    $Vdtcpflt5bhp->width,
                                    $Vdtcpflt5bhp->padding_right),
                              $Vstfrw5akne1["w"]);

    $Vvlxmepre4ko = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->padding_top,
                                    $Vdtcpflt5bhp->height,
                                    $Vdtcpflt5bhp->padding_bottom),
                             $Vstfrw5akne1["h"]);

    return array(0 => $V1e1eaicqarh, "x" => $V1e1eaicqarh,
                 1 => $Vqwmp2bx0ii2, "y" => $Vqwmp2bx0ii2,
                 2 => $Vwsgifrh5ics, "w" => $Vwsgifrh5ics,
                 3 => $Vvlxmepre4ko, "h" => $Vvlxmepre4ko);
  }

  
  function get_border_box() {
    $Vdtcpflt5bhp = $this->_style;
    $Vstfrw5akne1 = $this->_containing_block;
    
    $V1e1eaicqarh = $this->_position["x"] + $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_left, $Vstfrw5akne1["w"]);
                          
    $Vqwmp2bx0ii2 = $this->_position["y"] + $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_top,  $Vstfrw5akne1["h"]);

    $Vwsgifrh5ics = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->border_left_width,
                                    $Vdtcpflt5bhp->padding_left,
                                    $Vdtcpflt5bhp->width,
                                    $Vdtcpflt5bhp->padding_right,
                                    $Vdtcpflt5bhp->border_right_width),
                              $Vstfrw5akne1["w"]);

    $Vvlxmepre4ko = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->border_top_width,
                                    $Vdtcpflt5bhp->padding_top,
                                    $Vdtcpflt5bhp->height,
                                    $Vdtcpflt5bhp->padding_bottom,
                                    $Vdtcpflt5bhp->border_bottom_width),
                              $Vstfrw5akne1["h"]);

    return array(0 => $V1e1eaicqarh, "x" => $V1e1eaicqarh,
                 1 => $Vqwmp2bx0ii2, "y" => $Vqwmp2bx0ii2,
                 2 => $Vwsgifrh5ics, "w" => $Vwsgifrh5ics,
                 3 => $Vvlxmepre4ko, "h" => $Vvlxmepre4ko);
  }
  
  function get_opacity($Vjqeycctd35y = null) {
    if ( $Vjqeycctd35y !== null ) {
      $this->set_opacity($Vjqeycctd35y);
    }
    return $this->_opacity;
  }
  
  
  function &get_containing_line() {
    return $this->_containing_line;
  }
  
  

  
  function set_id($Vfhiq1lhsojad) {
    $this->_id = $Vfhiq1lhsojad;

    
    
    
    if ( $this->_node->nodeType == XML_ELEMENT_NODE )
      $this->_node->setAttribute("frame_id", $Vfhiq1lhsojad);
  }

  function set_style(Style $Vdtcpflt5bhp) {
    if ( is_null($this->_style) )
      $this->_original_style = clone $Vdtcpflt5bhp;
    
    
    $this->_style = $Vdtcpflt5bhp;
  }
  
  function set_decorator(Frame_Decorator $Vtrv15bav02e) {
    $this->_decorator = $Vtrv15bav02e;
  }
  
  function set_containing_block($V1e1eaicqarh = null, $Vqwmp2bx0ii2 = null, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null) {
    if ( is_array($V1e1eaicqarh) ){
      foreach($V1e1eaicqarh as $Vseq1edikdvg => $Vwk2nao2d33x){
        $$Vseq1edikdvg = $Vwk2nao2d33x;
      }
    }
    
    if (is_numeric($V1e1eaicqarh)) {
      $this->_containing_block["x"] = $V1e1eaicqarh;
    }
    
    if (is_numeric($Vqwmp2bx0ii2)) {
      $this->_containing_block["y"] = $Vqwmp2bx0ii2;
    }
    
    if (is_numeric($Vwsgifrh5ics)) {
      $this->_containing_block["w"] = $Vwsgifrh5ics;
    }
    
    if (is_numeric($Vvlxmepre4ko)) {
      $this->_containing_block["h"] = $Vvlxmepre4ko;
    }
  }

  function set_position($V1e1eaicqarh = null, $Vqwmp2bx0ii2 = null) {
    if ( is_array($V1e1eaicqarh) )
      extract($V1e1eaicqarh);
    
    if ( is_numeric($V1e1eaicqarh) ) {
      $this->_position["x"] = $V1e1eaicqarh;
    }

    if ( is_numeric($Vqwmp2bx0ii2) ) {
      $this->_position["y"] = $Vqwmp2bx0ii2;
    }
  }
  
  function set_opacity($Vjqeycctd35y) {
    $V3jkqexf4nr0 = $this->get_parent();
    $V2dkcspxlo2c = (($V3jkqexf4nr0 && $V3jkqexf4nr0->_opacity !== null) ? $V3jkqexf4nr0->_opacity : 1.0);
    $this->_opacity = $V2dkcspxlo2c * $Vjqeycctd35y;
  }
  
  function set_containing_line(Line_Box $Vdmbypy2xlg1) {
    $this->_containing_line = $Vdmbypy2xlg1;
  }

  
  
  
  function is_text_node() {
    if ( isset($this->_is_cache["text_node"]) ) {
      return $this->_is_cache["text_node"];
    }
    
    return $this->_is_cache["text_node"] = ($this->get_node()->nodeName === "#text");
  }
  
  function is_positionned() {
    if ( isset($this->_is_cache["positionned"]) ) {
      return $this->_is_cache["positionned"];
    }
    
    $Vey0js2ss2mo = $this->get_style()->position;
    
    return $this->_is_cache["positionned"] = in_array($Vey0js2ss2mo, Style::$V5lhbxo0xwph);
  }
  
  function is_absolute() {
    if ( isset($this->_is_cache["absolute"]) ) {
      return $this->_is_cache["absolute"];
    }
    
    $Vey0js2ss2mo = $this->get_style()->position;
   
    return $this->_is_cache["absolute"] = ($Vey0js2ss2mo === "absolute" || $Vey0js2ss2mo === "fixed");
  }
  
  function is_block() {
    if ( isset($this->_is_cache["block"]) ) {
      return $this->_is_cache["block"];
    }
    
    return $this->_is_cache["block"] = in_array($this->get_style()->display, Style::$Voxmdkoroy5i);
  }
  
  function is_in_flow() {
    if ( isset($this->_is_cache["in_flow"]) ) {
      return $this->_is_cache["in_flow"];
    }
    
    return $this->_is_cache["in_flow"] = !(DOMPDF_ENABLE_CSS_FLOAT && $this->get_style()->float !== "none" || $this->is_absolute());
  }
  
  function is_pre(){
    if ( isset($this->_is_cache["pre"]) ) {
      return $this->_is_cache["pre"];
    }
    
    $Vwsgifrh5icshite_space = $this->get_style()->white_space;
   
    return $this->_is_cache["pre"] = in_array($Vwsgifrh5icshite_space, array("pre", "pre-wrap"));
  }
  
  function is_table(){
    if ( isset($this->_is_cache["table"]) ) {
      return $this->_is_cache["table"];
    }
    
    $Vqiav1fbghsg = $this->get_style()->display;
   
    return $this->_is_cache["table"] = in_array($Vqiav1fbghsg, Style::$Vi35fejo31gm);
  }
  
  
   
  function prepend_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    if ( $Vbi2n0p4h11b ) 
      $this->_node->insertBefore($Vcnoizcxjx0n->_node, $this->_first_child ? $this->_first_child->_node : null);

    
    if ( $Vcnoizcxjx0n->_parent )
      $Vcnoizcxjx0n->_parent->remove_child($Vcnoizcxjx0n, false);
    
    $Vcnoizcxjx0n->_parent = $this;
    $Vcnoizcxjx0n->_prev_sibling = null;
    
    
    if ( !$this->_first_child ) {
      $this->_first_child = $Vcnoizcxjx0n;
      $this->_last_child = $Vcnoizcxjx0n;
      $Vcnoizcxjx0n->_next_sibling = null;
    } else {
      $this->_first_child->_prev_sibling = $Vcnoizcxjx0n;
      $Vcnoizcxjx0n->_next_sibling = $this->_first_child;      
      $this->_first_child = $Vcnoizcxjx0n;
    }
  }
    
   
  function append_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    if ( $Vbi2n0p4h11b ) 
      $this->_node->appendChild($Vcnoizcxjx0n->_node);

    
    if ( $Vcnoizcxjx0n->_parent )
      $Vcnoizcxjx0n->_parent->remove_child($Vcnoizcxjx0n, false);

    $Vcnoizcxjx0n->_parent = $this;
    $Vcnoizcxjx0n->_next_sibling = null;
    
    
    if ( !$this->_last_child ) {
      $this->_first_child = $Vcnoizcxjx0n;
      $this->_last_child = $Vcnoizcxjx0n;
      $Vcnoizcxjx0n->_prev_sibling = null;
    } else {
      $this->_last_child->_next_sibling = $Vcnoizcxjx0n;
      $Vcnoizcxjx0n->_prev_sibling = $this->_last_child;
      $this->_last_child = $Vcnoizcxjx0n;
    }
  }  
  
   
  function insert_child_before(Frame $Vxd054a4orfn, Frame $Vl1gwg0s04p2, $Vbi2n0p4h11b = true) {
    if ( $Vl1gwg0s04p2 === $this->_first_child ) {
      $this->prepend_child($Vxd054a4orfn, $Vbi2n0p4h11b);
      return;
    }

    if ( is_null($Vl1gwg0s04p2) ) {
      $this->append_child($Vxd054a4orfn, $Vbi2n0p4h11b);
      return;
    }
    
    if ( $Vl1gwg0s04p2->_parent !== $this )
      throw new DOMPDF_Exception("Reference child is not a child of this node.");

    
    if ( $Vbi2n0p4h11b )
      $this->_node->insertBefore($Vxd054a4orfn->_node, $Vl1gwg0s04p2->_node);

    
    if ( $Vxd054a4orfn->_parent )
      $Vxd054a4orfn->_parent->remove_child($Vxd054a4orfn, false);
    
    $Vxd054a4orfn->_parent = $this;
    $Vxd054a4orfn->_next_sibling = $Vl1gwg0s04p2;
    $Vxd054a4orfn->_prev_sibling = $Vl1gwg0s04p2->_prev_sibling;

    if ( $Vl1gwg0s04p2->_prev_sibling )
      $Vl1gwg0s04p2->_prev_sibling->_next_sibling = $Vxd054a4orfn;
    
    $Vl1gwg0s04p2->_prev_sibling = $Vxd054a4orfn;
  }
  
   
  function insert_child_after(Frame $Vxd054a4orfn, Frame $Vl1gwg0s04p2, $Vbi2n0p4h11b = true) {
    if ( $Vl1gwg0s04p2 === $this->_last_child ) {
      $this->append_child($Vxd054a4orfn, $Vbi2n0p4h11b);
      return;
    }

    if ( is_null($Vl1gwg0s04p2) ) {
      $this->prepend_child($Vxd054a4orfn, $Vbi2n0p4h11b);
      return;
    }
    
    if ( $Vl1gwg0s04p2->_parent !== $this )
      throw new DOMPDF_Exception("Reference child is not a child of this node.");

    
    if ( $Vbi2n0p4h11b ) {
      if ( $Vl1gwg0s04p2->_next_sibling ) {
        $Voqstovobg3q = $Vl1gwg0s04p2->_next_sibling->_node;
        $this->_node->insertBefore($Vxd054a4orfn->_node, $Voqstovobg3q);
      } else {
        $Vxd054a4orfn->_node = $this->_node->appendChild($Vxd054a4orfn);
      }
    }
    
    
    if ( $Vxd054a4orfn->_parent)
      $Vxd054a4orfn->_parent->remove_child($Vxd054a4orfn, false);
    
    $Vxd054a4orfn->_parent = $this;
    $Vxd054a4orfn->_prev_sibling = $Vl1gwg0s04p2;
    $Vxd054a4orfn->_next_sibling = $Vl1gwg0s04p2->_next_sibling;

    if ( $Vl1gwg0s04p2->_next_sibling ) 
      $Vl1gwg0s04p2->_next_sibling->_prev_sibling = $Vxd054a4orfn;

    $Vl1gwg0s04p2->_next_sibling = $Vxd054a4orfn;
  }


  
  function remove_child(Frame $Vcnoizcxjx0n, $Vbi2n0p4h11b = true) {
    if ( $Vcnoizcxjx0n->_parent !== $this )
      throw new DOMPDF_Exception("Child not found in this frame");

    if ( $Vbi2n0p4h11b )
      $this->_node->removeChild($Vcnoizcxjx0n->_node);
    
    if ( $Vcnoizcxjx0n === $this->_first_child )
      $this->_first_child = $Vcnoizcxjx0n->_next_sibling;

    if ( $Vcnoizcxjx0n === $this->_last_child )
      $this->_last_child = $Vcnoizcxjx0n->_prev_sibling;

    if ( $Vcnoizcxjx0n->_prev_sibling )
      $Vcnoizcxjx0n->_prev_sibling->_next_sibling = $Vcnoizcxjx0n->_next_sibling;

    if ( $Vcnoizcxjx0n->_next_sibling )
      $Vcnoizcxjx0n->_next_sibling->_prev_sibling = $Vcnoizcxjx0n->_prev_sibling;    

    $Vcnoizcxjx0n->_next_sibling = null;
    $Vcnoizcxjx0n->_prev_sibling = null;
    $Vcnoizcxjx0n->_parent = null;
    return $Vcnoizcxjx0n;
  }

  

  
  function __toString() {
    



    
    
    $Vyqctydehp2e = "<b>" . $this->_node->nodeName . ":</b><br/>";
    
    $Vyqctydehp2e .= "Id: " .$this->get_id() . "<br/>";
    $Vyqctydehp2e .= "Class: " .get_class($this) . "<br/>";
    
    if ( $this->is_text_node() ) {
      $Vdln1z2oxpjs = htmlspecialchars($this->_node->nodeValue);
      $Vyqctydehp2e .= "<pre>'" .  mb_substr($Vdln1z2oxpjs,0,70) .
        (mb_strlen($Vdln1z2oxpjs) > 70 ? "..." : "") . "'</pre>";
    } elseif ( $Vmfjjctjcxe0 = $this->_node->getAttribute("class") ) {
      $Vdln1z2oxpjs = htmlspecialchars($Vmfjjctjcxe0);
      $Vyqctydehp2e .= "CSS class: '$Vmfjjctjcxe0'<br/>";
    }
    
    if ( $this->_parent )
      $Vyqctydehp2e .= "\nParent:" . $this->_parent->_node->nodeName .
        " (" . spl_object_hash($this->_parent->_node) . ") " .
        "<br/>";

    if ( $this->_prev_sibling )
      $Vyqctydehp2e .= "Prev: " . $this->_prev_sibling->_node->nodeName .
        " (" . spl_object_hash($this->_prev_sibling->_node) . ") " .
        "<br/>";

    if ( $this->_next_sibling )
      $Vyqctydehp2e .= "Next: " . $this->_next_sibling->_node->nodeName .
        " (" . spl_object_hash($this->_next_sibling->_node) . ") " .
        "<br/>";

    $Vrec2f1japon = $this->get_decorator();
    while ($Vrec2f1japon && $Vrec2f1japon != $Vrec2f1japon->get_decorator()) {
      $Vyqctydehp2e .= "Decorator: " . get_class($Vrec2f1japon) . "<br/>";
      $Vrec2f1japon = $Vrec2f1japon->get_decorator();
    }

    $Vyqctydehp2e .= "Position: " . pre_r($this->_position, true);
    $Vyqctydehp2e .= "\nContaining block: " . pre_r($this->_containing_block, true);
    $Vyqctydehp2e .= "\nMargin width: " . pre_r($this->get_margin_width(), true);
    $Vyqctydehp2e .= "\nMargin height: " . pre_r($this->get_margin_height(), true);
    
    $Vyqctydehp2e .= "\nStyle: <pre>". $this->_style->__toString() . "</pre>";

    if ( $this->_decorator instanceof Block_Frame_Decorator ) {
      $Vyqctydehp2e .= "Lines:<pre>";
      foreach ($this->_decorator->get_line_boxes() as $Vdmbypy2xlg1) {
        foreach ($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
          if ($Vrlbsjbjglkb instanceof Text_Frame_Decorator) {
            $Vyqctydehp2e .= "\ntext: ";          
            $Vyqctydehp2e .= "'". htmlspecialchars($Vrlbsjbjglkb->get_text()) ."'";
          } else {
            $Vyqctydehp2e .= "\nBlock: " . $Vrlbsjbjglkb->get_node()->nodeName . " (" . spl_object_hash($Vrlbsjbjglkb->get_node()) . ")";
          }
        }
        
        $Vyqctydehp2e .=
          "\ny => " . $Vdmbypy2xlg1->y . "\n" .
          "w => " . $Vdmbypy2xlg1->w . "\n" .
          "h => " . $Vdmbypy2xlg1->h . "\n" .
          "left => " . $Vdmbypy2xlg1->left . "\n" .
          "right => " . $Vdmbypy2xlg1->right . "\n";
      }
      $Vyqctydehp2e .= "</pre>";
    }
    $Vyqctydehp2e .= "\n";
    if ( php_sapi_name() === "cli" )
      $Vyqctydehp2e = strip_tags(str_replace(array("<br/>","<b>","</b>"),
                                    array("\n","",""),
                                    $Vyqctydehp2e));
    
    return $Vyqctydehp2e;
  }
}




class FrameList implements IteratorAggregate {
  protected $Vvvuswijwhvo;

  function __construct($Vrlbsjbjglkb) { $this->_frame = $Vrlbsjbjglkb; }
  function getIterator() { return new FrameListIterator($this->_frame); }
}
  

class FrameListIterator implements Iterator {

  
  protected $Vq20emrsdn3q;
  
  
  protected $V04g2u45czbc;
  
  
  protected $V2pcvbzbzgda;

  function __construct(Frame $Vrlbsjbjglkb) {
    $this->_parent = $Vrlbsjbjglkb;
    $this->_cur = $Vrlbsjbjglkb->get_first_child();
    $this->_num = 0;
  }

  function rewind() { 
    $this->_cur = $this->_parent->get_first_child();
    $this->_num = 0;
  }

  
  function valid() {
    return isset($this->_cur);
  }
  
  function key() { return $this->_num; }
  
  
  function current() { return $this->_cur; }

  
  function next() {

    $Vc0brddnw0vm = $this->_cur;
    if ( !$Vc0brddnw0vm )
      return null;
    
    $this->_cur = $this->_cur->get_next_sibling();
    $this->_num++;
    return $Vc0brddnw0vm;
  }
}




class FrameTreeList implements IteratorAggregate {
  
  protected $Vrsdjaclx0zt;
  
  function __construct(Frame $V4jn4msro4hf) { $this->_root = $V4jn4msro4hf; }
  
  
  function getIterator() { return new FrameTreeIterator($this->_root); }
}


class FrameTreeIterator implements Iterator {
  
  protected $Vrsdjaclx0zt;
  protected $Vnixzzwty4ho = array();
  
  
  protected $V2pcvbzbzgda;
  
  function __construct(Frame $V4jn4msro4hf) {
    $this->_stack[] = $this->_root = $V4jn4msro4hf;
    $this->_num = 0;
  }

  function rewind() {
    $this->_stack = array($this->_root);
    $this->_num = 0;
  }
  
  
  function valid() { return count($this->_stack) > 0; }
  
  
  function key() { return $this->_num; }
  
  
  function current() { return end($this->_stack); }

  
  function next() {
    $V4t3fwdd3eev = end($this->_stack);
    
    
    unset($this->_stack[ key($this->_stack) ]);
    $this->_num++;
    
    
    if ( $V4y0urwpnd3j = $V4t3fwdd3eev->get_last_child() ) {
      $this->_stack[] = $V4y0urwpnd3j;
      while ( $V4y0urwpnd3j = $V4y0urwpnd3j->get_prev_sibling() )
        $this->_stack[] = $V4y0urwpnd3j;
    }
    return $V4t3fwdd3eev;
  }
}
