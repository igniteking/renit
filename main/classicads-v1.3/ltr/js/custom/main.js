

//========================================
//        NAVBAR FIXED WHEN SCROLL
//========================================
$(window).on("scroll", function(){
    var scrolling = $(this).scrollTop();
    if (scrolling > 100){
        $(".header-part").addClass("header-fixed");
    }else{
        $(".header-part").removeClass("header-fixed");
    }
});


//========================================
//     HEADER SEARCH ADVANCE OPTION
//========================================
$('.option-btn').on('click', function(){
    $('.header-search').toggleClass('active');
    $('.header-option').slideToggle('slow');
});


//========================================
//       HEADER RESPONSIVE SEARCH
//========================================
$('.search-btn').on('click', function(){
    $('.header-form').slideToggle('slow');
    $(this).children('.fa-search').toggleClass('fa-times');
});


//========================================
//          SIDEBAR MENU SLIDE
//========================================
$('.sidebar-btn').on('click', function(){
    $('.sidebar-part').addClass('active');
    $('.sidebar-cross').on('click', function(){
        $('.sidebar-part').removeClass('active');
    });
});


//========================================
//     HEADER ICON DROPDOWN CARD
//========================================
$('.header-widget').on('click', function(){
    $(this).next('.dropdown-card').slideToggle();

    var dropdownCard = $(this).next('.dropdown-card');
    if($('.dropdown-card:visible')) {
        $('.dropdown-card').hide();
        dropdownCard.show();
    }
    else if($('.dropdown-card:hidden')) {
        dropdownCard.show();
    }
});


//========================================
//        DROPDOWN CATEGORY MENU
//========================================
$(function () {
    $(".navbar-dropdown a").click(function() {
        $(this).next().toggle();
        if($('.dropdown-list:visible').length > 1) {
            $('.dropdown-list:visible').hide();
            $(this).next().show();
        }
    }); 
});


//========================================
//         NASTED DROPDOWN MENU
//========================================
$(function () {
    $(".nasted-menu").click(function() {
        $(this).next().toggle();
        if($('.nasted-menu-list:visible').length > 1) {
            $('.nasted-menu-list:visible').hide();
            $(this).next().show();
        }
    }); 
});


//========================================
//        FEATURE WISHLIST ACTIVE
//========================================
$('.feature-wish').on('click', function(){
    $(this).toggleClass('active');
});


//========================================
//     PRODUCT CARD WISHLIST ACTIVE
//========================================
$('.product-btn .fa-heart').on('click', function(){
    $(this).toggleClass('fas');
});


//========================================
//      LANGUAGE OR CURRENCY ACTIVE
//========================================
$('.modal-link').on('click', function(){
    $('.modal-body').children().removeClass('active');
    $(this).addClass('active');
});


//========================================
//        PRODUCT WIDGET CATEGORY
//========================================
$('.product-widget-link').on('click', function(){

    $('.product-widget-link').removeClass('active');
    $('.product-widget-dropdown').slideUp('slow');

    $(this).addClass('active');
    $(this).next('.product-widget-dropdown').slideDown('slow');

});


//========================================
//        PASSWORD HIDE & SHOW
//========================================
$(".eye").on('click', function(){
    $(".eye").toggleClass("fa-eye-slash");
    $(".eye").toggleClass("fa-eye");

    var input = $("#pass");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    }
    else {
        input.attr("type", "password");
    }
});


//========================================
//        SIDEBAR TAB TOGGLE
//========================================
$(".navbar-widget li").on("click", function(){
    $(".navbar-widget li").removeClass("active");
    $(this).addClass("active");
});


//========================================
//        SIDEBAR HIDE & SHOW
//========================================
$(".navbar-user").on("click", function(){
    $(".sidebar-part").addClass("active");
    $(".cross-btn").on('click', function(){
        $(".sidebar-part").removeClass("active");
    });
});


//========================================
//        USER EDIT OPTION
//========================================
$(".edit-btn").on('click', function(){
    $(".edit-option").addClass("active");
    $(".cancel").on('click', function(){
        $(".edit-option").removeClass("active");
    });
});


//========================================
//        MESSAGE SEARCH BAR
//========================================
$('.message-filter-btn').on('click', function(){
    $('.message-filter-src').toggleClass('active');
    $(this).children('.fa-search').toggleClass('fa-times');
});


//========================================
//        MESSAGE ACTIVE LIST
//========================================
$('.message-item').on('click', function(){
    $('.message-list li').removeClass('active');
    $(this).addClass('active');
});


//========================================
//        FOLLOW AUTHOR ACTIVE
//========================================
$('.author-widget .follow').on('click', function(){
    $(this).toggleClass('active');
});


//========================================
//        WISHLIST ACTIVE
//========================================
$('.wish').on('click', function(){
    $(this).toggleClass('active');
});


//========================================
//        REVIEW WIDGET MENU
//========================================
$('.review-dots-btn').on('click', function(){
    $(this).next('.review-widget-list').toggleClass('active');
});














