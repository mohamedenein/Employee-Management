<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('employees.index') }}" class="mb-4">
                    <input type="text" name="search" class="form-input w-full" placeholder="Search employees...">
                </form>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">First Name</th>
                            <th class="py-2 px-4 border-b">last Name</th>
                            <th class="py-2 px-4 border-b">Full Name</th>
                            <th class="py-2 px-4 border-b">Salary</th>
                            <th class="py-2 px-4 border-b">Manager Name</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $employee->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $employee->first_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $employee->last_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $employee->fullName() }}</td>
                                <td class="py-2 px-4 border-b">{{ $employee->salary }}</td>
                                <td class="py-2 px-4 border-b">@if ($employee->manager) {{ $employee->manager->first_name }} {{ $employee->manager->last_name }} @else - @endif</td>
                                <td class="py-2 px-4 border-b">
                                <div class="flex gap-4">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded">Delete</button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>