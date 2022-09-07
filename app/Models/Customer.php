<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class Customer extends Model
{
    use HasFactory;
    // protected $connection = 'customer';

    // config/database 'test_customer' 外部SQLに接続
    protected $connection = 'test_customer';
    // 外部DB[test_customer] table名[cm_customers] にアクセスするために$tableでtable名指定
    protected $table = 'cm_customers'; // カスタムテーブル名のセット
}
