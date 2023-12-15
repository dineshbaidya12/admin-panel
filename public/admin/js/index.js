"use strict";

/*  sales overview chart */
var options = {
  series: [
    {
      name: "Income",
      data: [20, 38, 38, 72, 55, 63, 43, 76, 55, 80, 40, 80],
    },
    {
      name: "Expenses",
      data: [85, 65, 75, 38, 85, 35, 62, 40, 40, 64, 50, 89],
    },
  ],
  chart: {
    animations: {
      enabled: false,
    },
    height: 300,
    type: "bar",
    zoom: {
      enabled: false,
    },
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "55%",
      endingShape: "rounded",
      borderRadius: 5,
    },
  },
  dataLabels: {
    enabled: false,
  },
  legend: {
    show: false,
  },
  stroke: {
    show: true,
    width: 3,
    colors: ["transparent"],
  },
  grid: {
    borderColor: "rgba(107 ,114 ,128,0.1)",
  },
  colors: ["rgb(90,102,241)", "rgb(203,213,225)"],
  yaxis: {
    title: {
      style: {
        color: "#adb5be",
        fontSize: "14px",
        fontFamily: "Inter, sans-serif",
        fontWeight: 600,
        cssClass: "apexcharts-yaxis-label",
      },
    },
    labels: {
      style: {
        colors: "rgb(107 ,114 ,128)",
        fontSize: "12px",
      },
      formatter: function (y) {
        return y.toFixed(0) + "";
      },
    },
  },
  xaxis: {
    type: "month",
    categories: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    axisBorder: {
      show: true,
      color: "rgba(119, 119, 142, 0.05)",
      offsetX: 0,
      offsetY: 0,
    },
    axisTicks: {
      show: true,
      borderType: "solid",
      color: "rgba(119, 119, 142, 0.05)",
      width: 6,
      offsetX: 0,
      offsetY: 0,
    },
    labels: {
      rotate: -90,
      style: {
        colors: "rgb(107 ,114 ,128)",
        fontSize: "12px",
      },
    },
  },
};
