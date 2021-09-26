@extends('layouts.app')

@section('header')
<div class="header-body">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-desktop"></i></a> Dashboards</li>
                    <li class="breadcrumb-item active" aria-current="page">Membre</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-11">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="mb-0">Listes des Membres</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Projects table -->
                <table class="table table-border table-striped custom-table datatable mb-0">
                    <thead>
                        <tr>
                            <th><b>Membre</b></th>
                            <th><b>Email</b></th>
                            <th><b>N° Téléphone</b></th>
                            <th class="text-center" colspan="3"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($membres) > 0)
                        @foreach ($membres as $membre)
                        <tr>
                            <td>{{ $membre->user->name }}</td>
                            <td>{{ $membre->user->email }}</td>
                            <td>{{ $membre->num_telephone }}</td>
                            <td class="text-right">
                                <a href="/membre/modifier/{{ $membre->id }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-fancy"></i></a>
                            </td>
                            <td class="text-left">
                                <form action="/membre/supprimer/{{ $membre->id }}" method="GET" onsubmit="return confirm('Supprimer membre ?');">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">Aucun membre</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection