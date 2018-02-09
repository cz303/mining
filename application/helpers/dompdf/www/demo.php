<?php

require_once("../dompdf_config.inc.php");


$Vhpb1rpbbvm3 = array("::1", "127.0.0.1");
$Vwl4iswsekzp = in_array($_SERVER['REMOTE_ADDR'], $Vhpb1rpbbvm3);

if ( isset( $_POST["html"] ) && $Vwl4iswsekzp ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $Vhygqjznl3ul = new DOMPDF();
  $Vhygqjznl3ul->load_html($_POST["html"]);
  $Vhygqjznl3ul->set_paper($_POST["paper"], $_POST["orientation"]);
  $Vhygqjznl3ul->render();

  $Vhygqjznl3ul->stream("dompdf_out.pdf", array("Attachment" => false));

  exit(0);
}

?>
<?php include("head.inc"); ?>

<a name="demo"> </a>
<h2>Demo</h2>

<?php if ($Vwl4iswsekzp) { ?>

<p>Enter your html snippet in the text box below to see it rendered as a
PDF: (Note by default, remote stylesheets, images &amp; inline PHP are disabled.)</p>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<p>Paper size and orientation:
<select name="paper">
<?php
foreach ( array_keys(CPDF_Adapter::$Vcn1kpkzkzeg) as $V4jbadwq4bzj )
  echo "<option ". ($V4jbadwq4bzj == "letter" ? "selected " : "" ) . "value=\"$V4jbadwq4bzj\">$V4jbadwq4bzj</option>\n";
?>
</select>
<select name="orientation">
  <option value="portrait">portrait</option>
  <option value="landscape">landscape</option>
</select>
</p>

<textarea name="html" cols="60" rows="20">
&lt;html&gt;
&lt;head&gt;
&lt;style&gt;



&lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;

&lt;!-- Type some HTML here --&gt;

&lt;/body&gt;
&lt;/html&gt;
</textarea>

<div style="text-align: center; margin-top: 1em;">
  <button type="submit">Download</button>
</div>

</form>
<p style="font-size: 0.65em; text-align: center;">(Note: if you use a KHTML
based browser and are having difficulties loading the sample output, try
saving it to a file first.)</p>

<?php } else { ?>

  <p style="color: red;">
    User input has been disabled for remote connections.
  </p>
  
<?php } ?>

<?php include("foot.inc"); ?>