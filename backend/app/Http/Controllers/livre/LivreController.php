<?php

namespace App\Http\Controllers\livre;
use App\Http\Controllers\Controller;
use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function create(){
        return view('livre.create');
} 
    public function index(){
        $livres= livre::all();
    return view('livre.index',compact('livres'));
} 
public function register(Request $request)
  {
      $livre = new livre();
      $livre->reference = $request->reference;
      $livre->name = $request->name;
      $livre->auteur = $request->auteur;
      
      $livre->save();
      return redirect()->route('livre.store');
}

public function edit( $id)
    {   $livre= livre::find($id);
        return view('livre.edit',compact('livre'));
    }
    public function update(Request $request, $id)
    {  $livre= livre::find($id);
          $request->validate([
            'reference' => 'required',
            'name' => 'required',
            'auteur' => 'required',
        ]);
  
        $livre->update($request->all());
  
        return redirect()->route('livre.index');
     }

    public function delete($id )
    {  $livre= livre::find($id);
        $livre->delete();
  
        return redirect()->route('livre.index');
                        
    }

}
