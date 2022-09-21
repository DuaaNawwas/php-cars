<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Cars</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
</head>

<body>
	<h1 class="text-center pt-5">Add a car to rent out</h1>
	<form action="insert.php" method="post">
		<div class="container p-5 text-center w-75">
			<div class="mb-3">
				<label for="formFile" class="form-label">Car Image</label>
				<input class="form-control" name="image" type="url" id="formFile" required />
			</div>
			<div class="mb-3">
				<label for="car-model" class="form-label">Car Model</label>
				<input type="text" class="form-control" name="model" id="car-model" required />
			</div>
			<div class="mb-3">
				<label for="car-price" class="form-label">Car Price</label>
				<input type="number" class="form-control" name="price" id="car-price" required />
			</div>
			<div class="mb-3">
				<label for="car-color" class="form-label">Car Color</label>
				<input type="text" class="form-control" name="color" id="car-color" required />
			</div>

			<button type="submit" class="btn btn-warning w-75">Submit</button>
		</div>
	</form>

	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="update.php" method="post">
					<div class="container p-5 text-center w-75">
						<div class="mb-3">
							<label for="formFile2" class="form-label">Car Image</label>
							<input class="form-control" name="image2" type="url" id="formFile2" required />
						</div>
						<div class="mb-3">
							<label for="car-model2" class="form-label">Car Model</label>
							<input type="text" class="form-control" name="model2" id="car-model2" required />
						</div>
						<div class="mb-3">
							<label for="car-price2" class="form-label">Car Price</label>
							<input type="number" class="form-control" name="price2" id="car-price2" required />
						</div>
						<div class="mb-3">
							<label for="car-color2" class="form-label">Car Color</label>
							<input type="text" class="form-control" name="color2" id="car-color2" required />
						</div>

						<button type="submit" class="btn btn-warning w-75">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->

	<h1 class="text-center pt-5">Available Cars</h1>

	<div class="container p-5">
		<div class="row g-2">


			<?php
			$mysqli = new mysqli("localhost", "root", "root", "cars");

			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: " . $mysqli->connect_error;
				exit();
			}

			$sql = "SELECT * FROM carsinfo";
			$result = $mysqli->query($sql);

			// Fetch all
			$result->fetch_all(MYSQLI_ASSOC);

			// Free result set
			// $result->free_result();
			?>
			<?php
			foreach ($result as $car) {
			?>
				<div class="col-sm-4">
					<div class="card">
						<img src="<?php echo $car["image"]; ?>" class="card-img-top" style="height: 250px;  object-fit: cover;" alt="">
						<div class="card-body">
							<h5 class="card-title"><?php echo $car["model"]; ?></h5>
							<p class="card-text">Price: <?php echo $car["price"]; ?> JOD <br> Color: <?php echo $car["color"]; ?></p>
							<a href="delete.php?carid=<?php echo $car['carid']; ?>" class="btn btn-danger">Delete</a>
							<a href="" class="btn btn-dark" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $car['carid'] ?>">Update</a>


							<div class="modal fade" id="exampleModal<?php echo $car['carid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form action="update.php?carid=<?php echo $car['carid']; ?>" method="post">
											<div class="container p-5 text-center w-75">
												<div class="mb-3">
													<label for="formFile2" class="form-label">Car Image</label>
													<input value="<?php echo $car["image"] ?>" class="form-control" name="image2" type="url" id="formFile2" required />
												</div>
												<div class="mb-3">
													<label for="car-model2" class="form-label">Car Model</label>
													<input value="<?php echo $car["model"] ?>" type="text" class="form-control" name="model2" id="car-model2" required />
												</div>
												<div class="mb-3">
													<label for="car-price2" class="form-label">Car Price</label>
													<input value="<?php echo $car["price"] ?>" type="number" class="form-control" name="price2" id="car-price2" required />
												</div>
												<div class="mb-3">
													<label for="car-color2" class="form-label">Car Color</label>
													<input value="<?php echo $car["color"] ?>" type="text" class="form-control" name="color2" id="car-color2" required />
												</div>

												<button type="submit" class="btn btn-warning w-75">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}

			$mysqli->close();
			?>
		</div>
	</div>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</body>

</html>