@extends('template')

@section('content')

@livewire('admin.user-complaint-type',['userId'=>$userId,'type'=>$type])

@endsection