<html>
<head>
    <meta charset="utf-8">
    <title>Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/projeto.css" type="text/css">
    
</head>
<body>

	<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="">Projects</a>
		<button class="navbar-toggler" type="button"></button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">

			<?php
				$path = "../";
				$files = scandir($path);
				$search_count = count($files);				
				$i=3;//inicia em 2 para ignorar "./" e "../". #pode ser em "n" para deixar de mostrar p ->
					// -> (p)astas indesejadas, para isso se faria necessário estarem no "inicio da listagem"
				while($i<$search_count){
					if (is_dir($path.'/'.$files[$i])) {
			?>
				<li class="nav-item bg-dark">
					<a class="btn btn-dark" href="<?= $path.$files[$i] ?>/"><?= $files[$i] ?></a>
				</li>
			<?php
					}					
			 $i++;
			}
			?>

			<!--
			
				<li class="nav-item bg-dark">
					<a class="btn btn-dark" href="planilhacasa/">Planilha Casa</a>
				</li>
			
				<li class="nav-item bg-dark">
					<a class="btn btn-dark" href="dispensa/">Dispensa</a>
				</li>
			
				<li class="nav-item bg-dark">
					<a class="btn btn-dark" href="to-do/">To-Do List</a>
				</li>

			-->

			</ul>
		</div>
	</nav>

	<main class="container-fluid">

    <div class="">
        <div class="principal">