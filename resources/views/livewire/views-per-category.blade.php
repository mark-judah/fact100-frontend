<div>
    <h1 class="pl-10 pt-10 pb-3">Most viewed categories</h1>
    <div>
        {!! $chart->container() !!}
        @apexchartsScripts
        {{ $chart->script() }}
    </div>
</div>
