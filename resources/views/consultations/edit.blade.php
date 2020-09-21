
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Edit Consultation for : {{$consultation->patient->firstname }} {{$consultation->patient->lastname }} </h6>
                <div class="mT-30">
                <form method="POST" action="{{route('update_consultation', $consultation->id)}}">
                    @csrf

                    <div class="form-group">
                        <label class="fw-500">Diagnostic</label>
                        <textarea name="diagnostic" id="diagnostic" class="form-control bdc-grey-200 @error('diagnostic') is-invalid @enderror" rows="5" >
                            {{ ($consultation->diagnostic) ? $consultation->diagnostic : old('diagnostic') }}
                        </textarea>
                        @error('diagnostic')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                   </form>
                </div>
             </div>


        </div>
    </div>
 </main>

 @include('layouts/footer')