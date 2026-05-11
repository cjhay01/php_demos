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
        // Prevent early form submission
        event.preventDefault();
        // Get current task and user input and client side validation
        const currentTask = document.getElementById('task' + button.value).textContent;
        const newTask = prompt('Enter new task:', currentTask);
        if (newTask.trim() === '') {
            alert('Task cannot be empty');
            return;
        }
        // Add hidden input to form to act as a field for the task ID selected
        const form = button.parentElement;
        const updateId = button.value;
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'task_id';
        idInput.value = updateId;
        // prepend it to add it to the top so that the ID comes first in the POST data, making it easier to handle in PHP
        form.prepend(idInput);
        // Update the hidden input for the task update with the new one then submit the form
        const updateInput = document.getElementById('updated_task' + updateId);
        updateInput.value = newTask;
        form.submit();
    });
});
