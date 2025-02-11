document.getElementById('contacto').addEventListener('click',()=>{
    const contacto=document.getElementById('contato')
    contacto.scrollIntoView({behavior:"smooth"})
})

// click no utente administradores

document.getElementById('utente').addEventListener('click',()=>{
    document.getElementById('show_users').classList.toggle('hidden')

})