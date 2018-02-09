<?php



class Table_Cell_Renderer extends Block_Renderer {

  

  function render(Frame $Vrlbsjbjglkb) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    if ( trim($Vrlbsjbjglkb->get_node()->nodeValue) === "" && $Vdtcpflt5bhp->empty_cells === "hide" ) {
      return;
    }

    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );
    list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_border_box();
    
    
    if ( ($Vn4k2wgjnmox = $Vdtcpflt5bhp->background_color) !== "transparent" ) {
      $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vn4k2wgjnmox);
    }

    if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none" ) {
      $this->_background_image($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp);
    }
    
    $Vmqy2qrqt2lx = Table_Frame_Decorator::find_parent_table($Vrlbsjbjglkb);

    if ( $Vmqy2qrqt2lx->get_style()->border_collapse !== "collapse" ) {
      $this->_render_border($Vrlbsjbjglkb);
      $this->_render_outline($Vrlbsjbjglkb);
      return;
    }

    
    

    $Vdikywjltavg  = $Vmqy2qrqt2lx->get_cellmap();
    $V3rz1hdd5wih    = $Vdikywjltavg->get_spanned_cells($Vrlbsjbjglkb);
    $Vrh5s5n1rw55 = $Vdikywjltavg->get_num_rows();
    $Vioxg5ceavyh = $Vdikywjltavg->get_num_cols();

    
    $Vfhiq1lhsoja = $V3rz1hdd5wih["rows"][0];
    $Vs2ivsyo0lc5 = $Vdikywjltavg->get_row($Vfhiq1lhsoja);

    
    
    
    if (in_array( $Vrh5s5n1rw55 - 1, $V3rz1hdd5wih["rows"])) {
      $V4epwvtiwo1w = true;
      $Va0t3bpbnjqg = $Vdikywjltavg->get_row($Vrh5s5n1rw55 - 1);
    } else
      $V4epwvtiwo1w = false;


    
    foreach ( $V3rz1hdd5wih["columns"] as $Vzmnqyqjjodw ) {
      $V2jdlkn2stut = $Vdikywjltavg->get_border_properties($Vfhiq1lhsoja, $Vzmnqyqjjodw);

      $Vqwmp2bx0ii2 = $Vs2ivsyo0lc5["y"] - $V2jdlkn2stut["top"]["width"] / 2;

      $Vswazvoa3xts = $Vdikywjltavg->get_column($Vzmnqyqjjodw);
      $V1e1eaicqarh = $Vswazvoa3xts["x"] - $V2jdlkn2stut["left"]["width"] / 2;
      $Vwsgifrh5ics = $Vswazvoa3xts["used-width"] + ($V2jdlkn2stut["left"]["width"] + $V2jdlkn2stut["right"]["width"] ) / 2;

      if ( $V2jdlkn2stut["top"]["style"] !== "none" && $V2jdlkn2stut["top"]["width"] > 0 ) {
        $Vwsgifrh5icsidths = array($V2jdlkn2stut["top"]["width"],
                        $V2jdlkn2stut["right"]["width"],
                        $V2jdlkn2stut["bottom"]["width"],
                        $V2jdlkn2stut["left"]["width"]);
        $Vihjcs2gfuz0 = "_border_". $V2jdlkn2stut["top"]["style"];
        $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $V2jdlkn2stut["top"]["color"], $Vwsgifrh5icsidths, "top", "square");
      }

      if ( $V4epwvtiwo1w ) {
        $V2jdlkn2stut = $Vdikywjltavg->get_border_properties($Vrh5s5n1rw55 - 1, $Vzmnqyqjjodw);
        if ( $V2jdlkn2stut["bottom"]["style"] === "none" || $V2jdlkn2stut["bottom"]["width"] <= 0 )
          continue;

        $Vqwmp2bx0ii2 = $Va0t3bpbnjqg["y"] + $Va0t3bpbnjqg["height"] + $V2jdlkn2stut["bottom"]["width"] / 2;

        $Vwsgifrh5icsidths = array($V2jdlkn2stut["top"]["width"],
                        $V2jdlkn2stut["right"]["width"],
                        $V2jdlkn2stut["bottom"]["width"],
                        $V2jdlkn2stut["left"]["width"]);
        $Vihjcs2gfuz0 = "_border_". $V2jdlkn2stut["bottom"]["style"];
        $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $V2jdlkn2stut["bottom"]["color"], $Vwsgifrh5icsidths, "bottom", "square");

      }
    }

    $Vzmnqyqjjodw = $V3rz1hdd5wih["columns"][0];

    $Vhjuszpsou2e = $Vdikywjltavg->get_column($Vzmnqyqjjodw);

    if (in_array($Vioxg5ceavyh - 1, $V3rz1hdd5wih["columns"])) {
      $Vjug3gafdbsw = true;
      $Veufxgel0jmf = $Vdikywjltavg->get_column($Vioxg5ceavyh - 1);
    } else
      $Vjug3gafdbsw = false;

    
    foreach ( $V3rz1hdd5wih["rows"] as $Vfhiq1lhsoja ) {
      $V2jdlkn2stut = $Vdikywjltavg->get_border_properties($Vfhiq1lhsoja, $Vzmnqyqjjodw);

      $V1e1eaicqarh = $Vhjuszpsou2e["x"] - $V2jdlkn2stut["left"]["width"] / 2;

      $Vexbtekafkvl = $Vdikywjltavg->get_row($Vfhiq1lhsoja);

      $Vqwmp2bx0ii2 = $Vexbtekafkvl["y"] - $V2jdlkn2stut["top"]["width"] / 2;
      $Vvlxmepre4ko = $Vexbtekafkvl["height"] + ($V2jdlkn2stut["top"]["width"] + $V2jdlkn2stut["bottom"]["width"])/ 2;

      if ( $V2jdlkn2stut["left"]["style"] !== "none" && $V2jdlkn2stut["left"]["width"] > 0 ) {

        $Vwsgifrh5icsidths = array($V2jdlkn2stut["top"]["width"],
                        $V2jdlkn2stut["right"]["width"],
                        $V2jdlkn2stut["bottom"]["width"],
                        $V2jdlkn2stut["left"]["width"]);

        $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["left"]["style"];
        $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vvlxmepre4ko, $V2jdlkn2stut["left"]["color"], $Vwsgifrh5icsidths, "left", "square");
      }

      if ( $Vjug3gafdbsw ) {
        $V2jdlkn2stut = $Vdikywjltavg->get_border_properties($Vfhiq1lhsoja, $Vioxg5ceavyh - 1);
        if ( $V2jdlkn2stut["right"]["style"] === "none" || $V2jdlkn2stut["right"]["width"] <= 0 )
          continue;

        $V1e1eaicqarh = $Veufxgel0jmf["x"] + $Veufxgel0jmf["used-width"] + $V2jdlkn2stut["right"]["width"] / 2;

        $Vwsgifrh5icsidths = array($V2jdlkn2stut["top"]["width"],
                        $V2jdlkn2stut["right"]["width"],
                        $V2jdlkn2stut["bottom"]["width"],
                        $V2jdlkn2stut["left"]["width"]);

        $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["right"]["style"];
        $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vvlxmepre4ko, $V2jdlkn2stut["right"]["color"], $Vwsgifrh5icsidths, "right", "square");

      }
    }

  }
}
