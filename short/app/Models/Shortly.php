<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortly extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'code', 'forward_url'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
