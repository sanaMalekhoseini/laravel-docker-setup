<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    public function index()
    {
        Gate::authorize('team.viewAny');
    }
}
