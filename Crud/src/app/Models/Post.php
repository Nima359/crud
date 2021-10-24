<?php
/** @noinspection All */

namespace Nima\Crud\App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model {
    use HasFactory;


//    protected $table = "posts";
//    protected $timestamp = true;
    
    
    protected $guarded = [
        "user_id" ,
    ];
    
    protected $fillable = [
        'post_id' ,
        'title' ,
        'content' ,
        'publish' ,
    ];
    
    
    protected $hidden = [
    ];
    
    
    protected $casts = [
        'email_verified_at' => 'datetime' ,
    ];
    
    
    public function user () {
        return $this->belongsTo (User::class);
    }
    
    public function comments () {
        return $this->hasMany (Comments::class);
    }
    
    
    protected function serializeDate (DateTimeInterface $date) {
        return $date->format ("Y-m-d H:i:s");
    }
    
}


