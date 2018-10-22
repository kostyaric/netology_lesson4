<?php
	$jstring = file_get_contents(__DIR__ . "/phone_data.json");
	$jdata = json_decode($jstring, true);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Телефонная книга</title>
	<meta charset="utf-8">
	<style type="text/css">
		td {
			border: 2px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>Имя</td>
			<td>Фамилия</td>
			<td>Адресс</td>
			<td>Телефоны</td>
			<td>e-mail</td>
		</tr>

		<?php
		foreach ($jdata as $personInfo) {
			
			$name = $personInfo['firstName'];
			$family = $personInfo['lastName'];
			$arrAdress = $personInfo['address'];
			$arrPhones = $personInfo['phoneNumbers'];
			$email = $personInfo['email'];

			$address = 'г. ' . $arrAdress['city'] . ', ул. ' . $arrAdress['street'] . ', д.' . $arrAdress['building'];

			
			$phonestring = '';
			$number = count($arrPhones);
			foreach ($arrPhones as $i => $phone) {

				$phonestring = $phonestring . $phone;

				if ($i < $number) {
					$phonestring = $phonestring . ', <br> ';
				}
			}

			$rowtable =
			<<<ROW
			<tr>
				<td>$name</td>
				<td>$family</td>
				<td>$address</td>
				<td>$phonestring</td>
				<td>$email</td>
			</tr>
ROW;
			echo $rowtable;
		}

		?>
	</table>
</body>
</html>