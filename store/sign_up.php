<!DOCTYPE html>
<html>
<head>
    <title>Joshthrift VTG</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/form_validation.js"></script>
</head>
<body>
    <div class="container">
        <img src="img/gertes_logo.jpg" alt="Logo" style="width: 200px; height: 200px;">
        <form action="sign_up_process.php" method="post" onsubmit="return validateForm()">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>

<style>body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('img/bg_image.jpg');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background-color: #FFF5C2;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container img {
    width: 200px;
    height: 200px;
    margin-bottom: 20px;
}

form div {
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
