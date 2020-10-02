<?php 
// Call database connection
include('connect-db.php');

// write query for contacts
$sql = "SELECT names, phone, birthday FROM contacts";

// make query and get contacts
$result = mysqli_query($connect, $sql);


// fetch resulting rows as arrays
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styles.css" rel="stylesheet">
    <title>Contacts Page</title>
</head>
<body>
    <h1>My Contacts Page</h1>
    <a href="add-contact.php">Add New Contact</a>

    <!-- Add Information -->
    <div>
    <br>
    <!-- <?php foreach ($contacts as $contact) : ?> -->

        <div class="contact-info">
            <?php echo htmlspecialchars('Name: ' . $contact['names']);?> <br>
            <?php echo htmlspecialchars('Phone: ' . $contact['phone']);?> <br>
            <?php echo htmlspecialchars('Birthday: ' . $contact['birthday']);?>
        </div>
        
        
        
        <br>



    <!-- <?php endforeach; ?> -->

    </div>
</body>
</html>