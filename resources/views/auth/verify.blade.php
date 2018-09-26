@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.resent_success') }}
                        </div>
                    @endif

                        <div class="panel-heading">{{ __('auth.register_success') }}</div>
                        <div class="panel-body">

                        </div>

                    {{ __('auth.resent') }}, <a href="{{ route('resend_activation') }}">{{ __('auth.resent_click') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
