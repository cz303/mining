<?php $userid = $this->session->userdata('user_id');
?>
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-flat buy-plan-details">
				<h3>Payment Process</h3> 
				<table class="table table-bordered buy-coin-table">	
					
					<tr class="row2">
						<th style="height:35px">Amount (USD)
						<span class="price-ratio">$<?=number_format($amount,2); ?></span>
						</th>
					</tr>
					<?php
					$amount=number_format($amount,2, '.', '');
					if(in_array($address, $coinpayment))
					{
						$allow_currencies = 'BTC';
						$image = base_url('asset/img/bitcoin.jpeg');
						if($address=="ETH"){
							$image = base_url('asset/img/ethereum.png');
							$allow_currencies = 'ETH';
						}
						elseif($address=="DASH"){
							$image = base_url('asset/img/dashcoin.png');
							$allow_currencies = 'DASH';
						}
						elseif($address=="LTC"){
							$image = base_url('asset/img/litecoin.png');
							$allow_currencies = 'LTC';
						}
						elseif($address=="XMR"){
							$image = base_url('asset/img/monero.png');
							$allow_currencies = 'XMR';
						}
						?>
					<tr class="row1" >
						<td style="height:35px" colspan="2" align="center">
							<img src="<?php echo $image;?>"  />	<br />
							<br>
						</td>
					</tr>
					<tr class="row2" >
						<td style="height:35px" colspan="2" align="center">
							<?php
								$merchant_id=$this->config->item('bitcoin_merchant_id');
								
								$data['cmd'] = '_pay';
								$data['reset'] = '1';
								$data['merchant'] = $merchant_id; 
								$data['currency'] = 'USD';
								$data['amountf'] = $amount;
								$data['item_name'] = $plan_id;
								$data['item_number'] =$userid;
								$data['on1'] = $compound;
								$data['allow_currencies'] = $allow_currencies;
								$data['want_shipping'] = '0';
								$data['success_url'] = base_url('bitcoin/success');
								$data['cancel_url'] = base_url('client/investment_plan');
								$data['button'] = 'Deposit';
								$data['ipn_version'] = '1.0';
								$data['ipn_type'] = 'deposit';
								$data['ipn_mode'] = 'hmac';
								$data['ipn_id'] = $this->config->item('bitcoin_ipn_secret');
								$data['ipn_url'] =base_url('bitcoin');
								$post_data = json_encode($data);
								$private_key = $this->config->item('bitcoin_private_key');
								$hmac = hash_hmac('sha512', $post_data, $private_key); 				
							?>
							<form method="post" action="https://www.coinpayments.net/index.php" role="form" id="coform">
								<input type="hidden" value="_pay" name="cmd">
								<input type="hidden" name="key" value="<?php echo $private_key;?>">
								<input type="hidden" value="1" name="reset">
								<input type="hidden" name="merchant" value="<?php echo $merchant_id; ?>">
								<input type="hidden" name="currency" value="USD">
								<input type="hidden" name="amountf" value="<?php echo $amount;?>">
								<input type="hidden" name="item_name" value="<?php echo $plan_id; ?>">
								<input type="hidden" name="item_number" value="<?php echo $userid; ?>">
								<input type="hidden" name="on1" value="<?php echo $compound; ?>">
								<input type="hidden" name="allow_currencies" value="<?php echo $allow_currencies;?>">
								<input type="hidden" name="want_shipping" value="0">
								<input type="hidden" name="success_url" value="<?php echo $data['success_url']?>">	
								<input type="hidden" name="hmac" value="<?php echo $hmac;?>" >
								<input type="hidden" name="cancel_url" value="<?php echo $data['cancel_url']?>">	
								<input type="submit" name="button" id="button" value="Deposit" class="button" />
								<input type="hidden" name="ipn_url" value="<?php echo $data['ipn_url'];?>">
								<input type="hidden" name="ipn_version" value="1.0">	
								<input type="hidden" name="ipn_type" value="deposit">	
								<input type="hidden" name="ipn_mode" value="hmac">	
								<input type="hidden" name="ipn_id" value="<?php echo $data['ipn_id'];?>">	
								<input type="button" name="button" id="button" onclick="window.location='<?php echo $data['cancel_url']?>'" value="Cancel" class="button" />
							</form>
						</td>
					</tr>				
				<?php }	
					elseif($address=='Advcash'){?>
					<tr class="row1" >
						<td style="height:35px" colspan="2" align="center">
							<img src="<?php echo base_url('asset/img/advcash.png')?>" />	<br />
							<br>
						</td>
					</tr>
					<tr class="row2" >
						<td style="height:35px" colspan="2" align="center">
							<form method="post" action="https://wallet.advcash.com/sci/">
								<input type="hidden" name="ac_account_email" value="<?php echo $this->config->item('advcash_email');?>" />
								<input type="hidden" name="ac_sci_name" value="<?php echo $this->config->item('advcash_sci_name');?>" />
								<input type="hidden" name="ac_amount" value="<?=number_format($amount,2); ?>" />
								<input type="hidden" name="ac_currency" value="USD" />
								<input type="hidden" name="user_id" value="<?php echo $userid; ?>" />
								<input type="hidden" name="ac_order_id" value="<?php echo rand(0, 9999999); ?>" />
								<input type="hidden" name="plan_id" value="<?php echo $plan_id; ?>">
								<input type="hidden" name="compound_rate" value="<?php echo $compound; ?>">
								<input type="hidden" name="ac_sign" value="<?php echo $this->config->item('advcash_sci_batch_key');?>" />
								<!-- Optional Fields -->
								<input type="hidden" name="ac_success_url" value="<?php echo base_url('advcash/success')?>" />
								<input type="hidden" name="ac_success_url_method" value="GET" />
								<input type="hidden" name="ac_fail_url" value="<?php echo base_url('advcash/error')?>" />
								<input type="hidden" name="ac_fail_url_method" value="GET" />
								<input type="hidden" name="ac_status_url" value="<?php echo base_url('advcash')?>" />
								<input type="hidden" name="ac_status_url_method" value="GET" />
								<input type="hidden" name="ac_comments" value="Deposit from <?php echo $this->session->userdata('user_name'); ?>" />
								<input type="submit" name="button" id="button" value="Deposit" class="button" />
								<input type="button" name="button" id="button" onclick="window.location='<?php echo base_url('client/investment_plan');?>'" value="Cancel" class="button" />
								</form>
						</td>
					</tr>	
				
				<?php }
				elseif($address=='perfect_money'){?>
					<tr class="row1" >
						<td style="height:35px" colspan="2" align="center">
							<img src="<?php echo base_url('asset/img/perfect-money.png')?>"  />	<br />
							<br>
						</td>
					</tr>
					<tr class="row2" >
						<td style="height:35px" colspan="2" align="center">
							<form action="https://perfectmoney.is/api/step1.asp" method="POST">
								<input type="hidden" name="PAYEE_ACCOUNT" value="<?=$this->config->item('perfect_money_account_id');?>" >
								<input type="hidden" name="PAYEE_NAME" value="<?=$this->config->item('perfect_money_account_id');?>">
								<input type="hidden" name="PAYMENT_AMOUNT" value="<?=number_format($amount,2); ?>">
								<input type="hidden" name="PAYMENT_UNITS" value="USD">
								<input type="hidden" name="STATUS_URL" value='<?=base_url('pm')?>'>
								<input type="hidden" name="PAYMENT_URL" value='<?=base_url('pm/success')?>'>
								<input type="hidden" name="NOPAYMENT_URL" value='<?=base_url('pm/error')?>'>
								<input type="hidden" name="BAGGAGE_FIELDS" value="Deposit from <?php echo $this->session->userdata('user_name'); ?>">
								<input type="hidden" name="MEMO" value="Deposit from <?php echo $this->session->userdata('user_name'); ?>">
								<input type="hidden" name="ORDER_NUM" value="<?=$userid; ?>">
								<input type="hidden" name="CUST_NUM" value="<?=$address; ?>">                   
								<input type="hidden" name="PAYMENT_ID"  class="apc_1"  value="<?php echo $userid.','.$plan_id.','.$compound; ?>">
								<input type="submit" name="button" id="button" value="Deposit" class="button" />
								<input type="button" name="button" id="button" onclick="window.location='<?php echo base_url('client/investment_plan');?>'" value="Cancel" class="button" />
							  </form>
						</td>
					</tr>	
				
				<?php }
				elseif($address=='Payeer'){?>
					<tr class="row1" >
						<td style="height:35px" colspan="2" align="center">
							<img src="<?php echo base_url('asset/img/payeer.png')?>"  />	<br />
							<br>
						</td>
					</tr>
					<tr class="row2" >
						<td style="height:35px" colspan="2" align="center">
							<form method="GET" action="//payeer.com/merchant/">
								<input type="hidden" name="m_shop" value="<?php echo $m_shop; ?>">
								<input type="hidden" name="m_orderid" value="<?php echo $m_orderid; ?>">
								<input type="hidden" name="m_amount" value="<?php echo $m_amount; ?>">
								<input type="hidden" name="m_curr" value="USD">
								<input type="hidden" name="m_desc" value="<?php echo $m_desc; ?>">
								<input type="hidden" name="m_sign" value="<?php echo $sign; ?>">
								<input type="submit" name="button" id="button" value="Deposit" class="button" />
								<input type="button" name="button" id="button" onclick="window.location='<?php echo base_url('client/investment_plan');?>'" value="Cancel" class="button" />
								
							</form>
						</td>
					</tr>	
				
				<?php }
				
				?>
				</table>
			</div>
		</div>
	</div>
</div>