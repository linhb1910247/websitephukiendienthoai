

</main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Github buttons -->
    
    <!-- <script>
        
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
            }, {
            low: 0,
            showArea: true
        }); 
    </script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
 var char = new Morris.Line({
 // ID of the element in which to draw the chart.
    element: 'chart',
 // Chart data records -- each entry in this array corresponds to a point on
 // the chart.
    data: 
      [<?php 
      foreach($order as $key => $value){    
        
         ?>{ 
         "date":"<?php echo $value['order_date']?>","sales":<?php echo   $value['sales']?>,"quantity":<?php echo   $value['quanlity']?>},<?php }?>
        ],
 // The name of the data record attribute that contains x-values.
    xkey: 'date',
 // A list of names of data record attributes that contain y-values.
    ykeys: ['sales','quantity'],
 // Labels for the ykeys -- will be displayed when you hover over the
 // chart.
    labels: ['Sales','Quantity sold out']
});

</script>

</body>
</html>