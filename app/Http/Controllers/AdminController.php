<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Get user count
        $userCount = User::count();
        
        // Get latest users
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', [
            'userCount' => $userCount,
            'latestUsers' => $latestUsers
        ]);
    }
    
    /**
     * Show the admin test page.
     */
    public function test()
    {
        return view('admin.test');
    }
    
    /**
     * Show the users management page.
     */
    public function users(Request $request)
    {
        // Initialize search variable with null or the search input
        $search = $request->input('search', null);
        
        $query = User::query();
        
        // Only filter if search is not null or empty
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $users = $query->orderBy('created_at', 'desc')->get();
        
        // Always pass search to the view, even if it's null
        return view('admin.users', [
            'users' => $users,
            'search' => $search
        ]);
    }
}




