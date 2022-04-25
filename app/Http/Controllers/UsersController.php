<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Junges\ACL\Http\Models\Permission;
use Junges\ACL\Http\Models\Group;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userss = User::withTrashed()->get();
        //   dd($users);
        $users = User::all();
        return view('users.index', compact('users', 'userss'));
    }
    public function role()
    {
        $users = User::all();
        
        return view('users.role', compact('users'));
    }
    public function restore($id)
    {
        
        $users = User::withTrashed()->find($id)->restore();
        
        return redirect()->back()->with('success', 'La restauration été bien effectuer');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $users = User::all();
        return view('users.add', compact('users','groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = Permission::all();
       
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->status = $request->input('status');
        
        $users->save();
        $users->assignGroup($request->group_id);
        return redirect('/')->with('success', 'Utilisateur été bien ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $groups = Group::all();
        $permissions = Permission::all();
        return view('users.show', compact('users','groups','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::withTrashed()->findOrFail($id);
        $permissions = Permission::all();
        $groups= Group::all();
        return view('users.edit', compact('users','permissions','groups'));
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
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->status = $request->input('status');
        $users->update();
        $users->assignGroup($request->group_id);
        return redirect('/users')->with('success', 'La modification été bien effectuer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->status=0;
        if ($users->save()) {
            $users->delete();
        }
       

        return redirect()->back()->with('success', 'la suppression été bien effectuer');
    }
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        $users = auth()->user();



        return response(['users' => auth()->user(), 'idd' => auth()->user()->id, 'access_token' => $accessToken]);
    }
    public function permission()
    {
        $permissions = Permission::all();
        $groups = Group::all();
        return view('users.permission', compact('permissions','groups'));
    }
    public function storepermission(Request $request)
    {
        $permissions = Permission::all();
        $permissions = $request->validate([
            'name'=> 'required|max:255',
            'permissions' => 'required',           
        ]) ;
        $groups = new Group();
        $groups->name = $request->name;
        $groups->slug = Str::slug($request->name);

        $groups->save();
        $groups->assignPermissions($request->permissions);

        return redirect()->back()->with("success","Role est bien ajouter",compact('permissions'));
    }
    public function editrole($id)
    {
        $permissions=Permission::all();
        $groups=Group::findOrFail($id);
        return view('users.editrole',compact('groups','permissions'));
    }
    public function updaterole(Request $request,$id)
    {
        $permissions = Permission::all();
        $permissions = $request->validate([
            'name'=> 'required|max:255',
            'permissions' => 'required',           
        ]) ;
        $groups = Group::find($id);
        $groups->name = $request->name;
        $groups->slug = Str::slug($request->name);

        $groups->update();
        $groups->assignPermissions($request->permissions);

        return redirect()->Route('role.index')->with("success","La modification du role est bien effectuer",compact('permissions'));
    }
    public function indexrole()
    {
        $permissions= Permission::all();
        $groups= Group::all();
        return view('users.indexrole',compact('permissions','groups'));
    }
    public function destroyrole($id)
    {
        $groups = group::find($id);
        $groups->delete();
        return redirect()->back()->with('error', 'la suppression a été effecter');
    }
    //User profile and Edit
    public function editprofile()
    {
        return view('users.profil')->with('user', auth()->user());
    }

    public function editprof()
    {
        return view('users.editprofile')->with('user', auth()->user());
    }

    public function updateprofile(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = auth()->user();

        

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->status = $request->status;
        $user->update();
        return redirect()->route('users.editprof')->with('success', 'La modification du profile est bien effectuer');
    }
}
