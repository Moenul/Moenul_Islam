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
                            <div class="counts">43056</div>
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
                            <div class="counts">43056</div>
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
                    <div id="curve_chart" style="width: 1000px; height: 500px"></div>
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

    // var date = new Date().toLocaleDateString('en-us', { day:"numeric", month:"short"});

    const currentDate = new Date();
    let currentDay = currentDate.toDateString(currentDate.setDate(currentDate.getDate() + 0));
    let dayTwo = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    let dayThree = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    let dayFour = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    let dayFive = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    let daySix = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));
    let daySeven = currentDate.toDateString(currentDate.setDate(currentDate.getDate() - 1));


    var today_visitors = {{$today_visitors->sum('visits')}}
    var today_unique_visitors = {{$today_visitors->count()}}
    var today_Article_visitors = {{$today_Article_visitors->sum('visits')}}

    var oneDayAgo_visitors = {{$oneDayAgo_visitors->sum('visits')}}
    var oneDayAgo_unique_visitors = {{$oneDayAgo_visitors->count()}}
    var oneDayAgo_Article_visitors = {{$oneDayAgo_Article_visitors->sum('visits')}}

    var towDaysAgo_visitors = {{$towDaysAgo_visitors->sum('visits')}}
    var towDaysAgo_unique_visitors = {{$towDaysAgo_visitors->count()}}
    var towDaysAgo_Article_visitors = {{$towDaysAgo_Article_visitors->sum('visits')}}

    var threeDaysAgo_visitors = {{$threeDaysAgo_visitors->sum('visits')}}
    var threeDaysAgo_unique_visitors = {{$threeDaysAgo_visitors->count()}}
    var threeDaysAgo_Article_visitors = {{$threeDaysAgo_Article_visitors->sum('visits')}}

    var fourDaysAgo_visitors = {{$fourDaysAgo_visitors->sum('visits')}}
    var fourDaysAgo_unique_visitors = {{$fourDaysAgo_visitors->count()}}
    var fourDaysAgo_Article_visitors = {{$fourDaysAgo_Article_visitors->sum('visits')}}

    var fiveDaysAgo_visitors = {{$fiveDaysAgo_visitors->sum('visits')}}
    var fiveDaysAgo_unique_visitors = {{$fiveDaysAgo_visitors->count()}}
    var fiveDaysAgo_Article_visitors = {{$fiveDaysAgo_Article_visitors->sum('visits')}}

    var sixDaysAgo_visitors = {{$sixDaysAgo_visitors->sum('visits')}}
    var sixDaysAgo_unique_visitors = {{$sixDaysAgo_visitors->count()}}
    var sixDaysAgo_Article_visitors = {{$sixDaysAgo_Article_visitors->sum('visits')}}



    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([

        ['Day', 'Visits', 'Unique Visits', 'Article Page Visits'],
        [daySeven,  sixDaysAgo_visitors,      sixDaysAgo_unique_visitors,   sixDaysAgo_Article_visitors],
        [daySix,  fiveDaysAgo_visitors,      fiveDaysAgo_unique_visitors,   fiveDaysAgo_Article_visitors],
        [dayFive,  fourDaysAgo_visitors,      fourDaysAgo_unique_visitors,    fourDaysAgo_Article_visitors],
        [dayFour,  threeDaysAgo_visitors,      threeDaysAgo_unique_visitors,    threeDaysAgo_Article_visitors],
        [dayThree,  towDaysAgo_visitors,      towDaysAgo_unique_visitors,   towDaysAgo_Article_visitors],
        [dayTwo,  oneDayAgo_visitors,      oneDayAgo_unique_visitors,   oneDayAgo_Article_visitors],
        [currentDay,  today_visitors,      today_unique_visitors,   today_Article_visitors]
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
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
		['Germany', 200],
		['United States', 300],
		['Brazil', 400],
		['Canada', 500],
		['France', 600],
		['RU', 700]
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
		['Mushrooms', 3],
		['Onions', 1],
		['Olives', 1],
		['Zucchini', 1],
		['Pepperoni', 2]
	  ]);

	  // Set chart options
	  var options = {'title':'How Much Pizza I Ate Last Night',
					 'width':400,
					 'height':350};

	  // Instantiate and draw our chart, passing in some options.
	  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	  chart.draw(data, options);
	}
</script>


@endsection
