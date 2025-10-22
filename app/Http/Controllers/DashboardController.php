<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        $userProducts = Product::where('user_id', $user->id);
        $totalProducts = $userProducts->count();
        
        $totalRevenue = $userProducts->sum('price');
        
        $totalStudents = $userProducts->count() > 0 ? $userProducts->count() * 10 : 0;  
        
        $recentProducts = $userProducts->latest()->take(3)->get();
        
        $popularProducts = Product::with('user')
            ->latest()
            ->take(4)
            ->get();
        
        return view('dashboard', compact(
            'user',
            'totalProducts',
            'totalRevenue',
            'totalStudents',
            'recentProducts',
            'popularProducts'
        ));
    }
}
