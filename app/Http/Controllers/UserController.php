<?php

namespace App\Http\Controllers;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role !== UserRoles::ADMIN->name) {
            abort(403);
        }

        $users = User::paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (Auth::user()->role !== UserRoles::ADMIN->name) {
            abort(403);
        }

        return view('users.show', ['user' => $user]);
    }
}
