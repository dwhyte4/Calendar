

<?php  
include "fetch-events.php";

include "dbconnect.php";

include "edit-event.php";

include "delete-event.php";

 ?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="top"> 
        <div id="pname">
          <p><img src="images/LearningHubLogo.jpeg" padding-right="4" height="66" alt="Logo" class="logo" align="middle">Learning hub</p>
        </div>  
            <div id="hmenu">            
              <ul> 
                <li> 
                <a href="home.html">Home</a> 
                </li>  
                <li> 
                <a href="contact.html">Contact Us</a> 
                </li>
                <li> 
                <a href="groupPageNoLogin.html">My Account</a> 
                </li>    
              </ul> 
            </div>  
          <div class="clear"></div> 
        </div>  


<meta charset='utf-8' />
<link href='fullcalendar-4.0.1/packages/core/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/daygrid/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/timegrid/main.css' rel='stylesheet' />
<link href='fullcalendar-4.0.1/packages/list/main.css' rel='stylesheet' />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='fullcalendar-4.0.1/packages/core/main.js'></script>
<script src='fullcalendar-4.0.1/packages/interaction/main.js'></script>
<script src='fullcalendar-4.0.1/packages/daygrid/main.js'></script>
<script src='fullcalendar-4.0.1/packages/timegrid/main.js'></script>
<script src='fullcalendar-4.0.1/packages/list/main.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

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
        
        eventDrop: function (info) {
                    var start = moment(info.event.start).format("Y-MM-DD HH:mm:ss");
                    var end = moment(info.event.end).format("Y-MM-DD HH:mm:ss");
                    var title = info.event.title;
                    $.ajax({
                        url: 'edit-event.php',
                        dataType: 'json',
                        data: { start: start, end: end, title : title },
                        type: "POST",
                        success: function (response) {
                          calendar.fullCalendar( info.event.title);
                            displayMessage("Updated Successfully");
                        }
                    });
                },

                eventClick: function (info) {
                    var deleteMsg = confirm("Do you really want to delete?");
					var title = info.event.title;
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: 'delete-event.php',
                            data: { title : title },
                            success: function (response) {
                                if (parseInt(response) > 0) {
                                    calendar.fullCalendar('removeEvents', info.event.title);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                },
   


      
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
<br />  
<br />  
----Click On an Event to Delete it----
<br />  
<br /> 
<form action="add-event.php" method="POST">
<input type = "hidden" name = "submitted" value = "true">
<fieldset>
  <legend>Add New event</legend>    
  <label>Event name:<input type="text" name="title"  placeholder="Enter name of the event" required /><label>
  <label>Start Date:<input type="date" name="start"  required /><label>
  <label>Start time:<input type="time" name="starttime"  required /><label>
  <label>End Date:<input type="date" name="end"  required /><label>
  <label>End time:<input type="time" name="endtime"  required /><label>
  <input type="submit" value="Submit Event">
</fieldset>
</form>
<br />  
<br />  
<form action="edit-event.php" method="POST">
<input type = "hidden" name = "submitted" value = "true">
<fieldset>
  <legend>Edit event</legend>    
    <label>Current Event name:<input type="text" name="title"  placeholder="Enter current name of the event" required /><label>
  <label>Current Start Date:<input type="date" name="start"  required /><label>
  <label>Current Start time:<input type="time" name="starttime"  required /><label>
  <br />--Change to--<br />
  <label>Event name:<input type="text" name="titlenew"  placeholder="Enter new name of the event" required /><label>
  <label>Start Date:<input type="date" name="startnew"  required /><label> 
  <label>Start time:<input type="time" name="starttimenew"  required /><label>
  <label>End Date:<input type="date" name="endnew"  required /><label>
  <label>End time:<input type="time" name="endtimenew"  required /><label>
<br />  
  <input type="submit" value="Edit Event">
</fieldset>
</form>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <footer id="footer"> 
      <div class="bg"></div>  
      <div class="content"> 
        <div class="group"> 
          <div class="col span_1_of_3">   
            <div class="vmenu"> 
            <h2>Licence</h2>
            Group 12 students of Cardiff University <br> 
            Copyright © Cardiff University.
            </div> 
          </div>  
          <div class="col span_1_of_3"> 
          <h2>About Us</h2>  
          <p>Little bit about the project -purpose of the website maybe?</p> 
          </div>  
          <div class="col span_1_of_3"> 
          <h2>Contact</h2>  
          <a> Helpmail@something.com </a>
          </p> 
          </div> 
        </div>  
        <div class="clear"></div>  
        <div class="baseline"> 
          <div style="float:left;margin-top:7px"> 
          </div> 
          </ul>  
          <div class="clear"></div> 
        </div> 
      </div> 
    </footer> 

</body>

</html>
	
