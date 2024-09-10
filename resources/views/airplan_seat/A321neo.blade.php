<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('header')
    <link rel="stylesheet" href="/css/A321neo.css">
    <link rel="stylesheet" href="/css/commen.css">
    <title>Document</title>
</head>
<body>
    <div id='app' class='my-container'>
    @include('menu')
        <!-- Modal -->
        <div class="modal fade" id="TicketModal" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ticket Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your ticket number : @{{ticket_number}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Confirm</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade 	modal-xl" id="PassengerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">訂票資訊</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="inputSeat" class="col-sm-2 col-form-label">座位</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticSeat" v-model='seat'>
                        </div>
                    </div>
                    <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">姓名</label>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" aria-label="First name" v-model="first_name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" v-model="last_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputGender" class="col-sm-2 col-form-label">姓別</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="autoSizingSelect" v-model="gender">
                                <option selected>選擇</option>
                                <option value="1">男士</option>
                                <option value="2">女士</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputBirthday" class="col-sm-2 col-form-label">出生日期</label>
                            <div class="col ">
                                <div class='form-floating mb-3'>
                                    <select id="yearSelect" v-model="select_year" class='form-select' @change="ReSetDays">
                                        <option v-for="year in years" >
                                            @{{ year }}
                                        </option>
                                    </select>
                                    <label for="floatingInput">年</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class='form-floating mb-3'>
                                    <select id="monthSelect" v-model="select_month" class='form-select' @change="ReSetDays">
                                        <option v-for="month in months">
                                            @{{ month }}
                                        </option>
                                    </select>
                                    <label for="floatingInput">月</label>
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class='form-floating mb-3'>
                                    <select id="daySelect" v-model="select_day" class='form-select'>
                                        <option v-for="day in days">
                                            @{{ day }}
                                        </option>
                                    </select>
                                    <label for="floatingInput">日</label>
                                </div>
                            </div>
            
                    </div>
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" v-model="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPhone" v-model="phone">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click='Booking()'>Save changes</button>
                </div>
                </div>
            </div>
            
        </div>
        <!-- Modal -->
        <div class="seat-map">
            <div class="info">
                <p>商務艙 座位數：8 個 椅距：63 吋</p> <p>經濟艙 座位數：180 個 椅距：30 ~ 31 吋</p>
               
            </div>
            <div class="cabin">
                
                <div class="seat-section">
                    <!-- 商務艙 -->
                    <div v-for="(seat, index) in businessClassSeats" :key="index" class="seat">
                        <div class="seat-row">
                            <div v-for="s in seat" :key="s" class="seat-block">
                                <div v-if="CheckSelectAble(s+(index+2))" class='select'>@{{ s }}@{{ index+2 }}</div>   
                                <div v-else-if="s != null" class='business' @click="OpenPassengerModal(s+(index+2),'business')">@{{ s }}@{{ index+2 }}</div>   
                                <div v-else-if="s === null" class='number'>@{{ index+2 }}</div>   
                            </div>
                        </div>
                    </div>
                    <!-- 經濟艙 -->
                    <div v-for="(seat, index) in economyClassSeats" :key="index" class="seat">
                        <div class="seat-row">
                            <div v-for="s in seat" :key="s" class="seat-block">
                                <div v-if="CheckSelectAble(s+(index+4))" class='select'>@{{ s }}@{{ index+4 }}</div>   
                                <div v-else-if="s != null" class='economy'  @click="OpenPassengerModal(s+(index+4),'economy')">@{{ s }}@{{ index+4 }}</div>   
                                <div v-else-if="s === null" class='number'>@{{ index+4 }}</div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>

const app = Vue.createApp({
    data() {
        return {
            businessClassSeats: [
                ['K', 'H', null, 'C', 'A'],
                ['K', 'H', null, 'C', 'A'],
            ],
            economyClassSeats: [
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
                ['K', 'J', 'H', null, 'C', 'B', 'A'],
            ],
            seat:'',
            years:[],
            months: [],
            days:[],
            select_year:'',
            select_month:'',
            select_day:'',
            select_seat:[],
            first_name:'',
            last_name:'',
            gender:'',
            email:'',
            phone:'',
            flight:'',
            ticket_number:''

        };
    },
    created() {
        this.flight={{$id}};
        for (let i = new Date().getFullYear()-11; i >= new Date().getFullYear()-100; i--) {
            this.years.push(i);
        }
        for (let i =1; i <=12; i++) {
            this.months.push(i);
        }
        console.log(new Date().getFullYear()-11);
        this.select_year=new Date().getFullYear()-11;
        this.select_month=1;
        for (let i =1; i <=new Date(this.select_year, this.select_month, 0).getDate(); i++) {
            this.days.push(i);
        }
        this.select_day=1;
        this.getFlightSeat();
    },
    
    methods: {
        toggleSeatSelection(seat) {
            seat.selected = !seat.selected;
        },
        OpenPassengerModal(seat,accommodation){
            let _this=this;
            _this.seat=seat;
            $('#PassengerModal').modal('show')
        },
        ReSetDays(){
            this.days=[];
            
            for (let i =1; i <=new Date(this.select_year, this.select_month, 0).getDate(); i++) {
                this.days.push(i);
            }
            if(this.select_day>new Date(this.select_year, this.select_month, 0).getDate()){
                this.select_day=1;
            }
        },
        CheckSelectAble(seat){
            if (this.select_seat.includes(seat)) {
                return true;
            } else {
               return false;
            }
        },
        Booking(){
          let _this=this;
          console.log('hint');
          if(_this.list!=""){
            $.ajax({
                type: 'post',
                url: window.location.origin +'/api/booking', 
                data: {
                    flight:_this.flight,
                    first_name:_this.first_name,
                    last_name:_this.last_name,
                    date_of_birth:_this.select_year+"-"+String(_this.select_month).padStart(2, '0')+"-"+String(_this.select_day).padStart(2, '0'),
                    gender:_this.gender,
                    email:_this.email,
                    phone:_this.phone,
                    seat_number:_this.seat
                },
                success(data) {
                    console.log(data);
                    _this.ticket_number=data;
                    $('#PassengerModal').modal('hide');
                    $('#TicketModal').modal('show')
                    _this.getFlightSeat();

                },
                error(xhr, status, error) {
                    
                    alert("Error occurred: " + xhr.responseJSON.error || "An error occurred.");
                }
            })
            
          }
          
        },
        getFlightSeat(){
            let _this=this;
            $.ajax({
                type: 'get',
                url: window.location.origin +'/api/flight_seat',  
                data: {
                    flight_id:_this.flight
                },
                success(data) {
                     datas = JSON.parse(data);
               
                     datas.forEach(item => {
                        if (item.seat_number) {
                            _this.select_seat.push(item.seat_number);
                        }
                    });
                  
                },
                
            })
        }
    }
}).mount('#app')
</script>