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
                <div class="col-md-3">
                    <a href="{{ route('admin.mgArticles.index') }}">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Total Articles</div>
                            <div class="counts">
                                @if ($article_count = App\Models\Article::count())
                                    {{$article_count}}
                                @endif

                                {{-- @if ($total_views = views(App\Models\Article::class)->count())
                                    {{$total_views}}
                                @endif --}}

                            </div>
                            <div class="desc">Since last month</div>
                        </div>
                        <div class="icon_section bg-primary">
                            {{-- <i class="fas fa-users"></i> --}}
                            <iconify-icon icon="iconoir:post-solid"></iconify-icon>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.mails.index') }}">
                    <div class="panel">
                        <div class="details_section">
                            <div class="name">Total Mails</div>
                            <div class="counts">
                                @if ($total_mails = App\Models\ContactMail::count())
                                    {{$total_mails}}
                                @endif
                            </div>
                            <div class="desc">Since last month</div>
                        </div>
                        <div class="icon_section bg-danger">
                            {{-- <i class="fas fa-ban"></i> --}}
                            <iconify-icon icon="fluent:mail-24-filled"></iconify-icon>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3">
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

                <div class="col-md-3">
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
            </div>
        </div>

        <div class="container">
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
