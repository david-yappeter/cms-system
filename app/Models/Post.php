<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'body',
        'post_image',
    ];

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getPostImageAttribute($value) {
        if($value) {
            if(Str::contains($value, ["https://", "http://"])) {
                return $value;
            }
            return asset("storage/".$value);
        }
        return $value;
    }

    public function deleteImage() {
        if($this->post_image)  {
            $p = parse_url($this->post_image);
            if($p["host"] === "localhost") {
                unlink(substr($p["path"], 1));
            }
        }
    }
}
