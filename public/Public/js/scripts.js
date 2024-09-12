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

// document.addEventListener('DOMContentLoaded', function () {
//     var calendarEl = document.getElementById('calendar');
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         headerToolbar: {
//             left: 'prev',
//             center: 'title',
//             right: 'next'
//         },
//         footerToolbar: {
//             left: '',
//             center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
//             right: ''
//         },
//         locale: 'id',
//         customButtons: {
//             currentDate: {
//                 text: new Date().toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }),
//                 click: function() {
//                     // Optional: You can add any action you want when the date is clicked
//                 }
//             }
//         },
//         events: [
//             {
//                 title: 'Ibadah Minggu',
//                 start: '2024-09-08T10:00:00',
//                 end: '2024-09-08T12:00:00',
//                 description: 'Ikuti Ibadah Minggu kami!'
//             },
//             {
//                 title: 'Ibadah Minggu',
//                 start: '2024-09-08T10:00:00',
//                 end: '2024-09-08T12:00:00',
//                 description: 'Ikuti Ibadah Minggu kami!'
//             },
//             {
//                 title: 'Pertemuan Pemuda',
//                 start: '2024-09-10T18:00:00',
//                 end: '2024-09-10T20:00:00',
//                 description: 'Pertemuan untuk kelompok pemuda untuk berdiskusi tentang kegiatan masa depan dan kebersamaan.'
//             },
//             {
//                 title: 'Pelajaran Alkitab',
//                 start: '2024-09-15T19:00:00',
//                 description: 'Sesi pelajaran Alkitab mingguan. Semua orang diundang!'
//             },
//             {
//                 title: 'Malam Pujian',
//                 start: '2024-09-22T18:30:00',
//                 allDay: false,
//                 description: 'Malam yang didedikasikan untuk ibadah dan doa.'
//             }
//         ],
//         dayMaxEvents: true, // Enable the "more" link when too many events
//         eventClick: function(info) {
//             var modal = document.getElementById("eventModal");
//             var closeBtn = document.getElementsByClassName("close")[0];
            
//             document.getElementById("eventTitle").innerText = info.event.title;
//             document.getElementById("eventTime").innerText = "Waktu: " + info.event.start.toLocaleString() + (info.event.end ? " - " + info.event.end.toLocaleString() : "");
//             document.getElementById("eventDescription").innerText = info.event.extendedProps.description;

//             modal.style.display = "block";

//             closeBtn.onclick = function() {
//                 modal.style.display = "none";
//             };

//             window.onclick = function(event) {
//                 if (event.target == modal) {
//                     modal.style.display = "none";
//                 }
//             };

//             info.jsEvent.preventDefault();
//         }
//     });

//     calendar.render();
// });

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
            }
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