<!-- Modal for Event Details -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <!-- Close Button -->
        <span class="close">&times;</span>

        <!-- Event View Mode -->
        <div id="viewMode">
            <h2 id="eventTitle"></h2>
            <p id="eventTime"></p>
            <p id="eventLocation"></p>
            <p id="eventDescription"></p>
        </div>

        <!-- Action Buttons for Admin Pages Only -->
        <div class="modal-footer" id="adminButtons" style="display: none;">
            <button id="deleteBtn" class="btn btn-danger" onclick="deleteEvent()">Delete</button>
        </div>
    </div>
</div>