<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pixel Art Maker</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica">
    <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="resoPicker" id="resoPicker">
            <h3> Define size of the canvas </h3>
            <label for="widthPicker"> Size </label>
            <input type="number" id="widthPicker" name="width" class="resoPicker__input" placeholder="Width"/> 
            <input type="number" id="heightPicker" name="height" class="resoPicker__input" placeholder="Height"/>
            <button type="submit" class="resoPicker__submit" id="submitReso"> CREATE </button>
        </div>

        <nav>
            <label for="color"> COLOR </label>
            <input type="color" id="colorpicker">
            
            <label for="sizepicker"> BRUSH SIZE </label>
            <input type="number" id="sizepicker" min="1" max="20" value="1">

            <a href="" id="downloadLink" download="image.png">
                <button id="saveButton" download="image.png"> SAVE </button>
            </a>
        </nav>
    
        <div class="drawingBoard">
            <canvas id="board"></canvas>
        </div>

        <script src="java.js"></script>
    </body>
</html>