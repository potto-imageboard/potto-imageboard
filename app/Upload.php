<?php namespace Potto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'uploads';
    protected $guarded = ['id'];
    // protected $hidden = '';
    // protected $fillable = '';

    public function postUpload()
    {
        return $this->belongsTo('Potto\Post');
    }

    public function threadUpload()
    {
        return $this->belongsTo('Potto\Thread');
    }
}
