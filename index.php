<?php
/**
 * Created by PhpStorm.
 * User: Jager
 * Date: 08.02.17
 * Time: 12:40
 */
error_reporting(-1);
require_once ("Books.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books catalog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" style="margin-top:5%;">
    <div class="row">
        <table class="table table-condensed">
            <caption>Books table</caption>
            <thead>
                <tr class="success">
                    <th>ISBN</th><th>Author</th><th>Title</th><th>Category</th><th>Price</th><th>Description</th><th>Delete</th><th>Edit</th>
                </tr>
            </thead>
            <tbody id="res">
                <?php require_once ("_ajax.php")?>
            </tbody>
        </table>
        <a class="btn btn-default pull-right" href="#myModal" data-toggle="modal" role="button">Add book</a>
    </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add book</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="isbn">ISBN</label>
                        <div class=" col-xs-9"><input type="text" class="form-control" id="isbn" placeholder="ISBN"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="author">Author</label>
                        <div class=" col-xs-9"><input type="text" class="form-control" id="author" placeholder="Author"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="title">Title</label>
                        <div class=" col-xs-9"><input type="text" class="form-control" id="title" placeholder="Title"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="catid">Category</label>
                        <div class=" col-xs-9"><input type="number" class="form-control" id="catid" placeholder="Category"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="price">Price</label>
                        <div class=" col-xs-9"><input type="number" class="form-control" id="price" placeholder="Price"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="desc">Description</label>
                        <div class=" col-xs-9"><input type="text" class="form-control pull-right" id="desc" placeholder="Description"></div>
                    </div>
                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit_add" type="button" class="btn btn-primary">Save</button>
                    </div><br />
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<div id="myModalDelete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete book</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <form class="form-horizontal">
                    <div>
                        <p>Are you sure you want to remove this book?</p>
                    </div>

                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit_del" type="button" class="btn btn-primary">Delete</button>
                    </div><br />
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
    <?php
    /*
    $book = Books::getBook(1);
    while($row = $book->fetch_assoc() ){
        echo "isbn = " . $row['isbn'];
        echo "author = " . $row['author'];
        echo "title = " . $row['title'];
        echo "catid = " . $row['catid'];
        echo "price = " . $row['price'];
        echo "description = " . $row['description'];
    }



    $addbook = Books::addBook('3','sadf','asdf',3,45.00,'345');
    */
    ?>
</body>
</html>
<script>
    var isbn = false;
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
    $('a.submit_del').on('click',function() {
        isbn = $(this).attr('data-isbn');
        console.log(isbn);
    });
    console.log(isbn);
    $('#submit_del').on('click',function() {
        $.ajax({
            url: '/_ajax.php',
            type: "POST",
            dataType: "html",
            data:{post_id:'del',isbn:isbn},
            success: function(data) {
                $('#res').html(data);
                $('#myModalDelete').modal('hide');
            }
        });
    });
</script>




