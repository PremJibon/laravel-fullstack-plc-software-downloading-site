<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://unpkg.com/@johmun/vue-tags-input/dist/vue-tags-input.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7W2X10DCP2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7W2X10DCP2');
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_tags')" />
    <title>@yield('title')</title>

    
    
    <!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- MDB icon -->
    <link rel="icon" href="/img/{{ get_settings('app_icon') }}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/css/intlTelInput.css">
    <!-- material design css  -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    <!-- Custom Styels -->
    <link rel="stylesheet" href="/css/styles.css">

    


<style>
 
/* Offcanvas background with transparency */
.offcanvas {
    width: 300px; /* Default width for larger screens */
    max-width: 100%;
    background-color: rgba(49, 41, 41, 0.2); 
    backdrop-filter: blur(10px); 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
    transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
}

/* Styling the cross button */
#cross_button {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    display: none;
    font-size: 24px;
    color: #f0e9e9; /* Dark color for better contrast */
    cursor: pointer;
}

#cross_button:hover {
    color: #e22619; /* Darker color on hover */
}

/* Navbar links styling */



.dropdown-menu {
    background-color: rgba(255, 255, 255, 0.9); /* Transparent dropdown */
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    color: #333; /* Darker dropdown text */
}

.dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.05); /* Slight dark hover effect */
}

/* Smooth transition for dropdown */
.dropdown-menu {
    transition: opacity 0.3s ease, visibility 0.3s ease;
}




#main_navbar {
    max-width: 1580px; /* header width */
    width: 100%;
  
}
#searchbarnav{
    max-width: 60px; /* header width */
    width: 100%;
}

.navbar-brand {
    display: flex; /* Ensures the default layout */
}


#login{
    color: #3f3f3f;
}
@media (max-width: 560px) {

    .offcanvas {
    width: 300px; /* Default width for larger screens */
    max-width: 92%;
    background-color: rgba(49, 41, 41, 0.2); 
    backdrop-filter: blur(10px); 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
    transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
}



    #dropdown-item-whenauth{
        transform: translateY(-55%);
    }

    .nav-link:hover {
    color: #8ae71f; /* Darker on hover */
}

    /* Center the logo in mobile screens */
    #cross_button{
    display: flex;
}
.nav-link {
    color: #f0e9e9; /* Dark gray color */
    font-weight: bold;
    transition: color 0.3s ease;
}

    #app_logo {
        position: absolute;
        left: 50%;
        transform: translateX(-55%) scale(0.8) translateY(-15%);
        
    }
    #search-addon{
        transform: translateX(140%)  translateY(-27%);
    }
    
    #login{
        transform:  translateY(50%);
    }
  

    /* Hide the search bar for smaller screens */
    #searchbarnav {
        display: none;
    }
}

@media (max-width: 860px) {

    .nav-link:hover {
    color: #8ae71f; /* Darker on hover */
}

    /* Center the logo in mobile screens */
    #cross_button{
    display: flex;
}
.nav-link {
    color: #f0e9e9; /* Dark gray color */
    font-weight: bold;
    transition: color 0.3s ease;
}

    #app_logo {
        position: absolute;
        left: 50%;
        transform: translateX(-55%) scale(0.8) translateY(-15%);
        
    }
    #search-addon{
        transform: translateX(140%)  translateY(-27%);
    }
    
    #login{
        transform:  translateY(50%);
    }
  

    /* Hide the search bar for smaller screens */
    #searchbarnav {
        display: none;
    }
}



    </style>
</head>

<body>
    <div class="fixed-bottom-right">
        <a href="https://api.whatsapp.com/send?phone=88{{ get_settings('whatsapp_number') }}" target="_blank" class="sticky-logo" >
            <span class="me-1 me-md-2 text-white rounded hidden-on-load">Whatsapp Now!</span>
            <img src="/img/whatsapp-logo.webp" id="sticky-logo" alt="Whatsapp image">
        </a>
    </div>
    @include('layouts.header')

    <!--Main layout-->
    <main class="mt-3">
        <div class="container">
            @if(Route::is( 'home' ))
                <div class="row">
                    @include('layouts.carousol')
                </div>
            @endif
            <div class="row">
                @yield('section')
                @include('layouts.sidebar')
            </div>
            @if (Route::is('home'))
                <div class="row mt-5">
                    @include('layouts.brands')
                </div>
                <div class="row mt-5 text-center">
                    @include('layouts.seo')
                </div>
            @endif

            
            
        </div>
    </main>

    @include('layouts.footer')
    <!-- Material Design JS -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- custom js  -->
    <script type="text/javascript" src="/js/scripts.js"></script>

    <!-- Custom scripts -->
    <script type="text/javascript"></script>

   
    
    @hasSection('custom_script')
        @yield('custom_script')
    @endif

    <!-- Schema Markup -->
    @hasSection('schema')
        @yield('schema')
    @endif

</body>

</html>
