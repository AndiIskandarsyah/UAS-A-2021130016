@extends('layouts.master')

@section('title', 'Order Details')

@section('content')
    <div class="container mt-4">
        <h1>Order Details</h1>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $order->status }}</td>
            </tr>

            <tr>
                <th>Order Items</th>
                <td>
                    @if ($order->orderItems)
                        @if ($order->orderItems->isEmpty())
                            <p>No items in this order.</p>
                        @else
                            <ul>
                                @php
                                    $totalPrice = 0;
                                @endphp

                                @foreach ($order->orderItems as $item)
                                    @php
                                        $menus = $item->menus;

                                        // Check if $menus is not empty before accessing its properties
                                        if ($menus) {
                                            $quantity = $item->quantity;
                                            $price = $menus->harga; // Change $menu to $menus
                                            $isRecommended = $menus->rekomendasi;
                                            $discount = $isRecommended ? 0.1 : 0.0;
                                            $discountedPrice = $price - $price * $discount;
                                            $subtotal = $quantity * $discountedPrice;
                                            $totalPrice += $subtotal;
                                        }
                                    @endphp

                                    <li>
                                        <strong>Menu:</strong> {{ $menus->nama ?? 'N/A' }},
                                        <strong>Quantity:</strong> {{ $quantity ?? 'N/A' }},
                                        <strong>Price:</strong> {{ $price ?? 'N/A' }},
                                        <strong>Discounted Price:</strong> {{ $discountedPrice ?? 'N/A' }},
                                        <strong>Subtotal:</strong> {{ $subtotal ?? 'N/A' }}
                                    </li>
                                @endforeach


                                <li>
                                    <strong>Total Price:</strong> {{ $totalPrice }}
                                    <br>
                                    <strong>PPN (11%):</strong> {{ $totalPrice * 0.11 }}
                                    <br>
                                    <strong>Grand Total:</strong> {{ $totalPrice * 1.11 }}
                                </li>
                            </ul>
                        @endif
                    @else
                        <p>No items in this order.</p>
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('order') }}" class="btn btn-secondary mt-3">Back to Order List</a>
    </div>
@endsection
