var express = require('express');
var router = express.Router();

//mysql
var mysql      = require('mysql');  
var connection = mysql.createConnection({  
  host     : 'localhost',  
  user     : 'root',  
  password : '',  
  database : 'webtek',
  dateStrings:true
});  

	connection.connect();  
	var hoList = [];

	var session_email = "'samsonsean@gmail.com'";

    connection.query('SELECT home_owner.last_name, home_owner.first_name, home_owner.address, home_owner.email, home_owner.cp_no, request.startdate, request.starttime, services.servtype, request.reqstatus from request JOIN home_owner JOIN service_provider JOIN services ON request.hoid = home_owner.hoid AND request.spid = service_provider.spid AND services.servid = request.servid WHERE service_provider.email = ' + session_email, function(err, rows, fields) {  
	  	if (err) {
	  		res.status(500).json({"status_code": 500,"status_message": "internal server error"});
	  	} else {
	  		// Loop check on each row
	  		for (var i = 0; i < rows.length; i++) {

	  			// Create an object to save current row's data
		  		var ho_request = {
		  			'email':rows[i].email,
		  			'gender':rows[i].gender,
		  			'name':rows[i].first_name + " " + rows[i].last_name,
		  			'company_name':rows[i].company_name,
		  			'address':rows[i].address,
		  			'cp_no':rows[i].cp_no,
		  			'tel_no':rows[i].tel_no,
		  			'startdate':rows[i].startdate,
		  			'starttime':rows[i].starttime,
		  			'reqstatus':rows[i].reqstatus,
		  			'servtype':rows[i].servtype
		  		}
		  		// Add object into array
		  		hoList.push(ho_request);
	  		}
	  		console.log("SUCCESSFUL");
	  	} 
	});   
	connection.end();

/* GET home page. */
router.get('/', function(req, res, next) {

  res.render('request_sp', { title : 'Request' });
  res.render('request_sp', {'hoList': hoList});
});

module.exports = router;



