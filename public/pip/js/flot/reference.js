
var data2_points = {
    show: true,
    radius: 1,
    fillColor: "dodgerblue",
    symbol: "diamond",
};
var data3_points = {
    show: true,
    radius: 3,
};
var data4_points = {
    //do not show points
    show: false,
    radius: 1,
    fillColor: "white",
};
function drawArrow(ctx, x, y, radius){
    ctx.beginPath();
    ctx.moveTo(x + radius, y + radius);
    ctx.lineTo(x, y);
    ctx.lineTo(x - radius, y + radius);
    ctx.stroke();
}
function drawSemiCircle(ctx, x, y, radius){
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI, false);
    ctx.moveTo(x - radius, y);
    ctx.lineTo(x + radius, y);
    ctx.stroke();
}
var legendContainer = document.getElementById("legendContainer");
var legendSettings = {
				position: "nw",
                show: true,
                container: legendContainer
};
$('#myForm input').on('change', function() {
    var val = $('input[name="myRadio"]:checked', '#myForm').val();
    $(legendContainer).html('');
    switch (val) {
        case 'se':
            legendSettings.position = "se"
            legendSettings.container = null;
            break;
        case 'sw':
            legendSettings.position = "sw"
            legendSettings.container = null;
            break;
        case 'ne':
            legendSettings.position = "ne"
            legendSettings.container = null;
            break;
        case 'nw':
            legendSettings.position = "nw"
            legendSettings.container = null;
            break;
        case 'container':
            legendSettings.container = legendContainer;
            break;
        }
        setupGraph();
});
$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");