<script>
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'revenue-graph-CG',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2008', value: 20 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 5 },
                    { year: '2011', value: 5 },
                    { year: '2012', value: 20 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });

            new Morris.Donut({
                // ID of the element in which to draw the chart.
                element: 'revenue-geography-CG',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { label: 'North America', value: 20 },
                    { label: 'EMEA', value: 10 },
                    { label: 'Rest of the world', value: 5 }
                ]
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Donut({
                // ID of the element in which to draw the chart.
                element: 'revenue-sector-CG',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { label: 'Consulting - New', value: 50 },
                    { label: 'Consulting - Other', value: 6 },
                    { label: 'IT Outsourcing - Infra', value: 12 },
                    { label: 'IT Outsourcing - Other', value: 5 },
                    { label: 'Business Process Outsourcing', value: 9 }
                ]
                // The name of the data record attribute that contains x-values.
                
            });
</script>