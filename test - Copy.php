<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST["submit"]) == "submit" && isset($_POST["eventTitle"]) != "")
  {
    $sql = "INSERT INTO events_table (title, start)
        VALUES ('".$_POST['eventTitle']."', '".$_POST['eventDate']."')";
    if (mysqli_query($conn,$sql)) {
        echo "New event added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }



?>

<?php  include "fetch-events.php";
include "add-event.php";
 ?>
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

     

      customButtons: {
      addEventButton: {
        text: 'add event...',
        click: function() {
          var dateStr = prompt('Enter a date in YYYY-MM-DD format');
          if (dateStr != ""){
            var date = new Date(dateStr + 'T00:00:00'); // will be in local time
          }
          else{
            var date = "";
          }
          var event = prompt("Please enter the name of your event:");
         

          if (!isNaN(date.valueOf()) && event != "" && date != "") { // valid?
            calendar.addEvent({
              title: event,
              start: date,
              end: date,
              allDay: false
              
              
            });
            alert('Great. Now, update your database...');
          } else if (date == "") {
            alert('Invalid date.');
          } else if (event == "" ) {
            alert('Please enter a name of the event');
          } else {
            alert('Sorry there is an error with how your information was input')
          }
          
        }
      }
    },

    /*selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    */

      
      eventSources: [ //You can add and edit the preset events here 

      {
        events:<?php echo json_encode($myArray); ?>
      },
      {
        events: [ 
      
      {
        title: 'Presentation',
        start: '2019-05-16'
      },
      {
        groupId: 12,
        title: 'Meeting',
        start: '2019-03-21T12:00:00',
          end: '2019-03-21T13:00:00'
      },
      {
        groupId: 12,
        title: 'HCI Meeting',
        start: '2019-03-21T11:00:00',
          end: '2019-03-21T12:00:00'
      },
      {
        groupId: 12,
        title: 'Meeting',
        start: '2019-03-14T12:00:00',
          end: '2019-03-14T13:00:00'
      },
      {
        title: 'Meeting',
        start: '2019-03-07T11:00:00',
          end: '2019-03-07T12:00:00'
      },
      {
        title: 'Lab',
        start: '2019-03-21T15:00:00'
      },
      {
        title: 'HCI lecture',
        start: '2019-03-21T13:00:00',
        end: '2019-03-21T15:00:00'
      },
      {
        title: 'Check Learning Central', //If you want to add links this is the format you will need
        url: 'https://learningcentral.cf.ac.uk/webapps/blackboard/content/listContent.jsp?course_id=_387522_1&content_id=_4631573_1&mode=reset', // You could just link it to learning central as demo
        start: '2019-03-28'
      }
        ]
      }


    ]
    
     
     
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
	
