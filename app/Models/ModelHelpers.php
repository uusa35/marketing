<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 3/19/17
 * Time: 5:33 PM
 */
trait ModelHelpers
{
    public function scopeActive($q) {
        return $q->where('active', true);
    }
}