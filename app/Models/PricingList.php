<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingList extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function get_pricing()
    {
        return $this->belongsTo(Pricing::class, 'pricing_id', 'id');
    }
}
