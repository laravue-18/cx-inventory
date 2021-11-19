<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type_id', 'location_id', 'make_id', 'product_model_id', 'part_number', 'colour_id', 'storage_id', 'qty', 'price', 'note'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query
                ->where('note', 'like', $search)
                ->orWhere('id', 'like', (int)ltrim($search, "P"));
        });
    }

    public function productType(){
        return $this->belongsTo('App\Models\ProductType', 'type_id');
    }

    public function productModel(){
        return $this->belongsTo('App\Models\ProductModel');
    }

    public function make(){
        return $this->belongsTo('App\Models\Make');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location');
    }


    public function colour(){
        return $this->belongsTo('App\Models\Colour');
    }

    public function storage(){
        return $this->belongsTo('App\Models\ProductStorage', 'storage_id');
    }

    public function conditions(){
        return $this->belongsToMany('App\Models\Condition');
    }

    public function items(){
        return $this->hasMany('App\Models\Item');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction');
    }
}
