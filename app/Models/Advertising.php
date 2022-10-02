<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'from',
        'to',
        'total',
        'daily_budget',
        'images',
    ];
    
    // protected $dates = [
    //     'from',
    //     'to',
    // ];

    protected $casts = [
        'images' => 'json',
        'total' => 'float',
        'daily_budget' => 'float',
    ];


    // public function setDailyBudgetAttribute(){
    //     $this->attributes['daily_budget'] = round(($this->attributes['total'] / Carbon::parse($this->attributes['from'])->diffInDays($this->attributes['to'])), 2);
    // }
}
