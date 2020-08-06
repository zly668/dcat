<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'work';
    public $timestamps = false;
    protected $fillable = ['cyid', 'appname','username','url','author','goodsname'];

}
