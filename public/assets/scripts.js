AOS.init();



// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "10px 15px";
        document.getElementById("navbar").classList.add("nav-scroll");
        document.getElementById("navbar").classList.add("shadow-lg");
        document.getElementById("shadow-nav").classList.add("shadow-nav");
        document.getElementById("list-menu").classList.add("list-menu-scroll");
    } else {
        document.getElementById("navbar").style.padding = "15px 15px";
        document.getElementById("navbar").classList.remove("nav-scroll");
        document.getElementById("navbar").classList.remove("shadow-lg");
        document.getElementById("shadow-nav").classList.remove("shadow-nav");
        document.getElementById("list-menu").classList.remove("list-menu-scroll");
    }
}



 function animation() {
   return {
     counter: 0,
     animate(finalCount) {
       let time = 1000; /* Time in milliseconds */
       let interval = 9;
       let step = Math.floor((finalCount * interval) / time);
       let timer = setInterval(() => {
         this.counter = this.counter + step;
         if (this.counter >= finalCount + step) {
           this.counter = finalCount;
           clearInterval(timer);
           timer = null;
           return;
         }
       }, interval);
     },
   };
 }

    var darkMode = false;

    // default to system setting
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        darkMode = false;
    }

    // preference from localStorage should overwrite
    if (localStorage.getItem('theme') === 'dark') {
        darkMode = true;
    } else if (localStorage.getItem('theme') === 'light') {
        darkMode = false;
    }

    if (darkMode) {
        document.body.classList.toggle('dark');
    }

    document.addEventListener('DOMContentLoaded', () => {

        document.getElementById('theme-toggle').addEventListener('click', () => {
            document.body.classList.toggle('dark');
            localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
        });


    });


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_view')
                    .attr('src', e.target.result)
                    .width(144)
                    .height(144)
                    .css('border-radius', '500px');
            };

            reader.readAsDataURL(input.files[0]);
        }
    };
