@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Payments</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Paid On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $i=> $payment)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$payment->creator->name}}</td>
                                <td>UGX : {{ number_format($payment->amount)}}</td>
                                <td>{{$payment->transaction_id}}</td>
                                <td>{{$payment->status}}</td>
                                <td>{{$payment->payment_method}}</td>
                                <td>{{$payment->paid_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection