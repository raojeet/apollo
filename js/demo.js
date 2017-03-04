$(function () {

  'use strict';
  //-----------------------
  //- MONTHLY forecast CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = null;
  if(salesChartCanvas = $("#salesChart").get(0))
  {
    salesChartCanvas = salesChartCanvas.getContext("2d");

    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
      labels: ["February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "January"],
      datasets: [
        {
          label: "Estimate",
          fillColor: "rgb(210, 214, 222)",
          strokeColor: "rgb(210, 214, 222)",
          pointColor: "rgb(210, 214, 222)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgb(220,220,220)",
          data: [6500, 5900, 8000, 8100, 5600, 5500, 4000, 6500, 5900, 8000, 8100, 5600, 5500, 4000]
        },
        {
          label: "Actual",
          fillColor: "rgba(60,141,188,0.3)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [6250, 6000, 8500, 7000, 6000, 6000, 3500, 6250, 6000, 8500, 7000, 6000, 6000, 3500]
        }
      ]
    };

    var salesChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    salesChart.Line(salesChartData, salesChartOptions);
  }

  // Get context with jQuery - using jQuery's .get() method.
  var forecastChartCanvas = null;
  if(forecastChartCanvas = $("#forecastChart").get(0))
  {
    forecastChartCanvas = forecastChartCanvas.getContext("2d");

    // This will get the first returned node in the jQuery collection.
    var forecastChart = new Chart(forecastChartCanvas);

    var forecastChartData = {
      labels: ["November", "December", "January", "February", "March", "April", "May"],
      datasets: [
        {
          label: "Estimate",
          fillColor: "rgb(210, 214, 222)",
          strokeColor: "rgb(210, 214, 222)",
          pointColor: "rgb(210, 214, 222)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgb(220,220,220)",
          data: [8000, 8100, 7500, 5500, 5000, 6500, 5900, 8000, 8100, 5600, 5500, 4000, 6500, 5900]
        },
        {
          label: "Actual",
          fillColor: "rgba(60,141,188,0.3)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [6000, 8500, 7000, 6000]
        }
      ]
    };

    var forecastChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    forecastChart.Line(forecastChartData, forecastChartOptions);
  }


  $('.slider').slider({
    formatter: function(value) {
      return value + '%';
    }
  });
});
