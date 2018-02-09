<?php  $this->load->view('header'); ?>

<section id="plans" class="plans" data-offset="50">

<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="col-md-3 col-sm-3"><!--leftbar start here-->
<div class="left-sidebar home-sidebar">
<div class="navigation-links">
    
    <?php if( $this->login_model->loggedin()==FALSE){ ?>
    <h3>Login</h3>
    <div class="left-loginbar">
        <form action="<?php echo base_url();?>login" id="UserLoginForm" method="post" accept-charset="utf-8" novalidate="novalidate">
            <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
            <div class="row inner-login-form">
                <div class="col-xs-12 form-group required" aria-required="true"><input name="user_name" class="form-control valid" placeholder="Username" id="Username" required="required" type="text" aria-required="true" aria-invalid="false"></div>
                <div class="col-xs-12 form-group required" aria-required="true"><input name="password" class="form-control valid" placeholder="Password" id="UserPassword" required="required" type="password" aria-required="true" aria-invalid="false"></div>
            </div>
            <div class="col-xs-12 form-group sign-btn">
                <button class="btn btn-theme" id="loginBtn" type="submit">Sign in</button>
            </div>
            <div class="col-xs-12 form-group links">
                <a class="forgot-password" href="<?php echo base_url();?>login/forgot_password">Forgot password?</a>
            </div>
        </form>
    </div>
    <?php } else {

    	?>
        <h3>Menu</h3>
    <ul class="list-inline">
        
        <?php if($this->session->userdata('client_id')){?>
        <li><a href="<?php echo base_url();?>client/dashboard"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Dashboard</a></li>
        <li><a href="<?php echo base_url();?>client/investment_plan"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Investment Plans</a></li>
        <li><a href="<?php echo base_url();?>client/transaction/deposit"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Your Deposit</a></li>
        <li><a href="<?php echo base_url();?>client/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdraw</a></li>
        <li><a href="<?php echo base_url();?>client/transaction/index/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawals History</a></li>
        <li><a href="<?php echo base_url();?>client/settings"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Setting</a></li>
        <?php } else { ?>
            <li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="<?php echo base_url();?>admin/plans"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Plans</a></li>
            <li><a href="<?php echo base_url();?>admin/user/user_list"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Users</a></li>
            <li><a href="<?php echo base_url();?>admin/transaction/index/deposit"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Deposits</a></li>
            <li><a href="<?php echo base_url();?>admin/transaction/index/bonus"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Bonus</a></li>
            <li><a href="<?php echo base_url();?>admin/transaction/index/penality"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Penality</a></li>
             <li><a href="<?php echo base_url();?>admin/transaction/send_bonus"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Send Bonus</a></li>
            <li><a href="<?php echo base_url();?>admin/transaction/send_penality"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Send Penality</a></li>
            <li><a href="<?php echo base_url();?>admin/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawal</a></li>
            <li><a href="<?php echo base_url();?>admin/transaction/index/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawals History</a></li>
            <li><a href="<?php echo base_url();?>admin/pages"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>CMS Pages</a></li>
            <li><a href="<?php echo base_url();?>admin/mailbox"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Mailbox</a></li>
            <li><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Setting</a></li>
             <li><a href="<?php echo base_url();?>admin/settings/templates"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Email Templates</a></li>
        <?php }?>
        
        <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Logout</a></li>
    </ul>
    <?php } ?>
</div>

<div class="navigation-links">
    <h3>Info</h3>
    <table class="table">
        <tr>
            <th>Started</th>
            <td><?php echo date("F d, Y", strtotime($this->config->item('company_start')));?></td>
        </tr>
        <tr>
            <th>Running days</th>
            <td>
                <?php
                    $now = time(); // or your date as well
                    $your_date = strtotime($this->config->item('company_start'));
                    $datediff = $now - $your_date;

                    echo floor($datediff / (60 * 60 * 24));
                ?>
            </td>
        </tr>
        <tr>
            <th>Total accounts</th>
            <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1))->result()); ?></td>
        </tr>
        <tr>
            <th>Active accounts</th>
            <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1, 'banned'=>0))->result()); ?></td>
        </tr>
        <tr>
            <th>Total deposited </th>
            <td> $ 
                <?php
                    $q=$this->db->select('sum(amount) as amount',FALSE)
                      ->from('deposit')
                      ->group_by('transaction_id')
                      ->get();
                    $deposit_info=$q->result();
                    if($deposit_info)
                        echo ($deposit_info[0]->amount);
                    else 
                        echo '0.00';
                ?>
            </td>
        </tr>
        <tr>
            <th>Total withdraw</th>
            <td>$ 
                <?php
                    $p=$this->db->select('sum(amount) as amount',FALSE)
                      ->from('history')
                      ->where('type', 'withdrawal')
                      ->get();
                    $withdraw_info=$p->result();
                    if(empty($withdraw_info))
                        echo ($withdraw_info[0]->amount);
                    else
                        echo '0.00';
                ?>
            </td>
        </tr>
        <tr>
            <th>Members online</th>
            <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1, 'online_status'=>1))->result()); ?></td>
        </tr>
    </table>
</div>
<div class="navigation-links">
    <h3>Dollar price per ounce</h3>
    <div class="stats-img">
        <img src="http://kitconet.com/charts/metals/gold/t24_au_en_usoz_2.gif" width="172" height="114">
    </div>
</div>
<div class="navigation-links">
    <h3>Euro price per ounce</h3>
    <div class="stats-img">
        <img src="http://kitconet.com/charts/metals/gold/t24_au_en_euoz_2.gif" width="172" height="114">
    </div>
</div>
</div>
</div><!--leftbar close here-->

<div class="col-md-9 col-sm-9 col-xs-9" align="center">

<div class="center">
<h2>Find a Cloud That's Right For You</h2>
</div>

<div class="plan1 online-calculator wow slideInDown">
<div class="plan_circle">
Online Calculator
</div>


<style>
.calculater tbody{width:100%; float:left;}
.calculater tbody tr{width:100%; float:left;}
.calculater tbody tr td{width:50%; float:left;}
select{width:100% !important;     height: 30px;}
.body_right{padding:0px 10px}
p{font-size: 16px;							   
color: #00607B;
}
input{
width:100% !important;     height: 30px;
}
</style>

<div class="col-md-12 col-sm-12 list-unstyled">
<table class="calculater inner-calculate" width="100%" border="0">
<tr>

<?php //include('include/leftcontent.php');?>


<td align="left" valign="top" style="width:100% ;float:left">
<div class="body_right">


<div class="welcme_div">
<!-- <h2>CALCULATOR</h2> -->


<table class="cab_table" width="100%">

<tr class="">
<td   class="" ><div> <p class="weldesc">Plan:</div></td>
<td class="n2">
<select name="hyipplans" id="hyipplans" class="" onChange="checkplans()">
<?php if(!empty($all_plan_info)):

foreach($all_plan_info as $plan):
echo '<option value="'.$plan->plan_id.'">'.$plan->plan_name.'</option>';

endforeach;
endif;
?>	
</select>	
</td>
</tr>	

<tr class="">
<td height="28" valign="middle" class="n1"><div> <p class="weldesc">Amount:</div></td><td class="n2" width="240">
<input type="text"  class="" size="" name="noncomp_principal" id="amounts" value="" onkeyup="keyupcal(this.value)" onkeydown="numchk(this)">

<span id="amounts"></span>
</td>
</tr>


<tr class="">
<td  valign="middle" class="n1"><div> <p class="weldesc">Minimum Investment:</div></td>
<td class="n2" width="240"><div class="min-investment">$<span id="mininvest"></span><span id="min_invest"></span></div></td>
</tr>



<tr class="">
<td width="136" height="28" valign="middle" class="n1"><div> <p class="weldesc">Interest:</div></td>
<td class="n2" width="240"><div class="min-investment"><span id="interest"></span><span id="int_rst"></span>&nbsp;%&nbsp;&nbsp;
		<span id="aftermetured"></span><span id="after_metured"></span></div></td>
</tr>



<tr class="">
<td height="41" style="height:35px"> <p class="weldesc">Compounding:<span class="mandatory"></span></td>
 <td class="orange">
 	<select name="compound" class="" id="compound" onchange="getSelectedValue2()">
	
	<option value="30">0%</option>
	<option value="30">30%</option>
   <option value="35">35%</option>
   <option value="40">40%</option>
   <option value="45">45%</option>
   <option value="50">50%</option>
	

</select></td></tr>




<tr class="">
<td  valign="middle" class="n1"><div> <p class="weldesc">Investment Length:</div></td>
<td class="n2"><div class="min-investment"><span id="investlength"></span><span id="invest_length"></span>&nbsp;</div></td>
</tr>


<tr class="">
<td valign="middle" class="n1"><div> <p class="weldesc">Total Returns:</div></td><br>
<td class="n2" ><div class="min-investment">$<span id="totreturns"></span>
</div></td>				
</tr>
<tr class="">
<td valign="middle" class="n1"><div> <p class="weldesc">Profit:</div></td><br>
<td class="n2" ><div class="min-investment">
$<span id="profits"></span><span id="pro_fits"></span></div></td>				
</tr>

</table>		

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	

<script type="text/javascript">



function numchk(tag)
{       
var1=tag.value; // tval is textbox (element) checking for characters only
s=var1.substr(var1.length-1,1); 	 
m=s.charCodeAt(0);            
if (!((m>=48 && m<=57 )||(m==46) || isNaN(m)))
{
ch=var1.substr(0,var1.length-1);		
tag.value=ch;						
}
} 

function checkplans()
{
var planid = $('#hyipplans').val();

$('#min_invest').hide();

$('#int_rst').hide();

$('#after_metured').hide();

$('#total_returns').hide();

$('#pro_fits').hide();

$('#invest_length').hide();

var compound = $("#compound").val();

if(compound!='')
{
var compound = compound;
}
else
{
var compound = 0;
}

$.ajax({
url : "<?php echo base_url();?>calculate/calculate_plan/"+planid+"/"+compound,
type : 'POST',
success : function(data) 
{
var result = data.split('|');

var amount = result[0];

var mininvest = result[1];

var interest = result[2];

var investlength = result[3];

var totreturns = result[4];

var profits = result[5];

var aftermetured = result[6];

$('input[id=amounts]').val(amount);

$('#mininvest').html(mininvest);

$('#interest').html(interest);

$('#investlength').html(investlength);

$('#totreturns').html(totreturns);

$('#profits').html(profits);

$('#aftermetured').html(aftermetured);
//document.getElementById('unit').innerHTML=res[1];
}
});

}


function getSelectedValue2()
{  
var planid = $('#hyipplans').find("option:selected").val();

var compound = $('#compound').val();
var amount = $('#amounts').val();


$('#total_returns').html('');

$('#pro_fits').html('');

//getplandetails
$.ajax({
url : "<?php echo base_url();?>calculate/calculate_compound/"+planid+"/"+amount+"/"+compound,
type : 'POST',
success : function(data) 
{
var result = data.split('|');

var principal = result[0];

var profits = result[1];

$('#totreturns').html(principal);

$('#profits').html(profits);
}

});



}  


function keyupcal(test_amt)
{


var planid = $('#hyipplans').find("option:selected").val();


//var amount = $('input[id=amounts]').val(amount);

var amount = test_amt;

var interest = $('#interest').html();

//alert(test_amt);


$('#min_invest').hide();

$('#int_rst').hide();

$('#after_metured').hide();

$('#total_returns').hide();

$('#pro_fits').hide();

$('#invest_length').hide();


$.ajax({
url : "<?php echo base_url();?>calculate/calculate_plan_amt/"+planid+"/"+amount+"/"+interest,
type : 'POST',
success : function(data) 
{


var result = data.split('|');

var amount = parseFloat(result[0]);

var mininvest = result[1];

var interest = result[2];

var investlength = result[3];

var totreturns = result[4];

var profits = result[5];

var aftermetured = result[6];

$('input[id=amount]').val(amount);

$('#mininvest').html(mininvest);

$('#interest').html(interest);

$('#investlength').html(investlength);

$('#totreturns').html(totreturns);

$('#profits').html(profits);

$('#aftermetured').html(aftermetured);
}

});

}
checkplans();
</script>

</div>

</div></td>
</tr>
</table>
</div>

</div>
</div>
<?php
if(!empty($all_plan_info)):

foreach($all_plan_info as $plan):	

?>
<div class="col-md-3 col-sm-3">
<div class="plan1 plan-coins calculate-plans wow slideInRight" style="visibility: visible; animation-name: slideInRight;">
<!--img class="img-responsive" src="images/a.png"-->
							
	<div class="plan_circle" ><?php echo $plan->plan_name?></div>
	<ul class="col-md-8 col-md-offset-2 col-sm-12  ul-design list-unstyled">
	<li><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><?php echo $plan->plan_name?></li>
	<li><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><?php echo number_format($plan->max_interest, 2, '.', '').'% '.$iperiod_type[$plan->iperiod_type]?></li>
	<li><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><?php echo lang('period');?></li>
	<li><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><?php echo $plan->period.' '.$period_type[$plan->period_type];?></li>
	<li><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><?php echo '$'.number_format($plan->plan_min_amt, 2, '.', '').' - $'.number_format($plan->plan_max_amt, 2, '.', '');?></li>
	</ul>
	<div class="col-md-12" align="center" style="padding-top: 15px;">
	<a href="<?php echo base_url().'buy_plan/'.$plan->plan_id ?>" class="btn btn-theme1">SELECT</a> 
	</div>
</div>
</div>
<?php			

endforeach;
endif;
?>
</div>
</div>
</section>

<section class="monitoring">

<div class="center">

<h2>Real-Time Mining Monitoring</h2>

<img src="<?php echo base_url(); ?>asset/img/imac.png" class="fadeInUp wow animated animated" alt="panel" style="visibility: visible; animation-name: fadeInUp;"> 

</div>

</section>



<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div id="testimonial-slider" class="owl-carousel">
<div class="testimonial">
<div class="pic">
<img src="asset/img/img-2.jpg" alt="">
</div>
<h3 class="testimonial-title">
loruem<small></small>
</h3>
<p class="description">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim diam, tempus vel ultricies viverra, luctus in elit. Aliquam tempus blandit velit, in pharetra ex volutpat a. Cras eu augue ac nisl tempor commodo.
</p>
</div>

<div class="testimonial">
<div class="pic">
<img src="asset/img/img-2.jpg" alt="">
</div>
<h3 class="testimonial-title">
Loreum1<small></small>
</h3>
<p class="description">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim diam, tempus vel ultricies viverra, luctus in elit. Aliquam tempus blandit velit, in pharetra ex volutpat a. Cras eu augue ac nisl tempor commodo.
</p>
</div>
</div>
</div>
</div>
</div>
<?php  $this->load->view('footer'); ?>