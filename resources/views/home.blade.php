@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="font-size:3em; color:Tomato">
  <i class="fas fa-camera-retro"></i>
</div>
You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
