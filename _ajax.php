
<?php
require_once ("Books.php");
//var_dump($_REQUEST);
if($_POST['post_id'] == 'add'){
    try{
        Books::addBook($_POST['isbn'],$_POST['author'],$_POST['title'],$_POST['catid'],(float)$_POST['price'],$_POST['desc']);
        table();
    }catch(Exception $e){
        echo "Error: ". $e;
    }
}
if($_POST['post_id'] == 'del'){
    try{
        Books::delBook($_POST['isbn']);
        table();
    }catch(Exception $e){
        echo "Error: ". $e;
    }
}

if($_POST['post_id'] == 'edit'){
    try{
        $el = Books::getBook($_POST['isbn']);
        $elj = json_encode($el);
        echo $elj;
    }catch(Exception $e){
        echo "Error: ". $e;
    }
}

if($_POST['post_id'] == 'save'){
    try{
        //$el = Books::getBook($_POST['isbn']);
        //$elj = json_encode($el);
        echo $_POST['author'];
    }catch(Exception $e){
        echo "Error: ". $e;
    }
}

function table(){
    $books = Books::getAllBook();
    while($row = $books->fetch_assoc() ){
        echo "<tr>";
        echo "<td>" . $row['isbn'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['catid'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td><a class=\"btn btn-default submit_del\" data-isbn=\"".$row['isbn']."\" href=\"#myModalDelete\" data-toggle=\"modal\" role=\"button\">Delete book</a></td>";
        echo "<td><a class=\"btn btn-default submit_edit\" data-isbn=\"".$row['isbn']."\" href=\"#myModalEdit\" data-toggle=\"modal\" role=\"button\">Edit book</a></td>";
        echo "</tr>";
    }
}