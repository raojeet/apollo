@extends('layouts.backend')
@section('content-header')
    {!! Breadcrumbs::render('supplier_edit', $supplier) !!}

    <div class="btn-group pull-right">
        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">Actions <i class="fa fa-angle-down"></i></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="{{ action('SuppliersController@show', $supplier) }}"><i class="fa fa-eye"></i> View</a></li>
            <li><a href="#" onclick="$('#supplier_destroy').submit();"><i class="fa fa-trash"></i> Archive</a></li>
            {{ html()->form('DELETE', action('SuppliersController@destroy', $supplier))->id('supplier_destroy')->open() }}
            {{ html()->form()->close() }}
        </ul>
    </div>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $supplier->name }}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    {{ html()->modelForm($supplier, 'PUT', action('SuppliersController@update', $supplier))->open() }}

                    @include('supplier._form')

                    <input class="btn btn-primary pull-right" type="submit" value="Save Changes">
                    {{ html()->closeModelForm() }}
                </div>
            </div>
        </div>
    </div>
@endsection
