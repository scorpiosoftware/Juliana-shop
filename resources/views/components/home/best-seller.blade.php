<div class="pt-4 max-w-screen-xl mx-auto wow fadeInUp">
    <div class="flex justify-start items-center px-8">
        <div class="flex justify-between items-center space-x-3">
            <div class="font-bold">{{ $title }}</div>
            <div>
                <a href="{{ route('shop.index') }}"
                    class="font-bold text-green-300 transition-all delay-75 hover:scale-150 hover:underline">
                    {{ session('lang') == 'en' ? 'view all' : 'عرض الكل' }}
                </a>
            </div>

        </div>
        
    </div>
    <div class=" border px-8 mt-2"></div>
  

    <div class="relative w-full max-w-screen-xl mx-auto">
        <div id="scrollContainer-{{ $bestSeller[0]->categories()->first()->id }}" class="flex space-x-4 overflow-x-hidden scroll-smooth p-4">
            @foreach ($bestSeller as $item)
                <livewire:product :item="$item">
                <livewire:product :item="$item">
                <livewire:product :item="$item">
                <livewire:product :item="$item">
                <livewire:product :item="$item">
                    <livewire:product :item="$item">
            @endforeach
        </div>
        <button id="prevBtn-{{ $bestSeller[0]->categories()->first()->id }}"
            class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">◀</button>
        <button id="nextBtn-{{ $bestSeller[0]->categories()->first()->id }}"
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">▶</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.getElementById('scrollContainer-{{ $bestSeller[0]->categories()->first()->id }}');
            const itemWidth = 250 + 16; // 250px fixed width plus any gap (adjust if needed)
            const scrollAmount = itemWidth * 1; // For 3 items

            document.getElementById('nextBtn-{{ $bestSeller[0]->categories()->first()->id }}').addEventListener('click', () => {
                scrollContainer.scrollLeft += scrollAmount;
            });

            document.getElementById('prevBtn-{{ $bestSeller[0]->categories()->first()->id }}').addEventListener('click', () => {
                scrollContainer.scrollLeft -= scrollAmount;
            });
        });
    </script>
</div>
