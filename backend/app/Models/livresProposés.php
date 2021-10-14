<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livresProposés extends Model
{

        public $timestamps = false;
        protected $fillable = ['nom_livre', 'nom_auteur'];
    
}
