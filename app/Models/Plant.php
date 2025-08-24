<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use SoftDeletes;

    protected $table = 'plants';
    protected $primaryKey = 'pts_id';
    public $incrementing = true;
    protected $keyType = 'int';

    const CREATED_AT = 'pts_created_at';
    const UPDATED_AT = 'pts_updated_at';
    const DELETED_AT = 'pts_deleted_at';

    protected $fillable = [
        'pts_name',
        'pts_description',
        'pts_stok',
        'pts_date',
        'location_id',
        'tps_id',
        'pts_img_path',
        'pts_created_by',
        'pts_updated_by',
        'pts_deleted_by',
        'pts_sys_note'
    ];

    // Relasi ke Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'lcn_id');
    }

    // 🔑 Relasi ke TypePlant
    public function typePlant()
    {
        return $this->belongsTo(TypePlant::class, 'tps_id', 'tps_id');
    }
}
