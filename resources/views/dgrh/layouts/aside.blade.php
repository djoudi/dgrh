<div class="sidebar" data-color="azure" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
      <a href="{!! config('app.url') !!}" class="simple-text logo-mini">
        {!! config('app.name') !!}
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="#">
            <i class="material-icons">dashboard</i>
            <p>لوحة التحكم</p>
          </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{!! url('/users/') !!}">
              <i class="material-icons text-info">group</i>
              <p>إدارة المستخدمين</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons text-danger">live_tv</i>
              <p>إدارة الإجتماعات</p>
            </a>
          </li>
        <!-- your sidebar here -->
      </ul>
    </div>
  </div>
