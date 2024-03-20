function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.innerText);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var draggedItem = document.createElement("li");
    draggedItem.textContent = data;
    ev.target.appendChild(draggedItem);

    // Remove the dropped item from the Financial Goal box
    var financialList = document.getElementById("financial-list");
    var draggedElement = financialList.querySelector("li.dragging");
    if (draggedElement) {
        draggedElement.remove();
    }

    // If dropped on an existing item, place the item under it
    if (ev.target.tagName === "LI") {
        ev.target.appendChild(draggedItem);
    }

    // Check if all items are arranged
    var financialListItems = financialList.querySelectorAll("li");
    if (financialListItems.length === 0) {
        // Financial Goal box is empty, arrange the items in Best Instrument box
        var instrumentList = document.getElementById("instrument-list");
        var bestInstrumentItems = instrumentList.querySelectorAll("li");
        var goals = [];
        bestInstrumentItems.forEach(item => {
            goals.push(item.textContent);
            item.remove(); // Remove item from Best Instrument box
        });

        // Empty Best Instrument box and display corresponding financial goals
       
        instrumentList.innerHTML = "";
        goals.forEach(goal => {
            var goalItem = document.createElement("li");
            goalItem.textContent = goal;
            instrumentList.appendChild(goalItem);
        });
    }
    
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }
    
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
    
    function submitForm(event) {
        event.preventDefault(); // Prevent form submission
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var financialGoal = document.getElementById("financial-list").innerHTML;
        var bestInstrument = document.getElementById("instrument-list").innerHTML;
    
        // Set form fields with financial goal and best instrument values
        document.getElementById("financial_goal").value = financialGoal;
        document.getElementById("best_instrument").value = bestInstrument;
    
        // Submit the form
        document.getElementById("submit-form").submit();
    }
    