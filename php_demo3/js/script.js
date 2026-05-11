const checkboxes = document.querySelectorAll('input[type="checkbox"]');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const isChecked = checkbox.checked;
        const taskID = checkbox.dataset.taskId;

        if (isChecked) {
            document.getElementById('task' + taskID).style.textDecoration = 'line-through';
        } else {
            document.getElementById('task' + taskID).style.textDecoration = 'none';
        }
    });
});

const updateButtons = document.querySelectorAll('button.btn-item-update');

updateButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const currentTask = document.getElementById('task' + button.value).textContent;
        const newTask = prompt('Enter new task:', currentTask);
        if (newTask.trim() === '') {
            alert('Task cannot be empty');
            return;
        }
        const form = button.parentElement;
        const updateId = button.value;
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'task_id';
        idInput.value = updateId;
        form.prepend(idInput);
        const updateInput = document.getElementById('updated_task' + updateId);
        updateInput.value = newTask;
        form.submit();
    });
});
