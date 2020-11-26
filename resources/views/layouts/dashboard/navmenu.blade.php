@if(Session::has('menu'))
   @foreach(Session::get('menu') as $key=>$item)
        @include('layouts.dashboard.itemmenu', ['itemmenu' => $item],['treeview' => (count($item->Menus)>0)])        
   @endforeach
@endif