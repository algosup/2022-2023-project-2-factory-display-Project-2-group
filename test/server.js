const http = require("http");

const hostname = "127.0.0.1";
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader("Content-Type", "text/plain");
  res.end("Hello World \n");
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});

const fs = require("fs");

const content = "ceci est l'écran de veille";
const path = "txt/locker-room.txt";

//clear the file
fs.writeFile(path, '', function(){console.log('done')})

//write in the file
fs.writeFile(path, content, { flag: 'a+' }, err => {});
