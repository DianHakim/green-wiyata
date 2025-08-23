<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'plants';  // pastikan nama tabel benar
    protected $primaryKey = 'plt_id'; // jika primary key bukan 'id'

    protected $fillable = [
        'plt_name', 'plt_description', 'plt_image' // sesuaikan dengan kolom di tabel plants
    ];
}
