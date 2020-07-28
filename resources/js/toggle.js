$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

$('.menu-nav').on('click','li', function(){
    $(this).addClass('active').siblings().removeClass('active');
 });

var condition = true;
var collaspsebtn = document.getElementById('sidebarCollapse');
var collaspseicon = document.getElementById('collapseicon');
var linav = document.getElementsByClassName('linav');

if(collaspsebtn)
{
    collaspsebtn.addEventListener('click', function(){

        if(condition)
        {
            collapseicon.classList.value = 'svg-inline--fa fa-arrow-alt-circle-right fa-w-16';
            condition = false;
            for(var x = 0; x < linav.length; x++)
            {

                linav[x].classList.add('d-flex');
                linav[x].classList.add('justify-content-center');
            }
        }
        else
        {
            collapseicon.classList.value = 'svg-inline--fa fa-arrow-alt-circle-left fa-w-16';
            condition = true;
            for(let e = 0; e < linav.length; e++)
            {
                linav[e].classList.remove('d-flex');
                linav[e].classList.remove('justify-content-center');
            }
        }
    })
}

if(window.location.href.indexOf('courses') > -1){
    handleNav('courses');
}
else if(window.location.href.indexOf('subjects') > -1){
    handleNav('subjects');
}
else if(window.location.href.indexOf('trainees') > -1){
    handleNav('trainees');
}
else if(window.location.href.indexOf('') > -1){
    handleNav('dashboard');
}


function handleNav(name){
    for(var x = 0; x < linav.length; x++)
    {
        if(linav[x].classList.contains(name) && !linav[x].classList.contains('active'))
        {
            linav[x].classList.add('active');
            continue;
        }
        linav[x].classList.remove('active');
    }
}
