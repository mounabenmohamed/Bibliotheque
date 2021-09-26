<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){
        $livres= livre::all();
    return response()->json([ 'livres'=>$livres]);
    
} 
}
