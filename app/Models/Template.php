<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use ModelHelpers;
    protected $guarded = [''];

    public function qutotations()
    {
        return $this->belongsToMany(Quotation::class);
    }
}
