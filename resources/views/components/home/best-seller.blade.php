<div class=" pt-4 max-w-screen-xl mx-auto wow fadeInUp">
    <div class="flex items-center justify-center">
        <div class="block justify-center items-center">
            <span class="font-bold">{{ $title }}</span>
            <div class="flex justify-center items-center mt-2">
                <a href="{{ route('shop.index') }}"
                    class="font-bold text-green-300 transition-all delay-75 hover:scale-150 hover:underline">
                    {{ session('lang') == 'en' ? 'view all' : 'عرض الكل' }}
                </a>
            </div>

        </div>
    </div>

    <div class="relative w-full max-w-screen-xl mx-auto">
        <div id="scrollContainer" class="flex space-x-4 overflow-x-scroll scroll-smooth p-4">
            @foreach ($bestSeller as $item)
                <livewire:product :item="$item">
                    <livewire:product :item="$item">
                        <livewire:product :item="$item">
                            <livewire:product :item="$item">
                                <livewire:product :item="$item">
                                    <livewire:product :item="$item">
                                        <livewire:product :item="$item">
                                            <livewire:product :item="$item">
                                                <livewire:product :item="$item">
            @endforeach
        </div>
        <button id="prevBtn"
            class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">◀</button>
        <button id="nextBtn"
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">▶</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollContainer = document.getElementById('scrollContainer');
            const itemWidth = 250 + 16; // 250px fixed width plus any gap (adjust if needed)
            const scrollAmount = itemWidth * 3; // For 3 items
    
            document.getElementById('nextBtn').addEventListener('click', () => {
                scrollContainer.scrollLeft += scrollAmount;
            });
    
            document.getElementById('prevBtn').addEventListener('click', () => {
                scrollContainer.scrollLeft -= scrollAmount;
            });
        });
    </script>
</div>
