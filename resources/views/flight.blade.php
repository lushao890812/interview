<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('header')
    <link rel="stylesheet" href="/css/commen.css">
    <link rel="stylesheet" href="/css/flight.css">
    <title>Document</title>
</head>
<body>

    <div id='app' class='my-container' >
    @include('menu')
        <div class='content'>
           
            <div class='midden'>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">flight_number</th>
                        <th scope="col">departure_airport</th>
                        <th scope="col">arrival_airport</th>
                        <th scope="col">departure_time</th>
                        <th scope="col">arrival_time</th>
                        
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="(flight,index) in flights" @click="goToFlightDetails(flight.id)">
                        <th scope="row">@{{index+1}}</th>
                        <td>@{{flight.flight_number}}</td>
                        <td>@{{flight.departure_airport}}</td>
                        <td>@{{flight.arrival_airport}}</td>
                        <td>@{{flight.departure_time}}</td>
                        <td>@{{flight.arrival_time}}</td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
</body>
<script>
    const app = Vue.createApp({
        data(){
            return{
                message:'test',
                flights: [
                    
                ]
            };
        },
        created(){
            this.getFilghts();
        },
        methods:{
            getFilghts(){
                let _this=this;
                $.ajax({
                    type: 'get',
                    url: './api/flight', 
                    data: {
                      
                    },
                    success(data) {
                        console.log(data);
                        datas = JSON.parse(data);
               
                        datas.forEach(item => {
                          
                            _this.flights.push(item);
                            
                        });
                    },
                    error(xhr, status, error) {
                        
                        alert("Error occurred: " + xhr.responseJSON.error || "An error occurred.");
                    }
                })
            },
            goToFlightDetails(flightId) {
                // 构建 URL 并使用 window.location 跳转
                window.location.href = `{{ url('A321neo') }}/${flightId}`;
            },
        },
    }).mount('#app')
    </script>
</html>