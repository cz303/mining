<?php include("head.inc"); ?>

<a name="setup"> </a>
<h2>Setup</h2>

<ul>
  <li style="list-style-image: url('images/star_02.gif');"><a href="#system">System Configuration</a></li>
  <li style="list-style-image: url('images/star_02.gif');"><a href="#dompdf-config">DOMPDF Configuration</a></li>
</ul>

<h3 id="system">System Configuration</h3>

<?php 
require_once("../dompdf_config.inc.php");

$Voatoe32rpzq = array(
  "PHP Version" => array(
    "required" => "5.0",
    "value"    => phpversion(),
    "result"   => version_compare(phpversion(), "5.0"),
  ),
  "DOMDocument extension" => array(
    "required" => true,
    "value"    => phpversion("DOM"),
    "result"   => class_exists("DOMDocument"),
  ),
  "PCRE" => array(
    "required" => true,
    "value"    => phpversion("pcre"),
    "result"   => function_exists("preg_match") && @preg_match("/./u", "a"),
    "failure"  => "PCRE is required with Unicode support (the \"u\" modifier)",
  ),
  "Zlib" => array(
    "required" => true,
    "value"    => phpversion("zlib"),
    "result"   => function_exists("gzcompress"),
    "fallback" => "Recommended to compress PDF documents",
  ),
  "MBString extension" => array(
    "required" => true,
    "value"    => phpversion("mbstring"),
    "result"   => function_exists("mb_send_mail"), 
    "fallback" => "Recommended, will use fallback functions",
  ),
  "GD" => array(
    "required" => true,
    "value"    => phpversion("gd"),
    "result"   => function_exists("imagecreate"),
    "fallback" => "Required if you have images in your documents",
  ),
  "APC" => array(
    "required" => "For better performances",
    "value"    => phpversion("apc"),
    "result"   => function_exists("apc_fetch"),
    "fallback" => "Recommended for better performances",
  ),
  "GMagick or IMagick" => array(
    "required" => "Better with transparent PNG images",
    "value"    => null,
    "result"   => extension_loaded("gmagick") || extension_loaded("imagick"),
    "fallback" => "Recommended for better performances",
  ),
);

if (($Vhaycsrevag5 = extension_loaded("gmagick")) || ($Vquww3kxwvky = extension_loaded("imagick"))) {
  $Voatoe32rpzq["GMagick or IMagick"]["value"] = ($Vquww3kxwvky ? "IMagick ".phpversion("imagick") : "GMagick ".phpversion("gmagick"));
}

?>

<table class="setup">
  <tr>
    <th></th>
    <th>Required</th>
    <th>Present</th>
  </tr>
  
  <?php foreach($Voatoe32rpzq as $Vq04bwg4ulks => $Vluejv2dbcg0) { ?>
    <tr>
      <td class="title"><?php echo $Vq04bwg4ulks; ?></td>
      <td><?php echo ($Vluejv2dbcg0["required"] === true ? "Yes" : $Vluejv2dbcg0["required"]); ?></td>
      <td class="<?php echo ($Vluejv2dbcg0["result"] ? "ok" : (isset($Vluejv2dbcg0["fallback"]) ? "warning" : "failed")); ?>">
        <?php
        echo $Vluejv2dbcg0["value"];
        if ($Vluejv2dbcg0["result"] && !$Vluejv2dbcg0["value"]) echo "Yes";
        if (!$Vluejv2dbcg0["result"]) {
          if (isset($Vluejv2dbcg0["fallback"])) {
            echo "<div>No. ".$Vluejv2dbcg0["fallback"]."</div>";
          }
          if (isset($Vluejv2dbcg0["failure"])) {
            echo "<div>".$Vluejv2dbcg0["failure"]."</div>";
          }
        }
        ?>
      </td>
    </tr>
  <?php } ?>
  
</table>

<h3 id="dompdf-config">DOMPDF Configuration</h3>

<?php 
$Vhn3shkiwwmr = array();
$Vbvbhzjflvva = get_defined_constants(true);

$V2wmmmerfzxi = array(
  "DOMPDF_DIR" => array(
    "desc" => "Root directory of DOMPDF",
    "success" => "read",
  ),
  "DOMPDF_INC_DIR" => array(
    "desc" => "Include directory of DOMPDF",
    "success" => "read",
  ),
  "DOMPDF_LIB_DIR" => array(
    "desc" => "Third-party libraries directory of DOMPDF",
    "success" => "read",
  ),
  "DOMPDF_FONT_DIR" => array(
    "desc" => "Additional fonts directory",
    "success" => "read",
  ),
  "DOMPDF_FONT_CACHE" => array(
    "desc" => "Font metrics cache",
    "success" => "write",
  ),
  "DOMPDF_TEMP_DIR" => array(
    "desc" => "Temporary folder",
    "success" => "write",
  ),
  "DOMPDF_CHROOT" => array(
    "desc" => "Restricted path",
    "success" => "read",
  ),
  "DOMPDF_UNICODE_ENABLED" => array(
    "desc" => "Unicode support (thanks to additionnal fonts)",
  ),
  "DOMPDF_ENABLE_FONTSUBSETTING" => array(
    "desc" => "Enable font subsetting, will make smaller documents when using Unicode fonts",
  ),
  "DOMPDF_PDF_BACKEND" => array(
    "desc" => "Backend library that makes the outputted file (PDF, image)",
    "success" => "backend",
  ),
  "DOMPDF_DEFAULT_MEDIA_TYPE" => array(
    "desc" => "Default media type (print, screen, ...)",
  ),
  "DOMPDF_DEFAULT_PAPER_SIZE" => array(
    "desc" => "Default paper size (A4, letter, ...)",
  ),
  "DOMPDF_DEFAULT_FONT" => array(
    "desc" => "Default font, used if the specified font in the CSS stylesheet was not found",
  ),
  "DOMPDF_DPI" => array(
    "desc" => "DPI scale of the document",
  ),
  "DOMPDF_ENABLE_PHP" => array(
    "desc" => "Inline PHP support",
  ),
  "DOMPDF_ENABLE_JAVASCRIPT" => array(
    "desc" => "Inline JavaScript support",
  ),
  "DOMPDF_ENABLE_REMOTE" => array(
    "desc" => "Allow remote stylesheets and images",
    "success" => "remote",
  ),
  "DOMPDF_ENABLE_CSS_FLOAT" => array(
    "desc" => "Enable CSS float support (experimental)",
  ),
  "DOMPDF_ENABLE_HTML5PARSER" => array(
    "desc" => "Enable the HTML5 parser (experimental)",
  ),
  "DEBUGPNG" => array(
    "desc" => "Debug PNG images",
  ),
  "DEBUGKEEPTEMP" => array(
    "desc" => "Keep temporary image files",
  ),
  "DEBUGCSS" => array(
    "desc" => "Debug CSS",
  ),
  "DEBUG_LAYOUT" => array(
    "desc" => "Debug layout",
  ),
  "DEBUG_LAYOUT_LINES" => array(
    "desc" => "Debug text lines layout",
  ),
  "DEBUG_LAYOUT_BLOCKS" => array(
    "desc" => "Debug block elements layout",
  ),
  "DEBUG_LAYOUT_INLINE" => array(
    "desc" => "Debug inline elements layout",
  ),
  "DEBUG_LAYOUT_PADDINGBOX" => array(
    "desc" => "Debug padding boxes layout",
  ),
  "DOMPDF_LOG_OUTPUT_FILE" => array(
    "desc" => "The file in which dompdf will write warnings and messages",
    "success" => "write",
  ),
  "DOMPDF_FONT_HEIGHT_RATIO" => array(
    "desc" => "The line height ratio to apply to get a render like web browsers",
  ),
	"DOMPDF_AUTOLOAD_PREPEND" => array(
    "desc" => "Prepend the dompdf autoload function to the SPL autoload functions already registered instead of appending it",
  ),
  "DOMPDF_ADMIN_USERNAME" => array(
    "desc" => "The username required to access restricted sections",
    "secret" => true,
  ),
  "DOMPDF_ADMIN_PASSWORD" => array(
    "desc" => "The password required to access restricted sections",
    "secret" => true,
    "success" => "auth",
  ),
);
?>

<table class="setup">
  <tr>
    <th>Config name</th>
    <th>Value</th>
    <th>Description</th>
    <th>Status</th>
  </tr>
  
  <?php foreach($Vbvbhzjflvva["user"] as $Vegfwhesreey => $Vp4xjtpabm0l) { ?>
    <tr>
      <td class="title"><?php echo $Vegfwhesreey; ?></td>
      <td>
      <?php 
        if (isset($V2wmmmerfzxi[$Vegfwhesreey]["secret"])) {
          echo "******";
        }
        else {
          var_export($Vp4xjtpabm0l); 
        }
      ?>
      </td>
      <td><?php if (isset($V2wmmmerfzxi[$Vegfwhesreey]["desc"])) echo $V2wmmmerfzxi[$Vegfwhesreey]["desc"]; ?></td>
      <td <?php 
        $Vb0xezrtkohj = "";
        if (isset($V2wmmmerfzxi[$Vegfwhesreey]["success"])) {
          switch($V2wmmmerfzxi[$Vegfwhesreey]["success"]) {
            case "read":  
              $V0oxrvyvzxpi = is_readable($Vp4xjtpabm0l);
              $Vb0xezrtkohj = ($V0oxrvyvzxpi ? "Readable" : "Not readable");
            break;
            case "write": 
              $V0oxrvyvzxpi = is_writable($Vp4xjtpabm0l);
              $Vb0xezrtkohj = ($V0oxrvyvzxpi ? "Writable" : "Not writable");
            break;
            case "remote": 
              $V0oxrvyvzxpi = ini_get("allow_url_fopen");
              $Vb0xezrtkohj = ($V0oxrvyvzxpi ? "allow_url_fopen enabled" : "allow_url_fopen disabled");
            break;
            case "backend": 
              switch (strtolower($Vp4xjtpabm0l)) {
                case "cpdf": 
                  $V0oxrvyvzxpi = true;
                break;
                case "pdflib":
                  $V0oxrvyvzxpi = function_exists("PDF_begin_document");
                  $Vb0xezrtkohj = "The PDFLib backend needs the PDF PECL extension";
                break;
                case "gd":
                  $V0oxrvyvzxpi = function_exists("imagecreate");
                  $Vb0xezrtkohj = "The GD backend requires GD2";
                break;
              }
            break;
            case "auth": 
              $V0oxrvyvzxpi = !in_array($Vp4xjtpabm0l, array("admin", "password"));
              $Vb0xezrtkohj = ($V0oxrvyvzxpi ? "OK" : "Password should be changed");
            break;
          }
          echo 'class="' . ($V0oxrvyvzxpi ? "ok" : "failed") . '"';
        }
      ?>><?php echo $Vb0xezrtkohj; ?></td>
    </tr>
  <?php } ?>

</table>


<?php include("foot.inc"); ?>