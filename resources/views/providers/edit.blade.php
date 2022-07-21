@include('layouts.head')
@section('content')

<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Edit Provider')</h2>
        <form action="{{ route('providers.update', $provider->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">
                <span>@lang('name')</span>
                <input type="text" name="name" id="name" value="{{ $provider->name }}" required>
            </label>
            <input type="submit"  class="btn" value="@lang('Save')">
        </form>
    </div>
</main>


@include('layouts.footer')