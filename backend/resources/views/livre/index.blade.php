@extends('layouts.app')

@section('header')
<div class="header-body">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-desktop"></i></a> Dashboards</li>
                    <li class="breadcrumb-item active" aria-current="page">Livre</li>
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
                        <h3 class="mb-0">Listes des Livres</h3>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <a href="/livre/create" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Ajouter livre
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Projects table -->
                <table class="table table-border table-striped custom-table datatable mb-0">
                    <thead>
                        <tr>
                            <th><b>Nom De Livre</b></th>
                            <th><b>Référence</b></th>
                            <th><b>Auteur</b></th>
                            <th class="text-center" colspan="3"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($livres)>0)
                        @foreach ($livres as $livre)
                        <tr>
                            <td>{{ $livre->name }}</td>
                            <td>{{ $livre->reference }}</td>
                            <td>{{ $livre->auteur }}</td>
                            <td class="text-right">
                                <a href="/livre/modifier/{{ $livre->id }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-fancy"></i></a>
                            </td>
                            <td class="text-left">
                                <form action="/livre/supprimer/{{ $livre->id }}" method="GET" onsubmit="return confirm('Supprimer livre ?');">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">Aucun livre</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection