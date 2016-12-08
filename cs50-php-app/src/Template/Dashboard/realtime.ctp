    <?php
        echo $this->Html->css('flot/example');
        echo $this->Html->script('flot/jquery');
        echo $this->Html->script('flot/jquery.flot');?>

 <script type="text/javascript">

    $(function(){

        // Initialize data array with all zeros
        var data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            totalPoints = 20;
        var series_data = [],
            totalPoints = 20;

        var index = 0;
        var iter = 1;
        var data_num = 0;

        var alreadyFetched  = false;

        var data_selector = 'temp1';
        var clearTimeoutBool = false;

        // Get selected data from the database via GET request
        function getDBData(data_selector) {

            if (alreadyFetched){
                console.log("already_fetched");    
            }
            else
            {
                // Loop through the various pages of sensordata data
                dataurl = "http://cs50-final.mikevartanian.me/api/sensordata.json?page="+iter,

                $.ajax({
                        url: dataurl,
                        type: "GET",
                        dataType: "json",
                        success: onDataReceived,
                        error: onErrorReceived
                    });
                iter++;
            }

            // This function gets called when the AJAX request returns with SUCCESS
            function onDataReceived(series) {
                for (i=0;i<20;i++)
                {
                    series_data[i] = series.data[i][data_selector];
                }
                alreadyFetched  = true;
            }

            // This function gets called when the AJAX request reutrns with ERROR
            function  onErrorReceived() {
                console.log("Error with GET request");
            }

            // Zip the generated y values with the x values
            if (alreadyFetched){
                data.shift();
                data.push(series_data[data_num]);
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

       // Configure plot options

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

        // Set up the update interval
        var updateInterval = 2000;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1) {
                    updateInterval = 1;
                } else if (updateInterval > 5000) {
                    updateInterval = 5000;
                }
                $(this).val("" + updateInterval);
            }
        });

        // Function that updates the graph
        function update() {

            plot.setData([getDBData(data_selector)]);

            plot.setupGrid();
            plot.draw();

            // Check the boolean value, clearTimeoutBool to determine whether or not to
            // stop the realtime updates.
            if (clearTimeoutBool)
            {
                clearTimeout();
            }
            else
            {
                setTimeout(update, updateInterval);
            }
        }

        // jQuery code to handle button presses for selecting data
        $("button.fetchSeries").click(function () {

            data_selector = $(this).val();
            clearTimeoutBool = false;
            update();
        });

        // jQuery code to handle button presses to stop real-time updates
        // Real-time updates are stopped by calling the jQuery method, clearTimeout()
        $("button.stopUpdate").click(function () {
            clearTimeoutBool = true;
        });
    });

</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class="devices form large-9 medium-8 columns content">
    <div id="header">
        <h2>Real-time updates</h2>
        <p>In this section of the site, I experimented with using AJAX to fetch the data from the MySQL database via RESTFUL API without having to refresh the page. It is not actually real-time as it starts from the beginning of the sensordata table. </p>
    </div>

    <div id="content">

        <div class="demo-container">
            <div id="placeholder" class="demo-placeholder"></div>
        </div>
        <p>
            <button class="fetchSeries" value=temp1>Start Temperature</button>
            <button class="fetchSeries" value=photo1>Start Light</button>
            <button class="fetchSeries" value=id>Start ID</button>
            <button class="stopUpdate" >Stop Real Time Updates</button>
        </p>
        <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>

    </div>
</div>