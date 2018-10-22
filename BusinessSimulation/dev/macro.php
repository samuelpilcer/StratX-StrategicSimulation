<script>
            
        

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'market-sectors-growth',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Sector: 'Consulting - New products (Cloud, ...)', Revenue: 20 },
                    { Sector: 'Consulting - Other', Revenue: 5 },
                    { Sector: 'IT Outsourcing - Infrastructure (Datacenters, ...)', Revenue: -20 },
                    { Sector: 'IT Outsourcing - Other', Revenue: 12 },
                    { Sector: 'Business Process Outsourcing', Revenue: 3 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Sector',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Revenue'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Taux de croissance des revenus (en pourcents)']
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'market-geo-growth',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Geo: 'North America', Revenue: 27000000 },
                    { Geo: 'EMEA', Revenue: 38000000 },
                    { Geo: 'Rest of the world', Revenue: 12000000 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Geo',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Revenue'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Taux de croissance des revenus (en pourcents)']
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'margin-geo-growth',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Geo: 'North America', Revenue: -4 },
                    { Geo: 'EMEA', Revenue: 2 },
                    { Geo: 'Rest of the world', Revenue: 12 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Geo',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Revenue'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Taux de croissance des marges (en pourcents)']
                // The name of the data record attribute that contains x-values.
                
            });


            
        </script>