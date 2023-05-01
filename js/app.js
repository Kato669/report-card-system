let iconshow = document.getElementById('iconshow');
let hideclass = document.getElementById('hideclass');
let displayed = document.querySelector('.displayed');

//manage and create class
iconshow.addEventListener('click', (e)=>{
    e.preventDefault()
    displayed.classList.add('active')
    iconshow.classList.add('active')
    hideclass.classList.add('active')
})
hideclass.addEventListener('click', (e)=>{
    e.preventDefault();
    displayed.classList.remove('active')
    iconshow.classList.remove('active')
    hideclass.classList.remove('active')
})
//manage and create class ends

//manage subjects
let showsubj = document.getElementById('showsubj');
let hidesubj = document.getElementById('hidesubj');
let dispsubj = document.querySelector('.dispsubj');

showsubj.addEventListener('click', (e)=>{
    e.preventDefault()
    dispsubj.classList.add('active')
    showsubj.classList.add('active')
    hidesubj.classList.add('active')
})
hidesubj.addEventListener('click', (e)=>{
    e.preventDefault()
    dispsubj.classList.remove('active')
    showsubj.classList.remove('active')
    hidesubj.classList.remove('active')
})
//manage subjects ends

//manage students
let showstdnt = document.getElementById('showstdnt');
let hidestdnt = document.getElementById('hidestdnt');
let dispstdnt = document.querySelector('.dispstdnt');

showstdnt.addEventListener('click', (e)=>{
    e.preventDefault()
    dispstdnt.classList.add('active')
    showstdnt.classList.add('active')
    hidestdnt.classList.add('active')
})
hidestdnt.addEventListener('click', (e)=>{
    e.preventDefault()
    dispstdnt.classList.remove('active')
    showstdnt.classList.remove('active')
    hidestdnt.classList.remove('active')
})
//manage students ends

//manage results
let showrslts = document.getElementById('showrslts');
let hiderslts = document.getElementById('hiderslts');
let disprslts = document.querySelector('.disprslts');

showrslts.addEventListener('click', (e)=>{
    e.preventDefault()
    disprslts.classList.add('active')
    showrslts.classList.add('active')
    hiderslts.classList.add('active')
})
hiderslts.addEventListener('click', (e)=>{
    e.preventDefault()
    disprslts.classList.remove('active')
    showrslts.classList.remove('active')
    hiderslts.classList.remove('active')
})

