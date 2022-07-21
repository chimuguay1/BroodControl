@include('layouts.head')
@section('content')
<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Add Provider')</h2>
        <form action="{{ url('providers') }}" method="POST">
            @csrf
            <label for="name">
                <span>@lang('name')</span>
                <input type="text" name="name" id="name" required>
            </label>
            <input type="submit"  class="btn" value="@lang("Save")">
        </form>
    </div>
</main>

@include('layouts.footer')