@extends("admin.admin-layout")

@section('content') 
    @if (auth()->user()->hasRole('admin'))
        <h1> Hello World </h1>
    @endif
@endsection