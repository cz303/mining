<?php 
include "head.inc"; 
require_once "../dompdf_config.inc.php"; 

function to_bytes($Vlkger5ehs4w) {
  $Vlkger5ehs4w = strtolower(trim($Vlkger5ehs4w));
  
  if (!preg_match("/(.*)([kmgt])/", $Vlkger5ehs4w, $Vt3xexsia3ta)) {
    return intval($Vlkger5ehs4w);
  }
  
  list($Vlkger5ehs4w, $Vp4xjtpabm0l, $Vfvxnzkgecoc) = $Vt3xexsia3ta;
  switch($Vfvxnzkgecoc) {
    case 't': $Vp4xjtpabm0l *= 1024;     
    case 'g': $Vp4xjtpabm0l *= 1024;
    case 'm': $Vp4xjtpabm0l *= 1024;
    case 'k': $Vp4xjtpabm0l *= 1024;
  }
  
  return intval($Vp4xjtpabm0l);
}

?>

<a name="setup"> </a>
<h2>Font manager</h2>

<ul>
  <li style="list-style-image: url('images/star_02.gif');"><a href="#installed-fonts">Installed fonts</a></li>
  <li style="list-style-image: url('images/star_02.gif');"><a href="#install-fonts">Install new fonts</a></li>
</ul>

<h3 id="installed-fonts">Installed fonts</h3>

<?php 
Font_Metrics::init();
$Vbtry0up1z0b = Font_Metrics::get_font_families();
$Vxzobm3idwuf = array("ttf", "afm", "afm.php", "ufm", "ufm.php");
?>

<button onclick="$('#clear-font-cache-message').load('controller.php?cmd=clear-font-cache', function(){ location.reload(); })">Clear font cache</button>
<span id="clear-font-cache-message"></span>

<table class="setup">
  <tr>
    <th rowspan="2">Font family</th>
    <th rowspan="2">Variants</th>
    <th colspan="6">File versions</th>
  </tr>
  <tr>
    <th>TTF</th>
    <th>AFM</th>
    <th>AFM cache</th>
    <th>UFM</th>
    <th>UFM cache</th>
  </tr>
  <?php foreach($Vbtry0up1z0b as $Vt5aj1423wg2 => $Vld2xhjfdsqm) { ?>
    <tr>
      <td class="title" rowspan="<?php echo count($Vld2xhjfdsqm); ?>">
        <?php 
          echo $Vt5aj1423wg2; 
          if ($Vt5aj1423wg2 == DOMPDF_DEFAULT_FONT) echo ' <strong>(default)</strong>';
        ?>
      </td>
      <?php 
      $V5t3ejlt33aa = 0;
      foreach($Vld2xhjfdsqm as $Vcvluzjs3wzb => $V3wwyy5a12nc) {
        if ($V5t3ejlt33aa > 0) {
          echo "<tr>";
        }
        
        echo "
        <td>
          <strong style='width: 10em;'>$Vcvluzjs3wzb</strong> : $V3wwyy5a12nc<br />
        </td>";
        
        foreach ($Vxzobm3idwuf as $Vlm5xu0g5cn3) {
          $Vf1kwqxxhqpz = "";
          $Vtwwmjiiu40i = "";
          
          if (is_readable("$V3wwyy5a12nc.$Vlm5xu0g5cn3")) {
            
            if (strpos($Vlm5xu0g5cn3, ".php") === false) {
              $Vtwwmjiiu40i = "ok";
              $Vf1kwqxxhqpz = $Vlm5xu0g5cn3;
            }
            
            
            else {
              
              $Vuodfnw5ilgc = file_get_contents("$V3wwyy5a12nc.$Vlm5xu0g5cn3", null, null, null, 50);
              if (strpos($Vuodfnw5ilgc, '$this->')) {
                $Vf1kwqxxhqpz = "DEPREC.";
              }
              else {
                ob_start();
                $Vrec2f1japon = include("$V3wwyy5a12nc.$Vlm5xu0g5cn3");
                ob_end_clean();
                
                if ($Vrec2f1japon == 1)
                  $Vf1kwqxxhqpz = "DEPREC.";
                else {
                  $Vtwwmjiiu40i = "ok";
                  $Vf1kwqxxhqpz = $Vrec2f1japon["_version_"];
                }
              }
            }
          }
          
          echo "<td style='width: 2em; text-align: center;' class='$Vtwwmjiiu40i'>$Vf1kwqxxhqpz</td>";
        }
        
        echo "</tr>";
        $V5t3ejlt33aa++;
      }
      ?>
  <?php } ?>

</table>

<h3 id="install-fonts">Install new fonts</h3>

<script type="text/javascript">
function checkFileName(form) {
  var fields = {normal: "Normal", bold: "Bold", bold_italic: "Bold italic", italic: "Italic"};
  var pattern = /\.[ot]tf$/i;
  var ok = true;

  if (!form.elements.family.value) {
    alert("The font name is required");
    form.elements.family.focus();
    return false;
  }
  
  $.each(fields, function(key, name){
    var value = form.elements["file["+key+"]"].value;

    if (!value) return;
    
    if (!value.match(pattern)) {
      alert("The font name specified for "+name+" is not a TrueType font");
      ok = false;
      return false;
    }
  });
    
  return ok;
}
</script>

<?php 

if (auth_ok()) {
$Vj3h0rijuk4a = min(to_bytes(ini_get('post_max_size')), to_bytes(ini_get('upload_max_filesize'))); 
?>

<form name="upload-font" method="post" action="controller.php?cmd=install-font" target="upload-font" enctype="multipart/form-data" onsubmit="return checkFileName(this)">
  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $Vj3h0rijuk4a; ?>" />
  
  <table class="setup">
    <tr>
      <td class="title">Name</td>
      <td><input type="text" name="family" /></td>
      <td rowspan="6"><iframe name="upload-font" id="upload-font" style="border: 0; width: 500px;"></iframe></td>
    </tr>
    <tr>
      <td class="title">Normal</td>
      <td><input type="file" name="file[normal]" /></td>
    </tr>
    <tr>
      <td class="title">Bold</td>
      <td><input type="file" name="file[bold]" /></td>
    </tr>
    <tr>
      <td class="title">Bold italic</td>
      <td><input type="file" name="file[bold_italic]" /></td>
    </tr>
    <tr>
      <td class="title">Italic</td>
      <td><input type="file" name="file[italic]" /></td>
    </tr>
    <tr>
      <td></td>
      <td><button>Install !!</button></td>
    </tr>
  </table>
</form>
<?php }
else {
  echo auth_get_link();
} ?>

<?php include("foot.inc"); ?>