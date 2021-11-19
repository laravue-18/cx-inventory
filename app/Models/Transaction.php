<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query
                ->where('id', 'like', (int)ltrim($search, "T"));
        });
    }

    public function customer(){
        return $this->belongsTo('App\Models\User', 'customer_id');
    }
}
