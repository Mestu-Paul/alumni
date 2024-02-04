<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <?php include '../../common/headRef.php'; ?>
  <style>
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div>
  <div class="py-2 pb-5">
      <div class="card mx-auto mt-5 py-3" style="width:80%; box-shadow:0px 0px 10px 2px #919191;">
        <h5 class="card-title text-center  headLine">Add Your Success Story</h5>
        <form action="../backend/addStory.php" enctype="multipart/form-data" method="post" class="mx-auto"
          style="width: 90%;" id="storyFrom">
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name :</label>
            <input type="text" class="col form-control" name="fullName" id="fullName" aria-describedby="fullName">
          </div>
          <div class="mb-3">
            <label for="job" class="form-label">Your Occupation Title :</label>
            <input type="text" class="col form-control" name="job" id="job" aria-describedby="fullName">
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Your photo :</label>
            <input type="file" class="col form-control" name="photo" id="photo"
              aria-describedby="photo">
          </div>
          <input type="hidden" id="counter" name="counter" value="1"/>
          <div id="info">
              <div class="mb-3">
                <label for="heading" class="form-label">Heading 1</label>
                <input type="text" class="col form-control" name="heading1">
                <label for="description" class="form-label">Description 1</label>
                <textarea type="text" class="col form-control" name="description1"> </textarea>
              </div>
          </div>
          <div class="text-end">
              <button type="button" class="btn btn-warning" onclick="addMore()">Add More Info</button>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info">Add Story</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>
<script>
    function addMore() {
  // Increment the counter
  var counterElement = document.getElementById('counter');
  var counterValue = parseInt(counterElement.value) + 1;
  if(counterValue>5){
    alert("You can not add more");
    return;
  }
  counterElement.value = counterValue;


  // Create a new div element
  var newElement = document.createElement('div');
  newElement.className = 'mb-3';

  // Create and append the label for "Heading"
  var headingLabel = document.createElement('label');
  headingLabel.className = 'form-label';
  headingLabel.setAttribute('for', 'heading');
  headingLabel.textContent = 'Heading '+counterValue;
  newElement.appendChild(headingLabel);

  // Create and append the input for "Heading"
  var headingInput = document.createElement('input');
  headingInput.type = 'text';
  headingInput.className = 'col form-control';
  headingInput.name = 'heading' + counterValue;
  newElement.appendChild(headingInput);

  // Create and append the label for "Description"
  var descriptionLabel = document.createElement('label');
  descriptionLabel.className = 'form-label';
  descriptionLabel.setAttribute('for', 'description');
  descriptionLabel.textContent = 'Description '+counterValue;
  newElement.appendChild(descriptionLabel);

  // Create and append the textarea for "Description"
  var descriptionTextarea = document.createElement('textarea');
  descriptionTextarea.type = 'text';
  descriptionTextarea.className = 'col form-control';
  descriptionTextarea.name = 'description' + counterValue;
  newElement.appendChild(descriptionTextarea);

  var dynamicContentElement = document.getElementById('info');
  dynamicContentElement.appendChild(newElement);
}

</script>

</html>

