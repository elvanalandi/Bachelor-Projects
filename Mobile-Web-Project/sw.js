self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('first-app').then(function(cache) {
      return cache.addAll([
          '/index.php',
          '/navbar.php',
          '/highscore.php',
          '/src/css/styles.css',
          '/src/js/script.js',
          '/src/js/app.js',
          '/manifest.json',
          '/src/images/paper-btn.png',
          '/src/images/paper.png',
          '/src/images/rock-btn.png',
          '/src/images/rock.png',
          '/src/images/scissor-btn.png',
          '/src/images/scissor.png',
          '/bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css',
          '/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.min.js'
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