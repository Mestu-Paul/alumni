
<?php
    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start();
    include_once '../../conn.php';
    $db = connect();

    $target_dir = "../../media/success/";
    $timestamp = time();
    $target_file =  basename($_FILES["photo"]["name"]);
    $file_path = $target_dir.$timestamp.'-'.$target_file;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path);


    $stmt = $db->prepare("INSERT INTO success_stories (name, job, photo) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['fullName'], $_POST['job'], $file_path]);

    $successStoreID = $db->lastInsertId();

    for ($i = 1; $i <= $_POST['counter']; $i++) {
        $stmt = $db->prepare("INSERT INTO success_details (success_stories_id, heading, description) VALUES (?, ?, ?)");
        $stmt->execute([$successStoreID, $_POST["heading$i"], $_POST["description$i"]]);
    }

    
    header("Location: ../frontend/successStories.php");
    exit();
?>
