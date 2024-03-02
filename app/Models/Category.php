<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Category extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $guarded = [];
    public function horoscopes(){
        return $this->hasMany(Horoscope::class);
    }
}
