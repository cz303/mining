<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="<?php echo base_url() ?>asset/css/fullcalendar.css" rel="stylesheet" type="text/css" >
<style type="text/css">
    .datepicker{z-index:1151 !important;}  
    .trans_year_form {
    margin-bottom: 15px;
    width: 50%;
    display: inline-block;
}
.trans_year_form select.tran_year.form-control {
    width: 86%;
    display: inline-block;
    margin-right: 10px;
}
.trans_year_form button.btn.btn-sm.btn-primary {
    float: right;
} 
</style>


<?php
echo message_box('success');
echo message_box('error');
$curency = $this->admin_model->check_by(array('code' => config_item('currency')), 'tbl_currencies');

$active_member_per = 0;
if($active_member){
	$active_member_per = (($active_member/$all_member)*100);
	$active_member_per = number_format($active_member_per,2);
}

$deactived_member_per = 0;
if($deactived_member){
	$deactived_member_per = (($deactived_member/$all_member)*100);
	$deactived_member_per = number_format($deactived_member_per,2);
}

$banned_member_per = 0;
if($banned_member){
	$banned_member_per = (($banned_member/$all_member)*100);
	$banned_member_per = number_format($banned_member_per,2);
}

?>



<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Active',     <?php echo $active_member;?>],
          ['Deactive',      <?php echo $deactived_member;?>],
          ['Banned',  <?php echo $banned_member;?>],
        ]);

        var options = {
          title: 'My Users'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<?php
	// fetching the depoits
	$start_year = date('Y',strtotime($this->config->item('company_start')));
	$year = date('Y');
	if($this->input->post('tran_year')){
		$year = $this->input->post('tran_year');
	}
	$upto_month = date('m');
	$deposit_data = get_history_transaction('deposit',$year);
	$withdraw_data = get_history_transaction('withdrawal',$year);
	
	$str = '';
	$mydata = array();
	
	for($i=1;$i<=$upto_month;$i++){
		$flag = 0;
		$key = '';
		foreach($deposit_data as $k=>$v){
			if($v['month']==$i){
				$flag = 1;
				$key = $k;
			}
		}
		if($flag== 1){
			$mydata[$i]['deposit_monthly_amount'] = $deposit_data[$key]['monthly_amount'];
		}else{
			$mydata[$i]['deposit_monthly_amount'] = 0;
		}
		
		$mydata[$i]['month'] = $i;
	}
	

	for($i=1;$i<=$upto_month;$i++){
		$flag = 0;
		$key = '';
		foreach($withdraw_data as $k=>$v){
			if($v['month']==$i){
				$flag = 1;
				$key = $k;
			}
		}
		if($flag== 1){
			$mydata[$i]['withdraw_monthly_amount'] = $withdraw_data[$key]['monthly_amount'];
		}else{
			$mydata[$i]['withdraw_monthly_amount'] = 0;
		}
		$mydata[$i]['month'] = $i;
	}
	
	foreach($mydata as $k=>$v){
		
		$str .= "['".date('M',strtotime(date('Y-'. $v['month'] .'-d')))."', '$".number_format($v['deposit_monthly_amount'],2)."', '$".number_format($v['withdraw_monthly_amount'],2)."'],";
	}
?>
 <script type="text/javascript">
	google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Deposits','Withdraw'],
		  <?php echo $str;?>
          /*['Feb', 1170],
          ['March', 660],
          ['April', 1030],
          ['Sep', 1040],*/
        ]);

        var options = {
          chart: {
            title: 'Active Deposits and Withdraws',
             subtitle: 'Active Deposit and Withdraws overviews: <?php echo $year;?>',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>
<?php 


?>
<div class="dashboard row" >
    <div class="container-fluid"> 
		<div class="row">
<?php /*?>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Members <img src="<?php echo base_url();?>asset/images/currency_img/members.png"></h4>
        			<h2>All: <?php echo $all_member;?>, <span>Active: <?php echo $active_member;?>,</span> Banned: <?php echo $banned_member;?></h2>        			
        		</div>
        	</div>
        	<?php */?>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Plans <img src="<?php echo base_url();?>asset/images/currency_img/plans.png"></h4>
        			<h2><?php echo $total_plan;?></h2>        			
        		</div>
        	</div>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Active Deposits <img src="<?php echo base_url();?>asset/images/currency_img/deposit.png"></h4>
        			<h2>$ <?php echo number_format($total_member_deposit,2);?></h2>        			
        		</div>
        	</div>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Withdrawals <img src="<?php echo base_url();?>asset/images/currency_img/withdrawals.png"></h4>
        			<h2>$<?php echo number_format($total_withdraw,2);?></h2>        			
        		</div>
        	</div>
			<?PHP /*?>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Balance <img src="<?php echo base_url();?>asset/images/currency_img/balance.png"></h4>
        			<h2>$ <?php echo number_format($total_member_bal,2);?></h2>        			
        		</div>
        	</div>
			<?PHP */?>
        	<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Withdrawals Request Amount <img src="<?php echo base_url();?>asset/images/currency_img/withdrawals-request.png"></h4>
        			<h2>$ <?php echo number_format($total_withdraw_pending,2);?></h2>        			
        		</div>
        	</div>
			<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Penality <img src="<?php echo base_url();?>asset/images/currency_img/plans.png"></h4>
        			<h2>$ <?php echo $total_penality;?></h2>        			
        		</div>
        	</div>
			<div class="col-md-4 col-sm-6">
        		<div class="earn-section blue-color">
        			<h4>Open Tickets <img src="<?php echo base_url();?>asset/images/currency_img/plans.png"></h4>
        			<h2><?php echo count($all_tickets_info);?></h2>        			
        		</div>
        	</div>

            <div class="col-sm-12" style="margin-top: 20px;">
                <div class="wrap-fpanel">                           
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">in/out Total</h3>
                            
                        </div>               
                        <div class="panel-body slim-scroll">
                            <table class="table dated-table">
								<tbody>
									<tr>
										<th colspan="2" bgcolor="FFEA00">Today </th>
										<th colspan="2" bgcolor="FFEA00">This Week </th>
										<th colspan="2" bgcolor="FFEA00">This Month </th>
										<th colspan="2" bgcolor="FFEA00">This Year </th>
										<th colspan="2" bgcolor="FFEA00">Total </th>
									</tr>
									<tr>
										<th>In</th>
										<th>Out</th>
										<th>In</th>
										<th>Out</th>
										<th>In</th>
										<th>Out</th>
										<th>In</th>
										<th>Out</th>
										<th>In</th>
										<th>Out</th>
									</tr>
									<tr>
										<td align="right"><small>$<?= number_format($today_inout['total_in_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($today_inout['total_out_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_weak_inout['total_in_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_weak_inout['total_out_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_month_inout['total_in_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_month_inout['total_out_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_year_inout['total_in_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($this_year_inout['total_out_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($total_inout_amout['total_in_ammount'],2); ?></small>
										</td>
										<td align="right"><small>$<?= number_format($total_inout_amout['total_out_ammount'],2); ?></small>
										</td>
									</tr>
									<tr>
										<th colspan="2"><small>$<?= number_format($today_inout['total_inout_ammount'],2); ?></small>
										</th>
										<th colspan="2"><small>$<?= number_format($this_weak_inout['total_inout_ammount'],2); ?></small>
										</th>
										<th colspan="2"><small>$<?= number_format($this_month_inout['total_inout_ammount'],2); ?></small>
										</th>
										<th colspan="2"><small>$<?= number_format($this_year_inout['total_inout_ammount'],2); ?></small>
										</th>
										<th colspan="2"><small>$<?= number_format($total_inout_amout['total_inout_ammount'],2); ?></small>
										</th>
									</tr>
								</tbody>
							</table>    
                            
                        </div>
                    </div> 
                </div>
			</div>
		</div>
        
        <div class="row">            
        </div>
        <div class="row">            
            <div class="col-sm-4" style="margin-top: 20px;">
                <div class="wrap-fpanel">                           
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Members</h3>
                            
                        </div>               
                        <div class="panel-body slim-scroll">
							 <div id="piechart" ></div>
							 <p><strong>Total User</strong> : <?php echo $all_member;?></p>
							 <!--p><strong>Active User</strong> : <?php echo $active_member;?></p>
							 <p><strong>Deactivated User</strong> : <?php echo $deactived_member;?></p>
							 <p><strong>Banned User</strong> : <?php echo $banned_member;?></p>
							 -->
                        </div>
                    </div> 
                </div>
			</div>
			<div class="col-sm-8" style="margin-top: 20px;">
                <div class="wrap-fpanel">                           
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Transaction Overview</h3>
                            
                        </div>               
                        <div class="panel-body slim-scroll">
							<form class="" id="tran_overview_form" method="post">
								<div class="trans_year_form">
									<select class=" tran_year form-control" name="tran_year"  id="" >
										<option>Select Year</option>
										<?php
											for($i=$start_year;$i<= date('Y');$i++){
												$selected = '';
												if($i == $year){
													$selected = 'selected';
												}
												echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
											}
										?>
									</select>
									<button type="summit" class="btn btn-sm btn-primary">Go</button>
								</div>
							</form>
							<div id="chart_div"></div> 
							 
                        </div>
                    </div> 
                </div>
			</div>
			
			
			
			
        
		</div>
        
		<!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?= base_url() ?>/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!--Calendar-->
 