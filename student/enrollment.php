<!DOCTYPE html>
<html>
<head>
    <title>Enroll User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
           
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Enroll User</h1>
    <form action="enroll_user.php" method="POST">
       
        <label for="current_semester">Current Semester:</label>
        <input type="Number" id="current_semester" name="current_semester" required>

        <label for="current_academic_year">Current Academic Year:</label>
        <input type="text" id="current_academic_year" name="current_academic_year" required>

        <input type="submit" value="Enroll Now">
    </form>
</body>
</html>
