@extends('template')

@section('content')

@livewire('admin.user-details',['userId'=>$userId])

@endsection