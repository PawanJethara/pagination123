<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <table border="1 px solid black">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Sample data for demonstration purposes
        $users = array(
            array("id" => 1, "name" => "John", "email" => "john@example.com"),
            array("id" => 2, "name" => "Jane", "email" => "jane@example.com"),
            array("id" => 3, "name" => "Bob", "email" => "bob@example.com"),
        );
        // Loop through the array and output each user's data in a table row
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user["id"] . "</td>";
            echo "<td>" . $user["name"] . "</td>";
            echo "<td>" . $user["email"] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

        
        <script src="" async defer></script>
    </body>
</html>