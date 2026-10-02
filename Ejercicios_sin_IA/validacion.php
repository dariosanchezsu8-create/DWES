<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios sin IA</title>
</head>
<body>
    <form action="" method="POST">
        <h2>PHP Form Validation Example</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br><br>
        <label for="web">Website:</label>
        <input type="text" name="web" required>
        <br><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" rows="5" cols="40" required></textarea>
        <br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female" required>Female
        <input type="radio" name="gender" value="male" required>Male
        <br><br>
        <input type="submit" value="Submit">
        <h1>Your Input:</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $web = $_POST['web'];

            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Website: $web</p>";
        }
        ?>
    </form>
</body>
</html>


