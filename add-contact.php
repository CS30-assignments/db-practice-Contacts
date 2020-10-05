<?php
// Include database connection
include('connect-db.php');


// Initialize Variables;
$name = $phone = $birthday = '';

$blank = array('names' => '', 'phone' => '', 'birthday' => '');

if (isset($_POST['submit'])) {

    // names
    if(isset($_POST['names'])){
        $name = $_POST['names'];
        echo $name . '<br />';
    }

    // phone number
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
        echo $phone . '<br />';
    }

    // birthday
    if(isset($_POST['birthday'])){
        $birthday = $_POST['birthday'];
        echo $birthday . '<br />';
    }

    // insert into database
    $sql = "INSERT INTO contacts(names, phone, birthday) VALUES ('$name', '$phone', '$birthday')";

    // save to database
    if(mysqli_query($connect, $sql)){
        echo "HELLLOO IT WORKS";
        header('Location: index.php');
    }



}

?>

<!DOCTYPE html>

<head>
    <title>Add New Contact</title>
</head>

<body>
    <!-- Instructions -->
    <h2>Enter in new contacts information and hit submit when ready to add!</h2>

    <!-- Input Form -->
    <form method="post">
        <!-- Name -->
        <label>Name: </label>
        <input type="text" name="names" value="<?php echo htmlspecialchars($name) ?>">

        <!-- Phone Number -->
        <label>Phone Number</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>">

        <!-- Birthday-->
        <label>Birthday</label>
        <input type="text" name="birthday" value="<?php echo htmlspecialchars($birthday) ?>">

        <!-- Submit Information -->
        <input type="submit" name="submit" value="Submit">

    </form>
</body>

</html>

