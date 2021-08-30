@extends('layouts.includes')
@section('content')
    <div class="section-padding">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-muted mb-0">Dashboard</div>
                <div class="text-info">
                    {{ date("F j, Y"); }}
                </div>
            </div>
            @include('dashboard.partials.panels')
        </div>
    </div>
@endsection