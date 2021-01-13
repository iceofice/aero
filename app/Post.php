<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','cid','image','author'];

    public function getCidAttribute($cid){
        $category= Category::where('cid',$cid)->first();
        return $category->category;
    }
}

function category(){
    return $this->hasOne('\App\Category','id','cid');
}
