@extends('layouts.back-office')

@section('head')
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/admin/categories/createInputValidation.js',
    ])
@endsection

@section('content')

@include('layouts.admin-sidebar')

<div class="container w-5/6 ms-auto p-6">
    <div class=" max-w-4xl mx-auto">
        <div class="mt-10">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-center">Create Category</h2>

                <form action="{{ route('admin.categories.store')  }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-lg font-semibold">Name</label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                            class="w-full mt-2 p-2 border rounded-lg">
                    </div>
                    <p id="nameErr" class="text-red-500 mt-1"></p>
                    @error('name')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-lg font-semibold">Description</label>
                        <textarea id="description" name="description" rows="3" required
                            class="w-full mt-2 p-2 border rounded-lg">{{ old('description') }}</textarea>
                    </div>
                    <p id="descriptionErr" class="text-red-500 mt-1"></p>
                    @error('description')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Submit -->
                    <button id="create-category" type="submit"
                        class="w-full bg-purple-400 text-white p-3 rounded-lg hover:bg-blue-700 transition">Create Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
