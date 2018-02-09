<?php



class Null_Frame_Decorator extends Frame_Decorator {

  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vdtcpflt5bhp->width = 0;
    $Vdtcpflt5bhp->height = 0;
    $Vdtcpflt5bhp->margin = 0;
    $Vdtcpflt5bhp->padding = 0;
  }

}
