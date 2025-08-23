<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Blameable;

class Majors extends Model
{
    /** @use HasFactory<\Database\Factories\MajorsFactory> */
    use HasFactory, Blameable, SoftDeletes;
}
