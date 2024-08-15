<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
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
                    @method('PUT') <!-- Specify the HTTP method as PUT for updating the task -->

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full" value="{{ old('title', $task->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="mt-1 block w-full" required>{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="employee_id" class="block text-gray-700">Assign To</label>
                        <select name="employee_id" id="employee_id" class="mt-1 block w-full" required>
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $employee->id == old('employee_id', $task->employee_id) ? 'selected' : '' }}>
                                    {{ $employee->fullName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full" required>
                            <option value="">Select Status</option>
                            <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In progress" {{ old('status', $task->status) == 'In progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
