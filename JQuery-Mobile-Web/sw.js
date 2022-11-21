self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('first-app').then(function(cache) {
      return cache.addAll([
          '/index.html',
          '/highscore.html',
          '/src/js/app.js',
          '/manifest.json',
          '/src/images/paper-btn.png',
          '/src/images/paper.png',
          '/src/images/rock-btn.png',
          '/src/images/rock.png',
          '/src/images/scissor-btn.png',
          '/src/images/scissor.png',
          '/src/images/icons-192.jpg',
          '/src/images/icons-512.png',
          '/src/images/bg.png',
          '/favicon.ico',
          'https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css',
          'https://code.jquery.com/jquery-1.11.1.min.js',
          'https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'
          
        // etc
      ]);
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    // Try the cache
    caches.match(event.request).then(function(response) {
      // Fall back to network
      return response || fetch(event.request);
    })
  );
});