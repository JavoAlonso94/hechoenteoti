<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán – Reserva moderna</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Permanent+Marker&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --azul-cielo: #0099ff;      /* r0 g177 b255 */
            --rosa-cta: #ff0099;        /* r255 g0 b170 */
            --rosa-hover: #e6008c;
            --amarillo-acento: #ffcc00;  /* r255 g206 b0 */
            --naranja-acento: #ff9900;   /* r255 g151 b0 */
            --azul-profundo: #333399;    /* r31 g65 b160 */
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
            0% { transform: scale(0.96); opacity: 0.7; }
            100% { transform: scale(1.04); opacity: 1; }
            100% { transform: scale(0.96); opacity: 0.7; }
        }

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
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            background: rgba(0, 153, 255, 0.75);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        }

        nav.nav-scrolled {
            padding: 12px 48px;
            background: rgba(0, 153, 255, 0.92);
            backdrop-filter: blur(20px);
            border-bottom-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12);
        }

        .nav-logo-img {
            height: 44px;
            width: auto;
            transition: all 0.2s;
        }

        .nav-logo-img:hover {
            transform: scale(1.02);
            filter: drop-shadow(0 0 6px rgba(255, 204, 0, 0.5));
        }

        .nav-links {
            display: flex;
            gap: 36px;
            list-style: none;
        }

        .nav-links a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 600;
            padding: 6px 0;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, var(--amarillo-acento), var(--rosa-cta));
            transition: width 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border-radius: 4px;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--amarillo-acento);
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--rosa-cta), #c20077);
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            color: var(--blanco);
            transition: 0.3s;
            box-shadow: 0 6px 14px rgba(255, 0, 153, 0.25);
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-cta:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, var(--rosa-hover), #aa0068);
            box-shadow: 0 12px 24px rgba(255, 0, 153, 0.4);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 6px;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 102;
        }

        .hamburger span {
            width: 26px;
            height: 2.5px;
            background: var(--blanco);
            border-radius: 4px;
            transition: all 0.35s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }
        .hamburger.active span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 80%;
            max-width: 360px;
            background: rgba(0, 153, 255, 0.96);
            backdrop-filter: blur(32px);
            z-index: 101;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 32px;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border-left: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-menu a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.4rem;
            padding: 12px 20px;
        }

        .menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(4px);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

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

        .hero-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(3.2rem, 7vw, 5.2rem);
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-title em {
            color: var(--amarillo-acento);
            border-bottom: 3px solid var(--rosa-cta);
            display: inline-block;
        }

        .booking-engine {
            background: rgba(255, 255, 255, 0.95);
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
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--rosa-cta);
            margin-bottom: 8px;
            display: block;
        }

        .engine-field input,
        .engine-field select {
            width: 100%;
            padding: 14px 18px;
            border-radius: 20px;
            border: 1px solid var(--gris-borde);
            font-family: 'Montserrat', sans-serif;
        }

        .search-btn {
            background: var(--rosa-cta);
            border: none;
            border-radius: 28px;
            padding: 14px 32px;
            font-weight: 700;
            color: white;
            cursor: pointer;
        }

        .search-btn:hover {
            background: var(--rosa-hover);
            transform: translateY(-2px);
        }

        .booking-summary {
            margin-top: 28px;
            background: white;
            border-radius: 24px;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            color: var(--negro-suave);
        }

        .summary-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--rosa-cta);
        }

        .hero-image {
            border-radius: var(--radius-2xl);
            overflow: hidden;
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
        }

        .section-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
        }

        .section-title em {
            color: var(--azul-cielo);
            font-style: normal;
        }

        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 32px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pkg-card {
            background: var(--gris-claro);
            border-radius: var(--radius-xl);
            padding: 28px 28px 32px;
            transition: transform 0.25s ease, box-shadow 0.2s;
            border: 1px solid var(--gris-borde);
        }

        .pkg-card:hover {
            transform: translateY(-8px);
            border-color: var(--naranja-acento);
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.1);
        }

        .pkg-img {
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            border-radius: 24px;
            margin-bottom: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .pkg-card:hover .pkg-img {
            transform: scale(1.02);
        }

        .pkg-name {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.7rem;
            margin: 8px 0 12px;
        }

        .price-row-modern {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px dashed var(--gris-borde);
            padding: 10px 0;
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
            margin-top: 24px;
            background: var(--rosa-cta);
            border-radius: 40px;
            padding: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: white;
            text-decoration: none;
            transition: 0.2s;
        }

        .select-pkg:hover {
            background: var(--rosa-hover);
        }

        .offer-strip {
            background: var(--amarillo-acento);
            color: var(--azul-profundo);
            padding: 14px;
            text-align: center;
            font-weight: 700;
        }

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
            background: white;
            border-radius: 28px;
            padding: 32px;
            text-align: center;
            flex: 1;
            min-width: 200px;
            box-shadow: var(--shadow-sm);
        }

        #galeria {
            padding: 80px 48px;
            background: var(--blanco);
        }

        #reserva {
            padding: 80px 48px;
            background: var(--azul-cielo);
        }

        .reserva-card {
            background: white;
            border-radius: 36px;
            padding: 44px;
            margin-top: 40px;
            color: var(--negro-suave);
        }

        .reserva-card input,
        .reserva-card select {
            padding: 16px;
            border-radius: 24px;
            border: 1px solid var(--gris-borde);
            width: 100%;
        }

        #submitReserva {
            background: var(--rosa-cta);
            border: none;
            padding: 16px 36px;
            border-radius: 60px;
            font-weight: 800;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        #submitReserva:hover {
            background: var(--rosa-hover);
        }

        /* Nueva sección nosotros, misión, visión, ubicación, contacto */
        #conocenos {
            padding: 80px 48px;
            background: var(--blanco);
            color: var(--negro-suave);
        }

        .conocenos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 48px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .info-card {
            background: var(--gris-claro);
            border-radius: var(--radius-xl);
            padding: 32px;
            border: 1px solid var(--gris-borde);
            transition: transform 0.2s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            border-color: var(--naranja-acento);
        }

        .info-card h3 {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--azul-cielo);
        }

        .mv-container {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .mv-item {
            flex: 1;
            background: var(--blanco);
            padding: 24px;
            border-radius: 24px;
            box-shadow: var(--shadow-sm);
        }

        .mv-item h4 {
            font-size: 1.4rem;
            margin-bottom: 12px;
            color: var(--rosa-cta);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .contact-icon {
            font-size: 1.8rem;
            min-width: 48px;
            text-align: center;
        }

        .map-container {
            border-radius: 24px;
            overflow: hidden;
            margin-top: 20px;
            box-shadow: var(--shadow-sm);
        }

        .map-container iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }

        @media (max-width: 1000px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            nav {
                padding: 16px 24px;
            }
            .nav-links, .nav-cta {
                display: none;
            }
            .hamburger {
                display: flex;
            }
            #hero, #paquetes, #como-funciona, #galeria, #reserva, #conocenos {
                padding-left: 24px;
                padding-right: 24px;
            }
            .pkg-grid {
                gap: 24px;
            }
            .conocenos-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }
        }

        @media (max-width: 550px) {
            .booking-engine {
                padding: 20px;
            }
            .engine-row {
                flex-direction: column;
            }
            .mv-container {
                flex-direction: column;
            }
        }

        footer {
            background: var(--negro-suave);
            color: #ccc;
            padding: 70px 48px 40px;
        }
    </style>
</head>

<body>
    <div class="preloader" id="preloader">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Hecho en Teoti">
    </div>
    <div class="menu-overlay" id="menuOverlay"></div>
    <div class="mobile-menu" id="mobile-menu">
        <a href="#paquetes">🎈 Paquetes</a>
        <a href="#como-funciona">✨ Experiencia</a>
        <a href="#galeria">📸 Galería</a>
        <a href="#reserva">📅 Reservar</a>
        <a href="#conocenos">🌟 Conócenos</a>
    </div>
    <nav id="main-nav">
        <a href="#" class="nav-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Hecho en Teoti" class="nav-logo-img">
        </a>
        <ul class="nav-links">
            <li><a href="#paquetes">Paquetes</a></li>
            <li><a href="#como-funciona">Experiencia</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#reserva">Reservar</a></li>
            <li><a href="#conocenos">Conócenos</a></li>
        </ul>
        <a href="#reserva" class="nav-cta">Reservar vuelo</a>
        <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </nav>

    <section id="hero">
        <div class="hero-grid">
            <div>
                <div class="hero-badge"
                    style="display: inline-flex; background: rgba(255,204,0,0.2); border-radius: 100px; padding: 6px 16px; font-weight: 700; color: var(--amarillo-acento); margin-bottom: 28px;">
                    ✨ vuelo al amanecer · Teotihuacán</div>
                <h1 class="hero-title">Despierta sobre <em>las pirámides</em></h1>
                <p class="hero-sub" style="font-size:1.1rem; color: rgba(255,255,255,0.9); margin: 20px 0 40px;">La
                    experiencia más mágica de México. Vuela en globo al amanecer con seguridad y comodidad.</p>
                <div class="booking-engine">
                    <div class="engine-row">
                        <div class="engine-field"><label>📅 Fecha</label><input type="date" id="bookingDate"
                                value="2026-06-20"></div>
                        <div class="engine-field"><label>👥 Adultos</label><input type="number" id="adultsCount"
                                value="2" min="1"></div>
                        <div class="engine-field"><label>🧒 Niños (4-10)</label><input type="number" id="childrenCount"
                                value="0" min="0"></div>
                        <div class="engine-field"><label>🎈 Paquete</label><select id="packageSelect">
                                <option value="1">Vuelo en globo</option>
                                <option value="2">Vuelo + Desayuno</option>
                                <option value="3">+ Transporte CDMX + Desayuno</option>
                                <option value="4">Completo + Pirámides</option>
                            </select></div>
                        <button class="search-btn" id="searchBtn">🔍 Buscar vuelos</button>
                    </div>
                    <div class="booking-summary"><span id="summaryText">20 jun 2026 · 2 adultos · Vuelo en
                            globo</span><span class="summary-price" id="totalDisplay">$4,398 MXN</span></div>
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
                <img class="pkg-img"
                    src="https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/661117349_122128766967049843_8253620055200934046_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHvhnUSVxurjqV33kMironYX2mgcdK7-VZfaaBx0rv5Vk4ZCck-F7_3rbtDLYXTHQIsvOMbRrtnBl_5f7Rmf1Ou&_nc_ohc=LOwvXN-6euMQ7kNvwHAIoWn&_nc_oc=AdpxV37ei9QDSHF-LZpVAta-kTJx3z7SIEm7njBN4muptyIeVrh_-6eVAT9soQiJ5go&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=UYd-wMQU7PwSLzTeN2D--w&_nc_ss=7b2a8&oh=00_Af5qillGa3sSl7XFjqN9xw-t28VJjF-agwerNvlhqW1Lsw&oe=69FB48A1"
                    alt="Momento mágico en globo">
                <div class="pkg-name">Vuelo esencial</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,199</span></div>
                <div class="price-row-modern"><span>Niño (4-10)</span><span>$1,999</span></div>
                <div style="margin: 12px 0; font-size:0.7rem; color:var(--rosa-cta);">✅ Brindis + diploma</div>
                <a href="#" class="select-pkg" data-pkg="1">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="2">
                <img class="pkg-img"
                    src="https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/661117349_122128766967049843_8253620055200934046_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHvhnUSVxurjqV33kMironYX2mgcdK7-VZfaaBx0rv5Vk4ZCck-F7_3rbtDLYXTHQIsvOMbRrtnBl_5f7Rmf1Ou&_nc_ohc=LOwvXN-6euMQ7kNvwHAIoWn&_nc_oc=AdpxV37ei9QDSHF-LZpVAta-kTJx3z7SIEm7njBN4muptyIeVrh_-6eVAT9soQiJ5go&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=UYd-wMQU7PwSLzTeN2D--w&_nc_ss=7b2a8&oh=00_Af5qillGa3sSl7XFjqN9xw-t28VJjF-agwerNvlhqW1Lsw&oe=69FB48A1"
                    alt="Amanecer y desayuno">
                <div class="pkg-name">Vuelo + Desayuno</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,299</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,149</span></div>
                <div style="margin: 12px 0;">🍽️ Desayuno en hacienda</div>
                <a href="#" class="select-pkg" data-pkg="2">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="3">
                <img class="pkg-img"
                    src="https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/661117349_122128766967049843_8253620055200934046_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHvhnUSVxurjqV33kMironYX2mgcdK7-VZfaaBx0rv5Vk4ZCck-F7_3rbtDLYXTHQIsvOMbRrtnBl_5f7Rmf1Ou&_nc_ohc=LOwvXN-6euMQ7kNvwHAIoWn&_nc_oc=AdpxV37ei9QDSHF-LZpVAta-kTJx3z7SIEm7njBN4muptyIeVrh_-6eVAT9soQiJ5go&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=UYd-wMQU7PwSLzTeN2D--w&_nc_ss=7b2a8&oh=00_Af5qillGa3sSl7XFjqN9xw-t28VJjF-agwerNvlhqW1Lsw&oe=69FB48A1"
                    alt="Transporte incluido">
                <div class="pkg-name">Todo incluido (CDMX)</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,749</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,599</span></div>
                <div style="margin: 12px 0;">🚐 Transporte redondo + desayuno</div>
                <a href="#" class="select-pkg" data-pkg="3">Seleccionar</a>
            </div>
            <div class="pkg-card" data-pkg-id="4">
                <img class="pkg-img"
                    src="https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/661117349_122128766967049843_8253620055200934046_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHvhnUSVxurjqV33kMironYX2mgcdK7-VZfaaBx0rv5Vk4ZCck-F7_3rbtDLYXTHQIsvOMbRrtnBl_5f7Rmf1Ou&_nc_ohc=LOwvXN-6euMQ7kNvwHAIoWn&_nc_oc=AdpxV37ei9QDSHF-LZpVAta-kTJx3z7SIEm7njBN4muptyIeVrh_-6eVAT9soQiJ5go&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=UYd-wMQU7PwSLzTeN2D--w&_nc_ss=7b2a8&oh=00_Af5qillGa3sSl7XFjqN9xw-t28VJjF-agwerNvlhqW1Lsw&oe=69FB48A1"
                    alt="Acceso pirámides">
                <div class="pkg-name">Experiencia completa</div>
                <div class="price-row-modern"><span>Adulto</span><span class="price-adult">$2,949</span></div>
                <div class="price-row-modern"><span>Niño</span><span>$2,799</span></div>
                <div style="margin: 12px 0;">🏛️ Acceso pirámides + guía</div>
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
            📆 Disponibilidad: <strong>20, 21, 22, 27, 28 de junio</strong> — ¡últimos lugares!</div>
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

    <!-- NUEVA SECCIÓN: Nosotros, Misión, Visión, Ubicación, Contacto -->
    <section id="conocenos">
        <div class="section-header">
            <span class="section-eyebrow">Nuestra esencia</span>
            <h2 class="section-title">Conoce <em>más de nosotros</em></h2>
        </div>
        <div class="conocenos-grid">
            <!-- Columna izquierda: Nosotros y misión/visión -->
            <div class="info-card">
                <h3>✨ Nosotros</h3>
                <p style="line-height: 1.6; margin-bottom: 24px;">Somos <strong>Hecho en Teoti</strong>, una empresa familiar con más de 15 años de experiencia ofreciendo vuelos en globo aerostático sobre la majestuosa Zona Arqueológica de Teotihuacán. Nacimos del amor por las tradiciones mexicanas y el deseo de compartir una vista única del amanecer entre las pirámides del Sol y la Luna. Cada vuelo es operado con los más altos estándares de seguridad y calidez humana.</p>
                <div class="mv-container">
                    <div class="mv-item">
                        <h4>🎯 Misión</h4>
                        <p>Brindar experiencias inolvidables y seguras, conectando a nuestros visitantes con la grandeza de Teotihuacán desde las alturas, fomentando el respeto por el patrimonio cultural.</p>
                    </div>
                    <div class="mv-item">
                        <h4>🌟 Visión</h4>
                        <p>Ser la empresa líder en turismo de aventura cultural en México, reconocida por la excelencia en servicio, innovación y compromiso con la sustentabilidad.</p>
                    </div>
                </div>
            </div>
            <!-- Columna derecha: Ubicación + Contacto -->
            <div class="info-card">
                <h3>📍 Ubicación</h3>
                <p><strong>Globopuerto Teotihuacán</strong><br>Carretera Federal México-Tulancingo Km 28.5, San Martín de las Pirámides, Estado de México, C.P. 55800</p>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.513641244585!2d-98.84373008419524!3d19.689829785183985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f6b0e1e75b7b%3A0x9e1f6e8b3e2f8b4c!2sGlobopuerto%20Teotihuac%C3%A1n!5e0!3m2!1ses!2smx!4v1650000000000!5m2!1ses!2smx" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <h3 style="margin-top: 32px;">📞 Contacto y horarios</h3>
                <div class="contact-item">
                    <span class="contact-icon">📞</span> <span>+52 55 4321 8765</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">✉️</span> <span>vuelos@hechoenteoti.mx</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">🕒</span> <span>Lunes a Domingo: 06:00 - 14:00 hrs (vuelos al amanecer)</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">💬</span> <span>WhatsApp: +52 55 1234 5678</span>
                </div>
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
            autoplay: { delay: 4500 },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination', clickable: true }
        });
        const prices = {
            1: { adult: 2199, child: 1999, name: "Vuelo en globo" },
            2: { adult: 2299, child: 2149, name: "Vuelo + Desayuno" },
            3: { adult: 2749, child: 2599, name: "Vuelo + Transporte + Desayuno" },
            4: { adult: 2949, child: 2799, name: "Paquete completo + Pirámides" }
        };

        function updateSummary() {
            const adults = parseInt(document.getElementById('adultsCount').value) || 0;
            const children = parseInt(document.getElementById('childrenCount').value) || 0;
            const pkgId = parseInt(document.getElementById('packageSelect').value);
            const pkg = prices[pkgId];
            const total = (adults * pkg.adult) + (children * pkg.child);
            const date = document.getElementById('bookingDate').value;
            const formattedDate = date ? new Date(date).toLocaleDateString('es-MX') : 'fecha';
            document.getElementById('summaryText').innerHTML = `${formattedDate} · ${adults} adultos, ${children} niños · ${pkg.name}`;
            document.getElementById('totalDisplay').innerHTML = `$${total.toLocaleString()} MXN`;
        }
        document.getElementById('adultsCount').addEventListener('input', updateSummary);
        document.getElementById('childrenCount').addEventListener('input', updateSummary);
        document.getElementById('packageSelect').addEventListener('change', updateSummary);
        document.getElementById('bookingDate').addEventListener('change', updateSummary);
        document.getElementById('searchBtn').addEventListener('click', () => {
            updateSummary();
            document.getElementById('paquetes').scrollIntoView({ behavior: 'smooth' });
        });
        document.querySelectorAll('.select-pkg').forEach(btn => btn.addEventListener('click', (e) => {
            e.preventDefault();
            const pkgId = btn.getAttribute('data-pkg');
            if (pkgId) document.getElementById('packageSelect').value = pkgId;
            updateSummary();
            document.getElementById('hero').scrollIntoView({ behavior: 'smooth' });
        }));
        document.getElementById('submitReserva').addEventListener('click', () => {
            const nombre = document.getElementById('nombreReserva').value;
            if (!nombre || !document.getElementById('emailReserva').value || !document.getElementById('whatsappReserva').value)
                alert("Completa todos los datos para solicitar tu reserva");
            else alert(`✨ ¡Gracias ${nombre}! Te contactaremos por WhatsApp para confirmar tu vuelo en globo.`);
        });
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            window.scrollY > 20 ? nav.classList.add('nav-scrolled') : nav.classList.remove('nav-scrolled');
        });
        const hamburger = document.getElementById('hamburger'), mobileMenu = document.getElementById('mobile-menu'), overlay = document.getElementById('menuOverlay');
        function toggleMobileMenu(open) {
            if (open) {
                mobileMenu.classList.add('open');
                hamburger.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu.classList.remove('open');
                hamburger.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMobileMenu(!mobileMenu.classList.contains('open'));
        });
        overlay.addEventListener('click', () => toggleMobileMenu(false));
        document.querySelectorAll('.mobile-menu a').forEach(link => link.addEventListener('click', (e) => {
            toggleMobileMenu(false);
            const targetId = link.getAttribute('href');
            if (targetId && targetId !== '#') {
                e.preventDefault();
                document.querySelector(targetId)?.scrollIntoView({ behavior: 'smooth' });
            }
        }));
        window.addEventListener('resize', () => {
            if (window.innerWidth > 1000 && mobileMenu.classList.contains('open')) toggleMobileMenu(false);
        });
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