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
    <div class="text-2xl py-4 font-bold underline text-gray-900 dark:text-white">Inbox Messages</div>
    <div class="relative m-4 md:flex justify-between items-center">
        <form action="{{ route('inbox.index', 'search') }}" class="w-full max-w-md " method="GET">
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
                    placeholder="Search by email , name ..." />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>



    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase text-nowrap bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comment
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Actions</span>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-bold text-black text-base text-nowrap">
                            {{ $record->name }}
                        </td>
                        <td class="px-6 py-4  text-black text-base text-nowrap">
                            {{ $record->email }}
                        </td>
                        <td class="px-6 py-4  overflow-x-auto text-black text-base text-nowrap">
                            {{ $record->subject }}
                        </td>
                        <td class="px-6 py-4  overflow-x-auto text-black text-base text-nowrap">
                            {{ $record->comment }}
                        </td>
                        <td class="px-6 py-3 text-right flex justify-start items-center pt-[30px] space-x-4 text-nowrap">
                            {{-- <a href="{{ route('inbox.show', $record->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a> --}}

                            <form action="{{ route('inbox.destroy', $record->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class=" text-red-600 hover:text-red-700">Delete</button>
                            </form>
                        </td>


                    </tr>
                @endforeach


            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="p-4">
            {{ $records->links() }}
        </nav>
    </div>
</x-app-layout>
