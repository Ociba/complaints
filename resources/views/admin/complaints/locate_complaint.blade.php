@extends('template')

@section('content')

@livewire('admin.locate-complaint',['complaintId' =>$complaintId])

@endsection
