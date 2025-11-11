<div>
    <h1>Orders</h1>
    <table class="w-full mx-2 mt-s mb-2">
        <thead>
            <tr>
                <th class="p-2 border">Order Id</th>
                <th class="p-2 border">Customer Name</th>
                <th class="p-2 border">Products</th>
                <th class="p-2 border">Total Price </th>
                <th class="p-2 border">Order Status</th>
            </tr>
        </thead>
        <tbody>
            
           @forelse ($orders as $order)

        <tr>
                <td class="p-2 border">{{ $order->id }}</td>
                <td class="p-2 border">{{ $order->user->name }}</td>
                <td class="p-2 border">
                    @foreach ($order->orderItems as $item)
                    <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                    @endforeach
                </td>   
                <td class="p-2 border">{{ $order->total}}</td>
                <td class="p-2 border"><span class="px-1 py-2 @if ($order->payment_status='pending')
                    text-yeloow-500
                    @elseif($order->payment_status=='shipped')
                    text-blue-500
                    @else
                    text-green-500

                
                @endif">{{ $order->payment_status }}</span></td>
                  
             @empty
                 <h1>No products Yet</h1> 
            @endforelse
        </tr>
        </tbody>
    </table>
    <div>
        {{ $orders->links() }}
    </div>
</div>
