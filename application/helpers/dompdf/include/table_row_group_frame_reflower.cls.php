<?php



class Table_Row_Group_Frame_Reflower extends Frame_Reflower {

  function __construct($Vrlbsjbjglkb) {
    parent::__construct($Vrlbsjbjglkb);
  }

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vmt0302hgn5x = $this->_frame->get_root();

    $Vdtcpflt5bhp = $this->_frame->get_style();
    
    
    $Vmqy2qrqt2lx = Table_Frame_Decorator::find_parent_table($this->_frame);
    
    $Vstfrw5akne1 = $this->_frame->get_containing_block();
    
    foreach ( $this->_frame->get_children() as $Vcnoizcxjx0n) {
      
      if ( $Vmt0302hgn5x->is_full() )
        return;

      $Vcnoizcxjx0n->set_containing_block($Vstfrw5akne1["x"], $Vstfrw5akne1["y"], $Vstfrw5akne1["w"], $Vstfrw5akne1["h"]);
      $Vcnoizcxjx0n->reflow();

      
      $Vmt0302hgn5x->check_page_break($Vcnoizcxjx0n);

    }

    if ( $Vmt0302hgn5x->is_full() )
      return;

    $Vdikywjltavg = $Vmqy2qrqt2lx->get_cellmap();
    $Vdtcpflt5bhp->width = $Vdikywjltavg->get_frame_width($this->_frame);
    $Vdtcpflt5bhp->height = $Vdikywjltavg->get_frame_height($this->_frame);

    $this->_frame->set_position($Vdikywjltavg->get_frame_position($this->_frame));
    
    if ( $Vmqy2qrqt2lx->get_style()->border_collapse === "collapse" ) 
      
      $Vdtcpflt5bhp->border_style = "none";
 
  }

}
