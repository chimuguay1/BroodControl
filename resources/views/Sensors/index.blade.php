@include('layouts.head')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <main>
        <header class="indexH">
            <h1 class="titulo-registro">@lang('List of sensors')</h1>
            <button class="nuevo-registro-desktop" role="button" id="new-form"><a href="{{ url('sensors/create') }}">@lang('Add sensor')</a></button>
            <button class="nuevo-registro-movile" role="button" id="new-form-movile"> <a href="{{ url('sensors/create') }}"><img class="icono-new" src="{{asset('/img/icons/card-list.svg')}}" alt=""></a></button>
        </header>
        <div class="table-responsive">
            <table class="table" id="datatable">
                <thead class="table-dark">
                    <th>@lang('Animal name')</th>
                    <th>@lang('Heart Rate')</th>
                    <th>@lang('Blood Pressure')</th>
                    <th>@lang('Breathing Frequency')</th>
                    <th>@lang('Temperature')</th>
                    <th>@lang('Actions')</th>
                </thead>
                <tbody>
                    @foreach ($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->babyAnimal->name }}</td>
                        <td>{{ $sensor->heartRate}}</td>
                        <td>{{ $sensor->bloodPressure }}</td>
                        <td>{{ $sensor->breathingFrequency }}</td>
                        <td>{{ $sensor->temperature }}</td>
                        <td>
                            <form method="POST" action="{{route('sensors.destroy', $sensor->id)}}">
                                @csrf
                                @method('DELETE')
                                <a title="{{ __('Edit') }}" href="{{ route('sensors.edit', $sensor->id) }}" class="btn btn-primary btn-sm"><img src="{{asset('img/icons/pencil-square.svg')}}" style="-webkit-filter: grayscale(1) invert(1); filter: grayscale(1) invert(1);"></a> 
                                <a title="{{ __('Delete') }}" href="#" class="btn btn-danger btn-sm"  onclick="this.closest('form').submit();return false;"><img src="{{asset('img/icons/trash.svg')}}" style="-webkit-filter: grayscale(1) invert(1); filter: grayscale(1) invert(1);"></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>                
@include('layouts.footer')