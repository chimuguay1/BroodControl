@include('layouts.head')
@section('content')

<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Edit sensor')</h2>
        <form action="{{ route('sensors.update', $sensor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="babyAnimals">
                <span>@lang('Baby Animals')</span>
                <select name="babyAnimals_id">
                    <option selected value="{{$sensor->babyAnimal->id}}">{{$sensor->babyAnimal->name}}</option>
                    @foreach ($babyAnimals as $babyAnimal)
                        <option value="{{$babyAnimal->id}}">{{$babyAnimal->name}}</option>
                    @endforeach
                </select>
            </label>

            <label for="heartRate">
                <span>@lang('Heart Rate')</span>
                <input type="string" name="heartRate" id="heartRate" value="{{$sensor->heartRate}}" required>
            </label>  

            <label for="bloodPressure">
                <span>@lang('Blood Pressure')</span><br>
                <input type="text" name="bloodPressure" id="bloodPressure" value="{{$sensor->bloodPressure}}" required>
            </label>

            <label for="breathingFrequency">
                <span>@lang('Breathing Frequency')</span>
                <input type="text" name="breathingFrequency" id="breathingFrequency" value="{{$sensor->breathingFrequency}}" required>
            </label>

            <label for="temperature">
                <span>@lang('Temperature')</span>
                <input type="text" name="temperature" id="temperature" value="{{$sensor->temperature}}" required>
            </label>

            <input type="submit"  class="btn" value="@lang('Save')">
        </form>
    </div>
</main>


@include('layouts.footer')