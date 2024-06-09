<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfDiseases extends Model
{
    use HasFactory;
    protected $fillable = ['type_of_diseases', 'created_by', 'update_by'];
}