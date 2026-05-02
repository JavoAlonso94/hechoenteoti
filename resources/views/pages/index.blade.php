<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #B57C1C;
            --gold-light: #D9A13B;
            --gold-soft: #F7E9D0;
            --sand: #F9F6F0;
            --sand-dark: #EAE2D4;
            --warm-gray: #F4EFE6;
            --text-dark: #2C2B28;
            --text-muted: #6F6A63;
            --white: #FFFFFF;
            --cream: #FFFCF8;
            --radius: 20px;
            --shadow-sm: 0 8px 20px rgba(0, 0, 0, 0.03), 0 2px 6px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--sand);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Nav */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 400;
            letter-spacing: 0.04em;
            color: var(--text-dark);
            text-decoration: none;
        }

        .nav-logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-cta {
            background: var(--gold);
            color: white !important;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 0.08em;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: var(--shadow-sm);
        }

        .nav-cta:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
        }

        .hamburger span {
            width: 24px;
            height: 2px;
            background: var(--text-dark);
            transition: 0.3s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: var(--cream);
            z-index: 99;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 36px;
        }

        .mobile-menu.open {
            display: flex;
        }

        .mobile-menu a {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            color: var(--text-dark);
            text-decoration: none;
        }

        /* Hero + buscador */
        #hero {
            position: relative;
            min-height: 92vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #FFF9F0 0%, #F4E9DA 100%);
            padding-top: 90px;
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(181, 124, 28, 0.1);
            border: 1px solid rgba(181, 124, 28, 0.2);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 11px;
            letter-spacing: 0.2em;
            margin-bottom: 24px;
            color: var(--gold);
            font-weight: 500;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(48px, 8vw, 110px);
            font-weight: 400;
            line-height: 0.95;
            letter-spacing: -0.01em;
            color: var(--text-dark);
        }

        .hero-title em {
            color: var(--gold);
            font-style: italic;
            display: block;
        }

        .hero-sub {
            font-size: 16px;
            color: var(--text-muted);
            max-width: 500px;
            margin: 24px 0 48px;
            font-weight: 400;
        }

        /* Booking engine */
        .booking-engine {
            background: var(--white);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            padding: 28px 32px;
            max-width: 1100px;
            margin-top: 20px;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .engine-row {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-end;
        }

        .engine-field {
            flex: 1;
            min-width: 140px;
        }

        .engine-field label {
            display: block;
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
            font-weight: 600;
        }

        .engine-field input,
        .engine-field select {
            width: 100%;
            background: var(--sand);
            border: 1px solid #E2DCD2;
            border-radius: 16px;
            padding: 14px 16px;
            color: var(--text-dark);
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
        }

        .engine-field input:focus,
        .engine-field select:focus {
            border-color: var(--gold);
            outline: none;
        }

        .search-btn {
            background: var(--gold);
            border: none;
            border-radius: 40px;
            padding: 14px 32px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.05em;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .search-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(181, 124, 28, 0.2);
        }

        .booking-summary {
            margin-top: 24px;
            background: var(--gold-soft);
            border-radius: 20px;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            border-left: 4px solid var(--gold);
        }

        .summary-price {
            font-size: 28px;
            font-family: 'Cormorant Garamond', serif;
            color: var(--gold);
            font-weight: 600;
        }

        .summary-detail {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Paquetes */
        #paquetes {
            padding: 80px 40px;
            background: var(--cream);
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 400;
            margin-bottom: 48px;
            color: var(--text-dark);
        }

        .section-title em {
            color: var(--gold);
            font-style: italic;
        }

        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pkg-card {
            background: var(--white);
            border-radius: 28px;
            padding: 28px;
            transition: all 0.25s ease;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .pkg-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
            border-color: var(--gold-light);
        }

        .pkg-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .pkg-desc {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 20px;
            border-bottom: 1px solid #EFE8DF;
            padding-bottom: 16px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .price-adult {
            font-weight: 700;
            color: var(--gold);
        }

        .price-child {
            color: var(--text-muted);
            font-size: 14px;
        }

        .badge-pkg {
            background: var(--gold-soft);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 10px;
            letter-spacing: 0.05em;
            display: inline-block;
            margin-top: 12px;
            color: var(--gold);
            font-weight: 500;
        }

        .select-pkg {
            display: block;
            width: 100%;
            margin-top: 24px;
            background: transparent;
            border: 1px solid var(--gold);
            border-radius: 40px;
            padding: 12px;
            text-align: center;
            color: var(--gold);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .select-pkg:hover {
            background: var(--gold);
            color: white;
        }

        /* Ofertas */
        .offer-strip {
            background: linear-gradient(90deg, var(--gold) 0%, #e0a23b 100%);
            color: white;
            padding: 14px 20px;
            text-align: center;
            font-weight: 600;
            letter-spacing: 0.03em;
        }

        .calendar-placeholder {
            background: var(--white);
            border-radius: 28px;
            padding: 24px;
            margin: 40px 0;
            text-align: center;
            box-shadow: var(--shadow-sm);
        }

        .map-placeholder {
            height: 280px;
            background: #E9E2D6;
            border-radius: 28px;
            margin: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-weight: 500;
        }

        footer {
            background: #F2EBE0;
            padding: 60px 40px 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            color: var(--text-dark);
        }

        @media (max-width: 768px) {
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

            .hero-content {
                padding: 0 24px;
            }

            .booking-engine {
                padding: 20px;
            }

            .engine-row {
                flex-direction: column;
            }

            .search-btn {
                width: 100%;
                text-align: center;
            }

            #paquetes {
                padding: 60px 24px;
            }
        }
    </style>
</head>

<body>

    <div class="mobile-menu" id="mobile-menu">
        <a href="#paquetes">Paquetes</a>
        <a href="#como-funciona">Cómo funciona</a>
        <a href="#galeria">Galería</a>
        <a href="#reserva">Reservar</a>
    </div>

    <nav id="main-nav">
        <a href="#" class="nav-logo">hecho<span>en</span>teoti</a>
        <ul class="nav-links">
            <li><a href="#paquetes">Paquetes</a></li>
            <li><a href="#como-funciona">Experiencia</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#reserva">Reservar</a></li>
        </ul>
        <a href="#reserva" class="nav-cta">Reservar vuelo</a>
        <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </nav>

    <!-- Hero + buscador -->
    <section id="hero">
        <div class="hero-content">
            <div class="hero-badge">✨ EXPERIENCIA ÚNICA · TEOTIHUACÁN</div>
            <h1 class="hero-title">Vuela sobre <em>las pirámides</em></h1>
            <p class="hero-sub">Amanecer en globo, silencio y majestuosidad. Reserva tu lugar con los mejores precios
                garantizados.</p>

            <div class="booking-engine">
                <div class="engine-row">
                    <div class="engine-field">
                        <label>📅 Fecha</label>
                        <input type="date" id="bookingDate" value="2026-06-10">
                    </div>
                    <div class="engine-field">
                        <label>👥 Adultos</label>
                        <input type="number" id="adultsCount" value="2" min="1" max="20">
                    </div>
                    <div class="engine-field">
                        <label>🧒 Niños (4-10 años)</label>
                        <input type="number" id="childrenCount" value="0" min="0" max="10">
                    </div>
                    <div class="engine-field">
                        <label>🎈 Paquete</label>
                        <select id="packageSelect">
                            <option value="1">Vuelo en globo</option>
                            <option value="2">Vuelo + Desayuno</option>
                            <option value="3">+ Transporte CDMX + Desayuno</option>
                            <option value="4">+ Transporte + Desayuno + Acceso pirámides</option>
                        </select>
                    </div>
                    <button class="search-btn" id="searchBtn">🔍 Buscar vuelos</button>
                </div>
                <div class="booking-summary" id="summaryBox">
                    <div><span class="summary-detail" id="summaryText">📆 10 jun 2026 · 2 adultos, 0 niños · Vuelo en
                            globo</span></div>
                    <div class="summary-price" id="totalDisplay">$4,398 MXN</div>
                </div>
            </div>
        </div>
    </section>

    <div class="offer-strip">🎈 OFERTA ESPECIAL: 10% OFF en grupos de 4+ personas · Reserva antes del 30 de junio 🎈
    </div>

    <!-- Paquetes (precios reales) -->
    <section id="paquetes">
        <div style="max-width:1400px; margin:0 auto">
            <h2 class="section-title">Elige tu <em>experiencia</em></h2>
            <div class="pkg-grid" id="packagesGrid">
                <!-- Paquete 1 -->
                <div class="pkg-card" data-pkg-id="1">
                    <div class="pkg-name">🎈 Vuelo en globo</div>
                    <div class="pkg-desc">Vuelo compartido al amanecer · 45-60 min</div>
                    <div class="price-row"><span>Adulto</span><span class="price-adult">$2,199 MXN</span></div>
                    <div class="price-row"><span>Niño (4-10 años)</span><span class="price-child">$1,999 MXN</span>
                    </div>
                    <div class="badge-pkg">Incluye: brindis, diploma, seguro</div>
                    <a href="#" class="select-pkg" data-pkg="1">Seleccionar paquete</a>
                </div>
                <!-- Paquete 2 -->
                <div class="pkg-card" data-pkg-id="2">
                    <div class="pkg-name">🍳 Vuelo + Desayuno</div>
                    <div class="pkg-desc">Vuelo + desayuno típico en hacienda</div>
                    <div class="price-row"><span>Adulto</span><span class="price-adult">$2,299 MXN</span></div>
                    <div class="price-row"><span>Niño (menor 10 años)</span><span class="price-child">$2,149 MXN</span>
                    </div>
                    <div class="badge-pkg">Desayuno buffet + aguas frescas</div>
                    <a href="#" class="select-pkg" data-pkg="2">Seleccionar paquete</a>
                </div>
                <!-- Paquete 3 -->
                <div class="pkg-card" data-pkg-id="3">
                    <div class="pkg-name">🚐 Vuelo + Transporte CDMX + Desayuno</div>
                    <div class="pkg-desc">Transporte redondo desde CDMX, vuelo y desayuno</div>
                    <div class="price-row"><span>Adulto</span><span class="price-adult">$2,749 MXN</span></div>
                    <div class="price-row"><span>Niño</span><span class="price-child">$2,599 MXN</span></div>
                    <div class="badge-pkg">Van con Wifi, salida 4:30am</div>
                    <a href="#" class="select-pkg" data-pkg="3">Seleccionar paquete</a>
                </div>
                <!-- Paquete 4 -->
                <div class="pkg-card" data-pkg-id="4">
                    <div class="pkg-name">🏛️ Paquete completo + Acceso pirámides</div>
                    <div class="pkg-desc">Transporte + Vuelo + Desayuno + Entrada zona arqueológica</div>
                    <div class="price-row"><span>Adulto</span><span class="price-adult">$2,949 MXN</span></div>
                    <div class="price-row"><span>Niño</span><span class="price-child">$2,799 MXN</span></div>
                    <div class="badge-pkg">Guía incluido en la pirámide</div>
                    <a href="#" class="select-pkg" data-pkg="4">Seleccionar paquete</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cómo funciona + calendario -->
    <section id="como-funciona" style="padding: 80px 40px; max-width:1200px; margin:0 auto">
        <h2 class="section-title" style="text-align:center">Reserva en <em>3 pasos</em></h2>
        <div style="display:flex; gap:30px; flex-wrap:wrap; justify-content:center; margin-top:40px">
            <div
                style="text-align:center; flex:1; background: var(--white); padding: 28px; border-radius: 28px; box-shadow: var(--shadow-sm);">
                <div style="font-size: 48px;">📅</div>
                <h3 style="margin: 12px 0 8px;">1. Elige fecha</h3>
                <p style="color: var(--text-muted);">Selecciona tu día preferido</p>
            </div>
            <div
                style="text-align:center; flex:1; background: var(--white); padding: 28px; border-radius: 28px; box-shadow: var(--shadow-sm);">
                <div style="font-size: 48px;">🎈</div>
                <h3 style="margin: 12px 0 8px;">2. Escoge tu paquete</h3>
                <p style="color: var(--text-muted);">Adultos y niños, el que más te guste</p>
            </div>
            <div
                style="text-align:center; flex:1; background: var(--white); padding: 28px; border-radius: 28px; box-shadow: var(--shadow-sm);">
                <div style="font-size: 48px;">✅</div>
                <h3 style="margin: 12px 0 8px;">3. Confirma y vuela</h3>
                <p style="color: var(--text-muted);">Recibirás tu voucher en minutos</p>
            </div>
        </div>

        <div class="calendar-placeholder">
            📆 Calendario de disponibilidad (próximas fechas con cupo)<br>
            <div style="display:flex; gap:12px; justify-content:center; margin-top:16px; flex-wrap:wrap">
                <span style="background: var(--gold); color: white; padding:8px 18px; border-radius:40px;">10 jun
                    ✅</span>
                <span style="background: var(--gold); color: white; padding:8px 18px; border-radius:40px;">11 jun
                    ✅</span>
                <span style="background: var(--gold); color: white; padding:8px 18px; border-radius:40px;">12 jun
                    ✅</span>
                <span style="background: #E2DCD2; color: #6F6A63; padding:8px 18px; border-radius:40px;">13 jun</span>
                <span style="background: var(--gold); color: white; padding:8px 18px; border-radius:40px;">15 jun
                    ✅</span>
            </div>
        </div>
    </section>

    <!-- Galería -->
    <section id="galeria" style="background: var(--warm-gray); padding: 80px 40px">
        <div style="max-width:1400px; margin:0 auto">
            <h2 class="section-title">Galería <em>de alturas</em></h2>
            <div
                style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:20px; margin-top:40px">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:220px; object-fit:cover; box-shadow: var(--shadow-sm);">
                <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:220px; object-fit:cover; box-shadow: var(--shadow-sm);">
                <img src="https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:220px; object-fit:cover; box-shadow: var(--shadow-sm);">
                <img src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:220px; object-fit:cover; box-shadow: var(--shadow-sm);">
            </div>
        </div>
    </section>

    <!-- Reserva final + mapa -->
    <section id="reserva" style="padding: 80px 40px">
        <div style="max-width:1200px; margin:0 auto; text-align:center">
            <h2 class="section-title">¿Listo para <em>despegar?</em></h2>
            <div class="map-placeholder">
                📍 Ubicación: San Juan Teotihuacán · Punto de encuentro (Globo puerto) · <a href="#"
                    style="color: var(--gold); margin-left: 8px;">Ver mapa interactivo</a>
            </div>
            <div
                style="background: var(--white); border-radius: 32px; padding: 40px; margin-top: 20px; box-shadow: var(--shadow-md);">
                <h3 style="font-size: 28px; font-family: 'Cormorant Garamond'; margin-bottom: 12px;">Formulario de
                    reserva directa</h3>
                <p style="margin-bottom: 28px; color: var(--text-muted);">Completa tus datos y te confirmamos en < 2
                        horas por WhatsApp</p>
                        <div
                            style="display:grid; grid-template-columns:1fr 1fr; gap:18px; max-width:600px; margin:0 auto">
                            <input type="text" placeholder="Nombre completo" id="nombreReserva"
                                style="background: var(--sand); border: 1px solid #E2DCD2; border-radius: 20px; padding: 14px; color: var(--text-dark);">
                            <input type="email" placeholder="Correo" id="emailReserva"
                                style="background: var(--sand); border: 1px solid #E2DCD2; border-radius: 20px; padding: 14px; color: var(--text-dark);">
                            <input type="tel" placeholder="WhatsApp" id="whatsappReserva"
                                style="background: var(--sand); border: 1px solid #E2DCD2; border-radius: 20px; padding: 14px; color: var(--text-dark);">
                            <select id="paqueteFinal"
                                style="background: var(--sand); border: 1px solid #E2DCD2; border-radius: 20px; padding: 14px; color: var(--text-dark);">
                                <option value="1">Vuelo en globo</option>
                                <option value="2">Vuelo + Desayuno</option>
                                <option value="3">Vuelo + Transporte + Desayuno</option>
                                <option value="4">Paquete completo + Pirámides</option>
                            </select>
                        </div>
                        <button id="submitReserva"
                            style="margin-top: 32px; background: var(--gold); border: none; border-radius: 50px; padding: 14px 44px; font-weight: 700; color: white; font-size: 16px; cursor: pointer; transition: 0.2s;">Solicitar
                            reservación →</button>
                        <p style="margin-top: 28px; font-size: 12px; color: var(--text-muted);">Sin tarjeta aún: te
                            contactamos para confirmar disponibilidad y pago seguro.</p>
            </div>
        </div>
    </section>

    <footer>
        <div
            style="max-width:1400px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:40px">
            <div><span class="nav-logo" style="font-size: 28px;">hecho<span>en</span>teoti</span><br
                    style="margin-bottom: 8px;">Vuelos en globo con pasión desde 2009</div>
            <div><strong>Contacto</strong><br>📞 55 1234 5678<br>✉️ hola@hechoenteoti.mx</div>
            <div><strong>Legal</strong><br>Políticas de cancelación<br>Aviso de privacidad</div>
            <div><strong>Síguenos</strong><br>📷 Instagram · 🎵 TikTok · 📘 Facebook</div>
        </div>
        <div style="text-align:center; margin-top: 48px; color: var(--text-muted); font-size: 12px;">© 2025 Hecho en
            Teoti · Pilotos certificados AFAC</div>
    </footer>

    <script>
        // Precios reales
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
            const formattedDate = date ? new Date(date).toLocaleDateString('es-MX') : 'fecha por definir';
            document.getElementById('summaryText').innerHTML =
                `📆 ${formattedDate} · ${adults} adultos, ${children} niños · ${pkg.name}`;
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

        // Al hacer clic en "Seleccionar paquete"
        document.querySelectorAll('.select-pkg').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const pkgId = btn.getAttribute('data-pkg');
                if (pkgId) {
                    document.getElementById('packageSelect').value = pkgId;
                    updateSummary();
                    document.getElementById('hero').scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Reserva final
        document.getElementById('submitReserva').addEventListener('click', () => {
            const nombre = document.getElementById('nombreReserva').value;
            const email = document.getElementById('emailReserva').value;
            const whats = document.getElementById('whatsappReserva').value;
            const pkgFinalId = document.getElementById('paqueteFinal').value;
            const pkgFinal = prices[pkgFinalId].name;
            if (!nombre || !email || !whats) {
                alert("Por favor completa todos tus datos de contacto.");
                return;
            }
            alert(
                `✨ ¡Gracias ${nombre}! Hemos recibido tu solicitud para ${pkgFinal}. Te contactaremos por WhatsApp en breve para confirmar tu vuelo.`);
        });

        // Mobile menú
        const ham = document.getElementById('hamburger');
        const mobMenu = document.getElementById('mobile-menu');
        ham.addEventListener('click', () => {
            ham.classList.toggle('open');
            mobMenu.classList.toggle('open');
        });
        document.querySelectorAll('.mobile-menu a').forEach(l => {
            l.addEventListener('click', () => {
                ham.classList.remove('open');
                mobMenu.classList.remove('open');
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                if (this.getAttribute('href') !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        window.addEventListener('scroll', () => {
            document.getElementById('main-nav').classList.toggle('scrolled', window.scrollY > 60);
        });

        updateSummary();
    </script>
</body>

</html>
