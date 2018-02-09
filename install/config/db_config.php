<?php

class Connect_db{

	function index(){
		$V4u4vokbeq1f = '%HOSTNAME%';
		$Vpax05ptfwvv = '%USERNAME%';
		$Vsexoq0oddgc = '%PASSWORD%';
		$Vud1t4kngtfg = '%DATABASE%';
		
		
		$Vrypmwp1gmuh = new mysqli($V4u4vokbeq1f,$Vpax05ptfwvv,$Vsexoq0oddgc,$Vud1t4kngtfg);

		
		if(mysqli_connect_errno()){
					
			return false;
			
		}else{
			return $Vrypmwp1gmuh;
		}
	}

}
?>