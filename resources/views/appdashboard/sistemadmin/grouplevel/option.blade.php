<option class="parent_option" id="parent_option_{{$child->id}}" value="{{$child->id}}">{!!$sparator.($sparator==''?'':'❯ ').$child->name!!}</option>
@foreach ($child->GroupsLevel as $parent)
    @include('appdashboard.sistemadmin.grouplevel.option', ['child' => $parent,'sparator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;']) 
@endforeach 