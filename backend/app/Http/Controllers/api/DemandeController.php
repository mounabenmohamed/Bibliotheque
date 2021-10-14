<?php

namespace App\Http\Controllers\api;
use App\Models\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function insertDemande(Request $request) {
        $insertDemande = Demande::create($request->all());
        return response($insertDemande, 201);
    }
}
