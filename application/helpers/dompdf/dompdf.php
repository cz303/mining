<?php



function dompdf_usage() {
  $Vod0dnjr01y1 = DOMPDF_DEFAULT_PAPER_SIZE;
  
  echo <<<EOD
  
Usage: {$_SERVER["argv"][0]} [options] html_file

html_file can be a filename, a url if fopen_wrappers are enabled, or the '-' character to read from standard input.

Options:
 -h             Show this message
 -l             List available paper sizes
 -p size        Paper size; something like 'letter', 'A4', 'legal', etc.  
                  The default is '$Vod0dnjr01y1'
 -o orientation Either 'portrait' or 'landscape'.  Default is 'portrait'
 -b path        Set the 'document root' of the html_file.  
                  Relative urls (for stylesheets) are resolved using this directory.  
                  Default is the directory of html_file.
 -f file        The output filename.  Default is the input [html_file].pdf
 -v             Verbose: display html parsing warnings and file not found errors.
 -d             Very verbose: display oodles of debugging output: every frame 
                  in the tree printed to stdout.
 -t             Comma separated list of debugging types (page-break,reflow,split)
 
EOD;
exit;
}


function getoptions() {

  $Viifb50nus3n = array();

  if ( $_SERVER["argc"] == 1 )
    return $Viifb50nus3n;

  $Vfhiq1lhsoja = 1;
  while ($Vfhiq1lhsoja < $_SERVER["argc"]) {

    switch ($_SERVER["argv"][$Vfhiq1lhsoja]) {

    case "--help":
    case "-h":
      $Viifb50nus3n["h"] = true;
      $Vfhiq1lhsoja++;
      break;

    case "-l":
      $Viifb50nus3n["l"] = true;
      $Vfhiq1lhsoja++;
      break;

    case "-p":
      if ( !isset($_SERVER["argv"][$Vfhiq1lhsoja+1]) )
        die("-p switch requires a size parameter\n");
      $Viifb50nus3n["p"] = $_SERVER["argv"][$Vfhiq1lhsoja+1];
      $Vfhiq1lhsoja += 2;
      break;

    case "-o":
      if ( !isset($_SERVER["argv"][$Vfhiq1lhsoja+1]) )
        die("-o switch requires an orientation parameter\n");
      $Viifb50nus3n["o"] = $_SERVER["argv"][$Vfhiq1lhsoja+1];
      $Vfhiq1lhsoja += 2;
      break;

    case "-b":
      if ( !isset($_SERVER["argv"][$Vfhiq1lhsoja+1]) )
        die("-b switch requires a path parameter\n");
      $Viifb50nus3n["b"] = $_SERVER["argv"][$Vfhiq1lhsoja+1];
      $Vfhiq1lhsoja += 2;
      break;

    case "-f":
      if ( !isset($_SERVER["argv"][$Vfhiq1lhsoja+1]) )
        die("-f switch requires a filename parameter\n");
      $Viifb50nus3n["f"] = $_SERVER["argv"][$Vfhiq1lhsoja+1];
      $Vfhiq1lhsoja += 2;
      break;

    case "-v":
      $Viifb50nus3n["v"] = true;
      $Vfhiq1lhsoja++;
      break;

    case "-d":
      $Viifb50nus3n["d"] = true;
      $Vfhiq1lhsoja++;
      break;

    case "-t":
      if ( !isset($_SERVER['argv'][$Vfhiq1lhsoja + 1]) )
        die("-t switch requires a comma separated list of types\n");
      $Viifb50nus3n["t"] = $_SERVER['argv'][$Vfhiq1lhsoja+1];
      $Vfhiq1lhsoja += 2;
      break;

   default:
      $Viifb50nus3n["filename"] = $_SERVER["argv"][$Vfhiq1lhsoja];
      $Vfhiq1lhsoja++;
      break;
    }

  }
  return $Viifb50nus3n;
}

require_once("dompdf_config.inc.php");
global $Vxh3hfxmt4gu, $Vatvjzg4ejqt, $Vwvvrkk5e0vh;

$Vqiuptt22ezv = php_sapi_name();
$Vobxlvad3352 = array();

switch ( $Vqiuptt22ezv ) {

 case "cli":

  $Viifb50nus3n = getoptions();

  if ( isset($Viifb50nus3n["h"]) || (!isset($Viifb50nus3n["filename"]) && !isset($Viifb50nus3n["l"])) ) {
    dompdf_usage();
    exit;
  }

  if ( isset($Viifb50nus3n["l"]) ) {
    echo "\nUnderstood paper sizes:\n";

    foreach (array_keys(CPDF_Adapter::$Vcn1kpkzkzeg) as $V4jbadwq4bzj)
      echo "  " . mb_strtoupper($V4jbadwq4bzj) . "\n";
    exit;
  }
  $Vg5mhfl1beoi = $Viifb50nus3n["filename"];

  if ( isset($Viifb50nus3n["p"]) )
    $Vrkqqtfn4q2f = $Viifb50nus3n["p"];
  else
    $Vrkqqtfn4q2f = DOMPDF_DEFAULT_PAPER_SIZE;

  if ( isset($Viifb50nus3n["o"]) )
    $Viltsyxewtah = $Viifb50nus3n["o"];
  else
    $Viltsyxewtah = "portrait";

  if ( isset($Viifb50nus3n["b"]) )
    $Viwuq3qqv5zq = $Viifb50nus3n["b"];

  if ( isset($Viifb50nus3n["f"]) )
    $Vfzbfowrmwdv = $Viifb50nus3n["f"];
  else {
    if ( $Vg5mhfl1beoi === "-" )
      $Vfzbfowrmwdv = "dompdf_out.pdf";
    else
      $Vfzbfowrmwdv = str_ireplace(array(".html", ".htm", ".php"), "", $Vg5mhfl1beoi) . ".pdf";
  }

  if ( isset($Viifb50nus3n["v"]) )
    $Vxh3hfxmt4gu = true;

  if ( isset($Viifb50nus3n["d"]) ) {
    $Vxh3hfxmt4gu = true;
    $Vatvjzg4ejqt = true;
  }

  if ( isset($Viifb50nus3n['t']) ) {
    $Vd5mgesqkq2x = split(',',$Viifb50nus3n['t']);
    $V2felcgi5riy = array();
    foreach ($Vd5mgesqkq2x as $V4pigtpor0ln)
      $V2felcgi5riy[ trim($V4pigtpor0ln) ] = 1;
    $Vwvvrkk5e0vh = $V2felcgi5riy;
  }
  
  $Vw2ymbuuu3eb = true;

  break;

 default:

  if ( isset($_GET["input_file"]) )
    $Vg5mhfl1beoi = rawurldecode($_GET["input_file"]);
  else
    throw new DOMPDF_Exception("An input file is required (i.e. input_file _GET variable).");
  
  if ( isset($_GET["paper"]) )
    $Vrkqqtfn4q2f = rawurldecode($_GET["paper"]);
  else
    $Vrkqqtfn4q2f = DOMPDF_DEFAULT_PAPER_SIZE;
  
  if ( isset($_GET["orientation"]) )
    $Viltsyxewtah = rawurldecode($_GET["orientation"]);
  else
    $Viltsyxewtah = "portrait";
  
  if ( isset($_GET["base_path"]) ) {
    $Viwuq3qqv5zq = rawurldecode($_GET["base_path"]);
    $Vg5mhfl1beoi = $Viwuq3qqv5zq . $Vg5mhfl1beoi; # Set the input file
  }  
  
  if ( isset($_GET["options"]) ) {
    $Vobxlvad3352 = $_GET["options"];
  }
  
  $Vg5mhfl1beoi_parts = explode_url($Vg5mhfl1beoi);
  
  
  if(($Vg5mhfl1beoi_parts['protocol'] == '' || $Vg5mhfl1beoi_parts['protocol'] === 'file://')) {
    $Vg5mhfl1beoi = realpath($Vg5mhfl1beoi);
    if ( strpos($Vg5mhfl1beoi, DOMPDF_CHROOT) !== 0 ) {
      throw new DOMPDF_Exception("Permission denied on $Vg5mhfl1beoi.");
    }
  }
  
  $Vfzbfowrmwdv = "dompdf_out.pdf"; # Don't allow them to set the output file
  $Vw2ymbuuu3eb = false; # Don't save the file
  
  break;
}

$Vhygqjznl3ul = new DOMPDF();

if ( $Vg5mhfl1beoi === "-" ) {
  $Vyqctydehp2e = "";
  while ( !feof(STDIN) )
    $Vyqctydehp2e .= fread(STDIN, 4096);

  $Vhygqjznl3ul->load_html($Vyqctydehp2e);

} else
  $Vhygqjznl3ul->load_html_file($Vg5mhfl1beoi);

if ( isset($Viwuq3qqv5zq) ) {
  $Vhygqjznl3ul->set_base_path($Viwuq3qqv5zq);
}

$Vhygqjznl3ul->set_paper($Vrkqqtfn4q2f, $Viltsyxewtah);

$Vhygqjznl3ul->render();

if ( $Vxh3hfxmt4gu ) {
  global $Vlb1pyhumpag;
  foreach ($Vlb1pyhumpag as $Vzjcdynyc23y)
    echo $Vzjcdynyc23y . "\n";
  echo $Vhygqjznl3ul->get_canvas()->get_cpdf()->messages;
  flush();
}

if ( $Vw2ymbuuu3eb ) {


  if ( strtolower(DOMPDF_PDF_BACKEND) === "gd" )
    $Vfzbfowrmwdv = str_replace(".pdf", ".png", $Vfzbfowrmwdv);

  list($V41yimklfqrl, $Vy4zba2jo55u, $V3wwyy5a12nc, $Vg5mhfl1beoi) = explode_url($Vfzbfowrmwdv);
  if ( $V41yimklfqrl != "" ) 
    $Vfzbfowrmwdv = $Vg5mhfl1beoi; 

  $Vfzbfowrmwdv = realpath(dirname($Vfzbfowrmwdv)) . DIRECTORY_SEPARATOR . basename($Vfzbfowrmwdv);

  if ( strpos($Vfzbfowrmwdv, DOMPDF_CHROOT) !== 0 )
    throw new DOMPDF_Exception("Permission denied.");

  file_put_contents($Vfzbfowrmwdv, $Vhygqjznl3ul->output( array("compress" => 0) ));
  exit(0);
}

if ( !headers_sent() ) {
  $Vhygqjznl3ul->stream($Vfzbfowrmwdv, $Vobxlvad3352);
}
