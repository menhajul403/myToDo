<?php
define("TASKS_FILE", "tasks.json");
date_default_timezone_set("Asia/Dhaka");
// ✅ Load Tasks
function loadTasks(): array {
    if (!file_exists(TASKS_FILE)) {
        return [];
    }

    $data = file_get_contents(TASKS_FILE);
    return $data ? json_decode($data, true) : [];
}
$tasks = loadTasks();

// ✅ Save Tasks
function saveTasks(array $tasks): void {
    $json = json_encode($tasks, JSON_PRETTY_PRINT);
    file_put_contents(TASKS_FILE, $json);
}



// ✅ Add Task
if (isset($_POST['add'])) {
    $taskText = trim($_POST['task']);

    if ($taskText !== "") {
        $tasks[] = [
            "task" => $taskText,
            "done" => false,
            "date" => date("d-m-Y h:i:s A") 
        ];
        saveTasks($tasks);
    }
    header("Location: index.php");
    exit;
}

// ✅ Delete Task
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($tasks[$index]);
    $tasks = array_values($tasks);
    saveTasks($tasks);
    header("Location: index.php");
    exit;
}

// ✅ Toggle Task Done/Undone
if (isset($_GET['toggle'])) {
    $index = $_GET['toggle'];
    $tasks[$index]['done'] = !$tasks[$index]['done'];
    saveTasks($tasks);
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple ToDo App</title>

<style>
    body {
        font-family: Arial, sans-serif;
        width: 450px;
        margin: 40px auto;
    }
    h2 {
        text-align: center;
    }
    .task {
        display: flex;
        justify-content: space-between;
        padding: 8px;
        margin: 5px 0;
        background: #f2f2f2;
        border-radius: 5px;
    }
    .done {
        text-decoration: line-through;
        color: green;
    }
    .btn {
        padding: 4px 10px;
        margin-left: 5px;
        cursor: pointer;
        border: none;
        border-radius: 3px;
    }
    .delete {
        background: red;
        color: #fff;
        text-decoration: none;

    }
    .toggle {
        background: green;
        color: #fff;
         text-decoration: none;
    }
</style>

</head>
<body>
<!-- show Task -->
<h2>✅ My To-Do List</h2>

<form method="POST">
    <input  style="
        width: 70%;
        height: 38px;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
    " type="text" name="task" placeholder="Enter task..." required>
    <button  style="
        background-color: green;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 15px;
        margin-left: 5px;

    " name="add">Add</button>
</form>

<hr>
<table style="width:100%" border="1" cellpadding="10">
<tr>
    <th>SL.No</th>
    <th>Tasks</th>
    <th>Date & Time</th>
    <th>Action</th>
</tr>

<?php foreach ($tasks as $index => $task): ?>
<tr>
    <td><?= $index + 1; ?></td>

    <!-- Task Title -->
    <td class="<?= $task['done'] ? 'done' : '' ?>">
        <?= $task['task']; ?>
    </td>

    <!-- Date Time -->
    <td><?= $task['date']; ?></td>

    <!-- Action Buttons -->
    <td>
        <!-- Toggle Done/Undone -->
        <a class="toggle" href="?toggle=<?= $index ?>">
            <?= $task['done'] ? 'Undo' : 'Done' ?>
        </a>

        |
        
      

        |
        
        <!-- Delete -->
        <a class="delete" 
           href="?delete=<?= $index ?>" 
           onclick="return confirm('Delete this task?')">
           Delete
        </a>
    </td>
</tr>
<?php endforeach; ?>



</table>

</body>
</html>
