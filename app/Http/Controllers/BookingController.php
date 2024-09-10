<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Passenger;

class BookingController extends Controller
{
    public function getBooking(Request $request){
        $filter_condition=[
            'first_name'=>'',
            'last_name'=>'',
            'ticket_number'=>''
        ];
        if (isset($request->first_name) && !empty($request->first_name) &&
        isset($request->last_name) && !empty($request->last_name) &&
        isset($request->ticket_number) && !empty($request->ticket_number)) {
            $filter_condition['first_name']=$request->first_name;
            $filter_condition['last_name']=$request->last_name;
            $filter_condition['ticket_number']=$request->ticket_number;
            $booking=new Booking;
            $data=json_encode($booking->getBooking($filter_condition));
        }
        else {
            // 返回错误消息，提示缺少字段
            return response()->json(['error' => 'All fields are required.'], 400);
        }
       
        
        return $data;
    }
    
    public function addBooking(Request $request){
        $booking=new Booking;
        
        if (isset($request->first_name) && !empty($request->first_name) &&
            isset($request->last_name) && !empty($request->last_name) &&
            isset($request->date_of_birth) && !empty($request->date_of_birth) &&
            isset($request->gender) && !empty($request->gender) &&
            isset($request->email) && !empty($request->email) &&
            isset($request->phone) && !empty($request->phone) &&
            isset($request->seat_number) && !empty($request->seat_number)) {
          
            $passenger_id=$this->addPassenger($request);
         
        } else {
            // 返回错误消息，提示缺少字段
            return response()->json(['error' => 'All fields are required.'], 400);
        }
        $booking_data=[
            'flight_id'=>'',
            'passenger_id'=>'',
            'passenger_type'=>'',
            'seat_number'=>'',
            'booking_time'=>'',
        ];
        if (isset($passenger_id) && !empty($passenger_id) && 
        isset($request->flight) && !empty($request->flight) ){
            $booking_data['flight_id']=$request->flight;
            $booking_data['passenger_id']=$passenger_id;
            $booking_data['passenger_type']='成人';
            $booking_data['seat_number']=$request->seat_number;
            $booking_data['booking_time']=date("Y-m-d H:i:s");
            
            return $booking->addBooking($booking_data);
        }
        else{
            return response()->json(['error' => 'All fields are required.'], 400);
        }
    }
    public function addPassenger($request){
        
        $passenger=new Passenger;
       
        $passenger_data = [
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'date_of_birth' => '',
            'nationality' => '',
            'email' => '',
            'phone_number' => '',
            'frequent_flyer' => '',
        ];
       
       
        $passenger_data['first_name']=$request->first_name;
        $passenger_data['last_name']=$request->last_name;
        $passenger_data['gender']=$request->gender;
        $passenger_data['date_of_birth']=$request->date_of_birth;;
        $passenger_data['nationality']='Taiwan';
        $passenger_data['email']=$request->email;
        $passenger_data['phone_number']=$request->phone;
        $passenger_data['frequent_flyer']='test';
       
        return $passenger->addPassenger($passenger_data);
        
    }
}
