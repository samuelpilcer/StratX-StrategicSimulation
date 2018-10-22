<script>

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'revenue-comparaison-geo',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Geo: 'North America', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 },
                    { Geo: 'EMEA', CG: 3800000, Atos: 11000000, Accenture: 12000000, TCS: 4500000 },
                    { Geo: 'Rest of the world', CG: 1000000, Atos: 1000000, Accenture: 6000000, TCS: 3500000 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Geo',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['CG', 'Atos', 'Accenture', 'TCS'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Revenus de Cap Gemini', "Revenus d'Atos", "Revenus d'Accenture", "Revenus de TCS"]
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'revenue-comparaison-sector',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Sector: 'Consulting - New products (Cloud, ...)', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 },
                    { Sector: 'Consulting - Other', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 },
                    { Sector: 'IT Outsourcing - Infrastructure (Datacenters, ...)', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 },
                    { Sector: 'IT Outsourcing - Other', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 },
                    { Sector: 'Business Process Outsourcing', CG: 4000000, Atos: 1500000, Accenture: 14000000, TCS: 8000000 }

                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Sector',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['CG', 'Atos', 'Accenture', 'TCS'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Revenus de Cap Gemini', "Revenus d'Atos", "Revenus d'Accenture", "Revenus de TCS"]
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'revenue-comparaison',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2014', CG: 14000000, Atos: 12000000, Accenture: 29000000, TCS: 14000000 },
                    { year: '2015',  CG: 15000000, Atos: 13500000, Accenture: 32300000, TCS: 15700000 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['CG', 'Atos', 'Accenture', 'TCS'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Revenus de Cap Gemini', "Revenus d'Atos", "Revenus d'Accenture", "Revenus de TCS"]
            });

            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'marketcap-comparaison',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2014', CG: 156, Atos: 234, Accenture: 400, TCS: 234 },
                    { year: '2015',  CG: 145, Atos: 234, Accenture: 452, TCS: 240 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['CG', 'Atos', 'Accenture', 'TCS'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Capitalisation de Cap Gemini', "Capitalisation d'Atos", "Capitalisation d'Accenture", "Capitalisation de TCS"]
            });

</script>