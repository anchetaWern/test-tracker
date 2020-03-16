<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>async</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<h1>async</h1>

	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>IMEI</th>
				<th>Name</th>
				<th>Device ID</th>
				<th>Another ID</th>
				<th>Latitude</th>
				<th>Location</th>
				<th>Longitude</th>
			</tr>
		</thead>
		<tbody id="data">
			
		</tbody>
	</table>

	<script>
		fetch('http://63.34.253.117:8888/exam.json').then((res) => {
		  return res.json();
		}).then((data) => {

			const table = data.flatMap((row) => {
			   const ID = row.ID;
			   const IMEI = row.IMEI;
			   const Name = row.Name;
			   
			   return row.reports.map((rep) => {
			     return {
			       id: ID,
			       imei: IMEI,
			       name: Name,
			       device_id: rep.Device_ID,
			       another_id: rep.ID,
			       location: rep.Location,
			       latitude: rep.Latitude,
			       longitude: rep.Longitude      
			     }
			   });
			});

			table.forEach((row) => {

				$('#data').append(`<tr><td>${row.id}</td><td>${row.imei}</td><td>${row.name}</td><td>${row.device_id}</td><td>${row.another_id}</td><td>${row.location}</td><td>${row.latitude}</td><td>${row.longitude}</td></tr>`);

			});

		});
	</script>
</body>
</html>