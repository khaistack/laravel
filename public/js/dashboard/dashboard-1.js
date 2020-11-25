(function($) {

    $('.deleted').on('click', function() {
        alert('Bạn có chắc chắn muốn xoá không ?')
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        var box = $(this).closest('.accordion');
        var id = $(this).attr('data-id');
        let token = $('meta[name=csrf-token]').attr('content');
        $.ajax({
            type: 'POST',
            url: '/admin/roles/destroy/',
            data: {
                'id': id,
                '_token': token
            },
            success: function(data) {
                // console.log(data);
                if (data) {
                    $(box).remove();
                    // console.log($(this).closest('.accordion'));
                    toastr.success(data, 'Xoá Thành Công');
                }
            }
        })
    });

    $('#delete-user').on('click', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/user/destroy',
            type: 'GET',
            dataType: 'JSON',
            data: {
                'param': data_param
            }
        }).done(function(res) {
            console.log(res);
            renderData(res)
        })
    });
    /* "use strict" */
    $("#daily").on('click', function() {
        $.ajax({
            url: 'data-chart',
            type: 'GET',
            dataType: 'JSON',
        }).done(function(res) {
            console.log(res);
        })
    });

    function renderData(res) {
        res.forEach(element => {

            var html = '<div class="d-flex order-manage p-3 align-items-center mb-4">' +
                '<a href="javascript:void(0);" class="btn fs-22 py-1 btn-success px-4 mr-3">' + element.dataCount + '</a>' +
                '<h4 class="mb-0">New Orders <i class="fa fa-circle text-success ml-1 fs-15"></i></h4>' +
                '<a href="admin/orders/showListOrders" class="ml-auto text-primary font-w500"> Quản Lí orders  <i class="ti-angle-right ml-1"></i></a></div>'

            $('#orders-summary').html(html);
        });
    }

    $("#OrdersMonthly").on('click', function() {
        $('.nav-item a.active').removeClass('active');
        $(this).addClass('active')
            // var data_param = $(this).attr('whereMonth');
        $.ajax({
            url: 'data-orderAnalyticMonth',
            type: 'GET',
            dataType: 'JSON',
            // data: {
            //     'param': data_param
            // }
        }).done(function(res) {
            console.log(res);
            renderData(res)
        })
    })

    $("#OrdersToday").on('click', function() {
        $('.nav-item a.active').removeClass('active');
        $(this).addClass('active')
            // var data_param = $(this).attr('whereMonth');
        $.ajax({
            url: 'data-orderAnalyticDay',
            type: 'GET',
            dataType: 'JSON',
            // data: {
            //     'param': data_param
            // }
        }).done(function(res) {
            console.log(res);
            renderData(res)
        })
    })

    var dzChartlist = function() {

        var screenWidth = $(window).width();


        var activityBar = function() {
            var activity = document.getElementById("activity");
            if (activity !== null) {
                var activityData = [{
                        first: [35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 30, 25, 22, 20, 45, 35]
                    },
                    {
                        first: [50, 35, 10, 45, 40, 50, 60, 35, 10, 50, 34, 35, 50, 35, 10, 45, 40, 50, 60, 35, 10, 50, 34, 35, 60, 35, 10, 50, 34, 35]
                    },
                    {
                        first: [20, 35, 60, 45, 40, 35, 30, 35, 10, 40, 60, 20, 20, 35, 60, 45, 40, 55, 30, 35, 10, 33, 60, 20, 30, 35, 55, 33, 60, 20]
                    },
                    {
                        first: [25, 88, 25, 50, 21, 42, 60, 33, 50, 60, 50, 20, 25, 55, 25, 50, 18, 25, 22, 15, 50, 60, 50, 25, 60, 45, 50, 60, 50, 20]
                    }
                ];
                activity.height = 170;

                var config = {
                    type: "bar",
                    data: {
                        labels: [
                            "01",
                            "02",
                            "03",
                            "04",
                            "05",
                            "06",
                            "07",
                            "08",
                            "09",
                            "10",
                            "11",
                            "12",
                            "13",
                            "14",
                            "15",
                            "16",
                            "17",
                            "18",
                            "19",
                            "20",
                            "21",
                            "22",
                            "23",
                            "24",
                            "25",
                            "26",
                            "27",
                            "28",
                            "29",
                            "30"
                        ],
                        datasets: [{
                            label: "My First dataset",
                            data: [35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 30, 25, 22, 20, 45, 35],
                            borderColor: 'rgba(47, 76, 221, 1)',
                            borderWidth: "0",
                            barThickness: 'flex',
                            backgroundColor: 'rgba(47, 76, 221, 1)',
                            minBarLength: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,

                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: "rgba(233,236,255,1)",
                                    drawBorder: true
                                },
                                ticks: {
                                    fontColor: "#3e4954",
                                    max: 60,
                                    min: 0,
                                    stepSize: 20
                                },
                            }],
                            xAxes: [{
                                barPercentage: 0.3,

                                gridLines: {
                                    display: false,
                                    zeroLineColor: "transparent"
                                },
                                ticks: {
                                    stepSize: 20,
                                    fontColor: "#3e4954",
                                    fontFamily: "Nunito, sans-serif"
                                }
                            }]
                        },
                        tooltips: {
                            mode: "index",
                            intersect: false,
                            titleFontColor: "#888",
                            bodyFontColor: "#555",
                            titleFontSize: 12,
                            bodyFontSize: 15,
                            backgroundColor: "rgba(255,255,255,1)",
                            displayColors: true,
                            xPadding: 10,
                            yPadding: 7,
                            borderColor: "rgba(220, 220, 220, 1)",
                            borderWidth: 1,
                            caretSize: 6,
                            caretPadding: 10
                        }
                    }
                };

                var ctx = document.getElementById("activity").getContext("2d");
                var myLine = new Chart(ctx, config);

                var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
                items.forEach(function(item, index) {
                    item.addEventListener("click", function() {
                        config.data.datasets[0].data = activityData[index].first;
                        myLine.update();
                    });
                });
            }
        }
        var donutChart = function() {
            $("span.donut").peity("donut", {
                width: "140",
                height: "140",
                stroke: "#4d89f9",
                strokeWidth: "10",
            });
        }

        var chartBar = function() {

            var options = {
                series: [{
                        name: 'Thu Nhập',
                        data: [1, 23, 41, 42, 6, 12, 89],
                    },
                    {
                        name: 'Lợi Nhuận',
                        data: [1, 23, 3, 42, 6, 3, 2]
                    },

                ],
                chart: {
                    type: 'area',
                    height: 350,

                    toolbar: {
                        show: false,
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                colors: ['#2f4cdd', '#b519ec'],
                dataLabels: {
                    enabled: false,
                },
                markers: {
                    shape: "circle",
                },


                legend: {
                    show: true,
                    fontSize: '12px',

                    labels: {
                        colors: '#000000',

                    },
                    position: 'top',
                    horizontalAlign: 'left',
                    markers: {
                        width: 19,
                        height: 19,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 4,
                        offsetX: -5,
                        offsetY: -5
                    }
                },
                stroke: {
                    show: true,
                    width: 4,
                    colors: ['#2f4cdd', '#b519ec'],
                },

                grid: {
                    borderColor: '#eee',
                },
                xaxis: {

                    categories: ['day'],
                    labels: {
                        style: {
                            colors: '#3e4954',
                            fontSize: '13px',
                            fontFamily: 'Poppins',
                            fontWeight: 100,
                            cssClass: 'apexcharts-xaxis-label',
                        },
                    },
                    crosshairs: {
                        show: false,
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#3e4954',
                            fontSize: '13px',
                            fontFamily: 'Poppins',
                            fontWeight: 100,
                            cssClass: 'apexcharts-xaxis-label',
                        },
                    },
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            };

            var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
            chartBar1.render();
        }

        var counterBar = function() {
            $(".counter").counterUp({
                delay: 30,
                time: 3000
            });
        }


        /* Function ============ */
        return {
            init: function() {},


            load: function() {
                activityBar();
                donutChart();
                chartBar();
                counterBar();
            },

            resize: function() {

            }
        }

    }();

    jQuery(document).ready(function() {});

    jQuery(window).on('load', function() {
        setTimeout(function() {
            dzChartlist.load();
        }, 1000);

    });

    jQuery(window).on('resize', function() {


    });

})(jQuery);