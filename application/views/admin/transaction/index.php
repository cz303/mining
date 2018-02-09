<!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#from_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		//yearRange: "-100:+0",
		maxDate : new Date(),
	});
  });
</script-->	

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/bootstrap-datetimepicker.min.css" />
<!--script type="text/javascript" src="http://localhost/exam/assets//js/bootstrap-multiselect.js"></script>
-->

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
		<form class="" id="filter_form" method="get">
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
									$content .= '<option '.$selected.'  value="'.$value.'">'.($value).'</option>';
								}
								echo $content;
							}
						?>
					</select>
				</div>
			</div>
			<!--div class="col-md-2">
				<input type="text" class='form-control' name="from_date" id="from_date" placeholder="From">
			</div-->
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
					<!--label for="group_name" class="col-sm-2 control-label"><small>End Date</small></label>
					-->
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
            <th style="width:15%">Username</th>                    
            <th style="width:15%">Full Name</th>                     
            <th style="width:15%">Phone</th>                            
            <th style="width:15%">Amount ($)</th>                     
            <th style="width:30%">Paymemt Currency</th>                     
            <th style="width:30%">Descriptions</th>
            <th style="width:15%">Date</th>
          </tr>
        </thead>
        <tbody> 
            <?php foreach($trans_details->result() as $key=>$detail){ ?>
                <tr class="deposit">
                	<td><?php echo $detail->username;?></td>
                	<td><?php echo $detail->fullname;?></td>
                	<td><?php echo $detail->phone;?></td>
                	<td><?php echo number_format($detail->amount,2);?></td>
                	<td>
						<img src="<?php echo base_url('asset/images/currency_img');?>/<?php echo currency_img2($detail->payment_thro);?>" alt="<?php echo ucfirst(str_replace('_',' ',$detail->payment_thro));?>">
					</td>
                	<td><?php echo ($detail->description);?></td>
                	<td><?php echo date("F d, Y", strtotime($detail->date));?></td>
                </tr>
    		<?php }?>
        </tbody>
      </table>
    </div>
  </div>  
<script type="text/javascript">
<?php
	$minDate =  DATE('Y-m-d',strtotime('-1 year'));
	if($this->config->item('company_start')){
		$minDate = DATE('Y-m-d',strtotime($this->config->item('company_start')));
	}
?>
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
	/*$("#start_date").on("dp.change",function (e) {
		var d= new Date(e.date);
		console.log(e.date);
		$('#end_date').data("DateTimePicker").setMinDate(d.setDate(d.getDate()-1));
	});
	$("#end_date").on("dp.change",function (e) {
		var d= new Date(e.date);
		$('#start_date').data("DateTimePicker").setMaxDate(d.setDate(d.getDate()+0));
		console.log(e.date);
	});*/
	
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


