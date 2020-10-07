<?php
include('connect-db.php');

// DELETE CONTACT
if (isset($_POST['delete-contact'])) {
    $delete_id = mysqli_real_escape_string($connect, $_POST['delete_id']);

    $sql = "DELETE FROM `contacts` WHERE id = $delete_id";

    // make and check if query is succesful
    if (mysqli_query($connect, $sql)) {
        // success
        header('Location: index.php');
    }

}


// check GET id request
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    // make the sql
    $sql = "SELECT * FROM contacts WHERE id = $id";

    // get query results
    $result = mysqli_query($connect, $sql);

    // fetch result in array format
    $contact = mysqli_fetch_assoc($result);

    // free result and close connection
    mysqli_free_result($result);
    mysqli_close(($connect));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Contact</title>
</head>

<body>
    <!-- Dispalay Contact Information -->

    <?php if ($contact) { ?>
        <h2>View Contact</h2>

        <div>
            <!-- Name -->
            <p>
                <h3>Name:</h3>
                <?php echo $contact['names']; ?>
            </p>
            <!-- Phone -->
            <p>
                <h3>Phone:</h3>
                <?php echo $contact['phone']; ?>
            </p>
            <!-- Birthday -->
            <p>
                <h3>Birthday:</h3>
                <?php echo $contact['birthday']; ?>
            </p>

        </div>

        <form method="post">
            <!-- Delete Contact -->
            <input type="hidden" name="delete_id" value="<?php echo $contact['id'] ?>">
            <input id="delete-contact"  type="submit" name="delete-contact" value="Delete Contact">
        </form>

    <?php } ?>





</body>

</html>