<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use ModelHelpers;
    protected $guarded = [''];
    protected $with = ['templates'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function templates() {
        return $this->belongsToMany(Template::class);
    }
}
