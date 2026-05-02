<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hecho en Teoti | Vuelos en Globo · Teotihuacán</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
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
            --radius: 16px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--night);
            color: var(--text);
            overflow-x: hidden;
            cursor: none;
        }

        /* ── CUSTOM CURSOR ── */
        .cursor {
            width: 10px;
            height: 10px;
            background: var(--gold);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.15s ease, opacity 0.2s;
            transform: translate(-50%, -50%);
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
            transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            opacity: 0.5;
        }

        /* ── NAV ── */
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
            transition: all 0.5s ease;
        }

        nav.scrolled {
            background: rgba(6, 8, 15, 0.85);
            backdrop-filter: blur(20px);
            padding: 14px 40px;
            border-bottom: 1px solid rgba(200, 151, 42, 0.12);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(20px, 2.5vw, 26px);
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
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: rgba(237, 232, 223, 0.65);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--gold);
            color: var(--night) !important;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600 !important;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-cta:hover {
            background: var(--gold-light) !important;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(200, 151, 42, 0.3);
        }

        .nav-cta::after {
            display: none !important;
        }

        /* Mobile hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: none;
            background: none;
            border: none;
            padding: 4px;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 1.5px;
            background: var(--text);
            transition: all 0.3s;
        }

        .hamburger.open span:nth-child(1) {
            transform: translateY(6.5px) rotate(45deg);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open span:nth-child(3) {
            transform: translateY(-6.5px) rotate(-45deg);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(6, 8, 15, 0.97);
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
            font-size: 36px;
            font-weight: 300;
            color: var(--text);
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: color 0.3s;
        }

        .mobile-menu a:hover {
            color: var(--gold);
        }

        /* ── HERO ── */
        #hero {
            position: relative;
            min-height: 100dvh;
            display: flex;
            align-items: flex-end;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to top, var(--night) 0%, rgba(6, 8, 15, 0.3) 50%, rgba(6, 8, 15, 0.1) 100%),
                linear-gradient(160deg, rgba(255, 122, 61, 0.15) 0%, transparent 40%),
                url('https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=1800&q=85') center/cover no-repeat;
            transform: scale(1.04);
            animation: slowPan 20s ease-in-out infinite alternate;
        }

        @keyframes slowPan {
            from {
                transform: scale(1.04) translateX(0);
            }

            to {
                transform: scale(1.08) translateX(-2%);
            }
        }

        /* Star particles */
        .stars {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 1;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--d, 3s) ease-in-out infinite;
            opacity: 0;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: var(--op, 0.8);
            }
        }

        /* Floating balloon */
        .balloon-svg {
            position: absolute;
            right: 8%;
            top: 15%;
            width: clamp(200px, 22vw, 380px);
            animation: floatBalloon 8s ease-in-out infinite;
            z-index: 2;
            filter: drop-shadow(0 20px 60px rgba(200, 151, 42, 0.25));
        }

        @keyframes floatBalloon {

            0%,
            100% {
                transform: translateY(0) rotate(-1deg);
            }

            50% {
                transform: translateY(-24px) rotate(1deg);
            }
        }

        .hero-content {
            position: relative;
            z-index: 3;
            padding: clamp(40px, 8vw, 100px);
            padding-bottom: clamp(60px, 10vw, 120px);
            max-width: 900px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200, 151, 42, 0.12);
            border: 1px solid rgba(200, 151, 42, 0.3);
            border-radius: 50px;
            padding: 8px 18px;
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold-pale);
            margin-bottom: 28px;
            backdrop-filter: blur(10px);
            animation: fadeSlideUp 0.8s ease both;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            background: var(--gold);
            border-radius: 50%;
            animation: pulse 2s ease infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: 0.5;
                transform: scale(0.7)
            }
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(52px, 9vw, 130px);
            font-weight: 300;
            line-height: 0.92;
            letter-spacing: -0.01em;
            color: var(--text);
            animation: fadeSlideUp 0.9s 0.1s ease both;
        }

        .hero-title em {
            font-style: italic;
            color: var(--gold);
            display: block;
        }

        .hero-sub {
            margin-top: 28px;
            font-size: clamp(14px, 1.4vw, 17px);
            color: rgba(237, 232, 223, 0.6);
            font-weight: 300;
            line-height: 1.7;
            max-width: 460px;
            animation: fadeSlideUp 1s 0.25s ease both;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            margin-top: 44px;
            flex-wrap: wrap;
            animation: fadeSlideUp 1s 0.4s ease both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold);
            color: var(--night);
            text-decoration: none;
            padding: 16px 36px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.06em;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(200, 151, 42, 0.35);
        }

        .btn-primary svg {
            transition: transform 0.3s;
        }

        .btn-primary:hover svg {
            transform: translateX(4px);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--text);
            text-decoration: none;
            padding: 15px 32px;
            border-radius: 50px;
            font-weight: 400;
            font-size: 14px;
            letter-spacing: 0.04em;
            border: 1px solid rgba(237, 232, 223, 0.2);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-ghost:hover {
            border-color: rgba(237, 232, 223, 0.5);
            background: rgba(237, 232, 223, 0.05);
        }

        .hero-stats {
            position: absolute;
            right: clamp(24px, 5vw, 80px);
            bottom: clamp(60px, 10vw, 120px);
            z-index: 3;
            display: flex;
            flex-direction: column;
            gap: 24px;
            animation: fadeSlideUp 1s 0.6s ease both;
        }

        .stat-item {
            text-align: right;
            border-right: 1px solid rgba(200, 151, 42, 0.35);
            padding-right: 20px;
        }

        .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(32px, 3.5vw, 48px);
            font-weight: 300;
            color: var(--gold-light);
            line-height: 1;
        }

        .stat-label {
            font-size: 10px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .scroll-hint {
            position: absolute;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--text-muted);
            animation: fadeSlideUp 1.2s 0.8s ease both;
        }

        .scroll-line {
            width: 1px;
            height: 48px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scrollLine 2s ease-in-out infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: scaleY(0);
                transform-origin: top;
            }

            50% {
                transform: scaleY(1);
                transform-origin: top;
            }

            50.01% {
                transform: scaleY(1);
                transform-origin: bottom;
            }

            100% {
                transform: scaleY(0);
                transform-origin: bottom;
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── EXPERIENCE STRIP ── */
        .experience-strip {
            background: var(--night-2);
            border-top: 1px solid rgba(200, 151, 42, 0.08);
            border-bottom: 1px solid rgba(200, 151, 42, 0.08);
            padding: 32px 40px;
            overflow: hidden;
        }

        .strip-inner {
            display: flex;
            gap: 80px;
            animation: stripScroll 25s linear infinite;
            width: max-content;
        }

        @keyframes stripScroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        .strip-item {
            display: flex;
            align-items: center;
            gap: 14px;
            white-space: nowrap;
            font-size: 13px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .strip-item svg {
            color: var(--gold);
            flex-shrink: 0;
        }

        /* ── SECTION HEADER ── */
        .section-eyebrow {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 16px;
            font-weight: 500;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(38px, 5vw, 68px);
            font-weight: 300;
            line-height: 1.05;
            color: var(--text);
        }

        .section-title em {
            font-style: italic;
            color: var(--gold);
        }

        /* ── EXPERIENCES ── */
        #experiencias {
            padding: 120px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .exp-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px;
            margin-top: 72px;
            border-radius: 24px;
            overflow: hidden;
        }

        .exp-card {
            position: relative;
            aspect-ratio: 4/3;
            overflow: hidden;
            cursor: none;
        }

        .exp-card.tall {
            grid-row: span 2;
            aspect-ratio: auto;
        }

        .exp-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .exp-card:hover img {
            transform: scale(1.07);
        }

        .exp-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(6, 8, 15, 0.9) 0%, rgba(6, 8, 15, 0.2) 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 36px;
            transition: background 0.4s;
        }

        .exp-card:hover .exp-overlay {
            background: linear-gradient(to top, rgba(6, 8, 15, 0.95) 0%, rgba(6, 8, 15, 0.35) 60%);
        }

        .exp-tag {
            display: inline-block;
            background: rgba(200, 151, 42, 0.15);
            border: 1px solid rgba(200, 151, 42, 0.3);
            color: var(--gold-pale);
            font-size: 10px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 50px;
            margin-bottom: 12px;
            width: fit-content;
        }

        .exp-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(24px, 2.5vw, 36px);
            font-weight: 400;
            line-height: 1.1;
        }

        .exp-desc {
            font-size: 13px;
            color: rgba(237, 232, 223, 0.6);
            line-height: 1.6;
            margin-top: 8px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, margin-top 0.3s;
        }

        .exp-card:hover .exp-desc {
            max-height: 80px;
            margin-top: 10px;
        }

        .exp-arrow {
            position: absolute;
            top: 28px;
            right: 28px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(200, 151, 42, 0.1);
            border: 1px solid rgba(200, 151, 42, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            transform: rotate(-45deg);
            transition: all 0.3s ease;
        }

        .exp-card:hover .exp-arrow {
            background: var(--gold);
            color: var(--night);
            transform: rotate(0);
        }

        /* ── PACKAGES ── */
        #paquetes {
            padding: 120px 40px;
            background: var(--night-2);
        }

        #paquetes .inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .pkg-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 72px;
        }

        .pkg-card {
            background: var(--night-3);
            border: 1px solid rgba(237, 232, 223, 0.06);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: none;
        }

        .pkg-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(200, 151, 42, 0.06), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .pkg-card:hover::before {
            opacity: 1;
        }

        .pkg-card:hover {
            border-color: rgba(200, 151, 42, 0.25);
            transform: translateY(-4px);
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.4);
        }

        .pkg-card.featured {
            border-color: rgba(200, 151, 42, 0.4);
            background: linear-gradient(160deg, rgba(200, 151, 42, 0.08), var(--night-3) 60%);
        }

        .pkg-card.featured::after {
            content: 'MÁS POPULAR';
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gold);
            color: var(--night);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.15em;
            padding: 4px 12px;
            border-radius: 50px;
        }

        .pkg-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(200, 151, 42, 0.1);
            border: 1px solid rgba(200, 151, 42, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 28px;
        }

        .pkg-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 400;
            margin-bottom: 6px;
        }

        .pkg-subtitle {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 0.08em;
            margin-bottom: 24px;
        }

        .pkg-price {
            display: flex;
            align-items: baseline;
            gap: 6px;
            margin-bottom: 28px;
        }

        .pkg-price .currency {
            font-size: 16px;
            color: var(--gold);
            margin-top: 4px;
        }

        .pkg-price .amount {
            font-family: 'Cormorant Garamond', serif;
            font-size: 52px;
            font-weight: 300;
            color: var(--text);
            line-height: 1;
        }

        .pkg-price .per {
            font-size: 12px;
            color: var(--text-muted);
            align-self: flex-end;
            margin-bottom: 6px;
        }

        .pkg-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 36px;
        }

        .pkg-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 13px;
            color: rgba(237, 232, 223, 0.75);
            line-height: 1.4;
        }

        .pkg-features li::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
            margin-top: 5px;
        }

        .pkg-btn {
            display: block;
            text-align: center;
            padding: 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pkg-btn-outline {
            border: 1px solid rgba(200, 151, 42, 0.35);
            color: var(--gold);
        }

        .pkg-btn-outline:hover {
            background: rgba(200, 151, 42, 0.1);
            border-color: var(--gold);
        }

        .pkg-btn-solid {
            background: var(--gold);
            color: var(--night);
        }

        .pkg-btn-solid:hover {
            background: var(--gold-light);
            box-shadow: 0 8px 30px rgba(200, 151, 42, 0.35);
        }

        /* ── HOW IT WORKS ── */
        #como-funciona {
            padding: 120px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            margin-top: 72px;
            position: relative;
        }

        .steps::before {
            content: '';
            position: absolute;
            top: 36px;
            left: calc(12.5% + 20px);
            right: calc(12.5% + 20px);
            height: 1px;
            background: linear-gradient(to right, var(--gold), rgba(200, 151, 42, 0.2), var(--gold));
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 20px;
            position: relative;
        }

        .step-num {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: var(--night-2);
            border: 1px solid rgba(200, 151, 42, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 300;
            color: var(--gold);
            margin-bottom: 28px;
            position: relative;
            z-index: 1;
            transition: all 0.3s;
        }

        .step:hover .step-num {
            background: var(--gold);
            color: var(--night);
            border-color: var(--gold);
            transform: scale(1.1);
        }

        .step-icon {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .step-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .step-text {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* ── GALLERY ── */
        #galeria {
            padding: 120px 40px;
            background: var(--night-2);
        }

        #galeria .inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .gallery-masonry {
            columns: 3;
            gap: 12px;
            margin-top: 72px;
        }

        @media (max-width: 768px) {
            .gallery-masonry {
                columns: 2;
            }
        }

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 12px;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            cursor: none;
        }

        .gallery-item img {
            width: 100%;
            display: block;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.06);
        }

        .gallery-item-overlay {
            position: absolute;
            inset: 0;
            background: rgba(6, 8, 15, 0);
            transition: background 0.4s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-item:hover .gallery-item-overlay {
            background: rgba(6, 8, 15, 0.4);
        }

        .gallery-zoom {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
            color: var(--gold);
            font-size: 28px;
        }

        .gallery-item:hover .gallery-zoom {
            opacity: 1;
            transform: scale(1);
        }

        /* ── TESTIMONIALS ── */
        #testimonios {
            padding: 120px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 72px;
        }

        .testi-card {
            background: var(--night-2);
            border: 1px solid rgba(237, 232, 223, 0.06);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.3s;
        }

        .testi-card:hover {
            border-color: rgba(200, 151, 42, 0.2);
        }

        .testi-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 30px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 140px;
            font-weight: 700;
            color: rgba(200, 151, 42, 0.06);
            line-height: 1;
            pointer-events: none;
        }

        .stars {
            display: flex;
            gap: 3px;
            margin-bottom: 20px;
        }

        .star-filled {
            color: var(--gold);
            font-size: 14px;
        }

        .testi-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(17px, 1.5vw, 21px);
            font-style: italic;
            font-weight: 300;
            line-height: 1.65;
            color: rgba(237, 232, 223, 0.85);
            margin-bottom: 28px;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--dawn));
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            color: var(--night);
            font-weight: 600;
        }

        .author-name {
            font-weight: 600;
            font-size: 14px;
        }

        .author-role {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* ── BOOKING CTA ── */
        #reserva {
            padding: 160px 40px;
            position: relative;
            overflow: hidden;
        }

        .booking-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to bottom, var(--night) 0%, rgba(6, 8, 15, 0.6) 50%, var(--night) 100%),
                url('https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=1800&q=85') center/cover;
        }

        .booking-inner {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .booking-form {
            background: rgba(13, 18, 32, 0.85);
            border: 1px solid rgba(200, 151, 42, 0.2);
            border-radius: 24px;
            padding: 48px;
            margin-top: 56px;
            backdrop-filter: blur(20px);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-field label {
            font-size: 11px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
        }

        .form-field input,
        .form-field select {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(237, 232, 223, 0.1);
            border-radius: 12px;
            padding: 14px 18px;
            color: var(--text);
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
            width: 100%;
            appearance: none;
        }

        .form-field input:focus,
        .form-field select:focus {
            border-color: rgba(200, 151, 42, 0.5);
        }

        .form-field select option {
            background: var(--night-3);
        }

        .form-submit {
            width: 100%;
            padding: 18px;
            background: var(--gold);
            color: var(--night);
            border: none;
            border-radius: 50px;
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.08em;
            cursor: none;
            margin-top: 8px;
            transition: all 0.3s ease;
        }

        .form-submit:hover {
            background: var(--gold-light);
            box-shadow: 0 12px 40px rgba(200, 151, 42, 0.4);
            transform: translateY(-2px);
        }

        /* ── FOOTER ── */
        footer {
            background: #03050B;
            border-top: 1px solid rgba(237, 232, 223, 0.05);
            padding: 80px 40px 40px;
        }

        .footer-inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(237, 232, 223, 0.06);
        }

        .footer-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: var(--text);
            margin-bottom: 16px;
        }

        .footer-logo span {
            color: var(--gold);
        }

        .footer-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.8;
            max-width: 280px;
        }

        .footer-col h4 {
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
            font-weight: 500;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-col ul a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s;
        }

        .footer-col ul a:hover {
            color: var(--text);
        }

        .footer-bottom {
            padding-top: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-copy {
            font-size: 12px;
            color: var(--text-muted);
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-links a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(237, 232, 223, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        /* ── SCROLL REVEAL ── */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .pkg-grid {
                grid-template-columns: 1fr 1fr;
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .steps::before {
                display: none;
            }

            .footer-top {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 16px 24px;
            }

            nav.scrolled {
                padding: 12px 24px;
            }

            .nav-links,
            .nav-cta {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .hero-content {
                padding: 24px;
                padding-bottom: 100px;
            }

            .hero-stats {
                display: none;
            }

            .balloon-svg {
                top: 10%;
                right: 2%;
                width: 45vw;
                opacity: 0.6;
            }

            #experiencias,
            #paquetes,
            #como-funciona,
            #galeria,
            #testimonios,
            #reserva {
                padding: 80px 24px;
            }

            #paquetes .inner {
                padding: 0;
            }

            #galeria .inner {
                padding: 0;
            }

            .exp-grid {
                grid-template-columns: 1fr;
            }

            .exp-card.tall {
                grid-row: span 1;
                aspect-ratio: 4/3;
            }

            .pkg-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .testi-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .booking-form {
                padding: 28px 20px;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            body {
                cursor: auto;
            }

            .cursor,
            .cursor-ring {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 46px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .btn-primary,
            .btn-ghost {
                text-align: center;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- Custom cursor -->
    <div class="cursor" id="cursor"></div>
    <div class="cursor-ring" id="cursor-ring"></div>

    <!-- Mobile menu -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="#experiencias" class="mobile-link">Experiencias</a>
        <a href="#paquetes" class="mobile-link">Paquetes</a>
        <a href="#como-funciona" class="mobile-link">¿Cómo funciona?</a>
        <a href="#galeria" class="mobile-link">Galería</a>
        <a href="#reserva" class="mobile-link">Reservar</a>
    </div>

    <!-- NAV -->
    <nav id="main-nav">
        <a href="#" class="nav-logo">hecho<span>en</span>teoti</a>
        <ul class="nav-links">
            <li><a href="#experiencias">Experiencias</a></li>
            <li><a href="#paquetes">Paquetes</a></li>
            <li><a href="#como-funciona">¿Cómo funciona?</a></li>
            <li><a href="#galeria">Galería</a></li>
        </ul>
        <a href="#reserva" class="nav-cta">Reservar vuelo</a>
        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <!-- HERO -->
    <section id="hero">
        <div class="hero-bg"></div>
        <div class="stars" id="stars-container"></div>

        <!-- Balloon SVG -->
        <svg class="balloon-svg" viewBox="0 0 300 420" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Balloon envelope -->
            <ellipse cx="150" cy="180" rx="110" ry="145" fill="none" />
            <path d="M150 35 C90 35 40 90 40 165 C40 235 90 295 150 320 C210 295 260 235 260 165 C260 90 210 35 150 35Z"
                fill="#C8972A" opacity="0.9" />
            <path
                d="M150 35 C130 35 110 90 110 165 C110 235 130 295 150 320 C170 295 190 235 190 165 C190 90 170 35 150 35Z"
                fill="#E8B84B" opacity="0.7" />
            <path
                d="M150 35 C140 35 125 90 125 165 C125 235 140 295 150 320 C160 295 175 235 175 165 C175 90 160 35 150 35Z"
                fill="#F5D98A" opacity="0.5" />
            <!-- Highlight -->
            <path d="M120 80 C110 95 105 115 108 135 C112 115 118 95 125 80Z" fill="white" opacity="0.25" />
            <!-- Ropes -->
            <line x1="100" y1="318" x2="110" y2="350" stroke="#8B6914" stroke-width="1.5" />
            <line x1="150" y1="320" x2="150" y2="350" stroke="#8B6914" stroke-width="1.5" />
            <line x1="200" y1="318" x2="190" y2="350" stroke="#8B6914" stroke-width="1.5" />
            <!-- Basket -->
            <rect x="110" y="350" width="80" height="50" rx="8" fill="#5C3D1E" />
            <rect x="114" y="354" width="72" height="42" rx="6" fill="#7A5230" />
            <!-- Basket weave lines -->
            <line x1="114" y1="365" x2="186" y2="365" stroke="#5C3D1E" stroke-width="1.5" />
            <line x1="114" y1="374" x2="186" y2="374" stroke="#5C3D1E" stroke-width="1.5" />
            <line x1="130" y1="354" x2="130" y2="396" stroke="#5C3D1E" stroke-width="1.5" />
            <line x1="150" y1="354" x2="150" y2="396" stroke="#5C3D1E"
                stroke-width="1.5" />
            <line x1="170" y1="354" x2="170" y2="396" stroke="#5C3D1E"
                stroke-width="1.5" />
            <!-- People silhouettes -->
            <circle cx="130" cy="345" r="7" fill="#2A1A0A" />
            <circle cx="150" cy="343" r="7" fill="#2A1A0A" />
            <circle cx="170" cy="345" r="7" fill="#2A1A0A" />
            <!-- Flame glow -->
            <ellipse cx="150" cy="320" rx="15" ry="8" fill="#FF7A3D" opacity="0.6" />
            <ellipse cx="150" cy="316" rx="8" ry="12" fill="#FFCC44" opacity="0.5" />
        </svg>

        <div class="hero-content">
            <div class="hero-badge">
                <div class="badge-dot"></div>
                Teotihuacán · Estado de México
            </div>
            <h1 class="hero-title">
                Vuela sobre<br>
                <em>las pirámides</em>
            </h1>
            <p class="hero-sub">
                Experiencias en globo aerostático al amanecer sobre la Zona Arqueológica de Teotihuacán. Vive la magia
                desde el cielo.
            </p>
            <div class="hero-actions">
                <a href="#reserva" class="btn-primary">
                    Reservar ahora
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="#experiencias" class="btn-ghost">
                    Ver experiencias
                </a>
            </div>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">+12K</div>
                <div class="stat-label">vuelos realizados</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">4.9</div>
                <div class="stat-label">calificación promedio</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">15+</div>
                <div class="stat-label">años de experiencia</div>
            </div>
        </div>

        <div class="scroll-hint">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- EXPERIENCE STRIP -->
    <div class="experience-strip">
        <div class="strip-inner" id="strip">
            <!-- duplicated for seamless loop -->
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Vuelos al amanecer
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Desayuno incluido
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Seguro de vuelo
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Diploma de vuelo
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Fotógrafo profesional
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Brindis con cava
            </div>
            <!-- repeat -->
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Vuelos al amanecer
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Desayuno incluido
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Seguro de vuelo
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Diploma de vuelo
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Fotógrafo profesional
            </div>
            <div class="strip-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2L9.19 8.63L2 9.24L7 13.47L5.82 20.69L12 17.27L18.18 20.69L17 13.47L22 9.24L14.81 8.63L12 2Z" />
                </svg>
                Brindis con cava
            </div>
        </div>
    </div>

    <!-- EXPERIENCIAS -->
    <section id="experiencias">
        <div class="reveal">
            <span class="section-eyebrow">Nuestras experiencias</span>
            <h2 class="section-title">Más que un vuelo,<br><em>un recuerdo eterno</em></h2>
        </div>
        <div class="exp-grid reveal">
            <div class="exp-card tall">
                <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=800&q=80"
                    alt="Vuelo al amanecer">
                <div class="exp-overlay">
                    <div class="exp-tag">Más vendido</div>
                    <h3 class="exp-title">Vuelo al<br>amanecer</h3>
                    <p class="exp-desc">Despega con las primeras luces del día y observa las pirámides despertar bajo
                        un cielo en llamas. La experiencia más sobrecogedora de Teotihuacán.</p>
                </div>
                <div class="exp-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
            <div class="exp-card">
                <img src="https://images.unsplash.com/photo-1518553552028-19cdbd2e8f88?auto=format&fit=crop&w=800&q=80"
                    alt="Vuelo privado">
                <div class="exp-overlay">
                    <div class="exp-tag">Exclusivo</div>
                    <h3 class="exp-title">Vuelo privado</h3>
                    <p class="exp-desc">Globo completo solo para ti y tu grupo. Ideal para propuestas, aniversarios y
                        momentos únicos.</p>
                </div>
                <div class="exp-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
            <div class="exp-card">
                <img src="https://images.unsplash.com/photo-1533105135-ded20a2eab4f?auto=format&fit=crop&w=800&q=80"
                    alt="Tour cultural">
                <div class="exp-overlay">
                    <div class="exp-tag">Combinado</div>
                    <h3 class="exp-title">Tour + Globo</h3>
                    <p class="exp-desc">Combina el vuelo con un tour arqueológico guiado, desayuno típico y artesanías
                        locales.</p>
                </div>
                <div class="exp-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- PAQUETES -->
    <section id="paquetes">
        <div class="inner">
            <div class="reveal">
                <span class="section-eyebrow">Precios transparentes</span>
                <h2 class="section-title">Elige tu<br><em>experiencia</em></h2>
            </div>
            <div class="pkg-grid">
                <!-- Esencial -->
                <div class="pkg-card reveal">
                    <div class="pkg-icon">🌄</div>
                    <div class="pkg-name">Esencial</div>
                    <div class="pkg-subtitle">Vuelo compartido · hasta 16 personas</div>
                    <div class="pkg-price">
                        <span class="currency">$</span>
                        <span class="amount">1,990</span>
                        <span class="per">/ persona</span>
                    </div>
                    <ul class="pkg-features">
                        <li>Vuelo ~45 min al amanecer</li>
                        <li>Traslado desde punto de encuentro</li>
                        <li>Diploma y brindis con cava</li>
                        <li>Seguro de vuelo incluido</li>
                        <li>Guía bilíngüe</li>
                    </ul>
                    <a href="#reserva" class="pkg-btn pkg-btn-outline">Reservar esencial</a>
                </div>
                <!-- Premium -->
                <div class="pkg-card featured reveal">
                    <div class="pkg-icon">✨</div>
                    <div class="pkg-name">Premium</div>
                    <div class="pkg-subtitle">Vuelo semiprivado · hasta 8 personas</div>
                    <div class="pkg-price">
                        <span class="currency">$</span>
                        <span class="amount">2,890</span>
                        <span class="per">/ persona</span>
                    </div>
                    <ul class="pkg-features">
                        <li>Vuelo ~60 min al amanecer</li>
                        <li>Desayuno típico en hacienda</li>
                        <li>Fotógrafo profesional</li>
                        <li>Diploma, brindis y recuerdo</li>
                        <li>Traslado desde CDMX</li>
                        <li>Acceso prioritario</li>
                    </ul>
                    <a href="#reserva" class="pkg-btn pkg-btn-solid">Reservar premium</a>
                </div>
                <!-- Privado -->
                <div class="pkg-card reveal">
                    <div class="pkg-icon">👑</div>
                    <div class="pkg-name">Privado</div>
                    <div class="pkg-subtitle">Globo exclusivo · solo para ti</div>
                    <div class="pkg-price">
                        <span class="currency">$</span>
                        <span class="amount">18,500</span>
                        <span class="per">/ globo</span>
                    </div>
                    <ul class="pkg-features">
                        <li>Globo completo exclusivo</li>
                        <li>Ruta personalizada</li>
                        <li>Chef y sommelier a bordo</li>
                        <li>Sesión fotográfica premium</li>
                        <li>Decoración especial</li>
                        <li>Concierge 24h</li>
                    </ul>
                    <a href="#reserva" class="pkg-btn pkg-btn-outline">Cotizar privado</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CÓMO FUNCIONA -->
    <section id="como-funciona">
        <div class="reveal" style="text-align:center">
            <span class="section-eyebrow">El proceso</span>
            <h2 class="section-title">Tu vuelo en<br><em>4 pasos</em></h2>
        </div>
        <div class="steps">
            <div class="step reveal">
                <div class="step-num">01</div>
                <div class="step-icon">📅</div>
                <div class="step-title">Reserva en línea</div>
                <p class="step-text">Elige tu fecha y paquete. Confirmación inmediata por WhatsApp y correo
                    electrónico.</p>
            </div>
            <div class="step reveal">
                <div class="step-num">02</div>
                <div class="step-icon">🚐</div>
                <div class="step-title">Nos encontramos</div>
                <p class="step-text">Te esperamos en nuestro punto de encuentro o te recogemos en CDMX. Salida a las
                    4:30am.</p>
            </div>
            <div class="step reveal">
                <div class="step-num">03</div>
                <div class="step-icon">🎈</div>
                <div class="step-title">Despega y vuela</div>
                <p class="step-text">Infla el globo, aborda con nuestros pilotos certificados y eleva tu mirada sobre
                    las pirámides.</p>
            </div>
            <div class="step reveal">
                <div class="step-num">04</div>
                <div class="step-icon">🥂</div>
                <div class="step-title">Celebra el momento</div>
                <p class="step-text">Al aterrizar: brindis tradicional, desayuno y tu diploma. Un recuerdo de por vida.
                </p>
            </div>
        </div>
    </section>

    <!-- GALERÍA -->
    <section id="galeria">
        <div class="inner">
            <div class="reveal">
                <span class="section-eyebrow">Momentos reales</span>
                <h2 class="section-title">Galería</h2>
            </div>
            <div class="gallery-masonry reveal">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1600699882135-04b6a8fb3cae?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?auto=format&fit=crop&w=600&q=80"
                        alt="">
                    <div class="gallery-item-overlay">
                        <div class="gallery-zoom">⊕</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section id="testimonios">
        <div class="reveal" style="text-align:center">
            <span class="section-eyebrow">Voces reales</span>
            <h2 class="section-title">Lo que dicen<br><em>nuestros viajeros</em></h2>
        </div>
        <div class="testi-grid">
            <div class="testi-card reveal">
                <div class="stars">
                    <span class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span>
                </div>
                <p class="testi-text">"Ver las pirámides desde arriba al amanecer fue algo que nunca podré describir
                    con palabras. El equipo es increíblemente profesional y cálido."</p>
                <div class="testi-author">
                    <div class="author-avatar">M</div>
                    <div>
                        <div class="author-name">María González</div>
                        <div class="author-role">Visitante frecuente · CDMX</div>
                    </div>
                </div>
            </div>
            <div class="testi-card reveal">
                <div class="stars">
                    <span class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span>
                </div>
                <p class="testi-text">"Le propuse matrimonio a mi pareja en el globo. Todo fue perfecto, desde la
                    coordinación hasta el pequeño detalle del champagne. ¡Dijo que sí!"</p>
                <div class="testi-author">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #3A6B9E, #FF7A3D);">C</div>
                    <div>
                        <div class="author-name">Carlos Ramírez</div>
                        <div class="author-role">Paquete privado · Guadalajara</div>
                    </div>
                </div>
            </div>
            <div class="testi-card reveal">
                <div class="stars">
                    <span class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span>
                </div>
                <p class="testi-text">"Viajé desde España y este fue el punto más alto de mi visita a México. El piloto
                    explicó todo con paciencia, la seguridad fue impecable."</p>
                <div class="testi-author">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #6B3A9E, #FF7A3D);">A</div>
                    <div>
                        <div class="author-name">Ana Llorente</div>
                        <div class="author-role">Turista internacional · Madrid</div>
                    </div>
                </div>
            </div>
            <div class="testi-card reveal">
                <div class="stars">
                    <span class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span><span class="star-filled">★</span><span
                        class="star-filled">★</span>
                </div>
                <p class="testi-text">"El desayuno en la hacienda después del vuelo fue delicioso. Todo el paquete
                    premium superó mis expectativas. Regresaré con mi familia."</p>
                <div class="testi-author">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #2A9E6B, #C8972A);">R</div>
                    <div>
                        <div class="author-name">Roberto Fuentes</div>
                        <div class="author-role">Paquete premium · Monterrey</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RESERVA CTA -->
    <section id="reserva">
        <div class="booking-bg"></div>
        <div class="booking-inner">
            <div class="reveal" style="text-align:center">
                <span class="section-eyebrow">Reserva tu lugar</span>
                <h2 class="section-title" style="font-size:clamp(42px,6vw,80px)">¿Listo para<br><em>volar?</em></h2>
                <p style="color:rgba(237,232,223,0.6); font-size:15px; margin-top:16px; font-weight:300;">Cupos
                    limitados. Los globos vuelan sujetos a condiciones meteorológicas.</p>
            </div>
            <div class="booking-form reveal">
                <div class="form-grid">
                    <div class="form-field">
                        <label>Nombre completo</label>
                        <input type="text" placeholder="Tu nombre">
                    </div>
                    <div class="form-field">
                        <label>Correo electrónico</label>
                        <input type="email" placeholder="tu@correo.com">
                    </div>
                    <div class="form-field">
                        <label>Fecha deseada</label>
                        <input type="date">
                    </div>
                    <div class="form-field">
                        <label>Número de personas</label>
                        <input type="number" min="1" max="16" placeholder="1">
                    </div>
                </div>
                <div class="form-grid" style="margin-bottom: 8px;">
                    <div class="form-field">
                        <label>Paquete</label>
                        <select>
                            <option>Esencial — $1,990/persona</option>
                            <option>Premium — $2,890/persona</option>
                            <option>Privado — cotizar</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Teléfono / WhatsApp</label>
                        <input type="tel" placeholder="+52 55 0000 0000">
                    </div>
                </div>
                <button class="form-submit" type="button">
                    Solicitar reservación →
                </button>
                <p style="text-align:center; font-size:12px; color:rgba(237,232,223,0.35); margin-top:16px;">
                    Te confirmaremos disponibilidad en menos de 2 horas vía WhatsApp
                </p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="footer-top">
                <div>
                    <div class="footer-logo">hecho<span>en</span>teoti</div>
                    <p class="footer-desc">Vuelos en globo aerostático sobre la Zona Arqueológica de Teotihuacán.
                        Experiencias únicas desde 2009.</p>
                    <div class="social-links" style="margin-top: 28px;">
                        <a href="#">📷</a>
                        <a href="#">📘</a>
                        <a href="#">🎵</a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Experiencias</h4>
                    <ul>
                        <li><a href="#">Vuelo al amanecer</a></li>
                        <li><a href="#">Vuelo privado</a></li>
                        <li><a href="#">Tour + Globo</a></li>
                        <li><a href="#">Eventos especiales</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Información</h4>
                    <ul>
                        <li><a href="#">¿Cómo reservar?</a></li>
                        <li><a href="#">Política de vuelo</a></li>
                        <li><a href="#">Preguntas frecuentes</a></li>
                        <li><a href="#">Seguridad</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contacto</h4>
                    <ul>
                        <li><a href="#">📞 55 1234 5678</a></li>
                        <li><a href="#">✉️ hola@hechoeneoti.mx</a></li>
                        <li><a href="#">📍 San Juan Teotihuacan</a></li>
                        <li><a href="#">💬 WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copy">© 2025 Hecho en Teoti · Todos los derechos reservados</div>
                <div class="footer-copy">Piloto certificado AFAC · Seguro de responsabilidad civil</div>
            </div>
        </div>
    </footer>

    <script>
        // ── CURSOR ──
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

        function animateCursor() {
            rx += (mx - rx) * 0.12;
            ry += (my - ry) * 0.12;
            ring.style.left = rx + 'px';
            ring.style.top = ry + 'px';
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        document.querySelectorAll('a, button, .exp-card, .pkg-card, .gallery-item').forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.style.transform = 'translate(-50%,-50%) scale(2)';
                ring.style.transform = 'translate(-50%,-50%) scale(1.5)';
                ring.style.opacity = '0.25';
            });
            el.addEventListener('mouseleave', () => {
                cursor.style.transform = 'translate(-50%,-50%) scale(1)';
                ring.style.transform = 'translate(-50%,-50%) scale(1)';
                ring.style.opacity = '0.5';
            });
        });

        // ── STARS ──
        const starsContainer = document.getElementById('stars-container');
        for (let i = 0; i < 80; i++) {
            const s = document.createElement('div');
            s.className = 'star';
            s.style.cssText = `
        left:${Math.random()*100}%;
        top:${Math.random()*60}%;
        --d:${2+Math.random()*4}s;
        --op:${0.3+Math.random()*0.7};
        animation-delay:${Math.random()*4}s;
      `;
            starsContainer.appendChild(s);
        }

        // ── NAV SCROLL ──
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 60);
        });

        // ── HAMBURGER ──
        const ham = document.getElementById('hamburger');
        const mob = document.getElementById('mobile-menu');
        ham.addEventListener('click', () => {
            ham.classList.toggle('open');
            mob.classList.toggle('open');
        });
        document.querySelectorAll('.mobile-link').forEach(l => {
            l.addEventListener('click', () => {
                ham.classList.remove('open');
                mob.classList.remove('open');
            });
        });

        // ── SCROLL REVEAL ──
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, 80 * i);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        reveals.forEach(el => observer.observe(el));

        // ── SMOOTH SCROLL ──
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                e.preventDefault();
                const target = document.querySelector(a.getAttribute('href'));
                if (target) target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // ── FORM SUBMIT ──
        document.querySelector('.form-submit').addEventListener('click', function() {
            this.textContent = '✓ Solicitud enviada — Te contactamos pronto';
            this.style.background = '#2d6a4f';
            this.style.color = '#fff';
            setTimeout(() => {
                this.textContent = 'Solicitar reservación →';
                this.style.background = '';
                this.style.color = '';
            }, 4000);
        });
    </script>
</body>

</html>
