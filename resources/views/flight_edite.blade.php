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
    <div id='app' class='my-container'>
    @include('menu')
        <div class="modal fade modal-lg" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Flight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                            <label for="input_flight_number" class="col-sm-2 col-form-label">Flight Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_flight_number" v-model="flight_number">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_departure_airport" class="col-sm-2 col-form-label">Departure Airport</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input_departure_airport" v-model="departure_airport">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_departure_airport" class="col-sm-2 col-form-label">Arrival Airport</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input_departure_airport" v-model="arrival_airport">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_departure_time" class="col-sm-2 col-form-label">Departure Time</label>
                        <div class="col ">
                            <div class='form-floating mb-2'>
                                <select id="departure_time_year" v-model="departure_time.year" class='form-select'  @change='countDuration()'>
                                    <option v-for="year in years" >
                                        @{{ year }}
                                    </option>
                                </select>
                                <label for="floatingInput">年</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="departure_time_month" v-model="departure_time.month" class='form-select' @change='countDuration()'>
                                    <option v-for="month in months">
                                        @{{ month }}
                                    </option>
                                </select>
                                <label for="floatingInput">月</label>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="departure_time_day" v-model="departure_time.day" class='form-select' @change='countDuration()'>
                                    <option v-for="day in days">
                                        @{{ day }}
                                    </option>
                                </select>
                                <label for="floatingInput">日</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="departure_time_hour" v-model="departure_time.hour" class='form-select' @change='countDuration()'>
                                    <option v-for="hour in hours">
                                        @{{ hour }}
                                    </option>
                                </select>
                                <label for="floatingInput">時</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="departure_time_minutes" v-model="departure_time.minutes" class='form-select' @change='countDuration()'>
                                    <option v-for="minute in minutes">
                                        @{{ minute }}
                                    </option>
                                </select>
                                <label for="floatingInput">分</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_arrival_time" class="col-sm-2 col-form-label">Arrival Time</label>
                        <div class="col ">
                            <div class='form-floating mb-2'>
                                <select id="arrival_time_year" v-model="arrival_time.year" class='form-select' @change='countDuration()' >
                                    <option v-for="year in years" >
                                        @{{ year }}
                                    </option>
                                </select>
                                <label for="floatingInput">年</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="arrival_time_month" v-model="arrival_time.month" class='form-select'@change='countDuration()'>
                                    <option v-for="month in months">
                                        @{{ month }}
                                    </option>
                                </select>
                                <label for="floatingInput">月</label>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="arrival_time_day" v-model="arrival_time.day" class='form-select' @change='countDuration()'>
                                    <option v-for="day in days">
                                        @{{ day }}
                                    </option>
                                </select>
                                <label for="floatingInput">日</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="arrival_time_hour" v-model="arrival_time.hour" class='form-select' @change='countDuration()'>
                                    <option v-for="hour in hours">
                                        @{{ hour }}
                                    </option>
                                </select>
                                <label for="floatingInput">時</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-floating mb-2'>
                                <select id="arrival_time_minutes" v-model="arrival_time.minutes" class='form-select' @change='countDuration()'>
                                    <option v-for="minute in minutes">
                                        @{{ minute }}
                                    </option>
                                </select>
                                <label for="floatingInput">分</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input_duration" v-model="duration">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input_price" v-model="price">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click='addFlight()'>Save changes</button>
                </div>
                </div>
            </div>
        </div>
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

                        <tr v-for="(flight,index) in flights">
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
        <div class="fixed-bottom">
        <button type="button" class="btn btn-primary btn-lg" @click='OpenAddFlightModal()'>Add</button>
        
        </div>
    </div>
    
</body>
<script>
    const app = Vue.createApp({
        data(){
            return{
                message:'test',
                flights: [
                    
                ],
                years:[],
                months: [],
                days:[],
                hours: [],
                minutes:[],
                flight_number:'',
                departure_airport:'',
                arrival_airport:'',
                departure_time:{
                    year:'',
                    month:'',
                    day:'',
                    hour:'',
                    minutes:''
                },
                arrival_time:{
                    year:'',
                    month:'',
                    day:'',
                    hour:'',
                    minutes:''
                },
                duration:'',
                price:''
            };
        },
        created(){
            for (let i = new Date().getFullYear(); i < new Date().getFullYear()+100; i++) {
                this.years.push(i);
            }
            for (let i =1; i <=12; i++) {
                this.months.push(i);
            }
            for (let i =0; i <=23; i++) {
                this.hours.push(i);
            }
            for (let i =0; i <=59; i++) {
                this.minutes.push(i);
            }
            
            this.departure_time.year=new Date().getFullYear();
            this.departure_time.month=new Date().getMonth()+1;
            this.arrival_time.year=new Date().getFullYear();
            this.arrival_time.month=new Date().getMonth()+1;
            for (let i =1; i <=new Date(this.departure_time.year, this.departure_time.month, 0).getDate(); i++) {
                this.days.push(i);
            }
            this.departure_time.day=new Date().getDay()+1
            this.arrival_time.day=new Date().getDay()+1;
            this.getFilghts();
        },
        methods:{
            getFilghts(){
                let _this=this;
                _this.flights=[];
                $.ajax({
                    type: 'get',
                    url: window.location.origin +'/api/flight', 
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
            OpenAddFlightModal(){
                let _this=this;
                $('#addmodal').modal('show')
            },
            countDuration(){
                const date1 = new Date(this.departure_time.year+"/"+this.departure_time.month+"/"+this.departure_time.day+" "+this.departure_time.hour+":"+this.departure_time.minutes);
                const date2 = new Date(this.arrival_time.year+"/"+this.arrival_time.month+"/"+this.arrival_time.day+" "+this.arrival_time.hour+":"+this.arrival_time.minutes);
                const diffInMilliseconds = date2 - date1; 
                this.duration = diffInMilliseconds / (1000 * 60); 
            },
            addFlight(){
                let _this=this;
                $.ajax({
                    type: 'post',
                    url: window.location.origin +'/api/flight', 
                    data: {
                        flight_number:_this.flight_number,
                        departure_airport:_this.departure_airport,
                        arrival_airport:_this.arrival_airport,
                        departure_time:_this.departure_time.year+"/"+String(_this.departure_time.month).padStart(2, '0')+"/"+String(_this.departure_time.day).padStart(2, '0')+" "+String(_this.departure_time.hour).padStart(2, '0')+":"+String(_this.departure_time.minutes).padStart(2, '0'),
                        arrival_time:_this.arrival_time.year+"/"+String(_this.arrival_time.month).padStart(2, '0')+"/"+String(_this.arrival_time.day).padStart(2, '0')+" "+String(_this.arrival_time.hour).padStart(2, '0')+":"+String(_this.arrival_time.minutes).padStart(2, '0'),
                        duration:_this.duration,
                        price:_this.price
                    },
                    success(data) {
                        $('#addmodal').modal('hide');
                        _this.getFilghts();
                    },
                    error(xhr, status, error) {
                        
                        alert("Error occurred: " + xhr.responseJSON.error || "An error occurred.");
                    }
                })
            }
        }
    }).mount('#app')
    </script>
</html>