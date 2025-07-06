<!DOCTYPE html>
<html>

<head>
    <title>Curug Sibedil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Curug Sibedil Tourism">
    <meta name="keywords" content="curug sibedil, wisata, air terjun, pemalang, jawa tengah">
    <link rel="icon" href="https://berita.pemalangkab.go.id/wp-content/uploads/2023/10/Kabupaten_Pemalang.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500|Raleway:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        backdrop-filter: blur(5px);
    }

    .popup-content {
        background-color: rgba(13, 71, 161, 0.95); /* blue darken-4 with transparency */
        margin: 12% auto;
        padding: 30px 25px;
        border-radius: 12px;
        width: 90%;
        max-width: 600px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        transform: translateY(30px);
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .close {
        color: #fff;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover {
        color: #ffccbc;
    }

        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Navigation */
        .navbar-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .nav-wrapper {
            padding: 0 20px;
        }

        .brand-logo {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem !important;
        }

        /* Hero Section */
        .hero-section {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/Images/curug.png');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
}

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-family: 'Rammetto One', cursive;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Buttons */
        #buttons {
            margin: 50px 0;
        }

        #buttons ul {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            list-style: none;
            padding: 0;
        }

        #buttons li {
            background: linear-gradient(45deg, #0d47a1, #1976d2);
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }

        #buttons li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(13, 71, 161, 0.3);
        }

        /* Cards */
        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .makebold {
            font-weight: bold;
            color: #0d47a1;
            font-size: 1.2em;
        }

        /* Footer */
        footer {
            margin-top: 50px;
            padding: 30px 0;
        }

        /* Go to top button */
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #0d47a1;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        #myBtn:hover {
            background-color: #1976d2;
        }

        /* Contact */
        #contact {
            padding: 50px 0;
            text-align: center;
            color: white;
        }

        #contact h2 {
            margin-bottom: 20px;
            font-family: 'Rammetto One', cursive;
        }

        #contact ul {
            list-style: none;
            padding: 0;
        }

        #contact li {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        /* Section spacing */
        .section {
            padding: 50px 0;
        }

        /* Category headers */
        #category {
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Rammetto One', cursive;
            color: #0d47a1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.2rem;
            }
            
            #buttons ul {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <!-- Popup HTML -->
   <div id="loginPopup" class="popup">
    <div class="popup-content center-align animated-popup">
        <span class="close right" onclick="closePopup()">&times;</span>
        <i class="material-icons large" style="color: #fff; font-size: 48px;">emoji_nature</i>
        <h5 style="font-weight: 600; margin-bottom: 10px; color: white;">Selamat Datang di Website Wisata Curug Sibedil</h5>
        <p style="font-size: 0.95rem; color: #e3f2fd;">
            Rasakan keindahan alam <strong>Curug Sibedil</strong> yang memukau di Pemalang.<br>
            Mulai petualanganmu hari ini dengan memesan tiket secara online!
        </p>
    </div>
</div>

    <!-- Navigation -->
   <div class="navbar-fixed">
    <nav style="background-color: #0d47a1;" class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo">Curug Sibedil</a>

            <ul class="right hide-on-med-and-down" style="display: flex; align-items: center;">
    <li><a href="#about">Tentang</a></li>
    <li><a href="#services">Kendaraan</a></li>
    <li><a href="#contact">Kontak</a></li>

    @guest
        <li><a href="{{ route('login') }}" class="btn blue darken-2" style="margin-left:10px;">Login</a></li>
        <li><a href="{{ route('register') }}" class="btn green darken-2">Register</a></li>
    @else
        <li>
            <span style="color:white; font-weight: bold; margin-right: 10px; font-size: 0.95rem;">
                {{ Auth::user()->name }}
            </span>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn red darken-2" style="padding: 0 12px; font-size: 0.8rem; height: 36px;">Logout</button>
            </form>
        </li>
    @endguest
</ul>
        </div>
    </nav>
</div>

    <!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1>Curug Sibedil</h1>
        <p>Keindahan Alam Air Terjun di Pemalang</p>
        
        @guest
            <a href="{{ route('register') }}" class="btn-large waves-effect waves-light white blue-text">
                Yuk Pesan Tiketnya!
            </a>
        @else
            <a href="{{ route('tickets.user') }}" class="btn-large waves-effect waves-light white blue-text">
                Pesan Tiket Disini!
            </a>
        @endguest
    </div>
</div>


    <!-- About Section -->
    <div id="about" class="section container">
        <div class="row">
            <div class="col s12">
                <h4 class="center-align" style="color: #0d47a1; font-family: 'Rammetto One', cursive;">Tentang Curug Sibedil</h4>
                <p class="center-align flow-text">
                    Curug Sibedil adalah destinasi wisata alam yang terletak di Pemalang, Jawa Tengah. 
                    Dengan keindahan air terjun yang memukau dan suasana alam yang asri, tempat ini cocok 
                    untuk liburan keluarga atau bagi para pecinta alam yang ingin menikmati ketenangan.
                </p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="section">
        <div id="buttons">
            <ul>
                <a href="#flight" style="text-decoration: none; color: inherit;">
                    <li>Penerbangan</li>
                </a>
                <a href="https://www.redbus.id/bus/tiket-bis-ke-pemalang" style="text-decoration: none; color: inherit;">
                    <li>Bus</li>
                </a>
                <a href="#trains" style="text-decoration: none; color: inherit;">
                    <li>Kereta Api</li>
                </a>
                <a href="https://www.google.com/search?q=hotel+dekat+curug+sibedil" target="_blank" style="text-decoration: none; color: inherit;">
                    <li>Hotel</li>
                </a>
            </ul>
        </div>
    </div>

    <!-- Flight Section -->
    <div class="container">
        <a name="flight"></a>
        <h4 id="category" class="flight">Penerbangan</h4>

        <div class="row" style="margin-top: 50px;" id="flights">
            <!-- Jakarta - Semarang -->
            <div class="col s12 m6 l4">
                <div class="card medium hoverable">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Jakarta - Semarang">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Jakarta - Semarang</span>
                        <p>Bandara Soekarno Hatta - Bandara Ahmad Yani<br>
                        <span class="makebold">RP 874.000 - 2.957.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/flight/fullsearch?ap=JKTA.SRG&dt=15-7-2024.NA&ps=1.0.0&sc=ECONOMY" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <!-- Yogyakarta - Semarang -->
            <div class="col s12 m6 l4">
                <div class="card medium hoverable">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Yogyakarta - Semarang">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Yogyakarta - Semarang</span>
                        <p>Bandara Yogyakarta - Bandara Ahmad Yani<br>
                        <span class="makebold">RP 1.650.000 - 2.054.700</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/flight/fullsearch?ap=YKIA.SRG&dt=15-7-2024.NA&ps=1.0.0&sc=ECONOMY" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <!-- Makassar - Semarang -->
            <div class="col s12 m6 l4">
                <div class="card medium hoverable">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Makassar - Semarang">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Makassar - Semarang</span>
                        <p>Bandara Sultan Hasanuddin - Bandara Ahmad Yani<br>
                        <span class="makebold">RP 2.300.000 - 3.133.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/flight/fullsearch?ap=UPG.SRG&dt=15-7-2024.NA&ps=1.0.0&sc=ECONOMY" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <!-- CTA Card -->
            <div class="col s12" style="margin-top: 30px;">
                <div class="card blue darken-4">
                    <div class="card-content white-text center-align">
                        <span class="card-title" style="font-size: 2rem; font-family: Varela Round">Ingin memesan penerbangan lain?</span>
                    </div>
                    <div class="card-action center-align">
                        <a href="https://www.traveloka.com/id-id/tiket-pesawat" target="_blank" class="btn-large waves-effect waves-light white blue-text">Temukan disini</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bus Section -->
        <a name="buses"></a>
        <h4 id="category" class="hotels">Bus</h4>
        <div class="row" style="margin-top: 50px;">
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Jakarta - Pemalang</span>
                        <p>Sinar Jaya | Haryanto<br>
                        <span class="makebold">RP 120.000 - 171.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.redbus.id/tiket-bus/jakarta-ke-pemalang" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Yogyakarta - Pemalang</span>
                        <p>Rama Sakti<br>
                        <span class="makebold">RP 160.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.redbus.id/tiket-bus/yogyakarta-jogja-ke-pemalang" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Bandung - Pemalang</span>
                        <p>Sinar Jaya<br>
                        <span class="makebold">RP 100.000 - 120.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.redbus.id/tiket-bus/bandung-ke-pemalang" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <!-- CTA Card -->
            <div class="col s12" style="margin-top: 30px;">
                <div class="card blue darken-4">
                    <div class="card-content white-text center-align">
                        <span class="card-title" style="font-size: 2rem; font-family: Varela Round">Ingin memesan bus yang lain?</span>
                    </div>
                    <div class="card-action center-align">
                        <a href="https://www.redbus.id/bus/tiket-bis-ke-pemalang" target="_blank" class="btn-large waves-effect waves-light white blue-text">Temukan disini</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Train Section -->
        <a name="trains"></a>
        <h4 id="category" class="trains">Kereta Api</h4>
        <div class="row" style="margin-top: 50px;">
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Bandung - Pemalang</span>
                        <p><span class="makebold">RP 190.000 - 505.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/kereta-api/search?st=BD.PML-A&dt=19-7-2024.null&ps=1.0&pd=KAI" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Jakarta - Pemalang</span>
                        <p><span class="makebold">RP 180.000 - 1.805.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/kereta-api/search?st=JKT-A.PML-A&dt=19-7-2024.null&ps=1.0&pd=KAI" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title">Yogyakarta - Pemalang</span>
                        <p><span class="makebold">RP 150.000 - 1.590.000</span></p>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="https://www.traveloka.com/id-id/kereta-api/search?st=YOG-A.PML-A&dt=19-7-2024.null&ps=1.0&pd=KAI" target="_blank" class="white-text">PESAN</a>
                    </div>
                </div>
            </div>

            <!-- CTA Card -->
            <div class="col s12" style="margin-top: 30px;">
                <div class="card blue darken-4">
                    <div class="card-content white-text center-align">
                        <span class="card-title" style="font-size: 2rem; font-family: Varela Round">Ingin pesan kereta lain?</span>
                    </div>
                    <div class="card-action center-align">
                        <a href="https://www.traveloka.com/id-id/kereta-api" target="_blank" class="btn-large waves-effect waves-light white blue-text">Temukan disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="blue darken-4">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <p>Hubungi kami dan kami akan membalas maksimal dalam waktu 24 jam</p>
            <div class="row">
                <div class="col s12 m6">
                    <p><i class="material-icons left">place</i> Sima Moga, Pemalang</p>
                </div>
                <div class="col s12 m6">
                    <p><i class="material-icons left">phone</i> 0852-0029-0775</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="section blue darken-4">
        <div class="container">
            <p class="flow-text white-text center-align" style="font-family: Montserrat; font-size: 2rem;">
                Curug Sibedil &copy; 2025
            </p>
        </div>
    </footer>

    <!-- Go to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="material-icons">keyboard_arrow_up</i>
    </button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <script>
        // Show popup on load
        window.onload = function() {
            document.getElementById('loginPopup').style.display = "block";
        };

        // Close popup
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('loginPopup').style.display = "none";
        });

        // Close popup when clicking outside
        window.onclick = function(event) {
            var popup = document.getElementById('loginPopup');
            if (event.target == popup) {
                popup.style.display = "none";
            }
        };

        // Go to top button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <script>
    window.onload = function() {
        document.getElementById('loginPopup').style.display = "block";
    };

    function closePopup() {
        document.getElementById('loginPopup').style.display = "none";
    }

    // Klik luar popup untuk tutup
    window.onclick = function(event) {
        if (event.target == document.getElementById('loginPopup')) {
            closePopup();
        }
    };
</script>

</body>

</html>