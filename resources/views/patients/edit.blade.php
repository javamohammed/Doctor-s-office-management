
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Edit Patient:</h6>
                <div class="mT-30">
                <form method="POST" action="{{route('update_patient', $patient->id)}}">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-6"><label for="firstname">First Name</label> <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name" value="{{ ($patient->firstname) ? $patient->firstname : old('firstname') }}">
                            @error('firstname')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6"><label for="lastname">Last Name</label> <input type="text" class="form-control  @error('lastname') is-invalid @enderror" name="lastname" placeholder="Last Name" value="{{ ($patient->lastname) ? $patient->lastname : old('lastname')}}">
                            @error('lastname')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                     </div>

                   
                      <div class="form-row">
                         <div class="form-group col-md-6"><label for="email">Email</label> <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{($patient->email) ? $patient->email : old('email')}}">
                            @error('email')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group"><label for="address">Address</label> <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" placeholder="1234 Main St" value="{{($patient->address) ? $patient->address : old('address')}}">
                        @error('address')
                                <p style="color: red">{{ $message }}</p>
                         @enderror
                    </div>
                      <div class="form-row">
                         <div class="form-group col-md-6"><label for="phone">Phone</label> <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{($patient->phone) ? $patient->phone : old('phone')}}">
                            @error('phone')
                                <p style="color: red">{{ $message }}</p>
                         @enderror
                        </div>
                         <div class="form-group col-md-4">
                            <label for="inputState">Sex</label> 
                            <select name="sex" class="form-control  @error('sex') is-invalid @enderror">
                               <option value="M">Male</option>
                               <option value="F">Famle</option>
                            </select>
                            @error('sex')
                                <p style="color: red">{{ $message }}</p>
                         @enderror
                         </div>
                      </div>
                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label class="fw-500">Birthdate</label>
                            <div class="timepicker-input input-icon form-group">
                               <div class="input-group">
                                  <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                  <input type="text" class="form-control bdc-grey-200 start-date  @error('birthday') is-invalid @enderror" name="birthday" placeholder="Datepicker" data-provide="datepicker" value="{{ ($patient->birthday) ? $patient->birthday : old('birthday')}}">
                                  @error('birthday')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                               </div>
                            </div>
                         </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                   </form>
                </div>
             </div>


        </div>
    </div>
 </main>

 @include('layouts/footer')