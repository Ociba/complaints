@extends('template')

@section('content')

@livewire('admin.print-complaint',['complaintId' =>$complaintId])

@endsection
