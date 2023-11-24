<head>
<link rel="stylesheet" href="css/appform.css" />
</head>
<form action='process_application.php' method='POST' class="two-column-form">
   <label for='course'>Select a Course:</label><br>
    <select id='course' name='course'>
        <?php
    foreach ($courses as $course) {
        echo "<option value='{$course['id']}'>{$course['course_name']}</option>";
    }
    ?>
 </select><br><br>
    <label for='message'>Additional Message (optional):</label><br>
   <textarea id='message' name='message' rows='4' cols='50'></textarea><br>


   <label for="gender">Gender:</label>
<select id="gender" name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname">
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number">
    
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname">
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth">
    
    <label for="place_of_birth">Place of Birth:</label>
    <input type="text" id="place_of_birth" name="place_of_birth">
    
    <label for="nationality">Nationality:</label>
<select id="nationality" name="nationality">
    <option value="Algerian">Uganda</option>
    <option value="Angolan">Kenya</option>
    <option value="Beninese">Tanzania</option>
    <!-- Add more African countries as needed -->
</select>
    
    <label for="mother_tongue">Mother Tongue:</label>
    <input type="text" id="mother_tongue" name="mother_tongue">
    
    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number">
    
    <label for="parent_title">Parent Title:</label>
    <input type="text" id="parent_title" name="parent_title">
    
    <label for="parent_name">Parent Name:</label>
    <input type="text" id="parent_name" name="parent_name">
    
    <label for="parent_address">Parent Address:</label>
    <input type="text" id="parent_address" name="parent_address">
    
    <label for="parent_town">Parent Town:</label>
    <input type="text" id="parent_town" name="parent_town">
    
    <label for="parent_mobile_number">Parent Mobile Number:</label>
    <input type="text" id="parent_mobile_number" name="parent_mobile_number">
    
    <label for="parent_email">Parent Email:</label>
    <input type="text" id="parent_email" name="parent_email">
    
    <label for="sponsor">Sponsor:</label>
    <input type="text" id="sponsor" name="sponsor">
    
    <label for="course_date">Course Date:</label>
    <input type="date" id="course_date" name="course_date">
    
    <label for="intake_date">Intake Date:</label>
    <input type="date" id="intake_date" name="intake_date">
    
    <label for="english_speaking_level">English Speaking Level:</label>
    <input type="text" id="english_speaking_level" name="english_speaking_level">
    
</form>