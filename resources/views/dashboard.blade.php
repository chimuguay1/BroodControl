@include('layouts.head')
@section('content')
<div class="cards_container" id="cards_container">
    <div class="card">
        <span>@lang('Tasks to do')</span>
        <p>0</p>
    </div>
    <div class="card">
        <span>@lang('Completed tasks')</span>
        <p>0</p>
    </div>
</div>
@include('layouts.footer')