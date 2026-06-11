<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilApriori extends Model
{
    protected $fillable = [
        'antecedent',
        'consequent',
        'support',
        'confidence',
        'lift'
    ];
}