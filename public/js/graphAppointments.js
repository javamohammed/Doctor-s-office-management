function showGraphAppointments()
{
    {
        $.get("http://localhost/Doctor-s-office-management/public/charts/appointments",
        function (data)
        {
            //console.log(data);
             var dates = [];
            var totals = [];

            for (var i in data) {
                dates.push(data[i].date_appmnt) 
                totals.push(data[i].total) 
            }

            var chartdata = {
                labels: dates,
                datasets: [
                    {
                        label: 'Appointments',
                      //  backgroundColor: '#FFFFFF',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totals
                    }
                ]
            };

            var graphTarget = $("#graphCanvas-appointments");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
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