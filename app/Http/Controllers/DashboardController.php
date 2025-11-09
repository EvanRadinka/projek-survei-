<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatisfactionSurvey;

class DashboardController extends Controller
{
    public function index()
    {
        // Get survey data for charts
        $surveys = SatisfactionSurvey::all();

        // Calculate statistics
        $totalSurveys = $surveys->count();
        $averageRating = $surveys->avg('nilai_Pelayanan') ?? 0;

        // Group by service type
        $serviceTypes = $surveys->groupBy('jenis_Pelayanan')->map(function ($group) {
            return $group->count();
        });

        // Group by rating
        $ratings = $surveys->groupBy('nilai_Pelayanan')->map(function ($group) {
            return $group->count();
        });

        // Prepare chart data
        $bansosData = [
            ['Bulan', 'Penerima Bansos', 'Jumlah Pelayanan'],
            ['Agustus', 1000, 400],
            ['September', 1170, 460],
            ['Oktober', 660, 1120],
            ['November', 1030, 540]
        ];

        $pelayananData = [
            ['Nilai Pelayanan', 'Jumlah'],
            ['Sangat Baik', $ratings->get(5, 0)],
            ['Baik', $ratings->get(4, 0)],
            ['Cukup', $ratings->get(3, 0)],
            ['Kurang', $ratings->get(2, 0)],
            ['Sangat Kurang', $ratings->get(1, 0)]
        ];

        return view('dashboard', compact('totalSurveys', 'averageRating', 'serviceTypes', 'bansosData', 'pelayananData'));
    }
}
