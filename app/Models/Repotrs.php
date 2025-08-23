<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class Repotrs extends Model
{
    /** @use HasFactory<\Database\Factories\RepotrsFactory> */
    use HasFactory, Blameable;
}
