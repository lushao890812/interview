<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // 添加这行
class Flight extends Model
{
    use HasFactory;
    public function getFlight(){
        $data=DB::select(" select    
                            id,
                            flight_number,
                            departure_airport,
                            arrival_airport,
                            departure_time,
                            arrival_time,
                            duration,
                            price
                        from Flights");
        return $data;
    }
    public function addFlight($data){
        if($data!=null){
            DB::insert("
            INSERT INTO flights 
            (flight_number, departure_airport, arrival_airport, departure_time, arrival_time,duration,status,price)
            VALUES (?, ?, ?, ?, ?,?,?,?)", 
            [
                $data['flight_number'], 
                $data['departure_airport'], 
                $data['arrival_airport'], 
                $data['departure_time'], 
                $data['arrival_time'],
                $data['duration'],
                $data['status'],
                $data['price']
            ]
        );
        }
    }
}
