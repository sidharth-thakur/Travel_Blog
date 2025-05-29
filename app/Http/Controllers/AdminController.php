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
        try {
            // Get count of users for the dashboard
            $userCount = User::count();
            
            return view('admin.dashboard', compact('userCount'));
        } catch (\Exception $e) {
            // Log the error and return a friendly message
            \Log::error('Admin dashboard error: ' . $e->getMessage());
            return view('errors.custom', [
                'message' => 'There was an error loading the admin dashboard.',
                'details' => $e->getMessage()
            ]);
        }
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
        try {
            // Get all users, ordered by most recent first
            $users = User::latest()->get();
            
            // Pass users to the view
            return view('admin.users', compact('users'));
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error fetching users: ' . $e->getMessage());
            
            // Return with error message
            return back()->with('error', 'There was an error loading the users: ' . $e->getMessage());
        }
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

