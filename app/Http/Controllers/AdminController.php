<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get count of users for the dashboard
        $userCount = User::count();
        
        return view('admin.dashboard', compact('userCount'));
    }

    /**
     * Display the destinations management page.
     */
    public function destinations()
    {
        return view('admin.destinations');
    }

    /**
     * Display the posts management page.
     */
    public function posts()
    {
        return view('admin.posts');
    }
    
    /**
     * Display the users management page.
     */
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }
    
    /**
     * Delete a user.
     */
    public function deleteUser(User $user)
    {
        // Prevent admin from deleting themselves
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account from here.');
        }
        
        $user->delete();
        
        return back()->with('success', 'User deleted successfully.');
    }
}

