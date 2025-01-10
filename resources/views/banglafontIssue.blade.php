<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bangla Font Issue</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style="margin-top: 50px;">
            <h2>Be sure before make any action</h2>
            <form action="">
                <div class="form-group">
                    <label for="email">Product Old website link:</label>
                    <input type="text" class="form-control" id="email" placeholder="nagadhat.com/..." name="old_product" value="{{(isset($_GET["old_product"]))?$_GET["old_product"]:""}}">
                </div>
                <div class="form-group">
                    <label for="pwd">Product new website link:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="nagadhat.com.bd/..." name="new_product" value="{{(isset($_GET["new_product"]))?$_GET["new_product"]:""}}">
                </div>
                @if(!isset($_GET["old_product"]) && !isset($_GET["new_product"]))
                <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
            <br>
            <form action="/bangla-font-resolve" method="post">
                @csrf
                @if(isset($_GET["old_product"]) && isset($_GET["new_product"]))
                <input type="hidden" name="old" value="{{$_GET["old_product"]}}">
                <input type="hidden" name="new" value="{{$_GET["new_product"]}}">
                <button type="submit" class="btn btn-danger">Change Details</button>
                @endif
            </form>
        </div>
        <div class="container-fluid" style="margin-top: 50px;">
            <div class="row">
                @if(isset($_GET["old_product"]))
                <div class="col-md-6 col-lg-6">
                    <iframe src="{{$_GET["old_product"]}}" title="description" style="height: 1000px; width: 100%"></iframe>  
                </div>
                @endif
                @if(isset($_GET["new_product"]))
                <div class="col-md-6">
                    <iframe src="{{$_GET["new_product"]}}" title="description"  style="height: 1000px; width: 100%"></iframe>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
