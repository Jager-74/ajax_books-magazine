
<?php
require_once ("Books.php");
//var_dump($_REQUEST);
if($_POST['post_id'] == 'add'){
    try{
        Books::addBook($_POST['isbn'],$_POST['author'],$_POST['title'],$_POST['catid'],(float)$_POST['price'],$_POST['desc']);
    }catch(Exception $e){
        echo "xxx". $e;
    }
}
if($_POST['post_id'] == 'del'){
    try{
        Books::delBook($_POST['isbn']);
    }catch(Exception $e){
        echo "xxx". $e;
    }
}

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

?>
<script>
    $(function(){
        var del_book;


        $('#submit_add').click(function() {
            var isbn = $('#isbn').val();
            var author = $('#author').val();
            var title = $('#title').val();
            var catid = $('#catid').val();
            var price = $('#price').val();
            var desc = $('#desc').val();
            $.ajax({
                url: '/_ajax.php',
                type: "POST",
                dataType: "html",
                data:{post_id:'add',isbn:isbn, author:author,title:title,catid:catid,price:price,desc:desc},
                success: function(data) {
                    $('#res').html(data);
                    $('#myModal').modal('hide');
                }
            });
        });

        $('.submit_del').click(function() {
            del_book = $(this).attr('data-isbn');
            //console.log(del_book);
        });

        $('.submit_edit').click(function() {
            del_book = $(this).attr('data-isbn');
            //console.log(del_book);
        });

        $('#submit_del').click(function() {
            $.ajax({
                url: '/_ajax.php',
                type: "POST",
                dataType: "html",
                data:{post_id:'del',isbn:del_book},
                success: function(data) {
                    $('#res').html(data);
                    del_book = false;
                    $('#myModalDelete').modal('hide');
                }
            });
        });
    });
</script>
