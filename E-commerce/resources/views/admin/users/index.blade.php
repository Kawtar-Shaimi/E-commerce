@extends('layouts.app')

@section('content')

@include('layouts.admin-sidebar')

<!-- Contenu principal -->
<main class="ml-64 p-6">

    <h2 class="text-2xl font-bold mt-8 mb-4">Liste des Utilisateurs</h2>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Nom</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Rôle</th>
                    <th class="p-3 border">Mot de passe</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="p-3 border">1</td>
                    <td class="p-3 border">Jean Dupont</td>
                    <td class="p-3 border">jean.dupont@email.com</td>
                    <td class="p-3 border text-blue-500 font-semibold">Admin</td>
                    <td class="p-3 border text-gray-500 italic">🔒 Chiffré</td>
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