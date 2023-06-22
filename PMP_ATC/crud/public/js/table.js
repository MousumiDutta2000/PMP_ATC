$(document).ready(function() {
  $("#example").DataTable({
    aaSorting: [],
    responsive: true,

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {
  adjustNameFieldWidth();

  $(window).resize(function() {
      adjustNameFieldWidth();
  });

  function adjustNameFieldWidth() {
      $('.name-container').each(function() {
          var maxWidth = 150; // Maximum width for the name field
          var containerWidth = $(this).parent().width();
          var nameWidth = $(this).find('.name').width();

          if (nameWidth > maxWidth && nameWidth > containerWidth) {
              $(this).css('max-width', nameWidth + 10 + 'px');
          } else {
              $(this).css('max-width', '');
          }
      });
  }
});