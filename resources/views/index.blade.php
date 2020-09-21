
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">

            <div class="row">
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas"></canvas>
                </div></div>
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas-1"></canvas>
                </div></div>
                <div class="w-100"></div>
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas-2"></canvas>
                </div></div>
                <div class="col"><div class="chart-container">
                <canvas id="graphCanvas-3"></canvas>
            </div></div>
              </div>
            

        </div>
    </div>
 </main>

 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/Chart.min.js"></script>

 <script>
    $(document).ready(function () {
        showGraph();
    });


    function showGraph()
    {
        {
            $.get("http://localhost/Doctor-s-office-management/public/data",
            function (data)
            {
                console.log(data);
                 var name = [];
                var marks = [];

                for (var i in data) {
                    if(i == "name"){
                        for (let index = 0; index < i.length - 1; index++) {

                            name.push(data[i][index]) 
                        }
                        
                    }
                    if(i == "marks"){
                        for (let index = 0; index < i.length - 1; index++) {

                            marks.push(data[i][index]) 
                        }
                        
                    }
                }

                var chartdata = {
                    labels: name,
                    datasets: [
                        {
                            label: 'Student Marks',
                            backgroundColor: '#49e2ff',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: marks
                        }
                    ]
                };

                var graphTarget = $("#graphCanvas");

                var barGraph = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata
                });

                var graphTarget1 = $("#graphCanvas-1");

                var barGraph1 = new Chart(graphTarget1, {
                    type: 'bar',
                    data: chartdata
                });

                var graphTarget2 = $("#graphCanvas-2");

                var barGraph2 = new Chart(graphTarget2, {
                    type: 'bar',
                    data: chartdata
                });

                var graphTarget3 = $("#graphCanvas-3");

                var barGraph3 = new Chart(graphTarget3, {
                    type: 'bar',
                    data: chartdata
                });
            });
        }
    }
    </script>
 @include('layouts/footer')