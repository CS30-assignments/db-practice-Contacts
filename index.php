<?php
// call database connection
include('connect-db.php');

// write query for contacts
$sql = "SELECT names, phone, birthday, id FROM contacts";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts Page</title>
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- Main Heading -->
    <div class="jumbotron bg-danger container">
        <h1 class="display-4">My Contacts Page</h1>
    </div>

    <a class="add" href="add-contact.php">Add New Contact</a>

    <!-- Add Information -->
    <div>
        <br>
        <?php foreach ($contacts as $contact) : ?>

            <div class="contact-info">
                <?php echo htmlspecialchars($contact['names']); ?> <br>
                <!-- <?php echo htmlspecialchars('Phone: ' . $contact['phone']); ?> <br>
                <?php echo htmlspecialchars('Birthday: ' . $contact['birthday']); ?> -->
                <br>
                <a class="view" href="view-contact.php?id=<?php echo $contact['id'] ?>">View Contact</a>

            </div>


            <br>

        <?php endforeach; ?>

    </div>
</body>

</html>