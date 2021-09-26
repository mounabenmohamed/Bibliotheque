<?php

namespace App\Http\Controllers\membre;
use App\Http\Controllers\Controller;
use App\Models\membre;
use App\Models\User;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function index()
    {
        $membres = membre::all();
        return view('membre.index', [
            'membres' => $membres,
        ]);
    } 

    public function edit($id)
    {    $membre = membre::find($id);
         return view('membre.edit', [
            'membre' => $membre,
            
        ]);
    }
    public function update(Request $request, $id)
    {
        $membre = membre::find($id);
        $user = User::find($membre->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $membre->num_telephone = $request->num_telephone;
        $user->save();
        if ($membre->save()) {
            $category = 'success';
            $message = 'membre modifier';
        } else {
            $category = 'danger';
            $message = 'vous ne pouvez pas mettre à jour votre membre maintenant, réessayez plus tard';
        }

        return redirect()->route('membre.index')->with($category, $message);
    }
    public function delete($id)
    {
        $category = null;
        $message = null;
        $membre = membre::find($id);
        $user = User::find($membre->user_id);

        if ($user->delete()) {
            $category = 'success';
            $message = 'membre supprimer';
        } else {
            $category = 'danger';
            $message = 'vous ne pouvez pas mettre à jour votre membre maintenant, réessayez plus tard';
        }
        return redirect()->route('membre.index')->with($category, $message);
    }
}



        