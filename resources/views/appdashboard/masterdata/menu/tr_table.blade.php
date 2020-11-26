<tr @if($sparator =="") style="font-weight: bold" @endif>
    <td nowrap>{!!$sparator.($sparator==''?'':'❯ ').$item->menu_text!!}</td>
    <td nowrap>{{$item->role_name}}</td>
    <td nowrap>{{$item->role_url}}</td>
    <td nowrap>{!!$item->icon!!}</td>
    <td nowrap>{{$item->order_sort}}</td>
    <td nowrap>{{$item->created_at}}</td>
    <td nowrap>{{$item->updated_at}}</td>
    <td style="width: 237px">    
        @include('layouts.action.edit-button') 
        @include('layouts.action.delete-button')  
    </td>
</tr>
@foreach ($item->Menus as $childrenMenus)
    @include('appdashboard.masterdata.menu.tr_table', ['item' => $childrenMenus,'sparator'=>$sparator.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
@endforeach 