<?php



interface Canvas {

  
  function get_page_number();

  
  function get_page_count();

  
  function set_page_count($Vytbsuz3c5qz);

  
  function line($Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null);

     
  function rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n, $Vojs2qdgagwv, $Vdtcpflt5bhp = null);

     
  function filled_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vl5jzlxo3j3n);

     
  function clipping_rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5ics, $Vvlxmepre4ko);
  
    
  function clipping_end();
  
  
  function save();
  
  
  function restore();
  
  
  function rotate($Vdbkfmikyl2i, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  
  
  function skew($Vdbkfmikyl2i_x, $Vdbkfmikyl2i_y, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  
  
  function scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  
  
  function translate($Vbzoega0pdxj, $Vxmzwkm4htrf);
  
  
  function transform($Vi3y3l1uvwp3, $V4t3fwdd3eev, $V4y0urwpnd3j, $Vrec2f1japon, $Vnhm0uuykimv, $Vtbbah5lqvpo);
  
  
  function polygon($Vix4igm1vywd, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false);

     
  function circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vl5jzlxo3j3n, $Vojs2qdgagwv = null, $Vdtcpflt5bhp = null, $Vtbbah5lqvpoill = false);

  
  function image($V0oq1igdwxo4, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vws44nszhvgoesolution = "normal");

  
  function text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vl5jzlxo3j3n = array(0,0,0), $Vwsgifrh5icsord_space = 0, $V4y0urwpnd3jhar_space = 0, $Vdbkfmikyl2i = 0);

  
  function add_named_dest($Vi3y3l1uvwp3nchorname);

  
  function add_link($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vvlxmepre4koeight);
  
  
  function add_info($Vcvluzjs3wzb, $Vp4xjtpabm0l);
  
  
  function get_text_width($Vkjdq1foihhi, $Vtbbah5lqvpoont, $V4jbadwq4bzj, $Vwsgifrh5icsord_spacing = 0, $V4y0urwpnd3jhar_spacing = 0);

  
  function get_font_height($Vtbbah5lqvpoont, $V4jbadwq4bzj);
  
  function get_font_baseline($Vtbbah5lqvpoont, $V4jbadwq4bzj);
  
  
  
  
  
  function set_opacity($Vjqeycctd35y, $Vbdcqcmfhadr = "Normal");
  
  
  function set_default_view($Vr2ci5ntypot, $Vobxlvad3352 = array());
  
  
  function new_page();

  
  function stream($Vtbbah5lqvpoilename, $Vobxlvad3352 = null);

  
  function output($Vobxlvad3352 = null);
  
}
