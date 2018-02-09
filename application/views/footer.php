        </div>
        <footer>
            <div class="container">
                <div class="menu">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <h3  class="heading_fotter">  Company </h3>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url() . 'about-us'?>" class="btn-nav">About us</a></li>
                                <li><a href="<?php echo base_url() . 'how-it-work'?>" class="btn-nav">How it works?</a></li>
                                <li><a href="<?php echo base_url() . 'contact'?>" class="btn-nav">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <h3  class="heading_fotter">Contact</h3>
                            <ul class="list-unstyled con">
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; &nbsp;<span><a href="javascript:void(0)"><?php echo $this->config->item('company_email');?></a></span></li>
                                <li><i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp; &nbsp;<span><a href="javascript:void(0)"><?php echo $this->config->item('company_phone');?></a></span></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <h3  class="heading_fotter">Follow Us</h3>
                             <ul class="list-inline social_hashking">
							<?php if(!empty($this->config->item('facebook_link'))){ ?>	
                                <li><a href="<?php echo $this->config->item('facebook_link');?>"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a></li>
							<?php } ?>	
							<?php if(!empty($this->config->item('twitter_link'))){ ?>
                                <li><a href="<?php echo $this->config->item('twitter_link');?>"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
							<?php } ?>	
							<?php if(!empty($this->config->item('instagram_link'))){ ?>
                                <li><a href="<?php echo $this->config->item('instagram_link');?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
							<?php } ?>	
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                           <!-- <img src="<?php echo base_url(); ?>asset/img/logo_white.png" alt="" width="110px">-->
						  <h3 class='heading_fotter'> <?php echo $this->config->item('company_name')?></he>
                            <?php if( $this->login_model->loggedin()==FALSE){ ?>
                            <h5 class="sign-up">If you don’t have an account sign up for free.<h5>
                            <a href="<?php  echo base_url();?>login/register" class="btn-block btn-theme1 btn-footer">Sign Up</a><br>
                             <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>			
        <section class="footer2">
            <div class="copyright">                
                © Copyright <?php echo $this->config->item('company_name')?>, all rights reserved. <?php echo date("Y")?>
            </div>              
            <div class="logos">  
                <img src="<?php echo base_url(); ?>asset/img/payment1.png" alt=""> &nbsp; &nbsp;
                <img src="<?php echo base_url(); ?>asset/img/payment2.png" alt=""> &nbsp; &nbsp;
                <img src="<?php echo base_url(); ?>asset/img/payment3.png" alt=""> &nbsp; &nbsp;
                <img src="<?php echo base_url(); ?>asset/img/payment4.png" alt=""> &nbsp; &nbsp;
                <img src="<?php echo base_url(); ?>asset/img/payment5.png" alt="">
            </div>			
        </section>
        <script>
            $(window).scroll(function() {
                var nav = $('.navbar-custom');    
                var top = 200;    
                if ($(window).scrollTop() >= top) {        
                    nav.addClass('fixed');    
                } 
                else {        
                    nav.removeClass('fixed');    
                }
            });
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/toastr.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items:1,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:true,
                navigation:false,
                navigationText:["",""],
                slideSpeed:1000,
                singleItem:true,
                transitionStyle:"fade",
                autoPlay:true
            });
        });
        </script>
    </body>
</html>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105007140-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-105007140-1');
</script>
