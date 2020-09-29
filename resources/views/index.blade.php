
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">

            <div class="row">
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas-appointments"></canvas>
                </div></div>
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas-patients"></canvas>
                </div></div>
                <div class="w-100"></div>
                <div class="col"><div class="chart-container">
                    <canvas id="graphCanvas-consultations"></canvas>
                </div></div>
                <div class="col"><div class="chart-container">
                <canvas id="graphCanvas-orders"></canvas>
            </div></div>
              </div>
            

        </div>
    </div>
 </main>

 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/Chart.min.js"></script>
 <script type="text/javascript" src="js/graphAppointments.js"></script>
 <script type="text/javascript" src="js/graphPatients.js"></script>
 <script type="text/javascript" src="js/graphConsultations.js"></script>
 <script type="text/javascript" src="js/graphOrders.js"></script>

 
 <script>
    $(document).ready(function () {
        showGraphAppointments();
        showGraphPatients();
        showGraphConsultations();
        showGraphOrders();
    });
    </script>
 @include('layouts/footer')