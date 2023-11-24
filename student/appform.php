<form action='process_application.php' method='POST'>
   <label for='course'>Select a Course:</label><br>
    <select id='course' name='course'>
        <?php
    foreach ($courses as $course) {
        echo "<option value='{$course['id']}'>{$course['course_name']}</option>";
    }
    ?>
 </select><br><br>
    <label for='message'>Additional Message (optional):</label><br>
   <textarea id='message' name='message' rows='4' cols='50'></textarea><br><br>


    <label for="gender">Gender:</label>
    <input type="text" id="gender" name="gender"><br><br>
    
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname"><br><br>
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number"><br><br>
    
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname"><br><br>
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email"><br><br>
    
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth"><br><br>
    
    <label for="place_of_birth">Place of Birth:</label>
    <input type="text" id="place_of_birth" name="place_of_birth"><br><br>
    
    <label for="nationality">Nationality:</label>
    <input type="text" id="nationality" name="nationality"><br><br>
    
    <label for="mother_tongue">Mother Tongue:</label>
    <input type="text" id="mother_tongue" name="mother_tongue"><br><br>
    
    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number"><br><br>
    
    <label for="parent_title">Parent Title:</label>
    <input type="text" id="parent_title" name="parent_title"><br><br>
    
    <label for="parent_name">Parent Name:</label>
    <input type="text" id="parent_name" name="parent_name"><br><br>
    
    <label for="parent_address">Parent Address:</label>
    <input type="text" id="parent_address" name="parent_address"><br><br>
    
    <label for="parent_town">Parent Town:</label>
    <input type="text" id="parent_town" name="parent_town"><br><br>
    
    <label for="parent_mobile_number">Parent Mobile Number:</label>
    <input type="text" id="parent_mobile_number" name="parent_mobile_number"><br><br>
    
    <label for="parent_email">Parent Email:</label>
    <input type="text" id="parent_email" name="parent_email"><br><br>
    
    <label for="sponsor">Sponsor:</label>
    <input type="text" id="sponsor" name="sponsor"><br><br>
    
    <label for="course_date">Course Date:</label>
    <input type="date" id="course_date" name="course_date"><br><br>
    
    <label for="intake_date">Intake Date:</label>
    <input type="date" id="intake_date" name="intake_date"><br><br>
    
    <label for="english_speaking_level">English Speaking Level:</label>
    <input type="text" id="english_speaking_level" name="english_speaking_level"><br><br>
    
</form>