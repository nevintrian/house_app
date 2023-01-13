<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => $request->role
        ]);
        return redirect('user')->with('success', 'Berhasil tambah user!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->password != null) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'role' => $request->role
            ];
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'role' => $request->role
            ];
        }
        User::find($user->id)->update($data);
        return redirect('user')->with('success', 'Berhasil ubah user!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('user')->with('success', 'Berhasil hapus user!');
    }

    public function feedback(Request $request)
    {
        $data = Feedback::where('user_id', $request->user_id)->get();
        echo json_encode($data);
    }
}
