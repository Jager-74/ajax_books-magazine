<?php
/**
 * Created by PhpStorm.
 * User: Jager
 * Date: 08.02.17
 * Time: 12:40
 */
error_reporting(-1);
require_once ("Books.php");
require_once ("_ajax.php");
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
<?php

?>
<body>
<div class="container" style="margin-top:5%;">
    <div class="row">
        <table class="table table-condensed">
            <caption>ISBN - unique, type=string. Category&Price - number, type=float. Other - string.</caption>
            <thead>
                <tr class="success">
                    <th>ISBN</th><th>Author</th><th>Title</th><th>Category</th><th>Price</th><th>Description</th><th>Delete</th><th>Edit</th>
                </tr>
            </thead>
            <tbody id="res">
                <?php table();?>
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
<div id="myModalEdit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit book</h4>
            </div>
            <div class="modal-body">
                <script>console.log()</script>
                <form class="form-horizontal save">
                    <div class="form-group">
                        <label class="col-xs-2 control-label" for="isbn">ISBN</label>
                        <div class=" col-xs-9"><input type="text" class="form-control" id="isbn" placeholder="ISBN" disabled="disabled"></div>
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
                        <div class=" col-xs-9"><input type="number" class="form-control" id="catid" placeholder="Ctegiry"></div>
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
                        <button id="submit_edit" type="button" class="btn btn-primary">Save</button>
                    </div><br />
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function(){
        var del_book;
        var arr_book = false;

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

        $('body').delegate('.submit_del','click',function() {
            del_book = $(this).attr('data-isbn');
            console.log(del_book);
        });

        $('#submit_del').click(function() {
            console.log(del_book);
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

        $('body').delegate('.submit_edit','click',function() {
            var edit_book = $(this).attr('data-isbn');
            $.ajax({
                url: '/_ajax.php',
                type: "POST",
                dataType: "json",
                data:{post_id:'edit',isbn:edit_book},
                success: function(data) {
                    //$('.save').reset();
                    arr_book = data;
                    //var arr = JSON.parse(data);
                    console.log(arr_book);
                    $('#myModalEdit #isbn').attr('value',arr_book['isbn']);
                    $('#myModalEdit #author').attr('value',arr_book['author']);
                    $('#myModalEdit #title').attr('value',arr_book['title']);
                    $('#myModalEdit #catid').attr('value',arr_book['catid']);
                    $('#myModalEdit #price').attr('value',arr_book['price']);
                    $('#myModalEdit #desc').attr('value',arr_book['description']);

                    //$('#res').html(data);
                    //$('#myModalEdit').modal('hide');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.statusText);
                    alert(xhr.responseText);
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });

        $('#submit_edit').click(function() {
            var isbn = $('#myModalEdit #isbn').attr('value');
            var author = $('#myModalEdit #author').val();
            var title = $('#myModalEdit #title').val();
            var catid = $('#myModalEdit #catid').val();
            var price = $('#myModalEdit #price').val();
            var desc = $('#myModalEdit #desc').val();
            $.ajax({
                url: '/_ajax.php',
                type: "POST",
                data:{post_id:'save',isbn:isbn,author:author,title:title,catid:catid,price:price,desc:desc},
                success: function(data) {
                    $('.save')[0].reset();
                    $('#res').html(data);

                    $('#myModalEdit').modal('hide');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.statusText);
                    alert(xhr.responseText);
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });
</script>





