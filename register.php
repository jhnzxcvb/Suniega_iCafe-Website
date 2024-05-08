<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "suniega_icafe";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpass = $_POST['conpass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $stmt = $conn->prepare("SELECT email FROM member WHERE email =?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_matched = $result->num_rows;

    if ($user_matched > 0) {
        echo "User already exists with the email id '$email'";
    } else {
        $stmt = $conn->prepare("INSERT INTO member (email, password, conpass, fname, lname, gender, address, contact) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $email, $password, $conpass, $fname, $lname, $gender, $address, $contact);
        if ($stmt->execute()) {
            echo "Registered Successfully!";
        } else {
            echo "Registration Error! Please Try Again.". mysqli_error($conn);
        }
    }
}

    $conn->close();
}
?>

<script>
    function loadDoc(){

      
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('loginForm').innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "login.php", true);
        xhttp.send();
        }
        function loadLogin(event) {
            event.preventDefault(); 
            loadDoc(); 
        }
  
</script>