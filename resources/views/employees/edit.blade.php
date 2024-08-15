<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="first_name" class="block text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" value="{{ $employee->first_name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" value="{{ $employee->last_name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="salary" class="block text-gray-700">Salary</label>
                        <input type="number" name="salary" id="salary" class="mt-1 block w-full" value="{{ $employee->salary }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="manager_name" class="block text-gray-700">Manager Name</label>
                        <input type="text" name="manager_name" id="manager_name" class="mt-1 block w-full" value="{{ $employee->manager_name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full">
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>