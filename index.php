<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Calculator</title>
		<link rel="icon" type="x-icon" href="favicon.png" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/icon?family=Material+Icons"
		/>
	</head>
	<body>
		<div class="container">
			<div class="calculator">
				<h1>Calculator </h1> <span class="error"></span>
				<div class="calci-box">
					<input type="text" id="box" maxlength="5" />
					<div id="calci_btn">
						<button value="AC" style="--i: #6a6264">AC</button>
						<button value="DEL" style="--i: #6a6264">DEL</button>
						<button value="%" style="--i: #6a6264">%</button>
						<button value="/" style="--i: #fe9f09">/</button>
						<button value="7" style="--i: #837d7e">7</button>
						<button value="8" style="--i: #837d7e">8</button>
						<button value="9" style="--i: #837d7e">9</button>
						<button value="*" style="--i: #fe9f09">x</button>
						<button value="4" style="--i: #837d7e">4</button>
						<button value="5" style="--i: #837d7e">5</button>
						<button value="6" style="--i: #837d7e">6</button>
						<button value="-" style="--i: #fe9f09">-</button>
						<button value="1" style="--i: #837d7e">1</button>
						<button value="2" style="--i: #837d7e">2</button>
						<button value="3" style="--i: #837d7e">3</button>
						<button value="+" style="--i: #fe9f09">+</button>
						<button value="0" style="--i: #837d7e; grid-column: 1/3">
							0
						</button>
						<button value="." style="--i: #837d7e">.</button>
						<button value="=" style="--i: #fe9f09">=</button>
					</div>
				</div>
				<div class="calci-form">
					<h3>Calculation name</h3>
					<div>
						
						<input type="text" placeholder="Enter Name" id='title' name="title" />

						<button class="save">Save</button>
					</div>
				</div>
			</div>
			<div class="calculations">
				<h1>Your Calculations</h1>
				<table><thead><tr><td><input type='checkbox' id='master' /></td><td>name</td><td>calculation</td><td>result</td></tr></thead><tbody class="content"></tbody></table>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
