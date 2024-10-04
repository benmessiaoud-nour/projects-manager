<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description',  'user_id'
    ];
    public function user(){
        return $this->belongsTo(user::class);
    }
}
