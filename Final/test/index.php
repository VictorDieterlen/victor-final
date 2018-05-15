<!DOCTYPE html>
<html>
    <head>
        <title>Scheduler app</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <body>
        

        <a href="" style="position: absolute; top: 0; right: 0; width: 100px; text-align:right;">Logout</a>
        <br>
        <form action="">
            Invitation link: <input type="text" name="FirstName" value="">
            <input type="submit" value="Submit">
        </form>
        <br><br>
        
        <div id="appointments">
            <table id = "table" class = "textCenter" style="width:100%">
            <thead>
              <tr>
                <th>Date</th>
                <th>Start Time</th> 
                <th>Duration</th>
                <th>Booked by</th>
                <th><button type="button" id="addTimeButton">Add multiple time slots</button>
              </tr>
            </thead>

            </table>
        </div>
        
        <br><br><br><br>

        <div class="hidden myModal" id="addModal">
            <h1>Add Time Slot</h1>
            <form>
                Date: <input id="inputDate" type="text" name="date" value=" / / ">
                <br>
                Start Time: <input id="inputStart" type="text" name="date" value="">
                <br>
                End Time: <input id="inputEnd" type="text" name="date" value="">
                <br><br>
                <input type="button" value="Cancel" id="cancelButton">
                <input type="button" value="Add" id="addButton">
            </form>
          </div>
  
          <div class="hidden myModal" id="deleteModal">
            
                <label>Start Time:</label> <label id = "selectedStart"></label>
                <br>
                <label>End Time:</label> <label id = "selectedEnd"></label>
                <br>
                <p>Are you sure you want to remove the time slot? This cannot be undone.</p>
                <br>
                <input type="button" value="cancel" id="cancelButton2">
                <input type="button" value="Yes remove it!" id="removeButton">
          </div>
          
          
          <table>
<thead>
<tr>
<th style="text-align:left">#</th>
<th style="text-align:left">Task Description</th>
<th style="text-align:left">Points</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left">1</td>
<td style="text-align:left" class = "green">Data is designed in such a way as to support the requirements of the app</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">2</td>
<td style="text-align:left">The list of available appointments is pulled from the server and displayed using the specified page design</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">3</td>
<td style="text-align:left">Available times with dates in the past do not show up in the Dashboard list</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">4</td>
<td style="text-align:left" class = "green">A user can add an available time slot to the data set using the specified modal design</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">5</td>
<td style="text-align:left" class = "green">A user can remove an available time slot from the data set</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">6</td>
<td style="text-align:left" class = "green">The user confirms the removal using the specified modal design</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">7</td>
<td style="text-align:left">The invitation URL is populated when the page is loaded, and includes an <code>event</code> query string parameter if one is included</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">TOTAL</td>
<td style="text-align:left">100</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
<td style="text-align:left">2</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">The user can add multiple available time slots as specified</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">You correctly implement booking of the appointement, including all side effects</td>
<td style="text-align:left">30</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">The Copy to Clipboard button copies the text to the clipboard</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">Add to Calendar button creates a calendar appointment with the correct appointment date and time in Google Calendar when clicked</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">Something is added with <code>&lt;canvas&gt;</code> that is relevant and cool</td>
<td style="text-align:left">10</td>
</tr>
</tbody>
</table>


    <script type="text/javascript" src="/Final/test/index.js"></script>
    </body>
</html>