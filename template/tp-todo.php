
<div id="PG-Todo">
	<h1>Todo</h1>

	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
	  </div>
	  <input type="text" class="form-control" aria-label="Title" aria-describedby="inputGroup-sizing-default">
	</div>
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="input-group-text">Define Task</span>
	  </div>
	  <textarea class="form-control" aria-label="With textarea"></textarea>
	</div>
	<div class="input-group mt-3 mb-3">
		<button type="button" class="btn btn-primary">Add to List</button>
	</div>


	<div class="row">
		<?php for($x=1 ; $x < 5; ++$x) :?>
		<div class="col-md-3">

			<div class="card text-white bg-secondary mb-3">
			  <div class="card-header">Not Started</div>
			  <div class="card-body">
			    <h5 class="card-title">Task <?php echo $x * rand(1,100); ?></h5>
			    <p class="card-text">Short description</p>
			  </div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-white bg-info mb-3">
			  <div class="card-header">In Progress</div>
			  <div class="card-body">
			    <h5 class="card-title">Task <?php echo $x * rand(1,100); ?></h5>
			    <p class="card-text">Short description</p>
			  </div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-white bg-success mb-3">
			  <div class="card-header">Completed</div>
			  <div class="card-body">
			    <h5 class="card-title">Task <?php echo $x * rand(1,100); ?></h5>
			    <p class="card-text">Short description</p>
			  </div>
			</div>
		</div>
		<?php endfor;?>

	</div>
</div>