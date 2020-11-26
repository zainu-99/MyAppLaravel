
<tr @if($sparator =="") style="font-weight: bold" @endif>
    <td nowrap>{!!$sparator.($sparator==''?'':'❯ ').$child_GroupsLevel->name!!}</td>
    <td nowrap>{{$child_GroupsLevel->note}}</td>
    <td style="width: 237px">   
        <input class="checkbox" @if($child_GroupsLevel->isjoin == 1) checked @endif onclick="checkedJoin({{$child_GroupsLevel->id}},$(this).val());" type="checkbox">
    </td>
</tr>
@foreach ($child_GroupsLevel->GroupsLevel as $child_GroupsLevel)
    @include('appdashboard.sistemadmin.user.usergroup.tr_table', ['child_GroupsLevel' => $child_GroupsLevel,'sparator'=>$sparator.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
@endforeach 