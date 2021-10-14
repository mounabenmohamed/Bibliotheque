<?php

namespace App\Http\Controllers\api;
use App\Models\LivresProposés;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivresProposésController extends Controller
{
    public function getLivresProposés() {
        return response()->json(LivresProposés::all(), 200);
        
    }


    public function getLivresProposésById($id) {
        $livresProposés = LivresProposés::find($id);
        if(is_null($livresProposés)) {
            return response()->json(['message' => 'LivresProposés Not Found'], 404);
        }
        return response()->json($livresProposés::find($id), 200);
    }

    public function addLivresProposés(Request $request) {
        $livresProposés = LivresProposés::create($request->all());
        return response($livresProposés, 201);
    }

    public function updateLivresProposés(Request $request, $id) {
        $livresProposés = LivresProposés::find($id);
        if(is_null($livresProposés)) {
            return response()->json(['message' => 'LivresProposés Not Found'], 404);
        }
        $livresProposés->update($request->all());
        return response($livresProposés, 200);
    }

    public function deleteLivresProposés(Request $request, $id) {
        $livresProposés = LivresProposés::find($id);
        if(is_null($livresProposés)) {
            return response()->json(['message' => 'LivresProposés Not Found'], 404);
        }
        $livresProposés->delete();
        return response()->json(null, 204);
    }
}
