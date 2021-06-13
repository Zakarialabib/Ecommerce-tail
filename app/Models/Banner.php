<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','featured_title', 'button','button_link','color','description','photo','status'];
}
