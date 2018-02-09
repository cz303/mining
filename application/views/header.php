<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
		
        <meta name="title" content="<?php if(isset($seo_title) && $seo_title!= ''){echo $seo_title;}else{echo $this->config->item('seo_title');} ?>" />
        <meta name="description" content="<?php if(isset($meta) && $meta!= ''){echo $meta;}else{echo $this->config->item('meta_data');} ?>" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<!-- Google Webmaster -->
		<?php
			$google_webmaster_tool_code = $this->config->item('google_webmaster_tool_code');
			if($google_webmaster_tool_code!=''){
				?>
				<meta name="google-site-verification" content="<?php echo $google_webmaster_tool_code;?>" />	
				<?php
			}
		?>
		
		<!-- End Google Webmaster -->
		
		<!-- Google Analytics -->
		<?php 
			$google_analytic_code = $this->config->item('google_analytic_code');
			if($google_analytic_code !=''){
				?>
				<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo $google_analytic_code;?>', 'auto');
				ga('send', 'pageview');
				</script>
				<?php
			}
			
		?>
		<!-- End Google Analytics -->
		
		
		
		
        <!-- Bootstrap 3.3.4 -->        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/toastr.min.css">

    </head>
    <body>
        <div class="wrapper" style="min-height:100%;position:relative;">
            <div class="inner-wrapper">
                <nav class="navbar scrollable navbar-custom" role="navigation">
                    <div class="container">
                        <div class="navbar-header scrollable">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                            </button>
                           <div class="idz-logo">
						 <a href="<?php echo base_url();?>"><?php if (config_item('company_logo') != '') { ?>
        <img class="site_logo" src="<?= base_url() . config_item('company_logo') ?>">
        <?php } else { ?>
		<img class="site_logo" src="<?= base_url() . 'asset/images/logo.png' ?>">
        <?php } ?> </a>
						</div>
                        </div>
                        <div class="collapse navbar-collapse navbar-right navbar-main-collapse scrollable">
                            <ul class="nav navbar-nav">
							  <li>
                                    <a class="btn-nav page-scroll" href="<?php echo base_url();?>"> Home</a>
                                </li>								
                                <li>
                                   
									<a href="<?php echo base_url() . 'how-it-work'?>" class="btn-nav">How it works? </a>

                                </li>
                                 <li>
									<a href="<?php echo base_url() . 'about-us'?>" class="btn-nav">About us</a>
                                </li>
								  <li>
								  <a href="<?php echo base_url() . 'contactus'?>" class="btn-nav">Contact Us</a>
                                </li>
                                <?php if( $this->login_model->loggedin()==FALSE){ ?>
                                <li class="login">
                                    <a href="<?php echo base_url() . 'login'?>" class="btn-nav btn-theme1">Login</a>
                                </li>
                                <li class="register">
                                    <a href="<?php echo base_url() . 'login/register'?>" class="btn-nav btn-theme1">Register</a>
                                </li>
                                <?php } else {  ?>
                                <li class="login">
                                    <a href="<?php echo base_url() . 'client/dashboard'?>" class="btn-nav btn-theme1">Dashboard</a>
                                </li>
								 <li class="register">
                                    <a href="<?php echo base_url() . 'login/logout'?>" class="btn-nav btn-theme1">Logout</a>
                                </li>
                                    <?php } ?>
                               
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="nav-placeholder-stat"></div>