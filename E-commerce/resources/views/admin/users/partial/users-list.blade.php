<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3 border">ID</th>
            <th class="p-3 border">Name</th>
            <th class="p-3 border">Email</th>
            <th class="p-3 border">Role</th>
            <th class="p-3 border">Password</th>
            <th class="p-3 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <tr class="text-center">
                    <td class="p-3 border underline italic hover:text-blue-400"><a href="{{ route('admin.users.show', $user) }}">#{{ $user->id }}</a></td>
                    <td class="p-3 border">{{ $user->name }}</td>
                    <td class="p-3 border">{{ $user->email }}</td>
                    <td class="p-3 border text-blue-500 font-semibold">{{ $user->role }}</td>
                    <td class="p-3 border text-gray-500 italic">{{ Str::limit($user->password,15) }}</td>
                    <td class="p-3 border">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded"><a href="{{ route('admin.users.edit', $user) }}">Update</a></button>
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-red-500 text-center py-3 px-6 text-2xl font-bold">No Users Yet</td>
            </tr>
        @endif
    </tbody>
</table>
<div id="pagination" class="mt-4">
    {{ $users->links() }}
</div>