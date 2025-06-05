<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Ship;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentCargos = Cargo::with('ship')->latest()->take(5)->get();
        $recentShips = Ship::latest()->take(5)->get();
        $totalCargoWeight = Cargo::sum('weight');
        $mostLoadedShip = Ship::withCount('cargos')->orderByDesc('cargos_count')->first();

        return view('dashboard', [
            'recentCargos' => $recentCargos,
            'recentShips' => $recentShips,
            'totalCargoWeight' => $totalCargoWeight,
            'mostLoadedShip' => $mostLoadedShip,
        ]);
    }
}
