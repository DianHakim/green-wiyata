<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeplants extends Model
{
    /** @use HasFactory<\Database\Factories\TypeplantsFactory> */
    use HasFactory, Blameable;
}
