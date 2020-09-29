<div class="sidebar">
    <div class="sidebar-inner">
       <div class="sidebar-logo">
          <div class="peers ai-c fxw-nw">
             <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="index.html">
                   <div class="peers ai-c fxw-nw">
                      <div class="peer">
                         <div class="logo"><img src="{{asset('assets/static/images/logo.png')}}" alt=""></div>
                      </div>
                      <div class="peer peer-greed">
                         <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                      </div>
                   </div>
                </a>
             </div>
             <div class="peer">
                <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
             </div>
          </div>
       </div>
       <ul class="sidebar-menu scrollable pos-r">
          <li class="nav-item mT-30 actived"><a class="sidebar-link" href="{{route('dashboard')}}"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
          <li class="nav-item dropdown">
             <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Patients</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
             <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="{{route('all_patient')}}">👩‍⚖️  All</a></li>
               <li><a class="sidebar-link" href="{{route('new_patient')}}">👩‍⚖️ +</a></li>
             </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-deep-orange-500 ti-calendar"></i> </span><span class="title">Appointments</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
            <ul class="dropdown-menu">
               <li><a class="sidebar-link" href="{{route('all_appointment')}}"><i class="c-deep-orange-500 ti-calendar"></i>  All</a></li>
              <li><a class="sidebar-link" href="{{route('new_appointment')}}"><i class="c-deep-orange-500 ti-calendar"></i>  New</a></li>
            </ul>
         </li>
         <li class="nav-item">
               <a class="sidebar-link" href="{{route('all_consultation')}}">
               <span class="icon-holder"><i class="c-light-blue-500 ti-pencil"></i> </span><span class="title">Cosultations</span>
            </a>
         </li>

         <li class="nav-item">
            <a class="sidebar-link" href="{{route('orders_consultation')}}">
            <span class="icon-holder"><i class="c-light-blue-500 ti-pencil"></i> </span><span class="title">Orders</span>
         </a>
      </li>

         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder">💊</span><span class="title">Medicaments</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
            <ul class="dropdown-menu">
               <li><a class="sidebar-link" href="{{route('all_medicament')}}">📍  All</a></li>
              <li><a class="sidebar-link" href="{{route('new_medicament')}}">📍  New</a></li>
            </ul>
         </li>

         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder">✔️</span><span class="title">Roles</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
            <ul class="dropdown-menu">
               <li><a class="sidebar-link" href="{{route('roles.index')}}">All Roles</a></li>
              <li><a class="sidebar-link" href="{{route('roles.create')}}">New Role</a></li>
              <li><a class="sidebar-link" href="{{route('permissions.index')}}">All Permissions</a></li>
              <li><a class="sidebar-link" href="{{route('permissions.create')}}">New Permission</a></li>
            </ul>
         </li>

       </ul>
    </div>
</div>