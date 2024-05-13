<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel= "stylesheet" href="/css/main.css">
</head>
<body>
    <h1>Task List</h1>
    <div>
        @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Completed</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->completed }}</td>
                <td>
                    <a href="{{ route('task.edit', ['task' => $task]) }}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('task.destroy', ['task' => $task]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('task.create') }}">
                <button>Create New Task</button>
                
            </a>
           
            </a>
            <Br>
        <br></Br>
        </div>

        <a href="{{ route('dashboard') }}">
                <button>Go Back to Dashboard</button>
    </div>
</body>
</html>
