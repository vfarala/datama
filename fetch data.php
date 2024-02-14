<?php
include 'database.php';

$sql = "SELECT users.UserID, users.FirstName, users.MiddleName, users.LastName, users.Email, 
               client_data.AGE, client_data.CONTACT_NUMBER, client_data.date_of_birth, client_data.occupation,
               client_data.owned_pet, client_data.indetification_number, client_data.salary, client_data.sex,
               client_data.city, client_data.street, client_data.barangay
        FROM users
        INNER JOIN client_data ON users.Email = client_data.Email";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Update existing records in both tables
            $update_users_sql = "UPDATE users 
                                SET FirstName = '{$row['FirstName']}', 
                                    MiddleName = '{$row['MiddleName']}', 
                                    LastName = '{$row['LastName']}' 
                                WHERE Email = '{$row['Email']}'";

            $update_client_data_sql = "UPDATE client_data 
                                        SET AGE = '{$row['AGE']}', 
                                            CONTACT_NUMBER = '{$row['CONTACT_NUMBER']}', 
                                            date_of_birth = '{$row['date_of_birth']}', 
                                            occupation = '{$row['occupation']}', 
                                            owned_pet = '{$row['owned_pet']}', 
                                            indetification_number = '{$row['indetification_number']}', 
                                            salary = '{$row['salary']}', 
                                            sex = '{$row['sex']}', 
                                            city = '{$row['city']}', 
                                            street = '{$row['street']}', 
                                            barangay = '{$row['barangay']}' 
                                        WHERE Email = '{$row['Email']}'";

            // Execute the update queries for both tables
            $update_users_result = $conn->query($update_users_sql);
            $update_client_data_result = $conn->query($update_client_data_sql);

            // Handle errors if necessary
            if (!$update_users_result || !$update_client_data_result) {
                // Handle error, perhaps log it or display a message
                echo "Error updating records: " . $conn->error;
            }
        }
    } else {
        // If no records exist, insert new records into both tables
        // Construct insert queries for both tables
        $insert_users_sql = "INSERT INTO users (FirstName, MiddleName, LastName, Email)
                             VALUES ('$first_name', '$middle_name', '$last_name', '$email')";

        $insert_client_data_sql = "INSERT INTO client_data (AGE, CONTACT_NUMBER, date_of_birth, occupation,
                                                             owned_pet, indetification_number, salary, sex,
                                                             city, street, barangay, Email)
                                   VALUES ('$age', '$contact_number', '$date_of_birth', '$occupation',
                                           '$owned_pet', '$indetification_number', '$salary', '$sex',
                                           '$city', '$street', '$barangay', '$email')";

        // Execute the insert queries for both tables
        $insert_users_result = $conn->query($insert_users_sql);
        $insert_client_data_result = $conn->query($insert_client_data_sql);

        // Handle errors if necessary
        if (!$insert_users_result || !$insert_client_data_result) {
            // Handle error, perhaps log it or display a message
            echo "Error inserting records: " . $conn->error;
        }
    }
} else {
    echo "Error: " . $conn->error;
}

// Close database connection
$conn->close();
?>