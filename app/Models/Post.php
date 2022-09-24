<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['content' , 'user_id' , 'category_id', 'created_at' , 'updated_at' , 'image'];
    protected $hidden = ['created_at' , 'updated_at' , 'category_id' , 'user_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category' , 'category_id' , 'id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment' , 'post_id' , 'id');
    }

}
