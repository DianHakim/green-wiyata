{{-- resources/views/plants/index.blade.php --}}
<x-layouts.main title="Dashboard Plants">
    <h1 class="mt-4">Dashboard Plants</h1>

    <div class="app-content">
        <div class="container-fluid">

            {{-- Alert jika berhasil --}}
            @if(session('success'))
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div id="success-alert" class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    let alertBox = document.getElementById('success-alert');
                    if (alertBox) {
                        alertBox.style.transition = "opacity 0.5s";
                        alertBox.style.opacity = 0;
                        setTimeout(() => alertBox.remove(), 500);
                    }
                }, 3000); // auto hilang 3 detik
            </script>
            @endif


            <div class="card mb-4 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Plant List</h3>

                    <div>
                        <a href="{{ route('plants.create') }}" class="btn btn-primary btn-sm">
                            + Add Plant
                        </a>
                        <button class="btn btn-success btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#manageTypePlantModal">
                            + Manage Type Plants
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Stock</th>
                                <th style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plants as $index => $plant)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $plant->pts_name }}</td>
                                <td>{{ $plant->location->lcn_name ?? '-' }}</td>
                                <td>{{ $plant->typeplant->tps_type ?? '-' }}</td>
                                <td>{{ $plant->pts_stok }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Option
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('plants.show', $plant->pts_id) }}">Detail</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('plants.edit', $plant->pts_id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('plants.destroy', $plant->pts_id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus plant ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data plant</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Manage Type Plant -->
<div class="modal fade" id="manageTypePlantModal" tabindex="-1" aria-labelledby="manageTypePlantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="manageTypePlantModalLabel">Manage Type Plants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- Form Add Type Plant --}}
                <div class="d-flex justify-content-center mb-3">
                    <form action="{{ route('typeplants.store') }}" method="POST" class="d-flex w-75">
                        @csrf
                        <input type="text" name="tps_type" class="form-control me-2" placeholder="New Type Plant" required>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

                {{-- List Type Plants --}}
                <div class="d-flex justify-content-center">
                    <div class="table-responsive w-75">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:50px;">#</th>
                                    <th>Type Name</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($typeplants as $index => $type)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $type->tps_type }}</td>
                                        <td>
                                            <form action="{{ route('typeplants.destroy', $type->tps_id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus tipe ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Belum ada type plant</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</x-layouts.main>