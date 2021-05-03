//Navbar toggle for mobile view
$(document).ready(function(){
     $('.menu-toggle').on('click', function(){
     $('.nav').toggleClass('showing'); 
     $('.nav ul').toggleClass('showing'); 
     
     });

// slider or carousell
$('.post-wrapper').slick({
     slidesToShow: 3,
     slidesToScroll: 1,
     autoplay: true,
     autoplaySpeed: 2000,
     nextArrow: $('.next '),
     prevArrow: $('.prev '),
     //making the slider responsive
     responsive: [
     {
     breakpoint: 1366,
     settings: {
     slidesToShow: 3,
     slidesToScroll: 3,
     infinite: true,
     dots: true
     }
     },
     {
     breakpoint: 1025,
     settings: {
     slidesToShow: 2,
     slidesToScroll: 2
     }
     },
     {
     breakpoint: 535,
     settings: {
     slidesToShow: 1,
     slidesToScroll: 1
     }
     }
     // You can unslick at a given breakpoint now by adding:
     // settings: "unslick"
     // instead of a settings object
     ]
     });
})





   


//Classic Text Editor
ClassicEditor
.create( document.querySelector( '#body' ), {
toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
heading: {
options: [
{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
]
}
} )
.catch( error => {
console.log( error );
});




