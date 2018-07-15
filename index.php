<!doctype html>
<html lang="ro">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<title>Glosar</title>
</head>
<body>
<div class="container">
    <h1>Glosar</h1>
    <div class="row mb-2">
        <span class="badge badge-secondary ml-2">termeni înscriși: <span id='total'>x</span></span>
        <span class="badge badge-success ml-1"><span id='stabili'>a%</span> stabili</span>
        <span class="badge badge-danger ml-1"><span id='dezbatere'>b%</span> în dezbatere</span>
        <span class="badge badge-warning ml-1"><span id='nesortati'>c%</span> nesortați</span>
    </div>
    <div class="row">
        <div class="input-group mb-3">
            <input type="text" class="form-control termen" placeholder="introduceți termenul sau expresia" id="termen">
            <div class="input-group-append">
                <button id="cauta" class="btn btn-primary">Caută</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row col-lg-10">
            <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-cautare" data-toggle="tab" href="#search" role="tab" aria-controls="search" aria-selected="true">Căutare <span class="badge badge-secondary" id="cautati">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-stabili" data-toggle="tab" href="#stable" role="tab" aria-controls="stable" aria-selected="false">Stabili <span class="badge badge-success" id='badge-stable'>0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-dezbatere" data-toggle="tab" href="#debate" role="tab" aria-controls="debate" aria-selected="false">În dezbatere <span class="badge badge-danger" id='badge-debate'>0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-nesortati" data-toggle="tab" href="#unsorted" role="tab" aria-controls="unsorted" aria-selected="false">Nesortați <span class="badge badge-warning" id='badge-unsorted'>0</span></a>
                </li>
            </ul>
        </div>
        <div class="row col-lg-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="perPagina" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Termeni per pagină <span class="badge badge-light">10</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="perPagina" id="termeniPerPagina">
                <a class="dropdown-item" href="#">10</a>
                <a class="dropdown-item" href="#">20</a>
                <a class="dropdown-item" href="#">50</a>
              </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover border-top-0">
            <thead>
                <tr>
                    <th scope="col">Termen</th>
                    <th scope="col">Traducere</th>
                    <th scope="col">Dezbatere</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr>
                    <th scope="row" colspan="3" id="rezultate"></th>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="/glosar/glosar-js.php"></script>
</body>
</html>
