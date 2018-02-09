<?php



class Table_Cell_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
  
  

  function position() {

    $Vmqy2qrqt2lx = Table_Frame_Decorator::find_parent_table($this->_frame);
    $Vdikywjltavg = $Vmqy2qrqt2lx->get_cellmap();
    $this->_frame->set_position($Vdikywjltavg->get_frame_position($this->_frame));

  }
}
