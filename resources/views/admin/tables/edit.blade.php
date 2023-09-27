<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">page des tables</a>
            </div>

            <div class="m-2 p-2">


                <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input type="text" id="name" value="{{ $table->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nom" name="name" required>
                    </div>

                    <div class="mb-6">
                        <label for="number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'invité</label>
                        <input type="number" id="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nombre" name="guest_number" value="{{ $table->guest_number }}" required>
                    </div>

                    <div class=" mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Etat</label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class=" mb-6">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Localisation</label>
                        <select name="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>
                                    {{ $location->name }}</option>
                            @endforeach

                        </select>
                    </div>


                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white
                         ">soumettre</button>

                </form>


            </div>

        </div>
    </div>
</x-admin-layout>
