<?php $itemid = (isset($item_id)?$item_id:'') ?>
<option @if($itemid == $child->id) selected @endif class="parent_option" id="parent_option_{{$child->id}}" value="{{$child->id}}">{!!$sparator.($sparator==''?'':'❯ ').$child->menu_text!!}</option>
@foreach ($child->Menus as $parent)
    @include('appdashboard.masterdata.menu.option', ['child' => $parent,'sparator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',"item_id"=>$item->menu_app_id]) 
@endforeach 