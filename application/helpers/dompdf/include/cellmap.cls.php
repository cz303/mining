<?php



class Cellmap {

  
  static protected $Vokawrwbyj1o = array("inset"  => 1,
                                                "groove" => 2,
                                                "outset" => 3,
                                                "ridge"  => 4,
                                                "dotted" => 5,
                                                "dashed" => 6,
                                                "solid"  => 7,
                                                "double" => 8,
                                                "hidden" => 9,
                                                "none"   => 0);

  
  protected $Vohdg44yjr0o;

  
  protected $Vvvzm3vox0lq;

  
  protected $Vwlkflkkv5rm;

  
  protected $Vleeiogkramx;

  
  protected $Vjbnm0l10wjx;

  
  protected $Vc0kawzmw4nq;

  
  protected $Vbub0evozvwk;

  
  protected $Vmuo1q0qmqjf;

  
  private $V2txjmf14yax;

  
  private $Vbp1sdxdn0z1;
  
  
  private $Vjbnm0l10wjx_locked = false;

  

  function __construct(Table_Frame_Decorator $Vmqy2qrqt2lx) {
    $this->_table = $Vmqy2qrqt2lx;
    $this->reset();
  }
  
  function __destruct() {
    clear_object($this);
  }
  

  function reset() {
    $this->_num_rows = 0;
    $this->_num_cols = 0;

    $this->_cells  = array();
    $this->_frames = array();

    if ( !$this->_columns_locked ) {
      $this->_columns = array();
    }
    
    $this->_rows = array();

    $this->_borders = array();

    $this->__col = $this->__row = 0;
  }

  

  function lock_columns() { 
    $this->_columns_locked = true; 
  }

  function is_columns_locked() {
    return $this->_columns_locked;
  }
  
  function get_num_rows() { return $this->_num_rows; }
  function get_num_cols() { return $this->_num_cols; }

  function &get_columns() {
    return $this->_columns;
  }

  function set_columns($V45swt0xn55i) {
    $this->_columns = $V45swt0xn55i;
  }

  function &get_column($Vfhiq1lhsoja) {
    if ( !isset($this->_columns[$Vfhiq1lhsoja]) )
      $this->_columns[$Vfhiq1lhsoja] = array("x" => 0,
                                  "min-width" => 0,
                                  "max-width" => 0,
                                  "used-width" => null,
                                  "absolute" => 0,
                                  "percent" => 0,
                                  "auto" => true);

    return $this->_columns[$Vfhiq1lhsoja];
  }

  function &get_rows() {
    return $this->_rows;
  }

  function &get_row($Vzmnqyqjjodw) {
    if ( !isset($this->_rows[$Vzmnqyqjjodw]) )
      $this->_rows[$Vzmnqyqjjodw] = array("y" => 0,
                               "first-column" => 0,
                               "height" => null);
    return $this->_rows[$Vzmnqyqjjodw];
  }

  function get_border($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vv4lkrp4t0mp, $Vmscaatmpbzu = null) {
    if ( !isset($this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp]) )
      $this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp] = array("width" => 0,
                                           "style" => "solid",
                                           "color" => "black");
    if ( isset($Vmscaatmpbzu) )
      return $this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp][$Vmscaatmpbzu];

    return $this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp];
  }

  function get_border_properties($Vfhiq1lhsoja, $Vzmnqyqjjodw) {

    $Vrce0gsxjgkc = $this->get_border($Vfhiq1lhsoja, $Vzmnqyqjjodw, "vertical");
    $Vqyn43hpxtm0 = $this->get_border($Vfhiq1lhsoja, $Vzmnqyqjjodw+1, "vertical");
    $Vrveb1xz24qu = $this->get_border($Vfhiq1lhsoja, $Vzmnqyqjjodw, "horizontal");
    $Vyzmqhafpy0b = $this->get_border($Vfhiq1lhsoja+1, $Vzmnqyqjjodw, "horizontal");

    return compact("top", "bottom", "left", "right");
  }

  

  function get_spanned_cells($Vrlbsjbjglkb) {
    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

    if ( !isset($this->_frames[$Vseq1edikdvg]) ) {
      throw new DOMPDF_Exception("Frame not found in cellmap");
    }

    return $this->_frames[$Vseq1edikdvg];

  }

  function frame_exists_in_cellmap($Vrlbsjbjglkb) {
    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();
    return isset($this->_frames[$Vseq1edikdvg]);
  }
  
  function get_frame_position($Vrlbsjbjglkb) {
    global $Vlb1pyhumpag;

    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

    if ( !isset($this->_frames[$Vseq1edikdvg]) ) {
      throw new DOMPDF_Exception("Frame not found in cellmap");
    }

    $Vswazvoa3xts = $this->_frames[$Vseq1edikdvg]["columns"][0];
    $Vexbtekafkvl = $this->_frames[$Vseq1edikdvg]["rows"][0];

    if ( !isset($this->_columns[$Vswazvoa3xts])) {
      $Vlb1pyhumpag[] = "Frame not found in columns array.  Check your table layout for missing or extra TDs.";
      $V1e1eaicqarh = 0;
    } else
      $V1e1eaicqarh = $this->_columns[$Vswazvoa3xts]["x"];

    if ( !isset($this->_rows[$Vexbtekafkvl])) {
      $Vlb1pyhumpag[] = "Frame not found in row array.  Check your table layout for missing or extra TDs.";
      $Vqwmp2bx0ii2 = 0;
    } else
      $Vqwmp2bx0ii2 = $this->_rows[$Vexbtekafkvl]["y"];

    return array($V1e1eaicqarh, $Vqwmp2bx0ii2, "x" => $V1e1eaicqarh, "y" => $Vqwmp2bx0ii2);
  }

  function get_frame_width($Vrlbsjbjglkb) {
    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

    if ( !isset($this->_frames[$Vseq1edikdvg]) ) {
      throw new DOMPDF_Exception("Frame not found in cellmap");
    }

    $Vswazvoa3xtss = $this->_frames[$Vseq1edikdvg]["columns"];
    $Vwsgifrh5ics = 0;
    foreach ($Vswazvoa3xtss as $Vfhiq1lhsoja)
      $Vwsgifrh5ics += $this->_columns[$Vfhiq1lhsoja]["used-width"];

    return $Vwsgifrh5ics;

  }

  function get_frame_height($Vrlbsjbjglkb) {
    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

    if ( !isset($this->_frames[$Vseq1edikdvg]) ) {
      throw new DOMPDF_Exception("Frame not found in cellmap");
    }

    $Vexbtekafkvls = $this->_frames[$Vseq1edikdvg]["rows"];
    $Vvlxmepre4ko = 0;
    foreach ($Vexbtekafkvls as $Vfhiq1lhsoja) {
      if ( !isset($this->_rows[$Vfhiq1lhsoja]) )  {
        throw new Exception("foo");
      }
      $Vvlxmepre4ko += $this->_rows[$Vfhiq1lhsoja]["height"];
    }
    return $Vvlxmepre4ko;

  }


  

  function set_column_width($Vzmnqyqjjodw, $Vwsgifrh5icsidth) {
    if ( $this->_columns_locked ) {
      return;
    }
    
    $Vswazvoa3xts =& $this->get_column($Vzmnqyqjjodw);
    $Vswazvoa3xts["used-width"] = $Vwsgifrh5icsidth;
    $Vbj0jsatj4cj =& $this->get_column($Vzmnqyqjjodw+1);
    $Vbj0jsatj4cj["x"] = $Vbj0jsatj4cj["x"] + $Vwsgifrh5icsidth;
  }

  function set_row_height($Vfhiq1lhsoja, $Vvlxmepre4koeight) {
    $Vexbtekafkvl =& $this->get_row($Vfhiq1lhsoja);
    
    if ( $Vexbtekafkvl["height"] !== null && $Vvlxmepre4koeight <= $Vexbtekafkvl["height"] ) {
      return;
    }

    $Vexbtekafkvl["height"] = $Vvlxmepre4koeight;
    $Vkfetqeituzv =& $this->get_row($Vfhiq1lhsoja+1);
    $Vkfetqeituzv["y"] = $Vexbtekafkvl["y"] + $Vvlxmepre4koeight;

  }

  


  protected function _resolve_border($Vfhiq1lhsoja, $Vzmnqyqjjodw, $Vv4lkrp4t0mp, $V5kdivqyx0yw) {
    $V0njzofv5htj = $V5kdivqyx0yw["width"];
    $V5nj0ngtg3qk = $V5kdivqyx0yw["style"];
    $Vkjw1h2byciz = $V5kdivqyx0yw["color"];

    if ( !isset($this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp]) ) {
      $this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp] = $V5kdivqyx0yw;
      return $this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp]["width"];
    }
    
    $Vth4pmttv33i = &$this->_borders[$Vfhiq1lhsoja][$Vzmnqyqjjodw][$Vv4lkrp4t0mp];
    
    $V5fhpmw0yikv = $Vth4pmttv33i["width"];
    $Vsej3v1zge5k = $Vth4pmttv33i["style"];
    $Vgpmtg2qav0j = $Vth4pmttv33i["color"];

    if ( ($V5nj0ngtg3qk === "hidden" ||
          $V0njzofv5htj  >  $V5fhpmw0yikv ||
          $Vsej3v1zge5k === "none")

         or

         ($V5fhpmw0yikv == $V0njzofv5htj &&
          in_array($V5nj0ngtg3qk, self::$Vokawrwbyj1o) &&
          self::$Vokawrwbyj1o[ $V5nj0ngtg3qk ] > self::$Vokawrwbyj1o[ $Vsej3v1zge5k ]) )
      $Vth4pmttv33i = $V5kdivqyx0yw;

    return $Vth4pmttv33i["width"];
  }

  

  function add_frame(Frame $Vrlbsjbjglkb) {
    
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vqiav1fbghsg = $Vdtcpflt5bhp->display;

    $Vswazvoa3xtslapse = $this->_table->get_style()->border_collapse == "collapse";

    
    if ( $Vqiav1fbghsg === "table-row" ||
         $Vqiav1fbghsg === "table" ||
         $Vqiav1fbghsg === "inline-table" ||
         in_array($Vqiav1fbghsg, Table_Frame_Decorator::$Vhf3yl3hhrje) ) {

      $Vzglnhbpplt1 = $this->__row;
      foreach ( $Vrlbsjbjglkb->get_children() as $Vcnoizcxjx0n )
        $this->add_frame( $Vcnoizcxjx0n );

      if ( $Vqiav1fbghsg === "table-row" )
        $this->add_row();

      $Vrh5s5n1rw55 = $this->__row - $Vzglnhbpplt1 - 1;
      $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

      
      $this->_frames[$Vseq1edikdvg]["columns"] = range(0,max(0,$this->_num_cols-1));
      $this->_frames[$Vseq1edikdvg]["rows"] = range($Vzglnhbpplt1, max(0, $this->__row - 1));
      $this->_frames[$Vseq1edikdvg]["frame"] = $Vrlbsjbjglkb;

      if ( $Vqiav1fbghsg !== "table-row" && $Vswazvoa3xtslapse ) {

        $V2jdlkn2stut = $Vdtcpflt5bhp->get_border_properties();

        
        for ( $Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vrh5s5n1rw55+1; $Vfhiq1lhsoja++) {
          $this->_resolve_border($Vzglnhbpplt1 + $Vfhiq1lhsoja, 0, "vertical", $V2jdlkn2stut["left"]);
          $this->_resolve_border($Vzglnhbpplt1 + $Vfhiq1lhsoja, $this->_num_cols, "vertical", $V2jdlkn2stut["right"]);
        }

        for ( $Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->_num_cols; $Vzmnqyqjjodw++) {
          $this->_resolve_border($Vzglnhbpplt1, $Vzmnqyqjjodw, "horizontal", $V2jdlkn2stut["top"]);
          $this->_resolve_border($this->__row, $Vzmnqyqjjodw, "horizontal", $V2jdlkn2stut["bottom"]);
        }
      }


      return;
    }
    
    $V1en3qe0uyt3 = $Vrlbsjbjglkb->get_node();
    
    
    $Vswazvoa3xtsspan = $V1en3qe0uyt3->getAttribute("colspan");
    $Vexbtekafkvlspan = $V1en3qe0uyt3->getAttribute("rowspan");

    if ( !$Vswazvoa3xtsspan ) {
      $Vswazvoa3xtsspan = 1;
      $V1en3qe0uyt3->setAttribute("colspan",1);
    }

    if ( !$Vexbtekafkvlspan ) {
      $Vexbtekafkvlspan = 1;
      $V1en3qe0uyt3->setAttribute("rowspan",1);
    }
    $Vseq1edikdvg = $Vrlbsjbjglkb->get_id();

    $V2jdlkn2stut = $Vdtcpflt5bhp->get_border_properties();


    
    $Vywhj35tflyv = $Vllx0msxpcxi = 0;

    
    $Vd2nrurp3t2h = $this->__col;
    while ( isset($this->_cells[$this->__row][$Vd2nrurp3t2h]) )
       $Vd2nrurp3t2h++;
    $this->__col = $Vd2nrurp3t2h;

    
    for ( $Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vexbtekafkvlspan; $Vfhiq1lhsoja++ ) {
      $Vexbtekafkvl = $this->__row + $Vfhiq1lhsoja;

      $this->_frames[$Vseq1edikdvg]["rows"][] = $Vexbtekafkvl;

      for ( $Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vswazvoa3xtsspan; $Vzmnqyqjjodw++)
        $this->_cells[$Vexbtekafkvl][$this->__col + $Vzmnqyqjjodw] = $Vrlbsjbjglkb;

      if ( $Vswazvoa3xtslapse ) {
        
        $Vywhj35tflyv = max($Vywhj35tflyv, $this->_resolve_border($Vexbtekafkvl, $this->__col, "vertical", $V2jdlkn2stut["left"]));
        $Vllx0msxpcxi = max($Vllx0msxpcxi, $this->_resolve_border($Vexbtekafkvl, $this->__col + $Vswazvoa3xtsspan, "vertical", $V2jdlkn2stut["right"]));
      }
    }

    $Vybrzeivwk5m = $Vszoim0xyt52 = 0;

    
    for ( $Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vswazvoa3xtsspan; $Vzmnqyqjjodw++ ) {
      $Vswazvoa3xts = $this->__col + $Vzmnqyqjjodw;
      $this->_frames[$Vseq1edikdvg]["columns"][] = $Vswazvoa3xts;

      if ( $Vswazvoa3xtslapse ) {
        
        $Vybrzeivwk5m = max($Vybrzeivwk5m, $this->_resolve_border($this->__row, $Vswazvoa3xts, "horizontal", $V2jdlkn2stut["top"]));
        $Vszoim0xyt52 = max($Vszoim0xyt52, $this->_resolve_border($this->__row + $Vexbtekafkvlspan, $Vswazvoa3xts, "horizontal", $V2jdlkn2stut["bottom"]));
      }
    }

    $this->_frames[$Vseq1edikdvg]["frame"] = $Vrlbsjbjglkb;

    
    if ( !$Vswazvoa3xtslapse ) {
      list($Vvlxmepre4ko, $Vf1kwqxxhqpz) = $this->_table->get_style()->border_spacing;

      
      $Vf1kwqxxhqpz = $Vdtcpflt5bhp->length_in_pt($Vf1kwqxxhqpz) / 2;
      $Vvlxmepre4ko = $Vdtcpflt5bhp->length_in_pt($Vvlxmepre4ko) / 2;
      $Vdtcpflt5bhp->margin = "$Vf1kwqxxhqpz $Vvlxmepre4ko";

      

    } else {

      
      $Vdtcpflt5bhp->border_left_width = $Vywhj35tflyv / 2;
      $Vdtcpflt5bhp->border_right_width = $Vllx0msxpcxi / 2;
      $Vdtcpflt5bhp->border_top_width = $Vybrzeivwk5m / 2;
      $Vdtcpflt5bhp->border_bottom_width = $Vszoim0xyt52 / 2;
      $Vdtcpflt5bhp->margin = "none";
    }

    
    list($Vrlbsjbjglkb_min, $Vrlbsjbjglkb_max) = $Vrlbsjbjglkb->get_min_max_width();

    $Vwsgifrh5icsidth = $Vdtcpflt5bhp->width;

    if ( is_percent($Vwsgifrh5icsidth) ) {
      $Vf1kwqxxhqpzar = "percent";
      $Vf1kwqxxhqpzal = (float)rtrim($Vwsgifrh5icsidth, "% ") / $Vswazvoa3xtsspan;

    } else if ( $Vwsgifrh5icsidth !== "auto" ) {
      $Vf1kwqxxhqpzar = "absolute";
      $Vf1kwqxxhqpzal = $Vdtcpflt5bhp->length_in_pt($Vrlbsjbjglkb_min) / $Vswazvoa3xtsspan;
    }

    if (!$this->_columns_locked) {
      $Va110n5xyul0 = 0;
      $Vpu53dziligd = 0;
      for ( $V2wcuewfbgca = 0; $V2wcuewfbgca < $Vswazvoa3xtsspan; $V2wcuewfbgca++ ) {
  
        
        $Vswazvoa3xts =& $this->get_column( $this->__col + $V2wcuewfbgca );
  
        
        
        
        if ( isset($Vf1kwqxxhqpzar) && $Vf1kwqxxhqpzal > $Vswazvoa3xts[$Vf1kwqxxhqpzar] ) {
          $Vswazvoa3xts[$Vf1kwqxxhqpzar] = $Vf1kwqxxhqpzal;
          $Vswazvoa3xts["auto"] = false;
        }
  
        $Va110n5xyul0 += $Vswazvoa3xts["min-width"];
        $Vpu53dziligd += $Vswazvoa3xts["max-width"];
      }
  
  
      if ( $Vrlbsjbjglkb_min > $Va110n5xyul0 ) {
        
        $Vfhiq1lhsojanc = ($Vrlbsjbjglkb_min - $Va110n5xyul0) / $Vswazvoa3xtsspan;
        for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vswazvoa3xtsspan; $V4y0urwpnd3j++) {
          $Vswazvoa3xts =& $this->get_column($this->__col + $V4y0urwpnd3j);
          $Vswazvoa3xts["min-width"] += $Vfhiq1lhsojanc;
        }
      }
  
      if ( $Vrlbsjbjglkb_max > $Vpu53dziligd ) {
        $Vfhiq1lhsojanc = ($Vrlbsjbjglkb_max - $Vpu53dziligd) / $Vswazvoa3xtsspan;
        for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vswazvoa3xtsspan; $V4y0urwpnd3j++) {
          $Vswazvoa3xts =& $this->get_column($this->__col + $V4y0urwpnd3j);
          $Vswazvoa3xts["max-width"] += $Vfhiq1lhsojanc;
        }
      }
    }

    $this->__col += $Vswazvoa3xtsspan;
    if ( $this->__col > $this->_num_cols )
      $this->_num_cols = $this->__col;

  }

  

  function add_row() {

    $this->__row++;
    $this->_num_rows++;

    
    $Vfhiq1lhsoja = 0;
    while ( isset($this->_cells[$this->__row][$Vfhiq1lhsoja]) )
      $Vfhiq1lhsoja++;

    $this->__col = $Vfhiq1lhsoja;

  }

  

  
  function remove_row(Frame $Vexbtekafkvl) {

    $Vseq1edikdvg = $Vexbtekafkvl->get_id();
    if ( !isset($this->_frames[$Vseq1edikdvg]) )
      return;  

    $this->_row = $this->_num_rows--;

    $Vexbtekafkvls = $this->_frames[$Vseq1edikdvg]["rows"];
    $V45swt0xn55i = $this->_frames[$Vseq1edikdvg]["columns"];

    
    foreach ( $Vexbtekafkvls as $Vws44nszhvgo ) {
      foreach ( $V45swt0xn55i as $V4y0urwpnd3j ) {
        if ( isset($this->_cells[$Vws44nszhvgo][$V4y0urwpnd3j]) ) {
          $Vfhiq1lhsojad = $this->_cells[$Vws44nszhvgo][$V4y0urwpnd3j]->get_id();
          
          $this->_frames[$Vfhiq1lhsojad] = null;
          unset($this->_frames[$Vfhiq1lhsojad]);
          
          $this->_cells[$Vws44nszhvgo][$V4y0urwpnd3j] = null;
          unset($this->_cells[$Vws44nszhvgo][$V4y0urwpnd3j]);
        }
      }
      $this->_rows[$Vws44nszhvgo] = null;
      unset($this->_rows[$Vws44nszhvgo]);
    }

    $this->_frames[$Vseq1edikdvg] = null;
    unset($this->_frames[$Vseq1edikdvg]);

  }

  
  function remove_row_group(Frame $V5ik4ei4v455) {

    $Vseq1edikdvg = $V5ik4ei4v455->get_id();
    if ( !isset($this->_frames[$Vseq1edikdvg]) )
      return;  

    $Vfhiq1lhsojater = $V5ik4ei4v455->get_first_child();
    while ($Vfhiq1lhsojater) {
      $this->remove_row($Vfhiq1lhsojater);
      $Vfhiq1lhsojater = $Vfhiq1lhsojater->get_next_sibling();
    }

    $this->_frames[$Vseq1edikdvg] = null;
    unset($this->_frames[$Vseq1edikdvg]);
  }

  
  function update_row_group(Frame $V5ik4ei4v455, Frame $Vvzxbio4or1a) {

    $Vmiwrqbfoqm1 = $V5ik4ei4v455->get_id();
    $Vws44nszhvgo_key = $Vvzxbio4or1a->get_id();

    $Vws44nszhvgo_rows = $this->_frames[$Vws44nszhvgo_key]["rows"];
    $this->_frames[$Vmiwrqbfoqm1]["rows"] = range( $this->_frames[$Vmiwrqbfoqm1]["rows"][0], end($Vws44nszhvgo_rows) );

  }

  

  function assign_x_positions() {
    
    

    if ( $this->_columns_locked ) {
      return;
    }
    
    $V1e1eaicqarh = $this->_columns[0]["x"];
    foreach ( array_keys($this->_columns) as $Vzmnqyqjjodw ) {
      $this->_columns[$Vzmnqyqjjodw]["x"] = $V1e1eaicqarh;
      $V1e1eaicqarh += $this->_columns[$Vzmnqyqjjodw]["used-width"];

    }

  }

  function assign_frame_heights() {
    
    

    foreach ( $this->_frames as $Vd5mgesqkq2x ) {
      $Vrlbsjbjglkb = $Vd5mgesqkq2x["frame"];

      $Vvlxmepre4ko = 0;
      foreach( $Vd5mgesqkq2x["rows"] as $Vexbtekafkvl ) {
        if ( !isset($this->_rows[$Vexbtekafkvl]) )
          
          continue;
        $Vvlxmepre4ko += $this->_rows[$Vexbtekafkvl]["height"];
      }

      if ( $Vrlbsjbjglkb instanceof Table_Cell_Frame_Decorator )
        $Vrlbsjbjglkb->set_cell_height($Vvlxmepre4ko);
      else
        $Vrlbsjbjglkb->get_style()->height = $Vvlxmepre4ko;
    }

  }

  

  
  function set_frame_heights($Vmqy2qrqt2lx_height, $V4y0urwpnd3jontent_height) {


    
    foreach ( $this->_frames as $Vd5mgesqkq2x ) {
      $Vrlbsjbjglkb = $Vd5mgesqkq2x["frame"];

      $Vvlxmepre4ko = 0;
      foreach ($Vd5mgesqkq2x["rows"] as $Vexbtekafkvl ) {
        if ( !isset($this->_rows[$Vexbtekafkvl]) )
          continue;

        $Vvlxmepre4ko += $this->_rows[$Vexbtekafkvl]["height"];
      }
      
      if ( $V4y0urwpnd3jontent_height > 0 )
        $Vftgte5yvwv5 = ($Vvlxmepre4ko / $V4y0urwpnd3jontent_height) * $Vmqy2qrqt2lx_height;
      else
        $Vftgte5yvwv5 = 0;

      if ( $Vrlbsjbjglkb instanceof Table_Cell_Frame_Decorator )
        $Vrlbsjbjglkb->set_cell_height($Vftgte5yvwv5);
      else
        $Vrlbsjbjglkb->get_style()->height = $Vftgte5yvwv5;
    }

  }

  

  
  function __toString() {
    $Vyqctydehp2e = "";
    $Vyqctydehp2e .= "Columns:<br/>";
    $Vyqctydehp2e .= pre_r($this->_columns, true);
    $Vyqctydehp2e .=  "Rows:<br/>";
    $Vyqctydehp2e .= pre_r($this->_rows, true);

    $Vyqctydehp2e .=  "Frames:<br/>";
    $Vd5mgesqkq2x = array();
    foreach ( $this->_frames as $Vseq1edikdvg => $Vf1kwqxxhqpzal )
      $Vd5mgesqkq2x[$Vseq1edikdvg] = array("columns" => $Vf1kwqxxhqpzal["columns"], "rows" => $Vf1kwqxxhqpzal["rows"]);

    $Vyqctydehp2e .= pre_r($Vd5mgesqkq2x, true);

    if ( php_sapi_name() == "cli" )
      $Vyqctydehp2e = strip_tags(str_replace(array("<br/>","<b>","</b>"),
                                    array("\n",chr(27)."[01;33m", chr(27)."[0m"),
                                    $Vyqctydehp2e));
    return $Vyqctydehp2e;
  }
}
