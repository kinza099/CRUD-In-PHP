<?php
include 'layout.php';
include 'connection.php';

$nameErr = $emailErr = $passwordErr = $phoneErr = "";
$name = $email = $password = $phone_number = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id={$id}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $phone_number = $row['phone_number'];
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $valid = true;
    $id = $_POST["id"];

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = false;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $valid = false;
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long";
            $valid = false;
        }
    }

    if (empty($_POST["phone_number"])) {
        $phoneErr = "Phone number is required";
        $valid = false;
    } else {
        $phone_number = test_input($_POST["phone_number"]);
        if (!preg_match("/^[0-9]*$/", $phone_number)) {
            $phoneErr = "Only numbers are allowed in phone number";
            $valid = false;
        }
    }

    if ($valid) {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', phone_number='$phone_number' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

$conn->close();
?>

<div class="container">
    <div style="margin-top: 100px; margin-left: 50px; margin-right: 100px; margin-bottom: 60px;">
        <div class="text-center navbar-dark bg-dark text-white" style="height: 50px; padding-top: 9px; margin-bottom: 25px;">
            <h3>Update</h3>
        </div>
        <form class="post-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $name; ?>">
                <span class="error text-danger"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email; ?>">
                <span class="error text-danger"><?php echo $emailErr; ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password; ?>">
                <span class="error text-danger"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputPhone" name="phone_number" value="<?php echo $phone_number; ?>">
                <span class="error text-danger"><?php echo $phoneErr; ?></span>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</div>
