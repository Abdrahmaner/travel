<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use Response;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminsProfil.admins');
    }
    public function showAdmins()
    {
         $admins =User::orderBy('created_at', 'desc')->paginate(5);
        
        return Response::JSON(array('admins'=>$admins,'links' => (string) $admins->links('pagination::bootstrap-5')));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modifierAdmin(Request $request, $id)
    {
        $admins = User::find($id);
        if($request->password)
        {
        $admins['nom'] = $request->nom;
        $admins['tel'] = $request->tel;
        $admins['email'] = $request->email;
        $admins['ville'] = $request->ville;
        $admins['password'] = Hash::make($request->password);
        $admins['role'] = $request->role;
        $admins->update();
        }else{
            
        $admins['nom'] = $request->nom;
        $admins['tel'] = $request->tel;
        $admins['email'] = $request->email;
        $admins['ville'] = $request->ville;
        $admins['role'] = $request->role;
        $admins->update();
        }
        return response()->json($admins);
    }
    public function AddAdmin(Request $request)
    {
              
            $new_admin = new CreateNewUser();
            $admin = $new_admin->create($request->all());
           
            return response([
                'message' => 'successfully registration',
            ], 200);
            
    }
    public function deleteAdmin($id)
    {
        $admin = User::find($id);
        if($admin)
        {
        $admin->delete(); 
        } else{
            return response()->json(['message'=>'error']);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        $admin = User::find($id);

        return response()->json($admin);
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
    public function destroy($id)
    {
        //
    }
}
