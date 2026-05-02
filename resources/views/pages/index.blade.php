<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán – Reserva moderna</title>
    <!-- Google Fonts & Swiper JS (modern CDN) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Space+Grotesk:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- Swiper CSS (latest version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #C2871B;
            --gold-light: #E0A23B;
            --gold-soft: #FEF6E6;
            --sand-bg: #FDFBF7;
            --card-white: #FFFFFF;
            --text-main: #1F1E1B;
            --text-muted: #6B6862;
            --border-light: #EFECE5;
            --shadow-xs: 0 4px 12px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
            --shadow-sm: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            --shadow-md: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
            --shadow-glow: 0 18px 35px -12px rgba(193, 130, 27, 0.15);
            --radius-xl: 32px;
            --radius-2xl: 40px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--sand-bg);
            color: var(--text-main);
            line-height: 1.4;
        }

        /* --- PRELOADER --- */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #FDFBF7;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .preloader img {
            width: 100px;
            height: auto;
            animation: softPulse 1.2s infinite ease-in-out;
        }

        @keyframes softPulse {
            0% {
                transform: scale(0.96);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.04);
                opacity: 1;
            }

            100% {
                transform: scale(0.96);
                opacity: 0.7;
            }
        }

        /* Nav moderna */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.2, 0, 0, 1);
            background: rgba(253, 251, 247, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.02);
        }

        .nav-logo-img {
            height: 44px;
            width: auto;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 36px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: -0.01em;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-cta {
            background: var(--gold);
            color: white !important;
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s;
            box-shadow: var(--shadow-xs);
            text-decoration: none;
        }

        .nav-cta:hover {
            background: var(--gold-light);
            transform: scale(0.98);
        }

        .hamburger {
            display: none;
        }

        .mobile-menu {
            display: none;
        }

        /* Hero section moderna */
        #hero {
            min-height: 96vh;
            display: flex;
            align-items: center;
            padding: 120px 48px 80px;
            position: relative;
            background: linear-gradient(145deg, #FFFDF9 0%, #FEF9F0 100%);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(194, 135, 27, 0.08);
            border-radius: 100px;
            padding: 6px 16px 6px 12px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gold);
            margin-bottom: 28px;
            backdrop-filter: blur(4px);
        }

        .hero-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(3.2rem, 7vw, 5.2rem);
            font-weight: 500;
            line-height: 1.1;
            letter-spacing: -0.03em;
            color: var(--text-main);
        }

        .hero-title em {
            color: var(--gold);
            font-style: normal;
            border-bottom: 3px solid var(--gold-light);
            display: inline-block;
        }

        .hero-sub {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 480px;
            margin: 28px 0 40px;
            line-height: 1.5;
        }

        /* Booking engine moderna */
        .booking-engine {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-2xl);
            padding: 28px 36px;
            box-shadow: var(--shadow-md), 0 0 0 1px rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .engine-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-end;
        }

        .engine-field {
            flex: 1;
            min-width: 150px;
        }

        .engine-field label {
            display: block;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .engine-field input,
        .engine-field select {
            width: 100%;
            background: rgba(253, 251, 247, 0.9);
            border: 1px solid var(--border-light);
            border-radius: 20px;
            padding: 14px 18px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .engine-field input:focus,
        .engine-field select:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(194, 135, 27, 0.1);
        }

        .search-btn {
            background: var(--gold);
            border: none;
            border-radius: 28px;
            padding: 14px 32px;
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .search-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        .booking-summary {
            margin-top: 28px;
            background: var(--card-white);
            border-radius: 24px;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-xs);
        }

        .summary-price {
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Space Grotesk', monospace;
            color: var(--gold);
        }

        /* ----- MODERN CARROUSEL (Swiper) ----- */
        .hero-image {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            background: #e9e5dd;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            height: 100%;
            min-height: 380px;
        }

        .hero-swiper {
            width: 100%;
            height: 100%;
            border-radius: inherit;
        }

        .hero-swiper .swiper-wrapper {
            height: 100%;
        }

        .hero-swiper .swiper-slide {
            width: 100%;
            height: 100%;
        }

        .hero-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        /* Estilos de navegación modernos */
        .hero-swiper .swiper-button-prev,
        .hero-swiper .swiper-button-next {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            width: 44px;
            height: 44px;
            border-radius: 60px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.2s;
        }

        .hero-swiper .swiper-button-prev:after,
        .hero-swiper .swiper-button-next:after {
            font-size: 18px;
            font-weight: bold;
            color: var(--gold);
        }

        .hero-swiper .swiper-button-prev:hover,
        .hero-swiper .swiper-button-next:hover {
            background: white;
            transform: scale(1.02);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.12);
        }

        .hero-swiper .swiper-pagination-bullet {
            background: #ffffffcc;
            opacity: 0.7;
            width: 8px;
            height: 8px;
            transition: 0.2s;
        }

        .hero-swiper .swiper-pagination-bullet-active {
            background: var(--gold);
            width: 24px;
            border-radius: 8px;
            opacity: 1;
        }

        /* Paquetes modernos */
        #paquetes {
            padding: 100px 48px;
            background: var(--card-white);
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 64px;
        }

        .section-eyebrow {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--gold);
            font-weight: 600;
            margin-bottom: 16px;
            display: block;
        }

        .section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 500;
            letter-spacing: -0.02em;
        }

        .section-title em {
            color: var(--gold);
            font-style: normal;
        }

        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pkg-card {
            background: var(--sand-bg);
            border-radius: var(--radius-xl);
            padding: 32px;
            transition: all 0.25s ease;
            border: 1px solid var(--border-light);
            backdrop-filter: blur(0px);
        }

        .pkg-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold-light);
            box-shadow: var(--shadow-glow);
            background: white;
        }

        .pkg-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .pkg-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.6rem;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .price-row-modern {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            border-bottom: 1px dashed var(--border-light);
            padding: 12px 0;
        }

        .price-adult {
            font-weight: 700;
            color: var(--gold);
            font-size: 1.1rem;
        }

        .select-pkg {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 28px;
            background: white;
            border: 1px solid var(--gold);
            border-radius: 40px;
            padding: 12px;
            font-weight: 600;
            color: var(--gold);
            text-decoration: none;
            transition: all 0.2s;
        }

        .select-pkg:hover {
            background: var(--gold);
            color: white;
        }

        .offer-strip {
            background: linear-gradient(110deg, #F2E6D5, #FEF3E6);
            padding: 18px;
            text-align: center;
            font-weight: 500;
            color: var(--gold);
            border-top: 1px solid rgba(0, 0, 0, 0.02);
            border-bottom: 1px solid rgba(0, 0, 0, 0.02);
        }

        .steps-modern {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 60px 0;
        }

        .step-card {
            background: white;
            border-radius: 28px;
            padding: 32px;
            text-align: center;
            flex: 1;
            min-width: 200px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
        }

        footer {
            background: #F6F3EE;
            padding: 70px 48px 40px;
            border-top: 1px solid var(--border-light);
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            nav {
                padding: 16px 24px;
            }

            .nav-links,
            .nav-cta {
                display: none;
            }

            .hamburger {
                display: flex;
                flex-direction: column;
                gap: 5px;
                background: none;
                border: none;
                cursor: pointer;
            }

            .hamburger span {
                width: 24px;
                height: 2px;
                background: var(--text-main);
                transition: 0.2s;
            }

            .mobile-menu {
                display: none;
                position: fixed;
                inset: 0;
                background: white;
                z-index: 99;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 30px;
                font-size: 1.4rem;
            }

            .mobile-menu a {
                color: var(--text-main);
                text-decoration: none;
                font-weight: 500;
            }

            .mobile-menu.open {
                display: flex;
            }

            #hero {
                padding: 100px 24px 60px;
            }

            #paquetes {
                padding: 70px 24px;
            }

            .hero-image {
                min-height: 340px;
            }

            .hero-swiper .swiper-button-prev,
            .hero-swiper .swiper-button-next {
                width: 36px;
                height: 36px;
            }

            .hero-swiper .swiper-button-prev:after,
            .hero-swiper .swiper-button-next:after {
                font-size: 14px;
            }
        }

        @media (max-width: 640px) {
            .booking-engine {
                padding: 20px;
            }

            .hero-image {
                min-height: 280px;
            }
        }
    </style>
</head>

<body>

    <!-- PRELOADER con logo.png centrado -->
    <div class="preloader" id="preloader">
        <img src="logo.png" alt="Hecho en Teoti">
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <a href="#paquetes">Paquetes</a>
        <a href="#como-funciona">Experiencia</a>
        <a href="#galeria">Galería</a>
        <a href="#reserva">Reservar</a>
    </div>

    <nav id="main-nav">
        <a href="#" class="nav-logo">
            <img src="logo.png" alt="Hecho en Teoti" class="nav-logo-img">
        </a>
        <ul class="nav-links">
            <li><a href="#paquetes">Paquetes</a></li>
            <li><a href="#como-funciona">Experiencia</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#reserva">Reservar</a></li>
        </ul>
        <a href="#reserva" class="nav-cta">Reservar vuelo</a>
        <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </nav>

    <!-- Hero con carrusel Swiper completamente integrado -->
    <section id="hero">
        <div class="hero-grid">
            <div>
                <div class="hero-badge">✨ vuelo al amanecer · Teotihuacán</div>
                <h1 class="hero-title">Despierta sobre <em>las pirámides</em></h1>
                <p class="hero-sub">La experiencia más mágica de México. Vuela en globo al amanecer con seguridad y
                    comodidad.</p>
                <div class="booking-engine">
                    <div class="engine-row">
                        <div class="engine-field">
                            <label>📅 Fecha</label>
                            <input type="date" id="bookingDate" value="2026-06-20">
                        </div>
                        <div class="engine-field">
                            <label>👥 Adultos</label>
                            <input type="number" id="adultsCount" value="2" min="1">
                        </div>
                        <div class="engine-field">
                            <label>🧒 Niños (4-10)</label>
                            <input type="number" id="childrenCount" value="0" min="0">
                        </div>
                        <div class="engine-field">
                            <label>🎈 Paquete</label>
                            <select id="packageSelect">
                                <option value="1">Vuelo en globo</option>
                                <option value="2">Vuelo + Desayuno</option>
                                <option value="3">+ Transporte CDMX + Desayuno</option>
                                <option value="4">Completo + Pirámides</option>
                            </select>
                        </div>
                        <button class="search-btn" id="searchBtn">🔍 Buscar vuelos</button>
                    </div>
                    <div class="booking-summary">
                        <span id="summaryText" style="color: var(--text-muted);">20 jun 2026 · 2 adultos · Vuelo en
                            globo</span>
                        <span class="summary-price" id="totalDisplay">$4,398 MXN</span>
                    </div>
                </div>
            </div>
            <!-- CARROUSEL SWIPER - IMÁGENES DINÁMICAS Y MODERNAS -->
            <div class="hero-image">
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=1000&q=85"
                                alt="Globo sobre pirámide Teotihuacán amanecer">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?auto=format&fit=crop&w=1000&q=85"
                                alt="Vuelo en globo con vista arqueológica">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1506703719100-f0b3c5c4fea0?auto=format&fit=crop&w=1000&q=85"
                                alt="Amanecer mágico en globo aerostático">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1534777367038-9404f45b869b?auto=format&fit=crop&w=1000&q=85"
                                alt="Globos y pirámide del sol Teotihuacán">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1621760874155-995ec1eb23de?auto=format&fit=crop&w=1000&q=85"
                                alt="Experiencia premium en globo">
                        </div>
                    </div>
                    <!-- Navegación y paginación modernas -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="offer-strip">🎈 OFERTA EXCLUSIVA: 12% OFF en grupos de 4+ personas · Código: TEOTI2025 🎈</div>

    <!-- Paquetes con precios reales -->
    <section id="paquetes">
        <div class="section-header">
            <span class="section-eyebrow">Nuestros paquetes</span>
            <h2 class="section-title">Elige tu <em>aventura</em></h2>
        </div>
        <div class="pkg-grid" id="packagesGrid">
            <div class="pkg-card" data-pkg-id="1">
                <div class="pkg-icon">🎈</div>
                <div class="pkg-name">Vuelo esencial</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,199</span></div>
                <div class="price-row-modern"><span>Niño (4-10)</span><span>$1,999</span></div>
                <div class="badge-pkg" style="margin: 12px 0; font-size:0.7rem; color:var(--gold);">✅ Brindis +
                    diploma
                </div>
                <a href="#" class="select-pkg" data-pkg="1">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="2">
                <div class="pkg-icon">🍳</div>
                <div class="pkg-name">Vuelo + Desayuno</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,299</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,149</span></div>
                <div class="badge-pkg" style="margin: 12px 0;">🍽️ Desayuno en hacienda</div>
                <a href="#" class="select-pkg" data-pkg="2">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="3">
                <div class="pkg-icon">🚐</div>
                <div class="pkg-name">Todo incluido (CDMX)</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,749</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,599</span></div>
                <div class="badge-pkg">🚐 Transporte redondo + desayuno</div>
                <a href="#" class="select-pkg" data-pkg="3">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="4">
                <div class="pkg-icon">🏛️</div>
                <div class="pkg-name">Experiencia completa</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,949</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,799</span></div>
                <div class="badge-pkg">🏛️ Acceso pirámides + guía</div>
                <a href="#" class="select-pkg" data-pkg="4">Seleccionar</a>
            </div>
        </div>
    </section>

    <!-- Cómo funciona moderno -->
    <section id="como-funciona" style="padding: 60px 48px; background: var(--sand-bg);">
        <div class="section-header">
            <span class="section-eyebrow">Simple y rápido</span>
            <h2 class="section-title">Reserva en <em>3 pasos</em></h2>
        </div>
        <div class="steps-modern">
            <div class="step-card"><span style="font-size: 2rem;">📅</span>
                <h3 style="margin: 12px 0;">1. Elige fecha</h3>
                <p style="color: var(--text-muted);">Selecciona tu día preferido</p>
            </div>
            <div class="step-card"><span style="font-size: 2rem;">🎈</span>
                <h3 style="margin: 12px 0;">2. Elige paquete</h3>
                <p style="color: var(--text-muted);">Adultos y niños</p>
            </div>
            <div class="step-card"><span style="font-size: 2rem;">✅</span>
                <h3 style="margin: 12px 0;">3. Confirma y vuela</h3>
                <p style="color: var(--text-muted);">Voucher en minutos</p>
            </div>
        </div>
        <div
            style="background: white; border-radius: 28px; padding: 24px; text-align: center; max-width: 500px; margin: 20px auto 0;">
            📆 Disponibilidad: <strong>20, 21, 22, 27, 28 de junio</strong> — ¡últimos lugares!
        </div>
    </section>

    <!-- Galería moderna -->
    <section id="galeria" style="padding: 80px 48px; background: white;">
        <div class="section-header">
            <span class="section-eyebrow">Recuerdos reales</span>
            <h2 class="section-title">Momentos <em>únicos</em></h2>
        </div>
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; max-width: 1400px; margin: 0 auto;">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;" loading="lazy">
            <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;" loading="lazy">
            <img src="https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;" loading="lazy">
            <img src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;" loading="lazy">
        </div>
    </section>

    <!-- Reserva final -->
    <section id="reserva" style="padding: 80px 48px; background: var(--sand-bg);">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <span class="section-eyebrow">Asegura tu lugar</span>
            <h2 class="section-title">¿Listo para <em>despegar?</em></h2>
            <div
                style="background: white; border-radius: 36px; padding: 44px; margin-top: 40px; box-shadow: var(--shadow-md);">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <input type="text" id="nombreReserva" placeholder="Nombre completo"
                        style="padding: 16px; border-radius: 24px; border: 1px solid var(--border-light); background: var(--sand-bg);">
                    <input type="email" id="emailReserva" placeholder="Correo electrónico"
                        style="padding: 16px; border-radius: 24px; border: 1px solid var(--border-light); background: var(--sand-bg);">
                    <input type="tel" id="whatsappReserva" placeholder="WhatsApp"
                        style="padding: 16px; border-radius: 24px; border: 1px solid var(--border-light); background: var(--sand-bg);">
                    <select id="paqueteFinal"
                        style="padding: 16px; border-radius: 24px; border: 1px solid var(--border-light); background: var(--sand-bg);">
                        <option value="1">Vuelo en globo</option>
                        <option value="2">Vuelo + Desayuno</option>
                        <option value="3">+ Transporte CDMX + Desayuno</option>
                        <option value="4">Completo + Pirámides</option>
                    </select>
                </div>
                <button id="submitReserva"
                    style="margin-top: 32px; background: var(--gold); border: none; padding: 16px 36px; border-radius: 60px; font-weight: 700; color: white; font-size: 1rem; cursor: pointer;">Solicitar
                    reservación →</button>
                <p style="margin-top: 28px; font-size: 0.75rem; color: var(--text-muted);">Te contactamos en menos de 2
                    horas para confirmar disponibilidad y pago seguro.</p>
            </div>
        </div>
    </section>

    <footer>
        <div
            style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 40px;">
            <div><strong style="font-family:'Space Grotesk'; font-size: 1.5rem;">hecho<span
                        style="color:var(--gold);">en</span>teoti</strong><br>Desde 2009
                · Experiencias únicas</div>
            <div><strong>Contacto</strong><br>📞 55 4321 8765<br>✉️ vuelos@hechoenteoti.mx</div>
            <div><strong>Información</strong><br>Políticas de clima<br>Términos y condiciones</div>
            <div><strong>Redes</strong><br>📷 IG · 🎵 TT · 📘 FB</div>
        </div>
        <div style="text-align: center; margin-top: 60px; font-size: 0.75rem; color: var(--text-muted);">© 2025 Hecho
            en Teoti · Pilotos certificados AFAC</div>
    </footer>

    <!-- Scripts: Swiper JS + lógica del sitio + preloader -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Inicializar Swiper (carrusel moderno con loop, autoplay y diseño responsive premium)
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            effect: 'slide',
            speed: 800,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 0,
        });

        // Precios y lógica del sitio
        const prices = {
            1: {
                adult: 2199,
                child: 1999,
                name: "Vuelo en globo"
            },
            2: {
                adult: 2299,
                child: 2149,
                name: "Vuelo + Desayuno"
            },
            3: {
                adult: 2749,
                child: 2599,
                name: "Vuelo + Transporte + Desayuno"
            },
            4: {
                adult: 2949,
                child: 2799,
                name: "Paquete completo + Pirámides"
            }
        };

        function updateSummary() {
            const adults = parseInt(document.getElementById('adultsCount').value) || 0;
            const children = parseInt(document.getElementById('childrenCount').value) || 0;
            const pkgId = parseInt(document.getElementById('packageSelect').value);
            const pkg = prices[pkgId];
            const total = (adults * pkg.adult) + (children * pkg.child);
            const date = document.getElementById('bookingDate').value;
            const formattedDate = date ? new Date(date).toLocaleDateString('es-MX') : 'fecha';
            document.getElementById('summaryText').innerHTML =
                `${formattedDate} · ${adults} adultos, ${children} niños · ${pkg.name}`;
            document.getElementById('totalDisplay').innerHTML = `$${total.toLocaleString()} MXN`;
        }

        document.getElementById('adultsCount').addEventListener('input', updateSummary);
        document.getElementById('childrenCount').addEventListener('input', updateSummary);
        document.getElementById('packageSelect').addEventListener('change', updateSummary);
        document.getElementById('bookingDate').addEventListener('change', updateSummary);
        document.getElementById('searchBtn').addEventListener('click', () => {
            updateSummary();
            document.getElementById('paquetes').scrollIntoView({
                behavior: 'smooth'
            });
        });

        document.querySelectorAll('.select-pkg').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const pkgId = btn.getAttribute('data-pkg');
                if (pkgId) document.getElementById('packageSelect').value = pkgId;
                updateSummary();
                document.getElementById('hero').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.getElementById('submitReserva').addEventListener('click', () => {
            const nombre = document.getElementById('nombreReserva').value;
            if (!nombre || !document.getElementById('emailReserva').value || !document.getElementById(
                    'whatsappReserva').value) {
                alert("Completa todos los datos para solicitar tu reserva");
            } else {
                alert(`✨ ¡Gracias ${nombre}! Te contactaremos por WhatsApp para confirmar tu vuelo en globo.`);
            }
        });

        const ham = document.getElementById('hamburger');
        const mobMenu = document.getElementById('mobile-menu');
        ham.addEventListener('click', () => {
            ham.classList.toggle('open');
            mobMenu.classList.toggle('open');
        });
        document.querySelectorAll('.mobile-menu a').forEach(l => l.addEventListener('click', () => {
            ham.classList.remove('open');
            mobMenu.classList.remove('open');
        }));

        window.addEventListener('scroll', () => {
            const nav = document.getElementById('main-nav');
            nav.style.backdropFilter = window.scrollY > 50 ? "blur(20px)" : "blur(12px)";
        });
        updateSummary();

        // Ocultar preloader cuando todo esté cargado (incluyendo imágenes del Swiper)
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.classList.add('hidden');
                // Remover del DOM después de la transición
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }
        });
        // Fallback por si load no se dispara rápido (ej. caché)
        setTimeout(() => {
            const preloader = document.getElementById('preloader');
            if (preloader && !preloader.classList.contains('hidden')) {
                preloader.classList.add('hidden');
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }
        }, 2000);
    </script>
</body>

</html>
