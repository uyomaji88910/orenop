<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{

    public $timestamps = false;
    
    
    //protected $fillable = ['', 'user_id']; 保留 by Ryo Nakajima 2018/07/05

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    public function confirm($id, $date)
    {
        
        $exist = $this->where([
            ['user_id', $id],
            ['created_at', $date],
            ])->exists();
        return $exist;
    }
    public function today_id($id, $date)
    {
        $user_id = $this->where([
            ['user_id', $id],
            ['created_at', $date],
            ])
            ->get()[0]->id;
        return $user_id;
    }
    
}
