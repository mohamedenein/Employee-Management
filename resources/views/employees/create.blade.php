<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">

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
                    <div class="mb-4">
                        <label for="first_name" class="block text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="salary" class="block text-gray-700">Salary</label>
                        <input type="number" name="salary" id="salary" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="department" class="block text-gray-700">Department</label>
                        <select type="text" name="department_id" id="department" class="mt-1 block w-full" required>
                        <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700">Role</label>
                        <select type="text" name="role" id="role" class="mt-1 block w-full" required>
                            <option value="employee">Employee</option>
                            <option value="manager">Manager</option>  
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="manager_name" class="block text-gray-700">Manager Name</label>
                        <select type="text" name="manager_id" id="manager_name" class="mt-1 block w-full" required>
                        <option value="">Select Manager</option>  
                            @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->fullName()}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full">
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>