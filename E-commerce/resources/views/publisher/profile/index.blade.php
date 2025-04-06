@extends('layouts.back-office')

@section('content')

    @include('layouts.publisher-sidebar')

    <div class="container mx-auto p-8">
        <div class="max-w-4xl ms-auto bg-white p-8 rounded-xl shadow-xl space-y-6">
            <!-- Informations Utilisateur -->
            <div class="flex items-center justify-between space-x-8 border-b pb-6">
                <div class="flex items-center space-x-4">
                    <img class="w-24 h-24 rounded-full border-4 border-indigo-600 " src="https://ui-avatars.com/api/?name={{ Auth::guard('publisher')->user()->name }}&background=000&color=c084fc" alt="{{ Auth::guard('publisher')->user()->name }}">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800">{{ Auth::guard('publisher')->user()->name }}</h3>
                        <p class="text-lg text-gray-600">{{ Auth::guard('publisher')->user()->email }}</p>
                        <p class="text-lg text-gray-600">Téléphone : <span class="text-indigo-500">{{ Auth::guard('publisher')->user()->phone }}</span></p>
                        <p class="text-gray-600 text-lg font-semibold">Rôle : <span class="text-indigo-500">{{ Auth::guard('publisher')->user()->role }}</span></p>
                    </div>
                </div>

                <a href="{{ route('users.edit', Auth::guard('publisher')->user()) }}" class="px-6 py-2 bg-purple-400 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-300">
                    Modifier le Profil
                </a>

                <a href="{{ route('users.change-password.view', Auth::guard('publisher')->user()) }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-300">
                    Reset password
                </a>
            </div>

            <!-- Informations supplémentaires -->
            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-gray-800">Informations supplémentaires</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <h4 class="text-lg font-semibold text-gray-800">Nom</h4>
                        <p class="text-gray-600">{{ Auth::guard('publisher')->user()->name }}</p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-lg font-semibold text-gray-800">Email vérifié</h4>
                        @if(Auth::guard('publisher')->user()->email_verified_at)
                            <p class="text-gray-600">Oui</p>
                        @else
                            <p class="text-red-600">Non</p>
                        @endif

                    </div>
                    <div class="space-y-2">
                        <h4 class="text-lg font-semibold text-gray-800">Date d'inscription</h4>
                        <p class="text-gray-600">{{ Auth::guard('publisher')->user()->created_at }}</p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-lg font-semibold text-gray-800">Rôle</h4>
                        <p class="text-gray-600">{{ Auth::guard('publisher')->user()->role }}</p>
                    </div>
                </div>
            </div>

            <!-- Historique des Commandes -->
            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-gray-800">Resent Commandes</h2>

                <div class="overflow-x-auto bg-gray-100 p-6 rounded-lg shadow-lg">
                    <table class="min-w-full text-sm">
                        <thead class="text-gray-600">
                            <tr class="bg-indigo-100">
                                <th class="py-3 px-4 text-left">Order Number</th>
                                <th class="py-3 px-4 text-left">Client</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Total Amount</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <tr class="border-t hover:bg-indigo-50 text-gray-600">
                                        <td class="py-3 px-4 underline italic hover:text-blue-400"><a
                                                href="{{ route('publisher.orders.show', $order->order->order_number) }}">#{{ $order->order->order_number }}</a>
                                        </td>
                                        <td class="py-3 px-4">{{ $order->order->client->name }}</td>
                                        <td class="py-3 px-4">{{ $order->order->client->email }}</td>
                                        <td
                                            class="py-3 px-4 font-bold {{ $order->order->payment->status === 'paid' ? 'text-green-600' : ($order->order->payment->status === 'failed' ? 'text-red-600' : 'text-black') }}">
                                            ${{ $order->order->total_amount }}</td>
                                        <td class="py-3 px-4">
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
                                        <td class="py-3 px-4">
                                            <a href="{{ route('publisher.orders.show', $order->order->order_number) }}" class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition duration-300">Voir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="border-t hover:bg-indigo-50 text-gray-600">
                                    <td colspan="6" class="text-red-500 text-center py-3 px-6 text-2xl font-bold">No Orders Yet</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
