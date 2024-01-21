
function changeIframe(change) {
  var iframe = document.getElementById('content');
  var loader = document.querySelector('.loader');

  loader.style.display="block";
  iframe.classList.add('hidden');

  setTimeout(function() {
    iframe.src = change;
    
    iframe.onload = function() {
      iframe.classList.remove('hidden');
      loader.style.display="none";
      
    };
  }, 200);
  
}

function viewPw() {
        var x = document.getElementById("pw");
        const eye = document.querySelector("#view");

        eye.classList.toggle("fa fa-eye");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

function logout() {

  window.top.location.href = './pages/login.php';
}
