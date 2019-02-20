<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Home Route
Route::get('/home', 'HomeController@index')->name('home');

//Redirecting For Authorization
Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => 'http://clent.dev/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://localhost:8080/oauth/authorize?'.$query);
})->name('get.token');


//Authorization Codes To Access Tokens
Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8080/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '3',
            'client_secret' => 'fffbAYSeU1dU1APRB1j5Z9kXxHQVne4z5U6rME87',
            'redirect_uri' => 'http://client.dev/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});