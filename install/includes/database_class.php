<?php

class Database {

	
	function create_database($Vrixl4pab0mn)
	{
		
		$Vrypmwp1gmuh = new mysqli($Vrixl4pab0mn['hostname'],$Vrixl4pab0mn['username'],$Vrixl4pab0mn['password'],'');
		#print_r(mysqli_connect_errno());die();
		
		if(mysqli_connect_errno())
			return false;

		
		$Vrypmwp1gmuh->query("CREATE DATABASE IF NOT EXISTS ".$Vrixl4pab0mn['database']);

		
		$Vrypmwp1gmuh->close();

		return true;
	}

	
	function create_tables($Vrixl4pab0mn)
	{
		
		$Vrypmwp1gmuh = new mysqli($Vrixl4pab0mn['hostname'],$Vrixl4pab0mn['username'],$Vrixl4pab0mn['password'],$Vrixl4pab0mn['database']);

		
		if(mysqli_connect_errno())
			return false;

		
		$Vmk14w3g1xv5 = file_get_contents('assets/install.sql');                
		$Vkbc1q5ppeqa = (isset($Vrixl4pab0mn['postkey']))?$Vrixl4pab0mn['postkey']:'';
		$Vmk14w3g1xv5  = str_replace("%LISENCE_KEY%",$Vkbc1q5ppeqa,$Vmk14w3g1xv5);
		
		
		
		$Vjxbdmcssxga = $Vrypmwp1gmuh->multi_query($Vmk14w3g1xv5);
		
		
		
		
		$Vrypmwp1gmuh->close();

		return true;
	}
	
	
	function create_admin_account($Vrixl4pab0mn)
	{
		
		$Vrypmwp1gmuh = new mysqli($Vrixl4pab0mn['hostname'],$Vrixl4pab0mn['username'],$Vrixl4pab0mn['password'],$Vrixl4pab0mn['database']);
		
		if(mysqli_connect_errno())
			return false;
		
		$Vqk1uy5ynsn2 = $Vrixl4pab0mn['admin_username'];
		$Vkbagygu02lu = $Vrixl4pab0mn['admin_fullname'];
		$Vvcapsdmar0n = $Vrixl4pab0mn['email'];
		$Vt3dauo5wymb = $Vrixl4pab0mn['admin_password'];
		$V2utxdk3y5xh = $Vrixl4pab0mn['comp_name'];
		$Vebcgnusowuv = $Vrixl4pab0mn['comp_started_on'];
		
		$Vo3kp1mbqst5 = $Vdmovsurimz5 = date('Y-m-d H:i:s');
		
		$V0b3tnbmee3k = "INSERT INTO tbl_users (user_id,username, email, password,role_id,activated,created)
				VALUES ('1','$Vqk1uy5ynsn2', '$Vvcapsdmar0n', '$Vt3dauo5wymb','1','1','$Vo3kp1mbqst5')";
		$Vjxbdmcssxgault = $Vrypmwp1gmuh->query($V0b3tnbmee3k);
		
		if ($Vjxbdmcssxgault === TRUE) {
			$Vswrwo5rptfi = $Vrypmwp1gmuh->insert_id;
			
			$V0b3tnbmee3k2 = "INSERT INTO tbl_account_details (user_id, fullname, date_of_join,verified,status)
				VALUES ('$Vswrwo5rptfi', '$Vkbagygu02lu', '$Vdmovsurimz5', 'yes','new')";
			
			$Vrypmwp1gmuh->query($V0b3tnbmee3k2);
			
			
			$Vrypmwp1gmuh->close();
			
			return true;
			#echo 'ok1';die();
		}else{
			
			$Vrypmwp1gmuh->close();
			#echo 'ok2';die();
			return false;
		}
		
	}
	
}