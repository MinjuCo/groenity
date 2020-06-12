google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(putChart);


function putChart(){
  var options = {
    vAxis: {minValue: 0, maxValue: 100},
    animation: {
      duration: 1000,
      easing: 'in'
    },
    legend: { position: 'bottom' },
    hAxis: {viewWindow: {min:1, max:14}}
  };
  
  
  var chart = new google.visualization.LineChart(document.getElementById('visualization'));
  var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dagen');
      data.addColumn('number', 'Elektriciteit');
      data.addColumn('number', 'Gas');

      data.addRows([
        [1,  37.8, 80.8],
        [2,  30.9, 69.5],
        [3,  25.4,   57],
        [4,  11.7, 18.8],
        [5,  11.9, 17.6],
        [6,   8.8, 13.6],
        [7,   7.6, 12.3],
        [8,  12.3, 29.2],
        [9,  16.9, 42.9],
        [10, 12.8, 30.9],
        [11,  5.3,  7.9],
        [12,  6.6,  8.4],
        [13,  4.8,  6.3],
        [14,  4.2,  6.2]
      ]);
  
  function drawChart() {
    google.visualization.events.addListener(chart, 'ready');
    chart.draw(data, options);
  }
  
  function generate(){
    if (data.getNumberOfRows() > 14) {
      options.hAxis.viewWindow.min += 1;
      options.hAxis.viewWindow.max += 1;
      drawChart();
    }
    // Generating a random x, y pair and inserting it so rows are sorted.
    var x = data.getNumberOfRows() + 1;
    var y = Math.floor(Math.random() * 100);
    var z = Math.floor(Math.random() * 100);
    var where = 0;
    while (where < data.getNumberOfRows() && parseInt(data.getValue(where, 0)) < x) {
      where++;
    }
    data.insertRows(where, [[x, y, z]]);
    drawChart();
  }
  
  setInterval(generate, 5000);
  drawChart();
}