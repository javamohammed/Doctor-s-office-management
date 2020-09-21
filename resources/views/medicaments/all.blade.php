
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
                @endif</h4>
                <div class="row">
                   <div class="col-md-12">
                      <div class="bgc-white bd bdrs-3 p-20 mB-20">
                         <h4 class="c-grey-900 mB-20">All Patients</h4>
                         <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                  <th>Name</th>
                                  <th>Type Sick</th>
                                  <th>Birthday</th>
                                  <th>Added At</th>
                                  <th>#</th>
                               </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                 <th>Name</th>
                                 <th>Type Sick</th>
                                 <th>Birthday</th>
                                 <th>Added At</th>
                                 <th>#</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($medicaments as $medicament)
                                  <tr>
                                      <td>{{$medicament->name}}</td>
                                      <td>{{$medicament->type_sick}}</td>
                                      <td>{{$medicament->birthday}}</td>
                                      <td>{{$medicament->created_at}}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                         
                         </table>
                      </div>
                   </div>
                </div>
             </div>
    </div>
 </main>

 @include('../layouts/footer')