<?php 
// Include database connection
include('connect-db.php');


// Initialize Variables;
$name = $phone = $birthday = '';

if(isset($_POST['Submit'])){
    $name = mysqli_real_escape_string($connect, $_POST['names']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);

    // Insert new data into database
    $sql = "INSERT INTO contacts(names, phone, birthday) VALUES ($name, $phone, $birthday)";

    // Save information to database
    if(mysqli_query($connect, $sql)){
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
    <form action="" method="post">
        <!-- Name -->
        <label>Name: </label>
        <input type="text" name="names" value="<?php echo htmlspecialchars($name)?>">
        
        <!-- Phone Number -->
        <label>Phone Number</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone)?>">

        <!-- Birthday-->
        <label>Birthday</label>
        <input type="text" name="birthday" value="<?php echo htmlspecialchars($birthday)?>">

        <!-- Submit Information -->
        <input type="submit" name="submit" value="Submit">
 
    </form>
</body>
</html>