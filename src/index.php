<!DOCTYPE html>
<html>
<head>
   <title>jQuery UI Sortable - Example</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   <link rel="stylesheet" href="style.css">
   <script>
      $(function() {
         $( "#todo, #doing, #done" ).sortable({
            connectWith: ".connectedSortable",
            stop: function(event, ui) {
               var id = ui.item.attr("id");
               var state = ui.item.parent().attr("id");
               $.ajax({
                  type: "POST",
                  url: "/api/update_tasks.php",
                  data: { id: id, state: state }
               });
            }
         });
      });
   </script>
</head>
<?php
require("includes/conn_mysql.php");
require("includes/tasks_functions.php");

$connection = dbConnect();
$allTodos = getAllTodos($connection);
$allDoing = getAllDoing($connection);
$allDone = getAllDone($connection);
dbDisconnect($connection);
?>
<body>
   <section>
      <div>
         <h2>Todo-list</h2>
         <ul id="todo" class="connectedSortable">
            <?php
            foreach ($allTodos as $item) {
               print('<li ');
               print('id="');
               print($item['id'] . '">');
               print($item['name']);
               print('</li>');
            }
            ?>
         </ul>
      </div>
      <div>
         <h2>Doing-list</h2>
         <ul id="doing" class="connectedSortable">
            <?php
            foreach ($allDoing as $item) {
               print('<li ');
               print('id="');
               print($item['id'] . '">');
               print($item['name']);
               print('</li>');
            }
            ?>
         </ul>
      </div>
      <div>
         <h2>Done-list</h2>
         <ul id="done" class="connectedSortable">
            <?php
            foreach ($allDone as $item) {
               print('<li ');
               print('id="');
               print($item['id'] . '">');
               print($item['name']);
               print('</li>');
            }
            ?>
         </ul>
      </div>
   </section>
</body>
</html>