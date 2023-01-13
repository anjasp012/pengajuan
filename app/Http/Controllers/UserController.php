<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Projek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'User';
        $dropdown = 'Semua User';
        $user = User::where('id_jabatan', '!=', 1)->get();
        $projek = Projek::all();
        return view('page.user.index', compact('actived', 'user', 'dropdown', 'projek'));
    }
    public function generalManager()
    {
        $actived = 'User';
        $dropdown = 'General Manager';
        $user = User::where('id_jabatan', 2)->get();
        $projek = Projek::all();
        return view('page.user.index', compact('actived', 'user', 'dropdown', 'projek'));
    }
    public function manager()
    {
        $actived = 'User';
        $dropdown = 'Manager';
        $user = User::where('id_jabatan', 3)->get();
        $projek = Projek::all();
        return view('page.user.index', compact('actived', 'user', 'dropdown', 'projek'));
    }
    public function sales()
    {
        $actived = 'User';
        $dropdown = 'Sales';
        $user = User::where('id_jabatan', 4)->get();
        $projek = Projek::all();
        return view('page.user.index', compact('actived', 'user', 'dropdown', 'projek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actived = 'Tamnbah User';
        $jabatan = Jabatan::where('id_jabatan', '!=', 1)->get();
        return view('page.user.create', compact('jabatan', 'actived'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputVal = $request->validate([
            'user_name' => ['required'],
            'id_jabatan' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required']
        ]);

        $inputVal['password'] = Hash::make($request->password);

        $created = User::create($inputVal);

        if ($created) {
            return redirect()->route('user.index')->with('success', 'Data Berhasil Ditambah !');
        } else {
            return redirect(route('user.index'))->with('error', 'Data Gagal Ditambah !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $actived = 'Detail User';
        return view('page.user.show', compact('user', 'actived'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $actived = 'Edit User';
        $jabatan = Jabatan::where('id_jabatan', '!=', 1)->get();
        return view('page.user.edit', compact('user', 'jabatan', 'actived'));
    }

    public function editPassword(User $user)
    {
        $actived = 'Edit Password User';
        return view('page.user.changePw', compact('user', 'actived'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputVal = $request->validate([
            'user_name' => ['required'],
            'email' => ['required'],
        ]);
        try {
            $user->update($inputVal);
            return redirect(route('user.index'));
        } catch (\Throwable $th) {
            return redirect(route('user.index'));
        }
    }
    public function updatePassword(Request $request, User $user)
    {
        $inputVal = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $inputVal['password'] = Hash::make($request->password);

        try {
            $user->update($inputVal);
            return redirect(route('user.index'));
        } catch (\Throwable $th) {
            return redirect(route('user.index'));
        }
    }

    public function updateUserProjek(Request $request, User $user)
    {
        $inputVal = $request->validate([
            'id_projek' => 'sometimes'
        ]);
        try {
            $user->update($inputVal);
            return redirect()->back();
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
