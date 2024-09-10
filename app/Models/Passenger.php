<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // 添加这行
class Passenger extends Model
{
    use HasFactory;

    public function addPassenger($data){
        if ($data != null) {
            $maxAttempts = 5;  // 最大重试次数
            $attempt = 0;      // 当前重试次数
    
            while ($attempt < $maxAttempts) {
                try {
                    // 开启事务
                    DB::beginTransaction();
    
                    // 插入数据并获取ID
                    $id = DB::table('Passengers')->insertGetId([
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'gender' => $data['gender'],
                        'date_of_birth' => $data['date_of_birth'],
                        'nationality' => $data['nationality'],
                        'email' => $data['email'],
                        'phone_number' => $data['phone_number'],
                        'frequent_flyer' => $data['frequent_flyer']
                    ]);
    
                    // 提交事务
                    DB::commit();
    
                    return $id;
    
                } catch (\Exception $e) {
                    // 回滚事务
                    DB::rollBack();
    
                    $attempt++;  // 增加重试次数
    
                    // 如果达到最大重试次数，则抛出异常
                    if ($attempt >= $maxAttempts) {
                        throw $e;
                    }
    
                    // 可选：稍微延迟一下再重试
                    usleep(500000);  // 延迟0.5秒
                }
            }
        }
       
    }
}
