(function($) {
  "use strict"; // Start of use strict

  // Set sidebar toggled by default
  $("body").addClass("sidebar-toggled");
  $(".sidebar").addClass("toggled");

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict

// Function to dynamically update the video without a full page reload
function updateVideo(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  let url = document.getElementById('youtubeEmbedCode').value.trim();

  // Check if the link is a standard YouTube video URL (e.g., watch?v=ID)
  if (url.includes("watch?v=")) {
      let videoID = url.split("watch?v=")[1].split("&")[0]; // Get video ID, excluding additional parameters
      url = "https://www.youtube.com/embed/" + videoID;

  // Handle shortened YouTube links (e.g., youtu.be/ID)
  } else if (url.includes("youtu.be/")) {
      let videoID = url.split("youtu.be/")[1].split("&")[0];
      url = "https://www.youtube.com/embed/" + videoID;

  // Handle YouTube live links (e.g., youtube.com/live/ID)
  } else if (url.includes("youtube.com/live/")) {
      let videoID = url.split("youtube.com/live/")[1].split("?")[0];
      url = "https://www.youtube.com/embed/" + videoID;
  }

  // Check if the final URL is in the correct embed format
  if (!url.includes("https://www.youtube.com/embed/")) {
      alert("Please enter a valid YouTube URL in the format: https://www.youtube.com/watch?v=VIDEO_ID, https://youtu.be/VIDEO_ID, or https://www.youtube.com/live/VIDEO_ID");
      return false;
  }

  // Update the iframe's src attribute with the new video link
  document.getElementById('youtube-video').src = url;
  
  // Optional: Clear the input field after posting the video
  document.getElementById('youtubeEmbedCode').value = '';
}

// TinyMCE JS
tinymce.init({
  selector: 'textarea',
  plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
  ],
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
      },
      {
          value: 'Email',
          title: 'Email'
      },
  ],
  ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
});