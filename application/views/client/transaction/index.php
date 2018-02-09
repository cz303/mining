<!-- Main charts -->
<div class="panel panel-flat">
  <div class="panel-body">
    <!-- Traffic sources -->
    <div class="col-md-12">
      <h3><?php echo $title;?></h3>
      <table class="table datatable-basic">
        <thead>
          <tr>
            <th style="width:30%">Username</th>                     
            <th style="width:30%">Amount</th>                     
            <th style="width:30%">Date</th>
          </tr>
        </thead>
        <tbody> 
            <?php foreach($trans_details->result() as $key=>$detail){ ?>
                <tr class="deposit">
                	<td><?php echo $detail->fullname;?></td>
                	<td><?php echo $detail->amount.'('.$detail->payment_thro.')';?></td>
                	<td><?php echo date("F d, Y", strtotime($detail->date));?></td>
                </tr>
    		<?php }?>
        </tbody>
      </table>
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