document.addEventListener('DOMContentLoaded', function() {
    var canvas = document.getElementById('myChart');
    var ctx = canvas.getContext('2d');

    // Generowanie losowych danych - liczba osób w danym czasie
    var data = generateRandomData(5, 1, 100);

    // Rysowanie wykresu
    drawChart(ctx, data);
});

function generateRandomData(length, min, max) {
    var data = [];
    for (var i = 0; i < length; i++) {
        data.push({
            time: (i + 1) + 'h ago',
            count: Math.floor(Math.random() * (max - min + 1)) + min
        });
    }
    return data;
}

function drawChart(ctx, data) {
    var canvasWidth = 400;
    var canvasHeight = 200;
    var barWidth = 50;
    var spacing = 20;
    var startX = 20;
    var maxY = Math.max(...data.map(item => item.count));

    // Rysowanie osi Y
    ctx.beginPath();
    ctx.moveTo(startX, 20);
    ctx.lineTo(startX, canvasHeight - 20);
    ctx.stroke();

    // Rysowanie osi X
    ctx.beginPath();
    ctx.moveTo(startX, canvasHeight - 20);
    ctx.lineTo(canvasWidth - 20, canvasHeight - 20);
    ctx.stroke();

    // Rysowanie etykiet osi Y
    for (var i = 0; i <= 5; i++) {
        var label = Math.floor((maxY / 5) * i);
        var yPos = canvasHeight - 20 - (i / 5) * (canvasHeight - 40);

        ctx.font = '10px Arial';
        ctx.fillStyle = '#333';
        ctx.fillText(label, 5, yPos + 3);
    }

    // Rysowanie etykiet osi X
    for (var i = 0; i < data.length; i++) {
        var xPos = startX + (barWidth + spacing) * i + barWidth / 2;
        var yPos = canvasHeight - 10;

        ctx.font = '10px Arial';
        ctx.fillStyle = '#333';
        ctx.fillText(data[i].time, xPos, yPos);
    }

    // Rysowanie słupków
    for (var i = 0; i < data.length; i++) {
        var barHeight = (data[i].count / maxY) * (canvasHeight - 40);
        var xPos = startX + (barWidth + spacing) * i;
        var yPos = canvasHeight - 20 - barHeight;

        ctx.fillStyle = '#3498db';
        ctx.fillRect(xPos, yPos, barWidth, barHeight);
    }
}
