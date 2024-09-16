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

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    // Helper function to format date
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
        customButtons: {
            currentDate: {
                text: new Date().toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }),
                click: function() {
                    // Optional: You can add any action you want when the date is clicked
                }
            }
        },
        events: [
            {
                title: 'Ibadah Minggu',
                start: '2024-09-08T10:00:00',
                end: '2024-09-08T12:00:00',
                description: 'Ikuti Ibadah Minggu kami!'
            },
            {
                title: 'Ibadah Minggu',
                start: '2024-09-08T10:00:00',
                end: '2024-09-08T12:00:00',
                description: 'Ikuti Ibadah Minggu kami!'
            },
            {
                title: 'Pertemuan Pemuda',
                start: '2024-09-10T18:00:00',
                end: '2024-09-10T20:00:00',
                description: 'Pertemuan untuk kelompok pemuda untuk berdiskusi tentang kegiatan masa depan dan kebersamaan.'
            },
            {
                title: 'Pelajaran Alkitab',
                start: '2024-09-15T19:00:00',
                description: 'Sesi pelajaran Alkitab mingguan. Semua orang diundang!'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-22T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },
            {
                title: 'Malam Pujian',
                start: '2024-09-28T18:30:00',
                allDay: false,
                description: 'Malam yang didedikasikan untuk ibadah dan doa.'
            },

        ],
        dayMaxEvents: true, // Enable the "more" link when too many events
        eventClick: function(info) {
            var modal = document.getElementById("eventModal");
            var closeBtn = document.getElementsByClassName("close")[0];
            
            // Format dates for display
            var startDate = formatDate(info.event.start);
            var endDate = info.event.end ? formatDate(info.event.end) : 'N/A';
            
            document.getElementById("eventTitle").innerText = info.event.title;
            document.getElementById("eventTime").innerText = startDate + (endDate !== 'N/A' ? " - " + endDate : "");
            document.getElementById("eventDescription").innerText = info.event.extendedProps.description;

            modal.style.display = "block";

            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };

            info.jsEvent.preventDefault();
        }
    });

    calendar.render();
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
