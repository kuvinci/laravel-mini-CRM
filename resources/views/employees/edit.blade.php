@include('layouts.header')

<div class="container mx-auto mt-8">
    <div class="bg-gray-800 p-5 rounded-lg shadow-lg">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block text-gray-200 text-sm font-bold mb-2">First Name:</label>
                <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-200 text-sm font-bold mb-2">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-200 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ $employee->email }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-200 text-sm font-bold mb-2">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ $employee->phone }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
            </div>

            <div class="mb-4">
                <label for="company_id" class="block text-gray-200 text-sm font-bold mb-2">Company:</label>
                <select name="company_id" id="company_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}"{{ $employee->company_id == $company->id ? ' selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')
