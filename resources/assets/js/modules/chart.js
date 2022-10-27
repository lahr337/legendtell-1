import bb, {line, axis, spline} from "billboard.js/dist/billboard"

// var chart = bb.generate({
//     bindto: "#chart",
//     data: {
//       // for ESM import usage, import 'line' module and execute it as
//       // type: line(),
//       type: "line",
//       columns: [
//           ["data1", 30, 200, 100, 400, 150, 250],
//           ["data2", 400, 10, 100, 400, 150, 250],
//           ["data3", 15000, 1000, 100, 4000, 15000, 2500]
//       ],
//       axes: {
//         data1: "y",
//         data2: "y2",
//         data3: "y3"
//       }
//     },
//     axis: {
//         y1: {
//             show: true
//         },
//         y2: {
//           show: true
//         },
//         y3: {
//             min: 0,
//             axes: [
//                 {
//                     domain: [
//                         500,
//                         1000
//                     ],
//                     tick: {
//                         count: 5
//                       }
//                 }
//               ]
//         }
//       },
// })

var chart = bb.generate({
    data: {
      columns: [
        ["data1", 30, 200, 100, 400, 150],
        ["data2", 50, 20, 10, 40, 15],
        ["data3", 50, 20, 10, 40, 15],
      ],
      type: "spline", // for ESM specify as: line()
      axes: {
        data1: "y",
        data2: "y2",
        data3: "y3",
      }
    },
    clipPath: false,
    axis: {
      y: {
        min: 0,
        padding: {
          top: 0,
          bottom: 0
        },
        axes: [
          {
            domain: [
              -50,
              50
            ],
            tick: {
                count: 5
            }
          }
        ]
      },
      y2: {
        show: true,
        min: 0,
        padding: {
          top: 0,
          bottom: 0
        },
      }
    },
    legend: {
        show: false,
    },
    bindto: "#chart"
})