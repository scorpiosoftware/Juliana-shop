<div class="product-grid md:w-[250px] w-[200px] flex-shrink-0 transition-all delay-75 hover:scale-90 wow fadeInUp" data-wow-delay="0.5s">
    <!-- Include jQuery if not already loaded globally -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    
    <div class="product-image">
        <a name="{{ $item->id }}" href="{{ route('shop.show', $item->id) }}" class="image block">
            <img src="{{ URL::to('storage/' . $item->main_image_url) }}" class="w-full">
        </a>
        @if (!empty($item->offer_price))
            <span class="product-hot-label absolute top-2 left-2 bg-red-500 text-white text-xs py-1 px-2 rounded">
                {{ session('lang') == 'en' ? 'Sale' : 'حسومات' }}
            </span>
        @endif
        <ul class="product-links flex space-x-2 items-center justify-center">
            <!-- Add to Cart -->
            <li>
                <a id="p-item-{{$item->id}}" wire:click="addToCart({{ $item->id }})" 
                   class="custom-toast.success-toast" data-tip="Add to Cart">
                    <i class="fa fa-shopping-bag"></i>
                </a>
            </li>
            <script>
                $("#p-item-{{$item->id}}").click(function(){
                    $('#cart-message').show(500);
                });
            </script>
            
            <!-- Wishlist -->
            <li>
                <a id="whishlist-{{ $item->id }}" data-tip="Add to Wishlist">
                    <i id="ico-{{ $item->id }}" class="fa fa-heart 
                        @if (session('wishlist'))
                            @foreach (session('wishlist') as $id => $details)
                                @if ($details['name'] == $item->name_en)
                                    text-red-600
                                    @break
                                @endif
                            @endforeach
                        @endif"></i>
                </a>
                <script>
                    $(document).ready(function() {
                        $("#whishlist-{{ $item->id }}").click(function() {
                            $.ajax({
                                url: "{{ route('wishlist.add', $item->id) }}",
                                type: "GET",
                                success: function(response) {
                                    setTimeout(function() {
                                        $("#ico-{{ $item->id }}").addClass("text-red-600");
                                        $('#toast-cart').show();
                                    }, 0);
                                }
                            });
                        });
                    });
                </script>
            </li>
            
            <!-- Quick View -->
            <li>
                <a href="{{ route('shop.show', $item->id) }}" data-tip="Quick View">
                    <i class="fa fa-search"></i>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="product-content p-4">
        <h3 class="text-sm md:text-xl md:text-[20px] md:font-[500] capitalize mb-2">
            <a href="#">
                @if (session('lang') == 'en')
                    {{ $item->name_en }}
                @else
                    {{ $item->name_ar }}
                @endif
            </a>
        </h3>
        <div class="flex justify-center space-x-2">
            <div class="align-bottom @if (!empty($item->offer_price)) line-through text-sm text-red-500 @else price @endif">
                ${{ $item->price }}
            </div>
            @if (!empty($item->offer_price))
                <div class="text-green-400 font-bold align-bottom text-xl">
                    ${{ $item->offer_price }}
                </div>
            @endif
        </div>
    </div>
</div>
