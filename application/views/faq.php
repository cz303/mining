<?php $this->load->view('header');?>

<section class="faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12-col-xs-12">
        <div class="col-md-12" align="center">
          <h1 class="sec-heading" align="center"><?php echo lang('faq');?></h1>
        </div>
			<div class="clearfix"></div>


            <div class="panel-group" id="accordion">
                <?php 
        			if($faq_list){
        			
        				$i = 1;
        				foreach($faq_list as $value){
        					if($value['question'] != ''){
							if($i == 1){
        						?>
        						<div class="panel panel-default ">
        							<div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion_<?php echo $i;?>" data-target="#question_<?php echo $i;?>">
        								<h4 class="panel-title">
        								    <a href="javascript:void(0);" class="ing faq_ques" name="<?php echo $value['faq_id']?>"><?php echo $value['question']?><span class="glyphicon glyphicon-plus pull-right"></span></a>
        							    </h4>
        							</div>
        							<div id="question_<?php echo $i;?>" class="panel-collapse collapse" style="height: 0px;">
        								<div class="panel-body">
        									<p><?php echo $value['answer']?></p>
        								</div>
        							</div>
        						</div>
        						<?php
        					}else{
        						?>
        						<div class="panel panel-default ">
        							<div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion_<?php echo $i;?>" data-target="#question_<?php echo $i;?>">
        								<h4 class="panel-title">
        									<a href="javascript:void(0);" class="ing faq_ques" name="<?php echo $value['faq_id']?>"><?php echo $value['question']?><span class="glyphicon glyphicon-plus pull-right"></span></a>
        							    </h4>

        							</div>
        							<div id="question_<?php echo $i;?>" class="panel-collapse collapse" style="height: 0px;">
        								<div class="panel-body">
        									<p><?php echo $value['answer']?></p>
        								</div>
        							</div>
        						</div>
        						<?php
        					}
        					$i++;
							}
        				}
        			}else{
        				echo '<p class="text-info bg-info" style="padding:20px;">No FAQ Question found!</p>';
        			}
        		?>
        	</div>
		</div>
        </div>
      </div>
    <!--/panel-group-->
</div>
</section>


<?php $this->load->view('footer');?>



