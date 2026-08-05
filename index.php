<?php
include("cabecalho.php");
date_default_timezone_set("America/Sao_Paulo");
$date = date('d/m/Y', time());
?>
<div class="container text-center my-4">
    <h1 class="alert-primary p-3 rounded">Lifeboard Dashboard (Angular & .NET 9)</h1>
    <p class="lead">Modular aggregation interface for personal services and trackers.</p>
    <h3>Today's Date: <?= $date ?></h3>
    <h3 id="horas" class="mt-2"></h3>

    <div class="row mt-5">
        <div class="col-md-3 mb-3">
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Finances 🤑</h5>
                    <p class="card-text">Angular Standalone frontend for financial tracking.</p>
                    <a href="Finances/finances-app/dist/finances-app/browser/index.html" class="btn btn-primary">Open Finances (Angular)</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Storeroom 📦</h5>
                    <p class="card-text">Angular Standalone inventory & shopping tracker.</p>
                    <a href="storeroom/storeroom-app/dist/storeroom-app/browser/index.html" class="btn btn-primary">Open Storeroom (Angular)</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Housesheet 🏠</h5>
                    <p class="card-text">Angular Standalone activity & chore logger.</p>
                    <a href="housesheet/housesheet-app/dist/housesheet-app/browser/index.html" class="btn btn-primary">Open Housesheet (Angular)</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Glorified Todo 📋</h5>
                    <p class="card-text">.NET 9 Web API backend (Organizations, Projects, Tasks).</p>
                    <a href="glorified-todo/gtodo-be-net/" class="btn btn-dark">Backend (.NET 9)</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("rodape.php");
?>