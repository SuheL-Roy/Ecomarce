<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('status',1)->with('role_information')->get();
       // return  $data;
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        $user_role = UserRole::orderby('serial', 'ASC')->get();
        //return $user_roles;
        return view('admin.user.create', compact('user_role'));
    }
    public function view($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('admin.user.view', compact('user'));
    }


    public function edit($id)
    {
        $user_roles = UserRole::orderby('serial', 'ASC')->get();
        $user = User::find($id);
        return view('admin.user.edit', compact('user_roles', 'user'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'image' => ['required', 'image'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->creator = Auth::user()->id;
        $user->save();

        $user->slug = $user->id . uniqid(10);
        $user->save();

        if ($request->hasFile('image')) {
            $user->photo = Storage::put('uploads/user', $request->file('image'));
            $user->save();
        }

        return redirect()->route('admin_user_view', $user->id);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);

        $user = User::find($request->id);

        if ($user->email != $request->email) {
            $this->validate($request, [
                'email' => ['required', 'unique:users'],
            ]);
            $user->email = $request->email;
        }

        if ($user->username != $request->username) {
            $this->validate($request, [
                'username' => ['required', 'unique:users'],
            ]);
            $user->username = $request->username;
        }
        if ($user->phone != $request->phone) {
            $this->validate($request, [
                'phone' => ['required', 'unique:users'],
            ]);
            $user->phone = $request->phone;
        }

        if (!is_null($request->old_password) && !is_null($request->password) && !is_null($request->password_confirmation)) {
            // dd($request->all());
            $this->validate($request, [
                'password' => ['string', 'min:8', 'confirmed'],
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);

            } else {
                return redirect()->back()->with('old_password', 'old password wrong');
            }
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role_id;
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->creator = Auth::user()->id;
        $user->save();

        if ($request->hasFile('image')) {
            if (!file_exists(public_path() . '/' . $user->photo)) {
                unlink(public_path() . '/' . $user->photo);
            }
            $user->photo = Storage::put('uploads/user', $request->file('image'));
            $user->save();
        }

        // dd($request->all());
        //function_body
        // return redirect()->route('admin_user_view',$user->id);
        return redirect()->back()->with('success', 'data updated');
        //  return $user;
        // return view('admin.user.index');
    }
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 0;
       // $user->creator = Auth::user()->id;
        $user->save();
        return redirect()->back()->with('success','data deactivated');
        //return view('admin.user.index');
    }
}
