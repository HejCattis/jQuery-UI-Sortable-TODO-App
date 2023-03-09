# jQuery UI Sortable TODO App
This is a simple TODO application built using jQuery UI Sortable. The app allows you to create tasks and sort them in three columns - Todo, Doing, and Done. Tasks can be moved between these columns using drag and drop feature. The application uses AJAX to post the task ID and state to "/api/update_tasks.php" when a task is moved. The tasks are loaded from a MySQL database using PHP and displayed on the page in their respective columns.

## Usage
To use the application, simply drag and drop the tasks between columns to change their status. The application automatically saves the new status of the task in the database.

## Credits
This application was made by Cattis Gustafsson. The docker files and some parts of the code were provided by Sebastian Lindgren.