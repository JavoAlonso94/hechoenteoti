<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán – Reserva moderna</title>
    <!-- Google Fonts: Permanent Marker + Montserrat -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Permanent+Marker&display=swap"
        rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --azul-cielo: #377FF0;
            --rosa-cta: #E94297;
            --rosa-hover: #d12c85;
            --amarillo-acento: #F7C035;
            --fucsia-acento: #EF489B;
            --blanco: #FFFFFF;
            --negro-suave: #1A1A1A;
            --gris-claro: #F5F5F5;
            --gris-borde: #E0E0E0;
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --radius-xl: 32px;
            --radius-2xl: 40px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--azul-cielo);
            color: var(--blanco);
            line-height: 1.5;
        }

        /* --- PRELOADER --- */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--azul-cielo);
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
            transition: all 0.3s ease;
            background: rgba(55, 127, 240, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
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
            color: var(--blanco);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: -0.01em;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--amarillo-acento);
        }

        .nav-cta {
            background: var(--rosa-cta);
            color: var(--blanco) !important;
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            transition: all 0.2s;
            box-shadow: var(--shadow-sm);
            text-decoration: none;
        }

        .nav-cta:hover {
            background: var(--rosa-hover);
            transform: scale(0.98);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .hamburger span {
            width: 24px;
            height: 2px;
            background: var(--blanco);
            transition: 0.2s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: var(--azul-cielo);
            z-index: 99;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 30px;
            font-size: 1.4rem;
        }

        .mobile-menu a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 700;
        }

        .mobile-menu.open {
            display: flex;
        }

        /* Sección Hero */
        #hero {
            min-height: 96vh;
            display: flex;
            align-items: center;
            padding: 120px 48px 80px;
            background: var(--azul-cielo);
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
            background: rgba(247, 192, 53, 0.2);
            border-radius: 100px;
            padding: 6px 16px 6px 12px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--amarillo-acento);
            margin-bottom: 28px;
            backdrop-filter: blur(4px);
        }

        .hero-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(3.2rem, 7vw, 5.2rem);
            font-weight: 400;
            line-height: 1.1;
            color: var(--blanco);
            margin-bottom: 20px;
        }

        .hero-title em {
            color: var(--amarillo-acento);
            font-style: normal;
            border-bottom: 3px solid var(--rosa-cta);
            display: inline-block;
        }

        .hero-sub {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 480px;
            margin: 20px 0 40px;
            font-weight: 500;
        }

        /* Booking engine adaptada */
        .booking-engine {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-2xl);
            padding: 28px 36px;
            box-shadow: var(--shadow-md);
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
            font-weight: 800;
            text-transform: uppercase;
            color: var(--rosa-cta);
            margin-bottom: 8px;
        }

        .engine-field input,
        .engine-field select {
            width: 100%;
            background: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 20px;
            padding: 14px 18px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            color: var(--negro-suave);
            transition: all 0.2s;
        }

        .engine-field input:focus,
        .engine-field select:focus {
            outline: none;
            border-color: var(--amarillo-acento);
            box-shadow: 0 0 0 3px rgba(247, 192, 53, 0.2);
        }

        .search-btn {
            background: var(--rosa-cta);
            border: none;
            border-radius: 28px;
            padding: 14px 32px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--blanco);
            cursor: pointer;
            transition: all 0.2s;
        }

        .search-btn:hover {
            background: var(--rosa-hover);
            transform: translateY(-2px);
        }

        .booking-summary {
            margin-top: 28px;
            background: var(--blanco);
            border-radius: 24px;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid var(--gris-borde);
            color: var(--negro-suave);
        }

        .summary-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--rosa-cta);
        }

        /* Carrusel */
        .hero-image {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            background: #1a1a1a;
            min-height: 380px;
        }

        .hero-swiper {
            width: 100%;
            height: 100%;
        }

        .hero-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-swiper .swiper-button-prev,
        .hero-swiper .swiper-button-next {
            background: rgba(255, 255, 255, 0.9);
            width: 44px;
            height: 44px;
            border-radius: 60px;
        }

        .hero-swiper .swiper-button-prev:after,
        .hero-swiper .swiper-button-next:after {
            font-size: 18px;
            font-weight: bold;
            color: var(--rosa-cta);
        }

        .hero-swiper .swiper-pagination-bullet-active {
            background: var(--amarillo-acento);
        }

        /* Paquetes (fondo claro, texto oscuro) */
        #paquetes {
            padding: 100px 48px;
            background: var(--blanco);
            color: var(--negro-suave);
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
            color: var(--rosa-cta);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            color: var(--negro-suave);
        }

        .section-title em {
            color: var(--azul-cielo);
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
            background: var(--gris-claro);
            border-radius: var(--radius-xl);
            padding: 32px;
            transition: all 0.25s ease;
            border: 1px solid var(--gris-borde);
        }

        .pkg-card:hover {
            transform: translateY(-8px);
            border-color: var(--amarillo-acento);
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.1);
        }

        .pkg-name {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.8rem;
            font-weight: 400;
            margin: 12px 0;
            color: var(--negro-suave);
        }

        .price-row-modern {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px dashed var(--gris-borde);
            padding: 12px 0;
            color: var(--negro-suave);
        }

        .price-adult {
            font-weight: 800;
            color: var(--rosa-cta);
            font-size: 1.1rem;
        }

        .select-pkg {
            display: inline-flex;
            justify-content: center;
            width: 100%;
            margin-top: 28px;
            background: var(--rosa-cta);
            border: none;
            border-radius: 40px;
            padding: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--blanco);
            text-decoration: none;
            transition: all 0.2s;
        }

        .select-pkg:hover {
            background: var(--rosa-hover);
        }

        .offer-strip {
            background: var(--amarillo-acento);
            color: var(--negro-suave);
            padding: 14px;
            text-align: center;
            font-weight: 700;
        }

        /* Pasos */
        #como-funciona {
            padding: 60px 48px;
            background: var(--gris-claro);
            color: var(--negro-suave);
        }

        .steps-modern {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 60px 0;
        }

        .step-card {
            background: var(--blanco);
            border-radius: 28px;
            padding: 32px;
            text-align: center;
            flex: 1;
            min-width: 200px;
            box-shadow: var(--shadow-sm);
        }

        /* Galería */
        #galeria {
            padding: 80px 48px;
            background: var(--blanco);
        }

        /* Reserva final */
        #reserva {
            padding: 80px 48px;
            background: var(--azul-cielo);
        }

        .reserva-card {
            background: var(--blanco);
            border-radius: 36px;
            padding: 44px;
            margin-top: 40px;
            box-shadow: var(--shadow-md);
            color: var(--negro-suave);
        }

        .reserva-card input,
        .reserva-card select {
            padding: 16px;
            border-radius: 24px;
            border: 1px solid var(--gris-borde);
            background: var(--blanco);
            font-family: 'Montserrat', sans-serif;
            width: 100%;
        }

        #submitReserva {
            background: var(--rosa-cta);
            border: none;
            padding: 16px 36px;
            border-radius: 60px;
            font-weight: 800;
            text-transform: uppercase;
            color: var(--blanco);
            font-size: 1rem;
            cursor: pointer;
            transition: 0.2s;
        }

        #submitReserva:hover {
            background: var(--rosa-hover);
        }

        footer {
            background: var(--negro-suave);
            color: #ccc;
            padding: 70px 48px 40px;
        }

        footer a,
        footer strong {
            color: var(--blanco);
        }

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
            }

            #hero,
            #paquetes,
            #como-funciona,
            #galeria,
            #reserva {
                padding-left: 24px;
                padding-right: 24px;
            }
        }
    </style>
</head>

<body>
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

    <section id="hero">
        <div class="hero-grid">
            <div>
                <div class="hero-badge">✨ vuelo al amanecer · Teotihuacán</div>
                <h1 class="hero-title">Despierta sobre <em>las pirámides</em></h1>
                <p class="hero-sub">La experiencia más mágica de México. Vuela en globo al amanecer con seguridad y
                    comodidad.</p>
                <div class="booking-engine">
                    <div class="engine-row">
                        <div class="engine-field"><label>📅 Fecha</label><input type="date" id="bookingDate"
                                value="2026-06-20"></div>
                        <div class="engine-field"><label>👥 Adultos</label><input type="number" id="adultsCount"
                                value="2" min="1"></div>
                        <div class="engine-field"><label>🧒 Niños (4-10)</label><input type="number" id="childrenCount"
                                value="0" min="0"></div>
                        <div class="engine-field"><label>🎈 Paquete</label>
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
                        <span id="summaryText">20 jun 2026 · 2 adultos · Vuelo en globo</span>
                        <span class="summary-price" id="totalDisplay">$4,398 MXN</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img
                                src="https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/679367110_122131064667049843_6584605312738152555_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHyAtbSHDuQNMVI5LJreeryEFfxJRRJh4wQV_ElFEmHjApgeKsEX1YKwJpzz4dzEMEVAua7PKeHleBK7zRm_4Bz&_nc_ohc=YMK9g5hlsaIQ7kNvwHE562Y&_nc_oc=Adqt7tjdEah_b7-LblzNHivIkSx7UDdDwRcEkpxWhJTrMWXBZba2VoO0M5ccYC45MPg&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=QfrN-YkKxuCEHuicAUJEvg&_nc_ss=7b2a8&oh=00_Af5usU5h2ePo_bgjESgAyHZ-GYFZRKIKNdzhn4HAAkPbEg&oe=69FB44C7"
                                alt="Globo"></div>
                        <div class="swiper-slide"><img
                                src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?auto=format&fit=crop&w=1000&q=85"
                                alt="Vuelo"></div>
                        <div class="swiper-slide"><img
                                src="https://images.unsplash.com/photo-1506703719100-f0b3c5c4fea0?auto=format&fit=crop&w=1000&q=85"
                                alt="Amanecer"></div>
                        <div class="swiper-slide"><img
                                src="https://images.unsplash.com/photo-1534777367038-9404f45b869b?auto=format&fit=crop&w=1000&q=85"
                                alt="Pirámides"></div>
                        <div class="swiper-slide"><img
                                src="https://images.unsplash.com/photo-1621760874155-995ec1eb23de?auto=format&fit=crop&w=1000&q=85"
                                alt="Experiencia"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="offer-strip">🎈 OFERTA EXCLUSIVA: 12% OFF en grupos de 4+ personas · Código: TEOTI2025 🎈</div>

    <section id="paquetes">
        <div class="section-header">
            <span class="section-eyebrow">Nuestros paquetes</span>
            <h2 class="section-title">Elige tu <em>aventura</em></h2>
        </div>
        <div class="pkg-grid">
            <div class="pkg-card" data-pkg-id="1">
                <div class="pkg-icon">🎈</div>
                <div class="pkg-name">Vuelo esencial</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,199</span></div>
                <div class="price-row-modern"><span>Niño (4-10)</span><span>$1,999</span></div>
                <div class="badge-pkg" style="margin: 12px 0; font-size:0.7rem; color:var(--rosa-cta);">✅ Brindis +
                    diploma</div>
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

    <section id="como-funciona">
        <div class="section-header">
            <span class="section-eyebrow">Simple y rápido</span>
            <h2 class="section-title">Reserva en <em>3 pasos</em></h2>
        </div>
        <div class="steps-modern">
            <div class="step-card"><span style="font-size: 2rem;">📅</span>
                <h3>1. Elige fecha</h3>
                <p>Selecciona tu día preferido</p>
            </div>
            <div class="step-card"><span style="font-size: 2rem;">🎈</span>
                <h3>2. Elige paquete</h3>
                <p>Adultos y niños</p>
            </div>
            <div class="step-card"><span style="font-size: 2rem;">✅</span>
                <h3>3. Confirma y vuela</h3>
                <p>Voucher en minutos</p>
            </div>
        </div>
        <div
            style="background: white; border-radius: 28px; padding: 24px; text-align: center; max-width: 500px; margin: 20px auto 0; color: var(--negro-suave);">
            📆 Disponibilidad: <strong>20, 21, 22, 27, 28 de junio</strong> — ¡últimos lugares!
        </div>
    </section>

    <section id="galeria">
        <div class="section-header">
            <span class="section-eyebrow">Recuerdos reales</span>
            <h2 class="section-title">Momentos <em>únicos</em></h2>
        </div>
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; max-width: 1400px; margin: 0 auto;">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;">
            <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;">
            <img src="https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;">
            <img src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=600&q=80"
                style="border-radius: 24px; width: 100%; height: 240px; object-fit: cover;">
        </div>
    </section>

    <section id="reserva">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <span class="section-eyebrow">Asegura tu lugar</span>
            <h2 class="section-title">¿Listo para <em>despegar?</em></h2>
            <div class="reserva-card">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <input type="text" id="nombreReserva" placeholder="Nombre completo">
                    <input type="email" id="emailReserva" placeholder="Correo electrónico">
                    <input type="tel" id="whatsappReserva" placeholder="WhatsApp">
                    <select id="paqueteFinal">
                        <option value="1">Vuelo en globo</option>
                        <option value="2">Vuelo + Desayuno</option>
                        <option value="3">+ Transporte CDMX + Desayuno</option>
                        <option value="4">Completo + Pirámides</option>
                    </select>
                </div>
                <button id="submitReserva">Solicitar reservación →</button>
                <p style="margin-top: 28px; font-size: 0.75rem; color: var(--negro-suave);">Te contactamos en menos de
                    2 horas para confirmar disponibilidad y pago seguro.</p>
            </div>
        </div>
    </section>

    <footer>
        <div
            style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 40px;">
            <div><strong style="font-family:'Permanent Marker', cursive; font-size: 1.5rem;">hecho<span
                        style="color:var(--amarillo-acento);">en</span>teoti</strong><br>Desde 2009 · Experiencias
                únicas</div>
            <div><strong>Contacto</strong><br>📞 55 4321 8765<br>✉️ vuelos@hechoenteoti.mx</div>
            <div><strong>Información</strong><br>Políticas de clima<br>Términos y condiciones</div>
            <div><strong>Redes</strong><br>📷 IG · 🎵 TT · 📘 FB</div>
        </div>
        <div style="text-align: center; margin-top: 60px; font-size: 0.75rem;">© 2025 Hecho en Teoti · Pilotos
            certificados AFAC</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 4500
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            }
        });
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
        document.querySelectorAll('.select-pkg').forEach(btn => btn.addEventListener('click', (e) => {
            e.preventDefault();
            const pkgId = btn.getAttribute('data-pkg');
            if (pkgId) document.getElementById('packageSelect').value = pkgId;
            updateSummary();
            document.getElementById('hero').scrollIntoView({
                behavior: 'smooth'
            });
        }));
        document.getElementById('submitReserva').addEventListener('click', () => {
            const nombre = document.getElementById('nombreReserva').value;
            if (!nombre || !document.getElementById('emailReserva').value || !document.getElementById(
                    'whatsappReserva').value) alert("Completa todos los datos para solicitar tu reserva");
            else alert(`✨ ¡Gracias ${nombre}! Te contactaremos por WhatsApp para confirmar tu vuelo en globo.`);
        });
        const ham = document.getElementById('hamburger'),
            mobMenu = document.getElementById('mobile-menu');
        ham.addEventListener('click', () => {
            mobMenu.classList.toggle('open');
        });
        document.querySelectorAll('.mobile-menu a').forEach(l => l.addEventListener('click', () => mobMenu.classList.remove(
            'open')));
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.classList.add('hidden');
                setTimeout(() => preloader.style.display = 'none', 500);
            }
        });
        setTimeout(() => {
            const preloader = document.getElementById('preloader');
            if (preloader && !preloader.classList.contains('hidden')) {
                preloader.classList.add('hidden');
                setTimeout(() => preloader.style.display = 'none', 500);
            }
        }, 2000);
        updateSummary();
    </script>
</body>

</html>
