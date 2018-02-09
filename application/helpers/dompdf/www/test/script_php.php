<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<title></title>
</head>

<body>

<?php
echo "<p>Here's some dynamically generated text and some random circles...</p>";
?>

<script type="text/php">
$Vnkhi0cd31am = $Vxj5miiauhxo->get_width() - 50;
$Vcl1zg0yyoal = $Vxj5miiauhxo->get_height() - 50; 
for ( $Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 30; $Vfhiq1lhsoja++) {
  $Vxj5miiauhxo->circle(rand(50, $Vnkhi0cd31am), rand(50, $Vcl1zg0yyoal), rand(10, 70),
               array(rand()/getrandmax(), rand()/getrandmax(), rand()/getrandmax()),
               rand(1,40));
}
</script>
<?php
echo "<p>Current PHP version: " . phpversion() . ".  ";
echo "Today is " . strftime("%A") . " the " . strftime("%e").date("S").strftime(" of %B, %Y %T") . "</p>";

?>
</body> </html>
