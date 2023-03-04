<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public $table = "products";

    protected $fillable = [
        'id', 'name', 'slug', 'description', 'image', 'price', 'weight'
    ];

    //Accessor
    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Aktif</span>';
    }

    //MUTATORS
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    

    public function donation(){
        return $this->hasMany(Donation::class);
 }
}
