@extends('layouts.app')

@section('content')

@include('layouts.admin-sidebar')

<!-- Contenu principal -->
<main class="ml-64 p-6">

    <!-- Dashboard -->
    <h1 class="text-3xl font-bold mb-6">Tableau de Bord</h1>
    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-xl font-bold">Utilisateurs</h3>
            <p class="text-3xl text-blue-500 font-bold">120</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-xl font-bold">Produits</h3>
            <p class="text-3xl text-green-500 font-bold">45</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-xl font-bold">Commandes</h3>
            <p class="text-3xl text-red-500 font-bold">32</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-xl font-bold">Catégories</h3>
            <p class="text-3xl text-yellow-500 font-bold">10</p>
        </div>
    </div>

    <!-- Tableau des Payments -->
    <h2 class="text-2xl font-bold mt-8 mb-4">Liste des Payments</h2>
    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Client</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Montant Total</th>
                    <th class="p-3 border">Statut</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="p-3 border">1</td>
                    <td class="p-3 border">Kawtar Shaimi</td>
                    <td class="p-3 border">kawtar.shaimi8@gmail.com</td>
                    <td class="p-3 border text-green-600 font-bold">$120.50</td>
                    <td class="p-3 border">
                        <span class="bg-yellow-400 text-white px-3 py-1 rounded">Pending</span>
                    </td>
                    <td class="p-3 border">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded">Modifier</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

@endsection