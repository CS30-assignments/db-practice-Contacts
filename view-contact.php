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
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="add-background">
    <!-- Dispalay Contact Information -->

    <?php if ($contact) { ?>
        <h2 class="text-center">View Contact</h2>

        <div class="container bg-info py-3">
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

        <form class = "pr-5 pt-3" method="post">
            <!-- Delete Contact -->
            <input type="hidden" name="delete_id" value="<?php echo $contact['id'] ?>">
            <input class= "btn bg-danger float-right" id="delete-contact"  type="submit" name="delete-contact" value="Delete Contact">
        </form>

    <?php } ?>





</body>

</html>