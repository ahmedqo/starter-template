<img slot="top" id="backgroun-image" src="{{ Neo::logo() }}" />
@if (Neo::preference())
    <style slot="styles">
        {{ Neo::colors() }}
    </style>
@endif
@include('shared.page.head')
@include('shared.page.foot')
