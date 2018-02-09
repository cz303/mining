<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

        <div class="arcticmodal-container_i2">
            <div id="calc_modal" class="all_modal calc_modal visible" data-plan-content="plan_2">
                <span class="arcticmodal-close"></span>
                <h2>Calculate <span>Profit</span></h2>
                <div class="separator"></div>

                    <div class="plan_title"></div>
                   
               
                <ul class="plan_info">
                    <li>Minimum: <span>$800</span></li>
                    <li>Maximum: <span>$5000</span></li>
                </ul>

              
                <div class="calc_slider">
                  
                    <div class="static-wrap">
                      <p>100</p>
                    </div>

                <div class="progress-bar_1">
                     <canvas id="inactiveProgress" class="progress-inactive" height="275px" width="275px" ></canvas>
                     <canvas id="activeProgress" class="progress-active" height="275px" width="275px"></canvas>
                        <p>0%</p>
                 </div>

              
                    </div>
                     <div id="progressControllerContainer">
                             <div class="title_dep">Your Deposit</div>
                             <input type="range" id="progressController" min="10" max="100" value="10" />


                                <div class="progress-bar-2">
                                    <p>0%</p>
                                </div>


                        </div>
                <div class="plan_buttons clearfix">
                    <a href="?a=signup" class="custom_link black">Make Deposit</a>
                    <input value="calculate profit"  type="button">
                </div>

            </div>

  </div>

</div>
</div> 