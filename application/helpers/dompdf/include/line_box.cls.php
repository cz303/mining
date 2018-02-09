<?php



class Line_Box {

  
  protected $Vnuvxgammgdl;

  
  protected $Vmuo1q0qmqjf = array();
  
  
  public $V1fya2ghmnht = 0;
  
  
  public $Vqwmp2bx0ii2 = null;
  
  
  public $Vwsgifrh5ics = 0.0;
  
  
  public $Vvlxmepre4ko = 0.0;
  
  
  public $Vrce0gsxjgkc = 0.0;
  
  
  public $Vqyn43hpxtm0 = 0.0;
  
  
  public $V5un3xjo0f3e = null;
  
  public $Vwtgqtcu0rmv = array();
  
  
  public $Vsp5pmxi0jxf = false;
  
  
  function __construct(Block_Frame_Decorator $Vrlbsjbjglkb, $Vqwmp2bx0ii2 = 0) {
    $this->_block_frame = $Vrlbsjbjglkb;
    $this->_frames = array();
    $this->y = $Vqwmp2bx0ii2;
    
    $this->get_float_offsets();
  }
  
  
  function get_floats_inside($V4jn4msro4hf) {
    
    $Vzqw0ieauwu4 = $this->_block_frame;
    while( $Vzqw0ieauwu4->get_style()->float === "none" ) {
      $Vzqw0ieauwu4arent = $Vzqw0ieauwu4->get_parent();
      
      if (!$Vzqw0ieauwu4arent) {
        break;
      }
      
      $Vzqw0ieauwu4 = $Vzqw0ieauwu4arent;
    }
    
    $V22i3rfbdeqx = $V4jn4msro4hf->get_floating_frames();  
    
    if ( $Vzqw0ieauwu4 == $V4jn4msro4hf ) {
      return $V22i3rfbdeqx;
    }
    
    $Vzqw0ieauwu4arent = $Vzqw0ieauwu4;
    
    $V4zavcfbyrrb = array();
    
    foreach ($V22i3rfbdeqx as $Vaaczwreczgf) {
      $Vzqw0ieauwu4 = $Vaaczwreczgf->get_parent();
      
      while(($Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent()) && $Vzqw0ieauwu4 !== $Vzqw0ieauwu4arent);
      
      if ($Vzqw0ieauwu4) {
        $V4zavcfbyrrb[] = $Vzqw0ieauwu4;
      }
    }
    
    return $V4zavcfbyrrb;
    
  }
  
  function get_float_offsets() {
    if ( !DOMPDF_ENABLE_CSS_FLOAT ) {
      return;
    }
      
    static $Vchu5dw0mj22 = 500; 
    
    $V0mshgqtkmks = $this->_block_frame->get_reflower();
    
    if ( !$V0mshgqtkmks ) return;
    
    $Vtgsxw1xju1i = null;
  
    $V4uturqtpcq5 = $this->_block_frame;
    $V4jn4msro4hf = $V4uturqtpcq5->get_root();
    $V22i3rfbdeqx = $this->get_floats_inside($V4jn4msro4hf);
    
    foreach ( $V22i3rfbdeqx as $V5iamy2mwkeq => $Vwpr1dbcm3ri ) {
      $Vwfsll4zanwn = $Vwpr1dbcm3ri->get_id();
      
      if ( isset($this->floating_blocks[$Vwfsll4zanwn]) ) {
        continue;
      }
      
      $Vfmhasex5u02 = $Vwpr1dbcm3ri->get_style();
      
      $Vm1a133hcqh2 = $Vfmhasex5u02->clear;
      $Vpldvvijbza2 = $Vfmhasex5u02->float;
      
      $Vpldvvijbza2ing_width = $Vwpr1dbcm3ri->get_margin_width();
      
      if (!$Vtgsxw1xju1i) {
        $Vtgsxw1xju1i = $Vwpr1dbcm3ri->get_containing_block("w");
      }
      
      $Virlseabwq1j = $this->get_width();
      
      if (!$Vwpr1dbcm3ri->_float_next_line && ($Vtgsxw1xju1i <= $Virlseabwq1j + $Vpldvvijbza2ing_width) && ($Vtgsxw1xju1i > $Virlseabwq1j) ) {
        $Vwpr1dbcm3ri->_float_next_line = true;
        continue;
      }
      
      
      if ( $Vchu5dw0mj22-- > 0 &&
           $Vwpr1dbcm3ri->get_position("y") + $Vwpr1dbcm3ri->get_margin_height() > $this->y && 
           $V4uturqtpcq5->get_position("x") + $V4uturqtpcq5->get_margin_width() > $Vwpr1dbcm3ri->get_position("x")
           ) {
        if ( $Vpldvvijbza2 === "left" )
          $this->left  += $Vpldvvijbza2ing_width;
        else
          $this->right += $Vpldvvijbza2ing_width;
        
        $this->floating_blocks[$Vwfsll4zanwn] = true;
      }
      
      
      else {
        $V4jn4msro4hf->remove_floating_frame($V5iamy2mwkeq);
      }
    }
  }
  
  function get_width(){
    return $this->left + $this->w + $this->right;
  }

  
  function get_block_frame() { return $this->_block_frame; }

  
  function &get_frames() { return $this->_frames; }
  
  function add_frame(Frame $Vrlbsjbjglkb) {
    $this->_frames[] = $Vrlbsjbjglkb;
  }
  
  function __toString(){
    $Vzqw0ieauwu4rops = array("wc", "y", "w", "h", "left", "right", "br");
    $V2n430jknk35 = "";
    foreach($Vzqw0ieauwu4rops as $Vzqw0ieauwu4rop) {
      $V2n430jknk35 .= "$Vzqw0ieauwu4rop: ".$this->$Vzqw0ieauwu4rop."\n";
    }
    $V2n430jknk35 .= count($this->_frames)." frames\n";
    return $V2n430jknk35;
  }
  
}


