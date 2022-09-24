<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content' ,'post_id' ,'user_id' , 'created_at' , 'updated_at' , 'image'];
    protected $hidden = ['post_id' ,'user_id' , 'created_at' , 'updated_at'];

    public function post(){
        return $this->belongsTo('App\Models\Post' , 'post_id' , 'id');
    }
}
