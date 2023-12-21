@extends('layouts.master')

@section('title', 'Create Order')

@section('content')
Copy code
<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.createOrder') }}" method="post" id="orderForm">
        @csrf

        <div class="mb-3">
            <label for="status" class="form-label">Status Order:</label>
            <select class="form-select" name="status">
                <option value="Selesai">Selesai</option>
                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
            </select>
        </div>

        <div id="order-items-container" class="mb-4">
            <div class="order-item border p-3 rounded mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="menu_id" class="form-label">Menu:</label>
                        <select class="form-select" name="menu_ids[]" required>
                            <option value="" disabled selected>Select Menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" name="quantities[]" value="{{ old('quantities.0', 1) }}" required min="1">
                    </div>

                    <div class="col-md-2 mb-3">
                        <button type="button" class="btn btn-danger btn-block remove-item">Remove Menu</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary add-item">Add Menu</button>
        <button type="submit" class="btn btn-success">Submit Order</button>
    </form>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addItemButton = document.querySelector('.add-item');
            const orderItemsContainer = document.getElementById('order-items-container');
            const orderItemsTableBody = document.getElementById('order-items-table-body');

            addItemButton.addEventListener('click', function () {
                const newItem = orderItemsContainer.children[0].cloneNode(true);
                newItem.querySelector('.remove-item').addEventListener('click', function () {
                    newItem.remove();
                    updateTable();
                });

                orderItemsContainer.appendChild(newItem);
                updateTable();
            });

            function updateTable() {
                const items = orderItemsContainer.children;
                orderItemsTableBody.innerHTML = '';

                items.forEach(function (item, index) {
                    const menuId = item.querySelector('[name="menu_ids[]"]').value;
                    const quantity = item.querySelector('[name="quantities[]"]').value;

                    // Find the menu name associated with the menuId
                    const menuName = Array.from(document.querySelector('[name="menu_ids[]"]').options)
                        .find(option => option.value === menuId).text;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${menuName}</td>
                        <td>${quantity}</td>
                    `;

                    orderItemsTableBody.appendChild(row);
                });
            }
        });
    </script>

@endsection
