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


                  // ajaxRequest.open("POST", "updateRequests.php",false);

                  // try{
                  //   ajaxRequest.send(hoEmail);
                  //     if(ajaxRequest.readyState == 4 && ajaxRequest.status == 4){
                  //          alert(ajaxRequest.responseText);
                  //     }
                  // }catch(e){
                  //   alert("Server is not responding.");
                    
                  // }


                    // ajaxRequest.onreadystatechange = function(){
                    //   if(ajaxRequest.readyState == 4){   // request received 

                    //       alert(ajaxRequest.responseText);
                    //     // alert("send successfully");
                    //     location.reload();

                    
                    //   }
                    // }

                    // var temp = [{idNo: array[i].idNo, name: array[i].name, gatePassNumber:array[i].gatePassNumber, serialNumber:array[i].serialNumber, dateBorrowed:array[i].dateBorrowed, courseAndYear:array[i].courseAndYear ,dateReturned:array[i].dateReturned ,remarks:array[i].remarks }];
                    // ajaxRequest.send(JSON.stringify(temp));
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


                  // ajaxRequest.open("POST", "updateRequests.php",false);

                  // try{
                  //   ajaxRequest.send(hoEmail);
                  //     if(ajaxRequest.readyState == 4 && ajaxRequest.status == 4){
                  //          alert(ajaxRequest.responseText);
                  //     }
                  // }catch(e){
                  //   alert("Server is not responding.");
                    
                  // }


                    // ajaxRequest.onreadystatechange = function(){
                    //   if(ajaxRequest.readyState == 4){   // request received 

                    //       alert(ajaxRequest.responseText);
                    //     // alert("send successfully");
                    //     location.reload();

                    
                    //   }
                    // }

                    // var temp = [{idNo: array[i].idNo, name: array[i].name, gatePassNumber:array[i].gatePassNumber, serialNumber:array[i].serialNumber, dateBorrowed:array[i].dateBorrowed, courseAndYear:array[i].courseAndYear ,dateReturned:array[i].dateReturned ,remarks:array[i].remarks }];
                    // ajaxRequest.send(JSON.stringify(temp));
                    ajaxRequest.open("POST", "updateRequestsSP.php",false);
                    ajaxRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    ajaxRequest.setRequestHeader('Content-Type', 'application/json');

                    var temp = [{email:spEmail, req_status:status}];
                    ajaxRequest.send(JSON.stringify(temp));
                    location.reload();


}