<div class="panel panel-flat">
	<div class="panel-body">
    	<!-- Traffic sources -->
        <?= message_box('success'); ?>
        <?= message_box('error'); ?>
    	<div class="col-md-12">
      		<h3><?php echo $title;?></h3>
      	  <table class="table datatable-basic">
            <thead>
              <tr>
                <th style="width:10%">Username</th> 
                <th style="width:10%">User Full Name</th> 
                <th style="width:20%">Plan</th> 
                <th style="width:10%">Amount($)</th>
                <th style="width:20%">Transaction Id</th>
                <th style="width:20%">Investment Date</th>
                <th style="width:20%">Maturity Date</th>
                <th style="width:20%">Status</th>
              </tr>
            </thead>
            <tbody> 
            <?php 
            if(!empty($client_transactions)){
            foreach($client_transactions->result() as $transaction){
              ?>
              <tr>
                <td><?php echo $transaction->username;?></td>
                <td><?php echo $transaction->fullname;?></td>
                <td><?php echo $transaction->plan_name;?></td>
                <td><?php echo number_format($transaction->amount,2);?></td>
                <td> <?php echo $transaction->transaction_id;?></td>
                <td> <?php echo date("F d, Y", strtotime($transaction->invest_date));?></td>
                <td> <?php echo date("F d, Y", strtotime($transaction->maturity_date));?></td>
				<td> <?php echo ucfirst($transaction->status);?></td>
              </tr>
              <?php }
              }
              ?>
              
            </tbody>
          </table>
        </div>
	</div>
</div>

<script type="text/javascript">
$(document ).ready(function() {
    
	
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

