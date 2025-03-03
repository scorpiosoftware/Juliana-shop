<div class="brands-container mx-auto">
   <h2 class="brands-title">Brands</h2>
   <div class="brands-slider">
      @foreach ($brands as $brand)
      <div class="brand-item"><img src="{{ URL::to('storage/'.$brand->image_url) }}" alt="Brand 1"></div>
      @endforeach
   </div>
   <script>
        // Duplicate items for seamless loop
      const slider = document.querySelector('.brands-slider');
      const items = document.querySelectorAll('.brand-item');
    //   items.forEach(item => {
    //       const clone = item.cloneNode(true);
    //       slider.appendChild(clone);
    //   });

      // Scroll variables
      let currentTranslateX = 0;
      let scrollTimeout;
      const scrollSpeed = 0.6;
      let isAutoScroll = false;
      const autoScrollSpeed = 1.2;

      // Calculate scroll limits
      const itemWidth = items[0].offsetWidth;
      const gap = 50;
      const originalWidth = (itemWidth + gap) * items.length - gap;

      // Single continuous animation loop
    //   function animate() {
    //       if (isAutoScroll) {
    //           currentTranslateX -= autoScrollSpeed;
    //           if (currentTranslateX <= -originalWidth) {
    //               currentTranslateX += originalWidth;
    //           }
    //           slider.style.transform = `translateX(${currentTranslateX}px)`;
    //       }
    //       requestAnimationFrame(animate);
    //   }
    //   animate();

      // Mouse wheel handler
      const container = document.querySelector('.brands-container');
      container.addEventListener('wheel', (e) => {
          e.preventDefault();
          isAutoScroll = false;
          
          const delta = e.deltaY * scrollSpeed;
          currentTranslateX = Math.max(Math.min(currentTranslateX + delta, 0), -originalWidth);
          
          slider.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
          slider.style.transform = `translateX(${currentTranslateX}px)`;
          
          clearTimeout(scrollTimeout);
          scrollTimeout = setTimeout(() => {
              isAutoScroll = true;
              slider.style.transition = 'none';
          }, 3000);
      });

      // Hover effects
      document.querySelectorAll('.brand-item').forEach(item => {
          item.addEventListener('mouseenter', () => {
              item.style.transform = `rotate(${Math.random() * 4 - 2}deg) translateY(-5px) scale(1.05)`;
          });
          item.addEventListener('mouseleave', () => {
              item.style.transform = 'translateY(0) scale(1)';
          });
      });

      // Pause on container hover
      container.addEventListener('mouseenter', () => {
          isAutoScroll = false;
      });

      container.addEventListener('mouseleave', () => {
          isAutoScroll = true;
      });
  </script>
</div>
