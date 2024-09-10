<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // 添加这行
class Booking extends Model
{
    use HasFactory;
    public function addBooking($data)
    {
        if ($data != null) {
            // 使用 insertGetId 方法來插入數據並獲取自增 ID
            $bookingId = DB::table('booking')->insertGetId([
                'flight_id' => $data['flight_id'],
                'passenger_id' => $data['passenger_id'],
                'passenger_type' => $data['passenger_type'],
                'seat_number' => $data['seat_number'],
                'booking_time' => $data['booking_time'],
            ]);
    
            // 返回插入的自增 ID
            return $bookingId;
        }
    
        return null; // 如果 $data 是 null，返回 null
    }
    public function getFlightSeat($flight_id){
        $data=DB::select("select seat_number from booking where flight_id='".$flight_id."'");
        return $data;
    }
    public function getBooking($filter_condition)
    {
    
        $data = DB::select("
            SELECT booking.id, booking.seat_number, booking.passenger_type, Passengers.first_name, Passengers.last_name,Flights.flight_number
            FROM booking
            LEFT JOIN Passengers ON booking.passenger_id = Passengers.id
            LEFT JOIN Flights ON booking.flight_id = Flights.id
            WHERE booking.id = ?
            AND Passengers.first_name = ?
            AND Passengers.last_name = ?",
            [
                $filter_condition['ticket_number'],
                $filter_condition['first_name'],
                $filter_condition['last_name']
            ]
        );
    
        return $data;
    }
}
