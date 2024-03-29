@extends('layouts.admin')


@section('admin_side_nav')
    @include('includes.admin_side_nav')
@endsection

@section('admin_nav_bar')
    @include('includes.admin_nav_bar')
@endsection


@section('content')

    <!-- start header -->
	<div class="header">
		<h3>Dashboard</h3>&nbsp;&nbsp;<span>Website Traffic</span>
		<hr>
	</div>
	<!-- end header -->

    <!-- start dashboard content -->
    <div class="container">

        {{-- @if ($visitorByDate->count())
            @foreach ($visitorByDate as $visitors => $veisitorList)
                {!! $visitors !!},
                home = {{$veisitorList->where('page','Home')->count()}} - {{$veisitorList->where('page','Home')->sum('visits')}},
                article = {{$veisitorList->where('page','Article')->count()}} - {{$veisitorList->where('page','Article')->sum('visits')}},
                {{$veisitorList->sum('visits')}},
                date = {{$veisitorList->first()->created_at->subDays(1)}}

                article visits {{views(App\Models\Article::class)->period(CyrildeWit\EloquentViewable\Support\Period::create($veisitorList->first()->created_at->subDays(1), $visitors))->count()}}
                <hr>
            @endforeach
        @endif --}}

        <div class="panel_section">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('admin.mgArticles.index') }}">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Total Articles</div>
                            <div class="counts">
                                @if ($article_count = App\Models\Article::whereDate('created_at','>=', \Carbon\Carbon::today()->subDays(30))->count())
                                    {{$article_count}}
                                @endif
                            </div>
                            <div class="desc">Since last 30 days</div>
                        </div>
                        <div class="icon_section bg-primary">
                            {{-- <i class="fas fa-users"></i> --}}
                            <iconify-icon icon="iconoir:post-solid"></iconify-icon>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3 mb-3">
                    <a href="{{ route('admin.mails.index') }}">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Total Mails</div>
                            <div class="counts">
                                @if ($total_mails = App\Models\ContactMail::whereDate('created_at','>=', \Carbon\Carbon::today()->subDays(30))->count())
                                    {{$total_mails}}
                                @endif
                            </div>
                            <div class="desc">Since last 30 days</div>
                        </div>
                        <div class="icon_section bg-danger">
                            {{-- <i class="fas fa-ban"></i> --}}
                            <iconify-icon icon="fluent:mail-24-filled"></iconify-icon>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Category Name</div>
                            <div class="counts">0</div>
                            <div class="desc">Since last month</div>
                        </div>
                        <div class="icon_section bg-success">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Category Name</div>
                            <div class="counts">0</div>
                            <div class="desc">Since last month</div>
                        </div>
                        <div class="icon_section bg-info">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Visitors</div>
                            <div class="counts">
                                @if ($total_visitors == true)
                                    {{$total_visitors->sum('visits')}}
                                @endif
                            </div>
                            <div class="desc">Since last 7 days</div>
                        </div>
                        <div class="icon_section bg-secondary">
                            <iconify-icon icon="fluent:people-12-filled"></iconify-icon>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Unique Visitors</div>
                            <div class="counts">
                                @if ($total_visitors == true)
                                    {{$total_visitors->count()}}
                                @endif
                            </div>
                            <div class="desc">Since last 7 days</div>
                        </div>
                        <div class="icon_section text-light bg-dark">
                            <iconify-icon icon="fluent:people-list-20-filled"></iconify-icon>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Article Page Visitors</div>
                            <div class="counts">
                                @if ($total_article_visitors == true)
                                    {{$total_article_visitors->sum('visits')}}
                                @endif
                            </div>
                            <div class="desc">Since last 7 days</div>
                        </div>
                        <div class="icon_section bg-primary">
                            <iconify-icon icon="grommet-icons:article"></iconify-icon>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Total Article Views</div>
                            <div class="counts">
                                @if ($total_views = views(App\Models\Article::class)->period(CyrildeWit\EloquentViewable\Support\Period::pastDays(7))->count())
                                    {{$total_views}}
                                @endif
                            </div>
                            <div class="desc">Since last 7 days</div>
                        </div>
                        <div class="icon_section text-dark bg-warning">
                            <iconify-icon icon="ph:pen-nib-fill"></iconify-icon>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div id="regions_div" ></div>
                </div>
                <div class="col-md-4">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- end dashboard content -->

@endsection

@section('script')


<script type="text/javascript">

    // date string formating way -----------
    // var date = new Date().toLocaleDateString('en-us', { day:"numeric", month:"short"});
    // const currentDate = new Date();
    // let currentDay = currentDate.toDateString(currentDate.setDate(currentDate.getDate() + 0));
    // let dayTwo = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    // let dayThree = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));

    // date string formating way -----------


    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([

        ['Day', 'Views', 'Unique Views', 'Article Page View', 'Article Page Unique View','Article Views'],

        @php
            foreach($visitorByDate as $visitors => $veisitorList) {
                echo "['".$visitors."', ".$veisitorList->where('page','Home')->sum('visits').", ".$veisitorList->where('page','Home')->count().", ".$veisitorList->where('page','Article')->sum('visits').", ".$veisitorList->where('page','Article')->count().", ".views(App\Models\Article::class)->period(CyrildeWit\EloquentViewable\Support\Period::create($veisitorList->first()->created_at->subDays(1), $visitors))->count()."],";
            }
        @endphp
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'right' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
</script>



<script type="text/javascript">
	google.charts.load('current', {
	  'packages':['geochart'],
	});
	google.charts.setOnLoadCallback(drawRegionsMap);

	function drawRegionsMap() {
	  var data = google.visualization.arrayToDataTable([
		['Country', 'Popularity'],
        @php
            foreach($visitorByCountry as $visitors => $veisitorList) {
                echo "['".$visitors."', ".$veisitorList->count()."],";
            }
        @endphp
	  ]);

	  var options = {};

	  var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

	  chart.draw(data, options);
	}
</script>

<script type="text/javascript">

	// Load the Visualization API and the corechart package.
	google.charts.load('current', {'packages':['corechart']});

	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table,
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

	  // Create the data table.
	  var data = new google.visualization.DataTable();
	  data.addColumn('string', 'Topping');
	  data.addColumn('number', 'Slices');
	  data.addRows([

        @php
            foreach($visitorByCountry as $visitors => $veisitorList) {
                echo "['".$visitors."', ".$veisitorList->count()."],";
            }
        @endphp

	  ]);

	  // Set chart options
	  var options = {'title':'Visitor trafic by country in last 30 days',
					 'width':400,
					 'height':350};

	  // Instantiate and draw our chart, passing in some options.
	  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	  chart.draw(data, options);
	}
</script>


@endsection
