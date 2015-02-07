<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Επαναφορά Κωδικού Πρόσβασης</h2>

		<div>
			<p>Για να επαναφέρετε τον Κωδικό Πρόσβασης, παρακαλούμε ανοίξτε τον παρακάτω σύνδεσμο:</p>
			<p>{{ URL::to('password/reset', array($token)) }}</p>
			<p>Ο σύνδεσμος αυτός θα παραμείνει ενεργός για {{ Config::get('auth.reminder.expire', 60) }} λεπτά.</p>
		</div>
	</body>
</html>
