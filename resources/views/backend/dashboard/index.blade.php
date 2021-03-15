@extends('backend.template')

@section('content')
<div class="row">
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="font-weight-bold mb-3"><i class="fas fa-clock"></i> Today</h4>
                    <table class="table mt-5 table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>:</th>
                                <td>{{ date('d M y') }}</td>
                            </tr>
                            <tr>
                                <th>Pukul</th>
                                <th>:</th>
                                <td>{{ date('H : i : j') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Pasien</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Dokter</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Perawat</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Ruangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Rawat Inap</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h1 class="mb-3 font-weight-bold text-primary">21</h1>
                            <h5>Jumlah Rawat Jalan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop