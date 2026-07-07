<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán – Experiencia Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --azul-cielo: #0099ff;
            --rosa-cta: #ff0099;
            --rosa-hover: #e6008c;
            --amarillo-acento: #ffcc00;
            --naranja-acento: #ff9900;
            --azul-profundo: #333399;
            --blanco: #FFFFFF;
            --negro-suave: #1A1A1A;
            --gris-claro: #F5F5F5;
            --gris-borde: #E0E0E0;
            --shadow-sm: 0 4px 16px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 12px 32px -8px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 24px 48px -12px rgba(0, 0, 0, 0.18);
            --shadow-glow: 0 0 40px rgba(255, 0, 153, 0.25);
            --radius-xl: 28px;
            --radius-2xl: 40px;
            --transition-bounce: cubic-bezier(0.34, 1.56, 0.64, 1);
            --transition-smooth: cubic-bezier(0.4, 0, 0.2, 1);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(160deg, var(--azul-cielo) 0%, #0077dd 40%, var(--azul-profundo) 100%);
            color: var(--blanco);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--rosa-cta), var(--naranja-acento));
            border-radius: 20px;
        }
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s var(--transition-smooth);
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 {
            transition-delay: 0.1s;
        }
        .reveal-delay-2 {
            transition-delay: 0.2s;
        }
        .reveal-delay-3 {
            transition-delay: 0.3s;
        }
        .reveal-delay-4 {
            transition-delay: 0.4s;
        }
        .reveal-delay-5 {
            transition-delay: 0.5s;
        }
        .reveal-delay-6 {
            transition-delay: 0.6s;
        }

        /* Lightbox (imágenes) */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.94);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.35s ease, visibility 0.35s ease;
        }
        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }
        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
        }
        .lightbox-content img {
            width: auto;
            max-width: 100%;
            max-height: 88vh;
            border-radius: 22px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.15);
        }
        .lightbox-close {
            position: absolute;
            top: -44px;
            right: -44px;
            background: linear-gradient(135deg, var(--rosa-cta), #c20077);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            color: white;
            transition: all 0.25s var(--transition-bounce);
            border: 2px solid rgba(255, 255, 255, 0.3);
            z-index: 10;
        }
        .lightbox-close:hover {
            transform: scale(1.12);
            background: linear-gradient(135deg, var(--rosa-hover), #aa0068);
            box-shadow: 0 0 24px rgba(255, 0, 153, 0.5);
        }
        .lightbox-prev,
        .lightbox-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 50%;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 26px;
            color: white;
            transition: all 0.25s var(--transition-bounce);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
        }
        .lightbox-prev {
            left: -64px;
        }
        .lightbox-next {
            right: -64px;
        }
        .lightbox-prev:hover,
        .lightbox-next:hover {
            background: linear-gradient(135deg, var(--rosa-cta), var(--rosa-hover));
            border-color: transparent;
            box-shadow: 0 0 28px rgba(255, 0, 153, 0.45);
            transform: translateY(-50%) scale(1.08);
        }

        /* ============ LIGHTBOX DE VIDEO (nuevo) ============ */
        .video-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 2100;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s ease;
            padding: 20px;
        }
        .video-lightbox.active {
            opacity: 1;
            visibility: visible;
        }
        .video-lightbox-container {
            position: relative;
            width: 100%;
            max-width: 1100px;
            aspect-ratio: 16/9;
            background: #000;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.7), 0 0 0 2px rgba(255, 255, 255, 0.08);
            transform: scale(0.9);
            transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .video-lightbox.active .video-lightbox-container {
            transform: scale(1);
        }
        .video-lightbox-container iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .video-lightbox-close {
            position: absolute;
            top: -48px;
            right: -48px;
            background: linear-gradient(135deg, #ff0055, #c20044);
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            color: white;
            transition: all 0.3s var(--transition-bounce);
            border: 2px solid rgba(255, 255, 255, 0.35);
            z-index: 20;
            box-shadow: 0 8px 24px rgba(255, 0, 80, 0.4);
        }
        .video-lightbox-close:hover {
            transform: scale(1.15) rotate(90deg);
            background: linear-gradient(135deg, #ff2266, #a00038);
            box-shadow: 0 14px 34px rgba(255, 0, 80, 0.6);
        }
        .video-lightbox-title {
            position: absolute;
            bottom: -52px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 20px;
        }
        @media (max-width: 768px) {
            .video-lightbox-close {
                top: 12px;
                right: 12px;
                width: 38px;
                height: 38px;
                font-size: 16px;
            }
            .video-lightbox-container {
                border-radius: 16px;
            }
            .video-lightbox-title {
                bottom: -42px;
                font-size: 0.85rem;
            }
        }

        /* Preloader */
        .preloader {
            position: fixed;
            inset: 0;
            background: linear-gradient(140deg, var(--azul-cielo), var(--azul-profundo));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            gap: 20px;
        }
        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .preloader-icon {
            font-size: 64px;
            color: var(--amarillo-acento);
            animation: floatBalloon 1.6s infinite ease-in-out;
        }
        @keyframes floatBalloon {
            0%,
            100% {
                transform: translateY(0) scale(1);
            }
            30% {
                transform: translateY(-18px) scale(1.06);
            }
            60% {
                transform: translateY(6px) scale(0.96);
            }
        }
        .preloader-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid rgba(255, 255, 255, 0.25);
            border-top-color: var(--amarillo-acento);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Navegación */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 18px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.45s var(--transition-smooth);
            background: rgba(0, 140, 230, 0.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
        }
        nav.nav-scrolled {
            padding: 10px 48px;
            background: rgba(0, 140, 230, 0.82);
            backdrop-filter: blur(26px);
            -webkit-backdrop-filter: blur(26px);
            border-bottom-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.14);
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--blanco);
            font-weight: 800;
            font-size: 1.1rem;
            transition: transform 0.25s var(--transition-bounce);
        }
        .nav-logo:hover {
            transform: scale(1.03);
        }
        .nav-logo i {
            font-size: 2rem;
            color: var(--amarillo-acento);
            filter: drop-shadow(0 0 8px rgba(255, 204, 0, 0.5));
            transition: transform 0.3s ease;
        }
        .nav-logo:hover i {
            transform: rotate(-10deg);
        }
        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
            align-items: center;
        }
        .nav-links a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 6px 0;
            transition: all 0.3s ease;
            position: relative;
            letter-spacing: 0.01em;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0%;
            height: 2.5px;
            background: linear-gradient(90deg, var(--amarillo-acento), var(--rosa-cta));
            transition: width 0.4s var(--transition-smooth);
            border-radius: 4px;
        }
        .nav-links a:hover {
            color: var(--amarillo-acento);
        }
        .nav-links a:hover::after {
            width: 100%;
        }
        .nav-cta {
            background: linear-gradient(135deg, var(--rosa-cta), #c20077);
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--blanco);
            transition: all 0.3s var(--transition-bounce);
            box-shadow: 0 6px 18px rgba(255, 0, 153, 0.3);
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .nav-cta:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, var(--rosa-hover), #aa0068);
            box-shadow: 0 14px 30px rgba(255, 0, 153, 0.45);
        }
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 6px;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 102;
            padding: 4px;
        }
        .hamburger span {
            width: 28px;
            height: 2.5px;
            background: var(--blanco);
            border-radius: 4px;
            transition: all 0.35s var(--transition-bounce);
            transform-origin: center;
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
            inset: 0 0 0 auto;
            width: 82%;
            max-width: 380px;
            background: linear-gradient(155deg, rgba(0, 153, 255, 0.97), rgba(51, 51, 153, 0.98));
            backdrop-filter: blur(36px);
            -webkit-backdrop-filter: blur(36px);
            z-index: 101;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 28px;
            transform: translateX(100%);
            transition: transform 0.45s cubic-bezier(0.22, 0.9, 0.3, 1.05);
            border-left: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: -8px 0 32px rgba(0, 0, 0, 0.2);
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        .mobile-menu a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.35rem;
            padding: 14px 24px;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .mobile-menu a:hover {
            background: rgba(255, 255, 255, 0.12);
            color: var(--amarillo-acento);
        }
        .menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: 0.35s;
        }
        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Hero */
        #hero {
            min-height: 96vh;
            display: flex;
            align-items: center;
            padding: 130px 48px 80px;
            background: transparent;
            position: relative;
            overflow: hidden;
        }
        #hero::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -120px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 204, 0, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 56px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            align-items: center;
        }
        .hero-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(3rem, 6.5vw, 5rem);
            line-height: 1.08;
            margin-bottom: 18px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .hero-title em {
            color: var(--amarillo-acento);
            border-bottom: 4px solid var(--rosa-cta);
            display: inline-block;
            padding-bottom: 4px;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 204, 0, 0.18);
            border-radius: 100px;
            padding: 8px 20px;
            font-weight: 700;
            font-size: 0.82rem;
            color: var(--amarillo-acento);
            margin-bottom: 28px;
            letter-spacing: 0.03em;
            border: 1px solid rgba(255, 204, 0, 0.25);
            animation: softGlow 2.5s infinite ease-in-out;
        }
        @keyframes softGlow {
            0%,
            100% {
                box-shadow: 0 0 8px rgba(255, 204, 0, 0.2);
            }
            50% {
                box-shadow: 0 0 22px rgba(255, 204, 0, 0.45);
            }
        }
        .hero-sub {
            font-size: 1.08rem;
            color: rgba(255, 255, 255, 0.88);
            margin: 18px 0 40px;
            max-width: 480px;
        }
        .booking-engine {
            background: rgba(255, 255, 255, 0.97);
            border-radius: var(--radius-2xl);
            padding: 30px 34px;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .engine-row {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-end;
        }
        .engine-field {
            flex: 1;
            min-width: 130px;
        }
        .engine-field label {
            font-size: 0.68rem;
            font-weight: 800;
            color: var(--rosa-cta);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .engine-field input,
        .engine-field select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1.5px solid var(--gris-borde);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            background: #fafafa;
            transition: all 0.3s ease;
            color: var(--negro-suave);
        }
        .engine-field input:focus,
        .engine-field select:focus {
            outline: none;
            border-color: var(--rosa-cta);
            box-shadow: 0 0 0 4px rgba(255, 0, 153, 0.08);
            background: #fff;
        }
        .search-btn {
            background: linear-gradient(115deg, var(--rosa-cta), #c20077);
            border: none;
            border-radius: 24px;
            padding: 14px 28px;
            font-weight: 700;
            color: white;
            cursor: pointer;
            transition: all 0.3s var(--transition-bounce);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            box-shadow: 0 6px 20px rgba(255, 0, 153, 0.3);
        }
        .search-btn:hover {
            background: linear-gradient(115deg, var(--rosa-hover), #aa0068);
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(255, 0, 153, 0.45);
        }
        .booking-summary {
            margin-top: 24px;
            background: linear-gradient(135deg, #fefefe, #f8f8f8);
            border-radius: 20px;
            padding: 16px 22px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            color: var(--negro-suave);
            align-items: center;
            border: 1px solid var(--gris-borde);
            gap: 10px;
        }
        .summary-price {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--rosa-cta);
            letter-spacing: -0.02em;
        }
        .hero-image {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            background: #1a1a1a;
            min-height: 380px;
            box-shadow: var(--shadow-lg);
            position: relative;
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

        /* Offer strip */
        .offer-strip {
            background: linear-gradient(100deg, var(--amarillo-acento), var(--naranja-acento));
            color: var(--azul-profundo);
            padding: 14px 24px;
            text-align: center;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
            position: relative;
            overflow: hidden;
        }
        .offer-strip::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 40%;
            height: 200%;
            background: rgba(255, 255, 255, 0.25);
            transform: rotate(25deg);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0% {
                left: -60%;
            }
            100% {
                left: 120%;
            }
        }

        /* Paquetes */
        #paquetes {
            padding: 100px 48px;
            background: linear-gradient(125deg, #ffffff, #fef9f0, #fffdf7);
            color: var(--negro-suave);
        }
        .section-header {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 60px;
        }
        .section-eyebrow {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--rosa-cta);
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .section-eyebrow::before,
        .section-eyebrow::after {
            content: '';
            width: 28px;
            height: 1.5px;
            background: var(--rosa-cta);
            opacity: 0.5;
            border-radius: 2px;
        }
        .section-title {
            font-family: 'Permanent Marker', cursive;
            font-size: clamp(2rem, 3.8vw, 3rem);
            margin-top: 6px;
        }
        .section-title em {
            color: var(--azul-cielo);
            font-style: normal;
        }
        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .pkg-card {
            background: #ffffff;
            border-radius: var(--radius-xl);
            padding: 26px 26px 30px;
            transition: all 0.35s var(--transition-smooth);
            border: 1.5px solid var(--gris-borde);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }
        .pkg-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--rosa-cta), var(--naranja-acento));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s var(--transition-smooth);
        }
        .pkg-card:hover::before {
            transform: scaleX(1);
        }
        .pkg-card:hover {
            transform: translateY(-10px);
            border-color: var(--naranja-acento);
            box-shadow: 0 24px 44px -14px rgba(0, 0, 0, 0.15);
        }
        .pkg-img {
            width: 100%;
            aspect-ratio: 4/3;
            object-fit: cover;
            border-radius: 22px;
            margin-bottom: 18px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease;
        }
        .pkg-card:hover .pkg-img {
            transform: scale(1.03);
        }
        .pkg-name {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.6rem;
            margin: 6px 0 12px;
            color: var(--negro-suave);
        }
        .price-row-modern {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px dashed var(--gris-borde);
            padding: 9px 0;
            font-size: 0.9rem;
        }
        .price-adult {
            font-weight: 800;
            color: var(--rosa-cta);
            font-size: 1.05rem;
        }
        .pkg-tag {
            margin: 10px 0;
            font-size: 0.68rem;
            color: var(--rosa-cta);
            font-weight: 700;
            background: rgba(255, 0, 153, 0.07);
            display: inline-block;
            padding: 4px 12px;
            border-radius: 40px;
            letter-spacing: 0.03em;
        }
        .select-pkg {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            margin-top: 20px;
            background: linear-gradient(115deg, var(--rosa-cta), #c20077);
            border-radius: 40px;
            padding: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-size: 0.8rem;
            color: white;
            cursor: pointer;
            border: none;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s var(--transition-bounce);
            box-shadow: 0 6px 18px rgba(255, 0, 153, 0.25);
        }
        .select-pkg:hover {
            background: linear-gradient(115deg, var(--rosa-hover), #aa0068);
            box-shadow: 0 12px 28px rgba(255, 0, 153, 0.4);
            transform: translateY(-2px);
        }

        /* Cómo funciona */
        #como-funciona {
            padding: 70px 48px;
            background: linear-gradient(130deg, #f0f4fa, #e8ecf2, #f5f6f9);
            color: var(--negro-suave);
        }
        .steps-modern {
            display: flex;
            gap: 36px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 50px 0 20px;
        }
        .step-card {
            background: #ffffff;
            border-radius: 26px;
            padding: 34px 26px;
            text-align: center;
            flex: 1;
            min-width: 190px;
            max-width: 280px;
            box-shadow: var(--shadow-sm);
            transition: all 0.35s var(--transition-smooth);
            border: 1.5px solid transparent;
        }
        .step-card:hover {
            border-color: var(--azul-cielo);
            box-shadow: var(--shadow-md);
            transform: translateY(-6px);
        }
        .step-icon {
            font-size: 2.6rem;
            margin-bottom: 16px;
            display: inline-block;
            background: linear-gradient(135deg, var(--azul-cielo), var(--azul-profundo));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .step-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--negro-suave);
        }
        .step-card p {
            font-size: 0.85rem;
            color: #666;
        }
        .disponibilidad-chip {
            background: #ffffff;
            border-radius: 26px;
            padding: 20px 28px;
            text-align: center;
            max-width: 520px;
            margin: 20px auto 0;
            color: var(--negro-suave);
            box-shadow: var(--shadow-sm);
            border: 1.5px solid var(--gris-borde);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .disponibilidad-chip i {
            color: var(--naranja-acento);
            font-size: 1.1rem;
        }
        .disponibilidad-chip strong {
            color: var(--rosa-cta);
            font-size: 1rem;
        }

        /* Galería imágenes */
        #galeria {
            padding: 90px 48px;
            background: linear-gradient(140deg, #ffffff, #fffcf5, #fefefe);
        }
        .gallery-modern {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .gallery-item {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            aspect-ratio: 1/1;
            cursor: pointer;
            transition: all 0.35s var(--transition-smooth);
            box-shadow: var(--shadow-sm);
            border: 2px solid transparent;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.55s cubic-bezier(0.22, 0.9, 0.3, 1.1);
        }
        .gallery-item:hover {
            border-color: var(--naranja-acento);
            box-shadow: var(--shadow-md);
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent);
            color: white;
            padding: 18px 16px;
            transform: translateY(100%);
            transition: transform 0.35s var(--transition-smooth);
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .gallery-item:hover .overlay {
            transform: translateY(0);
        }
        .gallery-item .overlay span {
            display: inline-block;
            font-size: 0.72rem;
            background: linear-gradient(95deg, var(--rosa-cta), var(--rosa-hover));
            padding: 5px 14px;
            border-radius: 40px;
            font-weight: 700;
            letter-spacing: 0.03em;
        }

        /* ==================== */
        /*  GALERÍA DE VIDEOS   */
        /* ==================== */
        #videos-gallery {
            padding: 90px 48px;
            background: linear-gradient(160deg, #0a0a14 0%, #12122a 30%, #0d0d22 60%, #080818 100%);
            position: relative;
            overflow: hidden;
        }
        #videos-gallery::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(255, 0, 153, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        #videos-gallery::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 153, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        #videos-gallery .section-header {
            position: relative;
            z-index: 2;
        }
        #videos-gallery .section-title {
            color: #ffffff;
        }
        #videos-gallery .section-eyebrow {
            color: var(--rosa-cta);
        }
        #videos-gallery .section-eyebrow::before,
        #videos-gallery .section-eyebrow::after {
            background: var(--rosa-cta);
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        /* Video destacado (grande) */
        .video-card.featured {
            grid-column: span 7;
            grid-row: span 2;
            aspect-ratio: 16/9;
        }
        /* Videos normales */
        .video-card:not(.featured) {
            grid-column: span 5;
            aspect-ratio: 16/9;
        }
        .video-card {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            cursor: pointer;
            background: #1a1a2e;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35);
            border: 2px solid rgba(255, 255, 255, 0.06);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1.2);
            group: true;
        }
        .video-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 0, 153, 0.5);
            box-shadow: 0 24px 56px rgba(255, 0, 153, 0.2), 0 0 0 4px rgba(255, 0, 153, 0.08);
            z-index: 5;
        }
        .video-card .video-thumb {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.22, 0.9, 0.3, 1.1), filter 0.5s ease;
            display: block;
        }
        .video-card:hover .video-thumb {
            transform: scale(1.06);
            filter: brightness(1.1) saturate(1.15);
        }
        /* Overlay oscuro */
        .video-card .video-overlay-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(0, 0, 0, 0.1) 0%,
                    rgba(0, 0, 0, 0.0) 35%,
                    rgba(0, 0, 0, 0.55) 75%,
                    rgba(0, 0, 0, 0.85) 100%);
            transition: background 0.5s ease;
            pointer-events: none;
        }
        .video-card:hover .video-overlay-bg {
            background: linear-gradient(180deg,
                    rgba(0, 0, 0, 0.2) 0%,
                    rgba(0, 0, 0, 0.05) 30%,
                    rgba(0, 0, 0, 0.7) 70%,
                    rgba(0, 0, 0, 0.92) 100%);
        }
        /* Botón de play */
        .video-card .play-btn-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.85);
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 0, 153, 0.9), rgba(200, 0, 100, 0.9));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 0 0 12px rgba(255, 0, 153, 0.25), 0 12px 40px rgba(0, 0, 0, 0.5);
            z-index: 3;
            pointer-events: none;
        }
        .video-card.featured .play-btn-circle {
            width: 100px;
            height: 100px;
            box-shadow: 0 0 0 18px rgba(255, 0, 153, 0.2), 0 20px 50px rgba(0, 0, 0, 0.55);
        }
        .video-card:hover .play-btn-circle {
            transform: translate(-50%, -50%) scale(1.05);
            background: linear-gradient(135deg, #ff2288, #e00070);
            box-shadow: 0 0 0 20px rgba(255, 0, 153, 0.35), 0 16px 48px rgba(0, 0, 0, 0.6);
            animation: playPulse 1.8s infinite;
        }
        .video-card .play-btn-circle i {
            color: #ffffff;
            font-size: 28px;
            margin-left: 4px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.4));
            transition: transform 0.3s ease;
        }
        .video-card.featured .play-btn-circle i {
            font-size: 36px;
        }
        .video-card:hover .play-btn-circle i {
            transform: scale(1.1);
        }
        @keyframes playPulse {
            0%,
            100% {
                box-shadow: 0 0 0 12px rgba(255, 0, 153, 0.35), 0 16px 48px rgba(0, 0, 0, 0.6);
            }
            50% {
                box-shadow: 0 0 0 26px rgba(255, 0, 153, 0.08), 0 16px 48px rgba(0, 0, 0, 0.6);
            }
        }
        /* Info del video en la parte inferior */
        .video-card .video-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 22px;
            z-index: 4;
            pointer-events: none;
            transform: translateY(6px);
            transition: transform 0.4s ease;
        }
        .video-card:hover .video-info {
            transform: translateY(0);
        }
        .video-card .video-info .video-duration {
            display: inline-block;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            letter-spacing: 0.03em;
            margin-bottom: 6px;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }
        .video-card .video-info .video-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.25;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        }
        .video-card.featured .video-info .video-title {
            font-size: 1.25rem;
        }
        /* Badge "Nuevo" o "Popular" */
        .video-card .video-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            z-index: 4;
            pointer-events: none;
            background: linear-gradient(135deg, var(--amarillo-acento), var(--naranja-acento));
            color: #1a1a1a;
            font-weight: 800;
            font-size: 0.65rem;
            padding: 6px 14px;
            border-radius: 40px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        }
        /* Borde de gradiente animado en hover */
        .video-card::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 24px;
            background: linear-gradient(135deg, var(--rosa-cta), var(--naranja-acento), var(--azul-cielo), var(--rosa-cta));
            background-size: 300% 300%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
            animation: gradientBorder 4s linear infinite;
            pointer-events: none;
        }
        .video-card:hover::after {
            opacity: 1;
        }
        @keyframes gradientBorder {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        /* Responsive para video grid */
        @media (max-width: 1100px) {
            .video-card.featured {
                grid-column: span 12;
                grid-row: span 1;
                aspect-ratio: 16/9;
            }
            .video-card:not(.featured) {
                grid-column: span 6;
                aspect-ratio: 16/9;
            }
        }
        @media (max-width: 700px) {
            #videos-gallery {
                padding: 60px 16px;
            }
            .video-grid {
                gap: 14px;
            }
            .video-card.featured,
            .video-card:not(.featured) {
                grid-column: span 12;
                aspect-ratio: 16/9;
            }
            .video-card .play-btn-circle {
                width: 58px;
                height: 58px;
            }
            .video-card .play-btn-circle i {
                font-size: 20px;
            }
            .video-card.featured .play-btn-circle {
                width: 70px;
                height: 70px;
            }
            .video-card.featured .play-btn-circle i {
                font-size: 26px;
            }
            .video-card .video-info .video-title {
                font-size: 0.85rem;
            }
        }

        /* Reserva */
        #reserva {
            padding: 90px 48px;
            background: linear-gradient(120deg, var(--azul-cielo), #0070cc, #005fa3);
            position: relative;
            overflow: hidden;
        }
        #reserva::before {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -80px;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(255, 204, 0, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .reserva-card {
            background: #ffffff;
            border-radius: 34px;
            padding: 42px 36px;
            margin-top: 36px;
            color: var(--negro-suave);
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .reserva-card input,
        .reserva-card select {
            padding: 15px 18px;
            border-radius: 20px;
            border: 1.5px solid var(--gris-borde);
            width: 100%;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        .reserva-card input:focus,
        .reserva-card select:focus {
            outline: none;
            border-color: var(--rosa-cta);
            box-shadow: 0 0 0 4px rgba(255, 0, 153, 0.06);
            background: #fff;
        }

        /* Stepper del wizard de reserva */
        .reserva-stepper {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .reserva-stepper .step-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            color: #aaa;
        }
        .reserva-stepper .step-item .step-circle {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #eee;
            color: #999;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }
        .reserva-stepper .step-item.active { color: var(--rosa-cta); }
        .reserva-stepper .step-item.active .step-circle { background: var(--rosa-cta); color: #fff; }
        .reserva-stepper .step-item.done .step-circle { background: #2ecc71; color: #fff; }
        .reserva-step-panel { display: none; text-align: left; }
        .reserva-step-panel.active { display: block; }
        .reserva-aviso {
            background: #eaf6ff;
            border: 1px solid #b8e2ff;
            border-radius: 14px;
            padding: 12px 16px;
            font-size: 0.8rem;
            color: #0077cc;
            margin: 16px 0;
        }
        .reserva-warnings { list-style: none; padding: 0; margin: 14px 0; }
        .reserva-warnings li {
            font-size: 0.78rem;
            color: #8a6d00;
            background: #fff8e1;
            border-radius: 10px;
            padding: 8px 12px;
            margin-bottom: 6px;
        }
        .reserva-nav { display: flex; justify-content: space-between; gap: 12px; margin-top: 20px; }
        .btn-volver {
            background: #eee;
            color: #555;
            border: none;
            border-radius: 30px;
            padding: 14px 24px;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
        }
        .resumen-reserva {
            background: #f7f7fb;
            border-radius: 18px;
            padding: 18px;
            margin-bottom: 18px;
        }
        .resumen-reserva div { display: flex; justify-content: space-between; font-size: 0.85rem; padding: 5px 0; border-bottom: 1px dashed #ddd; }
        .resumen-reserva .resumen-total { font-weight: 800; font-size: 1.15rem; color: var(--rosa-cta); border-bottom: none; }
        .metodo-pago-opt {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1.5px solid var(--gris-borde);
            border-radius: 16px;
            padding: 14px;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .metodo-pago-opt.selected { border-color: var(--rosa-cta); background: #fff5fa; }
        #submitReserva {
            background: linear-gradient(115deg, var(--rosa-cta), #c20077);
            border: none;
            padding: 17px 32px;
            border-radius: 60px;
            font-weight: 800;
            font-size: 0.9rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s var(--transition-bounce);
            width: 100%;
            margin-top: 26px;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.03em;
            box-shadow: 0 8px 24px rgba(255, 0, 153, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        #submitReserva:hover {
            background: linear-gradient(115deg, var(--rosa-hover), #aa0068);
            box-shadow: 0 16px 36px rgba(255, 0, 153, 0.5);
            transform: translateY(-3px);
        }
        .iti {
            width: 100%;
            display: block;
        }
        .iti__flag-container {
            border-radius: 20px 0 0 20px;
        }
        .iti--allow-dropdown input,
        .iti--separate-dial-code input {
            padding-left: 88px !important;
            width: 100%;
            border-radius: 20px;
        }

        /* Conócenos */
        #conocenos {
            padding: 90px 48px;
            background: linear-gradient(140deg, #fef9f0, #ffffff, #fdfcf8);
            color: var(--negro-suave);
        }
        .conocenos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .info-card {
            background: #ffffff;
            border-radius: var(--radius-xl);
            padding: 34px 30px;
            border: 1.5px solid var(--gris-borde);
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }
        .info-card:hover {
            transform: translateY(-6px);
            border-color: var(--naranja-acento);
            box-shadow: var(--shadow-md);
        }
        .info-card h3 {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.7rem;
            margin-bottom: 18px;
            color: var(--azul-cielo);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .mv-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 18px;
        }
        .mv-item {
            flex: 1;
            min-width: 160px;
            background: #fafafa;
            padding: 22px;
            border-radius: 22px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gris-borde);
        }
        .mv-item h4 {
            font-size: 1.2rem;
            margin-bottom: 8px;
            color: var(--rosa-cta);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px;
            font-size: 0.95rem;
            color: #444;
        }
        .contact-icon {
            font-size: 1.4rem;
            min-width: 40px;
            text-align: center;
            color: var(--rosa-cta);
        }
        .map-container {
            border-radius: 22px;
            overflow: hidden;
            margin-top: 18px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gris-borde);
        }
        .map-container iframe {
            width: 100%;
            height: 280px;
            border: 0;
        }

        /* Footer */
        footer {
            background: linear-gradient(150deg, #111118, #1a1a28);
            color: #ccc;
            padding: 64px 48px 36px;
        }
        footer i {
            margin-right: 6px;
            color: var(--amarillo-acento);
        }

        /* Botón volver arriba */
        .back-to-top {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 90;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--rosa-cta), var(--rosa-hover));
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.35s var(--transition-bounce);
            box-shadow: 0 8px 22px rgba(255, 0, 153, 0.35);
        }
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .back-to-top:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(255, 0, 153, 0.5);
        }

        /* WhatsApp FAB */
        .whatsapp-fab {
            position: fixed;
            bottom: 90px;
            right: 28px;
            z-index: 90;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #25D366;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
            transition: all 0.3s var(--transition-bounce);
            text-decoration: none;
        }
        .whatsapp-fab:hover {
            transform: scale(1.1);
            box-shadow: 0 14px 32px rgba(37, 211, 102, 0.55);
        }

        /* Carrito flotante */
        .cart-fab {
            position: fixed;
            bottom: 90px;
            left: 28px;
            z-index: 90;
            display: none;
            align-items: center;
            gap: 10px;
            background: var(--rosa-cta);
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 12px 18px;
            border-radius: 30px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s var(--transition-bounce);
        }
        .cart-fab.visible { display: flex; }
        .cart-fab:hover { transform: scale(1.05); }
        .cart-fab .cart-badge-count {
            background: #fff;
            color: var(--rosa-cta);
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        /* Responsive general */
        @media (max-width: 1000px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 36px;
            }
            .hero-grid>div:first-child {
                text-align: center;
            }
            .hero-sub {
                margin-left: auto;
                margin-right: auto;
            }
            .booking-engine {
                text-align: left;
            }
            nav {
                padding: 14px 22px;
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
            #videos-gallery,
            #reserva,
            #conocenos {
                padding-left: 20px;
                padding-right: 20px;
            }
            .conocenos-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
            .steps-modern {
                gap: 20px;
            }
            .step-card {
                min-width: 150px;
                max-width: 100%;
                flex: 1 1 45%;
            }
        }
        @media (max-width: 640px) {
            .gallery-modern {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 10px;
            }
        }
        @media (max-width: 550px) {
            .booking-engine {
                padding: 20px;
            }
            .engine-row {
                flex-direction: column;
            }
            .engine-field {
                min-width: 100%;
            }
            .mv-container {
                flex-direction: column;
            }
            .back-to-top {
                bottom: 16px;
                right: 16px;
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            .whatsapp-fab {
                bottom: 68px;
                right: 16px;
                width: 44px;
                height: 44px;
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    @php
    $defaultImage = 'https://scontent-qro3-1.xx.fbcdn.net/v/t39.30808-6/661117349_122128766967049843_8253620055200934046_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=7b2446&_nc_eui2=AeHvhnUSVxurjqV33kMironYX2mgcdK7-VZfaaBx0rv5Vk4ZCck-F7_3rbtDLYXTHQIsvOMbRrtnBl_5f7Rmf1Ou&_nc_ohc=LOwvXN-6euMQ7kNvwHAIoWn&_nc_oc=AdpxV37ei9QDSHF-LZpVAta-kTJx3z7SIEm7njBN4muptyIeVrh_-6eVAT9soQiJ5go&_nc_zt=23&_nc_ht=scontent-qro3-1.xx&_nc_gid=UYd-wMQU7PwSLzTeN2D--w&_nc_ss=7b2a8&oh=00_Af5qillGa3sSl7XFjqN9xw-t28VJjF-agwerNvlhqW1Lsw&oe=69FB48A1';

    // Videos de ejemplo (puedes mover esto a config/vuelos.php)
    $videos = [
    [
    'id' => 'dQw4w9WgXcQ', // Reemplazar con ID real de YouTube
    'title' => 'Amanecer mágico sobre las pirámides',
    'duration' => '3:24',
    'badge' => 'Nuevo',
    'featured' => true,
    'provider' => 'youtube',
    ],
    [
    'id' => 'dQw4w9WgXcQ',
    'title' => 'Experiencia completa: vuelo en globo',
    'duration' => '5:10',
    'badge' => 'Popular',
    'featured' => false,
    'provider' => 'youtube',
    ],
    [
    'id' => 'dQw4w9WgXcQ',
    'title' => 'Brindis y certificado al aterrizar',
    'duration' => '2:48',
    'badge' => '',
    'featured' => false,
    'provider' => 'youtube',
    ],
    [
    'id' => 'dQw4w9WgXcQ',
    'title' => 'Testimonio: "La mejor experiencia de mi vida"',
    'duration' => '4:05',
    'badge' => '',
    'featured' => false,
    'provider' => 'youtube',
    ],
    [
    'id' => 'dQw4w9WgXcQ',
    'title' => 'Detrás de cámaras: inflado del globo',
    'duration' => '6:32',
    'badge' => 'Exclusivo',
    'featured' => false,
    'provider' => 'youtube',
    ],
    ];
    @endphp

    {{-- Preloader --}}
    <div class="preloader" id="preloader">
        <i class="fa-solid fa-balloon preloader-icon"></i>
        <div class="preloader-spinner"></div>
    </div>

    {{-- Overlay y menú móvil --}}
    <div class="menu-overlay" id="menuOverlay"></div>
    <div class="mobile-menu" id="mobile-menu">
        <a href="#paquetes"><i class="fa-solid fa-gift"></i> Paquetes</a>
        <a href="#como-funciona"><i class="fa-solid fa-wand-magic-sparkles"></i> Experiencia</a>
        <a href="#galeria"><i class="fa-solid fa-images"></i> Galería</a>
        <a href="#videos-gallery"><i class="fa-solid fa-film"></i> Videos</a>
        <a href="#reserva"><i class="fa-solid fa-calendar-check"></i> Reservar</a>
        <a href="#conocenos"><i class="fa-solid fa-star"></i> Conócenos</a>
    </div>

    {{-- Navegación --}}
    <nav id="main-nav">
        <a href="#" class="nav-logo">
            <i class="fa-solid fa-balloon"></i>
            <span>Hecho<span style="color:var(--amarillo-acento);">en</span>Teoti</span>
        </a>
        <ul class="nav-links">
            <li><a href="#paquetes"><i class="fa-solid fa-gift"></i> Paquetes</a></li>
            <li><a href="#como-funciona"><i class="fa-solid fa-wand-magic-sparkles"></i> Experiencia</a></li>
            <li><a href="#galeria"><i class="fa-solid fa-images"></i> Galería</a></li>
            <li><a href="#videos-gallery"><i class="fa-solid fa-film"></i> Videos</a></li>
            <li><a href="#reserva"><i class="fa-solid fa-calendar-check"></i> Reservar</a></li>
            <li><a href="#conocenos"><i class="fa-solid fa-star"></i> Conócenos</a></li>
        </ul>
        <a href="#reserva" class="nav-cta"><i class="fa-solid fa-rocket"></i> Reservar vuelo</a>
        <button class="hamburger" id="hamburger" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>
    </nav>

    {{-- Hero --}}
    <section id="hero">
        <div class="hero-grid">
            <div>
                <div class="hero-badge reveal">
                    <i class="fa-solid fa-sun"></i> vuelo al amanecer · Teotihuacán
                </div>
                <h1 class="hero-title reveal reveal-delay-1">Despierta sobre <em>las pirámides</em></h1>
                <p class="hero-sub reveal reveal-delay-2">
                    La experiencia más mágica de México. Vuela en globo al amanecer con seguridad y comodidad.
                </p>
                <div class="booking-engine reveal reveal-delay-3">
                    <div class="engine-row">
                        <div class="engine-field">
                            <label><i class="fa-solid fa-calendar-days"></i> Fecha</label>
                            <input type="text" id="bookingDate" placeholder="Selecciona una fecha" readonly>
                        </div>
                        <div class="engine-field">
                            <label><i class="fa-solid fa-user"></i> Adultos</label>
                            <input type="number" id="adultsCount" value="2" min="1">
                        </div>
                        <div class="engine-field">
                            <label><i class="fa-solid fa-child"></i> Niños (4-10)</label>
                            <input type="number" id="childrenCount" value="0" min="0">
                        </div>
                        <div class="engine-field">
                            <label><i class="fa-solid fa-gift"></i> Paquete</label>
                            <select id="packageSelect">
                                @foreach($paquetes as $id => $pkg)
                                <option value="{{ $id }}">{{ $pkg['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="search-btn" id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i> Buscar vuelos</button>
                    </div>
                    <div class="booking-summary">
                        <span id="summaryText"><i class="fa-solid fa-calendar"></i> 20 jun 2026 · 2 adultos · Vuelo en globo</span>
                        <span class="summary-price" id="totalDisplay">$4,398 MXN</span>
                    </div>
                </div>
            </div>
            <div class="hero-image reveal reveal-delay-4">
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper">
                        @php
                        $carruselPath = public_path('assets/img/carrusel/');
                        $carruselImages = [];
                        if (is_dir($carruselPath)) {
                        $files = scandir($carruselPath);
                        foreach ($files as $file) {
                        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        if (in_array($extension, ['jpg','jpeg','png','webp','gif'])) {
                        $carruselImages[] = asset('assets/img/carrusel/'.$file);
                        }
                        }
                        }
                        @endphp
                        @if(count($carruselImages) > 0)
                        @foreach($carruselImages as $img)
                        <div class="swiper-slide"><img src="{{ $img }}" alt="Carrusel Hecho en Teoti" loading="lazy"></div>
                        @endforeach
                        @else
                        <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?auto=format&fit=crop&w=1000&q=85" alt="Vuelo en globo" loading="lazy"></div>
                        <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1506703719100-f0b3c5c4fea0?auto=format&fit=crop&w=1000&q=85" alt="Amanecer" loading="lazy"></div>
                        <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1534777367038-9404f45b869b?auto=format&fit=crop&w=1000&q=85" alt="Pirámides" loading="lazy"></div>
                        <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1621760874155-995ec1eb23de?auto=format&fit=crop&w=1000&q=85" alt="Experiencia" loading="lazy"></div>
                        @endif
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Oferta --}}
    <div class="offer-strip">
        <i class="fa-solid fa-tag"></i> OFERTA EXCLUSIVA: 6% OFF en grupos de 4+ personas · Código: <strong>TEOTI2025</strong> <i class="fa-solid fa-tag"></i>
    </div>

    {{-- Paquetes --}}
    <section id="paquetes">
        <div class="section-header reveal">
            <span class="section-eyebrow">Nuestros paquetes</span>
            <h2 class="section-title">Elige tu <em>aventura</em></h2>
        </div>
        <div class="pkg-grid">
            @foreach($paquetes as $id => $pkg)
            <div class="pkg-card reveal reveal-delay-{{ $loop->iteration }}" data-pkg-id="{{ $id }}">
                <img class="pkg-img" src="{{ $pkg['image'] ?? $defaultImage }}" alt="{{ $pkg['name'] }}" loading="lazy">
                <div class="pkg-name">{{ $pkg['name'] }}</div>
                <div class="price-row-modern">
                    <span><i class="fa-solid fa-user"></i> Adulto</span>
                    <span class="price-adult">${{ number_format($pkg['adult'], 0) }}</span>
                </div>
                <div class="price-row-modern">
                    <span><i class="fa-solid fa-child"></i> Niño (4-10)</span>
                    <span>${{ number_format($pkg['child'], 0) }}</span>
                </div>
                <div class="pkg-tag"><i class="fa-solid fa-star"></i> {{ $pkg['tag'] }}</div>
                <button class="select-pkg" data-pkg="{{ $id }}">
                    <i class="fa-solid fa-cart-shopping"></i> Seleccionar
                </button>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Cómo funciona --}}
    <section id="como-funciona">
        <div class="section-header reveal">
            <span class="section-eyebrow">Simple y rápido</span>
            <h2 class="section-title">Reserva en <em>3 pasos</em></h2>
        </div>
        <div class="steps-modern">
            <div class="step-card reveal reveal-delay-1">
                <div class="step-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                <h3>1. Elige fecha</h3>
                <p>Selecciona tu día preferido para la aventura.</p>
            </div>
            <div class="step-card reveal reveal-delay-2">
                <div class="step-icon"><i class="fa-solid fa-balloon"></i></div>
                <h3>2. Elige paquete</h3>
                <p>Adultos y niños, el que mejor se adapte a ti.</p>
            </div>
            <div class="step-card reveal reveal-delay-3">
                <div class="step-icon"><i class="fa-solid fa-circle-check"></i></div>
                <h3>3. Confirma y vuela</h3>
                <p>Recibe tu voucher en minutos y prepárate.</p>
            </div>
        </div>
        <div class="disponibilidad-chip reveal">
            <i class="fa-solid fa-clock"></i> Disponibilidad: <strong>20, 21, 22, 27, 28 de junio</strong> — ¡últimos lugares!
        </div>
    </section>

    {{-- Galería imágenes --}}
    <section id="galeria">
        <div class="section-header reveal">
            <span class="section-eyebrow">Recuerdos que inspiran</span>
            <h2 class="section-title">Momentos <em>únicos</em></h2>
        </div>
        <div class="gallery-modern" id="galleryModern">
            @php
            $galeriaPath = public_path('assets/img/hechoenteoti/');
            $imagenes = [];
            if (is_dir($galeriaPath)) {
            $files = scandir($galeriaPath);
            foreach ($files as $file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, ['jpg','jpeg','png','webp','gif'])) {
            $imagenes[] = asset('assets/img/hechoenteoti/'.$file);
            }
            }
            }
            @endphp
            @forelse($imagenes as $index => $imgUrl)
            <div class="gallery-item reveal" data-index="{{ $index }}">
                <img src="{{ $imgUrl }}" alt="Galería Hecho en Teoti" loading="lazy">
                <div class="overlay"><i class="fa-solid fa-camera"></i> <span>Recuerdo único</span></div>
            </div>
            @empty
            <div class="gallery-item reveal" style="background:#eee; display:flex; align-items:center; justify-content:center; cursor:default;">
                <p style="color:#888;"><i class="fa-solid fa-image"></i> No hay imágenes disponibles</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- ==================== GALERÍA DE VIDEOS ==================== --}}
    <section id="videos-gallery">
        <div class="section-header reveal">
            <span class="section-eyebrow">Vive la experiencia</span>
            <h2 class="section-title">Galería de <em style="color:var(--rosa-cta);">Videos</em></h2>
            <p style="color:rgba(255,255,255,0.7);font-size:0.9rem;margin-top:8px;">Descubre por qué nuestra experiencia es inolvidable</p>
        </div>
        <div class="video-grid">
            @foreach($videos as $index => $video)
            @php
            $thumbUrl = $video['provider'] === 'youtube'
            ? "https://img.youtube.com/vi/{$video['id']}/maxresdefault.jpg"
            : "https://img.youtube.com/vi/{$video['id']}/hqdefault.jpg";
            $embedUrl = $video['provider'] === 'youtube'
            ? "https://www.youtube.com/embed/{$video['id']}?autoplay=1&rel=0&modestbranding=1&showinfo=0"
            : "https://player.vimeo.com/video/{$video['id']}?autoplay=1";
            @endphp
            <div class="video-card {{ $video['featured'] ? 'featured' : '' }} reveal reveal-delay-{{ $index + 1 }}"
            data-video-url="{{ $embedUrl }}"
            data-video-title="{{ $video['title'] }}"
            data-video-provider="{{ $video['provider'] }}">
            <img class="video-thumb"
            src="{{ $thumbUrl }}"
            alt="{{ $video['title'] }}"
            loading="lazy"
            onerror="this.onerror=null;this.src='https://img.youtube.com/vi/{{ $video['id'] }}/hqdefault.jpg';">
            <div class="video-overlay-bg"></div>
            <div class="play-btn-circle">
                <i class="fa-solid fa-play"></i>
            </div>
            @if($video['badge'])
            <div class="video-badge">{{ $video['badge'] }}</div>
            @endif
            <div class="video-info">
                <span class="video-duration"><i class="fa-regular fa-clock"></i> {{ $video['duration'] }}</span>
                <div class="video-title">{{ $video['title'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Reserva --}}
<section id="reserva">
    <div style="max-width: 880px; margin: 0 auto; text-align: center;">
        <div class="section-header reveal" style="color:white;">
            <span class="section-eyebrow" style="color:var(--amarillo-acento);">Asegura tu lugar</span>
            <h2 class="section-title" style="color:white;">¿Listo para <em style="color:var(--amarillo-acento);">despegar?</em></h2>
        </div>
        <div class="reserva-card reveal reveal-delay-2">

            <div class="reserva-stepper">
                <div class="step-item active" data-step-indicator="1"><span class="step-circle">1</span> Vuelo</div>
                <div class="step-item" data-step-indicator="2"><span class="step-circle">2</span> Responsable</div>
                <div class="step-item" data-step-indicator="3"><span class="step-circle">3</span> Pago</div>
                <div class="step-item" data-step-indicator="4"><span class="step-circle">4</span> Pasajeros</div>
            </div>

            {{-- PASO 1: VUELO --}}
            <div class="reserva-step-panel active" data-step-panel="1">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">
                            <i class="fa-solid fa-gift"></i> Paquete
                        </label>
                        <select id="paqueteFinal">
                            @foreach($paquetes as $id => $pkg)
                            <option value="{{ $id }}">{{ $pkg['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">
                            <i class="fa-solid fa-calendar-days"></i> Fecha del viaje
                        </label>
                        <input type="date" id="fechaViaje" min="{{ now()->toDateString() }}">
                    </div>
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">
                            <i class="fa-solid fa-users"></i> Número de pasajeros
                        </label>
                        <select id="numPasajeros">
                            @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }} pasajero{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="reserva-nav" style="justify-content:flex-end;">
                    <button type="button" class="step-continuar" data-goto="2">Continuar <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            {{-- PASO 2: RESPONSABLE --}}
            <div class="reserva-step-panel" data-step-panel="2">
                <h3 style="margin-bottom:16px;">Datos del responsable de la reserva</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">Nombres *</label>
                        <input type="text" id="responsableNombres" placeholder="Nombres">
                    </div>
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">Apellidos *</label>
                        <input type="text" id="responsableApellidos" placeholder="Apellidos">
                    </div>
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">Correo electrónico *</label>
                        <input type="email" id="emailReserva" placeholder="tu@correo.com">
                    </div>
                    <div>
                        <label style="font-weight:700;font-size:0.75rem;color:var(--rosa-cta);margin-bottom:4px;display:block;">Teléfono (con lada) *</label>
                        <input type="tel" id="whatsappReserva" placeholder="Teléfono con lada">
                    </div>
                </div>

                <div class="reserva-aviso">
                    <i class="fa-solid fa-circle-info"></i> Los datos de cada pasajero se solicitarán después de realizar el pago.
                </div>

                <label style="font-size:0.8rem;display:block;margin-bottom:10px;">
                    <input type="checkbox" id="aceptaTerminos"> Acepto los <a href="#" style="color:var(--rosa-cta);">términos y condiciones</a> *
                </label>

                <ul class="reserva-warnings">
                    <li><i class="fa-solid fa-triangle-exclamation"></i> Presentar identificación oficial el día del vuelo</li>
                    <li><i class="fa-solid fa-triangle-exclamation"></i> Llegar 30 minutos antes de la hora programada</li>
                    <li><i class="fa-solid fa-triangle-exclamation"></i> El peso registrado debe ser exacto</li>
                </ul>

                <div class="reserva-nav">
                    <button type="button" class="btn-volver step-continuar" data-goto="1"><i class="fa-solid fa-arrow-left"></i> Volver</button>
                    <button type="button" class="step-continuar" data-goto="3">Continuar <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            {{-- PASO 3: PAGO --}}
            <div class="reserva-step-panel" data-step-panel="3">
                <h3 style="margin-bottom:16px;">Resumen y forma de pago</h3>

                <div class="resumen-reserva" id="resumenReserva"></div>

                <label style="font-weight:700;font-size:0.8rem;display:block;margin-bottom:8px;">Método de pago</label>
                <label class="metodo-pago-opt">
                    <input type="radio" name="metodoPago" value="tarjeta" checked>
                    <i class="fa-solid fa-credit-card"></i> Tarjeta de crédito/débito
                </label>
                <label class="metodo-pago-opt">
                    <input type="radio" name="metodoPago" value="transferencia">
                    <i class="fa-solid fa-building-columns"></i> Transferencia bancaria
                </label>
                <div class="reserva-aviso">
                    <i class="fa-solid fa-lock"></i> La pasarela de pago se integrará próximamente. Por ahora, al completar la reserva quedará registrada y te contactaremos para confirmar el cobro.
                </div>

                <div class="reserva-nav">
                    <button type="button" class="btn-volver step-continuar" data-goto="2"><i class="fa-solid fa-arrow-left"></i> Volver</button>
                    <button type="button" id="completarReserva">Completar reserva <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            {{-- PASO 4: PASAJEROS (post-pago) --}}
            <div class="reserva-step-panel" data-step-panel="4">
                <h3 style="margin-bottom:16px;">Datos de cada pasajero</h3>
                <div class="reserva-aviso">
                    <i class="fa-solid fa-circle-check" style="color:#2ecc71;"></i> Tu reserva #<span id="folioReserva"></span> quedó registrada. Completa a los pasajeros para confirmarla.
                </div>

                <div id="pasajerosContainer"></div>

                <div id="totalReservaLine" style="text-align:right;font-size:1.3rem;font-weight:800;color:var(--rosa-cta);margin-top:14px;">
                    Total: $0 MXN
                </div>

                <button id="submitReserva">
                    <i class="fa-solid fa-paper-plane"></i> Finalizar reservación
                </button>
                <p style="margin-top: 24px; font-size: 0.72rem; color: #777;">
                    <i class="fa-solid fa-shield-halved"></i> Te contactamos en menos de 2 horas para confirmar disponibilidad.
                </p>
            </div>

        </div>
    </div>
</section>

{{-- Conócenos --}}
<section id="conocenos">
    <div class="section-header reveal">
        <span class="section-eyebrow">Nuestra esencia</span>
        <h2 class="section-title">Conoce <em>más de nosotros</em></h2>
    </div>
    <div class="conocenos-grid">
        <div class="info-card reveal reveal-delay-1">
            <h3><i class="fa-solid fa-people-group"></i> Nosotros</h3>
            <p style="line-height:1.65;margin-bottom:22px;">
                Somos <strong>Hecho en Teoti</strong>, una empresa familiar con más de 15 años de experiencia
                ofreciendo vuelos en globo aerostático sobre la majestuosa Zona Arqueológica de Teotihuacán.
                Nacimos del amor por las tradiciones mexicanas y el deseo de compartir una vista única del
                amanecer entre las pirámides del Sol y la Luna. Cada vuelo es operado con los más altos
                estándares de seguridad y calidez humana.
            </p>
            <div class="mv-container">
                <div class="mv-item">
                    <h4><i class="fa-solid fa-bullseye"></i> Misión</h4>
                    <p>Brindar experiencias inolvidables y seguras, conectando a nuestros visitantes con la
                        grandeza de Teotihuacán desde las alturas.</p>
                    </div>
                    <div class="mv-item">
                        <h4><i class="fa-solid fa-eye"></i> Visión</h4>
                        <p>Ser la empresa líder en turismo de aventura cultural en México, reconocida por la
                            excelencia en servicio, innovación y compromiso con la sustentabilidad.</p>
                        </div>
                    </div>
                </div>
                <div class="info-card reveal reveal-delay-2">
                    <h3><i class="fa-solid fa-location-dot"></i> Ubicación</h3>
                    <p><strong>Globopuerto Teotihuacán</strong><br>Carretera Federal México-Tulancingo Km 28.5,
                    San Martín de las Pirámides, Estado de México, C.P. 55800</p>
                    <div class="map-container">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.513641244585!2d-98.84373008419524!3d19.689829785183985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f6b0e1e75b7b%3A0x9e1f6e8b3e2f8b4c!2sGlobopuerto%20Teotihuac%C3%A1n!5e0!3m2!1ses!2smx!4v1650000000000!5m2!1ses!2smx"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <h3 style="margin-top:28px;"><i class="fa-solid fa-address-book"></i> Contacto y horarios</h3>
                <div class="contact-item"><span class="contact-icon"><i class="fa-solid fa-phone"></i></span> <span>+52 55 4321 8765</span></div>
                <div class="contact-item"><span class="contact-icon"><i class="fa-solid fa-envelope"></i></span> <span>vuelos@hechoenteoti.mx</span></div>
                <div class="contact-item"><span class="contact-icon"><i class="fa-solid fa-clock"></i></span> <span>Lunes a Domingo: 06:00 - 14:00 hrs (vuelos al amanecer)</span></div>
                <div class="contact-item"><span class="contact-icon"><i class="fa-brands fa-whatsapp"></i></span> <span>WhatsApp: +52 55 1234 5678</span></div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer>
        <div style="max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;flex-wrap:wrap;gap:36px;">
            <div>
                <strong style="font-family:'Permanent Marker',cursive;font-size:1.5rem;">
                    <i class="fa-solid fa-balloon"></i> hecho<span style="color:var(--amarillo-acento);">en</span>teoti
                </strong>
                <br>Desde 2009 · Experiencias únicas
            </div>
            <div><strong><i class="fa-solid fa-phone"></i> Contacto</strong><br>📞 55 4321 8765<br>✉️ vuelos@hechoenteoti.mx</div>
            <div><strong><i class="fa-solid fa-circle-info"></i> Información</strong><br>Políticas de clima<br>Términos y condiciones</div>
            <div><strong><i class="fa-solid fa-share-nodes"></i> Redes</strong><br>
                <i class="fa-brands fa-instagram"></i> IG ·
                <i class="fa-brands fa-tiktok"></i> TT ·
                <i class="fa-brands fa-facebook"></i> FB
            </div>
        </div>
        <div style="text-align:center;margin-top:50px;font-size:0.7rem;color:#888;">
            © 2025 Hecho en Teoti · Pilotos certificados AFAC <i class="fa-solid fa-certificate"></i>
        </div>
    </footer>

    {{-- Botón volver arriba --}}
    <button class="back-to-top" id="backToTop" aria-label="Volver arriba">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    {{-- WhatsApp FAB --}}
    <a href="https://wa.me/525512345678" class="whatsapp-fab" target="_blank" rel="noopener" aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    {{-- Carrito flotante --}}
    <button class="cart-fab visible" id="cartFab" type="button">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Mi reserva</span>
    </button>

    {{-- Lightbox imágenes --}}
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <img id="lightboxImg" src="" alt="">
            <button class="lightbox-close" id="lightboxClose"><i class="fa-solid fa-xmark"></i></button>
            <button class="lightbox-prev" id="lightboxPrev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="lightbox-next" id="lightboxNext"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>

    {{-- Lightbox de Video --}}
    <div class="video-lightbox" id="videoLightbox">
        <div class="video-lightbox-container">
            <iframe id="videoIframe" src="" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
        <button class="video-lightbox-close" id="videoLightboxClose" aria-label="Cerrar video">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="video-lightbox-title" id="videoLightboxTitle"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr">
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // ============ PRELOADER ============
        const preloader = document.getElementById('preloader');
        const hidePreloader = () => {
            if (preloader && !preloader.classList.contains('hidden')) {
                preloader.classList.add('hidden');
                setTimeout(() => { if (preloader) preloader.style.display = 'none'; }, 500);
            }
        };
        window.addEventListener('load', hidePreloader);
        setTimeout(hidePreloader, 2500);

        // ============ FLATPICKR ============
        flatpickr("#bookingDate", {
            locale: "es",
            dateFormat: "Y-m-d",
            minDate: "today",
            defaultDate: "2026-06-20",
            disableMobile: true,
        });

        // ============ HERO SWIPER ============
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: { delay: 4200, disableOnInteraction: false },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination', clickable: true },
        });

        // ============ PRECIOS ============
        const prices = @json($paquetes);

        function updateSummary() {
            const adults = parseInt(document.getElementById('adultsCount').value) || 0;
            const children = parseInt(document.getElementById('childrenCount').value) || 0;
            const pkgId = parseInt(document.getElementById('packageSelect').value);
            const pkg = prices[pkgId];
            if (!pkg) return;
            const total = (adults * pkg.adult) + (children * pkg.child);
            const date = document.getElementById('bookingDate').value;
            const formattedDate = date ? new Date(date + 'T00:00:00').toLocaleDateString('es-MX', { day: 'numeric',
                month: 'short', year: 'numeric' }) : 'fecha';
            document.getElementById('summaryText').innerHTML =
                `<i class="fa-solid fa-calendar"></i> ${formattedDate} · ${adults} adultos, ${children} niños · ${pkg.name}`;
            document.getElementById('totalDisplay').innerHTML = `$${total.toLocaleString()} MXN`;
        }

        // ============ WIZARD DE RESERVA (4 pasos) ============
        function calcEdad(fechaStr) {
            const nac = new Date(fechaStr + 'T00:00:00');
            const hoy = new Date();
            let edad = hoy.getFullYear() - nac.getFullYear();
            const m = hoy.getMonth() - nac.getMonth();
            if (m < 0 || (m === 0 && hoy.getDate() < nac.getDate())) edad--;
            return edad;
        }

        function pkgActual() {
            return prices[document.getElementById('paqueteFinal').value];
        }

        function goToStep(n) {
            document.querySelectorAll('.reserva-step-panel').forEach(p => {
                p.classList.toggle('active', p.getAttribute('data-step-panel') === String(n));
            });
            document.querySelectorAll('.reserva-stepper .step-item').forEach(s => {
                const step = parseInt(s.getAttribute('data-step-indicator'));
                s.classList.toggle('active', step === n);
                s.classList.toggle('done', step < n);
            });
            document.getElementById('reserva').scrollIntoView({ behavior: 'smooth' });
        }

        document.querySelectorAll('.step-continuar').forEach(btn => {
            btn.addEventListener('click', () => {
                const destino = parseInt(btn.getAttribute('data-goto'));
                if (destino === 3) {
                    if (!validarResponsable()) return;
                    mostrarResumen();
                }
                goToStep(destino);
            });
        });

        function validarResponsable() {
            const nombres = document.getElementById('responsableNombres').value.trim();
            const apellidos = document.getElementById('responsableApellidos').value.trim();
            const email = document.getElementById('emailReserva').value.trim();
            const acepta = document.getElementById('aceptaTerminos').checked;
            if (!nombres || !apellidos || !email) {
                Swal.fire({ icon: 'error', title: 'Datos incompletos',
                    text: 'Completa nombres, apellidos y correo electrónico.',
                    confirmButtonColor: '#ff0099' });
                return false;
            }
            if (!acepta) {
                Swal.fire({ icon: 'warning', title: 'Falta aceptar términos',
                    text: 'Debes aceptar los términos y condiciones para continuar.',
                    confirmButtonColor: '#ff0099' });
                return false;
            }
            return true;
        }

        function mostrarResumen() {
            const pkg = pkgActual();
            const cantidad = parseInt(document.getElementById('numPasajeros').value) || 1;
            const fecha = document.getElementById('fechaViaje').value || 'Sin definir';
            const totalEstimado = pkg ? cantidad * pkg.adult : 0;
            document.getElementById('resumenReserva').innerHTML = `
                <div><span>Paquete</span><strong>${pkg ? pkg.name : ''}</strong></div>
                <div><span>Fecha del viaje</span><strong>${fecha}</strong></div>
                <div><span>Pasajeros</span><strong>${cantidad}</strong></div>
                <div class="resumen-total"><span>Total estimado</span><span>$${totalEstimado.toLocaleString()} MXN</span></div>
            `;
        }

        // ---- Pasajeros (paso 4, se llenan tras "pagar") ----
        function pasajeroRowHtml(i, p = {}) {
            const hoyStr = new Date().toISOString().split('T')[0];
            return `
            <div class="persona-row" style="border:1px solid #eee;border-radius:14px;padding:10px;margin-bottom:10px;">
                <div style="font-weight:700;font-size:0.8rem;color:var(--rosa-cta);margin-bottom:6px;">Pasajero ${i + 1}</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                    <input type="text" class="p-nombre" placeholder="Nombre(s)" value="${p.nombre || ''}">
                    <input type="text" class="p-apellidos" placeholder="Apellidos" value="${p.apellidos || ''}">
                    <input type="number" class="p-peso" placeholder="Peso (kg)" min="1" max="300" value="${p.peso || ''}">
                    <input type="date" class="p-fecha" max="${hoyStr}" value="${p.fecha_nacimiento || ''}">
                </div>
                <div class="p-edad-info" style="font-size:0.72rem;color:#888;margin-top:4px;"></div>
            </div>`;
        }

        function renderPasajeros() {
            const cantidad = parseInt(document.getElementById('numPasajeros').value) || 1;
            const container = document.getElementById('pasajerosContainer');
            let html = '';
            for (let i = 0; i < cantidad; i++) html += pasajeroRowHtml(i);
            container.innerHTML = html;
            recalcularTotal();
        }

        function leerPasajeros(soloValidos = true) {
            const filas = document.querySelectorAll('#pasajerosContainer .persona-row');
            const personas = [];
            filas.forEach(row => {
                const nombre = row.querySelector('.p-nombre').value.trim();
                const apellidos = row.querySelector('.p-apellidos').value.trim();
                const peso = parseFloat(row.querySelector('.p-peso').value);
                const fecha = row.querySelector('.p-fecha').value;
                if (soloValidos && (!nombre || !apellidos || !peso || !fecha)) return;
                personas.push({ nombre, apellidos, peso, fecha_nacimiento: fecha, edad: fecha ? calcEdad(fecha) : null });
            });
            return personas;
        }

        function recalcularTotal() {
            const pkg = pkgActual();
            let total = 0;
            document.querySelectorAll('#pasajerosContainer .persona-row').forEach(row => {
                const fecha = row.querySelector('.p-fecha').value;
                const info = row.querySelector('.p-edad-info');
                if (fecha && pkg) {
                    const edad = calcEdad(fecha);
                    const precio = edad <= 10 ? pkg.child : pkg.adult;
                    info.textContent = `Edad: ${edad} año(s) · ${edad <= 10 ? 'Niño' : 'Adulto'} · $${precio.toLocaleString()} MXN`;
                    total += precio;
                } else {
                    info.textContent = '';
                }
            });
            document.getElementById('totalReservaLine').textContent = `Total: $${total.toLocaleString()} MXN`;
        }

        document.getElementById('pasajerosContainer').addEventListener('input', recalcularTotal);

        function showCartStatus() {
            const pkg = pkgActual();
            const cantidad = parseInt(document.getElementById('numPasajeros').value) || 1;
            const totalEstimado = pkg ? cantidad * pkg.adult : 0;
            Swal.fire({
                title: '<i class="fa-solid fa-cart-shopping"></i> Tu reservación',
                html: `
                    <div style="text-align:left;">
                        <div style="font-weight:800;margin-bottom:6px;">${pkg ? pkg.name : 'Sin paquete seleccionado'}</div>
                        <div style="font-size:0.85rem;color:#555;">${cantidad} pasajero(s)</div>
                        <div style="text-align:right;font-size:1.2rem;font-weight:800;color:var(--rosa-cta);margin-top:10px;">Total estimado: $${totalEstimado.toLocaleString()} MXN</div>
                    </div>
                `,
                confirmButtonText: 'Ir al formulario',
                confirmButtonColor: '#0099ff',
            }).then(() => document.getElementById('reserva').scrollIntoView({ behavior: 'smooth' }));
        }
        document.getElementById('cartFab').addEventListener('click', showCartStatus);

        document.querySelectorAll('.select-pkg').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const pkgId = btn.getAttribute('data-pkg');
                if (!pkgId) return;
                document.getElementById('paqueteFinal').value = pkgId;
                goToStep(1);
            });
        });

        document.getElementById('adultsCount').addEventListener('input', updateSummary);
        document.getElementById('childrenCount').addEventListener('input', updateSummary);
        document.getElementById('packageSelect').addEventListener('change', updateSummary);
        document.getElementById('bookingDate').addEventListener('change', updateSummary);
        document.getElementById('searchBtn').addEventListener('click', () => {
            updateSummary();
            document.getElementById('paquetes').scrollIntoView({ behavior: 'smooth' });
        });

        // ============ INTL-TEL-INPUT ============
        let itiPhone = null;
        const phoneInput = document.querySelector("#whatsappReserva");
        if (phoneInput) {
            itiPhone = intlTelInput(phoneInput, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch('https://ipapi.co/json/')
                        .then(res => res.json())
                        .then(data => callback(data.country_code.toLowerCase()))
                        .catch(() => callback("mx"));
                },
                separateDialCode: true,
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js",
                preferredCountries: ['mx', 'us', 'es', 'co', 'ar'],
                autoPlaceholder: "aggressive",
                formatOnDisplay: true,
            });
        }

        function obtenerTelefonoValidado() {
            if (itiPhone) {
                if (itiPhone.isValidNumber()) return { ok: true, numero: itiPhone.getNumber() };
                Swal.fire({ icon: 'warning', title: 'Número inválido',
                    text: 'Ingresa un teléfono válido (incluyendo lada).',
                    confirmButtonColor: '#ff0099' });
                return { ok: false, numero: '' };
            }
            const raw = document.getElementById('whatsappReserva').value.trim();
            if (!raw) {
                Swal.fire({ icon: 'error', title: 'Falta el teléfono',
                    text: 'Ingresa tu teléfono con lada.',
                    confirmButtonColor: '#ff0099' });
                return { ok: false, numero: '' };
            }
            return { ok: true, numero: raw };
        }

        // ============ FASE 1: COMPLETAR RESERVA (vuelo + responsable + pago) ============
        let reservaActualId = null;

        const completarBtn = document.getElementById('completarReserva');
        completarBtn.addEventListener('click', () => {
            const fechaViaje = document.getElementById('fechaViaje').value;
            if (!fechaViaje) {
                Swal.fire({ icon: 'warning', title: 'Falta la fecha del viaje',
                    text: 'Selecciona la fecha en la que quieres volar.',
                    confirmButtonColor: '#ff0099' });
                return;
            }
            const telefono = obtenerTelefonoValidado();
            if (!telefono.ok) return;

            const nombreCompleto = `${document.getElementById('responsableNombres').value.trim()} ${document.getElementById('responsableApellidos').value.trim()}`.trim();
            const metodoPago = document.querySelector('input[name="metodoPago"]:checked').value;

            completarBtn.disabled = true;
            fetch('/reservas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    paquete_id: parseInt(document.getElementById('paqueteFinal').value),
                    fecha_viaje: fechaViaje,
                    num_personas: parseInt(document.getElementById('numPasajeros').value),
                    contacto_nombre: nombreCompleto,
                    contacto_telefono: telefono.numero,
                    contacto_correo: document.getElementById('emailReserva').value.trim(),
                    metodo_pago: metodoPago,
                }),
            })
            .then(res => res.json().then(data => ({ status: res.status, data })))
            .then(({ status, data }) => {
                completarBtn.disabled = false;
                if (status !== 200 || !data.ok) {
                    Swal.fire({ icon: 'error', title: 'No se pudo completar la reserva',
                        text: 'Revisa tus datos e intenta de nuevo.',
                        confirmButtonColor: '#ff0099' });
                    return;
                }
                reservaActualId = data.reserva_id;
                document.getElementById('folioReserva').textContent = data.reserva_id;
                renderPasajeros();
                goToStep(4);
            })
            .catch(() => {
                completarBtn.disabled = false;
                Swal.fire({ icon: 'error', title: 'Error de conexión',
                    text: 'Intenta nuevamente.', confirmButtonColor: '#ff0099' });
            });
        });

        // ============ FASE 2: PASAJEROS (post-pago) ============
        const submitBtn = document.getElementById('submitReserva');
        submitBtn.addEventListener('click', () => {
            const personas = leerPasajeros();
            if (personas.length === 0) {
                Swal.fire({ icon: 'warning', title: 'Faltan datos de pasajeros',
                    text: 'Completa nombre, apellidos, peso y fecha de nacimiento de cada pasajero.',
                    confirmButtonColor: '#ff0099' });
                return;
            }
            if (!reservaActualId) return;

            submitBtn.disabled = true;
            fetch(`/reservas/${reservaActualId}/pasajeros`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ personas }),
            })
            .then(res => res.json().then(data => ({ status: res.status, data })))
            .then(({ status, data }) => {
                submitBtn.disabled = false;
                if (status !== 200 || !data.ok) {
                    Swal.fire({ icon: 'error', title: 'No se pudo enviar',
                        text: 'Revisa tus datos e intenta de nuevo.',
                        confirmButtonColor: '#ff0099' });
                    return;
                }
                Swal.fire({
                    icon: 'success',
                    title: '¡Reservación completada!',
                    html: `Folio #${data.reserva_id}.<br>Total: <strong>$${Number(data.total).toLocaleString()} MXN</strong> · ${data.num_personas} pasajero(s)<br><br>Te contactaremos para confirmar todo.`,
                    confirmButtonColor: '#0099ff',
                });
                // Reset del wizard completo
                reservaActualId = null;
                document.getElementById('responsableNombres').value = '';
                document.getElementById('responsableApellidos').value = '';
                document.getElementById('emailReserva').value = '';
                document.getElementById('fechaViaje').value = '';
                document.getElementById('numPasajeros').value = '1';
                document.getElementById('aceptaTerminos').checked = false;
                goToStep(1);
            })
            .catch(() => {
                submitBtn.disabled = false;
                Swal.fire({ icon: 'error', title: 'Error de conexión',
                    text: 'Intenta nuevamente.', confirmButtonColor: '#ff0099' });
            });
        });

        // ============ NAV SCROLL ============
        const nav = document.getElementById('main-nav');
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY > 20;
            nav.classList.toggle('nav-scrolled', scrolled);
            backToTop.classList.toggle('visible', window.scrollY > 500);
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ============ MOBILE MENU ============
        const hamburger = document.getElementById('hamburger'),
            mobileMenu = document.getElementById('mobile-menu'),
            overlay = document.getElementById('menuOverlay');

        function toggleMobileMenu(open) {
            mobileMenu.classList.toggle('open', open);
            hamburger.classList.toggle('active', open);
            overlay.classList.toggle('active', open);
            document.body.style.overflow = open ? 'hidden' : '';
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

        // ============ REVEAL ON SCROLL ============
        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealElements.forEach(el => revealObserver.observe(el));

        // ============ LIGHTBOX IMÁGENES ============
        const galleryItems = document.querySelectorAll('.gallery-item');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        const closeBtn = document.getElementById('lightboxClose');
        const prevBtn = document.getElementById('lightboxPrev');
        const nextBtn = document.getElementById('lightboxNext');
        let currentIndex = 0;
        const images = Array.from(galleryItems)
            .filter(item => item.querySelector('img'))
            .map(item => item.querySelector('img').src);

        function openLightbox(index) {
            if (images.length === 0) return;
            currentIndex = index;
            lightboxImg.src = images[currentIndex];
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }

        function showNext() {
            if (images.length === 0) return;
            currentIndex = (currentIndex + 1) % images.length;
            lightboxImg.src = images[currentIndex];
        }

        function showPrev() {
            if (images.length === 0) return;
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            lightboxImg.src = images[currentIndex];
        }
        galleryItems.forEach((item, idx) => {
            if (item.querySelector('img')) {
                item.addEventListener('click', () => openLightbox(idx));
            }
        });
        if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
        if (nextBtn) nextBtn.addEventListener('click', showNext);
        if (prevBtn) prevBtn.addEventListener('click', showPrev);
        if (lightbox) lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') showNext();
            if (e.key === 'ArrowLeft') showPrev();
        });

        // ============ VIDEO LIGHTBOX ============
        const videoLightbox = document.getElementById('videoLightbox');
        const videoIframe = document.getElementById('videoIframe');
        const videoCloseBtn = document.getElementById('videoLightboxClose');
        const videoTitleEl = document.getElementById('videoLightboxTitle');
        const videoCards = document.querySelectorAll('.video-card');
        let currentVideoUrl = '';

        function openVideoLightbox(videoUrl, videoTitle) {
            currentVideoUrl = videoUrl;
            videoIframe.src = videoUrl;
            videoTitleEl.textContent = videoTitle;
            videoLightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
            // Pequeño delay para la animación de escala
            setTimeout(() => {
                document.querySelector('.video-lightbox-container').style.transform = 'scale(1)';
            }, 50);
        }

        function closeVideoLightbox() {
            videoLightbox.classList.remove('active');
            document.querySelector('.video-lightbox-container').style.transform = 'scale(0.9)';
            // Destruir el iframe para detener reproducción
            videoIframe.src = '';
            currentVideoUrl = '';
            videoTitleEl.textContent = '';
            document.body.style.overflow = '';
        }

        videoCards.forEach(card => {
            card.addEventListener('click', () => {
                const videoUrl = card.getAttribute('data-video-url');
                const videoTitle = card.getAttribute('data-video-title');
                if (videoUrl) {
                    openVideoLightbox(videoUrl, videoTitle);
                }
            });
        });

        if (videoCloseBtn) {
            videoCloseBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeVideoLightbox();
            });
        }

        // Cerrar al hacer clic fuera del contenedor
        if (videoLightbox) {
            videoLightbox.addEventListener('click', (e) => {
                if (e.target === videoLightbox) {
                    closeVideoLightbox();
                }
            });
        }

        // Cerrar con tecla Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && videoLightbox.classList.contains('active')) {
                closeVideoLightbox();
            }
        });

        // ============ INICIALIZAR RESUMEN ============
        updateSummary();
    });
</script>
</body>
</html>
