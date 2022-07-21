@include('layouts.head')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <main>
        <header class="indexH">
            <h1 class="titulo-registro">@lang('Sick classification')</h1>
        </header>
        <div class="col-12 text-center">
            <button class="btn btn-secondary active" disabled>@lang('Sick classification')</button>
            <a href="{{url('clasificationHealthy')}}" class="btn btn-secondary" >@lang('Healthy classification')</a>
        </div>
        <div class="table-responsive">
            <table class="table" id="datatable">
                <thead class="table-dark">
                    <th>@lang('Animal name')</th>
                    <th>@lang('Heart Rate')</th>
                    <th>@lang('Blood Pressure')</th>
                    <th>@lang('Breathing Frequency')</th>
                    <th>@lang('Temperature')</th>
                </thead>
                <tbody>
                    @foreach ($sensors as $sensor)
                    @if($sensor->temperature > '39.5' && $sensor->heartRate < '70' || $sensor->heartRate > '80' && $sensor->breathingFrequency < '15' || $sensor->breathingFrequency > '20' && $sensor->bloodPressure > '10')
                        <tr>
                            <td>{{ $sensor->babyAnimal->name }}</td> 
                            <td>{{ $sensor->heartRate}}</td>
                            <td>{{ $sensor->bloodPressure }}</td> 
                            <td>{{ $sensor->breathingFrequency }}</td>
                            <td>{{ $sensor->temperature }}</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>                
@include('layouts.footer')