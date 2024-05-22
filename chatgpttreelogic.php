<?php

// Static dataset representing the relationships in the family tree
$relationships = [
    "John FATHER Mike",
    "John MOTHER Lisa",
    "Mike FATHER David",
    "Mike MOTHER Sarah",
    "Lisa FATHER Robert",
    "Lisa MOTHER Emily",
    "David FATHER James",
    "David MOTHER Emma",
    "Sarah FATHER William",
    "Sarah MOTHER Olivia",
    "Archan FATHER Dipakbhai",
    "Archan MOTHER Pritiben",
    "Dipakbhai FATHER Dayaljibhai",
    "Dipakkbhai MOTHER Taraben"
];

// Function to find the relationship between two individuals
function findRelationship($user1, $user2, $relationships)
{
    $visited = []; // Track visited individuals
    $stack = []; // Initialize an empty stack
    $path = []; // Track the path from user1 to user2

    // Push user1 onto the stack
    array_push($stack, $user1);

    // Perform a depth-first search
    while (!empty($stack)) {
        $currentPerson = array_pop($stack);

        // Check if the current person is user2
        if ($currentPerson === $user2) {
            // Backtrack to build the relation chain
            $relationChain = [];
            $previousPerson = null;

            // Traverse the path in reverse order
            foreach (array_reverse($path, true) as $person => $relation) {
                if ($previousPerson !== null) {
                    // Find the relationship between consecutive individuals
                    $relationChain[] = $previousPerson . ' ' . $relation . ' ' . $person;
                }

                $previousPerson = $person;
            }

            // Combine the individuals and relationships in the relation chain
            return implode(' ', $relationChain);
        }

        // Check if the current person has been visited
        if (!in_array($currentPerson, $visited)) {
            $visited[] = $currentPerson;

            // Find the relationships of the current person
            $relatedPersons = findRelatedPersons($currentPerson, $relationships);

            // Push the related individuals onto the stack
            foreach ($relatedPersons as $relatedPerson) {
                array_push($stack, $relatedPerson);
                // Keep track of the path from user1 to the current person
                $path[$relatedPerson] = findRelation($currentPerson, $relatedPerson, $relationships);
            }
        }
    }

    return "No relationship found";
}

// Function to find the relationships of a person
function findRelatedPersons($person, $relationships)
{
    $relatedPersons = [];

    foreach ($relationships as $relationship) {
        list($subject, $relation, $object) = explode(" ", $relationship);

        if ($person === $subject) {
            $relatedPersons[] = $object;
        } elseif ($person === $object) {
            $relatedPersons[] = $subject;
        }
    }

    return $relatedPersons;
}

// Function to find the relationship between two consecutive individuals
function findRelation($person1, $person2, $relationships)
{
    foreach ($relationships as $relationship) {
        list($subject, $relation, $object) = explode(" ", $relationship);

        if (($person1 === $subject && $person2 === $object) || ($person1 === $object && $person2 === $subject)) {
            return $relation;
        }
    }

    return "Unknown relationship";
}

// Test case: Find the relationship between "John" and "Emma"
$user1 = "Archan";
$user2 = "Pritiben";
$output = findRelationship($user1, $user2, $relationships);

echo "Relationship between $user1 and<br> $user2: $output";

?>
