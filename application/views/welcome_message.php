<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Display All</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}
		.third {
			width: 33%;
			height: 100vh;
			float: left;
			text-align: center;
			padding-bottom: 5px;
		}
		a {
			background: lavender;
			border: 1px solid black;
			border-radius: 25%;
			padding: 20px;
			font-weight: bolder;
			text-decoration: none;
			color: blue;
			position: absolute;
			top: 5px;
			left: 5px;
		}

	</style>
</head>
<body>

<div id="container">
	<div id="body">

		<div class="third" style="background: rgba(209, 169, 124, 0.4)">
			<h1>Days</h1>
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
		</div>

		<div class="third" style="background: rgba(169, 209, 124, 0.4)">
			<h1>Periods</h1>
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
		</div>

		<div class="third" style="background: rgba(169, 124, 209, 0.4)">
			<h1>Courses</h1>

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
</div>
<a href="/">back</a>
</body>
</html>