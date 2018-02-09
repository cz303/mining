<?php
function number_format_func($number){
    return number_format($number, 2, '.', '');
}
?>
<div class="row">
  <div class="col-lg-12">
    <!-- Traffic sources -->
    
       <div class="panel panel-flat request-purchase">
        <h3>List of Deposits</h3>
			
          <table class="table datatable-basic">
            <thead>
              <tr>
                <th >Plan</th> 
                <th >Amount($)</th>
                <th >Transaction Id</th>
                <th >Investment Date</th>
                <th >Maturity Date</th>
                <th>Status</th>
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