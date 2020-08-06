<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'demo';
    protected $fillable = ['img', 'content','static'];
    
}
