<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Install | Successfully</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="./assets/jquery-ui-1.12.1.css">
		
		<script src="./assets/jquery-1.11.0.min.js"></script>
		<script src="./assets/jquery.validate.min.js"></script>
		
		<script src="./assets/jquery-ui-1.12.1.js"></script>
		
<style type="text/css">
        
          
          .error {
            background: #ffd1d1;
            border: 1px solid #ff5858;
        padding: 4px;
          }
		  .panel-heading {
			font-size: 16px;
			text-transform: uppercase;
		}
		
		.btn.btn-success {
			padding: 7px 30px;
			font-size: 14px;
			text-transform: uppercase;
			margin: 0px 2px 15px;
		}
        </style>

	</head>
	<body style="background:#2C3E50">
    


<div class="container" style="margin-top:50px ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"> <strong class="">ECHYIP Installer</strong>

                </div>
                <div class="panel-body">

		  			<div class="alert alert-success" role="alert">
                    Thank You! ! You have Successfully Installed ECHYIP System! 
                    </div>

                    

                    <?php    
                     $Vtd3vxt5lwxn = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                     $Vtd3vxt5lwxn .= "://".$_SERVER['HTTP_HOST'];
                     $Vtd3vxt5lwxn .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
                     $Vtd3vxt5lwxn = str_replace('install/','',$Vtd3vxt5lwxn); 
                    ?>
                    
					
                </div>
                <div class="panel-footer">&copy Copyright Echyip
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	function page_load(){
		var msg = 'Thank You! You have Successfully Installed ECHYIP System!';
		alert(msg);
		window.location.href="<?php echo $Vtd3vxt5lwxn;?>dir.php";
	}
	page_load();
	

	
</script>



    

	</body>
</html>