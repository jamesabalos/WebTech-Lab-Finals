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
	var spList = [];
	var feedbackList = [];
	var sp_profile;
	var transaction_length;
	var request_length;
	var booking_length;

	var session_email = "'samsonsean@gmail.com'";

	connection.query('SELECT * FROM services INNER JOIN sp_service JOIN service_provider ON services.servid = sp_service.servid AND service_provider.spid = sp_service.spid AND service_provider.email = ' + session_email, function(err, rows, fields) {  
	  	if (err) {
	  		res.status(500).json({"status_code": 500,"status_message": "internal server error"});
	  	} else {
	  		// Loop check on each row
	  		for (var i = 0; i < rows.length; i++) {

	  			// Create an object to save current row's data
		  		var sp = {
		  			'spid':rows[i].spid,
		  			'email':rows[i].email,
		  			'gender':rows[i].gender,
		  			'name':rows[i].first_name + " " + rows[i].last_name,
		  			'company_name':rows[i].company_name,
		  			'birthdate':rows[i].birthdate,
		  			'address':rows[i].address,
		  			'cp_no':rows[i].cp_no,
		  			'servtype':rows[i].servtype,
		  			'tel_no':rows[i].tel_no
		  		}
		  		// Add object into array
		  		spList.push(sp);

		  		sp_account = {
		  			'spid':rows[i].spid,
		  			'email':rows[i].email,
		  			'gender':rows[i].gender,
		  			'name':rows[i].first_name + " " + rows[i].last_name,
		  			'company_name':rows[i].company_name,
		  			'birthdate':rows[i].birthdate,
		  			'address':rows[i].address,
		  			'cp_no':rows[i].cp_no,
		  			'tel_no':rows[i].tel_no
		  		}
	  		}
	  		console.log("SUCCESSFUL");
	  	} 
	}); 

		connection.query('SELECT home_owner.last_name, home_owner.first_name, feedback.comment, feedback.rating, feedback.time, feedback.date FROM home_owner JOIN feedback JOIN service_provider ON feedback.hoid = home_owner.hoid AND service_provider.spid = feedback.spid AND service_provider.email = ' + session_email, function(err, rows, fields) {  
	  	if (err) {
	  		res.status(500).json({"status_code": 500,"status_message": "internal server error"});
	  	} else {
	  		// Loop check on each row
	  		for (var i = 0; i < rows.length; i++) {

	  			// Create an object to save current row's data
		  		var feedback = {
		  			'name':rows[i].first_name + " " + rows[i].last_name,
		  			'comment':rows[i].comment,
		  			'rating':rows[i].rating,
		  			'date':rows[i].date,
		  			'time':rows[i].time
		  		}
		  		// Add object into array
		  		spList.push(feedback);
	  		} 
	  		console.log("SUCCESSFUL");
	  	}
	}); 

	connection.end();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('profile_sp', { title : 'My Profile' });
  res.render('profile_sp', {'spList': spList});
  res.render('profile_sp', {'sp_account': sp_account});
  //res.render('profile_sp', {'feedbackList': feedbackList});
});

module.exports = router;