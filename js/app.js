// récupérer le nom et l'id en fonction du bouton cliqué
const buttons = document.querySelectorAll(".modalTable");

console.log("test");
// au clic sur le bouton blablablabla
for (let button of buttons) {
  button.addEventListener("click", function (e) {
    console.log("test");
    // on remonte comme il se doit pour récupérer l'id stocké dans le tr et le nom dans le premier enfant td du tr
    id = this.parentNode.parentNode.id;
    type = this.parentNode.parentNode.className;
    nom = this.parentNode.parentNode.firstChild.innerHTML;
    console.log(type);
    let modalTemplate = `
    <div class="modal fade" id="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p>Voulez-vous vraiment supprimer ${nom} de la base de donnée ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
            <a href="index.php?action=supprimer${type}&id=${id}" class="btn btn-danger">Oui</a>
          </div>
        </div>
      </div>
    </div>`;
    // on fait apparaitre la modale
    document.querySelector(".modalPlace").innerHTML = modalTemplate;
    $("#modal").modal("toggle");
  });
}
