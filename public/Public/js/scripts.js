/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

// FullCalendar Function
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var isAdmin = window.location.pathname.includes('/Admin'); // Detect if the page is the Admin page

    // Helper function to format date in Indonesian locale
    function formatDate(date) {
        return date.toLocaleString('id-ID', { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' });
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        footerToolbar: {
            left: '',
            center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
            right: ''
        },
        buttonText: {
            today: 'HARI INI',
            month: 'BULANAN',
            week: 'MINGGUAN',
            day: 'HARIAN',
            list: 'ACARA'
        },
        locale: 'id',
        events: '/events', // Fetch events from your server
        dayMaxEvents: true, // Enable the "more" link when too many events
        eventClick: function(info) {
            var modal = document.getElementById("eventModal");
            var closeBtn = document.getElementsByClassName("close")[0];
            
            // Format dates for display
            var startDate = formatDate(info.event.start);
            var endDate = info.event.end ? formatDate(info.event.end) : 'N/A';
            
            // Populate modal details
            document.getElementById("eventTitle").innerText = info.event.title;
            document.getElementById("eventTime").innerText = startDate + (endDate !== 'N/A' ? " - " + endDate : "");
            document.getElementById("eventDescription").innerText = info.event.extendedProps.description;

            // If it's the admin page, dynamically add edit and delete buttons
            if (isAdmin) {
                // Add buttons only if not already present
                if (!document.getElementById("editBtn")) {
                    var modalFooter = document.createElement("div");
                    modalFooter.classList.add("modal-footer");

                    // Create and append Edit button
                    var editBtn = document.createElement("button");
                    editBtn.id = "editBtn";
                    editBtn.className = "btn btn-warning";
                    editBtn.innerText = "Edit";
                    editBtn.setAttribute("data-id", info.event.id);
                    modalFooter.appendChild(editBtn);

                    // Create and append Delete button
                    var deleteBtn = document.createElement("button");
                    deleteBtn.id = "deleteBtn";
                    deleteBtn.className = "btn btn-danger";
                    deleteBtn.innerText = "Delete";
                    deleteBtn.setAttribute("data-id", info.event.id);
                    modalFooter.appendChild(deleteBtn);

                    // Append the footer to the modal content
                    document.querySelector("#eventModal .modal-content").appendChild(modalFooter);

                    // Set up event listeners for these buttons
                    setupAdminButtons(editBtn, deleteBtn);
                } else {
                    // Update the IDs in existing buttons
                    document.getElementById("editBtn").setAttribute("data-id", info.event.id);
                    document.getElementById("deleteBtn").setAttribute("data-id", info.event.id);
                }
            }

            // Show the modal
            modal.style.display = "block";

            // Close the modal when the close button is clicked
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            // Close the modal when clicking outside of the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };

            // Prevent default action (e.g., navigating to event's URL)
            info.jsEvent.preventDefault();
        }
    });

    calendar.render();

    // Function to set up admin-specific button event handlers
    function setupAdminButtons(editBtn, deleteBtn) {
        // Handle the Edit Button Click
        editBtn.addEventListener('click', function () {
            var eventId = this.getAttribute('data-id');
            if (eventId) {
                window.location.href = `/Admin/editEvent/${eventId}`; // Redirect to the edit event page
            }
        });

        // Handle the Delete Button Click
        deleteBtn.addEventListener('click', function () {
            var eventId = this.getAttribute('data-id'); // Get the event ID from the data-id attribute

            if (eventId && confirm('Apakah Anda Yakin Untuk Menghapus Jadwal Ini?')) {
                // Send AJAX request to delete the event
                fetch(`/Settings/deleteEvent/${eventId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the modal
                        document.getElementById("eventModal").style.display = "none";

                        // Remove the event from FullCalendar
                        var event = calendar.getEventById(eventId);
                        if (event) {
                            event.remove(); // Remove the event from the calendar
                        }

                        alert('Jadwal Berhasil Dihapus.');
                    } else {
                        alert('Gagal Menghapus Jadwal.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi Error Saat Menghapus Jadwal.');
                });
            }
        });
    }
});

document.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('.hidden');
    
    sections.forEach(section => {
      const rect = section.getBoundingClientRect();
      const isVisible = (rect.top <= window.innerHeight) && (rect.bottom >= 0);
  
      if (isVisible) {
        section.classList.add('visible');
      } else {
        section.classList.remove('visible');
      }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const texts = document.querySelectorAll("#about .animated-text");
    let index = 0;

    // Make the first text visible on page load
    texts[index].classList.add('show');
    texts[index].style.transform = "translateY(0)";

    function changeText() {
        texts.forEach((text, i) => {
            text.classList.remove('show');  // Remove the show class from all texts
            if (i === index) {
                text.style.transform = "translateY(100%)";  // Move current text down
            } else if (i === (index + 1) % texts.length) {
                text.style.transform = "translateY(0)";  // Bring the next text from above
                text.classList.add('show');  // Show the next text
            } else {
                text.style.transform = "translateY(-100%)";  // Position all other texts above
            }
        });

        setTimeout(() => {
            texts[index].classList.remove('show');  // Fade out the current text as it moves up
            index = (index + 1) % texts.length;
        }, 500);  // Delay to allow the transition to start before hiding the text
    }

    setInterval(changeText, 3000);  // Change text every 3 seconds
});

document.addEventListener("DOMContentLoaded", function () {
    const itemsPerPage = 10;
    const newsContainer = document.getElementById("news-container");
    const newsItems = Array.from(newsContainer.getElementsByClassName("news-item"));
    const totalPages = Math.ceil(newsItems.length / itemsPerPage);
    const pagination = document.getElementById("pagination");

    let currentPage = 1;

    function showPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        newsItems.forEach((item, index) => {
            item.style.display = (index >= start && index < end) ? "block" : "none";
        });
    }

    function updatePagination(page) {
        const prevButton = pagination.querySelector('.page-item:first-child');
        const nextButton = pagination.querySelector('.page-item:last-child');
        prevButton.classList.toggle('disabled', page === 1);
        nextButton.classList.toggle('disabled', page === totalPages);
    }

    function createPagination() {
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            li.className = "page-item";
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener("click", function (e) {
                e.preventDefault();
                currentPage = i;
                showPage(currentPage);
                updatePagination(currentPage);
                setActivePage();
            });
            pagination.insertBefore(li, pagination.querySelector('.page-item:last-child'));
        }
    }

    function setActivePage() {
        const pageItems = pagination.querySelectorAll('.page-item');
        pageItems.forEach(item => item.classList.remove('active'));
        pageItems[currentPage].classList.add('active');
    }

    // Initialize the pagination
    createPagination();
    showPage(currentPage); // Show the first page by default
    updatePagination(currentPage);

    // Set the first page as active
    setActivePage();

    // Add event listeners for the arrow buttons
    pagination.querySelector('.page-item:first-child').addEventListener('click', function (e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
            updatePagination(currentPage);
            setActivePage();
        }
    });

    pagination.querySelector('.page-item:last-child').addEventListener('click', function (e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
            updatePagination(currentPage);
            setActivePage();
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Define descriptions for each frame
    const descriptions = {
        frame1: `
            <h1 class="description-title">REBANA</h1>
            <p class="description-intro">Traditional tambourine-like instrument, often used in worship music. It adds rhythmic depth to the melodies played in church.</p>
            <p class="description-intro">It has been used for generations to enhance the musical experience during services.</p>
        `,
        frame2: `
            <h1 class="description-title">BANNERS</h1>
            <p class="description-intro">Symbolize God's promises and the victory of Christ. They are often raised during worship to signify His presence among us.</p>
            <p class="description-intro">Each color and design tells a story of faith and devotion.</p>
        `,
        frame3: `
            <h1 class="description-title">MUSIK</h1>
            <p class="description-intro">Powerful role in worship, helping to unite hearts and minds in praise. It bridges the gap between the spiritual and the physical world.</p>
            <p class="description-intro">From traditional hymns to modern worship songs, music has the power to transform lives.</p>
        `,
        frame4: `
            <h1 class="description-title">SINGERS</h1>
            <p class="description-intro">Voice of the congregation, leading the church in praise and worship. Their voices help guide the hearts of believers toward the divine.</p>
            <p class="description-intro">They embody the beauty of worship through song.</p>
        `,
        frame5: `
            <h1 class="description-title">CHOIRS</h1>
            <p class="description-intro">Uplift the spirit and inspire deep connection to faith through harmonious voices. Each member brings their own contribution to a collective, beautiful sound.</p>
            <p class="description-intro">They are a vital part of the worship experience in church.</p>
        `
    };

    // Select all the frames
    const frames = document.querySelectorAll("#moc-train .frame");

    // Add a click event listener to each frame
    frames.forEach(frame => {
        frame.addEventListener("click", function() {
            // If the clicked frame already has the 'clicked' class, remove it (toggle back to original position)
            if (this.classList.contains("clicked")) {
                this.classList.remove("clicked");
                this.querySelector('.caption').classList.remove("clicked"); // Reset caption size
                document.getElementById("description-content").innerHTML = `
                <h1 class="description-title">BIDANG PELAYANAN MOC</h1>
                <p class="description-intro">MOC memiliki beberapa bidang pelayanan, antara lain:</p>
                <ul class="description-list">
                    <li>- Rebana</li>
                    <li>- Banners</li>
                    <li>- Music</li>
                    <li>- Singers</li>
                    <li>- Choirs</li>
                </ul>
            `;            
            } else {
                // Remove the "clicked" class from all frames and captions (so only one can be active at a time)
                frames.forEach(f => {
                    f.classList.remove("clicked");
                    f.querySelector('.caption').classList.remove("clicked");
                });

                // Add the "clicked" class to the clicked frame (move to center)
                this.classList.add("clicked");
                this.querySelector('.caption').classList.add("clicked"); // Increase caption size

                // Update the description box content
                const frameId = this.id;
                const descriptionContent = document.getElementById("description-content");
                descriptionContent.innerHTML = descriptions[frameId] || "<p>Description not available.</p>";
            }
        });
    });
});



// Function to calculate the next first Sunday of the month
function getNextFirstSunday() {
    const today = new Date();
    const year = today.getFullYear();
    let nextMonth = today.getMonth() + 1; // Move to next month
    if (nextMonth > 11) {
        nextMonth = 0;
    }
    const firstDayOfNextMonth = new Date(year, nextMonth, 1);
    const firstSunday = new Date(firstDayOfNextMonth.setDate(firstDayOfNextMonth.getDate() + (7 - firstDayOfNextMonth.getDay()) % 7));
    return firstSunday;
}

// Countdown timer function
function updateCountdown() {
    const countdownElement = document.getElementById('countdown-timer');
    const nextFirstSunday = getNextFirstSunday();
    
    const now = new Date().getTime();
    const timeRemaining = nextFirstSunday.getTime() - now;

    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));

    countdownElement.innerHTML = `${days} Hari Lagi`;

    if (timeRemaining < 0) {
        countdownElement.innerHTML = "Perjamuan Kudus sedang berlangsung!";
    }
}

// Update the countdown every second
setInterval(updateCountdown, 1000);

