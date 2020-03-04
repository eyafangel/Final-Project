<html>
  <head>
    <script type="text/javascript">
      function search() {
    var resultsDiv = document.getElementById("results");
    var req = new XMLHttpRequest();
    var userInput = document.getElementById("search-input").value;
    req.responseType = "json";
    req.open("GET", "/search-patient?last_name="+userInput, true);
    
    req.onload = function() {
      var patients = req.response;
      console.log(patients);
      var content = "<ul>";
      for (var patient in patients) {
        content += "<li>" + patients[patient].last_name + "</li>";
      }
      content += "</ul>";
      resultsDiv.innerHTML = content;
    };
    req.send(null);
  }
    </script>
  </head>
<body>
  
  <div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="modal-body">

          <div id="message"></div>

            <form class="formEvent" action="javascript:search()">
              <div class = "form-group row">
                <label for="patient" class = "col-sm-4 col-form-label">Patient</label>
                  <div class = "col-sm-8">
                    
                      <input class="form-control mr-sm-2" type="search" placeholder="Search Last Name of Patient" aria-label="Search" 
                            id="search-input">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                          <i class="fas fa-search"></i>
                      </button>
                      <input type="text" name = "results" class="form-control" id="results">                  
                  </div>
                </div>
            </form>
            
            <form id="formEvent">
                <div class = "form-group row">
                <label for="title" class = "col-sm-4 col-form-label">Title</label>
                    <div class = "col-sm-8">
                    <input type="text" name = "title" class="form-control" id="title">
                    <input type="hidden" name="id">
                    </div>
                </div>

                <div class = "form-group row">
                  <label for="date" class = "col-sm-4 col-form-label">Date</label>
                      <div class = "col-sm-8">
                      <input type="text" name = "date" class="form-control" id="date">                      
                      </div>
                  </div>   

                <div class = "form-group row">
                  <label for="start" class = "col-sm-4 col-form-label">Start Time</label>
                  <div class = "col-sm-8">
                  <input type="time" id="start" name = "start" class="form-control date-time">
                  {{-- <input type="text" name = "start" class="form-control date-time" id="start"> --}}
                  </div>
              </div>

              <div class = "form-group row">
                  <label for="end" class = "col-sm-4 col-form-label">End Time</label>
                  <div class = "col-sm-8">
                  <input type="time" id="end" name = "end" class="form-control date-time">
                  {{-- <input type="text" name = "end" class="form-control date-time" id="end"> --}}
                  </div>
              </div>

              <div class = "form-group row">
                <label for="color" class = "col-sm-4 col-form-label">Color</label>
                <div class = "col-sm-8">
                <input type="color" name = "color" class="form-control" id="color">
                </div>
            </div>

                <div class = "form-group row">
                  <label for="description" class = "col-sm-4 col-form-label">Description</label>
                      <div class = "col-sm-8">
                      <textarea name = "description" id="description" cols ="40" rows="4"></textarea>
                      </div>
                  </div>                              
            </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger deleteEvent">Delete</button>
          <button type="button" class="btn btn-primary saveEvent">Save</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>