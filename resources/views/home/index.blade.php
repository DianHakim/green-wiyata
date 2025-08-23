<x-layouts.main>
  <x-layouts.map>
<html lang="en">
<head>
</head>
<style>
  
</style>
<body>

</x-layouts.map>
  <div class="container py-4">
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Users</h6>
                        <h3 class="fw-bold">120</h3>
                    </div>
                </div>
            </div>  

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Orders</h6>
                        <h3 class="fw-bold">85</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Revenue</h6>
                        <h3 class="fw-bold">$4,500</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Tasks</h6>
                        <h3 class="fw-bold">42</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Progress / Chart Dummy --}}
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="mb-3">Project Completion</h6>
                        <div class="progress mb-2" style="height: 20px;">
                            <div class="progress-bar bg-success" style="width: 70%">70%</div>
                        </div>
                        <small class="text-muted">7 dari 10 project selesai</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="mb-3">Server Usage</h6>
                        <div class="progress mb-2" style="height: 20px;">
                            <div class="progress-bar bg-info" style="width: 55%">55%</div>
                        </div>
                        <small class="text-muted">Kapasitas penyimpanan digunakan</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Aktivitas --}}
        <div class="card shadow-sm border-0 mb-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Latest Activity</h5>
                <table class="table table-striped table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ana</td>
                            <td>Created new order</td>
                            <td>2025-08-19</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Budi</td>
                            <td>Updated profile</td>
                            <td>2025-08-18</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Citra</td>
                            <td>Completed payment</td>
                            <td>2025-08-17</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- Footer --}}
    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center">
            <small class="text-muted">&copy; 2025 GreenWiyata. All rights reserved.</small>
        </div>
    </footer>
</body>
</html>
</x-layouts.main>