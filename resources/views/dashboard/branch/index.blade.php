<x-app-layout>
    @if (session()->has('success'))
        <div id="alert-border-3"
            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <header class="border-b border-gray-200 bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Branches</h1>

                    <p class="mt-1.5 text-sm text-gray-500">
                        List of All Branches Related by Section (Sport Section -> Kids Branch)
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/"
                        class="inline-flex items-center justify-center gap-1.5 rounded-sm border border-gray-200 bg-white px-5 py-3 text-gray-900 transition hover:text-gray-700 focus:ring-3 focus:outline-hidden"
                        type="button">
                        <span class="text-sm font-medium"> View Website </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <a href="{{ route('branch.create') }}"
                        class="inline-block rounded-sm bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:ring-3 focus:outline-hidden"
                        type="button">
                        Create
                </a>
                </div>
            </div>
        </div>
    </header>
    <div class="relative m-4 md:flex justify-between items-center">
        <form action="{{ route('storeSections.index', 'search') }}" class="w-full max-w-md " method="GET">
            @csrf
            @method('GET')
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="search" name="search"
                    value="@if (!empty($inputs['search'])) {{ $inputs['search'] }} @endif"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by name ..." />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase text-nowrap bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        section
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-extrabold whitespace-nowrap text-black text-base">
                            {{ $record->name }}
                        </td>
                        <td class="px-6 py-4 font-bold whitespace-nowrap text-black text-base">
                          <div class="bg-amber-50 flex justify-start items-start rounded-full border p-1 cursor-pointer">{{ $record->section->name }}</div>  
                        </td>
                        <td class="px-6 py-3 text-right flex justify-start items-center pt-[30px] space-x-4">
                            <a href="{{ route('branch.edit', $record->id) }}"
                                class="font-medium border p-1 text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('branch.destroy', $record->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border p-1 text-red-600 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
