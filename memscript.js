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

    function loadChangePasswordForm() {
        $.ajax({
            url: "change_password_form.php", // Update the URL to the PHP file containing the change password form
            success: function(response) {
                $("#modal-body").html(response); // Replace the modal body content with the form
                $("#changePasswordModal").modal("show"); // Show the modal
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", status, error);
                console.log("Response:", xhr.responseText);
            }
        });
    }

    // Function to show the confirmation modal
    function confirmDelete() {
        $('#confirmDeleteModal').modal('show');
    }

    // Event listener for the delete button inside the modal
    $('#confirmDeleteBtn').on('click', function() {
        // Send AJAX request to delete account
        $.ajax({
            url: 'delete_account.php',
            type: 'POST',
            success: function(response) {
                alert(response); // Display response from server
                window.location.href = 'logout.php'; // Redirect to logout page after successful account deletion
            },
            error: function(xhr, status, error) {
                console.error('Error deleting account:', error);
            }
        });
    });

    // Function to open the delete account modal
    function openDeleteAccountModal() {
        $('#deleteAccountModal').modal('show');
    }

    // Function to handle confirming the delete action
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        // Perform delete account action here
        // For example, you can make an AJAX request to delete the account
        // Once the account is deleted, you can redirect the user to the logout page or perform any other necessary actions
        // After the delete action is completed, close the modal
        $('#deleteAccountModal').modal('hide');
    });


    
    $(document).ready(function () {
        // Function to handle showing modal with service details
        $('.open-button').click(function () {
            var title = $(this).data('title');
            var description = $(this).data('description').replace(/<br>/g, '\n'); // Replace <br> with \n
            $('#modalLabel').text(title);
            $('#modal-description').text(description);
        });
    });

    $('.open-button').on('click', function() {
        var title = $(this).data('title');
        var description = $(this).data('description');
        
        // Remove any previously appended buttons and descriptions
        $('#modal-body').empty();
        
        // Append description
        $('#modal-body').append('<p>' + description + '</p>');
        
        // Append buttons based on the service title
        if (title === 'Online Assistance') {
            var buttons = [
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/u9u4V2WM4jREh7Rz7">SSS Form</button>',
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/Akadou8BxC3HeUq39">PSA Form</button>',
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/iChJVDJnGTMGDwCq5">PAG-IBIG Form</button>',
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/8VVtmditJ6ymWdhj6">NBI Form</button>',
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/LKC7CCLFRmYhq21HA">TIN ID Form</button>',
                '<button type="button" class="btn btn-primary assistance-button" data-link="https://forms.gle/i3DP3RPNRQAKxqa28">PASSPORT Form</button>'
            ];
            
            // Append buttons to modal body
            $('#modal-body').append(buttons.join(''));
        } else if (title === 'Photo Printing') {
            var button = '<button type="button" class="btn btn-primary" id="upload-image-button">Upload Image</button>';
            $('#modal-body').append(button);
            $('#upload-image-button').on('click', function() {
                window.open('https://drive.google.com/drive/folders/1Ok713s1aD_ORpatdnpoTUDn0tV8JytCj?usp=drive_link', '_blank');
            });
        } else if (title === 'Printing Services') {
            var button = '<button type="button" class="btn btn-primary" id="upload-document-button">Upload Document</button>';
            $('#modal-body').append(button);
            $('#upload-document-button').on('click', function() {
                window.open('https://drive.google.com/drive/folders/1abwO65pyDKT_0uP-zv9GAHLRoKmxmWYr?usp=drive_link', '_blank');
            });
        } else if (title === 'Graphics Layout') {
            var button = '<button type="button" class="btn btn-primary" id="upload-graphic-button">Upload File</button>';
            $('#modal-body').append(button);
            $('#upload-graphic-button').on('click', function() {
                window.open('https://drive.google.com/drive/folders/1H-4JVEuUUE1TbdN_huSoFry2AO0iXbPN?usp=drive_link', '_blank');
            });
        }
        
        // Add spacing between buttons
        $('#modal-body .btn').css({
            'margin': '10px',
            'width': '200px'
        });
    });
    
    $('#modal').on('hidden.bs.modal', function() {
        // Clear modal body when modal is closed
        $('#modal-body').empty();
    });
    
    // Add event listener for assistance buttons
    $(document).on('click', '.assistance-button', function() {
        var link = $(this).data('link');
        window.open(link, '_blank');
    });
    
    
    


    
    
    
