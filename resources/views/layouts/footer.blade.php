<head>
    <style>
        .row{
            display: grid;
            grid-template-columns: repeat(3, auto);
            padding: 0 40px;
            gap: 0px;
            align-items: center;
        }
        .dataTables_length > label{
            display: grid;
            grid-template-columns: repeat(3, auto);
            padding: 25px 50px;
            gap: 0px;
            align-items: center;
        }
        .dataTables_filter > label{
            display: grid;
            grid-template-columns: repeat(2, auto);
            padding: 25px 50px;
            gap: 0px;
            align-items: center;
        }
        .pagination > li    {
            margin-right: 5px;
        }
    </style>
</head>

</body>

<script type="text/javascript">
    function aside_container_sh(){
        var ac = document.getElementById('aside_container');
        var c = document.getElementById('content');
        var fix = document.getElementById('fix');
        if(ac.style.display == 'none'){
            ac.style.display = "block";
            c.style.width = "91.29%";
            fix.style.display = "block";
        }else{
            ac.style.display = "none";
            c.style.width = "100%";
            fix.style.display = "none";
        }
    }
</script>
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap-5.1.3-dist/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"> --}}

<script type="text/javascript">
    function full_screen(){
        var full_screen_element = document.querySelector(".antialiased");
        //full_screen_element.requestFullscreen({ navigationUI: "show" });
        if(full_screen_element.requestFullscreen()){
            document.exitFullscreen();
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        "use strict"; // Start of use strict
        $('#datatable').DataTable({
            retrieve: true,
            dom: "<'row'<'col-xs-12'l><'col-sm-12 text-center'B><'col-lg-12'f>>tp",
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "lengthMenu": [[5, 10, 15, 25, 50, -1], [5, 10, 15, 25, 50, "Todo"]],
            buttons: [
                {extend: 'excel', title: 'Listado', className: 'btn-sm'},
                {extend: 'pdf', title: 'Listado', className: 'btn-sm'},
            ]
        });
    });
</script>
@yield('js')
</html>