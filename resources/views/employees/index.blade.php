@include('layouts.header')
<main>
    <div class="container mx-auto mt-8">
        <form action="{{ route('employees.index') }}" method="GET" class="flex items-center min-w-50 mb-8">
            <input type="text" name="search" value="{{$search}}" placeholder="Search employees..." class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full">
            <button type="submit" class="inline-flex items-center px-4 py-3 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">Search</button>
        </form>

        <div class="min-w-full divide-y divide-gray-dark">
            <table class="min-w-full divide-y divide-gray-dark">
                <thead class="bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-gray-900 divide-y divide-gray-dark">
                @foreach ($employees as $employee)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->company->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="{{ route('employees.edit', $employee) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mx-auto w-2/3 my-8">
            {{ $employees->links() }}
        </div>
    </div>
</main>

@include('layouts.footer')
