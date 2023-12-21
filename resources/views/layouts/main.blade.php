<!doctype>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <title>Tech Journal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <script src="/resources/js/app.js"></script>

    <style>
        #body,
        .delay-tran,
        .menu-button,
        .blogs-section,
        .journal-info,
        .hashtag-span {
            transition: 0.5s;
        }

        .dark-mode {
            background-color: rgb(31 41 55);
        }

        .pre-scrollable {
            overflow-y: auto;
        }

        .toastui-editor-mode-switch {
            display: none !important;
        }
    </style>

</head>

<body class="blogs-section bg-white">
    @include('partials.navigation')
    <div class="container mx-auto justify-center items-center min-h-screen">
        @yield('content')
    </div>
    @include('partials.footer')

    <script>
        const userMenuButton = document.getElementById("user-menu-button");
        const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

        // TOGGLE USER MENU
        function toggleUserMenu() {
            if (userMenu.style.display === "block") {
                userMenu.style.display = "none";
            } else {
                userMenu.style.display = "block";
            }
        }


        // USER MENU MOBILE
        userMenuButton.addEventListener("click", toggleUserMenu);
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById("mobile-menu");

        function toggleMobileMenu() {
            if (mobileMenu.style.display === "block") {
                mobileMenu.style.display = "none";
            } else {
                mobileMenu.style.display = "block";
            }
        }

        mobileMenuButton.addEventListener("click", toggleMobileMenu);


        // TOGGLE DARK OR LIGHT MODE
        const themeToggle = document.getElementById("theme-toggle");
        const darkIcon = document.getElementById("theme-toggle-dark-icon");
        const lightIcon = document.getElementById("theme-toggle-light-icon");
        var body = document.body;

        themeToggle.addEventListener("click", () => {
            if (body.classList.contains("dark")) {
                body.classList.remove("dark");
                darkIcon.classList.remove("hidden");
                lightIcon.classList.add("hidden");
                body.classList.toggle("dark-mode");
            } else {
                body.classList.toggle("dark");
                darkIcon.classList.add("hidden");
                lightIcon.classList.remove("hidden");
                body.classList.toggle("dark-mode");
            }
        });



        //NAVBAR
        const navbar = document.getElementById("navbar");
        let lastScrollTop = 0;
        addEventListener("scroll", () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const distance = scrollTop - lastScrollTop;
            const currentTop = parseInt(
                getComputedStyle(navbar).top.split("px")
            );

            let amount = Math.max(
                Math.min(
                    currentTop +
                    (distance < 0 ?
                        Math.abs(distance) :
                        -Math.abs(distance)
                    ) * 40,
                    0
                ),
                -80
            );

            console.log(amount, currentTop, Math.abs(distance));
            navbar.style.top = `${amount}px`
            lastScrollTop = scrollTop;
        });

        // document.addEventListener("DOMContentLoaded", function() {
        //     // HIDE DIV FOR THE MARKDOWN AND WYSIWYG TAB
        //     var modeSwitch = document.querySelector('.toastui-editor-mode-switch');
        //     if (modeSwitch) {
        //         modeSwitch.style.display = 'none';
        //     }
        // });

        document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.tablecontents a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetSlug = this.getAttribute('href').substring(1);
                const targetElement = document.querySelector('a[name="' + targetSlug + '"]');

                if (targetElement) {
                    const offset = targetElement.getBoundingClientRect().top + window.scrollY;
                    
                    window.scrollTo({
                        top: offset - 20, // Adjust as needed
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
    </script>
</body>

</html>