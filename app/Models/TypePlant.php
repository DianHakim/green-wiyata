<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePlant extends Model
{
    use SoftDeletes;

    protected $table = 'typeplants';
    protected $primaryKey = 'tps_id';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';

    const CREATED_AT = 'tps_created_at';
    const UPDATED_AT = 'tps_updated_at';
    const DELETED_AT = 'tps_deleted_at';

    protected $fillable = [
        'tps_type',
        'tps_created_by',
        'tps_updated_by',
        'tps_deleted_by',
        'tps_sys_note'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'tps_id', 'tps_id');
    }

    public function typePlantThroughPlant()
{
    return $this->hasOneThrough(
        TypePlant::class,
        Plant::class,
        'pts_id',
        'tps_id',
        'pts_id',
        'tps_id'  
    );
}

}
