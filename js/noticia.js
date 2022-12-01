let btnCopiar =  document.querySelector('#btnCopiar');
let btnCopiado = document.querySelector('#btnCopiado');
btnCopiar.addEventListener('click', (e)=>{
e.preventDefault();
navigator.clipboard.writeText(window.location.href);
btnCopiado.style.visibility = 'visible';

setTimeout(() => {
    btnCopiado.style.visibility = 'hidden';
}, 1500);

});