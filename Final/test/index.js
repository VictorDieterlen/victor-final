// JavaScript File

$(document).ready(function(){
    //Create data
    var data = [{
        date: "5/1/2018",
        start: "5 AM",
        end: "6 AM",
        duration: "1 hour",
        bookedBy: "Not booked"
    },
    {
        date: "5/1/2018",
        start: "10 AM",
        end: "11 AM",
        duration: "1 hour",
        bookedBy: "Some person"
    },
    {
        date: "5/1/2018",
        start: "11 AM",
        end: "11:30 AM",
        duration: "30 min",
        bookedBy: "Not booked"
    }];
    
    
    $('#addTimeButton').on('click', function(e){
         $('#addModal').show();
    })
    
    $('#cancelButton').on('click', function(e){
         $('#addModal').hide();
    })
    
    function deleteAppointment(){
        
        
            var i = $(this).closest('tr').index();
            $('#deleteModal').show();
            $('#selectedStart').html(data[i].date + ' ' + data[i].start);
            $('#selectedEnd').html(data[i].date + ' ' + data[i].end);
        
        
        $('#cancelButton2').on('click', function(e){
            $('#deleteModal').hide();
        })
        
        $('#removeButton').on('click', function(e){
            $('#deleteModal').hide();
            data.splice(data[i]+1, 1);
            createHtml(data);
        })
    }


    //Create HTML table from data
    
    
    function createHtml(data) {
        $("#table tbody").remove();

        
        for (var i=0; i<data.length; i++){
            $("table").append(
                $("<tbody>").append(
                $("<tr>")
                    .append($("<th>").html(data[i].date))
                    .append($("<th>").html(data[i].start))
                    .append($("<th>").html(data[i].duration))
                    .append($("<th>").html(data[i].bookedBy))
                    .append($("<th>").append($("<button id='detailsButton'>").html("Details")))
                    .append($("<button id = 'deleteButton'>").html('Delete'))
                )
            )
             
        }
        $('#deleteButton').on('click', function(e){
                var i = $('#this').closest('tr').index();
                $('#deleteModal').show();
                $('#selectedStart').html(data[i].date + ' ' + data[i].start);
                $('#selectedEnd').html(data[i].date + ' ' + data[i].end);
            })
        
            $('#cancelButton2').on('click', function(e){
                $('#deleteModal').hide();
            })
        
            $('#removeButton').on('click', function(e){
                $('#deleteModal').hide();
                data.splice(data[i]+1, 1);
                createHtml(data);
            })
       
        
    
}
    

    
    //Add a new appointment
    $('#addButton').on('click', function(e){
        var date = $('#inputDate').val();
        var start = $('#inputStart').val();
        var end = $('#inputEnd').val();
        var duration = end - start;
        
        var newAppointment ={date: date, start: start, end: end, duration: duration, bookedBy: "Some person"};
        console.log(newAppointment);
        data.push(newAppointment);
        createHtml(data);  
    });
    
createHtml(data);     
    
    //Create array with appointments already scheduled and convert it to JSON format

    /*var TableData;
    TableData = storeTblValues()
    TableData = $.toJSON(TableData);

    function storeTblValues(){
        var TableData = new Array();
        $('#table tr').each(function(row, tr){
            TableData[row]={
                "Date" : $(tr).find('td:eq(0)').text()
                , "StartTime" :$(tr).find('td:eq(1)').text()
                , "Duration" : $(tr).find('td:eq(2)').text()
                , "BookedBy" : $(tr).find('td:eq(3)').text()
            }
        }); 
        TableData.shift();  // first row is the table header - so remove
        console.log(TableData);
        return TableData;
    }*/
    
    //POST
    /*$.ajax({
        url: "https://anydata.somedomain.com/data/testing/1.json",
        type: "POST",
        data: JSON.stringify({"message" : "test data"}),
        dataType: "text",
        contentType: "application/json",
    }).done(function(data) {
        console.log('successful upload');
        console.log(data);
    }).fail(function(xhr) {
        console.log('failed upload');
        console.log(xhr);
    }).always(function() {
        console.log('done processing upload');
    });
    
    //GET
    $.ajax({
        url: "https://anydata.somedomain.com/data/testing/1.json",
        type: "GET",
        dataType: "json",
    }).done(function(data) {
        console.log('succeeded download');
        console.log(data);
    }).fail(function(xhr) {
        console.log('failed download');
        console.log(xhr);
    }).always(function() {
        console.log('done processing download');
    });*/

       
}); 