if (isset($_POST['ticket_date'])) {
    $ticketDate = $_POST['ticket_date'];

    // Create DateTime objects for the input date, start date, and end date
    $inputDate = DateTime::createFromFormat('d/m/Y', $ticketDate);
    $startDate = DateTime::createFromFormat('Y-m-d', '2023-12-19');
    $endDate = DateTime::createFromFormat('Y-m-d', '2023-12-31');

    // Check if the input date is between the start and end dates
    if ($inputDate >= $startDate && $inputDate <= $endDate) {
        // Perform your database operations here
        // For example, execute a SELECT query
        $sql = "SELECT * FROM your_table WHERE ticket_date = '$ticketDate'";
        $result = $conn->query($sql);

        // Process the result as needed
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Handle each row of data
                // Example: echo $row['column_name'];
            }
        } else {
            echo "No results found.";
        }
    } else {
        echo "The ticket date is outside the specified range";
    }
}
