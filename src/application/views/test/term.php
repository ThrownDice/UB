<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <style>
        tr{
            border : 1px solid gray;
        }
        th, td{
            border : 1px solid black;
        }
    </style>

</head>
<body>
This is Term page <br>
<table>
    <tr>
        <th> ID </th>
        <th> WORD </th>
        <th> DEF </th>
        <th> DATE </th>
        <th> LIKE </th>
        <th> DISLIKE </th>
    </tr>
<?php
    $data = Term::$data;
    foreach($data as $row){
        echo "<tr>";
        echo "<td>", $row["id"], "</td>";
        echo "<td>", $row["word"], "</td>";
        echo "<td>", $row["def"], "</td>";
        echo "<td>", $row["date"], "</td>";
        echo "<td>", $row["like"], "</td>";
        echo "<td>", $row["dislike"], "</td>";
        echo "</td>";
    }
?>
</table>
</body>
</html>