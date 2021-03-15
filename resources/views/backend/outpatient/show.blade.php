@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-6">
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
                            <td>{{ $booking->patient->no_rm }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Place, date of birth</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->patient->city->name }}, {{ date('d F Y', strtotime($booking->patient->date_of_birth)) }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->patient->phone }}</td>
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
    </div>
    <div class="col-lg-6">
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
                            <td>{{ $booking->schedule->doctor->license_number }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->schedule->doctor->name }}</td>
                        </tr>
                        <tr>
                            <th>Poliklinik</th>
                            <td width="20px">:</td>
                            <td>{{ $booking->schedule->poliklinik->name }}</td>
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
                <h3 class="card-title">Health checkup</h3>
            </div>
            <div class="card-body">
                <form action="/backend/outpatient/store/{{ $booking->id }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="complaints">Complaints</label>
                        <textarea name="complaints" id="complaints" rows="3" class="form-control"></textarea>
                        @error('complaints')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="action">Action</label>
                        <textarea name="action" id="action" rows="3" class="form-control"></textarea>
                        @error('action')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="medical_measures">Medical measures</label>
                        <select name="medical_measures" id="medical_measures" class="form-control">
                            <option value="" hidden>Choose medical measures</option>
                            <option value="berat">Berat</option>
                            <option value="ringan">Ringan</option>
                        </select>
                        @error('medical_measures')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop