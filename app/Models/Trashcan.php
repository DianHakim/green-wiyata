<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trashcan extends Model
{
    /** @use HasFactory<\Database\Factories\TrashcanFactory> */
    use HasFactory, Blameable;
}
