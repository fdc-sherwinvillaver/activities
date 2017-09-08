var express = require('express');
var app = express();

app.set('view engine', 'pug');
app.set('views','./views');

app.get('/first', function(req, res){
   res.render("first_view");
});

app.post('/first', function(req, res){
   // var personInfo = req.body; //Get the parsed information
   res.render('show_message');
});

// app.post('/', function(req, res){
//    console.log(req.body);
//    res.send("recieved your request!");
// });

// app.get('/about',function(req,res){
// 	res.send("About Page");
// });

// app.get('/contact',function(req,res){
// 	res.send("Contact Page");
// });

app.listen(3000);