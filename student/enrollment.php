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
            max-width: 70%;
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
        input[type="text"] {
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
            background-color: #005690;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #3e77b6;
        }
    </style>
</head>
<body>
    <h1>Enroll User</h1>
        <label for="student_registration_number">Student Registration Number:</label>
        <input type="text" id="student_registration_number" name="student_registration_number">

        <label for="current_semester">Current Semester:</label>
        <input type="text" id="current_semester" name="current_semester">

        <label for="current_academic_year">Current Academic Year:</label>
        <input type="text" id="current_academic_year" name="current_academic_year">

        <input type="submit" value="Enroll User">
    </form>
</body>
</html>
