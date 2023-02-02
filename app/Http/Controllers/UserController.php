<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\EditUserRequest;
use App\Http\Requests\Users\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'author' || Auth::user()->roles == 'Author') {
            return redirect('/dashboard');
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->roles == 'author' || Auth::user()->roles == 'Author') {
            return redirect('/dashboard');
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->getUser());

        return redirect()->route('users.index')->with('success', 'User added successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->roles == 'author' || Auth::user()->roles == 'Author') {
            return redirect('/dashboard');
        }

        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->roles == 'author' || Auth::user()->roles == 'Author') {
            return redirect('/dashboard');
        }

        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {

        $user->update($request->getEditedUser());

        return redirect()->route('users.index')->with('info', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        if ($user) {
            $output['success'] = true;
            $output['message'] = "User deleted successfully";
            $output['code'] = 200;
        } else {
            $output['error'] = true;
            $output['message'] = "User deleted failed";
            $output['code'] = 200;
        }

        return response()->json($output, $output['code']);
    }
}
