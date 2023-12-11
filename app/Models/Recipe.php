<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'preparationTime',
        'cookingTime',
        'serves',
    ];
    public $timestamps = false;

    public function ingredients() : BelongsToMany {
        return $this->belongsToMany(Ingredient::class);
    }
}
