
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">New Appointment:</h6>
                <div class="mT-30">
                <form method="POST" action="{{route('save_appointment')}}">
                    @csrf
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="patient">Patient</label> 
                           <select name="patient" class="form-control  @error('patient') is-invalid @enderror">
                              @foreach ($patients as $patient)
                                 <option value="{{$patient->id}}">{{$patient->firstname}} {{$patient->lastname}}</option>    
                              @endforeach
                           </select>
                           @error('patient')
                               <p style="color: red">{{ $message }}</p>
                        @enderror
                        </div>
                     </div>

                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label class="fw-500">Date Appointment</label>
                            <div class="timepicker-input input-icon form-group">
                               <div class="input-group">
                                  <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                  <input type="text" id="date_appmnt" class="form-control bdc-grey-200 start-date  @error('date_appmnt') is-invalid @enderror" name="date_appmnt" placeholder="Date" data-provide="datepicker" value="{{old('date_appmnt')}}">
                               </div>
                               @error('date_appmnt')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                         </div>

                         <div class="form-group col-md-4">
                           <label for="inputState">Hour</label> 
                           <select name="hour" id="hours" class="form-control  @error('hour') is-invalid @enderror">
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>

                           </select>
                           @error('hour')
                               <p style="color: red">{{ $message }}</p>
                        @enderror
                        </div>


                      </div>
                      <button type="submit" class="btn btn-primary">Sign in</button>
                   </form>
                </div>
             </div>


        </div>
    </div>
 </main>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
   var checkDate = "";
   $( "#hours" ).click(function() {
  if($("#date_appmnt").val() !== "" ){
    let day = $("#date_appmnt").val().replaceAll('/', '-')
    if (checkDate != day ) {
       checkDate = day
      $.get("http://localhost/Doctor-s-office-management/public/appointments/hours/"+day, function(data, status){
         $('#hours').empty();
         for (const [key, value] of Object.entries(data)) {
            check = 1
            //console.log(`${key}: ${value}`);
            $('#hours').append(`<option value="${key}">${value}</option> `);
         }

  });
    }
      //$('#hours').empty().append('<option value="10">10</option>');
  }
 
});

</script>
 @include('layouts/footer')