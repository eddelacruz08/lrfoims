<script>
    var briteChartApp=window.briteChartApp||{};
    !function(i,e){"use strict";
        var c=["#0acf97","#f9bc0d","#fa5c7c","#727cf5","#ffbc00","#39afd1","#e3eaef"];
            e.createBarChart=function(e,t){
                var a=i(e).data("colors"),l=a?a.split(","):c.concat(),
                n=new britecharts.miniTooltip,
                u=new britecharts.bar,
                o=d3.select(e),
                r=!!o.node()&&o.node().getBoundingClientRect().width,
                d=!!o.node()&&o.node().getBoundingClientRect().height;
                u.isAnimated(!0).width(r).height(d).margin({
                    top:10,
                    left:55,
                    bottom:20,
                    right:10
                })
                .betweenBarsPadding(.5).colorSchema(l).on("customMouseOver",n.show).on("customMouseMove",n.update).on("customMouseOut",n.hide),
                o.datum(t).call(u),d3.select(e+" .metadata-group").datum([]).call(n)
            },
            e.createHorizontalBarChart=function(e,t){
                var a=i(e).data("colors"),
                l=a?a.split(","):c.concat(),
                n=new britecharts.bar,
                u=d3.select(e),
                o=!!u.node()&&u.node().getBoundingClientRect().width,
                r=!!u.node()&&u.node().getBoundingClientRect().height;
                n.colorSchema(l).isAnimated(!0).isHorizontal(!0)
                .width(o).margin({
                    top:10,
                    left:50,
                    bottom:20,
                    right:10
                }).enableLabels(!0).percentageAxisToMaxRatio(1.3).labelsNumberFormat(1).height(r),
                u.datum(t).call(n)
            },
            e.createLineChart=function(e,t){
                var a=new britecharts.line,
                    l=new britecharts.tooltip,
                    n=d3.select(e),
                    u=!!n.node()&&n.node().getBoundingClientRect().width;
                    a.isAnimated(!0).aspectRatio(.7).tooltipThreshold(100).grid("horizontal").width(u).dateLabel("date")
                    .valueLabel("value").on("customMouseOver",l.show).on("customMouseMove",l.update)
                    .on("customMouseOut",l.hide),
                    l.title("Sample Data"),
                    n.datum(t).call(a),
                    d3.select(e+" .metadata-group .hover-marker").datum([]).call(l)
            },
            e.createDonutChart=function(e,t){
                var a=i(e).data("colors"),
                l=a?a.split(","):c.concat(),
                n=britecharts.donut(),
                u=britecharts.legend();
                u.width(200).height(300).colorSchema(l).numberFormat(""),
                n.height(300).highlightSliceById(3).colorSchema(l).hasFixedHighlightedSlice(!0).internalRadius(80)
                .on("customMouseOver",function(e){
                    u.highlight(e.data.id)
                }).on("customMouseOut",function(){
                        u.clearHighlight()
                    }),
                d3.select(e).datum(t).call(n),
                d3.select(".legend-chart-container").datum(t).call(u)
            },
            e.createBrushChart=function(e,t){
                var a=d3.select(e),
                l=britecharts.brush(),
                    n=!!a.node()&&a.node().getBoundingClientRect().width;
                    l.height(320).width(n).on("customBrushStart",
                    function(e){
                        var t=d3.timeFormat("%m/%d/%Y");
                        console.log("Start date = "+t(e[0])),
                        console.log("End date = "+t(e[1]))}).on("customBrushEnd",
                        function(e){
                            console.log("rounded extent",e)
                        }),
                        a.datum(t).call(l),
                        l.dateRange(["9/15/2015","1/25/2016"])},
                        e.createStepChart=function(e,t){
                            var a=britecharts.step(),
                            l=britecharts.miniTooltip(),
                            n=d3.select(e),
                            u=!!n.node()&&n.node()
                            .getBoundingClientRect().width;
                            a.width(u).height(320).margin({
                                top:40,
                                right:40,
                                bottom:80,
                                left:50
                            })
                            .on("customMouseOver",l.show).on("customMouseMove",l.update).on("customMouseOut",l.hide),
                            n.datum(t).call(a),
                            l.nameLabel("key"),
                            d3.select(e+" .step-chart .metadata-group").datum([])
                            .call(l)},i(function(){
                                var e=[
                                <?php if(session()->get('getOrderDetailsDineIn') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsDineIn')as $details):?>
                                        {
                                            name:"<?= ucwords($details['type'])?>",
                                            value:<?= count(session()->get('getOrderDetailsDineIn'))?>,
                                        },
                                    <?php endforeach;?>
                                <?php endif;?>
                                <?php if(session()->get('getOrderDetailsTakeOut') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsTakeOut')as $details):?>
                                        {
                                            name:"<?= ucwords($details['type'])?>",
                                            value:<?= count(session()->get('getOrderDetailsTakeOut'))?>,
                                        },
                                    <?php endforeach;?>
                                <?php endif;?>
                                <?php if(session()->get('getOrderDetailsDelivery') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsDelivery')as $details):?>
                                        {
                                            name:"<?= ucwords($details['type'])?>",
                                            value:<?= count(session()->get('getOrderDetailsDelivery'))?>,
                                        },
                                    <?php endforeach;?>
                                <?php endif;?>
                                <?php if(session()->get('getOrderDetails') !== null):?>
                                    <?php foreach(session()->get('getOrderDetails')as $details):?>
                                        {
                                            name:"<?= ucwords($details['order_status'])?>",
                                            value:<?= count(session()->get('getOrderDetails'))?>,
                                        },
                                    <?php endforeach;?>
                                <?php endif;?>
                                ],
                            t={
                                dataByTopic:[
                                    {
                                        topic:103,
                                        topicName:"San Francisco",
                                        dates:[
                                            {
                                                date:"2018-06-27T07:00:00.000Z",
                                                value:1,
                                                fullDate:"2018-06-27T07:00:00.000Z"
                                            },
                                            {
                                                date:"2018-06-28T07:00:00.000Z",
                                                value:1,
                                                fullDate:"2018-06-28T07:00:00.000Z"
                                            },
                                            {
                                                date:"2018-06-29T07:00:00.000Z",
                                                value:4,
                                                fullDate:"2018-06-29T07:00:00.000Z"
                                            },
                                            {
                                                date:"2018-06-30T07:00:00.000Z",
                                                value:2,
                                                fullDate:"2018-06-30T07:00:00.000Z"
                                            },
                                            {date:"2018-07-01T07:00:00.000Z",
                                                value:3,
                                                fullDate:"2018-07-01T07:00:00.000Z"
                                            },
                                            {date:"2018-07-02T07:00:00.000Z",
                                                value:3,
                                                fullDate:"2018-07-02T07:00:00.000Z"
                                            },
                                            {date:"2018-07-03T07:00:00.000Z",
                                                value:0,
                                                fullDate:"2018-07-03T07:00:00.000Z"
                                            },
                                            {date:"2018-07-04T07:00:00.000Z",
                                                value:3,
                                                fullDate:"2018-07-04T07:00:00.000Z"
                                            },
                                            {date:"2018-07-05T07:00:00.000",
                                                value:1,
                                                fullDate:"2018-07-05T07:00:00.000Z"
                                            },
                                            {date:"2018-07-06T07:00:00.000Z",
                                                value:2,
                                                fullDate:"2018-07-06T07:00:00.000Z"
                                            },
                                            {date:"2018-07-07T07:00:00.000Z",
                                                value:0,
                                                fullDate:"2018-07-07T07:00:00.000Z"
                                            },
                                            {
                                                date:"2018-07-08T07:00:00.000Z",
                                                value:2,
                                                fullDate:"2018-07-08T07:00:00.000Z"
                                            },{
                                                date:"2018-07-09T07:00:00.000Z",
                                                value:1,
                                                fullDate:"2018-07-09T07:00:00.000Z"
                                            },{
                                                date:"2018-07-10T07:00:00.000Z",
                                                value:4,
                                                fullDate:"2018-07-10T07:00:00.000Z"
                                            },{
                                                date:"2018-07-11T07:00:00.000Z",
                                                value:2,
                                                fullDate:"2018-07-11T07:00:00.000Z"
                                            },{
                                                date:"2018-07-12T07:00:00.000Z",
                                                value:1,
                                                fullDate:"2018-07-12T07:00:00.000Z"
                                            },{
                                                date:"2018-07-13T07:00:00.000Z",
                                                value:6,
                                                fullDate:"2018-07-13T07:00:00.000Z"
                                            },{
                                                date:"2018-07-14T07:00:00.000Z",
                                                value:5,
                                                fullDate:"2018-07-14T07:00:00.000Z"
                                            },{
                                                date:"2018-07-15T07:00:00.000Z",
                                                value:2,
                                                fullDate:"2018-07-15T07:00:00.000Z"
                                            }
                                        ]
                                    }
                                ]
                            },
                            a=[
                                        {
                                <?php if(session()->get('getOrderDetailsDineIn') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsDineIn')as $details):?>
                                            name:"<?= ucwords($details['type'])?>",
                                            quantity:<?= count(session()->get('getOrderDetailsDineIn'))?>,
                                    <?php endforeach;?>
                                <?php endif;?>
                                        },
                                        {
                                <?php if(session()->get('getOrderDetailsTakeOut') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsTakeOut')as $details):?>
                                            name:"<?= ucwords($details['type'])?>",
                                            quantity:<?= count(session()->get('getOrderDetailsTakeOut'))?>,
                                    <?php endforeach;?>
                                <?php endif;?>
                                        },
                                        {
                                <?php if(session()->get('getOrderDetailsDelivery') !== null):?>
                                    <?php foreach(session()->get('getOrderDetailsDelivery')as $details):?>
                                            name:"<?= ucwords($details['type'])?>",
                                            quantity:<?= count(session()->get('getOrderDetailsDelivery'))?>,
                                    <?php endforeach;?>
                                <?php endif;?>
                                        },
                                        {
                                <?php if(session()->get('getOrderDetails') !== null):?>
                                    <?php foreach(session()->get('getOrderDetails')as $details):?>
                                            name:"Total Orders",
                                            quantity:<?= count(session()->get('getOrderDetails'))?>,
                                    <?php endforeach;?>
                                <?php endif;?>
                                        },
                        ],
                            l=[{
                                date:"2018-06-27T07:00:00.000Z",
                                value:4
                            },{
                                date:"2018-06-28T07:00:00.000Z",
                                value:12
                            },{
                                date:"2018-06-29T07:00:00.000Z",
                                value:33
                            },{
                                date:"2018-06-30T07:00:00.000Z",
                                value:17
                            },{
                                date:"2018-07-01T07:00:00.000Z",
                                value:17
                            },{
                                date:"2018-07-02T07:00:00.000Z",
                                value:16
                            },{
                                date:"2018-07-03T07:00:00.000Z",
                                value:8
                            },{
                                date:"2018-07-04T07:00:00.000Z",
                                value:14
                            },{
                                date:"2018-07-05T07:00:00.000Z",
                                value:11
                            },{
                                date:"2018-07-06T07:00:00.000Z",
                                value:14
                            },{
                                date:"2018-07-07T07:00:00.000Z",
                                value:25
                            },{
                                date:"2018-07-08T07:00:00.000Z",
                                value:55
                            },{
                                date:"2018-07-09T07:00:00.000Z",
                                value:15
                            },{
                                date:"2018-07-10T07:00:00.000Z",
                                value:26
                            },{
                                date:"2018-07-11T07:00:00.000Z",
                                value:21
                            },{
                                date:"2018-07-12T07:00:00.000Z",
                                value:16
                            },{
                                date:"2018-07-13T07:00:00.000Z",
                                value:20
                            },{
                                date:"2018-07-14T07:00:00.000Z",
                                value:26
                            },{
                                date:"2018-07-15T07:00:00.000Z",
                                value:24
                            },{
                                date:"2018-07-16T07:00:00.000Z",
                                value:29
                            },{
                                date:"2018-07-17T07:00:00.000Z",
                                value:12
                            },{
                                date:"2018-07-18T07:00:00.000Z",
                                value:16
                            },{
                                date:"2018-07-19T07:00:00.000Z",
                                value:11
                            },{
                                date:"2018-07-20T07:00:00.000Z",
                                value:29
                            },{
                                date:"2018-07-21T07:00:00.000Z",
                                value:9
                            },{
                                date:"2018-07-22T07:00:00.000Z",
                                value:26
                            },{
                                date:"2018-07-23T07:00:00.000Z",
                                value:21
                            },{
                                date:"2018-07-24T07:00:00.000Z",
                                value:18
                            },{
                                date:"2018-07-25T07:00:00.000Z",
                                value:15
                            },{
                                date:"2018-07-26T07:00:00.000Z",
                                value:23
                            },{
                                date:"2018-07-27T07:00:00.000Z",
                                value:43
                            },{
                                date:"2018-07-28T07:00:00.000Z",
                                value:44
                            },{
                                date:"2018-07-29T07:00:00.000Z",
                                value:67
                            },{
                                date:"2018-07-30T07:00:00.000Z",
                                value:67
                            },{
                                date:"2018-07-31T07:00:00.000Z",
                                value:0
                            },{
                                date:"2018-08-01T07:00:00.000Z",
                                value:0
                            },{
                                date:"2018-08-02T07:00:00.000Z",
                                value:0
                            }],
                            n=[{
                                key:"Appetizer",value:400
                            },{
                                key:"Soup",value:300
                            },{
                                key:"Salad",value:300
                            },{
                                key:"Lunch",value:250
                            },{
                                key:"Dinner",value:220
                            },{
                                key:"Dessert",value:100
                            },{
                                key:"Midnight snack",value:20
                            }];
                        function u(){
                            d3.selectAll(".bar-chart").remove(),
                            d3.selectAll(".line-chart").remove(),
                            d3.selectAll(".donut-chart").remove(),
                            d3.selectAll(".britechart-legend").remove(),
                            d3.selectAll(".brush-chart").remove(),
                            d3.selectAll(".step-chart").remove(),
                            0<i(".bar-container").length&&briteChartApp.createBarChart(".bar-container",e),
                            0<i(".bar-container-horizontal").length&&briteChartApp.createHorizontalBarChart(".bar-container-horizontal",e),
                            0<i(".line-container").length&&briteChartApp.createLineChart(".line-container",t),
                            0<i(".donut-container").length&&briteChartApp.createDonutChart(".donut-container",a),
                            0<i(".brush-container").length&&briteChartApp.createBrushChart(".brush-container",l),
                            0<i(".step-container").length&&briteChartApp.createStepChart(".step-container",n)
                        }
                        i(window).on("resize",function(e){
                            e.preventDefault(),setTimeout(u,200)
                        }),
                        u()
                    })
                }(jQuery,briteChartApp);
    function hexToRGB(a,r){
        var t=parseInt(
            a.slice(1,3),16),
            e=parseInt(a.slice(3,5),16),
            o=parseInt(a.slice(5,7),16);
            return r
            ?
            "rgba("+t+", "+e+", "+o+", "+r+")"
            :
            "rgb("+t+", "+e+", "+o+")"
        }
    !function(d){
        "use strict";
        function a(){
            this.$body=d("body"),
            this.charts=[]
        }
        a.prototype.respChart=function(r,t,e,o){
            var n=Chart.controllers.line.prototype.draw;
            Chart.controllers.line.prototype.draw=function(){
                n.apply(this,arguments);
                var a=this.chart.chart.ctx,r=a.stroke;
                a.stroke=function(){
                    a.save(),
                    a.shadowColor="rgba(0,0,0,0.01)",
                    a.shadowBlur=20,
                    a.shadowOffsetX=0,
                    a.shadowOffsetY=5,
                    r.apply(this,arguments),
                    a.restore()
                }
            };
            var s=Chart.controllers.doughnut.prototype.draw;
            Chart.controllers.doughnut=Chart.controllers.doughnut.extend({
                draw:function(){
                    s.apply(this,arguments);
                    var a=this.chart.chart.ctx,
                    r=a.fill;
                    a.fill=function(){
                        a.save(),
                        a.shadowColor="rgba(0,0,0,0.03)",
                        a.shadowBlur=4,
                        a.shadowOffsetX=0,
                        a.shadowOffsetY=3,
                        r.apply(this,arguments),
                        a.restore()
                    }
                }
            });
            var l=Chart.controllers.bar.prototype.draw;
            Chart.controllers.bar=Chart.controllers.bar.extend({
                draw:function(){l.apply(this,arguments);
                    var a=this.chart.chart.ctx,
                    r=a.fill;
                    a.fill=function(){
                        a.save(),
                        a.shadowColor="rgba(0,0,0,0.01)",
                        a.shadowBlur=20,
                        a.shadowOffsetX=4,
                        a.shadowOffsetY=5,
                        r.apply(this,arguments),
                        a.restore()
                    }
                }
            }),
            Chart.defaults.global.defaultFontColor="#8391a2",
            Chart.defaults.scale.gridLines.color="#8391a2";
            var i=r.get(0).getContext("2d"),
            c=d(r).parent();
            return function(){
                var a;
                switch(
                    r.attr("width",d(c).width()),t){
                        case"Line":a=new Chart(i,{
                            type:"line",
                            data:e,
                            options:o
                        });
                        break;
                        case"Doughnut":a=new Chart(i,{
                            type:"doughnut",
                            data:e,
                            options:o
                        });
                        break;
                        case"Pie":a=new Chart(i,{
                            type:"pie",
                            data:e,
                            options:o
                        });
                        break;
                        case"Bar":a=new Chart(i,{
                            type:"bar",
                            data:e,
                            options:o
                        });
                        break;
                        case"Radar":a=new Chart(i,{
                            type:"radar",
                            data:e,
                            options:o
                        });
                        break;
                        case"PolarArea":a=new Chart(i,{
                            data:e,
                            type:"polarArea",
                            options:o
                        })
                    }
                    return a
                }()},
                a.prototype.initCharts=function(){
                    var a,r,t,e,o,n,s,l=[],
                    i=["#727cf5","#0acf97","#fa5c7c","#ffbc00"];
                    return 0<d("#line-chart-example").length&&(
                        a={labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
                        datasets:[{label:"Current Week",
                        backgroundColor:hexToRGB((n=(o=d("#line-chart-example").data("colors"))?o.split(","):i.concat())[0],.3),
                        borderColor:n[0],
                        data:[32,42,42,62,52,75,62]},
                        {label:"Previous Week",fill:!0,backgroundColor:"transparent",
                        borderColor:n[1],
                        borderDash:[5,5],
                        data:[42,58,66,93,82,105,92]}]},
                        l.push(this.respChart(d("#line-chart-example"),
                        "Line",
                        a,
                        {maintainAspectRatio:!1,
                            legend:{display:!1},
                            tooltips:{intersect:!1},
                            hover:{intersect:!0},
                            plugins:{filler:{propagate:!1}},
                            scales:{
                                xAxes:[{
                                    reverse:!0,
                                    gridLines:{color:"rgba(0,0,0,0.05)"}}],
                                    yAxes:[{
                                        ticks:{stepSize:20},
                                        display:!0,
                                        borderDash:[5,5],
                                        gridLines:{
                                            color:"rgba(0,0,0,0)",
                                            fontColor:"#fff"
                                        }
                                    }
                                ]
                            }
                        }
                        ))),
        0<d("#orders-bar-chart-example").length&&(
            n=(o=d("#orders-bar-chart-example").data("colors"))?
            o.split(","):i.concat(),(
                r=document.getElementById("orders-bar-chart-example").getContext("2d").createLinearGradient(0,500,0,150)).addColorStop(0,n[0]),
                r.addColorStop(1,n[1]),
                t={labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets:[{
                    label:"Orders",
                    backgroundColor:r,
                    borderColor:r,
                    hoverBackgroundColor:r,
                    hoverBorderColor:r,
                    data:[
                            <?php if(session()->get('ordersPerMonth') !== null):?>
                                <?php foreach(session()->get('ordersPerMonth') as $data):?>
                                    <?= $data['Jan'];?>,
                                    <?= $data['Feb'];?>,
                                    <?= $data['Mar'];?>,
                                    <?= $data['Apr'];?>,
                                    <?= $data['May'];?>,
                                    <?= $data['Jun'];?>,
                                    <?= $data['Jul'];?>,
                                    <?= $data['Aug'];?>,
                                    <?= $data['Sept'];?>,
                                    <?= $data['Oct'];?>,
                                    <?= $data['Nov'];?>,
                                    <?= $data['December'];?>,
                                <?php endforeach;?>
                            <?php endif;?>
                        ]
                }]
            },
                    l.push(this.respChart(d("#orders-bar-chart-example"),"Bar",
                    t,
                    {maintainAspectRatio:!1,
                        legend:{display:!1},
                        scales:{
                            yAxes:[{
                                gridLines:{
                                    display:!1,
                                    color:"rgba(0,0,0,0.05)"},
                                stacked:!1,ticks:{
                                    stepSize:20
                                }}],
                            xAxes:[{
                                barPercentage:.7,
                                categoryPercentage:.5,
                                stacked:!1,
                                gridLines:{
                                    color:"rgba(0,0,0,0.01)"
                                }
                            }]
                            }
                        }))),0<d("#orders-revenue-bar-chart-example").length&&(
            n=(o=d("#orders-revenue-bar-chart-example").data("colors"))?
            o.split(","):i.concat(),(
                r=document.getElementById("orders-revenue-bar-chart-example").getContext("2d").createLinearGradient(0,500,0,150)).addColorStop(0,n[0]),
                r.addColorStop(1,n[1]),
                t={labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets:[{
                    label:"Amount Sold",
                    backgroundColor:r,
                    borderColor:r,
                    hoverBackgroundColor:r,
                    hoverBorderColor:r,
                    data:[
                            <?php if(session()->get('totalAmountOrdersJan') !== null):?>
                                <?php foreach(session()->get('totalAmountOrdersJan')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersFeb')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersMar')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersApr')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersMay')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersJun')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersJul')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersAug')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersSept')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersOct')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersNov')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                                <?php foreach(session()->get('totalAmountOrdersDec')as $data):?>
                                    <?= $data['total_amount_per_month'];?>
                                <?php endforeach;?>,
                            <?php endif;?>
                        ]
                    }]
                },
                l.push(this.respChart(d("#orders-revenue-bar-chart-example"),"Bar",
                t,
                {maintainAspectRatio:!1,
                    legend:{display:!1},
                    scales:{
                        yAxes:[{
                            gridLines:{
                                display:!1,
                                color:"rgba(0,0,0,0.05)"},
                            stacked:!1,ticks:{
                                stepSize:20
                            }}],
                        xAxes:[{
                            barPercentage:.7,
                            categoryPercentage:.5,
                            stacked:!1,
                            gridLines:{
                                color:"rgba(0,0,0,0.01)"
                            }
                        }]
                        }
                    }))),
        0<d("#donut-chart-example").length&&(
            e={labels:["Direct","Affilliate","Sponsored","E-mail"],
            datasets:[{data:[300,135,48,154],
                backgroundColor:n=(
                    o=d("#donut-chart-example").data("colors"))?
                    o.split(","):i.concat(),
                    borderColor:"transparent",
                    borderWidth:"3"}]},
                    l.push(this.respChart(d("#donut-chart-example"),
                    "Doughnut",
                    e,
                    {maintainAspectRatio:!1,
                        cutoutPercentage:60,
                        legend:{
                            display:!1
                        }
                    }))),
                    0<d("#radar-chart-example").length&&(
                        s={labels:["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],
                        datasets:[{
                            label:"Desktops",
                            backgroundColor:hexToRGB((
                                n=(o=d("#radar-chart-example").data("colors"))?
                                o.split(","):i.concat())[0],.2),
                                borderColor:n[0],
                                pointBackgroundColor:n[0],
                                pointBorderColor:"#fff",
                                pointHoverBackgroundColor:"#fff",
                                pointHoverBorderColor:n[0],
                                data:[65,59,90,81,56,55,40]},
                                {label:"Tablets",
                                backgroundColor:hexToRGB(n[1],.2),
                                borderColor:n[1],
                                pointBackgroundColor:n[1],
                                pointBorderColor:"#fff",
                                pointHoverBackgroundColor:"#fff",
                                pointHoverBorderColor:n[1],
                                data:[28,48,40,19,96,27,100]}]},
                                l.push(this.respChart(d("#radar-chart-example"),
                                "Radar",s,{
                                    maintainAspectRatio:!1
                                }))),
                                l},
                                a.prototype.init=function(){
                                    var r=this;
                                    Chart.defaults.global.defaultFontFamily='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
                                    r.charts=this.initCharts(),d(window).on("resize",function(a){
                                        d.each(
                                            r.charts,
                                            function(a,r){
                                                try{
                                                    r.destroy()
                                                }catch(a){}}),
                                                r.charts=r.initCharts()
                                            })
                                        },d.ChartJs=new a,
                                        d.ChartJs.Constructor=a
                                    }(window.jQuery),function(){"use strict";
                                    window.jQuery.ChartJs.init()}();

</script>