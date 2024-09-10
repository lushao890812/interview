<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('header')
    <link rel="stylesheet" href="/css/commen.css">
    <link rel="stylesheet" href="/css/Mytrip.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div id='app' class='my-container' >
        @include('menu')
        <div class='content'>
            <div class='filter'>
                <div class="row g-2">
                    <div class="col-md form-floating">
                        <input type="text" class="form-control" id="floatingInput" v-model="ticket_number" >
                        <label for="floatingInput">Ticket Number</label>
                    </div>
                    <div class="col-md form-floating">
                        <input type="text" class="form-control" id="floatingInput" v-model="first_name">
                        <label for="floatingInput">Frist Name</label>
                    </div>
                    <div class="col-md form-floating">
                        <input type="text" class="form-control" id="floatingInput" v-model="last_name">
                        <label for="floatingInput">Last Name</label>
                    </div>
                </div>
                <button type="button" class="btn btn-dark search-btn" @click="getData()">Search</button>
            </div>
         
            <div class='infromation' :class="{ hidden: visibility}">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Ticket Number</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['ticket_number']" readonly>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['first_name']" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['last_name']" readonly>
                    </div>
                </div>
               
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Flight Number</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['flight_number']" readonly>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Seat Number</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['seat_number']" readonly>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Passenger Type</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" v-model="book_data['passenger_type']" readonly>
                </div>
            </div>
        </div>
    </div>
   
</body>
<script>
    const app = Vue.createApp({
        data(){
            return{
                book_data:{
                    ticket_number:'',
                    first_name:'',
                    last_name:'',
                    seat_number:'',
                    passenger_type:'',
                    flight_number:'',
                },
                first_name:'',
                last_name:'',
                ticket_number:'',
                visibility:true
            };
        },
        created(){
         
        },
        methods:{
            getData(){
                let _this=this;
                _this.visibility=false;
                $.ajax({
                    type: 'get',
                    url: window.location.origin +'/api/booking', 
                    data: {
                        first_name:_this.first_name,
                        last_name:_this.last_name,
                        ticket_number:_this.ticket_number
                    },
                    success(data) {
                        console.log(data);
                        datas = JSON.parse(data);
                        console.log(datas);
                        _this.book_data.ticket_number=datas[0]['id'];
                        _this.book_data.first_name=datas[0]['first_name'];
                        _this.book_data.last_name=datas[0]['last_name'];
                        _this.book_data.seat_number=datas[0]['seat_number'];
                        _this.book_data.passenger_type=datas[0]['passenger_type'];
                        _this.book_data.flight_number=datas[0]['flight_number'];
                        
                    },
                    error(xhr, status, error) {
                        
                        alert("Error occurred: " + xhr.responseJSON.error || "An error occurred.");
                    }
                })
            },
        }
    }).mount('#app')
</script>
</html>