<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<?php
$chk='0';
$value="0";
?>
<style>
.required{
	color:red;
}
.display_none{
	display:none !important;
}

</style>
<div class="panel panel-flat payment-methods">
	
        
    <div class="panel-body">
		<form action="<?php echo base_url('admin/payment/save_payment_data')?>" class="form-horizontal" method="post">
		<div class="row">
			
			<div class="col-md-12">
				<div class="money-sec">
					<h3>Perfect Money Setting</h3>					
					<div class="inner-money-content">
						<legend>Perfect Money <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-3">Perfect Money Member Id<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="perfect_money_member_id" id='perfect_money_member_id' class="form-control input-sm" value="<?php echo $perfect_money_member_id;?>" placeholder="">
								</div>
								<div class="col-md-3 display_none">
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-6">
											<label class="radio-inline">
												<input type="radio" name="perfect_money_status" id='' class="form-control input-sm perfect_money_status" value="1" <?php if($perfect_money_status == '1') echo 'checked';?>>Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="perfect_money_status" id='' class="form-control input-sm perfect_money_status" value="0" <?php if($perfect_money_status == '0') echo 'checked';?>>No
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Perfect Money Account Id</label>
								<div class="col-md-6">
									<input type="input" name="perfect_money_account_id" id='perfect_money_account_id' class="form-control input-sm" value="<?php echo $perfect_money_account_id;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Perfect Money Phrase Hash</label>
								<div class="col-md-6">
									<input type="input" name="perfect_money_phrase_hash" id='perfect_money_phrase_hash' class="form-control input-sm" value="<?php echo $perfect_money_phrase_hash;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-12">
				<div class="money-sec">
					<h3>Bitcoin setting</h3>
					<div class="inner-money-content">
						<legend>Bitcoin/ETH/Dashcoin/Litcoin      <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-3">Coin Payments Merchant ID<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="bitcoin_merchant_id" id='bitcoin_merchant_id' class="form-control input-sm" value="<?php echo $bitcoin_merchant_id;?>" placeholder="">
								</div>
								<div class="col-md-3 display_none">
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-6">
											<label class="radio-inline">
												<input type="radio" name="coin_payments_status" id='' class="form-control input-sm coin_payments_status" value="1" <?php if($coin_payments_status == '1') echo 'checked';?>>Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="coin_payments_status" id='' class="form-control input-sm coin_payments_status" value="0"  <?php if($coin_payments_status == '0') echo 'checked';?>>No
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Coin Payments Public Key</label>
								<div class="col-md-6">
									<input type="input" name="bitcoin_public_key" id='bitcoin_public_key' class="form-control input-sm" value="<?php echo $bitcoin_public_key;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Coin Payments Private Key</label>
								<div class="col-md-6">
									<input type="input" name="bitcoin_private_key" id='bitcoin_private_key' class="form-control input-sm" value="<?php echo $bitcoin_private_key;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Coin Payments IPN Key</label>
								<div class="col-md-6">
									<input type="input" name="coin_payments_ipn_key" id='coin_payments_ipn_key' class="form-control input-sm" value="<?php echo $coin_payments_ipn_key;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="money-sec">
					<h3>Payeer setting</h3>
					<div class="inner-money-content">
						<legend>Payeer      <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-3">Payeer Shop ID<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="payeer_shop_id" id='payeer_shop_id' class="form-control input-sm" value="<?php echo $payeer_shop_id;?>" placeholder="">
								</div>
								<div class="col-md-3 display_none">
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-6">
											<label class="radio-inline">
												<input type="radio" name="payeer_status" id='' class="form-control input-sm payeer_status" value="1" <?php if($payeer_status == '1') echo 'checked';?>>Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="payeer_status" id='' class="form-control input-sm payeer_status" value="0"  <?php if($payeer_status == '0') echo 'checked';?>>No
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Payeer Shop Secret Key<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="payeer_shop_secret_key" id='payeer_shop_secret_key' class="form-control input-sm" value="<?php echo $payeer_shop_secret_key;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>										
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="money-sec">
					<div class="inner-money-content">
						<legend>Payeer (Withdraw)      <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-3">Payeer Account<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="payeer_account" id='payeer_account' class="form-control input-sm" value="<?php echo $payeer_account;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Payeer API User<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="payeer_api_user" id='payeer_api_user' class="form-control input-sm" value="<?php echo $payeer_api_user;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Payeer API Secret<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="payeer_api_secret" id='payeer_api_secret' class="form-control input-sm" value="<?php echo $payeer_api_secret;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="money-sec">
					<h3>Advcash setting</h3>
					<div class="inner-money-content">
						<legend>Advcash      <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-3">Advcash Email<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_email" id='advcash_email' class="form-control input-sm" value="<?php echo $advcash_email;?>" placeholder="">
								</div>
								<div class="col-md-3 display_none">
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-6">
											<label class="radio-inline">
												<input type="radio" name="advcash_status" id='' class="form-control input-sm advcash_status" value="1" <?php if($advcash_status == '1') echo 'checked';?>>Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="advcash_status" id='' class="form-control input-sm advcash_status" value="0"  <?php if($advcash_status == '0') echo 'checked';?>>No
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Advcash SCI Name<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_sci_name" id='advcash_sci_name' class="form-control input-sm" value="<?php echo $advcash_sci_name;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Advcash SCI BATCH KEY<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_sci_batch_key" id='advcash_sci_batch_key' class="form-control input-sm" value="<?php echo $advcash_sci_batch_key;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>	
				</div>			
			</div>

			<div class="col-md-12">
				<div class="money-sec">
					<div class="inner-money-content">
						<legend>Advcash (Withdraw)      <span class="required">*</span> = Required Fields</legend>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-2">Advcash Email<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_withdraw_email" id='advcash_withdraw_email' class="form-control input-sm" value="<?php echo $advcash_withdraw_email;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Advcash API Nam<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_api_name" id='advcash_api_name' class="form-control input-sm" value="<?php echo $advcash_api_name;?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Advcash API Password <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="input" name="advcash_api_password" id='advcash_api_password' class="form-control input-sm" value="<?php echo $advcash_api_password;?>" placeholder="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<button type="submit" class="btn btn-primary update_btn">Update</button>
			</div>
				
			
			
		</div>
		
		</form>
	</div>
</div>

<script>

    $().ready(function() {

            // validate signup form on keyup and submit
        $("#payForm").validate({
            rules: {
            	price: {
                    required: true,
                    number: true,
                },
                power: {
					required: true,
					number: true,
                },
            },
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorElement: 'span',
			errorClass: 'help-block',
            errorPlacement: function(error, element) {
				if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
				} else {
				error.insertAfter(element);
				}
			},
            messages: {
				price: {
					required: "Please enter price",
					number: "Please enter correct value of price"
				},
				power: {
					required: "Please provide value for power",
					number: "Please enter correct value for power"
				},   

            }
        });
     });
</script>

       