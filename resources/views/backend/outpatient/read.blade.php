@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pasient</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. rm</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->patient->no_rm }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Place, date of birth</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->patient->city->name }}, {{ date('d F Y', strtotime($outpatient->bookingSchedule->patient->date_of_birth)) }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->patient->phone }}</td>
                        </tr>
                        <tr>
                            <th>Access</th>
                            <td width="20px">:</td>
                            <td>{{ $insurance->access }}</td>
                        </tr>
                        @if ($insurance->access == 'insurances')
                        <tr>
                            <th>Guarantee</th>
                            <td width="20px">:</td>
                            <td>{{ $insurance->guarantee->name }}</td>
                        </tr>
                        <tr>
                            <th>Guarantee card number</th>
                            <td width="20px">:</td>
                            <td>{{ $insurance->card_number }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Health checkup</h3>
                @can ('admin|doctor')
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/outpatient/{{ $outpatient->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="align-self-center">Complaints</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->complaints }}</td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->action }}</td>
                        </tr>
                        <tr>
                            <th>Medical measures</th>
                            <td width="20px">:</td>
                            @if ($outpatient->medical_measures == 'berat')
                            <td>Rawat Inap</td>
                            @else
                            <td>Rawat Jalan</td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Doctor</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>License number</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->schedule->doctor->license_number }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $outpatient->bookingSchedule->schedule->doctor->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administration details</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    @php
                    $admin = 10000;
                    $totals = 0;
                    $doctor = $outpatient->bookingSchedule->schedule->price
                    @endphp
                    @foreach ($chooseDrug as $obat)
                    @php $totals += $obat->totals @endphp
                    @endforeach
                    @php $subtotals = $admin + $doctor + $totals @endphp
                    <thead>
                        <tr>
                            <th>Docter consulting fees</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($doctor) }}</td>
                        </tr>
                        <tr>
                            <th>Administration fee</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($admin) }}</td>
                        </tr>
                        <tr>
                            <th>Cost of the drug</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($totals) }}</td>
                        </tr>
                        <tr>
                            <th>Totals</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($subtotals) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0"></td>
                        </tr>
                    </thead>
                </table>
                <a href="/backend/outpatient/pdf/{{ $outpatient->id }}" class="btn btn-primary float-right">Create invoice</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Choose drug</h3>
                @can ('admin|doctor')
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/choose/drugs/{{ $outpatient->id }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chooses as $choose)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <th>{{ $choose->drug->name }}</th>
                                <th>{{ $choose->qty_drink_rules }} X Sehari {{ $choose->qty_dosage_rules }} {{ $choose->drug->drugType->name }} {{ $choose->message }}</th>
                                <th>{{ $choose->status }}</th>
                                <th>
                                    <a href="/backend/choose/drug/delete/{{ $choose->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @if ($choose->status == 'waiting')
                                    <a href="/backend/choose/drug/success/{{ $choose->id }}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                    <a href="/backend/choose/drug/recipe/{{ $choose->id }}" class="btn btn-primary">Recipe</a>
                                    @endif
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop