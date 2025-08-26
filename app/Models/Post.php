<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'pst_id';
    public $timestamps = false;

    // mapping kolom custom soft delete
    const DELETED_AT = 'pst_deleted_at';
    const CREATED_AT = 'pst_created_at';
    const UPDATED_AT = 'pst_updated_at';

    protected $casts = [
        'pst_date' => 'date',
    ];

    protected $fillable = [
        'pst_content',
        'pst_date',
        'pst_img_path',
        'pst_description',
        'pst_created_by',
        'pst_updated_by',
        'pst_deleted_by',
        'pst_sys_note',
        'location_lat',
        'location_lng',
        'lcn_id',  
        'pts_id', 
        'location_id',
    ];

    protected $dates = [
        'pst_created_at',
        'pst_updated_at',
        'pst_deleted_at',
        'pst_date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'pst_created_by', 'usr_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'lcn_id', 'lcn_id');
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'pts_id', 'pts_id');
    }
}
