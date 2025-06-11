@extends('template')

@section('content')

@livewire('admin.complaints-details',['complaintId' =>$complaintId])

@endsection
