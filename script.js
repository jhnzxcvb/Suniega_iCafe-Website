const services = ["different services!", "computer rentals", "printing services", "computer repair", "mobile wallet load", "online assistance", "graphics layout","photo printing", "software installation", "game credits"];

    function typeWriter(text, i, callback) {
        if (i < text.length) {
            document.getElementById("services").innerHTML += text.charAt(i);
            i++;
            setTimeout(function() {
                typeWriter(text, i, callback);
            }, 50);
        } else {
            setTimeout(callback, 2000);
        }
    }

    function loopTypewriter(services, i) {
        i = i % services.length;
        document.getElementById("services").innerHTML = "";
        typeWriter(services[i], 0, function() {
            loopTypewriter(services, i + 1);
        });
    }

    loopTypewriter(services, 0);

    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    function switchToRegisterForm() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("registerForm").style.display = "block";
    }

    function switchToLoginForm() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("registerForm").style.display = "none";
    }

    $('#membershipModal').on('hidden.bs.modal', function () {
        switchToLoginForm();
    });

    function validateLoginForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        if (email.trim() === "" || password.trim() === "") {
            alert("Please enter both email and password.");
            return false;
        }

        var gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail.com$/;
        if (!gmailRegex.test(email)) {
            alert("Please enter a valid Gmail address.");
            return false;
        }

        return true;
    }

    