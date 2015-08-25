<?php namespace Potto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // set defaults
    protected $attributes = [
        'is_spoiler'  => 0,
        'upload_id'   => 0,
        'tripcode'    => '',
    ];

    protected $dates = ['deleted_at'];
    protected $table = 'posts';
    protected $guarded = ['id'];
    protected $touches = ['thread'];

    // protected $hidden = '';
    // protected $fillable = '';


    public function thread()
    {
        return $this->belongsTo('Potto\Thread');
    }

    public function upload()
    {
        // Model | parent_id | current
        return $this->hasOne('Potto\Upload', 'id', 'upload_id');
    }
}
