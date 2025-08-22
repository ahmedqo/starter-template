<script src="{{ Neo::asset('js/neo/index.min.js') }}"></script>
<script src="{{ Neo::asset('js/trans.min.js') }}"></script>
<script src="{{ Neo::asset('js/dom.min.js') }}"></script>

@if ($type == 'admin')
    <script src="{{ Neo::asset('js/neo/plugins/index.min.js') }}"></script>
    <script src="{{ Neo::asset('js/index.min.js') }}"></script>
    <script>
        Neo.load(function() {
            Neo.getComponent("neo-datavisualizer").globals = [
                "{{ Neo::asset('css/print.min.css') }}"
            ];
        });

        Neo.load(function() {
            Neo.getComponent("neo-printer").globals = [
                "{{ Neo::asset('css/index.min.css') }}",
                "{{ Neo::asset('css/app.min.css') }}",
            ];
        });
    </script>
@endif

@if ($type == 'guest')
    <script src="{{ Neo::asset('js/neo/plugins/guest.min.js') }}"></script>
@endif

<script>
    Neo.load(function() {
        document.body.removeAttribute("close");
        document.body.querySelector("#neo-page-cover").remove();
        Neo.Helper.Theme.assign(
            "colors",
            "PRIME",
            getComputedStyle(document.documentElement)
            .getPropertyValue("--prime")
        );
        Neo.upgrade();
    });
</script>
@if (Session::has('message'))
    @php
        $messages = is_array(Session::get('message')) ? Session::get('message') : [Session::get('message')];
    @endphp
    <script>
        Neo.load(function() {
            @foreach ($messages as $message)
                Neo.Toaster.toast("{{ $message }}", "{{ Session::get('type') }}");
            @endforeach
        });
    </script>
@endif
