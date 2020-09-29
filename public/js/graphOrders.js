function showGraphOrders()
{
    {
        $.get("http://localhost/Doctor-s-office-management/public/charts/orders",
        function (data)
        {
            //console.log(data);
             var dates = [];
            var totals = [];

            for (var i in data) {
                dates.push(data[i].date_order) 
                totals.push(data[i].total) 
            }

            var chartdata = {
                labels: dates,
                datasets: [
                    {
                        label: 'Orders',
                        backgroundColor: '#01A31C',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totals
                    }
                ]
            };

            var graphTarget2 = $("#graphCanvas-consultations");

            var barGraph2 = new Chart(graphTarget2, {
                type: 'bar',
                data: chartdata
            });

 
        });
    }
}