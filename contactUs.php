<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>


	<?php
	$currentPage = strtolower($_SERVER['PHP_SELF']);
	$studio = (isset($_GET['studio'])) ? $_GET['studio'] : "";
	// Need to add the following
	$queryString = strtolower($_SERVER['QUERY_STRING']);
	$status = (isset($_GET['status'])) ? $_GET['status'] : "";
	$currentPageParts = explode('/' , $currentPage);
/*
	echo '<br>';
	echo '$currentPage === ' . $currentPage;
	echo '<br>';
	echo '$currentPageParts === ' . var_dump($currentPageParts);
	echo '<br>';
	echo 'SCRIPT_NAME === ' . $_SERVER['_FILE_'];
	echo '<br>';
	echo 'last part of page URI path ' . $currentPageParts[count($currentPageParts) - 1];
	echo '<br>';
	echo '$status === ' . $status;
	echo '<br>';
	echo '$studio === ' . $studio;

	echo '<div class="well"><pre>';
	var_export($_SERVER);
	echo '</pre></div>';

	echo var_dump(end($currentPageParts));
	echo '<br>';
	echo var_dump(trim(end($currentPageParts)));
	echo '<br>';
	echo var_dump('startrek.php');

	echo '<hr><pre>';
	var_dump('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
	echo '</pre><hr>';
*/

	$link = "";

	switch(end($currentPageParts)) {
	// Using strtolower on each value to integrate seamlessly with established page logic for $currentPage
		case strtolower('samweb.nordstrom.net.php'):
			switch($status) {
				case 'assign':
					$link = "";//some value
					break;
				case 'pendingipt':
					break;
				case 'pendingad':
					break;
				default:
					break;
			}
			echo strtolower('Your mom lives here: StarTrek.php');
			break;
		default:
			break;
	}

// $link = 'captainAmerica.php';
?>

<!-- echo your link in the <a> tag -->
<li>
	<a id="help" href="<?php echo $link; ?>">
		<i class="fa fa-question"></i>
		<span class="title">Help</span>
	</a>
</li>
<script>
	var pathArray = window.location.pathname.split( '/' );
	var currentPage = pathArray[pathArray.length-1];

	switch (currentPage) {
		case 'dashboard.php':
			var hash = window.location.hash,
			a = document.getElementById('help'), // document.getElementById('help');
			link = "mailto:blahblahblabh@blahblah.com"; //set the link to a default value
			switch (hash) {
				case '#tabDashboard':
					link = "different help link";
					break;
				default:
					break;
			}
			break;
		default:
			break;
		}

	a.href = link;
</script>

<script>
	var pathArray = window.location.pathname.split( '/' );
	var currentPage = pathArray[pathArray.length-1];

	console.log(window.location.pathname);
	console.log(window.location.search);
	console.log(currentPage);
</script>

<hr>

<?php
	$starships = array(
		'USS Porkchop Express',
		'USS Estacada',
		'USS Seattle'
		);
?>
	<div class="well">
		<h3>PHP generated | Option 1</h3>
		<ul>
			<?php
			foreach($starships as $i => $name) {
				echo '<li>' . $name . '</li>';
			}
			?>
		</ul>
	</div>

	<div class="well">
		<h3>PHP generated | Option 2</h3>
		<ul>
			<?php foreach($starships as $i => $name) : ?>
			<li><?php echo $name; ?></li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="well">
	<h3>Manually generated</h3>
	<ul>
		<li>'USS Porkchop Express'</li>
		<li>'array explode ( string $delimiter , string $string [, int $limit ] )USS Estacada'</li>
		<li>'USS Seattle'</li>
	</ul>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>