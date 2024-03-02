<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $guarded = [];
    public function horoscope(){
        return $this->belongsTo(Horoscope::class);
    }
}
