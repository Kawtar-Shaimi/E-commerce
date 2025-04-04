<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3 border">Order Number</th>
            <th class="p-3 border">Client</th>
            <th class="p-3 border">Email</th>
            <th class="p-3 border">Total Amount</th>
            <th class="p-3 border">Status</th>
            <th class="p-3 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <tr class="text-center">
                    <td class="p-3 border underline italic hover:text-blue-400"><a href="{{ route('publisher.orders.show', $order->order->order_number) }}">#{{ $order->order->order_number }}</a></td>
                    <td class="p-3 border">{{ $order->order->client->name }}</td>
                    <td class="p-3 border">{{ $order->order->client->email }}</td>
                    <td class="p-3 border font-bold {{ $order->order->payment->status === 'paid' ? 'text-green-600' : ($order->order->payment->status === 'failed' ? 'text-red-600': 'text-black') }}">${{ $order->order->total_amount }}</td>
                    <td class="p-3 border">
                        @if ($order->order->status == 'pending')
                            <span class="bg-yellow-400 text-white px-3 py-1 rounded">{{ $order->order->status }}</span>
                        @elseif ($order->order->status == 'in shipping')
                            <span class="bg-blue-400 text-white px-3 py-1 rounded">{{ $order->order->status }}</span>
                        @elseif ($order->order->status == 'completed')
                            <span class="bg-green-400 text-white px-3 py-1 rounded">{{ $order->order->status }}</span>
                        @else
                            <span class="bg-red-400 text-white px-3 py-1 rounded">{{ $order->order->status }}</span>
                        @endif
                    </td>
                    <td class="p-3 border">
                        <a href="{{ route('admin.orders.edit', $order) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Update</a>
                        <form action="{{ route('admin.orders.delete', $order) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-red-500 text-center py-3 px-6 text-2xl font-bold">No Orders Yet</td>
            </tr>
        @endif
    </tbody>
</table>
<div id="pagination" class="mt-4">
    {{ $orders->links() }}
</div>