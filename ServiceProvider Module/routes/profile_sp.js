var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.render('profile_sp', { title : 'Profile' });
});

module.exports = router;
