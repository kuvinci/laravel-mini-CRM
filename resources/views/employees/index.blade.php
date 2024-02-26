@include('layouts.header')

<div class="container mx-auto mt-8">
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
</div>

@include('layouts.footer')
