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
        
        // Estatísticas gerais do usuário
        $userProducts = Product::where('user_id', $user->id);
        $totalProducts = $userProducts->count();
        $totalViews = rand(500, 2000); // Simula visualizações
        $totalRevenue = $userProducts->sum('price') * rand(10, 50); // Simula vendas
        $totalStudents = rand(100, 1000);
        
        // Produtos recentes do usuário
        $recentProducts = $userProducts->latest()->take(3)->get();
        
        // Produtos populares da plataforma
        $popularProducts = Product::with('user')
            ->inRandomOrder()
            ->take(4)
            ->get();
        
        // Dados simplificados para o dashboard
        
        return view('dashboard', compact(
            'user',
            'totalProducts',
            'totalViews', 
            'totalRevenue',
            'totalStudents',
            'recentProducts',
            'popularProducts'
        ));
    }
}
