<?php

  function get_assignments_by_course($course_id) {
    global $db;
    if ($course_id) {
      // Query
      $query = 'SELECT A.ID, A.Description, C.courseName FROM assingments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :courseid ORDER BY A.ID';

    } else {
      $query = 'SELECT A.ID, A.Description, C.courseName FROM assingments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':courseid', $course_id);
    $statement->execute();
    $assingments = $statement->fetchAll();
    $statement->closeCursor();
    return $assingments;
  }

  function delete_assingment($assingment_id) {
    global $db;
    $query = 'DELETE FROM assingments WHERE ID = :assingmentid';
    $statement = $db->prepare($query);
    $statement->bindValue(':assingmentid', $assingment_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_assingment($course_id, $description) {
    global $db;
    $query = 'INSERT INTO assingment (Description, courseID) VALUES (:descr, :courseid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':descr', $description);
    $statement->bindValue(':courseid', $course_id);
    $statement->execute();
    $statement->closeCursor();
  }