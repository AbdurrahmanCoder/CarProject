
  var links = document.querySelectorAll('.links a');
links.forEach(function(link) {
  link.addEventListener('click', function() {
    
    
    links.forEach(function(l) {
      l.classList.remove('active');
    });

    link.classList.add('active');
  });
});

 

function getRequeteHttp() {
let requeteHttp;

if (window.XMLHttpRequest) {//Navigateure basé sur Mozilla
  requeteHttp = new XMLHttpRequest();
  if (requeteHttp.overrideMimeType) {//Si ça exige que le type des donnéees utilisé par le serveur soit text/xml
      requeteHttp.overrideMimeType("text/xml");
  }
} else {
  if (window.ActiveXObject) {// Si c'est internet explorer
      try {
          requeteHttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
          requeteHttp = null;
      }
  }
}
return requeteHttp;
} 


// document.querySelectorAll('.deleteButton').forEach(function(button) {
//     button.addEventListener('click', function(event) {
//       // event.preventDefault();
//       let elementId = this.getAttribute('data-id');
//       let requeteHttp = getRequeteHttp();

//       if (requeteHttp == null) {
//         alert("Impossible d'utiliser AJAX sur ce navigateur !");
//       } else {
//         requeteHttp.open('POST', 'delete.php', true);
//         requeteHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         requeteHttp.onreadystatechange = function() {
//           if (requeteHttp.readyState == 4) {
//             console.log("Response Status:", requeteHttp.status);
//             console.log("Response Text:", requeteHttp.responseText);

//             if (requeteHttp.status == 200) {
//               let responseDataDate = requeteHttp.responseText;
              
//               // let afficheTesting = document.getElementById("afficheTesting");
//               afficheTesting.innerHTML = responseDataDate;   
 
//               button.innerHTML = "button deleted succesfully ";
//           window.location.href=window.location.href;
//               // console.log(responseDataDate)
//             }
//           }
//         };

//         requeteHttp.send("ElementToDelete=" + encodeURIComponent(elementId));
//       }
//     });
//   });
 



//working code 
// document.querySelectorAll('.deleteButton').forEach(function(button) {
//   button.addEventListener('click', function(event) {
//  event.preventDefault();
//     let elementId = this.getAttribute('data-id');
//     let requeteHttp = getRequeteHttp();

//     if (requeteHttp == null) {
//       alert("Impossible d'utiliser AJAX sur ce navigateur !");
//     } else {
//       requeteHttp.open('GET', 'delete.php?ElementToDelete=' +elementId, true);
//       // requeteHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//       requeteHttp.send();
//       requeteHttp.onreadystatechange = function() {
//         if (requeteHttp.readyState == 4) {
//           console.log("Response Status:", requeteHttp.status);
//           console.log("Response Text:", requeteHttp.responseText);

//           if (requeteHttp.status == 200) {
//             let responseDataDate = requeteHttp.responseText; 
//             // let afficheTesting = document.getElementById("afficheTesting");
//             afficheTesting.innerHTML = responseDataDate;   
//              let  DeleteBlock = document.querySelector(".DeleteBlock") 
//               // console.log(DeleteBlock)
//               if (DeleteBlock) {
//                 DeleteBlock.parentNode.removeChild(DeleteBlock);
//              }
//             //  window.location.href=window.location.href;
//             // console.log(responseDataDate)
//           }
//         }
//       };

//     }
//   });
// });

document.querySelectorAll('.deleteButton').forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault();

    let elementId = this.getAttribute('data-id');
    let requeteHttp = getRequeteHttp();
    
    if (requeteHttp == null) {
      alert("Impossible d'utiliser AJAX sur ce navigateur !");
    } else {
      requeteHttp.open('GET', 'delete.php?ElementToDelete=' + elementId, true);
      requeteHttp.send();
      
      requeteHttp.onreadystatechange = function() {
        if (requeteHttp.readyState == 4) {
          console.log("Response Status:", requeteHttp.status);
          console.log("Response Text:", requeteHttp.responseText);

          if (requeteHttp.status == 200) {
            let responseDataDate = requeteHttp.responseText;
            
            // Assuming deletedElement and afficheTesting are defined somewhere
            let afficheTesting = document.getElementById("afficheTesting");
            let deletedElement = document.querySelector(".DeleteBlock");
            
            if (deletedElement) {
              console.log(this)
              deletedElement.parentNode.parentNode.remove();
            } 
            if (afficheTesting) {
              afficheTesting.innerHTML = responseDataDate;
            } else {
              console.error("Element with ID 'afficheTesting' not found.");
            }
          } else {
            console.error("Error:", requeteHttp.status);
          }
        }
      };
    }
  });
});
