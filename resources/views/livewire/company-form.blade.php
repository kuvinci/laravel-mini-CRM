<div class="container mx-auto mt-8">
    <div class="bg-gray-800 p-5 rounded-lg shadow-lg">
        <form wire:submit.prevent="submit">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Name:</label>
                <input wire:model="name" type="text" name="name" id="name" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-200 text-sm font-bold mb-2">Email:</label>
                <input wire:model="email" type="email" name="email" id="email" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="website" class="block text-gray-200 text-sm font-bold mb-2">Website:</label>
                <input wire:model="website" type="url" name="website" id="website" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                @error('website') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-gray-200 text-sm font-bold mb-2">Logo:</label>
                <input wire:model="logo" type="file" name="logo" id="logo" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                @error('logo') <span class="text-red-500">{{ $message }}</span> @enderror

                @if(isset($company->logo))
                    <img src="{{ Storage::url($company->logo) }}" alt="Company Logo">
                @endif
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
