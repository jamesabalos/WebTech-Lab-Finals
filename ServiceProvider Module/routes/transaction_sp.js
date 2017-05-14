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

    connection.query('SELECT payment.payId, home_owner.last_name, home_owner.first_name, home_owner.address, home_owner.email, home_owner.cp_no, request.startdate, request.starttime,booking.date_rendered, booking.time_rendered, services.servtype, request.reqstatus, booking.status, payment.amount from request JOIN payment JOIN home_owner JOIN service_provider JOIN services JOIN booking ON request.hoid = home_owner.hoid AND request.spid = service_provider.spid AND services.servid = request.servid AND request.reqid = booking.reqid AND payment.bookid = booking.bookid WHERE booking.status = "Done" AND service_provider.email = ' + session_email, function(err, rows, fields) {  
	  	if (err) {
	  		res.status(500).json({"status_code": 500,"status_message": "internal server error"});
	  	} else {
	  		// Loop check on each row
	  		for (var i = 0; i < rows.length; i++) {

		  		var trans_booking = {
		  			'payId':rows[i].payId,
		  			'name':rows[i].first_name + " " + rows[i].last_name,
		  			'address':rows[i].address,
		  			'cp_no':rows[i].cp_no,
		  			'tel_no':rows[i].tel_no,
		  			'startdate':rows[i].startdate,
		  			'starttime':rows[i].starttime,
		  			'date_rendered':rows[i].date_rendered,
		  			'time_rendered':rows[i].time_rendered,
		  			'servtype':rows[i].servtype,
		  			'amount':rows[i].amount
		  		}
		  		// Add object into array
		  		hoList.push(trans_booking);
		  		var total_amount = 0;
		  		total_amount = rows[i].amount + total_amount;
	  		}
	  		console.log(total_amount);
	  	} 
	});   
	connection.end();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('transaction_sp', { title : 'Transaction' });
  res.render('transaction_sp', {'hoList': hoList});
  res.render('transaction_sp', {'total_amount': total_amount});
});

module.exports = router;



