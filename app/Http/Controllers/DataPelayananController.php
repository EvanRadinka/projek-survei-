<?php

namespace App\Http\Controllers;

use App\Models\SatisfactionSurvey;
use Illuminate\Http\Request;

class DataPelayananController extends Controller
{
    public function index()
    {
        $surveys = SatisfactionSurvey::orderBy('created_at', 'desc')->paginate(20);

        return view('data-pelayanan', compact('surveys'));
    }
}
