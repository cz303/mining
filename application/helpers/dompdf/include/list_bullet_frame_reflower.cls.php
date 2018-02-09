<?php



class List_Bullet_Frame_Reflower extends Frame_Reflower {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
    
  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vdtcpflt5bhp = $this->_frame->get_style();

    $Vdtcpflt5bhp->width = $this->_frame->get_width();
    $this->_frame->position();

    if ( $Vdtcpflt5bhp->list_style_position === "inside" ) {
      $Vzqw0ieauwu4 = $this->_frame->find_block_parent();
      $Vzqw0ieauwu4->add_frame_to_line($this->_frame);
    }

  }
}
