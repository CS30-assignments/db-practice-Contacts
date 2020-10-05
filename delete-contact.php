<?php
// call database connection
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


// POST check
if(isset($_POST['delete'])){
    echo 'HEEELLLOOO';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Contacts</title>
</head>

<body>
    <!-- Instructions -->
    <h2>Select contacts to delete and hit delete!</h2>

    <!-- Contacts Added -->
    <form method="post">
        
        <?php foreach ($contacts as $contact) : ?>

            <!-- Every contact has a checkbox -->
            <input type="checkbox" id="contact-delete" name="contact-delete">

            <div class="contact-info">
                <?php echo htmlspecialchars('Name: ' . $contact['names']); ?> <br>
                <?php echo htmlspecialchars('Phone: ' . $contact['phone']); ?> <br>
                <?php echo htmlspecialchars('Birthday: ' . $contact['birthday']); ?>
            </div>

            <br>
        <?php endforeach; ?>

        <!-- Delete -->
        <input type="submit" name="delete" value="Delete">
        
    </form>
</body>

</html>