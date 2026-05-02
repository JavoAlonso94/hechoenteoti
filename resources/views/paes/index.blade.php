<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="description" content="Hecho en Teoti - Descubre la magia de nuestro pueblo.">
  <title>Hecho en Teoti | Artesanía & Experiencias</title>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- AOS (Animate on Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Fuentes de Google -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }
    /* Overlay suave para el Hero */
    .hero-overlay {
      background: radial-gradient(circle at 50% 50%, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
    }
    /* Canvas de Three.js */
    #bg-canvas {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -2;
      width: 100vw;
      height: 100vh;
      pointer-events: none;
    }
  </style>
</head>
<body class="bg-white text-gray-900 antialiased overflow-x-hidden">

  <!-- Fondo 3D con Three.js -->
  <canvas id="bg-canvas"></canvas>

  <!-- Header / Navegación -->
  <header class="fixed top-0 left-0 w-full z-50 transition-all duration-500" id="main-header">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <a href="#" class="text-2xl font-black tracking-tight text-white drop-shadow-lg">
        hecho<span class="text-amber-400">en</span>teoti
      </a>
      <nav class="hidden md:flex space-x-8 text-sm font-semibold uppercase tracking-widest text-white/90">
        <a href="#inicio" class="hover:text-amber-400 transition-colors">Inicio</a>
        <a href="#servicios" class="hover:text-amber-400 transition-colors">Servicios</a>
        <a href="#galeria" class="hover:text-amber-400 transition-colors">Galería</a>
        <a href="#testimonios" class="hover:text-amber-400 transition-colors">Testimonios</a>
        <a href="#contacto" class="hover:text-amber-400 transition-colors">Contacto</a>
      </nav>
      <button class="md:hidden text-white focus:outline-none" id="mobile-menu-button">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Imagen de fondo (reemplaza con tu propia imagen) -->
    <div class="absolute inset-0 z-0">
      <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" 
           alt="Valle de Teotihuacán" 
           class="w-full h-full object-cover scale-110 animate-slow-zoom">
    </div>
    <div class="hero-overlay absolute inset-0 z-10"></div>

    <div class="relative z-20 text-center max-w-5xl px-6 mt-12">
      <span class="inline-block px-4 py-2 rounded-full bg-amber-400/20 backdrop-blur-md text-amber-300 text-sm font-semibold tracking-widest mb-6 border border-amber-400/30">
        EXPERIENCIA ÚNICA
      </span>
      <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-8 leading-none drop-shadow-2xl"
          data-aos="fade-up" data-aos-delay="100">
        Hecho en <span class="text-amber-400">Teoti</span>
      </h1>
      <p class="text-lg md:text-2xl text-white/80 max-w-3xl mx-auto mb-12 font-light leading-relaxed"
         data-aos="fade-up" data-aos-delay="300">
        Artesanías con alma, sabores que enamoran y experiencias que conectan con la esencia de nuestra tierra.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="500">
        <a href="#servicios" class="px-10 py-4 bg-amber-500 hover:bg-amber-600 text-black font-bold rounded-full transition-all transform hover:scale-105 shadow-xl shadow-amber-500/30">
          Descubrir más
        </a>
        <a href="#contacto" class="px-10 py-4 bg-transparent border-2 border-white/30 hover:border-white text-white font-bold rounded-full transition-all backdrop-blur-sm">
          Contáctanos
        </a>
      </div>
    </div>

    <!-- Scroll down indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
      <svg class="w-8 h-8 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
      </svg>
    </div>
  </section>

  <!-- Servicios -->
  <section id="servicios" class="py-32 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20" data-aos="fade-up">
        <span class="text-amber-600 font-semibold tracking-widest text-sm">LO QUE HACEMOS</span>
        <h2 class="text-4xl md:text-6xl font-black mt-4 text-gray-900">Nuestros Servicios</h2>
        <div class="w-20 h-1.5 bg-amber-500 mx-auto mt-6 rounded-full"></div>
      </div>

      <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
        <!-- Tarjeta 1 -->
        <div class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100"
             data-aos="fade-right" data-aos-delay="0">
          <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
            <span class="text-3xl">🛍️</span>
          </div>
          <h3 class="text-2xl font-bold mb-4">Artesanías Locales</h3>
          <p class="text-gray-600 leading-relaxed">Piezas únicas hechas a mano por artesanos de la región, preservando tradiciones centenarias.</p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100"
             data-aos="fade-up" data-aos-delay="150">
          <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
            <span class="text-3xl">🍽️</span>
          </div>
          <h3 class="text-2xl font-bold mb-4">Gastronomía Típica</h3>
          <p class="text-gray-600 leading-relaxed">Sabores auténticos que narran la historia de nuestro pueblo en cada plato.</p>
        </div>

        <!-- Tarjeta 3 -->
        <div class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100"
             data-aos="fade-left" data-aos-delay="300">
          <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
            <span class="text-3xl">🎈</span>
          </div>
          <h3 class="text-2xl font-bold mb-4">Experiencias Únicas</h3>
          <p class="text-gray-600 leading-relaxed">Vive momentos inolvidables: desde globos aerostáticos hasta tours culturales.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Galería -->
  <section id="galeria" class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20" data-aos="fade-up">
        <span class="text-amber-600 font-semibold tracking-widest text-sm">NUESTRO TRABAJO</span>
        <h2 class="text-4xl md:text-6xl font-black mt-4 text-gray-900">Galería</h2>
        <div class="w-20 h-1.5 bg-amber-500 mx-auto mt-6 rounded-full"></div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="aspect-square rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="0">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=300&q=80" alt="Artesanía" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        </div>
        <div class="aspect-square rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="100">
          <img src="https://images.unsplash.com/photo-1505253716362-afbba10bfd26?auto=format&fit=crop&w=300&q=80" alt="Comida típica" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        </div>
        <div class="aspect-square rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="200">
          <img src="https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?auto=format&fit=crop&w=300&q=80" alt="Cerámica" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        </div>
        <div class="aspect-square rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="300">
          <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=300&q=80" alt="Paisaje" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonios -->
  <section id="testimonios" class="py-32 bg-amber-50">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20" data-aos="fade-up">
        <span class="text-amber-600 font-semibold tracking-widest text-sm">LO QUE DICEN</span>
        <h2 class="text-4xl md:text-6xl font-black mt-4 text-gray-900">Testimonios</h2>
        <div class="w-20 h-1.5 bg-amber-500 mx-auto mt-6 rounded-full"></div>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-10 rounded-3xl shadow-lg" data-aos="flip-left" data-aos-delay="0">
          <div class="flex items-center gap-1 mb-4 text-amber-400 text-xl">★★★★★</div>
          <p class="text-gray-700 italic mb-6">“Una experiencia mágica. Las artesanías son de una calidad increíble y el trato es muy cálido.”</p>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-amber-200"></div>
            <div>
              <p class="font-bold text-sm">María G.</p>
              <p class="text-xs text-gray-500">Visitante frecuente</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-10 rounded-3xl shadow-lg" data-aos="flip-up" data-aos-delay="200">
          <div class="flex items-center gap-1 mb-4 text-amber-400 text-xl">★★★★★</div>
          <p class="text-gray-700 italic mb-6">“Los sabores de la comida típica me transportaron a mi infancia. ¡Totalmente recomendado!”</p>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-green-200"></div>
            <div>
              <p class="font-bold text-sm">Carlos R.</p>
              <p class="text-xs text-gray-500">Foodie & viajero</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-10 rounded-3xl shadow-lg" data-aos="flip-right" data-aos-delay="400">
          <div class="flex items-center gap-1 mb-4 text-amber-400 text-xl">★★★★★</div>
          <p class="text-gray-700 italic mb-6">“El tour en globo fue el sueño de mi vida. Hecho en Teoti lo hizo posible con toda seguridad.”</p>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-purple-200"></div>
            <div>
              <p class="font-bold text-sm">Ana L.</p>
              <p class="text-xs text-gray-500">Aventurera</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contacto -->
  <section id="contacto" class="py-32 bg-white">
    <div class="max-w-4xl mx-auto px-6">
      <div class="text-center mb-20" data-aos="fade-up">
        <span class="text-amber-600 font-semibold tracking-widest text-sm">ESCRÍBENOS</span>
        <h2 class="text-4xl md:text-6xl font-black mt-4 text-gray-900">Contacto</h2>
        <div class="w-20 h-1.5 bg-amber-500 mx-auto mt-6 rounded-full"></div>
      </div>

      <form class="space-y-6" data-aos="fade-up" data-aos-delay="200">
        <div class="grid sm:grid-cols-2 gap-6">
          <input type="text" placeholder="Nombre completo" class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition">
          <input type="email" placeholder="Correo electrónico" class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition">
        </div>
        <textarea rows="5" placeholder="Déjanos tu mensaje..." class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition resize-none"></textarea>
        <button type="submit" class="w-full sm:w-auto px-12 py-4 bg-amber-500 hover:bg-amber-600 text-black font-bold rounded-full transition-all transform hover:scale-105 shadow-lg shadow-amber-500/20 mx-auto block">
          Enviar mensaje
        </button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-center md:text-left">
      <div>
        <h3 class="text-2xl font-black mb-4">hecho<span class="text-amber-400">en</span>teoti</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Rescatando la esencia de Teotihuacán a través de sus artesanías, sabores y experiencias.</p>
      </div>
      <div>
        <h4 class="text-lg font-bold mb-4 text-amber-400">Enlaces</h4>
        <ul class="space-y-3 text-sm text-gray-400">
          <li><a href="#" class="hover:text-white transition">Inicio</a></li>
          <li><a href="#" class="hover:text-white transition">Servicios</a></li>
          <li><a href="#" class="hover:text-white transition">Galería</a></li>
          <li><a href="#" class="hover:text-white transition">Contacto</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-bold mb-4 text-amber-400">Síguenos</h4>
        <div class="flex justify-center md:justify-start space-x-4 text-2xl">
          <a href="#" class="text-gray-400 hover:text-amber-400 transition">📷</a>
          <a href="#" class="text-gray-400 hover:text-amber-400 transition">📘</a>
          <a href="#" class="text-gray-400 hover:text-amber-400 transition">🐦</a>
          <a href="#" class="text-gray-400 hover:text-amber-400 transition">📌</a>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-600">
      © 2025 Hecho en Teoti. Todos los derechos reservados.
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

  <script>
    // Inicializar AOS
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 50,
    });

    // Animación del header al hacer scroll
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('bg-black/60', 'backdrop-blur-md');
        header.classList.remove('bg-transparent');
      } else {
        header.classList.remove('bg-black/60', 'backdrop-blur-md');
        header.classList.add('bg-transparent');
      }
    });

    // Animación GSAP para el hero
    gsap.fromTo('.animate-slow-zoom', 
      { scale: 1 }, 
      { scale: 1.1, duration: 4, ease: 'power2.out', repeat: -1, yoyo: true }
    );

    // Fondo 3D simple con Three.js (partículas etéreas)
    const canvas = document.getElementById('bg-canvas');
    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 30;

    const geometry = new THREE.BufferGeometry();
    const particlesCount = 800;
    const posArray = new Float32Array(particlesCount * 3);
    for (let i = 0; i < particlesCount * 3; i++) {
      posArray[i] = (Math.random() - 0.5) * 50;
    }
    geometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

    const material = new THREE.PointsMaterial({
      size: 0.15,
      color: 0xfbbf24,
      transparent: true,
      blending: THREE.AdditiveBlending,
      opacity: 0.6,
    });

    const particles = new THREE.Points(geometry, material);
    scene.add(particles);

    function animateParticles() {
      requestAnimationFrame(animateParticles);
      particles.rotation.y += 0.0005;
      particles.rotation.x += 0.0002;
      renderer.render(scene, camera);
    }
    animateParticles();

    window.addEventListener('resize', () => {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });
  </script>

  <!-- Animación adicional CSS -->
  <style>
    @keyframes slowZoom {
      0% { transform: scale(1); }
      100% { transform: scale(1.1); }
    }
    .animate-slow-zoom {
      animation: slowZoom 8s ease-in-out infinite alternate;
    }
  </style>
</body>
</html>