public function index()
{
    $user = Auth::user();
    
    return view('dashboard', [
        'userName' => $user ? $user->name : 'Guest',
        // Other data...
    ]);
}
