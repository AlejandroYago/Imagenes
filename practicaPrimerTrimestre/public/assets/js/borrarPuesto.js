// (function(){
    
//         let modalDelete = document.getElementById('modalDelete');
//         //let deletePuesto=document.getElementById('deletePuesto');
//         let form = document.getElementById('modalDeleteResourceForm');
//         modalDelete.addEventListener('show.modal', function (event) {
//                 let element = event.relatedTarget;
//                 let action = element.getAttribute('data-url');
//                 //let nombre= element.dataset.nombre;
//                 //deletePuesto.innerHTML=nombre;
                
//                 form.action = action;
//             });
    
// })();
const deleteElement = (id, name, rute) => {
      const form = document.getElementById('form');
      const spans = document.querySelectorAll('.name');

      spans.forEach((span) => {
            span.innerText = name;
      });

      form.action = `https://informatica.ieszaidinvergeles.org:10037/laraveles/practicaPrimerTrimestre/public/${rute}/${id}`;
};