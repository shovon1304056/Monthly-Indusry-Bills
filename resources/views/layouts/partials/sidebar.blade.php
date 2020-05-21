<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          BMS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="{{Request::is('admin/dashboard*') ? 'nav-item active' : ''}}">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard </p>
            </a>
          </li>
            <li class="{{Request::is('admin/electricity*')? 'nav-item active':''}}">
            <a class="nav-link" href="{{route('electricity.index')}}">
              <i class="material-icons">add_photo_alternate</i>
              <p>Electricity</p>
            </a>
          </li>
          <li class="{{Request::is('admin/gass*') ? 'nav-item active':''}}">
            <a class="nav-link" href="{{route('gass.index')}}">
              <i class="material-icons">content_paste</i>
              <p>Gass</p>
            </a>
          </li>

            


        </ul>
      </div>
    </div>
