<?php



class Table_Cell_Frame_Reflower extends Block_Frame_Reflower {

  

  function __construct(Frame $Vrlbsjbjglkb) {
    parent::__construct($Vrlbsjbjglkb);
  }

  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {

    $Vdtcpflt5bhp = $this->_frame->get_style();

    $Vmqy2qrqt2lx = Table_Frame_Decorator::find_parent_table($this->_frame);
    $Vdikywjltavg = $Vmqy2qrqt2lx->get_cellmap();

    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vdikywjltavg->get_frame_position($this->_frame);
    $this->_frame->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);

    $V3rz1hdd5wih = $Vdikywjltavg->get_spanned_cells($this->_frame);

    $Vwsgifrh5ics = 0;
    foreach ( $V3rz1hdd5wih["columns"] as $Vfhiq1lhsoja ) {
      $Vswazvoa3xts = $Vdikywjltavg->get_column( $Vfhiq1lhsoja );
      $Vwsgifrh5ics += $Vswazvoa3xts["used-width"];
    }

    
    $Vvlxmepre4ko = $this->_frame->get_containing_block("h");

    $Vka2qorcci1u = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_left,
                                             $Vdtcpflt5bhp->padding_left,
                                             $Vdtcpflt5bhp->border_left_width),
                                       $Vwsgifrh5ics);

    $Vdkkg5elnog2 = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->padding_right,
                                              $Vdtcpflt5bhp->margin_right,
                                              $Vdtcpflt5bhp->border_right_width),
                                        $Vwsgifrh5ics);

    $Vmdy4wu1pdc2 = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_top,
                                            $Vdtcpflt5bhp->padding_top,
                                            $Vdtcpflt5bhp->border_top_width),
                                      $Vvlxmepre4ko);
    $Va5j2ebfo3qa = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_bottom,
                                               $Vdtcpflt5bhp->padding_bottom,
                                               $Vdtcpflt5bhp->border_bottom_width),
                                      $Vvlxmepre4ko);

    $Vdtcpflt5bhp->width = $Vtgsxw1xju1i = $Vwsgifrh5ics - $Vka2qorcci1u - $Vdkkg5elnog2;

    $V2pgsf0zxxml = $V1e1eaicqarh + $Vka2qorcci1u;
    $Vw5tq3ipukxn = $V3ipyje32x3u = $Vqwmp2bx0ii2 + $Vmdy4wu1pdc2;

    
    $Vfhiq1lhsojandent = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->text_indent, $Vwsgifrh5ics);
    $this->_frame->increase_line_width($Vfhiq1lhsojandent);

    
    $Vmt0302hgn5x = $this->_frame->get_root();
    $this->_frame->set_current_line($V3ipyje32x3u);
    
    
    foreach ( $this->_frame->get_children() as $Vcnoizcxjx0n ) {
      
      if ( $Vmt0302hgn5x->is_full() )
        break;
    
      $Vcnoizcxjx0n->set_containing_block($V2pgsf0zxxml, $Vw5tq3ipukxn, $Vtgsxw1xju1i, $Vvlxmepre4ko);
      $Vcnoizcxjx0n->reflow($this->_frame);
    
      $this->process_float($Vcnoizcxjx0n, $V1e1eaicqarh + $Vka2qorcci1u, $Vwsgifrh5ics - $Vdkkg5elnog2 - $Vka2qorcci1u);
    }

    
    $Vdtcpflt5bhp_height = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->height, $Vvlxmepre4ko);

    $this->_frame->set_content_height($this->_calculate_content_height());

    $Vvlxmepre4koeight = max($Vdtcpflt5bhp_height, $this->_frame->get_content_height());

    
    $Vcundmlauobm = $Vvlxmepre4koeight / count($V3rz1hdd5wih["rows"]);

    if ($Vdtcpflt5bhp_height <= $Vvlxmepre4koeight)
      $Vcundmlauobm += $Vmdy4wu1pdc2 + $Va5j2ebfo3qa;

    foreach ($V3rz1hdd5wih["rows"] as $Vfhiq1lhsoja)
      $Vdikywjltavg->set_row_height($Vfhiq1lhsoja, $Vcundmlauobm);

    $Vdtcpflt5bhp->height = $Vvlxmepre4koeight;

    $this->_text_align();

    $this->vertical_align();

  }

}
