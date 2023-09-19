@extends('layouts.app')
@section('title')
    POS VIEW
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <div class="col-md-12 mb-5 text-end">
                <a href="{{ route('pos.index') }}"><button class="btn btn-secondary">Back</button></a>
            </div>
            <form action="{{ route('pos.enter-paymethod',$pos) }}">
                @csrf
            <div class="title text-center mb-5">
                <h1>POS VIEW </h1>
            </div>
            <div class="container">
                <table class="table table-bodered">
                    <tbody>
                        <tr>
                            <th>Patient Name:</th>
                            <td>{{$pos->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>Doctor Name:</th>
                            <td>{{$pos->doctor_name }}</td>
                        </tr>
                        <tr>
                            <th>POS Date:</th>
                            <td>{{$pos->pos_date }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <table class="table table-bordered">
                    <thead>
                        <h2 class="m-5">Products</h2>
                        <tr>
                            <th>Medicine</th>
                            <th>Generic</th>
                            <th>Quantity</th>
                            <th>MRP Per Unit</th>
                            <th>GST %</th>
                            <th>GST Amount</th>
                            <th>Discount %</th>
                            <th>Discount Amount</th>
                            <th>Total Cost</th>
                        </tr>
                        <tbody>
                            @foreach ($pos->PosProduct as $PosProduct)
                            <tr class="text-center">
                                <td>{{$PosProduct->medicine->name }}</td>
                                <td>{{$PosProduct->generic_formula }}</td>
                                <td>{{$PosProduct->product_quantity}}</td>
                                <td>{{$PosProduct->mrp_perunit}}</td>
                                <td>{{$PosProduct->gst_percentage}}</td>
                                <td>{{$PosProduct->gst_amount}}</td>
                                <td>{{$PosProduct->discount_percentage}}</td>
                                <td>{{$PosProduct->discount_amount}}</td>
                                <td>{{$PosProduct->product_total_price }} Rs</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>

                <table class="table table-border">
                    <tr colspan="2">
                        <th>Total Amount:</th>
                        <td>{{$pos->total_amount }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Pos Fees:</th>
                        <td>{{$pos->pos_fees }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Total Discount:</th>
                        <td>{{$pos->total_discount }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Total Sales Tax:</th>
                        <td>{{$pos->total_saletax }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Total Amount Exlusive Sale Tax:</th>
                        <td>{{$pos->total_amount_ex_saletax }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Total Amount Inclusive Sale Tax:</th>
                        <td>{{$pos->total_amount_inc_saletax }}</td>
                    </tr>
                    <tr colspan="2">
                        <th>Grand Total Amount:</th>
                        <td>{{$pos->total_amount }}</td>
                    </tr>
                    <tr>
                        <th>Given Amount</th>
                        <td>{{$pos->enter_payment_amount}}</td>
                    </tr>
                    <tr>
                        <th>Change Amount</th>
                        <td>{{$pos->change_amount}}</td>
                    </tr>
                </table>
            </div>
        </form>
        </div>
    </div>
@endsection