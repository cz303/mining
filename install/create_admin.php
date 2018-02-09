<?php

error_reporting(0); 
$randomString = generateRandomString();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Echyip Installer</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.min.css" type="text/css"/>
		<script
		  src="https://code.jquery.com/jquery-1.11.1.min.js"
		  integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE="
		  crossorigin="anonymous">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
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
		  .ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year{
			  color: #333;
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
		h4.account-heading {
			text-transform: uppercase;
			font-size: 15px;
			font-weight: bold;
		}
		#install_form .error {
			background: none;
			border: none;
			color: #ff5858;
			text-transform: none;
			font-weight: 700;
		}
		</style>
<style>
.rightBTN {
  position: relative;
}
.hide-show {
  display: none;
  position: absolute;
  right: 40px;
  top: 4px;
  width: auto;
  z-index: 5;
}
.hide-show span {
  background: #5cb85c none repeat scroll 0 0;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  float: right;
  font-size: 1em;
  height: 30px;
  padding: 5px 9px;
}
.hide-show span i{
  font-size:18px;
}
.generate{
    position: absolute;
    right: 5px;
    top: 4px;
    color: #fff;
    background: #5cb85c;
    padding: 7px 9px;
    border-radius: 4px;
    cursor:pointer;
}
meter {
    /* Reset the default appearance */
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
            
    margin: 0 auto 1em;
    width: 100%;
    height: .5em;
    
    /* Applicable only to Firefox */
    background: none;
    background-color: rgba(0,0,0,0.1);
}

meter::-webkit-meter-bar {
    background: none;
    background-color: rgba(0,0,0,0.1);
}

meter[value="1"] {
    background: red;
}
meter[value="2"] {
    background: yellow;
}
meter[value="3"] {
    background: orange;
}
meter[value="4"] {
    background: green;
}




meter[value="1"]::-webkit-meter-optimum-value { background: red; }
meter[value="2"]::-webkit-meter-optimum-value { background: yellow; }
meter[value="3"]::-webkit-meter-optimum-value { background: orange; }
meter[value="4"]::-webkit-meter-optimum-value { background: green; }

meter[value="1"]::-moz-meter-bar { background: red; }
meter[value="2"]::-moz-meter-bar { background: yellow; }
meter[value="3"]::-moz-meter-bar { background: orange; }
meter[value="4"]::-moz-meter-bar { background: green; }
</style>
	</head>
<body style="background:#2C3E50">
<script>
  $('document').ready(function() {
    $( "#comp_started_on" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		yearRange: "-100:+0",
	});
  });
</script>	     


<div class="container" style="margin-top:50px ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"> <strong class="">ECHYIP Installer</strong> : Create Admin 

                </div>
                <div class="panel-body">
					<?php ?>
                	<div id="headMsg" class="errormsg">
						
					</div>
					<?php if(isset($Vedwpwmexrrm)) {echo '<p class="error">' . $Vedwpwmexrrm . '</p>';}?>
		  			<h4 class="account-heading">Admin account details</h4>
		  			<hr/>
                   <form class="form-horizontal" id="install_form" method="post" >
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Full Name <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="admin_fullname" class="input_text" name="admin_fullname">
								<input class="form-control" type="hidden" id="lisence_key" class="input_text" name="lisence_key" value="<?php echo $_GET['key']?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Username <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="admin_username" class="input_text" name="admin_username">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="email" id="email" class="input_text" name="email">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password<span class="required">*</span></label>
                            <div class="col-sm-8">
								<div class="rightBTN">
                                <input onkeyup="CheckPasswordStrength()" class="form-control password" type="password" id="admin_password" value="<?php echo $randomString;?>" class="input_text" name="admin_password">
								<div class="hide-show">
									<span><i class="fa fa-eye" aria-hidden="true"></i></span>
								</div>
								<div class="generate">
									<span><i class="fa fa-refresh" aria-hidden="true"></i></span>
								</div>
								</div>
				<meter max="4" id="password-strength-meter"></meter>
        <p id="password-strength-text"></p>
				
                            </div>
							
                        </div>
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirm Password<span class="required">*</span></label>
							
                            <div class="col-sm-8">
                                <input class="form-control" type="password" id="conf_password" value="<?php echo $randomString;?>" class="input_text" name="conf_password">
                            </div>
                        </div>
						<br /><br />
						<h4 class="account-heading">Company details</h4>
						<hr/>
						
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Company Name <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="comp_name" class="input_text" name="comp_name">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Company Email <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="comp_email" class="input_text" name="comp_email">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Company Start On<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="comp_started_on" class="input_text" name="comp_started_on" value="<?php echo date('Y-m-d')?>">
                            </div>
                        </div>
                        <?php ?>

                       

                        <div class="form-group last">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success btn-sm" id="submit">Create</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
					
					

                </div>
                <div class="panel-footer">&copy Copyright Echyip
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('document').ready(function(){
	
	var validate = $('#install_form').validate({
		ignore : [],
		rules:{
			admin_fullname: {
                required: true,
            },
			admin_username: {
                required: true,
            },
			email: {
                required: true,
                email: true,
            },
			admin_password: {
                required: true,
            },
			conf_password: {
                required: true,
				equalTo : '#admin_password',
            },
			comp_name: {
                required: true,
            },
			comp_email: {
                required: true,
                email: true,
            },
			comp_started_on: {
                required: true,
            },
		},
		messages:{
			admin_fullname: {
                required: "Full Name is required!",
            },
			admin_username: {
                required: "Username is required!",
            },
			email: {
                required: "Email ID is required!",
				email: "Please enter valid Email ID."
            },
			admin_password: {
                required: "Password is required!",
            },
			conf_password: {
                required: "Confirm Password is required!",
                equalTo: "Confirm Password is not equal to Password!",
            },
			comp_name: {
                required: "Company Name is required!",
            },
			comp_name: {
                required: "Company Email is required!",
                email: "Please enter valid company email!",
            },
			comp_started_on: {
                required: "Company Started Date is required!",
            },
		},
		errorPlacement : function(error,element){
			error.insertAfter(element);
		},
		submitHandler: function(form){
			admin_fullname = $('#admin_fullname').val();
			admin_username = $('#admin_username').val();
			email = $('#email').val();
			lisence_key = $('#lisence_key').val();
			admin_password = $('#admin_password').val();
			comp_name = $('#comp_name').val();
			comp_started_on = $('#comp_started_on').val();
			comp_email = $('#comp_email').val();
			task = 'create_admin';
			
			$('.errormsg').html('');
			$.post('./ajax.php',{
				admin_fullname : admin_fullname,
				admin_username : admin_username,
				email : email,
				lisence_key: lisence_key,
				admin_password : admin_password,
				comp_name : comp_name,
				comp_email : comp_email,
				comp_started_on : comp_started_on,
			},function(response){
				console.log(response);
				$("html, body").animate({ scrollTop: 0 }, "slow");
				if(response.status==200){
					$('#headMsg').html('<div class="alert alert-success" role="alert">\n\
							'+response.message+'\n\
					</div>');
					window.setTimeout(function(){
						window.location.href = './success.php';
					},2000);
				}else{
					$('#headMsg').html('<div class="alert alert-danger" role="alert">\n\
							'+response.message+'\n\
					</div>');
				}
			},'json');
			return false;
		},
		
	});
	
	
});
</script>
<script>
$(function(){
CheckPasswordStrength();
  $('.hide-show').show();
  $('.hide-show span').addClass('show')
  
  $('.hide-show span').click(function(){
    if( $(this).hasClass('show') ) {
      $(this).text('Hide');
      $('input[name="admin_password"]').attr('type','text');
      $('input[name="conf_password"]').attr('type','text');
      $(this).removeClass('show');
    } else {
       $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
       $('input[name="admin_password"]').attr('type','password');
       $('input[name="conf_password"]').attr('type','password');
       $(this).addClass('show');
    }
    CheckPasswordStrength();
  });
	
	$('form button[type="submit"]').on('click', function(){
		$('.hide-show span').html('<i class="fa fa-eye" aria-hidden="true"></i>').addClass('show');
		$('.hide-show').parent().find('input[name="admin_password"]').attr('type','password');
		$('.hide-show').parent().find('input[name="conf_password"]').attr('type','password');
	});
	
	 $('.generate').click(function(){
	 	var new_string=createRandomString(10);
	 	$('input[name="admin_password"]').val(new_string);
	 	$('input[name="conf_password"]').val(new_string);
	 	CheckPasswordStrength();
	 }); 
});

function createRandomString( length ) {
    
   
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@!#$%^&*()";

  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;

}


function CheckPasswordStrength(){
var strength = {
        0: "Worst ☹",
        1: "Bad ☹",
        2: "Weak ☹",
        3: "Good ☺",
        4: "Strong ☻"
}

var password = document.getElementById('admin_password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');



    var val = password.value;
    var result = zxcvbn(val);
    
    // Update the password strength meter
    meter.value = result.score;
   
    // Update the text indicator
    if(val !== "") {
        text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>" + "<span class='feedback'>" + result.feedback.warning + " " + result.feedback.suggestions + "</span"; 
    }
    else {
        text.innerHTML = "";
    }
}

</script>
<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*()';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
	</body>
</html>
