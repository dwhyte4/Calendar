
<?php  include "fetch-events.php"; ?>
<!DOCTYPE html>
<html>

<head>
<meta charset='utf-8' />
<link href='fullcalendar-4.0.1/packages/core/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/daygrid/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/timegrid/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/list/main.css' rel='stylesheet' />


<script src='fullcalendar-4.0.1/packages/core/main.js'></script>
<script src='fullcalendar-4.0.1/packages/interaction/main.js'></script>
<script src='fullcalendar-4.0.1/packages/daygrid/main.js'></script>
<script src='fullcalendar-4.0.1/packages/timegrid/main.js'></script>
<script src='fullcalendar-4.0.1/packages/list/main.js'></script>
<script type="text/javascript" src="functions.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'list','timeGrid' ],
    defaultView: 'dayGridMonth',
    header: {
      left: 'prevYear,prev,next,nextYear, today , addEventButton',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },

    navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events

      weekNumbers: true, //Shows week number at the top left 
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      dayClick: function(date, jsEvent, view) {
        $("#successModal").modal("show");
        $("#eventDate").val(date.format());
      },

      events:<?php echo json_encode($myArray); ?>
    
     
     
  });

  calendar.render();
});

</script>


</head>
<body>
<style>
	html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 900px;
  margin: 40px auto;
}

</style>
<div class="response"></div>
<div id='calendar'></div>

</body>

</html>
	