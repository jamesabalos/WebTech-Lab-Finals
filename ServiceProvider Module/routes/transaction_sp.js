var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('transaction_sp', { title : 'Transaction' });
});

module.exports = router;