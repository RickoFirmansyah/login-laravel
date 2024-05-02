<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfPlace extends Model
{
    use HasFactory;
    
    protected $table = 'type_of_places';
    protected $guards = [];
    protected $fillable=['type_of_place'];


    public function slaughtering_place()
    {
        return $this->hasMany(SlaughteringPlace::class, 'type_of_place_id', 'id');
    }
}
