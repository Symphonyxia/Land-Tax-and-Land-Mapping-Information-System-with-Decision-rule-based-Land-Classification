<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

<style>
  #map {
    height: 600px;
    width: 72%;
    margin: 0;
    position: absolute;
    z-index: 1;
    border: 1px solid #ccc;
  }

  .map-container {
    position: relative;
    width: 100%;
    height: 600px;
    border: 1px solid #ccc;
    background-color: transparent;
    margin: 0 auto;
    overflow: hidden;
    z-index: 2;

  }

  #toggleCanvasButton {
    position: fixed;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    margin-left: 20px;
    top: 20px;
  }

  #toggleCanvasButton::after {
    content: '\2194';
    /* Unicode for left-right arrow */
  }

  .canvas-container {
    position: relative;
    top: 0;
    /* Initial position at the top */
    transition: top 0.5s;
    /* Add smooth transition for sliding effect */
  }

  #drawingCanvas {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
  }

  #drawingIcon {
    position: absolute;
    top: 100px;
    left: 250px;
    display: none;
    z-index: 2;
  }

  #toolbar {
    position: relative;
    z-index: 1;
    float: right;
    top: 10px;
  }

  .tool {
    margin-bottom: 5px;
  }

  button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
  }

  /* Add this to your existing CSS */
  .tool-button.active {
    background-color: green;
    /* Change this to the active color you prefer */
  }

  button:focus {
    outline: none;
  }


  #saveButton {
    position: absolute;
    bottom: 25px;
    left: 0px;
    z-index: 2;
  }

  .canvas-container {
    position: relative;
  }

  .line-cursor {
    cursor: crosshair;
  }

  .line-end {
    background-color: red;
    width: 6px;
    height: 6px;
    border-radius: 100%;
  }

  #textContainer {
    position: absolute;
    margin-left: 0px;
  }

  #textInput {
    width: 80px;
    height: 30px;
    font-size: 12px;
  }

  /* Add this style for the movable text */
  .movable-text {
    cursor: move;
  }

  #textCanvas {
    position: absolute;
    pointer-events: none;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
    width: 100%;
    height: 800px;
  }

  /* CSS for modal */
  .modal {
    display: none;
    position: absolute;
    z-index: 1;
    left: 25%;
    top: 0;
    width: 50%;
    height: 100%;
  }

  .modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f4f4f4;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 10px #888;
    z-index: 2;
    text-align: center;
  }

  .close {
    position: absolute;
    top: 5px;
    right: 5px;
    padding: 0;
    cursor: pointer;
  }

  .canvas-container {
    display: block;
  }

  #drawingCanvas,
  #textCanvas {
    display: block;
  }

  .hidden {
    display: none;
  }
</style>

<div class="container">
<div class="row justify-content-center my-3 print-hide">
  <iframe id="map" width="1000" height="800" frameborder="0"
    src="https://widgets.scribblemaps.com/sm/?d&dv&cv&mt&z&l&gc&af&sc&mc&dfe&lat=10.94482206&lng=122.6369751&vz=14&type=osm_cycle&ti&s&width=1000&height=800&id=ooptj7YAOW"
    style="border:0; max-width: 100%;" allowfullscreen allow="geolocation" loading="lazy"></iframe>
  <div class="map-container">
    <div class="canvas-container">
      <canvas id="drawingCanvas"></canvas>
      <canvas id="textCanvas"></canvas><!-- New text canvas -->
      <img id="drawingIcon" src="https://image.flaticon.com/icons/svg/25/25284.svg">
    </div>
    <div id="toolbar">
      <div class="tool">
        <button id="lineTool" onclick="activateTool('line')" class="tool-button">Line</button>
        <button id="pencilTool" onclick="activateTool('pencil')" class="tool-button">Pencil</button>
        <button id="eraserTool" onclick="activateTool('eraser')" class="tool-button">Eraser</button>
      </div>
      <div id="textContainer">
        <input type="text" id="textInput" placeholder="Enter text">
        <button onclick="addMovableText()">Add Text</button>
      </div>
    </div>

    <form action="draw_upload.php" method="POST">
      <div id="inputModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="toggleInputModalVisibility()">&times;</span>
          <select type="text" id="barangayNameInput" name="barangayName">
            <option value="Abangay">Abangay</option>
            <option value="Amamaros">Amamaros</option>
            <option value="Bagacay">Bagacay</option>
            <option value="Barasan">Barasan</option>
            <option value="Batuan">Batuan</option>
            <option value="Bongco">Bongco</option>
            <option value="Cahaguichican">Cahaguichican</option>
            <option value="Callan">Callan</option>
            <option value="Cansilayan">Cansilayan</option>
            <option value="Casalsagan">Casalsagan</option>
            <option value="Cato-ogan">Cato-ogan</option>
            <option value="Cau-ayan">Cau-ayan</option>
            <option value="Culob">Culob</option>
            <option value="Danao">Danao</option>
            <option value="Dapitan">Dapitan</option>
            <option value="Dawis">Dawis</option>
            <option value="Dongsol">Dongsol</option>
            <option value="Fernando Parcon Ward">Fernando Parcon Ward</option>
            <option value="Fundacion">Fundacion</option>
            <option value="Guibuangan">Guibuangan</option>
            <option value="Guinacas">Guinacas</option>
            <option value="Igang">Igang</option>
            <option value="Intaluan">Intaluan</option>
            <option value="Iwa Ilaud">Iwa Ilaud</option>
            <option value="Iwa Ilaya">Iwa Ilaya</option>
            <option value="Jamabalud">Jamabalud</option>
            <option value="Jebioc">Jebioc</option>
            <option value="Lay-ahan">Lay-ahan</option>
            <option value="Lopez Jaena Ward">Lopez Jaena Ward</option>
            <option value="Lumbo">Lumbo</option>
            <option value="Macatol">Macatol</option>
            <option value="Malusgod">Malusgod</option>
            <option value="Nabitasan">Nabitasan</option>
            <option value="Naga">Naga</option>
            <option value="Nanga">Nanga</option>
            <option value="Naslo">Naslo</option>
            <option value="Pajo">Pajo</option>
            <option value="Palanguia">Palanguia</option>
            <option value="Pitogo">Pitogo</option>
            <option value="Polot-an">Polot-an</option>
            <option value="Primitivo Ledesma Ward">Primitivo Ledesma Ward</option>
            <option value="Purog">Purog</option>
            <option value="Rumbang">Rumbang</option>
            <option value="San Jose Ward">San Jose Ward</option>
            <option value="Sinuagan">Sinuagan</option>
            <option value="Tuburan">Tuburan</option>
            <option value="Tumcon Ilaud">Tumcon Ilaud</option>
            <option value="Tumcon Ilaya">Tumcon Ilaya</option>
            <option value="Ubang">Ubang</option>
            <option value="Zarrague">Zarrague</option>
          </select>
          <input type="text" id="sectionNumberInput" placeholder="Enter section number">
          <button onclick="uploadImage()">Upload</button>
        </div>
      </div>
    </form>

    <button id="saveButton" onclick="toggleInputModalVisibility()">Save Image</button>
  </div>
</div>
</div>
</div>
<button id="toggleCanvasButton" onclick="toggleCanvasContainer()">Toggle Canvas</button>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>

  // Define a variable to track the drawing state
  var isDrawingVisible = true;

  function toggleCanvasContainer() {
    var drawingCanvas = document.getElementById('drawingCanvas');
    var textCanvas = document.getElementById('textCanvas');
    var mapContainer = document.querySelector('.map-container');
    var canvasContainer = document.querySelector('.canvas-container');
    var toolbar = document.getElementById('toolbar');
    var textContainer = document.getElementById('textContainer');

    // Toggle the drawing state
    isDrawingVisible = !isDrawingVisible;

    // Show or hide the drawing canvas and text canvas based on the drawing state
    drawingCanvas.style.display = isDrawingVisible ? 'block' : 'none';
    textCanvas.style.display = isDrawingVisible ? 'block' : 'none';

    // Toggle the visibility of the map container and canvas container
    mapContainer.classList.toggle('hidden');
    canvasContainer.classList.toggle('hidden');

    // Toggle the visibility of the toolbar and textContainer
    toolbar.classList.toggle('hidden');
    textContainer.classList.toggle('hidden');

    // Redisplay the drawing if it is visible
    if (isDrawingVisible) {
      redisplayDrawing();
    }
  }

  function redisplayDrawing() {
    // Add your logic here to redisplay the drawing
    // You may need to retrieve the drawing data and redraw it on the canvas
    console.log('Redisplaying the drawing...');
  }




  var map = L.map('map').setView([10.9400, 122.6400], 14);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  }).addTo(map);

  var canvas = L.canvas();
  canvas.addTo(map);

  var canvas = document.getElementById('drawingCanvas');
  var context = canvas.getContext('2d');
  var isDrawing = false;
  var lastX = 0;
  var lastY = 0;
  var currentTool = 'pencil';
  var shapeOption = 'line';
  var textObjects = [];

  canvas.width = map.getSize().x;
  canvas.height = map.getSize().y;

  canvas.addEventListener('mousedown', startDrawing);
  canvas.addEventListener('mousemove', draw);
  canvas.addEventListener('mouseup', stopDrawing);
  canvas.addEventListener('mouseleave', stopDrawing);

  canvas.addEventListener('touchstart', startDrawing);
  canvas.addEventListener('touchmove', draw);
  canvas.addEventListener('touchend', stopDrawing);


  function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
  }

  canvas.addEventListener('mouseup', stopDrawing);
  canvas.addEventListener('mouseleave', stopDrawing);
  canvas.addEventListener('touchend', stopDrawing);

  var brushSize = 2;
  var brushOpacity = 1;

  canvas.addEventListener('mousemove', draw);
  canvas.addEventListener('touchmove', draw);

  function draw(e) {
    if (!isDrawing) return;

    context.strokeStyle = '#000';
    context.lineJoin = 'round';
    context.lineCap = 'round';

    var lineWidth = Math.floor(canvas.width / 100);

    if (currentTool === 'pencil') {
      context.globalCompositeOperation = 'source-over';
      context.lineWidth = brushSize;
      context.strokeStyle = `rgba(0, 0, 0, ${brushOpacity})`;
    } else if (currentTool === 'eraser') {
      context.globalCompositeOperation = 'destination-out';
      context.lineWidth = brushSize;
      context.strokeStyle = `rgba(255, 255, 255, ${brushOpacity})`;
    }

    context.beginPath();
    context.moveTo(lastX, lastY);
    context.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
    context.stroke();
    [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
  }

  function stopDrawing() {
    isDrawing = false;
  }

  function clearToolClasses() {
    document.getElementById('pencilTool').classList.remove('active');
    document.getElementById('eraserTool').classList.remove('active');
    document.getElementById('shapesTool').classList.remove('active');
  }
  // Add this function to toggle the active state of the buttons
  function toggleButtonActiveState(buttonId) {
    var buttons = document.querySelectorAll('.tool-button');
    buttons.forEach(function (button) {
      button.classList.remove('active');
    });
    document.getElementById(buttonId).classList.add('active');
  }

  // Modify the activateTool function
  function activateTool(tool) {
    currentTool = tool;
    canvas.style.cursor = tool === 'line' ? 'crosshair' : 'default';
    toggleButtonActiveState(tool + 'Tool');
  }


  function activatePencil() {
    currentTool = 'pencil';
    canvas.style.cursor = 'default';
    document.getElementById('drawingIcon').style.display = 'none';
    document.getElementById('shapeOptions').style.display = 'none';
    clearToolClasses();
    document.getElementById('pencilTool').classList.add('active');
  }

  function activateEraser() {
    currentTool = 'eraser';
    canvas.style.cursor = 'default';
    document.getElementById('drawingIcon').style.display = 'none';
    document.getElementById('shapeOptions').style.display = 'none';
    clearToolClasses();
    document.getElementById('eraserTool').classList.add('active');
  }

  function activateLine() {
    currentTool = 'line';
    canvas.style.cursor = 'crosshair';
    document.getElementById('drawingIcon').style.display = 'none';
    clearToolClasses();
    document.getElementById('activateLine').classList.add('active');
    canvas.addEventListener('click', startDrawingLine);
  }

  var isDrawingLine = false;
  var lineStartX = 0;
  var lineStartY = 0;

  canvas.addEventListener('mousedown', startDrawingLine);

  function startDrawingLine(e) {
    if (currentTool === 'line') {
      isDrawingLine = true;
      lineStartX = e.offsetX;
      lineStartY = e.offsetY;
      canvas.classList.add('line-cursor');
      canvas.addEventListener('mousemove', drawLine);
      canvas.addEventListener('mouseup', finishDrawingLine);
    }
  }

  function drawLine(e) {
    if (isDrawingLine) {
      context.clearRect(0, 0, canvas.width, canvas.height);
      drawExistingLines();
      context.beginPath();
      context.moveTo(lineStartX, lineStartY);
      context.lineTo(e.offsetX, e.offsetY);
      context.stroke();
    }
  }

  function finishDrawingLine(e) {
    if (isDrawingLine) {
      context.lineTo(e.offsetX, e.offsetY);
      context.stroke();
      isDrawingLine = false;
      canvas.classList.remove('line-cursor');
      canvas.removeEventListener('mousemove', drawLine);
      canvas.removeEventListener('mouseup', finishDrawingLine);
    }
  }

  var lineSegments = [];

  function drawExistingLines() {
    context.strokeStyle = '#000';
    context.lineJoin = 'round';
    context.lineCap = 'round';
    context.lineWidth = brushSize;
    context.globalCompositeOperation = 'source-over';
    context.fillStyle = `rgba(0, 0, 0, ${brushOpacity})`;

    for (var i = 0; i < lineSegments.length; i++) {
      context.beginPath();
      context.moveTo(lineSegments[i].startX, lineSegments[i].startY);
      context.lineTo(lineSegments[i].endX, lineSegments[i].endY);
      context.stroke();

      context.beginPath();
      context.arc(lineSegments[i].endX, lineSegments[i].endY, 3, 0, Math.PI * 2);
      context.fill();
    }
  }

  var textElements = [];
  var isMovingText = false;
  var timer;

  var textCanvas = document.getElementById('drawingCanvas');
  var textContext = textCanvas.getContext('2d');

  function addMovableText() {
    var text = document.getElementById('textInput').value;
    if (text) {
      var centerX = textCanvas.width / 2;
      var centerY = textCanvas.height / 2;

      var textObject = {
        text: text,
        x: centerX,
        y: centerY,
        movable: true,
      };

      textElements.push(textObject);

      drawText();
      setTimeout(lockTextInPlace, 10000);
    }
  }

  function drawText() {
    textContext.clearRect(0, 0, textCanvas.width, textCanvas.height);

    textElements.forEach(function (textElement) {
      if (textElement) {
        textContext.font = '12px Arial';
        textContext.fillStyle = '#000';
        textContext.fillText(textElement.text, textElement.x, textElement.y);
      }
    });
  }

  textCanvas.addEventListener('mousedown', startMovingText);
  textCanvas.addEventListener('mousemove', moveText);
  textCanvas.addEventListener('mouseup', stopMovingText);


  function startMovingText(e) {
    var mouseX = e.clientX - textCanvas.getBoundingClientRect().left;
    var mouseY = e.clientY - textCanvas.getBoundingClientRect().top;

    textElements.forEach(function (textElement) {
      if (textElement) {
        var distance = Math.sqrt(
          Math.pow(mouseX - textElement.x, 2) + Math.pow(mouseY - textElement.y, 2)
        );
        if (distance < 10) {
          isMovingText = true;
          clearInterval(timer);
          selectedTextElement = textElement;
        }
      }
    });
  }


  function moveText(e) {
    if (isMovingText && selectedTextElement) {
      var mouseX = e.clientX - textCanvas.getBoundingClientRect().left;
      var mouseY = e.clientY - textCanvas.getBoundingClientRect().top;

      selectedTextElement.x = mouseX;
      selectedTextElement.y = mouseY;

      drawText();
    }
  }


  function stopMovingText() {
    if (isMovingText) {
      isMovingText = false;
      timer = setInterval(lockTextInPlace, 10000);
      selectedTextElement = null;
    }
  }

  function lockTextInPlace() {
    isMovingText = false;
    clearInterval(timer);
  }



  function toggleInputModalVisibility() {
    // Get the modal
    var inputModal = document.getElementById('inputModal');

    // Toggle the modal's display
    if (inputModal.style.display === 'none' || inputModal.style.display === '') {
      inputModal.style.display = 'block';
      var barangayNameInput = document.getElementById('barangayNameInput');
      barangayNameInput.focus();
    } else {
      inputModal.style.display = 'none';
    }
  }

  function uploadImage() {
    const barangayName = document.getElementById('barangayNameInput').value;
    const sectionNumber = document.getElementById('sectionNumberInput').value;
    const drawingCanvas = document.getElementById('drawingCanvas');

    if (!barangayName || !sectionNumber) {
      alert('Please fill in all fields.');
      return;
    }

  

    // Create a FormData object
    const formData = new FormData();
    formData.append('barangayName', barangayName);
    formData.append('sectionNumber', sectionNumber);
    

    // Append the canvas data as a blob
    drawingCanvas.toBlob(function (blob) {
      formData.append('imageData', blob, 'drawing.png');
      

      // Send the FormData to the server for saving
      fetch('draw_upload.php', {
        method: 'POST',
        body: formData,
      })
        .then(response => {
          if (response.ok) {
            // Handle success, e.g., show a success message.
            console.log('Drawing uploaded and saved successfully.');
          } else {
            // Handle error, e.g., show an error message.
            console.error('Drawing upload failed.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }, 'image/png');
  }


</script>

</div>
</div>
<?php
include('includes/scripts.php');
?>