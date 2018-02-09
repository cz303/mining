<div class="panel panel-flat">
  <div class="panel-body">
    <!-- Traffic sources -->
    <div class="col-md-12">
		<h3><?php echo $title;?></h3>
		<label>Total Refferals : </label> <?php echo $total_refferal;?>
		<br/>
		<label>Refferal Link : </label> <?php echo $refferal_link;?>
		<br/>
		<label>Share Links on : </label>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $refferal_link;?>" target="_blank" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(<?php echo $refferal_link;?>) + '&t=' + encodeURIComponent(<?php echo $refferal_link;?>)); return false;" class="rtte"><img src="<?php echo base_url();?>asset/images/facebook.png" style="width: 20px;"></a> 		  
          <a href="https://plus.google.com/share?url=<?php echo ($refferal_link);?>" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(<?php echo $refferal_link;?>)); return false;" class="rtte"><img src="<?php echo base_url();?>asset/images/googleplus.png" style="width: 20px;"></a> 
          <a href="https://twitter.com/intent/tweet?url=<?php echo $refferal_link;?>&text=Please register on this site and start double your coins" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(<?php echo $refferal_link;?>)); return false;" class="rtte"><img src="<?php echo base_url();?>asset/images/twitter.png" style="width: 20px;"></a> 
          <!--a href="http://pinterest.com/pin/create/button/?url=<?php echo $refferal_link;?>&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(<?php echo $refferal_link;?>) + '&description=' +  encodeURIComponent(document.title)); return false;" class="rtte"><img src="<?php echo base_url();?>asset/images/pin.png" style="width: 20px;"></a-->
		<br/>
		<label>Refferal Commission : </label> <?php echo $refferal_commsission;?>
		<br/>

		<table class="table">
			<thead>
				<tr>
					<th colspan="6">Total Users</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Level</th>
					<?php foreach($active_user as $key=>$total_num){
						echo '<th>Level '.$key.'</th>';
					}?>
				</tr>
				<tr> 
					<th>No. of Users</th>
					<?php foreach($active_user as $key=>$total_num){
						echo '<td>'.$total_num.'</td>';
					}?>
				</tr>
			</tbody>
		</table>
		
		
		<!-- table class="table datatable-basic">
			<thead>
				<tr>
					<th colspan="5">Total Referrals Commission</th>
				</tr>
				<tr>
					<th>Level</th>
					<th>Username</th>
					<th>Name</th>
					<th>Deposit Amount</th>
					<th>Commission Percentage</th>
					<th>Commission Amount</th>
				</tr>
			<tbody> 
				<?php 
					if(!empty($balance_sheet)){
						foreach($balance_sheet as $sheet){
							$str='<tr>';
							$str.='<td>'.$sheet['commission_level'].'</td>';
							$str.='<td>'.$sheet['username'].'</td>';
							$str.='<td>'.$sheet['fullname'].'</td>';
							$str.='<td>'.format_money($sheet['coin_investment']).'</td>';
							$str.='<td>'.($sheet['commission_percentage']*100).'%</td>';							
							$str.='<td>'.format_money($sheet['balance']).'</td>';
							$str.='</tr>';
							echo $str;
						}
					}
					else
					{
						echo '<tr><td colspan="5">No record</td></tr>';
					}
				?>
			</tbody>
		</table -->
		
		
    </div>
</div>  
<script type="text/javascript">
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
</script>
