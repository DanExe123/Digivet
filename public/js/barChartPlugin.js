(function($) {
    $.fn.barChart = function(options) {
        // Default settings
        var settings = $.extend({
            data: [],
            labels: [],
            barColor: '#3498db',
            barWidth: '50px',
            barSpacing: '10px'
        }, options);

        // Function to generate the chart
        var createChart = function($element, data, labels) {
            $element.empty(); // Clear existing content

            // Container for the bars
            var $chartContainer = $('<div>', { class: 'bar-chart' });

            // Calculate max value for scaling
            var maxValue = Math.max.apply(null, data);

            $.each(data, function(index, value) {
                var $bar = $('<div>', {
                    class: 'bar',
                    css: {
                        height: (value / maxValue * 100) + '%',
                        width: settings.barWidth,
                        backgroundColor: settings.barColor,
                        marginRight: settings.barSpacing
                    }
                }).text(labels[index]);

                $chartContainer.append($bar);
            });

            $element.append($chartContainer);
        };

        return this.each(function() {
            createChart($(this), settings.data, settings.labels);
        });
    };
}(jQuery));