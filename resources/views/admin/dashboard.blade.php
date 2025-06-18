@extends('layouts.admin')

@section('content')
    <div class="flex min-h-screen">
        <!-- Bagian Kiri (Kuning - Grafik) -->
        <div class="w-2/3 bg-white p-5">
            <div class="mb-10">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="font-bold">Grafik Pengaduan Infrastruktur :</h3>
                    <button onclick="downloadChart('pengaduanChart', 'grafik_pengaduan')"
                        class="bg-blue-600 text-white px-3 py-1 text-sm rounded hover:bg-blue-700">
                        Download
                    </button>
                </div>
                <div class="bg-white h-64 rounded shadow-xl flex items-center justify-center text-gray-500">
                    <canvas id="pengaduanChart"></canvas>
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <h3 class="font-bold">Grafik Saran Pembangunan :</h3>
                    <button onclick="downloadChart('saranChart', 'grafik_saran')"
                        class="bg-blue-600 text-white px-3 py-1 text-sm rounded hover:bg-blue-700">
                        Download
                    </button>
                </div>
                <div class="bg-white h-64 rounded shadow-xl flex items-center justify-center text-gray-500">
                    <canvas id="saranChart"></canvas>
                </div>
            </div>

        </div>

        <!-- Bagian Kanan (Putih - Fitur Admin) -->
        <div class="w-1/3 bg-white p-8 space-y-6">
            <!-- Kartu: Data Pengaduan -->
            <a href="{{ route('admin.pengaduan.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-aduan.png') }}" alt="Pengaduan" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Pengaduan Masyarakat</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>

            <!-- Kartu: Data Saran -->
            <a href="{{ route('admin.saran.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-saran.png') }}" alt="Saran" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Saran Pembangunan</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>

            <!-- Kartu: Data Pengguna -->
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-user.png') }}" alt="User" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Pengguna Website</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const pengaduanData = {
            labels: {!! json_encode($pengaduan->keys()) !!},
            datasets: [{
                label: 'Jumlah Pengaduan',
                data: {!! json_encode($pengaduan->values()) !!},
                backgroundColor: ['#3B82F6', '#F59E0B', '#10B981', '#EF4444', '#6366F1', '#F472B6']
            }]
        };

        const saranData = {
            labels: {!! json_encode($saran->keys()) !!},
            datasets: [{
                label: 'Jumlah Saran',
                data: {!! json_encode($saran->values()) !!},
                backgroundColor: ['#FBBF24', '#34D399', '#60A5FA', '#F87171', '#C084FC', '#A3E635']
            }]
        };

        new Chart(document.getElementById('pengaduanChart'), {
            type: 'bar',
            data: pengaduanData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        new Chart(document.getElementById('saranChart'), {
            type: 'bar',
            data: saranData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        function downloadChart(chartId, filename) {
            const canvas = document.getElementById(chartId);
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = filename + '.png';
            link.click();
        }
    </script>
@endsection
