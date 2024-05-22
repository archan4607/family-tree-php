<?php
error_reporting(0);

// Replace with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newfamilytree";


// User IDs for which you want to find the relationship
$user1 = 11; // Replace with the first user ID
$user2 = 26; // Replace with the second user ID

// Establish a MySQL database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to find the relationship path using breadth-first search (BFS)
function findRelationship($conn, $user1, $user2)
{
    // Create a queue to perform BFS
    $queue = new SplQueue();
    $visited = [];
    $parents = [];
    $relationships = []; // Store the relationships between users
    $found = false;

    $queue->enqueue($user1);
    $visited[$user1] = true;
    $parents[$user1] = null;

    while (!$queue->isEmpty()) {
        $current = $queue->dequeue();
        // echo "Visited user ID: " . $current . "<br>"; // Print visited user ID

        if ($current == $user2) {
            $found = true;
            break;
        }

        $queries = [
            "SELECT brother_id, 'Brother' AS relationship FROM brother WHERE user_id = $current",
            "SELECT daughter_id, 'Daughter' AS relationship FROM daughter WHERE user_id = $current",
            "SELECT father_id, 'Father' AS relationship FROM father WHERE user_id = $current",
            "SELECT husband_id, 'Husband' AS relationship FROM husband WHERE user_id = $current",
            "SELECT mother_id, 'Mother' AS relationship FROM mother WHERE user_id = $current",
            "SELECT sister_id, 'Sister' AS relationship FROM sister WHERE user_id = $current",
            "SELECT son_id, 'Son' AS relationship FROM son WHERE user_id = $current",
            "SELECT wife_id, 'Wife' AS relationship FROM wife WHERE user_id = $current",
        ];
        
        foreach ($queries as $query) {
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nextUser = $row[array_keys($row)[0]];
                    $relationship = $row['relationship'];

                    if (!isset($visited[$nextUser])) {
                        $queue->enqueue($nextUser);
                        $visited[$nextUser] = true;
                        $parents[$nextUser] = $current;
                        $relationships[$nextUser] = $relationship;
                    }
                }
            }
        }
    }

    if ($found) {
        $path = [];
        $current = $user2;

        while ($current != $user1) {
            $path[] = $current;
            $current = $parents[$current];
        }

        $path[] = $user1;
        $path = array_reverse($path);

        $relationshipPath = array_map(function ($userId) use ($relationships, $conn) {
            $relationship = $relationships[$userId];
            $userName = getUserName($conn, $userId);
            return "<strong>$relationship</strong> " . $userName;
        }, $path);

        return $relationshipPath;
    }

    return false;
}

// Function to get the user name from user ID
function getUserName($conn, $userId)
{
    $query = "SELECT u_fname, u_lname FROM user WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $u_fname = $row['u_fname'];
        $u_lname = $row['u_lname'];
        return $u_fname . " " . $u_lname;
    }

    return "";
}

// Call the function to find the relationship in both directions
$relationship1 = findRelationship($conn, $user1, $user2);
$relationship2 = findRelationship($conn, $user2, $user1);

// Output the relationship
if ($relationship1 !== false || $relationship2 !== false) {
    $output = "Relationship between User $user1 and User $user2: ";

    // Remove "You" from the relationship path
    $relationshipWithoutYou1 = array_filter($relationship1, function ($item) {
        return strpos($item, "You") === false;
    });
    $relationshipWithoutYou2 = array_filter($relationship2, function ($item) {
        return strpos($item, "You") === false;
    });

    if (!empty($relationshipWithoutYou1)) {
        $output .= implode(" ", $relationshipWithoutYou1);
    }

    // if (!empty($relationshipWithoutYou2)) {
    //     $output .= " | " . implode(", ", $relationshipWithoutYou2);
    // }

    echo $output;
} else {
    echo "No relationship found between User $user1 and User $user2.";
}

// Close the database connection
mysqli_close($conn);
?>
