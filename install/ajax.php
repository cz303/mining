<?php
	
	require_once('./db_config.php');
	
	function create_admin_account()
	{
		
		$Vxodzhdxvw1x = new Connect_db(); 
		$V2rgjtocpmko = $Vxodzhdxvw1x->index();
		
		if($V2rgjtocpmko == false){
			$Vvyl30zbvnyw['status'] = 201;
			$Vvyl30zbvnyw['message'] = 'Error, Database Connection Failed!';
			echo json_encode($Vvyl30zbvnyw);
		}else{
		
			$Vr4zsd0nqzzd = $_POST['admin_username'];
			$Vbcg02zfomkj = $_POST['admin_fullname'];
			$V330oiekirrt = $_POST['email'];
			$V3tbusgu1yh1 = $_POST['admin_password'];
			$Vocdqq3srli2 = $_POST['comp_name'];
			$Vds3npwnatz1 = $_POST['comp_started_on'];
			$Vds3npwnatz2 = $_POST['lisence_key'];
			$Vds3npwnatz3 = $_POST['comp_email'];
			
			$V0jwwqlfqjx3 = $V2zisttr0zjt = date('Y-m-d H:i:s');
			
			$V3tbusgu1yh1 =  hash('sha512', $V3tbusgu1yh1 . 'I6PnEPbQNLslYMj7ChKxDJ2yenuHLkXn');
			$Vfpd3wee2atk = "INSERT INTO tbl_users (user_id,username, email, password,role_id,activated,created)
					VALUES (1,'$Vr4zsd0nqzzd', '$V330oiekirrt', '$V3tbusgu1yh1','1','1','$V0jwwqlfqjx3')";
			$Vvkulirsogvh = $V2rgjtocpmko->query($Vfpd3wee2atk);
			
			if ($Vvkulirsogvh === TRUE) {
				$Vg0tyhtjx1xp = $V2rgjtocpmko->insert_id;
				
				$Vfpd3wee2atk2 = "INSERT INTO tbl_account_details (account_details_id,user_id, fullname, date_of_join,verified,status)
					VALUES (1,'$Vg0tyhtjx1xp','$Vbcg02zfomkj', '$V2zisttr0zjt', 'yes','new')";
				
				$V2rgjtocpmko->query($Vfpd3wee2atk2);
				
				#seving other details
				$Vqovzrbxie0a = 'select * from tbl_config where config_key ="company_start"';
				$Vvkulirsogvh = $V2rgjtocpmko->query($Vqovzrbxie0a);
				if($Vvkulirsogvh->num_rows > 0){
					$Vfpd3wee2atk3 = "UPDATE tbl_config SET value='$Vds3npwnatz1' WHERE config_key = 'company_start'";
				}else{
					$Vfpd3wee2atk3 = "INSERT INTO tbl_config (config_key, value)
						VALUES ('company_start', '$Vds3npwnatz1')
						";
				}
				$V2rgjtocpmko->query($Vfpd3wee2atk3);
				
				$Vqovzrbxie0a = 'select * from tbl_config where config_key ="company_name"';
				$Vvkulirsogvh = $V2rgjtocpmko->query($Vqovzrbxie0a);
				if($Vvkulirsogvh->num_rows > 0){
					$Vfpd3wee2atk3 = "UPDATE tbl_config SET value='$Vocdqq3srli2' WHERE config_key = 'company_name'";
				}else{
					$Vfpd3wee2atk3 = "INSERT INTO tbl_config (config_key, value)
						VALUES ('company_name', '$Vocdqq3srli2')
						";
				}
				$V2rgjtocpmko->query($Vfpd3wee2atk3);
				
				$Vqovzrbxie0b = 'select * from tbl_config where config_key ="lisence_key"';
				$Vvkulirsogvi = $V2rgjtocpmko->query($Vqovzrbxie0b);
				if($Vvkulirsogvi->num_rows > 0){
					$Vfpd3wee2atk3 = "UPDATE tbl_config SET value='$Vds3npwnatz2' WHERE config_key = 'lisence_key'";
				}else{
					$Vfpd3wee2atk3 = "INSERT INTO tbl_config (config_key, value)
						VALUES ('lisence_key', '$Vds3npwnatz2')
						";
				}
				$V2rgjtocpmko->query($Vfpd3wee2atk3);
				
				$Vqovzrbxie0d = 'select * from tbl_config where config_key ="lisence_key"';
				$Vvkulirsogvi = $V2rgjtocpmko->query($Vqovzrbxie0d);
				if($Vvkulirsogvi->num_rows > 0){
					$Vfpd3wee2atk4 = "UPDATE tbl_config SET value='$Vds3npwnatz2' WHERE config_key = 'lisence_key'";
				}else{
					$Vfpd3wee2atk4 = "INSERT INTO tbl_config (config_key, value)
						VALUES ('lisence_key', '$Vds3npwnatz2')
						";
				}
				$V2rgjtocpmko->query($Vfpd3wee2atk4);
				
				$Vqovzrbxie0e = 'select * from tbl_config where config_key ="company_email"';
				$Vvkulirsogvj = $V2rgjtocpmko->query($Vqovzrbxie0e);
				if($Vvkulirsogvj->num_rows > 0){
					$Vfpd3wee2atk5 = "UPDATE tbl_config SET value='$Vds3npwnatz3' WHERE config_key = 'company_email'";
				}else{
					$Vfpd3wee2atk5 = "INSERT INTO tbl_config (config_key, value)
						VALUES ('company_email', '$Vds3npwnatz3')
						";
				}
				$V2rgjtocpmko->query($Vfpd3wee2atk5);
				
				$V2rgjtocpmko->close();
				
				$Vvyl30zbvnyw['status'] = 200;
				$Vvyl30zbvnyw['message'] = 'Well done! You Successfully created the admin! ';
				echo json_encode($Vvyl30zbvnyw);
				
				
			}else{
				
				$V2rgjtocpmko->close();
				$Vvyl30zbvnyw['status'] = 201;
				$Vvyl30zbvnyw['message'] = 'Script is already installed! Plesae delete or rename the install folder.';
				echo json_encode($Vvyl30zbvnyw);
			}
		}
	}
	
	create_admin_account();
	
	
?>