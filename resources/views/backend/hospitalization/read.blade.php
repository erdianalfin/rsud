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
                            <td>{{ $hospital->healthCheckup->bookingSchedule->patient->no_rm }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->bookingSchedule->patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Place, date of birth</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->bookingSchedule->patient->city->name }}, {{ date('d F Y', strtotime($hospital->healthCheckup->bookingSchedule->patient->date_of_birth)) }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->bookingSchedule->patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->bookingSchedule->patient->phone }}</td>
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
                @if (is_null($hospital->exit_date))
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/outpatient/{{ $hospital->healthCheckup->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="align-self-center">Complaints</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->complaints }}</td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->action }}</td>
                        </tr>
                        <tr>
                            <th>Medical measures</th>
                            <td width="20px">:</td>
                            @if ($hospital->healthCheckup->medical_measures == 'berat')
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
                            <td>{{ $hospital->healthCheckup->bookingSchedule->schedule->doctor->license_number }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->healthCheckup->bookingSchedule->schedule->doctor->name }}</td>
                        </tr>
                        <tr>
                            <th>Docter consulting fees</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($hospital->healthCheckup->bookingSchedule->schedule->price) }} - Perhari</td>
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
                <h3 class="card-title">Hospitalization</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. hospitalization</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->no_hospitalization }}</td>
                        </tr>
                        <tr>
                            <th>Entry Date</th>
                            <td width="20px">:</td>
                            <td>{{ date('d F Y', $hospital->entry_date) }}</td>
                        </tr>
                        <tr>
                            <th>Exit Date</th>
                            <td width="20px">:</td>
                            @if (is_null($hospital->exit_date))
                            <td> - </td>
                            @else
                            <td>{{ date('d F Y', $hospital->exit_date) }}</td>
                            @endif
                        </tr>
                        @php $a = $hospital->exit_date - $hospital->entry_date; $date = date('d', $a) @endphp
                        <tr>
                            <td colspan="3" class="p-0"></td>
                        </tr>
                    </thead>
                </table>
                @if (is_null($hospital->exit_date))
                <a href="/backend/hospitalization/gohome/{{ $hospital->id }}" class="btn btn-primary float-right">Go Home</a>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Living Room</h3>
                @if (is_null($hospital->exit_date))
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/hospitalization/{{ $hospital->healthCheckup->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->living->name }}</td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->living->level->name }}</td>
                        </tr>
                        <tr>
                            <th>Building</th>
                            <td width="20px">:</td>
                            <td>{{ $hospital->living->building->name }}</td>
                        </tr>
                        <tr>
                            <th>Best</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($hospital->living->level->best) }} - Perhari</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0"></td>
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
                        $admin     = 10000; 
                        $totals    = 0;
                        $doctor    = $hospital->healthCheckup->bookingSchedule->schedule->price;
                        $subdoctor = $doctor * $date;
                        @endphp
                    @if (!is_null($hospital->exit_date))
                    @php $room = $hospital->living->level->best * $date @endphp
                    @else
                    @php $room = 0 @endphp
                    @endif
                    @foreach ($chooses as $choose) 
                    @php $totals += $choose->totals @endphp
                    @endforeach
                    @php $subtotals = $admin + $subdoctor + $room + $totals @endphp
                    <thead>
                        @if (!is_null($hospital->exit_date))
                        <tr>
                            <th>Room Cost</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($room) }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Docter fees</th>
                            <td width="20px">:</td>
                            <td>Rp. {{ number_format($subdoctor) }}</td>
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
                @if (!is_null($hospital->exit_date))
                <a href="/backend/hospitalization/pdf_read/{{ $health->id }}" class="btn btn-primary float-right">Create invoice</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Choose drug</h3>
                @if (is_null($hospital->exit_date))
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/choose/drugs/{{ $hospital->healthCheckup->id }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Name</th>
                                <th>Message</th>
                                @if (is_null($hospital->exit_date))
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chooses as $choose)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <th>{{ $choose->drug->name }}</th>
                                <th>{{ $choose->qty_drink_rules }} X Sehari {{ $choose->qty_dosage_rules }} {{ $choose->drug->drugType->name }} {{ $choose->message }}</th>
                                @if (is_null($hospital->exit_date))
                                <th>
                                    <a href="/backend/choose/drug/delete/{{ $choose->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @if ($choose->status == 'waiting')
                                    <a href="/backend/choose/drug/success/{{ $choose->id }}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                    <a href="/backend/choose/drug/recipe/{{ $choose->id }}" class="btn btn-primary">Recipe</a>
                                    @endif
                                </th>
                                @endif
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