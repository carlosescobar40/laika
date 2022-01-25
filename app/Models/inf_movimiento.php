<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inf_movimiento extends Model
{
    use HasFactory;
    protected $fillable =[
        'comentario',
        'product_id',
        
        'user_id',
        
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
