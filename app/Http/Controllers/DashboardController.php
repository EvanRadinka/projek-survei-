<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatisfactionSurvey;
use App\Models\BansosData;

class DashboardController extends Controller
{
    public function index()
    {
        // Get survey data for charts
        $surveys = SatisfactionSurvey::all();

        // Calculate statistics
        $totalSurveys = $surveys->count();
        $todaySurveys = SatisfactionSurvey::whereDate('created_at', today())->count();
        $averageRating = $surveys->avg('nilai_Pelayanan') ?? 0;
        $totalBansosRecipients = BansosData::count();

        // Group by service type
        $serviceTypes = $surveys->groupBy('jenis_Pelayanan')->map(function ($group) {
            return $group->count();
        });

        // Group by rating
        $ratings = $surveys->groupBy('nilai_Pelayanan')->map(function ($group) {
            return $group->count();
        });

        // Prepare weekly chart data
        $weeklySurveys = SatisfactionSurvey::selectRaw('WEEK(created_at) as week, COUNT(*) as count')
            ->where('created_at', '>=', now()->subWeeks(4))
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Get weekly bansos data
        $weeklyBansos = BansosData::selectRaw('WEEK(created_at) as week, COUNT(*) as count')
            ->where('created_at', '>=', now()->subWeeks(4))
            ->groupBy('week')
            ->orderBy('week')
            ->get()
            ->keyBy('week');

        $bansosData = [['Minggu', 'Penerima Bansos', 'Jumlah Pelayanan']];
        foreach ($weeklySurveys as $data) {
            $bansosCount = $weeklyBansos->get($data->week)->count ?? 0;
            $bansosData[] = ['Minggu ' . $data->week, $bansosCount, $data->count];
        }

        $pelayananData = [
            ['Nilai Pelayanan', 'Jumlah'],
            ['Sangat Baik', $ratings->get(5, 0)],
            ['Baik', $ratings->get(4, 0)],
            ['Cukup', $ratings->get(3, 0)],
            ['Kurang', $ratings->get(2, 0)],
            ['Sangat Kurang', $ratings->get(1, 0)]
        ];

        return view('dashboard', compact('totalSurveys', 'todaySurveys', 'averageRating', 'totalBansosRecipients', 'serviceTypes', 'bansosData', 'pelayananData'));
    }
}
