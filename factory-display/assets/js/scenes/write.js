// const http = require("http");

// const hostname = "127.0.0.1";
// const port = 3000;

// const server = http.createServer((req, res) => {
//   res.statusCode = 200;
//   res.setHeader("Content-Type", "text/plain");
//   res.end("Hello World \n");
// });

// server.listen(port, hostname, () => {
//   console.log(`Server running at http://${hostname}:${port}/`);
// });

// import { htmlString } from "../scenes/data.js";
// function writeTheSceneFile() {
//   const fs = require("fs");

//   const headContent = `
// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <title>Document</title>
//     <style>
//         body {
//             display: flex;
//             padding: 0;
//             margin: 0;
//             height: 100vh;
//             width: 100vw;
//             background-color: #343434;
//             overflow: hidden;
//         }
//         iframe {
//             width: 100%;
//             height: 100%;
//             border: none;
//             position: absolute;
            
//         }
//     </style>
// </head>
// <body>
// `;

//   const footContent = `
// <script>
// document.getElementsByTagName("body")[0].addEventListener("click", function() {
//     document.getElementsByTagName("body")[0].requestFullscreen();
// });
// </script>
// </body>
// </html>
// `;

//   const dynamicContent = htmlString;
//   const globalContent = headContent + dynamicContent + footContent;
//   const path = "/factory-display/screens/locker-room.html";

//   //clear the file
//   fs.writeFile(path, "", function () {
//     console.log("done");
//   });

//   //write in the file
//   fs.writeFile(path, globalContent, { flag: "a+" }, (err) => {});
// }
