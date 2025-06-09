<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class DashboardController extends Controller
{

    public function index() {

        $usuarios = User::all()->count();

        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(', ', $ano);
        $userTotal = implode(', ', $total);

        // dd($usersData);

        $catData = Categoria::with('produtos')->get();

        foreach($catData as $cat) {
            $catNome[] = "'".$cat->name."'";
            $catTotal[] = $cat->produtos->count();
        }

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view("admin.dashboard", compact("usuarios", "userLabel", "userAno", "userTotal", "catLabel", "catTotal"));
    }
}
