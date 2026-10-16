<?php

namespace App\Http\Controllers;

use App\Models\Sortie;
use Carbon\Carbon;

class RetardController extends Controller
{
    public function index()
    {
        $retards = Sortie::with('entree.document', 'entree.user')
            ->whereNull('date_retour_reel')
            ->whereNotNull('date_retour_prevue')
            ->where('date_retour_prevue', '<', Carbon::today())
            ->get();

        return view('retards.index', compact('retards'));
    }
}
