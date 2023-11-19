<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = "estudiante";
    protected $primaryKey = 'estu_codi';
    public $timestamps = false;
}
