<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';
    protected $primaryKey = 'lcn_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // kasih tau Laravel kolom soft delete yg dipake
    const DELETED_AT = 'lcn_deleted_at';
    const CREATED_AT = 'lcn_created_at';
    const UPDATED_AT = 'lcn_updated_at';

    protected $fillable = [
        'lcn_name',
        'lcn_block',
        'lcn_img_path',
        'lcn_created_by',
        'lcn_updated_by',
        'lcn_deleted_by',
        'lcn_sys_note'
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class, 'location_id', 'lcn_id');
    }
}
