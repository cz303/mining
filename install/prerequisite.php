<?php

if($_POST) {
	$V3cljxiqf2tz = $_POST['license_key'];
	$V2g2tfpthj4y = $_SERVER['SERVER_NAME'];
	$Vv0yyvfq4mrk = "http://echyip.com/token/?token=".$V3cljxiqf2tz."&site_url=".$V2g2tfpthj4y; 
	
	$Vfpa0rgf3utv = file_get_contents($Vv0yyvfq4mrk);
	
	if(trim($Vfpa0rgf3utv)=='1'){
		header( 'Location: ./index.php?key='.$V3cljxiqf2tz) ;
		die; 
	}else{
		$Vedwpwmexrrm = 'Invalid Code!';
		 
	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Echyip Installer</title>
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
		  #install_form label {
			width: 100%;
			text-align: left;
			margin-bottom: 6px;
			text-transform: uppercase;
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
		#install_form button {
			padding: 7px 30px;
			font-size: 14px;
			text-transform: uppercase;
			margin: 15px 2px 0px;
		}
		.panel-heading {
			font-size: 16px;
			text-transform: uppercase;
		}
		.panel-body {
			padding: 15px;
			font-size: 15px;
			line-height: 23px;
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
                <div class="panel-heading"> <strong class="">ECHYIP Installer</strong> : Prerequisite

                </div>
                <div class="panel-body">
					<?php if(isset($Vedwpwmexrrm) || isset($_GET['errror'])){?>
					<p class="error"> <?php echo 'Invalid License Key!';?></p><br/>
					<?php }?>
					<p>Hi User
					</p>
                	<p>There are some system requirement!</p>
					<ul>
						<li>Php version should be 5.X</li>
						<li>Php curl should be enabled.</li>
						<li>Short tag should be opened.</li>
					</ul>
					
					<form class="form-horizontal" id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-top:20px;" onsubmit="return validateform();">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-12 control-label">License Key <span class="required">*</span></label>
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" id="license_key" class="license_key" name="license_key" placeholder="License Key">
                            </div>
                        </div>
						<div class="form-group last">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-success btn-sm" id="submit">Next</button>
                            </div>
                        </div>
                    </form>
					<br />
					<hr />
					<p class="error" style="">Note : If you have installed the script, Plesae delete the install folder.</p>
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
			license_key: {
                required: true,
            },
		},
		messages:{
			license_key: {
                required: "License Key is required!",
            },
		},
		errorPlacement : function(error,element){
			error.insertAfter(element);
		},
	});
	
	function validateform(){
		if(validate.form()==false) {
			return false;
		}else{
			return true;
		}
	}
	

</script>


    

	</body>
</html>