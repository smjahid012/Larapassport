@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="app">
                        <passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
//checking all client
//   axios.get('/oauth/clients')
//     .then(response => {
//         console.log(response.data);
//     });

//create new client with validation
const data = {
    name: 'Test',
    redirect: 'http://client.dev/callback'
};

axios.post('/oauth/clients', data)
    .then(response => {
        console.log(response.data);
    })
    .catch (response => {
        // List errors on response...
    });
</script>
@endpush