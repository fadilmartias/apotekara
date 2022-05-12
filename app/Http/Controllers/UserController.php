<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\User\TambahUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('data.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahUser $request)
    {
        $data = $request->all();
        User::create([
            'nama_user' => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'is_admin' => false
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil dibuat');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('data.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $user = User::findOrFail($id);
        // if ($data['password'] !== null) {
        //     $user->update(['password' => bcrypt($data['password'])]);
        // }
        // $user->update([
        //     'nama_user' => $data['name'],
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'no_hp' => $data['no_hp'],
        //     'is_admin' => false
        // ]);
        // return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate');

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|numeric',
        ]);

        $data = $request->all();
        $user = User::findOrFail($id);

        $user->update([
            'nama_user' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }

    public function profile()
    {
        return view('data.user.profile');
    }

    public function updateProfile(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|numeric',
        ]);

        $data = $request->all();
        // dd($data);

        Validator::make($data, [
            'email' => Rule::unique('users')->ignore(Auth::user()->id),
            'username' => Rule::unique('users')->ignore(Auth::user()->id)
        ]);

        // $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $user->update([
            'nama_user' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
        ]);

        return redirect()->back()->with('success', 'Data user berhasil diupdate');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'curr_password' => ['required', 'string', new MatchOldPassword],
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|min:8|same:new_password',
        ]);

        User::findOrFail($id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with('success', 'Data user berhasil diupdate');
    }

    public function updateAvatar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'avatar' => 'required|image|file'
        ]);
        $user = User::findOrFail($id);
        $avatar = $user->avatar;
        if ($avatar) {
            Storage::delete($avatar);
        }
        $validatedData['avatar'] = $request->file('avatar')->store('profile-images');

        $user->update($validatedData);

        return redirect()->back()->with('success', 'Avatar berhasil diperbarui');
    }

    public function cropAvatar(Request $request, $id)
    {
        $path = 'profile-images/';
        $file = $request->file('avatar');
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';

        //upload
        $file->move(public_path('storage/' . $path), $new_image_name);

        //delete old
        $user = User::findOrFail($id);
        $avatar = $user->avatar;
        if ($avatar) {
            Storage::delete($avatar);
        }
        $user->update([
            'avatar' => $path . $new_image_name
        ]);

        return response()->json(['status' => 1, 'msg' => 'Foto Profil Berhasil Diperbarui']);
    }

    public function deleteAvatar($id)
    {
        $user = User::findOrFail($id);
        $avatar = $user->avatar;
        $user->update([
            'avatar' => NULL
        ]);
        Storage::delete($avatar);

        return redirect()->back()->with('success', 'Avatar berhasil dihapus');
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('dashboard');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        $import = new UsersImport;
        $import->import($file);

        return redirect(route('user.index'))->with('success', 'Excel Berhasil Di-Upload');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
