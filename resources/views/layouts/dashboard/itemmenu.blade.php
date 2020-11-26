@if($treeview)
    <li class="nav-item has-treeview menu-close">
        <a href="#" class="nav-link ">
            {!!$itemmenu->icon!!}
          <p>
            {{$itemmenu->menu_text}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach($itemmenu->Menus as $key=>$childrenMenus)
                @include('layouts.dashboard.itemmenu', ['itemmenu' => $childrenMenus],['treeview' => (count($childrenMenus->Menus)>0)])      
            @endforeach
        </ul>
    </li>
@else
    <li class="nav-item">
        <a href="{{ url('').$itemmenu->role_url }}" class="nav-link item-menu">
            {!!$itemmenu->icon!!}
                <p>{{$itemmenu->menu_text}}</p>
          </a>
    </li>
@endif