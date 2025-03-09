<div>
    <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
        class="inline-flex items-center justify-center p-2 bg-[#71C9CE] rounded-full text-sm font-medium leading-none text-white transition duration-300 ease-in-out transform hover:bg-[#5f9e9d] focus:ring-2 focus:ring-[#5f9e9d] focus:outline-none">
        <span class="sr-only">
            Cart
        </span>
        <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
        </svg>
        <svg class="hidden sm:flex w-4 h-4 text-white ms-1" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
        </svg>
    </button>

    <div id="myCartDropdown1"
        class="hidden z-10 mx-auto max-w-sm w-full space-y-4 overflow-hidden rounded-lg bg-[#71C9CE] p-4 shadow-lg transform transition-all duration-300 ease-in-out scale-95 hover:scale-100 antialiased">
        <livewire:cart-items />
        @if (!empty(session('cart')))
            <a href="{{ route('cart.show') }}"
                class="mb-2 inline-flex items-center justify-center w-full rounded-lg border-2 border-transparent text-white bg-[#4C9A9A] px-5 py-2.5 text-sm font-medium transition-colors duration-300 ease-in-out hover:bg-[#388f8f] focus:outline-none focus:ring-4 focus:ring-primary-300">
                Proceed to Checkout
            </a>
        @else
            <div class="w-full mx-auto text-center">
                <span class="text-white">No items in your cart!</span>
            </div>
            <div>
                <a href="{{ route('filter.products') }}"
                    class="p-2 text-sm border-2 rounded-full bg-[#4C9A9A] text-white hover:bg-[#388f8f] focus:outline-none focus:ring-2 focus:ring-[#388f8f] transition-colors duration-300 ease-in-out underline">
                    Continue shopping
                </a>
            </div>
        @endif
    </div>
</div>
