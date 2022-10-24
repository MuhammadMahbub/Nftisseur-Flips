<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function get_list()
    {
        return $this->hasMany('\App\Models\PricingList', 'pricing_id', 'id');
    }
}
