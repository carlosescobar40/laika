<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombrePro',
        'rack',
        'modulo',
        'nivel',
    ];
    public $timestamps = false;
    public function inf_movimiento()
    {
        return $this->hasMany(inf_movimiento::class);
    }
}
