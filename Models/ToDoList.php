<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .task-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .task-item span {
            margin-left: 8px;
        }
    </style>
</head>

<body>

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-16">
        <div class="px-4 py-2">
            <h1 class="text-gray-800 font-bold text-2xl uppercase">Notas</h1>
        </div>
        <form class="w-full max-w-sm mx-auto px-4 py-2">
            <div class="flex items-center border-b-2 border-teal-500 py-2">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Agregar nota">
                <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                    Add
                </button>
            </div>
        </form>
        <ul class="divide-y divide-gray-200 px-4">
        </ul>
    </div>
    <script>
        const addButton = document.querySelector('button');
        const inputField = document.querySelector('input');
        const todoList = document.querySelector('ul');

        addButton.addEventListener('click', function() {
            const task = inputField.value;

            const newTask = document.createElement('li');
            const checkbox = document.createElement('input');
            checkbox.type = "checkbox";
            newTask.appendChild(checkbox);
            const taskText = document.createElement('span');
            taskText.textContent = task;
            newTask.appendChild(taskText);

            newTask.classList.add('task-item');

            todoList.appendChild(newTask);

            inputField.value = '';

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    taskText.style.textDecoration = 'line-through';
                } else {
                    taskText.style.textDecoration = 'none';
                }
            });
        });
    </script>

</body>

</html>