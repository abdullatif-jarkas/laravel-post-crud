<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('manageUsers', User::class);

        $users = User::whereNot('id', auth()->id())->get();
        return view('admin.users.index', compact('users'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('manageUsers', User::class);

        $user->delete();
        return redirect()->route('admin.users.index')->with("success", 'Post Deleted Successfully');
    }
}
