<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Response;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('Products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prd = Produit::orderBy('created_at', 'desc')->with('categories')->paginate(5);
       
        // handle your pagination links in AJAX
        $paginationLinks = (string) $prd->links()->render();
       return Response::JSON(array('prd'=>$prd,'links' => (string) $prd->links('pagination::bootstrap-5')));
    
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' =>'required',
            'description'=>'required',
            'prix'=>'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'categorie' => 'required|exists:categories,id',
    
           ]);
    
           $name = time().'.'.$request->file('image')->extension(); 
           $path = $request->file('image')->move('images', $name);
    
          $save = new Produit;

          $save->nom = $request->titre;
          $save->description = $request->description;
          $save->prix = $request->prix;
          $save->image = $name;
          $save->category_id = $request->categorie;
   
          $save->save();
          return response()->json($save);
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prd = Produit::with('categories')->find($id);
       
        return response()->json($prd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request, $id)
    {
        if($request->hasFile('image1'))
        {
            $prd = Produit::find($id);
            $name = time().'.'.$request->file('image1')->extension(); 
            $path = $request->file('image1')->move('images', $name);
            $prd['nom'] = $request->titre;
            $prd['category_id'] = $request->categorie;
            $prd['description'] = $request->description;
            $prd['prix'] = $request->prix;
            $prd['image'] = $name;
            $prd->update();
           
        }else{
            $prd = Produit::find($id);
            $prd['nom'] = $request->titre;
            $prd['category_id'] = $request->categorie;
            $prd['description'] = $request->description;
            $prd['prix'] = $request->prix;
            $prd->update();
        }
            
        return response()->json($prd);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = Produit::find($id);
        if($prd)
        {
            $prd->delete();
            return response(['message'=>'deleted']);
        } else{
            return response(['message'=>'error']);
        }
    }
}
