<?php

require_once("../dompdf_config.inc.php");

?>
<?php include("head.inc"); ?>

<script type="text/javascript">
function resizePreview(){
  var preview = $("#preview");
  preview.height($(window).height() - preview.offset().top - 2);
}

$(function(){
  var preview = $("#preview");
  resizePreview();

  $(window).scroll(function() {
    var scrollTop = Math.min($(this).scrollTop(), preview.height()+preview.parent().offset().top) - 2;
    preview.css("margin-top", scrollTop + "px");
  });

  $(window).resize(resizePreview);
});
</script>
<iframe id="preview" name="preview" src="about:blank" frameborder="0" marginheight="0" marginwidth="0"></iframe>

<a name="samples"> </a>
<h2>Samples</h2>

<p>Below are some sample files. The PDF version is generated on the fly by dompdf.  (The source HTML &amp; CSS for
these files is included in the test/ directory of the distribution
package.)</p>

<?php

$Vxzobm3idwuf = array("html");
if ( DOMPDF_ENABLE_PHP ) {
  $Vxzobm3idwuf[] = "php";
}

$Vh5fui1kkjly = glob("test/*.{".implode(",", $Vxzobm3idwuf)."}", GLOB_BRACE);
$Vvzhhtyvpsyt = array(
  "css"      => array(), 
  "dom"      => array(), 
  "image"    => array(), 
  "page"     => array(),
  "encoding" => array(), 
  "script"   => array(), 
  "quirks"   => array(), 
  "other"    => array(), 
);




$Vhygqjznl3ul = dirname(dirname($_SERVER["PHP_SELF"]));
if ( $Vhygqjznl3ul == '/' || $Vhygqjznl3ul == '\\') {
  $Vhygqjznl3ul = '';
}

$Vhygqjznl3ul .= "/dompdf.php?base_path=" . rawurlencode("www/test/");


foreach ( $Vh5fui1kkjly as $Vg5mhfl1beoi ) {
  preg_match("@[\\/](([^_]+)_?(.*))\.(".implode("|", $Vxzobm3idwuf).")$@i", $Vg5mhfl1beoi, $Vt3xexsia3ta);
  $Vbhrh2dz21ln = $Vt3xexsia3ta[2];

  if ( array_key_exists($Vbhrh2dz21ln, $Vvzhhtyvpsyt) ) {
    $Vvzhhtyvpsyt[$Vbhrh2dz21ln][] = array($Vg5mhfl1beoi, $Vt3xexsia3ta[3]);
  }
  else {
    $Vvzhhtyvpsyt["other"][] = array($Vg5mhfl1beoi, $Vt3xexsia3ta[1]);
  }
}

foreach ( $Vvzhhtyvpsyt as $Vdvfbnoyegtw => $Vg5mhfl1beois_info ) {
  echo "<h3>$Vdvfbnoyegtw</h3>";
  
  echo "<ul class=\"samples\">";
  foreach ( $Vg5mhfl1beois_info as $Vg5mhfl1beoi ) {
    $Vg5mhfl1beoiname = basename($Vg5mhfl1beoi[0]);
    $Vzeg1rojkgqq = $Vg5mhfl1beoi[1];
    $Vxswj3nnzhsl = "images/arrow_0" . rand(1, 6) . ".gif";  
    echo "<li style=\"list-style-image: url('$Vxswj3nnzhsl');\">\n";
    echo " 
  [<a class=\"button\" target=\"preview\" href=\"test/$Vg5mhfl1beoiname\">HTML</a>] 
  [<a class=\"button\" target=\"preview\" href=\"$Vhygqjznl3ul&amp;options[Attachment]=0&amp;input_file=" . rawurlencode($Vg5mhfl1beoiname) . "#toolbar=0&amp;view=FitH&amp;statusbar=0&amp;messages=0&amp;navpanes=0\">PDF</a>] ";
    echo $Vzeg1rojkgqq;
    echo "</li>\n";
  }
  echo "</ul>";
}
?>

<?php include("foot.inc"); ?>