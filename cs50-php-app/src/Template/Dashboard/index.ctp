<?php $this->set('pageTitle', 'Dashboard'); ?>

<?php
        echo $this->Html->css('flot/example');
        echo $this->Html->script('flot/jquery');
        echo $this->Html->script('flot/jquery.flot');?>

 <script type="text/javascript">

    $(function() {

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [],
            totalPoints = 20;
        var series_data = [],
            totalPoints = 20;

        var index = 0;
        var iter = 1;
        var data_num = 0;

        var alreadyFetched  = false;

        function getRandomData() {

            if (series_data.length > 0)
            {
                tmp = series_data[0];
                series_data = series_data.slice(1);
                series_data.push(tmp);
                data_num++;
            }

            if (data_num == 19)
            {
                alreadyFetched = false;
                data_num = 0;
            }
            if (alreadyFetched){
                console.log("already_fetched");
                
                
            }
            else
            {
                console.log("fetching new data");
                dataurl = "http://cs50-final.mikevartanian.me/api/sensordata.json?Page="+iter,
                console.log("url =", dataurl);
                $.ajax({
                        //url: dataurl,
                        url: dataurl,
                        data: {Page: 4},
                        type: "GET",
                        dataType: "json",
                        success: onDataReceived,
                        error: onErrorReceived
                    });
                iter++;
            }

            function onDataReceived(series) {

                for (i=0;i<20;i++)
                        //while (i < totalPoints)
                        {

                            series_data[i] = series.data[i]['id'];

                        }
                    //}
                    //console.log(series.pagination.count);
                    console.log(series.pagination.current_page);
                    alreadyFetched  = true;
            }
            function  onErrorReceived() {
                console.log("Error with GET request");
            }


            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < 20; ++i) {
                res.push([i, series_data[i]])
            }

            return res;
        }

       // Set up the control widget

        var updateInterval = 1000;

        var plot = $.plot("#placeholder", [ getRandomData() ], {
            lines: {
                show: true
            },
            points: {
                show: true
            },
            series: {
                shadowSize: 0   // Drawing is faster without shadows
            },
            yaxis: {
                min: 0,
                max: 100
            },
            xaxis: {
                show: false
            }
        });

        function update() {

            plot.setData([getRandomData()]);

            // Since the axes don't change, we don't need to call plot.setupGrid()
            plot.setupGrid();
            plot.draw();
            setTimeout(update, updateInterval);
        }

        update();


    });

</script>
<body>

    <div id="header">
        <h2>Real-time updates</h2>
    </div>

    <div id="content">

        <div class="demo-container">
            <div id="placeholder" class="demo-placeholder"></div>
        </div>

    </div>


</body>
</html>
