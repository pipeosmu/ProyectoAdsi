<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UserRequest;
use App\User;

use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index')->with('users', $users);
    }
    

    public function myAccount()
    {
        return view('users.account');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->identification_user = $request->identification_user;
        $user->first_name = $request->first_name;
        $user->second_name = $request->second_name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->civil_status = $request->civil_status;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);

        $user->save(); 
            
        return $user->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show')->with('user', $user);
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
        $user = User::find($id);
        if ($user->delete()) {
            return redirect('users')->with('message', 'El Usuario '.$user->first_name.' fue eliminado con éxito!');
        }
    }

    public function updatePhoto(Request $request)
    {
        $user = User::find(Auth::user()->id);
       
        if($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = "imgs/".$file;
        }

        if($user->save()) {
            return redirect('account')->with('message', 'La foto de perfil fué modificada con éxito');
        }
    }

    public function desactivar($id)
    {
        //$user = User::find($id)

        $user = DB::table('users')
                    ->where('id', $id)
                    ->update(['status' => 0]);

        
        return redirect('users')->with('message', 'El usuario fué desactivado con éxito!');
    } 
}
