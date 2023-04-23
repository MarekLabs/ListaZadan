<?php
session_start();

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $_SESSION['tasks'][] = $task;
}

if (isset($_GET['usun'])) {
    $id = $_GET['usun'];
    unset($_SESSION['tasks'][$id]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista zadań</title>
</head>
<body>
	<h1>Lisat zadań</h1>
	<form method="POST">
		<input type="text" name="task" placeholder="Lista zadań">
		<button type="submit">Dodaj</button>
	</form>

	<ul>
		<?php if (isset($_SESSION['tasks'])): ?>
			<?php foreach ($_SESSION['tasks'] as $id => $task): ?>
				<li>
					<?php echo $task; ?>
					<a href="?usun=<?php echo $id; ?>">Usuń</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</body>
</html>