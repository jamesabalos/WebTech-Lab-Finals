function update_HO_register_rq(r){


  var hoEmail = r.parentNode.parentNode.childNodes[3].innerText;
  var status = r.getAttribute("id");
  
 

	 var ajaxRequest;  // The variable that makes Ajax possible!
                  try{
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                  } catch (e){
                    // Internet Explorer Browsers
                    try{
                      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                      try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                      } catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                      }
                    }
                  }


                    ajaxRequest.open("POST", "updateRequestsHO.php",false);
                    ajaxRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    ajaxRequest.setRequestHeader('Content-Type', 'application/json');

                    var temp = [{email:hoEmail, req_status:status}];
                    ajaxRequest.send(JSON.stringify(temp));
                    location.reload();

}

function update_SP_register_rq(r){
   var spEmail = r.parentNode.parentNode.childNodes[5].innerText;
  var status = r.getAttribute("id");
  
 

   var ajaxRequest;  // The variable that makes Ajax possible!
                  try{
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                  } catch (e){
                    // Internet Explorer Browsers
                    try{
                      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                      try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                      } catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                      }
                    }
                  }


         
                    ajaxRequest.open("POST", "updateRequestsSP.php",false);
                    ajaxRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    ajaxRequest.setRequestHeader('Content-Type', 'application/json');

                    var temp = [{email:spEmail, req_status:status}];
                    ajaxRequest.send(JSON.stringify(temp));
                    location.reload();

}




function update_SP_status(r){
   var spEmail = r.parentNode.parentNode.childNodes[3].innerText;
   var dropdown = r.parentNode.childNodes[1];
   var value = dropdown.options[dropdown.selectedIndex].value;

   var ajaxRequest;  // The variable that makes Ajax possible!
                  try{
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                  } catch (e){
                    // Internet Explorer Browsers
                    try{
                      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                      try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                      } catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                      }
                    }
                  }


            
                 
                    ajaxRequest.open("POST", "activate.php",false);
                     ajaxRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    ajaxRequest.setRequestHeader('Content-Type', 'application/json');

                    var temp = [{email:spEmail, status:value}];
                    ajaxRequest.send(JSON.stringify(temp));
                    location.reload();

}