<?php namespace Potto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    // set defaults
    protected $attributes = [
        'is_spoiler'  => 0,
        'is_pinned'   => 0,
        'is_locked'   => 0,
        'is_archived' => 0,
        'subject'     => '',
        'tripcode'    => '',
    ];
    
    protected $dates = ['deleted_at'];
    protected $table = 'threads';
    protected $guarded = ['id'];

    public $timestamps = true;



    // protected $hidden = '';
    // protected $fillable = [];

    public function posts()
    {
        return $this->hasMany('Potto\Post', 'thread_id');
    }

    public function lastPosts()
    {
        return $this->hasMany('Potto\Post', 'thread_id')->orderBy('created_at', 'desc')->limit(3);
    }

    public function upload()
    {
        // Model | parent_id | current_model_id
        return $this->hasOne('Potto\Upload', 'id', 'upload_id');
    }
}
