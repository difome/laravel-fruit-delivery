<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Page extends Model {

    protected $fillable = [
        'name',
        'slug',
        'content',
        'parent_id',
    ];


    public function children() {
        return $this->hasMany(Page::class, 'parent_id');
    }


    public function parent() {
        return $this->belongsTo(Page::class);
    }
}
