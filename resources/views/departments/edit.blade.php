<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Department Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $department->name }}" required>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Update Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>