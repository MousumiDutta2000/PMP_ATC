
document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.pathname;
    var navLinks = $(".nav-link");
  
    navLinks.each(function() {
      var section = $(this).data("section");
      if (section && currentUrl.includes(section)) {
        $(this).addClass("active");
        $(this).removeClass("collapsed");
      }
      // Handle the special case for projects URLs
      if (section === "projects" && currentUrl.includes("/project")) {
        $(this).addClass("active");
        $(this).removeClass("collapsed");
      }

      
    });
  });
  
// document.addEventListener("DOMContentLoaded", function() {
//     var currentUrl = window.location.pathname;
//     console.log("Current URL:", currentUrl); // Add this line to log the current URL
  
//     var navLinks = $(".nav-link");
  
//     navLinks.each(function() {
//       if (this.pathname === currentUrl) {
//         $(this).addClass("active");
//         $(this).removeClass("collapsed");
//       }
//     });
//   });

