
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/bootstrap-datetimepicker.min.css" />
<script  src="<?php echo base_url();?>asset/js/moment.js"></script>

<script  src="<?php echo base_url();?>asset/js/bootstrap-datetimepicker.min.js"></script>    

<?php
$type = $type;
$payment_thro = '';
$start_date = date("Y-m-d", strtotime("-1 year +1 day"));
$end_date =  date('Y-m-d');

if($this->input->get_post('search')){
	$type = $this->input->get_post('type');
	$payment_thro = $this->input->get_post('payment_thro');
	$start_date = date('Y-m-d',strtotime($this->input->get_post('start_date')));
	$end_date =  date('Y-m-d',strtotime($this->input->get_post('end_date')));
}


?>
<!-- Main charts -->
<div class="panel panel-flat">
  <div class="panel-body">
    <!-- Traffic sources -->
    <div class="col-md-12">
      <h3><?php echo $title;?></h3>
	  <form action="<?php echo base_url();?>client/transaction/index" class="" id="filter_form" method="get">
		<input type='hidden' name="search" value="yes">
		<br /><br />
		<div class="row">
			<div class="col-md-5">
				<div class="col-md-6">
					<select class="trans_type form-control" name="type">
						<option value="all_trans"><?php echo lang('all_transactions')?></option>
						<?php 
							if($trans_types){
								$content = '';
								foreach($trans_types as $key=>$value){
									$selected = '';
									if($type == $value){
										$selected = 'selected';
									}
									$content .= '<option  '.$selected.' value="'.$value.'">'.lang($value).'</option>';
								}
								echo $content;
							}
						?>
					</select>
				</div>
				<div class="col-md-6">
					<select class="payment_thro form-control" name="payment_thro">
						<option value="all_ecurrencies"><?php echo lang('all_ecurrencies')?></option>
						<?php 
							if($ecurrencies_list){
								$content = '';
								foreach($ecurrencies_list as $key=>$value){
									$selected = '';
									if($payment_thro == $value){
										$selected = 'selected';
									}
									$content .= '<option '.$selected.'  value="'.$value.'">'.$value.'</option>';
								}
								echo $content;
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<!--label for="group_name" class="col-sm-2 control-label"><small>Start Date</small></label>
					-->
					
					<div class="col-md-6">
						<div class="input-group date" id="start_date" data-date-format="YYYY-MM-DD">
							<input name="start_date" readonly="readonly" class="form-control" placeholder="Start Date" id="StartDate" type="text" value="<?php echo $start_date;?>">
							<span class="input-group-addon">
								<span class="glyphicon-calendar glyphicon"></span>
							</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group date" id="end_date" data-date-format="YYYY-MM-DD">
							<input name="end_date" id="end_date" readonly="readonly" class="form-control" placeholder="End Date" type="text" value="<?php echo $end_date;?>">
							<span class="input-group-addon">
								<span class="glyphicon-calendar glyphicon"></span>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Go</button>
				</div>
			</div>
		</div>
		</form>
		
      <table class="table datatable-basic">
        <thead>
          <tr>            
			<th style="width:20%">Date</th>		  
            <th style="width:20%">Amount ($)</th> 
			<?php if(!in_array($sub, $no_pam_currency) && !in_array($type, $no_pam_currency)){?>			
				<th style="width:30%">Paymemt Currency</th> 
			<?php }?>
            
            <th style="width:30%">Description</th>
          </tr>
        </thead>
        <tbody> 
            <?php foreach($trans_details->result() as $key=>$detail){ ?>
                <tr class="deposit">
                	<td><?php echo date("F d, Y", strtotime($detail->date));?></td>
                	<td><?php echo number_format($detail->amount,2);?></td>
					<?php if(!in_array($sub, $no_pam_currency) && !in_array($type, $no_pam_currency)){?>	
					<td>
						<img src="<?php echo base_url('asset/images/currency_img/').currency_img2($detail->payment_thro);?>" alt="<?php echo ucfirst(str_replace('_',' ',$detail->payment_thro));?>">
					</td>
                	<?php } ?>					
                    <td><?php echo $detail->description;?></td>
                </tr>
    		<?php }?>
        </tbody>
      </table>
    </div>
  </div>
	<?php 
	$minDate =  DATE('Y-m-d',strtotime('-1 year'));
	if($this->config->item('company_start')){
		$minDate = DATE('Y-m-d',strtotime($this->config->item('company_start')));
	}
	?>
 
<script type="text/javascript">
$(document ).ready(function() {
    
	$('#start_date').datetimepicker({
		//viewMode: 'years',
		format: 'YYYY-MM-DD',
		pickTime: false,
		autoclose: true,
		minDate:new Date('<?PHP ECHO $minDate;?>'),
		maxDate:new Date('<?PHP ECHO DATE('Y-m-d');?>'),
	});
	$('#end_date').datetimepicker({
		//viewMode: 'years',
		format: 'YYYY-MM-DD',
		pickTime: false,
		autoclose: true,
		minDate:new Date('<?PHP ECHO $minDate;?>'),
		maxDate:new Date('<?PHP ECHO DATE('Y-m-d');?>'),
	});
	$('#declare_result_div').datetimepicker();
	
	
	
	// Table setup
    // Basic datatable
    $('.datatable-basic').DataTable();

    // Alternative pagination
    $('.datatable-pagination').DataTable({
        pagingType: "simple",
        language: {
            paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
        }
    });

    // Datatable with saving state
    $('.datatable-save-state').DataTable({
        stateSave: true
    });

    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
        autoWidth: true,
        scrollY: 300
    });

    // External table additions
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

});
</script>