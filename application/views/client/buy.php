<?php
function number_format_func($number){
    return number_format($number, 2, '.', '');
}
?>
<div class="row">
  <div class="col-lg-12">
    <!-- Traffic sources -->
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h6 class="panel-title plans-heading">Investment Plans</h6>
      </div>
       <div class="panel-body">
     
			               
        <!-- <a href="/refund/">Learn More</a>. -->
     
      <div class="container-fluid  col-md-12">
        <div class="container-fluid  col-md-8">
            <form role="form" id="planForm" enctype="multipart/form-data" action="<?php echo base_url().'deposit';?>" method="post" class="form-horizontal form-groups-bordered">
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Choose you Plan: </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">

                                <select class="input-sm form-control" onchange="changeLimits(this)" id="plan_id" name="plan_id" required>
                                <option value="">Select Plan</option>
                                    <?php foreach($all_plan_info as $plan_info){
                                        $selected='';
                                        if(isset($plan_id)){
                                            if($plan_id==$plan_info->plan_id){
                                                $selected='selected';

                                            }
                                        }

                                        echo '<option value="'.$plan_info->plan_id.'" '.$selected.'>'.$plan_info->plan_name.' ('.number_format_func($plan_info->max_interest).'% '.$duration_type[$plan_info->duration_type].' for '.$plan_info->period.' '.$period_type[$plan_info->plan_period_type].')</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Enter Amount ($): </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input class="input-sm form-control" value="<?php if(isset($min_amt)){ echo $min_amt;}?>" id="amount" name="amount" required="" <?php if(isset($min_amt)){ echo 'min="'.number_format_func($min_amt).'" max="'.number_format_func($max_amt).'"'; } ?> type="text">
                                    <span id="amt_limit">
                                        <?php if(isset($min_amt)){
                                                echo '$'.number_format_func($min_amt).' - $'.number_format_func($max_amt);
                                            }
                                        ?>
                                    </span>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Choose Payment Gateway: </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <select name="currency_bitcoin" class="form-control">
									<?php
									
										foreach($payment_gateways as $key=>$val){
											echo '<option value="'.$key.'">'.$val.'</option>';
										}
									?>                            
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Select new compound rate: </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <select name="compound" id="compound" data-original-title="" title="" class="form-control">               
                                   <option value="">Select compound</option>                  
                                   <option value="30">30%</option>
                                   <option value="35">35%</option>
                                   <option value="40">40%</option>
                                   <option value="45">45%</option>
                                   <option value="50">50%</option>                 
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <input type="submit" id="sbtn" class="btn btn-primary" value="Pay">
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </form>  
          
        </div>
        </div>
        <br>
      </div>
       </div>

       <div class="panel panel-flat request-purchase">
        <h3>Current Deposits</h3>
			
          <table class="table datatable-basic">
            <thead>
              <tr>
                <th >Plan</th> 
                <th >Amount($)</th>
                <th >Transaction Id</th>
                <th >Investment Date</th>
                <th >Maturity Date</th>
                <th >Status</th>
              </tr>
            </thead>
            <tbody> 
            <?php 
            if(!empty($client_transactions)){
            foreach($client_transactions->result() as $transaction){
				$data['new'] = 'info';
				$data['active'] = 'success';
				$data['matured'] = 'warning';
				$data['released'] = 'primary';
				$status_label = 'default';
				if(array_key_exists($transaction->status,$data)){
					$status_label = $data[$transaction->status];
				}
			  ?>
              <tr>
                <td><?php echo $transaction->plan_name;?></td>
                <td><?php echo $transaction->amount;?></td>
                <td> <?php echo $transaction->transaction_id;?></td>
                <td> <?php if($transaction->invest_date) echo date("F d, Y", strtotime($transaction->invest_date));?></td>
                <td> <?php if($transaction->maturity_date) echo date("F d, Y", strtotime($transaction->maturity_date));?></td>
				<td><span class="label label-<?php echo $status_label;?>"><?php echo ucfirst($transaction->status);?></span></td>
              </tr>
              <?php }
              }
              ?>
              
            </tbody>
          </table>
        </div>

      </div>
      <!-- /traffic sources -->
    </div>


    <script type="text/javascript">
        function changeLimits(sel){
            var plan_id=sel.value;
            if(plan_id!=''){
                $.ajax({
                    url : "<?php echo base_url();?>client/buy/get_plan_limit/"+plan_id,
                    type : 'POST',
                    success : function(result) 
                    {
                        var res = result.split("&");
                        var min_val = res[0];
                        var max_val = res[1];
                        $('#amt_limit').html('$'+min_val+' - $'+max_val);
						$('#amount').val(min_val);
                        $('#power_buy_count').attr('min', min_val);
                        $('#power_buy_count').attr('max', max_val);
                         //document.getElementById('unit').innerHTML=res[1];
                    }
                });
            }
            else
            {
                $('#amt_limit').html('');
            }
        }
      
      $(document ).ready(function() {
        // Table setup
        // ------------------------------
        // Setting datatable defaults
        /*$.extend( $.fn.dataTable.defaults, {
          autoWidth: false,
          columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [2]
          }],
          dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
          language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
          },
          drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
          },
          preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
          }
        });*/

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
        // ------------------------------
        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
        // Enable Select2 select for the length option
        /*$('.dataTables_length select').select2({
          minimumResultsForSearch: Infinity,
          width: 'auto'
        });*/
    });
    
    /*$('#calculate').on('click', function(){
      var pri = $('#power_buy_count').val()*parseInt($('#power_buy_count').text());
      $('#val').html(pri);
      $('#hidden_amount').val(pri);
    })*/
    $(document).ready(function(){
      //$('#calculate').trigger('click');
    })
  </script>
  <?= message_box('success'); ?>
<?= message_box('error'); ?>