@extends('template')

@section('content')

@livewire('admin.user-complaints',['userId'=>$userId,'status'=>$status])

@endsection