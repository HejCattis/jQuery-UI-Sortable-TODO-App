<?php
function getAllTodos($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='todo'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllDoing($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='doing'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllDone($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='done'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/*
 * Uppdaterar en kund
 */
function updateTasks($conn)
{
    $id = $_POST['id'];
    $state = $_POST['state'];

    try {
        $stmt = $conn->prepare("UPDATE tasks SET state=:state WHERE id=:id");
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
