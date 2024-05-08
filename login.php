<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "suniega_icafe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT fname FROM member WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_matched = $result->fetch_assoc();

        if ($user_matched) {
            $_SESSION["email"] = $email;
            $_SESSION["logged_in"] = true;
            $_SESSION["fname"] = $user_matched['fname'];
            $_SESSION["password"] = $password;
            echo "<script>alert('Logged In Successfully!'); window.location.href = 'member.php';</script>";
            exit;
        } else {
            echo "<script>alert('Login failed. Invalid username or password.'); window.location.href = 'index.php';</script>";
            exit;
        }        
    }

    $conn->close();
}
?>


<script>
    function loadDoc() {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('registerForm').innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "register.php", true);
        xhttp.send();
    }

    function loadAjax(event) {
        event.preventDefault(); // Prevent the default behavior of the link
        loadDoc(); // Call the fetchData function to perform AJAX request
    }
</script>