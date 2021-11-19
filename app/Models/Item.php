<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('serial_number', 'like', $search )
                ->orWhere('id', 'like', (int)ltrim($search, "T"));
        });
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
