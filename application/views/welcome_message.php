<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">

		{days}
			{day}
			<br>
				{booking}
					{instructor}
					{room}
					{bookingtype}
					{timeslot}
					{coursename}
					<br>
				{/booking}
		<br>
		{/days}
<hr>
		{periods}
			{timeslot}
			<br>
				{booking}
					{instructor}
					{room}
					{bookingtype}
					{dayofweek}
					{coursename}
					<br>
				{/booking}
			<br>
		{/periods}

<hr>
		{courses}
			{code}
			<br>
			{booking}
				{instructor}
				{room}
				{bookingtype}
				{timeslot}
				{dayofweek}
				<br>
			{/booking}
			<br>
		{/courses}



	</div>

</div>

</body>
</html>