//REST API in Node.js
var express = require('express'); // requre the express framework
var app = express();
var fs = require('fs'); 

// Endpoint to Get a list of users
app.get('/getUsers', function(req, res){
    fs.readFile(__dirname + "/" + "users.json", 'utf8', function(err, data){
        console.log(data);
        res.end(data); 
    });
})

// Create a server to listen at port 5500
var server = app.listen(5500, function(){
    var host = server.address().address
    var port = server.address().port
    console.log("REST API demo app listening at http://%s:%s", host, port)
})

// Create a new user variable
var user = {
    "user5": {
        "id":5,
        "firstname":"Liudmyla",
        "lastname":"Nagorna",
        "email":"mila@gmail.com"
      },
} 

//The addUser endpoint
app.post('/addUser', function(req, res){
    fs.readFile(__dirname + "/" + "users.json", 'utf8', function(err, data){
        data = JSON.parse(data);
        data["user5"] = user["user5"];
        console.log(data);
        res.end(JSON.stringify(data));
    });
})

//Endpoint to get a single user by id
app.get('/:id', function (req, res) {
    // First retrieve existing user list
    fs.readFile( __dirname + "/" + "users.json", 'utf8', function (err, data) {
       var users = JSON.parse( data );
       var user = users["user" + req.params.id] 
       console.log( user );
       res.end( JSON.stringify(user));
    });
 })

  //Code to delete a user by id
var id = 3;
app.delete('/deleteUser', function (req, res) {

     fs.readFile( __dirname + "/" + "users.json", 'utf8', function (err, data) {
        data = JSON.parse( data );
        delete data["user" + 3];
         
        console.log( data );
        res.end( JSON.stringify(data));
     });
})
 