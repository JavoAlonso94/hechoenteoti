<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán – Reserva oficial</title>
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
            --gold: #C8972A;
            --gold-light: #E8B84B;
            --gold-pale: #F5D98A;
            --night: #06080F;
            --night-2: #0D1220;
            --night-3: #131929;
            --dusk: #1C2438;
            --dawn: #FF7A3D;
            --sky: #3A6B9E;
            --text: #EDE8DF;
            --text-muted: #8B8070;
            --radius: 20px;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--night);
            color: var(--text);
            overflow-x: hidden;
        }

        /* custom cursor (solo escritorio) */
        @media (min-width: 1024px) {
            .cursor {
                width: 10px;
                height: 10px;
                background: var(--gold);
                border-radius: 50%;
                position: fixed;
                pointer-events: none;
                z-index: 9999;
                transform: translate(-50%, -50%);
                transition: transform 0.15s ease;
            }

            .cursor-ring {
                width: 36px;
                height: 36px;
                border: 1.5px solid var(--gold);
                border-radius: 50%;
                position: fixed;
                pointer-events: none;
                z-index: 9998;
                transform: translate(-50%, -50%);
                transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                opacity: 0.5;
            }

            body {
                cursor: none;
            }
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
            background: transparent;
        }

        nav.scrolled {
            background: rgba(6, 8, 15, 0.92);
            backdrop-filter: blur(20px);
            padding: 12px 40px;
            border-bottom: 1px solid rgba(200, 151, 42, 0.2);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 300;
            letter-spacing: 0.08em;
            color: var(--text);
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
            color: rgba(237, 232, 223, 0.7);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-cta {
            background: var(--gold);
            color: var(--night) !important;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-decoration: none;
            transition: all 0.3s;
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
            background: var(--text);
            transition: 0.3s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(6, 8, 15, 0.98);
            backdrop-filter: blur(20px);
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
            color: var(--text);
            text-decoration: none;
        }

        /* Hero + buscador */
        #hero {
            position: relative;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(6, 8, 15, 0.5), rgba(6, 8, 15, 0.9)), url('https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=2000&q=85') center/cover;
            animation: slowPan 25s infinite alternate;
        }

        @keyframes slowPan {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        .hero-content {
            position: relative;
            z-index: 3;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200, 151, 42, 0.15);
            border: 1px solid rgba(200, 151, 42, 0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 11px;
            letter-spacing: 0.2em;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(48px, 8vw, 110px);
            font-weight: 300;
            line-height: 0.95;
            letter-spacing: -0.01em;
        }

        .hero-title em {
            color: var(--gold);
            font-style: italic;
            display: block;
        }

        .hero-sub {
            font-size: 16px;
            color: rgba(237, 232, 223, 0.7);
            max-width: 500px;
            margin: 24px 0 48px;
            font-weight: 300;
        }

        /* Booking engine */
        .booking-engine {
            background: rgba(13, 18, 32, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            border: 1px solid rgba(200, 151, 42, 0.2);
            padding: 28px 32px;
            max-width: 1100px;
            margin-top: 20px;
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
            font-weight: 500;
        }

        .engine-field input,
        .engine-field select {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(237, 232, 223, 0.15);
            border-radius: 16px;
            padding: 14px 16px;
            color: var(--text);
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
            letter-spacing: 0.08em;
            color: var(--night);
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .search-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        /* summary card */
        .booking-summary {
            margin-top: 24px;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 20px;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            border-left: 3px solid var(--gold);
        }

        .summary-price {
            font-size: 28px;
            font-family: 'Cormorant Garamond', serif;
            color: var(--gold-light);
        }

        .summary-detail {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Paquetes */
        #paquetes {
            padding: 100px 40px;
            background: var(--night-2);
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 300;
            margin-bottom: 48px;
        }

        .section-title em {
            color: var(--gold);
            font-style: italic;
        }

        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pkg-card {
            background: var(--night-3);
            border: 1px solid rgba(237, 232, 223, 0.08);
            border-radius: 28px;
            padding: 28px;
            transition: all 0.25s ease;
        }

        .pkg-card:hover {
            transform: translateY(-6px);
            border-color: rgba(200, 151, 42, 0.4);
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.5);
        }

        .pkg-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .pkg-desc {
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 20px;
            border-bottom: 1px dashed rgba(200, 151, 42, 0.2);
            padding-bottom: 16px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .price-adult {
            font-weight: 600;
            color: var(--gold);
        }

        .price-child {
            color: var(--text-muted);
            font-size: 14px;
        }

        .badge-pkg {
            background: rgba(200, 151, 42, 0.15);
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 10px;
            letter-spacing: 0.05em;
            display: inline-block;
            margin-top: 12px;
        }

        .select-pkg {
            display: block;
            width: 100%;
            margin-top: 24px;
            background: transparent;
            border: 1px solid rgba(200, 151, 42, 0.4);
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
            color: var(--night);
        }

        /* secciones extra */
        .offer-strip {
            background: linear-gradient(90deg, var(--gold) 0%, #a06e1a 100%);
            color: var(--night);
            padding: 14px 20px;
            text-align: center;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        .calendar-placeholder {
            background: var(--night-3);
            border-radius: 24px;
            padding: 24px;
            margin: 40px 0;
            text-align: center;
        }

        .map-placeholder {
            height: 280px;
            background: #1e2638;
            border-radius: 24px;
            margin: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
        }

        footer {
            background: #03050B;
            padding: 60px 40px 30px;
            border-top: 1px solid rgba(200, 151, 42, 0.1);
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
    <div class="cursor" id="cursor"></div>
    <div class="cursor-ring" id="cursor-ring"></div>

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

    <!-- Hero con buscador integrado -->
    <section id="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <div class="hero-badge">✨ EXPERIENCIA ÚNICA · TEOTIHUACÁN</div>
            <h1 class="hero-title">Vuela sobre <em>las pirámides</em></h1>
            <p class="hero-sub">Amanecer en globo, silencio y majestuosidad. Reserva tu lugar con los mejores precios
                garantizados.</p>

            <div class="booking-engine">
                <div class="engine-row">
                    <div class="engine-field">
                        <label>📅 Fecha</label>
                        <input type="date" id="bookingDate" value="2026-05-15">
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
                    <div><span class="summary-detail">📆 15 may 2026 · 2 adultos, 0 niños · Paquete: Vuelo en
                            globo</span></div>
                    <div class="summary-price" id="totalDisplay">$4,398 MXN</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ofertas / strip -->
    <div class="offer-strip">🔥 OFERTA ESPECIAL: 10% OFF en grupos de 4+ personas · Reserva antes del 31 de mayo 🔥
    </div>

    <!-- Paquetes (4 productos con precios reales) -->
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

    <!-- Cómo funciona + calendario ilustrativo -->
    <section id="como-funciona" style="padding: 80px 40px; max-width:1200px; margin:0 auto">
        <h2 class="section-title" style="text-align:center">Reserva en <em>3 pasos</em></h2>
        <div style="display:flex; gap:30px; flex-wrap:wrap; justify-content:center; margin-top:40px">
            <div style="text-align:center; flex:1">
                <div style="font-size:48px">📅</div>
                <h3>1. Elige fecha</h3>
                <p>Selecciona tu día preferido</p>
            </div>
            <div style="text-align:center; flex:1">
                <div style="font-size:48px">🎈</div>
                <h3>2. Escoge tu paquete</h3>
                <p>Adultos y niños, el que más te guste</p>
            </div>
            <div style="text-align:center; flex:1">
                <div style="font-size:48px">✅</div>
                <h3>3. Confirma y vuela</h3>
                <p>Recibirás tu voucher en minutos</p>
            </div>
        </div>

        <div class="calendar-placeholder">
            📆 Calendario de disponibilidad (próximas fechas con cupo)<br>
            <div style="display:flex; gap:12px; justify-content:center; margin-top:16px; flex-wrap:wrap">
                <span style="background:var(--gold); color:var(--night); padding:8px 16px; border-radius:40px;">15 may
                    ✅</span>
                <span style="background:var(--gold); color:var(--night); padding:8px 16px; border-radius:40px;">16 may
                    ✅</span>
                <span style="background:var(--gold); color:var(--night); padding:8px 16px; border-radius:40px;">17 may
                    ✅</span>
                <span style="background:gray; opacity:0.5; padding:8px 16px; border-radius:40px;">18 may</span>
                <span style="background:var(--gold); color:var(--night); padding:8px 16px; border-radius:40px;">22 may
                    ✅</span>
            </div>
        </div>
    </section>

    <!-- Galería -->
    <section id="galeria" style="background: var(--night-2); padding: 80px 40px">
        <div style="max-width:1400px; margin:0 auto">
            <h2 class="section-title">Galería <em>de alturas</em></h2>
            <div
                style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:16px; margin-top:40px">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:200px; object-fit:cover">
                <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:200px; object-fit:cover">
                <img src="https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:200px; object-fit:cover">
                <img src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=600&q=80"
                    style="border-radius:24px; width:100%; height:200px; object-fit:cover">
            </div>
        </div>
    </section>

    <!-- Mapa + reserva rápida -->
    <section id="reserva" style="padding: 80px 40px">
        <div style="max-width:1200px; margin:0 auto; text-align:center">
            <h2 class="section-title">¿Listo para <em>despegar?</em></h2>
            <div class="map-placeholder" id="mapMock">
                📍 Ubicación: San Juan Teotihuacán · Punto de encuentro (Globo puerto) · <a href="#"
                    style="color:var(--gold)">Ver mapa interactivo</a>
            </div>

            <div style="background: var(--night-3); border-radius: 32px; padding: 40px; margin-top: 20px;">
                <h3 style="font-size:28px; font-family: 'Cormorant Garamond'">Formulario de reserva directa</h3>
                <p style="margin-bottom: 24px;">Completa tus datos y te confirmamos en < 2 horas por WhatsApp</p>
                        <div
                            style="display:grid; grid-template-columns:1fr 1fr; gap:16px; max-width:600px; margin:0 auto">
                            <input type="text" placeholder="Nombre completo" id="nombreReserva"
                                style="background:#1e2638; border:1px solid #2a3348; border-radius:16px; padding:14px; color:white">
                            <input type="email" placeholder="Correo" id="emailReserva"
                                style="background:#1e2638; border:1px solid #2a3348; border-radius:16px; padding:14px; color:white">
                            <input type="tel" placeholder="WhatsApp" id="whatsappReserva"
                                style="background:#1e2638; border:1px solid #2a3348; border-radius:16px; padding:14px; color:white">
                            <select id="paqueteFinal"
                                style="background:#1e2638; border:1px solid #2a3348; border-radius:16px; padding:14px; color:white">
                                <option value="1">Vuelo en globo</option>
                                <option value="2">Vuelo + Desayuno</option>
                                <option value="3">Vuelo + Transporte + Desayuno</option>
                                <option value="4">Paquete completo + Pirámides</option>
                            </select>
                        </div>
                        <button id="submitReserva"
                            style="margin-top: 32px; background: var(--gold); border: none; border-radius: 40px; padding: 14px 40px; font-weight: bold; cursor: pointer;">Solicitar
                            reservación →</button>
                        <p style="margin-top: 24px; font-size:12px; color:var(--text-muted)">Sin tarjeta aún: te
                            contactamos para confirmar disponibilidad y pago seguro.</p>
            </div>
        </div>
    </section>

    <footer>
        <div
            style="max-width:1400px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:30px">
            <div><span class="nav-logo" style="font-size:28px">hecho<span>en</span>teoti</span><br>Vuelos en globo con
                pasión desde 2009</div>
            <div><strong>Contacto</strong><br>📞 55 1234 5678<br>✉️ hola@hechoenteoti.mx</div>
            <div><strong>Legal</strong><br>Políticas de cancelación<br>Aviso de privacidad</div>
            <div><strong>Síguenos</strong><br>📷 Instagram · 🎵 TikTok · 📘 Facebook</div>
        </div>
        <div style="text-align:center; margin-top:48px; color:var(--text-muted); font-size:12px">© 2025 Hecho en Teoti
            · Pilotos certificados AFAC</div>
    </footer>

    <script>
        // Precios reales según paquete y tipo
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
                name: "Vuelo + Transporte + Desayuno + Pirámides"
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
            const summaryText = `📆 ${formattedDate} · ${adults} adultos, ${children} niños · ${pkg.name}`;
            document.querySelector('#summaryBox .summary-detail').innerHTML = summaryText;
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

        // Al hacer clic en "Seleccionar paquete" desde las cards
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
                alert("Por favor completa tus datos de contacto");
                return;
            }
            alert(
                `✨ ¡Gracias ${nombre}! Hemos recibido tu solicitud para ${pkgFinal}. Te contactaremos por WhatsApp en breve para confirmar tu vuelo.`);
            // Aquí se podría enviar a un endpoint real
        });

        // Navegación mobile y smooth scroll
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

        // Custom cursor solo escritorio
        if (window.innerWidth >= 1024) {
            const cursor = document.getElementById('cursor');
            const ring = document.getElementById('cursor-ring');
            let mx = 0,
                my = 0,
                rx = 0,
                ry = 0;
            document.addEventListener('mousemove', e => {
                mx = e.clientX;
                my = e.clientY;
                cursor.style.left = mx + 'px';
                cursor.style.top = my + 'px';
            });

            function animateRing() {
                rx += (mx - rx) * 0.12;
                ry += (my - ry) * 0.12;
                ring.style.left = rx + 'px';
                ring.style.top = ry + 'px';
                requestAnimationFrame(animateRing);
            }
            animateRing();
        }
        updateSummary();
    </script>
</body>

</html>
