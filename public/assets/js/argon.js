/*!
=========================================================
* Argon Design System - v1.0.1
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2018 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

"use strict";
$(document).ready(function() {
// Collapse navigation
$('.navbar-main .collapse').on('hide.bs.collapse', function () {
var $this = $(this);
$this.addClass('collapsing-out');
});
$('.navbar-main .collapse').on('hidden.bs.collapse', function () {
var $this = $(this);
$this.removeClass('collapsing-out');
});
$('.navbar-main .dropdown').on('hide.bs.dropdown', function () {
var $this = $(this).find('.dropdown-menu');
$this.addClass('close');
setTimeout(function(){
$this.removeClass('close');
}, 200);
});
// Headroom - show/hide navbar on scroll
if($('.headroom')[0]) {
var headroom  = new Headroom(document.querySelector("#navbar-main"), {
offset: 300,
tolerance : {
up : 30,
down : 30
},
});
headroom.init();
}

// Datepicker
$('.datepicker')[0] && $('.datepicker').each(function() {
$('.datepicker').datepicker({
disableTouchKeyboard: true,
autoclose: false
});
});
// Tooltip
$('[data-toggle="tooltip"]').tooltip();
// Popover
$('[data-toggle="popover"]').each(function() {
var popoverClass = '';
if($(this).data('color')) {
popoverClass = 'popover-'+$(this).data('color');
}
$(this).popover({
trigger: 'focus',
template: '<div class="popover '+ popoverClass +'" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
})
});

// Additional .focus class on form-groups
$('.form-control').on('focus blur', function(e) {
$(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');

// NoUI Slider
if ($(".input-slider-container")[0]) {
$('.input-slider-container').each(function() {
var slider = $(this).find('.input-slider');
var sliderId = slider.attr('id');
var minValue = slider.data('range-value-min');
var maxValue = slider.data('range-value-max');
var sliderValue = $(this).find('.range-slider-value');
var sliderValueId = sliderValue.attr('id');
var startValue = sliderValue.data('range-value-low');
var c = document.getElementById(sliderId),
d = document.getElementById(sliderValueId);
noUiSlider.create(c, {
start: [parseInt(startValue)],
connect: [true, false],
//step: 1000,
range: {
'min': [parseInt(minValue)],
'max': [parseInt(maxValue)]
}
});
c.noUiSlider.on('update', function(a, b) {
d.textContent = a[b];
});
})
}
if ($("#input-slider-range")[0]) {
var c = document.getElementById("input-slider-range"),
d = document.getElementById("input-slider-range-value-low"),
e = document.getElementById("input-slider-range-value-high"),
f = [d, e];
noUiSlider.create(c, {
start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
connect: !0,
range: {
min: parseInt(c.getAttribute('data-range-value-min')),
max: parseInt(c.getAttribute('data-range-value-max'))
}
}), c.noUiSlider.on("update", function(a, b) {
f[b].textContent = a[b]
})
}
// When in viewport
$('[data-toggle="on-screen"]')[0] && $('[data-toggle="on-screen"]').onScreen({
container: window,
direction: 'vertical',
doIn: function() {
//alert();
},
doOut: function() {
// Do something to the matched elements as they get off scren
},
tolerance: 200,
throttle: 50,
toggleClass: 'on-screen',
debug: false
});
// Scroll to anchor with scroll animation
$('[data-toggle="scroll"]').on('click', function(event) {
var hash = $(this).attr('href');
var offset = $(this).data('offset') ? $(this).data('offset') : 0;
// Animate scroll to the selected section
$('html, body').stop(true, true).animate({
scrollTop: $(hash).offset().top - offset
}, 600);
event.preventDefault();
});
});
function seriesId(id)
{
document.getElementById('series_id').value = id;
}
function reviewStars(data) {
$('#stars').val(data);
switch (data) {
case 1:
document.getElementById('review-stars-1').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-2').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-3').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-4').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-5').style.backgroundColor = "#f1e09be6";
break;
case 2:
document.getElementById('review-stars-1').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-2').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-3').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-4').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-5').style.backgroundColor = "#f1e09be6";
break;
case 3:
document.getElementById('review-stars-1').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-2').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-3').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-4').style.backgroundColor = "#f1e09be6";
document.getElementById('review-stars-5').style.backgroundColor = "#f1e09be6";
break;
case 4:
document.getElementById('review-stars-1').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-2').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-3').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-4').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-5').style.backgroundColor = "#f1e09be6";
break;
case 5:
document.getElementById('review-stars-1').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-2').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-3').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-4').style.backgroundColor = "#efc92de6";
document.getElementById('review-stars-5').style.backgroundColor = "#efc92de6";
break;
}
}
function readMore(user,review,stars)
{
document.getElementById('modal-title-notification').innerHTML = user;
document.getElementById('review-desc').innerHTML = review;
document.getElementById('review-stars').innerHTML = stars;
}

$('#fieldSearch').keypress(function (e) {
    var key = e.which;
    if(key == 13)  // the enter key code
    {
        var f_data = $('#fieldSearch').val();
        var url = $('#input-url').val();
        if (f_data == '') {
            document.getElementById('fieldSearch').style.border = "1px solid #CC3333";
            document.getElementById('fieldSearch').focus();
        } else {
            document.getElementById('search-title').innerHTML = "Search Result...";
            document.getElementById('fieldSearch').style.border = "1px solid #ced4da";
            document.getElementById('search-result').innerHTML = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
            var data = "input=" + f_data;
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (data) {
                    document.getElementById('fieldSearch').value = '';
                    document.getElementById('search-result').innerHTML = data;
                }
            });
        }
    }
});

function filterByName()
{
    var url = $('#name-url').val();
    document.getElementById('search-title').innerHTML = "Name Result...";
    document.getElementById('search-result').innerHTML = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
    var data = 'data';
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            document.getElementById('search-result').innerHTML = data;
        }
    });
}

function filterByDate()
{
    var url = $('#date-url').val();
    document.getElementById('search-title').innerHTML = "Date Result...";
    document.getElementById('search-result').innerHTML = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
    var data = 'data';
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            document.getElementById('search-result').innerHTML = data;
        }
    });
}

function filterByRating()
{
    var url = $('#rating-url').val();
    document.getElementById('search-title').innerHTML = "Rating Result...";
    document.getElementById('search-result').innerHTML = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
    var data = 'data';
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            document.getElementById('search-result').innerHTML = data;
        }
    });
}

function loadingBtn() {
    document.getElementById('loading-btn').innerHTML = '<button class="btn ld-ext-right running" disabled>Loading <div class="ld ld-ring ld-spin"></div></button>';
    return true;
}