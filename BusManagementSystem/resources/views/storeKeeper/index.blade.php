{{-- @extends('storeKeeper.layouts.index1')
@section('main-content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Pie Chart</h4>

                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="mb-0">2536</h5>
                            <p class="text-muted text-truncate">Activated</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">69421</h5>
                            <p class="text-muted text-truncate">Pending</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">89854</h5>
                            <p class="text-muted text-truncate">Deactivated</p>
                        </div>
                    </div>

                    <canvas id="pie" height="260"></canvas>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Donut Chart</h4>

                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="mb-0">9595</h5>
                            <p class="text-muted text-truncate">Activated</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">36524</h5>
                            <p class="text-muted text-truncate">Pending</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">62541</h5>
                            <p class="text-muted text-truncate">Deactivated</p>
                        </div>
                    </div>

                    <canvas id="doughnut" height="260"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection --}}
{{-- 
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/busesdata', // The route you defined in Step 1
            type: 'GET',
            dataType: 'json',
            success: function(response) {


                // for (var i = 0; i < response.length; i++) {
                //   var label = response[i].label;
                //   var data = response[i].data;
                //   var color = response[i].color;

                //   // Print the data
                //   console.log('Label: ' + label);
                //   console.log('Data: ' + data);
                //   console.log('Color: ' + color);

                //   // You can further manipulate the data and display it on the page as needed
                //   // For example, append it to an HTML element
                //   $('#output').append('<p>Label: ' + label + '</p>');
                //   $('#output').append('<p>Data: ' + data + '</p>');
                //   $('#output').append('<p>Color: ' + color + '</p>');
                // }

                var flot_pie = function() {


                    // target
                    var placeholder = $("#js-pie-options");
                    /* init first plot */
                    $.plot(placeholder, response, {
                        series: {
                            pie: {
                                show: true
                            }
                        },
                        legend: {
                            show: true
                        }
                    });
                    //buttons
                    $(document).on('click', '.js-pie-example', function() {
                        $("#js-pie-options").unbind();
                        var id = this.id;
                        $(".js-pie-example").removeClass("active");
                        $("#" + id).addClass("active");
                        //$("#panel-12 .panel-hdr").addClass("highlight");
                        switch (true) {
                            case (id == "example-1"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Chart (default)</span>'
                                    );
                                $("#panel-12 .panel-tag").text(
                                    "The default pie chart with no options set");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    }
                                });
                                break;
                            case (id == "example-2"):
                                // code block
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Chart (legend)</span>'
                                    );
                                $("#panel-12 .panel-tag").text(
                                    "The default pie chart when the legend is disabled. Since the labels would normally be outside the container, the chart is resized to fit"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-3"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Custom Label Formatter</span>'
                                    );
                                $("#panel-12 .panel-tag").text(
                                    "Added a semi-transparent background to the labels and a custom labelFormatter function"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 1,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.8
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-4"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Radius</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie <code>radius: 3 / 4</code>"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-5"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Styles #1</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "Semi-transparent, black-colored label background"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5,
                                                    color: "#000"
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-6"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Styles #2</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "Semi-transparent, black-colored label background placed at pie edge"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 3 / 4,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5,
                                                    color: "#000"
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-7"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Hidden Labels</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "Labels can be hidden if the slice is less than a given percentage of the pie (10% in this case)"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 2 / 3,
                                                formatter: labelFormatter,
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-8"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Combined Slice</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "Multiple slices less than a given percentage (5% in this case) of the pie can be combined into a single, larger slice"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            combine: {
                                                color: "#999",
                                                threshold: 0.05
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-9"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Rectangular Pie</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "The radius can also be set to a specific size (even larger than the container itself)"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 500,
                                            label: {
                                                show: true,
                                                formatter: labelFormatter,
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-10"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Tilted Pie</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "The pie can be tilted at an angle");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            tilt: 0.5,
                                            label: {
                                                show: true,
                                                radius: 1,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.8
                                                }
                                            },
                                            combine: {
                                                color: "#999",
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-11"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Donut Hole</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "A donut hole can be added");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            innerRadius: 0.5,
                                            show: true
                                        }
                                    }
                                });
                                break;
                            case (id == "example-12"):
                                $("#panel-12 h2").html(
                                    'Pie <span class="fw-300 font-italic">Interactivity</span>'
                                    );
                                $("#panel-12 .panel-tag").html(
                                    "The pie can be made interactive with hover and click events"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            innerRadius: 0.5,
                                            show: true
                                        }
                                    }
                                });
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    grid: {
                                        hoverable: true,
                                        clickable: true
                                    }
                                });
                                placeholder.bind("plothover", function(event, pos,
                                obj) {
                                    if (!obj) {
                                        return;
                                    }
                                    var percent = parseFloat(obj.series.percent)
                                        .toFixed(2);
                                    $("#hover").html(
                                        "<span style='font-weight:bold; color:" +
                                        obj.series.color + "'>" + obj.series
                                        .label + " (" + percent +
                                        "%)</span>");
                                });
                                placeholder.bind("plotclick", function(event, pos,
                                obj) {
                                    if (!obj) {
                                        return;
                                    }
                                    percent = parseFloat(obj.series.percent)
                                        .toFixed(2);
                                    alert("" + obj.series.label + ": " +
                                        percent + "%");
                                });
                                break;
                        }
                    });
                }
                flot_pie();
                /* flot pie chart -- end*/

            },
            error: function(xhr, status, error) {
                console.error(error); // Output any errors to the console
            }
        });


        $.ajax({
            url: '/busesdata', // The route you defined in Step 1
            type: 'GET',
            dataType: 'json',
            success: function(response) {

                var flot_pie = function() {


                    // target
                    var placeholder = $("#js-pie-options1");
                    /* init first plot */
                    $.plot(placeholder, response, {
                        series: {
                            pie: {
                                show: true
                            }
                        },
                        legend: {
                            show: true
                        }
                    });

                    //buttons
                    $(document).on('click', '.js-pie-example1', function() {
                        $("#js-pie-options").unbind();
                        var id = this.id;
                        $(".js-pie-example1").removeClass("active");
                        $("#" + id).addClass("active");
                        //$("#panel-12 .panel-hdr").addClass("highlight");
                        switch (true) {
                            case (id == "example-13"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Chart (default)</span>'
                                    );
                                $("#panel-13 .panel-tag").text(
                                    "The default pie chart with no options set");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    }
                                });
                                break;
                            case (id == "example-14"):
                                // code block
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Chart (legend)</span>'
                                    );
                                $("#panel-13 .panel-tag").text(
                                    "The default pie chart when the legend is disabled. Since the labels would normally be outside the container, the chart is resized to fit"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-15"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Custom Label Formatter</span>'
                                    );
                                $("#panel-13 .panel-tag").text(
                                    "Added a semi-transparent background to the labels and a custom labelFormatter function"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 1,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.8
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-16"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Radius</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie <code>radius: 3 / 4</code>"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-17"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Styles #1</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "Semi-transparent, black-colored label background"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5,
                                                    color: "#000"
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-18"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Label Styles #2</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "Semi-transparent, black-colored label background placed at pie edge"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 3 / 4,
                                            label: {
                                                show: true,
                                                radius: 3 / 4,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.5,
                                                    color: "#000"
                                                }
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-19"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Hidden Labels</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "Labels can be hidden if the slice is less than a given percentage of the pie (10% in this case)"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 2 / 3,
                                                formatter: labelFormatter,
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-20"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Combined Slice</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "Multiple slices less than a given percentage (5% in this case) of the pie can be combined into a single, larger slice"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            combine: {
                                                color: "#999",
                                                threshold: 0.05
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-21"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Rectangular Pie</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "The radius can also be set to a specific size (even larger than the container itself)"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 500,
                                            label: {
                                                show: true,
                                                formatter: labelFormatter,
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-22"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Tilted Pie</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "The pie can be tilted at an angle");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            tilt: 0.5,
                                            label: {
                                                show: true,
                                                radius: 1,
                                                formatter: labelFormatter,
                                                background: {
                                                    opacity: 0.8
                                                }
                                            },
                                            combine: {
                                                color: "#999",
                                                threshold: 0.1
                                            }
                                        }
                                    },
                                    legend: {
                                        show: false
                                    }
                                });
                                break;
                            case (id == "example-23"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Donut Hole</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "A donut hole can be added");
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            innerRadius: 0.5,
                                            show: true
                                        }
                                    }
                                });
                                break;
                            case (id == "example-24"):
                                $("#panel-13 h2").html(
                                    'Pie <span class="fw-300 font-italic">Interactivity</span>'
                                    );
                                $("#panel-13 .panel-tag").html(
                                    "The pie can be made interactive with hover and click events"
                                    );
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            innerRadius: 0.5,
                                            show: true
                                        }
                                    }
                                });
                                $.plot(placeholder, response, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    grid: {
                                        hoverable: true,
                                        clickable: true
                                    }
                                });
                                placeholder.bind("plothover", function(event, pos,
                                obj) {
                                    if (!obj) {
                                        return;
                                    }
                                    var percent = parseFloat(obj.series.percent)
                                        .toFixed(2);
                                    $("#hover").html(
                                        "<span style='font-weight:bold; color:" +
                                        obj.series.color + "'>" + obj.series
                                        .label + " (" + percent +
                                        "%)</span>");
                                });
                                placeholder.bind("plotclick", function(event, pos,
                                obj) {
                                    if (!obj) {
                                        return;
                                    }
                                    percent = parseFloat(obj.series.percent)
                                        .toFixed(2);
                                    alert("" + obj.series.label + ": " +
                                        percent + "%");
                                });
                                break;
                        }
                    });
                }
                flot_pie();
                /* flot pie chart -- end*/

            },
            error: function(xhr, status, error) {
                console.error(error); // Output any errors to the console
            }
        });

    });


    //chart plotted over here my man
</script> --}}



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Dashboard | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
	<meta content="Themesbrand" name="author">
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	
	<!-- Bootstrap Css -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	
	<!-- Icons Css -->
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
	<!-- App Css-->
	<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
	
</head>


    <body data-sidebar="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

			@include("storeKeeper.layouts.header")
            @include("storeKeeper.layouts.sidebar")
         

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Chartjs charts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                            <li class="breadcrumb-item active">Chartjs charts</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Line Chart</h4>
        
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">86541</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">2541</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">102030</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="lineChart" height="300"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Bar Chart</h4>

                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">2541</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">84845</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">12001</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="bar" height="300"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Pie Chart</h4>
        
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">2536</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">69421</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">89854</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="pie" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Donut Chart</h4>
        
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">9595</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">36524</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">62541</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="doughnut" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Polar Chart</h4>

                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">4852</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">3652</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">85412</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="polarArea" height="300"> </canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Radar Chart</h4>

                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">694</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">55210</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">489498</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="radar" height="300"></canvas>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        {{-- <div class="right-bar">
            <div data-simplebar="" class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div> --}}
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- Chart JS -->
        <script src="{{asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/chartjs.init.js')}}"></script> 

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>
</html>
