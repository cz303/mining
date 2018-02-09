#!/usr/bin/php
<?php


require_once "dompdf_config.inc.php";
require_once "lib/php-font-lib/classes/font.cls.php";


function usage() {
  echo <<<EOD

Usage: {$_SERVER["argv"][0]} font_family [n_file [b_file] [i_file] [bi_file]]

font_family:      the name of the font, e.g. Verdana, 'Times New Roman',
                  monospace, sans-serif. If it equals to "system_fonts", 
                  all the system fonts will be installed.

n_file:           the .ttf or .otf file for the normal, non-bold, non-italic
                  face of the font.

{b|i|bi}_file:    the files for each of the respective (bold, italic,
                  bold-italic) faces.

If the optional b|i|bi files are not specified, load_font.php will search
the directory containing normal font file (n_file) for additional files that
it thinks might be the correct ones (e.g. that end in _Bold or b or B).  If
it finds the files they will also be processed.  All files will be
automatically copied to the DOMPDF font directory, and afm files will be
generated using php-font-lib (http:

Examples:

./load_font.php silkscreen /usr/share/fonts/truetype/slkscr.ttf
./load_font.php 'Times New Roman' /mnt/c_drive/WINDOWS/Fonts/times.ttf

EOD;
exit;
}

if ( $_SERVER["argc"] < 3 && @$_SERVER["argv"][1] != "system_fonts" ) {
  usage();
}


function install_font_family($V5yrzpnkhiv4, $V5y5i0zbztiv, $Vqgmpyzmahgw = null, $Vmeubejdy4zy = null, $Vqgmpyzmahgw_italic = null) {
  Font_Metrics::init();
  
  
  if ( !is_readable($V5y5i0zbztiv) )
    throw new DOMPDF_Exception("Unable to read '$V5y5i0zbztiv'.");

  $Vgxxrah4zcfh = dirname($V5y5i0zbztiv);
  $Vrugqnk4kpti = basename($V5y5i0zbztiv);
  $Vqe22bt0oo5z = strrpos($Vrugqnk4kpti, '.');
  if ($Vqe22bt0oo5z !== false) {
    $Vg5mhfl1beoi = substr($Vrugqnk4kpti, 0, $Vqe22bt0oo5z);
    $Vlm5xu0g5cn3 = strtolower(substr($Vrugqnk4kpti, $Vqe22bt0oo5z));
  } else {
    $Vg5mhfl1beoi = $Vrugqnk4kpti;
    $Vlm5xu0g5cn3 = '';
  }

  if ( !in_array($Vlm5xu0g5cn3, array(".ttf", ".otf")) ) {
    throw new DOMPDF_Exception("Unable to process fonts of type '$Vlm5xu0g5cn3'.");
  }

  
  $V3wwyy5a12nc = "$Vgxxrah4zcfh/$Vg5mhfl1beoi";
  
  $Vn0rgmvj0zpg = array(
    "bold"        => array("_Bold", "b", "B", "bd", "BD"),
    "italic"      => array("_Italic", "i", "I"),
    "bold_italic" => array("_Bold_Italic", "bi", "BI", "ib", "IB"),
  );
  
  foreach ($Vn0rgmvj0zpg as $V4pigtpor0ln => $V50owxj4gpdb) {
    if ( !isset($$V4pigtpor0ln) || !is_readable($$V4pigtpor0ln) ) {
      foreach($V50owxj4gpdb as $Vjqlsoelsc55) {
        if ( is_readable("$V3wwyy5a12nc$Vjqlsoelsc55$Vlm5xu0g5cn3") ) {
          $$V4pigtpor0ln = "$V3wwyy5a12nc$Vjqlsoelsc55$Vlm5xu0g5cn3";
          break;
        }
      }
      
      if ( is_null($$V4pigtpor0ln) )
        echo ("Unable to find $V4pigtpor0ln face file.\n");
    }
  }

  $Vbtry0up1z0b = compact("normal", "bold", "italic", "bold_italic");
  $V4o5wb5ucdu5 = array();

  
  foreach ($Vbtry0up1z0b as $V0e1t4aetcq0 => $V0cmmze43kb4) {
    if ( is_null($V0cmmze43kb4) ) {
      $V4o5wb5ucdu5[$V0e1t4aetcq0] = DOMPDF_FONT_DIR . mb_substr(basename($V5y5i0zbztiv), 0, -4);
      continue;
    }

    
    if ( !is_readable($V0cmmze43kb4) )
      throw new DOMPDF_Exception("Requested font '$V0cmmze43kb4' is not readable");

    $Vxuf53cgli2m = DOMPDF_FONT_DIR . basename($V0cmmze43kb4);

    if ( !is_writeable(dirname($Vxuf53cgli2m)) )
      throw new DOMPDF_Exception("Unable to write to destination '$Vxuf53cgli2m'.");

    echo "Copying $V0cmmze43kb4 to $Vxuf53cgli2m...\n";

    if ( !copy($V0cmmze43kb4, $Vxuf53cgli2m) )
      throw new DOMPDF_Exception("Unable to copy '$V0cmmze43kb4' to '$Vxuf53cgli2m'");
    
    $V4o5wb5ucdu5_name = mb_substr($Vxuf53cgli2m, 0, -4);
    
    echo "Generating Adobe Font Metrics for $V4o5wb5ucdu5_name...\n";
    
    $Vje4bngl1cjb = Font::load($Vxuf53cgli2m);
    $Vje4bngl1cjb->saveAdobeFontMetrics("$V4o5wb5ucdu5_name.ufm");

    $V4o5wb5ucdu5[$V0e1t4aetcq0] = $V4o5wb5ucdu5_name;
  }

  
  Font_Metrics::set_font_family($V5yrzpnkhiv4, $V4o5wb5ucdu5);

  
  Font_Metrics::save_font_families();
}


if ( $_SERVER["argv"][1] === "system_fonts" ) {
  $Vbtry0up1z0b = Font_Metrics::get_system_fonts();
  
  foreach ( $Vbtry0up1z0b as $Vt5aj1423wg2 => $Vg5mhfl1beois ) {
    echo " >> Installing '$Vt5aj1423wg2'... \n";
    
    if ( !isset($Vg5mhfl1beois["normal"]) ) {
      echo "No 'normal' style font file\n";
    }
    else {
      install_font_family( $Vt5aj1423wg2, @$Vg5mhfl1beois["normal"], @$Vg5mhfl1beois["bold"], @$Vg5mhfl1beois["italic"], @$Vg5mhfl1beois["bold_italic"]);
      echo "Done !\n";
    }
    
    echo "\n";
  }
}
else {
  call_user_func_array("install_font_family", array_slice($_SERVER["argv"], 1));
}