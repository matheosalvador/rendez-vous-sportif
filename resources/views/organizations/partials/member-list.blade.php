<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Member List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('organizations.addmember') }}">
                        @csrf

                        <div>
                          <label> Organization id </label>
                          <input type="text" name="organization_id" required/>
                        </div>

                        <div>
                          <label> User id </label>
                          <input type="text" name="user_id" required/>
                        </div>

                        <div>
                          <label> Role </label>
                          <input type="text" name="role" required/>
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
