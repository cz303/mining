<?php



class PHPExcel_Reader_Excel5_RC4
{
	
	var $V2n430jknk35 = array();
	var $Vfhiq1lhsoja = 0;
	var $Vzmnqyqjjodw = 0;

	
	public function __construct($Vseq1edikdvg)
	{
		$Vtojwsl3m1uw = strlen($Vseq1edikdvg);

		for ($Veca2om3awughis->i = 0; $Veca2om3awughis->i < 256; $Veca2om3awughis->i++) {
			$Veca2om3awughis->s[$Veca2om3awughis->i] = $Veca2om3awughis->i;
		}

		$Veca2om3awughis->j = 0;
		for ($Veca2om3awughis->i = 0; $Veca2om3awughis->i < 256; $Veca2om3awughis->i++) {
			$Veca2om3awughis->j = ($Veca2om3awughis->j + $Veca2om3awughis->s[$Veca2om3awughis->i] + ord($Vseq1edikdvg[$Veca2om3awughis->i % $Vtojwsl3m1uw])) % 256;
			$Veca2om3awug = $Veca2om3awughis->s[$Veca2om3awughis->i];
			$Veca2om3awughis->s[$Veca2om3awughis->i] = $Veca2om3awughis->s[$Veca2om3awughis->j];
			$Veca2om3awughis->s[$Veca2om3awughis->j] = $Veca2om3awug;
		}
		$Veca2om3awughis->i = $Veca2om3awughis->j = 0;
	}

	
	public function RC4($Vou4vxorrdoe)
	{
		$Vtojwsl3m1uw = strlen($Vou4vxorrdoe);
		for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vtojwsl3m1uw; $V4y0urwpnd3j++) {
			$Veca2om3awughis->i = ($Veca2om3awughis->i + 1) % 256;
			$Veca2om3awughis->j = ($Veca2om3awughis->j + $Veca2om3awughis->s[$Veca2om3awughis->i]) % 256;
			$Veca2om3awug = $Veca2om3awughis->s[$Veca2om3awughis->i];
			$Veca2om3awughis->s[$Veca2om3awughis->i] = $Veca2om3awughis->s[$Veca2om3awughis->j];
			$Veca2om3awughis->s[$Veca2om3awughis->j] = $Veca2om3awug;

			$Veca2om3awug = ($Veca2om3awughis->s[$Veca2om3awughis->i] + $Veca2om3awughis->s[$Veca2om3awughis->j]) % 256;

			$Vou4vxorrdoe[$V4y0urwpnd3j] = chr(ord($Vou4vxorrdoe[$V4y0urwpnd3j]) ^ $Veca2om3awughis->s[$Veca2om3awug]);
		}
		return $Vou4vxorrdoe;
	}
}
