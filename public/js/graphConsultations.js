function showGraphConsultations()
{
    {
        $.get("http://localhost/Doctor-s-office-management/public/charts/consultations",
        function (data)
        {
            //console.log(data);
             var dates = [];
            var totals = [];

            for (var i in data) {
                dates.push(data[i].date_consultation) 
                totals.push(data[i].total) 
            }

            var chartdata = {
                labels: dates,
                datasets: [
                    {
                        label: 'consultations',
                        backgroundColor: '#FFC83D',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totals
                    }
                ]
            };

            var graphTarget2 = $("#graphCanvas-orders");

            var barGraph2 = new Chart(graphTarget2, {
                type: 'bar',
                data: chartdata
            });

 
        });
    }
}