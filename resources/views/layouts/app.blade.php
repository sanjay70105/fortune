<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            background: linear-gradient(180deg, #111936, #0a0f24);
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        
        .navbar, .navbar a, .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: white;
        }
        
        .wallet-btn {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            color: #111936;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
            margin-left: 15px;
        }
        
        .wallet-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.5);
            background: linear-gradient(135deg, #FFA500, #FFD700);
        }
        
        .wallet-btn i {
            margin-right: 8px;
            font-size: 1rem;
        }
        
        .wallet-amount {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .notification-wrapper {
            position: relative;
            display: inline-block;
            margin-left: 15px;
        }

        .notification-icon {
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
            background: transparent;
            border: none;
            position: relative;
        }

        .notification-icon:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffd700;
            transform: scale(1.1);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.6rem;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .navbar-nav .nav-item .nav-link {
            position: relative;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 25px;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            overflow: hidden;
        }

        .navbar-nav .nav-item .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
            z-index: 1;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 188, 212, 0.3);
        }

        .navbar-nav .nav-item .nav-link:hover::before {
            left: 100%;
        }

        .navbar-nav .nav-item .nav-link span {
            position: relative;
            z-index: 2;
        }
        
        .navbar-nav .nav-item .nav-link.active {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 188, 212, 0.3);
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            background: transparent;
            position: relative;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 44px;
            height: 44px;
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler-icon {
            display: block;
            width: 24px;
            height: 2px;
            background: white;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon:before,
        .navbar-toggler-icon:after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: white;
            left: 0;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon:before {
            transform: translateY(-6px);
        }

        .navbar-toggler-icon:after {
            transform: translateY(6px);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            background: transparent;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:before {
            transform: rotate(45deg);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:after {
            transform: rotate(-45deg);
        }

        /* Offcanvas */
        .offcanvas {
            background: linear-gradient(180deg, #111936, #0a0f24);
            border: none;
        }

        .offcanvas-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .offcanvas-title {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .btn-close-white {
            filter: invert(1) brightness(100%) sepia(0) saturate(10000%) hue-rotate(0deg);
            opacity: 1;
            background-size: 1rem;
            margin: 0;
        }

        .offcanvas-body {
            padding-top: 0;
        }

        /* Mobile layout fixes */
        .mobile-elements {
            display: none;
            align-items: center;
            margin-left: auto;
            order: 2;
        }

        .mobile-elements .wallet-btn {
            margin-left: 0;
            margin-right: 10px;
        }

        .mobile-elements .notification-icon {
            margin-left: 0;
        }

        @media (max-width: 767.98px) {
            .desktop-wallet {
                display: none;
            }
            .desktop-notification {
                display: none;
            }
            .mobile-elements {
                display: flex;
            }
            .navbar-collapse {
                display: none !important;
            }
            .navbar-toggler {
                display: flex !important;
                order: 3;
            }
            .navbar-brand {
                order: 1;
            }
        }

        @media (min-width: 768px) {
            .mobile-elements {
                display: none;
            }
        }

        /* Ensure main content inherits the gradient background */
        main {
            min-height: calc(100vh - 86px); /* Adjust based on navbar height */
            background: inherit;
        }
    </style>
    <body class="font-sans antialiased">
      <nav class="navbar navbar-expand-md">
          <div class="container-fluid d-flex" id="nav">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/premium-transparent-logo.svg') }}" alt="Logo" style="height: 70px;">
            </a>

            <div class="mobile-elements">
                <button class="wallet-btn">
                    <i class="fas fa-wallet"></i>
                    <span class="wallet-amount">$1242,250</span>
                </button>
                <button class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pe-2">
                  <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item pe-2">
                  <a class="nav-link text-white" href="#">Sports</a>
                </li>
                <li class="nav-item pe-2">
                  <a class="nav-link text-white" href="#">Live</a>
                </li>
                <li class="nav-item pe-2">
                  <a class="nav-link text-white" href="#">Casino</a>
                </li>
              </ul>
              
              <div class="d-flex align-items-center">
                  <button class="notification-icon desktop-notification me-3">
                      <i class="fas fa-bell"></i>
                      <span class="notification-badge">3</span>
                  </button>
                  
                  <button class="wallet-btn desktop-wallet">
                      <i class="fas fa-wallet"></i>
                      <span class="wallet-amount">$16565,250</span>
                  </button>
              </div>
            </div>

            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Sports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Live</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Casino</a>
                        </li>
                        <li class="nav-item mt-3">
                            <button class="wallet-btn w-100">
                                <i class="fas fa-wallet"></i>
                                <span class="wallet-amount">$154545,250</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
      </nav>
      <main>
          {{ $slot }}
      </main>
    </body>
</html>