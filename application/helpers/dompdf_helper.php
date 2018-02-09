<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');




function pdf_create($Vxcvxsbzpwbz, $Vv0mtkrhebac = '', $V2ov2dxpmqj1 = TRUE, $V5gcudg1lgsy = '') {
    require_once("dompdf/dompdf_config.inc.php");

    $Vhygqjznl3ul = new DOMPDF();
    $Vhygqjznl3ul->load_html($Vxcvxsbzpwbz);

    if ($V5gcudg1lgsy != '') {
        $Vhygqjznl3ul->set_paper("a4", "landscape");
    }

    $Vhygqjznl3ul->render();
    if ($V2ov2dxpmqj1) {
        $Vhygqjznl3ul->stream($Vv0mtkrhebac . ".pdf");
    } else {
        return $Vhygqjznl3ul->output();
    }
}
