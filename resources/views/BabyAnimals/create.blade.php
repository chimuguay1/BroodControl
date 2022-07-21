@include('layouts.head')
@section('content')
<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Add babyAnimal')</h2>
        <form action="{{ url('babyAnimals') }}" method="POST">
            @csrf
            <label for="providers">
                <span>@lang('Providers')</span>
                <select name="provider_id">
                    <option selected disabled>@lang('Choose the Provider')</option>
                    @foreach ($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
            </label>

            <label for="date">
                <span>@lang('Date')</span>
                <input type="date" name="date" id="date" required>
            </label>  

            <label for="weight">
                <span>@lang('Weight')</span><br>
                <input type="text" name="weight" id="weight" required>
            </label>

            <label for="cost">
                <span>@lang('Cost')</span>
                <input type="text" name="cost" id="cost" required>
            </label>

            <label for="name">
                <span>@lang('name')</span>
                <input type="text" name="name" id="name" required>
            </label>

            <label for="description">
                <span>@lang('Description')</span>
                <textarea name="description" cols="40" rows="10"></textarea>
            </label>

            <input type="submit"  class="btn" value="@lang("Save")">
        </form>
    </div>
</main>

@include('layouts.footer')