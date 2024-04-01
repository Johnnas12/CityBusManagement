!(function (l) {
    "use strict";
    function r() {}
    (r.prototype.respChart = function (r, o, e, a) {
        (Chart.defaults.global.defaultFontColor = "#8791af"),
            (Chart.defaults.scale.gridLines.color = "rgba(166, 176, 207, 0.1)");
        var t = r.get(0).getContext("2d"),
            n = l(r).parent();
        function i() {
            r.attr("width", l(n).width());
            switch (o) {
                case "Line":
                    new Chart(t, { type: "line", data: e, options: a });
                    break;
                case "Pie":
                    new Chart(t, { type: "pie", data: e, options: a });
                    break;
                
            }
        }
        l(window).resize(i), i();
    }),
        (r.prototype.init = function () {
      
          
            this.respChart(l("#pie"), "Pie", {
                labels: ["Desktops", "Tablets"],
                datasets: [
                    {
                        data: [300, 180],
                        backgroundColor: ["#34c38f", "#ebeff2"],
                        hoverBackgroundColor: ["#34c38f", "#ebeff2"],
                        hoverBorderColor: "#fff",
                    },
                ],

            });
        
          
          
          
        }),
        (l.ChartJs = new r()),
        (l.ChartJs.Constructor = r);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.ChartJs.init();
    })();
