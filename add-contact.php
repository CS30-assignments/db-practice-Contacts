<?php
// Include database connection
include('connect-db.php');


// // Initialize Variables;
// $name = $phone = $birthday = '';

$blank = array('names' => '', 'phone' => '', 'birthday' => '');

if (isset($_POST['submit'])) {

    // names
    if (isset($_POST['names'])) {
        $name = $_POST['names'];
        echo $name . '<br />';
    }

    // phone number
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        echo $phone . '<br />';
    }

    // birthday
    if (isset($_POST['birthday'])) {
        $birthday = $_POST['birthday'];
        echo $birthday . '<br />';
    }

    // insert into database
    $sql = "INSERT INTO contacts(names, phone, birthday) VALUES ('$name', '$phone', '$birthday')";

    // save to database
    if (mysqli_query($connect, $sql)) {
        echo "HELLLOO IT WORKS";
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>

<head>
    <title>Add New Contact</title>
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="add-background">
    <!-- Instructions -->
    <h2 class="display-5 pt-3 pb-5 container">Enter in new contacts information and hit submit when ready to add!</h2>

    <!-- Input Form -->
    <div class="container bg-info p-4">
        <form method="post">
            <!-- Name -->
            <div class="form-group">
                <label>Name: </label> <br>
                <input type="text" placeholder= "Contact Name" name="names" value="<?php echo htmlspecialchars($name) ?>">
            </div>


            <!-- Phone Number -->
            <div class="form-group">
                <label>Phone Number: </label>
                <br>
                <input type="text" placeholder="000-000-000"  name="phone" value="<?php echo htmlspecialchars($phone) ?>">
            </div>


            <!-- Birthday-->
            <div class="form-group">
                <label>Birthday: </label>
                <br>
                <input type="text" placeholder="YYYY/MM/DD"  name="birthday" value="<?php echo htmlspecialchars($birthday) ?>">

            </div>

            <!-- Submit Information -->
            <input class = "btn btn-light" type="submit" name="submit" value="Submit">

        </form>

    </div>

</body>

</html>