function update_HO_register_rq(r){
  var hoEmail = r.parentNode.parentNode.childNodes[3].innerText;

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


                    ajaxRequest.onreadystatechange = function(){
                      if(ajaxRequest.readyState == 4){   // request received 

                          alert(ajaxRequest.responseText);
                        // alert("send successfully");
                        location.reload();

                    
                      }
                    }
                    ajaxRequest.open("POST", "updateRequests.php",true);

                    
                    ajaxRequest.send(hoEmail);


}