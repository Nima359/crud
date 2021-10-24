<?php
/** @noinspection ALL */

namespace Nima\Crud\App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nima\Crud\classes\CastsJson;


/**
 * @method belongsTo(string $class)
 */
class Comments extends Model {
    use HasFactory;


//    protected $table = "comments";
//    protected $timestamp = true;
    
    protected $fillable = [
        'title' ,
        'comment' ,
        'publish'
    ];
    protected $guarded = [
        'post_id' ,
        'user_id' ,
        'user_email'
    ];
    
    protected $casts = [
        'options' => CastsJson::class ,
    ];
    
    
    
    public function post () {
        return $this->belongsTo (Post::class);
    }
    
    public function user () {
        return $this->belongsTo (User::class);
    }
    
    
    protected function serializeDate (DateTimeInterface $date) {
        return $date->format ("Y-m-d H:i:s");
    }
    
}
