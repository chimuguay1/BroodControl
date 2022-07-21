@include('layouts.head')
@section('content')

<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Edit User')</h2>
        <form action="{{ route('user.update', ['user' => $users->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">
                <span>@lang('name')</span>
                <input type="text" name="name" id="name" value="{{ $users->name }}" required>
            </label>
            <label for="email">
                <span>@lang('Email Address')</span>
                <input type="email" name="email" id="email" value="{{ $users->email }}"  required>
            </label>
            <label for="password">
                <span>@lang('Password')</span>
                <input type="password" name="password" id="password" required>
            </label>
            <input type="submit"  class="btn" value="@lang('Save')">
        </form>
    </div>
</main>


@include('layouts.footer')