<?php 
$user_id = $this->session->userdata("user_id");
$user_bal_data = user_total_balence($user_id);
		
$total_earned = $user_bal_data['total_earned'];
$active_deposit = $user_bal_data['active_deposit'];
$total_withdraw = $user_bal_data['total_withdraw'];
$total_commissions = $user_bal_data['total_commissions'];
$total_bonus = $user_bal_data['total_bonus'];
$total_penality = $user_bal_data['total_penality'];
$total_balence = $user_bal_data['total_balence'];
$total_withdraw_requets = $user_bal_data['total_withdraw_requets'];

?>
<!-- Main charts -->
<div class="dashboard_panel">
	
	<div class="panel-body">
		<!-- Traffic sources -->
		
        <div class="row dashboard_sec">
        	<div class="col-md-3 col-sm-3">
        		<div class="earn-section blue-color">
        			<h4>Total Interest Earned <img src="<?php echo base_url();?>/asset/images/currency_img/earn.png"></h4>
        			<h2>$ <?php echo ($total_earned)?number_format($total_earned,2):0.00?></h2>
        			
        		</div>
        	</div>
			<div class="col-md-3 col-sm-3">
        		<div class="earn-section blue-color">
        			<h4>Total Commissions <img src="<?php echo base_url();?>/asset/images/currency_img/earn.png"></h4>
        			<h2>$ <?php echo ($total_commissions)?number_format($total_commissions,2):0.00?></h2>
        			
        		</div>
        	</div>
			<div class="col-md-3 col-sm-3">
        		<div class="earn-section blue-color">
        			<h4>Total Bonus <img src="<?php echo base_url();?>/asset/images/currency_img/earn.png"></h4>
        			<h2>$ <?php echo ($total_bonus)?number_format($total_bonus,2):0.00?></h2>
        			
        		</div>
        	</div>
			<div class="col-md-3 col-sm-3">
        		<div class="earn-section blue-color">
        			<h4>Total Penality <img src="<?php echo base_url();?>/asset/images/currency_img/total.png"></h4>
        			<h2>$ <?php echo ($total_penality)?number_format($total_penality,2):0.00?></h2>
        			
        		</div>
        	</div>
		</div>
        <div class="row dashboard_sec">	
        	<div class="col-md-3 col-sm-3">
        		<div class="earn-section yellow-color">
        			<h4>Total Withdraw <img src="<?php echo base_url();?>/asset/images/currency_img/total.png"></h4>
        			<h2>$ <?php echo ($total_withdraw)?number_format($total_withdraw,2):0.00?></h2>
        		</div>
        	</div>
        	<div class="col-md-3 col-sm-3">
        		<div class="earn-section light-green-color">
        			<h4>Total balance <img src="<?php echo base_url();?>/asset/images/currency_img/withdrraw.png"></h4>
        			<h2>$ <?php echo ($total_balence)?number_format($total_balence,2):0.00?></h2>
        			
        		</div>
        	</div>
			<div class="col-md-3 col-sm-3">
        		<div class="earn-section green-color">
        			<h4>Active Deposit <img src="<?php echo base_url();?>/asset/images/currency_img/deposit.png"></h4>
        			<h2>$ <?php echo ($active_deposit)?number_format($active_deposit,2):0.00?></h2>
        			
        		</div>
        	</div>
			<div class="col-md-3 col-sm-3">
        		<div class="earn-section green-color">
        			<h4>Withdrawals Request Amount <img src="<?php echo base_url();?>/asset/images/currency_img/deposit.png"></h4>
        			<h2>$ <?php echo ($total_withdraw_requets)?number_format($total_withdraw_requets,2):0.00?></h2>
        			
        		</div>
        	</div>
		</div>
		<div class="row dashboard_sec">	
			<div class="col-md-12 col-sm-12">
        		<div class="earn-section light-green-color dashboard-table">
        			<h3>Last <?php echo $limit;?> Deposit Transactions </h3>
					<div>
					<table class="table datatable-basic">
						<thead>
						  <tr>
							<th style="width:20%">Amount ($)</th>
							<th style="width:20%">Payment Currency</th>
							<th style="width:20%">Status</th>
							<th style="width:20%">Transaction Id</th>
							<th style="width:20%">Maturity Date</th>
						  </tr>
						</thead>
						<tbody> 
							<?php 
								if($last_transactions){
									foreach($last_transactions as $detail){
										$data['new'] = 'info';
										$data['active'] = 'success';
										$data['matured'] = 'warning';
										$data['released'] = 'primary';
										$status_label = 'default';
										if(array_key_exists($detail->status,$data)){
											$status_label = $data[$detail->status];
										}
										?>
										<tr class="deposit">
											<td><?php echo number_format($detail->amount,2);?></td>
											<td><img src="<?php echo base_url('asset/images/currency_img');?>/<?php echo currency_img2($detail->payment_thro);?>"></td>
											<td><span class="label label-<?php echo $status_label;?>"><?php echo ucfirst($detail->status);?></label></td>
											<td><?php echo $detail->transaction_id;?></td>
											<td><?php echo ($detail->maturity_date)?date("F d, Y", strtotime($detail->maturity_date)):'';?></td>
										</tr>
										<?
									}
								}
							?>
						</tbody>
					  </table>
					</div>
				</div>
        	</div>
        </div>
	
		<!-- /traffic sources -->

<!--NEW CSS FOR DATA TABLE-->
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
     

<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> -->

