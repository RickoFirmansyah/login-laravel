<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPemantauan extends Model
{
    use HasFactory;
    protected $table = 'monitoring_officers';
    protected $guarded = ['id'];
}
