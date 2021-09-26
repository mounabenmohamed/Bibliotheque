@extends('layouts.app')

@section('header')
<div class="header-body">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-desktop"></i></a> Dashboards</li>
                    <li class="breadcrumb-item"><a href="/membre">Membre</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6 center">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Modifier Membre</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/membre/modifier/{{ $membre->id }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input value="{{ $membre->user->name ?? '' }}" placeholder="{{ __('Membre') }}" type="text" class="form-control" name="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input value="{{  $membre->user->email ?? ''  }}" placeholder="{{ __('Email') }}" type="email" class="form-control" name="email" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input value="{{  $membre->num_telephone ?? '' }}" placeholder="{{ __('N° Téléphone') }}" type="number" class="form-control" name="num_telephone" autofocus>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('membre.index') }}" class="btn btn-light my-4">{{ __('Retour') }}</a>
                        <button type="submit" class="btn btn-primary my-4">{{ __('Modifier') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection