<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.categories.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">page de Categories</a>
            </div>

            <div class="m-2 p-2">


                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input type="text" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nom" required name="name" value="{{ $category->name }}">
                    </div>

                    @error('name')
                        <div class="text-small text-red-400">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">

                        <div>
                            <img src="{{ Storage::url($category->image) }}" alt="" class="w-16">
                        </div>
                        <label for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="image">
                    </div>
                    @error('image')
                        <div class="text-small text-red-400">{{ $message }}</div>
                    @enderror

                    <div class=" mb-6">

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Description" name="description">
                            {{ $category->description }}
                        </textarea>
                    </div>

                    @error('description')
                        <div class="text-small text-red-400">{{ $message }}</div>
                    @enderror


                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white
                         ">Valider</button>

                </form>


            </div>

        </div>
    </div>
</x-admin-layout>
