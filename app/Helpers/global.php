<?php

use App\Models\PatientAccess;
use App\Models\Month;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function rajaongkir($url, $type, $data = '')
{
	$type = strtoupper($type);

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $type,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 1cb6ca038ddb281f174dbc4264474df0"
		),
	]);

	$response = curl_exec($curl);
	$response_fail = curl_error($curl);

	curl_close($curl);

	if ($response_fail) {
		return false;
	} else {
		return json_decode($response, true)['rajaongkir'];
	}
}


function check($news, $tag)
{
	$newsTags = NewsTag::where('news_id', $news)->get();
	foreach ($newsTags as $newsTag) {
		if ($newsTag->tag_id == $tag) {
			return 'checked';
		}
	}
}


function send_mail($config)
{
	$data = (object) $config;

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPOptions = [
		'ssl' => [
			'verify_peer'       => false,
			'verify_peer_name'  => false,
			'allow_self_signed' => true
		]
	];
	$mail->SMTPDebug  = false;
	$mail->SMTPAuth   = true;
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = '465';
	$mail->isHTML(true);
	$mail->Username   = 'linecode.team@gmail.com';
	$mail->Password   = 'adminlinecode123';
	$mail->setFrom('linecode.team@gmail.com', "Galaxy");
	$mail->Subject    = $data->subject;
	$mail->Body       = $data->view;
	$mail->addAddress($data->receiver_email, $data->receiver_name);

	if ($mail->send()) {
		return true;
	} else {
		return false;
	}
}


function randomINT($length = 10)
{
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function setting()
{
	return Setting::first();
}

function sosmeds()
{
	return Sosmed::all();
}

function user()
{
	if (Auth::check()) {
		return auth()->user();
	} else {
		return redirect('auth/login');
	}
}

function fullname()
{
	if (Auth::check()) {
		return user()->first_name . ' ' . user()->last_name;
	} else {
		return redirect('auth/login');
	}
}

function months()
{
	return Month::all();
}

function countries()
{
	return Country::all();
}

function birth()
{
	$date = explode('-', user()->profile->birthdate);

	return (object) [
		'date' => $date[2],
		'month' => $date[1],
		'year' => $date[0]
	];
}


function patientAccess()
{
	return PatientAccess::where('user_id', user()->id)->first();
}