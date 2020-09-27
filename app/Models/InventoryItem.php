<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    } 
    public function Order()
    {
        return $this->hasOne('App\Models\Order');
    } 
}
