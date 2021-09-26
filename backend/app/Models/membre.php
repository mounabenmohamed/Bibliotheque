<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membre extends Model
{
    protected $fillable = [
        'num_telephone',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
