<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard() {

        return view('admin.dashboard.index');
    }
}
