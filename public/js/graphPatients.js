function showGraphPatients()
{
    {
        $.get("http://localhost/Doctor-s-office-management/public/charts/patients",
        function (data)
        {
            //console.log(data);
             var sex = [];
            var totals = [];

            for (var i in data) {
                sex.push(data[i].sex) 
                totals.push(data[i].total) 
            }

            var chartdata = {
                labels: sex,
                datasets: [
                    {
                        label: 'Patients by sex',
                        backgroundColor: '#F9FAFB',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totals
                    }
                ]
            };

            var graphTarget = $("#graphCanvas-patients");

            var barGraph = new Chart(graphTarget, {
                type: 'pie',
                data: chartdata
            });

           
        });
    }
}