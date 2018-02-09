<?php



class Table_Row_Frame_Reflower extends Frame_Reflower {


  function __construct(Table_Row_Frame_Decorator $Vrlbsjbjglkb) {
    parent::__construct($Vrlbsjbjglkb);
  }

  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vmt0302hgn5x = $this->_frame->get_root();

    if ( $Vmt0302hgn5x->is_full() )
      return;

    $this->_frame->position();
    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vstfrw5akne1 = $this->_frame->get_containing_block();

    foreach ($this->_frame->get_children() as $Vcnoizcxjx0n) {

      if ( $Vmt0302hgn5x->is_full() )
        return;

      $Vcnoizcxjx0n->set_containing_block($Vstfrw5akne1);
      $Vcnoizcxjx0n->reflow();

    }

    if ( $Vmt0302hgn5x->is_full() )
      return;

    $Vmqy2qrqt2lx = Table_Frame_Decorator::find_parent_table($this->_frame);
    $Vdikywjltavg = $Vmqy2qrqt2lx->get_cellmap();
    $Vdtcpflt5bhp->width = $Vdikywjltavg->get_frame_width($this->_frame);
    $Vdtcpflt5bhp->height = $Vdikywjltavg->get_frame_height($this->_frame);

    $this->_frame->set_position($Vdikywjltavg->get_frame_position($this->_frame));

  }

  

  function get_min_max_width() {
    throw new DOMPDF_Exception("Min/max width is undefined for table rows");
  }
}
