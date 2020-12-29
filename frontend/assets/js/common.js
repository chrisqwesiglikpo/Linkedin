  $(function() {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('.global-nav-primary-item a').each(function() {
     if (this.href === path) {
      $(this).addClass('active');
     }
    });
   });

   function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }