
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">New Medicament:</h6>
                <div class="mT-30">
                <form method="POST" action="{{route('new_medicament')}}">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-6"><label for="name">Name Medicament</label> <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name Medicament" value="{{old('name')}}">
                            @error('name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6"><label for="type_sick">Type sick</label> <input type="text" class="form-control  @error('type_sick') is-invalid @enderror" name="type_sick" placeholder="Type sick" value="{{old('type_sick')}}">
                            @error('type_sick')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                     </div>

                   
                     
                      <button type="submit" class="btn btn-primary">Save</button>
                   </form>
                </div>
             </div>


        </div>
    </div>
 </main>

 @include('layouts/footer')