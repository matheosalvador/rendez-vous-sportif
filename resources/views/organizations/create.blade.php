<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Organization') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('organizations.store') }}">
                        @csrf

                        <div>
                          <label> Organization Name </label>
                          <input type="text" name="name" required/>
                        </div>

                        <div>
                          <label> Organization slug </label>
                          <input type="text" name="slug" required/>
                        </div>

                        <div>
                          <label> Organization plan </label>
                          <input type="text" name="plan" required/>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <button type="submit">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
