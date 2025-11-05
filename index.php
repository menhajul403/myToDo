<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo List UI</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-900 to-purple-800 min-h-screen flex items-center justify-center p-4">

  <!-- ToDo Container -->
  <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl w-full max-w-md p-6">
    <h1 class="text-2xl font-bold text-white text-center mb-6">📝 My ToDo List</h1>

    <!-- Add Task -->
    <form id="addTaskForm" class="flex mb-4">
      <input type="text" id="taskInput" placeholder="নতুন টাস্ক লিখুন..."
             class="flex-1 px-4 py-2 rounded-l-lg border-none outline-none bg-white/20 text-white placeholder-white/70">
      <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 rounded-r-lg font-semibold">
        ➕ Add
      </button>
    </form>

    <!-- Task List -->
    <ul id="taskList" class="space-y-3">
      <!-- Example Task -->
      <li class="flex items-center justify-between bg-white/10 backdrop-blur-md px-4 py-2 rounded-lg shadow hover:scale-105 transition">
        <div class="flex items-center gap-3">
          <input type="checkbox" class="w-5 h-5 accent-indigo-500">
          <span class="text-white">Example Task</span>
        </div>
        <button class="text-red-500 hover:text-red-700 font-bold">❌</button>
      </li>
    </ul>

    <!-- Footer -->
    <div class="mt-6 text-white/70 text-sm text-center">
      <p>✅ Mark as done | ❌ Delete Task</p>
    </div>
  </div>

 


</body>
</html>
