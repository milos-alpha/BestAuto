const toggleNavBar = (button) =>{
    const navbar = document.getElementById('navbar');
    span = button.children[0]

    if(span.innerHTML === '<i class="fas fa-bars"></i>'){
        navbar.classList.remove('left-[-250%]')
        navbar.classList.add('left-0')
        span.innerHTML = '<i class="fas fa-times"></i>'
    }
    else{
        navbar.classList.add('left-[-250%]')
        navbar.classList.remove('left-0')
        span.innerHTML = '<i class="fas fa-bars"></i>'    
    }
}