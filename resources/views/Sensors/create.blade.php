@include('layouts.head')
@section('content')
<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Add sensor')</h2>
        <form action="{{ url('sensors') }}" method="POST">
            @csrf
            <label for="babyAnimals">
                <span>@lang('Baby Animals')</span>
                <select name="babyAnimals_id">
                    <option selected disabled>@lang('Choose the baby Animal')</option>
                    @foreach ($babyAnimals as $babyAnimal)
                        <option value="{{$babyAnimal->id}}">{{$babyAnimal->name}}</option>
                    @endforeach
                </select>
            </label>

            <label for="heartRate">
                <span>@lang('Heart Rate')</span>
                <input type="text" name="heartRate" id="heartRate" required>
            </label>  

            <label for="bloodPressure">
                <span>@lang('Blood Pressure')</span><br>
                <input type="text" name="bloodPressure" id="bloodPressure" required>
            </label>

            <label for="breathingFrequency">
                <span>@lang('Breathing Frequency')</span>
                <input type="text" name="breathingFrequency" id="breathingFrequency" required>
            </label>

            <label for="temperature">
                <span>@lang('Temperature')</span>
                <input type="text" name="temperature" id="temperature" required>
            </label>


            <input type="submit"  class="btn" value="@lang("Save")">
        </form>
    </div>
</main>

@include('layouts.footer')