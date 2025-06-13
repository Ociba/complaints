@extends('template')

@section('content')

@livewire('admin.complaints',['status' =>$status])

@endsection
