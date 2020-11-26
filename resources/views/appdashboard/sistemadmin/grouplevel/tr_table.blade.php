<tr @if($sparator =="") style="font-weight: bold" @endif>
    <td nowrap>{!!$sparator.($sparator==''?'':'❯ ').$child_GroupsLevel->name!!}</td>
    <td nowrap>{{$child_GroupsLevel->note}}</td>
    <td nowrap>{{$child_GroupsLevel->created_at}}</td>
    <td nowrap>{{$child_GroupsLevel->updated_at}}</td>
    <td style="width: 237px">   
        <a class="btn btn-xs btn-info text-light" href="{{ url('/appdashboard/adminsystem/grouplevel/rolegrouplevel/')}}/{{$child_GroupsLevel->id}}"><i class="fas fa-shield-alt"></i></a> 
        <a class="btn btn-xs btn-success text-light" onclick="editRow({{$child_GroupsLevel->id}},{{$child_GroupsLevel->id_group}},{{($child_GroupsLevel->group_level_id==''?-1:$child_GroupsLevel->group_level_id)
            }},'{{$child_GroupsLevel->note}}');"><i class="fa fa-edit"></i></a>
         @include('layouts.action.delete-button',['item'=>$child_GroupsLevel]) 
    </td>
</tr>
@foreach ($child_GroupsLevel->GroupsLevel as $child_GroupsLevel)
    @include('appdashboard.sistemadmin.grouplevel.tr_table', ['child_GroupsLevel' => $child_GroupsLevel,'sparator'=>$sparator.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
@endforeach 