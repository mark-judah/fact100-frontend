<div>
    <h1 class="pl-10 pt-10 pb-3">Location of readers</h1>
    <div>
        {!! $chart->container() !!}
        @apexchartsScripts
        {{ $chart->script() }}
    </div>
</div>
