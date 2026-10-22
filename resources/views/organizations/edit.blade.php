<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier l\'organisation : ') }} <span class="text-indigo-600 dark:text-indigo-400">{{ $organization->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <span class="block sm:inline font-medium">{{ session('success') }}</span>
                </div>
            @endif
             @if ($errors->any()) 
                <div class="mb-4 bg-red-100 dark:bg-red-900/50 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Mettre à jour les informations</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Modifiez les champs ci-dessous pour mettre à jour l'organisation.</p>
                    </div>

                    <!-- Formulaire de mise à jour (Pensez à adapter l'action vers votre route de mise à jour, ex: route('organizations.update', $organization)) -->
                    <form method="POST" action="{{ route('organizations.update', $organization) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Nom de l'organisation -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Nom de l'organisation</label>
                            <input type="text" name="name" value="{{ old('name', $organization->name) }}" required 
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('organizations.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                                Annuler
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-400 active:bg-indigo-900 dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                        </div>
                    </form>
                    
                    <!-- Bouton Supprimer -->
                    <form method="POST" action="{{ route('organizations.delete', $organization) }}" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette organisation ? Cette action est irréversible.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 font-semibold">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>