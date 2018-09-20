<!-- chartist chart -->
<script src="<?php echo base_url()?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="<?php echo base_url()?>assets/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/c3-master/c3.min.js"></script>
<!-- Vector map JavaScript -->
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="<?php echo base_url()?>js/dashboard2.js"></script>
<!-- Chart JS -->
<script src="<?php echo base_url()?>assets/plugins/echarts/echarts-all.js"></script>
<script src="<?php echo base_url()?>assets/plugins/echarts/echarts-init.js"></script>
<script type="text/javascript">
      // ==============================================================
      // Bar chart option
      // ==============================================================

      var myChart = echarts.init(document.getElementById('chart'));

      // specify chart configuration item and data
      option = {
          tooltip : {
              trigger: 'axis'
          },
          legend: {
              data:['Pendapatan Perbulan']
          },
          toolbox: {
              show : true,
              feature : {

                  magicType : {show: true, type: ['line', 'bar']},
                  restore : {show: true},
                  saveAsImage : {show: true}
              }
          },
          color: ["#55ce63", "#009efb"],
          calculable : true,
          xAxis : [
              {
                  type : 'category',
                  data : ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sept','Oct','Nov','Dec']
              }
          ],
          yAxis : [
              {
                  type : 'value'
              }
          ],
          series : [
              {
                  name:'Pendapatan Perbulan',
                  type:'bar',
                  data:[
                    <?php
                        $i = $countIncomePermonth;
                        echo "$i[0],
                              $i[1],
                              $i[2],
                              $i[3],
                              $i[4],
                              $i[5],
                              $i[6],
                              $i[7],
                              $i[8],
                              $i[9],
                              $i[10],
                              $i[11]
                              ";
                     ?>
                  ],
                  markPoint : {
                      data : [
                          {type : 'max', name: 'Max'},
                          {type : 'min', name: 'Min'}
                      ]
                  },
                  markLine : {
                      data : [
                          {type : 'average', name: 'Average'}
                      ]
                  }
              }
          ]
      };


      // use configuration item and data specified to show chart
      myChart.setOption(option, true), $(function() {
                  function resize() {
                      setTimeout(function() {
                          myChart.resize()
                      }, 100)
                  }
                  $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
              });



</script>
<!-- ============================================================== -->


<!-- Ini untuk semua script yang di load pada page masing masing controller di dalam module -->
<!--
Coba dicek di module template -> folder view -> full.php
cek line ke : 525
 -->
