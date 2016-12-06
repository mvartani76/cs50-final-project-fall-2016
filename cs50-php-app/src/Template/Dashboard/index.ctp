<?php $this->set('pageTitle', 'Dashboard'); ?>

<?php
        echo $this->Html->css('flot/example');
        echo $this->Html->script('flot/jquery');
        echo $this->Html->script('flot/jquery.flot');?>

 <script type="text/javascript">

    $(function(){

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            totalPoints = 20;
        var series_data = [],
            totalPoints = 20;

        var index = 0;
        var iter = 1;
        var data_num = 0;

        var alreadyFetched  = false;

        function getRandomData() {

            console.log("1 data =", data);
            console.log("data_num =", data_num);
            if (alreadyFetched){
                console.log("already_fetched");    
            }
            else
            {
                console.log("fetching new data");
                dataurl = "http://cs50-final.mikevartanian.me/api/sensordata.json?page="+iter,

                $.ajax({
                        url: dataurl,
                        type: "GET",
                        dataType: "json",
                        success: onDataReceived,
                        error: onErrorReceived
                    });
                iter++;
                console.log("2 data =", data);
            }

            function onDataReceived(series) {
                console.log("3 data =", data);
                console.log("URL=", this.url);
                for (i=0;i<20;i++)
                {
                    series_data[i] = series.data[i]['id'];
                }
                console.log("series_data=", series_data);
                console.log(series.pagination.current_page);
                alreadyFetched  = true;
            }

            function  onErrorReceived() {
                console.log("Error with GET request");
            }

            // Zip the generated y values with the x values
            if (alreadyFetched){
                data.shift();
                data.push(series_data[data_num]);
                console.log("in alreadyfetched loop");
                data_num++;
            }

            if (data_num == 20)
            {
                alreadyFetched = false;
                data_num = 0;
            }

            var res = [];
            for (var i = 0; i < 20; ++i) {
                res.push([i, data[i]])
            }
            
            return res;
        }

       // Set up the control widget

        var updateInterval = 1000;

        var plot = $.plot("#placeholder", [], {
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

        $("button.fetchSeries").click(function () {
            update();
        });

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
        <p>
            <button class="fetchSeries">First dataset</button>
            [ <a href="http://cs50-final.mikevartanian.me/api/sensordata.json?page=2">see data</a> ]
            <span></span>
        </p>
    </div>

</body>
</html>
