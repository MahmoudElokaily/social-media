<?php

namespace App\Models;

use App\Events\CreateOrder;
use App\Jobs\SendMail;
use App\Mail\OrderMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'total' , 'user_id', 'created_at' , 'updated_at'];

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
