<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeData extends Model
{
    use HasFactory;




    protected $fillable = ['birthdate', 'nationality',  'gender', 'lifeexpectancy'];
}
