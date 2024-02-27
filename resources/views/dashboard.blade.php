@include('layouts.header')
<main>
    <div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-800 px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-white">
                Dashboard Overview
            </h3>
        </div>
        <div class="mt-5">
            <div class="bg-gray-900 shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-700">
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-medium text-white">
                                Total Companies
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-green-100">
                                    {{ $companyCount }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-medium text-white">
                                Total Employees
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-800 text-blue-100">
                                    {{ $employeeCount }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-medium text-white">
                                <i>More statistics data can go here...</i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
