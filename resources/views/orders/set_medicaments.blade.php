
<!-- header -->
@include('layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
        <div class="full-container">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Set Medicaments:</h6>
                <div class="mT-30">
                <form method="POST" action="{{route('save_set_medicaments',$id_order)}}">
                    @csrf
                    <div class="form-group">
                        <label class="fw-500">Description</label>
                        <textarea name="description" id="description" class="form-control bdc-grey-200 @error('description') is-invalid @enderror" rows="5" >
                            {{ ($medicament_selected->count() > 0) ? $medicament_selected->description : old('description') }}
                        </textarea>
                        @error('description')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputState">Medicament:</label> 
                        <div class="row">
                            <div class="col col-lg-2">
                                <label for="inputState">Avaliable Medicament :</label> 
                                <select id="medicament_init" class="form-control" multiple >
                                    @foreach ($medicaments as $medicament)
                                    <option value="{{$medicament->id}}">{{$medicament->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-auto">
                                <br>
                                <button class="btn btn-primary" id="add">>></button>
                                <br>
                                <br>
                                <button class="btn btn-primary" id="remove"><<</button>
                            </div>
                            <div class="col col-lg-2">
                                <label for="inputState">Selcted Medicament :</label> 
                                <select id="medicament_final" name="medicaments[]" class="form-control   @error('medicaments') is-invalid @enderror" multiple>
                                  
                                  </select>
                                  @error('medicaments')
                                    <p style="color: red">{{ $message }}</p>
                                   @enderror
                            </div>
                          </div>
                          
                        </div>
                      
                     </div>


                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <div class="form-group col-md-6">
                               
                            </div>
                         </div>
                    
                      
                   </form>
                </div>
             </div>


        </div>
    </div>
 </main>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    $( "#add" ).click(function(e) {
        e.preventDefault();
        $.each($("#medicament_init option:selected"), function(){            
            $(this).remove();
            $("#medicament_final").append(`<option value="${$(this).val() }">${$(this).text()}</option>`)
        });
        
    });

    $( "#remove" ).click(function(e) {
        e.preventDefault();
        $.each($("#medicament_final option:selected"), function(){            
            $(this).remove();
            $("#medicament_init").append(`<option value="${$(this).val() }">${$(this).text()}</option>`)
        });
        
    });


</script>
 @include('layouts/footer')