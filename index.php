<?php 
// Call database connection
include('connect-db.php');

// write query for contacts
$sql = "SELECT names, phone, birthday FROM contacts";

// make query and get contacts
$result = mysqli_query($connect, $sql);


// fetch resulting rows as arrays
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// close connection
mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacts Page</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>My Contacts Page</h1>
    <a href="add-contact.php">Add New Contact</a>
    <!-- <a href="delete-contact.php">Delete New Contact</a> -->


    <!-- Add Information -->
    <div>
    <br>
    <?php foreach ($contacts as $contact) : ?>

        <div class="contact-info">
            <?php echo htmlspecialchars('Name: ' . $contact['names']);?> <br>
            <?php echo htmlspecialchars('Phone: ' . $contact['phone']);?> <br>
            <?php echo htmlspecialchars('Birthday: ' . $contact['birthday']);?>
        </div>
        
        <br>

    <?php endforeach; ?>

    </div>
</body>
</html>

