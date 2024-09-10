<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('header')
    <link rel="stylesheet" href="{{ asset('css/A321neo.css') }}">
    <title>Document</title>
</head>
<body>
    <div id='app'>
        <div class="seat-map">
            <div class="info">
                <p>商務艙 座位數：8 個 椅距：63 吋</p> <p>經濟艙 座位數：180 個 椅距：30 ~ 31 吋</p>
               
            </div>
            <div class="cabin">
            <!-- 商務艙 -->
                <!-- 經濟艙 -->
                <div class="seat-section">
                    <div v-for="(seat, index) in businessClassSeats" :key="index" class="seat">
                        <div class="seat-row">
                            <div v-for="s in seat" :key="s" class="seat-block">
                                <div v-if="s != null" class='business' @click="OpenPassengerDialog(s,index+2)">@{{ s }}@{{ index+2 }}</div>   
                                <div v-if="s === null" class='number'>@{{ index+2 }}</div>   
                            </div>
                        </div>
                    </div>
                    <div v-for="(seat, index) in economyClassSeats" :key="index" class="seat">
                        <div class="seat-row">
                            <div v-for="s in seat" :key="s" class="seat-block">
                                <div v-if="s != null" class='economy'>@{{ s }}@{{ index+4 }}</div>   
                                <div v-if="s === null" class='number'>@{{ index+4 }}</div>   
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
        };
    },
    methods: {
        toggleSeatSelection(seat) {
            seat.selected = !seat.selected;
        },
        OpenPassengerDialog(row,col){
            console.log(row+col);
        }
    }
}).mount('#app')
</script>