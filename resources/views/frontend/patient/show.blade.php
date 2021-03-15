@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <span class="navbar-brand mb-0 font-weight-bold h1">Patient</span>
                    </nav>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">No. rm</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->no_rm }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Place, date of birth</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->city->name }}, {{ date('d F Y', strtotime($patient->date_of_birth)) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Phone</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Access</td>
                                <td width="20px">:</td>
                                <td>{{ $patient->access }}</td>
                            </tr>
                            @if ($patient->access == 'insurances')
                            <tr>
                                <td class="font-weight-bold">Guarantee</td>
                                <td width="20px">:</td>
                                <td>{{ $insurance->guarantee->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Guarantee card number</td>
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
        </div>
    </div>
</div>
@stop