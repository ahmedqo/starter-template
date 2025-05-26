<img slot="top" id="backgroun-image" src="{{ Neo::logo(true) }}" />
@if (Neo::preference())
    <style slot="styles" scoped>
        {{ Neo::colors(true) }}
    </style>
@endif
@include('shared.page.head')
@include('shared.page.foot')
