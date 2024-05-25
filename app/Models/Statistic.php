<?php

namespace App\Models;

use App\Http\Controllers\StatisticController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statistic extends Model
{
    use HasFactory;

    protected $table = 'statistics';

    public $timestamps = false;

    protected $fillable = [
        'date',
        'product_id',
    ];

    public function products(): HasMany
    {
        return $this->hasMany('products', 'product_id', 'id');
    }
}
