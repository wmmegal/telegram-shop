<div>
    @if($items->isEmpty())
        <p class="empty-cart">Cart is empty...</p>
    @else
        <table class="table animate__animated animate__fadeInUp">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">🗑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr class="align-middle text-center">
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td><img src="{{ $item->product->thumb }}" class="cart-img" alt=""></td>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>
                        <button wire:click="deleteItem({{ $item->id }});" class="btn btn-outline-danger del-item">🗑
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
