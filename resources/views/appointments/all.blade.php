
<!-- header -->
@include('../layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
           
            <div class="container-fluid">
                <h4 class="c-grey-900 mT-10 mB-30">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
               </h4>
               
                <div class="col-md-12">
                   <!-- Here ###### 
                      https://github.com/asantibanez/livewire-calendar 
                     
                  --> 
                  <div id="jj-calendar"></div>

                  <div class="modal fade" id="calendar-edit">
                    <div class="modal-dialog" role="document">
                       <div class="modal-content">
                          <div class="bd p-15">
                             <h5 class="m-0">Consultation</h5>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="#" id="formConsultation">
                                 @csrf
                                <div class="form-group">
                                   <label class="fw-500">Diagnostic</label>
                                   <textarea name="diagnostic" id="diagnostic" class="form-control bdc-grey-200" rows="5"></textarea>
                                 </div>
                                <div class="text-right"><button class="btn btn-primary cur-p" >Done</button></div>
                             </form>
                          </div>
                       </div>
                    </div>
                 </div>
               </div>
             </div>
    </div>
 </main>
 <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js" ></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  $(function() {
 
$('#jj-calendar').fullCalendar({
   themeSystem: 'bootstrap4',
   header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
   },
   weekNumbers: true,
   eventLimit: true, // allow "more" link when too many events
   timeZone: 'local',
   eventSources: [
    {
      url: 'http://localhost/Doctor-s-office-management/public/appointments/posted', // use the `url` property
      color: 'yellow',    // an option!
      textColor: 'black'  // an option!
    }

    // any other sources...

  ],
  eventClick: function(calEvent, jsEvent, view) {
      var pathname = window.location.pathname
      pathname = pathname.replace('appointments/all','' )

      var title = calEvent.title
      var id_patient = title.split('-')
      console.log(title)

      $("#formConsultation").attr("action", pathname+"consultations/new/"+id_patient[1])
      var element = $(this)
      element.attr("data-toggle","modal");
      element.attr("data-target","#calendar-edit");

  }
  /*
  eventClick: function(calEvent, jsEvent, view) {
//modal.html(calEvent.title + '<br />Start:' + calEvent.start + '<br />End:' + calEvent.end + '<br />ID:' + calEvent.id + '<br />All Day:' + calEvent.allDay);
	
    for (const [key, value] of Object.entries(calEvent)) {
        console.log(`${key}: ${value}`);
      }
      $("#successModal").modal("show");
      $("#successModal .modal-body p").text(calEvent.title);

      
        _id: _fc13
        source: [object Object]
        className: 
        allDay: false
        title: Mr.Test Gmai
        start: Mon Sep 07 2020 14:00:00 GMT+0100
        end: Mon Sep 07 2020 15:00:00 GMT+0100

      

    
  }*/
  
  
   });

});
</script>
 @include('../layouts/footer')