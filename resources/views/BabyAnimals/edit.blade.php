@include('layouts.head')
@section('content')

<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Edit babyAnimal')</h2>
        <form action="{{ route('babyAnimals.update', $babyAnimal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="providers">
                <span>@lang('Providers')</span>
                <select name="provider_id">
                    <option selected value="{{$babyAnimal->provider->id}}">{{$babyAnimal->provider->name}}</option>
                    @foreach ($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
            </label>

            <label for="date">
                <span>@lang('Date')</span>
                <input type="date" name="date" id="date" value="{{$babyAnimal->date}}" required>
            </label>  

            <label for="weight">
                <span>@lang('Weight')</span><br>
                <input type="text" name="weight" id="weight" value="{{$babyAnimal->weight}}" required>
            </label>

            <label for="cost">
                <span>@lang('Cost')</span>
                <input type="text" name="cost" id="cost" value="{{$babyAnimal->cost}}" required>
            </label>

            <label for="name">
                <span>@lang('name')</span>
                <input type="text" name="name" id="name" value="{{$babyAnimal->name}}" required>
            </label>

            <label for="description">
                <span>@lang('Description')</span>
                <textarea name="description" cols="40" rows="10">{{$babyAnimal->description}}</textarea>
            </label>
            <input type="submit"  class="btn" value="@lang('Save')">
        </form>
    </div>
</main>


@include('layouts.footer')