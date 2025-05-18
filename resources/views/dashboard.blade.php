<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    @if(Auth::user()->is_admin)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold mb-2">Admin Panel</h3>
                            <div class="space-y-2">
                                <a href="{{ route('admin.skills.index') }}" class="text-blue-500 hover:underline block">Manage Skills</a>
                                <a href="{{ route('admin.experts.index') }}" class="text-blue-500 hover:underline block">Manage Experts</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
