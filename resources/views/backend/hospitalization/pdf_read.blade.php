<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h4 class="font-weight-bold text-center">Invoice Hospitalization</h4>
    <hr>
    <div class="row mt-2 my-5">
        <div class="col-lg-6 float-left">
            <table>
                <thead>
                    <tr>
                        <td class="pr-2">Nama Patient</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->patient->name }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Place, date of birth</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->patient->city->name }}, {{ date('d F Y', strtotime($hospital->healthCheckup->bookingSchedule->patient->date_of_birth)) }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Gender</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->patient->gender }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Guarantee</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->patient->access }}</td>
                    </tr>
                    <tr>
                        <td>Access</td>
                        <td width="20px">:</td>
                        <td>{{ $insurance->access }}</td>
                    </tr>
                    @if ($insurance->access == 'insurances')
                    <tr>
                        <td>Guarantee</td>
                        <td width="20px">:</td>
                        <td>{{ $insurance->guarantee->name }}</td>
                    </tr>
                    <tr>
                        <td>Guarantee card number</td>
                        <td width="20px">:</td>
                        <td>{{ $insurance->card_number }}</td>
                    </tr>
                    @endif
                </thead>
            </table>
        </div>
        <div class="col-lg-6 float-right" style="margin-left: 360px;">
            <table>
                <thead>
                    <tr>
                        <td class="pr-2">License Number</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->schedule->doctor->license_number }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Name Dokter</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->schedule->doctor->name }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Poliklinik</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->healthCheckup->bookingSchedule->schedule->poliklinik->name }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Doctor Fees</td>
                        <td class="px-2">:</td>
                        <td>Rp. {{ number_format($hospital->healthCheckup->bookingSchedule->schedule->price) }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-12" style="margin-top: 150px;">
            <h5 class="font-weight-bold">Rawat Inap</h5>
            <table class="w-100">
                <thead>
                    <tr>
                        <td class="pr-2">Living room</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->living->name }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Level</td>
                        <td class="px-2">:</td>
                        <td>{{ $hospital->living->level->name }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Best</td>
                        <td class="px-2">:</td>
                        <td>Rp. {{ number_format($hospital->living->level->best) }} - Perhari</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Entry date</td>
                        <td class="px-2">:</td>
                        <td>{{ date('d F Y', $hospital->entry_date) }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Exit date</td>
                        <td class="px-2">:</td>
                        <td>{{ date('d F Y', $hospital->exit_date) }}</td>
                    </tr>
                    @php $a = $hospital->exit_date - $hospital->entry_date; $date = date('d', $a); $room = $hospital->living->level->best * $date @endphp
                    <tr>
                        <td class="pr-2">Amount day</td>
                        <td class="px-2">:</td>
                        <td>{{ $date }} Hari</td>
                    </tr>
                </thead>
            </table>
            <h5 class="font-weight-bold mt-5">Drug & Administrator</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Totals</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($chooses as $choose)
                    @php
                    $a = $choose->qty_drink_rules * $choose->qty_dosage_rules;
                    $b = $a * $choose->amout_day;
                    $total += $choose->totals
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $choose->drug->name }}</td>
                        <td>{{ $choose->drug->drugType->name }}</td>
                        <td>{{ $choose->drug->price }}</td>
                        <td>{{ $b }}</td>
                        <td>{{ $choose->totals }}</td>
                    </tr>
                    @endforeach
                    @php $doctor = $hospital->healthCheckup->bookingSchedule->schedule->price * $date; $admin = 10000; $subtotals = $doctor + $admin + $total + $room; @endphp
                    <tr>
                        <th colspan="2">Cost of the drug</th>
                        <td colspan="4">Rp. {{ number_format($total) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Administration fee</th>
                        <td colspan="4">Rp. {{ number_format($admin) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Docter consulting fees</th>
                        <td colspan="4">Rp. {{ number_format($doctor) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Room fees</th>
                        <td colspan="4">Rp. {{ number_format($room) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Subtotals</th>
                        <td colspan="4">Rp. {{ number_format($subtotals) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>