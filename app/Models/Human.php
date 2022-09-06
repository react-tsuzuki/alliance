<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    use HasFactory;
    //顧客詳細情報
    // public function detail()
    // {
    //     return $this->hasOne('App\Models\HumanDetail');
    // }

    // スタッフ情報
    public function staff() {
        return $this->belongsTo('App\Models\Staff');
    }
}
