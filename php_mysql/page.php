<!DOCTYPE HTML>
<html>

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>

  <?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $phoneErr = "";
  $name = $email = $gender = $comment = $phone = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["phone"])) {
      $phoneErr = "Phone is required";
    } else {
      $phone = test_input($_POST["phone"]);
      if (!preg_match('/^[0-9]{10}+$/', $phone)) {

        $phoneErr = "Invalid Phone Number";
      }
    }

    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if ($nameErr == "" && $emailErr == "" && $genderErr == "" && $phoneErr == "") {
      $conn = mysqli_connect("localhost", "root", "", "mysql");

      // Check connection
      if ($conn === false) {
        die("ERROR: Could not connect. "
          . mysqli_connect_error());
      }
      $sql = "INSERT INTO db_connect VALUES ('$name',
            '$email','$phone','$comment')";

      if (mysqli_query($conn, $sql)) {
        echo "<h3>data stored in a database successfully."
          . " Please browse your localhost php my admin"
          . " to view the updated data</h3>";
      } else {
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($conn);
      }

      // Close connection
      mysqli_close($conn);
    }
    $nameErr = $emailErr = $genderErr = $phoneErr = "";
    $name = $email = $gender = $comment = $phone = "";
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  ?>

  <h2>PHP Form Validation Example</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Phone: <input type="number" name="phone" value="<?php echo $phone; ?>">
    <span class="error"><?php echo $phoneErr; ?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>


</body>

</html>