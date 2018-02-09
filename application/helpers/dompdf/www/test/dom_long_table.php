<html>
<style>
table { margin: auto; }
td {
  font-size: 0.8em;
  padding: 4pt;
  text-align: center;
  font-family: sans-serif;
}
</style>
<body>
<table>
<thead>
<tr>
<td colspan="20">Header</td>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="20">Footer</td>
</tr>
</tfoot>
<?php
$Vnmqaud4m334 = 40;
$V4khewf4fap3 = 20;

for ( $V5t3ejlt33aa = 1; $V5t3ejlt33aa <= $Vnmqaud4m334; $V5t3ejlt33aa++): ?>
<tr>
<?php
for ( $Vzmnqyqjjodw = 1; $Vzmnqyqjjodw <= $V4khewf4fap3; $Vzmnqyqjjodw++) {
  $Vws44nszhvgo = (int)(255*$V5t3ejlt33aa / $Vnmqaud4m334);
  $Vtlsatfewahh = (int)(255*$Vzmnqyqjjodw / $V4khewf4fap3);
  $Vpatv3dcvvhr = (int)(255*($V5t3ejlt33aa + $Vzmnqyqjjodw)/($Vnmqaud4m334 + $V4khewf4fap3));
  $V4y0urwpnd3j = "black;";
  $Vn4k2wgjnmox = "rgb($Vws44nszhvgo,$Vpatv3dcvvhr,$Vtlsatfewahh)";
  echo "<td style=\"color: $V4y0urwpnd3j; background-color: $Vn4k2wgjnmox;\">" . ($V5t3ejlt33aa * $Vzmnqyqjjodw) . "</td>\n";
}
?>
</tr>
<?php endfor; ?>
</table>
</body>
</html>