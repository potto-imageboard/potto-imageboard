<?php namespace Potto;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // this table doesn't have timestamps (yet?)
    public $timestamps = false;

    protected $table = 'boards';

    protected $guarded = ['id'];
    // protected $hidden = '';
    // protected $fillable = '';

    public function sections()
    {
        return $this->belongsTo('Section', 'section_id');
    }

    public function threads()
    {
        return $this->hasMany('Thread', 'board_id');
    }
}
