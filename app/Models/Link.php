<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'link';
    
}
