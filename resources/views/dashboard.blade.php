<x-app-layout>
    <!-- Chart Section -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-gray-800 text-center">
                Survei Pelayanan Dan Data Jumlah Pengunjung
            </h1>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-amber-300 rounded-xl shadow p-6 text-center h-32 flex flex-col justify-center">
                <div class="text-4xl font-bold text-black mb-2">{{ number_format($averageRating, 1) }}</div>
                <p class="text-xl font-semibold text-black">Nilai Pelayanan</p>
            </div>

            <div class="bg-amber-300 rounded-xl shadow p-6 text-center h-32 flex flex-col justify-center">
                <div class="text-4xl font-bold text-black mb-2">{{ $totalSurveys }}</div>
                <p class="text-xl font-semibold text-black">Jumlah Pelayanan</p>
            </div>

            <div class="bg-amber-300 rounded-xl shadow p-6 text-center h-32 flex flex-col justify-center">
                <div class="text-4xl font-bold text-black mb-2">15</div>
                <p class="text-xl font-semibold text-black">Jumlah Penerima Bansos</p>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-amber-300 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Grafik Penerima Bansos dan Jumlah Pelayanan</h3>
                        <div id="bansosChart" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-amber-300 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Grafik Nilai Pelayanan</h3>
                        <div id="pelayananChart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawBansosChart);
        google.charts.setOnLoadCallback(drawPelayananChart);

        function drawBansosChart() {
            var data = google.visualization.arrayToDataTable(@json($bansosData));

            var options = {
                title: 'Penerima Bansos dan Jumlah Pelayanan',
                hAxis: {title: 'Bulan',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('bansosChart'));
            chart.draw(data, options);
        }

        function drawPelayananChart() {
            var data = google.visualization.arrayToDataTable(@json($pelayananData));

            var options = {
                title: 'Nilai Pelayanan'
            };

            var chart = new google.visualization.PieChart(document.getElementById('pelayananChart'));
            chart.draw(data, options);
        }
    </script>
</x-app-layout>
