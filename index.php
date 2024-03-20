<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Goals</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="box" id="financial-goal" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h2>Financial Goal</h2>
            <h1>htiai</h1>
            <ul id="financial-list" class="list">
                <li draggable="true" ondragstart="drag(event)">Item 1</li>
                <li draggable="true" ondragstart="drag(event)">Item 2</li>
                <li draggable="true" ondragstart="drag(event)">Item 3</li>
            </ul>
        </div>
        <div class="box" id="best-instrument" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h2>Best Instrument</h2>
            <ul id="instrument-list" class="list">
                <!-- Items dropped here will be dynamically added -->
            </ul>
        </div>
    </div>
    <button id="submit-btn" onclick="openPopup()">Submit Your Answer</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <form id="submit-form" onsubmit="submitForm(event)">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <input type="hidden" id="financial_goal" name="financial_goal">
                <input type="hidden" id="best_instrument" name="best_instrument">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
