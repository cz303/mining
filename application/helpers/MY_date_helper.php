<?php
function format_date($Vaxg5pf4dhts){	
	if ($Vaxg5pf4dhts != '' && $Vaxg5pf4dhts != '0000-00-00')
	{
		$Vrec2f1japon	= explode('-', $Vaxg5pf4dhts);
	
		$Vt54vmttyjzc	= Array(
		'January'
		,'February'
		,'March'
		,'April'
		,'May'
		,'June'
		,'July'
		,'August'
		,'September'
		,'October'
		,'November'
		,'December'
		);
	
		return $Vt54vmttyjzc[$Vrec2f1japon[1]-1].' '.$Vrec2f1japon[2].', '.$Vrec2f1japon[0]; 
	}
	else
	{
		return false;
	}
}

function reverse_format($Vaxg5pf4dhts)
{
	if(empty($Vaxg5pf4dhts)) 
	{
		return;
	}
	
	$Vrec2f1japon = explode('-', $Vaxg5pf4dhts);
	
	return "{$Vrec2f1japon[1]}-{$Vrec2f1japon[2]}-{$Vrec2f1japon[0]}";
}

function format_ymd($Vaxg5pf4dhts)
{
	if(empty($Vaxg5pf4dhts) || $Vaxg5pf4dhts == '00-00-0000')
	{
		return '';
	}
	else
	{
		$Vrec2f1japon = explode('-', $Vaxg5pf4dhts);
		return $Vrec2f1japon[2].'-'.$Vrec2f1japon[0].'-'.$Vrec2f1japon[1];
	}
}

function format_mdy($Vaxg5pf4dhts)
{
	if(empty($Vaxg5pf4dhts) || $Vaxg5pf4dhts == '0000-00-00')
	{
		return '';
	}
	else
	{
		return date('m-d-Y', strtotime($Vaxg5pf4dhts));
	}
	
}




