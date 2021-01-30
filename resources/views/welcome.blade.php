<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>



    <title>Excel to Database</title>
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
            background: lightblue;
            margin: 50px auto;
            width: 800px;
            padding: 50px;
            border: solid black 2px;
        }

        .form-label {
            font-weight: bold;
        }

        #tutorial {
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            opacity: 0.5;
        }
    </style>

</head>
<body>
<div id="app">
    <div class="text-center">
        <h1><strong>Vitajte pán Pittner</strong></h1>
        <h3>Momentálny čas</h3>
        <div id="clock"></div>
        <button class="mt-2 btn btn-warning" onclick="showTutorial(true)">Tutorial</button>
    </div>
    <div id="tutorial" style="display: none; position: absolute; top: 0">
        <div style="position: absolute; top: 30%; background: white; left: 48%; opacity: 1">
            modalik
        </div>
    </div>
    <form action="{{url('/import')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="formcustom">
            <div class="mb-3 row">
                <div class="col-4 align-self-center">
                    <label for="file_input" class="form-label">Sem vložte súbor .xlsx/.xls</label>
                </div>
                <div class="col-8">
                    <input class="form-control" type="file" id="file_input" name="file_input" accept=".xlsx,.xls">
                </div>
            </div>
            <div class="mt-2 text-center">
                <input type="submit" class="btn btn-success" id="button">
            </div>
        </div>
    </form>a
</div>
<div class="text-center">
    <h2>Vypracovali: Strelecký, Galadik, Dzivý</h2>
</div>
</body>
<script type="text/javascript" src={{asset('js/app.js')}}></script>
<script>
    // najdeme tlacidlo, ktorym odosielame formular a pridame mu "pocuvadlo" na click
    // a ako prve zabranime eventu pomocou preventDefault aby vykonal to, ze odosle klasicky
    // formular html sposobom
    var tlacidlo = document.getElementById('button')
    tlacidlo.addEventListener('click', function (e) {
        e.preventDefault();
        var formData = new FormData();
        var imagefile = document.getElementById('file_input');
        formData.append('image', imagefile.files[0]);
        axios.post(window.location + 'import', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((r) => {
            // ak preslo, tak vratime message, ktora nam pride z response v ZiaciController.php
            alert(r.data.message)
        }).catch((e) => {
            // ak nepreslo - nastane ak vlozime subor zleho typu, tak sa vypise sprava z Exception
            alert(e.response.data.message)
        })
    })



    function showTutorial(boolean) {
        let tutorial = document.getElementById('tutorial');
        if (!boolean) {
            tutorial.style.display = 'none';
            return;
        }
        tutorial.style.display = 'block'
    }
</script>
</html>
