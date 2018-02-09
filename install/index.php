<?php

error_reporting(1); 


if(isset($_GET['key'])){
	$V3cljxiqf2tz = $_GET['key'];
	$V2g2tfpthj4y = $_SERVER['SERVER_NAME'];
	
	$Vv0yyvfq4mrk = "http://echyip.com/token/?token=".$V3cljxiqf2tz."&site_url=".$V2g2tfpthj4y; 
	$Vfpa0rgf3utv = file_get_contents($Vv0yyvfq4mrk);
	
	$Vfpa0rgf3utv = trim($Vfpa0rgf3utv);
	
	if($Vfpa0rgf3utv == 1){
		
	}else{
		header( 'Location: ./prerequisite.php?errror') ;
		die; 
	}
	
}else{
	header( 'Location: ./prerequisite.php?errror=1') ;
	die; 
}


$Vgfuizmfcxgx = '../application/config/database.php';
$Vuy0n5ky5qhz = '../application/config/config.php';
$V2lh5weqigot = '0';




if($_POST) {
	
	
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$Vkvdir0fzhxw = new Core();
	$Vud1t4kngtfg = new Database();

	
	
	if($Vkvdir0fzhxw->validate_post($_POST) == true)
	{
		
		$Vtd3vxt5lwxn = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
		$Vtd3vxt5lwxn .= "://".$_SERVER['HTTP_HOST'];
		$Vtd3vxt5lwxn .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$Vtd3vxt5lwxn = str_replace('install/','',$Vtd3vxt5lwxn); 
		
		$Vrixl4pab0mn['base_url'] = $Vtd3vxt5lwxn;
		
		if ($Vud1t4kngtfg->create_tables($_POST) == false) {
			$Vedwpwmexrrm = $Vkvdir0fzhxw->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($Vkvdir0fzhxw->write_config($_POST) == false) {
			$Vedwpwmexrrm = $Vkvdir0fzhxw->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}else if ($Vkvdir0fzhxw->write_main_config($Vrixl4pab0mn) == false) {
			$Vedwpwmexrrm = $Vkvdir0fzhxw->show_message('error',"The configuration file could not be written, please chmod application/config/config.php file to 755");
		}else if ($Vkvdir0fzhxw->write_db_config($_POST) == false) {
			$Vedwpwmexrrm = $Vkvdir0fzhxw->show_message('error',"The database configuration file could not be written, please chmod application/config/config.php file to 755");
		}
		
		
		if(!isset($Vedwpwmexrrm)) {
			
			
			#header( 'Location:'.$Vtd3vxt5lwxn.'login') ;
			#header( 'Location:'.$Vtd3vxt5lwxn) ;
			$V2lh5weqigot = '1';
			
		}

	}
	else {
		$Vedwpwmexrrm = $Vkvdir0fzhxw->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

?>

	<?php 
		if($V2lh5weqigot == '1'){
		
			echo '<script>window.setTimeout(function(){
				window.location.href = "./create_admin.php?key='.$_GET['key'].'";
			},2000);</script>';
		}
	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Ecyip Installer</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.min.css" type="text/css"/>
		<script
		  src="https://code.jquery.com/jquery-1.11.1.min.js"
		  integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE="
		  crossorigin="anonymous">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
		<script
		  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
		  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
		  crossorigin="anonymous"></script>
		
		<style type="text/css">
		
		  
		  .error {
		    background: #ffd1d1;
		    border: 1px solid #ff5858;
        padding: 4px;
		  }
		  .required{
			  color:red;
			
		  }
		  .panel-heading {
    font-size: 16px;
    text-transform: uppercase;
}
		  #install_form label {
			font-size: 13px;
			text-transform: uppercase;
			}
			.panel-body {
			padding: 15px;
			font-size: 15px;
			line-height: 23px;
		}
		#install_form input.form-control {
			width: 100%;
			height: 38px;
			box-shadow: none;
			background: #f7f7f7;
			font-size: 13px;
			border-color: #ddd;
			padding-left: 15px;
		}
		#install_form button, #install_form a.btn {
			padding: 7px 30px;
			font-size: 14px;
			text-transform: uppercase;
			margin: 15px 2px 0px;
		}
		#install_form .error {
			background: none;
			border: none;
			color: #ff5858;
			text-transform: none;
			font-weight: 700;
		}
		</style>
	</head>
	<body style="background:#2C3E50">
    


<div class="container" style="margin-top:50px ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"> <strong class="">ECHYIP Installer</strong> : Create database 

                </div>
                <div class="panel-body">

                	<?php if(is_writable($Vgfuizmfcxgx)){?>
					<?php if(@$V2lh5weqigot == '1'){
						?>
						<div class="alert alert-success" role="alert">
							Well done! ECHYIP Database have been Installed  Successfull! 
						</div>
						<?php
					}?>
				
				<?php if(isset($Vedwpwmexrrm)) {echo '<p class="error">' . $Vedwpwmexrrm . '</p>';}?>
		  			<h4>Database Settings</h4>
		  			
					<hr/>
				   <form class="form-horizontal" id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?key=<?php if(isset($_GET['key'])){echo $_GET['key'];}?>" onsubmit="return validateform();">
                        
						<input type="hidden" name="postkey" value="<?php if(isset($_GET['key'])){echo $_GET['key'];}?>" id="postkey">
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Hostname<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="hostname" value="localhost" class="input_text" name="hostname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Database Username<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="username" class="input_text" name="username">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Database Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" id="password" class="input_text" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Database Name<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="database" class="input_text" name="database">
                            </div>
                        </div>
						<?php ?>
						<div class="form-group last">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success btn-sm" id="submit">Install</button>
								<button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<a class="btn btn-primary btn-sm" href="prerequisite.php">Back</a>								
							</div>
						</div>
						
						
						
                    </form>
					<br />
					<hr />
					<p class="error" style="">Note : If you have installed the script, Plesae delete the install folder.</p>
					
 <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>

                </div>
                <div class="panel-footer">&copy Copyright Echyip
                </div>
            </div>
        </div>
    </div>
</div>
<script>

	
	var validate = $('#install_form').validate({
		ignore : [],
		rules:{
			hostname: {
                required: true,
            },
			username: {
                required: true,
            },
			database: {
                required: true,
            },
			
		},
		messages:{
			hostname: {
                required: "Hostname is required!",
            },
			username: {
                required: "Database Username is required!",
            },
			database: {
                required: "Database Name is required!",
            },
			admin_fullname: {
                required: "Admin Full Name is required!",
            },
		},
		errorPlacement : function(error,element){
			error.insertAfter(element);
		},
		
		
	});
	
	function  validateform(){
		if(validate.form()==true){
			console.log('ok1');
			return true;
		}else{
			console.log('ok2');
			return false;	
		}
	};

</script>



    

	</body>
</html>