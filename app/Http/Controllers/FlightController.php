<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
class FlightController  extends Controller
{
   public function getSeat(Request $request){
        $booking=new Booking;
        if(isset($request->flight_id)&& !empty($request->flight_id)){
            $data=json_encode($booking->getFlightSeat($request->flight_id));
            return $data;
        }
   }
   public function getFlight(){
        $flight=new Flight;
        $data=json_encode($flight->getFlight());
        return $data;
   }
    public function addFlight(Request $request){
        $flight=new Flight;
        $flight_data=[
            'flight_number'=>'',
            'departure_airport'=>'',
            'arrival_airport'=>'',
            'departure_time'=>'',
            'arrival_time'=>'',
            'duration'=>'',
            'price'=>'',
            'status'=>'',
        ];
        if (isset($request->flight_number) && !empty($request->flight_number) &&
        isset($request->departure_airport) && !empty($request->departure_airport) &&
        isset($request->arrival_airport) && !empty($request->arrival_airport) &&
        isset($request->departure_time) && !empty($request->departure_time) &&
        isset($request->arrival_time) && !empty($request->arrival_time) &&
        isset($request->duration) && !empty($request->duration) &&
        isset($request->price) && !empty($request->price)) {

           $flight_data['flight_number']=$request->flight_number;
           $flight_data['departure_airport']=$request->departure_airport;
           $flight_data['arrival_airport']=$request->arrival_airport;
           $flight_data['departure_time']=$request->departure_time;
           $flight_data['arrival_time']=$request->arrival_time;
           $flight_data['duration']=$request->duration;
           $flight_data['status']='準時';
           $flight_data['price']=$request->price;

    
           $flight->addFlight($flight_data);
        } 
        else {
            // 返回错误消息，提示缺少字段
            return response()->json(['error' => 'All fields are required.'], 400);
        }
    }
}
