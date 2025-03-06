<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter un Produit</title>
</head>
<body class="bg-gray-100 text-gray-900">

    @include('layouts.header')

    <!-- Formulaire d'ajout -->
    <div class="container mx-auto p-6 max-w-lg">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">🛍️ Ajouter un Produit</h2>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="#" method="POST" enctype="multipart/form-data">
                
                <!-- Nom du produit -->
                <div class="mb-4">
                    <label for="product_name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                    <input type="text" id="product_name" name="product_name" class="w-full p-3 border rounded-lg mt-1" required>
                </div>

                <!-- Prix -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Prix ($)</label>
                    <input type="number" id="price" name="price" step="0.01" class="w-full p-3 border rounded-lg mt-1" required>
                </div>

                <!-- Catégorie -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="category" name="category" class="w-full p-3 border rounded-lg mt-1" required>
                        <option value="">Sélectionner une catégorie</option>
                        <option value="vetements">Vêtements</option>
                        <option value="chaussures">Chaussures</option>
                        <option value="accessoires">Accessoires</option>
                        <option value="electronique">Électronique</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full p-3 border rounded-lg mt-1" required></textarea>
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image du produit</label>
                    <input type="file" id="image" name="image" accept="image/*" class="w-full p-3 border rounded-lg mt-1" required>
                </div>

                <!-- Bouton Ajouter -->
                <button type="submit" class="w-full bg-purple-400 text-white font-bold py-3 rounded-lg mt-6 hover:bg-blue-600 transition duration-300 shadow-md">
                    ➕ Ajouter le produit
                </button>

            </form>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>
