@extends('layouts.master')

@section('title', 'Restaurant XYZ')

@section('content')
    <div class="container mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Menus</h5>
                        <p class="card-text display-4">{{ $totalMenus }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <a href="{{ route('order') }}" class="btn btn-primary btn-lg btn-block">Create Order</a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('menus.index') }}" class="btn btn-info btn-lg btn-block">Menu Data</a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-lg btn-block">Order List</a>
            </div>
        </div>
    </div>
@endsection
