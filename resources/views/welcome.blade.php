<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <title>Laravel</title>
        <style>
            .toastcustom {
                position: absolute;
                bottom: 0;
                display: block;
                text-align: center;
                width: 100%;
                background: coral;
                padding: 10px 0 10px;
            }
            p {
                padding: 0;
                margin: 0;
                font-size: 40px;
            }
            .formcustom {
                background: pink;
                margin: 50px auto;
                width: 800px;
                padding: 50px;
            }
            .form-label {
                font-weight: bold;
            }
        </style>

    </head>
    <body>
    <form action="/import" method="post" enctype="multipart/form-data">
        @csrf
        <div class="formcustom">
            <div class="mb-3 row">
                <div class="col-4 align-self-center">
                <label for="file_input" class="form-label">Sem vlozte xlsx subor</label>
                </div>
                <div class="col-8">
                <input class="form-control" type="file" id="file_input" name="file_input">
                </div>
            </div>
            <div class="mt-2 text-center">
                <input type="submit" class="btn btn-success">
            </div>
        </div>

        @if ($errors->has('file_input'))
            <div class="toastcustom">
                <p>
                    Vlozte subor!
                </p>
            </div>
        @endif
    </form>
    </body>
</html>
