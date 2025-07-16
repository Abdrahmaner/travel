<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Response;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Categorie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
      $categorie = Categorie::orderBy('created_at', 'desc')->paginate(5);
       // handle your pagination links in AJAX
       $paginationLinks = (string) $categorie->links()->render();
    //   return response()->json(['categorie'=>$categorie,'links'=>$paginationLinks]);
      return Response::JSON(array('categorie'=>$categorie,'links' => (string) $categorie->links('pagination::bootstrap-5')));
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
            'nom' =>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    
           ]);
    
        //    $name = $request->file('image')->getClientOriginalName();
           $name = time().'.'.$request->file('image')->extension(); 
    
        //    $path = $request->file('image')->store('images');
           $path = $request->file('image')->move('images', $name);
    
    
           $save = new Categorie;

           $save->nom = $request->nom;
           $save->image = $name;
           
    
           $save->save();
    
           return response([
            'message' => "Product added"
         ], 200);
         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ctg = Categorie::find($id);

        return response()->json($ctg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request,$id)
    {
        // $validatedData = $request->validate([
        //     'nom' =>'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    
        //    ]);
        if($request->hasFile('image1'))
        {
            $ctg = Categorie::find($id);
            $name = time().'.'.$request->file('image1')->extension(); 
            $path = $request->file('image1')->move('images', $name);
            $ctg['nom'] = $request->nom1;
            $ctg['image'] = $name;
            $ctg->update();
           
        }else{
            $ctg = Categorie::find($id);
            $ctg['nom'] = $request->nom1;
            $ctg->update();
        }
       
        return response()->json($ctg);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ctg = Categorie::find($id);
        if($ctg)
        {
        $ctg->delete(); 
        return response(['message'=>'deleted']);
        } else{
            return response(['message'=>'error']);
        }
    }
}
