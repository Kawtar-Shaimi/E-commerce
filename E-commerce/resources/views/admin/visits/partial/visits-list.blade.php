<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3 border">ID</th>
            <th class="p-3 border">IP Address</th>
            <th class="p-3 border">User Agent</th>
            <th class="p-3 border">Last Visited URL</th>
            <th class="p-3 border">Last Visit</th>
            <th class="p-3 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($visits->count() > 0)
            @foreach ($visits as $visit)
                <tr class="text-center">
                    <td class="p-3 border underline italic hover:text-blue-400">#{{ $visit->id }}</td>
                    <td class="p-3 border">{{ $visit->ip_address }}</td>
                    <td class="p-3 border">{{ $visit->user_agent }}</td>
                    <td class="p-3 border">{{ $visit->last_visited_url }}</td>
                    <td class="p-3 border">{{ $visit->last_visit }}</td>
                    <td class="p-3 border">
                        <form action="{{ route('admin.visits.delete', $visit) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-red-500 text-center py-3 px-6 text-2xl font-bold">No Visits Yet</td>
            </tr>
        @endif
    </tbody>
</table>
<div id="pagination" class="mt-4">
    {{ $visits->links() }}
</div>