<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('departments.index') }}" class="mb-4">
                    <input type="text" name="search" class="form-input w-full" placeholder="Search departments...">
                </form>
                @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif                
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Department Name</th>
                            <th class="py-2 px-4 border-b">Employee Count</th>
                            <th class="py-2 px-4 border-b">Total Salary</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $department->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $department->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $department->employees->count() }}</td>
                                <td class="py-2 px-4 border-b">{{ $department->total_salary() }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex gap-4">
                                        <a href="{{ route('departments.edit', $department->id) }}" class="bg-gray-500 text-white px-2 py-2 rounded">Edit</a>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded" {{ $department->employee_count > 0 ? 'disabled' : '' }}>Delete</button>
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